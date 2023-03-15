<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions {

    function __construct() {
        parent::__construct();
    }

    // Overide the 404 error
    public function show_404($page = '', $log_error = TRUE)
    {
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap CSS -->
            <link href="<?php echo site_url('assets/frontend/') ?>/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/css/datepicker.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
            <link href="<?php echo site_url('assets/frontend/') ?>/css/style.css" rel="stylesheet">
            <link href="font/stylesheet.css" rel="stylesheet">
            <link href="<?php echo site_url('assets/frontend/') ?>/css/owl.carousel.min.css" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
            <title>Memorial</title>
        </head>
        <body>
            <div class="top-header d-none d-md-flex justify-content-between align-item-center">
                <div class="logo-top-header">
                <!-- <img src="<?php echo site_url('assets/frontend/') ?>/images/Memorisation-logo1.png"> -->
                </div>
                <a href="http://www.memorisation.co.uk/" target="_blank">www.memorisation.co.uk</a>
            </div>
            <header class="d-flex justify-content-between d-md-none position-relative">
                <div class="logo">
                    <img src="<?php echo site_url('assets/frontend/') ?>/images/Memorisation-logo1.png" />
                </div>
                <nav class="navigation-custom">
                    <div class="right-part d-table">
                    <div class="float-start feature-home">
                        <a href="#section-2"> <img src="<?php echo site_url('assets/frontend/') ?>/images/Home-2.png" /> </a>
                    </div>
                    <div class="searchBox float-start">
                        <input type="search" placeholder="search memorisation profiles">
                        <img src="<?php echo site_url('assets/frontend/') ?>/images/Search.png" />
                    </div>
                    <div class="menu-btn d-table mx-2 float-start">
                        <a href="#" class="menu-btn-toggle"><span><img src="<?php echo site_url('assets/frontend/') ?>/images/Menu.png" class="menu-line"> <img src="<?php echo site_url('assets/frontend/') ?>/images/Close.svg" class="close"></span></a>
                        <nav class="sidebar">
                            <ul>
                                <li class="active"><a href="#"><span><img src="<?php echo site_url('assets/frontend/') ?>/images/Edit Profile.svg"></span>Edit Profile</a></li>
                                <li><a href="#"><span><img src="<?php echo site_url('assets/frontend/') ?>/images/Notification.svg"></span> Notification</a>  </li>
                                <li><a href="#" class="serv-btn"><span><img src="<?php echo site_url('assets/frontend/') ?>/images/QR COde.svg"></span>QR Code</a></li>
                                <li><a href="#"> <span><img src="<?php echo site_url('assets/frontend/') ?>/images/New Profile.svg"></span> Add New Profile</a></li>
                                <li><a href="#"> <span><img src="<?php echo site_url('assets/frontend/') ?>/images/Memor- isation.svg"></span> Memorisation</a></li>
                                <li><a href="#" class="serv-btn"><span><img src="<?php echo site_url('assets/frontend/') ?>/images/Order QR Keepsake.svg"></span>Order QR keepsake </a></li>
                                <li><a href="#"> <span><img src="<?php echo site_url('assets/frontend/') ?>/images/Connection  Requests.svg"></span> Connection Requests</a></li>
                                <li><a href="#"> <span><img src="<?php echo site_url('assets/frontend/') ?>/images/Contact us.svg"></span> Contact Us</a></li>
                                <li><a href="#" class="serv-btn"><span><img src="<?php echo site_url('assets/frontend/') ?>/images/Log out.svg"></span>Logout</a></li>
                            </ul>
                        </nav>
                    </div>
                    </div>
                </nav>
                <div class="overlay-div"></div>
            </header>
            <div class="overlay-div"></div>
            <section id="section-1">
                <div class="container-fluid">
                <div class="row align-items-start"> 

                    <div class="col-12 col-md-12 d-flex">
                    <div class="logo m-3 d-none d-md-block">
                        <a href="<?php echo site_url() ?>"><img src="<?php echo site_url('assets/frontend/') ?>/images/Memorisation-logo1.png" style="width: 250px;" /></a> 
                    </div>
                    <nav class="navigation-custom">
                        
                        <div class="right-part d-none d-md-table">
                            <div class="searchBox float-start">
                                <input type="search" placeholder="search memorisation profiles">
                                <img src="<?php echo site_url('assets/frontend/') ?>/images/Search.png" />
                            </div>
                            <div class="menu-btn d-table mx-2 float-start">
                                <a href="#" class="menu-btn-toggle"><span><img src="<?php echo site_url('assets/frontend/') ?>/images/Menu.png" class="menu-line"> <img src="<?php echo site_url('assets/frontend/') ?>/images/Close.svg" class="close"></span></a>
                                <nav class="sidebar">
                                <ul>
                                    <li class="active"><a href="#">Visit memorisation</a></li>
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#login-modal">Log In <span class="fas fa-caret-down first"></span> </a>  </li>
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Up <span class="fas fa-caret-down first"></span> </a>  </li>
                                    <li><a href="#" class="serv-btn">Order QR keepsake <span class="fas fa-caret-down second"></span></a></li>
                                    <li><a href="#">contact us</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                </ul>
                                </nav>
                            </div>
                        </div>
                    </nav>
                    </div>
                </div>
            </section>
            <section class="my-5">
            <div class="container">
                <div class="row">
                    <div class="welcome-message">
                    <h1>404 Page</h1><p>The page you are trying to access doesn't exist. Go back to the home page and select the correct page.</p>
                    
                    <a href="<?php echo site_url() ?>" class="dark-btn" style="text-align:center;text-decoration:none">Back</a>
                    </div>
                </div>
            </div>
            </section>
            <footer class="d-none d-md-block">
                <div class="foot">
                    <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="logo">
                                <img src="<?php echo site_url('assets/frontend/') ?>/images/logo-white.png">
                                <p>Lorem ipsum dolor sit consectetur adipiscing
                                elit, sed do eiusmod tempor incididunt...
                                </p>
                            </div>
                        </div>
                        <div class="col-4 nav-foot tab-parent">
                            <h4>Usefullinks</h4>
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation"><button class="nav-link"  data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Life Of</button></li>
                                <li class="nav-item" role="presentation"><button  class="nav-link" id="pills-respect-tab" data-bs-toggle="pill" data-bs-target="#pills-respect" type="button" role="tab" aria-controls="pills-respect" aria-selected="false">Respect</button></li>
                                <li class="nav-item" role="presentation"><button  class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Timeline</button></li>
                                <li class="nav-item" role="presentation"><button  class="nav-link" >Blog</button></li>
                                <li class="nav-item" role="presentation"><button  class="nav-link" id="pills-media-tab" data-bs-toggle="pill" data-bs-target="#pills-media" type="button" role="tab" aria-controls="pills-media" aria-selected="false">Media</button></li>
                            </ul>
                        </div>
                        <div class="col-4 nav-foot social-foot">
                            <h4>Social Media</h4>
                            <ul>
                                <li><a href="#"><img src="<?php echo site_url('assets/frontend/') ?>/images/face-foot.png"> Facebook</a></li>
                                <li><a href="#"><img src="<?php echo site_url('assets/frontend/') ?>/images/insta-foot.png"> Instagram</a></li>
                                <li><a href="#"><img src="<?php echo site_url('assets/frontend/') ?>/images/foot-twit.png"> Twitter</a></li>
                            </ul>
                        </div>
                        <div class="col-12">
                            <div class="copy-text">
                                <p>ⒸMemorisation   All rights reserved   |   Terms and Conditions Apply</p>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </footer>
            <!-- sign-up Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" placeholder="Email" class="form-control aria-describedby="emailHelp">
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Confirmation code</label>
                                    <input type="Text" placeholder="Enter Confirmation code" class="form-control">
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" placeholder="Password" class="form-control">
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Confirm Password</label>
                                    <input type="password" placeholder="Confirm Password" class="form-control">
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">First Name</label>
                                    <input type="text" placeholder="First Name" class="form-control">
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                                    <input type="text" placeholder="Last Name" class="form-control">
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Address</label>
                                    <textarea placeholder="Address" class="form-control"></textarea>
                                </div>
                                </div>
                                <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Contact Number</label>
                                    <input type="tel" placeholder="Contact No." class="form-control">
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary btn-style">Submit</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Login Modal -->
            <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                    <input type="email" placeholder="Email" class="form-control aria-describedby="emailHelp">
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <input type="password" placeholder="Password" class="form-control">
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="mb-3 mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary btn-style">Submit</button>
                                    <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forget-modal" class="forget-password">Forget Password</a>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- forget password Modal -->
            <div class="modal fade" id="forget-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Forget Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Enter New Password</label>
                                    <input type="password" placeholder="Enter New Password" class="form-control">
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Confirm New Password</label>
                                    <input type="password" placeholder="Enter New Password" class="form-control">
                                </div>
                                </div>
                                <div class="col-12">
                                <div class="mb-3 mt-4 d-flex justify-content-between">
                                    <button type="button" class="btn btn-primary btn-style">Save</button>
                                </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Optional JavaScript; choose one of the two! -->
            <!-- Option 1: Bootstrap Bundle with Popper -->
            <script src="<?php echo site_url('assets/frontend/') ?>js/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
            <script src="<?php echo site_url() ?>js/custom.js"></script>
            <script src="<?php echo site_url('assets/frontend/') ?>js/owl.carousel.min.js"></script>
        </body>
        </html>
        <?php
        // Since $this is not available, use $this->CI instead
        $this->CI =& get_instance();
        // $this->CI->load->view('error404');
        // Your awesome code here!
        // ...
    }
}