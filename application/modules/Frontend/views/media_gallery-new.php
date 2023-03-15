<style type="text/css">
  .mediagallery{
    transform: translate(0px, 23px) !important;
  }
</style>
<?php
$count_album = 0;
$no_datafound = lang('lifeof_data_notfound');
$no_datafound_status = lang('lifeof_data_notfound');
$no_datafound_status2 = lang('lifeof_data_notfound');
if(isset($middelsection['media_data']) && !empty($middelsection['media_data'])){

   // echo '<pre>';   print_r($middelsection['media_data']);
   // $con = mysqli_connect("localhost","root","","memorisation");
      //$result=mysqli_query($con, "select * from media_images") or die('Something Wrong');
      $result = $middelsection['media_data'];
      // print_r($result);
      if (count($result) > 0) {
         $limit=4;
         $offset=0;
         $totalRows = intval(ceil(count($result)/$limit));

         for($i=0; $i < $totalRows; $i++) {

         ?>
        <div class="row mb-2">
         <?php
         /*echo $limit.','.$offset;
         echo "SELECT media_images.id,`media_images`.*, `media_album`.`title` as `albumtitle`, `media_album`.`caption` as `albumcaption` 
FROM `media_images` JOIN `media_album` ON `media_images`.`album_id`=`media_album`.`id` 
WHERE media_images.id in (if((select id from media_images where set_coverphoto =1 and `media_images`.`album_id`=`media_album`.`id`)=NULL,0,(select id from media_images where set_coverphoto =1 and `media_images`.`album_id`=`media_album`.`id`))) and `trash` = 0 AND `media_images`.`profile_id` = '1' GROUP BY `album_id` LIMIT $offset,$limit";
            
            /*$result2=$this->db->query("SELECT media_images.id,`media_images`.*, `media_album`.`title` as `albumtitle`, `media_album`.`caption` as `albumcaption` 
FROM `media_images` JOIN `media_album` ON `media_images`.`album_id`=`media_album`.`id` 
WHERE media_images.id in (if((select id from media_images where set_coverphoto =1 and `media_images`.`album_id`=`media_album`.`id`)=NULL,0,(select id from media_images where set_coverphoto =1 and `media_images`.`album_id`=`media_album`.`id`))) and `trash` = 0 AND `media_images`.`profile_id` = '1' GROUP BY `album_id` LIMIT $offset,$limit")->result_array();*/
            $result2 = $this->db->select('media_images.*,media_album.title as albumtitle,media_album.caption as albumcaption')->where('trash',0)->where('media_images.profile_id',get_frontprofileid())->join('media_album','media_images.album_id=media_album.id')->limit($limit,$offset)->group_by('album_id')->get('media_images')->result_array();
            foreach($result2 as $rowkey => $rowval){
              $result2[$rowkey]['image'] = $this->db->select('id,image')->where('album_id',$rowval['album_id'])->order_by('set_coverphoto','desc')->limit(1)->get('media_images')->row()->image;
            }
            
            $r=1;
            $allData= array();
            $subData= array();
            // while($row2 = mysqli_fetch_assoc($result2)) {
            foreach($result2 as $row2) {
               if($r==2 || $r==3){
                  $subData[] = $row2;
               }else if($r==1){
                  $allData[0] = $row2;
               }else if($r==4){
                  $allData[2] = $row2;
               }

               $r++;
            }
            if(!empty($subData)>0){
               $allData[1] = $subData;
            }

            ksort($allData);
            foreach ($allData as $f => $firstRow) {
                //echo 'asd';print_r($firstRow);

                if(count($firstRow)==1 || count($firstRow)==2){
                    $no_datafound = ''; ?>
                     <div class="col-12 col-md-4 first">
                         <div class="row">
                             <?php
                        foreach ($firstRow as $s => $secondRow) {

                          // print_r($secondRow);
                            // echo $secondRow['status'];
                            $img_extention = explode('.',$secondRow['image']);
                           if($secondRow['image']!='' && in_array(end($img_extention),media_check_video())){
                              $secondRow_image = get_defaultimage()->media;
                           }elseif($secondRow['image']!='' && in_array(end($img_extention),media_check_audio())){
                              $secondRow_image = get_defaultimage()->media;
                           }else{
                              if($secondRow['image']!=''){
                                 $secondRow_image = $secondRow['image'];
                              }else{
                                 $secondRow_image = get_defaultimage()->media;
                              }
                           } 
                           
                            $album_public = $this->db->where(['is_public'=>1,'id'=>$secondRow['album_id']])->get('media_album');
                            $album_public_check = $this->db->where(['id'=>$secondRow['album_id']])->get('media_album');

                            if((checkauth() && $secondRow['user_id']==get_frontauthuser('user_id')) || ($secondRow['status']==1 && $album_public->num_rows()>0)){
                              $count_album +=1;
                                ?>

                        <div class="overflow-hidden res-slide m-parent position-relative float-start float-md-none my-3 my-md-0">
                          <div class="mediaoverlay <?php if(in_array($count_album,[1,4,5,8,9,12,13,16,17,20])){ echo 'm-img-1'; }else{ echo 'm-img-3'; }?>"
                             style="background-image:url(<?php echo UploadStorage::url( $secondRow_image ); ?>)">
                          <!-- dropdown start -->
                            <?php if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$secondRow['user_id']) || (get_frontauthuser('user_id')==$secondRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(
                                  get_frontauthuser('warden_user_id'),'media_post','make_feature')) || (get_frontauthuser('user_id')==$secondRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(
                                  get_frontauthuser('warden_user_id'),'media_post','delete')) ){ 
                              ?>
                            <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                              <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                              <ul class="dropdown-menu memory-dropdown mediagallery" style="z-index:999 !important;left:auto !important;">
                                <?php 
                                
                                // for admin
                                if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$secondRow['user_id']) || (get_frontauthuser('user_id')==$secondRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(
                                  get_frontauthuser('warden_user_id'),'media_post','make_feature'))){ ?>
                                  <li class="asdsa">
                                    <div class="col-12">
                                      <div class="d-flex form-radio">
                                         <div class="form-check me-3">
                                             <label class="form-check-label" for="flexRadioeditmedia5<?php echo $secondRow['album_id'] ?>">
                                                 <?php echo lang('public') ?>
                                             </label>
                                             <input class="form-check-input" value="1" type="radio" name="is_public"
                                                 id="flexRadioeditmedia5<?php echo $secondRow['album_id'] ?>" <?php echo ($album_public_check->row()->is_public==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('media_album','<?php echo $secondRow['album_id'] ?>','1')" <?php echo ($album_public_check->row()->is_public==1) ? 'style="background:#90a792"' : '' ?>>
                                         </div>
                                         <div class="form-check">
                                             <label class="form-check-label" for="flexRadioeditmedia6<?php echo $secondRow['album_id'] ?>">
                                                 <?php echo lang('private') ?>
                                             </label>
                                             <input class="form-check-input" value="2" type="radio" name="is_public"
                                                 id="flexRadioeditmedia6<?php echo $secondRow['album_id'] ?>" <?php echo ($album_public_check->row()->is_public==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('media_album','<?php echo $secondRow['album_id'] ?>','2')"<?php echo ($album_public_check->row()->is_public==2) ? 'style="background:#90a792"' : '' ?>>
                                         </div>
                                      </div>
                                    </div>
                                  </li>
                                <?php }
                                  if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$secondRow['user_id']) || (get_frontauthuser('user_id')==$secondRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','edit'))){ ?>
                                  <li>
                                    <a href='javascript:void(0)' class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;" onclick="edit_mediaalbumpost(this,'<?php echo $secondRow['album_id'] ?>','<?php echo $secondRow['album_id'] ?>')">Edit Post</a>
                                  </li>
                                <?php }
                                if(checkauth() && get_frontauthuser('warden_user_id')==0){
                                  if(checkauth() && $secondRow['user_id']==get_frontauthuser('user_id')){
                                    if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){ ?>
                                        <li>
                                          <a href='javascript:void(0)' class="cursor-pointer text-danger" style="z-index:1; " onclick="deletemedia_albumpost(this,'<?php echo $secondRow['album_id'] ?>','<?php echo $secondRow['user_id'] ?>')">Delete Post</a>
                                        </li>
                                      <?php 
                                      
                                    }
                                  }
                                }
                                // for warden
                                if((checkauth() && get_frontauthuser('warden_user_id')>0 && get_frontauthuser('user_id')==$secondRow['user_id']) || (get_frontauthuser('user_id')==$secondRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature'))){ /*?>
                        
                                <li>
                                  <div class="col-12">
                                    <div class="d-flex form-radio">
                                       <div class="form-check me-3">
                                           <label class="form-check-label" for="flexRadioeditmedia5<?php echo $secondRow['album_id'] ?>">
                                               <?php echo lang('public') ?>
                                           </label>
                                           <input class="form-check-input" value="1" type="radio" name="is_public"
                                               id="flexRadioeditmedia5<?php echo $secondRow['album_id'] ?>" <?php echo ($secondRow['media_ispublic']==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('media_images','<?php echo $secondRow['album_id'] ?>','1')" <?php echo ($secondRow['media_ispublic']==1) ? 'style="background:#90a792"' : '' ?>>
                                       </div>
                                       <div class="form-check">
                                           <label class="form-check-label" for="flexRadioeditmedia6<?php echo $secondRow['album_id'] ?>">
                                               <?php echo lang('private') ?>
                                           </label>
                                           <input class="form-check-input" value="2" type="radio" name="is_public"
                                               id="flexRadioeditmedia6<?php echo $secondRow['album_id'] ?>" <?php echo ($secondRow['media_ispublic']==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('media_images','<?php echo $secondRow['album_id'] ?>','2')"<?php echo ($secondRow['media_ispublic']==2) ? 'style="background:#90a792"' : '' ?>>
                                       </div>
                                    </div>
                                  </div>
                                </li>
                                <?php 
                                */ }

                                if((checkauth() && get_frontauthuser('warden_user_id')>0 && get_frontauthuser('user_id')==$secondRow['user_id']) || (get_frontauthuser('user_id')==$secondRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','edit'))){ ?>
                                <li>
                                  <a href='javascript:void(0)' class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;" onclick="edit_mediaalbumpost(this,'<?php echo $secondRow['album_id'] ?>','<?php echo $secondRow['album_id'] ?>')">Edit Post</a>
                                </li>
                              <?php }
                              if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                                if(checkauth() && $secondRow['user_id']==get_frontauthuser('user_id')){
                                if(checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){
                                     ?>
                                      <li>
                                        <a href='javascript:void(0)' class="cursor-pointer text-danger" style="z-index:1; " onclick="deletemedia_albumpost(this,'<?php echo $secondRow['album_id'] ?>','<?php echo $secondRow['user_id'] ?>')">Delete Post</a>
                                      </li>
                                    <?php 
                                    
                                  }
                                }
                              }
                               ?>
                              </ul>
                            </div>
                          <?php } ?>
                            <!-- dropdown end -->
                            <!-- edit album post -->
                            <div class="hide class-editalbumpost<?php echo $secondRow['album_id'] ?>">
                               <input type="hidden" name="profile_id" value="<?php echo $secondRow['profile_id'] ?>">
                               <input type="hidden" name="mediapost_id" value="<?php echo $secondRow['album_id'] ?>">
                               <div class="row">
                                  
                                  <div class="row">
                                    <div class="col-md-6" style="margin-top: 14px;"> Title</div>
                                      <div class="col-md-6">
                                          <input type="text" name="title" placeholder="<?php echo lang('title') ?>" class="form-control required" value="<?php echo $secondRow['albumtitle'] ?>" id="exampleInputEmail153" aria-describedby="emailHelp">
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="mb-3">
                                          <textarea class="form-control required" name="caption"
                                              placeholder="<?php echo lang('blog_detail') ?>"
                                              id="exampleFormControlTextarea136" rows="3"><?php echo (isset($secondRow['albumcaption'])) ?$secondRow['albumcaption'] : '' ?></textarea>
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
                        
                            <div class="m-cover long" data-bs-toggle="modal" data-bs-target="#life-modal-gallery"  onclick="life_modal_gallery(<?php echo $secondRow['album_id'] ?>)">
                                <div class="m-conetnt show-mobile">
                                  
                                    <h3 ><?php echo (strlen($secondRow['albumtitle'])>15) ? substr($secondRow['albumtitle'],0,12).'...' : $secondRow['albumtitle']; ?> </h3>
                                    <p data-bs-toggle="modal" data-bs-target="#life-modal-gallery"  onclick="life_modal_gallery(<?php echo $secondRow['album_id'] ?>)"><?php echo (strlen($secondRow['albumcaption'])>18) ? substr($secondRow['albumcaption'],0,15).'...' : $secondRow['albumcaption'] ; ?></p>
                                </div>
                                <div class="m-conetnt show-desktop">
                                  
                                    <h3 ><?php echo $secondRow['albumtitle']; ?> </h3>
                                    <p data-bs-toggle="modal" data-bs-target="#life-modal-gallery"  onclick="life_modal_gallery(<?php echo $secondRow['album_id'] ?>)"><?php echo $secondRow['albumcaption']; ?></p>
                                </div>
                            </div>
                            </div>
                        </div>

                        <?php } }

                        ?>
                        </div>
                     </div>

                  <?php } else {
                    
                      $album_public = $this->db->where(['is_public'=>1,'id'=>$firstRow['album_id']])->get('media_album');
                      $album_public_check = $this->db->where(['id'=>$firstRow['album_id']])->get('media_album');
                      
                    if((checkauth() && $firstRow['user_id']==get_frontauthuser('user_id')) || ($firstRow['status']==1 && $album_public->num_rows()>0)){
                      $count_album +=1;
                     $no_datafound = $firstRow_image = '';

                     $img_extention = explode('.',$firstRow['image']);
                     if($firstRow['image']!='' && in_array(end($img_extention),media_check_video())){
                        $firstRow_image = get_defaultimage()->media;
                     }elseif($firstRow['image']!='' && in_array(end($img_extention),media_check_audio())){
                        $firstRow_image = get_defaultimage()->media;
                     }else{
                        if($firstRow['image']!=''){
                           $firstRow_image = $firstRow['image'];
                        }else{
                        $firstRow_image = get_defaultimage()->media;
                        }
                     } 
                     // echo $firstRow['id'];
                     //print_r($firstRow['profile_id']);
                     
                     ?>
                    <div class="col-12 col-md-4 position-relative long">
                        <div class="overflow-hidden m-parent" >
                          <div class="mediaoverlay <?php if(in_array($count_album,[1,4,5,8,9,12,13,16,17,20])){ echo 'm-img-1'; }else{ echo 'm-img-3'; }?>"
                                style="background-image:url(<?php echo UploadStorage::url( $firstRow_image ); ?>)" >
                        <!-- dropdown start -->
                        <?php 
                        // m-img-<?php if($f==0){ echo '1'; }else{ echo '2';}
                        // if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                         // if(in_array($firstRow['profile_id'], explode(',', warden_groupprofilepermission()))){
                          
                          if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$firstRow['user_id']) || (get_frontauthuser('user_id')==$firstRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature')) || (get_frontauthuser('user_id')==$firstRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete'))){
                         ?>
                        <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                        <?php 

                        if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                         if(in_array($firstRow['profile_id'], explode(',', warden_groupprofilepermission())) && (checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','approve') ||checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete') || checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature'))){ ?>
                          <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                        <?php }
                      }else{ ?>
                          <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                        <?php } ?>
                          <ul class="dropdown-menu memory-dropdown mediagallery" style="z-index:999 !important;left:auto !important;right: 0 !important;">
                            <?php 
                            // for admin
                            if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$firstRow['user_id']) || (get_frontauthuser('user_id')==$firstRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature'))){ ?>
                              <li class="asdw123123">
                                <div class="col-12">
                                  <div class="d-flex form-radio">
                                     <div class="form-check me-3">
                                         <label class="form-check-label" for="flexRadioeditmedia5<?php echo $firstRow['album_id'] ?>">
                                             <?php echo lang('public') ?>
                                         </label>
                                         <input class="form-check-input" value="1" type="radio" name="is_public"
                                             id="flexRadioeditmedia5<?php echo $firstRow['album_id'] ?>" <?php echo ($album_public_check->row()->is_public==1) ? 'checked' : '' ?>  onclick="savepublicprivate('media_album','<?php echo $firstRow['album_id'] ?>','1')" <?php echo ($album_public_check->row()->is_public==1) ? 'style="background:#90a792"' : '' ?>>
                                     </div>
                                     <div class="form-check">
                                         <label class="form-check-label" for="flexRadioeditmedia6<?php echo $firstRow['album_id'] ?>">
                                             <?php echo lang('private') ?>
                                         </label>
                                         <input class="form-check-input" value="2" type="radio" name="is_public"
                                             id="flexRadioeditmedia6<?php echo $firstRow['album_id'] ?>" <?php echo ($album_public_check->row()->is_public==2) ? 'checked' : '' ?> onclick="savepublicprivate('media_album','<?php echo $firstRow['album_id'] ?>','2')" <?php echo ($album_public_check->row()->is_public==2) ? 'style="background:#90a792"' : '' ?>>
                                     </div>
                                  </div>
                                </div>
                              </li>
                              <?php 
                              }

                              if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$firstRow['user_id']) || (get_frontauthuser('user_id')==$firstRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','edit'))){ ?>
                              <li>
                                <a href='javascript:void(0)' class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;" onclick="edit_mediaalbumpost(this,'<?php echo $firstRow['album_id'] ?>','<?php echo $firstRow['album_id'] ?>')">Edit Post</a>
                              </li>
                            <?php }
                            if(checkauth() && get_frontauthuser('warden_user_id')==0){
                              if(checkauth() && $firstRow['user_id']==get_frontauthuser('user_id')){
                              if(checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){
                                   ?>
                                    <li>
                                      <a href='javascript:void(0)' class="cursor-pointer text-danger" style="z-index:1; " onclick="deletemedia_albumpost(this,'<?php echo $firstRow['album_id'] ?>','<?php echo $firstRow['album_id'] ?>')">Delete Post</a>
                                    </li>
                                  <?php 
                                  
                                }
                              }
                            } 
                            /*
                            // for warden
                            if((checkauth() && get_frontauthuser('warden_user_id')>0 && get_frontauthuser('user_id')==$firstRow['user_id']) || (get_frontauthuser('user_id')==$firstRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','make_feature'))){ ?>
                    
                            <li class="admin123123123">
                              <div class="col-12">
                                <div class="d-flex form-radio">
                                   <div class="form-check me-3">
                                       <label class="form-check-label" for="flexRadioeditmedia5<?php echo $firstRow['album_id'] ?>">
                                           <?php echo lang('public').$firstRow['media_ispublic'] ?>
                                       </label>
                                       <input class="form-check-input" value="1" type="radio" name="is_public"
                                           id="flexRadioeditmedia5<?php echo $firstRow['album_id'] ?>" <?php echo ($firstRow['media_ispublic']==1) ? 'checked' : '' ?>  onclick="savepublicprivate('media_album','<?php echo $firstRow['album_id'] ?>','1')" <?php echo ($firstRow['media_ispublic']==1) ? 'style="background:#90a792"' : '' ?>>
                                   </div>
                                   <div class="form-check">
                                       <label class="form-check-label" for="flexRadioeditmedia6<?php echo $firstRow['album_id'] ?>">
                                           <?php echo lang('private') ?>
                                       </label>
                                       <input class="form-check-input" value="2" type="radio" name="is_public"
                                           id="flexRadioeditmedia6<?php echo $firstRow['album_id'] ?>" <?php echo ($firstRow['media_ispublic']==2) ? 'checked' : '' ?> onclick="savepublicprivate('media_album','<?php echo $firstRow['album_id'] ?>','2')" <?php echo ($firstRow['media_ispublic']==2) ? 'style="background:#90a792"' : '' ?>>
                                   </div>
                                </div>
                              </div>
                            </li>
                            <?php 
                            }*/
                            if((checkauth() && get_frontauthuser('warden_user_id')>0 && get_frontauthuser('user_id')==$firstRow['user_id']) || (get_frontauthuser('user_id')==$firstRow['user_id'] && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','edit'))){ ?>
                            <li>
                              <a href='javascript:void(0)' class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;" onclick="edit_mediaalbumpost(this,'<?php echo $firstRow['album_id'] ?>','<?php echo $firstRow['album_id'] ?>')">Edit Post</a>
                            </li>
                          <?php }
                          if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                            if(checkauth() && $firstRow['user_id']==get_frontauthuser('user_id')){
                            if(checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete')){
                                 ?>
                                  <li>
                                    <a href='javascript:void(0)' class="cursor-pointer text-danger" style="z-index:1; " onclick="deletemedia_albumpost(this,'<?php echo $firstRow['album_id'] ?>','<?php echo $firstRow['album_id'] ?>')">Delete Post</a>
                                  </li>
                                <?php 
                                
                              }
                            }
                          } ?>
                          </ul>
                        </div>
                        <?php } //} ?>
                        <!-- dropdown end -->
                        <!-- edit album post -->
                        <div class="hide class-editalbumpost<?php echo $firstRow['album_id'] ?>">
                           <input type="hidden" name="profile_id" value="<?php echo $firstRow['profile_id'] ?>">
                           <input type="hidden" name="mediapost_id" value="<?php echo $firstRow['album_id'] ?>">
                           <div class="row">
                              
                              <div class="row">
                                <div class="col-md-6" style="margin-top: 14px;"> Title</div>
                                  <div class="col-md-6">
                                      <input type="text" name="title" placeholder="<?php echo lang('title') ?>" class="form-control required" value="<?php echo $firstRow['albumtitle'] ?>" id="exampleInputEmail153" aria-describedby="emailHelp">
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="mb-3">
                                      <textarea class="form-control required" name="caption"
                                          placeholder="<?php echo lang('blog_detail') ?>"
                                          id="exampleFormControlTextarea136" rows="3"><?php echo (isset($firstRow['albumcaption'])) ?$firstRow['albumcaption'] : '' ?></textarea>
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
                        
                           
                              <div class="m-cover small" data-bs-toggle="modal" data-bs-target="#life-modal-gallery" <?php if($f==0){ echo 'data-bs-toggle="modal" data-bs-target="#life-modal-gallery"'; } ?> onclick="life_modal_gallery(<?php echo $firstRow['album_id'] ?>)">
                                 <div class="m-conetnt show-mobile">
                                    <h3 <?php if($f==0){ echo 'data-bs-toggle="modal" data-bs-target="#life-modal-gallery"'; } ?>><?php echo (strlen($firstRow['albumtitle'])>15) ? substr($firstRow['albumtitle'],0,12).'...' : $firstRow['albumtitle'];//$firstRow['albumtitle']; ?> </h3>
                                    <p <?php if($f==0){ echo 'data-bs-toggle="modal" data-bs-target="#life-modal-gallery"'; } ?>><?php echo (strlen($firstRow['albumcaption'])>18) ? substr($firstRow['albumcaption'],0,15).'...' : $firstRow['albumcaption'];//$firstRow['albumcaption']; ?></p>
                                 </div>
                                 <div class="m-conetnt show-desktop">
                                    <h3 <?php if($f==0){ echo 'data-bs-toggle="modal" data-bs-target="#life-modal-gallery"'; } ?>><?php echo $firstRow['albumtitle']; ?> </h3>
                                    <p <?php if($f==0){ echo 'data-bs-toggle="modal" data-bs-target="#life-modal-gallery"'; } ?>><?php echo $firstRow['albumcaption']; ?></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  <?php
                    }
                  }
            }
           $offset = $offset+$limit;
           ?>
         </div>
           <?php
         }
      }
   }
   if($no_datafound!=''){
      echo '<h2 class="no_record norecord-message" style="margin-top:15px;">'.lang('no_record_found').'</h2>';
   }
   /*elseif($no_datafound_status!=''){
      echo '<h2 class="no_record">'.lang('no_record_found').'</h2>';
   }elseif($no_datafound_status2!=''){
      echo '<h2 class="no_record">'.lang('no_record_found').'</h2>';
   }*/
