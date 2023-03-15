<?php
$lifeof_static_count_new = 0;
if(isset($middelsection['lifeof_post']) && $middelsection['lifeof_post']!=''){

   $error_msg = lang('lifeof_data_notfound');
   foreach($middelsection['lifeof_post'] as $lk => $val){

      $img_col_name = 'lifeof_'.($lk+1);
      if((checkauth() && $val->user_id==get_frontauthuser('user_id')) ||  (check_post_pubicprivate($val->id,'life_of'))){
         if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){
         // $error_msg = '';
            $lifeof_static_count_new++;
            ?>
         <div class="col-12 col-sm-6 col-md-4 mt-3  position-relative">

            <div class="tile-parent" ontouchstart="this.classList.toggle('hover');">
               <div class="front-face">
                  <div class="front <?php echo str_replace(' ','-',$val->type)?>)-imgbg"
                       style="background-image: url(<?php echo UploadStorage::url( $val->images, site_url('assets/frontend/uploads/' . get_defaultimage()->$img_col_name) ) ?>)">
                     <div class="inner">
                        <p><?php echo $val->type ?></p>
                     </div>
                  </div>
                  <div class="back">
                     <div class="inner">
                        <h3 class="d-flex justify-content-between">
                           <?php echo $val->type ?>
                           <span>
                              <!-- <a href="#" class="life-menu"><img src="<?php echo site_url('assets/frontend/') ?>images/dot-menu.png"></a> -->
                              <?php if(checkauth() && $val->user_id==get_frontauthuser('user_id')){
                              if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                                 if(in_array(get_frontprofileid(), explode(',', warden_groupprofilepermission()))){ ?>
                              <a title="Edit" href="javascript:;" onclick="editlife_post(this,'<?php echo $val->type ?>','<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>menu-dots-white.png" style="width:20px;" class="edit-svgicon" alt="edit"/></a>
                              <?php }
                              }else{ ?>
                              <a title="Edit" href="javascript:;" onclick="editlife_post(this,'<?php echo $val->type ?>','<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>menu-dots-white.png" style="width:20px; " class="edit-svgicon" alt="edit"/></a>
                              <?php } } ?>
                           </span>
                        </h3>
                        <p class="early-life-desc"><?php echo limitedwords($val->description) ?></p>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#life-modal" onclick="showreadmorepopup('<?php echo $val->id ?>','life-modal','edit-lifeof','life_of','<?php echo get_frontauthuser('user_id') ?>')"><span><img src="<?php echo site_url('assets/frontend/') ?>images/arrow-right.png"></span></a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="flower-design flow-4-ds">
               <img src="<?php echo site_url('assets/frontend/') ?>images/bg-4.png">
            </div>
         </div>
<?php    }
      }
   }
   // echo $lifeof_static_count_new;
   // echo count($middelsection['lifeof_post']);
   // if(count($middelsection['lifeof_post'])==0){
      //echo 'adminwarden';
      if(get_frontauthuser('user_id') == get_userprofile(get_frontprofileid())->user_id){

         if(isset($middelsection['lifeof_post']) && $middelsection['lifeof_post']!=''){
            $lifeof_static_count = count($middelsection['lifeof_post']);
         }else{
            $lifeof_static_count = 0;
         }
         //   echo $lifeof_static_count;
         if($lifeof_static_count<=3){
            for($l=$lifeof_static_count;$l<3;$l++){
               $lifeof_static_count_new++;
               // $error_msg = '';
               // echo $l;
               $img_col_name = 'lifeof_'.($l+1);
            ?>
               <div class="col-12 col-sm-6 col-md-4 mt-3  position-relative">

                  <div class="tile-parent" ontouchstart="this.classList.toggle('hover');">
                     <div class="front-face">
                        <div class="front <?php echo str_replace(' ','-',strtolower(life_oftype()[$l])) ?>-imgbg" style="background-image: url(<?php echo site_url('assets/frontend/uploads/').get_defaultimage()->$img_col_name ?>)">
                           <div class="inner">
                              <p style="display: flex;"><?php echo 'Add Details';//life_oftype()[$l] ?><span style="margin-left: 5px;background: #fff;border-radius: 50%;padding: 4px 4px;justify-content: center;height: 30px !important;align-items: center;box-sizing: border-box !important;display: flex;flex-direction: row;width: 30px;"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/arrow-right.png"></span></p>
                           </div>
                        </div>
                        <div class="back">
                           <div class="inner">
                              <h3 class="d-flex justify-content-between"><?php echo life_oftype()[$l] ?> <span>
                                 <?php /*if(checkauth()){
                                 if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                                 if(in_array(get_frontprofileid(), explode(',', warden_groupprofilepermission()))){ ?>
                                 <!-- <a href="javascript:;" onclick="editlife_post(this,'<?php echo life_oftype()[$l] ?>','')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>menu-dots-white.png" style="width:20px;" class="edit-svgicon" alt="edit"/></a> -->
                                 <?php }
                              }else{ ?>
                                 <a href="javascript:;" onclick="editlife_post(this,'<?php echo life_oftype()[$l] ?>','')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>menu-dots-white.png" style="width:20px;" class="edit-svgicon" alt="edit"/></a>
                              <?php } }*/ ?></span>
                              </h3>
                              <p></p>
                              <a href="javascript:void(0)" class="lifeof-adddetail" style="display: inline-flex;" onclick="editlife_post(this,'<?php echo life_oftype()[$l] ?>','')">Add Details <span style="height: 30px;margin-left: 5px;"><img src="<?php echo site_url('assets/frontend/') ?>images/arrow-right.png"></span></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="flower-design flow-4-ds">
                     <img src="<?php echo site_url('assets/frontend/') ?>images/bg-4.png">
                  </div>
               </div>
         <?php }
         }
      }else{
         echo ($lifeof_static_count_new>0) ? '' : "<h2  class='no_record norecord-message' style='margin-top:32px;'>".lang('no_record_found')."</h2>";
         // echo $error_msg;
      }
   // }else{
      // echo $error_msg;
   // }
}else{
   echo '<h2 class="no_record norecord-message" style="margin-top:32px;">'.lang('no_record_found').'</h2>';
} ?>
