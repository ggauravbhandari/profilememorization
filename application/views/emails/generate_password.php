<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <style>
         .white-color p{
            margin-top:0;color:#90a792;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;
         }
         </style>
   </head>
   <body>
      <div style="width:100%; display:block; text-align: center;">
         <img src="<?php echo site_url('assets/frontend/images/Memorisation-logo.png') ?>" style="display:inline-block; width: 80%;">
         <div style="width: 100%; display: block;background-color:#ffffff; padding:120px 50px 85px 50px; box-sizing: border-box; text-align: left;">
            <p style="margin-top:0;color:#90a792;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >HI <?php echo ucwords($userName);?>,</p>
            <div style="margin-top:0;color:#90a792;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" class="white-color"><?php echo $body_msg ?></div>
            <div style="width: 100%; display: block; margin:80px 0 0;">
               <a href="<?php echo site_url('resetpassword/'.$token.'/warden_users') ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; background-color:#90a792; color:#ffffff; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;">Generate Password</a>
            </div>
         </div>
      </div>            
   </body>
</html>