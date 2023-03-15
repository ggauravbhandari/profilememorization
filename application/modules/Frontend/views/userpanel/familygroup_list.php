<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   
   <div class="bg-light rounded h-100 p-4">
      <div class="table-responsive">
         
         <table class="table table-striped table-bordered tablelist" id="userlist">
            <thead>
               <tr>
                  <th scope="col" class="desktop">#</th>
                  <th scope="col"  class="desktop"><?php echo lang('group_name') ?></th>
                  <!-- <th scope="col"  class="desktop"><?php //echo lang('profile_name') ?></th> -->
                  <!-- <th scope="col"  class="desktop"><?php //echo lang('name') ?></th> -->
                  <th scope="col"  class="desktop"><?php echo lang('date') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('action') ?></th>
               </tr>
            </thead>
            <tbody>
               <?php if(isset($result) && !empty($result)){
                  foreach($result as $k => $post_val){ 
                  ?>
               <tr>
                  <td scope="row"  class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('group_name') ?>"><?php echo $post_val->group_name ?></td>
                  
                  
                  <td  class="mobile-flex" data-header="<?php echo lang('date') ?>"><?php echo date_ymdformate($post_val->created_at) ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('action') ?>">
                     <div class="action-btnrow">
                        <a  href="<?php echo site_url('family-member-list/'.$post_val->id) ?>" class="btn-primary btn"><?php echo lang('view_all_family_member') ?></a>
                        <!-- <a  href="javascript:void(0);" data-bs-toggle="modal" data-groupname="<?php echo $post_val->group_name ?>" data-groupid="<?php echo $post_val->id ?>" data-bs-target="#warden-assign-modal" class="btn-primary btn warden-assign-modal"><?php echo lang('warden_assign') ?></a> -->
                        
                     </div>
                  </td>
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