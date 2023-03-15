<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   
   <div class="bg-light rounded h-100 p-4">
      <div class="table-responsive">
         <table class="table table-striped table-bordered tablelist" id="userlist">
            <thead>
               <tr>
                  <th scope="col" class="desktop">#</th>
                  <!-- <th scope="col"  class="desktop"><?php echo lang('name') ?></th> -->
                  <th scope="col"  class="desktop"><?php echo lang('profile_name') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('like_on') ?></th>
                  <!-- <th scope="col"  class="desktop"><?php echo lang('number_of_like') ?></th> -->
               </tr>
            </thead>
            <tbody>
               <?php if(isset($result) && !empty($result)){
                  foreach($result as $k => $post_val){ 
                  ?>
               <tr>
                  <td scope="row"  class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                  <!-- <td  class="mobile-flex" data-header="<?php echo lang('name') ?>"><?php echo $post_val->firstname.' '.$post_val->lastname ?></td> -->
                  <td  class="mobile-flex" data-header="<?php echo lang('profile_name') ?>"><?php echo ($post_val->profile_id>0 && get_userprofile($post_val->profile_id)) ? '<a target="_blank" href="'.site_url('?profile=').get_userprofile($post_val->profile_id)->profile_url.'">'.get_userprofile($post_val->profile_id)->first_name.' '.get_userprofile($post_val->profile_id)->last_name.'</a>' : '' ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('like_on') ?>">
                     <?php echo ucwords(str_replace('_',' ',$post_val->table)) ?>
                  </td>
                  <!-- <td  class="mobile-flex" data-header="<?php echo lang('number_of_like') ?>">
                     <?php echo $post_val->like_count ?>
                  </td> -->
               </tr>
               <?php }
                  } ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
</div>
</div>
</section>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript">
   $(document)
      .ready(function () {
        $('#userlist')
          .DataTable({"oLanguage": {
          "sSearch": "<?php echo lang('search_any_text') ?>"
   }});
      });
</script>