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
                                <th scope="col"><?php echo lang('firstname') ?></th>
                                <th scope="col"><?php echo lang('lastname') ?></th>
                                <th scope="col"><?php echo lang('email') ?></th>
                                <th scope="col"><?php echo lang('contactnumber') ?></th>
                                <!-- <th scope="col"><?php echo lang('house_no') ?></th>
                                <th scope="col"><?php echo lang('address_1') ?></th>
                                <th scope="col"><?php echo lang('address_2') ?></th>
                                <th scope="col"><?php echo lang('city') ?></th>
                                <th scope="col"><?php echo lang('region') ?></th>
                                <th scope="col"><?php echo lang('postcode') ?></th>
                                <th scope="col"><?php echo lang('usertype') ?></th> -->
                                <th scope="col"><?php echo lang('status') ?></th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as$k => $user_val){ ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $user_val->firstname ?></td>
                                <td><?php echo $user_val->lastname ?></td>
                                <td><?php echo $user_val->email ?></td>
                                <td><?php echo $user_val->contactnumber ?></td>
                                <?php 
                                /* <td><?php echo $user_val->house_number ?></td>
                                <td><?php echo $user_val->address_1 ?></td>
                                <td><?php echo $user_val->address_2 ?></td>
                                <td><?php echo $user_val->city ?></td>
                                <td><?php echo $user_val->region ?></td>
                                <td><?php echo $user_val->postcode ?></td>
                                <td><?php echo ucfirst(get_user_plan($user_val->userplan_type)) ?></td>
                                */ ?>
                                <td><?php echo ($user_val->user_status==1) ? lang('activate') : lang('deactivate') ?></td>
                                
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