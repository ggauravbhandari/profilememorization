<?php defined('BASEPATH') or exit('No direct script access allowed');


class Postcontroller extends MY_Controller
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
        if($this->session->userdata('frontuserdetail') || $this->session->userdata('front_profile_id')){
            // redirect('/');
        }else{
            redirect('/');
        }
    }

    function featurepost(){
        //unlink(base_url('/assets/frontend/uploads/').'featurepost1652124235.png');
        if(isset($_POST['submit'])){
            $postdata = $this->input->post();
            // print_r(get_frontauthuser()['user_id']); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            if(isset($_FILES['post_image']) && $_FILES['post_image']['name']!=''){
                ;

                $filename = 'featurepost'.time();
                $config = array(
                    'upload_path' => './assets/frontend/uploads/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,
                    //'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    //'max_height' => "768",
                    //'max_width' => "1024",
                    'file_name' => $filename
                );
                $this->load->library('upload', $config);
                if($this->upload->do_upload('post_image'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    // print_r($data); exit();
                    $postdata['post_image'] = $data['upload_data']['file_name'];
                    // $this->load->view('upload_success',$data);
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());
                    //print_r($error);
                    $this->session->set_flashdata('error',implode(',',$error));
                    $this->session->set_flashdata('feature_post',true);
                    // redirect('/');
                    echo json_encode(array('status'=>true,'message'=>implode(',',$error)));
                }
            }
            $postdata['post_date'] = date_ymdformate(str_replace('/','-',$postdata['post_date']));
            $postdata['profile_id'] = $this->commonmodel->getsingleData('user_profile', array('user_id'=>$postdata['user_id']),'id,name',array('id','ASC'))['id'];
            // print_r($postdata); exit();

            unset($postdata['submit']);
            unset($postdata['fileToUpload']);
            if(isset($postdata['featurepost_id']) && $postdata['featurepost_id']!=''){
                $featurepost_id = $this->input->post('featurepost_id');
                unset($postdata['featurepost_id']);
                $this->commonmodel->updateAllData('feature_post',['id'=>$featurepost_id],$postdata);
                $resp = $featurepost_id;
                $msg = lang('featured_posts_update_msg');
            }else{
                $resp = $this->commonmodel->insertData('feature_post',$postdata);
                $msg = lang('featured_posts_add_msg');
            }
            if($resp){
                $result['f_val'] = $this->commonmodel->getsingleDataobject('feature_post',array('id'=>$resp));
                $body = $this->load->view('single-featurepost',$result,TRUE);
                // $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                // $this->session->set_flashdata('feature_post',true);

                echo json_encode(array('status'=>true,'message'=>$msg,'body'=>$body,'postid'=>$resp));

            }else{
                // $this->session->set_flashdata('error',lang('try_again'));
                // $this->session->set_flashdata('feature_post',true);
                echo json_encode(array('status'=>false,'message'=>lang('addedsuccess_msg')));
            }
            // print_r($postdata); exit();
        }
    }

    function delete_featuredpost(){

        $this->commonmodel->updateAllData($_POST['posttype'],['id'=>$_POST['id']],['feature_post'=>0]);

        $profile_id = get_frontprofileid();
        $memory = $this->commonmodel->getjointbData('memories',array('profile_id'=>$profile_id,'memories.status'=>1,'memories.trash'=>0,'memories.feature_post'=>1), 'result_array','user_profile.profile_name,memories.id,memories.name,memories.memoryimage as image,memories.comment,memories.created_at as post_date,"memories" AS tablename,memories.updated_at,memories.status,memories.user_id',['user_profile','memories.profile_id=user_profile.id'],["memories.id","DESC"]);

        $timeline = $this->commonmodel->getjointbData('timeline',array('profile_id'=>$profile_id,'timeline.status'=>1,'timeline.trash'=>0,'timeline.feature_post'=>1), 'result_array','user_profile.profile_name,timeline.id,timeline.title as name,timeline.timeline_image as image,timeline.description as comment,timeline.created_at as post_date,"timeline" AS tablename,timeline.updated_at,timeline.status,timeline.user_id',['user_profile','timeline.profile_id=user_profile.id'],["timeline.id","DESC"]);

        $respect_post = $this->commonmodel->getjointbData('respect_post',array('profile_id'=>$profile_id,'respect_post.status'=>1,'respect_post.trash'=>0,'respect_post.feature_post'=>1), 'result_array','user_profile.profile_name,respect_post.id,respect_post.name,respect_post.respect_image as image,respect_post.comment,respect_post.created_at as post_date,"respect_post" AS tablename,respect_post.updated_at,respect_post.status,respect_post.user_id',['user_profile','respect_post.profile_id=user_profile.id'],["respect_post.id","DESC"]);

        $journal_post = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$profile_id,'journal_post.status'=>1,'journal_post.trash'=>0,'journal_post.feature_post'=>1), 'result_array','user_profile.profile_name,journal_post.id,journal_post.title as name,journal_post.image as image,journal_post.description as comment,journal_post.created_at as post_date,"journal_post" AS tablename,journal_post.updated_at,journal_post.status,journal_post.user_id',['user_profile','journal_post.profile_id=user_profile.id'],["journal_post.id","DESC"]);
        // echo $this->db->last_query();
        // print_r($timeline);
        // print_r($memory);
        $middelsection['feature_post'] = array_merge($memory,$timeline,$respect_post,$journal_post);
        // echo '<pre>';print_r($middelsection); exit();
        $price = array();
        foreach ($middelsection['feature_post'] as $key => $row)
        {
            $price[$key] = $row['updated_at'];
        }
        array_multisort($price, SORT_DESC, $middelsection['feature_post']);



        $body = $this->load->view('single-featurepost',['middelsection'=>$middelsection],true);
        // print_r($body);; exit();
        echo json_encode(array('status'=>true,'message'=>lang('featured_posts_delete_msg'),'body'=>$body));
    }

    function edit_featuredpost($id){
        $body = $this->commonmodel->getsingleDataobject('feature_post',['id'=>$id]);
        $body->post_date = date('d/m/Y',strtotime($body->post_date));
        echo json_encode(array('status'=>true,'body'=>$body));
    }


    function lifeofpost(){

        if(isset($_POST['submit'])){

            $postdata = $this->input->post();
            // print_r($postdata); exit();
            // print_r($_FILES); exit();
            // print_r(get_frontauthuser()['user_id']); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            if(isset($_FILES['lifeofpost_image']) && $_FILES['lifeofpost_image']['name']!=''){
                ;

                $filename = 'lifeof'.time();
                $config = array(
                    'upload_path' => './assets/frontend/uploads/',
                    'allowed_types' => "gif|jpg|png|jpeg",
                    'overwrite' => TRUE,
                    //'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    //'max_height' => "768",
                    //'max_width' => "1024",
                    'file_name' => $filename
                );
                $this->load->library('upload', $config);
                if($this->upload->do_upload('lifeofpost_image'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    // print_r($data); exit();
                    $postdata['images'] = $data['upload_data']['file_name'];
                    // $this->load->view('upload_success',$data);
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());
                    //print_r($error);
                    // $this->session->set_flashdata('error',implode(',',$error));
                    // $this->session->set_flashdata('lifeof_post',true);
                    echo json_encode(array('status'=>false,'message'=>implode(',',$error)));
                }
            }
            $postdata['post_date'] = date('Y-m-d');
            $postdata['shared_by'] = get_frontauthuser('user_id');
            $postdata['type'] = $postdata['title'];
            // $postdata['profile_id'] = $this->commonmodel->getsingleData('user_profile', array('user_id'=>$postdata['user_id']),'id,name',array('id','ASC'))['id'];

            unset($postdata['post_postedby']);
            unset($postdata['title']);
            unset($postdata['submit']);
            unset($postdata['lifeof_type']);
            unset($postdata['post_imageold']);
            unset($postdata['fileToUpload']);

            // print_r($postdata); exit();
            if(isset($postdata['lifeof_id']) && $postdata['lifeof_id']!=''){
                $lifeof_id = $postdata['lifeof_id'];
                unset($postdata['lifeof_id']);
                $resp = $lifeof_id;
                // echo get_frontauthuser('user_id'); exit();
                $this->commonmodel->updateAllData('life_of',['id'=>$lifeof_id],$postdata);
                $msg = lang('lifeof_update_msg');
            }else{
                unset($postdata['lifeof_id']);
                $resp = $this->commonmodel->insertData('life_of',$postdata);
                $msg = lang('lifeof_add_msg');
            }
            if($resp){
                // $result = $this->commonmodel->getsingleDataobject('life_of',array('id'=>$resp));
                $returndata['middelsection']['lifeof_post'] = $this->commonmodel->getjointbData('life_of',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','ASC'],null,'3');
                // echo get_frontprofileid();
                // print_r($returndata['middelsection']['lifeof_post']); exit();

                $body = $this->load->view('lifeof_postloop',$returndata,TRUE);
                // $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                echo json_encode(array('status'=>true,'message'=>$msg,'body'=>$body,'postid'=>$resp));

            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));

                // $this->session->set_flashdata('error',lang('try_again'));
            }
            // $this->session->set_flashdata('lifeof_post',true);
            // redirect('/');
            // print_r($postdata); exit();
        }
    }

    function editlifeofpost($id=''){
        if($id!=''){
            $resp = $this->commonmodel->getsingleData('life_of',array('id'=>$id));
            $resp['profile_name'] = get_userprofile($resp['profile_id'])->profile_name;
            $resp['profile_name'] = user_detail($resp['user_id'])->firstname.' '.user_detail($resp['user_id'])->lastname;

            $defaultimgename = 'lifeof_1';
            if($resp['type']=='Early life'){
                $defaultimgename = 'lifeof_1';
            }elseif($resp['type']=='Personal life'){
                $defaultimgename = 'lifeof_2';
            }elseif($resp['type']=='career'){
                $defaultimgename = 'lifeof_3';
            }

            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['images']) && $resp['images']!='') ? $resp['images']  : get_defaultimage()->$defaultimgename);
            $resp['image_url'] = UploadStorage::url( $resp['images'], get_defaultimage()->$defaultimgename);

            $resp['tablename'] = 'life_of';
            $resp['name'] = $resp['type'];
            $resp['likecount'] = postlike_helper($id,'life_of');

            $media_comment = respectpost_comment($id,'life_of');
            // print_r($media_comment); exit();
            $media_comment_countall = respectpost_comment($id,'life_of','all');
            $body = $this->load->view('other_comment',['media_comment'=>$media_comment],true);
            // 
            echo json_encode(array('status'=>true,'body'=>$resp,'comment_body'=>$body,'rowcount'=>count($media_comment_countall)));
        }else{
            echo json_encode(array('status'=>false));
        }
    }

    function updateprofileprivate($id=''){
        // print_r($_POST); exit();
        if($id!=''){
            $is_public = (isset($_POST['is_public']) && $_POST['is_public']!='') ? $_POST['is_public'] : 1;
            $this->commonmodel->updateAllData('user_profile',['id'=>$id],['is_public'=>$is_public]);
            $groupid = $this->commonmodel->getsingleData('user_profile',['id'=>$id]);

            return redirect('/familymember/'.$groupid['family_group_id']);
        }
        return redirect('/');
    }

    function editmemorypost($id=''){
        if($id!=''){
            $resp = $this->commonmodel->getsingleData('memories',array('id'=>$id));
            $resp['profile_name'] = $resp['name'];
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['memoryimage']) && $resp['memoryimage']!='') ? $resp['memoryimage'] : get_defaultimage()->memory);
            $resp['image_url'] = UploadStorage::url( $resp['memoryimage'], get_defaultimage()->memory);
            $resp['description'] = $resp['comment'];
            $resp['post_date'] = date_ymdformate($resp['created_at']);
            $resp['likecount'] = postlike_helper($id,'memories');
            $resp['tablename'] = 'memories';
            $resp['name'] = $resp['title'];
            // print_r($resp); exit();
            $media_comment = respectpost_comment($id,'memory_post');
            $media_comment_countall = respectpost_comment($id,'memory_post','all');
            $body = $this->load->view('other_comment',['media_comment'=>$media_comment],true);
            echo json_encode(array('status'=>true,'body'=>$resp,'comment_body'=>$body,'rowcount'=>count($media_comment_countall)));
        }else{
            echo json_encode(array('status'=>false));
        }
    }

    function edittimelinepost($id=''){
        if($id!=''){
            $resp = $this->commonmodel->getsingleData('timeline',array('id'=>$id));
            $resp['profile_name'] = get_userprofile($resp['profile_id'])->profile_name;
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['timeline_image']) && $resp['timeline_image']!='') ? $resp['timeline_image']  : '300x370.png');
            $resp['image_url'] = UploadStorage::url( $resp['timeline_image'], '300x370.png');

            if($resp['to_date']!='' && $resp['to_date']!='0000-00-00'){
            $resp['from_todate'] = ' ('.date_dmyfullformat($resp['from_date']).' to '.date_dmyfullformat($resp['to_date']).')';
            }else{
                $resp['from_todate'] = ' ('.date_dmyfullformat($resp['from_date']).')';;
            }

            $resp['likecount'] = postlike_helper($id,'timeline');
            $resp['tablename'] = 'timeline';

            $media_comment = respectpost_comment($id,'timeline');
            $media_comment_countall = respectpost_comment($id,'timeline','all');
            $resp['body'] = $this->load->view('other_comment',['media_comment'=>$media_comment],true);

            echo json_encode(array('status'=>true,'body'=>$resp,'rowcount'=>count($media_comment_countall)));
        }else{
            echo json_encode(array('status'=>false));
        }
    }

    function timelinepost_delete($id=''){

        if($id!=''){

            $postdata = $this->input->post();

            $resp = $this->commonmodel->updateAllData('timeline',['id'=>$id],['trash'=>1]);
            if($resp){
                $returndata['middelsection']['timeline_post'] = $this->commonmodel->getjointbData('timeline',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);
                // print_r($returndata['middelsection']['memories_post']); exit();
                $body = $this->load->view('timeline_post',$returndata,TRUE);

                echo json_encode(array('status'=>true,'message'=>lang('timeline_delete_success'),'body'=>$body,'postid'=>$resp));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function delete_commentpost($id=''){
        if($id!=''){
            $resp_count = $this->db->query("SELECT count(*) as countid from comment_post where post_id = (SELECT post_id FROM `comment_post` where id = $id) and post_type like (SELECT post_type FROM `comment_post` where id = $id)")->row()->countid;
            $this->commonmodel->deleteData('comment_post','id',$id);
            echo json_encode(array('status'=>true,'message'=>lang('remove_comment_success'),'resp_count'=>($resp_count-1)));
        }
    }

    function respectpost_delete($id=''){

        if($id!=''){
            $postdata = $this->input->post();
            $resp = $this->commonmodel->updateAllData('respect_post',['id'=>$id],['trash'=>1]);
            $this->session->set_flashdata('respect_postpopup',true);
            if($resp){
                $returndata['middelsection']['respect_post'] = $this->commonmodel->getAllDataArray('respect_post',array('profile_id'=>get_frontprofileid(),'trash'=>0), "id","DESC");


                $body = $this->load->view('respect_post',$returndata,TRUE);
                //$returndata['middelsection']['respect_post'] = $this->commonmodel->getjointbData('respect_post',array('profile_id'=>get_frontprofileid(),'status'=>1,'trash'=>0),'result','*',null,['id','DESC']);
                // print_r($returndata['middelsection']['memories_post']); exit();
                // $body = $this->load->view('respect_post',$returndata,TRUE);
                // recired('/');
                echo json_encode(array('status'=>true,'message'=>lang('respect_delete_success'),'body'=>$body));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function journalpost_delete($id=''){

        if($id!=''){

            $postdata = $this->input->post();

            $resp = $this->commonmodel->updateAllData('journal_post',['id'=>$id],['trash'=>1]);
            if(1){
                $this->session->set_flashdata('journal_postpopup',true);
                $returndata['middelsection']['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid(),'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null);

                $returndata['middelsection']['journal_postslider'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid(),'journal_post.trash'=>0,'is_public'=>1),'result','*',null,['id','DESC'],null,8);

                $body = $this->load->view('journal-post-new',$returndata,TRUE);
                //$returndata['middelsection']['journal_postslider'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid()),'result','*',null,['id','DESC'],null,8);
                //$returndata['middelsection']['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid(),'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null);
                // print_r($returndata); exit();
                // print_r($returndata['middelsection']['memories_post']); exit();

                echo json_encode(array('status'=>true,'message'=>lang('journal_delete_success'),'body'=>$body,'postid'=>$resp));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function journalpost_view($id=''){

        if($id!=''){

            $resp = $this->commonmodel->getsingleData('journal_post',array('id'=>$id));
            // print_r($resp); exit();
            $resp['profile_name'] = user_detail($resp['user_id'])->firstname.' '.user_detail($resp['user_id'])->lastname;
            $imgedefaultpath = ($resp['category']) ? 'journal_'.$resp['category'] : 'profile_img';
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['image']) && $resp['image']!='') ? $resp['image']  : get_defaultimage()->$imgedefaultpath);
            $resp['image_url'] = UploadStorage::url( $resp['image'], get_defaultimage()->$imgedefaultpath);

            $resp['postdate'] = date('d/m/y',strtotime($resp['created_at']));
            $journal_comment = respectpost_comment($id,'journal_post');
            $resp['journalcomment'] = $this->load->view('journal_comment',['journal_comment'=>$journal_comment],true);
            // print_r($resp); exit();
            echo json_encode(array('status'=>true,'body'=>$resp,'rowcount'=>count(respectpost_comment($id,'journal_post','all'))));
        }else{
            echo json_encode(array('status'=>false));
        }

    }



    function journalpost_view_limit($id='',$limit=4){

        if($id!=''){

            $resp = $this->commonmodel->getsingleData('journal_post',array('id'=>$id));
            // print_r($resp); exit();
            $resp['profile_name'] = get_userprofile($resp['profile_id'])->profile_name;
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['image']) && $resp['image']!='') ? $resp['image']  : '300x370.png');
            $resp['image_url'] = UploadStorage::url( $resp['image'], '300x370.png');
            $resp['postdate'] = date('d/m/y',strtotime($resp['created_at']));
            $journal_comment = respectpost_comment($id,'journal_post',$limit);
            // print_r($journal_comment); exit();
            $resp['journalcomment'] = $this->load->view('journal_comment',['journal_comment'=>$journal_comment],true);
            // print_r($resp); exit();
            echo json_encode(array('status'=>true,'body'=>$resp));
        }else{
            echo json_encode(array('status'=>false));
        }

    }



    function memoriespost(){
        if(isset($_POST['submit'])){
            // print_r($_POST); exit();
            $postdata = $this->input->post();
            $profile_id = $postdata['profile_id'];
            $postdata['status'] = 0;
            $this->db->where('id', $profile_id);
            $q = $this->db->get('user_profile');
            $get_user_by_profile = $q->result_array();
            $uid = $logged_user = "";
            if(!empty($get_user_by_profile))
            {
                $uid = $get_user_by_profile[0]['user_id'];
            }
            if(checkauth()){
                $logged_user = get_frontauthuser()['user_id'];
                $postdata['user_id'] = get_frontauthuser()['user_id'];
            }
            //print_r($postdata); exit();
            // print_r(get_frontauthuser()['user_id']); exit();



            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('memoryimage' ) ){
                try{
                    if(checkauth()){
                        $postdata['memoryimage'] = UploadStorage::store( 'memoryimage', $postdata['user_id'] );
                    }else{
                        $postdata['memoryimage'] = UploadStorage::store( 'memoryimage', $uid );
                    }
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'	=> false,
                        'message'	=> $exception->getMessage(),
                    ]);
                    exit;
                }
            }

            // $postdata['profile_id'] = $this->commonmodel->getsingleData('user_profile', array('user_id'=>$postdata['user_id']),'id,name',array('id','ASC'))['id'];

            // print_r($postdata); exit();
            unset($postdata['submit']);
            unset($postdata['fileToUpload']);
            // unset($postdata['lifeof_type']);
            $user_role = $warden_user = 0;
            if(checkauth()){
                $frontusersessiondetail = $this->session->userdata("frontuserdetail");
            $user_role = $this->session->userdata("frontuserdetail")["user_id"];
            $warden_user = (isset($frontusersessiondetail["warden_user_id"]) && $frontusersessiondetail["warden_user_id"]!='') ? $frontusersessiondetail["warden_user_id"] : 0;
                // $this->session->userdata("frontuserdetail")["warden_user_id"];
            }
            
            if($user_role == '2' && $warden_user == '1' && in_array($postdata['profile_id'], get_userprofile_ids())){
                $postdata['status'] = 1;
            }

            if($logged_user == $uid){
                $postdata['status'] = 1;
            }

            if(isset($postdata['memory_id']) && $postdata['memory_id']!=''){
                unset($postdata['memory_id']);
                $resp = $this->commonmodel->updateAllData('memories',['id'=>$postdata['memory_id']],$postdata);
                $msg = lang('memory_update_success');
                $resp = true;
            }else{
                $resp = $this->commonmodel->insertData('memories',$postdata);
                if($postdata['status'] == 0){
                    $msg = lang('addedsuccess_msg_without_login');
                }else{
                    $msg = lang('addedsuccess_msg');
                }
            
            }

            if(!checkauth()){
                $msg = lang('addedsuccess_msg_without_login');
            }
            if($resp){
                $returndata['middelsection']['memories_post'] = $this->commonmodel->getjointbData('memories',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);

                $body = $this->load->view('memories_postdata',$returndata,TRUE);
                // $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                echo json_encode(array('status'=>true,'message'=>$msg,'body'=>$body,'postid'=>$resp));

                // $this->session->set_flashdata('success',lang('addedsuccess_msg'));

            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
            // $this->session->set_flashdata('memoryimage_post',true);
            // redirect('/');
            // print_r($postdata); exit();
        }
    }

    function memoriespost_delete($id=''){

        if($id!=''){


            removepostimages(['id'=>$id],'memories','memoryimage');
            $resp = $this->commonmodel->deleteData('memories','id',$id);
            if($resp){
                $returndata['middelsection']['memories_post'] = $this->commonmodel->getjointbData('memories',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);
                // print_r($returndata['middelsection']['memories_post']); exit();
                $body = $this->load->view('memories_postdata',$returndata,TRUE);

                echo json_encode(array('status'=>true,'message'=>lang('memory_delete_success'),'body'=>$body,'postid'=>$resp));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }
    function set_coverphotopost(){
        if(isset($_POST['id']) && $_POST['id']!=''){
            $id = $_POST['id'];
            $album_id = $_POST['album_id'];
            $profile_id = get_frontprofileid();
            // $postdata = $this->input->post();

            $this->commonmodel->updateAllData('media_images',['album_id'=>$album_id],['set_coverphoto'=>0]);
            $resp = $this->commonmodel->updateAllData('media_images',['id'=>$id],['set_coverphoto'=>1]);
            // echo $this->db->last_query(); exit();
            if($resp){

                /*$album_count = $this->db->select('album_id')->where(['trash'=>0,'status'=>1])->group_by('album_id')->get('media_images')->num_rows();
                /*album_id FROM media_images group by album_id
                $returndata['middelsection']['media_data'] = $this->db->query("select media_images.id,media_images.user_id,media_images.profile_id,album_id,`image`,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images JOIN media_album ON media_images.album_id=media_album.id  where album_id IN (select GROUP_CONCAT(album_id) FROM media_images group by album_id) order by set_coverphoto desc limit $album_count")->result();
                */
                $media_data = [];
                $media_album_data = $this->commonmodel->getjointbData('media_album',['media_album.profile_id'=>$profile_id],'result','media_album.title,media_album.caption,media_album.id as albumid',['media_images',' media_album.id=media_images.album_id'],['media_album.id','DESC'],'media_album.id');
                // echo $this->db->last_query(); exit();
                foreach($media_album_data as $m => $album_value){
                    // print_r($album_value); exit();
                    // echo $album_value->title; exit();
                    $media_image_data = $this->commonmodel->getjointbData('media_images',['media_images.profile_id'=>$profile_id,'album_id'=>$album_value->albumid],'row','media_album.title,media_album.caption,media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto',['media_album',' media_album.id=media_images.album_id'],['set_coverphoto','DESC'],null,1);
                    $returndata['middelsection']['media_data'][$m] = $media_image_data;

                }
                /*$returndata['middelsection']['media_data'] =
                $this->db->query("SELECT media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images join media_album on media_images.album_id=media_album.id where media_images.trash=0 and media_images.status=1 and media_images.profile_id=$profile_id group by media_images.album_id
order by set_coverphoto desc,media_images.id desc")->result();
//$this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.status'=>1,'media_images.profile_id'=>$profile_id],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);
                */
                $body = $this->load->view('media_gallery-new',$returndata,TRUE);

                echo json_encode(array('status'=>true,'message'=>lang('media_setcover_success'),'body'=>$body));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }else{
            echo json_encode(array('status'=>false,'message'=>lang('try_again')));
            // $this->session->set_flashdata('error',lang('try_again'));
        }
    }
    function mediapost_delete($id=''){
        if($id!=''){
            $profile_id = get_frontprofileid();
            $postdata = $this->input->post();

            $resp = $this->commonmodel->deleteData('media_album','id',$id);
            if($resp){
                // $album_count = $this->db->select('album_id')->where(['trash'=>0,'status'=>1])->group_by('album_id')->get('media_images')->num_rows();
                /*album_id FROM media_images group by album_id*/
                // $returndata['middelsection']['media_data'] = $this->db->query("select media_images.id,media_images.user_id,media_images.profile_id,album_id,`image`,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images JOIN media_album ON media_images.album_id=media_album.id  where album_id IN (select GROUP_CONCAT(album_id) FROM media_images group by album_id) order by set_coverphoto desc limit $album_count")->result();
                $returndata = array();
                $media_album_data = $this->commonmodel->getjointbData('media_album',['media_album.profile_id'=>$profile_id],'result','media_album.title,media_album.caption,media_album.id as albumid',['media_images',' media_album.id=media_images.album_id'],['media_album.id','DESC'],'media_album.id');
                // echo $this->db->last_query(); exit();
                foreach($media_album_data as $m => $album_value){
                    // print_r($album_value); exit();
                    // echo $album_value->title; exit();
                    $media_image_data = $this->commonmodel->getjointbData('media_images',['media_images.profile_id'=>$profile_id,'album_id'=>$album_value->albumid],'row','media_album.title,media_album.caption,media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto',['media_album',' media_album.id=media_images.album_id'],['set_coverphoto','DESC'],null,1);
                    $returndata['media_data'][$m] = $media_image_data;
                    
                }
                $returndatasection['middelsection'] = $returndata;

                //$returndata['middelsection']['media_data'] = $this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.profile_id'=>$profile_id],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);

                //$returndata['middelsection']['memories_post'] = $this->commonmodel->getjointbData('memories',array('profile_id'=>get_frontprofileid(),'status'=>1,'trash'=>0),'result','*',null,['id','DESC']);
                // print_r($returndata['middelsection']['memories_post']); exit();
                $body = $this->load->view('media_gallery',$returndatasection,TRUE);

                echo json_encode(array('status'=>true,'message'=>lang('media_delete_success'),'body'=>$body));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function mediapost_imagedelete(){
        if(isset($_POST['id']) && $_POST['id']!=''){
            $id=$_POST['id'];
            $album=$_POST['album_id'];
            $profile_id = get_frontprofileid();
            $postdata = $this->input->post();

            $resp = $this->commonmodel->deleteData('media_images','id',$id);
            if($resp){

                $result = $this->commonmodel->getjointbData('media_images',['album_id'=>$album],'result');
                $body = $this->load->view('single-image',['singleimage'=>$result],true);
                echo json_encode(['status'=>true,'data'=>$body,'message'=>'found succefully']);

                // $body = $this->load->view('media_gallery',$returndata,TRUE);

                // echo json_encode(array('status'=>true,'message'=>lang('media_delete_success'),'body'=>$body));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function mediapost_albumdelete(){
        if(isset($_POST['id']) && $_POST['id']!=''){
            // print_r($_POST); exit();
            $id=$_POST['id'];
            $album=$_POST['album_id'];
            $profile_id = get_frontprofileid();
            $postdata = $this->input->post();

            $resp = $this->commonmodel->deleteData('media_album','id',$id);
            if($resp){

                $returndata = array();
                $media_album_data = $this->commonmodel->getjointbData('media_album',['media_album.profile_id'=>$profile_id],'result','media_album.title,media_album.caption,media_album.id as albumid',['media_images',' media_album.id=media_images.album_id'],['media_album.id','DESC'],'media_album.id');
                // echo $this->db->last_query(); exit();
                foreach($media_album_data as $m => $album_value){
                    // print_r($album_value); exit();
                    // echo $album_value->title; exit();
                    $media_image_data = $this->commonmodel->getjointbData('media_images',['media_images.profile_id'=>$profile_id,'album_id'=>$album_value->albumid],'row','media_album.title,media_album.caption,media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto',['media_album',' media_album.id=media_images.album_id'],['set_coverphoto','DESC'],null,1);
                    $returndata['media_data'][$m] = $media_image_data;
                    
                }
                $returndatasection['middelsection'] = $returndata;
                //$returndata['middelsection']['media_data'] = $this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.profile_id'=>$profile_id],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);

                $htmldata = $this->load->view('media_gallery-new',$returndatasection,true);

                //$result = $this->commonmodel->getjointbData('media_images',['album_id'=>$album],'result');
                //$body = $this->load->view('single-image',['singleimage'=>$result],true);
                $media_album = $this->commonmodel->getAllDataArray('media_album',['user_id'=>get_frontauthuser('user_id'),'profile_id'=>get_frontprofileid()],'id','desc');
                $option_html = '<option value="">'.lang('select_album').'</a>';
                if(isset($media_album) && !empty($media_album)){
                    foreach($media_album as $album_val){
                    $option_html .= '<option value="'.$album_val->id.'">'.ucfirst($album_val->title).'</a>';
                    }
                }

                echo json_encode(['status'=>true,'data'=>$htmldata,'album_data'=>$option_html,'message'=>'found succefully']);

                // $body = $this->load->view('media_gallery',$returndata,TRUE);

                // echo json_encode(array('status'=>true,'message'=>lang('media_delete_success'),'body'=>$body));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function memoriespost_edit($id=''){

        if($id!=''){

            $postdata = $this->input->post();

            $resp = $this->commonmodel->getsingleData('memories',['id'=>$id]);
            if($resp){

                echo json_encode(array('status'=>true,'body'=>$resp));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('no_record_found')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function profile_timelinepost(){

        if(isset($_POST['submit'])){
            // print_r($_POST); exit();
            $postdata = $this->input->post();
            // print_r($postdata);
            // print_r($_FILES); exit();
            // print_r(get_frontauthuser()['user_id']); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];


            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('timelineimage' ) ){
                try{
                    $postdata['timeline_image'] = UploadStorage::store( 'timelineimage', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'	=> false,
                        'message'	=> $exception->getMessage(),
                    ]);
                    exit;
                }
            }

            // $postdata['profile_id'] = $this->commonmodel->getsingleData('user_profile', array('user_id'=>$postdata['user_id']),'id,name',array('id','ASC'))['id'];
            $postdata['from_date'] = date_ymdformate(str_replace('/','-',$postdata['from_date']));
            $postdata['to_date'] = (isset($postdata['to_date']) && $postdata['to_date']!='') ? date_ymdformate(str_replace('/','-',$postdata['to_date'])) : '';
            // print_r($postdata); exit();
            unset($postdata['submit']);
            unset($postdata['fileToUpload']);
            // unset($postdata['lifeof_type']);
            $resp = $this->commonmodel->insertData('timeline',$postdata);
            if($resp){
                // $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                $returndata['middelsection']['timeline_post'] =
                $this->commonmodel->getjointbData('timeline',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['from_date','ASC']);

                $body = $this->load->view('timeline_post',$returndata,TRUE);

                echo json_encode(array('status'=>true,'message'=>lang('timeline_added_success'),'body'=>$body));
            }else{
                echo json_encode(array('status'=>true,'message'=>lang('try_again')));
            }
            // $this->session->set_flashdata('timelineimage_post',true);
            // redirect('/');
            // print_r($postdata); exit();
        }
    }

    function respect_post(){

        if(isset($_POST['submit'])){

            $postdata = $this->input->post();
            // print_r(get_userprofile_ids());
            // echo get_frontauthuser()['user_id'];
            // echo get_frontauthuser('warden_user_id');
            // // print_r(get_frontauthuser()['user_id']); exit();
            $postdata['status'] = 0;
            if(checkauth()){
                $postdata['user_id'] = get_frontauthuser()['user_id'];
                if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') && in_array($postdata['profile_id'], get_userprofile_ids()) || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id')) && in_array($postdata['profile_id'], get_userprofile_ids())){
                    $postdata['status'] = 1;
                }

            }

            // print_r($postdata); 
            // exit();
            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('respect_image' ) ){
                try{
                    $postdata['respect_image'] = UploadStorage::store( 'respect_image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'	=> false,
                        'message'	=> $exception->getMessage(),
                    ]);
                    exit;
                }
            }

            unset($postdata['submit']);
            unset($postdata['fileToUpload']);


            // print_r($postdata); exit();
            // unset($postdata['lifeof_type']);
            $resp = $this->commonmodel->insertData('respect_post',$postdata);
            $this->session->set_flashdata('respect_postpopup',true);
            // print_r($this->session->flashdata()); exit();
            if($resp){
                $returndata['middelsection']['respect_post'] =
                $this->commonmodel->getjointbData('respect_post',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);

                $body = $this->load->view('respect_post',$returndata,TRUE);
                $msg_success = '';
                if(checkauth() && $postdata['status']==1){
                    $msg_success = lang('respect_added_success');
                }else{
                    $msg_success = lang('respect_added_success_without_login');
                }
                // $this->session->set_flashdata('respectpost','truerespectpost');
                echo json_encode(array('status'=>true,'message'=>$msg_success,'body'=>$body,'postcount'=>count($returndata['middelsection']['respect_post'])));
            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
            // $this->session->set_flashdata('respectflashsession_post',true);
            // redirect('/');
            // print_r($postdata); exit();
        }
    }


    function journal_post(){

        if(isset($_POST['submit'])){
            $postdata = $this->input->post();

            $postdata['user_id'] = get_frontauthuser()['user_id'];
            $postdata['status'] = 0;
            if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id'))){
                    $postdata['status'] = 1;
                }

            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('image' ) ){
                try{
                    $postdata['image'] = UploadStorage::store( 'image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'	=> false,
                        'message'	=> $exception->getMessage(),
                    ]);
                    exit;
                }
            }


            $postdata['category'] = $postdata['journal_category'];
            $postdata['save_status'] = ($postdata['submit']=='save') ? 1 : 2;
            unset($postdata['journal_category']);
            unset($postdata['submit']);
            unset($postdata['fileToUpload']);
            $resp = $this->commonmodel->insertData('journal_post',$postdata);
            if($resp){
                $returndata['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$postdata['profile_id'],'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null);
                // $returndata['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$postdata['profile_id'],'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null,'4');
                $returndata['journal_postslider'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$postdata['profile_id']),'result','*',null,['id','DESC'],null,8);
                $body = '';
                $bodyjournal_data = $this->load->view('journal-post-new',['middelsection'=>$returndata],true);

                //$body .='</div>';
                //$body = $this->load->view('journal_post',['middelsection'=>$returndata],TRUE);
                $this->session->set_flashdata('journal_postpopup',true);
                $bodyhtml = '';
                echo json_encode(array('status'=>true,'message'=>lang('journal_added_success'),'body'=>$bodyjournal_data,'bodyhtml'=>$bodyhtml));
                // $this->session->set_flashdata('success',lang('addedsuccess_msg'));

            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
            // $this->session->set_flashdata('journalflashsession_post',true);
            // redirect('/');
            // print_r($postdata); exit();
        }
    }


    /* edit post function */
    function journal_post_edit(){

        if(isset($_POST['submit'])){
            
            // print_r(get_userprofile($_POST['profile_id'])->profile_url);exit();
            $postdata = $this->input->post();

            $postdata['user_id'] = get_frontauthuser()['user_id'];
            $postdata['status'] = 0;
            if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id'))){
                    $postdata['status'] = 1;
                }

            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('image' ) ){
                try{
                    $postdata['image'] = UploadStorage::store( 'image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'    => false,
                        'message'   => $exception->getMessage(),
                    ]);
                    exit;
                }
            }
            // echo '<pre>';
            // print_r($postdata); exit;
            $postdata['category'] = $postdata['journal_category'];
            $postdata['save_status'] = ($postdata['submit']=='save') ? 1 : 2;
            unset($postdata['journal_category']);
            unset($postdata['submit']);
            unset($postdata['fileToUpload']);
            unset($postdata['journalpost_id']);
            $resp = $this->commonmodel->updateAllData('journal_post',['id'=>$_POST['journalpost_id']],$postdata);
            if($resp){
                $returndata['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$postdata['profile_id'],'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null);
                // $returndata['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$postdata['profile_id'],'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null,'4');
                $returndata['journal_postslider'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>$postdata['profile_id']),'result','*',null,['id','DESC'],null,8);
                $body = '';
                $bodyjournal_data = $this->load->view('journal-post-new',['middelsection'=>$returndata],true);

                $this->session->set_flashdata('journal_postpopup',true);
                $bodyhtml = '';
                //echo json_encode(array('status'=>true,'message'=>lang('journal_added_success'),'body'=>$bodyjournal_data,'bodyhtml'=>$bodyhtml));
                $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);

            }else{
                // echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function timeline_post_edit(){

        if(isset($_POST['submit'])){
            $postdata = $this->input->post();

            $postdata['user_id'] = get_frontauthuser()['user_id'];
            $postdata['status'] = 0;
            if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id'))){
                    $postdata['status'] = 1;
                }

            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('image' ) ){
                try{
                    $postdata['timeline_image'] = UploadStorage::store( 'image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'    => false,
                        'message'   => $exception->getMessage(),
                    ]);
                    exit;
                }
            }
            // echo '<pre>';
            // print_r($postdata); exit;
            unset($postdata['submit']);
            // unset($postdata['fileToUpload']);
            unset($postdata['timelinepost_id']);
            $resp = $this->commonmodel->updateAllData('timeline',['id'=>$_POST['timelinepost_id']],$postdata);
            if($resp){
                $returndata['middelsection']['timeline_post'] =
                $this->commonmodel->getjointbData('timeline',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['from_date','ASC']);

                $body = $this->load->view('timeline_post',$returndata,TRUE);
                $this->session->set_flashdata('timelineimage_post',true);
                $bodyhtml = '';
                //echo json_encode(array('status'=>true,'message'=>lang('journal_added_success'),'body'=>$bodyjournal_data,'bodyhtml'=>$bodyhtml));
                $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);

            }else{
                // echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);
                // $this->session->set_flashdata('error',lang('try_again'));
            }
            // $this->session->set_flashdata('journalflashsession_post',true);
            // redirect('/');
            // print_r($postdata); exit();
        }
    }

    function respect_post_edit(){

        if(isset($_POST['submit'])){
            $postdata = $this->input->post();
            //print_r($postdata); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            $postdata['status'] = 0;
            if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id'))){
                    $postdata['status'] = 1;
                }

            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('image' ) ){
                try{
                    $postdata['respect_image'] = UploadStorage::store( 'image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'    => false,
                        'message'   => $exception->getMessage(),
                    ]);
                    exit;
                }
            }
            unset($postdata['submit']);
            unset($postdata['respectpost_id']);
            $resp = $this->commonmodel->updateAllData('respect_post',['id'=>$_POST['respectpost_id']],$postdata);
            if($resp){
                $this->session->set_flashdata('respectflashsession_post',true);
                $bodyhtml = '';
                $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);

            }else{
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);
            }
        }
    }

    function mediaimage_post_edit(){

        if(isset($_POST['submit'])){
            $postdata = $this->input->post();
            // print_r($postdata); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            $postdata['status'] = 0;
            if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id'))){
                    $postdata['status'] = 1;
                }

            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('image' ) ){
                try{
                    $postdata['respect_image'] = UploadStorage::store( 'image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'    => false,
                        'message'   => $exception->getMessage(),
                    ]);
                    exit;
                }
            }
            unset($postdata['submit']);
            unset($postdata['mediapost_id']);
            $resp = $this->commonmodel->updateAllData('media_images',['id'=>$_POST['mediapost_id']],$postdata);
            if($resp){
                $this->session->set_flashdata('mediaflashsession_post',true);
                $bodyhtml = '';
                $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);

            }else{
                // echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function mediaalbum_post_edit(){

        if(isset($_POST['submit'])){
            $postdata = $this->input->post();
            // print_r($postdata); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            // $postdata['status'] = 0;
            // if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id'))){
            //         $postdata['status'] = 1;
            //     }

            
            unset($postdata['submit']);
            unset($postdata['mediapost_id']);
            $resp = $this->commonmodel->updateAllData('media_album',['id'=>$_POST['mediapost_id']],$postdata);
            if($resp){
                $this->session->set_flashdata('mediaflashsession_post',true);
                $bodyhtml = '';
                $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);

            }else{
                // echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function memory_post_edit(){

        if(isset($_POST['submit'])){
            $postdata = $this->input->post();
            // print_r($_POST); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            $postdata['status'] = 1;
            if((get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') || (get_frontauthuser('user_id')!='' && get_frontauthuser('user_id'))){
                    $postdata['status'] = 1;
                }

            /**
             * If there is any file uploaded, then store it using UploadStorage.
             */
            if( StorageUploadedFile::exists('image' ) ){
                try{
                    $postdata['memoryimage'] = UploadStorage::store( 'image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'    => false,
                        'message'   => $exception->getMessage(),
                    ]);
                    exit;
                }
            }
            // echo '<pre>';
            // print_r($postdata); exit;
            unset($postdata['submit']);
            // unset($postdata['fileToUpload']);
            unset($postdata['memorypost_id']);
            $resp = $this->commonmodel->updateAllData('memories',['id'=>$_POST['memorypost_id']],$postdata);
            if($resp){
                $returndata['middelsection']['memories_post'] = $this->commonmodel->getjointbData('memories',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);
                $body = $this->load->view('memories_postdata',$returndata,TRUE);

                $this->session->set_flashdata('memoryimage_post',true);
                $bodyhtml = '';

                $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);

            }else{
                // echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                return redirect('/?profile='.get_userprofile($_POST['profile_id'])->profile_url);
                // $this->session->set_flashdata('error',lang('try_again'));
            }
            // $this->session->set_flashdata('journalflashsession_post',true);
            // redirect('/');
            // print_r($postdata); exit();
        }
    }

    /* edit post function end */

    function setfeaturepost(){

        if(isset($_POST['id'])){

            $postdata = $this->input->post();
            // print_r($postdata); exit();
            $userid = (get_frontauthuser('warden_user_id')>0 && get_frontauthuser('warden_user_id')!='') ? get_frontauthuser('warden_user_id') : get_frontauthuser('user_id');
            if($postdata['table']=='memories'){
                if($postdata['status']=='1'){
                    $update_data['memory_ispublic']=1;
                }
                $update_data['feature_post']=$postdata['status'];
                $update_data['feature_postby']=$userid;
            }else{
                $update_data = ['feature_post'=>$postdata['status'],'feature_postby'=>$userid];
            }
            $resp = $this->commonmodel->updateAllData($postdata['table'],['id'=>$postdata['id']],$update_data);
            if(1){
                $body = '';
                $msg ='';
                if($postdata['table']=='memories'){
                    $returndata['middelsection']['memories_post'] = $this->commonmodel->getjointbData('memories',array('profile_id'=>get_frontprofileid(),'status'=>1,'trash'=>0),'result','*',null,['id','DESC']);

                    $body = $this->load->view('memories_postdata',$returndata,TRUE);
                }elseif($postdata['table']=='journal_post'){
                    $returndata['middelsection']['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid(),'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null,'');
                    $returndata['middelsection']['journal_postslider'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid()),'result','*',null,['id','DESC'],null,8);
                    // print_r($returndata); exit();
                    // print_r($returndata['middelsection']['memories_post']); exit();
                    $body = $this->load->view('journal_post',$returndata,TRUE);
                }elseif($postdata['table']=='timeline'){
                    $returndata['middelsection']['timeline_post'] = $this->commonmodel->getjointbData('timeline',array('profile_id'=>get_frontprofileid(),'status'=>1,'trash'=>0),'result','*',null,['id','DESC']);
                    // print_r($returndata['middelsection']['memories_post']); exit();
                    $body = $this->load->view('timeline_post',$returndata,TRUE);

                    echo json_encode(array('status'=>true,'message'=>lang('timeline_delete_success'),'body'=>$body,'postid'=>$resp));
                }elseif($postdata['table']=='respect_post'){
                    $returndata['middelsection']['respect_post'] = $this->commonmodel->getjointbData('respect_post',array('profile_id'=>get_frontprofileid(),'status'=>1,'trash'=>0),'result','*',null,['id','DESC']);
                    // print_r($returndata['middelsection']['memories_post']); exit();
                    $body = $this->load->view('respect_post',$returndata,TRUE);

                    echo json_encode(array('status'=>true,'message'=>lang('respect_delete_success'),'body'=>$body,'postid'=>$resp));
                }else{
                    echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                    // $this->session->set_flashdata('error',lang('try_again'));
                }
                echo json_encode(array('status'=>true,'message'=>lang('updatesuccess_msg'),'body'=>$body,'postid'=>$resp));


            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
                // $this->session->set_flashdata('error',lang('try_again'));
            }
        }
    }

    function featurepostdata(){
        if(isset($_POST) && !empty($_POST)){
            // print_r($_POST); exit();
            $id =$postid = $_POST['id'];
            $tablename = $_POST['tablename'];
            if($_POST['tablename']=='memories'){
                $resp = $this->commonmodel->getsingleData('memories',array('id'=>$id),'id,profile_id,user_id,name,memoryimage,comment as description,date_format(created_at, "%d/%m/%Y") as post_date,feature_postby');
                $resp['profile_name'] = user_detail($resp['feature_postby'])->firstname.' '.user_detail($resp['feature_postby'])->lastname;
                // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['memoryimage']) && $resp['memoryimage']!='' && $resp['memoryimage']!='undefined') ? $resp['memoryimage']  : get_defaultimage()->profile_img);
                $resp['image_url'] = UploadStorage::url( $resp['memoryimage'], get_defaultimage()->profile_img);
                $resp['likecount'] = postlike_helper($postid,$tablename);

                $media_comment = respectpost_comment($_POST['id'],'memory_post');
                // print_r($journal_comment);
                $commentbody = $this->load->view('other_comment',['media_comment'=>$media_comment],true);
                //$this->session->set_flashdata('journal_postpopup',true);
                // redirect('/');
                //echo json_encode(array('status'=>true,'message'=>'Added Successfully','comment_text'=>$comment_result['comment'],'body'=>$body,'rowcount'=>count(respectpost_comment($_POST['postid'],$postdata['post_type'],'all'))));

                echo json_encode(array('status'=>true,'body'=>$resp,'comment_body'=>$commentbody,'rowcount'=>count(respectpost_comment($_POST['id'],'memory_post','all'))));

            }elseif($_POST['tablename']=='timeline'){
                $resp = $this->commonmodel->getsingleData('timeline',array('id'=>$id),'id,profile_id,user_id,title as name,timeline_image,description as description,date_format(created_at, "%d/%m/%Y") as post_date,feature_postby');
                $resp['profile_name'] = user_detail($resp['feature_postby'])->firstname.' '.user_detail($resp['feature_postby'])->lastname;
                // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['timeline_image']) && $resp['timeline_image']!='' && $resp['timeline_image']!='undefined') ? $resp['timeline_image']  : get_defaultimage()->profile_img);
                $resp['image_url'] = UploadStorage::url( $resp['timeline_image'], get_defaultimage()->profile_img);
                $resp['likecount'] = postlike_helper($postid,$tablename);

                $media_comment = respectpost_comment($_POST['id'],'timeline');
                $commentbody = $this->load->view('other_comment',['media_comment'=>$media_comment],true);
                echo json_encode(array('status'=>true,'body'=>$resp,'comment_body'=>$commentbody,'rowcount'=>count(respectpost_comment($_POST['id'],'timeline','all'))));
            }elseif($_POST['tablename']=='respect_post'){
                $resp = $this->commonmodel->getsingleData('respect_post',array('id'=>$id),'id,profile_id,user_id,name,respect_image,comment as description,date_format(created_at, "%d/%m/%Y") as post_date,feature_postby');
                $resp['profile_name'] = user_detail($resp['feature_postby'])->firstname.' '.user_detail($resp['feature_postby'])->lastname;
                // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['respect_image']) && $resp['respect_image']!='' && $resp['respect_image']!='undefined') ? $resp['respect_image']  : get_defaultimage()->profile_img);
                $resp['image_url'] = UploadStorage::url( $resp['respect_image'], get_defaultimage()->profile_img);
                $resp['likecount'] = postlike_helper($postid,$tablename);

                $media_comment = respectpost_comment($_POST['id'],'respect_post');
                $commentbody = $this->load->view('other_comment',['media_comment'=>$media_comment],true);

                echo json_encode(array('status'=>true,'body'=>$resp,'comment_body'=>$commentbody,'rowcount'=>count(respectpost_comment($_POST['id'],'respect_post','all'))));


            }elseif($_POST['tablename']=='journal_post'){
                $resp = $this->commonmodel->getsingleData('journal_post',array('id'=>$id),'id,profile_id,user_id,title as name,image,description as description,date_format(created_at, "%d/%m/%Y") as post_date,feature_postby');
                $resp['profile_name'] = user_detail($resp['feature_postby'])->firstname.' '.user_detail($resp['feature_postby'])->lastname;
                // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['image']) && $resp['image']!='' && $resp['image']!='undefined') ? $resp['image']  : get_defaultimage()->profile_img);
                $resp['image_url'] = UploadStorage::url( $resp['image'], get_defaultimage()->profile_img);
                $resp['likecount'] = postlike_helper($postid,$tablename);

                $media_comment = respectpost_comment($_POST['id'],'journal_post');
                $commentbody = $this->load->view('other_comment',['media_comment'=>$media_comment],true);

                echo json_encode(array('status'=>true,'body'=>$resp,'comment_body'=>$commentbody,'rowcount'=>count(respectpost_comment($_POST['id'],'respect_post','all'))));
            }else{
                echo json_encode(array('status'=>false,'message'=>lang('try_again')));
            }
        }else{
            echo json_encode(['status'=>false,'message'=>lang('input_field_required')]);
        }
    }

    function create_album(){
        if(!empty($_POST)){
            $_POST['user_id'] = get_frontauthuser('user_id');
            $_POST['profile_id'] = get_frontprofileid();
            // print_r($_POST); exit();
            $resp = $this->commonmodel->insertData('media_album',$_POST);
            $media_album = $this->commonmodel->getAllDataArray('media_album',['user_id'=>get_frontauthuser('user_id'),'profile_id'=>get_frontprofileid()],'id','desc');
            $option_html = '<option value="">'.lang('select_album').'</a>';
            if(isset($media_album) && !empty($media_album)){
                foreach($media_album as $album_val){
                $option_html .= '<option value="'.$album_val->id.'">'.ucfirst($album_val->title).'</a>';
                }
            }
            echo json_encode(['status'=>true,'message'=>lang('album_addedsuccess_msg'),'data'=>$option_html]);
        }else{
            echo json_encode(['status'=>true,'message'=>lang('input_field_required')]);
        }
    }

    private function set_upload_options($i)
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './assets/frontend/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|mp3|mp4|wma';
        $config['max_size']      = '0';
        $config['overwrite']     = FALSE;
        $config['file_name'] =  $i.'media_image'.time();
        return $config;
    }

    /**
     * @throws Exception
     */
    function media_image(){
        if(!empty($_POST)){
            
            $postdata = $_POST;
            $postdata['user_id'] = get_frontauthuser('user_id');
            $postdata['profile_id'] =$profile_id = get_frontprofileid();


            try{
                $uploaded_urls = UploadStorage::store('media_image', $postdata['user_id'], true);
            }catch (Exception $exception){
                echo json_encode([
                    'status' => true,
                    'message' => json_encode(['error' => $exception->getMessage()]),
                ]);
                exit;
            }

            unset($postdata['submit']);
            unset($postdata['respect_image']);

            foreach ( $uploaded_urls as $uploaded_url ){
                $postdata['image'] = $uploaded_url;
                $resp = $this->commonmodel->insertData('media_images', $postdata);
            }

            // print_r($postdata['images']); exit();
            //print_r($postdata); exit();
            // $album_count = $this->db->select('album_id')->where(['trash'=>0,'status'=>1])->group_by('album_id')->get('media_images')->num_rows();
            /*album_id FROM media_images group by album_id*/
            // $returndata['middelsection']['media_data'] = $this->db->query("select media_images.id,media_images.user_id,media_images.profile_id,album_id,`image`,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images JOIN media_album ON media_images.album_id=media_album.id  where album_id IN (select GROUP_CONCAT(album_id) FROM media_images group by album_id) order by set_coverphoto desc limit $album_count")->result();
            // 'media_images.status'=>1,
            $returndata = array();
            $media_album_data = $this->commonmodel->getjointbData('media_album',['media_album.profile_id'=>$profile_id],'result','media_album.title,media_album.caption,media_album.id as albumid',['media_images',' media_album.id=media_images.album_id'],['media_album.id','DESC'],'media_album.id');
            // echo $this->db->last_query(); exit();
            foreach($media_album_data as $m => $album_value){
                // print_r($album_value); exit();
                // echo $album_value->title; exit();
                $media_image_data = $this->commonmodel->getjointbData('media_images',['media_images.profile_id'=>$profile_id,'album_id'=>$album_value->albumid],'row','media_album.title,media_album.caption,media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto',['media_album',' media_album.id=media_images.album_id'],['set_coverphoto','DESC'],null,1);
                $returndata['media_data'][$m] = $media_image_data;
                
            }
            $returndata['middelsection'] = $returndata;
            /*$returndata['middelsection']['media_data'] = $this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.profile_id'=>$profile_id],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);
            */
            
            // print_r($media_slider);exit();
            

            $htmldata = $this->load->view('media_gallery-new',$returndata,true);
            
            echo json_encode(['status'=>true,'message'=>lang('add_post_mediamessage'),'data'=>$htmldata]);
        }else{
            echo json_encode(['status'=>true,'message'=>lang('input_field_required')]);
        }
        exit();
    }

    /*
    function media_image(){
        if(!empty($_POST)){
            $postdata = $_POST;
            $postdata['user_id'] = get_frontauthuser('user_id');
            $postdata['profile_id'] =$profile_id = get_frontprofileid();


            /**
             * If there is any file uploaded, then store it using UploadStorage.
             *
            if( StorageUploadedFile::exists('media_image' ) ){
                try{
                    $postdata['image'] = UploadStorage::store( 'media_image', $postdata['user_id'] );
                }catch (Exception $exception){
                    echo json_encode( [
                        'status'	=> false,
                        'message'	=> $exception->getMessage(),
                    ]);
                    exit;
                }
            }


            unset($postdata['submit']);
            // print_r($postdata); exit();
            $resp = $this->commonmodel->insertData('media_images',$postdata);
            // $album_count = $this->db->select('album_id')->where(['trash'=>0,'status'=>1])->group_by('album_id')->get('media_images')->num_rows();
            /*album_id FROM media_images group by album_id*
            // $returndata['middelsection']['media_data'] = $this->db->query("select media_images.id,media_images.user_id,media_images.profile_id,album_id,`image`,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption FROM media_images JOIN media_album ON media_images.album_id=media_album.id  where album_id IN (select GROUP_CONCAT(album_id) FROM media_images group by album_id) order by set_coverphoto desc limit $album_count")->result();
            // 'media_images.status'=>1,

            $returndata['middelsection']['media_data'] = $this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.profile_id'=>$profile_id],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);

            $htmldata = $this->load->view('media_gallery-new',$returndata,true);
            // $ths->commonmodel->
            echo json_encode(['status'=>true,'message'=>lang('add_post_message'),'data'=>$htmldata]);
        }else{
            echo json_encode(['status'=>true,'message'=>lang('input_field_required')]);
        }
    }
    */

    function setmediapublicprivate(){
        if(isset($_POST) && !empty($_POST)){
            $this->commonmodel->updateAllData($_POST['table'],['id'=>$_POST['media_id']],['media_ispublic'=>$_POST['media_status']]);
            // echo $this->db->last_query(); exit();
            $returndata['middelsection']['media_data'] = $this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.profile_id'=>get_frontprofileid()],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);
            // print_r($returndata['middelsection']['media_data']);
            $htmldata = $this->load->view('media_gallery-new',$returndata,true);
            echo json_encode(['status'=>true,'message'=>lang('updatesuccess_msg'),'body'=>$htmldata]);
        }
    }

    function setmediaalbumpublicprivate(){
        if(isset($_POST) && !empty($_POST)){
            $this->commonmodel->updateAllData($_POST['table'],['id'=>$_POST['id']],['is_public'=>$_POST['is_public']]);
            
            $returndata['middelsection']['media_data'] = $this->commonmodel->getjointbData('media_images',['media_images.trash'=>0,'media_images.profile_id'=>get_frontprofileid()],'result','media_images.id,media_images.user_id,media_images.profile_id,album_id,image,media_caption,media_ispublic,set_coverphoto,media_album.title,media_album.caption',['media_album','media_images.album_id=media_album.id'],['media_images.set_coverphoto','desc'],'album_id',4);

            $htmldata = $this->load->view('media_gallery-new',$returndata,true);
            
            echo json_encode(['status'=>true,'message'=>lang('updatesuccess_msg'),'body'=>$htmldata]);
        }
    }

    function setmemorypublicprivate(){
        if(isset($_POST) && !empty($_POST)){
            if($_POST['memory_ispublic']=='2'){
                // $update_data['memory_ispublic']=1;
                $update_data['feature_post']=0;
                $update_data['feature_postby']=0;
            }
            $update_data['memory_ispublic']=$_POST['memory_ispublic'];
            $this->commonmodel->updateAllData($_POST['table'],['id'=>$_POST['id']],$update_data);
            
            $returndata['middelsection']['memories_post'] = $this->commonmodel->getjointbData('memories',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);
            $body = $this->load->view('memories_postdata',$returndata,TRUE);
            echo json_encode(['status'=>true,'message'=>lang('updatesuccess_msg'),'body'=>$body]);
        }
    }

    function settimelinepublicprivate(){
        if(isset($_POST) && !empty($_POST)){
            $this->commonmodel->updateAllData($_POST['table'],['id'=>$_POST['id']],['timeline_ispublic'=>$_POST['timeline_ispublic']]);
            
            $returndata['middelsection']['timeline_post'] = $this->commonmodel->getjointbData('timeline',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);
                // print_r($returndata['middelsection']['memories_post']); exit();
            $body = $this->load->view('timeline_post',$returndata,TRUE);
            echo json_encode(['status'=>true,'message'=>lang('updatesuccess_msg'),'body'=>$body]);
        }
    }

    function setrespectpublicprivate(){
        if(isset($_POST) && !empty($_POST)){
            $this->commonmodel->updateAllData($_POST['table'],['id'=>$_POST['id']],['respect_ispublic'=>$_POST['respect_ispublic']]);
            
            $returndata['middelsection']['respect_post'] =
                $this->commonmodel->getjointbData('respect_post',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);

                $body = $this->load->view('respect_post',$returndata,TRUE);
                
            // $returndata['middelsection']['timeline_post'] = $this->commonmodel->getjointbData('timeline',array('profile_id'=>get_frontprofileid(),'trash'=>0),'result','*',null,['id','DESC']);
                // print_r($returndata['middelsection']['memories_post']); exit();
            // $body = $this->load->view('timeline_post',$returndata,TRUE);
            echo json_encode(['status'=>true,'message'=>lang('updatesuccess_msg'),'body'=>$body]);
        }
    }

    function setjournalpublicprivate(){
        if(isset($_POST) && !empty($_POST)){
            $this->commonmodel->updateAllData($_POST['table'],['id'=>$_POST['id']],['is_public'=>$_POST['is_public']]);
            
            $returndata['middelsection']['journal_post'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid(),'journal_post.trash'=>0),'result','journal_post.*,user_profile.profile_name',['user_profile', 'journal_post.profile_id=user_profile.id'],['id','DESC'],null);

            $returndata['middelsection']['journal_postslider'] = $this->commonmodel->getjointbData('journal_post',array('profile_id'=>get_frontprofileid(),'journal_post.trash'=>0,'is_public'=>1),'result','*',null,['id','DESC'],null,8);
            $resp='';
            $body = $this->load->view('journal-post-new',$returndata,TRUE);
            echo json_encode(array('status'=>true,'message'=>lang('journal_delete_success'),'body'=>$body,'postid'=>$resp));
            // echo json_encode(['status'=>true,'message'=>lang('updatesuccess_msg')]);

        }
    }

    function singleimage_popup(){
        // print_r($_POST); exit();
        $result = $this->commonmodel->getjointbData('media_images',['album_id'=>$_POST['album_id']],'result');
        $body = $this->load->view('single-image',['singleimage'=>$result],true);
        echo json_encode(['status'=>true,'data'=>$body,'message'=>'found succefully']);
    }

    function mediasinglepost($id=''){
        if($id!=''){
            $resp = $this->commonmodel->getsingleData('media_images',array('id'=>$id));
            // print_r($resp); exit();
            $resp['post_date'] = date_dmyformate($resp['created_at']);
            $resp['description'] = $resp['media_caption'];
            $resp['profile_name'] = user_detail($resp['user_id'])->firstname.' '.user_detail($resp['user_id'])->lastname;
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['image']) && $resp['image']!='') ? $resp['image']  : get_defaultimage()->profile_img);
            $resp['image_url'] = UploadStorage::url( $resp['image'], get_defaultimage()->profile_img);

            $resp['tablename'] = 'media_post';
            $resp['likecount'] = $this->commonmodel->getsingleData(
            "post_like_count",['table'=>'media_images','like_count'=>1,'post_id'=>$id],"count(*) as count")['count'];
            // "user_id" => get_frontauthuser("user_id"),
            // echo $this->db->last_query(); exit();

        //get_userprofile($resp['profile_id'])->profile_name;;
            $media_comment = respectpost_comment($id,'media_post');
            $body = $this->load->view('media_comment',['media_comment'=>$media_comment],true);

            //$this->session->set_flashdata('journal_postpopup',true);
            // redirect('/');
            // 'rowcount'=>count(respectpost_comment($id,'journal_post','all'))

            echo json_encode(array('status'=>true,'message'=>'Added Successfully','body'=>$resp,'comment_body'=>$body,'rowcount'=>count(respectpost_comment($id,'media_post','all'))));

            // echo json_encode(array('status'=>true,'body'=>$resp));
        }else{
            echo json_encode(array('status'=>false));
        }
    }

    function mediapost_view_limit($id='',$limit=4){

        if($id!=''){

            $resp = $this->commonmodel->getsingleData('media_images',array('id'=>$id));
            // print_r($resp); exit();
            $resp['post_date'] = date_dmyformate($resp['created_at']);
            $resp['description'] = $resp['media_caption'];
            $resp['profile_name'] = get_userprofile($resp['profile_id'])->profile_name;
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['image']) && $resp['image']!='') ? $resp['image']  : get_defaultimage()->profile_img);
            $resp['image_url'] = UploadStorage::url( $resp['image'], get_defaultimage()->profile_img);

            $media_comment = respectpost_comment($id,'media_post',$limit);
            // print_r($journal_comment); exit();
            $resp['journalcomment'] = $this->load->view('media_comment',['media_comment'=>$media_comment],true);
            // print_r($resp); exit();
            echo json_encode(array('status'=>true,'body'=>$resp));
        }else{
            echo json_encode(array('status'=>false));
        }

    }

    function otherpost_view_limit($id='',$limit=4,$post_type='life_of'){

        if($id!=''){
            $tbname = $post_type;
            if($post_type=='memory_post'){
                $tbname = 'memories';
            }elseif($post_type=='media_post'){
                $tbname = 'media_images';
            }
            $resp = $this->commonmodel->getsingleData($tbname,array('id'=>$id));
            //print_r($resp); exit();
            $resp['post_date'] = (isset($resp['created_at']) && $resp['created_at']!='') ? date_dmyformate($resp['created_at']) : '';
            $resp['description'] = (isset($resp['media_caption']) && $resp['media_caption']!='') ? $resp['media_caption'] : '';
            $resp['profile_name'] = get_userprofile($resp['profile_id'])->profile_name;
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['image']) && $resp['image']!='') ? $resp['image']  : get_defaultimage()->profile_img);
            if(isset($resp['image']) && $resp['image']!=''){
            	$resp['image_url'] = UploadStorage::url( $resp['image'], get_defaultimage()->profile_img);
        	}
            $media_comment = respectpost_comment($id,$post_type,$limit);
            // print_r($media_comment); exit();
            $resp['othercomment'] = $this->load->view('other_comment',['media_comment'=>$media_comment],true);
            // print_r($resp); exit();
            echo json_encode(array('status'=>true,'body'=>$resp));
        }else{
            echo json_encode(array('status'=>false));
        }

    }

    function postlike(){

        if(isset($_POST['post_id']) && $_POST['post_id']!=''){
            $post_id = $_POST['post_id'];
            if($_POST['tablename']=='memory_post'){
                $tablename = 'memories';
            }elseif($_POST['tablename']=='media_post'){
                $tablename = 'media_images';
            }else{
                $tablename = $_POST['tablename'];
            }
            // $tablename = ($_POST['tablename']=='memory_post') ? 'memories' : $_POST['tablename'];
            $profile_id = $this->db->select('profile_id')->where(['id'=>$post_id])->get($tablename)->row()->profile_id;
            $resp = [];
            if(checkauth()){
                $user_id = (get_frontauthuser()['warden_user_id']>0) ? get_frontauthuser()['warden_user_id'] : get_frontauthuser()['user_id'];
                $resp = $this->commonmodel->getsingleData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id,'user_id'=>$user_id));
                // print_r($resp); exit();
                // memory_post
                if(isset($resp) && !empty($resp)){
                    $likecount = ($resp['like_count']==0) ? 1 : 0;

                    $this->commonmodel->updateAllData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>$user_id],['like_count'=>$likecount,'profile_id'=>$profile_id]);
                }else{
                    $this->commonmodel->insertData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>$user_id,'like_count'=>1,'profile_id'=>$profile_id]);
                }
                $resp = $this->commonmodel->getjointbData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id,'like_count'=>1),'row','count(*) likecount');
                echo json_encode(array('status'=>true,'body'=>$resp->likecount));
            }else{
                $user_id = $_POST['uidlocal'];
                $resp = $this->commonmodel->getsingleData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id,'user_id'=>$user_id));
                // print_r($resp); exit();
                // memory_post
                if(isset($resp) && !empty($resp)){
                    $likecount = ($resp['like_count']==0) ? 1 : 0;

                    $this->commonmodel->updateAllData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>$user_id],['like_count'=>$likecount,'profile_id'=>$profile_id]);
                }else{
                    $this->commonmodel->insertData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>$user_id,'like_count'=>1,'profile_id'=>$profile_id]);
                }
                $resp = $this->commonmodel->getjointbData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id,'like_count'=>1),'row','count(*) likecount');
                echo json_encode(array('status'=>true,'body'=>$resp->likecount));

                /*$cookie_name = 'post_id-'.$post_id.'-'.$tablename;
                if(isset($_COOKIE[$cookie_name])) {
                    $likecount = ($_COOKIE[$cookie_name]==0) ? 1 : 0;
                    setcookie($cookie_name,$likecount);
                    // $resp['likecountas'] = $_COOKIE[$cookie_name];

                    $resp_like = $this->commonmodel->getsingleData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id,'user_id'=>0));
                    // echo $this->db->last_query(); exit();
                    if(isset($resp_like) && !empty($resp_like)){
                        $likecount_v = ($resp_like['like_count']>0) ? $resp_like['like_count']-1 : $resp_like['like_count']+1;

                        $this->commonmodel->updateAllData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>0],['like_count'=>$likecount_v,'profile_id'=>$profile_id]);

                    }else{
                        $this->commonmodel->insertData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>0,'like_count'=>1,'profile_id'=>$profile_id]);
                    }
                    // echo $this->db->last_query(); exit();
                    $resp_likecount_v = $this->commonmodel->getsingleData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id),'sum(like_count) as likecount');
                    $resp['likecountas'] = $resp_likecount_v['likecount'];

                    // $this->commonmodel->updateAllData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>0],['like_count'=>$likecount,'profile_id'=>$profile_id]);
                    // echo "Cookie named '" . $_COOKIE[$cookie_name] . "' is not set!";
                } else {
                    setcookie($cookie_name,1);
                    // $resp['likecountas'] = $_COOKIE[$cookie_name];
                    $resp_like = $this->commonmodel->getsingleData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id,'user_id'=>0));
                    if(isset($resp_like) && !empty($resp_like)){
                        $likecount = ($resp_like['like_count']>0) ? $resp_like['like_count']+1 : 1;

                        $this->commonmodel->updateAllData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>0],['like_count'=>$likecount,'profile_id'=>$profile_id]);

                        // $resp['likecountas'] = $likecount;
                    }else{
                        $this->commonmodel->insertData('post_like_count',['table'=>$tablename,'post_id'=>$post_id,'user_id'=>0,'like_count'=>1,'profile_id'=>$profile_id]);
                    }
                    // echo $this->db->last_query(); exit();
                    $resp_likecount_v = $this->commonmodel->getsingleData('post_like_count',array('table'=>$tablename,'post_id'=>$post_id),'sum(like_count) as likecount');
                    $resp['likecountas'] = (isset($resp_likecount_v['likecount']) && $resp_likecount_v['likecount']!='') ? $resp_likecount_v['likecount'] : 0;
                    // echo "Cookie '" . $cookie_name . "' is set!<br>";
                    // echo "Value is: " . $_COOKIE[$cookie_name];
                }
                // echo $this->db->last_query(); exit();
                // echo json_encode($resp); exit();
                // exit();
                echo json_encode(array('status'=>true,'body'=>$resp['likecountas']));
                */
            }
            // print_r($resp); exit();
            // $resp['profile_name'] = get_userprofile($resp['profile_id'])->profile_name;
            // $resp['image_url'] = base_url("assets/frontend/uploads/").((isset($resp['image']) && $resp['image']!='') ? $resp['image']  : '300x370.png');
            // $resp['postdate'] = date('d/m/y',strtotime($resp['created_at']));
        }else{
            echo json_encode(array('status'=>false));
        }

    }

    function respect_commentpost(){
        // print_r($_POST); exit();
        $postdata['post_type'] = 'respect_post';
        $postdata['post_id'] = $_POST['postid'];
        $postdata['comment'] = $_POST['respect_comment_text'];
        $postdata['name'] = $_POST['name'];
        $postdata['email'] = $_POST['email'];
        $postdata['status'] = 0;
        $comment_msg = lang('comment_post_msg');
        if(checkauth()){
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            $checkuser = $this->commonmodel->getsingleData('respect_post',['id'=>$_POST['postid'],'user_id'=>$postdata['user_id']],'count(*) as ids');
            // echo $this->db->last_query(); exit();
            if(isset($checkuser) && $checkuser['ids']>0){
                $postdata['status'] = 1;
                $comment_msg = '';
            }
        }


        $comment_id = $this->commonmodel->insertData('comment_post',$postdata);
        $comment_result = $this->commonmodel->getsingleData('comment_post',['id'=>$comment_id]);
        $respect_comment = respectpost_comment($_POST['postid'],'respect_post');

        $body = $this->load->view('respect_comment',['respect_comment'=>$respect_comment],true);

        echo json_encode(array('status'=>true,'message'=>$comment_msg,'comment_text'=>$comment_result['comment'],'body'=>$body));
    }

    function journal_commentpost(){
        // print_r($_POST); exit();
        $postdata['post_type'] = 'journal_post';
        $postdata['post_id'] = $_POST['postid'];
        $postdata['name'] = $_POST['name'];
        $postdata['email'] = $_POST['email'];
        $postdata['comment'] = $_POST['comment'];
        $postdata['user_id'] = (checkauth()) ? get_frontauthuser()['user_id'] : 0;
        $postdata['status'] = 0;

        $comment_msg = lang('comment_post_msg');
        if(checkauth()){
            $checkuser = $this->commonmodel->getsingleData('journal_post',['id'=>$_POST['postid'],'user_id'=>$postdata['user_id']],'count(*) as ids');
            // echo $this->db->last_query(); exit();
            if(isset($checkuser) && $checkuser['ids']>0){
                $postdata['status'] = 1;
                $comment_msg = '';
            }
        }

        $comment_id = $this->commonmodel->insertData('comment_post',$postdata);
        $comment_result = $this->commonmodel->getsingleData('comment_post',['id'=>$comment_id]);
        $journal_comment = respectpost_comment($_POST['postid'],'journal_post');
        // print_r($journal_comment);
        $body = $this->load->view('journal_comment',['journal_comment'=>$journal_comment],true);
        //$this->session->set_flashdata('journal_postpopup',true);
        // redirect('/');
        echo json_encode(array('status'=>true,'message'=>$comment_msg,'comment_text'=>$comment_result['comment'],'body'=>$body,'rowcount'=>count(respectpost_comment($_POST['postid'],'journal_post','all'))));
    }

    function other_commentpost(){
        // print_r($_POST); exit();
        $postdata['post_type'] = $_POST['post_type'];
        $postdata['post_id'] = $_POST['postid'];
        $postdata['name'] = $_POST['name'];
        $postdata['email'] = $_POST['email'];
        $postdata['comment'] = $_POST['comment'];
        $postdata['user_id'] = (checkauth()) ? get_frontauthuser()['user_id'] : 0;
        $postdata['status'] = 0;
        $table = '';
        if($postdata['post_type']=='memory_post'){
            $table = 'memories';
        }elseif($postdata['post_type']=='media_post'){
            $table = 'media_images';
        }else{
            $table = $postdata['post_type'];
        }
        $comment_msg = lang('comment_post_msg');
        if($table!=''){

            $checkuser = $this->commonmodel->getsingleData($table,['id'=>$_POST['postid'],'user_id'=>$postdata['user_id']],'count(*) as ids');
            // echo $this->db->last_query(); exit();
            if(isset($checkuser) && $checkuser['ids']>0){
                if(checkauth()){
                    $postdata['status'] = 1;
                    $comment_msg = '';
                }
                // $postdata['status'] = 0;
            }
        }


        $comment_id = $this->commonmodel->insertData('comment_post',$postdata);
        $comment_result = $this->commonmodel->getsingleData('comment_post',['id'=>$comment_id]);


        $media_comment = respectpost_comment($_POST['postid'],$postdata['post_type']);
        // print_r($journal_comment);
        $body = $this->load->view('other_comment',['media_comment'=>$media_comment],true);
        //$this->session->set_flashdata('journal_postpopup',true);
        // redirect('/');
        // 'Added Successfully';
        // echo json_encode(array('status'=>true,'body'=>$resp,'comment_body'=>$body,'rowcount'=>count($media_comment_countall)));
        echo json_encode(array('status'=>true,'message'=>$comment_msg,'comment_text'=>$comment_result['comment'],'body'=>$body,'comment_body'=>$body,'rowcount'=>count(respectpost_comment($_POST['postid'],$postdata['post_type'],'all'))));
    }

    function media_commentpost(){
        // print_r($_POST); exit();
        $postdata['post_type'] = isset($_POST['post_type']) ? $_POST['post_type'] : 'media_post';
        $postdata['post_id'] = $_POST['postid'];
        $postdata['name'] = $_POST['name'];
        $postdata['email'] = $_POST['email'];
        $postdata['comment'] = $_POST['comment'];
        $postdata['user_id'] = get_frontauthuser()['user_id'];
        $comment_id = $this->commonmodel->insertData('comment_post',$postdata);
        $comment_result = $this->commonmodel->getsingleData('comment_post',['id'=>$comment_id]);
        $media_comment = respectpost_comment($_POST['postid'],'media_post');
        $body = $this->load->view('media_comment',['media_comment'=>$media_comment],true);
        //$this->session->set_flashdata('journal_postpopup',true);
        // redirect('/');
        echo json_encode(array('status'=>true,'message'=>'Added Successfully','comment_text'=>$comment_result['comment'],'postid'=>$postdata['post_id'],'body'=>$body,'count_commentrow'=>count(respectpost_comment($_POST['postid'],'media_post','all'))));
    }

    function user_subscription(){
        
        $postdata['user_id'] = (checkauth() && isset(get_frontauthuser()['user_id'])) ? get_frontauthuser()['user_id'] : 0;
        $postdata['profile_id']= get_frontprofileid();
        $postdata['name'] = $_POST['name'];
        $postdata['email'] = $_POST['email'];
        $postdata['subscription_type'] = $_POST['subscription_type'];
        $templatename = 'subscriptiondone';
        $subject = lang('subscription_success');
        $tomail = $_POST['email'];
        $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'subscriptiondone'])->get('email_template')->row();
        $sub_id = $this->commonmodel->insertData('user_subscribe',$postdata);

        $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('subscription_success');
        $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';
        $msgarr['userName'] = $postdata['name'];
        $msgarr['profileName'] = $this->db->select('profile_name')->where(['id'=>get_frontprofileid()])->get('user_profile')->row()->profile_name;
        $msgarr['sub_id'] = base64_encode($sub_id);
        $msgarr['sub_type'] = ($_POST['subscription_type'] ==1) ? 'Daily Digest' : 'Weekly Digest';
        try{
            $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
        }catch(\Exception $e){
            
        }
        $this->session->set_flashdata('success_subscribe',lang('subscribe_success_msg'));
        redirect($_SERVER['HTTP_REFERER']);
    }

    function profile_update_description(){
        // print_r($this->input->post());
        $bi_text = $this->input->post('bio');
        $this->commonmodel->updateAllData('user_profile',['id'=>get_frontprofileid()],['bio'=>$this->input->post('bio')]);
        // ->where('id'=>get_frontprofileid())->update('user_profile',['bio'=>'']);
        redirect('/');
    }


    function shareqrcode()
    {
        $profileid = get_frontprofileid();
        $getuserid = $this->commonmodel->getsingleData(
            "user_profile",
            ["id" => $profileid],
            "user_id,first_name,last_name,profile_url,qrcode_img"
        );

        $profile_user = user_detail($getuserid['user_id']);
        //print_r($getuserid); exit();



        $templatename = "qrcode_email";
        $subject = lang("profile_qrcode");
        $tomail = $_POST['emailid'];

        $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'qrcode_email'])->get('email_template')->row();
        $msgarr["userName"] =
            $profile_user->firstname . " " . $profile_user->lastname;
        $subject =
            isset($temp_resp) && $temp_resp->subject
                ? $temp_resp->subject
                : lang("profile_qrcode");

        $img = $getuserid["qrcode_img"];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file_name = 'qrcode'.$profileid.time(). '.png';
        $file = "./assets/frontend/uploads/" . $file_name;
        $success = file_put_contents($file, $data);

        $msgarr["qrcode"] = base_url('assets/frontend/uploads/').$file_name;
        $msgarr['profileurl'] = site_url('/').'?profile='.$getuserid["profile_url"];
        $resp = $this->sendmailcommon(
            $tomail,
            $subject,
            $templatename,
            $msgarr
        );
        // print_r($resp); exit();

        echo json_encode(["status" => true]);
    }

    function groupwarden_mapping(){
        
        if(isset($_POST['save']) && !empty($_POST)){
            
            $result = $this->commonmodel->getsingleData('group_warden_mapping',['group_id'=>$this->input->post('group_id'),'warden_id'=>$this->input->post('warden_id')],'count(*) as warden_group_map_count')['warden_group_map_count'];
            // print_r($result)->warden_group_map_count; exit();
            if($result==0){
                $resp = $this->commonmodel->insertData('group_warden_mapping',['user_id'=>get_frontauthuser('user_id'),'group_id'=>$this->input->post('group_id'),'warden_id'=>$this->input->post('warden_id')]);
                $this->session->set_flashdata('success','Warden upudated');
            }
            
            redirect('/family-group-list');
        }
    }

}
