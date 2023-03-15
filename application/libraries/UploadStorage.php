<?php


use Aws\Credentials\Credentials;
use Aws\S3\S3Client;
use Ramsey\Uuid\Uuid;

/**
 * Manage file uploads in S3 Compatible Storages.
 */
class UploadStorage {

	public static $bucket_name        	= "test123";
	public static $access_key_id      	= "c330f41e66fbbb8fbb27d7b2325434fe";
	public static $access_key_secret  	= "dd0170809ea5203bb49a4cebeedccccca72f0b9b0afb8cadf3ef7f4f485bf334";
	public static $region				= "auto";
	public static $endpoint				= "https://ddc6462f5de89b3baac8a8225cc85189.r2.cloudflarestorage.com";
	public static $public_endpoint    	= "https://pub-f1a92c7185474f1b85303161c0d6a5c5.r2.dev";


	public static function client(){

		$credentials = new Credentials(static::$access_key_id, static::$access_key_secret);

		$options = [
			'region' => static::$region,
			'endpoint' => static::$endpoint,
			'version' => 'latest',
			'credentials' => $credentials
		];

		return new S3Client($options);

	}

	/**
	 * Save uploaded file to storage
	 * @param string $request_key
	 * @param string $path
	 * @throws Exception
	 * @return string|array Returns the url of the uploaded file.
	 */
	public static function store( $request_key, $path = '', $multiple = false ){

		$upload = new StorageUploadedFile( $request_key, $multiple );
        $s3 = static::client();


        if( $multiple ){
            $paths = [];

            for($index = 0; $index < $upload->fileCount(); $index++){
                $key = ($path ? $path . '/' : '') . Uuid::uuid4() . $upload->extension(true, $index);

                $s3->putObject([
                    'Bucket'			=> static::$bucket_name,
                    'Key'    			=> $key,
                    'Content-Length' 	=> $upload->size($index),
                    'Content-Type' 		=> $upload->mimeType($index),
                    'Body'   			=> fopen($upload->path($index), 'r'),
                    // 'ACL'    			=> 'public-read', // NOT Supported in R2.
                ]);

                $paths[] = static::$public_endpoint . '/' . $key;
            }

            return $paths;
        }

        $key = ($path ? $path . '/' : '') . Uuid::uuid4() . $upload->extension(true);

        $s3->putObject([
            'Bucket'			=> static::$bucket_name,
            'Key'    			=> $key,
            'Content-Length' 	=> $upload->size(),
            'Content-Type' 		=> $upload->mimeType(),
            'Body'   			=> fopen($upload->path(), 'r'),
            // 'ACL'    			=> 'public-read', // NOT Supported in R2.
        ]);

        return static::$public_endpoint . '/' . $key;

	}


	public static function url($url, $default = null){
		$url = $url ? $url : $default;

		/**
		 * Backward compatibility, so that older image paths still
		 * work with the new format.
		 */
		if( substr($url, 0, 4) !== 'http' ){
			$url = base_url('assets/frontend/uploads/') . $url;
		}

		return $url;
	}


}


/**
 * Uploaded File Manager.
 */
class StorageUploadedFile {

	/**
     * Single or multiple uploaded files.
	 * @var mixed
	 */
	public $file;
    public $multiple = false;


	protected $upload_errors = [
		0 => 'There is no error, the file uploaded with success',
		1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
		2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
		3 => 'The uploaded file was only partially uploaded',
		4 => 'No file was uploaded',
		6 => 'Missing a temporary folder',
		7 => 'Failed to write file to disk.',
		8 => 'A PHP extension stopped the file upload.',
	];


	/**
	 * @throws Exception
	 */
	public function __construct( $requested_file_name, $multiple = false ) {

		if( ! static::exists( $requested_file_name, $multiple ) ) {
			throw new Exception('File was\'nt uploaded.');
		}

		$this->file = $_FILES[ $requested_file_name ];
        $this->multiple = $multiple;


        if( $multiple ){
            for ( $index = 0; $index < $this->fileCount(); $index++ ){
                if( $this->errorCode( $index ) ){
                    throw new Exception( $this->errorMessage( $index ), $this->errorCode( $index ) );
                }
            }
        } else {
            if( $this->errorCode() ){
                throw new Exception( $this->errorMessage(), $this->errorCode() );
            }
        }

	}


	/**
	 * Get the path of the file where php has stored the file temporarily.
	 * @return mixed
	 */
	public function path($index = -1){
		return $index >= 0 ? $this->file['tmp_name'][$index] : $this->file['tmp_name'];
	}


	/**
	 * Get the name of the uploaded file.
	 * @return mixed
	 */
	public function name($index = -1){
        return $index >= 0 ? $this->file['name'][$index] : $this->file['name'];
	}


	/**
	 * Get mime type of the uploaded file.
	 * @return mixed
	 */
	public function mimeType($index = -1){
        return $index >= 0 ? $this->file['type'][$index] : $this->file['type'];
	}


	/**
	 * Get the size of the uploaded file in bytes.
	 * @return mixed
	 */
	public function size($index = -1){
        return $index >= 0 ? $this->file['size'][$index] : $this->file['size'];
	}


	/**
	 * Get the size of the uploaded file in bytes.
	 * @return \int
     */
	public function fileCount(){
        return $this->multiple ? ( isset( $this->file['name'] ) && is_array($this->file['name']) ? count( $this->file['name'] ) : 0) : 1;
	}


	/**
	 * Get the file extension.
	 * @param bool $dot
	 * @return string
	 */
	public function extension($dot = false, $index = -1){
		$ext = pathinfo($this->name($index), PATHINFO_EXTENSION);
		return ( ( $dot && $ext ) ? '.' : '') . $ext;
	}


	/**
	 * Get Error Code.
	 * @return mixed
	 */
	public function errorCode( $index = -1 ){
        if( $index >= 0 ){
            return $this->file['error'][ $index ];
        }
        return $this->file['error'];
	}


	/**
	 * Get upload error message.
	 * @return mixed|string
	 */
	public function errorMessage($index = -1){
		return isset( $this->upload_errors[ $this->errorCode( $index ) ] )
			? $this->upload_errors [ $this->errorCode( $index ) ] . ' Error: ' . json_encode( ($index >= 0) ? $this->file[ $index ] : $this->file )
			: 'Unknown error!';
	}


    /**
     * Checks if request file exists in php's uploaded files.
     *
     * @param $requested_file_name
     * @param bool $multiple
     * @return bool
     */
	public static function exists( $requested_file_name, $multiple = false ) {
        if( $multiple ){
            return isset( $_FILES[ $requested_file_name ] )
                && count( $_FILES[ $requested_file_name ][ 'name' ] ) > 0
                && reset($_FILES[ $requested_file_name ][ 'name' ]);
        }

        return isset( $_FILES[ $requested_file_name ] ) && $_FILES[ $requested_file_name ][ 'name' ];
	}

}

