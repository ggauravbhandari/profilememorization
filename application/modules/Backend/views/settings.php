
<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"><?php echo lang('change_password') ?></h6>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>
                    <?php echo lang('emailaddress') ?>:- <?php echo ($user_response['email']) ? $user_response['email'] : '' ?>
                    <form action="<?php echo site_url('admin/settings') ?>" method="post">
                        
                        <div class="mb-3 col-md-6">
                            <label for="exampleInput3" class="form-label"><?php echo lang('oldpassword') ?>*</label>
                            <input type="password" class="form-control" id="exampleInput3"
                                aria-describedby="emailHelp" name="oldpassword" placeholder="<?php echo lang('password') ?>" required value="<?php echo set_value('oldpassword'); ?>">
                        </div>                   
                        
                        <div class="mb-3 col-md-6">
                            <label for="exampleInput1" class="form-label"><?php echo lang('password') ?>*</label>
                            <input type="password" class="form-control" id="exampleInput1"
                                aria-describedby="emailHelp" name="password" placeholder="<?php echo lang('password') ?>" required value="<?php echo set_value('password'); ?>">
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label for="exampleInput2" class="form-label"><?php echo lang('conpassword') ?>*</label>
                            <input type="password" class="form-control" placeholder="<?php echo lang('conpassword') ?>" name="conpassword" id="exampleInput2"
                                aria-describedby="emailHelp" value="<?php echo set_value('conpassword'); ?>" required>
                        </div>
                        
                        
                        <button type="submit" name="submit" class="btn btn-primary"><?php echo lang('submit') ?></button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Form End -->