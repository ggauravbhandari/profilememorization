<!-- Icon Font Stylesheet -->
<style>
   .flag-container{
      height:35px !important;
   }
   
</style>
<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   <div class="bg-light rounded h-100 p-4">
      <div class="row">
        <form action="<?php echo site_url('warden_permission_post') ?>" method="post" id="wardenForm" novalidate="novalidate" style="width:100%;">
            <input type="hidden" value="<?php echo $result[0]->warder_user_id ?>" name="warder_user_id"/>
            <div class="row">
                <?php 
                if(isset($result_section) && $result_section!=''){
                    
                //foreach($result as $val){ ?>
                <table class="table table-striped table-bordered tablelist" id="wardenpermission">
                    <thead>
                    <tr>
                        <th scope="col"  class="desktop"><?php echo lang('section_name') ?></th>
                        <th scope="col"  class="desktop"><?php echo lang('delete') ?></th>
                        <th scope="col"  class="desktop"><?php echo lang('make_feature') ?></th>
                        <th scope="col"  class="desktop"><?php echo lang('approve_comment') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($result) && !empty($result) && isset($result_section) && $result_section!=''){
                        foreach($result_section as $k => $val){ 
                            ?>
                    <tr>
                        <td  class="mobile-flex" data-header="<?php echo lang('title') ?>"><?php echo ucwords(str_replace('_',' ',$val->section_name)) ?></td>
                        <?php 
                        $td=0;
                        foreach($result as $ktd => $per_val){ 
                            // echo $per_val->id.'<br>';
                            if(in_array($per_val->id,explode(',',$val->id))){ 
                                //echo $td.$per_val->section_name;
                                
                                if($per_val->section_name=='comments' && $td==1){
                                echo '<td>  </td>';}
                                $td++; ?>
                        <td  class="mobile-flex" data-header="<?php echo lang('caption') ?>">
                            <input type="checkbox" name="<?php echo $per_val->section_name.'@'.$per_val->permission_type ?>" value="<?php echo $per_val->permission_status ?>" id="permission_type"  <?php echo ($per_val->permission_status==1) ? 'checked="checked"'  : '' ?>></td>
                        <?php } }  ?>
                        
                    </tr>
                    <?php }
                        } ?>
                    </tbody>
                </table>
               <?php } //} ?>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-style">Submit</button>
        </form>
      </div>
   </div>
</div>
</div>
</div>
</section>