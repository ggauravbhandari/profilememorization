<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
    <div class="row">
      <div class="col-3">

      </div>
    </div>
    <div class="bg-light rounded h-100 p-4">
      <div class="">
         <div id="timeline-form" class="timeline-parent">
            <form action="<?php //echo site_url('profile-timeline') ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id"
                    value="<?php echo (isset($result['id']) && $result['id']!='') ? $result['id'] : 0 ?>" />
                <div class="row">

                    <div class="col-12 col-md-12">
                    <div class="input-group mb-3">
                     <img src="<?php echo base_url('assets/frontend/uploads/').$result['timeline_image'];?>" width="100">
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="mb-3">
                        <input type="text" name="title" placeholder="<?php echo lang('title') ?>" value="<?php echo (isset($result['title']) && $result['title']!='') ? $result['title'] : '' ?>" class="form-control required" id="exampleInputEmail153" aria-describedby="emailHelp" required>
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <input type="hidden" name="old_image" value="<?php echo (isset($result['timeline_image']) && $result['timeline_image']!='') ? $result['timeline_image'] : '' ?>" />
                        <input type="text" class="add-image-input" placeholder="Upload Image"
                            class="form-control" id="exampleInputPassword122">
                        <input type="file" name="timelineimage" class="form-control visually-hidden"
                            id="inputGroupFile07" accept=".png, .jpg, .jpeg" <?php echo (isset($result['timeline_image']) && $result['timeline_image']!='') ? '' : 'required' ?>>
                        <label class="input-group-text add-image" for="inputGroupFile07">
                            <?php echo lang('add_image') ?>
                        </label>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-5">
                    <div class="mb-3">
                        <input type="text" name="title_for_date" placeholder="<?php echo lang('title_for') ?>" value="<?php echo (isset($result['title_for_date']) && $result['title_for_date']!='') ? $result['title_for_date'] : '' ?>"
                            class="form-control required" id="exampleInputTitledate153" aria-describedby="emailHelp" required>
                    </div>
                    </div>
                    <div class="col-12 col-md-7">
                    <div class="mb-3">
                        <div class="input-group date-select">
                            <span class="col-md-5">
                            <input type="text" name="from_date" class="form-control required datepicker_input" value="<?php echo (isset($result['from_date']) && $result['from_date']!='' && $result['from_date']!='0000-00-00') ? date('d/m/Y',strtotime($result['from_date'])) : '' ?>"
                                placeholder="DD/MM/YYYY" autocomplete="off" id="datepicker1" readonly required>
                            </span>
                            <div class="input-group-addon">to</div>
                            <span class="col-md-5">
                            <input type="text" name="to_date" class="form-control datepicker_input" value="<?php echo (isset($result['to_date']) && $result['to_date']!='' && $result['to_date']!='0000-00-00') ? date('d/m/Y',strtotime($result['to_date'])) : '' ?>"
                                placeholder="DD/MM/YYYY" autocomplete="off" id="datepickertodate" readonly>
                            </span>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="mb-3">
                        <textarea class="form-control" name="description"
                            placeholder="<?php echo lang('share_timeline') ?>"
                            id="exampleFormControlTextarea132" rows="3"><?php echo (isset($result['description']) && $result['description']!='') ? $result['description'] : '' ?></textarea>
                    </div>
                    </div>
                    <div class="col-12">
                    <div class="mb-3 d-flex">
                        <button type="submit" name="update" class="btn btn-submit-request">
                            <?php echo lang('update') ?>
                        </button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
   </div>
</div>
</div>
</div>
</section>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript">
   $(document)
      .ready(function () {
        $('#userlist')
          .DataTable({"oLanguage": {
          "sSearch": "<?php echo lang('search_any_text') ?>"
   }});
      });
</script>