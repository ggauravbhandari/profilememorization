<?php echo $this->load->view('userpanel/userpanel_header');

$imgedefaultpath = ($result['category']) ? 'journal_'.$result['category'] : 'profile_img';

//echo ($result['image']!='') ? site_url('assets/frontend/uploads/').$result['image'] : site_url('assets/frontend/uploads/').get_defaultimage()->$imgedefaultpath;
 ?>
<div class="col-10">
    <div class="bg-light rounded h-100 p-4">
      <div class="">
        <div id="timeline-form" class="timeline-parent">
            
        <form method="post" action="<?php //echo site_url('journal_post') ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo (isset($result['id']) && $result['id']!='') ? $result['id'] : 0 ?>" />
            
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="input-group mb-3">
                     <img src="<?php echo ($result['image']!='') ? site_url('assets/frontend/uploads/').$result['image'] : site_url('assets/frontend/uploads/').get_defaultimage()->$imgedefaultpath ?>" style="width: 100px;">
                    </div>
                    </div>
                <div class="col-12 col-md-4">
                    <div >
                    <div class="dropdown">
                        <select name="journal_category" class="form-control required" style="border-radius: 50px;width:100%" required>
                            <option value="">
                                <?php echo lang('select_category') ?>
                            </option>
                            <?php foreach(journal_category() as $j_cat){ ?>
                            <option value="<?php echo $j_cat ?>" <?php echo (isset($result['category']) && $result['category']==$j_cat) ? 'selected="selected' : '' ?>>
                                <?php echo $j_cat ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="mb-3">
                    <input type="text" name="title" placeholder="<?php echo lang('blog_title') ?>" class="form-control required" id="exampleInputEmail151" aria-describedby="emailHelp" required value="<?php echo (isset($result['title']) && $result['title']!='') ? $result['title'] : '' ?>">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="input-group mb-3">
                        <input type="hidden" name="old_image" value="<?php echo (isset($result['image']) && $result['image']!='') ? $result['image'] : '' ?>" />
                    <input type="text" class="add-image-input" placeholder="Upload Image" class="form-control " id="exampleInputPassword122">
                    <input type="file" name="image" class="form-control visually-hidden" id="inputGroupFileJournal07" accept=".png, .jpg, .jpeg">
                    <label class="input-group-text add-image" for="inputGroupFileJournal07">
                        <?php echo lang('add_image') ?>
                    </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                    <textarea class="form-control required" name="description"
                        placeholder="<?php echo lang('blog_detail') ?>" id="exampleFormControlTextarea136"
                        rows="3" required><?php echo (isset($result['description']) && $result['description']!='') ? $result['description'] : '' ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex mb-3 form-radio">
                    <div class="form-check me-3">
                        <label class="form-check-label" for="flexRadioDefaultpublic">
                            <?php echo lang('public') ?>
                        </label>
                        <input class="form-check-input" value="1" type="radio" name="is_public"
                            id="flexRadioDefaultpublic" <?php echo (isset($result['is_public']) && $result['is_public']=='1') ? 'checked="checked"' : '' ?> required>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="flexRadioDefaultprivate">
                            <?php echo lang('private') ?>
                        </label>
                        <input class="form-check-input" value="2" type="radio" name="is_public"
                            id="flexRadioDefaultprivate" <?php echo (isset($result['is_public']) && $result['is_public']=='2') ? 'checked="checked"' : '' ?> required>
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3 d-flex">
                    <button type="submit" name="update" value="save"
                        class="btn btn-submit-request dark-btn">
                        <?php echo lang('update') ?>
                    </button>
                    <!-- <button type="submit" name="submit" value="publish"
                        class="btn btn-submit-request mx-3 dark-btn">
                        <?php //echo lang('publish') ?>
                    </button> -->
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