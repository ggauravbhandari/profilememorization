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
<section class="my-5">
   <div class="container">
      <div class="row">
         <div class="welcome-message">
            <h1>Set your New Password</h1>
            <form action="<?php echo site_url('resetpassword_post') ?>" method="post" id="resetpassword" class="col-md-6" style="margin: auto;">
               <input type="hidden" name="email" value="<?php echo $users_detail['email'] ?>" />
               <input type="hidden" name="users_table" value="<?php echo $users_table ?>" />
               <div class="row">
                  <div class="col-12">
                     <div class="mb-3">
                        <!-- <label for="exampleFormControlInputpass" class="form-label"><?php echo lang('password') ?></label> -->
                        <input type="password" placeholder="<?php echo lang('password') ?>" id="password" name="password" class="form-control"  required>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="mb-3">
                        <!-- <label for="exampleFormControlInput1" class="form-label"><?php echo lang('conpassword') ?></label> -->
                        <input type="password" placeholder="<?php echo lang('conpassword') ?>" id="exampleFormControlInput1" name="conpassword" class="form-control" required>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="mb-3 mt-4 d-flex justify-content-between">
                        <button type="submit" name="submit" class="btn btn-primary btn-style"><?php echo lang('submit') ?></button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</section>