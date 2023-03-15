<?php 
if(!function_exists('media_check_audio')) {
    function media_check_audio(){
        
        return array('mp3');
    }
}
if(!function_exists('media_check_video')) {
    function media_check_video(){
        
        return array('mp4');
    }
}
// Function For get_user_staff_group_by_id
if(!function_exists('get_user_plan')) {
    function get_user_plan($userplan_id=''){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        if($userplan_id==''){
            $user_detail = $CI->session->userdata('frontuserdetail');
            $userplan_id = $CI->db->select('userplan_type')->where('id',$user_detail['user_id'])->get('users')->row()->userplan_type;
            
        }
        $user_plan =  $CI->db->select('user_type.usertype')->where(['user_type.id'=>$userplan_id])->get('user_type')->row();
        // print_r($user_plan); exit();
        return (isset($user_plan->usertype)) ?$user_plan->usertype : 'free';
    }
}

// get profile name by comment id
if(!function_exists('get_comment_profilename')) {
    function get_comment_profilename($postid,$tbname){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        // SELECT user_profile.profile_name FROM `user_profile` join memories on user_profile.id=memories.profile_id where memories.id=5
        $user_profile_name =  $CI->db->select('user_profile.profile_name')->join('user_profile',$tbname.'.profile_id=user_profile.id')->where([$tbname.'.id'=>$postid])->get($tbname)->row()->profile_name;
        // print_r($user_plan); exit();
        return (isset($user_profile_name)) ?$user_profile_name : '';
    }
}

// Function For get_user_staff_group_by_id
if(!function_exists('get_userplan_detail')) {
    function get_userplan_detail($userplan_id=''){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        if($userplan_id==''){
            $user_detail = $CI->session->userdata('frontuserdetail');
            $userplan_id = $CI->db->select('userplan_type')->where('id',$user_detail['user_id'])->get('users')->row()->userplan_type;
            
        }
        $user_plan =  $CI->db->select('user_type.usertype,profile_limit,warden_limit')->where(['user_type.id'=>$userplan_id])->get('user_type')->row();
        // print_r($user_plan); exit();
        return $user_plan;
    }
}


if(!function_exists('get_frontauthuser')) {
    function get_frontauthuser($key=''){
        if(checkauth()){
            // return array("daily hours","weekly hours");
            $CI = & get_instance();
            $user_detail = $CI->session->userdata('frontuserdetail');
            // $user_plan =  $CI->db->select('user_type.usertype')->where(['user_type.id'=>$userplan_id])->get('user_type')->row();
            
            if($key!='' && isset($user_detail[$key])){
                return $user_detail[$key];
            }else{
                if($key==''){
                return $user_detail;
                }else{
                    return 0;
                }
            }
        }else{
            return '';
        }
    }
}

if(!function_exists('get_frontprofileid')) {
    function get_frontprofileid(){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        $user_detail = $CI->session->userdata('front_profile_id');
        // $user_plan =  $CI->db->select('user_type.usertype')->where(['user_type.id'=>$userplan_id])->get('user_type')->row();
        return $user_detail;
        
    }
}

if(!function_exists('checkauth')) {
    function checkauth(){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        if($CI->session->userdata('frontuserdetail')){
        // $user_detail = $CI->session->userdata('frontuserdetail');
        // $user_plan =  $CI->db->select('user_type.usertype')->where(['user_type.id'=>$userplan_id])->get('user_type')->row();
        return true;
        }else{
            return false;
        }
    }
}

if(!function_exists('date_ymdformate')) {
    function date_ymdformate($date){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        return date('Y-m-d',strtotime($date));
    }
}

if(!function_exists('get_media_albumgroup')) {
    function get_media_albumgroup(){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        $album_sql = $CI->db->select('id')->where(['trash'=>0,'status'=>1])->group_by('album_id')->get('media_images');
        // print_r($album_sql->result_array());
        $album_group=[];
        foreach($album_sql->result() as $val){
            $album_group[] = $val->id;
        }
        $album_count = $album_sql->num_rows();
        return array('album_count'=>$album_count,'album_group'=>implode(',',$album_group));
    }
}

if(!function_exists('date_dmyformate')) {
    function date_dmyformate($date){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        return date('d/m/Y',strtotime($date));
    }
}

if(!function_exists('date_dmyfullformat')) {
    function date_dmyfullformat($date){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        return date('j M Y',strtotime($date));
    }
}

if(!function_exists('front_date_formate')) {
    function front_date_formate($date){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        return date('jS F,Y',strtotime($date));
    }
}

