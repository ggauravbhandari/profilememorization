<?php if(isset($respect_comment) && !empty($respect_comment)){ 
   foreach($respect_comment as $cval){ ?>
<div class="comment-parent">
   <div class="r-i-head d-flex align-items-center position-relative w-100">
      <?php if(checkauth() && get_frontauthuser('user_id')==$cval->user_id ){
         if(checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','delete')){ ?>
      <div class="pic d-flex align-items-center">
         <a href="javascript:;" onclick="delete_comment(this,'<?php echo $cval->id ?>','.comment-parent')">
         <!-- <span><img src="<?php //echo site_url('assets/frontend/images/delete-icon.svg') ?>" alt="delete" title="<?php //echo lang('remove_comment') ?>"></span> -->
         </a>
      </div>
      <?php } } ?>
      <h3 class="comment-title">
         <b><?php echo $cval->name;//echo user_detail_key($cval->id,'firstname').' '.user_detail_key($cval->id,'lastname'); ?></b> left a comment <br>
         <span><?php echo time_elapsed_string($cval->created_at) ?></span>
      </h3>
      <div class="r-i-dots">
         <div class="main-nav">
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
   </div>
   <div class="r-i-content">
      <p><?php echo $cval->comment ?></p>
   </div>
</div>
<?php } } ?>