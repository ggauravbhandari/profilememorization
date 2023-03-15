<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<style type="text/css">
   .backbtn:hover{
      color: #90a792;
   }
   .backbtn{
      color: #90a792;
      display: inline-block;
      padding: 15px;
      border: 3px solid;
      width: 100%;
      text-align: center;
      text-decoration: none;
      font-family: 'Montserrat';
   }
   sup {
    font-size: 8px;
    font-weight: bolder;
    padding-left: 5px;
   }
   .pi{
      pointer-events: none !important;
   }

</style>
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
               <?php if(checkauth()){ ?>
               <div class="notification">
                   <span><?php echo get_pending_count_user_wise() ?></span>
                   <a href="<?php echo (checkauth()) ? site_url('dashboard') : '#' ?>"><i class="fa-sharp fa-solid fa-bell"></i></a>
               </div>

               <?php } ?>
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
<section class="sidebar-table">
<div class="container-fluid pt-4 px-4">
<div class="row g-4">
   <div class="col-12 col-md-4 col-lg-3">
      
      <?php if(familygroupcount() && familygroupcount()['ids']==1){ ?>
            <a href="<?php echo site_url('familymember').'/'.familygroupcount()['id'] ?>" class="backbtn"><?php echo lang('back_to_profile') ?></a>
            <?php }else{ ?>
            <a href="<?php echo site_url('familygroup') ?>" class="backbtn"><?php echo lang('back_to_group') ?></a>
            <?php } ?>
   </div>
   <div class="col-10">
      <h2 class="head-title mt-3 mb-0 brscard"><a href="#"><?php echo lang('my_account') ?> »</a> <?php echo (isset($pagetitle)) ? $pagetitle : lang('pagetitle') ?> </h2>
   </div>
</div>
<div class="row g-4">
<div class="col-2">
   <div class="sidebar-md" id="myDIV">
      <div class="bt-box">
         <button id="myfunction">
            <!-- onclick="myFunctionmenu()"  -->
         
         <img src="<?php echo site_url() ?>/assets/frontend/images/dashboard-menu.png" class="menu-line" style="width: 140% !important;max-width: 140% !important;margin: -9px;"> 
         <img src="<?php echo site_url() ?>/assets/frontend/images/Close.svg" class="close">
         
         </button>
      </div>
      <div class="tag-menu">
         <ul>
            
            <li>
               <a href="<?php echo site_url('/dashboard') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('menu1') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/qr_keepsake') ?>"><i class="fa-solid fa-qrcode"></i> <?php echo lang('QR_keepskae') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/subscription-list') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('subscription_list') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/comment-list?status=0') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('comments') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/life-of-list?status=0') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('lifeof') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/memory-list?status=0') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('memories') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/timeline-list?status=0') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('timeline') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/respect-list?status=0') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('respects') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/album-list') ?>"><i class="fa fa-list-ol"></i><?php echo lang('album') ?> </a>
            </li>
            <li>
               <a href="<?php echo site_url('/journal-list?status=0') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('journal') ?></a>
            </li>
            <?php 
            if(get_frontauthuser('warden_user_id')==0){ ?>
            <li>
               <a class="pi" href="<?php echo 'javascript:void(0);';//site_url('/warden-list?status=1') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('warden')?><sup>Coming Soon</sup></a>
            </li>
            <?php } ?>
            <li>
               <a href="<?php echo site_url('/like-list') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('like_list') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/like-onprofile') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('like_onprofile') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/featured-list?status=3') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('featured_posts') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/family-group-list') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('family_group') ?></a>
            </li>
           <!-- <li>
               <a href="<?php //echo site_url('/qr_keepsake') ?>"><i class="fa fa-list-ol"></i> <?php //echo lang('profilelink_list') ?></a>
            </li>-->
            
         </ul>
      </div>
   </div>
</div>
<script>
   $('.alert').not('.hide').fadeTo(3000, 500).fadeOut(500, function(){

       $(".alert").fadeOut(500);
   });
   $('#myfunction').click(function(){
      
      var element = document.getElementById("myDIV");
      element.classList.toggle("mystyle");
   })
   // function myFunctionmenu() {

   //    var element = document.getElementById("myDIV");
   //    element.classList.toggle("mystyle");
   // }
</script>