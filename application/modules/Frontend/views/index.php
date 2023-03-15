<script src="https://foliotek.github.io/Croppie/croppie.js"></script>

<link href="https://foliotek.github.io/Croppie/croppie.css" rel="stylesheet" />

<style>
.media-playbtn{
    position: relative;
    top: 110px;
    left: 40%;
    border: 1px solid #fff;
    border-radius: 50%;
    padding: 5px 10px;
    background: #fff;
}
.lifeof-adddetail{
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
    color: #fff;
}
.lifeof-adddetail:hover{
    color: #fff;
}
ul.dropdown-menu.show li {
    font-style: normal;
}
.customNextBtn.disabled,.customPreviousBtn.disabled {
    visibility: hidden;
    /*opacity: 0.4;*/
}
.hidden-submit-request{
    visibility: hidden;
}
.theme-icon-color{
    color: #90A792 !important;
}
label.cabinet {

    display: block;

    cursor: pointer;

}

label.cabinet input.file {

    position: relative;

    /* height: 100%; */

    width: auto;

    opacity: 0;

    -moz-opacity: 0;

    filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0);

    margin-top: -30px;

}



#upload-demo {

    width: 250px;

    height: 250px;

    padding-bottom: 25px;

}



figure figcaption {

    position: absolute;

    bottom: 0;

    color: #fff;

    width: 100%;

    padding-left: 9px;

    padding-bottom: 5px;

    text-shadow: 0 0 10px #000;

}



.person-pic span img {

    object-fit: cover !important;

}

.r-i-content p {

    word-wrap: break-word;
    font-weight: normal;

}

.respect_comment_section {
    max-height: 300px;
    overflow: auto;
}

.white-text-underline-none,
.white-text-underline-none:hover {

    color: #fff;

    text-decoration: none;

}

.image-media-modal .modal-body .image-d {

    height: auto !important;

}

.feature-desc-text {

    width: 215px;

    word-break: break-all;

}

.form-check-input:checked[type=radio] {

    background-color: #90a792;

}



.life-like.d-flex.flex-wrap {
    width: 50px;
}
</style>



