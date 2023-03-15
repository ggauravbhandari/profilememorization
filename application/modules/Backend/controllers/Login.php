<?php defined('BASEPATH') or exit('No direct script access allowed');


class Login extends MY_Controller
{
    public $CI;

    protected $data = array();

    
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();

        # Load Library
        $this->load->library('template');

        # Load Helper
        $this->load->helper('url');
        if($this->session->userdata('user_details')){
            redirect('admin');
        }
        

        $this->load->model('commonmodel');
        
    }

    
    public function index()
    {
        // print_r($this->data); exit();
        // $data = array();
        // $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        // $pass = substr('123456', 0, 8);
        // echo '<br>';
        // echo $new_pass = password_hash($pass,  PASSWORD_BCRYPT) ;

        # Set Layout            
        $this->template->set_layout('backendlayout');
        $this->template->title('Welcome to Memorisation');
        // $this->template->set_partial('header', 'partials/v_header');
        $this->template->build('signin', $this->data);
        // $this->load->view('signin');
    }
    function loginuser(){
        if(isset($_POST['submit']) && !empty($_POST)){
            $resp = $this->commonmodel->user_login($_POST['email'],$_POST['password']);
            // print_r($resp);
            if($resp){
                // print_r($this->session->userdata());
                // echo 'succefully login';
                redirect('admin');
            }else{
                $this->session->set_flashdata('error',lang('emailpassword_not_match'));
                redirect('admin/login');
            }
            // echo '<br>';
            // print_r($_POST);exit();
        }
    }

    function forgotpassword(){
        if(isset($_POST['submit']) && !empty($_POST)){
            // print_r($_POST); exit();
            $otp = rand(100000,999999);
            $checkuser = $this->commonmodel->getsingleData('users',array('email'=>$_POST['email'],'user_role'=>1),'id,firstname,lastname');
            if(isset($checkuser['id']) && $checkuser['id']!=''){
                $newpassword = password_hash($otp,  PASSWORD_BCRYPT) ;
                $this->commonmodel->updateAllData('users',array('email'=>$_POST['email']),array('password'=>$newpassword));
                $msgarr['userName'] = $checkuser['firstname'].' '.$checkuser['lastname'];
                $msgarr['password'] = $otp;
                $templatename = 'forgotpassword';
                $tomail = 'ashishnuance@gmail.com';
                $temp_resp = $this->db->select('subject,bodymsg')->where(['name'=>'forgotpassword'])->get('email_template')->row();
                
                $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('forgotpassword');
                $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';
                $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                if($this->session->flashdata('email_sent')=='mailsend'){
                    $this->session->set_flashdata('success',lang('forgotpaswordsuccessmailsend'));
                    redirect('admin/login');
                }else{
                $this->session->set_flashdata('error',lang('errormailsend'));
                
                }
            }else{
                $this->session->set_flashdata('error',lang('emailnotmatch'));
                redirect('admin/forgotpassword');
            }
        }
        $this->template->set_layout('backendlayout');
        $this->template->title('Welcome to Memorisation');
        // $this->template->set_partial('header', 'partials/v_header');
        $this->template->build('forgotpassword', $this->data);
    }

    public function send_mail() {
        $msgarr['userName'] = 'Ashish';
        $templatename = 'forgotpassword';
        $subject = lang('forgotpassword');
        $tomail = 'ashishnuance@gmail.com';
        echo $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
    }
}
