<?php if(isset($media_comment) && !empty($media_comment)){
    
   if(count($media_comment)>0)
   { ?>
      <button type="submit" class="btn btn-submit-request mt-3 col-md-12 comment-view-btn hide" data-bs-toggle="collapse" href="#comment-mediaviewcomment" role="button" aria-expanded="false" aria-controls="collapseExample">View Comment</button> 
   <?php 
   } ?> 
<div class="recent-item collapse show" id="comment-mediaviewcomment">
   <?php 
   foreach($media_comment as $mck => $cval)
    { 
      if($mck<2){ ?>
      <div class="comment-parent">
         <div class="r-i-head d-flex align-items-center position-relative w-100">
            <!-- <div class="pic d-flex align-items-center">
               <span><img src="<?php //echo site_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>"></span>
            </div> -->
            <h3 class="comment-title">
               <b><?php echo $cval->name;//echo user_detail_key($cval->id,'firstname').' '.user_detail_key($cval->id,'lastname'); ?></b> left a comment <br>
               <span><?php echo time_elapsed_string($cval->created_at) ?></span>
            </h3>
            <div class="r-i-dots">
               <?php if(checkauth() && get_frontauthuser('user_id')==$cval->user_id ){
               if(checkwarden_permission(get_frontauthuser('warden_user_id'),'comments','delete')){ ?>
               <a href="javascript:;" onclick="delete_comment(this,'<?php echo $cval->id ?>','.comment-parent')">
               <span><img src="<?php echo site_url('assets/frontend/images/delete-icon.svg') ?>" style="width:20px;" alt="delete" title="<?php echo lang('remove_comment') ?>"></span>
               </a>
               <?php } } ?>
               <div class="main-nav nav-1">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
               <ul>
                  <li><a href="#">Item 1</a></li>
                  <li><a href="#">Item 2</a></li>
                  <li><a href="#">Item 3</a></li>
               </ul>
            </div>
         </div>
         <div class="r-i-content">
            <p><?php echo $cval->comment ?></p>
         </div>
      </div>
      <?php } ?>
      <div class="comment-parent hide">
         <div class="r-i-head d-flex align-items-center position-relative w-100">
            <!-- <div class="pic d-flex align-items-center">
               <span><img src="<?php //echo site_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>"></span>
            </div> -->
            <h3 class="comment-title">
               <b><?php echo $cval->name;//echo user_detail_key($cval->id,'firstname').' '.user_detail_key($cval->id,'lastname'); ?></b> left a comment <br>
               <span><?php echo time_elapsed_string($cval->created_at) ?></span>
            </h3>
            <div class="r-i-dots">
               <?php if(checkauth() && get_frontauthuser('user_id')==$cval->user_id ){
               if(checkwarden_permission(get_frontauthuser('warden_user_id'),'comments','delete')){ ?>
               <a href="javascript:;" onclick="delete_comment(this,'<?php echo $cval->id ?>','.comment-parent')">
               <span><img src="<?php echo site_url('assets/frontend/images/delete-icon.svg') ?>" style="width:20px;" alt="delete" title="<?php echo lang('remove_comment') ?>"></span>
               </a>
               <?php } } ?>
               <div class="main-nav nav-1">
                  <span></span>
                  <span></span>
                  <span></span>
               </div>
               <ul>
                  <li><a href="#">Item 1</a></li>
                  <li><a href="#">Item 2</a></li>
                  <li><a href="#">Item 3</a></li>
               </ul>
            </div>
         </div>
         <div class="r-i-content">
            <p><?php echo $cval->comment ?></p>
         </div>
      </div>
   <?php } 
   ?>  
   <button type="button" class="btn asdasdasdasd btn-submit-request m-auto mt-3 loadMore_othercommentpost" <?php echo (count($media_comment)<2) ? 'style="display:none"' : '' ?>>Load More</button>
</div>
<?php } ?>