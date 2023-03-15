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
            <option value="<?php echo $st ?>" <?php echo (isset($_GET['status']) && $_GET['status']==$st && $_GET['status']!='') ? 'selected="selected"' : ''  ?>><?php echo $status_array[$st] ?></option>
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
                  <th scope="col" class="desktop"><?php echo lang('comment_by') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('emailaddress') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('comment_on') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('profile_name') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('description') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('date') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('status') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('action') ?></th>
               </tr>
            </thead>
            <tbody>
               <?php if(isset($result) && !empty($result)){
                  foreach($result as $k => $post_val){ 
                  ?>
               <tr>
                  <td scope="row" class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('comment_by') ?>"><?php if(!empty($post_val['name'])){echo $post_val['name'];}else{ echo "-";} ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('emailaddress') ?>"><?php if(!empty($post_val['email'])){echo $post_val['email'];}else{ echo "-";} ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('comment_on') ?>"><?php echo ucwords(str_replace('_',' ',$post_val['post_type'])) ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('profile_name') ?>">
                     <?php 
                     if(isset($post_val['post_type']) && $post_val['post_type']!=''){
                        if($post_val['post_type']=='memory_post'){
                           $tbname = 'memories';
                        }elseif($post_val['post_type']=='media_post'){
                           $tbname = 'media_images';
                        }else{
                           $tbname = $post_val['post_type'];
                        }
                        echo get_comment_profilename($post_val['post_id'],$tbname);
                     }
                      ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('description') ?>"><?php echo $post_val['comment'] ?>
                  <td class="mobile-flex" data-header="<?php echo lang('date') ?>"><?php echo date_ymdformate($post_val['created_at']) ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('status') ?>"><?php echo ($post_val['status']==1) ? lang('activate') : (($post_val['status']==2) ? lang('deactivate') : lang('pending')) ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('action') ?>">
                     <div class="action-btnrow">
                        <?php 
                        $nopermission = lang('user_no_permission');
                        if(get_frontauthuser('warden_user_id')==0 || (get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'comments','approve'))){ 
                           $nopermission = '';
                        ?>
                        <?php if($post_val['status']==0 || $post_val['status']==2){ ?>
                        <a  href="<?php echo site_url('updateactivestatus/comment_post/'.$post_val['id'].'/1') ?>" class="btn-primary btn"><?php echo lang('active') ?></a>
                        <?php }else{ ?>
                        <a  href="<?php echo site_url('updateactivestatus/comment_post/'.$post_val['id'].'/2') ?>" class="btn-danger btn"><?php echo lang('deactive') ?></a>
                        <?php } }
                        if(get_frontauthuser('warden_user_id')==0 || (get_frontauthuser('warden_user_id') && checkwarden_permission(get_frontauthuser('warden_user_id'),'comments','delete'))){ 
                           $nopermission = '';
                        ?>
                        <a  href="<?php echo site_url('delete_comment/'.$post_val['id']) ?>" onclick="return confirm('<?php echo lang('confirm_delete_msg') ?>')" class="btn-primary btn"><?php echo lang('delete') ?></a>
                        <?php }
                        if($nopermission!=''){
                           echo $nopermission;
                        } ?>
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