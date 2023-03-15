<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"><?php echo lang('profile_view') ?></h6>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>

                    <!-- <form action="<?php echo site_url('admin/edit-user/'.$result['id']) ?>" method="post"> -->
                        <input type="hidden" name="user_id" value="<?php echo (isset($result['id']) && $result['id']!='') ? $result['id'] : '' ?>" />
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput1" class="form-label"><?php echo lang('profile_name') ?></label>
                                <input type="text" class="form-control" id="exampleInput1" name="firstname" placeholder="<?php echo lang('profile_name') ?>" required value="<?php echo (isset($result['profile_name']) && $result['profile_name']!='') ? $result['profile_name'] : set_value('profile_name'); ?>" readonly>
                            </div>
                            <?php if($result['admin_profile']==1){ ?>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label" style="margin-top: 38px;float: left;"><?php echo lang('profile_admin') ?></label>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput1" class="form-label"><?php echo lang('firstname') ?></label>
                                <input type="text" class="form-control" id="exampleInput1"
                                    aria-describedby="emailHelp" name="firstname" placeholder="<?php echo lang('firstname') ?>" required value="<?php echo (isset($result['firstname']) && $result['firstname']!='') ? $result['firstname'] : set_value('firstname'); ?>" readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput1" class="form-label"><?php echo lang('lastname') ?></label>
                                <input type="text" class="form-control" id="exampleInput1"
                                    aria-describedby="emailHelp" name="lastname" placeholder="<?php echo lang('lastname') ?>" required value="<?php echo (isset($result['last_name']) && $result['last_name']!='') ? $result['last_name'] : set_value('last_name'); ?>" readonly>
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('dob') ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('dob') ?>" name="dob" id="exampleInput2"
                                    aria-describedby="emailHelp" value="<?php echo (isset($result['dob']) && $result['dob']!='') ? $result['dob'] : set_value('dob'); ?>" required readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('deceased') ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('deceased') ?>" name="deceased" id="exampleInput2"
                                    aria-describedby="emailHelp" value="<?php echo (isset($result['deceased']) && $result['deceased']!='') ? $result['deceased'] : set_value('deceased'); ?>" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            

                            <div class="mb-3 col-md-6">
                                <label for="exampleInput6" class="form-label"><?php echo lang('tagline') ?></label>
                                <textarea name="tagline" class="form-control" placeholder="<?php echo lang('tagline') ?>" readonly><?php echo (isset($result['tagline']) && $result['tagline']!='') ? $result['tagline'] : set_value('tagline'); ?></textarea>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput6" class="form-label"><?php echo lang('bio') ?></label>
                                <textarea name="bio" class="form-control" placeholder="<?php echo lang('bio') ?>" readonly><?php echo (isset($result['bio']) && $result['bio']!='') ? $result['bio'] : set_value('bio'); ?></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('facebook_link') ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('facebook_link') ?>" name="facebook_link" id="exampleInput2"
                                    aria-describedby="emailHelp" value="<?php echo (isset($result['facebook_link']) && $result['facebook_link']!='') ? $result['facebook_link'] : set_value('facebook_link'); ?>" required readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('instagram_link') ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('instagram_link') ?>" name="instagram_link" id="exampleInput2"
                                    aria-describedby="emailHelp" value="<?php echo (isset($result['instagram_link']) && $result['instagram_link']!='') ? $result['instagram_link'] : set_value('instagram_link'); ?>" required readonly>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('twitter_link') ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('twitter_link') ?>" name="twitter_link" id="exampleInput2"
                                    aria-describedby="emailHelp" value="<?php echo (isset($result['twitter_link']) && $result['twitter_link']!='') ? $result['twitter_link'] : set_value('twitter_link'); ?>" required readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('profile_pic') ?></label>
                                <div>
                                <img src="<?php echo site_url('assets/frontend/uploads/'); echo (isset($result['profile_pic']) && $result['profile_pic']!='') ? $result['profile_pic'] : get_defaultimage()->background_img ?>" width="100px" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('background_pic') ?></label>
                                <div>
                                <img src="<?php echo site_url('assets/frontend/uploads/'); echo (isset($result['background_pic']) && $result['background_pic']!='') ? $result['background_pic'] : get_defaultimage()->background_img ?>" width="100px" />
                                </div>
                            </div>

                            
                        </div>
                        
                            
                        
                        <a href="<?php echo site_url('admin/profile-list') ?>" class="btn btn-primary"><?php echo lang('back') ?></a>
                    <!-- </form> -->
                </div>
            </div>
            
        </div>
    </div>
    <!-- Form End -->