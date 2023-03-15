<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4"><?php echo (isset($pagetitle)) ? $pagetitle : lang('pagetitle') ?></h6>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="userlist">
                        <thead>
                            <tr>
                                <th scope="col" class="desktop">#</th>
                                <th scope="col"  class="desktop"><?php echo lang('name') ?></th>
                                <th scope="col"  class="desktop"><?php echo lang('like_on') ?></th>
                                <th scope="col"  class="desktop"><?php echo lang('number_of_like') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($result) && !empty($result)){
                                foreach($result as $k => $post_val){ 
                                ?>
                            <tr>
                                <td scope="row"  class="mobile-flex" data-header="#"><?php echo $k+1 ?></td>
                                <td  class="mobile-flex" data-header="<?php echo lang('name') ?>"><?php echo $post_val->firstname.' '.$post_val->lastname ?></td>
                                <td  class="mobile-flex" data-header="<?php echo lang('like_on') ?>">
                                    <?php echo ucwords(str_replace('_',' ',$post_val->table)) ?>
                                </td>
                                <td  class="mobile-flex" data-header="<?php echo lang('number_of_like') ?>">
                                    <?php echo $post_val->like_count ?>
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