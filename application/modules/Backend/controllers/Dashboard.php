<?php defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends MY_Controller
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

    
    public function index()
    {
        $this->data['allusercount'] = $this->commonmodel->getsingleData('users',array('user_role'=>2),'count(*) as count');
        $this->data['basic_usercount'] = $this->commonmodel->getsingleData('users',array('userplan_type'=>2,'user_role'=>2),'count(*) as count');
        $this->data['pro_usercount'] = $this->commonmodel->getsingleData('users',array('userplan_type'=>3,'user_role'=>2),'count(*) as count');
        $this->data['free_usercount'] = $this->commonmodel->getsingleData('users',array('userplan_type'=>1,'user_role'=>2),'count(*) as count');
        $this->data['admin_usercount'] = $this->commonmodel->getsingleData('users',array('userplan_type'=>4),'count(*) as count');
        # Set Layout
        
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('dashboard', $this->data);
        // $this->load->view('signin');
    }

    function register_user(){
        $this->data['userplan_type'] = $this->commonmodel->getcustomdata('user_type',array(),array('id','asc'));
        // if($user_id!=''){
        // $this->data['user_result'] = $this->commonmodel->getcustomdata('users',array('id'=>$user_id),array('id','asc'));
        // }
        if(isset($_POST['submit']) && !empty($_POST)){
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->set_layout('admininnerpagelayout');
                $this->template->title('Welcome to Memorisation');
                $this->template->set_partial('sidebar', 'partials/adminsidebar');
                $this->template->build('user_register', $this->data);
            }else{
                // print_r($_POST); exit();
                $postdata = $this->input->post();
                $pass = $postdata['password'];
                $emilcode = rand(100000,999999);
                $postdata['confirm_code'] = $emilcode;
                $postdata['password'] = password_hash($postdata['password'],  PASSWORD_BCRYPT) ;
                $group_name = isset($postdata['group_name']) ? $postdata['group_name'] : '';
                unset($postdata['group_name']);
                unset($postdata['submit']);
                unset($postdata['conpassword']);
                $user_id = $this->commonmodel->insertData('users',$postdata);

                $group_id = $this->commonmodel->insertData(
                    "family_group",
                    array('user_id'=>$user_id,
                        'group_name'=>$group_name,
                        'first_name'=>$postdata['firstname'],
                        'last_name'=>$postdata['lastname'],
                        'userplan_type'=>isset($postdata['userplan_type']) ? $postdata['userplan_type'] : '2')
                );

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
                try{
                    $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                }//catch exception
                catch(Exception $e) {
                    $this->session->set_flashdata("email_sent",'Message: ' .$e->getMessage());
                } 

                // $profilename_check = $this->db->where(['profile_name'=>$postdata['firstname']])->get('user_profile')->num_rows();
                // $profile_name =($profilename_check==0) ? $postdata['firstname'] : $postdata['firstname'].rand(111,999);
                // $profile_id = $this->commonmodel->insertData('user_profile',['user_id'=>$user_id,'profile_name'=>$profile_name]);
                // print_r($postdata); exit();
                $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                // redirect('admin/user-list');
            }
            
        }
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('user_register', $this->data);
    }

    function edit_user($user_id=''){
        $this->data['userplan_type'] = $this->commonmodel->getcustomdata('user_type',array(),array('id','asc'));
        if($user_id!=''){
        $this->data['user_result'] = $this->commonmodel->getsingleData('users',array('id'=>$user_id));
        // print_r($this->data['user_result']); exit();
        }
        if(isset($_POST['submit']) && !empty($_POST)){
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            if(isset($_POST['password']) && $_POST['password']!=''){
                $this->form_validation->set_rules('password', 'Password', 'required');
            }
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->set_layout('admininnerpagelayout');
                $this->template->title('Welcome to Memorisation');
                $this->template->set_partial('sidebar', 'partials/adminsidebar');
                $this->template->build('user_edit', $this->data);
            }else{
                $postdata = $this->input->post();
                if(isset($postdata['password']) && $postdata['password']!=''){
                $postdata['password'] = password_hash($postdata['password'],  PASSWORD_BCRYPT) ;
                }
                unset($postdata['submit']);
                unset($postdata['user_id']);
                // print_r($postdata); exit();
                $this->commonmodel->updateAllData('users',array('id'=>$user_id), $postdata);
                // print_r($postdata); exit();
                $this->session->set_flashdata('success',lang('updatesuccess_msg'));
                redirect('admin/user-list');
            }
            
        }
        // print_r($this->data);
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('user_edit', $this->data);
    }
    function userstatusupdate($user_id,$status){
        // echo $user_id.$status;
        $this->commonmodel->updateSingleData('users',array('id'=>$user_id),'user_status',$status);
        $this->session->set_flashdata('success',lang('updatesuccess_msg'));
        redirect('admin/user-list');
    }

    function delete_user($user_id=''){
        if($user_id!=''){
            $this->commonmodel->deleteData('users','id',$user_id);
            $this->session->set_flashdata('success',lang('deletesuccess_msg'));
        }else{
            $this->session->set_flashdata('error',lang('try_again'));
        }
        redirect('admin/user-list');
    }

    function user_list(){
        $this->data['result'] = $this->commonmodel->getAllDataArray('users',["user_role" =>2,"warden_user" =>0],'id','desc');
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('userlist', $this->data);
    }

    function user_grouplist($id=''){
        if(isset($_POST['save'])){
            // print_r($_POST); exit();
            $this->db->where('id',$_POST['group_id'])->update('family_group',['userplan_type'=>$_POST['userplan_type']]);
            $this->session->set_flashdata('success','Updated successfully');
        }
        if($id!=''){
            $this->data['userplan_type'] = $this->commonmodel->getcustomdata('user_type',array(),array('id','asc'));
            $this->data['result'] = $this->commonmodel->getAllDataArray('family_group',["user_id" =>$id],'id','desc');
            $this->template->set_layout('admininnerpagelayout');
            $this->template->title('Welcome to Memorisation');
            $this->template->set_partial('sidebar', 'partials/adminsidebar');
            $this->template->build('user-grouplist', $this->data);
        }else{
            redirect('admin/user-list');
        }
    }

    function user_groupprofilelist($gid=''){
        if($gid!=''){
            $this->data['result'] = $this->commonmodel->getAllDataArray('user_profile',["family_group_id" =>$id],'id','desc');
            $this->template->set_layout('admininnerpagelayout');
            $this->template->title('Welcome to Memorisation');
            $this->template->set_partial('sidebar', 'partials/adminsidebar');
            $this->template->build('user-grouplist', $this->data);
        }else{
            redirect('admin/user-list');
        }
    }
    

    function warden_list(){
        $this->data['result'] = $this->commonmodel->getAllDataArray('warden_users',["user_role" =>2,"warden_user" =>1],'id','desc');
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('wardenlist', $this->data);
    }

    /******** feature post start ***********/
    function feature_postlist(){
        $this->data['result'] = $this->adminfeaturepost_customdata();
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('featurepost_list', $this->data);
    }

    function adminfeaturepost_customdata(){
        $memory = $timeline = $respect_post = $journal_post = [];
        if(isset($_GET['status']) && $_GET['status']!='' && $_GET['status']!=3){
            
            $memory = $this->commonmodel->getjointbData('memories',array('memories.status'=>$_GET['status'],'memories.trash'=>0,'memories.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,memories.id,memories.title as name,memories.memoryimage as image,memories.comment,memories.created_at as post_date,"memories" AS tablename,memories.updated_at,memories.status',['user_profile','memories.profile_id=user_profile.id'],["memories.id","DESC"]);
                
            $timeline = $this->commonmodel->getjointbData('timeline',array('timeline.status'=>$_GET['status'],'timeline.trash'=>0,'timeline.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,timeline.id,timeline.title as name,timeline.timeline_image as image,timeline.description as comment,timeline.created_at as post_date,"timeline" AS tablename,timeline.updated_at,timeline.status',['user_profile','timeline.profile_id=user_profile.id'],["timeline.id","DESC"]);

            $respect_post = $this->commonmodel->getjointbData('respect_post',array('respect_post.status'=>$_GET['status'],'respect_post.trash'=>0,'respect_post.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,respect_post.id,respect_post.name,respect_post.respect_image as image,respect_post.comment,respect_post.created_at as post_date,"respect_post" AS tablename,respect_post.updated_at,respect_post.status',['user_profile','respect_post.profile_id=user_profile.id'],["respect_post.id","DESC"]);

            $journal_post = $this->commonmodel->getjointbData('journal_post',array('journal_post.status'=>$_GET['status'],'journal_post.trash'=>0,'journal_post.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,journal_post.id,journal_post.title as name,journal_post.image as image,journal_post.description as comment,journal_post.created_at as post_date,"journal_post" AS tablename,journal_post.updated_at,journal_post.status',['user_profile','journal_post.profile_id=user_profile.id'],["journal_post.id","DESC"]);
        }else{
            $memory = $this->commonmodel->getjointbData('memories',array('memories.trash'=>0,'memories.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,memories.id,memories.title as name,memories.memoryimage as image,memories.comment,memories.created_at as post_date,"memories" AS tablename,memories.updated_at,memories.status',['user_profile','memories.profile_id=user_profile.id'],["memories.id","DESC"]);
            
            $timeline = $this->commonmodel->getjointbData('timeline',array('timeline.trash'=>0,'timeline.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,timeline.id,timeline.title as name,timeline.timeline_image as image,timeline.description as comment,timeline.created_at as post_date,"timeline" AS tablename,timeline.updated_at,timeline.status',['user_profile','timeline.profile_id=user_profile.id'],["timeline.id","DESC"]);

            $respect_post = $this->commonmodel->getjointbData('respect_post',array('respect_post.trash'=>0,'respect_post.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,respect_post.id,respect_post.name,respect_post.respect_image as image,respect_post.comment,respect_post.created_at as post_date,"respect_post" AS tablename,respect_post.updated_at,respect_post.status',['user_profile','respect_post.profile_id=user_profile.id'],["respect_post.id","DESC"]);

            $journal_post = $this->commonmodel->getjointbData('journal_post',array('journal_post.trash'=>0,'journal_post.feature_post'=>1), 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,journal_post.id,journal_post.title as name,journal_post.image as image,journal_post.description as comment,journal_post.created_at as post_date,"journal_post" AS tablename,journal_post.updated_at,journal_post.status',['user_profile','journal_post.profile_id=user_profile.id'],["journal_post.id","DESC"]);
        }

        // echo $this->db->last_query();
        // print_r($timeline);
        // print_r($memory);
        $result = array_merge($memory,$timeline,$respect_post,$journal_post);
        // echo '<pre>';print_r($returndata['feature_post']); exit();
        $price = array();
        foreach ($result as $key => $row)
        {
            $price[$key] = $row['post_date'];
        }
        array_multisort($price, SORT_DESC, $result);
        return $result;
    }

    function feature_poststatusupdate($user_id,$status){
        // echo $user_id.$status;
        $this->commonmodel->updateSingleData('feature_post',array('id'=>$user_id),'post_status',$status);
        $this->session->set_flashdata('success',lang('updatesuccess_msg'));
        redirect('admin/feature-post');
    }
    /******** feature post end ***********/

    /******** lifeof post start ***********/
    function lifeof_postlist(){
        $this->data['result'] = $this->commonmodel->getcustomdata('life_of',array(),'*',array('id','desc'));
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('lifeofpost_list', $this->data);
    }

    function profile_list($gid=''){
        if($gid!=''){
            $this->data['result'] = $this->commonmodel->getcustomdata('user_profile',array('profile_name!='=>'','family_group_id'=>$gid),'*',array('id','desc'));
            $this->template->set_layout('admininnerpagelayout');
            $this->template->title('Welcome to Memorisation');
            $this->template->set_partial('sidebar', 'partials/adminsidebar');
            $this->template->build('profile_list', $this->data);
        }else{
            redirect('admin/user-list');
        }
    }

    function profile_view($id=''){
        if($id!=''){

        $this->data['result'] = $this->commonmodel->getsingleData('user_profile',array('id'=>$id));
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('profile_view', $this->data);
        }
    }

    function profile_delete($id=''){
        if($id!=''){

        $this->data['result'] = $this->commonmodel->deleteData('user_profile','id',$id);
        $this->session->set_flashdata('success',lang('deletesuccess_msg'));
        redirect('admin/profile-list');
        }
    }

    function lifeof_poststatusupdate($user_id,$status){
        // echo $user_id.$status;
        $this->commonmodel->updateSingleData('lifeof_post',array('id'=>$user_id),'post_status',$status);
        $this->session->set_flashdata('success',lang('updatesuccess_msg'));
        redirect('admin/lifeof-post');
    }
    /******** lifeof post end ***********/
    function timeline_postlist(){
        $this->data['result'] = $this->commonmodel->getcustomdata('timeline',array(),'*',array('id','desc'));
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        
        $this->template->build('timelinepost_list', $this->data);
    }
    /************* timeline end ******************/
    /******** memories post start ***********/
    function memories_postlist(){
        $this->data['result'] = $this->commonmodel->getcustomdata('memories',array(),'*',array('id','desc'));
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data['pagetitle'] = lang('memorieslist');
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('memoriespost_list', $this->data);
    }

    function respect_postlist(){
        $this->data['result'] = $this->commonmodel->getcustomdata('respect_post',array(),'*',array('id','desc'));
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data['pagetitle'] = lang('respectlist');
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('respectpost_list', $this->data);
    }


    function mediaalbum_postlist(){
        $this->data['result'] = $this->commonmodel->getcustomdata('media_album',array(),'*',array('id','desc'));
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data['pagetitle'] = lang('media_alum_list');
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('media_album', $this->data);
    }

    function media_images($album_id=''){
        if($album_id!=''){

            $this->data['result'] = $this->commonmodel->getcustomdata('media_images',array('album_id'=>$album_id),'*',array('id','desc'));
            // echo '<pre>';print_r($this->data['result']); exit();
            $this->data['pagetitle'] = lang('media_image_list');
            $this->template->set_layout('admininnerpagelayout');
            $this->template->title('Welcome to Memorisation');
            $this->template->set_partial('sidebar', 'partials/adminsidebar');
            $this->template->build('media_image', $this->data);
        }else{
            redirect('admin/album-list');
        }
    }
    

    function journal_postlist(){
        $this->data['result'] = $this->commonmodel->getcustomdata('journal_post',array(),'*',array('id','desc'));
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data['pagetitle'] = lang('journallist');
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('journalpost_list', $this->data);
    }

    function memories_poststatusupdate($user_id,$status){
        // echo $user_id.$status;
        $this->commonmodel->updateSingleData('memories_post',array('id'=>$user_id),'post_status',$status);
        $this->session->set_flashdata('success',lang('updatesuccess_msg'));
        redirect('admin/lifeof-post');
    }
  
 
    /******** lifeof post end ***********/

    function logout(){
        $this->session->sess_destroy(); 
        // $this->load->view('login');
        // $br = $this->config->base_url();;
        // $this->load->helper($br);
        redirect('admin', 'refresh');
    }
    

    function settings(){
        $user_response = $this->commonmodel->getsingleData('users',array('id'=>$this->session->userdata('user_details')['user_id']),'id,firstname,email,password',array('id','desc'));
        $this->data['user_response'] = $user_response;

        if(isset($_POST['submit']) && !empty($_POST)){
            $this->form_validation->set_rules('oldpassword', lang('oldpassword'), 'required');
            $this->form_validation->set_rules('password', lang('password'), 'required');
            $this->form_validation->set_rules('conpassword', lang('conpassword'), 'required|matches[password]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->set_layout('admininnerpagelayout');
                $this->template->title('Welcome to Memorisation');
                $this->template->set_partial('sidebar', 'partials/adminsidebar');
                $this->template->build('settings', $this->data);
            }else{
                $postdata = $this->input->post();
                $new_password = password_hash($postdata['password'],  PASSWORD_BCRYPT) ;
                
                $hash = $user_response['password'];
			    $result = password_verify($postdata['oldpassword'], $hash);
                // print_r($postdata);
                if($result){
                    $this->commonmodel->updateAllData('users', array('id'=>$user_response['id']), array('password'=>$new_password));
                    $this->session->set_flashdata('success',lang('updatesuccess_msg'));
                    redirect('admin/change-password');
                }else{
                    $this->session->set_flashdata('error',lang('password_not_match'));
                    redirect('admin/change-password');
                }
                // print_r($result); exit();
                // // $this->commonmodel->insertData('users',$postdata);
                // $this->session->set_flashdata('success',lang('updatesuccess_msg'));
                redirect('admin/change-password');
            }
        }
        
        
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('settings', $this->data);
    }

    function emailtemplate(){
        $resp = $this->load->view('emails/emailverification',null,true);
        $this->data['response'] = $this->commonmodel->getcustomdata('email_template',array(),['id'=>'desc']);
        // print_r($this->data['template']);exit();
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('email-template', $this->data);
    }

    function emialtemplate_edit($id=''){
        if(isset($_POST['update'])){
            $this->form_validation->set_rules('bodymsg', 'message', 'required');
            $this->form_validation->set_rules('subject', 'subject', 'required');
            
            if ($this->form_validation->run() == FALSE)
            {
                $this->template->set_layout('admininnerpagelayout');
                $this->template->title('Welcome to Memorisation');
                $this->template->set_partial('sidebar', 'partials/adminsidebar');
                $this->template->build('emailtemplate-edit', $this->data);
            }else{
                // echo '<pre>';print_r($_POST);exit();
                $this->commonmodel->updateAllData('email_template',['id'=>$id],['subject'=>$_POST['subject'],'bodymsg'=>$_POST['bodymsg']]);//exit();
                $this->session->set_flashdata('success',lang('updatesuccess_msg'));
                redirect('/admin/template');
            }
        }
        // $resp = $this->load->view('emails/emailverification',null,true);
        $this->data['response'] = $this->commonmodel->getsingleData('email_template',array('id'=>$id));
        // print_r($this->data['response']);exit();
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('emailtemplate-edit', $this->data);
    }
  
   
    function timeline_poststatus($user_id,$status)
    {
        // echo $user_id.$status;
        $this->commonmodel->updateSingleData('timeline',array('id'=>$user_id),'post_status',$status);
        $this->session->set_flashdata('success',lang('updatesuccess_msg'));
        redirect('admin/timeline-post');
    }

    function updateactivestatus($tb,$id,$status=0){
        $path = 'admin';
        if($tb!='' && $id!=''){
            $this->commonmodel->updateAllData($tb,['id'=>$id],['status'=>$status]);
            if($tb=='memories'){
                $path = 'admin/memories-post';
            }
            elseif($tb=='timeline'){
                $path = 'admin/timeline-post';
            }elseif($tb=='respect_post'){
                $path = 'admin/respects-post';
            }elseif($tb=='journal_post'){
                $path = 'admin/journal-post';
            }elseif($tb=='media_images'){
                $album_id = $this->db->select('album_id')->where(['id'=>$id])->get('media_images')->row()->album_id;
                $path = 'admin/media_images/'.$album_id;
            }
        }
        redirect($path);
    }

    function comment_postlist(){
        $this->data['result'] = $this->commonmodel->getcustomdata('comment_post',array(),'*',array('id','desc'));
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data['pagetitle'] = lang('commentlist');
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('comment_list', $this->data);
    }

    function comment_poststatusupdate($user_id,$status){
        // echo $user_id.$status;
        $this->commonmodel->updateSingleData('comment_post',array('id'=>$user_id),'status',$status);
        $this->session->set_flashdata('success',lang('updatesuccess_msg'));
        redirect('admin/comment-list');
    }

    function postlike(){
        $this->data['result'] = $this->commonmodel->getjointbData('post_like_count',null,'result','post_like_count.*,users.firstname,users.lastname,users.email,count(post_like_count.id) like_count',['users','post_like_count.user_id=users.id'],['post_like_count.id','desc'],'post_like_count.table');
        
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data['pagetitle'] = lang("like_list");;
        $this->template->set_layout('admininnerpagelayout');
        $this->template->title('Welcome to Memorisation');
        $this->template->set_partial('sidebar', 'partials/adminsidebar');
        $this->template->build('post_like', $this->data);
    }
}
