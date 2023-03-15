<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="<?php echo site_url('assets/frontend/') ?>css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo site_url('assets/frontend/') ?>css/style.css" rel="stylesheet">
    <link href="<?php echo site_url('assets/frontend/') ?>css/style3.css" rel="stylesheet">
    <link href="<?php echo site_url('assets/frontend/') ?>font/stylesheet.css" rel="stylesheet">
    <link href="<?php echo site_url('assets/frontend/') ?>css/owl.carousel.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://www.jquery-az.com/jquery/css/intlTelInput/intlTelInput.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo site_url('assets/frontend/') ?>css/media-slider-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="<?php echo site_url('assets/frontend/') ?>js/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script> -->
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <title><?php echo $site_title ?></title>
    <style>
    .swiper-slide{
        padding: 20px;
    }
    .share-btn-wrp {
        list-style: none;
        display: block;
        margin: 0px;
        padding: 0px;
        width: 32px;
        left: 0px;
        position: fixed;
    }
    .share-btn-wrp .button-wrap{
        text-indent:-100000px;
        width:32px;
        height: 32px;
        cursor:pointer;
        transition: width 0.1s ease-in-out;
    }
    .share-btn-wrp > .facebook{
        background: url(images/share-icons.png) no-repeat -42px 0px;
    }
    .share-btn-wrp > .facebook:hover{
        background: url(images/share-icons.png) no-repeat -4px -0px;
        width:38px;
    }
    .share-btn-wrp > .twitter{
        background: url(images/share-icons.png) no-repeat -42px -34px;
    }
    .share-btn-wrp > .twitter:hover{
        background: url(images/share-icons.png) no-repeat -4px -34px;
        width:38px;
    }
    .heading-name{
        font-weight: bold;
        font-size: 14px;
    }
    #media-uploadnew,#timeline-formvalidationnew{
        padding: 10px !important;
    }
    .font-small-red-normal{
        font-size: 12px;
        font-weight: normal;
        color: red;
    }
    form.profileform input.form-control{
        margin-top: 0; 
    }
    .tile-parent ul.dropdown-menu.show {
        transform: inherit !important;
    }
    ul.dropdown-menu.show li {
        border-bottom: 1px solid #90a792;
        padding: 3px;
    }
    ul.dropdown-menu.show li:last-child {
        border-bottom: navajowhite;
    }


    button.rmv-charity {
        display: none;
    }

    .hide {
        display: none;
    }

    #commentForm {
        width: 500px;
    }

    #commentForm label {
        width: 250px;
    }

    #commentForm label.error,
    #commentForm input.submit {
        margin-left: 253px;
    }

    #signupForm {
        width: 670px;
    }

    .intl-tel-input.allow-dropdown .selected-flag, .intl-tel-input.separate-dial-code .selected-flag{
        height: 35px !important;
    }

    label.error {
        margin-left: 10px;
        width: auto;
        display: inline;
        color: red;
    }

    #signupForm label.error{
        display: inline-block;
    }

    #signupForm .form-label{
        margin-bottom: 0 !important;
    }
    form#signupForm input.form-control{
        margin-top:0 !important;
    }

    #newsletter_topics label.error {
        display: none;
        margin-left: 103px;
    }

    input.error,
    textarea.error {
        border-color: red;
    }

    .error {
        font-family: 'Montserrat', sans-serif;
        font-weight: 400;
        font-size: 14px;
    }

    .overlay {
        z-index: 9 !important;
    }

    .name-person a {
        color: #90A792;
        text-decoration: none;
    }

    p.early-life-desc,
    .life-modal-desc {
        word-break: break-all;
    }

    .intl-tel-input {
        width: 100%;
    }

    form {
        padding: 0px !important;
    }

    .donation_head {
        /*background-color: #90A792;*/
        border-radius: 15px;
        padding: 5px;
        margin-bottom: 20px;
    }

    .rmv-charity {
        float: right;
        margin-right: 40px;
        margin-top: 30px;
    }

    .donation-para {
        margin-bottom: 0.5rem;
        color: #000;
        font-weight: 600;
        font-size: 12px;
        font-family: 'Montserrat', sans-serif;
    }

    .hidediv {
        display: none !important;
    }

    .error-profile{
          color: red;
          font-size: 14px;
          font-weight: normal;
    }

    .error-bcimg{
          color: red;
          font-size: 14px;
          font-weight: normal;
    }
    .error-thumimg{
          color: red;
          font-size: 14px;
          font-weight: normal;
    }

    </style>
    <script type="text/javascript">
        $('.alert').not('.hide').fadeTo(3000, 500).fadeOut(500, function(){
           $(".alert").fadeOut(500);
       });
    </script>
</head>

