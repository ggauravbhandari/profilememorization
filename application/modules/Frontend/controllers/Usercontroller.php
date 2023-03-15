<?php defined("BASEPATH") or exit("No direct script access allowed");

class Usercontroller extends MY_Controller
{
    /**
     * [__construct description]
     *
     * @method __construct
     */
    protected $data = [];
    public function __construct()
    {
        // To inherit directly the attributes of the parent class.
        parent::__construct();
        $this->data["site_title"] = ucfirst(lang("site_title"));
        $this->load->model("commonmodel");
        $this->load->library("form_validation");
        if (!$this->session->userdata("frontuserdetail")) {
            redirect("/");
        }
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
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("index", $this->data);
    }

    function welcomepage()
    {
        // echo 'myaccount'; exit();
        // print_r(get_userplan_detail(user_allfamilygroup()['usertype'])->profile_limit);
        // echo count(get_userprofile_ids()); exit();
        if(count(get_userprofile_ids())>0){
            redirect('familymember/'.familygroupcount()['id']);
        }
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        // $this->template->set_partial('homenavbar', 'partials/frontnavbar');
        $this->template->build("welcomepage", $this->data);
    }

    function myaccount()
    {
        // echo 'myaccount'; exit();
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        // $this->template->set_partial('homenavbar', 'partials/frontnavbar');
        $this->template->build("myaccount", $this->data);
    }

    function change_password()
    {
        $this->form_validation->set_rules(
            "oldpassword",
            lang("oldpassword"),
            "required"
        );
        $this->form_validation->set_rules(
            "password",
            lang("password"),
            "required"
        );
        $this->form_validation->set_rules(
            "conpassword",
            lang("conpassword"),
            "required|matches[password]"
        );
        //print_r($this->session->userdata);exit;
        if(get_frontauthuser('warden_user_id')==0){
        $user_response = $this->commonmodel->getsingleData(
            "users",
            ["id" => $this->session->userdata("frontuserdetail")["user_id"]],
            "id,firstname,email,password",
            ["id", "desc"]
        );
        }
        else{
          $user_response = $this->commonmodel->getsingleData(
            "users",
            ["id" => $this->session->userdata("frontuserdetail")["warden_user_id"]],
            "id,firstname,email,password",
            ["id", "desc"]
        );
        }

        if ($this->form_validation->run() == false) {
            echo json_encode([
                "status" => false,
                "message" => validation_errors(),
            ]);
        } else {
            $postdata = $this->input->post();
            $new_password = password_hash(
                $postdata["password"],
                PASSWORD_BCRYPT
            );

            $hash = $user_response["password"];
            $result = password_verify($postdata["oldpassword"], $hash);
            // print_r($user_response); exit();
            if ($result) {
                $this->commonmodel->updateAllData(
                    "users",
                    ["id" => $user_response["id"]],
                    ["password" => $new_password]
                );
                echo json_encode([
                    "status" => true,
                    "message" => lang("change_password_success"),
                ]);
                // $this->session->set_flashdata('success',lang('updatesuccess_msg'));
                // $this->session->set_flashdata('signupsuccessModal',true);
                // redirect('/');
                // $this->session->set_flashdata('success',lang('updatesuccess_msg'));
                // redirect('admin/settings');
            } else {
                echo json_encode([
                    "status" => false,
                    "message" => lang("password_not_match"),
                ]);
                // $this->session->set_flashdata('error',lang('password_not_match'));
                // $this->session->set_flashdata('changepasswordModal',true);
                // redirect('/');
                // $this->session->set_flashdata('error',lang('password_not_match'));
                // redirect('admin/settings');
            }
            // print_r($result); exit();
            // // $this->commonmodel->insertData('users',$postdata);
            // $this->session->set_flashdata('success',lang('updatesuccess_msg'));
            // redirect('admin/settings');
        }
    }

    function edit_profile($profile_id)
    {
        $user_id = $this->session->userdata("frontuserdetail")["user_id"];
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");
        $this->template->build("myaccount", $this->data);
    }

    function profileget($profile_id)
    {
        $user_id = $this->session->userdata("frontuserdetail")["user_id"];
        $result = $this->commonmodel->getsingleData("user_profile", [
            "id" => $profile_id,
            "user_id" => $user_id,
        ]);
        $status = false;
        $data = [];
        if (count($result) > 0) {
            $data = $result;
        }

        $donation_data = $this->commonmodel->getsingleData("user_donation ", ["profile_id" => $profile_id]);

        $Dhtml = "";$btn="";$rowCount="";
        if(isset($donation_data) && !empty($donation_data))
        {
            $charity_name = json_decode($donation_data['charity_name']);
            $donation_link = json_decode($donation_data['donation_link']);
            $few_word_desc = json_decode($donation_data['few_word_desc']);
            $rowCount = count($charity_name);
            foreach ($charity_name as $cnkey => $cnvalue)
            {
                if(count($charity_name)>=2)
                {
                    if($cnkey != 0)
                    {

                        $btn = '<div class="col-12 col-md-2"><div class="mb-3"><button type="button" class="rmv-charity" href="javascript:void(0)" style="float: right;" onclick="removeCharity(this)"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>';
                    }
                }else{
                    if($cnkey != 0)
                    {

                        $btn = '<div class="col-12 col-md-2"><div class="mb-3"><button type="button" onclick="AddMoreCharity(this)" style="background-color: #90a792;margin-top: 31px;"><i class="fa fa-plus" aria-hidden="true"></i></button><button type="button" class="rmv-charity" href="javascript:void(0)" style="float: right;" onclick="removeCharity(this)"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>';
                    }else{
                        $btn = '<div class="col-12 col-md-2"><div class="mb-3"><button type="button" onclick="AddMoreCharity(this)" style="background-color: #90a792;margin-top: 31px;"><i class="fa fa-plus" aria-hidden="true"></i></button></div></div>';
                    }
                }


                $Dhtml .= '<div class="row addMore"><div class="col-12 col-md-6"><div class="mb-3"><label for="exampleFormControlInput1" class="form-label">'. lang("charity_name").'</label><input type="text" name="charity_name[]" placeholder="Charity Name" class="form-control" value="'.$cnvalue.'"></div></div><div class="col-12 col-md-6"><div class="mb-3"><label for="exampleFormControlInput1" class="form-label">'. lang("charity_donation_link").'</label><input type="url" name="charity_donation_link[]" placeholder="Link to charity donation" class="form-control" value="'.$donation_link[$cnkey].'"></div></div><div class="col-12 col-md-10"><div class="mb-3"><label for="exampleFormControlInput1" class="form-label">'. lang("charity_donation_fewword") .'</label><textarea class="form-control" placeholder="Write your Comment" id="exampleFormControlTextarea3" rows="3" name="charity_donation_fewword[]">'.$few_word_desc[$cnkey].'</textarea></div></div>'.$btn.'</div>';
            }
        }

        echo json_encode(["status" => $status,"rowCount" => $rowCount, "data" => $data, "charity_data" => $Dhtml]);
    }

    function profile_urlcheck($url = "", $pro_id = 0)
    {
        if (isset($url) && $url != "") {
            $result = $this->commonmodel->getprofilename(
                "user_profile",
                "profile_url",
                $url,
                $pro_id
            );
            // echo $this->db->last_query(); exit();
            if ($result == 0) {
                echo json_encode(["status" => true]);
            } else {
                // print_r($result); exit();
                //SELECT id FROM `user_profile` where profile_url like 'xyz';
                echo json_encode(["status" => false]);
            }
        } else {
            echo json_encode(["status" => false]);
        }
    }

