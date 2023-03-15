<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   
   <div class="bg-light rounded h-100 p-4">
      <div class="table-responsive">
         <?php 
         // echo wardencount().'<br>'.count($result).'<br>';
         // echo get_userplan_detail(user_allfamilygroup()['usertype'])->warden_limit;
         if(isset($result) && !empty($result) && count($result) < wardencount()){
         
         // print_r(user_allfamilygroup()['usertype']);
         // print_r(get_userplan_detail(user_allfamilygroup()['usertype'])->warden_limit);
         if(user_allfamilygroup()['ids']==1){
            if(isset($result) && count($result)<get_userplan_detail(user_allfamilygroup()['usertype'])->warden_limit){

         ?>
         <h2>
            <a href="<?php echo site_url('/add-warden') ?>" class="dashboard_button"><i class="fa fa-user me-2"></i> <?php echo lang('add_warden') ?></a>
         </h2>
         <?php }
         }elseif(user_allfamilygroup()['ids']>1){ ?>
            <h2>
               <a href="<?php echo site_url('/add-warden') ?>" class="dashboard_button"><i class="fa fa-user me-2"></i> <?php echo lang('add_warden') ?></a>
            </h2>
         <?php } }else{
            if(get_userplan_detail(user_allfamilygroup()['usertype'])->warden_limit>0 && count($result)<get_userplan_detail(user_allfamilygroup()['usertype'])->warden_limit){ ?>
               <h2>
                  <a href="<?php echo site_url('/add-warden') ?>" class="dashboard_button"><i class="fa fa-user me-2"></i> <?php echo lang('add_warden') ?></a>
               </h2>
            <?php }
         } ?>
         
         <table class="table table-striped table-bordered tablelist" id="userlist">
            <thead>
               <tr>
                  <th scope="col" class="desktop">#</th>
                  <th scope="col"  class="desktop"><?php echo lang('name') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('email') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('contactnumber') ?></th>
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
                  <td  class="mobile-flex" data-header="<?php echo lang('title') ?>"><?php echo $post_val->firstname.' '.$post_val->lastname ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('caption') ?>"><?php echo $post_val->email ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('contactnumber') ?>"><?php echo $post_val->contactnumber ?></td>
                  
                  <td  class="mobile-flex" data-header="<?php echo lang('date') ?>"><?php echo date_ymdformate($post_val->created_at) ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('action') ?>">
                     <div class="action-btnrow">
                        <a  href="<?php echo site_url('edit_warden/'.$post_val->id) ?>" class="btn-primary btn"><?php echo lang('edit_btn') ?></a>
                        <a  href="<?php echo site_url('delete_warden/'.$post_val->id) ?>" onclick="return confirm('<?php echo lang('confirm_delete_msg') ?>')" class="btn-primary btn"><?php echo lang('delete') ?></a>
                        <a   href="<?php echo site_url('warder_permission/'.$post_val->id) ?>" class="btn-primary btn"><?php echo lang('set_permission') ?></a>
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