if(!function_exists('life_oftype')) {
    function life_oftype(){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        return array('Early life','Personal life','Career');
    }
}

if(!function_exists('journal_category')) {
    function journal_category(){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        return array('Journal','Obituary','Event');
    }
}

if(!function_exists('usercurrentplan')) {
    function usercurrentplan(){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        $userdata = $CI->session->userdata('frontuserdetail');
        // return $userdata['user_id'];
        $user_plan = $CI->db->select('user_type.usertype,users.id')->where(['users.id'=>$userdata['user_id']])->join('user_type','users.userplan_type=user_type.id')->get('users')->row();
        return ucfirst($user_plan->usertype);
        // return array('Journal','Obituary','Event');
    }
}

if(!function_exists('limitedwords')) {
    function limitedwords($string,$limit=200){
        $string = strip_tags($string);
        if (strlen($string) > $limit) {

            // truncate string
            $stringCut = substr($string, 0, $limit);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        echo $string;
    }
}

if(!function_exists('limitedwordsformemory')) {
    function limitedwordsformemory($string,$limit=120){
        $string = strip_tags($string);
        if (strlen($string) > $limit) {

            // truncate string
            $stringCut = substr($string, 0, $limit);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        echo $string;
    }
}

if(!function_exists('limitedwordsformemoryipad')) {
    function limitedwordsformemoryipad($string,$limit=70){
        $string = strip_tags($string);
        if (strlen($string) > $limit) {

            // truncate string
            $stringCut = substr($string, 0, $limit);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        echo $string;
    }
}
if(!function_exists('limitedwordsformemorymobile')) {
    function limitedwordsformemorymobile($string,$limit=50){
        $string = strip_tags($string);
        if (strlen($string) > $limit) {

            // truncate string
            $stringCut = substr($string, 0, $limit);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        echo $string;
    }
}
if(!function_exists('get_userprofile')) {
    function get_userprofile($profile_id){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        
        $user_profile =  $CI->db->select('*')->where(['id'=>$profile_id])->get('user_profile')->row();
        return (isset($user_profile) && $user_profile!='') ? $user_profile : '';
    }
}


if(!function_exists('get_userprofile_ids')) {
    function get_userprofile_ids(){
        // echo get_frontauthuser('user_id');
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        $ids=[];
        $user_profile =  $CI->db->select('id')->where(['user_id'=>get_frontauthuser('user_id')])->get('user_profile')->result();
        if(isset($user_profile) && $user_profile!=''){
            foreach($user_profile as $val){
                $ids[] = $val->id;
            }
            return $ids;
        }else{
            return false;
        }
    }
}

if(!function_exists('check_sessionuser')) {
    function check_sessionuser(){
        // return array("daily hours","weekly hours");
        $CI = & get_instance();
        $status = true;
        $CI->session->userdata('frontuserdetail');
        $check_sessionuser =  $CI->db->select('*')->where(['id'=>$userdata['user_id']])->get('user_profile');
        if($check_sessionuser->num_rows()==0){
            $CI->session->sess_destroy(); 
            redirect(base_url(), 'refresh');
            // $status = false;
        }
        return $status;
    }
}

if(!function_exists('checkuserplan_forprofile')) {
    function checkuserplan_forprofile(){
        $CI = & get_instance();
        $plan = [];
        // print_r($CI->session->userdata('frontuserdetail')); exit();
        if(!empty($CI->session->userdata('frontuserdetail'))){
            $userdata = $CI->session->userdata('frontuserdetail');
            $usercurrentplan_result = $CI->db->select('userplan_type')->where(['id'=>$userdata['user_id']])->get('users');
            // print_r($usercurrentplan->num_rows());
            if($usercurrentplan_result->num_rows()>0){
                $usercurrentplan = $usercurrentplan_result->row()->userplan_type;
            }else{
                check_sessionuser();
                return false;
            }
            
            if(isset($usercurrentplan) && $usercurrentplan==1){
                $user_profile = $CI->db->select('id')->where(['user_id'=>$userdata['user_id']])->get('user_profile');
                // print_r($user_profile->num_rows());
                if($user_profile->num_rows()>0){
                    $plan['editprofile'] = $user_profile->row()->id;
                    $plan['add_profile'] = false;
                    $plan['menu_text'] = lang('edit_profile');

                }else{
                    $plan['menu_text'] = lang('add_new_profile');
                }
            }elseif(isset($usercurrentplan) && $usercurrentplan==2){
                $profiledata = $CI->db->select('id')->where(['user_id'=>$userdata['user_id']])->get('user_profile');
                
                $menu=[];

                if($profiledata->num_rows()>1){
                    $plan['add_profile'] = $profiledata->result()[0]->id;
                    $plan['menu_text'] = lang('edit_profile');
                // }elseif($profiledata->num_rows()>1){
                //     $plan['add_profile'] = $profiledata->result()[0]->id;
                //     $plan['menu_text'] = lang('edit_profile');
                }else{
                    $plan['add_profile'] = false;
                    $plan['menu_text'] = lang('add_new_profile');
                }
            }
        }
        return $plan;
        // $user_profile =  $CI->db->select('*')->where(['id'=>$profile_id])->get('user_profile')->row();
        // return $user_profile;
    }
}

if(!function_exists('user_profilecount')) {
    function user_profilecount($groupid=''){
        $CI = & get_instance();
        if($groupid=='' && checkauth()){

        $userdata = $CI->session->userdata('frontuserdetail');
        $usercurrentplan_result = $CI->db->where(['user_id'=>$userdata['user_id']])->get('user_profile')->num_rows();
        }else{
            $usercurrentplan_result = $CI->db->where(['family_group_id'=>$groupid])->get('user_profile')->num_rows();
        }
        return $usercurrentplan_result;
    }
}


if(!function_exists('familygroupcount')) {
    function familygroupcount(){
        $CI = & get_instance();
        if(checkauth()){
        $userdata = $CI->session->userdata('frontuserdetail');
        if(isset($userdata['warden_group_id']) && $userdata['warden_user_id']>0){
            $familygroupcount_result = $CI->db->select('id,count(*) as ids')->where(['id'=>$userdata['warden_group_id']])->get('family_group')->row_array();
        }else{
            $familygroupcount_result = $CI->db->select('id,count(*) as ids')->where(['user_id'=>$userdata['user_id']])->get('family_group')->row_array();
        }
        }else{
            $familygroupcount_result = false;
        }
        return $familygroupcount_result;
    }
}


if(!function_exists('group_plancheck')){
    function group_plancheck($group_id=''){
        $CI = & get_instance();
        if(checkauth() && $group_id!=''){
            $userdata = $CI->session->userdata('frontuserdetail');
            $plan_group_count = $CI->db->where(['user_id'=>$userdata['user_id'],'family_group_id'=>$group_id])->get('user_profile')->num_rows();
            // echo $plan_group_count; exit();

            // SELECT family_group.id,userplan_type,user_type.profile_limit,user_type.warden_limit FROM `family_group` join user_type on family_group.userplan_type=user_type.id where family_group.id = 2
            $group_plan = $CI->db->select('family_group.id,userplan_type,user_type.profile_limit,user_type.warden_limit')->where('family_group.id',$group_id)->join('user_type','family_group.userplan_type=user_type.id')->get('family_group')->row();


            if($group_plan->profile_limit >=$plan_group_count){
                $familygroupcount_result = true;
            }else{
                $familygroupcount_result = false;
            }
            // if(isset($userdata['warden_group_id']) && $userdata['warden_user_id']>0){
            //     $familygroupcount_result = $CI->db->select('id,count(*) as ids')->where(['id'=>$userdata['warden_group_id']])->get('family_group')->row_array();
            // }else{
            //     $familygroupcount_result = $CI->db->select('id,count(*) as ids')->where(['user_id'=>$userdata['user_id']])->get('family_group')->row_array();
            // }
        }else{
            $familygroupcount_result = false;
        }
        return $familygroupcount_result;
    }
}

// if(!function_exists('familygroupname_byuserid')) {
//     function familygroupname_byuserid($userid=''){
//         $CI = & get_instance();
//         if($userid!=''){
//             $familygroupname_result = $CI->db->select('group_concat(group_name) as group_name')->where(['user_id'=>$userid])->get('family_group')->row_array();
//         }else{
//             $familygroupname_result = false;
//         }
//         return $familygroupname_result;
//     }
// }

if(!function_exists('familygroupname_byuserid')) {
    function familygroupname_byuserid($userid=''){
        $CI = & get_instance();
        if($userid!=''){
            $familygroupname_result = $CI->db->select('group_concat(group_name) as group_name,group_concat(id) as group_id')->where(['user_id'=>$userid])->get('family_group')->row_array();
        }else{
            $familygroupname_result = false;
        }
        return $familygroupname_result;
    }
}

if(!function_exists('familygroupname_bygroupid')) {
    function familygroupname_bygroupid($group_id=''){
        $CI = & get_instance();
        if($group_id!=''){
            $familygroupname_result = $CI->db->select('group_name,userplan_type')->where(['id'=>$group_id])->get('family_group')->row();
        }else{
            $familygroupname_result = false;
        }
        return $familygroupname_result;
    }
}

if(!function_exists('user_allfamilygroup')) {
    function user_allfamilygroup(){
        $CI = & get_instance();
        if(checkauth()){
        $userdata = $CI->session->userdata('frontuserdetail');
            $familygroupcount_result = $CI->db->select('group_concat(id) grid,count(*) as ids,group_concat(userplan_type) usertype')->where(['user_id'=>$userdata['user_id']])->get('family_group')->row_array();
        }else{
            $familygroupcount_result = false;
        }
        return $familygroupcount_result;

        
    }
}


if(!function_exists('user_detail')) {
    function user_detail($userid=''){
        if($userid!=''){
        $CI = & get_instance();
        $user_result = $CI->db->select('firstname,lastname,email,userplan_type,user_role')->where(['id'=>$userid,'user_status'=>1])->get('users')->row();
        return $user_result;
        }else{
            return false;
        }
    }
}

if(!function_exists('user_detail_key')) {
    function user_detail_key($userid='',$key=''){
        if($userid!='' && isset($key) && $key!=''){
            $CI = & get_instance();
            $user_result = $CI->db->select($key)->where(['id'=>$userid,'user_status'=>1])->get('users')->row_array();
            if(isset($user_result) && !empty($user_result)){
                return $user_result[$key];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

if(!function_exists('get_defaultimage')) {
    function get_defaultimage(){
        $CI = & get_instance();
        $defaultimage = $CI->db->get('settings')->row();
        return $defaultimage;
    }
}

if(!function_exists('get_loadingimage')) {
    function get_loadingimage(){
        $CI = & get_instance();
        
        return '<p class="text-center"><img class="loadingimg" src="'.site_url().'/assets/frontend/uploads/loading1.gif" width="100px"/></p>';
    }
}

if(!function_exists('delete_like')) {
    function delete_like($type='',$postid=''){
        if($type!='' && $postid!=''){
            $CI = & get_instance();
            $CI->db->where(['table'=>$type,'post_id'=>$postid])->delete('post_like_count');
        return true;
        }else{
            return false;
        }
    }
}


if(!function_exists('delete_comment')) {
    function delete_comment($type='',$postid=''){
        if($type!='' && $postid!=''){
            $CI = & get_instance();
            $CI->db->where(['post_type'=>$type,'post_id'=>$postid])->delete('comment_post');
        return true;
        }else{
            return false;
        }
    }
}



function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

if(!function_exists('get_adminprofile')) {
    function get_adminprofile(){
        $CI = & get_instance();
        $userdata = $CI->session->userdata('frontuserdetail');
        if(isset($userdata['warden_group_id']) && $userdata['warden_group_id']>0){
            $usercurrentplan_result = $CI->db->select('id,admin_profile')->where(['family_group_id'=>$userdata['warden_group_id']])->get('user_profile');
        }else{
            
            $usercurrentplan_result = $CI->db->select('id,admin_profile')->where(['user_id'=>$userdata['user_id']])->get('user_profile');
        }
        // ->num_rows();
        $usercurrent_id =0;
        if($usercurrentplan_result->num_rows()>0){
            $usercurrent_id = ($usercurrentplan_result->row()->admin_profile==1) ? $usercurrentplan_result->row()->id : $usercurrentplan_result->row()->id;
        }
        return $usercurrent_id;
    }
}

if(!function_exists('warden_groupprofilepermission')) {
    function warden_groupprofilepermission(){
        $CI = & get_instance();
        $userdata = $CI->session->userdata('frontuserdetail');
        if(isset($userdata['warden_group_id']) && $userdata['warden_group_id']>0){
            $warden_groupid = (isset($userdata['warden_group_id']) && $userdata['warden_group_id']>0) ? $userdata['warden_group_id'] : 0;
            $warden_profile = $CI->commonmodel->getjointbData('user_profile',array('family_group_id'=>$warden_groupid),'row','group_concat(id) wardenprofileids');
            return $warden_profile->wardenprofileids;
        }
        return false;
    }
}

if(!function_exists('set_adminprofile')) {
    function set_adminprofile(){
        $CI = & get_instance();
        $userdata = $CI->session->userdata('frontuserdetail');
        $usercurrentplan_result = $CI->db->select('id,admin_profile')->where(['user_id'=>$userdata['user_id']])->order_by('id','asc')->get('user_profile');
        if($usercurrentplan_result->num_rows()>0){
            $profilecount = $profilecount_admin = 0;
            foreach($usercurrentplan_result->result() as $pro_val){
                if($pro_val->admin_profile==0){
                    $profilecount++;
                }
                if($pro_val->admin_profile==1){
                    $profilecount_admin++;
                }
            }
            if($profilecount_admin==$usercurrentplan_result->num_rows()){
                $CI->db->where(['user_id'=>$userdata['user_id']])->update('user_profile',['admin_profile'=>0]);

                $CI->db->where(['id'=>$usercurrentplan_result->row()->id])->update('user_profile',['admin_profile'=>1]);
            }
            if($profilecount==$usercurrentplan_result->num_rows()){
                $CI->db->where(['id'=>$usercurrentplan_result->row()->id])->update('user_profile',['admin_profile'=>1]);
            }
            // echo $profilecount;
        }
        return true;
        // print_r($usercurrentplan_result->result());exit();
    }
}


if(!function_exists('upload_image')) {
    function upload_image($path='uploads', $image_name='', $input_name='') {
        $CI = & get_instance();
        if(isset($_FILES[$input_name]) && $_FILES[$input_name]['name']!=''){
            ;
            
            $filename = $image_name;
            $config = array(
                'upload_path' => './assets/frontend/'.$path,
                'allowed_types' => "gif|jpg|png|jpeg",
                'overwrite' => TRUE,
                'file_name' => $filename
            );
            $CI->load->library('upload', $config);
            if($CI->upload->do_upload($input_name))
            {
                $data = array('upload_data' => $CI->upload->data());
                // print_r($data); exit();
                $image_name = $data['upload_data']['file_name'];
                // $this->load->view('upload_success',$data);
                return array('success'=>true,'data'=>$image_name);
            }
            else
            {
                $error = array('success'=>false,'error' => $CI->upload->display_errors());
                return $error;
            }
        }
        return null;
    }
}

function postlike_helper($post_id,$tablename){
    $CI = & get_instance();
    if($post_id!='' && $tablename!=''){
        if(checkauth()){
        $user_id = get_frontauthuser()['user_id'];
        
        $where = array('table'=>$tablename,'post_id'=>$post_id,'like_count'=>1);
        }else{
        $where = array('table'=>$tablename,'post_id'=>$post_id,'like_count'=>1);
        }

        $resp = $CI->commonmodel->getjointbData('post_like_count',$where,'row','count(*) likecount');
        
        return (isset($resp) && !empty($resp)) ? $resp->likecount : 0;
    }else{
        return 0;
    }   
    
}

function wardencount(){
    $CI = & get_instance();
    if(checkauth()){
        if(!get_frontauthuser('warden_user_id')){
        $user_id = get_frontauthuser()['user_id'];
        
        
        $where = array('admin_user_id'=>$user_id);
        $resp = $CI->commonmodel->getjointbData('warden_users',$where,'row','count(*) warden_count');
        
        return (isset($resp) && !empty($resp)) ? $resp->warden_count : 0;
        }else{
            return 0;
        }
    }else{
        return 0;
    }   
}

// Function For get wardenlist
if(!function_exists('get_wardenlist_helperfun')) {
    function get_wardenlist_helperfun(){
        $CI = & get_instance();
        if(checkauth()){
            $resp = $CI->commonmodel->getjointbData('warden_users',[],'result','id,concat(firstname," ",lastname) as name');
            return $resp;
        }
        return array();
    }
}

/*
if(!function_exists('checkwarden_createlimit')) {
    function checkwarden_createlimit(){
        $CI = & get_instance();
        if(checkauth())
        $user_id = get_frontauthuser()['user_id'];
        $result = $CI->db->select('userplan_type')->where('user_id',$user_id)->get('family_group')->row();
            $total_warden = $CI->db->select('count(id) ids')->where('admin_user_id',$user_id)->where('warden_user',1)->get('users')->row();
            $total_warden_res = (isset($total_warden) && $total_warden->ids>0) ? $total_warden->ids : 0;
            if(isset($result->userplan_type)){
                $user_type = $CI->db->select('warden_limit')->where('usertype',$result->userplan_type)->get('user_type')->row()->warden_limit;
                return ($user_type-$total_warden_res);
                
            }
        }else{
            return false;
        }
    }
}
*/

if(!function_exists('postbyuser')) {
    function postbyuser($tablename){

        $CI = & get_instance();
        if($tablename!=''){
            $user_id = get_frontauthuser()['user_id'];
            if($tablename=='memories' || $tablename=='respect_post'){
                if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                    $profileids = warden_groupprofilepermission();
                }else{
                    $profileids = $CI->db->select('group_concat(id) profile_id')->where('user_id',$user_id)->get('user_profile')->row()->profile_id;
                }
                if(isset($profileids) && !empty($profileids)){
                    $resp = $CI->db->select('id')->where_in('profile_id',explode(',',$profileids))->get($tablename)->result();
                    // echo $CI->db->last_query(); exit();
                }
            
                
            }else{
                if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                    $resp = $CI->commonmodel->getjointbData_whereIn($tablename,['user_id'=>$user_id],['profile_id',warden_groupprofilepermission()],'result','id');
                }else{
                    $resp = $CI->commonmodel->getjointbData($tablename,['user_id'=>$user_id],'result','id');
                }
            }
            $post_id = [];
            if(isset($resp) && $resp!=''){
                foreach($resp as $val){
                    $post_id[] = $val->id;
                }
            }
            return $post_id;
        }else{
            return 0;
        }    
    }
}

function respectpost_comment($post_id,$post_type='respect_post',$limit=2){
    $CI = & get_instance();
    if($post_id!='' && $post_type!=''){
        // if(checkauth()){
        // $user_id = get_frontauthuser()['user_id'];
        
        // $where = array('table'=>$tablename,'user_id'=>$user_id,'post_id'=>$post_id,'like_count'=>1);
        // }else{
        // $where = array('table'=>$tablename,'post_id'=>$post_id,'like_count'=>1);
        // }
        if($limit=='all'){
            $resp = $CI->commonmodel->getjointbData('comment_post',['status'=>1,'post_id'=>$post_id,'post_type'=>$post_type],'result','*',null,['id','desc'],null);
        }else{
            $resp = $CI->commonmodel->getjointbData('comment_post',['status'=>1,'post_id'=>$post_id,'post_type'=>$post_type],'result','*',null,['id','desc'],null,$limit);

        }
        
        return $resp;//(isset($resp) && !empty($resp)) ? $resp->likecount : 0;
    }else{
        return 0;
    }   
    
}

if(!function_exists('sortingdesc')) {
    function sortingdesc($returndata=array(),$id=''){
        $price = array();
        if(!empty($returndata) && is_array($returndata) && $id!=''){
            foreach ($returndata as $key => $row)
            {
                $price[$key] = $row[$id];
            }
            return array_multisort($price, SORT_DESC, $returndata);
        }else{
            return false;
        }
    }
}

if(!function_exists('status_array')) {
    function status_array(){
        $status = array('Pending','Approved','Rejected','All');
        return $status;
        
    }
}

if(!function_exists('checkwarden_permission')) {
    function checkwarden_permission($warden_id,$section_name,$permission_type){
        $CI = & get_instance();
        // echo $CI->db->where(['id'=>$warden_id,'warden_user'=>1])->get('users')->num_rows();
        // echo $CI->db->last_query(); exit();
        if($CI->db->where(['id'=>$warden_id,'warden_user'=>1])->get('warden_users')->num_rows()>0){
            return $CI->db->where(['warder_user_id'=>$warden_id,'section_name'=>$section_name,'permission_type'=>$permission_type,'permission_status'=>1])->get('warden_permission')->num_rows();
        }else{
            return true;
        }
        
    }
}

if(!function_exists('default_warder_permission_allow')) {
    function default_warder_permission_allow($warder_id){
        $CI = & get_instance();
        $CI->db->where('warder_user_id',$warder_id)->delete('warden_permission');
        $status = array('featured_post','media_post','respect_post','journal_post','memory_post','timeline','comments');
        // 'life_of',
        $permission_type = ['delete','make_feature','approve'];
        for($s=0;$s<count($status);$s++){
            if($status[$s]=='featured_post'){
                for($pt=0;$pt<count($permission_type);$pt++){
                    $insertdata[] = ['warder_user_id'=>$warder_id,'section_name'=>$status[$s],'permission_type'=>$permission_type[$pt],'permission_status'=>2,'profile_admin_id'=>get_frontauthuser('user_id')];
                }
            }elseif($status[$s]=='comments'){
                $insertdata[] = ['warder_user_id'=>$warder_id,'section_name'=>$status[$s],'permission_type'=>'delete','permission_status'=>2,'profile_admin_id'=>get_frontauthuser('user_id')];
                
                $insertdata[] = ['warder_user_id'=>$warder_id,'section_name'=>$status[$s],'permission_type'=>'approve','permission_status'=>2,'profile_admin_id'=>get_frontauthuser('user_id')];
            }else{
                $insertdata[] = ['warder_user_id'=>$warder_id,'section_name'=>$status[$s],'permission_type'=>'delete','permission_status'=>2,'profile_admin_id'=>get_frontauthuser('user_id')];
                $insertdata[] = ['warder_user_id'=>$warder_id,'section_name'=>$status[$s],'permission_type'=>'make_feature','permission_status'=>2,'profile_admin_id'=>get_frontauthuser('user_id')];
                $insertdata[] = ['warder_user_id'=>$warder_id,'section_name'=>$status[$s],'permission_type'=>'approve','permission_status'=>2,'profile_admin_id'=>get_frontauthuser('user_id')];
            }
        }
        // echo '<pre>'; print_r($insertdata); exit();
        $CI->db->insert_batch('warden_permission',$insertdata);
        return $status;
        
    }
}

if(!function_exists('check_post_pubicprivate')) {
    function check_post_pubicprivate($post_id,$post_table,$type_col='is_public'){
        $CI = & get_instance();
        $result = $CI->commonmodel->getsingleData($post_table,['id'=>$post_id,$type_col=>1]);
        // print_r($result); exit();
        if(!empty($result) && is_array($result)){
            return true;
        }else{
            return false;
        }
    }
}

/**/
if(!function_exists('removepostimages')) {
    function removepostimages($post_where,$post_table,$select){
        $CI = & get_instance();
        $result = $CI->commonmodel->getsingleData($post_table,$post_where,$select);
        // print_r($result);exit();
        if(isset($result) && !empty($result)){
            if(isset($result[$select]) && $result[$select]!='' && $result[$select]!=null){
        try{
            if(1){
                if(!empty($result) && is_array($result)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return true;
            }
        }catch (Exception $e) {
            // echo 'Caught exception: ',  $e->getMessage(), "\n";
            return false;
        }
        }
        }
    }
}
/**/

if(!function_exists('removepostlike')) {
    function removepostlike($post_table,$post_where){
        $CI = & get_instance();
        $result = $CI->db->where($post_where)->delete($post_table);
        // print_r($result);exit();
        
        return false;
        
    }
}

if(!function_exists('allpendingcomment')) {
    function allpendingcomment(){
        $CI = & get_instance();
        $respect_post_result = $journal_post_result = $media_post_post = $memory_post_result = $timeline_post_result = $life_of_result = [];
        $memory_post = postbyuser("memories");
        $respect_post = postbyuser("respect_post");

        $journal_post = postbyuser("journal_post");
        $media_post = postbyuser("media_images");
        $timeline_post = postbyuser("timeline");
        $life_of = postbyuser("life_of");
        // print_r($respect_post);
        // exit();
        $respect_post_result = $respect_post_result_pending = $journal_post_result_pending = $media_post_post_pending = $memory_post_result_pending = $timeline_post_result_pending = $life_of_result_pending = $journal_post_result = $media_post_post = $memory_post_result = $life_of_result = [];

        if (!empty($respect_post)) {
            $respect_post_result = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $respect_post,
                ["post_type" => "respect_post"],
                ["id", "desc"]
            );
            $respect_post_result_pending = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $respect_post,
                ["post_type" => "respect_post",'status'=>0],
                ["id", "desc"]
            );

            // echo $CI->db->last_query();exit(); 
        }
        // exit(); 
        if (!empty($journal_post)) {
            $journal_post_result = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $journal_post,
                ["post_type" => "journal_post"],
                ["id", "desc"]
            );
            $journal_post_result_pending = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $journal_post,
                ["post_type" => "journal_post",'status'=>0],
                ["id", "desc"]
            );

        }
        if (!empty($media_post)) {
            $media_post_post = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $media_post,
                ["post_type" => "media_post"],
                ["id", "desc"]
            );
            $media_post_post_pending = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $media_post,
                ["post_type" => "media_post",'status'=>0],
                ["id", "desc"]
            );

        }
        if (!empty($timeline_post)) {
            $timeline_post_result = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $timeline_post,
                ["post_type" => "timeline"],
                ["id", "desc"]
            );
            $timeline_post_result_pending = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $timeline_post,
                ["post_type" => "timeline",'status'=>0],
                ["id", "desc"]
            );
            
            // print_r($timeline_post); exit();
        }
        if (!empty($memory_post)) {
            $memory_post_result = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $memory_post,
                ["post_type" => "memory_post"],
                ["id", "desc"]
            );
            $memory_post_result_pending = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $memory_post,
                ["post_type" => "memory_post",'status'=>0],
                ["id", "desc"]
            );
            
        }
        if (!empty($life_of)) {
            $life_of_result = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $life_of,
                ["post_type" => "life_of"],
                ["id", "desc"]
            );
            $life_of_result_pending = $CI->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $life_of,
                ["post_type" => "life_of",'status'=>0],
                ["id", "desc"]
            );
        }
        $result = array_merge(
            $respect_post_result,
            $journal_post_result,
            $media_post_post,
            $memory_post_result,
            $timeline_post_result,
            $life_of_result
        );
        
        $result_pending = array_merge(
            $respect_post_result_pending,
            $journal_post_result_pending,
            $media_post_post_pending,
            $memory_post_result_pending,
            $timeline_post_result_pending,
            $life_of_result_pending
        );
        return count($result_pending);
    }
}

