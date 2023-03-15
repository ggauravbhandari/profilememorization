<?php
//print_r($middelsection['journal_post']);
// $middelsection['journal_post'] = json_decode(json_encode($middelsection['journal_post']),true);
   if(isset($middelsection['journal_post']) && count($middelsection['journal_post'])>0){
      $errorcount_featurepost = 0;
     foreach($middelsection['journal_post'] as $k => $val){
      // print_r($val);
        $imgedefaultpath = ($val->category) ? 'journal_'.$val->category : 'profile_img';

      if(isset($val) && !empty($val)){

         if((checkauth() && (isset($val->user_id) && $val->user_id==get_frontauthuser('user_id'))) || $val->status==1 && $val->save_status==2){

         $image_withfullpath = ($val->image!='' && $val->image!='undefined') ? UploadStorage::url( $val->image ) : base_url('assets/frontend/uploads/').get_defaultimage()->$imgedefaultpath;

?>
<style type="text/css">
ul.dropdown-menu li {
    border: none !important;
}
</style>
<div class="col-12 col-md-6 col-lg-4 d-flex feature_postarr position-relative mt-5 postid<?php echo $val->id; ?>">
   <div class="scene w-20">
      <img src="<?php echo ($val->image!='') ? UploadStorage::url( $val->image ) : site_url('assets/frontend/uploads/').get_defaultimage()->$imgedefaultpath ?>" width="70" alt="<?php echo $val->title ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->$imgedefaultpath ?>'"/>
      <span class="blur"></span>
   </div>
   <div class="scene-content">
        <!-- dropdown start -->
        <?php 
        
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
          echo warden_groupprofilepermission();
         if(in_array($val->profile_id, explode(',', warden_groupprofilepermission())) && (checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','approve') ||checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete') || checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature'))){
         ?>
        <div class="dropdown dd float-end" style="z-index: 999;cursor: pointer;">
          <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
          <ul class="dropdown-menu" style="z-index:999 !important;">
            <li>
              <?php 
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
              // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
              if($val->feature_post==1){ ?>
              <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
              <?php }else{ ?>
                  <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
              <?php } } ?>
            </li>

            <li>
              <?php 
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
                ?>
                <div class="col-12">
                    <div class="d-flex form-radio">
                        <div class="form-check me-3">
                            <label class="form-check-label" for="flexRadioDefault5wardenjournal<?php echo $val->id ?>">
                                <?php echo lang('public') ?>
                            </label>
                            <input class="form-check-input" value="1" type="radio" name="is_public"
                                id="flexRadioDefault5wardenjournal<?php echo $val->id ?>" <?php echo ($val->is_public==1) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('journal_post','<?php echo $val->id ?>','1')">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault6wardenjournal<?php echo $val->id ?>">
                                <?php echo lang('private') ?>
                            </label>
                          <input class="form-check-input" value="2" type="radio" name="is_public" id="flexRadioDefault6wardenjournal<?php echo $val->id ?>"  <?php echo ($val->is_public==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('journal_post','<?php echo $val->id ?>','2')">
                        </div>
                    </div>
                </div>
              <?php
                // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
              } ?>
            </li>
            <li>
            <?php
        
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete'))){

              //if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete')){ ?>
              
              <a href="javascript:;" onclick="edit_journal(this,'<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1; color: #90a792;text-decoration: none;margin-left:5px;float:left !important"><?php echo 'Edit Post';//lang('edit_post') ?></a>
              
              <?php } ?>
              </li>
              <li>
            <?php
        
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete'))){

              //if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete')){ ?>
              <br/><a href="javascript:;" onclick="deletejournal_post(this,'<?php echo $val->id ?>')" class="cursor-pointer" style="z-index:1; color: red;text-decoration: none;float: left !important;margin-left:5px;"><?php echo 'Delete Post';//lang('edit_post') ?></a>
              
              
              <?php } ?>
              </li>
          </ul>
        </div>
        <!-- dropdown end -->
        <?php 
        } 
      }else{ ?>
        <!-- dropdown start -->
        <?php if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete'))  ){
         ?>
        <div class="dropdown as123 float-end" style="z-index: 999;cursor: pointer;">
          <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
          <ul class="dropdown-menu">
             <li>
              <?php 
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
              // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
              if($val->feature_post==1){ ?>
              <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
              <?php }else{ ?>
                  <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
              <?php } } ?>
            </li>
            <li>
              <?php 
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
                
                ?>

                <div class="col-12">
                    <div class="d-flex form-radio">
                        <div class="form-check me-3">
                            <label class="form-check-label" for="flexRadioDefault5journal<?php echo $val->id ?>">
                                <?php echo lang('public') ?>
                            </label>
                            <input class="form-check-input" value="1" type="radio" name="is_public"
                                id="flexRadioDefault5journal<?php echo $val->id ?>" <?php echo ($val->is_public==1) ? 'checked="checked" style="background-color: #90a792;"' : '' ?> onclick="savepublicprivate('journal_post','<?php echo $val->id ?>','1')">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault6journal<?php echo $val->id ?>">
                                <?php echo lang('private') ?>
                            </label>
                          <input class="form-check-input" value="2" type="radio" name="is_public" id="flexRadioDefault6journal<?php echo $val->id ?>"  <?php echo ($val->is_public==2) ? 'checked="checked" style="background-color: #90a792;"' : '' ?> onclick="savepublicprivate('journal_post','<?php echo $val->id ?>','2')">
                        </div>
                    </div>
                </div>
              <?php
                // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
              } ?>
            </li>
            <li>
            <?php
        
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete'))){

              //if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete')){ ?>
              
              <a href="javascript:;" onclick="edit_journal(this,'<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1; color: #90a792;text-decoration: none;float: left !important;margin-left:5px"><?php echo 'Edit Post';//lang('edit_post') ?></a>
              
              <?php } ?>
              </li>
              <li>
            <?php
        
              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete'))){

              //if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete')){ ?>
             <br/> <a href="javascript:;" onclick="deletejournal_post(this,'<?php echo $val->id ?>')" class="cursor-pointer" style="z-index:1; color: red;margin-left: 5px;text-decoration: none;float: left !important;"><?php echo 'Delete Post';//lang('edit_post') ?></a>
              
              
              <?php } ?>
              </li>
          </ul>
        </div>
        <?php } ?>
        <!-- dropdown end -->
      <?php 
        }
        /*
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
         if(in_array($val->profile_id, explode(',', warden_groupprofilepermission()))){
         ?>

        <a href="javascript:;" style="float:right;z-index: 2;" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a>
        <?php }
        }else{ ?>
        <a href="javascript:;" style="float:right;z-index: 2;" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a>
        <?php } 
        */ ?>

        <div class="hide class-editjournalpost<?php echo $val->id ?>">
          <input type="hidden" name="profile_id" value="<?php echo $val->profile_id ?>">
          <input type="hidden" name="journalpost_id" value="<?php echo $val->id ?>">
          
            <div class="row">
              <div class="row">
                  <div class="col-md-6"  style="margin-top: 8px;"> Select Category</div>
                  <div class="col-md-6">
                      <div class="dropdown">
                          <select name="journal_category" class="form-control required"
                              style="border-radius: 50px;">
                              <option value="">
                                  <?php echo lang('select_category') ?>
                              </option>
                              <?php foreach(journal_category() as $j_cat){ ?>
                              <option value="<?php echo $j_cat ?>" <?php echo ($j_cat==$val->category) ? 'selected="selected"' :'' ?>>
                                  <?php echo $j_cat ?>
                              </option>
                              <?php } ?>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6" style="margin-top: 14px;"> Title</div>
                  <div class="col-md-6">
                      <input type="text" name="title"
                          placeholder="<?php echo lang('blog_title') ?>"
                          class="form-control required" id="exampleInputEmail151"
                          aria-describedby="emailHelp" value="<?php echo $val->title ?>" required>
                  </div>
              </div>
              <div class="row" style="margin-top: 10px;">
                <div class="input-group mb-3">
                  <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control">
                </div>
                  <!-- <div class="input-group mb-3">
                      <input type="text" class="add-image-input"
                          placeholder="Upload Image"
                          id="editinputGroupFileeditJournal08<?php echo $val->id ?>">
                      <input type="file" name="fileimage"
                          class="form-control visually-hidden"
                          id="editinputGroupFileeditJournal07<?php echo $val->id ?>" accept=".png, .jpg, .jpeg">
                      <label style="border: 2px solid black;" class="input-group-text add-image"
                          for="editinputGroupFileeditJournal07<?php echo $val->id ?>">
                          <?php echo lang('add_image') ?>
                      </label>
                  </div> -->
              </div>
              <!-- <input type="file" name="imgfile"> -->
              <img src="<?php echo ($val->image!='') ? UploadStorage::url( $val->image ) : site_url('assets/frontend/uploads/').get_defaultimage()->$imgedefaultpath ?>" width="70" alt="<?php echo $val->title ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->$imgedefaultpath ?>'"/>
              <div class="col-12">
                  <div class="mb-3">
                      <textarea class="form-control required" name="description"
                          placeholder="<?php echo lang('blog_detail') ?>"
                          id="exampleFormControlTextarea136" rows="3" required><?php echo (isset($val->description)) ?$val->description : '' ?></textarea>
                  </div>
              </div>
              
              <div class="col-12">
                  <div class="mb-3 d-flex">
                      <button type="submit" name="submit" value="save"
                          class="btn btn-submit-request dark-btn">
                          <?php echo lang('save') ?>
                      </button>
                      <button type="submit" name="submit" value="publish"
                          class="btn btn-submit-request mx-3 dark-btn">
                          <?php echo lang('publish') ?>
                      </button>
                  </div>
              </div>
          </div>
        </div>
        <div class="hide clone-editpopup">
        <?php
        
        if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete'))){

        //if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete')){ ?>
        <a href="javascript:;" onclick="deletejournal_post(this,'<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" style="width:25px;" class="delete-svgicon" alt="delete"/></a>

        <a href="javascript:;" onclick="edit_journal(this,'<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1; color: #90a792;text-decoration: none;"><?php echo 'Edit Post';//lang('edit_post') ?></a>
        <?php }
        if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
        // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
        if($val->feature_post==1){ ?>
        <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/> <?php echo lang('is_feature') ?>
        <?php }else{ ?>
            <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
        <?php } }
        
        if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
            ?>
            <div class="col-12">
                <div class="d-flex mb-3 form-radio">
                    <div class="form-check me-3">
                        <label class="form-check-label" for="flexRadioDefault5">
                            <?php echo lang('public') ?>
                        </label>
                        <input class="form-check-input" value="1" type="radio" name="is_public"
                            id="flexRadioDefault5" <?php echo ($val->is_public==1) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('journal_post','<?php echo $val->id ?>','1')">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="flexRadioDefault6">
                            <?php echo lang('private') ?>
                        </label>
                      <input class="form-check-input" value="2" type="radio" name="is_public" id="flexRadioDefault6"  <?php echo ($val->is_public==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('journal_post','<?php echo $val->id ?>','2')">
                    </div>
                </div>
            </div>
        <?php
        // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){
        } ?>
        </div>
      <?php
      if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id || $val->profile_id==get_frontprofileid())) || ((get_frontauthuser('user_id')==$val->user_id || $val->profile_id==get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'featured_post','delete'))){
        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
          if(in_array($val->profile_id, explode(',', warden_groupprofilepermission()))){ ?>

      <?php }
        }else{ ?>

      <?php } } ?>
      <h3 class="scene-head"><?php echo ($val->profile_name) ? $val->profile_name : '' ?></h3>
      <p class="date"><?php echo ($val->created_at!='') ? front_date_formate($val->created_at) : '' ?></p>
      <p class="text">
         <?php echo ($val->category!='') ? ($val->category) : '' ?><br>
      </p>
      <p class="text feature-desc-text">
         <?php echo $val->title; ?><br>
      </p>
      <p class="text feature-desc-text">
         <?php echo ($val->description!='') ? limitedwords($val->description,100) : '' ?><br>
      </p>
      <p class="interest-list posted-by">
        <a href="javascript:void(0)" data-bs-toggle="modal"
          data-bs-target="#post-detail-popup"
          class="journal-detail-btn" onclick="journal_popup(this,'<?php echo $val->id ?>')"><span><img src="<?php echo site_url('assets/frontend/') ?>images/arrow-right-white.png"></span></a>
        </p>
   </div>
</div>
<?php
   }else{
      $errorcount_featurepost = $errorcount_featurepost+1;
   } } ?>
<?php }
   }else{
      $errorcount_featurepost = 1;

   }
   if($errorcount_featurepost>0){
      echo '<h2 class="no_record norecord-message" style="margin-top:48px;">'.lang('no_record_found').'</h2>';
   } ?>
