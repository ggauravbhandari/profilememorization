<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title><?php echo  (isset($template['title'])) ? $template['title'] : $site_title ?></title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="" name="keywords">
      <meta content="" name="description">
      <!-- Favicon -->
      <link href="<?php echo base_url('/assets/backend/') ?>img/favicon.ico" rel="icon">
      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
      <!-- Icon Font Stylesheet -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="<?php echo base_url('/assets/backend/') ?>css/bootstrap.min.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="<?php echo base_url('/assets/backend/') ?>css/style.css" rel="stylesheet">
   </head>
   <body>
      <?php echo (isset($template['partials']['sidebar'])) ? $template['partials']['sidebar'] : ''; ?>
      <!-- Content Start -->
      <div class="content">
         <!-- Navbar Start -->
         <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="<?php echo site_url('admin') ?>" class="navbar-brand d-flex d-lg-none me-4">
               <h2 class="text-primary mb-0"><?php echo lang('site_title') ?></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
            </a>
            <div class="navbar-nav align-items-center ms-auto">
               <div class="nav-item dropdown">
                  <a href="javascript:;" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <span class="d-none d-lg-inline-flex">Hi <?php echo ($this->session->userdata('user_details')['user_name']) ?>,</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                     <!-- <a href="#" class="dropdown-item"><?php echo lang('menu4') ?> </a> -->
                     <!-- <a href="#" class="dropdown-item"><?php echo lang('menu5') ?></a> -->
                     <a href="<?php echo site_url('admin/logout') ?>" class="dropdown-item"><?php echo lang('menu3') ?></a>
                  </div>
               </div>
            </div>
         </nav>
         <!-- Navbar End -->
         <?php if($this->session->flashdata('success')){ ?>
         <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success') ?>
         </div>
         <?php }
            if($this->session->flashdata('error')){ ?>
         <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error') ?>
         </div>
         <?php } ?>
         <?php echo $template['body'];?> 
         <!-- Footer Start -->
         <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded-top p-4">
               <div class="row">
                  <div class="col-12 col-sm-6 text-center text-sm-start">
                     &copy; <a href="#"><?php echo lang('site_title') ?></a>, All Right Reserved. 
                  </div>
                  <div class="col-12 col-sm-6 text-center text-sm-end">
                  </div>
               </div>
            </div>
         </div>
         <!-- Footer End -->
      </div>
      <!-- Content End -->
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
      <!-- <script type="text/javascript" src="<?php echo base_url('/assets/backend/')?>js/bootstrap.min.js"></script> -->
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Template Javascript -->
      <script src="<?php echo base_url('/assets/backend/') ?>js/main.js"></script>
      <script>
         $(document).ready(function(){
             $(".alert").fadeTo(2000,500).slideUp(500,function(){
                 $(".alert").slideUp(2000);
             })
             $('#userlist').DataTable();


    $('.showformuserplangroup').click(function(){
        $(this).parents('tr').find('td .userplan-group').show();
    });

         })
      </script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   </body>
</html>