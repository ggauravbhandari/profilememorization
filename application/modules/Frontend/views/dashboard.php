<!-- Icon Font Stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<section id="section-1">
   <div class="container-fluid">
   <div class="row align-items-start">
      <div class="col-12 col-md-12 d-flex">
         <nav class="navigation-custom">
            <div class="right-part d-none d-md-table">
               <div class="searchBox float-start">
                  <input type="search" placeholder="search memorisation profiles">
                  <img src="<?php echo site_url('assets/frontend/') ?>images/Search.png" />
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
<section class="sidebar-table">
   <div class="container-fluid pt-4 px-4">
      <div class="row g-4">         
         <div class="col-2">
         </div>
         <div class="col-10">
            <h2 class="head-title mt-3 mb-0">My Account</h2>
        </div>
      </div>
      <div class="row g-4">
         <div class="col-2">
            <div class="sidebar-md" id="myDIV">
               <div class="bt-box">
                  <button onclick="myFunction()">
                  <span>
                  <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/Menu.png" class="menu-line"> 
                  <img src="https://staging-profile.memorisation.co.uk/assets/frontend/images/Close.svg" class="close">
                  </span>
                  </button>
               </div>
               <div class="tag-menu">
                  <ul>
                     <li>
                        <a href="https://staging-profile.memorisation.co.uk/user_dashboard"><i class="fa fa-list-ol"></i> Dashboard</a>
                     </li>
                    
                     <li>
                        <a href="https://staging-profile.memorisation.co.uk/user/comment-list"><i class="fa fa-list-ol"></i> Comments</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-ol"></i> Life of</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-ol"></i> Memory</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-ol"></i> Timeline</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-ol"></i> Respect</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-ol"></i> Media</a>
                     </li>
                     <li>
                        <a href="#"><i class="fa fa-list-ol"></i> Journal</a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
         <div class="col-10">
            <div class="bg-light rounded h-100 p-4">
               <h6 class="mb-4"><?php echo lang('menu1') ?></h6>
              <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total User</p>
                                <h6 class="mb-0">3</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Free User</p>
                                <h6 class="mb-0">3</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Basic User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Pro User</p>
                                <h6 class="mb-0">0</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            </div>
         </div>
      </div>
   </div>
</section>
<script>
   function myFunction() {
      var element = document.getElementById("myDIV");
      element.classList.toggle("mystyle");
   }
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript">
   $(document)
     .ready(function () {
       $('#userlist')
         .DataTable();
     });
</script>