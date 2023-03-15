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
                                <th scope="col"><?php echo lang('title') ?></th>
                                <th scope="col"><?php echo lang('caption') ?></th>
                                <th scope="col"><?php echo lang('profile_name') ?></th>
                                <th scope="col"><?php echo lang('date') ?></th>
                                <th scope="col"><?php echo lang('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as $k => $post_val){ 
                                  
                                ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $post_val->title ?></td>
                                <td><?php echo $post_val->caption ?></td>
                                <td><?php echo get_userprofile($post_val->profile_id)->profile_name ?></td>
                                
                                <td><?php echo date_ymdformate($post_val->created_at) ?></td>
                                <!-- <td><?php echo ($post_val->status==1) ? lang('activate') : lang('deactivate') ?></td> -->
                                <td>
                                    <div class="action-btnrow">
                                        <a  href="<?php echo site_url('admin/media_images/'.$post_val->id) ?>" class="btn-primary btn" title="<?php echo lang('view_image') ?>"><i class="fa fa-eye"></i></a>
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