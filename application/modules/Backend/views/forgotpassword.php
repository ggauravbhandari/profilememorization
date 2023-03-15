
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only"><?php echo lang('loadingtext') ?>...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="<?php echo site_url('admin') ?>" class="col text-center">
                                <h3 class="text-primary"><?php echo $site_title ?></h3>
                            </a>
                        </div>
                        <h3><?php echo lang('forgotpassword') ?></h3>
                        <?php if($this->session->flashdata('success')){ ?>
                        <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success') ?>
                        </div>
                        <?php } ?>
                        <?php if($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $this->session->flashdata('error') ?>
                        </div>
                        <?php } ?>
                        <form action="<?php echo site_url('admin/forgotpassword') ?>" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="<?php echo lang('emailaddress') ?>" name="email">
                            <label for="floatingInput"><?php echo lang('emailaddress') ?></label>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <!-- <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                            <a href="<?php echo site_url('admin/login') ?>"><?php echo lang('signin') ?></a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4"><?php echo lang('signin') ?></button>
                        </form>
                        <!-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>