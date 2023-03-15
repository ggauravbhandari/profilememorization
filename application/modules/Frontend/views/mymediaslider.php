<div class="swiper mySwiper">
    <div class="swiper-wrapper">
    <?php 
    
    /**/
    if(isset($album_result) && $album_result!=''){
        foreach($album_result as $ak => $slider_value){ 
            $filetype = explode('.',$slider_value->image);
            if($slider_value->media_ispublic==2 && checkauth() && $slider_value->user_id==get_frontauthuser('user_id')){
                ?>
            <div class="swiper-slide">
                <div class="popup-details">
                    <!-- popup detail modal start -->
                    <div class="col-12 img-cover-life">
                        <?php
                        if(in_array($filetype[count($filetype)-1],array('mp4',"mov",'MOV'))){ ?>
                            <!-- <span class="media-playbtn"><i class="fa-solid fa-play"></i></span> -->
                            <video src="<?php echo UploadStorage::url( $slider_value->image, base_url('assets/frontend/uploads/') . get_defaultimage()->profile_img)?>" class="w-100" style="height:200px;" controls>
                            Your browser does not support the element.
                            </video>
                        <?php }elseif(in_array($filetype[count($filetype)-1],array('mp3'))){ ?>
                            <audio controls class="w-100" style="height:200px;">
                            <source src="<?php echo UploadStorage::url( $slider_value->image, base_url('assets/frontend/uploads/') . get_defaultimage()->profile_img ) ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                            </audio>
                        <?php }else{ ?>
                            <img src="<?php echo UploadStorage::url( $slider_value->image, base_url('assets/frontend/uploads/') . get_defaultimage()->media ) ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->media ?>'" class="w-100"/>
                        <?php } 
                        /* ?>
                        <img src="<?php echo $slider_value->image ?>"
                            class="w-100 life-modal-img"
                            onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->lifeof_1 ?>'">
                        <?php */ ?>
                    </div>
                    <h3 class="life-modal-name" style="font-size: 16px;font-weight: bold;padding: 10px;"></h3>
                    <div class="col-12">
                        <p class="life-modal-desc"><?php echo $slider_value->media_caption ?>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between w-100 ">
                        <div class="life-shared-by d-flex flex-wrap">
                            <p>Shared by:</p>
                            <p class="life-modal-sharedby"><?php echo user_detail($slider_value->user_id)->firstname.' '.user_detail($slider_value->user_id)->lastname; ?></p>
                        </div>
                        <div class="date-life d-flex flex-wrap">
                            <p>Date:</p>
                            <p class="life-modal-postdate"><?php echo date_dmyformate($slider_value->created_at); ?></p>
                        </div>
                        <div class="life-like d-flex flex-wrap">
                            <a tabindex="0" role="button" data-bs-placement="top" data-bs-toggle="popover"
                                data-bs-trigger="focus" title="Dismissible popover"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                onclick="postlike(this)" data-tablename="media_post" data-postid="<?php echo $slider_value->id ?>" class="postlikebtn"><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/heart.png"><span
                                    class="likecount"><?php echo $slider_value->likecount ?></span></a>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <?php if(1){ ?>
                            <button type="submit" class="btn btn-submit-request add-comment-btn-section" data-bs-toggle="collapse"
                                href="#comment-otherpost<?php echo $slider_value->id ?>" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Add a Comment</button>
                            <form class="collapse" id="comment-otherpost<?php echo $slider_value->id ?>" method="post"
                                action="<?php echo site_url('other_commentpost') ?>">
                                <input type="hidden" name="post_type" id="post_type<?php echo $ak ?>" value="media_post" />
                                <input type="hidden" name="postid" id="postid<?php echo $ak ?>" value="<?php echo $slider_value->id ?>" />
                                <input type="hidden" name="user_id"
                                    value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo get_frontauthuser('warden_user_id'); }elseif(checkauth()){
                                                    echo get_frontauthuser('warden_user_id');
                                                } ?>" />
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3">
                                            <input type="text" placeholder="Name" class="form-control"
                                                id="exampleInputname<?php echo $ak ?>" aria-describedby="emailHelp" name="name"
                                                value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->firstname.' '.user_detail(get_frontauthuser('warden_user_id'))->lastname; }elseif(checkauth()){
                                                    echo user_detail(get_frontauthuser('user_id'))->firstname.' '.user_detail(get_frontauthuser('user_id'))->lastname;
                                                }else{
                                                    echo '';
                                                } ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3">
                                            <input type="email" placeholder="Email" class="form-control"
                                                id="exampleInputEmail1<?php echo $ak ?>" aria-describedby="emailHelp" name="email"
                                                value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->email; }elseif(checkauth()){
                                                    echo user_detail(get_frontauthuser('user_id'))->email;
                                                }else{
                                                    echo '';
                                                } ?><?php //echo (checkauth()) ? user_detail(get_frontauthuser('user_id'))->email : '' ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <textarea class="form-control" placeholder="Leave Comment"
                                                id="exampleFormControlTextarea1<?php echo $ak ?>" rows="3" name="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" d-flex">
                                            <button type="submit" class="btn btn-submit-request media_slider_submit_form">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                            <!-- <button type="submit" class="btn btn-submit-request mt-3" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">View Comment</button> -->
                            <div class="demo-comment p-0">
                                <div class="media-post-comment">
                                    <?php 
                                    $media_comment = respectpost_comment( $slider_value->id,'media_post',3);
                                    $this->load->view('other_mediacomment',['media_comment'=>$media_comment]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- popup detail modal end -->
                </div>
                
            </div>
        <?php }elseif($slider_value->media_ispublic==1){ ?>
            <div class="swiper-slide">
                <div class="popup-details">
                    <!-- popup detail modal start -->
                    <div class="col-12 img-cover-life">
                        <?php
                        if(in_array($filetype[count($filetype)-1],array('mp4',"mov",'MOV'))){ ?>
                            <!-- <span class="media-playbtn"><i class="fa-solid fa-play"></i></span> -->
                            <video src="<?php echo UploadStorage::url( $slider_value->image, base_url('assets/frontend/uploads/') . get_defaultimage()->profile_img)?>" class="w-100" style="height:200px;" controls>
                            Your browser does not support the element.
                            </video>
                        <?php }elseif(in_array($filetype[count($filetype)-1],array('mp3'))){ ?>
                            <audio controls class="w-100" style="height:200px;">
                            <source src="<?php echo UploadStorage::url( $slider_value->image, base_url('assets/frontend/uploads/') . get_defaultimage()->profile_img ) ?>" type="audio/mpeg">
                            Your browser does not support the audio element.
                            </audio>
                        <?php }else{ ?>
                            <img src="<?php echo UploadStorage::url( $slider_value->image, base_url('assets/frontend/uploads/') . get_defaultimage()->media ) ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->media ?>'" class="w-100"/>
                        <?php } 
                        /* ?>
                        <img src="<?php echo $slider_value->image ?>"
                            class="w-100 life-modal-img"
                            onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->lifeof_1 ?>'">
                        <?php */ ?>
                    </div>
                    <h3 class="life-modal-name" style="font-size: 16px;font-weight: bold;padding: 10px;"></h3>
                    <div class="col-12">
                        <p class="life-modal-desc"><?php echo $slider_value->media_caption ?>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between w-100 ">
                        <div class="life-shared-by d-flex flex-wrap">
                            <p>Shared by:</p>
                            <p class="life-modal-sharedby"><?php echo user_detail($slider_value->user_id)->firstname.' '.user_detail($slider_value->user_id)->lastname; ?></p>
                        </div>
                        <div class="date-life d-flex flex-wrap">
                            <p>Date:</p>
                            <p class="life-modal-postdate"><?php echo date_dmyformate($slider_value->created_at); ?></p>
                        </div>
                        <div class="life-like d-flex flex-wrap">
                            <a tabindex="0" role="button" data-bs-placement="top" data-bs-toggle="popover"
                                data-bs-trigger="focus" title="Dismissible popover"
                                data-bs-content="And here's some amazing content. It's very engaging. Right?"
                                onclick="postlike(this)" data-tablename="media_post" data-postid="<?php echo $slider_value->id ?>" class="postlikebtn"><img
                                    src="<?php echo site_url('assets/frontend/') ?>images/heart.png"><span
                                    class="likecount"><?php echo $slider_value->likecount ?></span></a>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="row">
                            <?php if(1){ ?>
                            <button type="submit" class="btn btn-submit-request add-comment-btn-section" data-bs-toggle="collapse"
                                href="#comment-otherpost<?php echo $slider_value->id ?>" role="button" aria-expanded="false"
                                aria-controls="collapseExample">Add a Comment</button>
                            <form class="collapse" id="comment-otherpost<?php echo $slider_value->id ?>" method="post"
                                action="<?php echo site_url('other_commentpost') ?>">
                                <input type="hidden" name="post_type" id="post_type<?php echo $ak ?>" value="media_post" />
                                <input type="hidden" name="postid" id="postid<?php echo $ak ?>" value="<?php echo $slider_value->id ?>" />
                                <input type="hidden" name="user_id"
                                    value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo get_frontauthuser('warden_user_id'); }elseif(checkauth()){
                                                    echo get_frontauthuser('warden_user_id');
                                                } ?>" />
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3">
                                            <input type="text" placeholder="Name" class="form-control"
                                                id="exampleInputname<?php echo $ak ?>" aria-describedby="emailHelp" name="name"
                                                value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->firstname.' '.user_detail(get_frontauthuser('warden_user_id'))->lastname; }elseif(checkauth()){
                                                    echo user_detail(get_frontauthuser('user_id'))->firstname.' '.user_detail(get_frontauthuser('user_id'))->lastname;
                                                }else{
                                                    echo '';
                                                } ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="mb-3">
                                            <input type="email" placeholder="Email" class="form-control"
                                                id="exampleInputEmail1<?php echo $ak ?>" aria-describedby="emailHelp" name="email"
                                                value="<?php if(checkauth() && get_frontauthuser('warden_user_id')>0) { echo user_detail(get_frontauthuser('warden_user_id'))->email; }elseif(checkauth()){
                                                    echo user_detail(get_frontauthuser('user_id'))->email;
                                                }else{
                                                    echo '';
                                                } ?><?php //echo (checkauth()) ? user_detail(get_frontauthuser('user_id'))->email : '' ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <textarea class="form-control" placeholder="Leave Comment"
                                                id="exampleFormControlTextarea1<?php echo $ak ?>" rows="3" name="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class=" d-flex">
                                            <button type="submit" class="btn btn-submit-request media_slider_submit_form">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } ?>
                            <!-- <button type="submit" class="btn btn-submit-request mt-3" data-bs-toggle="collapse" href="#" role="button" aria-expanded="false" aria-controls="collapseExample">View Comment</button> -->
                            <div class="demo-comment p-0">
                                <div class="media-post-comment">
                                    <?php 
                                    $media_comment = respectpost_comment( $slider_value->id,'media_post',3);
                                    $this->load->view('other_mediacomment',['media_comment'=>$media_comment]); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- popup detail modal end -->
                </div>
                
            </div>
            <?php } ?>
        
        <?php 
        }
    } 
    ?>
    </div>
</div>

<div class="swiper-button-next"></div>
<div class="swiper-button-prev"></div>