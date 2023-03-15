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
         <img src="<?php echo site_url('assets/frontend/images/Memorisation-logo1.png') ?>" style="width: 100%; display: block;">
         <div style="width: 100%; display: block; margin-top:80px">
            <p style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Hi <?php echo ucwords($userName);?>,</p>
            <p style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Subscription Type: <?php echo ucwords($sub_type);?></p>
            
            <div style="margin-top:0;color:#565656;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;"><?php echo '<p>You have subscribed to profile :'.$profileName.'</p>';//$body_msg ?></div>
            
            <!-- delete_subscription -->
            <div style="text-align: center; width: 100%; display: block; margin:80px 0 0;">
               <a target="_blank" href="<?php echo site_url('delete_subscription/'.$sub_id) ?>" style="display:inline-block; text-decoration: none; font-weight:bold; font-size: 16px; padding:15px 20px; background-color:#90a792; color:#fff; font-family:Georgia,serif;"><?php echo lang('unsubscribe_email_text') ?></a>
            </div>
         </div>
      </div>
   </body>
</html>