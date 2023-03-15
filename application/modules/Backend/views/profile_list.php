<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo lang('profile_list') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo lang('profile_name') ?></th>
                                <th scope="col"><?php echo lang('fullname') ?></th>
                                <th scope="col"><?php echo lang('dob') ?></th>
                                <th scope="col"><?php echo lang('deceased') ?></th>
                                <th scope="col"><?php echo lang('location') ?></th>
                                <th scope="col"><?php echo lang('profile_pic') ?></th>
                                <th scope="col"><?php echo lang('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as$k => $post_val){ ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $post_val->profile_name ?></td>
                                <td><?php echo $post_val->first_name.' '.$post_val->last_name ?></td>
                                <td><?php echo $post_val->dob ?></td>
                                <td><?php echo $post_val->deceased ?></td>
                                <td><?php echo $post_val->location ?></td>
                                <td><img src="<?php echo ($post_val->profile_pic!='') ? UploadStorage::url( $post_val->profile_pic ) : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" width="70" alt="<?php echo $post_val->profile_name ?>" onerror="this.onerror=null; this.style.display='none'"/>
                                </td>
                                <td>
                                    <div class="action-btnrow">
                                    <a href="<?php echo site_url('admin/profile-view/'.$post_val->id) ?>"><i class="fa fa-eye me-2"></i></a>
                                    <!-- <a href="<?php //echo site_url('admin/profile-delete/'.$post_val->id) ?>" class="text-danger" onclick="return confirm('Are you sure to delete this!')"><i class="fa fa-trash me-2"></i></a> -->

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
