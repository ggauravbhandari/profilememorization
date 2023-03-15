<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo lang('email_template') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo lang('name') ?></th>
                                <th scope="col"><?php echo lang('subject') ?></th>
                                <th scope="col"><?php echo lang('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                // print_r($response);
                                if(isset($response) && !empty($response)){
                                foreach($response as $k => $et_val){ ?>

                            <tr>
                                <th scope="row"><?php echo $k+1 ?></th>
                                <td><?php echo $et_val->name ?></td>
                                <td><?php echo $et_val->subject ?></td>
                                <td>
                                    <div class="action-btnrow">
                                    <a  href="<?php echo site_url('admin/edit-emailtemplate/'.$et_val->id) ?>" class="btn-primary btn">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    
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