    function profileupdate($gid='')
    {

        $user_id = $this->session->userdata("frontuserdetail")["user_id"];
        $postdata = $this->input->post();
        // print_r($postdata); exit();
        $postdata["dob"] = (isset($postdata["dob"]) && $postdata["dob"]!='') ? date("Y-m-d", strtotime($postdata["dob"])) : '1990-01-01';
        $path = "uploads";
        // print_r($postdata); exit();



//        if (
//            isset($_FILES["background_pic"]["name"]) &&
//            $_FILES["background_pic"]["name"] != ""
//        ) {
//            $filename_back = "background_pic" . time();
//            $config1 = [
//                "upload_path" => "./assets/frontend/" . $path,
//                "allowed_types" => "gif|jpg|png|jpeg",
//                "overwrite" => true,
//                "file_name" => "background_pic" . time(),
//            ];
//            $this->load->library("upload", $config1);
//            if ($this->upload->do_upload("background_pic")) {
//                $data_back = ["upload_data" => $this->upload->data()];
//                // print_r($data_back); exit();
//                $postdata["background_img"] =
//                    $data_back["upload_data"]["file_name"];
//                // $this->load->view('upload_success',$data);
//                //return array('success'=>true,'data'=>$image_name);
//            } else {
//                $error = [
//                    "success" => false,
//                    "error" => $this->upload->display_errors(),
//                ];
//                // return $error;
//                echo json_encode(["status" => false, "msg" => $error["error"]]);
//                exit();
//            }
//
//        }
//        if (
//            isset($_FILES["profile_pic"]["name"]) &&
//            $_FILES["profile_pic"]["name"] != ""
//        ) {
//            $this->load->library("upload");
//
//            $filename_pro = "profile_pic" . time();
//            $config2 = [
//                "upload_path" => "./assets/frontend/" . $path,
//                "allowed_types" => "gif|jpg|png|jpeg",
//                "overwrite" => true,
//                "file_name" => $filename_pro,
//            ];
//            // print_r($config2); exit();
//            $this->upload->initialize($config2);
//            if ($this->upload->do_upload("profile_pic")) {
//                $data_pro = ["upload_data" => $this->upload->data()];
//                // print_r($data); exit();
//                $postdata["profile_pic"] =
//                    $data_pro["upload_data"]["file_name"];
//                // $this->load->view('upload_success',$data);
//                //return array('success'=>true,'data'=>$image_name);
//            } else {
//                $error = [
//                    "success" => false,
//                    "error" => $this->upload->display_errors(),
//                ];
//                // return $error;
//                echo json_encode(["status" => false, "msg" => $error["error"]]);
//                exit();
//            }
//
//        }
//        if (
//            isset($_FILES["thumbnail"]["name"]) &&
//            $_FILES["thumbnail"]["name"] != ""
//        ) {
//            $this->load->library("upload");
//
//            $filename_pro = "thumbnail" . time();
//            $config2 = [
//                "upload_path" => "./assets/frontend/" . $path,
//                "allowed_types" => "gif|jpg|png|jpeg",
//                "overwrite" => true,
//                "file_name" => $filename_pro,
//            ];
//            // print_r($config2); exit();
//            $this->upload->initialize($config2);
//            if ($this->upload->do_upload("thumbnail")) {
//                $data_pro = ["upload_data" => $this->upload->data()];
//                // print_r($data); exit();
//                $postdata["thumbnail"] =
//                    $data_pro["upload_data"]["file_name"];
//                // $this->load->view('upload_success',$data);
//                //return array('success'=>true,'data'=>$image_name);
//            } else {
//                $error = [
//                    "success" => false,
//                    "error" => $this->upload->display_errors(),
//                ];
//                // return $error;
//                echo json_encode(["status" => false, "msg" => $error["error"]]);
//                exit();
//            }
//        }


        /**
         * background_pic
         * If there is any file uploaded, then store it using UploadStorage.
         */
        if( StorageUploadedFile::exists('background_pic' ) ){
            try{
                $postdata['background_img'] = UploadStorage::store( 'background_pic', $user_id );
            }catch (Exception $exception){
                echo json_encode( [
                    'status'	=> false,
                    'message'	=> 'background_pic: ' . $exception->getMessage(),
                ]);
                exit;
            }
        }


        /**
         * profile_pic
         * If there is any file uploaded, then store it using UploadStorage.
         */
        if( StorageUploadedFile::exists('profile_pic' ) ){
            try{
                $postdata['profile_pic'] = UploadStorage::store( 'profile_pic', $user_id );
            }catch (Exception $exception){
                echo json_encode( [
                    'status'	=> false,
                    'message'	=> 'profile_pic: ' . $exception->getMessage(),
                ]);
                exit;
            }
        }

        /**
         * thumbnail
         * If there is any file uploaded, then store it using UploadStorage.
         */
        if( StorageUploadedFile::exists('thumbnail' ) ){
            try{
                $postdata['thumbnail'] = UploadStorage::store( 'thumbnail', $user_id );
            }catch (Exception $exception){
                echo json_encode( [
                    'status'	=> false,
                    'message'	=> 'thumbnail: ' . $exception->getMessage(),
                ]);
                exit;
            }
        }


        if (
            isset($_POST["background_pic_remove"]) &&
            $_POST["background_pic_remove"] == "remove"
        ) {
            $postdata["background_img"] = "";
            unset($postdata["background_pic_remove"]);
        }
        if (
            isset($_POST["profile_pic_remove"]) &&
            $_POST["profile_pic_remove"] == "remove"
        ) {
            $postdata["profile_pic"] = "";
            unset($postdata["profile_pic_remove"]);
        }
        unset($postdata["background_pic"]);
        // print_r($postdata);
        // exit();

        $postdata["user_id"] = $user_id;
        if (
            isset($postdata["admin_profile"]) &&
            $postdata["admin_profile"] == 1
        ) {
            $this->commonmodel->updateAllData(
                "user_profile",
                ["user_id" => $user_id],
                ["admin_profile" => 0]
            );
        }

        if (
            isset($postdata["background_img"]) &&
            $postdata["background_img"] == "undefined"
        ) {
            unset($postdata["background_img"]);
        }
        if (
            isset($postdata["profile_pic"]) &&
            $postdata["profile_pic"] == "undefined"
        ) {
            unset($postdata["profile_pic"]);
        }
        if(isset($postdata['is_public']) && $postdata['is_public']=='2'){
            $postdata['is_public'] = 2;
        }else{
            $postdata['is_public'] = 1;
        }
        $profile_id = 0;
        // print_r($postdata); exit();
        if (
            isset($postdata["profile_id"]) &&
            $postdata["profile_id"] != "" &&
            $postdata["profile_id"] != "undefined"
        ) {
            // echo 'if'.$postdata['profile_id'];
            $postdata["profile_name"] = $postdata["profile_name"]; //$this->commonmodel->getprofilename('user_profile','profile_name',$postdata['profile_name'],$postdata['profile_id']);

            /*========= Insert Donation data =====*/
            unset($postdata["charity_name"]);
            unset($postdata["charity_donation_link"]);
            unset($postdata["charity_donation_fewword"]);
            $this->commonmodel->deleteData("user_donation", "profile_id", $this->input->post("profile_id"));

            $charity_name = json_encode($this->input->post('charity_name'));
            $charity_donation_link = json_encode($this->input->post('charity_donation_link'));
            $charity_donation_fewword = json_encode($this->input->post('charity_donation_fewword'));
            $char_name = $this->input->post('charity_name');
            if(!empty($char_name[0]) && trim($char_name[0]) !="")
            {
                $donation_data= array(
                        'profile_id' =>$this->input->post("profile_id"),
                        'charity_name' =>$charity_name,
                        'donation_link' =>$charity_donation_link,
                        'few_word_desc' =>$charity_donation_fewword,
                        'status'=>1,
                        'create_at'=>date('Y-m-d'),
                        'update_at'=>date('Y-m-d'),
                    );

                $donation_id = $this->commonmodel->insertData("user_donation",$donation_data);
            }
            /*============ End ==========*/

            unset($postdata["profile_id"]);
            // print_r($postdata); exit();
            $this->commonmodel->updateAllData(
                "user_profile",
                ["id" => $this->input->post("profile_id")],
                $postdata
            );
            $this->session->set_flashdata(
                "success",
                lang("profile_update_success")
            );
        } else {
            // echo 'else';
            unset($postdata["charity_name"]);
            unset($postdata["charity_donation_link"]);
            unset($postdata["charity_donation_fewword"]);

            $postdata["profile_name"] = $postdata["profile_name"]; //$this->commonmodel->getprofilename('user_profile','profile_name',$postdata['profile_name']);
            unset($postdata["profile_id"]);
            $familygroupid = familygroupcount();
            // print_r($familygroupid); 
            $postdata['family_group_id'] = ($postdata['family_group_id']>0 && $postdata['family_group_id']!='') ? $postdata['family_group_id'] : ((isset($familygroupid['id']) && $familygroupid['id']!='') ? $familygroupid['id'] : 0 );

            if(group_plancheck($postdata['family_group_id'])){
                // print_r($postdata); exit('insert');
                $profile_id = $this->commonmodel->insertData(
                    "user_profile",
                    $postdata
                );
            }else{
                $this->session->set_flashdata("error", 'Plan limit over');
                redirect('familymember/'.$postdata['family_group_id']);
            }
            $char_name = $this->input->post('charity_name');
            if(!empty($char_name[0]) && trim($char_name[0]) !="")
            {
                $charity_name = json_encode($char_name);
                $charity_donation_link = json_encode($this->input->post('charity_donation_link'));
                $charity_donation_fewword = json_encode($this->input->post('charity_donation_fewword'));

                $donation_data= array(
                    'profile_id' =>$profile_id,
                    'charity_name' =>$charity_name,
                    'donation_link' =>$charity_donation_link,
                    'few_word_desc' =>$charity_donation_fewword,
                    'status'=>1,
                    'create_at'=>date('Y-m-d'),
                    'update_at'=>date('Y-m-d'),
                );

                $donation_id = $this->commonmodel->insertData("user_donation",$donation_data);
            }

            /*echo '<pre>';
            print_r($postdata);die;*/
            // exit();
            // $this->qr($profile_id);

            $this->session->set_flashdata("newprofile", $profile_id);
            $this->session->set_flashdata(
                "success",
                lang("profile_added_success")
            );
        }
        // print_r($_POST);exit();
        redirect('familymember/'.$postdata['family_group_id']);
        // echo json_encode(["status" => true]);
    }



    function qr($profile_id)
    {
        // $userprofiledata = array('profile_name'=>'profile_name','profile_id'=>$profile_id);
        $userprofiledata = $this->commonmodel->getsingleData(
            "user_profile",
            ["id" => $profile_id],
            "id,user_id,first_name,last_name,profile_url"
        );
        // print_r($userprofiledata); exit();
        $this->load->view("qrcodegenerate", [
            "userprofiledata" => $userprofiledata,
        ]);
        // return true;
    }
    function update_qrcode()
    {
        // print_r($_POST); exit();
        $this->commonmodel->updateAllData(
            "user_profile",
            ["id" => $_POST["profile_id"]],
            ["qrcode_img" => $_POST["qrcode"]]
        );
        $getuserid = $this->commonmodel->getsingleData(
            "user_profile",
            ["id" => $_POST["profile_id"]],
            "user_id,first_name,last_name,profile_url"
        );

        $getuseremail = $this->commonmodel->getsingleData(
            "users",
            ["id" => $getuserid["user_id"]],
            "email,firstname,lastname"
        );
        //print_r($getuserid); exit();

        $templatename = "qrcode_email";
        $subject = lang("profile_qrcode");
        $tomail = $getuseremail["email"];

        //$temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'qrcode_email'])->get('email_template')->row();
        $msgarr["userName"] =
            $getuseremail["firstname"] . " " . $getuseremail["lastname"];
        $subject =
            isset($temp_resp) && $temp_resp->subject
                ? $temp_resp->subject
                : lang("profile_qrcode");

        $img = $_POST["qrcode"];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file_name = 'qrcode'.$_POST["profile_id"].time(). '.png';
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

    function testqrcodemail(){
        $templatename = "qrcode_email";
        $subject = lang("profile_qrcode");
        $tomail = 'ashishnuance@gmail.com';//$getuseremail;

        //$temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'qrcode_email'])->get('email_template')->row();
        $msgarr["userName"] = 'asdasdasd';
        $subject ='qr code test';
            // isset($temp_resp) && $temp_resp->subject
            //     ? $temp_resp->subject
            //     : lang("profile_qrcode");
        //$msgarr["qrcode"] = isset($_POST["qrcode"]) && $_POST["qrcode"] ? $_POST["qrcode"] : "";
        $msgarr["profile_url"] = 'asdasd';
        $resp = $this->sendmailcommon(
            $tomail,
            $subject,
            $templatename,
            $msgarr
        );
        print_r($resp);
    }

    function familygroup()
    {

        set_adminprofile();
        $user_id = $this->session->userdata("frontuserdetail")["user_id"];
        $where['user_id'] = $user_id;
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $where['id'] = get_frontauthuser('warden_group_id');
        }
        $this->data["profilelist"] = $this->commonmodel->getcustomdata('family_group',$where);
        // $this->data["profilelist"] = $this->commonmodel->getAllData(
        //     "family_group",
        //     "user_id",
        //     $user_id
        // );
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("family-group", $this->data);
    }

