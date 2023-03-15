<section id="section-1">
   <div class="container-fluid">
   <div class="row align-items-start">
      <div class="col-12 col-md-12 d-flex">
         <nav class="navigation-custom">
            <div class="right-part d-none d-md-table">
               <div class="searchBox float-start">
                  <input type="search" placeholder="search memorisation profiles">
                  <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png" />
               </div>
               <div class="notification">
                            <span><?php echo get_pending_count_user_wise() ?></span>
                            <i class="fa-sharp fa-solid fa-bell"></i>
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
<section id="section-1">
   <div class="container-fluid">
      <?php echo ($this->session->flashdata('success')) ? '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' : ''; ?>
      <div class="row align-items-start">
         <div class="col-12 col-md-5" style="min-height:70vh">
            <h3>My Account</h3>
            <p>Plan: <?php echo usercurrentplan() ?> </p>
            <?php /*if(usercurrentplan()=='Free'){
               echo '<a href="'.site_url('edit-profile').'">Edit Profile</a>';
               }*/ ?>
            <!-- <a href="<?php //echo site_url('/') ?>">Back to Home</a> -->
         </div>
      </div>
   </div>
</section>