<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo lang('lifeof') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo lang('title') ?></th>
                                <th scope="col"><?php echo lang('post_date') ?></th>
                                <th scope="col"><?php echo lang('image') ?></th>
                                <th scope="col"><?php echo lang('description') ?></th>
                                <th scope="col"><?php echo ucfirst(lang('sharedby')) ?></th>
                                <!-- <th scope="col"><?php echo lang('status') ?></th> -->
                                <!-- <th scope="col"><?php echo lang('action') ?></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as $k => $post_val){ ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $post_val->type ?></td>
                                <td><?php echo $post_val->post_date ?></td>
                                <td><img src="<?php echo ($post_val->images!='') ? UploadStorage::url($post_val->images) : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" width="70" alt="<?php echo $post_val->type ?>" onerror="this.onerror=null; this.style.display='none'"/></td>
                                <td><?php echo $post_val->description ?></td>
                                <td><?php echo user_detail($post_val->shared_by)->firstname.' '.user_detail($post_val->shared_by)->lastname ?></td>
                                <!-- <td><?php echo ($post_val->status==1) ? lang('activate') : lang('deactivate') ?></td> -->
                                <!-- <td> -->
                                    <!-- <div class="action-btnrow"> -->

                                    <?php /*if($post_val->status==0){ ?>
                                    <a  href="<?php echo site_url('admin/lifeof-poststatus/'.$post_val->id.'/1') ?>" class="btn-primary btn"><?php echo lang('active') ?></a>
                                    <?php }else{ ?>
                                    <a  href="<?php echo site_url('admin/lifeof-poststatus/'.$post_val->id.'/0') ?>" class="btn-danger btn"><?php echo lang('deactive') ?></a>
                                    <?php }*/ ?>
                                    <!-- </div> -->
                                <!-- </td> -->
                            </tr>
                                <?php }
                            }else{
                                echo '<tr><td colspan="10">'.lang('no_record_found').'</td></tr>';
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
