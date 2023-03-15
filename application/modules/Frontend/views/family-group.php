<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<section id="section-1">
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-12 col-md-12 d-flex">
                <nav class="navigation-custom">
                    <div class="right-part d-none d-md-table">
                        <?php 
                        $this->load->view('partials/top-headerrightsection');
                        //include('top-hederrightsection') ?>
                    </div>
                </nav>
            </div>
        </div>
</section>
<?php if($this->session->flashdata('newprofile')){
   $userprofiledata = $this->commonmodel->getsingleData('user_profile',['id'=>$this->session->flashdata('newprofile')],'id,user_id,first_name,last_name,profile_url');
   // print_r($userprofiledata); exit();
   $this->load->view('qrcodegenerate',['userprofiledata'=>$userprofiledata]);
   }
    
   ?>



<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="media-head-cover justify-content-md-between mb-5">
                <h2 class="head-title mt-3 mb-0"><?php echo lang('family_group_heading') ?></h2>

                <div class="right-part d-table mt-md-3 mb-md-3">
                    <div class="upload-media d-table float-start">
                        <?php /*
                        if(!get_frontauthuser('warden_user_id')){
                            if(get_user_plan() =='free'){
                            if(user_profilecount()==0){ ?>
                        <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                            data-bs-target="#createProfile" role="button" aria-expanded="false"
                            aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                        <?php }
                            }elseif(get_user_plan() =='basic'){
                                if(user_profilecount()==0){ ?>
                        <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                            data-bs-target="#createProfile" role="button" aria-expanded="false"
                            aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                        <?php }elseif(user_profilecount()==1){ ?>
                        <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                            data-bs-target="#createProfile" role="button" aria-expanded="false"
                            aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                        <?php }
                            }else{ ?>
                        <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                            data-bs-target="#createProfile" role="button" aria-expanded="false"
                            aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                        <?php 
                            }
                        } */
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                if($this->session->flashdata('groupsuccess')){
                    echo '<div class="alert alert-success">'.$this->session->flashdata('groupsuccess').'</div>'; 
                }
                ?>
                <div class="alert alert-success profile-success hide"></div>
                <div class="alert alert-danger profile-error hide"></div>
                <?php echo ($this->session->flashdata('success')) ? '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' : ''; ?>
                <?php echo ($this->session->flashdata('error')) ? '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' : ''; ?>
                <?php 
                $profile_qrcode = $profile_id =$user_id ='';
            if(isset($profilelist) && count($profilelist)>0){
            foreach($profilelist as $k => $val){ 
               if(isset($val->qrcode_img) && $val->qrcode_img!=''){ 
                $profile_qrcode = $val->profile_url;
                $user_id = $val->user_id;
                $profile_id = $val->id;
                } ?>
                <div class="col-12 col-md-4 col-lg-2 mt-3">
                    <div class="family-m-column d-flex justify-content-between">
                        <div class="">
                            <div style="width:100%;text-align:right;">
                            <?php
                                if(checkauth() && !get_frontauthuser('warden_user_id') && $val->user_id==get_frontauthuser('user_id')){ ?>
                                <a href="" onclick="updategroup(this,'updategroup')"
                                    data-groupid="<?php echo $val->id ?>" data-groupname="<?php echo $val->group_name ?>" data-bs-toggle="modal"
                                    data-bs-target="#updateGroup" style="width:100%;text-align:right;"><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/edit-icon.png"
                                        style="width:20px;"></a>
                                <?php } ?>
                            </div>
                            <h3><?php echo ' Group - '.($k+1) ?>
                            <span>
                                <a href="<?php echo site_url('familymember/').$val->id ?>">
                                    <!-- <img src="<?php echo site_url('assets/frontend/').'uploads/';
                     echo ($val->group_pic!='') ? $val->profile_pic : get_defaultimage()->profile_img ?>"
                                        style="width:100px;height:160px;"> -->
                                </a>
                            </span>
                            <p class="name-person"><a
                                    href="<?php echo site_url('familymember/').$val->id ?>"><?php echo ($val->group_name!='') ? $val->group_name : ucwords($val->first_name.' '.$val->last_name);
                                     ; ?></a>
                            </p>
                        </div>
                        <?php /*
                        <div class="bio-detail">
                            <div style="width:100%;text-align:right;">
                                <p><?php //echo (isset($val->group_name) && $val->group_name!='') ? $val->group_name : '' ?></p>
                                <?php
                                if(checkauth() && !get_frontauthuser('warden_user_id') && $val->user_id==get_frontauthuser('user_id')){ ?>
                                <a href="" onclick="userprofleupdate(this,'<?php echo lang('edit_profile') ?>')"
                                    data-proid="<?php echo $val->id ?>" data-bs-toggle="modal"
                                    data-bs-target="#createProfile" style="width:100%;text-align:right;"><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/edit-icon.png"
                                        style="width:25px;"></a>
                                <?php if($val->admin_group==0){ ?>
                                <a href="<?php echo site_url('deleteprofile/').$val->id ?>"
                                    onclick="return confirm('<?php echo lang('delete_confirm_message') ?>')"
                                    style="width:100%;text-align:right;"><img
                                        src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg"
                                        class="delete-svgicon" alt="delete" /></a>
                                <?php } 
                                } ?>
                            </div>
                        </div>
                        */ ?>
                    </div>
                </div>
                <?php }
            }else{
              echo '<h3>'.lang('no_profile_found').'</h3>';
            } ?>
            </div>
        </div>
</section>
<?php /*
<div id="qrcode-3" style="dispaly"></div>
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode-3"), {
    text: "<?php echo site_url().'?profile='.$profile_qrcode ?>",
width: 128,
height: 128,
colorDark: "#000000",
colorLight: "#ffffff",
correctLevel: QRCode.CorrectLevel.H
});
myFunction();


function myFunction() {
setTimeout(function() {

var qrcode = $('#qrcode-3').find('img').attr('src');
var user_id = '<?php echo $user_id ?>';
var pro_id = '<?php echo $profile_id ?>';
console.log(qrcode, user_id, pro_id);
$.ajax({
type: "POST",
url: 'update_qrcode',
data: {
profile_id: pro_id,
user_id: user_id,
qrcode: qrcode // <-- category ID of clicked item / link }, success: function(data) { console.log('data', data); } }) },
    200); } // $('#qrcode').click(function(){ // gen(); // //
    console.log('as',$('#qrcode-2').html(),$('#qrcode-2').find('img').attr('src')); // }) </script>
    */ ?>