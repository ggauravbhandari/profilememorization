<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"><?php echo lang('updateuser') ?></h6>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>

                    <form action="<?php echo site_url('admin/edit-user/'.$user_result['id']) ?>" method="post">
                        <input type="hidden" name="user_id" value="<?php echo (isset($user_result['id']) && $user_result['id']!='') ? $user_result['id'] : '' ?>" />
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput1" class="form-label"><?php echo lang('firstname') ?>*</label>
                                <input type="text" class="form-control" id="exampleInput1"
                                    aria-describedby="emailHelp" name="firstname" placeholder="<?php echo lang('firstname') ?>" required value="<?php echo (isset($user_result['firstname']) && $user_result['firstname']!='') ? $user_result['firstname'] : set_value('firstname'); ?>">
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput2" class="form-label"><?php echo lang('lastname') ?>*</label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('lastname') ?>" name="lastname" id="exampleInput2"
                                    aria-describedby="emailHelp" value="<?php echo (isset($user_result['lastname']) && $user_result['lastname']!='') ? $user_result['lastname'] : set_value('lastname'); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput4" class="form-label"><?php echo lang('emailaddress') ?>*</label>
                                <input type="email" class="form-control" id="exampleInput4"
                                    aria-describedby="emailHelp" placeholder="<?php echo lang('emailaddress') ?>" required name="email" value="<?php echo (isset($user_result['email']) && $user_result['email']!='') ? $user_result['email'] : set_value('email'); ?>" disabled readonly>
                                
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput5" class="form-label"><?php echo lang('contactnumber') ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('contactnumber') ?>" id="exampleInput5" name="contactnumber" value="<?php echo (isset($user_result['contactnumber']) && $user_result['contactnumber']!='') ? $user_result['contactnumber'] : set_value('contactnumber'); ?>" oninput="this.value=this.value.replace(/[^0-9.,]/g,'');">
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput3" class="form-label"><?php echo lang('password') ?></label>
                                
                                <input type="password" placeholder="<?php echo lang('password') ?>" class="form-control" id="exampleInput3" name="password">
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label for="userimputaddress_1" class="form-label"><?php echo lang('address_1') ?></label>
                                
                                <input type="text" placeholder="<?php echo lang('address_1') ?>" class="form-control" id="userimputaddress_1" name="address_1" value="<?php echo (isset($user_result['address_1']) && $user_result['address_1']!='') ? $user_result['address_1'] : set_value('address_1'); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="userimputaddress_2" class="form-label"><?php echo lang('address_2') ?></label>
                                
                                <input type="text" placeholder="<?php echo lang('address_2') ?>" class="form-control" id="userimputaddress_2" name="address_2" value="<?php echo (isset($user_result['address_2']) && $user_result['address_2']!='') ? $user_result['address_2'] : set_value('address_2'); ?>">
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="userinputcity" class="form-label"><?php echo lang('city') ?></label>
                                
                                <input type="text" placeholder="<?php echo lang('city') ?>" class="form-control" id="userinputcity" name="city" value="<?php echo (isset($user_result['city']) && $user_result['city']!='') ? $user_result['city'] : set_value('city'); ?>">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="userinputregion" class="form-label"><?php echo lang('region') ?></label>
                                
                                <input type="text" placeholder="<?php echo lang('region') ?>" class="form-control" id="userinputregion" name="region" value="<?php echo (isset($user_result['region']) && $user_result['region']!='') ? $user_result['region'] : set_value('region'); ?>">
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="userinputpostcode" class="form-label"><?php echo lang('postcode') ?></label>
                                
                                <input type="text" placeholder="<?php echo lang('postcode') ?>" class="form-control" id="userinputpostcode" name="postcode" value="<?php echo (isset($user_result['postcode']) && $user_result['postcode']!='') ? $user_result['postcode'] : set_value('postcode'); ?>">
                            </div>
                            
                        </div>
                        
                            <!-- <div class="mb-3 col-md-6">
                                <label for="exampleInput6" class="form-label"><?php echo lang('address') ?></label>
                                <textarea name="address" class="form-control" placeholder="<?php echo lang('address') ?>"><?php echo (isset($user_result['address']) && $user_result['address']!='') ? $user_result['address'] : set_value('address'); ?></textarea>
                            </div> -->
                        
                        <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit') ?></button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Form End -->