// Function For get_user_staff_group_by_id
if(!function_exists('get_pending_count_user_wise')) {
    function get_pending_count_user_wise(){
        // print_r(allpendingcomment()); exit();
        // return array("daily hours","weekly hours");
        

        if(checkauth()){
            
        $CI = & get_instance();
         $userid= (isset($_SESSION['frontuserdetail']['user_id']) && $_SESSION['frontuserdetail']['user_id']!='') ? $_SESSION['frontuserdetail']['user_id'] : 0;
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                
                $profileids = warden_groupprofilepermission();
            
        }else{
            $profileids = implode(',',get_userprofile_ids());

        }
        //print_r(get_userprofile_ids());
         // (select count(*) from comment_post where STATUS = 0 AND user_id =$userid)
        if($profileids!=''){
            if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                $sql = "SELECT 
        
                (select count(*) from memories where STATUS = 0 and trash =0 AND (profile_id in (".$profileids.")) )
                +
                (select count(*) from memories where STATUS = 0 and trash =0 AND feature_post =1 AND (profile_id in (".$profileids.")) )
                +
                (select count(*) from respect_post where STATUS = 0 and trash =0 AND (profile_id in (".$profileids.")))
                +
                (select count(*) from respect_post where STATUS = 0 and trash =0 AND feature_post =1 AND (profile_id in (".$profileids.")) )
                +
                (select count(*) from media_images where STATUS = 0 and trash =0 AND user_id =$userid)
                +
                (select count(*) from journal_post where STATUS = 0 and trash =0 AND user_id =$userid)
                +
                (select count(*) from journal_post where STATUS = 0 and trash =0 AND feature_post =1  AND user_id =$userid )
                +
                (select count(*) from timeline where STATUS = 0 and trash =0 AND user_id =$userid)
                +
                (select count(*) from timeline where STATUS = 0 and trash =0 AND feature_post =1  AND user_id =$userid ) as total_pending;";
            }else{            
                // user_id =".$userid." OR 
                $sql = "SELECT 
                
                (select count(*) from memories where STATUS = 0 and trash =0 AND (profile_id in (".$profileids.")) )
                +
                (select count(*) from memories where STATUS = 0 and trash =0 AND feature_post =1 AND ( profile_id in (".$profileids.")) )
                +
                (select count(*) from respect_post where STATUS = 0 and trash =0 AND ( profile_id in (".$profileids.")))
                +
                (select count(*) from respect_post where STATUS = 0 and trash =0 AND feature_post =1 AND ( profile_id in (".$profileids.")) )
                +
                (select count(*) from media_images where STATUS = 0 and trash =0 AND user_id =$userid)
                +
                (select count(*) from journal_post where STATUS = 0 and trash =0 AND user_id =$userid)
                +
                (select count(*) from journal_post where STATUS = 0 and trash =0 AND feature_post =1  AND user_id =$userid )
                +
                (select count(*) from timeline where STATUS = 0 and trash =0 AND user_id =$userid)
                +
                (select count(*) from timeline where STATUS = 0 and trash =0 AND feature_post =1  AND user_id =$userid ) as total_pending;";
            }
        // echo $sql;exit();
        $result =$CI->db->query($sql)->result();
        $pending_result = $result[0]->total_pending+allpendingcomment();
       }else{
        $pending_result = 0;
       }        
        }else{
            $pending_result = 0;
        }
       // echo $pending_result;
        return $pending_result;
    }
}



?>