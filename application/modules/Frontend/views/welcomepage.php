<section id="section-1">
   <div class="container-fluid">
   <div class="row align-items-start">
      <div class="col-12 col-md-12 d-flex">
         <div class="logo m-3 d-none d-md-block">
            <a href="<?php echo site_url('/') ?>"><img src="<?php echo site_url('assets/frontend/') ?>images/Memorisation-logo1.png" style="width: 250px;" /></a> 
         </div>
         <nav class="navigation-custom">
            <div class="right-part d-none d-md-table">
               <div class="searchBox float-start">
                  <input type="search" placeholder="search memorisation profiles">
                  <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png" />
               </div>
               <div class="menu-btn d-table mx-2 float-start">
                  <a href="javascrip:;" class="menu-btn-toggle"><span><img src="<?php echo site_url('assets/frontend/') ?>images/Menu.png" class="menu-line"> <img src="<?php echo site_url('assets/frontend/') ?>images/Close.svg" class="close"></span></a>
                  <nav class="sidebar">
                     <?php $this->load->view('navigation') ?>
                  </nav>
               </div>
            </div>
         </nav>
      </div>
   </div>
</section>
<!--my-5-->
<section class="" style="margin-top:16px">
   <div class="container">
      <div class="row">
         <div class="welcome-message">
            <h1>Welcome to Memorisation</h1>
            <p>Your Account is Verified Successfully. Now Create your profile</p>
            <?php 
               if(get_user_plan() =='free'){
               if(user_profilecount()==0){ ?>
            <button type="button" class="dark-btn createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
            <?php }
               }elseif(get_user_plan() =='basic'){
               if(user_profilecount()==0){ ?>
            <button type="button" class="dark-btn createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
            <?php }elseif(user_profilecount()==1){ ?>
            <button type="button" class="dark-btn createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
            <?php }
               }else{ ?>
            <button type="button" class="dark-btn createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
            <?php }
               ?>
         </div>
      </div>
   </div>
</section>