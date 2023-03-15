<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <style>
         .white-color p{
            margin-top:0;color:#fff;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;
         }
         </style>
   </head>
   <body>
      <div style="width:100%; display: inline-block;">
         <!-- <img src="<?php //echo site_url('assets/frontend/images/email-banner.png') ?>" style="width: 100%; display: block;"> -->
         <img src="<?php echo site_url('assets/frontend/images/Memorisation-logo.png') ?>" style="display:inline-block; width: 80%;">
         <div style="width: 100%; display: block; margin-top:80px">
            <p style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Hi <?php echo ucwords($userName);?>,</p>
            
            <p style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Your Memorisation Account details </p>
            <p style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Username: <?php echo $email ?></p>
            <?php //if(isset($password) && $password!=''){ ?>
            <!--<p style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Password: <?php //echo ($password);?>,</p>-->
            <?php //} ?>
            <div style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;"><?php echo $body_msg ?></div>
            <div style="text-align: center; width: 100%; display: block; margin:80px 0 0;">
               <a target="_blank" href="<?php echo site_url('emailverification/'.$token) ?>" style="display:inline-block; text-decoration: none; font-weight:bold; font-size: 16px; padding:15px 20px; background-color:#90a792; color:#fff; font-family:Georgia,serif;">Verify Email</a>
            </div>
         </div>
      </div>
   </body>
</html>