<!--Sidebar Start -->
<div class="sidebar pe-4 pb-3">
   <nav class="navbar bg-light navbar-light">
      <a href="<?php echo site_url('admin') ?>" class="navbar-brand mx-4 mb-3">
         <h3 class="text-primary"><?php echo (isset($site_title)) ? $site_title : lang('site_title') ?></h3>
      </a>
      <div class="navbar-nav w-100">
         <a href="<?php echo site_url('user') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='') ? 'active' : '' ?>"><i class="fa fa-tachometer-alt me-2"></i><?php echo lang('menu1') ?></a>
         <!-- <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle <?php echo ($this->uri->segment(2)=='add-user' || $this->uri->segment(2)=='user-list') ? 'active' : '' ?>" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i><?php echo lang('users') ?></a>
            <div class="dropdown-menu bg-transparent border-0">
                <a href="<?php echo site_url('user/add-user') ?>" class="dropdown-item"><i style="margin-right: 5px;"  class="fa fa-user me-2"></i><?php echo lang('adduser') ?></a>
                <a href="<?php echo site_url('user/user-list') ?>" class="dropdown-item"><i style="margin-right: 5px;" class="fa fa-list-ol"></i><?php echo lang('userlist') ?></a>
            </div>
            </div> -->
         <!-- <a href="<?php echo site_url('user/feature-post') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='feature-post') ? 'active' : '' ?>"><i class="fa fa-tachometer-alt me-2"></i><?php echo lang('featured_posts') ?></a> -->
         <!-- <a href="<?php echo site_url('user/lifeof-post') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='lifeof-post') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('lifeof') ?></a>
            <a href="<?php echo site_url('user/timeline-post') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='timeline-post') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('timeline') ?></a>
            
            <a href="<?php echo site_url('user/memories-post') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='memories-post') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('memories') ?></a>
            
            <a href="<?php echo site_url('user/respects-post') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='respects-post') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('respectlist') ?></a>
            
            <a href="<?php echo site_url('user/journal-post') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='journal-post') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('journallist') ?></a> -->
         <a href="<?php echo site_url('user/comment-list') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='comment-list') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('commentlist') ?></a>
         <a href="<?php echo site_url('user/profile-list') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='profile-list') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('profile_list') ?></a>
         <!-- <a href="<?php echo site_url('user/album-list') ?>" class="nav-item nav-link <?php echo ($this->uri->segment(1)=='admin' && $this->uri->segment(2)=='album-list') ? 'active' : '' ?>"><i class="fa fa-list-ol"></i><?php echo lang('media_alum_list') ?></a> -->
      </div>
   </nav>
</div>
<!-- Sidebar End -->