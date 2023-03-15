<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo lang('timeline_list') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo lang('title') ?></th>
                                <th scope="col"><?php echo lang('date') ?></th>
                                <th scope="col"><?php echo lang('image') ?></th>
                                <th scope="col"><?php echo lang('description') ?></th>
                                <th scope="col"><?php echo lang('status') ?></th>
                                <th scope="col"><?php echo lang('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as $k => $post_val){ ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $post_val->title ?></td>
                                <td><?php echo $post_val->from_date.'-'.$post_val->to_date ?></td>
                                <td><img src="<?php echo ($post_val->timeline_image!='') ? UploadStorage::url( $post_val->timeline_image ) : base_url('assets/frontend/uploads/').get_defaultimage()->profile_img ?>" width="70" alt="<?php echo $post_val->title ?>" onerror="this.onerror=null; this.style.display='none'"/></td>
                                <td><?php echo $post_val->description ?></td>

                               <td>
                                   <?php
                                      if($post_val->status==0)
                                      {
                                         echo lang('pending');
                                      }
                                      elseif($post_val->status==1)
                                      {
                                         echo lang('activate');
                                      }
                                      elseif($post_val->status==2)
                                      {
                                         echo lang('deactivate');
                                      }?>
                               </td>
                               <td>
                                    <div class="action-btnrow">

                                    <?php if($post_val->status==0 || $post_val->status==2){ ?>
                                    <a  href="<?php echo site_url('admin/updateactivestatus/timeline/'.$post_val->id.'/1') ?>" class="btn-primary btn"><?php echo lang('active') ?></a>
                                    <?php }else{ ?>
                                    <a  href="<?php echo site_url('admin/updateactivestatus/timeline/'.$post_val->id.'/2') ?>" class="btn-danger btn"><?php echo lang('deactive') ?></a>
                                    <?php } ?>
                                    </div>
                             </td>
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