<body>
    <div class="top-header d-none d-md-flex justify-content-between align-item-center">
        <div class="logo-top-header">
            <a href="<?php echo site_url('/') ?>"><img
                    src="<?php echo site_url('assets/frontend/') ?>images/Memorisation-logo1.png">
        </div>
        <a href="http://www.memorisation.co.uk/" target="_blank">Vist us at: www.memorisation.co.uk</a>
    </div>
    <?php /*if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
    <?php }*/ ?>
    <header class="d-flex justify-content-between d-md-none position-md-relative">
        <div class="logo">
            <a href="<?php echo site_url() ?>"> <img
                    src="<?php echo base_url('assets/frontend/') ?>images/Memorisation-logo1.png" /></a>
        </div>
        <nav class="navigation-custom">
            <div class="right-part d-table">
                <div class="float-start feature-home">
                    <a id="featured-post" href="<?php echo site_url() ?>" class="scroll"> <img
                            src="<?php echo base_url('assets/frontend/') ?>images/Home-2.png" /> </a>
                </div>

                <?php if(checkauth()){ ?>
                <div class="notification">
                    <span><?php echo get_pending_count_user_wise() ?></span>
                    <a href="<?php echo site_url('dashboard') ?>"><i class="fa-sharp fa-solid fa-bell"></i></a>
                </div>
                <?php } ?>
                <div class="searchBox float-start">
                    <form action="<?php echo site_url('search-result')?>" method="post" id="search_profile">
                    <input type="search" placeholder="search memorisation profiles">
                    <img src="<?php echo base_url('assets/frontend/') ?>images/Search.png" />
                    </form>
                </div>
                <div class="menu-btn d-table mx-2 float-start">
                    <a href="#" class="menu-btn-toggle">
                        <span>
                            <img src="<?php echo base_url('assets/frontend/') ?>images/Menu.png" class="menu-line"> 
                            <img src="<?php echo base_url('assets/frontend/') ?>images/Close.svg" class="close">
                        </span>
                    </a>
                    <nav class="sidebar">
                        <ul>
                            <li><a href="<?php echo site_url('/') ?>"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/logo-mini.png"></span><b><?php echo lang('memorisation')?><b></a>
                            </li>
                            <?php
                           //echo get_user_plan().user_profilecount();
                           if($this->session->userdata('frontuserdetail')){
                           ?>
                           <li class="active"><a href="<?php echo site_url('familygroup') ?>"
                                    class="menu-close"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"></span><b><?php echo lang('family_group')?></b></a>
                            </li>
                            <?php
                           /*
                           <li><a href="<?php echo site_url('familygroup') ?>" class="createprofile" ><img
                                        src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"><?php echo lang('family_group')?></a>
                            </li>
                           if(get_user_plan() =='free'){
                              if(user_profilecount()==0){ ?>
                            <li><a href="javascrip:;" class="createprofile" data-bs-toggle="modal"
                                    data-bs-target="#createProfile"><img
                                        src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"><?php echo lang('add_new_profile')?></a>
                            </li>
                            <?php }elseif(user_profilecount()==1){ ?>
                            <li class="active"><a onclick="userprofleupdate(this,'<?php echo lang('edit_profile') ?>')"
                                    data-proid="<?php echo get_adminprofile() ?>" data-bs-toggle="modal"
                                    data-bs-target="#createProfile"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"></span><?php echo lang('edit_profile') ?></a>
                            </li>
                            <?php }
                           }elseif(get_user_plan() =='basic'){
                              if(user_profilecount()==0){ ?>
                            <li><a href="javascrip:;" class="createprofile" data-bs-toggle="modal"
                                    data-bs-target="#createProfile"><img
                                        src="<?php echo base_url('assets/frontend/') ?>images/New Profile.svg"><?php echo lang('add_new_profile')?></a>
                            </li>
                            <?php }elseif(user_profilecount()==1){ ?>
                            <li class="active"><a href="<?php echo site_url('familygroup') ?>"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"></span><b><?php echo lang('edit_profile') ?></b></a>
                            </li>
                            <li class=""><a href="javascript:;" class="createprofile" data-bs-toggle="modal"
                                    data-bs-target="#createProfile"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/New Profile.svg"></span><b><?php echo lang('add_new_profile') ?></b></a>
                            </li>
                            <?php }elseif(user_profilecount()==2){ ?>
                            <li class="active"><a href="<?php echo site_url('familygroup') ?>"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"></span><b><?php echo lang('edit_profile') ?></b></a>
                            </li>
                            <?php }
                           }else{
                              if(user_profilecount()==0){ ?>
                            <li class=""><a href="javascript:;" class="createprofile" data-bs-toggle="modal"
                                    data-bs-target="#createProfile"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"></span><b><?php echo lang('add_new_profile') ?></b></a>
                            </li>
                            <?php }else{ ?>
                            <li class="active"><a href="<?php echo site_url('familygroup') ?>"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"></span><b><?php echo lang('edit_profile') ?></b></a>
                            </li>
                            <li class=""><a href="javascript:;" class="createprofile" data-bs-toggle="modal"
                                    data-bs-target="#createProfile"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/New Profile.svg"></span><b><?php echo lang('add_new_profile') ?></b></a>
                            </li>
                            <?php } }
                            */
                            ?>

                            <?php if(checkauth()){ ?>
                            <li>
                                <a href="<?php echo site_url('dashboard') ?>">
                                    <span>
                                    <img src="<?php echo base_url('assets/frontend/') ?>images/Notification.svg">
                                    </span>
                                    <b><?php echo lang('menu1') ?><?php echo "( ".get_pending_count_user_wise(). " )"; //print_r(get_userprofile_ids()); ?></b>
                                </a>
                            </li>
                            <?php } ?>
                            <!-- <li><a href="#" data-bs-toggle="modal" data-bs-target="#createProfile"> <span><img src="<?php echo base_url('assets/frontend/') ?>images/New Profile.svg"></span> <b><?php echo lang('add_new_profile') ?></b></a></li> -->
                            <!--
                           <li><a href="#"> <span><img src="images/New Profile.svg"></span> <b>Add New Profile</b></a></li> -->
                            <li><a href="https://memorisation.co.uk/shop/" target="_blank" target="_blank"
                                    class="serv-btn"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Order QR Keepsake.svg"></span><b><?php echo lang('order_QR_keepskae')?></b>
                                </a></li>
                            <li><a href="<?php echo site_url('qr_keepsake') ?>" class="serv-btn"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Order QR Keepsake.svg"></span><b><?php echo lang('QR_keepskae')?></b>
                                </a></li>
                            <?php }else{ ?>
                            <li><a href="#" class="menu-close" data-bs-toggle="modal"
                                    data-bs-target="#login-modal"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/login.svg"></span>
                                    <b><?php echo lang('login')?><b></a></li>
                            <!--<li><a href="#" class="menu-close" data-bs-toggle="modal"
                                    data-bs-target="#signupModal"><span><img
                                            src="<?php //echo base_url('assets/frontend/') ?>images/logout.svg"></span>
                                    <b><?php //echo lang('signup')?><b></a></li>-->
                            <?php } ?>
                            <!-- <li><a href="#"> <span><img src="<?php echo base_url('assets/frontend/') ?>images/Connection  Requests.svg"></span> <b>Review Approvals</b></a></li> -->
                            <!-- <li><a href="#"><span><img src="<?php echo base_url('assets/frontend/') ?>images/Contact us.svg"></span> <b><?php echo lang('connection_request')?></b></a></li> -->
                            <li><a href="https://memorisation.co.uk/contact-2/" target="_blank"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Contact us.svg"></span>
                                    <b><?php echo lang('contact_us')?></a></b></li>
                            <?php
                           $pro_id = get_frontprofileid();
                           if(isset(get_userprofile($pro_id)->profile_name) && get_userprofile($pro_id)->profile_name!=''){ ?>
                            <li><a href="javascript:;" data-bs-toggle="modal" data-bs-target="#qrcode_modal"
                                    class="serv-btn"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/QR COde.svg"></span><b><?php echo lang('qr_code') ?></b></a>
                            </li>
                            <?php }
                           if($this->session->userdata('frontuserdetail')){?>
                            <li class="active"><a data-bs-toggle="modal" data-bs-target="#changepassword-modal" href="#"
                                    class="menu-close"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Edit Profile.svg"></span><b><?php echo lang('change_password')?></b></a>
                            </li>
                            <!-- <li><a href="<?php echo site_url('dashboard') ?>" class="menu-close"><span><img src="<?php echo base_url('assets/frontend/') ?>images/logo-mini.png"></span><b><?php echo lang('menu1')?></b></a></li> -->
                            <li><a href="<?php echo site_url('user-logout') ?>" class="serv-btn"><span><img
                                            src="<?php echo base_url('assets/frontend/') ?>images/Log out.svg"></span><b><?php echo lang('menu3') ?></b></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
                    <?php //$this->load->view('navigation') ?>
                </div>
            </div>
        </nav>
        <div class="overlay-div"></div>
    </header>
    <div class="overlay-div"></div>
    <?php
         echo $template['body'];
         ?>
    <footer class="d-none d-md-block">
        <div class="foot">
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="logo">
                            <img src="<?php echo site_url('assets/frontend/') ?>images/footer-logo-white.png">
                            <p>when someone we love becomes a memory, the memory becomes a treasure
                            </p>
                        </div>
                    </div>
                    <div class="col-4 nav-foot tab-parent">
                        <h4>Usefullinks</h4>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation"><button class="nav-link" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">Life Of</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="pills-respect-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-respect" type="button" role="tab"
                                    aria-controls="pills-respect" aria-selected="false">Respect</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="pills-contact-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Timeline</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link">Blog</button></li>
                            <li class="nav-item" role="presentation"><button class="nav-link" id="pills-media-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-media" type="button" role="tab"
                                    aria-controls="pills-media" aria-selected="false">Media</button></li>
                        </ul>
                    </div>
                    <div class="col-4 nav-foot social-foot">
                        <h4>Social Media</h4>
                        <ul>
                            <li><a href="#"><img src="<?php echo site_url('assets/frontend/') ?>images/face-foot.png">
                                    Facebook</a></li>
                            <li><a href="#"><img src="<?php echo site_url('assets/frontend/') ?>images/insta-foot.png">
                                    Instagram</a></li>
                            <li><a href="#"><img src="<?php echo site_url('assets/frontend/') ?>images/foot-twit.png">
                                    Twitter</a></li>
                        </ul>
                    </div>
                    <div class="col-12">
                        <div class="copy-text">
                            <p>ⒸMemorisation All rights reserved | Terms and Conditions Apply</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <span class="to-top" id="top-btn"><a href="#"><img
                src="<?php echo site_url('assets/frontend/') ?>images/top.png"></a></span>
    <!-- sign-up Modal -->
    <div class="modal fade ssdambar" id="createProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('create_profile') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" onsubmit="return false" id="userprofile-form" novalidate="novalidate"
                        enctype="multipart/form-data" class="profileform">

                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('profile_name') ?></label>
                                    <input  type="text" placeholder="Enter Profile Name" name="profile_name"
                                        class="form-control required gainput" aria-describedby="emailHelp"
                                        onkeyup="generateprourl(this)"
                                        oninput="this.value=this.value.replace(/[^a-z A-Z0-9_]/g,'');">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('is_public') ?></label>
                                    <div style="display:flex;">
                                        <div>
                                            <input name="is_public" type="checkbox" class="float-end cursor-pointer white-text-underline-none" value="2" <?php echo (isset($val->is_public) && $val->is_public==2) ? 'checked="checked"' : '' ?> style="z-index:1;margin: 4px 0 0 3px;"/><?php echo lang('yes')?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label"><?php echo lang('profile_url') ?></label>
                                        <!-- <span id="profile_url_name"></span>-->
                                        <br>
                                        <div  style="width:55%;float:left;padding-top: 10px;" class="minput form-label">
                                            <?php echo site_url() ?>/?profile=<br><span class="font-small-red-normal">Unsuppoerted characters, like SPACES, will be replaced by "-".</span></div>

                                        <input  style="width:45%; float:right; border-radius: 150px !important; border: 1px solid red !important; padding: 0.375rem 0.75rem;" type="text" placeholder="Profile Url"
                                            name="profile_url" class="minput form-control required"
                                            aria-describedby="emailHelp"
                                            oninput="this.value=this.value.replace(/[^a-zA-Z0-9_]/g,'-').toLowerCase();">
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('firstname') ?></label>
                                    <input type="Text" name="first_name" placeholder="Enter  First Name & Middle Name"
                                        class="form-control required">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('lastname') ?></label>
                                    <input type="text" name="last_name" placeholder="Last Name"
                                        class="form-control required">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('dob') ?></label>
                                    <input type="date" name="dob" class="form-control required"
                                        placeholder="<?php echo lang('dob') ?>" id="datepicker2" autocomplete="off"
                                        max="<?php echo date('Y-m-d') ?>">
                                    <!-- <input type="text" id="datepicker2" name="dob" placeholder="Enter DOB" class="form-control"> -->
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('deceased') ?></label>
                                    <input type="date" name="deceased" placeholder="Deceased" id="datepicker_deceased"
                                        class="form-control" autocomplete="off" max="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('location') ?></label>
                                    <input type="text" name="location" placeholder="Enter Location"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('profile_pic') ?></label>
                                    <div class="input-group mb-3">
                                        <!-- <label class="input-group-text upload-btn-cp-form" for="inputGroupFile01"><?php echo lang('upload') ?></label> -->
                                        <input type="file" name="profile_pic" class="form-control change_image_pic"
                                            id="inputGroupFile01" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <span class="image-prodisplay">
                                        <img src="<?php echo site_url() ?>assets/frontend/uploads/100x100.png" width="100px;">
                                    </span>

                                    <span class="image-prodisplay-new" style="display: none">
                                        <img src="<?php echo site_url() ?>assets/frontend/uploads/550x550.png" width="100px;" >
                                    </span>

                                    <span id="width"></span>
                                    <span id="height"></span>
                                </div>
                                <span class="error-profile"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('background_pic') ?></label>
                                    <div class="input-group mb-3">
                                        <!-- <label class="input-group-text upload-btn-cp-form" for="inputGroupFilebg01"><?php echo lang('upload') ?></label> -->
                                        <input type="file" name="background_pic" class="form-control change_image_pic"
                                            id="inputGroupFilebg01" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <span class="image-backdisplay">
                                        <img src="<?php echo site_url() ?>assets/frontend/uploads/550x550.png"
                                            width="100px;">
                                    </span>
                                    <span class="image-backdisplay-new" style="display: none">
                                        <img src="<?php echo site_url() ?>assets/frontend/uploads/<?php echo get_defaultimage()->background_img ?>"
                                            width="100px;">
                                    </span>
                                    <!-- </div> -->
                                </div>
                                <span class="error-bcimg"></span>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('thumbnail') ?></label>
                                    <div class="input-group mb-3">
                                        <!-- <label class="input-group-text upload-btn-cp-form" for="inputGroupFilebg01"><?php echo lang('upload') ?></label> -->
                                        <input type="file" name="thumbnail" class="form-control change_image_pic"
                                            id="inputGroupFilethumb01" accept=".png, .jpg, .jpeg">
                                    </div>
                                    <span class="image-thumdisplay">
                                        <img src="<?php echo site_url() ?>assets/frontend/uploads/50x50.png"
                                            width="50px;">
                                    </span>

                                    <span class="image-thumdisplay-new" style="display: none">
                                        <img src="<?php echo site_url() ?>assets/frontend/uploads/<?php echo get_defaultimage()->background_img ?>"
                                            width="50px;">
                                    </span>
                                    <!-- </div> -->
                                </div>
                                <span class="error-thumimg"></span>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('tagline') ?></label>
                                    <textarea name="tagline" placeholder="tagline" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('bio') ?></label>
                                    <span class="float-end"><span id="currentbiocount">0</span>/120</span>
                                    <textarea name="bio" onkeyup="profilebio(this)" minlength="60" maxlength="120" placeholder="Bio"
                                        class="form-control required"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('facebook_link') ?></label>
                                    <input type="url" name="facebook_link" placeholder="facebook Link"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('instagram_link') ?></label>
                                    <input type="url" name="instagram_link" placeholder="Instagram Link"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('twitter_link') ?></label>
                                    <input type="url" name="twitter_link" placeholder="Twitter Link"
                                        class="form-control">
                                </div>
                            </div>

                            <?php if(user_profilecount() >0){ ?>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        <?php echo lang('set_profile_admin') ?></label>
                                    <div style="display:flex;">
                                        <div>
                                            <input type="radio" name="admin_profile" class="" value="1" id="yes_admin"
                                                style="margin:7px;float:left;"><label class="form-label"
                                                for="yes_admin"><?php echo lang('yes')?></label>
                                        </div>
                                        <div>
                                            <input type="radio" name="admin_profile" class="" value="0" checked
                                                id="no_admin" style="margin:7px;float:left;"><label class="form-label"
                                                for="no_admin"><?php echo lang('no') ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="mt-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label"><?php echo lang('donation_head');?></label>
                                        <p class="donation-para"><?php echo lang('charity_head') ?></p>
                                    </div>
                                </div>
                            </div>
                            <div id="add_charity" class="row">

                                <div class="col-12 col-md-6">
                                    <div class="mt-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label"><?php echo lang('charity_name') ?></label>
                                        <input type="text" name="charity_name[]" placeholder="Charity Name"
                                            class="form-control" onkeyup="AddRequired(this)">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mt-3">
                                        <label for="charity_donation_linkurl"
                                            class="form-label"><?php echo lang('charity_donation_link') ?></label>
                                        <input type="url" name="charity_donation_link[]"
                                            placeholder="Link to charity donation" class="form-control"
                                            id="charity_donation_linkurl">
                                    </div>
                                </div>

                                <div class="col-12 col-md-10">
                                    <div class="mt-3">
                                        <label for="exampleFormControltextarea1"
                                            class="form-label"><?php echo lang('charity_donation_fewword') ?></label>
                                        <textarea class="form-control" placeholder="Write your Comment"
                                            id="exampleFormControlTextarea3cdfdynamic" rows="3"
                                            name="charity_donation_fewword[]"></textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="mt-3">
                                        <label for="exampleFormControlInputcharityname1"
                                            class="form-label"><?php echo lang('charity_name') ?></label>
                                        <input type="text" name="charity_name[]" placeholder="Charity Name"
                                            class="form-control" onkeyup="AddRequired(this)">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="mt-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label"><?php echo lang('charity_donation_link') ?></label>
                                        <input type="url" name="charity_donation_link[]"
                                            placeholder="Link to charity donation" class="form-control"
                                            id="charity_donation_link">
                                    </div>
                                </div>

                                <div class="col-12 col-md-10">
                                    <div class="mt-3">
                                        <label for="exampleFormControlInput1"
                                            class="form-label"><?php echo lang('charity_donation_fewword') ?></label>
                                        <textarea class="form-control" placeholder="Write your Comment"
                                            id="exampleFormControlTextarea3cdf" rows="3"
                                            name="charity_donation_fewword[]"></textarea>
                                    </div>
                                </div>

                                <!--<div class="col-12 col-md-2">
                              <div class="mb-3">
                                 <button type="button" onclick="AddMoreCharity(this)" style="background-color: #90a792;margin-top: 31px;" class="disnon"><i class="fa fa-plus" aria-hidden="true"></i></button>

                              </div>
                           </div>-->
                            </div>
                        </div>
                        <input type="hidden" id="count_row" value="1">
                        <button type="submit" class="btn btn-primary btn-style" aria-label="Close"
                            style="margin-top: 15px;"><?php echo lang('submit') ?></button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateGroup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('update_group') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo site_url('update_group') ?>" method="post" id="usergroup-form" novalidate="novalidate"
                        enctype="multipart/form-data">
                        <input type="hidden" name="group_id" id="groupid">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('group_name') ?></label>
                                    <input id="groupname" type="text" placeholder="Enter <?php echo lang('group_name') ?>" name="group_name"
                                        class="form-control required gainput"
                                        oninput="this.value=this.value.replace(/[^a-z A-Z0-9_]/g,'');">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="count_row" value="1">
                        <button type="submit" name="submit" class="btn btn-primary btn-style" aria-label="Close"
                            style="margin-top: 15px;"><?php echo lang('submit') ?></button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <style>
    .datepicker-dropdown {
        z-index: 9999 !important;
    }

    #qrcode-2 img,
    #qrcode-3 img {
        margin: 0 auto;
    }
    </style>
    <!-- qrcode -->
    <?php $pro_id = get_frontprofileid();
      if(isset($pro_id) && $pro_id!=''){
         //print_r(get_userprofile($pro_id)->profile_name); ?>
    <div class="modal fade" id="qrcode_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <?php //$pro_id = get_frontprofileid();
                     //print_r(get_userprofile($pro_id)) ?>
                    <h5 class="modal-title" id="exampleModalLabel"><?php lang('qr_code') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php  ?>
                <div class="modal-body text-center">
                    <div id="qrcode-3"></div>
                    <script type="text/javascript">
                    var qrcode = new QRCode(document.getElementById("qrcode-3"), {
                        text: "<?php echo site_url().'?profile='.get_userprofile($pro_id)->profile_url ?>",
                        width: 128,
                        height: 128,
                        colorDark: "#000000",
                        colorLight: "#ffffff",
                        correctLevel: QRCode.CorrectLevel.H
                    });
                    //myFunction();


                    function myFunction() {
                        setTimeout(function() {

                            var qrcode = $('#qrcode-3').find('img').attr('src');
                            $.ajax({
                                type: "POST",
                                url: 'update_qrcode',
                                data: {
                                    user_id: '{{$userdetail->page_id}}',
                                    qrcode: qrcode // <-- category ID of clicked item / link
                                }
                            })

                        }, 200);
                    }

                    // $('#qrcode').click(function(){
                    //   gen();
                    //   // console.log('as',$('#qrcode-2').html(),$('#qrcode-2').find('img').attr('src'));
                    // })
                    </script>
                    <div class="shareonemail-section button-g" style="display: inline-block;">

                        <p><?php echo lang('sharedby_email_text') ?></p>
                        <input type="email" name="shareonemail" id="shareonemail" placeholder="Email to share" class="form-control">
                        <input type="button" name="submit" value="Share" id="sharebtn" class="dark-btn mt-1">

                    </div>
                    <div class="mt-3">
                    <div class="socializer" style="padding:0 20px;" data-features="32px,opacity,icon-white,pad" data-sites="facebook,twitter,whatsapp" data-meta-link="<?php echo (isset(get_userprofile($pro_id)->profile_url) && get_userprofile($pro_id)->profile_url!='') ? site_url().'?profile='.get_userprofile($pro_id)->profile_url : '' ?>" data-meta-title="<?php echo (isset(get_userprofile($pro_id)->profile_url) && get_userprofile($pro_id)->profile_name!='') ? get_userprofile($pro_id)->profile_name : 'Memorisation' ?>"></div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- edit featurepost Modal -->
    <div class="modal fade" id="featurepost-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('edit_featured_posts') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body life-of">
                    <form action="" method="post" onsubmit="return false" id="editfeaturepost-form"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <input type="text" name="title" placeholder="<?php echo lang('title') ?>"
                                        class="form-control" id="exampleInputEmail155719" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <input type="text" name="post_date" class="form-control datepicker_input"
                                        placeholder="<?php echo lang('post_date') ?>" id="datepicker2"
                                        autocomplete="off">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <input type="text" name="post_author" placeholder="<?php echo lang('author') ?>"
                                        class="form-control"
                                        value="<?php echo ucfirst(get_frontauthuser('user_name')) ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <textarea class="form-control" name="post_description"
                                        placeholder="<?php echo lang('post_description') ?>"
                                        id="featuredpost_description" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="input-group mb-3">
                                    <!-- <label class="cabinet center-block hide">
                                 <figure>
                                    <img src="" class="gambar img-responsive img-thumbnail" id="item-img-output" />
                                    <figcaption><i class="fa fa-camera"></i></figcaption>
                                 </figure>
                                 <input type="file" class="item-img file center-block" name="file_photo"/>
                                 </label> -->
                                    <input type="text" class="add-image-input"
                                        placeholder="<?php echo lang('upload_image') ?>" class="form-control"
                                        id="exampleInputPassword123" for="inputGroupFile09">
                                    <input type="file" name="post_image" class="form-control visually-hidden"
                                        id="inputGroupFilefeaturepost9" accept="image/*">
                                    <label class="input-group-text add-image"
                                        for="inputGroupFilefeaturepost9"><?php echo lang('add_image') ?></label>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-3">
                                    <input type="hidden" name="post_postedby" class="form-control"
                                        placeholder="<?php echo lang('posted_by') ?>"
                                        value="<?php echo ucfirst(get_frontauthuser('user_name')) ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 d-flex">
                                    <button type="submit" name="submit"
                                        class="btn btn-submit-request"><?php echo lang('submit') ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary btn-style" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#thankyou-popup" >Submit</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- lifeof start popup -->
    <div class="modal fade" id="lifeof-edit" tabindex="-1" aria-labelledby="exampleModalLabellifeof" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabellifeof"><?php echo lang('edit_lifeof') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body life-of">
                    <form action="" method="post" onsubmit="return false" id="lifeof-formvalidate"
                        enctype="multipart/form-data">
                        <input type="hidden" name="lifeof_id" value='' />
                        <input type="hidden" name="profile_id"
                            value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <input type="text" name="title" placeholder="<?php echo lang('title') ?>"
                                        class="form-control required" id="exampleInputEmail155"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3" style="padding-top:10px">
                                    <input type="text" class="add-image-input lifeofimagedefulttext"
                                        placeholder="<?php echo lang('upload_image') ?>" class="form-control"
                                        id="inputGroupFilelifeofpost_lifeofimg" for="inputGroupFile09" readonly>
                                    <input type="file" name="lifeofpost_image" class="form-control visually-hidden"
                                        id="inputGroupFilelifeofpost99" accept="image/*">
                                    <label class="input-group-text add-image"
                                        for="inputGroupFilelifeofpost99"><?php echo lang('add_image') ?></label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-12 col-md-4">
                                    <div class="mt-2">
                                        <div class="d-flex mb-3 form-radio">
                                            <div class="form-check me-3">
                                                <label class="form-check-label" for="flexRadioDefault3lifeofpublic">
                                                    Public
                                                </label>
                                                <input class="form-check-input" type="radio" name="is_public" value="1"
                                                    checked="checked" required id="flexRadioDefault3lifeofpublic">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="flexRadioDefault3lifeofprivate">
                                                    Private
                                                </label>
                                                <input class="form-check-input" type="radio" name="is_public" value="2"
                                                    required id="flexRadioDefault3lifeofprivate" checked>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <textarea class="form-control required" name="description"
                                        placeholder="<?php echo lang('post_description') ?>" id="lifeofpost_description"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 d-flex">
                                    <button type="submit" name="submit"
                                        class="btn btn-submit-request"><?php echo lang('submit') ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-primary btn-style" data-bs-dismiss="modal" aria-label="Close" data-bs-toggle="modal" data-bs-target="#thankyou-popup" >Submit</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- lifeof end popup -->
    <!-- sign-up Modal -->
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('registration') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success signupForm-sucess hide"></div>
                    <div class="alert alert-danger signupForm-error hide"></div>
                    <?php if($this->session->flashdata('error')){
                     echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                     } ?>
                    <form action="" method="post" id="signupForm" novalidate="novalidate" style="width:100%;">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('emailaddress') ?></label>
                                    <input type="email" <?php echo ($this->session->flashdata('signuppopup')) ? 'readonly' : '' ?> placeholder="<?php echo lang('emailaddress') ?>" name="email" class="form-control required" value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['email'] : '' ?>" aria-describedby="emailHelp" id="signupemail">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="">
                                    <label for="exampleFormControlInputcn1"
                                        class="form-label mb-1"><?php echo lang('contactnumber') ?></label>
                                    <input type="tel" id="register-phone"
                                        placeholder="<?php echo lang('contactnumber') ?>" name="contactnumber"
                                        class="form-control required " value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['contactnumber'] : '' ?>"
                                        oninput="this.value=this.value.replace(/[^0-9.,]/g,'');">
                                    <!-- oninput="this.value=this.value.replace(/[^0-9.,]/g,'');" -->
                                </div>
                            </div>
                            <!-- <div class="col-12 col-md-6">
                           <div class="mb-3">
                              <label for="exampleFormControlInput1" class="form-label"><?php echo lang('emailaddress_confirmcode') ?></label>
                              <input type="text" name="confirm_code" placeholder="Enter Confirmation code" class="form-control">
                           </div>
                           </div> -->
                            <div class="col-12 col-md-6">
                                <div class="mt-2">
                                    <label for="exampleFormControlInputppasword"
                                        class="form-label"><?php echo lang('password') ?></label>
                                    <input type="password" name="password" placeholder="<?php echo lang('password') ?>"
                                        class="form-control required" id="password">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-2">
                                    <label for="exampleFormControlInputcp1"
                                        class="form-label"><?php echo lang('conpassword') ?></label>
                                    <input type="password" name="conpassword"
                                        placeholder="<?php echo lang('conpassword') ?>" class="form-control required">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">

                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('group_name') ?></label>
                                    <input type="text" name="group_name" placeholder="<?php echo lang('group_name') ?>"
                                        class="form-control required" value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['group_name'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputfn1"
                                        class="form-label"><?php echo lang('firstname') ?></label>
                                    <input type="text" name="firstname" placeholder="<?php echo lang('firstname') ?>"
                                        class="form-control required" value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['firstname'] : '' ?>">
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('lastname') ?></label>
                                    <input type="text" name="lastname" placeholder="<?php echo lang('lastname') ?>"
                                        class="form-control required" value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['lastname'] : '' ?>">
                                </div>
                            </div>
                            <input type="hidden" name="orderid" id="orderid" value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['order_id'] : '' ?>" />
                            <input type="hidden" name="customer_id" id="customer_id" value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['customer_id'] : '' ?>" />
                            <input type="hidden" name="userplan_type" id="userplan_type" value="<?php echo ($this->session->flashdata('signuppopup')) ? $this->session->flashdata('signuppopup')['userplan_type'] : '3' ?>" />
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('house_no') ?></label>
                                    <input type="text" name="house_number" placeholder="<?php echo lang('house_no') ?>"
                                        class="form-control" oninput="this.value=this.value.replace(/[^0-9.,]/g,'');">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('address_1') ?></label>
                                    <input type="text" name="address_1" placeholder="<?php echo lang('address_1') ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('address_2') ?></label>
                                    <input type="text" name="address_2" placeholder="<?php echo lang('address_2') ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('region') ?></label>
                                    <input type="text" name="region" placeholder="<?php echo lang('region') ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('city') ?></label>
                                    <input type="text" name="city" placeholder="<?php echo lang('city') ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mt-3">
                                    <label for="exampleFormControlInputln1"
                                        class="form-label"><?php echo lang('postcode') ?></label>
                                    <input type="text" name="postcode" placeholder="<?php echo lang('postcode') ?>"
                                        class="form-control">
                                </div>
                            </div>
                            <!-- <div class="col-12 col-md-12">
                           <div class="mb-3">
                              <label for="exampleFormControlInputad1" class="form-label"><?php echo lang('address') ?></label>
                              <textarea placeholder="<?php echo lang('address') ?>" class="form-control" name="address"></textarea>
                           </div>
                           </div> -->
                        </div>
                        <button style="margin-top: 15px;" type="submit" name="submit"
                            class="btn btn-primary btn-style"><?php echo lang('submit') ?></button>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- sign-up mail code confirm Modal -->
    <div class="modal fade" id="emailconfirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('email_address_confirm') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success emailconfirmForm-sucess hide"></div>
                    <div class="alert alert-danger emailconfirmForm-error hide"></div>
                    <?php if($this->session->flashdata('error')){
                     echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                     } ?>
                    <form action="" method="post" id="emailconfirmForm" novalidate="novalidate" style="width:100%;">
                        <input type="hidden" name="user_id" id="emailconfirm_userid" />
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('email_code_confirm') ?></label>
                                    <input type="text" placeholder="<?php echo lang('email_code_confirm') ?>"
                                        name="confirm_code" class="form-control" aria-describedby="emailHelp"
                                        id="confirm_code">
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="submit"
                            class="btn btn-primary btn-style"><?php echo lang('submit') ?></button>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="signupsuccessModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Registration</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success signupsuccessModal-sucess hide"></div>
                    <div class="alert alert-danger signupsuccessModal-error hide"></div>
                    <?php if($this->session->flashdata('error')){
                     echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                     } ?>
                    <?php if($this->session->flashdata('success')){
                     echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
                     } ?>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="success_resetpassword" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Registration</h5> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success success_resetpassword-sucess hide"></div>
                    <div class="alert alert-danger success_resetpassword-error hide"></div>

                    <?php echo ($this->session->flashdata('success_resetpassword')) ? '<div class="alert alert-success">'.$this->session->flashdata('success_resetpassword').'</div>' : ''; ?>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- Donate Modal -->
    <div class="modal fade" id="donate-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <?php $profile_name = "";$donation_data = "";
                     if(isset($userprofile_data))
                     {
                        $profile_name = $userprofile_data['first_name'].' '.$userprofile_data['last_name'];
                        $profile_id = $userprofile_data['id'];
                        $this->db->select('*');
                        $this->db->where('profile_id',$profile_id);
                        $donation_data = $this->db->get('user_donation')->result_array();
                     }
                     ?>
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('donate_in_memory_of') ?>
                        <?php echo $profile_name;?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                  $donation_mgs = "";$charity_names = "";$charity_links = "";
                  if(isset($donation_data) && !empty($donation_data))
                  {
                     $donation_msg = $donation_data[0]['few_word_desc'];
                     $charity_names = json_decode($donation_data[0]['charity_name']);
                     $charity_links = json_decode($donation_data[0]['donation_link']);
                     $few_word_desc = json_decode($donation_data[0]['few_word_desc']);
                  }

                  ?>
                <div class="modal-body">
                    <label for="exampleFormControlInput1"
                        class="form-label"><?php echo lang('choose_charity_mgs') ?></label>
                    <div class="row">
                        <?php
                        if(!empty($charity_names))
                        {
                           foreach ($charity_names as $chkey => $chvalue)
                           {
                              if(trim($chvalue) !="")
                              {
                                 ?>
                        <!-- <div class="col-12 col-md-3"></div> -->

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label donation_msg"><?php echo $few_word_desc[$chkey];?>
                                <a href="<?php echo $charity_links[$chkey];?>" target="_blank"
                                    class="btn btn-primary btn-style" style="margin-top: 20px;"
                                    ><?php echo $chvalue;?></a></label>
                            </div>
                        </div>
                        
                        <!-- <div class="col-12 col-md-3"></div> -->

                        <?php
                              }
                           }
                        }
                     ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <a target="_blank" class="btn btn-primary btn-style">Click to Donate</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- subscribe Modal -->
    <div class="modal fade" id="subscribe-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('Subscription') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" id="user_subscription" action="<?php echo site_url('user_subscription') ?>">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">
                                        <?php echo lang('name') ?></label>
                                    <input type="text" name="name" placeholder="<?php echo lang('fullname') ?>"
                                        class="form-control required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('email') ?></label>
                                    <input type="email" name="email" placeholder="<?php echo lang('enter_email') ?>"
                                        class="form-control required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex mb-3 form-radio">
                                    <div class="form-check me-3">
                                        <label class="form-check-label" for="flexRadioDefault5">
                                            <?php echo lang('daily_digest') ?>
                                        </label>
                                        <input class="form-check-input" value="1" required type="radio"
                                            name="subscription_type" id="flexRadioDefault5">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexRadioDefault6">
                                            <?php echo lang('weekly_digest') ?>
                                        </label>
                                        <input required class="form-check-input" value="2" type="radio"
                                            name="subscription_type" id="flexRadioDefault6" checked="">
                                    </div>

                                </div>
                                <p>
                                        <label class="form-check-label" for="flexRadioDefault6">
                                            <?php echo lang('subscription_description') ?>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-style"><?php echo lang('subscribe') ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- share social Modal -->
    <div class="modal fade" id="socialshare-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 210px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('share_social') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                    <div class="modal-body">
                        <?php $pro_id = get_frontprofileid(); ?>
                        <div class="row">
                            <div id="qrcode-3share" style="padding:10px 20px;"></div>
                            <script type="text/javascript">
                            var qrcode = new QRCode(document.getElementById("qrcode-3share"), {
                                text: "<?php echo site_url().'?profile='.get_userprofile($pro_id)->profile_url ?>",
                                width: 128,
                                height: 128,
                                colorDark: "#000000",
                                colorLight: "#ffffff",
                                correctLevel: QRCode.CorrectLevel.H
                            });
                            myFunctionshareqrcode();


                            function myFunctionshareqrcode() {
                                setTimeout(function() {
                                    var qrcode = $('#qrcode-3share').find('img').attr('src');
                                    $.ajax({
                                        type: "POST",
                                        url: 'update_qrcode',
                                        data: {
                                            user_id: '{{$userdetail->page_id}}',
                                            qrcode: qrcode // <-- category ID of clicked item / link
                                        }
                                    })

                                }, 200);
                            }

                            // $('#qrcode').click(function(){
                            //   gen();
                            //   // console.log('as',$('#qrcode-2').html(),$('#qrcode-2').find('img').attr('src'));
                            // })
                            </script>
                        <div class="socializer" style="padding:0 20px;" data-features="32px,opacity,icon-white,pad" data-sites="facebook,twitter,whatsapp" data-meta-link="<?php echo (isset(get_userprofile($pro_id)->profile_url) && get_userprofile($pro_id)->profile_url!='') ? site_url().get_userprofile($pro_id)->profile_url : '' ?>" data-meta-title="<?php echo (isset(get_userprofile($pro_id)->profile_url) && get_userprofile($pro_id)->profile_name!='') ? get_userprofile($pro_id)->profile_name : 'Memorisation' ?>"></div>
                            <!-- <ul class="share-btn-wrp">
                                <li class="facebook button-wrap">Facebook</li> <!-- Facebook
                                <li class="twitter button-wrap">Tweet</li> <!-- Twitter 
                                <li class="digg button-wrap">Digg it</li> <!-- Digg 
                                <li class="stumbleupon button-wrap">Stumbleupon</li> <!-- Sumbleupon 
                                <li class="delicious button-wrap">Delicious</li> <!-- Delicious
                                <li class="gplus button-wrap">Google Share</li> <!-- Google Plus
                                <li class="email button-wrap">Email</li> <!-- Email
                            </ul> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                
            </div>
        </div>
    </div>

    <!-- Media slider Modal -->
    <?php if(isset($middelsection['media_data']) && $middelsection['media_data']!=''){
        
        foreach($middelsection['media_data'] as $media_val){ 
            //print_r($media_val->title);
             ?>

    <div class="modal fade" id="staticBackdrop<?php echo $media_val->album_id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel"><?php echo ucfirst($media_val->title) ?></h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body media-slider-body">
               <?php //print_r($media_val->media_album_images);
               $this->load->view('mymediaslider',['album_result'=>$media_val->media_album_images,'album_comment'=>$media_val->media_images_comment]) ?>
            </div>
         </div>
      </div>
    </div>

    <?php } } ?>
    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success loginform-sucess hide"></div>
                    <div class="alert alert-danger loginform-error hide"></div>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
                    <?php if($this->session->flashdata('error')){
                     echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                     } ?>
                    <form action="" onsubmit="return loginform(this)" method="post" novalidate="novalidate"
                        id="loginform">
                        <input type="hidden" name="redirect_status" id="redirect_status" value="true" />
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('usertype') ?></label>
                                    <select class="form-control" name="user_table" style="border-radius:50px">
                                        <option value="users">Admin</option>
                                        <option value="warden_users">Warden</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('emailaddress') ?></label>
                                    <input type="email" placeholder="Email" name="email" class="form-control required"
                                        aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('password') ?></label>
                                    <input type="password" placeholder="Password" id="exampleFormControlInput1"
                                        name="password" class="form-control required" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 mt-4 d-flex justify-content-between">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary btn-style"><?php echo lang('submit') ?></button>
                                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal"
                                        data-bs-target="#forget-modal" class="forget-password">Forgot Password</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- forgot password Modal -->
    <div class="modal fade" id="forget-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('forgotpassword') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success forgotpassword_form-sucess hide"></div>
                    <div class="alert alert-danger forgotpassword_form-error hide"></div>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
                    <?php if($this->session->flashdata('error')){
                     echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                     } ?>
                    <form action="<?php //echo site_url('forgotpassword') ?>" method="post" novalidate="novalidate"
                        id="forgotpassword_form">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('usertype') ?></label>
                                    <select class="form-control" name="user_table" style="border-radius:50px">
                                        <option value="users">Admin</option>
                                        <option value="warden_users">Warden</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('emailaddress') ?></label>
                                    <input type="emial" name="email" placeholder="<?php echo lang('emailaddress') ?>"
                                        class="form-control required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 mt-4 d-flex justify-content-between">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary btn-style"><?php echo lang('submit') ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- change password Modal -->
    <div class="modal fade" id="changepassword-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelchnage"><?php echo lang('change_password') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success changepassword-sucess hide"></div>
                    <div class="alert alert-danger changepassword-error hide"></div>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
                    <?php if($this->session->flashdata('error')){
                     echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
                     } ?>
                    <form id="changepassword" action="<?php //echo site_url('change-password') ?>" method="post"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('enter').' '.lang('oldpassword') ?></label>
                                    <input type="password" name="oldpassword"
                                        placeholder="<?php echo lang('enter').' '.lang('oldpassword') ?>"
                                        class="form-control required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('enter').' '.lang('newpassword') ?></label>
                                    <input type="password"
                                        placeholder="<?php echo lang('enter').' '.lang('newpassword') ?>"
                                        id="changeinputpassword" name="password" class="form-control required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1"
                                        class="form-label"><?php echo lang('conpassword') ?></label>
                                    <input type="password" name="conpassword"
                                        placeholder="<?php echo lang('conpassword') ?>" class="form-control required">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 mt-4 d-flex justify-content-between">
                                    <button type="submit" name="submit"
                                        class="btn btn-primary btn-style"><?php echo lang('submit') ?></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- life of read more -->
    <div class="modal fade life-modal" id="life-modal-gallery" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row single-imagepopup">
                        <?php
                        //$this->load->view('media-single-image',['singleimage'=>$singleimage]);
                        ?>
                        <!--
                        <div class="col-6 col-md-3">
                           <div class="img-cover-life">
                              <img src="<?php echo base_url('assets/frontend') ?>/images/media-2.png" class="w-100">
                              <p>Image Name 1</p>
                              <p>Shared by: <b>Andy S</b></p>
                              <p>Date: <b>30/05/2022</b></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-3">
                           <div class="img-cover-life">
                              <img src="<?php echo base_url('assets/frontend') ?>/images/time-3.png" class="w-100">
                              <p>Image Name 1</p>
                              <p>Shared by: <b>Andy S</b></p>
                              <p>Date: <b>30/05/2022</b></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-3">
                           <div class="img-cover-life">
                              <img src="<?php echo base_url('assets/frontend') ?>/images/time-2-2.png" class="w-100">
                              <p>Image Name 1</p>
                              <p>Shared by: <b>Andy S</b></p>
                              <p>Date: <b>30/05/2022</b></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-3">
                           <div class="img-cover-life">
                              <img src="<?php echo base_url('assets/frontend') ?>/images/memorable.png" class="w-100">
                              <p>Image Name 1</p>
                              <p>Shared by: <b>Andy S</b></p>
                              <p>Date: <b>30/05/2022</b></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-3">
                           <div class="img-cover-life">
                              <img src="<?php echo base_url('assets/frontend') ?>/images/time-3.png" class="w-100">
                              <p>Image Name 1</p>
                              <p>Shared by: <b>Andy S</b></p>
                              <p>Date: <b>30/05/2022</b></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-3">
                           <div class="img-cover-life">
                              <img src="<?php echo base_url('assets/frontend') ?>/images/time-2-2.png" class="w-100">
                              <p>Image Name 1</p>
                              <p>Shared by: <b>Andy S</b></p>
                              <p>Date: <b>30/05/2022</b></p>
                           </div>
                        </div>
                        <div class="col-6 col-md-3">
                           <div class="img-cover-life">
                              <img src="<?php echo base_url('assets/frontend') ?>/images/memorable.png" class="w-100">
                              <p>Image Name 1</p>
                              <p>Shared by: <b>Andy S</b></p>
                              <p>Date: <b>30/05/2022</b></p>
                           </div>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- life of read more -->
    <div class="modal fade life-modal" id="life-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo get_loadingimage() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 img-cover-life">
                            <img src="<?php echo site_url('assets/frontend/') ?>images/memorable.png"
                                class="w-100 life-modal-img"
                                onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->lifeof_1 ?>'">
                        </div>
                        <h3 class="life-modal-name" style="font-size: 16px;font-weight: bold;padding: 10px;"></h3>
                        <div class="col-12">
                            <p class="life-modal-desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book.
                            </p>
                        </div>
                        <div class="d-flex justify-content-between w-100 ">
                            <div class="life-shared-by d-flex flex-wrap">
                                <p>Shared by:</p>
                                <p class="life-modal-sharedby">Name</p>
                            </div>
                            <div class="date-life d-flex flex-wrap">
                                <p>Date:</p>
                                <p class="life-modal-postdate">**/**/**</p>
                            </div>
                            <div class="life-like d-flex flex-wrap">
                                <a tabindex="0" role="button" data-bs-placement="top" data-bs-toggle="popover"
                                    data-bs-trigger="focus" title="Dismissible popover"
                                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                    onclick="postlike(this)" data-tablename="" data-postid="" class="postlikebtn"><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/heart.png"><span
                                        class="likecount">0</span></a>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <?php if(1){ ?>
                                <button type="submit" class="btn btn-submit-request" data-bs-toggle="collapse"
                                    href="#comment-otherpost" role="button" aria-expanded="false"
                                    aria-controls="collapseExample">Add a Comment</button>
                                <form class="collapse" id="comment-otherpost" method="post"
                                    action="<?php //echo site_url('journal_commentpost') ?>">
                                    <input type="hidden" name="post_type" id="post_type" />
                                    <input type="hidden" name="postid" id="postid" />
                                    <input type="hidden" name="user_id"
                                        value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo get_frontauthuser('warden_user_id'); }elseif(checkauth()){
                                                        echo get_frontauthuser('warden_user_id');
                                                    } ?>" />
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <input type="text" placeholder="Name" class="form-control"
                                                    id="exampleInputname" aria-describedby="emailHelp" name="name"
                                                    value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->firstname.' '.user_detail(get_frontauthuser('warden_user_id'))->lastname; }elseif(checkauth()){
                                                        echo user_detail(get_frontauthuser('user_id'))->firstname.' '.user_detail(get_frontauthuser('user_id'))->lastname;
                                                    }else{
                                                        echo '';
                                                    } ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <input type="email" placeholder="Email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                                    value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->email; }elseif(checkauth()){
                                                        echo user_detail(get_frontauthuser('user_id'))->email;
                                                    }else{
                                                        echo '';
                                                    } ?><?php //echo (checkauth()) ? user_detail(get_frontauthuser('user_id'))->email : '' ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <textarea class="form-control" placeholder="Leave Comment"
                                                    id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class=" d-flex">
                                                <button type="submit" class="btn btn-submit-request">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                                <!-- <button type="submit" class="btn btn-submit-request mt-3" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">View Comment</button> -->
                                <div class="demo-comment p-0">
                                    <div class="media-post-comment">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                </div>
            </div>
        </div>
    </div>
    <!-- featurepost read more -->
    <div class="modal fade life-modal" id="featurepost-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo get_loadingimage() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 img-cover-life">
                            <img src="<?php echo site_url('assets/frontend/') ?>images/memorable.png"
                                class="w-100 featurepost-modal-img"
                                onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                        </div>
                        <div class="col-12">
                            <p class="featurepost-modal-name"></p>
                            <p class="featurepost-modal-desc">Lorem Ipsum is simply dummy text of the printing and
                                typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book.
                            </p>
                        </div>
                        <div class="d-flex justify-content-between w-100 ">
                            <div class="life-shared-by d-flex flex-wrap">
                                <p>Shared by:</p>
                                <p class="featurepost-modal-sharedby">Name</p>
                            </div>
                            <div class="date-life d-flex flex-wrap">
                                <p>Date:</p>
                                <p class="featurepost-modal-postdate">**/**/**</p>
                            </div>
                            <div class="life-like d-flex flex-wrap">
                                <a tabindex="0" role="button" data-bs-placement="top" data-bs-toggle="popover"
                                    data-bs-trigger="focus" title="Dismissible popover"
                                    data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                    onclick="postlike(this)" data-tablename="" data-postid="" class="postlikebtn"><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/heart.png"><span
                                        class="likecount">0</span></a>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <?php if(1){ //checkauth() ?>
                                <button type="submit" class="btn btn-submit-request" data-bs-toggle="collapse"
                                    href="#comment-featurepost" role="button" aria-expanded="false"
                                    aria-controls="collapseExample">Add a Comment</button>
                                <form class="collapse" id="comment-featurepost" method="post"
                                    action="<?php //echo site_url('journal_commentpost') ?>">
                                    <input type="hidden" name="post_type" id="post_type" />
                                    <input type="hidden" name="postid" id="postid" />
                                    <input type="hidden" name="user_id" value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo get_frontauthuser('warden_user_id'); }elseif(checkauth()){
                                                        echo get_frontauthuser('user_id'); }else{echo '0';} ?>" />
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <input type="text" placeholder="Name" class="form-control"
                                                    id="exampleInputname" aria-describedby="emailHelp" name="name"
                                                    value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->firstname.' '.user_detail(get_frontauthuser('warden_user_id'))->lastname; }elseif(checkauth()){
                                                        echo user_detail(get_frontauthuser('user_id'))->firstname.' '.user_detail(get_frontauthuser('user_id'))->lastname;
                                                    }else{echo '';} ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <input type="email" placeholder="Email" class="form-control"
                                                    id="exampleInputEmail1" aria-describedby="emailHelp" name="email"
                                                    value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->email; }elseif(checkauth()){
                                                        echo user_detail(get_frontauthuser('user_id'))->email;
                                                    }else{echo '';} ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <textarea class="form-control" placeholder="Leave Comment"
                                                    id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class=" d-flex">
                                                <button type="submit" class="btn btn-submit-request">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php } ?>
                                <!-- <button type="submit" class="btn btn-submit-request mt-3" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">View Comment</button> -->
                                <div class="demo-comment p-0">
                                    <div class="media-post-comment">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                </div>
            </div>
        </div>
    </div>
    <!-- timeline of read more -->
    <div class="modal fade life-modal" id="time-line-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php echo get_loadingimage() ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            
                            <div class="portfolio" style="display:contents;">
                                <img src="<?php echo site_url('assets/frontend/') ?>images/memorable.png" class="w-100">
                                <!-- <img src="<?php echo site_url('assets/frontend/') ?>images/media-3.png" class="w-100">
                              <img src="<?php echo site_url('assets/frontend/') ?>images/media-2.png" class="w-100">
                              <img src="<?php echo site_url('assets/frontend/') ?>images/media-4.png" class="w-100"> -->
                            </div>
                            <h3 class="timeline-title pt-2">
                                Childhood Memories (1939-1945)
                            </h3>
                            <div class="col-12 mt-3 description">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <!-- comment -->
                    <div class="row">
                        <?php if(1){ ?>
                        <button type="submit" class="btn btn-submit-request" data-bs-toggle="collapse"
                            href="#comment-timeline" role="button" aria-expanded="false"
                            aria-controls="collapseExample">Add a Comment</button>
                        <form class="collapse" id="comment-timeline" method="post"
                            action="<?php //echo site_url('journal_commentpost') ?>">
                            <input type="hidden" name="post_type" id="post_type" />
                            <input type="hidden" name="postid" id="postid" />
                            <input type="hidden" name="user_id" value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo get_frontauthuser('warden_user_id'); }elseif(checkauth()){
                                                        echo get_frontauthuser('warden_user_id');}else{echo '0';} ?>" />
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <input type="text" placeholder="Name" class="form-control" id="exampleInputname" aria-describedby="emailHelp" name="name" value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->firstname.' '.user_detail(get_frontauthuser('warden_user_id'))->lastname; }elseif(checkauth()){
                                                        echo user_detail(get_frontauthuser('user_id'))->firstname.' '.user_detail(get_frontauthuser('user_id'))->lastname;
                                                    }else{echo '';} ?>" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12">
                                    <div class="mb-3">
                                        <input type="email" placeholder="Email" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->email; }elseif(checkauth()){
                                                        echo user_detail(get_frontauthuser('user_id'))->email;
                                                    }else{echo '';} ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="Leave Comment"
                                            id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class=" d-flex">
                                        <button type="submit" class="btn btn-submit-request">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                        <!-- <button type="submit" class="btn btn-submit-request mt-3" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">View Comment</button> -->
                        <div class="demo-comment p-0">
                            <div class="media-post-comment">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Create Album -->
    <div class="modal fade" id="create-album" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Album</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="create-album-form">
                        <input type="hidden" name="profile_id"
                            value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <input type="text" placeholder="Album Title" class="form-control required"
                                        name="title" id="exampleInputEmail22" aria-describedby="emailHelp" require>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <textarea style="margin-top:10px" class="form-control required"
                                        placeholder="Caption" id="exampleFormControlTextarea12" name="caption"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex mb-3 form-radio">
                                    <div class="form-check me-3">
                                        <label class="form-check-label" for="flexRadioDefault13">
                                            Public
                                        </label>
                                        <input class="form-check-input" type="radio" name="is_public" value="1"
                                            id="flexRadioDefault13">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Private
                                        </label>
                                        <input class="form-check-input" name="is_public" value="2" type="radio"
                                            id="flexRadioDefault2" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 d-flex">
                                    <button type="submit" class="btn btn-submit-request">Create</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit memory popup -->
    <div class="modal fade" id="editmemorypopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('edit-form-text') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editmemorypopup-form">
                        <input type="hidden" name="profile_id"
                            value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <input type="text" placeholder="Album Title" class="form-control required"
                                        name="title" id="exampleInputEmail22" aria-describedby="emailHelp" require>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- edit journal post popup start -->
    <div class="modal fade" id="editjournalpostpopup2210" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo lang('edit-form-text') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editjournalpostpopup2210-form" action="<?php echo site_url('journal_post_edit') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="profile_id"
                            value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="mb-3">
                                    <input type="text" placeholder="Album Title" class="form-control required"
                                        name="title" id="exampleInputEmail22" aria-describedby="emailHelp" require>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- edit journal post popup end -->
    <!-- upload multiple image -->
    <div class="modal fade" id="upload-image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body upload-image">
                    <form>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control visually-hidden" id="inputGroupFile402">
                                    <label class="input-group-text add-image w-100" for="inputGroupFile402">Upload from
                                        Desktop</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control visually-hidden" id="inputGroupFile502">
                                    <label class="input-group-text add-image w-100" for="inputGroupFile502">Upload from
                                        Instagram</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control visually-hidden" id="inputGroupFile602">
                                    <label class="input-group-text add-image w-100" for="inputGroupFile602">Upload from
                                        Facebook</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex mb-3 form-radio">
                                    <div class="form-check me-3">
                                        <label class="form-check-label" for="flexRadioDefault14">
                                            Public
                                        </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault14">
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label" for="flexRadioDefault221">
                                            Private
                                        </label>
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault221" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3 d-flex">
                                    <button type="submit" class="btn btn-submit-request">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- media image detail modal of read more -->
    <div class="modal fade image-media-modal" id="image-detail-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <img src="<?php echo site_url('assets/frontend/') ?>images/media-1.png"
                                class="w-100 image-d">
                        </div>
                        <div class="col-12">
                            <p class="image-caption">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book. </p>
                        </div>
                        <div class="d-flex justify-content-between w-100 ">
                            <div class="life-shared-by d-flex flex-wrap">
                                <p>Shared by:</p>
                                <p>Name</p>
                            </div>
                            <div class="life-shared-by d-flex flex-wrap">
                                <p>Date:</p>
                                <p>**/**/**</p>
                            </div>
                            <div class="life-like d-flex flex-wrap">
                                <a tabindex="0" role="button" data-bs-placement="top" data-bs-toggle="popover"
                                    data-bs-trigger="focus" title="Dismissible popover"
                                    data-bs-content="And here's some amazing content. It's very engaging. Right?"><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/heart.png">
                                    <span>45</span></a>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <div class="row">
                                <button type="submit" class="btn btn-submit-request" data-bs-toggle="collapse"
                                    href="#comment-media" role="button" aria-expanded="false"
                                    aria-controls="collapseExample">Add a Comment</button>
                                <form class="collapse mt-3" id="comment-media">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <input type="text" placeholder="Name" class="form-control"
                                                    id="exampleInputEmail23" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="mb-3">
                                                <input type="email" placeholder="Email" class="form-control"
                                                    id="exampleInputEmail24" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <textarea class="form-control" placeholder="Leave Comment"
                                                    id="exampleFormControlTextarea11" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class=" d-flex">
                                                <button type="submit" class="btn btn-submit-request">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button type="submit" class="btn btn-submit-request mt-3" data-bs-toggle="collapse"
                                    href="#" role="button" aria-expanded="false" aria-controls="collapseExample">View
                                    Comment</button>
                                <div class="demo-comment">
                                    <div class="recent-item">
                                        <div class="comment-parent">
                                            <div class="r-i-head d-flex align-items-center position-relative w-100">
                                                <div class="pic d-flex align-items-center">
                                                    <span><img
                                                            src="<?php echo site_url('assets/frontend/') ?>images/2.png"></span>
                                                </div>
                                                <h3 class="comment-title">
                                                    <b>Faith Granger</b> published a tribute <br>
                                                    <span>4 months ago.</span>
                                                </h3>
                                                <div class="r-i-dots">
                                                    <div class="main-nav nav-1">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                    <ul>
                                                        <li><a href="#">Item 1</a></li>
                                                        <li><a href="#">Item 2</a></li>
                                                        <li><a href="#">Item 3</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="r-i-content">
                                                <p>We are so sorry for your loss.</p>
                                            </div>
                                            <div class="action-palate d-flex my-2">
                                                <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                    <span>1 </span> Like</a>
                                                <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                    Comment</a>
                                            </div>
                                        </div>
                                        <div class="comment-parent border-zero">
                                            <div class="r-i-head d-flex align-items-center position-relative w-100">
                                                <div class="pic d-flex align-items-center">
                                                    <span><img
                                                            src="<?php echo site_url('assets/frontend/') ?>images/1.png"></span>
                                                </div>
                                                <h3 class="comment-title">
                                                    <b>Arthur Zhang </b> published a comment <br>
                                                    <span>About a year ago.</span>
                                                </h3>
                                                <div class="r-i-dots">
                                                    <div class="main-nav">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </div>
                                                    <!-- <ul>
                                          <li><a href="#">Item 1</a></li>
                                          <li><a href="#">Item 2</a></li>
                                          <li><a href="#">Item 3</a></li>
                                          </ul> -->
                                                </div>
                                            </div>
                                            <div class="r-i-content">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor.</p>
                                            </div>
                                            <div class="action-palate d-flex my-2">
                                                <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                    <span>12 </span> Like</a>
                                                <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                    Comment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-submit-request m-auto d-table mt-3">Load
                                        More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Post detail modal of read more -->
        <div class="modal fade image-media-modal new" id="post-detail-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <img src="<?php echo site_url('assets/frontend/') ?>images/media-1.png"
                                    class="w-100 image-d">
                            </div>
                            <div class="col-12">
                                <p class="image-caption">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. </p>
                            </div>
                            <div class="d-flex justify-content-between w-100 ">
                                <div class="life-shared-by d-flex flex-wrap">
                                    <p>Created by:</p>
                                    <p>Name</p>
                                </div>
                                <div class="life-shared-by d-flex flex-wrap">
                                    <p>Date:</p>
                                    <p>**/**/**</p>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="row">
                                    <button type="submit" class="btn btn-submit-request" data-bs-toggle="collapse"
                                        href="#comment-journal" role="button" aria-expanded="false"
                                        aria-controls="collapseExample">Add a Comment </button>
                                    <form class="collapse" id="comment-journal" method="post" novalidate="novalidate">
                                        <div class="row">
                                            <input type="hidden" name="user_id" value="<?php echo (checkauth()) ? get_frontauthuser('user_id') : 0 ?>" />
                                            <div class="col-12 col-md-12">
                                                <div class="mb-3">
                                                    <input type="text" placeholder="Name" class="form-control"
                                                        name="name" id="exampleInputEmail25"
                                                        aria-describedby="emailHelp" value="<?php echo (checkauth()) ? user_detail(get_frontauthuser('user_id'))->firstname.' '.user_detail(get_frontauthuser('user_id'))->lastname : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="mb-3">
                                                    <input type="email" placeholder="Email" class="form-control"
                                                        name="email" id="exampleInputEmail26"
                                                        aria-describedby="emailHelp" value="<?php echo (checkauth()) ? user_detail(get_frontauthuser('user_id'))->email : '' ?>">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <textarea class="form-control" placeholder="Leave Comment"
                                                        name="comment" id="exampleFormControlTextarea14"
                                                        rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" d-flex">
                                                    <button type="submit" class="btn btn-submit-request">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                    </div>
                </div>
            </div>
        </div>
        <!-- edit content popup -->
        <div class="modal fade image-media-modal" id="edit-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <form>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <textarea class="form-control"
                                                        placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat"
                                                        id="exampleFormControlTextarea13" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" d-flex">
                                                    <button type="submit" class="btn btn-submit-request">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                    </div>
                </div>
            </div>
        </div>

        
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/vaakash/socializer@2f749eb/css/socializer.min.css">

