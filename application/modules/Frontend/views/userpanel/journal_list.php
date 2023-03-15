<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   <div class="row">
      <div class="col-3">
         <h2 class="head-title table-title-list mt-3 mb-0 brscard"><?php echo lang('search_by_status') ?> </h2>
      </div>
      <div class="col-7">
         <form class="searchingform">
            <select class="form-control" name="status" onchange="this.form.submit()" require>

               <?php
                  $status_array = status_array();
                  for($st=0; $st<count($status_array);$st++){ ?>
               <option value="<?php echo $st ?>" <?php echo (isset($_GET['status']) && $_GET['status']==$st && $_GET['status']!='') ? 'selected="selected"' : '' ?>><?php echo $status_array[$st] ?></option>
               <?php } ?>
            </select>
         </form>
      </div>
   </div>
   <div class="bg-light rounded h-100 p-4">
      <div class="table-responsive">
         <table class="table table-striped table-bordered tablelist" id="userlist">
            <thead>
               <tr>
                  <th scope="col" class="desktop">#</th>
                  <th scope="col" class="desktop"><?php echo lang('title') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('category') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('image') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('description') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('date') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('is_public') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('status') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('action') ?></th>
               </tr>
            </thead>
            <tbody>
               <?php if(isset($result) && !empty($result)){
                  foreach($result as $k => $post_val){
                     $imgname = 'profile_img';
                     if($post_val->category && $post_val->category!=''){
                        $imgname = 'journal_'.$post_val->category;
                     }

                  ?>
               <tr>
                  <td scope="row" class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('title') ?>"><?php echo $post_val->title ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('category') ?>"><?php echo $post_val->category ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('image') ?>"><img src="<?php echo  UploadStorage::url($post_val->image, site_url('/assets/frontend/uploads/').get_defaultimage()->$imgname ); ?>" width="70" alt="<?php echo $post_val->title ?>" onerror="this.onerror=null; this.src='<?php echo base_url('assets/frontend/uploads/').get_defaultimage()->$imgname ?>'"/></td>
                  <td class="mobile-flex" data-header="<?php echo lang('description') ?>"><?php echo $post_val->description ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('date') ?>">
                     <?php echo $post_val->created_at ?>
                  </td>
                  <td class="mobile-flex" data-header="<?php echo lang('is_public') ?>"><?php echo ($post_val->is_public==1) ? 'Public' : 'Private' ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('status') ?>">
                     <?php
                        if($post_val->status==0)
                        {
                           echo lang('pending');
                        }
                        elseif($post_val->status==1)
                        {
                           echo lang('activate');
                        }
                        elseif($post_val->status==2)
                        {
                           echo lang('deactivate');
                        }?>
                  </td>
                  <td class="mobile-flex" data-header="<?php echo lang('action') ?>">
                     <div class="action-btnrow">
                        <a  href="<?php echo site_url('edit-journal/'.$post_val->id) ?>" class="btn-primary btn"><?php echo lang('edit_btn') ?></a>
                        <?php
                        $nopermission = lang('user_no_permission');
                        if(get_frontauthuser('warden_user_id')==0 || (get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','approve'))){
                           $nopermission = ''; ?>
                        <a  href="<?php echo site_url('delete_journal/'.$post_val->id) ?>" onclick="return confirm('<?php echo lang('confirm_delete_msg') ?>')" class="btn-primary btn"><?php echo lang('delete') ?></a>
                        <?php }
                        if($post_val->is_public==1){
                        if(get_frontauthuser('warden_user_id')==0 || (get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'media_post','approve'))){
                           $nopermission = '';
                        if($post_val->status==0 || $post_val->status==2){ ?>
                        <a  href="<?php echo site_url('updateactivestatus/journal_post/'.$post_val->id.'/1') ?>" class="btn-primary btn"><?php echo lang('active') ?></a>
                        <?php }else{ ?>
                        <a  href="<?php echo site_url('updateactivestatus/journal_post/'.$post_val->id.'/2') ?>" class="btn-danger btn"><?php echo lang('deactive') ?></a>
                        <?php } }
                        }else{
                           $nopermission = '';
                           echo lang('privacy_text');
                        }
                        if($nopermission!=''){
                           echo $nopermission;
                        }
                        ?>
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
