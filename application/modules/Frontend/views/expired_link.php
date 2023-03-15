<section id="section-1">
   <div class="container-fluid">
   <div class="row align-items-start">
      <div class="col-12 col-md-12 d-flex">
         <div class="logo m-3 d-none d-md-block">
            <a href="<?php echo site_url('/') ?>"><img src="<?php echo site_url('assets/frontend/') ?>images/Memorisation-logo1.png" style="width: 250px;" /></a> 
         </div>
         <nav class="navigation-custom">
            <div class="right-part d-none d-md-table">
               <?php 
                        $this->load->view('partials/top-headerrightsection'); ?>
            </div>
         </nav>
      </div>
   </div>
</section>
<section class="my-5">
   <div class="container">
      <div class="row">
         <div class="welcome-message">
            <h1>Welcome to Memorisation</h1>
            <p><?php echo (isset($pagemessage) && $pagemessage!='') ? $pagemessage : '' ?></p>
            
         </div>
      </div>
   </div>
</section>