<script src="https://cdn.jsdelivr.net/gh/vaakash/socializer@2f749eb/js/socializer.min.js"></script>
<script>
(function(){
    socializer( '.socializer' );
}());
</script>
        <!-- Post detail modal of read more -->
        <div class="modal fade life-modal" id="post-detail-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="img-cover-life">
                                    <img src="<?php echo site_url('assets/frontend/') ?>images/memorable.png"
                                        class="w-100 life-modal-img">
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="life-modal-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to
                                    make a type specimen book. It has survived not only five centuries, but also the
                                    leap into electronic typesetting, remaining essentially unchanged. It was
                                    popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                    passages, and more recently with desktop publishing software like Aldus PageMaker
                                    including versions of Lorem Ipsum</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <div class="d-flex justify-content-between w-100 ">
                            <div class="life-shared-by d-flex flex-wrap">
                                <p>Shared by:</p>
                                <p class="life-modal-sharedby">Name</p>
                            </div>
                            <div class="date-life d-flex flex-wrap">
                                <p>Date:</p>
                                <p class="life-modal-postdate">**/**/**</p>
                            </div>
                            <div class="life-like d-flex flex-wrap">
                                <a tabindex="0" role="button" data-bs-placement="top" data-bs-toggle="popover"
                                    data-bs-trigger="focus" title="Dismissible popover"
                                    data-bs-content="And here's some amazing content. It's very engaging. Right?"><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/heart.png">
                                    <span>0</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
        <link href="https://foliotek.github.io/Croppie/croppie.css" rel="stylesheet" />
        <script src="<?php echo site_url('assets/frontend/') ?>js/custom.js"></script>
        <script src="<?php echo site_url('assets/frontend/') ?>js/allajaxfunction.js"></script>
        <script src="<?php echo site_url('assets/frontend/') ?>js/owl.carousel.min.js"></script>
        <script src="https://foliotek.github.io/Croppie/croppie.js"></script>
        <script src="https://www.jquery-az.com/jquery/js/intlTelInput/intlTelInput.js"></script>

        <!-- slider script start -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script>
            var swiper = new Swiper(".mySwiper", {
                loop: true,
                speed: 1000,
                autoplay: {
                    delay: 1500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>
        <!-- slider script end -->

<script>

function edit_journal(element,id){
    
    //$('#editmemorypopup').modal('hide');
    $('#editjournalpostpopup2210').modal('show');
    var editpopup_html = $('.class-editjournalpost'+id).html();
    
    $('#editjournalpostpopup2210 #editjournalpostpopup2210-form').html(editpopup_html);
    
    
}

function edit_timlinepost(element,id){
    console.log('asd678asd');
    //$('#editmemorypopup').modal('hide');
    $('#editjournalpostpopup2210').modal('show');
    var editpopup_html = $('.class-edittimelinepost'+id).html();
    
    $('#editjournalpostpopup2210 #editjournalpostpopup2210-form').html(editpopup_html);
    $('#editjournalpostpopup2210').find('form').attr('action','<?php echo site_url() ?>timeline_post_edit');
      
}

function edit_respectpost(element,id){
    console.log('asd678asd');
    //$('#editmemorypopup').modal('hide');
    $('#editjournalpostpopup2210').modal('show');
    var editpopup_html = $('.class-editrespectpost'+id).html();
    
    $('#editjournalpostpopup2210 #editjournalpostpopup2210-form').html(editpopup_html);
    $('#editjournalpostpopup2210').find('form').attr('action','<?php echo site_url() ?>respect_post_edit');
      
}

function edit_mediaimagepost(element,id){
    console.log('edit_mediaimagepost');
    //$('#editmemorypopup').modal('hide');
    $('#editjournalpostpopup2210').modal('show');
    var editpopup_html = $('.class-editmediapost'+id).html();
    
    $('#editjournalpostpopup2210 #editjournalpostpopup2210-form').html(editpopup_html);
    $('#editjournalpostpopup2210').find('form').attr('action','<?php echo site_url() ?>mediaimage_post_edit');
      
}

function edit_mediaalbumpost(element,id){

    //$('#editmemorypopup').modal('hide');
    $('#editjournalpostpopup2210').modal('show');
    var editpopup_html = $('.class-editalbumpost'+id).html();
    console.log('edit_mediaimagepost',editpopup_html);
    
    $('#editjournalpostpopup2210 #editjournalpostpopup2210-form').html(editpopup_html);
    $('#editjournalpostpopup2210').find('form').attr('action','<?php echo site_url() ?>mediaalbum_post_edit');
}

function edit_memorypost(element,id){
    console.log('asd678asd');
    //$('#editmemorypopup').modal('hide');
    $('#editjournalpostpopup2210').modal('show');
    var editpopup_html = $('.class-editmemorypost'+id).html();
    
    $('#editjournalpostpopup2210 #editjournalpostpopup2210-form').html(editpopup_html);
    $('#editjournalpostpopup2210').find('form').attr('action','<?php echo site_url() ?>memory_post_edit');
      
}

function edit_popup(element){
    // data-bs-toggle="modal" data-bs-target="#editmemorypopup"
    $('#editmemorypopup').modal('show');
    var editpopup_html = $(element).parent().find('.clone-editpopup').html();
    $('#editmemorypopup #editmemorypopup-form').html(editpopup_html);
    
}

function savepublicprivate(tb,id,status){
    
    var divsection_class = '.journalpost-section';
    if(tb=='journal_post'){
        var datapost =  {'table':tb,'id':id,'is_public':status};
        var urlpath = '<?php echo site_url("setjournalpublicprivate") ?>';
        
    }else if(tb=='media_album'){
        var datapost =  {'table':tb,'id':id,'is_public':status};
        var urlpath = '<?php echo site_url("setmediaalbumpublicprivate") ?>';
        divsection_class = '.media-show-data';
    }else if(tb=='memories'){
        var datapost =  {'table':tb,'id':id,'memory_ispublic':status};
        var urlpath = '<?php echo site_url("setmemorypublicprivate") ?>';
        divsection_class = '.memories-postdata';
    }else if(tb=='timeline'){
        var datapost =  {'table':tb,'id':id,'timeline_ispublic':status};
        var urlpath = '<?php echo site_url("settimelinepublicprivate") ?>';
        divsection_class = '.timeline-postloop';
    }else if(tb=='respect_post'){
        var datapost =  {'table':tb,'id':id,'respect_ispublic':status};
        var urlpath = '<?php echo site_url("setrespectpublicprivate") ?>';
        divsection_class = '.recent-post-data';
    }else{
        var datapost =  {'table':tb,'media_id':id,'media_status':status};
        var urlpath = '<?php echo site_url("setmediapublicprivate") ?>';
    }
    // console.log('datapost',datapost);
    $.ajax({
        url: urlpath,
        type: 'POST',
        data: datapost,
        success: function (data) {
            var res = JSON.parse(data);
            console.log('asdasd',res.body);
            $('#editmemorypopup').modal('hide');
            $('#life-modal-gallery').modal('hide');
            if(divsection_class!=''){
                $(divsection_class).html(res.body);
            }
            // if (res.status == true) {

            //     console.log('asdad');
            //     $('.shareonemail-section').prepend('<p class="share-success alert-success">successfuly</p>');
            //     // $('#signupsuccessModal').modal('show');
            //     return false;
            // } else {
            //     $('.'+form_mailid+'-error').removeClass('hide').html(data.message);
            //     return false;
            // }
            return false;
            console.log(data);
        }
    });
}

$(document).ready(function(){

    $('body').on('click', '.loadMore_otherpost', function () {
        var postid = $(this).data('postid');
        var posttype = $(this).data('posttype');
        console.log('postidthis', postid, posttype);
        $.ajax({
            url: "otherpost_view_limit/" + postid + '/all/' + posttype,
            type: 'GET',
            success: function (data) {
                var data = JSON.parse(data);
                // console.log(data);
                
                if (data.status == true) {
                    console.log(data);
                    $(this).parents('.media-post-comment').html(data.body.othercomment);
                    $(this).parents('.media-post-comment').find('.recent-item').addClass('show');
                }
                // console.log(data);
            }
        });
    });

    $('#sharebtn').click(function(){
        $('.shareonemail-section').find('.share-success').remove();
        if($('#shareonemail').val()!=''){
            var url = '<?php echo site_url('shareqrcode')?>';
            var emailid = $('#shareonemail').val();
            $.ajax({
                //url: "profileupdate",
                url: url,
                type: 'POST',
                data: {'emailid':emailid},
                success: function (data) {
                    var res = JSON.parse(data);
                    console.log(res);
                    if (res.status == true) {
                        console.log('asdad');
                        $('.shareonemail-section').prepend('<p class="share-success alert-success">Share successfull</p>');
                        // $('#signupsuccessModal').modal('show');
                        return false;
                    } else {
                        //$('.'+form_mailid+'-error').removeClass('hide').html(data.message);
                        return false;
                    }
                    return false;
                    console.log(data);
                }
            });
        }
    })
})
// ==== FUnction for profile imgage ======//
$("#inputGroupFile01").change(function (e) {

    $profiID = $('input[name=profile_id]').val();
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.src = _URL.createObjectURL(file);
        img.onload = function ()
        {
            var width=this.width;
            var height=this.height;
            if(width < 100 || height < 160)
            {
                //$(".image-prodisplay").html(def);
                //$('#userprofile-form').find('.image-prodisplay').remove();
                $("#inputGroupFile01").val('');
                $('.image-prodisplay').css('display','none');
                $('.image-prodisplay-new').css('display','block');
                $(".error-profile").text("Image size should not be less than 100*160px");
            }else{
                $(".error-profile").text("");
                $('.image-prodisplay-new').css('display','none');
                $('.image-prodisplay').css('display','block');
            }

        };

    }
});

//========= Function for background image ====//

$("#inputGroupFilebg01").change(function (e) {

    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.src = _URL.createObjectURL(file);
        img.onload = function ()
        {
            var width=this.width;
            var height=this.height;
            if(width < 550 || height < 550)
            {
                //$(".image-prodisplay").html(def);
                //$('#userprofile-form').find('.image-prodisplay').remove();
                $("#inputGroupFilebg01").val('');
                $('.image-backdisplay').css('display','none');
                $('.image-backdisplay-new').css('display','block');
                $(".error-bcimg").text("Image size should not be less than 550*550px");
            }else{
                $(".error-bcimg").text("");
                $('.image-backdisplay-new').css('display','none');
                $('.image-backdisplay').css('display','block');
            }

        };

    }
});

// ==== Function for thumbnail image =======//

/*
$("#inputGroupFilethumb01").change(function (e) {

    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.src = _URL.createObjectURL(file);
        img.onload = function ()
        {
            var width=this.width;
            var height=this.height;
            if(width != 50 || height != 50)
            {
                //$(".image-prodisplay").html(def);
                //$('#userprofile-form').find('.image-prodisplay').remove();
                $("#inputGroupFilethumb01").val('');
                $('.image-thumdisplay').css('display','none');
                $('.image-thumdisplay-new').css('display','block');
                $(".error-thumimg").text("Image size should be equal to 50*50px");
            }else{
                $(".error-thumimg").text("");
                $('.image-thumdisplay-new').css('display','none');
                $('.image-thumdisplay').css('display','block');
            }

        };

    }
});

*/

$("input[name*=media_image]").change(function (e) {
    $("input[name*=media_image]").parents('.imagegroup_cus').find('.error').remove();

});
$("input[name=timelineimage]").change(function (e) {
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        img.src = _URL.createObjectURL(file);
        img.onload = function ()
        {
            var width=this.width;
            var height=this.height;
            console.log('asddtime line',width,height);
            $("input[name=timelineimage]").parents('.imagegroup_cus').find('.error').remove();
            if(width >= 400 && height >= 250)
            {
                //$(".image-prodisplay").html(def);
                //$('#userprofile-form').find('.image-prodisplay').remove();
                $(".error-thumimg").remove();
                $('.image-thumdisplay-new').css('display','none');
                $('.image-thumdisplay').css('display','block');
                $('#timeline-formvalidation').find('button[name=submit]').attr('disabled',false);
            }else{
                $('#timeline-formvalidation').find('button[name=submit]').attr('disabled',true);
                $('#exampleInputPasswordtimeline122').val('');
                $('.image-thumdisplay').css('display','none');
                $('.image-thumdisplay-new').css('display','block');
                $('#exampleInputPasswordtimeline122').parent().append("<span class='error-thumimg'>Image size should be equal to 400*250px</span>");
            }

        };

    }
});

