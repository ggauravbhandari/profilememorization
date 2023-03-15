<?php 
   if($this->session->userdata('frontuserdetail')){
       $checkuserplan = checkuserplan_forprofile();
   } 

   ?>
<ul>
   <?php if($this->session->userdata('frontuserdetail')){ ?>
   <li><a href="javascript:;">Hi <?php echo $this->session->userdata('frontuserdetail')['user_name'] ?>,</a></li>
   <?php if(familygroupcount() && familygroupcount()['ids']==1){ ?>
   <li><a href="<?php echo site_url('familymember').'/'.familygroupcount()['id'] ?>"><?php echo lang('menu_profile_group') ?></a></li>
   <?php }else{ ?>
   <li><a href="<?php echo site_url('familygroup') ?>"><?php echo lang('family_group') ?></a></li>
   <?php } ?>

   <?php /* 
      if(get_user_plan() =='free'){
          if(user_profilecount()==0){ ?>
   <li><a href="javascrip:;" class="createprofile" data-bs-toggle="modal" data-bs-target="#createProfile"><?php echo lang('add_new_profile')?></a></li>
   <?php }elseif(user_profilecount()==1){ ?>
   <li class="active"><a onclick="userprofleupdate(this,'<?php echo lang('edit_profile') ?>')" data-proid="<?php echo get_adminprofile() ?>" data-bs-toggle="modal" data-bs-target="#createProfile"><?php echo lang('edit_profile') ?></a></li>
   <?php }
      }elseif(get_user_plan() =='basic'){
          if(user_profilecount()==0){ ?>
   <li><a href="javascrip:;" class="createprofile" data-bs-toggle="modal" data-bs-target="#createProfile"><?php echo lang('add_new_profile')?></a></li>
   <?php }elseif(user_profilecount()==1){ ?>
   <li class="active"><a href="<?php echo site_url('familygroup') ?>"><?php echo lang('edit_profile') ?></a></li>
   <li><a href="javascrip:;" class="createprofile" data-bs-toggle="modal" data-bs-target="#createProfile"><?php echo lang('add_new_profile')?></a></li>
   <?php }elseif(user_profilecount()==2){ ?>
   <li class="active"><a href="<?php echo site_url('familygroup') ?>"><?php echo lang('edit_profile') ?></a></li>
   <?php }
      }else{
          if(user_profilecount()==0){ ?>
   <li><a href="javascrip:;" class="createprofile" data-bs-toggle="modal" data-bs-target="#createProfile"><?php echo lang('add_new_profile')?></a></li>
   <?php }else{ ?>
   <li class="active"><a href="<?php echo site_url('familygroup') ?>"><?php echo lang('edit_profile') ?></a></li>
   <li><a href="javascrip:;" class="createprofile" data-bs-toggle="modal" data-bs-target="#createProfile"><?php echo lang('add_new_profile')?></a></li>
   <?php }
      }
      */
      ?>
   <!--<li class="active"><a href="javascrip:;" onclick="userprofleupdate(this,'<?php echo (isset($checkuserplan['menu_text'])) ? $checkuserplan['menu_text']  :'Profile' ?>')" <?php echo (isset($checkuserplan['editprofile']) && $checkuserplan['editprofile']) ? 'data-proid="'.$checkuserplan['editprofile'].'"' : '' ?> data-bs-toggle="modal" data-bs-target="#createProfile"><?php echo $checkuserplan['menu_text'] ?></a></li>-->
   <?php if(checkauth()){ ?>
   <li><a href="<?php echo site_url('dashboard') ?>" class="serv-btn"><?php echo lang('menu1')?><b><?php
  
    echo "( ".get_pending_count_user_wise(). " )"; //print_r(get_userprofile_ids()); ?> </b><!--<span class="fas fa-caret-down second"></span>--></a></li>
   <?php } ?>
   <li><a href="https://memorisation.co.uk/shop/" target="_blank"><?php echo lang('order_QR_keepskae')?></a></li>
   
   <li><a href="<?php echo site_url('qr_keepsake') ?>"><?php echo lang('QR_keepskae')?></a></li>
   <!-- <li><a href="<?php //echo site_url('dashboard') ?>"><?php //echo lang('menu1')?></a></li> -->
   <?php }else{ ?>
   <li><a href="javascrip:;" data-bs-toggle="modal" data-bs-target="#login-modal"><?php echo lang('login')?>  </a>  </li>
   <!-- <li><a href="javascrip:;" data-bs-toggle="modal" data-bs-target="#signupModal"><?php echo lang('signup')?> </a>  </li> -->
   <?php } ?>
   
   <?php 
   $pro_id = get_frontprofileid();
   if(isset(get_userprofile($pro_id)->profile_name) && get_userprofile($pro_id)->profile_name!=''){ ?>
   <li><a href="javascrip:;" data-bs-toggle="modal" data-bs-target="#qrcode_modal"><?php echo lang('qr_code')?></a></li>
   <?php } ?>
   
   <!-- <li><a href="https://memorisation.co.uk/shop/" target="_blank"><?php echo lang('QR_keepskae')?></a></li> -->
   <li><a href="https://memorisation.co.uk/contact-2/" target="_blank"><?php echo lang('contact_us')?></a></li>
   <?php if($this->session->userdata('frontuserdetail')){  ?>
   <li><a href="javascrip:;" data-bs-toggle="modal" data-bs-target="#changepassword-modal"><?php echo lang('change_password')?></a></li>
   <li><a href="<?php echo site_url('user-logout') ?>"><?php echo lang('menu3') ?></a></li>
   <?php } ?>
</ul>