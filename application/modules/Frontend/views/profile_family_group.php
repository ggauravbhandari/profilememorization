<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<section id="section-1">
    <div class="container-fluid">
        <div class="row align-items-start">
            <div class="col-12 col-md-12 d-flex">
                <nav class="navigation-custom">
                    <div class="right-part d-none d-md-table">
                        <div class="searchBox float-start">
                            <form action="<?php echo site_url('search-result')?>" method="post" id="search_profile">
                                <input type="search" name="search_val" placeholder="search memorisation profiles">

                                <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png"
                                    onClick="submitProfileForm()" />
                            </form>

                        </div>
                        <div class="notification">
                            <span><?php echo get_pending_count_user_wise() ?></span>
                            <i class="fa-sharp fa-solid fa-bell"></i>
                        </div>
                        <div class="menu-btn d-table mx-2 float-start">
                            <a href="javascript:;" class="menu-btn-toggle"><span><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/Menu.png"
                                        class="menu-line"> <img
                                        src="<?php echo site_url('assets/frontend/') ?>images/Close.svg"
                                        class="close"></span></a>
                            <nav class="sidebar">
                                <?php $this->load->view('navigation') ?>
                            </nav>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
</section>

<section class="my-5">
    <div class="container">
        <div class="row">
            
            <div class="row">               
                
                <?php 
                
            if(isset($profilelist) && count($profilelist)>0){
            foreach($profilelist as $val){ 
               if($val->qrcode_img!=''){ 
                $profile_qrcode = $val->profile_url;
                $user_id = $val->user_id;
                $profile_id = $val->id;
                } ?>
                <div class="col-12 col-md-6 col-lg-4 mt-3">
                    <div class="family-m-column d-flex justify-content-between">
                        <div class="profile-img">
                            <span>
                                <a href="<?php echo site_url().'?profile='.$val->profile_url ?>">
                                    <?php 
                                    if(isset($val) && $val->profile_pic!=''){

                                        echo '<img src="'. UploadStorage::url( $val->profile_pic ) .'" style="width:100px;height:160px;">';

                                    }else{ ?>

                                        <img src="<?php echo site_url('assets/frontend/') ?>uploads/<?php echo get_defaultimage()->profile_img ?>" style="width:100px;height:160px;">

                                    <?php }
                            /*
                                    <img src="<?php echo site_url('assets/frontend/').'uploads/';
                     echo ($val->profile_pic!='') ? $val->profile_pic : get_defaultimage()->profile_img ?>"
                                        style="width:100px;height:160px;">*/ ?>
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
                                        style="width:25px;"></a>
                                <?php if($val->admin_profile==0){ ?>
                                <a href="<?php echo site_url('deleteprofile/').$val->id ?>"
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