$('#timeline-formvalidationnew').validate({
    rules: {
        title: "required",
        title_for_date: "required",
        from_date: "required",
        description: "required"
    },
    submitHandler: function (form) {
        console.log(form); 
        var element = '#timeline-formvalidationnew';
        var form_mailid = $(element).attr('id');

        var inputFile = $(element).find('input[name=timelineimage]');
        var post_imageold = $('input[name=post_imageold]').val();
        var fileToUpload = inputFile[0].files[0];
        console.log(post_imageold);
        console.log('fileToUpload', post_imageold, fileToUpload);
        if ((post_imageold && post_imageold != '') || (fileToUpload && fileToUpload != '')) {
            var other_data = $(element).serializeArray();
            console.log('fileToUpload', fileToUpload);
            var formdata = new FormData(form);
            formdata.append('fileToUpload', fileToUpload);

            $.ajax({
                url: "profile-timeline",
                type: 'POST',
                data: formdata,
                async: false,
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        $('.alert').addClass('hide');
                        $('#timeline-form').parent().prepend('<div class="alert alert-success">' + data.message + '</div>');
                        $('#timeline-form').removeClass('show');
                        //     $('#lifeof_loop').html(data.body);
                        $('.timeline-postloop').html(data.body);
                        $(element).find('input[name=title_for_date]').val('');
                        $(element).find('input.add-image-input').val('');
                        $(element).find('input[name=title]').val('');
                        $(element).find('input[name=from_date]').val('');
                        $(element).find('input[name=to_date]').val('');
                        $(element).find('textarea[name=description]').val('');
                    } else {
                        $('.featurepost-error').removeClass('hide').text(data.message);
                    }
                    // console.log(data);
                }
            });
        } else {
            console.log('fileds required image timeline');
            $(inputFile).parent().append('<label class="error">This field is required</label>')
        }
        return false;
    }
})

