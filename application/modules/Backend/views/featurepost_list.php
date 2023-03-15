<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo lang('featured_posts') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" class="desktop"><?php echo lang('profile_name') ?></th>
                                <th scope="col" class="desktop"><?php echo lang('title') ?></th>
                                <th scope="col" class="desktop"><?php echo lang('category') ?></th>
                                <th scope="col" class="desktop"><?php echo lang('image') ?></th>
                                <th scope="col" class="desktop"><?php echo lang('description') ?></th>
                                <th scope="col" class="desktop"><?php echo lang('date') ?></th>
                                <th scope="col" class="desktop"><?php echo lang('status') ?></th>
                                <!-- <th scope="col" class="desktop"><?php echo lang('action') ?></th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as$k => $post_val){ ?>

                            <tr>
                                <td scope="row" class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                                <td class="mobile-flex" data-header="<?php echo lang('title') ?>"><?php echo (isset($post_val['first_name']) && $post_val['first_name']!='' && isset($post_val['last_name']) && $post_val['last_name']!='') ? $post_val['first_name'].' '.$post_val['last_name'] : '' ?></td>
                                <td class="mobile-flex" data-header="<?php echo lang('title') ?>"><?php echo $post_val['name'] ?></td>
                                <td class="mobile-flex" data-header="<?php echo lang('category') ?>"><?php echo ucwords(str_replace('_',' ',$post_val['tablename'])) ?></td>
                                <td class="mobile-flex" data-header="<?php echo lang('image') ?>"><img src="<?php echo ($post_val['image']!='' && $post_val['image']!='undefined') ? UploadStorage::url( $post_val['image'] ) : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" width="70" alt="<?php echo $post_val['name'] ?>" onerror="this.onerror=null; this.style.display='none'"/></td>
                                <td class="mobile-flex" data-header="<?php echo lang('description') ?>"><?php echo limitedwords($post_val['comment']) ?></td>
                                <td class="mobile-flex" data-header="<?php echo lang('date') ?>">
                                    <?php echo $post_val['post_date'] ?>
                                </td>
                                <td class="mobile-flex" data-header="<?php echo lang('status') ?>"><?php echo ($post_val['status']==1) ? lang('activate') : (($post_val['status']==2) ? lang('deactivate') : lang('pending')) ?></td>
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
