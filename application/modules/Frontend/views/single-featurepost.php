<?php
   if(isset($middelsection['feature_post']) && count($middelsection['feature_post'])>0){
      $errorcount_featurepost = 0;
     foreach($middelsection['feature_post'] as $k => $f_val){
        
        if(in_array($f_val['user_id'], array(get_frontauthuser('user_id'),get_frontauthuser('warden_user_id'))) && isset($f_val['is_public']) && $f_val['is_public']==2){
          

        $defultimgpath = 'profile_img';
        if($f_val['tablename']=='memories'){

          $defultimgpath = 'memory';

           $imagetype = explode('.',$f_val['image']);
           if(end($imagetype)=='mp4'){
              $defultimgpath = 'mp4_image';
           }elseif(end($imagetype)=='mp3'){
              $defultimgpath = 'mp3_image';
           }
        }elseif($f_val['tablename']=='respect_post'){
         $defultimgpath = 'respect';
        }elseif($f_val['tablename']=='journal_post'){
         $res_journal_cat = $this->db->select('category')->where('id',$f_val['id'])->get('journal_post')->row();
         $defultimgpath = 'journal_'.((isset($res_journal_cat) && $res_journal_cat->category!='') ? $res_journal_cat->category : 'Journal');

        }
        $result['f_val'] =$f_val;
        if(isset($f_val) && !empty($f_val)){

          if((checkauth() && (isset($f_val['user_id']) && $f_val['user_id']==get_frontauthuser('user_id'))) || $f_val['status']==1){

            $image_withfullpath = ($f_val['image']!='' && $f_val['image']!='undefined') ? UploadStorage::url( $f_val['image'] ) : base_url('assets/frontend/uploads/').get_defaultimage()->$defultimgpath;

            ?>
            <div class="col-12 col-md-6 col-lg-4 d-flex feature_postarr mobile-margin position-relative <?php echo ($k>0) ? '' : 'htyh' ?> postid<?php echo $f_val['id']; ?>">
             <div class="scene w-20">
                <img src="<?php echo $image_withfullpath ?>" width="70" alt="<?php echo $f_val['name'] ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->$defultimgpath ?>'"/>
                <span class="blur"></span>
             </div>
             <div class="scene-content">

                <?php
                //|| $f_val['profile_id']==get_frontprofileid()
                if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$f_val['user_id'] )) || ((get_frontauthuser('user_id')==$f_val['user_id'] || $f_val['profile_id']==get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'featured_post','delete'))){
                  if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                    if(in_array($f_val['profile_id'], explode(',', warden_groupprofilepermission()))){ ?>
                    <a href="javascript:;" onclick="deletefeature_post(this,'<?php echo $f_val['id'] ?>','.feature_postarr','<?php echo $f_val['tablename'] ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/></a>
                <?php }
                  }else{ ?>
                <a href="javascript:;" onclick="deletefeature_post(this,'<?php echo $f_val['id'] ?>','.feature_postarr','<?php echo $f_val['tablename'] ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/>
                </a>
                <?php } } ?>
                <!-- <a href="javascript:;" onclick="editfeature_post(this,'<?php echo $f_val['id'] ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>edit-icon.png" style="width:25px;" class="delete-svgicon" alt="delete"/></a> -->
                <h3 class="scene-head sd"><?php echo ($f_val['name']) ? limitedwords($f_val['name'],20) : '' ?></h3>
                <p class="date"><?php echo ($f_val['post_date']!='') ? front_date_formate($f_val['post_date']) : '' ?></p>
                <p class="heading-name"><?php echo (isset($f_val['name'])) ? limitedwords(ucfirst($f_val['name']),50) : '' ?></p>
                <p class="text feature-desc-text">
                   <?php echo (isset($f_val['comment']) && $f_val['comment']!='') ? limitedwords(ucfirst($f_val['comment']),90) : '' ?><br>
                   <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#featurepost-modal" onclick="showreadmorepopup_featurepostnew('<?php echo $f_val['id'] ?>','featurepost-modal','featurepostdata','<?php echo $f_val['tablename'] ?>','<?php echo $image_withfullpath ?>')">Read More....</a>
                   <!-- <a href="javascript:void(0)" data-table="<?php //echo $f_val->tablename ?>"></a> -->
                </p>
                <p class="interest-list posted-by">
                  <?php echo lang('shared_by') ?>: <?php echo (isset($f_val['feature_postby']) && $f_val['feature_postby']!='' && isset(user_detail($f_val['feature_postby'])->firstname)) ? user_detail($f_val['feature_postby'])->firstname.' '.user_detail($f_val['feature_postby'])->lastname : '' ?></p>
                  
                  <?php if(in_array($f_val['tablename'], array('journal_post','timeline','memories'))){ ?>
                    <p class="interest-list posted-by"><?php echo lang('posted_by') ?>: <?php echo ($f_val['user_id']>0) ? user_detail($f_val['user_id'])->firstname.' '.user_detail($f_val['user_id'])->lastname : '' ?></p>
                  <?php }else{ ?>
                  <p class="interest-list posted-by"><?php echo lang('posted_by') ?>: <?php echo ($f_val['name']!='') ? ($f_val['name']) : '' ?></p>
                  <?php } ?>
               </div>
            </div>
          <?php
          }else{
              $errorcount_featurepost = $errorcount_featurepost+1;
          } 
        }

    }elseif(isset($f_val['is_public']) && $f_val['is_public']==1){
        $defultimgpath = 'profile_img';
        if($f_val['tablename']=='memories'){

          $defultimgpath = 'memory';

           $imagetype = explode('.',$f_val['image']);
           if(end($imagetype)=='mp4'){
              $defultimgpath = 'mp4_image';
           }elseif(end($imagetype)=='mp3'){
              $defultimgpath = 'mp3_image';
           }
        }elseif($f_val['tablename']=='respect_post'){
         $defultimgpath = 'respect';
        }elseif($f_val['tablename']=='journal_post'){
         $res_journal_cat = $this->db->select('category')->where('id',$f_val['id'])->get('journal_post')->row();
         $defultimgpath = 'journal_'.((isset($res_journal_cat) && $res_journal_cat->category!='') ? $res_journal_cat->category : 'Journal');

        }
        $result['f_val'] =$f_val;
        if(isset($f_val) && !empty($f_val)){

          if((checkauth() && (isset($f_val['user_id']) && $f_val['user_id']==get_frontauthuser('user_id'))) || $f_val['status']==1){

            $image_withfullpath = ($f_val['image']!='' && $f_val['image']!='undefined') ? UploadStorage::url( $f_val['image'] ) : base_url('assets/frontend/uploads/').get_defaultimage()->$defultimgpath;

            ?>
            <div class="col-12 col-md-6 col-lg-4 d-flex feature_postarr mobile-margin position-relative postid<?php echo $f_val['id']; ?>">
             <div class="scene w-20">
                <img src="<?php echo $image_withfullpath ?>" width="70" alt="<?php echo $f_val['name'] ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->$defultimgpath ?>'"/>
                <span class="blur"></span>
             </div>
             <div class="scene-content">

                <?php
                // echo get_frontauthuser('user_id').'=='.$f_val['user_id'];
                // echo $f_val['profile_id'].'=='.get_frontprofileid();
                // || $f_val['profile_id']==get_frontprofileid()
                if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$f_val['user_id'])) || ((get_frontauthuser('user_id')==$f_val['user_id'] || $f_val['profile_id']==get_frontprofileid()) && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'featured_post','delete'))){
                  if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                    if(in_array($f_val['profile_id'], explode(',', warden_groupprofilepermission()))){ ?>
                    <a href="javascript:;" onclick="deletefeature_post(this,'<?php echo $f_val['id'] ?>','.feature_postarr','<?php echo $f_val['tablename'] ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/></a>
                <?php }
                  }else{ ?>
                <a href="javascript:;" onclick="deletefeature_post(this,'<?php echo $f_val['id'] ?>','.feature_postarr','<?php echo $f_val['tablename'] ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" class="delete-svgicon" alt="delete"/></a>
                <?php } } 
                //print_r($f_val);?>
                <!-- <a href="javascript:;" onclick="editfeature_post(this,'<?php echo $f_val['id'] ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>edit-icon.png" style="width:25px;" class="delete-svgicon" alt="delete"/></a> -->
                <h3 class="scene-head"><?php echo ($f_val['name']) ? limitedwords($f_val['name'],20) : '' ?></h3>
                <p class="date"><?php echo ($f_val['post_date']!='') ? front_date_formate($f_val['post_date']) : '' ?></p>
                <p class="heading-name"><?php echo (isset($f_val['name'])) ? limitedwords(ucfirst($f_val['name']),40) : '' ?></p>
                <p class="text feature-desc-text">
                   <?php echo (isset($f_val['comment']) && $f_val['comment']!='') ? limitedwords(ucfirst($f_val['comment']),80) : '' ?><br>
                   <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#featurepost-modal" onclick="showreadmorepopup_featurepostnew('<?php echo $f_val['id'] ?>','featurepost-modal','featurepostdata','<?php echo $f_val['tablename'] ?>','<?php echo $image_withfullpath ?>')">Read More....</a>
                   <!-- <a href="javascript:void(0)" data-table="<?php //echo $f_val->tablename ?>"></a> -->
                </p>
                <p class="interest-list posted-by">
                  <?php echo lang('shared_by') ?>: <?php echo (isset($f_val['feature_postby']) && $f_val['feature_postby']!='' && isset(user_detail($f_val['feature_postby'])->firstname)) ? user_detail($f_val['feature_postby'])->firstname.' '.user_detail($f_val['feature_postby'])->lastname : '' ?></p>
                  <?php if(in_array($f_val['tablename'], array('journal_post','timeline','memories'))){ ?>
                    <p class="interest-list posted-by"><?php echo lang('posted_by') ?>: <?php echo ($f_val['user_id']>0) ? user_detail($f_val['user_id'])->firstname.' '.user_detail($f_val['user_id'])->lastname : '' ?></p>
                  <?php }else{ ?>
                  <p class="interest-list posted-by"><?php echo lang('posted_by') ?>: <?php echo ($f_val['name']!='') ? ($f_val['name']) : '' ?> namename</p>
                  <?php } ?>
               </div>
            </div>
          <?php
          }else{
              $errorcount_featurepost = $errorcount_featurepost+1;
          } 
        } 
      }

     }

   }else{
      $errorcount_featurepost = 1;

   }
   if($errorcount_featurepost>0){
      echo '<h2 class="no_record norecord-message" style="margin-top:48px;">'.lang('no_record_found').'</h2>';
   } ?>
