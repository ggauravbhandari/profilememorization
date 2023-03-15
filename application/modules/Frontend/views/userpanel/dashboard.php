<?php echo $this->load->view('userpanel/userpanel_header') ?>
<style>
.gmin{min-height:45px;}
</style>
<div class="col-10 user_dashboard">
   <?php if($this->session->flashdata('success')){ ?>
   <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
   <?php } ?>
   <div class="bg-light rounded h-100 p-4">
      <div class="container-fluid pt-4 px-4">
         <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <a href="<?php echo site_url('/comment-list?status=0') ?>"><i class="fa-solid fa-comments fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_comment') ?></p>
                     
                        <h6 class="mb-0"><a href="<?php echo site_url('/comment-list?status=0') ?>"><?php echo (isset($commentcount_pending)) ? $commentcount_pending  :0 ?></a>/<a href="<?php echo site_url('/comment-list?status=3') ?>"><?php echo (isset($commentcount)) ? $commentcount  :0 ?></a></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <a href="<?php echo site_url('/memory-list?status=0') ?>"><i class="fa fa-memory fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_memory') ?></p>
                     
                        <h6 class="mb-0"><a href="<?php echo site_url('/memory-list?status=0') ?>"><?php echo (isset($memorycount_pending['count'])) ? $memorycount_pending['count']  :0 ?></a>/<a href="<?php echo site_url('/memory-list?status=3') ?>"><?php echo (isset($memorycount['count'])) ? $memorycount['count']  :0 ?></a></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <a href="<?php echo site_url('/timeline-list?status=0') ?>"><i class="fa fa-timeline fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_timeline') ?></p>
                     
                        <h6 class="mb-0"><a href="<?php echo site_url('/timeline-list?status=0') ?>"><?php echo (isset($timelinecount_pending['count'])) ? $timelinecount_pending['count']  :0 ?></a>/<a href="<?php echo site_url('/timeline-list?status=3') ?>"><?php echo (isset($timelinecount['count'])) ? $timelinecount['count']  :0 ?></a></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
  
                  <a href="<?php echo site_url('/respect-list?status=0') ?>"><i class="fa fa-thumbs-up fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_respect') ?></p>
                     
                        <h6 class="mb-0"><a href="<?php echo site_url('/respect-list?status=0') ?>"><?php echo (isset($respectcount_pending['count'])) ? $respectcount_pending['count']  : 0 ?></a>/<a href="<?php echo site_url('/respect-list?status=3') ?>"><?php echo (isset($respectcount['count'])) ? $respectcount['count']  :0 ?></a></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                
                  <a href="<?php echo site_url('/album-list') ?>"><i class="fa fa-object-ungroup fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_album') ?></p>
                     <a href="<?php echo site_url('/album-list') ?>">
                        <h6 class="mb-0"><?php echo (isset($albumcount['count'])) ? $albumcount['count']  :0 ?></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <a href="<?php echo site_url('/album-list') ?>"><i class="fa fa-picture-o fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_album_image') ?></p>
                     <a href="<?php echo site_url('/album-list') ?>">
                        <h6 class="mb-0"><?php //echo (isset($albumcountimage_pending['count'])) ? $albumcountimage_pending['count']  :0 ?><?php echo (isset($albumcountimage['count'])) ? $albumcountimage['count']  :0 ?></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <a href="<?php echo site_url('/journal-list?status=0') ?>"><i class="fa fa-hourglass fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_journal') ?></p>
                     
                        <h6 class="mb-0"><a href="<?php echo site_url('/journal-list?status=0') ?>"><?php echo (isset($journacount_pending['count'])) ? $journacount_pending['count']  : 0 ?></a>/<a href="<?php echo site_url('/journal-list?status=3') ?>"><?php echo (isset($journacount['count'])) ? $journacount['count']  : 0 ?></a></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <a href="<?php echo site_url('/like-list') ?>"><i class="fa-regular fa-heart fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_like') ?></p>
                     <a href="<?php echo site_url('/like-list') ?>">
                        <h6 class="mb-0"><?php echo (isset($postlikecount['count'])) ? $postlikecount['count']  :0 ?></h6>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <a href="<?php echo site_url('/featured-list?status=0') ?>"><i class="fa fa-clipboard fa-3x text-primary"></i></a>
                  <div class="ms-3">
                     <p class="mb-2 gmin"><?php echo lang('total_featured_post') ?></p>

                     
                     <h6 class="mb-0"><a href="<?php echo site_url('/featured-list?status=0') ?>"><?php echo (isset($featuredpostcount_pending)) ? $featuredpostcount_pending  :0 ?></a>/<a href="<?php echo site_url('/featured-list?status=3') ?>"><?php echo (isset($featuredpostcount)) ? $featuredpostcount  :0 ?></a></h6>
                  </a>
                  </div>
               </div>
            </div>
            <?php /*if(checkauth() && get_frontauthuser('warden_user_id')==0){ ?>
            <div class="col-sm-6 col-xl-3">
               <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                  <i class="fa fa-chart-pie fa-3x text-primary"></i>
                  <div class="ms-3">
                     <p class="mb-2"><?php echo lang('active_pending_post') ?></p>

                     <a href="<?php echo site_url('/active-pending-postlist') ?>">
                     <h6 class="mb-0" style="background: #90a792;border: 1px solid #90a792;color: #fff;text-align: center;padding: 2px;border-radius: 3px;">Active</h6>
                     </a>
                  </div>
               </div>
            </div>
         <?php }*/ ?>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</section>
<script>
   
</script>