<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   
   <div class="bg-light rounded h-100 p-4">
      <div class="table-responsive">
         <table class="table table-striped table-bordered tablelist" id="userlist">
            <thead>
               <tr>
                  <th scope="col" class="desktop">#</th>
                  <th scope="col" class="desktop"><?php echo lang('profile_name') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('qrcode_image') ?></th>
                  <th scope="col" class="desktop"><?php echo lang('date') ?></th>
               </tr>
            </thead>
            <tbody>
               <?php if(isset($result) && !empty($result)){
                  foreach($result as $k => $post_val){ 
                  ?>
               <tr>
                  <td scope="row" class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                  <td class="mobile-flex" data-header="<?php echo lang('profile_name') ?>"><a href="<?php echo site_url('/?profile='.$post_val['profile_url']) ?>" class="text-decoration-none text-dark"><?php if(!empty($post_val['first_name'])){echo $post_val['first_name'].' '.$post_val['last_name'];}else{ echo "-";} ?></a></td>
                  <td class="mobile-flex" data-header="<?php echo lang('qrcode_image') ?>"><?php
                  if(isset($post_val['qrcode_img']) && $post_val['qrcode_img']!=''){ ?>
                  <img src="<?php echo $post_val['qrcode_img'] ?>" width="50px"/>
                  <?php } ?></td>

                  
                  <td class="mobile-flex" data-header="<?php echo lang('date') ?>"><?php echo ($post_val['updated_at']) ? $post_val['updated_at'] : $post_val['created_at'] ?></td>
                  
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