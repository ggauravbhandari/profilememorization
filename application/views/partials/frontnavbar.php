<nav class="navigation-custom">
   <div class="right-part d-none d-md-table">
      <div class="searchBox float-start">
         <input type="search" placeholder="search memorisation profiles">
         <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png" />
      </div>
      <div class="menu-btn d-table mx-2 float-start">
         <a href="#" class="menu-btn-toggle"><span><img src="<?php echo site_url('assets/frontend/') ?>images/Menu.png" class="menu-line"> <img src="<?php echo site_url('assets/frontend/') ?>images/Close.svg" class="close"></span></a>
         <nav class="sidebar">
            <?php $this->load->view('navigation') ?>
         </nav>
      </div>
   </div>
</nav>