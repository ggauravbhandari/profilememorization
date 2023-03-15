<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* load the MX_Router class */
require APPPATH . "third_party/MX/Controller.php";

/**
 * Description of my_controller
 *
 * @author Administrator
 */
class MY_Controller extends MX_Controller {

    function __construct() {
        parent::__construct();
        $this->lang->load("site", 'english'); 
        $this->data['site_title'] = lang('site_title');
        if (version_compare(CI_VERSION, '2.1.0', '<')) {
            $this->load->library('security');
        }
    }

    function sendmailcommon($tomail,$subject,$template_name,$message){
        $this->load->library('email');
        $config = array();
        try{
            $config['protocol'] = 'mail';
            $config['smtp_host'] = 'mail.memorisation.co.uk';
            $config['smtp_user'] = 'noreply@memorisation.co.uk';
            $config['smtp_pass'] = 'Password9876()';
            $config['_smtp_auth'] = TRUE;
            $config['smtp_port'] = "465";
            $config['mailtype'] = 'html';
            // $config['smtp_encryption'] = "tls";
            $this->email->initialize($config);
            $from_email = "noreply@memorisation.co.uk";
            $to_email = $tomail;
            //Load email library
            // $this->load->library('email');
            $this->email->from($from_email, lang('site_title'));
            $this->email->to($to_email);
            $this->email->subject($subject);
            $body = $this->load->view('emails/'.$template_name,$message,TRUE);
            // echo $body; exit();
            $this->email->message($body);
            //Send mail
            if($this->email->send()){
                
                $this->session->set_flashdata("email_sent","mailsend");
                return 'send';
            }else{
                // $return = $this->email->print_debugger(); 
                
                $this->session->set_flashdata("email_sent","mailerror");
                return $this->email->print_debugger();
            }
        }
        
        //catch exception
        catch(Exception $e) {
            
            // $this->session->set_flashdata("email_sent",'Message: ' .$e->getMessage());
            $this->session->set_flashdata("email_sent",'Message: mail not send');
            return $e->getMessage();
        }
    
        // echo $this->email->print_debugger();
    }

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */