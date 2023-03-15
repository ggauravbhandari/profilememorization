<?php

   if(isset($middelsection['journal_post']) && !empty($middelsection['journal_post'])){
      $checkjournol_count =0;
      foreach($middelsection['journal_postslider'] as $jsk => $val){
         if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){
         if((checkauth() && $val->user_id==get_frontauthuser('user_id')) ||  (check_post_pubicprivate($val->id,'journal_post'))){
            $checkjournol_count++;
         }
         }
      }


   if($checkjournol_count>0){

   ?>
   <!-- journal-slider -->
<div class="col-12 col-md-4 ">
   <div class=" m-parent-journal-">
      <div class="journal-slider">
         <div class="m-cover">
            <div class="m-conetnt">
               <div class="owl-carousel owl-3 owl-theme">
                  <?php

                  foreach($middelsection['journal_postslider'] as $jsk => $val){

                     if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){
                        $imgedefaultpath = ($val->category) ? 'journal_'.$val->category : 'profile_img';

                  ?>
                  <!-- <div class="item"> -->
                  <div class="item" style="background-image: url(<?php echo UploadStorage::url( $val->image, site_url('assets/frontend/uploads/' . get_defaultimage()->$imgedefaultpath ) ) ?>);">
                     <div class="item-content-inner">
                        <div class="content-inner-patch">
                           <h3><?php echo $val->title ?></h3>
                           <p><?php echo $val->description ?>
                           </p>
                        </div>
                     </div>
                  </div>
                  <?php } } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- <div class="col-6 col-md-8">
   <div class="row">
   <?php //echo $this->load->view('journal_single_post',['middelsection'=>$middelsection]); ?>
</div>
</div>  -->

<div class="col-12 col-md-8">
   <div class="row">
      <?php
      $this->load->view('journal_single_post',['middelsection'=>$middelsection]);
      /*foreach($middelsection['journal_post'] as $jk => $val){
      if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){
      ?>
      <div class="overflow-hidden m-parent col-md-6">
         <div class="journal-parent mt-4 mt-md-2">
            <div class="j-cover">
               <div class="m-conetnt">
                  <h3>Strike at the Riksdog <span>20th March,2021</span> <span>Posted by:
                        Mitchel Jonson</span></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                     tempor incididunt ut labore et dolore magna aliqua. <a href="#">Read
                        More....</a></p>
                  <div class="d-flex align-items-center justify-content-between mt-2">
                     <p class="j-user">Michael, James& 16 Others</p>
                     <a href="javascript:void(0)" data-bs-toggle="modal"
                        data-bs-target="#post-detail-popup"
                        class="journal-detail-btn"><span><img
                              src="images/arrow-right-white.png"></span></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php
      }
      }*/
      if(count($middelsection['journal_post'])>4){ ?>
      <div class="journalloadmorewrapper">
      <button type="button" class="btn btn-submit-request journalloadmore" data-bs-toggle="collapse" href="#journal_single_post_loadmore" role="button" aria-expanded="false" aria-controls="collapseExample">Load More</button>
      </div>
      <?php } ?>
   </div>
</div>
<div class="col-12 col-md-12">
   <div class="row collapse" id="journal_single_post_loadmore">
      <?php $this->load->view('journal_single_post_loadmore',['middelsection'=>$middelsection]); ?>
   </div>
</div>
<?php

   // echo '<div class="col-6 col-md-4">';
      // echo '<div class="row journal-posthtmldata">';
   // foreach($middelsection['journal_post'] as $jk => $val){
   //    if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){
   //    //  if($jk<2){
   //       echo '<div class="col-6 col-md-4">';

         // echo '</div>';

      //  }
   //    }
   // }


   // echo '</div></div>';
   // echo '<div class="col-6 col-md-4">';
      //  echo  '<div class="row">';
   // foreach($middelsection['journal_post'] as $jk => $val){
   //    if((checkauth() && $val->user_id==get_frontauthuser('user_id')) || $val->status==1){
   //     if($jk>1){
   //         $this->load->view('journal_single_post',['val'=>$val]);
   //     }
   //    }

   // }
   // echo '</div>';
   // echo '</div>';
}else{
   echo '<h2 class="no_record norecord-message" style="margin-top:15px">'.lang('no_record_found').'</h2>';
}
   }else{
   echo '<h2 class="no_record norecord-message" style="margin-top:15px">'.lang('no_record_found').'</h2>';
   } ?>
   <script type="text/javascript">
   $('.journalloadmore').click(function(){
      $(this).hide();
   })
   $(function() {
   // Owl Carousel
   var owl = $(".owl-carousel");
   owl.owlCarousel({
      items: 1,
      margin: 10,
      loop: true,
      nav: true
   });
   });
   </script>
