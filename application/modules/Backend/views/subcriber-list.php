<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo lang('subscription_list') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo lang('name') ?></th>
                                <th scope="col"><?php echo lang('email') ?></th>
                                <th scope="col"><?php echo lang('profile_name') ?></th>
                                <th scope="col"><?php echo lang('date') ?></th>
                                <th scope="col"><?php echo lang('subscription_type') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as $k => $post_val){ ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $post_val->name ?></td>
                                <td><?php echo $post_val->email ?></td>
                                <td><?php echo $post_val->profile_name ?></td>
                                <td><?php echo $post_val->created_at ?></td>
                                <td><?php echo ($post_val->subscription_type==2) ? 'Weekly' : 'Daily' ?></td>
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