$('#media-uploadnew').validate({
        rules: {
            //title: "required",
            album_id: "required",
            //media_caption: "required",
            media_ispublic: "required"
        },
        submitHandler: function (form) {
            console.log('17000456asdadd');
            $('.alert').remove();
            var element = '#media-uploadnew';
            loaderimg(element);
            var album_id = $(element).find('input[name=album_id]').val();
            // var media_caption = $(element).find('input[name=media_caption]').val();
            // var media_ispublic = $(element).find('input[name=media_ispublic]:checked').val();
            $('.pills-media').find('.alert').remove();
            var form_mailid = $(element).attr('id');
            var other_data = $(element).serializeArray();


            var inputFile = $(element).find('input[name^=media_image]');
            var fileToUpload = inputFile[0].files[0];
            console.log('fileToUpload', fileToUpload);
            if ((fileToUpload && fileToUpload != '')) {
                $(element).find("button[name=submit]").attr("disabled", true);
                //$(element).find('button[name=submit]').prepend('<img class="form-loading-img" src="https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif" width="20px"/>');
                $(element).find('button[name=submit]').text('images are bening uplaoded...');
                // console.log('fileToUpload', fileToUpload);
                var formdata = new FormData(form);
                // formdata.append('other_data',other_data);
                formdata.append('respect_image', fileToUpload);
                
                 console.log('signupForm',form_mailid,other_data,album_id);
                 setTimeout(function () {
                     $.ajax({
                         url: "media_image",
                         type: 'POST',
                         data: formdata,
                         async: false,
                         dataType: 'json',
                         cache: true,
                         processData: false,
                         contentType: false,
                         success: function (data) {
                             console.log('17456asdadd');
                             // setTimeout(function () {
                                 $('.alert').fadeOut('slow');
                                 $(element).find("button[name=submit]").attr("disabled", false);
                                 $(element).find("button[name=submit]").text('submit');
                                 // $("#btnSubmit").attr("disabled", false);
                             // }, 1500)
                             //return false;
                             if (data.status == true) {
                                 $(element).find('button .form-loading-img').remove();
                                 console.log('asdad', data.status, data.message);
                                 $(element).removeClass('show');
                                 $(element).find('select[name=album_id]').val('');
                                 $(element).find('input[type=text]').val('');
                                 $(element).find('input[type=file]').val('');
                                 $(element).find('textarea').val('');
                                 //    window.location.href=data.url;
                                 // $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                                 // $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                                 // element.preventDefault();
                                 $('.media-show-data').html(data.data);
                                 $('.media-show-data').prepend('<div class="alert alert-success">' + data.message + '</div>');
                                 return false;
                            } else {
                                 $('#media-show-data').prepend('<div class="alert alert-success">' + data.message + '</div>');
                                 return false;
                             }
                         }
                    });
                 },2000);

            } else {
                console.log('fileds required image');
                $(inputFile).parent().append('<label class="error">This field is required</label>');
                return false;
            }

            return false;
        }
    });

