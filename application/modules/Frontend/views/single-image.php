<?php if(isset($singleimage) && !empty($singleimage)){
   foreach($singleimage as $k => $image_val){
    $image_exp = explode('.',$image_val->image);
    $image_exp_arr = explode('.',$image_val->image);
   if((checkauth() && $image_val->user_id==get_frontauthuser('user_id')) ||  (check_post_pubicprivate($image_val->id,'media_images','media_ispublic'))){ ?>
<div class="col-6 col-md-3">
   <div style="font-size: 14px;color: #90A792 !important;">
      <?php
      if(checkauth() && $image_val->user_id==get_frontauthuser('user_id')){
         if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature') && $image_val->user_id==get_frontauthuser('user_id')){
             ?>
      <lable class="hide">
         <?php
         if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            if(in_array($image_val->profile_id, explode(',', warden_groupprofilepermission()))){ ?>
         <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
         <?php echo lang('set_coverphoto');
            }
               }else{ ?>
                  <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
               <?php echo lang('set_coverphoto');
            }
         }
         if(checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){
         if(count($singleimage)>1){ ?>
          <p>
      <a href='javascript:void(0)' onclick="deletemedia_imagepost(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"><img src="<?php echo base_url('assets/frontend/images/') ?>/delete-icon.svg" style="width:20px;"> Delete</a></p>
      <?php } } } ?>
      </lable>
      <?php if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
            if(in_array($image_val->profile_id, explode(',', warden_groupprofilepermission()))){ ?>
              <!-- drowpdown start -->
              <div class="dropdown float-end media-image" style="z-index: 999;cursor: pointer;">
                <img src="<?php echo base_url('/') ?>assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                <ul class="dropdown-menu memory-dropdown" style="z-index:999 !important;left:auto !important;right: 0 !important;">
                  <?php
                  if(checkauth() && $image_val->user_id==get_frontauthuser('user_id')){
                    if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature') && $image_val->user_id==get_frontauthuser('user_id')){
                      if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                        if(in_array($image_val->profile_id, explode(',', warden_groupprofilepermission()))){ ?>
                        <li>
                          <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
                          <?php echo lang('set_coverphoto');
                          echo '</li>';
                        }
                      }else{ ?>
                          <li>
                            <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
                               <?php echo lang('set_coverphoto');
                          echo '</li>';
                      }
                    }
                  }
                  
                  if((checkauth() && get_frontauthuser('warden_user_id')>0 && get_frontauthuser('user_id')==$image_val->user_id) || (get_frontauthuser('user_id')==$image_val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature'))){ ?>
                    
                    <li>
                      <div class="col-12">
                        <div class="d-flex form-radio">
                           <div class="form-check me-2">
                               <label class="form-check-label" for="flexRadioeditmedia5<?php echo $image_val->id ?>">
                                   <?php echo lang('public') ?>
                               </label>
                               <input class="form-check-input" value="1" type="radio" name="is_public"
                                   id="flexRadioeditmedia5<?php echo $image_val->id ?>" <?php echo ($image_val->media_ispublic==1) ? 'checked="checked" style="background-color:#90a792;"' : '' ?>  onclick="savepublicprivate('media_images','<?php echo $image_val->id ?>','1')">
                           </div>
                           <div class="form-check">
                               <label class="form-check-label" for="flexRadioeditmedia6<?php echo $image_val->id ?>">
                                   <?php echo lang('private') ?>
                               </label>
                               <input class="form-check-input" value="2" type="radio" name="is_public"
                                   id="flexRadioeditmedia6<?php echo $image_val->id ?>" <?php echo ($image_val->media_ispublic==2) ? 'checked="checked" style="background-color:#90a792;"' : '' ?> onclick="savepublicprivate('media_images','<?php echo $image_val->id ?>','2')">
                           </div>
                        </div>
                      </div>
                    </li>
                    <?php 
                    }
                    if((checkauth() && get_frontauthuser('warden_user_id')>0 && get_frontauthuser('user_id')==$image_val->user_id) || (get_frontauthuser('user_id')==$image_val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','edit'))){ ?>
                    <li>
                      <a href='javascript:void(0)' class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;" onclick="edit_mediaimagepost(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')">Edit Post</a>
                    </li>
                  <?php }
                  if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                    if(checkauth() && $image_val->user_id==get_frontauthuser('user_id')){
                    if(checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){
                        if(count($singleimage)>1){ ?>
                          <li>
                            <a href='javascript:void(0)' class="cursor-pointer text-danger" style="z-index:1; " onclick="deletemedia_imagepost(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')">Delete Post</a>
                          </li>
                        <?php 
                        }
                      }
                    }
                  } ?>
                </ul>
              </div>
              <!-- drowpdown start end -->
            <!-- <a href="javascript:;" style="float: right;" onclick="edit_popup(this)"><img src="<?php echo site_url() ?>/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a> -->
            <?php }
         }else{ ?>
              <!-- drowpdown start -->
              <?php if(checkauth()){ ?>
              <div class="dropdown float-end media-image" style="z-index: 999;cursor: pointer;">
                <img src="<?php echo base_url('/') ?>assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                <ul class="dropdown-menu memory-dropdown" style="z-index:999 !important;left:auto !important;right: 0 !important; width:8rem !important;"> 
                  <?php
                    if(checkauth() && $image_val->user_id==get_frontauthuser('user_id')){
                      if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature') && $image_val->user_id==get_frontauthuser('user_id')){
                        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                          if(in_array($image_val->profile_id, explode(',', warden_groupprofilepermission()))){ 
                            if(!in_array($image_exp_arr[count($image_exp_arr)-1],array('mp4',"mov",'MOV','mp3'))){
                            ?>
                          <li>
                            <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
                            <?php echo lang('set_coverphoto');
                            echo '</li>';
                            }
                          }
                        }else{ 
                          
                            if(!in_array($image_exp_arr[count($image_exp_arr)-1],array('mp4',"mov",'MOV','mp3'))){ ?>
                            <li>
                              <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
                                 <?php echo lang('set_coverphoto');
                            echo '</li>';
                          }
                        }
                      }
                      
                    } ?>
                  <?php 
                  if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$image_val->user_id) || (get_frontauthuser('user_id')==$image_val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature'))){ ?>
                    
                    <li>
                      <div class="col-12">
                        <div class="d-flex form-radio">
                           <div class="form-check me-2">
                               <label class="form-check-label" for="flexRadioeditmedia5<?php echo $image_val->id ?>">
                                   <?php echo lang('public') ?>
                               </label>
                               <input class="form-check-input" value="1" type="radio" name="is_public"
                                   id="flexRadioeditmedia5<?php echo $image_val->id ?>" <?php echo ($image_val->media_ispublic==1) ? 'checked="checked" style="background-color:#90a792;"' : '' ?>  onclick="savepublicprivate('media_images','<?php echo $image_val->id ?>','1')">
                           </div>
                           <div class="form-check">
                               <label class="form-check-label" for="flexRadioeditmedia6<?php echo $image_val->id ?>">
                                   <?php echo lang('private') ?>
                               </label>
                               <input class="form-check-input" value="2" type="radio" name="is_public"
                                   id="flexRadioeditmedia6<?php echo $image_val->id ?>" <?php echo ($image_val->media_ispublic==2) ? 'checked="checked" style="background-color:#90a792;"' : '' ?> onclick="savepublicprivate('media_images','<?php echo $image_val->id ?>','2')">
                           </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <a href='javascript:void(0)' class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;" onclick="edit_mediaimagepost(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')">Edit Post</a>
                    </li>
                    <?php 
                    if(checkauth() && $image_val->user_id==get_frontauthuser('user_id')){
                    if(checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){
                        if(count($singleimage)>1){ ?>
                          <li>
                            <a href='javascript:void(0)' class="cursor-pointer text-danger" style="z-index:1; " onclick="deletemedia_imagepost(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')">Delete Post</a>
                          </li>
                        <?php 
                        }
                      }
                    }
                    
                    // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
                  }
                  ?>
                </ul>
              </div>
            <?php } ?>
              <!-- drowpdown start end -->
            <!-- <a href="javascript:;" style="float: right;" onclick="edit_popup(this)"><img src="<?php echo site_url() ?>/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a> -->
         <?php } ?>
          <!-- edit timeline post -->
          <div class="hide class-editmediapost<?php echo $image_val->id ?>">
             <input type="hidden" name="profile_id" value="<?php echo $image_val->profile_id ?>">
             <input type="hidden" name="mediapost_id" value="<?php echo $image_val->id ?>">
             <div class="row">
                
                <div class="row">
                  <div class="col-md-6" style="margin-top: 14px;"> Title</div>
                    <div class="col-md-6">
                        <input type="text" name="title" placeholder="<?php echo lang('title') ?>" class="form-control required" value="<?php echo $image_val->title ?>" id="exampleInputEmail153" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <textarea class="form-control required" name="media_caption"
                            placeholder="<?php echo lang('blog_detail') ?>"
                            id="exampleFormControlTextarea136" rows="3"><?php echo (isset($image_val->media_caption)) ?$image_val->media_caption : '' ?></textarea>
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
         <?php
         if(checkauth() && $image_val->user_id==get_frontauthuser('user_id')){
            if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature') && $image_val->user_id==get_frontauthuser('user_id')){
                ?>
         <lable class="asdasss">
            <?php
            if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
               if(in_array($image_val->profile_id, explode(',', warden_groupprofilepermission()))){ ?>
               <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
               <?php echo lang('set_coverphoto');
                  }
               }else{ ?>
                  <input type="radio" class="form-check-input"  name="set_coverphoto" value="1" <?php echo ($image_val->set_coverphoto==1) ? 'checked="checked"' : ((count($singleimage)==1) ? 'checked="checked"' : '') ?> onclick="setcoverphoto_post(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"/>
                     <?php echo lang('set_coverphoto');
               }
            }
            if(checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){
            if(count($singleimage)>1){ ?>
            
         <a href='javascript:void(0)' class="float-end" onclick="deletemedia_imagepost(this,'<?php echo $image_val->id ?>','<?php echo $image_val->album_id ?>')"><img src="<?php echo base_url('assets/frontend/images/') ?>/delete-icon.svg" style="width:20px;"></a>
         <?php } } }
         if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$image_val->user_id) || (get_frontauthuser('user_id')==$image_val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
               ?>
               <div class="col-12">
                   <div class="d-flex mb-3 form-radio">
                       <div class="form-check me-2">
                           <label class="form-check-label" for="flexRadiomedia5">
                               <?php echo lang('public') ?>
                           </label>
                           <input class="form-check-input" value="1" type="radio" name="is_public"
                               id="flexRadiomedia5" <?php echo ($image_val->media_ispublic==1) ? 'checked="checked" style="background-color:#90a792;"' : '' ?>  onclick="savepublicprivate('media_images','<?php echo $image_val->id ?>','1')">
                       </div>
                       <div class="form-check">
                           <label class="form-check-label" for="flexRadiomedia6">
                               <?php echo lang('private') ?>
                           </label>
                           <input class="form-check-input" value="2" type="radio" name="is_public"
                               id="flexRadiomedia6" <?php echo ($image_val->media_ispublic==2) ? 'checked="checked" style="background-color:#90a792;"' : '' ?> onclick="savepublicprivate('media_images','<?php echo $image_val->id ?>','2')">
                       </div>
                   </div>
               </div>
           <?php
           // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
           } ?>
         </div>
   </div>
   <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $image_val->album_id ?>">
      Launch static backdrop modal
   </button>-->
   <!-- data-bs-target="#life-modal" data-bs-dismiss="modal" -->
   <div data-bs-toggle="modal" onclick="mediapost_popup(this,'<?php echo $image_val->id ?>','media_post','<?php echo $k ?>')" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $image_val->album_id ?>">
    
   <!-- <div data-bs-toggle="modal" onclick="mediapost_popup(this,'<?php echo $image_val->id ?>','media_post')" data-bs-target="#life-modal" data-bs-dismiss="modal" > -->
      <div class="img-cover-life">

          <?php $image_exp = explode('.',$image_val->image);
         // echo $image_exp[count($image_exp)-1];

         if(in_array($image_exp[count($image_exp)-1],array('mp4',"mov",'MOV'))){ ?>
            <span class="media-playbtn"><i class="fa-solid fa-play"></i></span>
            <video src="<?php echo UploadStorage::url( $image_val->image, base_url('assets/frontend/uploads/') . get_defaultimage()->profile_img)?>" class="w-100" style="height:200px;">
               Your browser does not support the element.
            </video>

<!-- <img src="<?php //echo ($image_val->image!='') ? base_url('assets/frontend/uploads/').$image_val->image : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" onerror="this.onerror=null; this.src='<?php //echo base_url('assets/frontend/uploads/').get_defaultimage()->media ?>'" class="w-100"/> -->
         <?php }elseif(in_array($image_exp[count($image_exp)-1],array('mp3'))){ ?>
            <audio controls class="w-100" style="height:200px;">
              <source src="<?php echo UploadStorage::url( $image_val->image, base_url('assets/frontend/uploads/') . get_defaultimage()->profile_img ) ?>" type="audio/mpeg">
            Your browser does not support the audio element.
            </audio>
         <?php }else{ ?>
         <img src="<?php echo UploadStorage::url( $image_val->image, base_url('assets/frontend/uploads/') . get_defaultimage()->media ) ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->media ?>'" class="w-100"/>
         <?php } ?>
         <!-- <img src="<?php //echo ($image_val->image); ?>" class="w-100"> -->
         <p><?php echo $image_val->title ?></p>
         <p>Created by: <b><?php echo user_detail($image_val->user_id)->firstname.' '.user_detail($image_val->user_id)->lastname ?></b></p>
         <p>Date: <b><?php echo date_dmyformate($image_val->created_at) ?></b></p>
      </div>
   </div>
</div>
<?php } }
   } ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('.media-image .dropdown-toggle').click(function(){
      $(this).parent().find('ul').css('width','8rem !important');
    })
  })
</script>