<section id="section-1">

    <div class="container-fluid">

        <div class="row align-items-start">

            <div class="col-12 col-md-5">

                <div class="row">




                    <div class="profile-pic"
                        <?php

                        echo (isset($userprofile_data) && $userprofile_data['background_img'] != '' ) ? 'style="background:url('. UploadStorage::url( $userprofile_data['background_img'] ) .');background-repeat: no-repeat; background-size: cover;"' : 'style="background:url(' .site_url('assets/frontend/uploads/').get_defaultimage()->background_img.');background-repeat: no-repeat; background-size: cover;"'; ?>>

                        <!-- <div class="logo d-none d-md-flex"> profile-banner.png

                        <img src="<?php echo site_url('assets/frontend/') ?>images/Memorisation.png" />

                        </div> -->

                        <div class="profile-name">

                            <!-- <img src="<?php echo site_url('assets/frontend/') ?>images/daniel-1.png"> -->

                        </div>

                        <div class="profile-msg">

                            <p>

                                <?php echo (isset($userprofile_data) && $userprofile_data['tagline']!='') ? ''.$userprofile_data['tagline'].'' : '“Always in Our thoughts, Forever in Our Hearts.”' ?>



                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-12 col-md-7">

                <nav class="navigation-custom">
                    <?php if($this->session->flashdata('error_msg')){ ?>
                    <span class="text-danger"><?php echo $this->session->flashdata('error_msg'); ?></span>
                    <?php } ?>

                    <div class="right-part d-none d-md-table">

                        <div class="searchBox float-start">
                            <form action="<?php echo site_url('search-result')?>" method="post" id="search_profile">
                                <input type="search" name="search_val" placeholder="search memorisation profiles">

                                <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png"
                                    onClick="submitProfileForm()" />
                            </form>

                        </div>
                        <?php if(checkauth()){ ?>
                        <div class="notification">
                            <span><?php echo get_pending_count_user_wise() ?></span>
                            <a href="<?php echo (checkauth()) ? site_url('dashboard') : '#' ?>"><i class="fa-sharp fa-solid fa-bell"></i></a>
                        </div>

                        <?php } ?>
                        <div class="menu-btn d-table mx-2 float-start">

                            <a href="javascript:;" class="menu-btn-toggle"><span><img
                                        src="<?php echo site_url('assets/frontend/') ?>images/Menu.png"
                                        class="menu-line"> <img
                                        src="<?php echo site_url('assets/frontend/') ?>images/Close.svg"
                                        class="close"></span></a>

                            <nav class="sidebar">

                                <?php $this->load->view('navigation') ?>

                            </nav>

                        </div>

                    </div>

                </nav>

                <div class="person-detail">

                    <?php

                    echo ($this->session->flashdata('error')) ? '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' : ''; ?>



                    <div class="person-pic">

                        <span>

                            <?php

                    //  if(checkauth()){

                     if(isset($userprofile_data) && $userprofile_data['profile_pic']!=''){

                         echo '<img src="'. UploadStorage::url( $userprofile_data['profile_pic'] ) .'">';

                        }else{ ?>

                            <img src="<?php echo site_url('assets/frontend/') ?>uploads/<?php echo get_defaultimage()->profile_img ?>">

                            <?php }

                     //}else{ get_defaultimage()->memory ?>

                            <!-- <img src="<?php echo site_url('assets/frontend/') ?>images/pic-thumb.png"> -->

                            <?php //} ?>

                        </span>

                        <span class="blur"></span>

                        <p class="light-color remember">Remembering</p>

                        <h2 class="person-name"> <b>|</b>

                            <?php if(isset($userprofile_data)){ 
                                echo (isset($userprofile_data) && $userprofile_data['first_name']!='') ? ucfirst($userprofile_data['first_name']).' '.ucfirst($userprofile_data['last_name']) : '';
                                }else{
                                    echo lang('dummy_profile_name');
                                } ?>

                        </h2>

                        <p class="life-date">

                            <?php if(isset($userprofile_data) && $userprofile_data['dob']!=''){

                        echo date_dmyfullformat($userprofile_data['dob']);

                        }

                        if(isset($userprofile_data) && $userprofile_data['deceased']!='' && $userprofile_data['deceased']!=null){

                           echo '-'.date_dmyfullformat($userprofile_data['deceased']);

                        }

                        if(!isset($userprofile_data)){

                        '2nd April 1982 - 15th Jan 2020';} ?>

                        </p>

                        <p class="address light-color">

                            <?php if(isset($userprofile_data)){
                                echo (isset($userprofile_data) && $userprofile_data['location']!='') ? '<img
                                src="'.site_url('assets/frontend/').'images/Location.png" />'.$userprofile_data['location'] : '';
                                }else{
                                    echo '<img
                                src="'.site_url('assets/frontend/').'images/Location.png" />'.lang('dummy_profile_address');
                                } ?>

                        </p>

                    </div>

                    <div class="social d-flex mt-2">

                        <?php if(isset($userprofile_data) && $userprofile_data['facebook_link']!=''){

                     echo '<a href="'.$userprofile_data['facebook_link'].'" target="_blank"><img src="'.site_url('assets/frontend/images/facebook-1.png').'" class="rounded float-end" alt="..."></a>';

                     }

                     if(isset($userprofile_data) && $userprofile_data

                     ['instagram_link']!=''){

                        echo '<a href="'.$userprofile_data['instagram_link'].'" target="_blank"><img src="'.site_url('assets/frontend/images/Instagram.png').'" class="rounded float-end" alt="..."></a>';

                     }

                     if(isset($userprofile_data) && $userprofile_data['twitter_link']!=''){

                        echo '<a href="'.$userprofile_data['twitter_link'].'" target="_blank"><img src="'.site_url('assets/frontend/images/Twitter.png').'" class="rounded float-end" alt="..."></a>';

                     }
                     
                    $pro_id = get_frontprofileid();
                    if(isset(get_userprofile($pro_id)->profile_name) && get_userprofile($pro_id)->profile_name!=''){ ?>

                        <a href="javascript:void(0)" data-bs-toggle="modal"
                            data-bs-target="#qrcode_modal"><img
                                src="<?php echo site_url('assets/frontend/') ?>images/Share.png"
                                class="rounded float-end" alt="..."></a>

                     <?php }

                     if(!isset($userprofile_data)){ ?>

                        <a href="javascript:void(0)"><img
                                src="<?php echo site_url('assets/frontend/') ?>images/facebook-1.png"
                                class="rounded float-end" alt="..."></a>

                        <a href="javascript:void(0)"><img
                                src="<?php echo site_url('assets/frontend/') ?>images/Instagram.png"
                                class="rounded float-end" alt="..."></a>

                        <a href="javascript:void(0)"><img
                                src="<?php echo site_url('assets/frontend/') ?>images/Twitter.png"
                                class="rounded float-end" alt="..."></a>

                        <a href="javascript:void(0)"><img
                                src="<?php echo site_url('assets/frontend/') ?>images/Share.png"
                                class="rounded float-end" alt="..."></a>

                    <?php } ?>

                    </div>

                    <?php
                        $profile_id = "";
                        if(isset($userprofile_data))
                        {
                            $profile_id = $userprofile_data['id'];
                        }
                     ?>
                    <div class="person-bio mt-3">

                        <p>

                            <?php echo (isset($userprofile_data) && $userprofile_data['bio']!='') ? $userprofile_data['bio'] : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 

                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat' ?>
                            <?php if(checkauth() && get_userprofile(get_frontprofileid())->user_id==get_frontauthuser('user_id') &&  get_frontauthuser('warden_user_id')==0){ ?>
                            <span class="edit-btn"><a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#edit-popup" style="text-decoration: none;color: #90a792;font-weight: bolder;font-size: 20px;">...</a></span>
                            <?php } ?>
                        </p>

                    </div>
                    <?php echo ($this->session->flashdata('success_subscribe')) ? '<div class="alert alert-success">'.$this->session->flashdata('success_subscribe').'</div>' : ''; ?>
                    <?php echo ($this->session->flashdata('success_unsubscribe')) ? '<div class="alert alert-success">'.$this->session->flashdata('success_unsubscribe').'</div>' : ''; ?>
                    <?php echo ($this->session->flashdata('success_linkprofile')) ? '<div class="alert alert-success">'.$this->session->flashdata('success_linkprofile').'</div>' : '';
                     ?>

                    <div class="button-g d-flex">
                        <?php
                        if(get_frontprofileid()){ ?>
                        <button class="dark-btn" data-bs-toggle="modal"
                            data-bs-target="#subscribe-modal"><?php echo lang('subscribe') ?></button>
                        <?php }
                     if(isset($userprofile_data)){
                        $profile_id = $userprofile_data['id'];
                        $this->db->select('*');
                        $this->db->where('profile_id',$profile_id);
                        $donation = $this->db->get('user_donation')->result_array();
                        if(!empty($donation))
                        {
                           ?>
                        <button class="dark-btn flex-grow-1 ms-2" data-bs-toggle="modal"
                            data-bs-target="#donate-modal">Donate</button>
                        <?php
                        }
                     }
                     ?>

                    </div>

                    <div class="family-group">
                        <h4>
                        <?php
                        if($profile_id!="")
                        {
                            $this->db->where('id', $profile_id);
                            $q = $this->db->get('user_profile');
                            $get_user_by_profile = $q->result_array();
                            $uid = "";
                            if(!empty($_SESSION['frontuserdetail']['user_id']))
                            {
                                $uid = $get_user_by_profile[0]['user_id'];
                                $loguid= $_SESSION['frontuserdetail']['user_id'];
                                if($uid == $loguid)
                                {
                                    if(isset($family_group_id) && $family_group_id!=''){
                                    ?>
                                    <a href="<?php echo site_url('familymember/'.$family_group_id) ?>"><?php echo lang('family_members') ?></a>
                                <?php }else{ ?>
                                    <a href="<?php echo site_url('familygroup/') ?>"><?php echo lang('family_group') ?></a>
                                    <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <a href="<?php echo site_url('profile_familygroup/'.$profile_id) ?>"><?php echo lang('family_group') ?></a>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <a href="<?php echo site_url('profile_familygroup/'.$profile_id) ?>"><?php echo lang('family_members') ?></a>
                                    <?php
                            }

                        }
                        ?>
                    </h4>
                    <ul class="d-flex">

                            <?php
                        //echo '<pre>';print_r($profile_list);echo '</pre>';
                        if(isset($profile_list) && count($profile_list)>0){

                           foreach($profile_list as $pro_val){ ?>

                            <li>
                                <?php if(isset($pro_val->thumbnail) && $pro_val->thumbnail!=''){
                                    
                                    //$pro_val->thumbnail : site_url('assets/frontend/').'uploads/50x50.png' ?>
                                <img src="<?php echo ($pro_val->thumbnail!='') ? $pro_val->thumbnail : $pro_val->profile_pic ?>" onerror="this.onerror=null; this.style.display='none'">
                                <?php }elseif(UploadStorage::url( $userprofile_data['profile_pic'] )!=''){ 
                                    ?>
                                    <img src="<?php echo $pro_val->profile_pic;//UploadStorage::url( $userprofile_data['profile_pic'] ) ?>" onerror="this.onerror=null; this.src='<?php echo site_url('assets/frontend/').'uploads/'.get_defaultimage()->profile_img ?>'">
                                <?php }else{ ?>
                                <img src="<?php echo site_url('assets/frontend/').'uploads/50x50.png' ?>" onerror="this.onerror=null; this.src='<?php echo site_url('assets/frontend/').'uploads/'.get_defaultimage()->profile_img ?>'">
                                <?php } ?>

                            </li>

                            <?php

                           }

                           ?>

                            <li><span>

                                    <?php echo ((count($profile_list)>3) ? '+' : '') . count($profile_list).'</span></li>';

                        } ?>

                                    <!-- <li><img src="<?php echo site_url('assets/frontend/') ?>images/2.png"></li>

                        <li><img src="<?php echo site_url('assets/frontend/') ?>images/1.png"></li> -->

                        </ul>
                        <?php
                        if($profile_id!="")
                        {
                            $this->db->where('id', $profile_id);
                            $q = $this->db->get('user_profile');
                            $get_user_by_profile = $q->result_array();
                            $uid = "";
                            if(!empty($_SESSION['frontuserdetail']['user_id']))
                            {
                                $uid = $get_user_by_profile[0]['user_id'];
                                $loguid= $_SESSION['frontuserdetail']['user_id'];
                                if($uid == $loguid)
                                {
                                    if(isset($family_group_id) && $family_group_id!=''){
                                    ?>
                                    <a style="margin-top: 12px !important;" href="<?php echo site_url('familymember/'.$family_group_id) ?>"><?php echo lang('view_all') ?></a>
                                    <?php }else{ ?>
                                    <a style="margin-top: 12px !important;" href="<?php echo site_url('familygroup/') ?>"><?php echo lang('view_all') ?></a>
                                    <?php
                                    }
                                    /* ?>
                                    <a href="<?php echo site_url('familygroup/') ?>"><?php echo lang('view_all') ?></a>
                                    <?php */
                                }
                                else
                                {
                                    ?>
                                    <a style="margin-top: 12px !important;" href="<?php echo site_url('profile_familygroup/'.$profile_id) ?>"><?php echo lang('view_all') ?></a>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                    <a style="margin-top: 12px !important;" href="<?php echo site_url('profile_familygroup/'.$profile_id) ?>"><?php echo lang('view_all') ?></a>
                                    <?php
                            }

                        }

                       ?>
                    </div>


                </div>

            </div>

        </div>

    </div>

</section>



<section id="section-2">

    <div class="container-fluid container-md">

        <div class="row">

            <!--<div class="about-sec d-none d-md-flex justify-content-between">



                <div class="right-part d-table">

               <div class="searchBox float-start">

                   <input type="search" placeholder="Search">

                   <img src="<?php //echo site_url('assets/frontend/') ?>images/Search.png" />

               </div>

               <div class="grid-btn d-table mx-2 float-start">

                   <span><img src="<?php //echo site_url('assets/frontend/') ?>images/sort.png"></span>

               </div>

               </div>

             </div>-->

            <div class="tab-parent">

                <ul class="nav nav-pills mb-md-3 d-flex justify-content-between" id="pills-tab" role="tablist">

                    <li class="nav-item d-none d-md-block" role="presentation">

                        <a href="#pills-home" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true" onclick="getfeature_post(this)"> <span><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Time Line.svg"> <img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Time Line-hover.svg"></span>

                            <?php echo lang('featured_posts') ?>

                        </a>

                    </li>

                    <li class="nav-item" role="presentation">

                        <a href="#pills-profile" class="nav-link scroll" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false"><span><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Life-of.svg"> <img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Life-of.svg"></span>

                            <?php echo lang('life_of') ?>

                        </a>

                    </li>

                    <li class="nav-item" role="presentation">

                        <a href="#pills-  s" class="nav-link scroll" id="pills-connection-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-memories" type="button" role="tab" aria-controls="pills-connection"
                            aria-selected="false"> <span><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Connections.svg"> <img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Connections.svg"></span>

                            <?php echo lang('memories') ?>

                        </a>

                    </li>

                    <li class="nav-item" role="presentation">

                        <a href="#pills-contact" class="nav-link scroll" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                            aria-selected="false"><span><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Time Line.svg"> <img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Time Line.svg"></span>

                            <?php echo lang('timeline') ?>

                        </a>

                    </li>

                    <li class="nav-item" role="presentation">

                        <a href="#pills-respect" class="nav-link scroll mb-" id="pills-respect-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-respect" type="button" role="tab"
                            aria-controls="pills-respect" aria-selected="false"> <span><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Repects.svg"> <img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Repects.svg"></span>

                            <?php echo lang('respects') ?>

                        </a>

                    </li>

                    <li class="nav-item" role="presentation">

                        <a href="#pills-media" class="nav-link scroll" id="pills-media-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-media" type="button" role="tab" aria-controls="pills-media"
                            aria-selected="false"> <span><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Media.svg">

                                <img src="<?php echo site_url('assets/frontend/') ?>images/Media.svg"></span>

                            <?php echo lang('media') ?>

                        </a>

                    </li>

                    <li class="nav-item" role="presentation">

                        <a href="#pills-journal" class="nav-link scroll" id="pills-journal-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-journal" type="button" role="tab" aria-controls="pills-journal"
                            aria-selected="false"><span><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Journal.svg"> <img
                                    src="<?php echo site_url('assets/frontend/') ?>images/Journal.svg"></span>

                            <?php echo lang('journal') ?>

                        </a>

                    </li>

                </ul>

                <!-- <div id="scroll" class="d-block d-md-none py-4" style="height: "140px"></div> -->

                <div class="tab-content" id="pills-tabContent">

                    <!--feature post -->

                    <div class="tab-pane fade show active life-of featured" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">

                        <h2 class="head-title d-md-none mt-md-5 mx-auto">

                            <?php echo lang('featured_posts') ?>

                        </h2>
                        <!-- <div class="right-part d-table mt-md-3 mb-md-3 w-100">
                            <div class="upload-media d-table float-end">
                                <button type="button" class="btn btn-submit-request hidden-submit-request" data-bs-toggle="collapse" href="#shareMemory" >hidden button
                                </button>
                            </div>
                        </div> -->
                        <div class="row feature_post_row">

                            <?php

                              echo $this->load->view('single-featurepost',['middelsection'=>$middelsection]);

                           ?>



                        </div>

                    </div>

                    <!--feature post end -->

                    <!-- lifeof post -->

                    <div class="tab-pane fade life-of" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">

                        <div class="media-head-cover justify-content-md-between">

                            <h2 class="head-title mt-3 mb-0  d-none">Life Of</h2>

                        </div>
                        <div class="right-part d-table mt-md-3 mb-md-3 w-100">
                            <div class="upload-media d-table float-end">
                                <button type="button" class="btn btn-submit-request hidden-submit-request" data-bs-toggle="collapse" href="#shareMemory">hidden button
                                </button>
                            </div>
                            <div class="alert alert-success lifeofsection-sucess hide">
                                Updated Successfully
                            </div>
                        </div>
                        <div class="row" id="lifeof_loop">

                            <?php

                              // print_r($middelsection);

                              if(isset($middelsection)){

                              $this->load->view('lifeof_postloop',['middelsection'=>$middelsection]);

                              }else{

                                 echo lang('no_data_found');

                              } ?>

                        </div>

                    </div>

                    <!-- lifeof post end -->

                    <div class="tab-pane fade life-of" id="pills-memories" role="tabpanel"
                        aria-labelledby="pills-profile-tab">

                        <div class="media-head-cover justify-content-md-between">

                            <h2 class="head-title mt-3 mb-0  d-none"><?php echo lang('memories') ?></h2>

                            <?php

                             if(get_frontprofileid()){ ?>

                            <div class="right-part d-table mt-md-3 mb-md-3 w-100">

                                <div class="upload-media d-table float-end">

                                    <button type="submit" class="btn btn-submit-request sharememory-btn"
                                        data-bs-toggle="collapse" href="#shareMemory" role="button"
                                        aria-expanded="false"
                                        aria-controls="collapseExample"><?php echo lang('share_memory') ?>

                                    </button>

                                </div>

                            </div>

                            <?php }else{ ?>
                                <div class="right-part d-table mt-md-3 mb-md-3 w-100">
                                    <div class="upload-media d-table float-end">
                                        <button type="button" class="btn btn-submit-request hidden-submit-request" data-bs-toggle="collapse" href="#shareMemory">hidden button
                                        </button>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>



                        <div class="collapse" id="shareMemory">

                            <form action="<?php //echo site_url('memoriespost') ?>" method="post" id="shareMemory-form"
                                enctype="multipart/form-data">

                                <div class="row">
                                    <?php //echo "<pre>";print_r($_SESSION);
                                        //echo "<pre>";print_r($_REQUEST);
                                    ?>
                                    <input type="hidden" name="profile_id"
                                        value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />

                                    <div class="col-12 col-md-3">

                                        <div class="mb-3">

                                            <input type="text" placeholder="<?php echo lang('title') ?>"
                                                class="form-control required" id="exampleInputEmail1title" value=""
                                                aria-describedby="emailHelp" name="title">

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-3">

                                        <div class="mb-3">

                                            <input type="text" placeholder="<?php echo lang('name') ?>"
                                                class="form-control <?php echo (!checkauth()) ? 'required' : '' ?>" id="exampleInputEmail1name"
                                                aria-describedby="emailHelp"
                                                value="<?php echo (checkauth()) ? get_frontauthuser('user_name') : '' ?>"
                                                <?php echo (checkauth()) ? 'readonly' : '' ?> name="name">

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-3">

                                        <div class="mb-3">

                                            <input type="email" placeholder="<?php echo lang('email') ?>"
                                                class="form-control <?php echo (!checkauth()) ? 'required' : '' ?>" name="email" id="exampleInputPassword128"
                                                value="<?php echo (checkauth()) ? get_frontauthuser('user_email') : '' ?>"
                                                <?php echo (checkauth()) ? 'readonly' : '' ?>>

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-3">

                                        <div class="input-group mb-3" style="padding-top:10px !important">

                                            <input type="text" class="add-image-input" placeholder="<?php echo lang('upload_image_video') ?>"
                                                class="form-control" id="exampleInputPassword121" style="width: calc(100% - 135px);">

                                            <input type="file" name="memoryimage" class="form-control visually-hidden"
                                                id="inputGroupFile06" accept=".png, .jpg, .jpeg,.mp4,.mp3,.wma">

                                            <label class="input-group-text add-image" for="inputGroupFile06">

                                                <?php echo lang('add_image_video') ?>

                                            </label>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="mb-3">

                                            <textarea class="form-control required" name="comment"
                                                placeholder="<?php echo lang('textarea_comment') ?>"
                                                id="exampleFormControlTextarea133" rows="3"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex mt-2 form-radio">
                                            <div class="form-check me-3">
                                                <label class="form-check-label" for="flexRadioDefault3memoryispublic">
                                                    Public
                                                </label>
                                                <input class="form-check-input" type="radio" name="memory_ispublic" value="1" id="flexRadioDefault3memoryispublic" checked="">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="flexRadioDefault3memoryisprivate">
                                                    Private
                                                </label>
                                                <input class="form-check-input" type="radio" name="memory_ispublic" value="2" id="flexRadioDefault3memoryisprivate">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="mb-3 d-flex">

                                            <button type="submit" name="submit"
                                                class="btn btn-submit-request"><?php echo lang('submit') ?></button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                        <div class="row memories-postdata">

                            <?php echo $this->load->view('memories_postdata'); ?>

                        </div>

                    </div>

                    <div class="tab-pane fade timeline-parent" id="pills-contact" role="tabpanel"
                        aria-labelledby="pills-contact-tab">

                        <div class="media-head-cover time-line-cover justify-content-md-between">

                            <h2 class="head-title mt-3 mb-0  d-none"><?php echo lang('timeline') ?></h2>
                            <?php
                             if($this->session->userdata('frontuserdetail') && get_userprofile(get_frontprofileid())->user_id== get_frontauthuser('user_id')){ ?>
                            <?php //if($this->session->userdata('frontuserdetail') && ){ ?>

                            <div class="right-part d-table mt-md-3 mb-md-3 w-100">

                                <div class="upload-media d-table float-end">
                                    <?php
                                    if(checkauth() && warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                                    if(in_array(get_frontprofileid(), explode(',', warden_groupprofilepermission()))){ ?>
                                    <button type="submit" class="btn btn-submit-request timeline-media-form"
                                        data-bs-toggle="collapse" href="#timeline-form" role="button"
                                        aria-expanded="false"
                                        aria-controls="collapseExample"><?php echo lang('add_timeline') ?></button>

                                <?php } }else{ ?>
                                <button type="submit" class="btn btn-submit-request timeline-media-form"
                                        data-bs-toggle="collapse" href="#timeline-form" role="button"
                                        aria-expanded="false"
                                        aria-controls="collapseExample"><?php echo lang('add_timeline') ?></button>
                                <?php } ?>

                                </div>

                            </div>

                            <?php }else{ ?>
                                <button type="button" class="btn btn-submit-request timeline-media-form hidden-submit-request"
                                        data-bs-toggle="collapse" href="javascript:;"><?php echo lang('add_timeline') ?></button>
                            <?php } ?>

                        </div>

                        <div class="collapse" id="timeline-form">

                            <form action="<?php //echo site_url('profile-timeline') ?>" method="post"
                                id="timeline-formvalidationnew" onsubmit="return false" enctype="multipart/form-data">

                                <input type="hidden" name="profile_id"
                                    value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />

                                <div class="row">

                                    <div class="col-12 col-md-6">

                                        <div class="mb-3">

                                            <input type="text" name="title" placeholder="<?php echo lang('title') ?>"
                                                class="form-control required" id="exampleInputEmail153"
                                                aria-describedby="emailHelp">

                                        </div>

                                    </div>
                                    <div class="col-12 col-md-6">

                                        <div class="input-group mb-3 imagegroup_cus" style="padding-top:10px">

                                            <input type="text" class="add-image-input" style="border-color: red;" 
                                                placeholder="Upload Image" class="form-control"
                                                id="exampleInputPasswordtimeline122">

                                            <input type="file" name="timelineimage"
                                                class="form-control visually-hidden" id="inputGroupFile07"
                                                accept=".png, .jpg, .jpeg">

                                            <label class="input-group-text add-image required" for="inputGroupFile07" style="border-radius: 0 50px 50px 0;">

                                                <?php echo lang('add_image') ?>

                                            </label>

                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-5">

                                        <div class="mb-3">

                                            <input type="text" name="title_for_date"
                                                placeholder="<?php echo lang('title_for') ?>"
                                                class="form-control required" id="exampleInputTitledate153"
                                                aria-describedby="emailHelp" require>

                                        </div>

                                    </div>
                                    <div class="col-12 col-md-7">

                                        <div class="mb-3">

                                            <div class="input-group date-select">
                                                <span class="col-md-5">
                                                    <input type="text" name="from_date"
                                                        class="form-control required datepicker_input"
                                                        placeholder="DD/MM/YYYY" autocomplete="off" id="datepicker1"
                                                        readonly>
                                                </span>
                                                <div class="input-group-addon">to</div>
                                                <span class="col-md-5">
                                                    <input type="text" name="to_date"
                                                        class="form-control datepicker_input" placeholder="DD/MM/YYYY"
                                                        autocomplete="off" id="datepicker2" readonly>
                                                </span>
                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-12">

                                        <div class="mb-3">

                                            <textarea class="form-control required" name="description"
                                                placeholder="<?php echo lang('share_timeline') ?>"
                                                id="exampleFormControlTextarea132" rows="3"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex mt-2 form-radio">
                                            <div class="form-check me-3">
                                                <label class="form-check-label" for="flexRadioDefault3timelineispublic">
                                                    Public
                                                </label>
                                                <input class="form-check-input" type="radio" name="timeline_ispublic" value="1" id="flexRadioDefault3timelineispublic" checked="">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="flexRadioDefault3timelineisprivate">
                                                    Private
                                                </label>
                                                <input class="form-check-input" type="radio" name="timeline_ispublic" value="2" id="flexRadioDefault3timelineisprivate">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">

                                        <div class="mb-3 d-flex">

                                            <button type="submit" name="submit" class="btn btn-submit-request">

                                                <?php echo lang('submit') ?>

                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                        <!-- The Timeline -->

                        <div class="timeline-postloop">

                            <!-- Item 1 -->

                            <?php

                              if(isset($middelsection)){

                                 echo $this->load->view('timeline_post',['middelsection'=>$middelsection]);

                              }else{

                                 echo lang('no_data_found');

                              } ?>

                        </div>

                    </div>

                    <div class="tab-pane fade respect" id="pills-respect" role="tabpanel"
                        aria-labelledby="pills-respect-tab">

                        <div class="media-head-cover d-md-flex justify-content-end mr-5">

                            <h2 class="head-title mt-0 d-none">Respect</h2>

                            <div class="right-part d-table py-md-3 w-md-100">

                                <?php
                                 //if($this->session->userdata('frontuserdetail') && get_userprofile(get_frontprofileid())->user_id== get_frontauthuser('user_id')){
                                    if(get_frontprofileid())
                                    // if(checkauth() )
                                    { ?>

                                <div class="upload-media d-table float-start">

                                    <button type="submit" class="btn btn-submit-request mb-3 mb-md-0"
                                        style="margin-top:0px !important" data-bs-toggle="collapse"
                                        href="#collapseRespect" role="button" aria-expanded="false"
                                        aria-controls="collapseRespect">

                                        <?php echo lang('leave_respect') ?>

                                    </button>

                                </div>

                                <?php }else{ ?>
                                    <!-- <div class="right-part d-table mt-md-3 mb-md-3 w-100"> -->
                                        <div class="upload-media d-table float-end">
                                            <button type="button" class="btn btn-submit-request hidden-submit-request" data-bs-toggle="collapse" href="#shareMemory">hidden button
                                            </button>
                                        </div>
                                    <!-- </div> -->
                                <?php }

                                // echo count($middelsection['respect_post']);
                                if(isset($middelsection['respect_post']) && !empty($middelsection['respect_post']) && count($middelsection['respect_post'])>2){
                                    $resp_count = 0;
                                    foreach($middelsection['respect_post'] as $rk => $val){
                                        if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){
                                            $resp_count++;
                                        }
                                    }

                                    //if($resp_count>2){ ?>

                                    <div class="btns respectposr-generate-default">

                                    <div class="customPreviousBtn"><img
                                            src="<?php echo site_url('assets/frontend/') ?>images/arrow-left-bg.png"
                                            title="Next">

                                    </div>

                                    <div class="customNextBtn"><img
                                            src="<?php echo site_url('assets/frontend/') ?>images/arrow-right-bg.png"
                                            title="previous"></div>

                                    </div>

                                <?php //}
                                } ?>
                                    <div class="btns respectposr-generate" style="display: none;">

                                    <div class="customPreviousBtn"><img
                                            src="<?php echo site_url('assets/frontend/') ?>images/arrow-left-bg.png"
                                            title="Next">

                                    </div>

                                    <div class="customNextBtn"><img
                                            src="<?php echo site_url('assets/frontend/') ?>images/arrow-right-bg.png"
                                            title="previous"></div>

                                    </div>


                            </div>

                        </div>

                        <div class="container-fluid container-md px-0 ">

                            <div class="collapse" id="collapseRespect">

                                <form method="post" action="<?php //echo site_url('respect_post') ?>"
                                    enctype="multipart/form-data" id="respect-post-form">

                                    <input type="hidden" name="profile_id"
                                        value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />

                                    <div class="row">

                                        <div class="col-12 col-md-6">

                                            <div class="mb-3">

                                                <input type="text" name="name" placeholder="<?php echo lang('name') ?>"
                                                    value="<?php echo (checkauth()) ? get_frontauthuser('user_name') : '' ?>"
                                                    class="form-control <?php echo (checkauth()) ? '' : 'required' ?>" id="exampleInputEmail152"
                                                    aria-describedby="emailHelp">

                                            </div>

                                        </div>

                                        <div class="col-12 col-md-6">

                                            <div class="mb-3">

                                                <input type="email" name="email"
                                                    placeholder="<?php echo lang('email') ?>"
                                                    value="<?php echo (checkauth()) ? get_frontauthuser('user_email') : '' ?>"
                                                    class="form-control <?php echo (checkauth()) ? '' : 'required' ?>" id="exampleInputPassword129">

                                            </div>

                                        </div>

                                        <div class="col-12 col-md-4 hide">

                                            <div class="input-group mb-3" style="padding-top:10px">

                                                <input type="text" class="add-image-input" placeholder="Upload Image"
                                                    class="form-control" id="exampleInputPassword12210">

                                                <input type="file" name="respect_image"
                                                    class="form-control visually-hidden" id="inputGrouprespect_image07"
                                                    accept=".png, .jpg, .jpeg">

                                                <label class="input-group-text add-image"
                                                    for="inputGrouprespect_image07">

                                                    <?php echo lang('add_image') ?>

                                                </label>

                                            </div>

                                        </div>

                                        <div class="col-12">

                                            <div class="mb-3">

                                                <textarea class="form-control required" name="comment"
                                                    placeholder="<?php echo lang('textarea_comment') ?>"
                                                    id="exampleFormControlTextarea131" rows="3"></textarea>

                                            </div>

                                        </div>
                                        <!-- code for private and public -->
                                        <div class="col-12">
                                            <div class="d-flex mt-2 form-radio">
                                                <div class="form-check me-3">
                                                    <label class="form-check-label" for="flexRadioDefault3respectispublic">
                                                        Public
                                                    </label>
                                                    <input class="form-check-input" type="radio" name="respect_ispublic" value="1" id="flexRadioDefault3respectispublic" checked="">
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="flexRadioDefault3respectisprivate">
                                                        Private
                                                    </label>
                                                    <input class="form-check-input" type="radio" name="respect_ispublic" value="2" id="flexRadioDefault3respectisprivate">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- code for private and public end -->
                                        <div class="col-12">

                                            <div class="mb-3 d-flex">

                                                <button type="submit" name="submit" class="btn btn-submit-request">

                                                    <?php echo lang('submit') ?>

                                                </button>

                                                <!-- <div class="social d-flex mx-2 my-1">

                                             <a href="javascript:void(0)"><img

                                                   src="<?php echo site_url('assets/frontend/') ?>images/facebook-1.png"

                                                   class="rounded float-end" alt="..."></a>

                                             <a href="javascript:void(0)"><img

                                                   src="<?php echo site_url('assets/frontend/') ?>images/Instagram.png"

                                                   class="rounded float-end" alt="..."></a>

                                          </div> -->

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>

                            <h2 class="head-title mt-5 d-none"><?php echo lang('recent_post') ?></h2>

                            <div class="recent-post-data">

                                <!-- <div class="recent-post position-relative row"> -->



                                <?php if(isset($middelsection)){

                                 echo $this->load->view('respect_post',['middelsection'=>$middelsection]);

                                 } ?>



                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade" id="pills-media" role="tabpanel" aria-labelledby="pills-media-tab">

                        <div class="media-head-cover justify-content-end">

                            <h2 class="head-title mt-0 mt-md-5 d-none">Media</h2>

                            <div class="right-part d-table py-md-3 mb-3">

                                <div class="upload-media d-table float-start">

                                <?php if($this->session->userdata('frontuserdetail') && get_userprofile(get_frontprofileid())->user_id== get_frontauthuser('user_id')){
                                        //if(checkauth()){
                                    if(checkauth() && warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                                    if(in_array(get_frontprofileid(), explode(',', warden_groupprofilepermission()))){
                                        if(in_array(get_frontprofileid(), explode(',', warden_groupprofilepermission()))){
                                     ?>
                                    <button type="submit" class="btn btn-submit-request mx-1 timeline-media-form"
                                        data-bs-toggle="collapse" href="#media-uploadnew" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">Upload</button>
                                    <?php }else{ ?>
                                        <button type="submit" class="btn btn-submit-request mx-1 timeline-media-form"
                                        data-bs-toggle="collapse" href="#media-uploadnew" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">Upload</button>

                                    <?php }
                                    }
                                    }else{ ?>
                                        <button type="submit" class="btn btn-submit-request mx-1 timeline-media-form"
                                        data-bs-toggle="collapse" href="#media-uploadnew" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">Upload</button>
                                    <?php }
                                    }else{ ?>
                                        <button type="button" class="btn btn-submit-request timeline-media-form     hidden-submit-request"
                                            data-bs-toggle="collapse" href="javascript:;">hidden button</button>
                                    <?php } ?>

                                </div>



                                <!-- <div class="grid-btn d-table mx-2 float-start">

                                   <span><img src="<?php //echo site_url('assets/frontend/') ?>images/sort.png"></span>

                                 </div>-->

                            </div>

                        </div>

                        <!-- <form class="collapse media-form mb-4" id="media-upload" method="post" > -->

                        <form method="post" action="<?php //echo site_url('journal_post') ?>"
                            enctype="multipart/form-data" class="collapse media-form mb-4" id="media-uploadnew">



                            <div class="row pb-3">

                                <div class="col-lg-10 col-md-6 col-sm-6 col-xm-6">

                                    <!-- <div class="mb-3 d-flex justify-content-between"> -->

                                    <select class="form-control required" name="album_id"
                                        style="margin: 0 10px;border-radius: 50px;" id="media-album-name">

                                        <option value=""><?php echo lang('select_album') ?></option>

                                        <?php if(isset($media_album) && !empty($media_album)){

                                            foreach($media_album as $album_val){?>

                                        <option value="<?php echo $album_val->id ?>">
                                            <?php echo ucfirst($album_val->title) ?></option>

                                        <?php } } ?>



                                    </select>

                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-6 col-xm-6">

                                    <button type="button" class="btn btn-primary create_album_div" data-bs-toggle="modal"
                                        data-bs-target="#create-album" style="width:130px;"> Create Album </button>

                                    <!-- </div> -->

                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-md-6">

                                    <div class="input-group mb-3">

                                        <input type="text" class="form-control" name="title"
                                            placeholder="Title" style="width:100%" maxlength="30" />

                                    </div>

                                </div>



                                <div class="col-12 col-md-6">

                                    <div class="input-group mb-3 imagegroup_cus" style="padding-top:10px">

                                        <input type="text" class="add-imagevideo-input" placeholder="<?php echo lang('upload_image_video') ?>"
                                            class="form-control" id="exampleInputPassword122" style="width: calc(100% - 158px); border-color: red;">

                                            <input type="file" name="media_image[]"
                                            class="form-control visually-hidden" id="inputGroupFilemediaimage"
                                            accept=".png, .jpg, .jpeg,.mp4,.mp3" multiple>

                                        <label class="input-group-text required add-image"
                                            for="inputGroupFilemediaimage" style="border-radius: 0 50px 50px 0;">

                                            <?php echo lang('add_image_video') ?>

                                        </label>

                                    </div>

                                    <!-- <div class="mb-3 d-flex justify-content-between">

                                         <button type="button" class="btn btn-primary w-100 text-start"

                                             data-bs-toggle="modal" data-bs-target="#upload-image"> Add Image

                                         </button>

                                     </div> -->

                                </div>

                                <div class="col-12">

                                    <div class="mb-3">

                                        <textarea class="form-control" placeholder="Description"
                                            name="media_caption" id="exampleFormControlTextarea1mc" rows="2"></textarea>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="d-flex mb-3 form-radio">

                                        <div class="form-check me-3">

                                            <label class="form-check-label" for="flexRadioDefault3mediaispublic">

                                                Public

                                            </label>

                                            <input class="form-check-input" type="radio" name="media_ispublic" value="1"
                                                id="flexRadioDefault3mediaispublic" checked>

                                        </div>

                                        <div class="form-check">

                                            <label class="form-check-label" for="flexRadioDefault4isprivate">

                                                Private

                                            </label>

                                            <input class="form-check-input" type="radio" name="media_ispublic" value="2"
                                                id="flexRadioDefault4isprivate">

                                        </div>

                                    </div>

                                </div>

                                <div class="col-12">

                                    <div class="mb-3 d-flex">

                                        <button type="submit" name="submit"
                                            class=" btn-submit-request dark-btn">Submit</button>

                                    </div>

                                </div>

                            </div>

                        </form>

                        <div class="container-md p-0 container-fluid">

                            <div class="row media-show-data show-desktop">

                                <?php $this->load->view('media_gallery-new',['middlesection'=>$middelsection]) ?>

                            </div>

                             <div class="media-show-data show-mobile">

                                <?php $this->load->view('media_gallery-new',['middlesection'=>$middelsection]) ?>

                            </div>

                        </div>

                    </div>

                    <div class="tab-pane fade respect" id="pills-journal" role="tabpanel"
                        aria-labelledby="pills-journal-tab">

                        <div class="media-head-cover justify-content-md-end">

                            <h2 class="head-title mt-0 mt-md-5 d-none"><?php echo lang('journal') ?></h2>

                            <div class="right-part d-table py-md-3">

                                <div class="upload-media d-table float-start mb-3">

                                    <?php if($this->session->userdata('frontuserdetail') && get_userprofile(get_frontprofileid())->user_id== get_frontauthuser('user_id')){
                                        //if(checkauth()){
                                        if(checkauth() && warden_groupprofilepermission() && get_frontauthuser('warden_user_id')>0){
                                        if(in_array(get_frontprofileid(), explode(',', warden_groupprofilepermission()))){ ?>
                                            <button type="submit" id="journal-post-btn" class="btn btn-submit-request timeline-media-form"
                                        data-bs-toggle="collapse" href="#create-blog" role="button"
                                        aria-expanded="false"
                                        aria-controls="collapseExample"><?php echo lang('new_entry') ?></button>
                                        <?php }
                                    }else{ ?>
                                        <button type="submit" id="journal-post-btn" class="btn btn-submit-request timeline-media-form"
                                        data-bs-toggle="collapse" href="#create-blog" role="button"
                                        aria-expanded="false"
                                        aria-controls="collapseExample"><?php echo lang('new_entry') ?></button>
                                    <?php }
                                    }else{ ?>
                                        <button type="button" class="btn btn-submit-request timeline-media-form     hidden-submit-request"
                                            data-bs-toggle="collapse" href="javascript:;">hidden button</button>
                                    <?php } ?>

                                </div>

                                <!-- <div class="grid-btn d-table mx-2 float-start">

                                     <span><img src="<?php //echo site_url('assets/frontend/') ?>images/sort.png"></span>

                                 </div>-->

                            </div>

                        </div>

                        <div class="collapse journal-form" id="create-blog">

                            <form method="post" action="<?php //echo site_url('journal_post') ?>"
                                enctype="multipart/form-data" id="journal-post-form">

                                <input type="hidden" name="profile_id"
                                    value="<?php echo (isset($userprofile_data['id']) && $userprofile_data['id']!='') ? $userprofile_data['id'] : 0 ?>" />

                                <div class="row">

                                    <div class="col-12 col-md-4">

                                        <div class="mb-3 d-flex justify-content-between" style="padding-top:10px">



                                            <div class="dropdown">



                                                <select name="journal_category" class="form-control required"
                                                    style="    border-radius: 50px;">

                                                    <option value="">

                                                        <?php echo lang('select_category') ?>

                                                    </option>

                                                    <?php foreach(journal_category() as $j_cat){ ?>

                                                    <option value="<?php echo $j_cat ?>">

                                                        <?php echo $j_cat ?>

                                                    </option>

                                                    <?php } ?>

                                                </select>



                                            </div>

                                        </div>

                                    </div>



                                    <div class="col-12 col-md-4">

                                        <div class="mb-3">

                                            <input type="text" name="title"
                                                placeholder="<?php echo lang('blog_title') ?>"
                                                class="form-control required" id="exampleInputEmail151"
                                                aria-describedby="emailHelp">

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-4">

                                        <div class="input-group mb-3" style="padding-top:10px">

                                            <input type="text" class="add-image-input"
                                                placeholder="Upload Image"
                                                id="exampleInputPassword12214">

                                            <input type="file" name="image"
                                                class="form-control visually-hidden"
                                                id="inputGroupFileJournal07" accept=".png, .jpg, .jpeg">

                                            <label class="input-group-text add-image"
                                                for="inputGroupFileJournal07">

                                                <?php echo lang('add_image') ?>

                                            </label>

                                        </div>

                                    </div>



                                    <div class="col-12">

                                        <div class="mb-3">

                                            <textarea class="form-control required" name="description"
                                                placeholder="<?php echo lang('blog_detail') ?>"
                                                id="exampleFormControlTextarea136" rows="3"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="d-flex mb-3 form-radio">

                                            <div class="form-check me-3">

                                                <label class="form-check-label" for="flexRadioDefault5">

                                                    <?php echo lang('public') ?>

                                                </label>

                                                <input class="form-check-input" value="1" type="radio" name="is_public"
                                                    id="flexRadioDefault5">

                                            </div>

                                            <div class="form-check">

                                                <label class="form-check-label" for="flexRadioDefault6">

                                                    <?php echo lang('private') ?>

                                                </label>

                                                <input class="form-check-input" value="2" type="radio" name="is_public"
                                                    id="flexRadioDefault6" checked>

                                            </div>

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

                            </form>

                        </div>

                        <div class="container-md p-0 container-fluid">

                            <div class="row journalpost-section featured">

                                <?php

                                 if(isset($middelsection) && isset($middelsection['journal_post']) && !empty($middelsection['journal_post'])){


                                 echo $this->load->view('journal-post-new',['middelsection'=>$middelsection]);

                                 }else{

                                    echo '<h2 class="no_record norecord-message" style="margin-top:15px;">'.lang('no_record_found').'</h2>';

                                 } ?>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- sign-up Modal -->





<!-- upload multiple image -->

<div class="modal fade" id="upload-image" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body upload-image">

                <form>

                    <div class="row">

                        <div class="col-12 col-md-12">

                            <div class="input-group mb-3">

                                <input type="file" name="album_image[]" class="form-control visually-hidden"
                                    id="inputGroupFile02" accept="image/*" multiple>

                                <label class="input-group-text add-image w-100" for="inputGroupFile02">Upload from

                                    Desktop</label>

                            </div>

                        </div>

                        <!-- <div class="col-12 col-md-12">

                                <div class="input-group mb-3">

                                    <input type="file" class="form-control visually-hidden" id="inputGroupFile02">

                                    <label class="input-group-text add-image w-100" for="inputGroupFile02">Upload from

                                        Instagram</label>

                                </div>

                            </div>

                            <div class="col-12 col-md-12">

                                <div class="input-group mb-3">

                                    <input type="file" class="form-control visually-hidden" id="inputGroupFile02">

                                    <label class="input-group-text add-image w-100" for="inputGroupFile02">Upload from

                                        Facebook</label>

                                </div>

                            </div> -->

                        <div class="col-12">

                            <div class="d-flex mb-3 form-radio">

                                <div class="form-check me-3">

                                    <label class="form-check-label" for="flexRadioDefault1">

                                        Public

                                    </label>

                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">

                                </div>

                                <div class="form-check">

                                    <label class="form-check-label" for="flexRadioDefault2">

                                        Private

                                    </label>

                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" checked>

                                </div>

                            </div>

                        </div>

                        <div class="col-12">

                            <div class="mb-3 d-flex">

                                <button type="submit" class="btn btn-submit-request">Upload</button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

<!-- media image detail modal of read more -->

<div class="modal fade image-media-modal" id="image-detail-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header border-0">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-12">

                        <img src="<?php echo site_url('assets/frontend/') ?>images/media-1.png" class="w-100 image-d">

                    </div>

                    <div class="col-12">

                        <p class="image-caption">Lorem Ipsum is simply dummy text of the printing and typesetting

                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,

                            when an unknown printer took a galley of type and scrambled it to make a type specimen

                            book. </p>

                    </div>

                    <div class="d-flex justify-content-between w-100 ">

                        <div class="life-shared-by d-flex flex-wrap">

                            <p>Shared by:</p>

                            <p>Name</p>

                        </div>

                        <div class="life-shared-by d-flex flex-wrap">

                            <p>Date:</p>

                            <p>**/**/**</p>

                        </div>

                        <div class="life-like d-flex flex-wrap">

                            <a tabindex="0" role="button" data-bs-placement="top" data-bs-toggle="popover"
                                data-bs-trigger="focus" title="Dismissible popover"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?"><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/heart.png">
                                <span>45</span></a>

                        </div>

                    </div>

                    <div class="col-12 mt-3">

                        <div class="row">

                            <button type="submit" class="btn btn-submit-request" data-bs-toggle="collapse"
                                href="#comment-media" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Add a Comment</button>

                            <form class="collapse mt-3" id="comment-media">

                                <div class="row">

                                    <div class="col-12 col-md-12">

                                        <div class="mb-3">

                                            <input type="text" placeholder="Name" class="form-control"
                                                id="exampleInputEmail1nametext" aria-describedby="emailHelp">

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-12">

                                        <div class="mb-3">

                                            <input type="email" placeholder="Email" class="form-control"
                                                id="exampleInputEmail1emailtext" aria-describedby="emailHelp">

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="mb-3">

                                            <textarea class="form-control" placeholder="Leave Comment"
                                                id="exampleFormControlTextarea1lc" rows="3"></textarea>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class=" d-flex">

                                            <button type="submit" class="btn btn-submit-request">Submit</button>

                                        </div>

                                    </div>

                                </div>

                            </form>


                            <div class="demo-comment">

                                <div class="recent-item">

                                    <div class="comment-parent">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/2.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Faith Granger</b> published a tribute <br>

                                                <span>4 months ago.</span>

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

                                            <p>We are so sorry for your loss.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>1 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                    <div class="comment-parent border-zero">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/1.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Arthur Zhang </b> published a comment <br>

                                                <span>About a year ago.</span>

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

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do

                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim

                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut

                                                aliquip ex ea commodo consequat. Duis aute irure dolor.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>12 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="recent-item">

                                    <div class="comment-parent">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/2.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Faith Granger</b> published a tribute <br>

                                                <span>4 months ago.</span>

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

                                            <p>We are so sorry for your loss.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>1 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                    <div class="comment-parent border-zero">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/1.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Arthur Zhang </b> published a comment <br>

                                                <span>About a year ago.</span>

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

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do

                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim

                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut

                                                aliquip ex ea commodo consequat. Duis aute irure dolor.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>12 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="recent-item">

                                    <div class="comment-parent">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/2.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Faith Granger</b> published a tribute <br>

                                                <span>4 months ago.</span>

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

                                            <p>We are so sorry for your loss.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>1 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                    <div class="comment-parent border-zero">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/1.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Arthur Zhang </b> published a comment <br>

                                                <span>About a year ago.</span>

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

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do

                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim

                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut

                                                aliquip ex ea commodo consequat. Duis aute irure dolor.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>12 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="recent-item">

                                    <div class="comment-parent">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/2.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Faith Granger</b> published a tribute <br>

                                                <span>4 months ago.</span>

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

                                            <p>We are so sorry for your loss.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>1 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                    <div class="comment-parent border-zero">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/1.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Arthur Zhang </b> published a comment <br>

                                                <span>About a year ago.</span>

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

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do

                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim

                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut

                                                aliquip ex ea commodo consequat. Duis aute irure dolor.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>12 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                </div>

                                <div class="recent-item">

                                    <div class="comment-parent">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/2.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Faith Granger</b> published a tribute <br>

                                                <span>4 months ago.</span>

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

                                            <p>We are so sorry for your loss.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>1 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                    <div class="comment-parent border-zero">

                                        <div class="r-i-head d-flex align-items-center position-relative w-100">

                                            <div class="pic d-flex align-items-center">

                                                <span><img
                                                        src="<?php echo site_url('assets/frontend/') ?>images/1.png"></span>

                                            </div>

                                            <h3 class="comment-title">

                                                <b>Arthur Zhang </b> published a comment <br>

                                                <span>About a year ago.</span>

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

                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do

                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim

                                                ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut

                                                aliquip ex ea commodo consequat. Duis aute irure dolor.</p>

                                        </div>

                                        <div class="action-palate d-flex my-2">

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Like.png">
                                                <span>12 </span> Like</a>

                                            <a href="#" class="d-flex justify-content-start align-items-center"><img
                                                    src="<?php echo site_url('assets/frontend/') ?>images/Comment.png">
                                                Comment</a>

                                        </div>

                                    </div>

                                </div>

                                <button id="loadMore" type="submit" class="btn btn-submit-request m-auto mt-3">Load

                                    More</button>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </div>

    </div>

</div>

<!-- Post detail modal of read more -->

<div class="modal fade image-media-modal" id="post-detail-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php echo get_loadingimage() ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 journalpost-image">
                        <img src="<?php echo site_url('assets/frontend/') ?>images/media-1.png" class="w-100 image-d">
                    </div>
                    <div class="col-12">
                        <h3 class="journalpost-title"></h3>
                        <p class="journalpost-category"></p>
                        <p class="image-caption journalpost-desc">Lorem Ipsum is simply dummy text of the printing and
                            typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                            when an unknown printer took a galley of type and scrambled it to make a type specimen
                            book. </p>
                    </div>
                    <div class="d-flex justify-content-between w-100 ">
                        <div class="life-shared-by d-flex flex-wrap">
                            <p>Created by:</p>
                            <p class="journalpost-name">Name</p>
                        </div>
                        <div class="life-shared-by d-flex flex-wrap">
                            <p>Date:</p>
                            <p class="journalpost-date">**/**/**</p>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <?php if(1){ ?>
                            <button type="submit" class="btn btn-submit-request add-comment-btn-section" data-bs-toggle="collapse"
                                href="#comment-journal" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Add a Comment</button>
                            <form class="collapse" id="comment-journal" method="post"
                                action="<?php //echo site_url('journal_commentpost') ?>">
                                <input type="hidden" name="postid" id="postid" />
                                <input type="hidden" name="user_id"
                                    value="<?php echo get_frontauthuser('user_id') ?>" />
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3">
                                            <input type="text" placeholder="Name" class="form-control"
                                                id="exampleInputEmail1jurnalname" aria-describedby="emailHelp" name="name"
                                                value="<?php echo get_frontauthuser('user_name') ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3">
                                            <input type="email" placeholder="Email" class="form-control"
                                                id="exampleInputEmail1journalemail" aria-describedby="emailHelp" name="email"
                                                value="<?php echo get_frontauthuser('user_email') ?>">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <textarea class="form-control" placeholder="Leave Comment"
                                                id="exampleFormControlTextarea1lcm" rows="3" name="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" d-flex">
                                            <button type="submit" class="btn btn-submit-request">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                            <!-- <button type="submit" class="btn btn-submit-request mt-3" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">View Comment</button> -->
                            <div class="demo-comment p-0">
                                <div class="journal-post-comment">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">

            </div>

        </div>

    </div>

</div>

<!-- edit content popup -->

<div class="modal fade image-media-modal" id="edit-popup" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable">

        <div class="modal-content">

            <div class="modal-header border-0">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-12">

                        <div class="row">

                            <form method="post" action="<?php echo site_url('profile_update_description')?>">

                                <div class="row">

                                    <div class="col-12">

                                        <div class="mb-3">

                                            <textarea required class="form-control" name="bio"
                                                placeholder="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat"
                                                id="exampleFormControlTextarea1"
                                                rows="3"><?php echo get_userprofile(get_frontprofileid())->bio ?></textarea>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class=" d-flex">

                                            <button type="submit" class="btn btn-submit-request">Save</button>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal-footer border-0">

            </div>

        </div>

    </div>

</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