</script>


<script>
    
    $("#userprofile-form").validate({
        rules: {
            profile_name: {
                required: true
            },
            profile_url: {
                required: true,
                unique_profileurl: ['profile_url']
            },
            first_name: {
                required: true
                // lettersonly: true
            },
            last_name: {
                required: true
                // lettersonly: true
            },
            dob: 'required',
            bio: {
                required: true,
                minlength: 60,
                maxlength: 120
            }
        },
        submitHandler: function (form) {

            $('input[name=thumbnail]').removeClass('error');
            $('input[name=thumbnail]').parent().find('.thumberror').remove();
            var element = '#userprofile-form';
            // console.log($(element).find('input[name=admin_profile]').val());
            var profile_file = $('input[name=profile_pic]');
            var profile_pic = profile_file[0].files[0];
            var background_file = $('input[name=background_pic]');
            var background_pic = background_file[0].files[0];
            var thumbnail = $('input[name=thumbnail]');
            var thumbnail_pic = thumbnail[0].files[0];
            console.log('thumbnail_pic', thumbnail[0].files, thumbnail_pic);
            var ajax = true;

            /*if (thumbnail[0].files.length > 0) {
                img = new Image();
                img.src = _URL.createObjectURL(thumbnail_pic);
                img.onload = function () {
                    imgwidth = this.width;
                    imgheight = this.height;
                    console.log(imgwidth, imgheight);
                    if (imgwidth <= 50 && imgheight <= 50) {
                        ajax = true;
                        // alert('true');
                    } else {
                        $('input[name=thumbnail]').addClass('error');
                        $('input[name=thumbnail]').parent().append('<span class="text-danger thumberror">Thumbnail image size 50X50</span>');
                        ajax = false;
                    }
                }
            } else {
                ajax = true;
            }*/

            // alert(ajax);
            // $("#width").text(imgwidth);
            // $("#height").text(imgheight);
            var url = '<?php echo site_url('profileupdate')?>';
            console.log(url);
            var groupid = '<?php echo (isset($currect_group_id) && $currect_group_id!="") ? $currect_group_id : 0 ?>';
            var formdata = new FormData(form);
            formdata.append('family_group_id',groupid);

            //formdata.append('profile_pic', profile_pic);
            //formdata.append('background_pic', background_pic);
            //formdata.append('thumbnail', thumbnail_pic);
            console.log('signupForm', formdata);
            if (ajax == true) {
                $.ajax({
                    //url: "profileupdate",
                    url: url,
                    type: 'POST',
                    data: formdata,
                    //async: false,
                    dataType: 'json',
                    cache: true,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status == true) {
                            console.log('asdad');
                            // $('#signupsuccessModal').modal('show');
                            $('#createProfile').modal('hide');

                            window.location.href = '/familymember/'+groupid;
                            // // $('#emailconfirm_userid').val(data.data.id);
                            // //    $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                            // $('.signupsuccessModal-sucess').removeClass('hide').text(data.message);
                            // element.preventDefault();
                            return false;
                        } else {
                            //$('.'+form_mailid+'-error').removeClass('hide').html(data.message);
                            return false;
                        }
                        return false;
                        console.log(data);
                    }
                });
            }


            return false;
        }
    });


    $.validator.addMethod("unique_profileurl",
        function (value) {
            $('#profile_url_name').text('');
            var profile_id = 0;
            var pro_id = $('#userprofile-form').find('input[name=profile_id]').val();
            if (pro_id && pro_id > 0 && pro_id != 'undefined') {
                profile_id = pro_id;
            }
            var isUnique = false;
            if (value == '')
                return isUnique;


            console.log("../profile_urlcheck/" + value + '/' + profile_id);
            $.ajax({
                url: "../profile_urlcheck/" + value + '/' + profile_id,
                type: 'GET',
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    $('#profile_url_name').text(value);
                    isUnique = data.status;
                    // console.log('asd',data);
                }
            });

            return isUnique;

        },
        jQuery.validator.format("This URL is in use. Please try another one.")
    );


    $('#comment-otherpost').validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            comment: "required",
        },
        submitHandler: function (form) {
            console.log(form);
            var element = '#comment-otherpost';

            var form_mailid = $(element).attr('id');
            var postid = $(element).find('input[name=postid]').val();
            var post_type = $(element).find('input[name=post_type]').val();
            var other_data = $(element).serializeArray();
            // console.log('other_data', other_data);
            $.ajax({
                url: "other_commentpost",
                type: 'POST',
                data: other_data,
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    console.log('asdasd',data);
                    if (data.status == true) {
                        // console.log(data.body);
                        $(element).removeClass('show');
                        // $(element).find('input[name=name]').val('');
                        // $(element).find('input[name=email]').val('');
                        $(element).find('textarea').val('');
                        $('#life-modal .media-post-comment').html(data.comment_body);
                        // $('#life-modal .media-post-comment').html(data.comment_body);
                        $('#life-modal .media-post-comment').prepend(data.message);
                        // $('#life-modal .media-post-comment').prepend(data.message);
                        var this_popup = $('#life-modal');
                        // this_popup.find('.media-post-comment').html(data.comment_body);
                        // console.log(data.count_commentrow);

                        this_popup.find('#loadMore_otherpost').hide();
                        if (data.rowcount > 2) {
                            this_popup.find('#loadMore_otherpost').show();
                            this_popup.find('#loadMore_otherpost').attr('data-postid', postid);
                            this_popup.find('#loadMore_otherpost').attr('data-posttype', post_type);
                        }

                        return false;
                    } else {
                        return false;
                    }
                    console.log(data);
                }
            });
            return false;
        }
    });
    
        jQuery("#register-phone").intlTelInput({
            initialCountry: "gb"
        });
        </script>
        <script>
        $.validator.setDefaults({
            submitHandler: function() {
                // alert("submitted!");
                return true;
            }
        });


        $("#resetpassword").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 6
                },
                conpassword: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                }
            },
            messages: {
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                conpassword: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                }
            },
        });



        $('#comment-journal').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                comment: "required",
            },
            submitHandler: function(form) {
                // console.log(form);
                var element = '#comment-journal';

                var form_mailid = $(element).attr('id');
                var other_data = $(element).serializeArray();
                // console.log(other_data[0].value);
                $.ajax({
                    url: "journal_commentpost",
                    type: 'POST',
                    data: other_data,
                    async: false,
                    dataType: 'json',
                    cache: true,
                    success: function(data) {
                        if (data.status == true) {
                            console.log(data);
                            $(element).removeClass('show');
                            $(element).find('textarea').val('');
                            $(element).find('input[name=name]').val('');
                            $(element).find('input[name=email]').val('');
                            $('#post-detail-popup .journal-post-comment').html(data.body);
                            $('#post-detail-popup .journal-post-comment').prepend(data.message);
                            $('#post-detail-popup').find('#loadMore_journolpost').hide();
                            if (data.rowcount > 2) {
                                $('#post-detail-popup').find('#loadMore_journolpost').show();
                                $('#post-detail-popup').find('#loadMore_journolpost').attr(
                                    'data-postid', other_data[0].value);
                            }
                            return false;
                        } else {
                            return false;
                        }
                        console.log(data);
                    }
                });
                return false;
            }
        });



        function generateprourl(element) {
            $("input[name=profile_name]").keyup(function() {
                // console.log($(element).val(),prourl);
                // console.log($(element).parents('#exampleModalLabel').text())
                if ($('input[name=profile_url]').is("[readonly]")) {

                } else {
                    var prourl = $(element).val();
                    prourl = prourl.replace(/[^A-Z0-9]/ig, "-");
                    $('input[name=profile_url]').val(prourl);
                }
            })
        }

        function updategroup(element){
            $('#updateGroup').find('input#groupid').val($(element).attr('data-groupid'));
            $('#updateGroup').find('input#groupname').val($(element).attr('data-groupname'));
        }

        function userprofleupdate(element, title) {
            var isUnique = false;
            $('#userprofile-form').find('input[name=profile_id]').remove();
            if (title != '') {
                // $('#userprofile-form').find('.image-backdisplay').remove();
                $('#userprofile-form').find('.image_inputhidden').remove();
                var ele = $(element);
                popupid = ele.attr('data-bs-target');
                profileid = ele.attr('data-proid');
                $(popupid).find('.modal-title').text(title);
                console.log('asd', ele, popupid, profileid);
                $.ajax({
                    url: "<?php echo site_url('profileget') ?>/" + profileid,
                    type: 'GET',
                    async: false,
                    dataType: 'json',
                    cache: true,
                    success: function(data) {
                        // isUnique = data;
                        console.log('data', data.charity_data);

                        if (data.rowCount != "") {
                            $('#add_charity').html(data.charity_data);
                        }
                        $('#count_row').val(data.rowCount);
                        $.map(data.data, function(val, key) {
                            console.log(val, key);
                            if (val && val != '' && val != undefined) {

                                if( ['profile_pic', 'thumbnail', 'background_img'].indexOf(key) >= 0 ){
                                    val = val.substring(0, 4) === 'http' ? val : '<?php echo site_url('assets/frontend/images/') ?>' + val;
                                }

                                if (key == 'profile_pic') {
                                    if (val && val != '') {
                                        $('#userprofile-form').find('.image-prodisplay').remove();
                                        $('#userprofile-form').find('input[name=profile_pic]')
                                            .parent().parent().append(
                                                '<span class="image-prodisplay"><img src="' + val +
                                                '" width="100px;"><br><span class="removeimg" data-type="profile_pic"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/></span></span>'
                                            );
                                        $('#userprofile-form').find('.image-thumdisplay').remove();
                                        $('#userprofile-form').find('input[name=thumbnail]')
                                            .parent().parent().append(
                                                '<span class="image-thumdisplay"><img src="' + val +
                                                '" width="100px;"><br><span class="removeimg" data-type="thumbnail_pic"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/></span></span>'
                                            );
                                    } else {
                                        $('#userprofile-form').find('.image-prodisplay').remove();
                                    }
                                }
                                if (key == 'thumbnail') {
                                    if (val && val != '') {

                                        $('#userprofile-form').find('.image-thumdisplay').remove();
                                        $('#userprofile-form').find('input[name=thumbnail]')
                                            .parent().parent().append(
                                                '<span class="image-thumdisplay"><img src="' + val +
                                                '" width="100px;"><br><span class="removeimg" data-type="thumbnail_pic"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/></span></span>'
                                            );
                                    } else {
                                        $('#userprofile-form').find('.image-thumdisplay').remove();
                                    }
                                }
                                if (key == 'background_img') {
                                    if (val && val != '') {
                                        $('#userprofile-form').find('.image-backdisplay').remove();
                                        $('#userprofile-form').find('input[name=background_pic]')
                                            .parent().parent().append(
                                                '<span class="image-backdisplay"><img src="' + val +
                                                '" width="100px;"><br><span class="removeimg" data-type="background_pic"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/></span></span>'
                                            );
                                    }
                                }
                                if (key == 'bio') {
                                    $('#currentbiocount').text(val.length);

                                }
                                if (key == 'is_public' && val==2) {
                                    $('input[name=is_public]').attr('checked',true);

                                }
                                if (key == 'admin_profile') {
                                    $('#userprofile-form').find('input[name=' + key + '][value=' +
                                        val + ']').attr('checked', true);
                                } else {

                                    $('#userprofile-form').find(
                                        'input[name=profile_url][type=text]').attr('readonly',
                                        true);

                                    $('#userprofile-form').find('input[name=' + key +
                                        '][type=text]').val(val);
                                    $('#userprofile-form').find('input[name=' + key +
                                        '][type=date]').val(val);
                                    $('#userprofile-form').find('input[name=' + key + '][type=url]')
                                        .val(val);
                                    $('#userprofile-form').find('textarea[name=' + key + ']').val(
                                        val);
                                }
                            }

                        })

                        $('#userprofile-form').append('<input type="hidden" name="profile_id" value="' +
                            data.data.id + '"/>');
                        $('#userprofile-form')
                        console.log(data);
                    }
                });
                return isUnique;
                // userprofile-form
            }

        }

        $(document).on('change', '.change_image_pic', function() {
            
            var filesCount = $(this)[0].files.length;
            var textbox = $(this).prev();
            if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
                textbox.text(fileName);
            } else {
                textbox.text(filesCount + ' files selected');
            }
            if (typeof(FileReader) != "undefined") {
                var attr_val = '';
                if ($(this).attr('name') == 'profile_pic') {
                    attr_val = "image-prodisplay";
                    var dvPreview_thum = $(this).closest("form.profileform").find(".image-thumdisplay");
                    dvPreview_thum.html("");
                    $($(this)[0].files).each(function() {
                        var file = $(this);
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = $("<img />");
                            img.attr("style", "width: 100px;");
                            img.attr("src", e.target.result);
                            dvPreview_thum.append(img);
                            console.log(img);
                        }
                        reader.readAsDataURL(file[0]);
                    });
                } else if ($(this).attr('name') == 'background_pic') {
                    attr_val = 'image-backdisplay';
                } else {
                    attr_val = 'image-thumdisplay';
                }

                var dvPreview = $(this).parent().parent().find("." + attr_val);
                dvPreview.html("");
                $($(this)[0].files).each(function() {
                    var file = $(this);
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var img = $("<img />");
                        img.attr("style", "width: 100px;");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                        console.log(img);
                    }
                    reader.readAsDataURL(file[0]);
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }


        });

        $().ready(function() {

            $('#respect-post-form').validate({
                rules: {
                    name: "required",
                    email: "required",
                    comment: "required"
                },
                submitHandler: function(form) {
                    var element = '#respect-post-form';
                    var form_mailid = $(element).attr('id');
                    $('.recent-post-data').find('.alert').remove();
                    var inputFile = $(element).find('input[name=respect_image]');
                    var fileToUpload = inputFile[0].files[0];
                    var other_data = $(element).serializeArray();
                    var formdata = new FormData(form);
                    formdata.append('respect_image', fileToUpload);

                    loaderimg(element);
                    $.ajax({
                        url: "respect_post",
                        type: 'POST',
                        data: formdata,
                        async: false,
                        dataType: 'json',
                        cache: true,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            loaderimghide(element);
                            //location.reload();
                           /* $(function() {
                              // Owl Carousel
                              var owl = $(".respectpostdata .owl-carousel");
                              owl.owlCarousel({
                                items: 2,
                                loop: true
                                //nav: true
                              });
                            });*/
                            if (data.status == true) {
                                 $('#collapseRespect').removeClass('show');
                                 $("#respect-post-form")[0].reset();
                                $('.recent-post-data').html(data.body);
                                $('.recent-post-data').append(
                                    '<div class="alert alert-success">' + data
                                    .message + '</div>')
                                if(data.postcount>2){
                                    $('.respectposr-generate-default').hide();
                                    $('.respectposr-generate').show();
                                }

                            } else {
                                $('.recent-post-data').append(
                                    '<div class="alert alert-success">' + data
                                    .message + '</div>')
                            }
                        }
                    });
                    return false;
                }
            })

            $('body').on('click', '.removeimg', function() {
                $('#userprofile-form').find('input[name=' + $(this).data('type') + '_remove]').remove();

                $(this).parent().find('img').remove();
                $(this).text('Removed');
                $(this).parent().append(
                    '<input type="hidden" class="image_inputhidden" value="remove" name="' + $(this)
                    .data('type') + '_remove"/>')
            })



            $('.createprofile').click(function() {
                $('#createProfile').find('input[type=text]').val('');
                $('#createProfile').find('input[type=date]').val('');
                $('#createProfile').find('input[type=url]').val('');
                $('#createProfile').find('input[type=hidden]').val('');
                $('#createProfile').find('textarea').val('');
                $('#createProfile').find('#currentbiocount').text('0');
                $('#createProfile').find('input[name=profile_url]').removeAttr('readonly');
                $('#userprofile-form').find('.image-prodisplay > img').attr('src',
                    '<?php echo base_url("assets/frontend/uploads/100x100.png") ?>');
                $('#userprofile-form').find('.image-thumdisplay > img').attr('src',
                    '<?php echo base_url("assets/frontend/uploads/50x50.png") ?>');
                $('#userprofile-form').find('.image-backdisplay > img').attr('src',
                    '<?php echo base_url("assets/frontend/uploads/550x550.png") ?>');

                $('#userprofile-form').find('.image-prodisplay > .removeimg').remove();
                $('#userprofile-form').find('.image-backdisplay > .removeimg').remove();
                $('#userprofile-form').find('.image-thumdisplay > .removeimg').remove();


                $('#userprofile-form').find('[name=background_pic]').val('');
                $('#createProfile').find('#exampleModalLabel').text('Create Profile');
                $('#createProfile').find('#profile_url_name').text('');
            })
            // validate the comment form when it is submitted
            // $("#commentForm").validate();

            $('#loginform').validate({
                rules: {
                    password: "required",
                    email: "required",
                },
                messages: {
                    password: "Please enter password",
                    email: "Please enter email address",
                }
            });



            // $('#lifeof-formvalidate').validate({
            //   rules: {
            //    lifeof_type: "required",
            //    post_date: "required",

            //    description: "required",
            //    shared_by: "required"
            //   }
            // })











            // validate signup form on keyup and submit






            $.validator.addMethod("unique",
                function(value) {
                    var isUnique = false;
                    if (value == '')
                        return isUnique;

                    // id_send= '';
                    // if(params[1] !='')
                    //    id_send ='id='+params[1]+'&';

                    $.ajax({
                        url: "<?php echo site_url('checkregisteruser_email') ?>?email=" + value,
                        type: 'GET',
                        async: false,
                        dataType: 'json',
                        cache: true,
                        success: function(data) {
                            isUnique = data;
                            console.log(data);
                        }
                    });

                    return isUnique;

                },
                jQuery.validator.format("Email Address already in use")
            );

            // propose username by combining first- and lastname
            $("#username").focus(function() {
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                if (firstname && lastname && !this.value) {
                    this.value = firstname + "." + lastname;
                }
            });

            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Letters only please");

            //code to hide topic selection, disable for demo
            var newsletter = $("#newsletter");
            // newsletter topics are optional, hide at first
            var inital = newsletter.is(":checked");
            var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
            var topicInputs = topics.find("input").attr("disabled", !inital);
            // show when newsletter is checked
            newsletter.click(function() {
                topics[this.checked ? "removeClass" : "addClass"]("gray");
                topicInputs.attr("disabled", !this.checked);
            });
        });
        </script>
        <?php if($this->session->flashdata('loginpopup')){ ?>
        <script>
        $(document).ready(function() {
            $('#login-modal').modal('show');
        })
        </script>
        <?php }
         if($this->session->flashdata('feature_post')){ ?>
        <script>
        $(document).ready(function() {
            $('#featurepost-form').addClass('show');
            $('html, body').animate({
                scrollTop: $('#featurepost-form').offset().top
            }, 'slow');

        })
        </script>
        <?php }
         if($this->session->flashdata('lifeof_post')){ ?>
        <script>
        $(document).ready(function() {
            $('#lifeof-form').addClass('show');
            $('#pills-profile-tab').trigger('click');
            $('html, body').animate({
                scrollTop: $('#section-2').offset().top
            }, 'slow');
        })
        </script>
        <?php }
         if($this->session->flashdata('journal_postpopup')){ ?>
        <script>
        $(document).ready(function() {

            $('#pills-journal-tab').trigger('click');

        })
        </script>
        <?php }
         if($this->session->flashdata('respect_postpopup')){ ?>
        <script>
        $(document).ready(function() {

            $('#pills-respect-tab').trigger('click');

        })
        </script>
        <?php }
         if($this->session->flashdata('memoryimage_post')){ ?>
        <script>
        $(document).ready(function() {
            // $('#shareMemory').addClass('show');
            $('#pills-connection-tab').trigger('click');
            // $('html, body').animate({
                // scrollTop: $('#section-2').offset().top
            // }, 'slow');
        })
        </script>
        <?php }
         if($this->session->flashdata('timelineimage_post')){ ?>
        <script>
        $(document).ready(function() {
            //$('#timeline-form').addClass('show');
            $('#pills-contact-tab').trigger('click');
            // $('html, body').animate({
            //     scrollTop: $('#section-2').offset().top
            // }, 'slow');
        })
        </script>
        <?php }
         if($this->session->flashdata('respectflashsession_post')){ ?>
        <script>
        $(document).ready(function() {
            // $('#collapseRespect').addClass('show');
            $('#pills-respect-tab').trigger('click');
            // $('html, body').animate({
            //     scrollTop: $('#section-2').offset().top
            // }, 'slow');
        })
        </script>
        <?php }
        if($this->session->flashdata('mediaflashsession_post')){ ?>
        <script>
        $(document).ready(function() {
            // $('#collapseRespect').addClass('show');
            $('#pills-media-tab').trigger('click');
            // $('html, body').animate({
            //     scrollTop: $('#section-2').offset().top
            // }, 'slow');
        })
        </script>
        <?php }
         if($this->session->flashdata('journalflashsession_post')){ ?>
        <script>
        $(document).ready(function() {
            $('#create-blog').addClass('show');
            $('#pills-journal-tab').trigger('click');
            $('html, body').animate({
                scrollTop: $('#section-2').offset().top
            }, 'slow');
        })
        </script>
        <?php }
         if($this->session->flashdata('signuppopup')){ ?>
        <script>
        $(document).ready(function() {
            $('#signupModal').modal('show');
        })
        </script>
        <?php }
         if($this->session->flashdata('signupsuccessModal')){ ?>
        <script>
        $(document).ready(function() {
            $('#signupsuccessModal').modal('show');
        })
        </script><?php }
        if($this->session->flashdata('success_resetpassword')){ ?>
        <script>
        $(document).ready(function() {
            $('#success_resetpassword').modal('show');
            setTimeout(function(){
                $('#success_resetpassword').modal('hide');
            },3000)
        })
        </script><?php }
         if($this->session->flashdata('changepasswordModal')){ ?>
        <script>
        $(document).ready(function() {
            $('#changepassword-modal').modal('show');
        })
        </script><?php } ?>
        <?php if(isset($middelsection['lifeof_post']) && count($middelsection['lifeof_post'])>0){ ?>
        <script></script>
        <?php }
         if(isset($middelsection['memories_post']) && count($middelsection['memories_post'])>0){ ?>
        <script>
        function memory_model(element) {
            const ind = $(element).data('index');
            let memory_arr = '<?php echo json_encode($middelsection['memories_post']) ?>';
            memory_arr = JSON.parse(memory_arr);
            console.log(memory_arr[ind]);
            const img_url = '<?php echo base_url("assets/frontend/uploads/") ?>';
            let imagefullpath = '';
            if (memory_arr[ind].memoryimage != '' && memory_arr[ind].memoryimage != 'undefined') {
                imagefullpath = img_url + memory_arr[ind].memoryimage;
            } else {
                imagefullpath = img_url + '<?php echo get_defaultimage()->profile_img ?>';
            }
            console.log({imagefullpath});
            $('#life-modal').find('.img-cover-life img').attr('src', imagefullpath);
            $('#life-modal').find('#sharedby').text(memory_arr[ind].name);
            $('#life-modal').find('#postdate').text(memory_arr[ind].created_at);
            $('#life-modal').find('#lifeof_desc').text(memory_arr[ind].comment);

        }
        </script>
        <?php } ?>
        <script>
        function editlife_post(element, type = 'early life', id = '') {

            $('#lifeof-edit').modal('show');
            console.log(type,'type',id)
            /**/
            var element = '#lifeof-formvalidate';
            $('input[name=lifeof_type]').val(type);
            $('input[name=title]').val(type.replace('-', ' '));
            $('input[name=lifeof_id]').val('');
            $('#lifeof-edit').find('#inputGroupFilelifeofpost_lifeofimg').val('');
            $(element).find('input:radio[name=is_public]').prop('checked', false);
            $(element).find('textarea[name=description]').val('');
            if (id != '') {
                $('input[name=lifeof_id]').val(id);
                $('#exampleModalLabellifeof').text('<?php echo lang("edit_lifeof") ?>');
            }else{
                $('#exampleModalLabellifeof').text('<?php echo lang("add_lifeof") ?>');
                $('#flexRadioDefault3lifeofpublic').prop('checked',true);
            }
            if (id != '') {
                $.ajax({
                    url: "edit-lifeof/" + id,
                    type: 'POST',
                    success: function(resp) {
                        // $(element).find('input[name=title]').remove();
                        var data = JSON.parse(resp);
                        if (data.status == true) {
                            // console.log('lif',data.body.is_public);
                            $(element).find('input[name=title]').val(data.body.type);
                            $(element).find('input:radio[name=is_public]').filter('[value="' + data.body
                                .is_public + '"]').prop('checked', true);
                            var defultimg = (data.body.images && data.body.images != '') ? data.body
                                .images : '<?php echo get_defaultimage()->profile_img ?>';
                            console.log('defultimg', defultimg);
                            $(element).find('.lifeofimagedefulttext').val(defultimg);
                            if (data.body.images != null) {
                                $(element).append('<input name="post_imageold" value="' + data.body.images +
                                    '" type="hidden"/>');
                            }
                            $(element).find('textarea[name=description]').val(data.body.description);
                        } else {
                            $(element).parents('.row').find('.featurepost-error').removeClass('hide').text(
                                data.message);
                        }
                    }
                });
            }
        }

        $('.btn btn-submit-request').click(function() {
            $('.cabinet').addClass('hide');
        })
        // Start upload preview image
        //$(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");
        var $uploadCrop,
            tempFilename,
            rawImg,
            imageId;

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('.upload-demo').addClass('ready');
                    $('#cropImagePop').modal('show');
                    rawImg = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                swal("Sorry - you're browser doesn't support the FileReader API");
            }
        }

        $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 200,
                height: 300,
            },
            enforceBoundary: false,
            enableExif: true
        });
        $('#cropImagePop').on('shown.bs.modal', function() {
            // alert('Shown pop');
            $uploadCrop.croppie('bind', {
                url: rawImg
            }).then(function() {
                console.log('jQuery bind complete');
            });
        });

        $('.item-img').on('change', function() {
            imageId = $(this).data('id');
            tempFilename = $(this).val();
            $('#cancelCropBtn').data('id', imageId);
            readFile(this);
        });
        $('#cropImageBtn').on('click', function(ev) {
            $uploadCrop.croppie('result', {
                type: 'base64',
                format: 'jpeg',
                size: {
                    width: 150,
                    height: 200
                }
            }).then(function(resp) {
                $('.cabinet').removeClass('hide');
                $('#item-img-output').attr('src', resp);
                $('#cropImagePop').modal('hide');
            });
        });
        // End upload preview image

        /*======== Search user profile ======*/
        function submitProfileForm() {
            $("#search_profile").submit();
        }

        /*======= Add More Charity =======*/

        function AddMoreCharity(ref) {
            var n1 = $('#count_row').val();
            var adcount = (n1 == '') ? 1 : (parseInt(n1) + 1);
            $('#count_row').val(adcount);
            //var adcount = parseInt(n1) + 1;
            var hml = '';
            hml += '<div class="row addMore">';
            hml += '<div class="col-12 col-md-6">';
            hml += '<div class="mb-3">';
            hml +=
                '<label for="exampleFormControlInput1" class="form-label"><?php echo lang('charity_name') ?></label>';
            hml += '<input type="text" name="charity_name[]" placeholder="Charity Name" class="form-control">';
            hml += '</div>';
            hml += '</div>';
            hml += '<div class="col-12 col-md-6">';
            hml += '<div class="mb-3">';
            hml +=
                '<label for="exampleFormControlInput1" class="form-label"><?php echo lang('charity_donation_link') ?></label>';
            hml +=
                '<input type="url" name="charity_donation_link[]" placeholder="Link to charity donation" class="form-control">';
            hml += '</div>';
            hml += '</div>';
            hml += '<div class="col-12 col-md-10">';
            hml += '<div class="mb-3">';
            hml +=
                '<label for="exampleFormControlInput1" class="form-label"><?php echo lang('charity_donation_fewword') ?></label>';
            hml +=
                '<textarea class="form-control" placeholder="Write your Comment" id="exampleFormControlTextarea3" rows="3" name="charity_donation_fewword[]"></textarea>';
            hml += '</div>';
            hml += '</div>';

            /*hml += '<div class="col-12 col-md-2">';
               hml += '<div class="mb-3">';
               if(n1 >= 1)
               {
                  hml += '<button type="button" onclick="AddMoreCharity(this)" style="background-color: #90a792;margin-top: 31px;"><i class="fa fa-plus" aria-hidden="true"></i></button>';
               }
                  hml += '<button type="button" class="rmv-charity" href="javascript:void(0)" style="float: right;" onclick="removeCharity(this)">';
                  hml += '<i class="fa fa-times" aria-hidden="true"></i>';
               hml += '</button>';
               hml += '</div>';
            hml += '</div>';*/

            hml += '</div>';

            $("#add_charity").append(hml);
            $('.disnon').css('display', 'none');

        }


        function removeCharity(ref) {
            var count = parseInt($('#count_row').val());
            var adcount = count - 1;
            $('#count_row').val(adcount);
            /*if(count == 1)
            {
               var mnl = '<div class="col-12 col-md-2"><div class="mb-3"><button type="button" onclick="AddMoreCharity(this)" style="background-color: #90a792;margin-top: 31px;"><i class="fa fa-plus" aria-hidden="true"></i></button></div></div>';
               $(".addMore").append(mnl);

            }*/
            $(ref).parent(".mb-3").parent(".col-md-2").closest('.addMore').remove();
        }

        $(document).ready(function() {


            $('#journal-post-btn').click(function () {
                $(this).parents('#pills-journal').find('form textarea').val('');
                $(this).parents('#pills-journal').find('form select[name=journal_category]').val('').change();
            });
            $('.timeline-media-form').click(function() {
                let href = $(this).attr('href');
                $(href).find('input[type=text]').val('');
            })
        })
        /*============ End =========*/
        function profilebio(element) {
    var count = $(element).val().length;
    // alert(count);
    $('#currentbiocount').text(count);

}

