<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
    <div class="row">
      <div class="col-3">

      </div>
    </div>
    <div class="bg-light rounded h-100 p-4">
      <div class="">
        <div id="timeline-form" class="timeline-parent">
            <form method="post">
                <input type="hidden" name="id" value="<?php echo (isset($result['id']) && $result['id']!='') ? $result['id'] : '' ?>" />
                <div class="row" >
                <div class="col-12 col-md-12">
                    <div class="mb-3">
                        <input type="text" placeholder="Album Title" class="form-control required" name="title" id="exampleInputEmail22" aria-describedby="emailHelp" value="<?php echo (isset($result['title']) && $result['title']!='') ? $result['title'] : '' ?>" required>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <textarea class="form-control required" placeholder="Caption" id="exampleFormControlTextarea12" name="caption" rows="3" required><?php echo (isset($result['caption']) && $result['caption']!='') ? $result['caption'] : '' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex mb-3 form-radio">
                        <div class="form-check me-3">
                            <label class="form-check-label" for="flexRadioDefault13">
                            Public
                            </label>
                            <input class="form-check-input" type="radio" name="is_public" value="1" <?php echo (isset($result['is_public']) && $result['is_public']=='1') ? 'checked="checked"' : '' ?> id="flexRadioDefault13" require>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="flexRadioDefault2">
                            Private
                            </label>
                            <input class="form-check-input" name="is_public" value="2" type="radio" id="flexRadioDefault2" <?php echo (isset($result['is_public']) && $result['is_public']=='2') ? 'checked="checked"' : '' ?> require>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 d-flex">
                        <button type="submit" name="update" class="btn btn-submit-request"><?php echo lang('update') ?></button>
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