<?php 
foreach($middelsection['journal_post'] as $jk => $val){
if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){   
 if($jk>3){ 

if((checkauth() && $val->user_id==get_frontauthuser('user_id')) ||  (check_post_pubicprivate($val->id,'journal_post'))){ ?>
<div class="overflow-hidden m-parent col-md-4">
    <div class="journal-parent mt-4 mt-md-2" style="width:100%;">
        <div class="j-cover">
            <div class="m-conetnt">
                <?php if(checkauth() && $val->user_id==get_frontauthuser('user_id')){ ?>
                <div style="font-size: 14px;width: 190px;">
                    <?php 
                    if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete'))){
                     
                    //if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','delete')){ ?>
                     <a href="javascript:;" onclick="deletejournal_post(this,'<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1;"><img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" style="width:25px;" class="delete-svgicon" alt="delete"/></a>
                <?php }
                if((checkauth() && get_frontauthuser('warden_user_id')==0 && get_frontauthuser('user_id')==$val->user_id) || (get_frontauthuser('user_id')==$val->user_id && checkauth() && get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature'))){
                // if(checkwarden_permission(get_frontauthuser('warden_user_id'),'journal_post','make_feature')){ 
                if($val->feature_post==1){ ?>
                <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',0)" class="float-end cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/><?php echo lang('is_feature') ?>
                <?php }else{ ?>
                    <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','journal_post',1)" class="float-end cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"><?php echo lang('is_feature') ?>
                <?php } } ?>
                </div>
                <?php } 
                 ?>
                
                <h3><?php echo $val->title ?> <?php if(checkauth() && $val->user_id==get_frontauthuser('user_id')){ ?>    
               
                <?php } ?><span><?php echo date_dmyfullformat($val->created_at) ?></span> <span>Posted by:
                    <?php echo $val->profile_name ?></span>
                    
                </h3>
                
                


                <p><?php echo $val->description ?> <a
                    href="javascrip:;" data-bs-toggle="modal"
                    data-bs-target="#post-detail-popup" onclick="journal_popup(this,'<?php echo $val->id ?>')">Read More....</a></p>
                <div class="d-flex align-items-center justify-content-between mt-2">
                    <p class="j-user"><?php echo $val->profile_name ?></p>
                    
                    <a href="javascript:void(0)" data-bs-toggle="modal"
                    data-bs-target="#post-detail-popup"
                    class="journal-detail-btn" onclick="journal_popup(this,'<?php echo $val->id ?>')"><span><img src="<?php echo site_url('assets/frontend/') ?>images/arrow-right-white.png"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } 
 }
}
} ?>