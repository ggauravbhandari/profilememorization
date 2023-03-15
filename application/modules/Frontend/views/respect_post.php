<style type="text/css">
  .respect_comment.show{
    display: block;
  }
  .respect_comment{
    display: none;
  }
</style>
<?php
$no_datafound = lang('lifeof_data_notfound');
$no_datafound_status = lang('lifeof_data_notfound');
   if(isset($middelsection['respect_post']) && !empty($middelsection['respect_post'])){
      $no_datafound = ''; ?>
<div class="recent-post respectpostdata position-relative">
   <div class="owl-carousel owl-1 owl-theme">
      <?php
         foreach($middelsection['respect_post'] as $rk => $val){
            if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1 && (check_post_pubicprivate($val->id,'respect_post','respect_ispublic'))){
               $no_datafound_status = '';
      ?>
      <div class="item">
         <div class="recent-item pr-3 m-2">
            <div class="comment-parent">
               <?php

                if((checkauth() && $val->user_id==get_frontauthuser('user_id') && get_userprofile(get_frontprofileid())->user_id==get_frontauthuser('user_id')) || (checkauth() && $val->profile_id==get_frontprofileid())){
                // echo 'if';
                    ?>
                    <?php if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                    if(in_array($val->profile_id, explode(',', warden_groupprofilepermission()))){ ?>
                    <!-- dropdown code -->
                    <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                      <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                      <ul class="dropdown-menu memory-dropdown" style="z-index:999 !important;left:auto !important;right: 0 !important;">                      
                        <?php 
                        if(checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','make_feature')){
                        echo '<li>';
                        if($val->feature_post==1){ ?>
                        
                          <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','respect_post',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/><span style="margin-left:5px;"> <?php echo lang('is_feature') ?></span>
                        <?php }else{ ?>
                          <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','respect_post',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                        <?php } ?>
                        </li>
                        <?php } ?>
                        <!-- public and private -->
                        <?php 
                        if(isset($timeline_val)){ ?>
                        <li class="d-inline-flex">
                            <div class="form-check me-3">
                               <label class="form-check-label" for="flexRadioeditmedia5<?php echo $timeline_val->id ?>">
                                   <?php echo lang('public') ?>
                               </label>
                               <input class="form-check-input" value="1" type="radio" name="is_public"
                                   id="flexRadioeditmedia5<?php echo (isset($timeline_val->id)) ? $timeline_val->id : '' ?>" <?php echo ($timeline_val->timeline_ispublic==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('timeline','<?php echo $timeline_val->id ?>','1')" <?php echo ($timeline_val->timeline_ispublic==1) ? 'style="background:#90a792"' : '' ?>>
                            </div>
                            <div class="form-check">
                               <label class="form-check-label" for="flexRadioeditmedia6<?php echo $timeline_val->id ?>">
                                <?php echo lang('private') ?>
                               </label>
                               <input class="form-check-input" value="2" type="radio" name="is_public"
                                id="flexRadioeditmedia6<?php echo $timeline_val->id ?>" <?php echo ($timeline_val->timeline_ispublic==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('timeline','<?php echo $timeline_val->id ?>','2')"<?php echo ($timeline_val->timeline_ispublic==2) ? 'style="background:#90a792"' : '' ?>>
                            </div>
                        </li>
                        <?php } ?>
                         <!-- public and private end -->
                      <?php 
                      echo $val->user_id.'=='.get_frontauthuser('user_id');
                      if((checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','edit') && $val->user_id==get_frontauthuser('user_id')) ){
                       //|| (checkauth() && $val->profile_id==get_frontprofileid()) ?>
                        <li>
                          <a href="javascript:;" onclick="edit_respectpost(this,'<?php echo $val->id ?>')" class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;">Edit Post</a>
                        </li>
                      <?php } ?>
                      <?php
                      // echo checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','delete');
                      // echo $val->profile_id.'=='.get_frontprofileid();
                      if((checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','delete') && $val->user_id==get_frontauthuser('user_id')) ){ ?>
                        <li>
                          <a href="javascript:;" onclick="deleterespect_post(this,'<?php echo $val->id ?>')" class="cursor-pointer text-danger" style="z-index:1;text-decoration: none;"><?php echo lang('delete_post_text') ?> asdasasd</a>
                        </li>
                      <?php } ?>

                      </ul>
                    </div>
                    <!-- dropdown code end -->
                  <?php }
                  }else{ 
                    // print_r($val);print_r(get_userprofile_ids());
                    // echo $val->user_id.get_frontauthuser('user_id');
                    if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id) || in_array($val->profile_id, get_userprofile_ids())) )
                    {
                      
                     ?>
                    <!-- dropdown code -->
                    <div class="dropdown float-end" style="z-index: 999;cursor: pointer;">
                      <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" class="dropdown-toggle" data-bs-toggle="dropdown" style="width:20px;" class="edit-svgicon" alt="edit">
                      <ul class="dropdown-menu respect-dropdown" style="z-index:999 !important;left:auto !important;right: 0 !important;">                      
                      <?php 
                        if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id) && in_array($val->profile_id, get_userprofile_ids())) || (in_array($val->profile_id, get_userprofile_ids()) && checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','make_feature'))){
                        echo '<li>';
                        if($val->feature_post==1){ ?>
                        
                          <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','respect_post',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/><span style="margin-left:5px;"> <?php echo lang('is_feature') ?></span>
                        <?php }else{ ?>
                          <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','respect_post',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                        <?php } ?>
                        </li>
                      <?php }
                      if((checkauth() && get_frontauthuser('warden_user_id')==0 && (get_frontauthuser('user_id')==$val->user_id && in_array($val->profile_id, get_userprofile_ids()) ) ) ){ ?>
                      <!-- public and private -->
                        <li class="d-inline-flex">
                          <div class="form-check me-3">
                             <label class="form-check-label" for="flexRadioeditmedia5<?php echo $val->id ?>">
                                 <?php echo lang('public') ?>
                             </label>
                             <input class="form-check-input" value="1" type="radio" name="is_public"
                                 id="flexRadioeditmedia5<?php echo $val->id ?>" <?php echo ($val->respect_ispublic==1) ? 'checked="checked"' : '' ?>  onclick="savepublicprivate('respect_post','<?php echo $val->id ?>','1')" <?php echo ($val->respect_ispublic==1) ? 'style="background:#90a792"' : '' ?>>
                          </div>
                          <div class="form-check">
                             <label class="form-check-label" for="flexRadioeditmedia6<?php echo $val->id ?>">
                              <?php echo lang('private') ?>
                             </label>
                             <input class="form-check-input" value="2" type="radio" name="is_public"
                              id="flexRadioeditmedia6<?php echo $val->id ?>" <?php echo ($val->respect_ispublic==2) ? 'checked="checked"' : '' ?> onclick="savepublicprivate('respect_post','<?php echo $val->id ?>','2')"<?php echo ($val->respect_ispublic==2) ? 'style="background:#90a792"' : '' ?>>
                          </div>
                       </li>
                       <!-- public and private end -->
                      <?php 
                        }
                        
                      if((checkauth() && in_array($val->profile_id, get_userprofile_ids()) && checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','edit') && $val->user_id==get_frontauthuser('user_id')) || (checkauth() && $val->user_id==get_frontauthuser('user_id'))){
                      // echo $val->user_id.'=='.get_frontauthuser('user_id'); ?>
                        <li>
                          <a href="javascript:;" onclick="edit_respectpost(this,'<?php echo $val->id ?>')" class="cursor-pointer" style="z-index:1;color: #90a792;text-decoration: none;">Edit Post</a>
                        </li>
                      <?php } ?>
                      <?php
                      if((checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','delete') && $val->user_id==get_frontauthuser('user_id')) || (checkauth() && $val->profile_id==get_frontprofileid())){ ?>
                        <li>
                          <a href="javascript:;" onclick="deleterespect_post(this,'<?php echo $val->id ?>')" class="cursor-pointer text-danger" style="z-index:1;text-decoration: none;">Delete Post</a>
                        </li>
                      <?php } ?>

                      </ul>
                    </div>
                    <!-- dropdown code end -->
                  <?php } } ?>
               <div class="justify-content-end d-flex">
                <?php /* if(warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                     if(in_array($val->profile_id, explode(',', warden_groupprofilepermission()))){
                     ?>
                  <a href="javascript:;" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a>
                  <?php }
                }else{ ?>
                  <a href="javascript:;" onclick="edit_popup(this)"><img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/menu-dots-green.png" style="width:20px;" class="edit-svgicon" alt="edit"></a>

                <?php }*/ ?>
                  <!-- edit timeline post -->
                  <div class="hide class-editrespectpost<?php echo $val->id ?>">
                     <input type="hidden" name="profile_id" value="<?php echo $val->profile_id ?>">
                     <input type="hidden" name="respectpost_id" value="<?php echo $val->id ?>">
                     <div class="row">
                        
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
                              <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control">
                            </div>
                        </div>
                        <div class="col-12">
                           <img src="<?php UploadStorage::url( $val->respect_image, site_url('assets/frontend/uploads/' . get_defaultimage()->respect) ) ?>" width="70" alt="<?php echo $val->name ?>" onerror="this.onerror=null; this.src='<?php echo site_url('assets/frontend/uploads/' . get_defaultimage()->respect) ?>'"/>
                        </div>

                        <div class="row">
                           <div class="col-12">
                              <div class="mb-3">
                               <textarea class="form-control required" name="comment" placeholder="<?php echo lang('textarea_comment') ?>" id="exampleFormControlTextarea133" rows="3"><?php echo $val->comment ?></textarea>
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
                  <?php
                     if((checkauth() && checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','delete') && $val->user_id==get_frontauthuser('user_id')) || (checkauth() && $val->profile_id==get_frontprofileid())){
                         ?>
                  <a href="javascript:;" onclick="deleterespect_post(this,'<?php echo $val->id ?>')" class="float-end cursor-pointer" style="z-index:1;">
                  <img src="<?php echo base_url('assets/frontend/images/') ?>delete-icon.svg" style="width:25px !important;" class="delete-svgicon" alt="delete"/></a>
                  <?php }
                  if(checkwarden_permission(get_frontauthuser('warden_user_id'),'respect_post','make_feature')){
                     if($val->feature_post==1){ ?>
                  <input type="checkbox" onclick="setfeature_post(this,'<?php echo $val->id ?>','respect_post',0)" class="cursor-pointer white-text-underline-none" value="0" checked="checked" style="z-index:1;margin: 4px 0 0 3px;"/><span style="margin-left:5px;"> <?php echo lang('is_feature') ?></span>
                  <?php }else{ ?>
                  <input type="checkbox" value="1" onclick="setfeature_post(this,'<?php echo $val->id ?>','respect_post',1)" class="cursor-pointer white-text-underline-none" style="z-index:1; margin: 4px 0 0 3px;"> <?php echo lang('is_feature') ?>
                  <?php } } ?>
                  </div>
               </div>
               <?php } ?>
               <div
                  class="r-i-head d-flex align-items-center position-relative w-100">
                  <?php if ($val->respect_image =="undefined")
                        {
                            $rsi ="Respects.png";
                        }
                        else
                        {
                            $rsi =$val->respect_image;
                        }
                  ?>
                  <style type="text/css">
                    .respect-img{
                           background: url(https://staging-profile.memorisation.co.uk/assets/frontend/uploads/<?php echo $rsi; ?>);
                            width: 120px;
                            height: 88px;
                            background-size: cover;
                            border-radius: 50%;
                    }
                  </style>
                  <div class="pic d-flex align-items-center respect-img">
                     <!--<span>
                         <img src="<?php ///echo UploadStorage::url( $val->respect_image, site_url('assets/frontend/uploads/' . get_defaultimage()->respect) ) ?>"
                              width="70"
                              alt="<?php //echo $val->name ?>"
                              onerror="this.onerror=null; this.src='<?php //echo site_url('assets/frontend/uploads/' . get_defaultimage()->respect) ?>'"/>
                     </span>-->
                  </div>
                  <h3 class="comment-title">
                     <b><?php echo ucwords($val->name) ?></b> <?php echo lang('added_respect') ?> <br>
                     <span><?php echo time_elapsed_string($val->created_at,false) ?></span>
                  </h3>
                  <div class="r-i-dots">
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
                  <p><?php echo $val->comment ?></p>
               </div>
               <div class="action-palate d-flex my-2">

                  <?php if(1){ ?>
                  <a href="javascript:;"
                     class="d-flex justify-content-start align-items-center" onclick="postlike(this)" data-tablename="respect_post" data-postid="<?php echo $val->id ?>" class="postlikebtn"><img
                     src="<?php echo base_url('assets/frontend/images/') ?>/Like.png"> <span class="likecount"><?php echo postlike_helper($val->id,'respect_post') ?></span> Like</a>
                  <?php }else{ ?>
                  <a href="javascript:;"
                     class="d-flex justify-content-start align-items-center"><img
                     src="<?php echo base_url('assets/frontend/images/') ?>/Like.png"> <span class="likecount"><?php echo postlike_helper($val->id,'respect_post') ?></span> Like</a>
                  <?php } ?>
                  <a href="javascript:;"
                     class="d-flex respect-comment justify-content-start align-items-center add-comment-btn-section-respect" data-bs-toggle="respect-comment" data-bs-target="#respect_comment_form<?php echo $val->id ?>"><img
                     src="<?php echo base_url('assets/frontend/images/') ?>/Comment.png">Comment</a>
               </div>
            </div>
            <?php
               echo '<div id="respect_comment_form'.$val->id.'section" class="respect_comment_section ">';
               $respect_comment = respectpost_comment($val->id,'respect_post');
               if(isset($respect_comment) && !empty($respect_comment)){
               $this->load->view('respect_comment',['respect_comment'=>$respect_comment]);
               }
               echo '</div>';
               ?>
            <?php if(1){ ?>
            <form class="respect_comment tab-pane " id="respect_comment_form<?php echo $val->id ?>" method="post">
               <input type="hidden" name="postid" value="<?php echo $val->id ?>" />

               <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo (checkauth()) ? get_frontauthuser()['user_name'] : '' ?>"/>
               <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo (checkauth()) ? get_frontauthuser()['user_email'] : '' ?>"/>

               <textarea class="form-control" value="Dress" placeholder="Write your Comment"
                  id="exampleFormControlTextarea<?php echo $val->id ?>" rows="3" name="respect_comment_text"></textarea>
               <div class="col-12">
                  <div class="">
                     <button type="submit" class="btn btn-submit-request">Comment</button>
                  </div>
               </div>
            </form>
            <script>
               $(document).ready(function(){
                   let formid = '#respect_comment_form<?php echo $val->id ?>';

                   var comment_text = '';

                   var postid = $(formid).find('[name=postid]').val();
                   $('#exampleFormControlTextarea'+postid).keyup(function(){
                       comment_text = $(this).val();

                   })
                   $(formid).validate({
                       rules: {
                           respect_comment_text: "required",
                       },
                       submitHandler: function (form) {
                           var postname = $(formid).find('[name=name]').val();
                           var postemail = $(formid).find('[name=email]').val();
                           // console.log('postname,postemail',postname,postemail);
                           $('.recent-post-data .alert').remove();
                           var element = formid;
                           console.log('98',comment_text,postid);
                           $.ajax({
                               url: "respect_commentpost",
                               type: 'POST',
                               data: {'postid':postid,'respect_comment_text':comment_text,'name':postname,'email':postemail},
                               async: false,
                               dataType: 'json',
                               cache: false,
                               success: function (data) {
                                   console.log(data.body);
                                   $('[name=respect_comment_text]').val('');
                                   $(formid).toggleClass('show');
                                   if (data.status == true) {
                                       // console.log('asdad');
                                       $(formid+'section').html(data.body);
                                       $(formid+'section').prepend(data.message);
                                       var scroll=$(formid+'section');
                                       scroll.animate({scrollTop: scroll.prop("scrollHeight")});
                                       return false;
                                   } else {
                                       $('#media-upload').prepend('<div class="alert alert-success">' + data.message + '</div>');
                                       return false;
                                   }
                               }
                           });
                           return false;
                       }
                   });
               });
            </script>
            <?php } ?>
         </div>
      </div>
      <?php } }  ?>
   </div>
</div>
<?php }
if($no_datafound!='' || $no_datafound_status!=''){
      echo '<h2 class="no_record btn-norecord-message" style="margin-top:32px;">'.lang('no_record_found').'</h2>';
   }  ?>
<script type="text/javascript">
$(function() {
         // Owl Carousel
         var owl = $(".respectpostdata .owl-carousel");
         owl.owlCarousel({
           loop:false,
            margin:10,
            nav:true,
            slideBy:'page',
           navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
           responsive: {
               0: {
                     items: 1,
                     nav:true
               },
               600: {
                     items: 2
               },
               1000: {
                     items: 2
               }
            }
         });
       });

$('.owl-carousel').on('changed.owl.carousel', function(e) {
    console.log(e.page.index);
    $('button.owl-next').removeAttr('disabled');
    $('button.owl-prev').removeAttr('disabled');

   //  if ( ( e.page.index + 1 ) >= e.page.count ){
   //      $('.customNextBtn').attr('disabled', 'disabled').addClass('disabled');
   // $('.customNextBtn').removeAttr('disabled').removeClass('disabled');
   //  } else {
   // }
   $('.customNextBtn').removeAttr('disabled').removeClass('disabled');
    
   //  if ( e.page.index == 0 ){
   //      $('.customPreviousBtn').attr('disabled', 'disabled').addClass('disabled');
   //  } else {
   //      $('.customPreviousBtn').removeAttr('disabled').removeClass('disabled');
   //    }
      $('.customPreviousBtn').removeAttr('disabled').removeClass('disabled');

});
</script>
<style type="text/css">
.recent-post-data .owl-nav button{
   width:30px;
   background-color: #90a792;
   border-radius: 50%;
   padding: 3px !important;
}
.recent-post-data .owl-nav {
   /* display: block !important; */
   position: absolute;
   top: -15px;
   right: 0;
}
.owl-dots button {
    border: 5px solid #000 !important;
    margin: 10px !important;
    border-radius: 100%;
}
.journal-slider .owl-dots {
    position: absolute;
    bottom: 0;
    display: block !important;
    left: 0;
    right: 0;
    margin: auto;
    text-align: center;
    /* display: none !important; */
}
.respectpostdata .owl-dots {
    position: absolute;
    bottom: 0;
    display: block !important;
    left: 0;
    right: 0;
    margin: auto;
    text-align: center;
    display: none !important;
}
button.owl-dot.active {
    border-color: #90a792 !important;
}

</style>
