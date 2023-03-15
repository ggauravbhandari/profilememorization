<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo (isset($pagetitle)) ? $pagetitle : lang('pagetitle') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo lang('comment_by') ?></th>
                                <th scope="col"><?php echo lang('emailaddress') ?></th>
                                
                                <th scope="col"><?php echo lang('comment_on') ?></th>
                               
                                <th scope="col"><?php echo lang('description') ?></th>                                
                                <th scope="col"><?php echo lang('date') ?></th>
                                <th scope="col"><?php echo lang('status') ?></th>
                                <th scope="col"><?php echo lang('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as $k => $post_val){ 
                                  
                                ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $post_val->name?></td>
                                <td><?php echo $post_val->email ?></td>

                                <td><?php echo ucwords(str_replace('_',' ',$post_val->post_type)) ?></td>
                               
                                <td><?php echo $post_val->comment ?>
                                
                                <td><?php echo date_ymdformate($post_val->created_at) ?></td>
                                <td><?php echo ($post_val->status==1) ? lang('activate') : lang('deactivate') ?></td>
                                <td>
                                    <div class="action-btnrow">
                                    
                                    <?php if($post_val->status==0){ ?>
                                    <a  href="<?php echo site_url('admin/comment_poststatusupdate/'.$post_val->id.'/1') ?>" class="btn-primary btn"><?php echo lang('active') ?></a>
                                    <?php }else{ ?>
                                    <a  href="<?php echo site_url('admin/comment_poststatusupdate/'.$post_val->id.'/0') ?>" class="btn-danger btn"><?php echo lang('deactive') ?></a>
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