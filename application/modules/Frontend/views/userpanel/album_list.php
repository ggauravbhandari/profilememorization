<!-- Icon Font Stylesheet -->
<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   <div class="bg-light rounded h-100 p-4">
      <div class="table-responsive">
         <table class="table table-striped table-bordered tablelist" id="userlist">
            <thead>
               <tr>
                  <th scope="col" class="desktop">#</th>
                  <th scope="col"  class="desktop"><?php echo lang('title') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('caption') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('profile_name') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('date') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('is_public') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('action') ?></th>
               </tr>
            </thead>
            <tbody>
               <?php if(isset($result) && !empty($result)){
                  foreach($result as $k => $post_val){ 
                  ?>
               <tr>
                  <td scope="row"  class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('title') ?>"><?php echo $post_val->title ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('caption') ?>"><?php echo $post_val->caption ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('profile_name') ?>"><?php echo get_userprofile($post_val->profile_id)->profile_name ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('date') ?>"><?php echo date_ymdformate($post_val->created_at) ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('is_public') ?>"><?php echo ($post_val->is_public==1) ? 'Public' : 'Private' ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('action') ?>">
                     <div class="action-btnrow">
                        <a  href="<?php echo site_url('album-image-list/'.$post_val->id) ?>" class="btn-primary btn" title="<?php echo lang('view_image') ?>"><?php echo lang('view_image') ?></a>
                        <a  href="<?php echo site_url('edit-album/'.$post_val->id) ?>" class="btn-primary btn"><?php echo lang('edit_btn') ?></a>
                        <?php 
                        if(get_frontauthuser('warden_user_id')==0 || (get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','delete'))){
                           $nopermission = ''; ?>
                        <a  href="<?php echo site_url('delete_album/'.$post_val->id) ?>" onclick="return confirm('<?php echo lang('confirm_delete_msg') ?>')" class="btn-primary btn"><?php echo lang('delete') ?></a>
                        <?php } ?>
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