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
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="<?php echo base_url('/assets/backend/') ?>css/bootstrap.min.css" rel="stylesheet">
      <!-- Template Stylesheet -->
      <link href="<?php echo base_url('/assets/backend/') ?>css/style.css" rel="stylesheet">
   </head>
   <body>
      <?php echo (isset($template['partials']['sidebar'])) ? $template['partials']['sidebar'] 
         : ''; ?>
      <?php 
         echo $template['body'];?>  
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
      <!-- Template Javascript -->
      <script src="<?php echo base_url('/assets/backend/') ?>js/main.js"></script>
   </body>
</html>