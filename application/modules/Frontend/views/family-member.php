<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<section id="section-1">
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-12 col-md-12 d-flex">
                <nav class="navigation-custom">
                    <div class="right-part d-none d-md-table">
                        <?php 
                        $this->load->view('partials/top-headerrightsection'); ?>
                    </div>
                </nav>
            </div>
        </div>
</section>
<?php

    if($this->session->flashdata('newprofile')){
        $newprofileid = $this->session->flashdata('newprofile');
        // echo $this->session->userdata('newprofile');
        // exit('asd');
    $userprofiledata = $this->commonmodel->getsingleData('user_profile',['id'=>$newprofileid],'id,user_id,first_name,last_name,profile_url');
    // print_r($userprofiledata); exit();
    // $this->load->view('qrcodegenerate',['userprofiledata'=>$userprofiledata]); ?>
    <script src="<?php echo site_url('assets/frontend/') ?>js/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <div id="qrcode-2" style="display: none;"></div>
    <script type="text/javascript">
       var qrcode = new QRCode(document.getElementById("qrcode-2"), {
           text: "<?php echo site_url().'?profile='.$userprofiledata['profile_url'] ?>",
           width: 128,
           height: 128,
           colorDark: "#000000",
           colorLight: "#ffffff",
           correctLevel: QRCode.CorrectLevel.H
       });
       myFunction();


       function myFunction() {
           setTimeout(function() {

               var qrcodess = $('#qrcode-2').find('img').attr('src');
               console.log('qrcodess',qrcodess);
               $.ajax({
                   type: "POST",
                   url: '/update_qrcode',
                   data: {
                       profile_id: '<?php echo $userprofiledata['id'] ?>',
                       qrcode: qrcodess, // <-- category ID of clicked item / link
                   },
                   success: function (res) {
                       console.log('myFunction',res);
                       // if (data.status == true) {
                       //     console.log(data.body);
                       //     $(element).removeClass('show');
                       //     $(element).find('textarea').val('');
                       //     $('#post-detail-popup .journal-post-comment').html(data.body);
                       //     return false;
                       // } else {
                       //     return false;
                       // }
                       // console.log(data);
                   }
               })

           }, 200);
       }
    </script>


   <?php } ?>



<section class="my-5">
    <div class="container">
        <div class="row">
            <div class="media-head-cover justify-content-md-between mb-5">
                <h2 class="head-title mt-3 mb-0"><?php echo lang('profile_group_text') ?></h2>
                <div class="right-part d-table mt-md-3 mb-md-3">
                    <div class="upload-media d-table float-start">

                        <?php
                        if(isset($profilelist) && count($profilelist)>0){
                          if(!get_frontauthuser('warden_user_id')){
                              if(get_user_plan($userplanid) =='free'){
                              if(user_profilecount($currect_group_id)==0){ ?>
                          <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                              data-bs-target="#createProfile" role="button" aria-expanded="false"
                              aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                          <?php }
                              }elseif(get_user_plan($userplanid) =='basic'){
                                  if(user_profilecount($currect_group_id) <get_userplan_detail($userplanid)->profile_limit){ ?>
                              <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                              data-bs-target="#createProfile" role="button" aria-expanded="false"
                              aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                            <?php /*}elseif(user_profilecount($currect_group_id)==1){ ?>
                          <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                              data-bs-target="#createProfile" role="button" aria-expanded="false"
                              aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                          <?php */
                                }
                              }else{

                                if(user_profilecount($currect_group_id) <get_userplan_detail($userplanid)->profile_limit){?>
                          <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                              data-bs-target="#createProfile" role="button" aria-expanded="false"
                              aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
                          <?php }
                              }
                          }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="alert alert-success profile-success hide"></div>
                <div class="alert alert-danger profile-error hide"></div>
                <?php echo ($this->session->flashdata('success')) ? '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' : ''; ?>
                <?php echo ($this->session->flashdata('error')) ? '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' : ''; ?>
                <?php
                $profile_qrcode = $profile_id =$user_id ='';
                if(isset($profilelist) && count($profilelist)>0){
                foreach($profilelist as $val){
                if($val->qrcode_img!=''){
                $profile_qrcode = $val->profile_url;
                $user_id = $val->user_id;
                $profile_id = $val->id;
                } ?>
                <div class="col-12 col-md-6 col-lg-4 mt-3">
                    <div class="family-m-column d-flex justify-content-between ssdambar">
                        <div class="profile-img">
                            <span>

                                <a href="<?php echo site_url().'?profile='.$val->profile_url ?>">

                                    <img src="<?php echo UploadStorage::url( $val->profile_pic, site_url('assets/frontend/uploads/' . get_defaultimage()->profile_img) );?>"
                                         >

                                </a>
                            </span>
                            <p class="name-person"><a
                                    href="<?php echo site_url().'?profile='.$val->profile_url ?>"><?php echo ucwords($val->first_name.'<br>'.$val->last_name) ?></a>
                            </p>
                        </div>
                        <div class="bio-detail">
                            <div style="width:100%;text-align:right;">

                                <?php if(checkauth() && !get_frontauthuser('warden_user_id') && $val->user_id==get_frontauthuser('user_id')){ ?>

                                <a href="" onclick="userprofleupdate(this,'<?php echo lang('edit_profile') ?>')"
                                    data-proid="<?php echo $val->id ?>" data-bs-toggle="modal"
                                    data-bs-target="#createProfile" style="width:100%;text-align:right;"><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/edit-icon.png"
                                        style="width:20px;"></a>
                                <?php if($val->admin_profile==0){ ?>
                                <a href="<?php echo site_url('deleteprofile/').$val->id.'/'.$currect_group_id ?>"
                                    onclick="return confirm('<?php echo lang('delete_confirm_message') ?>')"
                                    style="width:100%;text-align:right;"><img
                                        src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg"
                                        class="delete-svgicon" alt="delete" /></a>
                                <?php }
                                } ?>
                            </div>
                            <div class="date mb-3 col-md-12">
                                <span><?php echo date_dmyformate($val->dob) ?></span>
                                <span><?php echo ($val->deceased!='') ? ' to '. date_dmyformate($val->deceased) : '' ?></span>
                            </div>
                            <div class="bio">
                                <p><?php echo $val->bio ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
            }else{ ?>
              <div class="col-md-3">
              <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal"
                              data-bs-target="#createProfile" role="button" aria-expanded="false"
                              aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
              </div>
            <?php } ?>
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