function showreadmorepopup_featurepostnew(id, popupid, urlpath, tablename,imagename='') {
    console.log('id asd', id, tablename);

    // console.log('likecount', likecount);
    $('#' + popupid).find('.loadingimg').removeClass('hide');
    // $('#'+popupid).find('.modal-content');
    $('#' + popupid).find('.' + popupid + '-img').attr('src', '');
    $('#' + popupid).find('.' + popupid + '-sharedby').text('');
    $('#' + popupid).find('.' + popupid + '-postdate').text('');
    $('#' + popupid).find('.' + popupid + '-desc').text('');
    $('#' + popupid).find('.' + popupid + '-name').text('');
    $.ajax({
        url: urlpath,
        type: 'POST',
        data: { 'id': id, 'tablename': tablename },
        success: function (resp) {
            $('#' + popupid).find('.modal-body').hide();
            // var data = resp;
            var data = JSON.parse(resp);
            if (data.status == true) {
                let tbname = (tablename == 'memories') ? 'memory_post' : tablename;
                console.log('memories', tbname);
                // console.log($('#' + popupid).find('.modal-body'));
                // var img_url = '<?php echo base_url("assets/frontend/uploads/") ?>';
                $('#' + popupid).find('.postlikebtn').attr('data-tablename', tbname);
                $('#' + popupid).find('.postlikebtn').attr('data-postid', id);
                var img_name = (imagename!='') ? imagename : data.body.image_url;
                // var img_name = (imagename!='') ? imagename : data.body.image_url;
                // fullfilename = data.body.image_url
                var explodefile = img_name.split('.')
                if(explodefile[explodefile.length-1]=='mp4'){
                    $('#' + popupid).find('.img-cover-life').html('<video src = "'+img_name+'"  style="width:100%;" controls>Your browser does not support the <video> element. </video>');
                }else if(explodefile[explodefile.length-1]=='mp3'){
                    $('#' + popupid).find('.img-cover-life').html('<audio controls class="w-100"><source src="'+img_name+'" type="audio/mpeg">Your browser does not support the audio element.</audio>');
                }else{

                    $('#' + popupid).find('.img-cover-life').html('<img src="'+img_name+'" class="w-100 life-modal-img" onerror="this.onerror=null; this.src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/LifeoEarlyLife.png">');
                    //$('#' + popupid).find('.' + popupid + '-img').attr('src', data.body.image_url);
                }
                // $('#' + popupid).find('.' + popupid + '-img').attr('src', img_name);
                $('#' + popupid).find('.' + popupid + '-sharedby').text(data.body.profile_name);
                $('#' + popupid).find('.' + popupid + '-postdate').text(data.body.post_date);
                $('#' + popupid).find('.' + popupid + '-desc').text(data.body.description);
                $('#' + popupid).find('.' + popupid + '-name').text(data.body.name);
                $('#' + popupid).find('.likecount').text(data.body.likecount);
                $('#' + popupid).find('.btn-submit-request').show();
                $('#' + popupid).find('.btn-submit-request').removeClass('hide');
                // console.log(tablename, data);
                // if (tablename == 'memories') {
                $('#' + popupid).find('#comment-featurepost #postid').val(id);
                $('#' + popupid).find('#comment-featurepost #post_type').val(tbname);
                $('#' + popupid).find('.media-post-comment').html(data.comment_body);
                var this_popup = $('#' + popupid).find('.media-post-comment');
                this_popup.find('#loadMore_otherpost').hide();
                console.log(data.rowcount, this_popup.find('#loadMore_otherpost').html());
                if (data.rowcount > 2) {
                    this_popup.find('#loadMore_otherpost').show();
                    this_popup.find('#loadMore_otherpost').attr('data-postid', id);
                    this_popup.find('#loadMore_otherpost').attr('data-posttype', tbname);
                }
                // }


                // if (tablename == 'timeline') {
                //$('#' + popupid).find('.btn-submit-request').hide();
                // }
                setTimeout(function () {
                    $('#' + popupid).find('.modal-body').show();
                    console.log(data);
                    $('#' + popupid).find('.loadingimg').addClass('hide');
                }, 1000);
            }
            // console.log(resp);
        }
    });
    // console.log(lifeof_arr[ind]);

}

