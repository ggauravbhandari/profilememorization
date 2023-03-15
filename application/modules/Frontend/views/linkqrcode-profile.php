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
<?php if($this->session->flashdata('newprofile')){
   $userprofiledata = $this->commonmodel->getsingleData('user_profile',['id'=>$this->session->flashdata('newprofile')],'id,user_id,first_name,last_name,profile_url');
   // print_r($userprofiledata); exit();
   $this->load->view('qrcodegenerate',['userprofiledata'=>$userprofiledata]);
   } ?>



<section class="my-5">
    <div class="container">
        <div class="row">
            <?php if(!checkauth()){ ?>
                <p style="height:200px;">Please
                <a href="javascrip:;" data-bs-toggle="modal" data-bs-target="#login-modal" data-url="redirectfalse"><?php echo lang('login')?></a> to link QR Code</p>  
            <?php }else{ ?>
            <div class="media-head-cover justify-content-md-between mb-5">
                <h2 class="head-title mt-3 mb-0"><?php echo lang('connect_profile_heading') ?></h2>
                
            </div>
            
            
                <div class="alert alert-success profile-success hide"></div>
                <div class="alert alert-danger profile-error hide"></div>
                <?php echo ($this->session->flashdata('success')) ? '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' : ''; ?>
                <?php echo ($this->session->flashdata('error')) ? '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' : ''; ?>
                <?php 
                $profile_qrcode = $profile_id =$user_id ='';
                if(isset($profilelist) && count($profilelist)>0){
                echo '<form  method="post" action="'.site_url('linkprofilepost').'">';
                echo '<input type="hidden" name="woocom_user_id" value="'.(isset($_GET['profile']) ? $_GET['profile'] : 0).'" />';
                echo '<div class="row">';
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
                                    if(isset($val->profile_pic) && $val->profile_pic!=''){

                         echo '<img src="'. UploadStorage::url( $val->profile_pic ) .'">';

                        }else{ ?>

                            <img src="<?php echo site_url('assets/frontend/') ?>uploads/<?php echo get_defaultimage()->profile_img ?>">

                            <?php } ?>
                                    <!-- <img src="<?php echo site_url('assets/frontend/').'uploads/'; echo ($val->profile_pic!='') ? $val->profile_pic : get_defaultimage()->profile_img ?>" style="width:100px;height:160px;"> -->
                                </a>
                            </span>
                            <p class="name-person">
                                <a href="<?php echo site_url().'?profile='.$val->profile_url ?>"><?php echo ucwords($val->first_name.'<br>'.$val->last_name) ?></a>
                            </p>
                        </div>
                        <div class="bio-detail">
                            <div style="width:100%;text-align:right;">
                                <label><?php echo lang('connect_profile') ?></label>
                                <?php if(!get_frontauthuser('warden_user_id')){ ?>
                                    <input type="radio" name="connect_profile" value="<?php echo $val->id ?>" require checked/>
                                <?php 
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
                ?>
                </div>
                <div class="row">
                <div class="col-md-12">
                <button type="submit" class="btn btn-submit-request createprofile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('connect_profile_btn') ?></button>
                </div>
                </div>
                </form>
                <?php 
                }else{
                echo '<h3>'.lang('no_profile_found').'</h3>';
                } 
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
<?php if(!checkauth()){ ?>
    <script>
        $(document).ready(function(){
            var proid = '<?php echo $_GET['profile'] ?>';
            $('#loginform').find('#redirect_status').val('linkprofile_qrcode?profile='+proid);
            $('#login-modal').modal('show');
         })
    </script>
    <?php } ?>