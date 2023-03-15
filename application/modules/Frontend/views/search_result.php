<section id="section-1">
   <div class="container-fluid">
   <div class="row align-items-start">
      <div class="col-12 col-md-12 d-flex">
         <nav class="navigation-custom">
            <div class="right-part d-none d-md-table">
               <div class="searchBox float-start">
                  <form action="<?php echo site_url('search-result')?>" method="post" id="search_profile">
                     <input type="search" name="search_val" placeholder="search memorisation profiles">

                     <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png" onClick="submitProfileForm()" />
                  </form>

               </div>
               <div class="notification">
                            <span><?php echo get_pending_count_user_wise() ?></span>
                            <i class="fa-sharp fa-solid fa-bell"></i>
                        </div>
               <div class="menu-btn d-table mx-2 float-start">
                  <a href="javascript:;" class="menu-btn-toggle"><span><img src="<?php echo site_url('assets/frontend/') ?>images/Menu.png" class="menu-line"> <img src="<?php echo site_url('assets/frontend/') ?>images/Close.svg" class="close"></span></a>
                  <nav class="sidebar">
                     <?php $this->load->view('navigation') ?>
                  </nav>
               </div>
            </div>
         </nav>
      </div>
   </div>
</section>
<?php if($this->session->flashdata('newprofile')){
   $userprofiledata = $this->commonmodel->getsingleData('user_profile',['id'=>$this->session->flashdata('newprofile')],'id,user_id,first_name,last_name,profile_url');
   // print_r($userprofiledata); exit();
   $this->load->view('qrcodegenerate',['userprofiledata'=>$userprofiledata]);
   } ?>
<section class="my-5">
   <div class="container">
   <div class="row">
      <div class="media-head-cover justify-content-md-between mb-5">
         <h2 class="head-title mt-3 mb-0"><?php echo lang('search_result') ?></h2>
         <div class="right-part d-table mt-md-3 mb-md-3">
            <div class="upload-media d-table float-start">
               <?php 
                  /*if(get_user_plan() =='free'){
                   if(user_profilecount()==0){ ?>
               <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
               <?php }
                  }elseif(get_user_plan() =='basic'){
                   if(user_profilecount()==0){ ?>
               <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
               <?php }elseif(user_profilecount()==1){ ?>
               <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
               <?php }
                  }else{ ?>
               <button type="button" class="btn btn-submit-request createprofile" data-bs-toggle="modal" data-bs-target="#createProfile" role="button" aria-expanded="false" aria-controls="collapseExample"><?php echo lang('create_new_profile') ?></button>
               <?php }*/
                  ?>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="alert alert-success profile-success hide"></div>
         <div class="alert alert-danger profile-error hide"></div>
         <?php echo ($this->session->flashdata('success')) ? '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>' : ''; ?>
         <?php echo ($this->session->flashdata('error')) ? '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' : ''; ?>
         <?php 
            if(isset($result_profile) && count($result_profile)>0){
            foreach($result_profile as $val){ ?>
         <div class="col-12 col-md-6 col-lg-4 mt-3">
            <div class="family-m-column d-flex justify-content-between">
               <div class="profile-img">
                  <span>
                  <a href="<?php echo site_url().'?profile='.$val->profile_url ?>">
                  <img src="<?php 
                     echo ($val->profile_pic!='') ? $val->profile_pic : site_url('assets/frontend/').'uploads/'.get_defaultimage()->profile_img ?>" style="width:100px;">
                  </a>
                  </span>
                  <p class="name-person"><a href="<?php echo site_url().'?profile='.$val->profile_url ?>"><?php echo ucwords($val->first_name.'<br>'.$val->last_name) ?></a></p>
               </div>
               <div class="bio-detail">
                  <div class="date mb-3 col-md-12">
                     <span><?php echo date_dmyformate($val->dob) ?></span>
                     <span><?php echo ($val->deceased!='') ? ' to '. date_dmyformate($val->deceased) : '' ?></span>
                  </div>
                  <div class="bio">
                     <p><?php echo $val->bio ?></p>
                  </div>
               </div>
            </div>
         </div>
         <?php }
            }else{
              echo '<h1>'.lang('no_result_found').'</h1>';
            } ?>
      </div>
   </div>
</section>