</script>

<script>
function mediaslidercomment(evt,element){
    console.log($(element).serializeArray());
    alert('element sss');
    evt.preventDefault();
    // rules: {
    //     name: "required",
    //     email: {
    //         required: true,
    //         email: true
    //     },
    //     comment: "required",
    // },
    // submitHandler: function (form) {
        // console.log(form);
        

        var form_mailid = $(element).attr('id');
        var postid = $(element).find('input[name=postid]').val();
        var post_type = $(element).find('input[name=post_type]').val();
        var other_data = $(element).serializeArray();
        // other_data.append({"comment":$(element).find('input[name=comment]').val()})
        // console.log(form,$(element).find('textarea').attr('class'))
        // other_data['post_type'] = post_type;
        // other_data['postid'] = postid;
        // other_data['name'] = $(element).find('input[name=name]').val();
        // other_data['email'] = $(element).find('input[name=email]').val();
        // // other_data['comment'] = $(element).find('textarea').val();
        
        // console.log('other_data',element, other_data);
        $.ajax({
            url: "other_commentpost",
            type: 'POST',
            data: other_data,
            async: false,
            dataType: 'json',
            cache: true,
            success: function (data) {
                console.log('asdasd',data);
                if (data.status == true) {
                    // console.log(data.body);
                    $(element).removeClass('show');
                    // $(element).find('input[name=name]').val('');
                    // $(element).find('input[name=email]').val('');
                    $(element).find('textarea').val('');
                    $(element).parent().find('.media-post-comment').html(data.comment_body);
                    $(element).parent().find('.media-post-comment').prepend(data.message);
                    var this_popup = $(element);//$('#life-modal');
                    // this_popup.find('.media-post-comment').html(data.comment_body);
                    // console.log(data.count_commentrow);

                    this_popup.parent().find('#loadMore_otherpost').hide();
                    if (data.rowcount > 2) {
                        this_popup.parent().find('#loadMore_otherpost').show();
                        this_popup.parent().find('#loadMore_otherpost').attr('data-postid', postid);
                        this_popup.parent().find('#loadMore_otherpost').attr('data-posttype', post_type);
                    }

                    return false;
                } else {
                    return false;
                }
                console.log(data);
            }
        });
        return false;
    // }
}


</script>
</body>

</html>
