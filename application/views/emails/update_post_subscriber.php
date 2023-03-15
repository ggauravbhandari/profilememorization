<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title></title>
      <style>
         th {
            font-size: 30px;
         }
      </style>
   </head>
   <body style="background: #f3f6f4;">
     <div style="width: 83%; margin: 0 auto; padding-top: 50px;">
            <img src="<?php echo site_url('assets/frontend/images/Memorisation-logo1.png') ?>" style="width: 300px; display: block;margin-bottom:25px;">
            <p style="margin-top:80px;line-height:25px;margin-bottom:15px; display: block;" >Hi <?php echo ucwords($userName);?>,</p>
            <p>Following changes and updates have been occurred on the profile(s) you had been subscribed to</p>
     </div>
      <table width="100%;" style="text-align: center; ">
            <?php 
            if(isset($post_result) && !empty($post_result)){
               // foreach($post_result as $key => $post_val){
               // echo '<pre>';print_r($post_result['feature_post']['feature_post']); 
               if(!empty($post_result['feature_post'])){ 
                  echo '<tr><th style="margin-top:80px;display: block; margin-bottom: 50px;">Feature Post <br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr> ';?> 

                    
            <tr>
               <?php foreach($post_result['feature_post'] as $val){
                  // echo '<pre>';print_r($val); echo '</pre>';
                  if(isset($val['id']) && $val['id']!=''){ ?>
                <td style="display: inline-block;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;"></div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;"><?php echo isset($val['name']) ? $val['name'] : ''; ?> </div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="<?php echo (isset($val['image']) && $val['image']!='' && $val['image']!='undefined') ? base_url('assets/frontend/uploads/').$val['image'] : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" style="height:50vh; width:100%;" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;"><?php echo isset($val['type']) ? $val['type'] : ''; ?></h3>
                         <p><?php echo (isset($val['updated_at']) && $val['updated_at']!='' && $val['updated_at']!=null) ? date('Y-m-d',strtotime($val['updated_at'])) : date('Y-m-d',strtotime($val['created_at'])) ?></p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;"><?php echo ($val['comment']!='') ? limitedwords($val['comment'],50) : '' ?></p>
                         <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View Profile</a>
                     </div>
                </td>
                <?php }
                  } ?>
               </tr>

               <?php 
               }

               if(!empty($post_result['life_of'])){ 
                  echo '<tr><th style="margin-top:80px;display: block; margin-bottom: 50px;">Life Of <br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr>';?>   
            <tr>
               <?php foreach($post_result['life_of'] as $val){
                  // echo '<pre>';print_r($val); echo '</pre>';
                  if(isset($val->id) && $val->id!=''){ ?>
                <td style="display: inline-block;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;"></div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;"><?php echo isset($val->type) ? $val->type : ''; ?> </div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="<?php echo (isset($val->images) && $val->images!='' && $val->images!='undefined') ? base_url('assets/frontend/uploads/').$val->images : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" style="height:50vh; width:100%;" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;"><?php echo isset($val->type) ? $val->type : ''; ?></h3>
                         <p><?php echo (isset($val->updated_at) && $val->updated_at!='' && $val->updated_at!=null) ? date('Y-m-d',strtotime($val->updated_at)) : date('Y-m-d',strtotime($val->created_at)) ?></p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;"><?php echo ($val->description!='') ? limitedwords($val->description,50) : '' ?></p>
                         <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View Profile</a>
                     </div>
                </td>
                <?php }
                  } ?>
               </tr>
               <?php 
               }

               if(!empty($post_result['memories'])){ 
                  echo '<tr><th style="margin-top:80px;display: block; margin-bottom: 50px;">Memories <br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr>';?>   
               <tr>
               <?php foreach($post_result['memories'] as $val){
                  // echo '<pre>';print_r($val); echo '</pre>';
                  if(isset($val->id) && $val->id!=''){ ?>
                <td style="display: inline-block;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;"></div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;"><?php echo isset($val->type) ? $val->type : ''; ?></div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="<?php echo (isset($val->images) && $val->images!='' && $val->images!='undefined') ? base_url('assets/frontend/uploads/').$val->images : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" style="height:50vh; width:100%;" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;"><?php echo isset($val->title) ? $val->title : ''; ?></h3>
                         <p><?php echo (isset($val->updated_at) && $val->updated_at!='' && $val->updated_at!=null) ? date('Y-m-d',strtotime($val->updated_at)) : date('Y-m-d',strtotime($val->created_at)) ?></p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;"><?php echo (isset($val->comment) && $val->comment!='') ? limitedwords($val->comment,50) : '' ?></p>
                         <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View Profile</a>
                     </div>
                </td>
                <?php }
                  } ?>
               </tr>
               <?php 
               }

               if(!empty($post_result['timeline'])){ 
                  echo '<tr><th style="margin-top:80px;display: block; margin-bottom: 50px;">Timeline <br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr>';?>   
               <tr>
               <?php foreach($post_result['timeline'] as $val){
                  // echo '<pre>';print_r($val); echo '</pre>';
                  if(isset($val->id) && $val->id!=''){ ?>
                <td style="display: inline-block;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;"></div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;"><?php echo isset($val->type) ? $val->type : ''; ?></div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="<?php echo (isset($val->timeline_image) && $val->timeline_image!='' && $val->timeline_image!='undefined') ? base_url('assets/frontend/uploads/').$val->timeline_image : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" style="height:50vh; width:100%;" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;"><?php echo isset($val->title) ? $val->title : ''; ?></h3>
                         <p><?php echo isset($val->title_for_date) ? $val->title_for_date : ''; ?><?php echo isset($val->from_date) ? $val->from_date : ''; echo (isset($val->to_date) && $val->to_date!='0000-00-00') ? ' - '.$val->to_date : ''; ?></p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;"><?php echo (isset($val->description) && $val->description!='') ? limitedwords($val->description,50) : '' ?></p>
                         <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View Profile</a>
                     </div>
                </td>
                <?php }
                  } ?>
               </tr>
               <?php 
               }

               if(!empty($post_result['respect_post'])){ 
                  echo '<tr><th style="margin-top:80px;display: block; margin-bottom: 50px;">Respect <br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr>';?>   
               <tr>
               <?php foreach($post_result['respect_post'] as $val){
                  // echo '<pre>';print_r($val); echo '</pre>';
                  if(isset($val->id) && $val->id!=''){ ?>
                <td style="display: inline-block;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;"></div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;"><?php echo isset($val->type) ? $val->type : ''; ?> </div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="<?php echo (isset($val->respect_image) && $val->respect_image!='' && $val->respect_image!='undefined') ? base_url('assets/frontend/uploads/').$val->respect_image : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" style="height:50vh; width:100%;" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;"><?php echo isset($val->name) ? $val->name : ''; ?></h3>
                         <p><?php echo (isset($val->updated_at) && $val->updated_at!='' && $val->updated_at!=null) ? date('Y-m-d',strtotime($val->updated_at)) : date('Y-m-d',strtotime($val->created_at)) ?></p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;"><?php echo (isset($val->comment) && $val->comment!='') ? limitedwords($val->comment,50) : '' ?></p>
                         <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View Profile</a>
                     </div>
                </td>
                <?php }
                  } ?>
               </tr>
               <?php 
               }

               if(!empty($post_result['media_images'])){ 
                  echo '<tr><th style="margin-top:80px;display: block; margin-bottom: 50px;">Album Images <br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr>';?>   
               <tr>
               <?php foreach($post_result['media_images'] as $val){
                  // echo '<pre>';print_r($val); echo '</pre>';
                  if(isset($val->id) && $val->id!=''){ ?>
                <td style="display: inline-block;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;"></div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;"><?php echo isset($val->title) ? $val->title : ''; ?> </div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="<?php echo (isset($val->image) && $val->image!='' && $val->image!='undefined') ? base_url('assets/frontend/uploads/').$val->image : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" style="height:50vh; width:100%;" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;"><?php echo isset($val->title) ? $val->title : ''; ?></h3>
                         <p><?php echo (isset($val->updated_at) && $val->updated_at!='' && $val->updated_at!=null) ? date('Y-m-d',strtotime($val->updated_at)) : date('Y-m-d',strtotime($val->created_at)) ?></p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;"><?php echo (isset($val->media_caption) && $val->media_caption!='') ? limitedwords($val->media_caption,50) : '' ?></p>
                         <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View Profile</a>
                     </div>
                </td>
                <?php }
                  } ?>
               </tr>
               <?php 
               }

               if(!empty($post_result['journal_post'])){ 
                  echo '<tr><th style="margin-top:80px; display: block;">Journal <br> <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/about.png"> </th></tr>';?>   
               <tr>
               <?php foreach($post_result['journal_post'] as $val){
                  // echo '<pre>';print_r($val); echo '</pre>';
                  if(isset($val->id) && $val->id!=''){ ?>
                <td style="display: inline-block;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;"></div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;text-align: center;"><?php echo isset($val->title) ? $val->title : ''; ?> </div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="<?php echo (isset($val->image) && $val->image!='' && $val->image!='undefined') ? base_url('assets/frontend/uploads/').$val->image : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" style="height:50vh; width:100%;" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>'">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;"><?php echo isset($val->title) ? $val->title : ''; ?></h3>

                         <p><?php echo isset($val->category) ? $val->category : ''; ?></p>
                         <p><?php echo (isset($val->updated_at) && $val->updated_at!='' && $val->updated_at!=null) ? date('Y-m-d',strtotime($val->updated_at)) : date('Y-m-d',strtotime($val->created_at)) ?></p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;"><?php echo (isset($val->description) && $val->description!='') ? limitedwords($val->description,50) : '' ?></p>
                         <a href="<?php echo (isset($val->profile_id) && get_userprofile($val->profile_id)!='') ? site_url('/?profile=').get_userprofile($val->profile_id)->profile_url : '' ?>" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">View Profile</a>
                     </div>
                </td>
                <?php }
                  } ?>
               </tr>
               <?php 
               }
               
            } ?>
                <!-- <td style="display: inline-block; margin:20px;">
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;">Memory</div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/timeline1657471470.jpg" style="height:50vh; width:100%;">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;">Memory Title</h3>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum </p>
                         <a href="#" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">Read More</a>
                     </div>
                </td>
               <td style="display: inline-block; margin:20px;">
                    <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;">Timeline</div>
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;">Timeline1 (2022)</div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/timeline1657471470.jpg" style="height:50vh; width:100%;">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;">Childhood Memories</h3>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                         <a href="#" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">Read More</a>
                     </div>
                </td>
                <td style="display: inline-block; margin:20px;">
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;">Memory</div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="https://www.opusinfotech.in/webdesignwork/memorization/images/memorable.png" style="height:50vh; width:100%;">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;">Memory Title</h3>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                         <a href="#" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">Read More</a>
                     </div>
                </td>
                <td style="display: inline-block; margin:20px;">
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;">Timeline1 (2022)</div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/timeline1657471470.jpg" style="height:50vh; width:100%;">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;">Timeline1</h3>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;">Timeline1 </p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;  width: 250px;                  ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                         <a href="#" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">Read More</a>
                     </div>
                </td>
                <td style="display: inline-block; margin:20px;">
                     <div style="padding: 6px 10px;border-radius: 5px; font-size: 20px; font-weight: 600;    text-align: center;">Timeline1 (2022)</div>

                      <div style="
                         padding: 20px; border-radius: 0; background: #fff; box-shadow: 0px 3px 10px #90a792; text-align: center;
                         margin: 1em 0.75em 0 0;
                         font-size: 1em;
                         font-style: italic;
                         line-height: 1.5em;
                         background-size: cover !important;
                         position: relative;
                         ">
                         <img src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/timeline1657471470.jpg" style="height:50vh; width:100%;">
                         <div style="position: absolute;
                            width: calc(100% - 60px);
                            height: calc(100% - 64px);
                            top: 55px;
                            right: 0;
                            background: #d4dcd5;
                            z-index: -1;
                            border: 15px solid #90a792;
                            transform: rotate(6deg);
                            box-shadow: 0px 5px 10px #90a792;"></div>
                         <h3 style="font-size: 18px; font-family: 'Ivy Mode'; font-style: normal;font-weight: bold;margin-top: 30px; color: #000; margin-bottom: 10px;">Timeline1</h3>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;">Timeline1 </p>
                         <p style="font-size: 1em; font-style: italic; line-height: 1.5em;width: 250px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                         <a href="#" style="display:inline-block;text-decoration: none;font-size: 15px;padding: 20px 35px; color:#ffffff; background-color:#90a792; font-family:Georgia,serif;border-radius: 10px;font-weight: 100;text-transform: uppercase;">Read More</a>
                     </div>
                </td> -->
      </table>
      <div style="width: 83%; margin: 0 auto; padding-top: 50px;">  <p>If you do no longer wish to receive updates form us, you can simply <a href="<?php echo site_url('delete_subscription/'.$subscriber_id) ?>" target="_blank" style="display:inline-block; color:#000; text-decoration: underline;">unsubscribe here </a>  </p>
      <p>Thank you,</p>
   </div>
   </body>
</html>