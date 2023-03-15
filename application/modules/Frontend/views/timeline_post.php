<?php
$no_datafound = lang('lifeof_data_notfound');
$no_datafound_status = lang('lifeof_data_notfound');
if(isset($middelsection['timeline_post']) && count($middelsection['timeline_post'])>0){
   $no_datafound = '';
   echo '<ul class="timeline mt-5" id="timeline">';

   foreach($middelsection['timeline_post'] as $tline_k => $timeline_val){
      if((checkauth() && $timeline_val->user_id==get_frontauthuser('user_id')) || $timeline_val->status==1 && (check_post_pubicprivate($timeline_val->id,'timeline','timeline_ispublic'))){
       $no_datafound_status = '';

   ?>
<li>
   <div class="<?php echo ($tline_k%2==0) ? 'direction-l' : 'direction-r' ?> ">
      <div class="flag-wrapper">
         <span class="flag"><?php echo ($timeline_val->title_for_date!='') ? $timeline_val->title_for_date : '' ?> (<?php echo ($timeline_val->from_date!='0000-00-00') ? date('Y',strtotime($timeline_val->from_date)) : '1934' ;
            echo ($timeline_val->to_date!='0000-00-00') ? '-'.date('Y',strtotime($timeline_val->to_date)) : '' ;
            ?>)</span>
      </div>
      <div class="desc time-1">
         <div class="desc-content">
            <?php
            if(checkauth() && $timeline_val->user_id==get_frontauthuser('user_id')){ ?>
            <div style="font-size: 14px;">
               <?php if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                  if(in_array($timeline_val->profile_id, explode(',', warden_groupprofilepermission()))){ ?>
                  <!-- dropdown code -->
                  <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                     <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                     <ul class="dropdown-menu" style="z-index:999 !important;">
                        
                        <li>
                           <?php if(checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','make_feature')){ if($timeline_val->feature_post==1){ ?>
                           <input type="checkbox" onclick="setfeature_post(this,'<?php echo $timeline_val->id ?>','timeline',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
                           <?php }else{ ?>
                           <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $timeline_val->id ?>','timeline',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                           <?php } } ?>
                        </li>
                        <!-- public and private -->
                        <li class="d-inline-flex">
                            <div class="form-check me-3">
                               <label class="form-check-label" for="flexRadioeditmedia5<?php echo $timeline_val->id ?>">
                                   <?php echo lang('public') ?>
                               </label>
                               <input class="form-check-input" value="1" type="radio" name="is_public"
                                   id="flexRadioeditmedia5<?php echo $timeline_val->id ?>" <?php echo ($timeline_val->timeline_ispublic==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('timeline','<?php echo $timeline_val->id ?>','1')" <?php echo ($timeline_val->timeline_ispublic==1) ? 'style="background:#90a792"' : '' ?>>
                            </div>
                            <div class="form-check">
                               <label class="form-check-label" for="flexRadioeditmedia6<?php echo $timeline_val->id ?>">
                                <?php echo lang('private') ?>
                               </label>
                               <input class="form-check-input" value="2" type="radio" name="is_public"
                                id="flexRadioeditmedia6<?php echo $timeline_val->id ?>" <?php echo ($timeline_val->timeline_ispublic==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('timeline','<?php echo $timeline_val->id ?>','2')"<?php echo ($timeline_val->timeline_ispublic==2) ? 'style="background:#90a792"' : '' ?>>
                            </div>
                         </li>
                         <!-- public and private end -->
                        <li>
                           <?php if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','edit') && $timeline_val->user_id==get_frontauthuser('user_id')){ ?>
                           <a href="javascript:;" onclick="edit_timlinepost(this,'<?php echo $timeline_val->id ?>')" class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none; "><?php echo 'Edit Post'; ?></a>
                           <?php } ?>
                        </li>
                        <li>
                           <?php if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','delete') && $timeline_val->user_id==get_frontauthuser('user_id')){ ?>
                           <a href="javascript:;" onclick="deletetimeline_post(this,'<?php echo $timeline_val->id ?>')" class="cursor-pointer text-danger" style="z-index:1; "><?php echo 'Delete Post'; ?></a>
                           <?php } ?>
                        </li>
                     </ul>
                  </div>
                  <!-- dropdown code end -->
                  <!-- <a href="javascript:;" class="float-end" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a> -->
                  <?php }
               }else{ ?>
                  <!-- dropdown code -->
                  <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                     <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                     <ul class="dropdown-menu" style="z-index:999 !important;">
                        
                        <li>
                           <?php if(checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','make_feature')){ if($timeline_val->feature_post==1){ ?>
                           <input type="checkbox" onclick="setfeature_post(this,'<?php echo $timeline_val->id ?>','timeline',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
                           <?php }else{ ?>
                           <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $timeline_val->id ?>','timeline',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                           <?php } } ?>
                        </li>
                        <li class="d-inline-flex">
                            <div class="form-check me-3">
                               <label class="form-check-label" for="flexRadioeditmedia5<?php echo $timeline_val->id ?>">
                                   <?php echo lang('public') ?>
                               </label>
                               <input class="form-check-input" value="1" type="radio" name="is_public"
                                   id="flexRadioeditmedia5<?php echo $timeline_val->id ?>" <?php echo ($timeline_val->timeline_ispublic==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('timeline','<?php echo $timeline_val->id ?>','1')" <?php echo ($timeline_val->timeline_ispublic==1) ? 'style="background:#90a792"' : '' ?>>
                            </div>
                            <div class="form-check">
                               <label class="form-check-label" for="flexRadioeditmedia6<?php echo $timeline_val->id ?>">
                                <?php echo lang('private') ?>
                               </label>
                               <input class="form-check-input" value="2" type="radio" name="is_public"
                                id="flexRadioeditmedia6<?php echo $timeline_val->id ?>" <?php echo ($timeline_val->timeline_ispublic==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('timeline','<?php echo $timeline_val->id ?>','2')"<?php echo ($timeline_val->timeline_ispublic==2) ? 'style="background:#90a792"' : '' ?>>
                            </div>
                         </li>
                        <li>
                           <?php if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','edit') && $timeline_val->user_id==get_frontauthuser('user_id')){ ?>
                           <a href="javascript:;" onclick="edit_timlinepost(this,'<?php echo $timeline_val->id ?>')" class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none; "><?php echo 'Edit Post'; ?></a>
                           <?php } ?>
                        </li>
                        <li>
                           <?php if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','delete') && $timeline_val->user_id==get_frontauthuser('user_id')){ ?>
                           <a href="javascript:;" onclick="deletetimeline_post(this,'<?php echo $timeline_val->id ?>')" class="cursor-pointer text-danger" style="z-index:1; "><?php echo 'Delete Post'; ?></a>
                           <?php } ?>
                        </li>
                     </ul>
                  </div>
                  <!-- dropdown code end -->
                  <!-- <a href="javascript:;" class="float-end" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a> -->
               <?php } ?>
               <!-- edit timeline post -->
               <div class="hide class-edittimelinepost<?php echo $timeline_val->id ?>">
                <input type="hidden" name="profile_id" value="<?php echo $timeline_val->profile_id ?>">
                <input type="hidden" name="timelinepost_id" value="<?php echo $timeline_val->id ?>">
                
                  <div class="row">
                    
                    <div class="row">
                      <div class="col-md-6" style="margin-top: 14px;"> Title</div>
                        <div class="col-md-6">
                            <input type="text" name="title" placeholder="<?php echo lang('title') ?>" class="form-control required" value="<?php echo $timeline_val->title ?>" id="exampleInputEmail153" aria-describedby="emailHelp" require maxlength="30">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" style="margin-top: 14px;">Title for Date</div>
                        <div class="col-md-6">
                            <input type="text" name="title_for_date" placeholder="<?php echo lang('title_for') ?>" class="form-control required" value="<?php echo $timeline_val->title_for_date ?>" id="exampleInputTitledate153" aria-describedby="emailHelp" require>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" style="margin-top: 14px;">From Date</div>
                        <div class="col-md-6">
                            <input type="date" name="from_date" class="form-control required datepicker_input" placeholder="DD/MM/YYYY" value="<?php echo $timeline_val->from_date ?>" autocomplete="off" id="datepicker1" require>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6" style="margin-top: 14px;">To Date</div>
                        <div class="col-md-6">
                            <input type="date" name="to_date" class="form-control datepicker_input" placeholder="DD/MM/YYYY" autocomplete="off" value="<?php echo $timeline_val->to_date ?>" id="datepicker2">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                      <div class="input-group mb-3">
                        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control">
                      </div>
                    </div>
                    
                    <img src="<?php echo UploadStorage::url( $timeline_val->timeline_image, site_url('assets/frontend/uploads/' . get_defaultimage()->timeline) ) ?>" width="70" alt="<?php echo $timeline_val->title ?>" onerror="this.onerror=null; this.src='<?php echo site_url('assets/frontend/uploads/' . get_defaultimage()->timeline) ?>'"/>
                    <div class="col-12">
                        <div class="mb-3">
                            <textarea class="form-control required" name="description"
                                placeholder="<?php echo lang('blog_detail') ?>"
                                id="exampleFormControlTextarea136" rows="3" require><?php echo (isset($timeline_val->description)) ?$timeline_val->description : '' ?></textarea>
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
               <?php if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','delete') && $timeline_val->user_id==get_frontauthuser('user_id')){ ?>
               <a href="javascript:;" onclick="deletetimeline_post(this,'<?php echo $timeline_val->id ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" style="width:25px;" class="delete-svgicon" alt="delete"/></a>
               <?php } ?>
               <?php if(checkwarden_permission(get_frontauthuser('warden_user_id'),'timeline','make_feature')){ if($timeline_val->feature_post==1){ ?>
               <input type="checkbox" onclick="setfeature_post(this,'<?php echo $timeline_val->id ?>','timeline',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
               <?php }else{ ?>
               <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $timeline_val->id ?>','timeline',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
               <?php } } ?>
               </div>
            </div>
            <?php } ?>

             <img class="timeline-image"
                  src="<?php echo UploadStorage::url( $timeline_val->timeline_image, site_url('assets/frontend/uploads/' . get_defaultimage()->timeline) ) ?>"
                  onerror="this.onerror=null; this.src='<?php echo site_url('assets/frontend/uploads/' . get_defaultimage()->timeline) ?>'">
            <h3><?php echo ($timeline_val->title!='') ? $timeline_val->title : 'Childhood Memories'  ?></h3>
            <p><?php echo ($timeline_val->description!='') ? limitedwords($timeline_val->description) : ''  ?> <a href="javascript:void(0)"  data-bs-toggle="modal" data-bs-target="#time-line-modal" onclick="timeline_popup('<?php echo $timeline_val->id ?>')">Read More</a></p>
         </div>
      </div>
   </div>
</li>
<?php } }
   echo '</ul>';
   }
   if($no_datafound!='' || $no_datafound_status!=''){
      ?>
      <script>
         document.getElementById('timeline').style.display = 'none';
      </script>
      <?php
      echo '<h2 class="no_record norecord-message" style="margin-top:64px;">'.lang('no_record_found').'</h2>';
   } ?>
