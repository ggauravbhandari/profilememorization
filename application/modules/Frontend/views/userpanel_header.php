<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
<style type="text/css">
 #myfunction {
        background: #90A792;
        width: 32px;
        height: 32px;
        border: none;
        margin-left: 3%;
        border-radius: 50%;
        justify-content: center;
        align-items: center;
        z-index: 9999;
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

                     <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png" onClick="submitProfileForm()" />
                  </form>

               </div>
               <div class="notification">
                            <span><?php echo get_pending_count_user_wise() ?></span>
                            <a href="<?php echo (checkauth()) ? site_url('dashboard') : '#' ?>"><i class="fa-sharp fa-solid fa-bell"></i></a>
                        </div>
               <div class="menu-btn d-table mx-2 float-start">
                  <a href="javascript:;" class="menu-btn-toggle"><span><img src="<?php echo site_url('assets/frontend/') ?>images/Menu.png" class="menu-line"> <img src="<?php echo site_url('assets/frontend/') ?>images/Close.svg" class="close"></span></a>
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
   <div class="col-2">
   </div>
   <div class="col-10">
      <h2 class="head-title mt-3 mb-0 brscard"><a href="#"><?php echo lang('my_account') ?> »</a> <?php echo (isset($pagetitle)) ? $pagetitle : lang('pagetitle') ?> </h2>
   </div>
</div>
<div class="row g-4">
<div class="col-2">
   <div class="sidebar-md" id="myDIV">
      <div class="bt-box">
         <button onclick="myFunction()">
         
         <img src="<?php echo site_url() ?>/assets/frontend/images/Menu.png" class="menu-line"> 
         <img src="<?php echo site_url() ?>/assets/frontend/images/Close.svg" class="close">
         
         </button>
      </div>
      <div class="tag-menu">
         <ul>
            <li>
               <a href="<?php echo site_url('/dashboard') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('menu1') ?></a>
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
               <a href="<?php echo site_url('/warden-list?status=1') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('warden') ?></a>
            </li>
            <?php } ?>
            <li>
               <a href="<?php echo site_url('/like-list') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('like_list') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/featured-list?status=3') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('featured_posts') ?></a>
            </li>
            <li>
               <a href="<?php echo site_url('/qr_keepsake') ?>"><i class="fa fa-list-ol"></i> <?php echo lang('profilelink_list') ?></a>
            </li>
            
         </ul>
      </div>
   </div>
</div>
<script>
   function myFunction() {
      var element = document.getElementById("myDIV");
      element.classList.toggle("mystyle");
   }
</script>