    function familymember($group_id=0)
    {
        $familygrouparr = explode(',',user_allfamilygroup()['grid']);
        if(in_array($group_id, $familygrouparr)){
            set_adminprofile();
            $user_id = $this->session->userdata("frontuserdetail")["user_id"];
            $profilelist = $this->commonmodel->getAllData(
                "user_profile",
                "family_group_id",
                $group_id
            );
            $profilelist_admincheck = $this->commonmodel->getAllDataArray(
                "user_profile",
                ["family_group_id"=>$group_id,'admin_profile'=>0]
            );

            // echo '<pre>';
            // print_r($profilelist);
            // print_r($profilelist_admincheck);
            // exit();
            if(isset($profilelist_admincheck[0]) && count($profilelist)==count($profilelist_admincheck)){
                $this->commonmodel->updateAllData('user_profile',["id"=>$profilelist_admincheck[0]->id],['admin_profile'=>1]);
            }
            $this->data["profilelist"] = $this->commonmodel->getAllData(
                "user_profile",
                "family_group_id",
                $group_id
            );

            $userplantype = $this->commonmodel->getsingleData('family_group', array('id'=>$group_id),'userplan_type');

            $this->data['currect_group_id'] = $group_id;
            $this->data['userplanid'] = (isset($userplantype) && $userplantype!='' && isset($userplantype['userplan_type'])) ? $userplantype['userplan_type'] : 1;

            $this->template->set_layout("frontlayout");
            $this->template->title("Welcome to Memorisation");

            $this->template->set_partial("homenavbar", "partials/frontnavbar");

            $this->template->build("family-member", $this->data);
        }else{
            redirect('/');
        }
    }





    function linkprofilepost(){
        // echo '<pre>';print_r($_POST); exit();
        $profile_data = get_userprofile($_POST['connect_profile']);
        $postdata['profile_id'] = $_POST['connect_profile'];
        $postdata['woocom_user_id'] = $_POST['woocom_user_id'];
        $postdata['user_id'] = get_frontauthuser('user_id');
        $postdata['profile_url'] = $profile_data->profile_url;
        // print_r($postdata); exit();
        $this->commonmodel->insertData('profile_link_qrcode',$postdata);
        $this->session->set_flashdata('success_linkprofile',lang('success_linkprofile'));
        redirect('linkprofile_qrcode?profile='.$_POST['woocom_user_id']);
    }

    function profilelink_list(){
        set_adminprofile();
        $user_id = get_frontauthuser('user_id');
        $this->data["result"] = $this->commonmodel->getjointbData(
            "profile_link_qrcode",
            ["profile_link_qrcode.user_id"=>$user_id],
            'result_array','profile_link_qrcode.*,user_profile.profile_name,user_profile.first_name,user_profile.last_name,user_profile.qrcode_img,user_profile.profile_url',['user_profile', 'profile_link_qrcode.profile_id=user_profile.id'],['profile_link_qrcode.id','desc']);

        $this->data["pagetitle"] = lang("profilelink_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/profile_qrcodelist", $this->data);
    }

