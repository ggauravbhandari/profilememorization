<?php 
//echo get_frontauthuser('user_id');
  // print_r($middelsection['media_data']);
   if(isset($middelsection['media_data']) && !empty($middelsection['media_data']) && isset($middelsection['media_data'][0]) && !empty($middelsection['media_data'][0])){ 
      ?>
<div class="container-md p-0 container-fluid">
   <div class="row">
      <?php 
      // print_r($middelsection['media_data']);
      if(isset($middelsection['media_data']) && !empty($middelsection['media_data'])){ ?>
      <?php foreach($middelsection['media_data'] as $k => $media_val){
         if(isset($media_val) && !empty($media_val)){
            //if((checkauth() && $media_val->user_id==get_frontauthuser('user_id')) ||  (check_post_pubicprivate($media_val->id,'media_images','media_ispublic'))){
               // print_r($media_val);
               $media_image =  base_url('assets/frontend/uploads/').$media_val->image;
               if($k==0){ 
            //echo $k;
            ?>
      <div class="col-12 col-md-4 position-relative">
         <?php 
         if(checkauth() && $media_val->user_id==get_frontauthuser('user_id')){
         if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete') &&  $media_val->user_id==get_frontauthuser('user_id')){ ?>    
         <a href='javascript:void(0)' class="delete-icon1" onclick="deletemedia_post(this,'<?php echo $media_val->album_id ?>')"><img src="<?php echo base_url('assets/frontend/images/') ?>/delete-icon.svg"></a>
         <?php } } ?>
         <div class="overflow-hidden m-parent" data-bs-toggle="modal"
            data-bs-target="#life-modal-gallery" onclick="life_modal_gallery(<?php echo $media_val->album_id ?>)">
            <div class="m-img-1 mediagaurav" style="background-image:url('<?php echo $media_image  ?>')">
               <div class="m-cover">
                  <div class="m-conetnt">
                     <h3><?php echo $media_val->title ?></h3>
                     <p><?php echo $media_val->caption ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php } } } } //} ?>
      <div class="col-12 col-md-4">
         <div class="row">
            <?php foreach($middelsection['media_data'] as $k => $media_val){
               if(isset($media_val) && !empty($media_val)){
               $media_image =  base_url('assets/frontend/uploads/').$media_val->image;
               if($k==1){ ?>
            <div class="overflow-hidden res-slide position-relative m-parent float-start float-md-none my-3 my-md-0" data-bs-toggle="modal"
               data-bs-target="#life-modal-gallery" onclick="life_modal_gallery(<?php echo $media_val->album_id ?>)">
               <div class="m-img-3" style="background-image:url('<?php echo $media_image  ?>')">
                  <?php 
                  if(checkauth() && $media_val->user_id==get_frontauthuser('user_id')){
                     if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete') &&  $media_val->user_id==get_frontauthuser('user_id')){ ?>    
                  <a href='javascript:void(0)' class="delete-icon1" onclick="deletemedia_post(this,'<?php echo $media_val->album_id ?>')"><img src="<?php echo base_url('assets/frontend/images/') ?>/delete-icon.svg"></a>
                  <?php } } ?>
                  <div class="m-cover">
                     <div class="m-conetnt">
                        <h3><?php echo $media_val->title ?></h3>
                        <p><?php echo $media_val->caption ?></p>
                     </div>
                  </div>
               </div>
            </div>
            <?php } } } ?>
            <!-- </div> -->
            <?php foreach($middelsection['media_data'] as $k => $media_val){
               if(isset($media_val) && !empty($media_val)){
               $media_image =  base_url('assets/frontend/uploads/').$media_val->image;
               if($k==2){ ?>
            <div class="overflow-hidden res-slide position-relative m-parent float-start float-md-none my-3 my-md-0" data-bs-toggle="modal"
               data-bs-target="#life-modal-gallery" onclick="life_modal_gallery(<?php echo $media_val->album_id ?>)">
               <div class="m-img-4 position-relative" style="background-image:url('<?php echo $media_image  ?>')">
                  <?php 
                  if(checkauth() && $media_val->user_id==get_frontauthuser('user_id')){
                     if(checkauth() && $media_val->user_id==get_frontauthuser('user_id')){ ?>    
                  <a href='javascript:void(0)' class="delete-icon1" onclick="deletemedia_post(this,'<?php echo $media_val->album_id ?>')"><img src="<?php echo base_url('assets/frontend/images/') ?>/delete-icon.svg"></a>
                  <?php } } ?>
                  <div class="m-cover">
                     <div class="m-conetnt">
                        <h3><?php echo $media_val->title ?></h3>
                        <p><?php echo $media_val->caption ?></p>
                     </div>
                  </div>
               </div>
            </div>
            <?php } } } ?>
         </div>
      </div>
      <?php 
         foreach($middelsection['media_data'] as $k => $media_val){
            if(isset($media_val) && !empty($media_val)){
             $media_image =  base_url('assets/frontend/uploads/').$media_val->image;
         if($k>2){ ?>
      <div class="col-12 col-md-4 position-relative">
         <?php if(checkauth() && $media_val->user_id==get_frontauthuser('user_id')){
            if(checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete') &&  $media_val->user_id==get_frontauthuser('user_id')){ ?>    
         <a href='javascript:void(0)' class="delete-icon1" onclick="deletemedia_post(this,'<?php echo $media_val->album_id ?>')"><img src="<?php echo base_url('assets/frontend/images/') ?>/delete-icon.svg"></a>
         <?php } } ?>
         <div class="overflow-hidden m-parent " data-bs-toggle="modal"
            data-bs-target="#life-modal-gallery" onclick="life_modal_gallery(<?php echo $media_val->album_id ?>)">
            <div class="m-img-2" style="background-image:url('<?php echo $media_image  ?>')">
               <div class="m-cover">
                  <div class="m-conetnt">
                     <h3><?php echo $media_val->title ?></h3>
                     <p><?php echo $media_val->caption ?></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php } } } ?>
   </div>
</div>
<?php 
   }else{
 echo '<h2 class="no_record" style="margin-top:15px;">'.lang('no_record_found').'</h2>';

   } ?>