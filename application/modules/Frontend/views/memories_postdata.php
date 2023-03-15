<?php
$no_datafound = lang('lifeof_data_notfound');
$no_datafound_status = lang('lifeof_data_notfound');
if(isset($middelsection['memories_post']) && !empty($middelsection['memories_post'])){
   // print_r($middelsection['memories_post']);
   $no_datafound = '';
   foreach($middelsection['memories_post'] as $mk => $val){
    //if((checkauth() && $val->user_id==get_frontauthuser('user_id')) ||  (check_post_pubicprivate($val->id,'journal_post'))){
    //echo $val->user_id.'=='.get_frontauthuser('user_id');
      if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1 && (check_post_pubicprivate($val->id,'memories','memory_ispublic'))){
         $no_datafound_status = '';
         $imagepath  = $imagename = ($val->memoryimage!='') ? $val->memoryimage : get_defaultimage()->memory;
         $imagetype = explode('.',$val->memoryimage);
         if(end($imagetype)=='mp4'){
            $imagepath = get_defaultimage()->mp4_image;
         }elseif(end($imagetype)=='mp3'){
            $imagepath = get_defaultimage()->mp3_image;
         }
         
         //echo str_replace(' ','-',$val->id))-imgbg
       ?>
<div class="col-6 col-sm-6 col-md-3 mt-3 position-relative">
   <div class="tile-parent" ontouchstart="this.classList.toggle('hover');">
      <div class="front-face">
         <div class="front"
          style="background-image: url(<?php echo UploadStorage::url( $imagename) ?>)">
            <div class="inner">
               <p><?php echo ($val->title!='') ? $val->title : '' ?></p>
            </div>
         </div>
         <div class="back">
            <div class="inner">

               <?php
               
                //echo get_userprofile(get_frontprofileid())->user_id.'=='.get_frontauthuser('user_id');

               /*echo $val->user_id.'.';
               echo get_frontauthuser('user_id').'..';
               echo get_frontprofileid();*/
               // || (checkauth() && $val->profile_id== get_frontprofileid())
               // if(checkauth() && ($val->user_id==get_frontauthuser('user_id') || checkauth() && get_frontauthuser('user_id')==get_userprofile($val->profile_id)->user_id)){
               if((checkauth() && $val->user_id==get_frontauthuser('user_id') && get_userprofile(get_frontprofileid())->user_id==get_frontauthuser('user_id')) || (checkauth() && $val->profile_id==get_frontprofileid())){
               // if(checkauth() && ($val->user_id==get_frontauthuser('user_id') || $val->profile_id== get_frontprofileid()) && get_userprofile(get_frontprofileid())->user_id==get_frontauthuser('user_id')){ 
                //echo 'checkauth'; ?>
                  <div>
                  <?php //if(checkauth() && ($val->user_id==get_frontauthuser('user_id'))  $val->profile_id== get_frontprofileid()){
                  if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                     if(in_array($val->profile_id, explode(',', warden_groupprofilepermission()))){
                     ?>
                     <!-- dropdown code -->
                     <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                        <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-white.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                        <ul class="dropdown-menu memory-dropdown" style="z-index:999 !important;left:auto;right: 0;">
                           <?php
                           if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','make_feature'))){
                              echo '<li>';
                              if($val->feature_post==1){ ?>
                                 <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','memories',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
                           <?php }else{ ?>
                              <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','memories',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                           <?php } 
                           echo '<li>';
                           } ?>
                           <li>
                              <?php if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','delete'))){ ?>
                              <a href="javascript:;" onclick="edit_timlinepost(this,'<?php echo $val->id ?>')" class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none; "><?php echo 'Edit Post'; ?></a>
                              <?php } ?>
                           </li>
                           <li class="d-inline-flex">
                              <div class="form-check me-3">
                                 <label class="form-check-label" for="flexRadioeditmedia5<?php echo $val->id ?>">
                                     <?php echo lang('public') ?>
                                 </label>
                                 <input class="form-check-input" value="1" type="radio" name="is_public"
                                     id="flexRadioeditmedia5<?php echo $val->id ?>" <?php echo ($val->memory_ispublic==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('memories','<?php echo $val->id ?>','1')" <?php echo ($val->memory_ispublic==1) ? 'style="background:#90a792"' : '' ?>>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label" for="flexRadioeditmedia6<?php echo $val->id ?>">
                                  <?php echo lang('private') ?>
                                 </label>
                                 <input class="form-check-input" value="2" type="radio" name="is_public"
                                  id="flexRadioeditmedia6<?php echo $val->id ?>" <?php echo ($val->memory_ispublic==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('memories','<?php echo $val->id ?>','2')"<?php echo ($val->memory_ispublic==2) ? 'style="background:#90a792"' : '' ?>>
                              </div>
                           </li>
                           <?php
                           if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','delete'))){ ?>
                              <li><a href="javascript:;" onclick="deletemomory_post(this,'<?php echo $val->id ?>')" class="cursor-pointer text-danger" style="z-index:1;"><?php echo 'Delete Post'; ?></a></li>
                           <?php } ?>
                        </ul>
                     </div>
                     <!-- dropdown code end -->
                  <!-- <a href="javascript:;" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-white.png" style="width:20px;" class="edit-svgicon" alt="edit"></a> -->
               <?php }
                  }else{ 
                    // echo $val->user_id.get_frontauthuser('user_id');
                    // print_r(get_userprofile_ids());
                    if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id) || in_array($val->profile_id, get_userprofile_ids())) )
                    { ?>
                     <!-- dropdown code -->
                     <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                        <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-white.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                        <ul class="dropdown-menu memory-dropdown" style="z-index:999 !important;">
                           <?php
                           //echo get_frontauthuser('warden_user_id');
                           if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id && in_array($val->profile_id, get_userprofile_ids())) || (in_array($val->profile_id, get_userprofile_ids()) && checkauth() && get_frontauthuser('warden_user_id')==0 && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','make_feature'))){
                              echo '<li>';
                              if($val->feature_post==1){ ?>
                                 <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','memories',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
                           <?php }else{ ?>
                              <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','memories',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                           <?php } 
                           echo '</li>';
                            ?>
                           <li class="d-inline-flex">
                              <div class="form-check me-3">
                                 <label class="form-check-label" for="flexRadioeditmedia5<?php echo $val->id ?>">
                                     <?php echo lang('public') ?>
                                 </label>
                                 <input class="form-check-input" value="1" type="radio" name="is_public"
                                     id="flexRadioeditmedia5<?php echo $val->id ?>" <?php echo ($val->memory_ispublic==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('memories','<?php echo $val->id ?>','1')" <?php echo ($val->memory_ispublic==1) ? 'style="background:#90a792"' : '' ?>>
                              </div>
                              <div class="form-check">
                                 <label class="form-check-label" for="flexRadioeditmedia6<?php echo $val->id ?>">
                                  <?php echo lang('private') ?>
                                 </label>
                                 <input class="form-check-input" value="2" type="radio" name="is_public"
                                  id="flexRadioeditmedia6<?php echo $val->id ?>" <?php echo ($val->memory_ispublic==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('memories','<?php echo $val->id ?>','2')"<?php echo ($val->memory_ispublic==2) ? 'style="background:#90a792"' : '' ?>>
                              </div>
                           </li>
                         <?php } ?>
                           <li>
                              <?php if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','delete'))){ ?>
                              <a href="javascript:;" onclick="edit_memorypost(this,'<?php echo $val->id ?>')" class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none; "><?php echo 'Edit Post'; ?></a>
                              <?php } ?>
                           </li>
                           <?php
                           if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','delete'))){ ?>
                              <li><a href="javascript:;" onclick="deletemomory_post(this,'<?php echo $val->id ?>')" class="cursor-pointer text-danger" style="z-index:1;"><?php echo 'Delete Post'; ?></a></li>
                           <?php } ?>
                           
                        </ul>
                     </div>
                     <!-- dropdown code end -->
                     <!-- <a href="javascript:;" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-white.png" style="width:20px;" class="edit-svgicon" alt="edit"></a> -->
                  <?php } }
                   ?>
                  <!-- edit timeline post -->
                  <div class="hide class-editmemorypost<?php echo $val->id ?>">
                     <input type="hidden" name="profile_id" value="<?php echo $val->profile_id ?>">
                     <input type="hidden" name="memorypost_id" value="<?php echo $val->id ?>">

                     <div class="row">
                        <div class="row">
                           <div class="col-md-6" style="margin-top: 14px;"> Title</div>
                           <div class="col-md-6">
                               <input type="text" placeholder="<?php echo lang('title') ?>" class="form-control required" id="exampleInputEmail1title<?php echo $val->id ?>" aria-describedby="emailHelp" value="<?php echo $val->title ?>" name="title" maxlength="30" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6" style="margin-top: 14px;">Name</div>
                           <div class="col-md-6">
                              <input type="text" placeholder="<?php echo lang('name') ?>" class="form-control <?php echo (!checkauth()) ? 'required' : '' ?>" id="exampleInputEmail1name" aria-describedby="emailHelp" value="<?php echo (checkauth() && $val->name!='') ? $val->name : get_frontauthuser('user_name') ?>" <?php echo (checkauth()) ? 'readonly' : '' ?> name="name">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-md-6" style="margin-top: 14px;">Email</div>
                           <div class="col-md-6">
                              <input type="email" placeholder="<?php echo lang('email') ?>" class="form-control <?php echo (!checkauth()) ? 'required' : '' ?>" name="email" id="exampleInputPassword128" value="<?php echo (checkauth() && $val->email!='') ? $val->email :  get_frontauthuser('user_email') ?>" <?php echo (checkauth()) ? 'readonly' : '' ?>>
                           </div>
                        </div>
                        <div class="row">
                           <div class="input-group mb-3">
                              <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control" style="padding-top:10px;">
                            </div>
                        </div>
                        <div class="col-12">
                           <img src="<?php echo UploadStorage::url( $val->memoryimage, site_url('assets/frontend/uploads/' . get_defaultimage()->memory) ) ?>" width="70" alt="<?php echo $val->title ?>" onerror="this.onerror=null; this.src='<?php echo site_url('assets/frontend/uploads/' . get_defaultimage()->memory) ?>'"/>
                        </div>

                        <div class="row">
                           <div class="col-12">
                              <div class="mb-3">
                               <textarea class="form-control required" name="comment" placeholder="<?php echo lang('textarea_comment') ?>" id="exampleFormControlTextarea133" rows="3" maxlength="45" required><?php echo $val->comment ?></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="mb-3 d-flex">
                               <button type="submit" name="submit" value="save"
                                   class="btn btn-submit-request dark-btn">
                                   <?php echo lang('update') ?>
                               </button>
                           </div>
                       </div>
                     </div>
                  </div>
                  <!-- edit timeline post end -->
                  <div class="hide clone-editpopup">
                  <span>
                  <?php

                  if(checkauth() && ($val->user_id==get_frontauthuser('user_id') || $val->profile_id== get_frontprofileid()) && get_userprofile(get_frontprofileid())->user_id==get_frontauthuser('user_id')){

                  if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','delete'))){

                     //if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','delete') && $val->user_id==get_frontauthuser('user_id')){ ?>
                  <a href="javascript:;" onclick="deletemomory_post(this,'<?php echo $val->id ?>')" class="float-end cursor-pointer btn btn-close-white" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon1.svg" style="width:25px;" class="delete-svgicon" alt="delete"/></a>
                  <?php } ?>
                  </span>
                  <?php
                  if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id== get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','make_feature'))){

                     //if(checkwarden_permission(get_frontauthuser('warden_user_id'),'memory_post','make_feature')){
                     if($val->feature_post==1){ ?>
                  <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','memories',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
                  <?php }else{ ?>
                  <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','memories',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                  <?php } } } ?>
               </div>
               </div>
               <?php } ?>
               <h3 class="d-flex justify-content-between"><?php echo ($val->title!='') ? $val->title : '' ?>
               </h3>
               <p class="early-life-desc show-desktop"><?php echo limitedwordsformemory($val->comment) ?></p>
               <p class="early-life-desc show-ipad"><?php echo limitedwordsformemoryipad($val->comment) ?></p>
               <p class="early-life-desc show-mobile"><?php echo limitedwordsformemorymobile($val->comment) ?></p>
               <a href="javascript:void(0)" onclick="showreadmorepopup('<?php echo $val->id ?>','life-modal','editmemorypost','memory_post')" data-bs-toggle="modal" data-bs-target="#life-modal"><span><img src="<?php echo site_url('assets/frontend/') ?>images/arrow-right.png"></span></a>
            </div>
         </div>
      </div>
   </div>
   <div class="flower-design flow-1-ds">
      <img src="<?php echo site_url('assets/frontend/') ?>images/bg-1.png">
   </div>
</div>
<?php
         }
      }
   }
   if($no_datafound!='' || $no_datafound_status!=''){
      echo '<h2 class="no_record btn-norecord-message" style="margin-top:32px;">'.lang('no_record_found').'</h2>';
   } ?>