    function deleteprofile($profile_id = "",$groupid=0)
    {
        if ($profile_id != "") {
            $this->commonmodel->deleteData(
                "journal_post",
                "profile_id",
                $profile_id
            );
            $this->commonmodel->deleteData(
                "life_of",
                "profile_id",
                $profile_id
            );
            $this->commonmodel->deleteData(
                "media_album",
                "profile_id",
                $profile_id
            );
            $this->commonmodel->deleteData(
                "media_images",
                "profile_id",
                $profile_id
            );
            removepostimages(['profile_id'=>$profile_id],'memories','memoryimage');
            $this->commonmodel->deleteData(
                "memories",
                "profile_id",
                $profile_id
            );
            $this->commonmodel->deleteData(
                "respect_post",
                "profile_id",
                $profile_id
            );
            $this->commonmodel->deleteData(
                "timeline",
                "profile_id",
                $profile_id
            );
            $this->commonmodel->deleteData("user_profile", "id", $profile_id);
            $this->session->set_flashdata(
                "success",
                lang("profile_delete_success")
            );
            redirect("familymember/".$groupid);
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        // $this->load->view('login');
        // $br = $this->config->base_url();;
        // $this->load->helper($br);
        redirect(base_url(), "refresh");
    }

    function total_pending_items()
    {
        $userid= $_SESSION['frontuserdetail']['user_id'];
        $sql = "SELECT 
        (select count(*) from comment_post where STATUS = 0 AND user_id =$userid)
        +
        (select count(*) from memories where STATUS = 0 and trash = 0 AND user_id =$userid )
        +
        (select count(*) from memories where STATUS = 0 and trash = 0 AND feature_post =1 AND user_id =$userid )
        +
        (select count(*) from respect_post where STATUS = 0 and trash = 0 AND user_id =$userid)
        +
        (select count(*) from respect_post where STATUS = 0 and trash = 0 AND feature_post =1 AND user_id =$userid  )
        +
        (select count(*) from media_images where STATUS = 0 and trash = 0 AND user_id =$userid)
        +
        (select count(*) from journal_post where STATUS = 0 and trash = 0 AND user_id =$userid)
        +
        (select count(*) from journal_post where STATUS = 0 and trash = 0 AND feature_post =1  AND user_id =$userid )
        +
        (select count(*) from timeline where STATUS = 0 and trash = 0 AND user_id =$userid)
        +
        (select count(*) from timeline where STATUS = 0 and trash = 0 AND feature_post =1  AND user_id =$userid ) as total_pending;";
        $result =$this->db->query($sql)->result();
        $pending_result = $result[0]->total_pending;
       // echo $pending_result;
        return $pending_result;
    }

    function active_pending_postlist(){
        $respect_post_result_pending = [];
        $respect_post = postbyuser("respect_post");
        if(get_userprofile_ids() && !empty(get_userprofile_ids())){
            $profileids = implode(',',get_userprofile_ids());
        }

        $this->data["respectcount_pending"] = (isset($profileids) && $profileids!='') ? $this->db->query("UPDATE respect_post set status=1 where profile_id in (".$profileids.") and status = 0") : 0;

        $this->data["memorycount_pending"] = (isset($profileids) && $profileids!='') ? $this->db->query("UPDATE memories set status=1 where profile_id in (".$profileids.") and status=0") : 0;
        $this->data["timelinecount_pending"] = $this->commonmodel->updateAllData("timeline",["user_id" => get_frontauthuser("user_id"),'status'=>0],['status'=>1]);
        $this->data["albumcountimage_pending"] = $this->commonmodel->updateAllData("media_images",["user_id" => get_frontauthuser("user_id"),'status'=>0],['status'=>1]);
        $this->data["journacount_pending"] = $this->commonmodel->updateAllData("journal_post",["user_id" => get_frontauthuser("user_id"),'status'=>0],['status'=>1]);
        $this->session->set_flashdata('success',lang('updatesuccess_msg'));
        return redirect('dashboard');


        // echo '<pre>';print_r($this->data); exit();
    }

    function user_dashboard()
    {
        $this->data["pagetitle"] = "Dashboard";
        $respect_post_result = $journal_post_result = $media_post_post = $memory_post_result = $timeline_post_result = $life_of_result = [];
        $respect_post = postbyuser("respect_post");
        $journal_post = postbyuser("journal_post");
        $media_post = postbyuser("media_images");
        $memory_post = postbyuser("memories");
        $timeline_post = postbyuser("timeline");
        $life_of = postbyuser("life_of");
        // print_r($respect_post);
        // exit();
        $respect_post_result = $respect_post_result_pending = $journal_post_result_pending = $media_post_post_pending = $memory_post_result_pending = $timeline_post_result_pending = $life_of_result_pending = $journal_post_result = $media_post_post = $memory_post_result = $life_of_result = [];

        if (!empty($respect_post)) {
            $respect_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $respect_post,
                ["post_type" => "respect_post"],
                ["id", "desc"]
            );
            $respect_post_result_pending = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $respect_post,
                ["post_type" => "respect_post",'status'=>0],
                ["id", "desc"]
            );

            // echo $this->db->last_query();exit();
        }
        // exit();
        if (!empty($journal_post)) {
            $journal_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $journal_post,
                ["post_type" => "journal_post"],
                ["id", "desc"]
            );
            $journal_post_result_pending = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $journal_post,
                ["post_type" => "journal_post",'status'=>0],
                ["id", "desc"]
            );

        }
        if (!empty($media_post)) {
            $media_post_post = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $media_post,
                ["post_type" => "media_post"],
                ["id", "desc"]
            );
            $media_post_post_pending = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $media_post,
                ["post_type" => "media_post",'status'=>0],
                ["id", "desc"]
            );

        }
        if (!empty($timeline_post)) {
            $timeline_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $timeline_post,
                ["post_type" => "timeline"],
                ["id", "desc"]
            );
            $timeline_post_result_pending = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $timeline_post,
                ["post_type" => "timeline",'status'=>0],
                ["id", "desc"]
            );

            // print_r($timeline_post); exit();
        }
        if (!empty($memory_post)) {
            $memory_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $memory_post,
                ["post_type" => "memory_post"],
                ["id", "desc"]
            );
            $memory_post_result_pending = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $memory_post,
                ["post_type" => "memory_post",'status'=>0],
                ["id", "desc"]
            );

        }
        if (!empty($life_of)) {
            $life_of_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $life_of,
                ["post_type" => "life_of"],
                ["id", "desc"]
            );
            $life_of_result_pending = $this->commonmodel->getcustomdatawherelike(
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
        
        $this->data["commentcount"] = count($result);
        $this->data["commentcount_pending"] = count($result_pending);

        
        if(get_userprofile_ids() && !empty(get_userprofile_ids()) && get_frontauthuser('warden_user_id')==0){
            $profileids = implode(',',get_userprofile_ids());
        }elseif(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $profileids = warden_groupprofilepermission();
        }
        $this->data["memorycount"] = $this->commonmodel->getsingleData(
            "memories",
            ["user_id" => get_frontauthuser("user_id")],
            "count(*) as count"
        );
        $this->data["memorycount"] = (isset($profileids) && $profileids!='') ? $this->db->query("SELECT count(*) as count from memories where profile_id in (".$profileids.")")->row_array() : array('count'=>0);
        // echo "SELECT count(*) as count from memories where profile_id in (".$profileids.") and status=0"; exit();
        $this->data["memorycount_pending"] = (isset($profileids) && $profileids!='') ? $this->db->query("SELECT count(*) as count from memories where profile_id in (".$profileids.") and status=0")->row_array() : array('count'=>0);

        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $this->data["timelinecount"] = $this->commonmodel->getsingleData_whereIn(
                "timeline",
                [],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission(), 'trash'=>0]
            );
            $this->data["timelinecount_pending"] = $this->commonmodel->getsingleData_whereIn(
                "timeline",
                ['status'=>0],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission(), 'trash'=>0]
            );

            $this->data["journacount"] = $this->commonmodel->getsingleData_whereIn(
                "journal_post",
                [],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission(), 'trash'=>0]
            );
            $this->data["journacount_pending"] = $this->commonmodel->getsingleData_whereIn(
                "journal_post",
                ['status'=>0],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission(), 'trash'=>0]
            );

            $this->data["postlikecount"] = $this->commonmodel->getsingleData_whereIn(
                "post_like_count",
                ['like_count'=>1],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission()]
            );


            $this->data["albumcount"] = $this->commonmodel->getsingleData_whereIn(
                "media_album",
                ["user_id" => get_frontauthuser("user_id")],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission()]
            );
            $this->data["albumcountimage"] = $this->commonmodel->getsingleData_whereIn(
                "media_images",
                ["user_id" => get_frontauthuser("user_id")],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission(), 'trash'=>0]
            );
            $this->data["albumcountimage_pending"] = $this->commonmodel->getsingleData_whereIn(
                "media_images",
                ["user_id" => get_frontauthuser("user_id"),'status'=>0, 'trash'=>0],
                "count(*) as count",
                [],
                ["profile_id",warden_groupprofilepermission()]
            );
            
        }else{
            $this->data["timelinecount"] = $this->commonmodel->getsingleData(
                "timeline",
                ["user_id" => get_frontauthuser("user_id"), 'trash'=>0],
                "count(*) as count"
            );
            $this->data["timelinecount_pending"] = $this->commonmodel->getsingleData(
                "timeline",
                ["user_id" => get_frontauthuser("user_id"),'status'=>0, 'trash'=>0 ],
                "count(*) as count"
            );

            $this->data["journacount"] = $this->commonmodel->getsingleData(
                "journal_post",
                ["user_id" => get_frontauthuser("user_id"), 'trash'=>0],
                "count(*) as count"
            );
            $this->data["journacount_pending"] = $this->commonmodel->getsingleData(
                "journal_post",
                ["user_id" => get_frontauthuser("user_id"),'status'=>0, 'trash'=>0],
                "count(*) as count"
            );

            $this->data["postlikecount"] = $this->commonmodel->getsingleData(
                "post_like_count",
                ["user_id" => get_frontauthuser("user_id"),'like_count'=>1],
                "count(*) as count"
            );

            $this->data["albumcount"] = $this->commonmodel->getsingleData(
                "media_album",
                ["user_id" => get_frontauthuser("user_id")],
                "count(*) as count"
            );
            $this->data["albumcountimage"] = $this->commonmodel->getsingleData(
                "media_images",
                ["user_id" => get_frontauthuser("user_id"), 'trash'=>0],
                "count(*) as count"
            );
            $this->data["albumcountimage_pending"] = $this->commonmodel->getsingleData(
                "media_images",
                ["user_id" => get_frontauthuser("user_id"),'status'=>0, 'trash'=>0],
                "count(*) as count"
            );
        }

        

        $this->data["respectcount"] = (isset($profileids) && $profileids!='') ? $this->db->query("SELECT count(*) as count from respect_post where trash=0 and profile_id in (".$profileids.")")->row_array() : array('count'=>0);

        
        $this->data["respectcount_pending"] = (isset($profileids) && $profileids!='') ? $this->db->query("SELECT count(*) as count from respect_post where trash=0 and profile_id in (".$profileids.") and status = 0")->row_array() : array('count'=>0);

        


        

        $this->data["featuredpostcount"] = count($this->featurepost_customdata());
        $this->data["featuredpostcount_pending"] = count($this->featurepost_pending());
       // echo "<pre>";print_r(count($respect_post_result_pending));exit;

        

        $user_id = $this->session->userdata("frontuserdetail")["user_id"];
        $this->data["profilelist"] = $this->commonmodel->getAllData(
            "user_profile",
            "user_id",
            $user_id
        );
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");
        
        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/dashboard", $this->data);
    }


    function getcommentcount($status=''){
        
        $respect_post_result = $journal_post_result = $media_post_post = $memory_post_result = $timeline_post_result = $life_of_result = [];
        $respect_post = postbyuser("respect_post");
        
        
        $journal_post = postbyuser("journal_post");
        $media_post = postbyuser("media_images");
        $memory_post = postbyuser("memories");
        // print_r($memory_post); exit();
        $timeline_post = postbyuser("timeline");
        $life_of = postbyuser("life_of");
        $respect_post_result = $journal_post_result = $media_post_post = $memory_post_result = $life_of_result = [];
        $where = [];
        if($status!='' && $status=='pending'){
            $where['status'] = 0;
        }else{
            if(isset($_GET['status']) && $_GET['status']!=''){
                if($_GET['status']!=3)
                {
                    $where['status'] = $_GET['status'];
                }
            }
        }
        // print_r($respect_post); exit();
        if (!empty($respect_post)) {
            $respect_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $respect_post,
                array_merge(["post_type" => "respect_post"],$where),
                ["id", "desc"]
            );
            // echo $this->db->last_query();exit();
        }
        // exit();
        if (!empty($journal_post)) {
            $journal_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $journal_post,
                array_merge(["post_type" => "journal_post"],$where),
                ["id", "desc"]
            );
        }
        if (!empty($media_post)) {
            $media_post_post = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $media_post,
                array_merge(["post_type" => "media_post"],$where),
                ["id", "desc"]
            );
        }
        if (!empty($timeline_post)) {
            $timeline_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $timeline_post,
                array_merge(["post_type" => "timeline"],$where),
                ["id", "desc"]
            );

        }
        if (!empty($memory_post)) {
            $memory_post_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $memory_post,
                array_merge(["post_type" => "memory_post"],$where),
                ["id", "desc"]
            );

        }
        if (!empty($life_of)) {
            $life_of_result = $this->commonmodel->getcustomdatawherelike(
                "comment_post",
                "post_id",
                $life_of,
                array_merge(["post_type" => "life_of"],$where),
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
        return $result;
    }
    function comment_postlist()
    {
        $this->data["pagetitle"] = "Comment List";
        // $respect_post_result = $journal_post_result = $media_post_post = $memory_post_result = $timeline_post_result = $life_of_result = [];
        // $respect_post = postbyuser("respect_post");
        // $journal_post = postbyuser("journal_post");
        // $media_post = postbyuser("media_images");
        // $memory_post = postbyuser("memories");
        // $timeline_post = postbyuser("timeline");
        // $life_of = postbyuser("life_of");
        // $respect_post_result = $journal_post_result = $media_post_post = $memory_post_result = $life_of_result = [];
        // $where = [];
        // if(isset($_GET['status']) && $_GET['status']!=''){
        //     if($_GET['status']!=3)
        //     {
        //         $where['status'] = $_GET['status'];
        //     }
        // }
        // if (!empty($respect_post)) {
        //     $respect_post_result = $this->commonmodel->getcustomdatawherelike(
        //         "comment_post",
        //         "post_id",
        //         $respect_post,
        //         array_merge(["post_type" => "respect_post"],$where),
        //         ["id", "desc"]
        //     );
        //     //echo $this->db->last_query();exit();
        // }
        // // exit();
        // if (!empty($journal_post)) {
        //     $journal_post_result = $this->commonmodel->getcustomdatawherelike(
        //         "comment_post",
        //         "post_id",
        //         $respect_post,
        //         array_merge(["post_type" => "journal_post"],$where),
        //         ["id", "desc"]
        //     );
        // }
        // if (!empty($media_post)) {
        //     $media_post_post = $this->commonmodel->getcustomdatawherelike(
        //         "comment_post",
        //         "post_id",
        //         $media_post,
        //         array_merge(["post_type" => "media_post"],$where),
        //         ["id", "desc"]
        //     );
        // }
        // if (!empty($timeline_post)) {
        //     $timeline_post_result = $this->commonmodel->getcustomdatawherelike(
        //         "comment_post",
        //         "post_id",
        //         $timeline_post,
        //         array_merge(["post_type" => "timeline"],$where),
        //         ["id", "desc"]
        //     );

        // }
        // if (!empty($memory_post)) {
        //     $memory_post_result = $this->commonmodel->getcustomdatawherelike(
        //         "comment_post",
        //         "post_id",
        //         $memory_post,
        //         array_merge(["post_type" => "memory_post"],$where),
        //         ["id", "desc"]
        //     );

        // }
        // if (!empty($life_of)) {
        //     $life_of_result = $this->commonmodel->getcustomdatawherelike(
        //         "comment_post",
        //         "post_id",
        //         $life_of,
        //         array_merge(["post_type" => "life_of"],$where),
        //         ["id", "desc"]
        //     );
        // }
        // $result = array_merge(
        //     $respect_post_result,
        //     $journal_post_result,
        //     $media_post_post,
        //     $memory_post_result,
        //     $timeline_post_result,
        //     $life_of_result
        // );
        $result = $this->getcommentcount();
        
        if (!empty($result)) {
            foreach ($result as $key => $row) {
                $price[$key] = $row["id"];
            }
            array_multisort($price, SORT_DESC, $result);
        }

        $this->data["result"] = $result;
        // echo '<pre>';print_r($result); exit();
        $this->data["pagetitle"] = lang("commentlist");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/comment_list", $this->data);
    }

    function lifeof_list()
    {
        $where = [];
        if(isset($_GET['status']) && $_GET['status']!=''){
            if($_GET['status']!=3)
            {
                $where['status'] = $_GET['status'];
            }
        }
        $where["user_id"]  =  get_frontauthuser("user_id");
        $this->data['result'] = $this->commonmodel->getjointbData('life_of',$where,'result','life_of.*,users.firstname,users.lastname,users.email',['users','life_of.user_id=users.id'],['life_of.id','desc']);
        $this->data["pagetitle"] = lang("lifeof_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/lifeof_list", $this->data);
    }

    function memory_list()
    {
        $where = [];
        $status = '';
        if(isset($_GET['status']) && $_GET['status']!=''){
            if($_GET['status']!=3)
            {
                $status = ' and status='.$_GET['status'];
                $where['status'] = $_GET['status'];
            }
        }

        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            
            $result_sql = $this->db->query("SELECT * FROM `memories` where (profile_id in (".warden_groupprofilepermission().") ) $status order by memories.id desc")->result();
            
        }else{

            $where['user_id'] = get_frontauthuser('user_id');
            
            if(get_userprofile_ids() && !empty(get_userprofile_ids() && get_frontprofileid())){
            

                $result_sql = $this->db->query("SELECT * FROM `memories` where (profile_id in (".implode(',',get_userprofile_ids()).") ) $status order by memories.id desc")->result();
            }elseif(get_userprofile_ids() && !empty(get_userprofile_ids())){

                $result_sql = $this->db->query("SELECT * FROM `memories` where (profile_id in (".implode(',',get_userprofile_ids()).") ) $status order by memories.id desc")->result();
            
            }else{

                $result_sql = $this->db->select('*')->where($where)->order_by('memories.id','desc')->get('memories')->result();
            }
        }
        // echo $this->db->last_query();
        $this->data['result'] = $result_sql;
        
        $this->data["pagetitle"] = lang("memorieslist");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/memory_list", $this->data);
    }

    function timeline_list()
    {
        $where = [];
        if(isset($_GET['status']) && $_GET['status']!=''){
            if($_GET['status']!=3)
            {
                $where['status'] = $_GET['status'];
            }
        }
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $this->data['result'] = $this->commonmodel->getjointbData_whereIn('timeline',$where,['profile_id',warden_groupprofilepermission()],'result','timeline.*,users.firstname,users.lastname,users.email',['users','timeline.user_id=users.id'],['timeline.id','desc']);
        }else{
            $where["user_id"]  =  get_frontauthuser("user_id");
            $this->data['result'] = $this->commonmodel->getjointbData('timeline',$where,'result','timeline.*,users.firstname,users.lastname,users.email',['users','timeline.user_id=users.id'],['timeline.id','desc']);
        }
        
        $this->data["pagetitle"] = lang("timeline_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/timeline_list", $this->data);
    }


    function edit_timeline($id=''){
        if(isset($_POST['update'])){
            $postdata = $this->input->post();
            // print_r($postdata); exit();
            // print_r($_FILES); exit();
            // print_r(get_frontauthuser()['user_id']); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            if(isset($_FILES['timelineimage']) && $_FILES['timelineimage']['name']!=''){


                $filename = 'timeline'.time();
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
                if($this->upload->do_upload('timelineimage'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    // print_r($data); exit();
                    $postdata['timeline_image'] = $data['upload_data']['file_name'];
                    // $this->load->view('upload_success',$data);
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());
                    //print_r($error);
                    echo json_encode(array('status'=>false,'body'=>$error));
                    exit();
                }
            }

            // $postdata['profile_id'] = $this->commonmodel->getsingleData('user_profile', array('user_id'=>$postdata['user_id']),'id,name',array('id','ASC'))['id'];
            $postdata['from_date'] = date_ymdformate(str_replace('/','-',$postdata['from_date']));
            $postdata['to_date'] = (isset($postdata['to_date']) && $postdata['to_date']!='') ? date_ymdformate(str_replace('/','-',$postdata['to_date'])) : '';
            unset($postdata['update']);
            unset($postdata['user_id']);
            unset($postdata['old_image']);
            unset($postdata['fileToUpload']);
            // print_r($postdata); exit();
            // unset($postdata['lifeof_type']);
            $resp = $this->commonmodel->updateAllData('timeline',['id'=>$postdata['id']],$postdata);
            redirect('timeline-list');
        }
        if($id!='' && $id>0){
            $where["timeline.id"]  =  $id;


        $where["user_id"]  =  get_frontauthuser("user_id");
        $this->data['result'] = $this->commonmodel->getsingleData('timeline', $where,'id,title,title_for_date,description,from_date,to_date,timeline_image') ;
        //getjointbData('timeline',$where,'row','timeline.*,users.firstname,users.lastname,users.email',['users','timeline.user_id=users.id']);
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data["pagetitle"] = lang("timeline_edit");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/edit_timeline", $this->data);
        }else{
            redirect('dashboard');
        }
    }

    function respect_list()
    {
       $where = [];
       $status = '';
       if(isset($_GET['status']) && $_GET['status']!=''){
            if($_GET['status']!=3)
            {
                $where['status'] = $_GET['status'];
                $status = ' and status='.$_GET['status'];
            }
        }
        
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $result_sql = $this->db->query("SELECT * FROM `respect_post` where trash=0 and (profile_id in (".warden_groupprofilepermission().")) $status order by respect_post.id desc")->result();
        }else{
            $where["user_id"] = get_frontauthuser("user_id");
            if(get_userprofile_ids() && !empty(get_userprofile_ids() && get_frontprofileid())){

            
                $result_sql = $this->db->query("SELECT * FROM `respect_post` where trash=0 and (profile_id in (".implode(',',get_userprofile_ids()).")) $status order by respect_post.id desc")->result();

            }elseif(get_userprofile_ids() && !empty(get_userprofile_ids())){

                $result_sql = $this->db->query("SELECT * FROM `respect_post` where trash=0 and (profile_id in (".implode(',',get_userprofile_ids()).")) $status order by respect_post.id desc")->result();
            
            }else{

                $result_sql = $this->db->select('*')->where($where)->order_by('respect_post.id','desc')->get('respect_post')->result();
            }
        }

        
        $this->data["result"]  = $result_sql;
        
        $this->data["pagetitle"] = lang("respectlist");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/respect_list", $this->data);
    }

    function album_list()
    {
        $where=[];
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $this->data['result'] = $this->commonmodel->getjointbData_whereIn('media_album',$where,["profile_id",warden_groupprofilepermission()],'result','media_album.*,users.firstname,users.lastname,users.email',['users','media_album.user_id=users.id'],['media_album.id','desc']);
        }else{
            $this->data['result'] = $this->commonmodel->getjointbData('media_album',["user_id" => get_frontauthuser("user_id")],'result','media_album.*,users.firstname,users.lastname,users.email',['users','media_album.user_id=users.id'],['media_album.id','desc']);
        }
        
        $this->data["pagetitle"] = lang("media_alum_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/album_list", $this->data);
    }

    function edit_album($id=''){
        if(isset($_POST['update'])){
            $postdata = $this->input->post();
            $postdata['user_id'] = get_frontauthuser()['user_id'];


            // $resp = $this->commonmodel->insertData('media_album',$_POST);
            unset($postdata['update']);
            unset($postdata['profile_id']);
            // print_r($postdata); exit();
            $resp = $this->commonmodel->updateAllData('media_album',['id'=>$postdata['id']],$postdata);
            redirect('album-list');
        }
        if($id!='' && $id>0){
            $where["id"]  =  $id;


        $where["user_id"]  =  get_frontauthuser("user_id");
        $this->data['result'] = $this->commonmodel->getsingleData('media_album', $where,'id,title,caption,is_public,profile_id,user_id') ;
        $this->data["pagetitle"] = lang("album_edit");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/edit_album", $this->data);
        }else{
            redirect('dashboard');
        }
    }

    function journal_list()
    {
        $where = [];
        if(isset($_GET['status']) && $_GET['status']!=''){
            if($_GET['status']!=3)
            {
                $where['status'] = $_GET['status'];
            }
        }
        $where["user_id"]  =  get_frontauthuser("user_id");
        $whereIn = [];
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $whereIn = ['profile_id',warden_groupprofilepermission()];
        }
        $this->data['result'] = $this->commonmodel->getjointbData_whereIn('journal_post',$where,$whereIn,'result','journal_post.*,users.firstname,users.lastname,users.email',['users','journal_post.user_id=users.id'],['journal_post.id','desc']);
        $this->data["pagetitle"] = lang("journallist");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/journal_list", $this->data);
    }

    function edit_journal($id=''){
        if(isset($_POST['update'])){
            $postdata = $this->input->post();
            // print_r($postdata); exit();
            // print_r($_FILES); exit();
            // print_r(get_frontauthuser()['user_id']); exit();
            $postdata['user_id'] = get_frontauthuser()['user_id'];
            if(isset($_FILES['image']) && $_FILES['image']['name']!=''){


                $filename = 'journal'.time();
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
                if($this->upload->do_upload('image'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    // print_r($data); exit();
                    $postdata['image'] = $data['upload_data']['file_name'];
                    // $this->load->view('upload_success',$data);
                }
                else
                {
                    $error = array('error' => $this->upload->display_errors());
                    //print_r($error);
                    $this->session->set_flashdata('error',implode(',',$error));
                    $this->session->set_flashdata('journalflashsession_post',true);
                    redirect('/');
                }
            }

            $postdata['category'] = $postdata['journal_category'];
            unset($postdata['update']);
            unset($postdata['user_id']);
            unset($postdata['journal_category']);
            unset($postdata['old_image']);
            unset($postdata['fileToUpload']);
            // print_r($postdata); exit();
            // unset($postdata['lifeof_type']);
            $resp = $this->commonmodel->updateAllData('journal_post',['id'=>$postdata['id']],$postdata);
            redirect('journal-list');
        }
        if($id!='' && $id>0){
            $where["id"]  =  $id;


        $where["user_id"]  =  get_frontauthuser("user_id");
        $this->data['result'] = $this->commonmodel->getsingleData('journal_post', $where,'id,title,category,description,image,is_public,profile_id,user_id') ;
        //getjointbData('timeline',$where,'row','timeline.*,users.firstname,users.lastname,users.email',['users','timeline.user_id=users.id']);
        // echo '<pre>';print_r($this->data['result']); exit();
        $this->data["pagetitle"] = lang("journal_edit");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/edit_journal", $this->data);
        }else{
            redirect('dashboard');
        }
    }

    function edit_albumimage($id=''){
        if(isset($_POST['update'])){
            $postdata = $_POST;
            // $postdata['user_id'] = get_frontauthuser('user_id');
            // $postdata['profile_id'] =$profile_id = get_frontprofileid();

            if(isset($_FILES['media_image']) && $_FILES['media_image']['name']!=''){
                ;

                $filename = 'media_image'.time();
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
                if($this->upload->do_upload('media_image'))
                {
                    $data = array('upload_data' => $this->upload->data());
                    // print_r($data); exit();
                    $postdata['image'] = $data['upload_data']['file_name'];
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
            // unset($postdata['submit']);
            // print_r($postdata); exit();
            // $resp = $this->commonmodel->insertData('media_images',$postdata);
            unset($postdata['update']);
            unset($postdata['profile_id']);
            unset($postdata['old_image']);
            // print_r($postdata); exit();
            $resp = $this->commonmodel->updateAllData('media_images',['id'=>$postdata['id']],$postdata);
            redirect('album-image-list/'.$postdata['album_id']);
        }
        if($id!='' && $id>0){
            $where["id"]  =  $id;


        $where["user_id"]  =  get_frontauthuser("user_id");

        $this->data['result'] = $this->commonmodel->getsingleData('media_images', $where,'id,album_id,image,title,media_caption,media_ispublic,profile_id') ;
        $this->data['media_album'] = $this->commonmodel->getAllDataArray('media_album',['user_id'=>get_frontauthuser('user_id'),'profile_id'=>$this->data['result']['profile_id']],'id','desc');
        $this->data["pagetitle"] = lang("albumimage_edit");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/edit_albumimage", $this->data);
        }else{
            redirect('dashboard');
        }
    }

    function album_image_list($album_id='')
    {
        if($album_id!=''){
            $where = [];
            if(isset($_GET['status']) && $_GET['status']!=''){
                if($_GET['status']!=3)
                {
                    $where['status'] = $_GET['status'];
                }
            }
            $where["user_id"]  =  get_frontauthuser("user_id");
            $where["album_id"]  =  $album_id;
            $this->data['result'] = $this->commonmodel->getjointbData('media_images',$where,'result','media_images.*,users.firstname,users.lastname,users.email',['users','media_images.user_id=users.id'],['media_images.id','desc']);
            $this->data["pagetitle"] = lang("album_images");
            $this->template->set_layout("frontlayout");
            $this->template->title("Welcome to Memorisation");

            $this->template->set_partial("homenavbar", "partials/frontnavbar");
            $this->template->build("userpanel/albumimage_list", $this->data);
        }else{
            redirect('album-list');
        }
    }

    function comment_delete($row_id = "")
    {
        if ($row_id != "") {
            $this->commonmodel->deleteData("comment_post", "id", $row_id);
        }
        redirect("comment-list");
    }




    function memory_delete($row_id = "")
    {
        if ($row_id != "") {
            delete_like('memories',$row_id);
            delete_comment('memory_post',$row_id);
            // print_r(removepostimages(['id'=>$row_id],'memories','memoryimage'));
            // exit();
            removepostimages(['id'=>$row_id],'memories','memoryimage');
            $this->commonmodel->deleteData("memories", "id", $row_id);
        }
        redirect("memory-list");
    }

    function timeline_delete($row_id = "")
    {
        if ($row_id != "") {
            delete_comment('timeline',$row_id);
            $this->commonmodel->deleteData("timeline", "id", $row_id);
        }
        redirect("timeline-list");
    }

    function respect_delete($row_id = "")
    {
        if ($row_id != "") {
            delete_like('respect_post',$row_id);
            delete_comment('respect_post',$row_id);
            $this->commonmodel->deleteData("respect_post", "id", $row_id);
        }
        redirect("respect-list");
    }


    function delete_warden($row_id = "")
    {
        if ($row_id != "") {
            $this->commonmodel->deleteData("warden_users", "id", $row_id);

            // $this->commonmodel->deleteData("user_profile", "user_id ", $row_id);

        }
        redirect("warden-list");
    }

    function album_delete($row_id = "")
    {
        if ($row_id != "") {
            //delete_comment('media_images',$row_id);
            $media_images_result = $this->commonmodel->getAllDataArray('media_images',['album_id'=>$row_id]);
            foreach($media_images_result as $val){
                removepostlike('post_like_count',['post_id'=>$val->id,'table'=>'media_post']);
                removepostimages(['id'=>$row_id],'media_images','image');
            }
            $this->commonmodel->deleteData("media_album", "id", $row_id);
            $this->commonmodel->deleteData("media_images", "album_id", $row_id);

        }
        redirect("album-list");
    }

    function album_image_delete($row_id = "")
    {
        if ($row_id != "") {
            //delete_comment('media_images',$row_id);
            $this->commonmodel->deleteData("media_images", "id", $row_id);

        }
        redirect("album-image-list");
    }

    function journal_delete($row_id = "")
    {
        if ($row_id != "") {

            delete_like('journal_post',$row_id);
            delete_comment('journal_post',$row_id);
            $this->commonmodel->deleteData("journal_post", "id", $row_id);

        }
        redirect("journal-list");
    }
    function featured_list()
    {

        // if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
        //     $result_sql = $this->db->query("SELECT * FROM `memories` where (profile_id in (".warden_groupprofilepermission().") ) $status order by memories.id desc")->result();
        // }else{

        $this->data['result'] =$this->featurepost_customdata();
        // echo '<pre>';print_r($this->featurepost_customdata()); exit();
        //$this->data['result'] = $this->commonmodel->getjointbData('journal_post',["user_id" => get_frontauthuser("user_id")],'result','journal_post.*,users.firstname,users.lastname,users.email',['users','journal_post.user_id=users.id'],['journal_post.id','desc']);
        $this->data["pagetitle"] = lang("featured_posts_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/featuredpost_list", $this->data);
    }

    function featured_delete($tb,$id){
        if ($tb!='' && $id != "") {

            // delete_like('journal_post',$row_id);
            // delete_comment('journal_post',$row_id);
            $this->commonmodel->updateAllData($tb,["id"=>$id],['feature_post'=>0]);

        }
        redirect("featured-list");
    }



    function featurepost_customdata(){
        $wherein_condition = [];
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $wherein_condition=['user_profile.id',warden_groupprofilepermission()];
        }
        if(isset($_GET['status']) && $_GET['status']!='' && $_GET['status']!=3){
            $memory = $this->commonmodel->getjointbData_whereIn('memories',array('memories.user_id'=>get_frontauthuser("user_id"),'memories.status'=>$_GET['status'],'memories.trash'=>0,'memories.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,memories.id,memories.title as name,memories.memoryimage as image,memories.comment,memories.created_at as post_date,"memories" AS tablename,memories.updated_at,memories.status,memories.feature_postby',['user_profile','memories.profile_id=user_profile.id'],["memories.id","DESC"]);

            $timeline = $this->commonmodel->getjointbData_whereIn('timeline',array('timeline.user_id'=>get_frontauthuser("user_id"),'timeline.status'=>$_GET['status'],'timeline.trash'=>0,'timeline.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,timeline.id,timeline.title as name,timeline.timeline_image as image,timeline.description as comment,timeline.created_at as post_date,"timeline" AS tablename,timeline.updated_at,timeline.status,timeline.feature_postby',['user_profile','timeline.profile_id=user_profile.id'],["timeline.id","DESC"]);

            $respect_post = $this->commonmodel->getjointbData_whereIn('respect_post',array('respect_post.user_id'=>get_frontauthuser("user_id"),'respect_post.status'=>$_GET['status'],'respect_post.trash'=>0,'respect_post.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,respect_post.id,respect_post.name,respect_post.respect_image as image,respect_post.comment,respect_post.created_at as post_date,"respect_post" AS tablename,respect_post.updated_at,respect_post.status,respect_post.feature_postby',['user_profile','respect_post.profile_id=user_profile.id'],["respect_post.id","DESC"]);

            $journal_post = $this->commonmodel->getjointbData_whereIn('journal_post',array('journal_post.user_id'=>get_frontauthuser("user_id"),'journal_post.status'=>$_GET['status'],'journal_post.trash'=>0,'journal_post.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,journal_post.id,journal_post.title as name,journal_post.image as image,journal_post.description as comment,journal_post.created_at as post_date,"journal_post" AS tablename,journal_post.updated_at,journal_post.status,journal_post.feature_postby',['user_profile','journal_post.profile_id=user_profile.id'],["journal_post.id","DESC"]);
        }else{
            

            $memory = $this->commonmodel->getjointbData_whereIn('memories',array('memories.user_id'=>get_frontauthuser("user_id"),'memories.trash'=>0,'memories.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,memories.id,memories.title as name,memories.memoryimage as image,memories.comment,memories.created_at as post_date,"memories" AS tablename,memories.updated_at,memories.status,memories.feature_postby,user_profile.id',['user_profile','memories.profile_id=user_profile.id'],["memories.id","DESC"]);
            
            $timeline = $this->commonmodel->getjointbData_whereIn('timeline',array('timeline.user_id'=>get_frontauthuser("user_id"),'timeline.trash'=>0,'timeline.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,timeline.id,timeline.title as name,timeline.timeline_image as image,timeline.description as comment,timeline.created_at as post_date,"timeline" AS tablename,timeline.updated_at,timeline.status,timeline.feature_postby',['user_profile','timeline.profile_id=user_profile.id'],["timeline.id","DESC"]);

            $respect_post = $this->commonmodel->getjointbData_whereIn('respect_post',array('respect_post.user_id'=>get_frontauthuser("user_id"),'respect_post.trash'=>0,'respect_post.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,respect_post.id,respect_post.name,respect_post.respect_image as image,respect_post.comment,respect_post.created_at as post_date,"respect_post" AS tablename,respect_post.updated_at,respect_post.status,respect_post.feature_postby',['user_profile','respect_post.profile_id=user_profile.id'],["respect_post.id","DESC"]);

            $journal_post = $this->commonmodel->getjointbData_whereIn('journal_post',array('journal_post.user_id'=>get_frontauthuser("user_id"),'journal_post.trash'=>0,'journal_post.feature_post'=>1),$wherein_condition, 'result_array','user_profile.profile_name,user_profile.first_name,user_profile.last_name,journal_post.id,journal_post.title as name,journal_post.image as image,journal_post.description as comment,journal_post.created_at as post_date,"journal_post" AS tablename,journal_post.updated_at,journal_post.status,journal_post.feature_postby',['user_profile','journal_post.profile_id=user_profile.id'],["journal_post.id","DESC"]);


        }

        
        // print_r($timeline);
        // return $memory; 
        
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

    function featurepost_pending(){
        /************* */
        $memory_pending = $this->commonmodel->getjointbData('memories',array('memories.user_id'=>get_frontauthuser("user_id"),'memories.trash'=>0,'memories.feature_post'=>1,'memories.status'=>0), 'result_array','memories.id',['user_profile','memories.profile_id=user_profile.id']);

        $timeline_pending = $this->commonmodel->getjointbData('timeline',array('timeline.user_id'=>get_frontauthuser("user_id"),'timeline.trash'=>0,'timeline.feature_post'=>1,'timeline.status'=>0), 'result_array','timeline.id',['user_profile','timeline.profile_id=user_profile.id']);

        $respect_post_pending = $this->commonmodel->getjointbData('respect_post',array('respect_post.user_id'=>get_frontauthuser("user_id"),'respect_post.trash'=>0,'respect_post.feature_post'=>1,'respect_post.status'=>0), 'result_array','respect_post.id',['user_profile','respect_post.profile_id=user_profile.id']);

        $journal_post_pending = $this->commonmodel->getjointbData('journal_post',array('journal_post.user_id'=>get_frontauthuser("user_id"),'journal_post.trash'=>0,'journal_post.feature_post'=>1,'journal_post.status'=>0), 'result_array','journal_post.id',['user_profile','journal_post.profile_id=user_profile.id']);
        $result_pending = array_merge($memory_pending,$timeline_pending,$respect_post_pending,$journal_post_pending);
        return $result_pending;
    }

    function warder_permission($warden_id=''){
        if(get_frontauthuser('warden_user_id')>0){
            redirect('/dashboard');
        }
        // default_warder_permission_allow($warden_id);
        if($warden_id!=''){
            $this->data['result'] = $this->commonmodel->getcustomdata('warden_permission',['warder_user_id'=>$warden_id]);
            $this->data['result_section'] = $this->commonmodel->getjointbData('warden_permission',['warder_user_id'=>$warden_id],'result','group_concat(id) id,section_name',null,null,'section_name');
            // echo '<pre>';print_r($this->data); exit();

            $this->data["pagetitle"] = lang("set_permission");
            $this->template->set_layout("frontlayout");
            $this->template->title("Welcome to Memorisation");

            $this->template->set_partial("homenavbar", "partials/frontnavbar");
            $this->template->build("userpanel/warden_permission", $this->data);
        }else{
            redirect('/warden-list');
        }
    }

    function warden_permission_post(){
        if(get_frontauthuser('warden_user_id')>0){
            redirect('/dashboard');
        }
        if(isset($_POST['submit'])){
            unset($_POST['submit']);
            $warder_user_id = $_POST['warder_user_id'];
            unset($_POST['warder_user_id']);
            $this->commonmodel->updateAllData('warden_permission',['warder_user_id'=>$warder_user_id],['permission_status'=>2]);
            foreach($_POST as $key => $val){
                $key = explode('@',$key);
                if(count($key)==2){
                    $key[0].'<br>';
                    $key[1];
                    $where = ['warder_user_id'=>$warder_user_id,'section_name'=>$key[0],'permission_type'=>$key[1]];
                    $this->commonmodel->updateAllData('warden_permission',$where,['permission_status'=>1]);
                }

            }
            redirect('warder_permission/'.$warder_user_id);
        }
        redirect('/');
    }


    /* 
    * old warden registration
    *
    function register_warden(){
        if(get_frontauthuser('warden_user_id')>0){
            redirect('/dashboard');
        }
        if(isset($_POST['submit']) && !empty($_POST)){
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required|is_unique[users.email]');
            // $this->form_validation->set_rules('password', 'Password', 'required');
            // $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->data["pagetitle"] = lang("register_warden");
                $this->template->set_layout("frontlayout");
                $this->template->title("Welcome to Memorisation");

                $this->template->set_partial("homenavbar", "partials/frontnavbar");
                $this->template->build("userpanel/add_warden", $this->data);
            }else{
                // print_r(user_allfamilygroup());
                // $user_id = get_frontauthuser("user_id");
                // $grouplist = $this->commonmodel->getjointbData('family_group',array('user_id'=>$user_id),'result','id,group_name');
                // print_r($grouplist);
                $otp = rand(100000,999999);
                $postdata = $this->input->post();
                $warden_group_id = $_POST['warden_group_id'];
                $warden_create_limit = $this->commonmodel->getjointbData('family_group',array('family_group.id'=>$warden_group_id),'row','family_group.id as groupid,family_group.group_name,user_type.warden_limit',array('user_type','family_group.userplan_type=user_type.id'));
                // echo '<pre>';
                // echo $this->db->last_query();
                // print_r($warden_create_limit); exit();
                $warden_group_count = $this->commonmodel->getjointbData('users',array('warden_group_id'=>$warden_group_id),'num_rows');
                if(isset($warden_create_limit) && $warden_create_limit->warden_limit>$warden_group_count){

                    // $postdata['password'] = password_hash($postdata['password'],  PASSWORD_BCRYPT) ;
                    unset($postdata['submit']);
                    unset($postdata['warden_limit']);
                    // unset($postdata['conpassword']);
                    $postdata['warden_user'] = 1;
                    $postdata['admin_user_id'] = get_frontauthuser("user_id");
                    $postdata['resetpassword_token']=$otp;
                    // echo '<pre>';print_r($postdata); exit();
                    $user_id = $this->commonmodel->insertData('users',$postdata);
                    default_warder_permission_allow($user_id);
                    //$profile_id = $this->commonmodel->insertData('user_profile',['user_id'=>$user_id,'name'=>$postdata['firstname']]);
                    // print_r($postdata); exit();
                    try{
                        $msgarr['userName'] = $postdata['firstname'].' '.$postdata['lastname'];
                        $msgarr['email'] = $postdata['email'];
                        $msgarr['token'] = base64_encode($otp);
                        $templatename = 'generate_password';
                        $subject = lang('generate_password');
                        $tomail = $_POST['email'];//'ashishnuance@gmail.com';

                        $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'generate_password'])->get('email_template')->row();

                        $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('emailverification_msg');
                        $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';
                        $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                    }catch(Exception $e) {
                      $e->getMessage();
                      $this->session->set_flashdata('error','Try again');
                    }

                    $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                    redirect('warden-list');
                }else{
                    $this->session->set_flashdata('error',lang('warden_limit_overmsg'));
                    //redirect('edit_warden/'.$id);
                }
            }

        }
        $user_id = get_frontauthuser("user_id");
        $this->data['grouplist'] = $this->commonmodel->getjointbData('family_group',array('user_id'=>$user_id),'result','id,group_name');
        $this->data["pagetitle"] = lang("register_warden");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/add_warden", $this->data);
    }
    */

    /**
    * new warden register code
    **/
    function register_warden(){
        // echo get_frontauthuser('warden_user_id');
        // print_r($_POST); exit();
        if(get_frontauthuser('warden_user_id')>0){
            redirect('/dashboard');
        }
        if(isset($_POST['submit']) && !empty($_POST)){
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email', 'Email Address', 'required|is_unique[warden_users.email]');
            // $this->form_validation->set_rules('password', 'Password', 'required');
            // $this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
            if ($this->form_validation->run() == FALSE)
            {
                $this->data["pagetitle"] = lang("register_warden");
                $this->template->set_layout("frontlayout");
                $this->template->title("Welcome to Memorisation");

                $this->template->set_partial("homenavbar", "partials/frontnavbar");
                
                $this->template->build("userpanel/add_warden", $this->data);
            }else{
                // print_r(get_frontauthuser('user_planid')); exit();
                // print_r(user_allfamilygroup()); exit('else');
                // $user_id = get_frontauthuser("user_id");
                // $grouplist = $this->commonmodel->getjointbData('family_group',array('user_id'=>$user_id),'result','id,group_name');
                // print_r($grouplist);
                $otp = rand(100000,999999);
                $postdata = $this->input->post();
                // $admin_user_id = $
                $warden_group_id = isset($_POST['warden_group_id']) ? $_POST['warden_group_id'] : 0;
                //$warden_create_limit = $this->commonmodel->getjointbData('family_group',array('family_group.id'=>$warden_group_id),'row','family_group.id as groupid,family_group.group_name,user_type.warden_limit',array('user_type','family_group.userplan_type=user_type.id'));
                
                $warden_create_limit = $this->commonmodel->getjointbData('users',array('users.userplan_type'=>user_detail(get_frontauthuser('user_id'))->userplan_type),'row','users.id,users.firstname,user_type.usertype,user_type.profile_limit,user_type.warden_limit',array('user_type','users.userplan_type=user_type.id'));
                // echo '<pre>';
                // echo $this->db->last_query();
                $warden_group_count = $this->commonmodel->getjointbData('warden_users',array('admin_user_id'=>get_frontauthuser('user_id')),'num_rows');
                // print_r($warden_group_count);echo $warden_create_limit->warden_limit; exit();
                if(isset($warden_create_limit) && $warden_create_limit->warden_limit>$warden_group_count){

                    // $postdata['password'] = password_hash($postdata['password'],  PASSWORD_BCRYPT) ;
                    unset($postdata['submit']);
                    unset($postdata['warden_limit']);
                    // unset($postdata['conpassword']);
                    //$postdata['warden_user'] = 1;
                    $postdata['admin_user_id'] = get_frontauthuser("user_id");
                    $postdata['resetpassword_token']=$otp;
                    $postdata['password'] = password_hash(
                        '123123',
                        PASSWORD_BCRYPT
                    );
                    // echo '<pre>';print_r($postdata); exit();
                    $user_id = $this->commonmodel->insertData('warden_users',$postdata);
                    default_warder_permission_allow($user_id);
                    //$profile_id = $this->commonmodel->insertData('user_profile',['user_id'=>$user_id,'name'=>$postdata['firstname']]);
                    // print_r($postdata); exit();
                    try{
                        $msgarr['userName'] = $postdata['firstname'].' '.$postdata['lastname'];
                        $msgarr['email'] = $postdata['email'];
                        $msgarr['token'] = base64_encode($otp);
                        $templatename = 'generate_password';
                        $subject = lang('generate_password');
                        $tomail = $_POST['email'];//'ashishnuance@gmail.com';

                        $temp_resp = $this->db->select('subject,bodymsg')->where(['slug'=>'generate_password'])->get('email_template')->row();

                        $subject = (isset($temp_resp) && $temp_resp->subject) ? $temp_resp->subject : lang('emailverification_msg');
                        $msgarr['body_msg'] = (isset($temp_resp) && $temp_resp->bodymsg) ? $temp_resp->bodymsg : '';
                        $this->sendmailcommon($tomail,$subject,$templatename,$msgarr);
                    }catch(Exception $e) {
                      $e->getMessage();
                      $this->session->set_flashdata('error','Try again');
                    }
                    // exit('asdasd');
                    $this->session->set_flashdata('success',lang('addedsuccess_msg'));
                    redirect('warden-list');
                }else{
                    
                    $this->session->set_flashdata('error',lang('warden_limit_overmsg'));
                    //redirect('edit_warden/'.$id);
                }
            }

        }
        $user_id = get_frontauthuser("user_id");
        $this->data['grouplist'] = $this->commonmodel->getjointbData('family_group',array('user_id'=>$user_id),'result','id,group_name');
        $this->data["pagetitle"] = lang("register_warden");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/add_warden", $this->data);
    }

    function checkgroup_wardenlimit(){
        // echo $_GET['groupid'];
        $warden_count = $this->commonmodel->getjointbData('users',array('warden_group_id'=>$_GET['groupid'],'warden_user'=>1),'num_rows','id');
        if($warden_count<get_userplan_detail(familygroupname_bygroupid($_GET['groupid'])->userplan_type)->warden_limit){
            echo true;
        }else{
            echo false;
        }

    }

    function edit_warden($id=''){
        if(isset($_POST['submit'])){
            
            $warden_create_limit = $this->commonmodel->getjointbData('users',array('users.userplan_type'=>get_frontauthuser('user_planid')),'row','users.id,users.firstname,user_type.usertype,user_type.profile_limit,user_type.warden_limit',array('user_type','users.userplan_type=user_type.id'));
            
            $warden_group_count = $this->commonmodel->getjointbData('warden_users',array('admin_user_id'=>get_frontauthuser('user_id')),'num_rows');
            //print_r($warden_group_count);echo $warden_create_limit->warden_limit; exit();
            
            //if(isset($warden_create_limit) && $warden_create_limit->warden_limit>$warden_group_count){
                // print_r($warden_group_count); exit();
                $updatedata = $this->input->post();
                //print_r($updatedata);exit;
                unset($updatedata['submit']);
                $this->commonmodel->updateAllData('warden_users',['id'=>$updatedata['id']],$updatedata);
                redirect('warden-list');
            /*}else{
                $this->session->set_flashdata('error',lang('warden_limit_overmsg'));
                redirect('edit_warden/'.$id);
            }*/
        }
        if($id!=''){
            $user_id = get_frontauthuser("user_id");
            $this->data['grouplist'] = $this->commonmodel->getjointbData('family_group',array('user_id'=>$user_id),'result','id,group_name');
            $this->data['result'] = $this->commonmodel->getsingleData('warden_users',['id'=>$id],'id,firstname,lastname,contactnumber,house_number,address_1,address_2,city,region,postcode,warden_group_id,dob');
            $this->data["pagetitle"] = lang("edit_warden");
            $this->template->set_layout("frontlayout");
            $this->template->title("Welcome to Memorisation");

            $this->template->set_partial("homenavbar", "partials/frontnavbar");
            $this->template->build("userpanel/edit_warden", $this->data);
        }else{
            redirect('warden-list');
        }
    }

    /** 
    * old warden list code
    **
    function warden_list()
    {
        if(get_frontauthuser('warden_user_id')>0){
            redirect('/dashboard');
        }
        if(isset($_GET['status']) && $_GET['status']!='' && $_GET['status']!=3){
            $user_status = ["admin_user_id" => get_frontauthuser("user_id"),"warden_user" =>1,'user_status'=>$_GET['status']];
        }else{
            $user_status = ["admin_user_id" => get_frontauthuser("user_id"),"warden_user" =>1];
        }

        $this->data['result'] = $this->commonmodel->getAllDataArray('users',$user_status,'id','desc');
        // echo $this->db->last_query(); exit();
        $this->data["pagetitle"] = lang("warden_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/warden_list", $this->data);
    }
    */

    /* 
    * new warden list code
    */
    function warden_list()
    {
        if(get_frontauthuser('warden_user_id')>0){
            redirect('/dashboard');
        }
        if(isset($_GET['status']) && $_GET['status']!='' && $_GET['status']!=3){
            $user_status = ["admin_user_id" => get_frontauthuser("user_id"),'user_status'=>$_GET['status']];
        }else{
            $user_status = ["admin_user_id" => get_frontauthuser("user_id")];
        }

        $this->data['result'] = $this->commonmodel->getAllDataArray('warden_users',$user_status,'id','desc');
        // echo $this->db->last_query(); exit();
        $this->data["pagetitle"] = lang("warden_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/warden_list", $this->data);
    }

    function like_list()
    {
        /*postbyuser();
        SELECT post_like_count.*,concat(users.firstname,' ',users.lastname) fullname FROM `post_like_count` join users on post_like_count.user_id=users.id
        */
        $whereIn = [];
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            $whereIn = ['profile_id',warden_groupprofilepermission()];
        }
        $this->data['result'] = $this->commonmodel->getjointbData_whereIn('post_like_count',["user_id" => get_frontauthuser("user_id"),'like_count'=>1],$whereIn,'result','post_like_count.*,users.firstname,users.lastname,users.email,like_count',['users','post_like_count.user_id=users.id'],['post_like_count.id','desc']);
        
        $this->data["pagetitle"] = lang("like_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/like_list", $this->data);
    }

    function like_onprofile()
    {
        $profileid = $this->db->select('group_concat(id) as profile_id')->where('user_id',get_frontauthuser('user_id'))->get('user_profile')->row()->profile_id;
        if($profileid!=''){
            // echo $profileid; exit();;
        // print_r($profileid);
        $this->data['result'] = $this->db->select('post_like_count.*,users.firstname,users.lastname,users.email')->join('users','post_like_count.user_id=users.id','left')->where(['like_count'=>1])->where_in('profile_id',explode(',',$profileid))->order_by('post_like_count.id','desc')->get('post_like_count')->result();
        // echo $this->db->last_query(); exit();
        // print_r($this->data['result']); exit();
        $this->data["pagetitle"] = lang("like_onprofile");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/likeon_profile", $this->data);
        }else{
            redirect('/');
        }
    }

    function updateactivestatus($tb,$id,$status=0){
        if($tb!='' && $id!=''){
            $this->commonmodel->updateAllData($tb,['id'=>$id],['status'=>$status]);
            if($tb=='memories'){
                $path = 'memory-list?status=3';
            }
            elseif($tb=='timeline'){
                $path = 'timeline-list?status=3';
            }elseif($tb=='respect_post'){
                $path = 'respect-list?status=3';
            }elseif($tb=='journal_post'){
                $path = 'journal-list?status=3';
            }elseif($tb=='media_image'){
                $path = 'album-list';
            }elseif($tb=='comment_post'){
                $result = $this->getcommentcount('pending');
                // echo count($result);exit();
                if(count($result)>0){
                    $path = 'comment-list?status=0';
                }else{
                    $path = 'comment-list?status=3';
                }
            }elseif($tb=='media_images'){

                $album_id = $this->db->select('album_id')->where(['id'=>$id])->get('media_images')->row()->album_id;
                $path = 'album-image-list/'.$album_id.'?status=3';
            }elseif($tb=='life_of'){
                $path = 'life-of-list?status=3';
            }

        }
        redirect($path);
    }

    function updatefeatureactivestatus($tb,$id,$status=0){
        if($tb!='' && $id!=''){
            $this->commonmodel->updateAllData($tb,['id'=>$id],['status'=>$status]);
            if($tb=='memories'){
                $path = 'memory-list?status=3';
            }
            elseif($tb=='timeline'){
                $path = 'timeline-list?status=3';
            }elseif($tb=='respect_post'){
                $path = 'respect-list?status=3';
            }elseif($tb=='journal_post'){
                $path = 'journal-list?status=3';
            }elseif($tb=='media_image'){
                $path = 'album-list';
            }elseif($tb=='comment_post'){
                $path = 'comment-list?status=3';
            }elseif($tb=='media_images'){

                $album_id = $this->db->select('album_id')->where(['id'=>$id])->get('media_images')->row()->album_id;
                $path = 'album-image-list/'.$album_id.'?status=3';
            }elseif($tb=='life_of'){
                $path = 'life-of-list?status=3';
            }

        }
        redirect('featured-list?status=3');
    }

    function subscription_list()
    {
     $where["user_id"]  =  get_frontauthuser("user_id");
        $this->data['result'] = $this->commonmodel->getcustomdata('user_subscribe',$where);
        $this->data["pagetitle"] = lang("subscription_list");
        $this->template->set_layout("frontlayout");
        $this->template->title("Welcome to Memorisation");

        $this->template->set_partial("homenavbar", "partials/frontnavbar");
        $this->template->build("userpanel/subscription_list", $this->data);
    }


    function familygroup_list()
    {
        if(checkauth()){

                $group_result = $this->db->select('*')->where('user_id',get_frontauthuser('user_id'))->get('family_group')->result();
                // echo $profileid; exit();;
                // print_r($profileid);
                $this->data['result'] = (isset($group_result) && $group_result!='') ? $group_result : [];
                // echo $this->db->last_query(); exit();
                // print_r($this->data['result']); exit();
                $this->data["pagetitle"] = lang("family_group");
                $this->template->set_layout("frontlayout");
                $this->template->title("Welcome to Memorisation");

                $this->template->set_partial("homenavbar", "partials/frontnavbar");
                $this->template->build("userpanel/familygroup_list", $this->data);

        }else{
            redirect('/');

        }
    }

    function familymember_list($group_id='')
    {
        if(checkauth() && $group_id!=''){

                $profile_result = $this->db->select('*')->where('user_id',get_frontauthuser('user_id'))->where('family_group_id',$group_id)->get('user_profile')->result();
                // echo $profileid; exit();;
                // print_r($profileid);
                $this->data['result'] = (isset($profile_result) && $profile_result!='') ? $profile_result : [];
                // echo $this->db->last_query(); exit();
                // print_r($this->data['result']); exit();
                $this->data["pagetitle"] = lang("family_members");
                $this->template->set_layout("frontlayout");
                $this->template->title("Welcome to Memorisation");

                $this->template->set_partial("homenavbar", "partials/frontnavbar");
                $this->template->build("userpanel/familymember_list", $this->data);

        }else{
            redirect('/');

        }
    }

}
