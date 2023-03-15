<!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"><?php echo lang('adduser') ?></h6>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>'; } ?>

                    <form action="<?php echo site_url('admin/add-user') ?>" method="post">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label for="exampleInput1" class="form-label"><?php echo lang('group_name') ?>*</label>
                                <input type="text" class="form-control" id="exampleInput1"
                                    aria-describedby="emailHelp" name="group_name" placeholder="<?php echo lang('group_name') ?>" required value="<?php echo set_value('group_name'); ?>">
                            </div>
                            
                            <div class="mb-3 col-md-4">
                                <label for="exampleInput1" class="form-label"><?php echo lang('firstname') ?>*</label>
                                <input type="text" class="form-control" id="exampleInput1"
                                    aria-describedby="emailHelp" name="firstname" placeholder="<?php echo lang('firstname') ?>" required value="<?php echo set_value('firstname'); ?>">
                            </div>
                            
                            <div class="mb-3 col-md-4">
                                <label for="exampleInput2" class="form-label"><?php echo lang('lastname') ?>*</label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('lastname') ?>" name="lastname" id="exampleInput2"
                                    aria-describedby="emailHelp" value="<?php echo set_value('lastname'); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput4" class="form-label"><?php echo lang('emailaddress') ?>*</label>
                                <input type="email" class="form-control" id="exampleInput4"
                                    aria-describedby="emailHelp" placeholder="<?php echo lang('emailaddress') ?>" required name="email" value="<?php echo set_value('email'); ?>">
                                
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput5" class="form-label"><?php echo lang('contactnumber') ?></label>
                                <input type="text" class="form-control" placeholder="<?php echo lang('contactnumber') ?>" id="exampleInput5" name="contactnumber" value="<?php echo set_value('contactnumber'); ?>" oninput="this.value=this.value.replace(/[^0-9.,]/g,'');">
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput3" class="form-label"><?php echo lang('password') ?>*</label>
                                <input type="password" placeholder="<?php echo lang('password') ?>" class="form-control" id="exampleInput3" required name="password">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput31" class="form-label"><?php echo lang('conpassword') ?>*</label>
                                <input type="password" placeholder="<?php echo lang('conpassword') ?>" class="form-control" id="exampleInput31" required name="conpassword">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput31" class="form-label"><?php echo lang('house_no') ?>*</label>
                                <input type="text" placeholder="<?php echo lang('house_no') ?>" class="form-control" id="exampleInputhouse_number" required name="house_number">
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput3" class="form-label"><?php echo lang('address_1') ?>*</label>
                                <input type="text" placeholder="<?php echo lang('address_1') ?>" class="form-control" id="exampleInputaddress_1" required name="address_1">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput31" class="form-label"><?php echo lang('address_2') ?></label>
                                <input type="text" placeholder="<?php echo lang('address_2') ?>" class="form-control" id="exampleInput31" name="address_2">
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput3" class="form-label"><?php echo lang('region') ?>*</label>
                                <input type="text" placeholder="<?php echo lang('region') ?>" class="form-control" id="exampleInputregion" required name="region">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput31" class="form-label"><?php echo lang('city') ?></label>
                                <input type="text" placeholder="<?php echo lang('city') ?>" class="form-control" required id="exampleInput31" name="city">
                            </div>
                        
                            <div class="mb-3 col-md-6">
                                <label for="exampleInput3" class="form-label"><?php echo lang('postcode') ?>*</label>
                                <input type="text" placeholder="<?php echo lang('postcode') ?>" class="form-control" id="exampleInputpostcode" required name="postcode">
                            </div>
                        </div>
                            
                        
                        <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit') ?></button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Form End -->