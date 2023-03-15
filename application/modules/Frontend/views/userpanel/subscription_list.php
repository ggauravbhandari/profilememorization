<!-- Icon Font Stylesheet -->
<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   <div class="bg-light rounded h-100 p-4">
      <div class="table-responsive">
         <table class="table table-striped table-bordered tablelist" id="userlist">
            <thead>
               <tr>
                  <th scope="col" class="desktop">#</th>
                  <th scope="col"  class="desktop"><?php echo lang('email') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('name') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('subscription_type') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('status') ?></th>
                  <th scope="col"  class="desktop"><?php echo lang('date') ?></th>
               </tr>
            </thead>
            <tbody>
               <?php if(isset($result) && !empty($result)){
                  foreach($result as $k => $post_val){ 
                  ?>
               <tr>
                  <td scope="row"  class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('email') ?>"><?php echo $post_val->email ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('name') ?>"><?php echo $post_val->name ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('subscription_type') ?>"><?php
                        if($post_val->subscription_type ==1)
                        {
                           echo lang('daily_digest');
                        }
                        else
                        {
                           echo lang('weekly_digest') ;
                        } 
                   ?></td>
                   <td  class="mobile-flex" data-header="<?php echo lang('status') ?>"><?php
                        if($post_val->status ==1)
                        {
                           echo lang('subscribed');
                        }
                        else
                        {
                           echo lang('not_subscribed') ;
                        } 
                   ?></td>
                  <td  class="mobile-flex" data-header="<?php echo lang('date') ?>"><?php echo date_ymdformate($post_val->created_at) ?></td>                     
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