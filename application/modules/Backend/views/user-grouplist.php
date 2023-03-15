<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo lang('userlist') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo lang('group_name') ?></th>
                                <th scope="col"><?php echo lang('usertype') ?></th>
                                <th scope="col"><?php echo lang('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as$k => $user_val){ ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $user_val->group_name ?>

                                </td>
                                <td><?php echo ucfirst(get_user_plan($user_val->userplan_type)) ?>
                                    <form action="" method="post" class="userplan-group" style="display: none;">
                                        <input type="hidden" name="group_id" value="<?php echo $user_val->id ?>">
                                        <select name="userplan_type" class="form-control">
                                        <?php if(isset($userplan_type) && !empty($userplan_type) && is_array($userplan_type)){
                                            foreach($userplan_type as $plan_value){ 
                                                if(!in_array($plan_value->usertype,array('free','Admin'))){ ?>?>
                                                <option value="<?php echo $plan_value->id ?>" <?php echo ($plan_value->id==$user_val->userplan_type) ? 'selected="selected"' : '' ?>><?php echo strtoupper($plan_value->usertype) ?></option>
                                            <?php } }
                                        } ?>
                                    </select>
                                        <input type="submit" name="save" value="save" class="btn-primary btn ">
                                    </form>
                                </td>
                                <td>
                                    <div class="action-btnrow">
                                    <a  href="<?php echo site_url('admin/profile-list/'.$user_val->id) ?>" class="btn-primary btn">Profile
                                    <i class="fa fa-eye"></i>
                                    </a>
                                    <a  href="javascript:;" class="btn-primary btn showformuserplangroup">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <?php 
                                    /* 
                                    if($user_val->user_status==0){ ?>
                                    <a  href="<?php echo site_url('admin/userstatus-update/'.$user_val->id.'/1') ?>" class="btn-primary btn"><?php echo lang('active') ?></a>
                                    <?php }else{ ?>
                                    <a  href="<?php echo site_url('admin/userstatus-update/'.$user_val->id.'/0') ?>" class="btn-danger btn"><?php echo lang('deactive') ?></a>
                                    <?php } ?>
                                    <a  href="<?php echo site_url('admin/delete-user/'.$user_val->id) ?>" onclick="return confirm('<?php echo lang('confirm_delete_msg') ?>')" class="btn-danger btn">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                    <?php */ ?>
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
