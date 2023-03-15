<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   </head>
   <body>
      <div style="width:100%; display:block; text-align: center;">
         <img src="<?php echo site_url('assets/frontend/images/Memorisation-logo.png') ?>" style="display:inline-block; width: 80%;">
         <div style="width: 100%; display: block;padding:120px 50px 85px 50px; box-sizing: border-box; text-align: left;">
            <p style="margin-top:0;color:#000;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >Hi <?php echo ucwords($userName);?>,<br>Here is the QR code for your profile</p>
            <div style="margin-top:0;color:#000;font-family:Georgia,serif;font-size:16px;line-height:25px;margin-bottom: 25px; display: block;" >
               <?php if(isset($qrcode) && $qrcode!=''){ ?>
                <img src="<?php echo $qrcode ?>" width="200px"/>
                <?php } ?>
            </div>
            <!-- <p>To visit the profile page, please <a href="<?php echo $profileurl ?>">click here</a> </p> -->
            <div style="width: 100%; display: block; margin:80px 0 0;">
               To visit the profile page, please <a href="<?php echo $profileurl ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; background-color:#90a792; color:#000; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;">Click Here</a>
            </div>
         </div>
      </div>            
   </body>
</html>