<?php defined('BASEPATH') or exit('No direct script access allowed');


class SubscriberController extends MY_Controller
{
    public $CI;

    protected $data = array();

    
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();

        if(!$this->session->userdata('user_details')){
            if($this->session->userdata('frontuserdetail')){
                redirect('user');
            }else{
                redirect('admin/login');
            }
        }
        # Load Library
        

        # Load Helper
        $this->load->helper('url');

        $this->load->model('commonmodel');
        $this->load->library('form_validation');

        
    }

    function index(){
        $this->data['result'] = $this->commonmodel->getjointbData('user_subscribe',[],'result','user_subscribe.*,user_profile.profile_name',['user_profile','user_subscribe.profile_id=user_profile.id'],['user_subscribe.id','desc']);
        // SELECT user_subscribe.*,user_profile.profile_name FROM `user_subscribe` join user_profile on user_subscribe.profile_id=user_profile.id

        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('subcriber-list', $this->data);
    }

}