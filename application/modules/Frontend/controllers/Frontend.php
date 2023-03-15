<?php defined('BASEPATH') or exit('No direct script access allowed');


class Frontend extends MY_Controller
{
    /**
     * [__construct description]
     *
     * @method __construct
     */
    protected $data = array();
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        $this->data['site_title'] = ucfirst(lang('site_title'));
        $this->load->model('commonmodel');
        $this->load->library('form_validation');
    }

    /**
     * [index description]
     *
     * @method index
     *
     * @return [type] [description]
     */
    public function index()
    {
        $userprofile_data = array();
        $userprofile_data_id = '';
        
        
        // echo checkauth().user_profilecount(); exit();
        if(isset($_GET['profile']) && $_GET['profile']!=''){
            
            $userprofile_data = $this->commonmodel->getsingleData('user_profile',['profile_url'=>$_GET['profile']]);
            if(checkauth()){
                if($userprofile_data['is_public']==2 && $userprofile_data['user_id'] !=get_frontauthuser('user_id')){
                   redirect('/expired-link?p=This account is private.'); 
                }
            }else{
                if(isset($userprofile_data['is_public']) && $userprofile_data['is_public']==2){
                   redirect('/expired-link?p=This account is private.'); 
                }
            }
            if(isset($userprofile_data) && !empty($userprofile_data)){
                // print_r($userprofile_data); exit();
                $this->data['userprofile_data'] = $userprofile_data;
                $session_array['front_profile_id'] = $this->data['userprofile_data']['id'];
                // print_r($session_array); exit();
                $this->session->set_userdata($session_array);
                $this->data['media_album'] = $this->commonmodel->getAllDataArray('media_album',['user_id'=>get_frontauthuser('user_id'),'profile_id'=>get_frontprofileid()],'id','desc');
                // print_r($this->data); exit();
            }else{
                unset($_SESSION['front_profile_id']);
            }

            // if(checkauth()){
            // }
        }elseif(checkauth() && user_profilecount()>0){
            // exit('asd');
            // echo get_adminprofile();
            $userprofile_data = $this->commonmodel->getsingleData('user_profile',['id'=>get_adminprofile()]);
            if(isset($userprofile_data) && !empty($userprofile_data)){
                $this->data['userprofile_data'] = $userprofile_data;
                $session_array['front_profile_id'] = $this->data['userprofile_data']['id'];
                $this->session->set_userdata($session_array);

                $this->data['media_album'] = $this->commonmodel->getAllDataArray('media_album',['user_id'=>get_frontauthuser('user_id'),'profile_id'=>get_frontprofileid()],'id','desc');
                //print_r($this->data['media_album']); exit();
            }
        }elseif(get_frontprofileid() && get_frontprofileid()!=''){
            $userprofile_data = $this->commonmodel->getsingleData('user_profile',['id'=>get_frontprofileid()]);
            if(isset($userprofile_data) && !empty($userprofile_data)){
                $this->data['userprofile_data'] = $userprofile_data;
                $session_array['front_profile_id'] = $this->data['userprofile_data']['id'];
                $this->session->set_userdata($session_array);

                $this->data['media_album'] = $this->commonmodel->getAllDataArray('media_album',['user_id'=>get_frontauthuser('user_id'),'profile_id'=>get_frontprofileid()],'id','desc');
                //print_r($this->data['media_album']); exit();
            }
        }
        // echo $this->session->userdata('front_profile_id'); exit();
        // print_r($this->data['userprofile_data']);exit();
        if(!isset($this->data['userprofile_data']) && checkauth()){
            redirect('/welcomepage');
        }
        $this->data['userplan_type'] = $this->commonmodel->getcustomdata('user_type',array(),array('id','asc'));
        // if(checkauth()){
        $this->data['middelsection'] = $this->get_middlesection_post($this->session->userdata('front_profile_id'));
        // }
        // print_r($this->data['middelsection']); exit();
        
        /*
        * myalbum slider images start
        */
        if(isset($this->data['middelsection']['media_data']) && $this->data['middelsection']['media_data']!=''){
            foreach($this->data['middelsection']['media_data'] as $v_k => $val){
                $val->media_album_images = $this->commonmodel->getjointbData('media_images',['album_id'=>$val->album_id],'result');

                foreach($val->media_album_images as $val_album_img){
                    $val_album_img->likecount = $this->commonmodel->getsingleData(
                    "post_like_count",['table'=>'media_images','like_count'=>1,'post_id'=>$val_album_img->id],"count(*) as count")['count'];
                }
                $val->media_images_comment = $this->commonmodel->getjointbData('comment_post',['post_type' => 'media_post','post_id' => $val->id],'result');
            }
        // echo '<pre>';print_r($this->data['middelsection']['media_data']); exit();
        }
        /*
        * myalbum slider images end
        */

        $this->template->set_layout('frontlayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('homenavbar', 'partials/frontnavbar');
        $this->data['life_oftype'] = life_oftype();
        if(isset($_GET['profile']) && $_GET['profile']!=''){
            // echo $_GET['profile'];
            // echo get_frontprofileid();
            $this->data['family_group_id'] = $family_group_id = (isset(get_userprofile(get_frontprofileid())->family_group_id)) ? get_userprofile(get_frontprofileid())->family_group_id : '';
            // $user_id = get_userprofile(get_frontprofileid())->user_id;
            // $this->data['profile_list'] = $this->commonmodel->getAllData('user_profile','user_id',$user_id);
            $this->data['profile_list'] = $this->commonmodel->getAllData('user_profile','family_group_id',$family_group_id);
        }elseif(checkauth()){
            $this->data['profile_list'] = $this->commonmodel->getAllData('user_profile','user_id',get_frontauthuser('user_id'));
        }
            // echo '<pre>';print_r($this->data['family_group_id']); exit();
        
        $this->template->build('index', $this->data);
    }

    function get_middlesection_post($profile_id=''){
        // echo $profile_id; exit();
        if($profile_id!=''){
            $returndata = array();
            $userdetail = get_frontauthuser();
            
            $where_status['status'] = 1;
            $memory = $this->commonmodel->getjointbData('memories',array('profile_id'=>$profile_id,'memories.trash'=>0,'memories.feature_post'=>1), 'result_array','user_profile.profile_name,memories.status,memories.user_id,memories.id,memories.profile_id,memories.title as name,memories.memoryimage as image,memories.comment,memories.created_at as post_date,memory_ispublic as is_public,"memories" AS tablename,memories.updated_at,memories.feature_postby',['user_profile','memories.profile_id=user_profile.id'],["memories.id","DESC"]);
            
            $timeline = $this->commonmodel->getjointbData('timeline',array('profile_id'=>$profile_id,'timeline.trash'=>0,'timeline.feature_post'=>1), 'result_array','user_profile.profile_name,timeline.status,timeline.user_id,timeline.id,timeline.profile_id,timeline.title as name,timeline.timeline_image as image,timeline.description as comment,timeline.created_at as post_date,timeline_ispublic as is_public,"timeline" AS tablename,timeline.updated_at,timeline.feature_postby',['user_profile','timeline.profile_id=user_profile.id'],["timeline.id","DESC"]);

            $respect_post = $this->commonmodel->getjointbData('respect_post',array('profile_id'=>$profile_id,'respect_post.trash'=>0,'respect_post.feature_post'=>1), 'result_array','user_profile.profile_name,respect_post.status,respect_post.user_id,respect_post.profile_id,respect_post.id,respect_post.name,respect_post.respect_image as image,SUBSTRING(respect_post.comment, 1, 30) as name,respect_post.comment,respect_post.created_at as post_date,respect_ispublic as is_public,"respect_post" AS tablename,respect_post.updated_at,respect_post.feature_postby',['user_profile','respect_post.profile_id=user_profile.id'],["respect_post.id","DESC"]);

            $journal_post = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$profile_id,'journal_post.trash'=>0,'journal_post.feature_post'=>1), 'result_array','user_profile.profile_name,journal_post.status,journal_post.user_id,journal_post.profile_id,journal_post.id,journal_post.title as name,journal_post.image as image,journal_post.description as comment,journal_post.created_at as post_date,journal_post.is_public as is_public,"journal_post" AS tablename,journal_post.updated_at,journal_post.feature_postby',['user_profile','journal_post.profile_id=user_profile.id'],["journal_post.id","DESC"]);
            //echo $this->db->last_query(); exit();
            // print_r($timeline);
            // print_r($memory);
            $returndata['feature_post'] = array_merge($memory,$timeline,$respect_post,$journal_post);
            // echo '<pre>';print_r($returndata['feature_post']); exit();
            $price = array();
            foreach ($returndata['feature_post'] as $key => $row)
            {
                $price[$key] = $row['updated_at'];
            }
            array_multisort($price, SORT_DESC, $returndata['feature_post']);
            // echo '<pre>';print_r($returndata['feature_post']); exit();

            // $returndata['feature_post'] = $this->commonmodel->getAllDataArray('feature_post',array('profile_id'=>$profile_id,'post_trash'=>0,'post_status'=>1), "id","DESC");
            
            $returndata['lifeof_post'] = $this->commonmodel->getjointbData('life_of',array('profile_id'=>$profile_id,'life_of.trash'=>0),'result','id,user_id,profile_id,SUBSTRING(type,1,30) as type,images,description,status,trash,post_date,is_public,shared_by,created_at,updated_at',null,['id','ASC'],null,'3');
            
            if(checkauth()){
                $returndata['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$profile_id,'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null);

            }else{
            $returndata['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$profile_id,'journal_post.trash'=>0,'journal_post.is_public'=>1,'save_status'=>2),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null);
            }
            // echo '<pre>';print_r($returndata['journal_post']); exit();
            $returndata['journal_postslider'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$profile_id,'journal_post.trash'=>0,'is_public'=>1),'result','*',null,['id','DESC'],null,8);

            /*
            $album_group_sql = get_media_albumgroup();
            $album_count = $album_group_sql['album_count'];
            $album_groupid = $album_group_sql['album_group'];
            $album_sql = $this->db->select('album_id')->where(['trash'=>0,'status'=>1])->group_by('album_id')->get('media_images');
            print_r($album_sql->result_array());
            $album_count = $album_sql->num_rows();
            /*album_id FROM media_images group by album_id*/
            /*
            $returndata['media_data'] = $this->db->query("select media_images.id,media_images.user_id,media_images.profile_id,album_id,`image`,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images JOIN media_album ON media_images.album_id=media_album.id  where album_id IN ($album_groupid) order by set_coverphoto desc limit $album_count")->result();
            echo $this->db->last_query(); exit();
            // echo '<pre>';print_r($returndata['media_data']); exit();
            
            $returndata['media_data'] = $this->db->query("SELECT media_images.id,media_images.user_id,media_images.profile_id,album_id,`image`,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images JOIN media_album ON media_images.album_id=media_album.id WHERE media_images.id IN (
                SELECT max(media_images.id) as media_images_id
                FROM media_images 
                GROUP by album_id 
                ORDER by media_images_id DESC
            ) and media_images.trash=0 and media_images.status=1 and media_images.profile_id='$profile_id'")->result();
            */
            $media_data = [];
            $media_album_data = $this->commonmodel->getjointbData('media_album',['media_album.profile_id'=>$profile_id],'result','media_album.title,media_album.caption,media_album.id as albumid',['media_images',' media_album.id=media_images.album_id'],['media_album.id','DESC'],'media_album.id');
            // echo $this->db->last_query(); exit();
            foreach($media_album_data as $m => $album_value){
                // print_r($album_value); exit();
                // echo $album_value->title; exit();
                $media_image_data = $this->commonmodel->getjointbData('media_images',['media_images.profile_id'=>$profile_id,'album_id'=>$album_value->albumid],'row','media_album.title,media_album.caption,media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto',['media_album',' media_album.id=media_images.album_id'],['set_coverphoto','DESC'],null,1);
                $returndata['media_data'][$m] = $media_image_data;
                
            }
            // print_r($returndata['media_data']); exit();
            /*
            $returndata['media_data'] = 
                $this->db->query("SELECT media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images join media_album on media_images.album_id=media_album.id where media_images.trash=0 and media_images.status=1 and media_images.profile_id=$profile_id group by media_images.album_id  order by set_coverphoto desc,media_images.id desc")->result();*/
            // echo '<pre>';print_r($returndata['middelsection']['media_data']); exit();
            //$returndata['media_data'] = $this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.status'=>1,'media_images.profile_id'=>$profile_id],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);
            $returndata['memories_post'] = $this->commonmodel->getAllDataArray('memories',array('profile_id'=>$profile_id,'trash'=>0), "id","DESC",'id,user_id,profile_id,name,SUBSTRING(title,1,30) as title,email,memoryimage,comment,status,memory_ispublic,trash,feature_post,feature_postby,created_at,updated_at');
            $returndata['respect_post'] = $this->commonmodel->getAllDataArray('respect_post',array('profile_id'=>$profile_id,'trash'=>0), "id","DESC");

            $returndata['timeline_post'] = $this->commonmodel->getAllDataArray('timeline',array('profile_id'=>$profile_id,'trash'=>0), "from_date","ASC");
            // print_r($returndata['respect_post']); exit();
            return $returndata;
        }
        return array();
    }

    function checkuser_email(){
        $resp = $this->commonmodel->getsingleData('users',array('email'=>$_GET['email'],'user_role'=>2));
        // print_r($resp); exit();
        if(!empty($resp)){
            echo true;
        }else{
            echo false;
        }
    }

    function checkemailid_sub(){
        $resp = $this->commonmodel->getsingleData('user_subscribe',array('email'=>$_GET['email'],'profile_id'=>get_frontprofileid()));
        // print_r($resp); exit();
        if(empty($resp)){
            echo true;
        }else{
            echo false;
        }
    }

    function checkregisteruser_email(){
        $resp = $this->commonmodel->getsingleData('users',array('email'=>$_GET['email'],'user_role'=>2));
        // print_r($resp); exit();
        if(empty($resp)){
            echo true;
        }else{
            echo false;
        }
    }

    function checkregisterwardenuser_email(){
        $resp = $this->commonmodel->getsingleData('warden_users',array('email'=>$_GET['email']));
        // print_r($resp); exit();
        if(empty($resp)){
            echo true;
        }else{
            echo false;
        }
    }
    

    // function userlogin(){
        
    //     $result = $this->commonmodel->user_login($this->input->post('email'),$this->input->post('password'));
    //     if($result['status']==true){
    //         // print_r($this->session->userdata('frontuserdetail')); exit();
    //         $path = (familygroupcount() && familygroupcount()!='') ? familygroupcount() : array();
    //         // print_r($path); exit();
    //         if($path && $path!='' && $path['ids']==1){
    //             $path = '/familymember/'.$path['id'];
    //             echo json_encode(array('status'=>true,'url'=>$path,'message'=>lang('successlogin')));
    //         }else{
    //             $path = '/familygroup';
    //             echo json_encode(array('status'=>true,'url'=>$path,'message'=>lang('successlogin')));
    //         }
    //         // $this->session->set_flashdata('success',lang('successlogin'));
    //         // redirect('myaccount');
    //     }else{
    //         echo json_encode(array('status'=>false,'message'=>$result['msg']));
    //         // $this->session->set_flashdata('loginpopup',true);
    //         // $this->session->set_flashdata('error',$result['msg']);
    //         // redirect('/');
    //     }

        
    // }

    function userlogin(){
        $result = $this->commonmodel->user_login($this->input->post('email'),$this->input->post('password'),$this->input->post('user_table'));
        if($result['status']==true){
            $userdata = $this->session->userdata('frontuserdetail');
            
            $path = site_url().'/familygroup';
            if($userdata['warden_user_id']>0 && $userdata['warden_group_id']!='')
            {
                $path = site_url().'/familymember/'.$userdata['warden_group_id'];
            }
            echo json_encode(array('status'=>true,'url'=>$path,'message'=>lang('successlogin')));
        }else{
            echo json_encode(array('status'=>false,'message'=>$result['msg']));
        }
    }

    function user_register(){
        // print_r($_POST); exit();
        
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE)
        {
            echo json_encode(array('status'=>false,'message'=>validation_errors()));
            // $this->session->set_flashdata('error',validation_errors());
            // $this->session->set_flashdata('signuppopup',true);
            // redirect('/');
        }else{
            $postdata = $this->input->post();
            $pass = $postdata['password'];
            $postdata['password'] = password_hash($postdata['password'],  PASSWORD_BCRYPT) ;
            // print_r($postdata); exit();
            $emilcode = rand(100000,999999);
            $postdata['confirm_code'] = $emilcode;
            /*if(isset($postdata['orderid']) && $postdata['orderid']!=''){
                $postdata['user_status'] = 1;
                $postdata['email_verify'] = 1;
                $msg = lang('registersuccess_msg');
            }else{
                $msg = lang('registersuccess_msg1');
            }*/
            $postdata['user_status'] = 1;
            $postdata['email_verify'] = 0;
            $msg = lang('registersuccess_msg1');
            $postdata['email_token'] = $emilcode;
            $group_name = isset($postdata['group_name']) ? $postdata['group_name'] : '';
            $orderid = isset($postdata['orderid']) ? $postdata['orderid'] : '';
            $customer_id = isset($postdata['customer_id']) ? $postdata['customer_id'] : '';
            unset($postdata['submit']);
            unset($postdata['conpassword']);
            unset($postdata['group_name']);
            unset($postdata['orderid']);
            unset($postdata['customer_id']);
            //print_r($postdata); exit();
            $user_id = $this->commonmodel->insertData('users',$postdata);

            if(isset($customer_id) && $customer_id!='' && isset($orderid) && $orderid!=''){
                $this->db->insert('woo_users',['customer_id'=>$customer_id,'order_id'=>$orderid,'user_id'=>$user_id]);
            }

            $group_id = $this->commonmodel->insertData(
                "family_group",
                array('user_id'=>$user_id,
                    'group_name'=>$group_name,
                    'first_name'=>$postdata['firstname'],
                    'last_name'=>$postdata['lastname'],
                    'userplan_type'=>isset($postdata['userplan_type']) ? $postdata['userplan_type'] : '2')
            );
            // $profiledata['user_id']=$user_id;
            // $profiledata['profile_name']=$postdata['firstname'].' '.$postdata['firstname'];
            // $profiledata['first_name']=$postdata['firstname'];
            // $profiledata['last_name']=$postdata['lastname'];
            // $profiledata['admin_profile']=1;

            // $profile_id = $this->commonmodel->insertData('user_profile',$profiledata);

            $userdetail = $this->commonmodel->getsingleData('users', array('id'=>$user_id),'id,firstname,confirm_code');
            
            $msgarr['userName'] = $postdata['firstname'].' '.$postdata['lastname'];
            $msgarr['password'] = $pass;
            $msgarr['email'] = $postdata['email'];
            $msgarr['token'] = base64_encode($emilcode);
            $templatename = 'emailverification';
            $subject = lang('emailverificationsubject');
            $tomail = $_POST['email'];//'ashishnuance@gmail.com';
            
            $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'emailverification'])->get('email_template')->row();
                
            $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('emailverification_msg');
            $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';
            $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
            // print_r($msgarr); exit();
            // if(isset($postdata['orderid']) && $postdata['orderid']!=''){
            //     $msg = lang('registersuccess_msg');
            // }else{
            //     $msg = lang('registersuccess_msg1');
            // }

            echo json_encode(array('status'=>true,'message'=>$msg));
            // $this->session->set_flashdata('success',lang('registersuccess_msg'));
            // $this->session->set_flashdata('signupsuccessModal',true);
            // redirect('/');
        }
            
        
    }

    function resetpassword($token,$usertable){
        $token = base64_decode($token);
        $this->session->sess_destroy(); 
        $checkuser = $this->commonmodel->getsingleData($usertable,array('resetpassword_token'=>$token),'id,email');
        // print_r($checkuser); exit();
        if(isset($checkuser['id']) && $checkuser['id']!=''){
            // echo 'myaccount'; exit();
            $this->data['users_detail'] = $checkuser;
            $this->data['users_table'] = $usertable;
            $this->template->set_layout('frontlayout');
            $this->template->title('Welcome to Memorisation');
            
            // $this->template->set_partial('homenavbar', 'partials/frontnavbar');
            $this->template->build('reset_password', $this->data);
        }else{
            $this->session->set_flashdata('error',lang('administrator_error_msg'));
            redirect('/');
        }
    }

    function resetpassword_post(){
        if(isset($_POST['submit'])){
            $password = password_hash($_POST['password'],  PASSWORD_BCRYPT) ;
            $resp = $this->commonmodel->updateAllData($_POST['users_table'],array('email'=>$_POST['email']),array('password'=>$password,'resetpassword_token'=>null));
            // echo '<pre>';print_r($_POST); exit();
            $this->session->set_flashdata('success_resetpassword',lang('change_password_success'));
            redirect('/');
        }else{
            $this->session->set_flashdata('error',lang('administrator_error_msg'));
            redirect('/');
        }
    }


    function emailverification($token){
        $token = base64_decode($token);
        $checkuser = $this->commonmodel->getsingleData('users',array('email_token'=>$token),'id,email,email_verify,email_varification_date');
        // print_r($checkuser); exit();
        if(isset($checkuser['id']) && $checkuser['id']!=''){
            
            if($checkuser['email_verify']==1 && $checkuser['email_varification_date']!=''){
                $this->session->set_flashdata('verifysuccessModal',true);
                $this->session->set_flashdata('success',lang('verify_email_error_mesg'));
                redirect('/');
            }else{
                $resp = $this->commonmodel->updateAllData('users',array('id'=>$checkuser['id']),array('user_status'=>1,'email_verify'=>1,'email_varification_date'=>date('Y-m-d H:i:s')));
                // print_r($resp); exit();
                if($resp){
                    //$result = $this->commonmodel->user_byemaillogin($checkuser['email']);
                    // print_r($result);exit();
                    if(1){
                        // $msgarr['password'] = $otp;
                        $templatename = 'createprofile';
                        $subject = lang('emailverification_success');
                        $tomail = $checkuser['email'];//'ashishnuance@gmail.com';

                        $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'createprofile'])->get('email_template')->row();
                            
                        $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('emailverification_success');
                        $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';
                        $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                        // print_r($temp_resp);exit();
                        $this->session->set_flashdata('verifysuccessModal',true);
                        $this->session->set_flashdata('success',lang('verify_email_success_mesg'));
                        redirect('/');
                    }else{

                        $this->session->set_flashdata('error',lang('administrator_error_msg'));
                        redirect('/');
                    }
                }
            }
            // exit('asd');
            $this->session->set_flashdata('error',lang('administrator_error_msg'));
            redirect('/');
        }else{
            $this->session->set_flashdata('error',lang('administrator_error_msg'));
            redirect('/');
        }
    }

    function emailaddress_verification(){
        $confirm_code = $this->input->post('confirm_code');
        $user_id = $this->input->post('user_id');
        if($this->db->where(array('id'=>$user_id))->num_rows()>0){
            if($this->db->where(array('confirm_code'=>$confirm_code))->num_rows()>0){
                $resp = $this->commonmodel->updateAllData('users',array('id'=>$user_id,'confirm_code'=>$confirm_code), array("user_status"=>1,'email_verify'=>1,'email_varification_date'=>date('Y-m-d H:i:s')));
                if($resp){
                    $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                    $msgarr['userName'] = $checkuser['firstname'].' '.$checkuser['lastname'];
                    $msgarr['url'] = site_url('');
                    $templatename = 'account_verified';
                    $subject = lang('account_verified');
                    $tomail = $_POST['email'];

                    echo json_encode(array('status'=>true,'message'=>lang('emailverification_msg')));
                }else{
                    echo json_encode(array('status'=>false,'message'=>lang('registersuccess_msg')));
                }
            }else{
                echo json_encode(array('status'=>false,'message'=>lang('code_not_valid')));
            }
        }else{
            echo json_encode(array('status'=>false,'message'=>lang('registersuccess_msg')));
        }
        
    }

    function useraccount(){

    }

    function forgotpassword(){
        
        // print_r($_POST); exit();
        $otp = rand(100000,999999);
        if(isset($_POST['user_table']) && $_POST['user_table']!=''){


            $user_table = $_POST['user_table'];

            $checkuser = $this->commonmodel->getsingleData($user_table,array('email'=>$_POST['email'],'user_role'=>2,'email_verify'=>1),'id,firstname,lastname,email');
            if(isset($checkuser['id']) && $checkuser['id']!=''){
                //$newpassword = password_hash($otp,  PASSWORD_BCRYPT) ;
                $this->commonmodel->updateAllData($user_table,array('email'=>$_POST['email']),array('resetpassword_token'=>$otp));
                $msgarr['userName'] = $checkuser['firstname'].' '.$checkuser['lastname'];
                $msgarr['token'] = base64_encode($otp);
                $msgarr['userTable'] = $user_table;
                $templatename = 'forgotpassword';
                $subject = lang('forgotpassword');
                $tomail = $_POST['email'];//'ashishnuance@gmail.com';

                $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'forgotpassword'])->get('email_template')->row();
                    
                $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('forgotpassword');
                $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';
                $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                if($this->session->flashdata('email_sent')=='mailsend'){
                    // $this->session->set_flashdata('success',lang('forgotpaswordsuccessmailsend'));
                    echo json_encode(array('status'=>true,'message'=>lang('forgotpaswordsuccessmailsend')));
                    
                }else{
                    echo json_encode(array('statuss'=>false,'message'=>lang('errormailsend')));
                // $this->session->set_flashdata('error',lang('errormailsend'));
                
                }
            }else{
                echo json_encode(array('status'=>false,'message'=>lang('emailnotmatch')));
                // $this->session->set_flashdata('error',lang('emailnotmatch'));
                // redirect('admin/forgotpassword');
            }
        }else{
            echo json_encode(array('status'=>false,'message'=>lang('select_user_type')));
            // $this->session->set_flashdata('error',lang('emailnotmatch'));
            // redirect('admin/forgotpassword');
        }
        
        
    }

    function logout(){
        $this->session->sess_destroy(); 
        // $this->load->view('login');
        // $br = $this->config->base_url();;
        // $this->load->helper($br);
        redirect(base_url(), 'refresh');
    }

    /*========= Search result for User search profile ======*/
    
    function search_result()
    {
              
        $search_val = $this->input->post('search_val');
        //SELECT * FROM `user_profile` WHERE `status` = 1 AND (CONCAT(first_name, ' ',last_name) like '%Sourabh Bhandari%')

        $query = $this->db->select('*')
        ->from('user_profile')
        ->where('status', 1)
        ->where("(CONCAT(first_name, ' ',last_name) LIKE '%".$search_val."%' )", NULL, FALSE)
        ->where('is_public',1)
        ->get();
      //  echo $this->db->last_query(); 
        $this->data["result_profile"] = $query->result();

        $this->template->set_layout("frontlayout");
        $this->template->build("search_result", $this->data);
        
    }

    function subscription_delete($row_id='')
    {
        // echo $row_id; exit();
        if ($row_id != "") {
            $row_id = base64_decode($row_id);
            $this->commonmodel->deleteData("user_subscribe", "id", $row_id);
            // redirect()
        }
        $this->session->set_flashdata('success_unsubscribe','You have successfully unsubscribed. Thank you.');
        redirect("/");
    }

    function linkprofile_qrcode()
    {
        // exit('asdas');
        if(isset($_GET['profile']) && $_GET['profile']!=''){
            $profilelink_result = $this->commonmodel->getsingleData('profile_link_qrcode',['woocom_user_id'=>$_GET['profile']],'*');
            if(isset($profilelink_result) && count($profilelink_result)>0)
            {
                // redirect
                $profilelink_result['profile_id'];
                $profile_result = get_userprofile($profilelink_result['profile_id']);
                redirect('?profile='.$profile_result->profile_url);
            }
            if(checkauth()){
            $user_id = $this->session->userdata("frontuserdetail")["user_id"];
            $this->data["profilelist"] = $this->commonmodel->getAllData(
                "user_profile",
                "user_id",
                $user_id
            );
            }
            $this->template->set_layout("frontlayout");
            $this->template->title("Welcome to Memorisation");

            $this->template->set_partial("homenavbar", "partials/frontnavbar");
            $this->template->build("linkqrcode-profile", $this->data);
        }
    }

    function update_group(){
        
        if(isset($_POST['submit'])){
            if(isset($_POST['group_id']) && $_POST['group_id']!='' && isset($_POST['group_name']) && $_POST['group_name']!=''){
                $this->commonmodel->updateAllData('family_group',['id'=>$_POST['group_id']],['group_name'=>$_POST['group_name']]);
            }
            
                redirect('/familygroup');
            // print_r($_POST); exit();
        }
    }

    function subscribe_user_postdata(){
        $user_subscribe_result = $this->commonmodel->getcustomdata('user_subscribe');
        // echo '<pre>';print_r($user_subscribe_result);
        $maxDays=date('t');
        $last_maildate = ($maxDays-22);
        $monthday_mailshot_date = [8,15,22,$maxDays];
        
        foreach($user_subscribe_result as $subscribe_val){

            $subscribe_val->profile_id;
            $lastdayold = date('Y-m-d',strtotime('-1 days'));
            $lastdayold_start = $lastdayold.' 00:00:00';
            $lastdayold_end= $lastdayold.' 23:59:59';
            $table_name_arr = ['journal_post','life_of','media_images','memories','respect_post','timeline'];
            //SELECT * FROM `memories` where profile_id = 1 and (created_at BETWEEN '2022-07-06' and '2022-07-12' OR updated_at BETWEEN '2022-07-06' and '2022-07-12')
            $weekly_user = $daily_user = [];
            if($subscribe_val->subscription_type==2){
                // print_r($subscribe_val); exit();
                $sql_result = [];
                $weekly_user[] = $subscribe_val;
                // exit('asasdd');
                for($w=0;$w<count($monthday_mailshot_date);$w++){
                    if($monthday_mailshot_date[$w]==date('j')){
                        $date = date('Y-m-').$monthday_mailshot_date[$w];
                        $days_diff = ((count($monthday_mailshot_date)-1)==$w) ? $last_maildate : 7;
                        $weekstartdate = date('Y-m-d',strtotime($date.'-'.$days_diff.' days'));
                        $weekenddate = date('Y-m-d',strtotime($date.'-1 days'));
                        $weekstartdate = $weekstartdate.' 00:00:00';
                        $weekenddate = $weekenddate.' 23:59:59';
                        // exit();
                        // echo '----'.date('Y-m-d',strtotime($date));
                        // print_r($monthday_mailshot_date);
                        // echo '<br>';
                        for($tb=0;$tb<count($table_name_arr);$tb++){
                            //echo "SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$weekstartdate' and '$weekenddate' OR updated_at BETWEEN '$weekstartdate' and '$weekenddate')"; 
                            //echo '<br>';
                            // echo '<br>';
                            if(isset($weekenddate) && isset($weekstartdate)){
                                $ispubliclifeof = ($table_name_arr[$tb]=='life_of') ? ' and is_public=1' : '';
                                $ispublicmedia = ($table_name_arr[$tb]=='media_images') ? ' and media_ispublic=1' : '';
                                $ispublicjournal = ($table_name_arr[$tb]=='journal_post') ? ' and is_public=1' : '';
                                $sql_result_resp[$table_name_arr[$tb]] = $this->db->query("SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$weekstartdate' and '$weekenddate' OR updated_at BETWEEN '$weekstartdate' and '$weekenddate') and `status` = 1 and trash=0 ".$ispubliclifeof.$ispublicmedia.$ispublicjournal);
                                // echo 
                                if($sql_result_resp[$table_name_arr[$tb]]->num_rows()>0){
                                    $sql_result[$table_name_arr[$tb]] = $sql_result_resp[$table_name_arr[$tb]]->result();
                                }
                            }
                        }
                        $sql_result['feature_post'] = $this->featurepost_for_subscriber($subscribe_val->profile_id,$lastdayold_start,$lastdayold_end);
                    }
                    // echo $currentDayOfMonth=date('j');
                }
                // print_r($sql_result);
                // if(!empty($sql_result)){
                if(!empty($sql_result['journal_post']) || !empty($sql_result['life_of']) || !empty($sql_result['media_images']) || !empty($sql_result['memories']) || !empty($sql_result['respect_post']) || !empty($sql_result['timeline']) || !empty($sql_result['feature_post'])){
                    $templatename = "update_post_subscriber";
                    $subject = lang("update_post_subscriber");
                    $tomail = $subscribe_val->email;
                    // $username = $subscribe_val->name;
                    // exit();
                    
                    $msgarr["userName"] = $subscribe_val->name;
                    $msgarr["post_result"] = $sql_result;
                    // echo '<pre>';print_r($msgarr); exit('weekly');
                    $resp = $this->sendmailcommon(
                        $tomail,
                        $subject,
                        $templatename,
                        $msgarr
                    );
                }
            }
            /* COMMENT  */
            if($subscribe_val->subscription_type==1){
                // echo $subscribe_val->subscription_type;
                $sql_result = [];
                // $daily_user[] = $subscribe_val;
                for($tb=0;$tb<count($table_name_arr);$tb++){
                    // echo "SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$lastdayold_start' and '$lastdayold_end' OR updated_at BETWEEN '$lastdayold_start' and '$lastdayold_end') and status = 1"; 
                    // echo '<br>';
                    $ispubliclifeof = ($table_name_arr[$tb]=='life_of') ? ' and is_public=1' : '';
                    $ispublicmedia = ($table_name_arr[$tb]=='media_images') ? ' and media_ispublic=1' : '';
                    $ispublicjournal = ($table_name_arr[$tb]=='journal_post') ? ' and is_public=1' : '';
                    $sql_result[$table_name_arr[$tb]] = $this->db->query("SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$lastdayold_start' and '$lastdayold_end' OR updated_at BETWEEN '$lastdayold_start' and '$lastdayold_end') and `status` = 1 and trash=0".$ispubliclifeof.$ispublicmedia.$ispublicjournal)->result();
                    // if($subscribe_val->profile_id==1){
                        // echo $this->db->last_query(); exit();
                    // }
                }
                $sql_result['feature_post'] = $this->featurepost_for_subscriber($subscribe_val->profile_id,$lastdayold_start,$lastdayold_end);
                // echo '<pre>';print_r($sql_result['feature_post']); echo '</pre>'; exit();
                if(!empty($sql_result['journal_post']) || !empty($sql_result['life_of']) || !empty($sql_result['media_images']) || !empty($sql_result['memories']) || !empty($sql_result['respect_post']) || !empty($sql_result['timeline']) || !empty($sql_result['feature_post'])){
                    $templatename = "update_post_subscriber";
                    $subject = lang("update_post_subscriber");
                    $tomail = $subscribe_val->email;
                    // $username = $subscribe_val->name;
                    // exit();
                    
                    $msgarr["userName"] = $subscribe_val->name;
                    $msgarr["subscriber_id"] = $subscribe_val->id;
                    $userName = $subscribe_val->name;
                    $msgarr["post_result"] = $sql_result;
                    
                    // echo '<pre>';print_r($sql_result); exit();
                   // echo  $tomail;exit('daily');
                    $resp = $this->sendmailcommon(
                        $tomail,
                        $subject,
                        $templatename,
                        $msgarr
                    );
                    // echo '<pre>';print_r($sql_result); exit();
                    //$this->load->view('emails/update_post_subscriber',['post_result'=>$sql_result,'userName'=>$subscribe_val->name,'subscriber_id'=>$subscribe_val->id]);
                }
            }
            /**/
            
            
        }
        // echo 'mail send succfully';
        // redirect('/');
    }


    function warden_notification(){
        $user_subscribe_result = $this->commonmodel->getcustomdata('user_subscribe');
        // echo '<pre>';//print_r($user_subscribe_result); 
        // $maxDays=date('t');
        // $last_maildate = ($maxDays-22);
        // $monthday_mailshot_date = [8,15,22,$maxDays];
        
        $table_name_arr = ['journal_post','life_of','media_images','memories','respect_post','timeline'];
        foreach($table_name_arr as $k => $tbname){
            // echo $tbname;
            if($tbname=='life_of'){
                $select = $tbname.'.type as title,'.$tbname.'.images as image';
            }elseif($tbname=='memories'){
                $select = $tbname.'.title as title,'.$tbname.'.memoryimage as image';
            }elseif($tbname=='media_images'){
                $select = $tbname.'.title as title,'.$tbname.'.image as image';
            }elseif($tbname=='respect_post'){
                $select = $tbname.'.name as title,'.$tbname.'.respect_image as image';
            }elseif($tbname=='timeline'){
                $select = $tbname.'.title as title,'.$tbname.'.timeline_image as image';
            }else{
                $select = $tbname.'.title as title,'.$tbname.'.image';
            }
            $result[$tbname] = $this->db->query("SELECT $select,user_profile.profile_url,group_concat($tbname.id) postid,$tbname.profile_id,$tbname.status,c.id,c.warden_user,c.firstname as userName,c.email,(select GROUP_CONCAT(email) from users a where a.admin_user_id=c.id) as wardden_email FROM $tbname join users c on $tbname.user_id=c.id join user_profile on $tbname.profile_id = user_profile.id where $tbname.status = 0 group by c.id")->result_array();
        }
        
        foreach($result as $k => $postdata){
            // echo $k;
                if($k=='life_of'){
                    $select = $k.'.type as title,'.$k.'.images as image';
                }elseif($k=='memories'){
                    $select = $k.'.title as title,'.$k.'.memoryimage as image';
                }elseif($k=='media_images'){
                    $select = $k.'.title as title,'.$k.'.image as image';
                }elseif($k=='respect_post'){
                    $select = $k.'.name as title,'.$k.'.respect_image as image';
                }elseif($k=='timeline'){
                    $select = $k.'.title as title,'.$k.'.timeline_image as image';
                }else{
                    $select = $k.'.title as title,'.$k.'.image';
                }
            foreach($postdata as $key => $dataval){

                // $dataval_resp[$k][] = $dataval;
                $dataval_resp[$k] = $this->db->select($select.',profile_id,'.$k.'.created_at,'.$k.'.updated_at,'.$k.'.id,c.firstname as userName')->join('users c',$k.'.user_id=c.id')->where_in($k.'.id',explode(',',$dataval['postid']))->get($k)->result_array();

                $dataval_resp[$k]['usermail'] = $dataval['email'].','.$dataval['wardden_email'];
                // echo '<pre>';print_r($dataval_resp); exit();

                $templatename = "warden_notification";
                $subject = lang("update_post_subscriber");
                $tomail = 'warden1@mailinator.com';
                // $username = $subscribe_val->name;
                // exit();
                
                $msgarr["userName"] = $dataval['userName'];

                $msgarr["post_result"] = $dataval_resp;
                
                // echo '<pre>';print_r($sql_result); exit();
                // echo  $tomail;exit;
                $resp = $this->sendmailcommon(
                    $tomail,
                    $subject,
                    $templatename,
                    $msgarr
                );

                $this->load->view('emails/warden_notification',['post_result'=>$dataval_resp]);
            }
        }
        exit();
        // print_r($result);
        exit();

        foreach($user_subscribe_result as $subscribe_val){

            $subscribe_val->profile_id;
            $lastdayold = date('Y-m-d',strtotime('-1 days'));
            $lastdayold_start = $lastdayold.' 00:00:00';
            $lastdayold_end= $lastdayold.' 23:59:59';
            $weekly_user = $daily_user = [];
            
            if($subscribe_val->subscription_type==1){
                // echo $subscribe_val->subscription_type;
                $sql_result = [];
                // $daily_user[] = $subscribe_val;
                for($tb=0;$tb<count($table_name_arr);$tb++){
                    
                    $ispubliclifeof = ($table_name_arr[$tb]=='life_of') ? ' and is_public=1' : '';
                    $ispublicmedia = ($table_name_arr[$tb]=='media_images') ? ' and media_ispublic=1' : '';
                    $ispublicjournal = ($table_name_arr[$tb]=='journal_post') ? ' and is_public=1' : '';
                    $sql_result[$table_name_arr[$tb]] = $this->db->query("SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$lastdayold_start' and '$lastdayold_end' OR updated_at BETWEEN '$lastdayold_start' and '$lastdayold_end') and `status` = 1 and trash=0".$ispubliclifeof.$ispublicmedia.$ispublicjournal)->result();
                }
                $sql_result['feature_post'] = $this->featurepost_for_subscriber($subscribe_val->profile_id,$lastdayold_start,$lastdayold_end);
                // echo '<pre>';print_r($sql_result); echo '</pre>';
                if(!empty($sql_result['journal_post']) || !empty($sql_result['life_of']) || !empty($sql_result['media_images']) || !empty($sql_result['memories']) || !empty($sql_result['respect_post']) || !empty($sql_result['timeline']) || !empty($sql_result['feature_post'])){
                    $templatename = "update_post_subscriber";
                    $subject = lang("update_post_subscriber");
                    $tomail = $subscribe_val->email;
                    // $username = $subscribe_val->name;
                    // exit();
                    
                    $msgarr["userName"] = $subscribe_val->name;
                    $msgarr["subscriber_id"] = $subscribe_val->id;
                    $userName = $subscribe_val->name;
                    $msgarr["post_result"] = $sql_result;
                    
                    // echo '<pre>';print_r($sql_result); exit();
                   // echo  $tomail;exit;
                    $resp = $this->sendmailcommon(
                        $tomail,
                        $subject,
                        $templatename,
                        $msgarr
                    );
                    // echo '<pre>';print_r($sql_result); exit();
                    $this->load->view('emails/update_post_subscriber',['post_result'=>$sql_result,'userName'=>$subscribe_val->name,'subscriber_id'=>$subscribe_val->id]);
                }
            }
            /**/
            
            
        }
    }

    function featurepost_for_subscriber($profile_id,$startdate,$enddate){
        if($profile_id!='' && $startdate!='' && $enddate!=''){
            // for($tb=0;$tb<count($table_name_arr);$tb++){
                    // echo "SELECT * FROM ".$table_name_arr[$tb]." where profile_id = ".$subscribe_val->profile_id." and (created_at BETWEEN '$lastdayold_start' and '$lastdayold_end' OR updated_at BETWEEN '$lastdayold_start' and '$lastdayold_end') and status = 1"; 
                    // echo '<br>';
                    $memories = $this->db->query("SELECT memories.status,memories.user_id,memories.id,memories.name,memories.memoryimage as image,memories.comment,memories.created_at as post_date,created_at,'memories' AS tablename,memories.updated_at FROM memories where profile_id = ".$profile_id." and (created_at BETWEEN '$startdate' and '$enddate' OR updated_at BETWEEN '$startdate' and '$enddate') and `status` = 1 and trash=0")->result_array();
                    $timeline = $this->db->query("SELECT timeline.status,timeline.user_id,timeline.id,timeline.title as name,timeline.timeline_image as image,timeline.description as comment,timeline.created_at as post_date,created_at,'timeline' AS tablename,timeline.updated_at FROM timeline where profile_id = ".$profile_id." and (created_at BETWEEN '$startdate' and '$enddate' OR updated_at BETWEEN '$startdate' and '$enddate') and `status` = 1 and trash=0")->result_array();
                    $respect_post = $this->db->query("SELECT respect_post.status,respect_post.user_id,respect_post.id,respect_post.name as name,respect_image as image,respect_post.comment as comment,respect_post.created_at as post_date,created_at,'respect_post' AS tablename,respect_post.updated_at FROM respect_post where profile_id = ".$profile_id." and (created_at BETWEEN '$startdate' and '$enddate' OR updated_at BETWEEN '$startdate' and '$enddate') and `status` = 1 and trash=0")->result_array();
                    $journal_post = $this->db->query("SELECT journal_post.status,journal_post.user_id,journal_post.id,journal_post.title as name,journal_post.image as image,journal_post.description as comment,journal_post.created_at as post_date,created_at,'journal_post' AS tablename,journal_post.updated_at FROM journal_post where profile_id = ".$profile_id." and (created_at BETWEEN '$startdate' and '$enddate' OR updated_at BETWEEN '$startdate' and '$enddate') and `status` = 1 and trash=0")->result_array();
                
                $feature_post = array_merge($memories,$timeline,$respect_post,$journal_post);
                // echo '<pre>';print_r($memories); exit();
                $price = array();
                foreach ($feature_post as $key => $row)
                {
                    $price[$key] = $row['updated_at'];
                }
                array_multisort($price, SORT_DESC, $feature_post);  
                // }
            return $feature_post;
        }else{
            return false;
        }
    }


    function profile_familygroup($uid)
    {
    
        $this->db->where('id', $uid);
        $q = $this->db->get('user_profile');
        $get_user_id = $q->result_array();
        $uid = "";
        
        if(!empty($get_user_id))
        {
            $adminid = $get_user_id[0]['user_id']; 
        }
        //echo "<pre>";print_r($adminid);exit;
        $this->data["profilelist"] = $this->commonmodel->getAllData(
            "user_profile",
            "user_id",
            $adminid
        );
        

         //echo "<pre>";print_r($this->data["profilelist"]); exit();
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        //echo "<pre>";print_r($this->data)
        $this->template->build("profile_family_group", $this->data);
    }

    function wordpress_link_expired()
    {
        // echo 'myaccount'; exit();
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");
        $this->data['pagemessage'] = (isset($_GET['p']) && $_GET['p']!='') ? $_GET['p'] : 'This link has expired.';
        // $this->template->set_partial('homenavbar', 'partials/frontnavbar');
        $this->template->build("expired_link", $this->data);
    }

    
    function woouser(){
        $orderid = (isset($_GET['order_id']) && $_GET['order_id']!='') ? $_GET['order_id']  :'';
        if(checkauth()){
            $path = '/wp-register-user?order_id='.$orderid;
            $this->session->sess_destroy();
            redirect($path);
        }
        // woo_users
        // phpinfo();

        $otherdb = $this->load->database('otherdb', TRUE);
        $orderid = (isset($_GET['order_id']) && $_GET['order_id']!='') ? $_GET['order_id']  :''; 
        $woo_userdetail_sql = $otherdb->select('*')->where('order_id',$orderid)->get('order_details');
        $woo_userdetail = $woo_userdetail_sql->row();
        // print_r($woo_userdetail); exit();
        if($woo_userdetail_sql->num_rows()==0){
            redirect('/');
        }
        
        $customer_id = $woo_userdetail->customer_id;
        $profile_account_name = $woo_userdetail->profile_account_name;
        $userplan_type = ($woo_userdetail->order_subscription==1) ? 3  :2;
        // print_r($woo_userdetail); //exit();
        $this->db->where('order_id',$orderid)->get('woo_users')->num_rows();
        
        $msg = '';
        $userdata = $otherdb->select('user_email')->where('ID',$customer_id)->get('hnm_users')->row();
        // echo $this->db->select('count(id) as ids')->where('family_group_id',24)->get('user_profile')->row()->ids;
        // echo $this->db->last_query();
        $this->db->where('order_id',$orderid)->get('woo_users')->num_rows();
        // echo $profilepostdata["admin_profile"] = ($this->db->where('family_group_id',24)->get('user_profile')->num_rows()==0) ? 1 : 0; exit();
        if($this->db->where('order_id',$orderid)->get('woo_users')->num_rows()==0){
            // insert in table of wordpress user data
            
            $usermetadata = $otherdb->select('*')->where('user_id',$customer_id)->where_in('meta_key',['first_name','last_name','billing_address_1','billing_city','billing_postcode','billing_phone'])->get('hnm_usermeta')->result();
// echo $otherdb->last_query();
                // echo '<pre>';print_r($usermetadata); 
            if(isset($userdata) && isset($usermetadata)){
                // print_r($usermetadata);
                $registerdata['order_id'] = $orderid;
                $registerdata['customer_id'] = $customer_id;
                $registerdata['email'] = $userdata->user_email;//.rand(10,99);
                $registerdata['group_name'] = $profile_account_name;
                $registerdata['contactnumber'] = $registerdata['address_1'] = $registerdata['city'] = $registerdata['postcode'] = null;
                foreach($usermetadata as $metavalue){
                    if($metavalue->meta_key=='first_name'){
                        $registerdata['firstname'] = $metavalue->meta_value;
                    }
                    if($metavalue->meta_key=='last_name'){
                        $registerdata['lastname'] = $metavalue->meta_value;
                    }
                    if($metavalue->meta_key=='billing_address_1'){
                        $registerdata['address_1'] = $metavalue->meta_value;
                    }
                    if($metavalue->meta_key=='billing_city'){
                        $registerdata['city'] = $metavalue->meta_value;
                    }
                    if($metavalue->meta_key=='billing_postcode'){
                        $registerdata['postcode'] = $metavalue->meta_value;
                    }
                    if($metavalue->meta_key=='billing_phone'){
                        $registerdata['contactnumber'] = $metavalue->meta_value;
                    }
                }

                $registerdata['userplan_type'] = $userplan_type;
                $resp = $this->commonmodel->getsingleData('users',array('email'=>$registerdata['email'],'user_role'=>2));
                // print_r($registerdata);exit();
                // print_r($resp); exit('empty'); 


                    
                if(empty($resp)){

                    $this->session->set_flashdata('signuppopup',$registerdata);
                    // print_r($this->session->flashdata('signuppopup')); exit();
                    return redirect('/');
                    // exit('if');
                    $password = '123456';
                    $registerdata['password'] = password_hash($password,  PASSWORD_BCRYPT) ;
                    // print_r($postdata); exit();
                    $emilcode = rand(100000,999999);
                    $registerdata['confirm_code'] = $emilcode;
                    $registerdata['user_status'] = 1;
                    $registerdata['email_verify'] = 1;
                    $registerdata['email_token'] = $emilcode;
                    $registerdata['email_varification_date'] = date('Y-m-d H:i:s');
                    

                    
                    // print_r($postdata); exit();
                    $user_id = $this->commonmodel->insertData('users',$registerdata);
                    // echo $user_id; exit('user_id');
                    $this->db->where('order_id',$orderid)->update('woo_users',['user_id'=>$user_id]);

                    $userdetail = $this->commonmodel->getsingleData('users', array('id'=>$user_id),'id,firstname,confirm_code');
                    
                    $msgarr['userName'] = $registerdata['firstname'].' '.$registerdata['lastname'];
                    $msgarr['password'] = $password;
                    $msgarr['email'] = $registerdata['email'];
                    $msgarr['token'] = base64_encode($emilcode);
                    $templatename = 'emailverification';
                    $subject = lang('emailverificationsubject');
                    $tomail = $registerdata['email'];
                    
                    $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'emailverification'])->get('email_template')->row();
                        
                    $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('emailverification_msg');
                    $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';

                    // print_r($msgarr);
                    //$this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                        //echo 'register';
                    // }
                    // $msg = 'Register successfully';

                    /********* user profile create by code start ***********
                    
                    $profilepostdata["user_id"] = $user_id;
                    $profilepostdata["dob"] = date('Y-m-d');
                    $profilepostdata["first_name"] = $registerdata['firstname'];
                    $profilepostdata["last_name"] = $registerdata['lastname'];
                    // $profilepostdata = $this->input->post();
                    $profilepostdata["dob"] = date("Y-m-d", strtotime($profilepostdata["dob"]));
                    $path = "uploads";
                    $profilepostdata["profile_name"] = ($woo_userdetail->profile_account_name!='') ? $woo_userdetail->profile_account_name : str_replace(' ','',$profilepostdata["first_name"].$profilepostdata["last_name"]).rand(10,99);
                    $profilepostdata["profile_url"] = $profilepostdata["profile_name"];

                     //$this->commonmodel->getprofilename('user_profile','profile_name',$profilepostdata['profile_name']);
                    // unset($profilepostdata["profile_id"]);
                    **/
                    // $group_id = $this->commonmodel->insertData(
                    //     "family_group",
                    //     array('user_id'=>$user_id,
                    //         'group_name'=>$registerdata['firstname'].$registerdata['lastname'],
                    //         'group_account_name'=>$profile_account_name,
                    //         'first_name'=>$registerdata['firstname'],
                    //         'last_name'=>$registerdata['lastname'],
                    //         'userplan_type'=>$userplan_type)
                    // );
                    // $profilepostdata['family_group_id'] = $group_id;
                    
                    // $profile_id = $this->commonmodel->insertData(
                    //     "user_profile",
                    //     $profilepostdata
                    // );

                    // $admin_profile = ($this->db->where('family_group_id',$group_id)->get('user_profile')->num_rows()==0) ? 1 : 0;
                    // $this->commonmodel->updateAllData('user_profile',['family_group_id'=>$group_id],['admin_profile'=>$admin_profile]);
                    /********* user profile create by code end ***********/
                    // $result = $this->commonmodel->user_byemaillogin($registerdata['email']);
                    // return redirect('familygroup');

                }else{
                    // exit('else');
                    $this->db->insert('woo_users',['customer_id'=>$customer_id,'order_id'=>$orderid]);
                    // exit('else');
                    unset($registerdata['order_id']);
                    unset($registerdata['customer_id']);
                    unset($registerdata['group_name']);
                    $this->commonmodel->updateAllData('users',array('email'=>$registerdata['email'],'user_role'=>2),$registerdata);
                    $user_id = $this->db->select('id')->where(array('email'=>$registerdata['email'],'user_role'=>2))->get('users')->row()->id;
                    // print_r($registerdata); exit('already');
                    $this->db->where('order_id',$orderid)->update('woo_users',['user_id'=>$user_id]);
                    $msg = 'Updated successfully';
                    //echo false;
                    /********* user profile create by code start ***********
                    
                    $profilepostdata["user_id"] = $user_id;
                    $profilepostdata["dob"] = date('Y-m-d');
                    $profilepostdata["first_name"] = $registerdata['firstname'];
                    $profilepostdata["last_name"] = $registerdata['lastname'];
                    // $profilepostdata = $this->input->post();
                    $profilepostdata["dob"] = date("Y-m-d", strtotime($profilepostdata["dob"]));
                    $path = "uploads";
                    $profilepostdata["profile_name"] = ($woo_userdetail->profile_account_name!='') ? $woo_userdetail->profile_account_name : str_replace(' ','',$profilepostdata["first_name"].$profilepostdata["last_name"]).rand(10,99);
                    $profilepostdata["profile_url"] = $profilepostdata["profile_name"];
                    **/
                     //$this->commonmodel->getprofilename('user_profile','profile_name',$profilepostdata['profile_name']);
                    // unset($profilepostdata["profile_id"]);

                    $group_id = $this->commonmodel->insertData(
                        "family_group",
                        array('user_id'=>$user_id,
                            'group_name'=>$registerdata['firstname'].$registerdata['lastname'],
                            'group_account_name'=>$profile_account_name,
                            'first_name'=>$registerdata['firstname'],
                            'last_name'=>$registerdata['lastname'],
                            'userplan_type'=>$userplan_type)
                    );
                    $profilepostdata['family_group_id'] = $group_id;
                    
                    // $profile_id = $this->commonmodel->insertData(
                    //     "user_profile",
                    //     $profilepostdata
                    // );
                    // $admin_profile = ($this->db->where('family_group_id',$group_id)->get('user_profile')->num_rows()==0) ? 1 : 0;
                    // $this->commonmodel->updateAllData('user_profile',['family_group_id'=>$group_id],['admin_profile'=>$admin_profile]);
                    /********* user profile create by code end ***********/

                    //$result = $this->commonmodel->user_byemaillogin($registerdata['email']);
                    // echo lang('successfully_created_group'); exit();
                    $this->session->set_flashdata('loginpopup',true);
                    $this->session->set_flashdata('groupsuccess',lang('successfully_created_group'));
                    // echo $this->session->flashdata('groupsuccess'); exit();
                    return redirect('/');
                }
            }
        }else{

            redirect('/expired-link');
            
            // $this->db->where('order_id',$orderid)->update('woo_users',['customer_id'=>$customer_id,'order_id'=>$orderid]);
            // $result = $this->commonmodel->user_byemaillogin($userdata->user_email);
            // $msg = 'Already register';
        }
        
        return redirect('/familygroup');
        // return redirect('familygroup');
        // echo '<pre>';print_r($woo_userdetail);
        // exit();
    }
}