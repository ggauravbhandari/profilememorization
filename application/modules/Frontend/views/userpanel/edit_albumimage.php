<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
    <div class="row">
      <div class="col-3">

      </div>
    </div>
    <div class="bg-light rounded h-100 p-4">
      <div class="">
        <div id="timeline-form" class="timeline-parent">
            <form method="post" action="<?php //echo site_url('journal_post') ?>" enctype="multipart/form-data" class=" media-form mb-4">
                <input type="hidden" name="id" value="<?php echo (isset($result['id']) && $result['id']!='') ? $result['id'] : '' ?>" />
                <div class="row pb-3">
                <div class="col-12 p-0">
                    <!-- <div class="mb-3 d-flex justify-content-between"> -->
                        <select class="form-control" name="album_id" style="margin: 0 10px;border-radius: 50px;" id="media-album-name">
                        <option value=""><?php echo lang('select_album') ?></option>
                        <?php if(isset($media_album) && !empty($media_album)){ 
                            foreach($media_album as $album_val){?>
                            <option value="<?php echo $album_val->id ?>" <?php echo (isset($result['album_id']) && $result['album_id']==$album_val->id) ? 'selected="selected"' : '' ?>><?php echo ucfirst($album_val->title) ?></option>
                        <?php } } ?>
                        </select>       
                </div>
                
                </div>
                <div class="row">
                
                <div class="col-12 col-md-12">
                    <div class="input-group mb-3">
                     <img src="<?php echo base_url('assets/frontend/uploads/').$result['image'];?>" onerror="this.onerror=null; this.style.display='none'">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Title" style="width:100%" value="<?php echo (isset($result['title']) && $result['title']!='') ? $result['title'] : '' ?>" />
                    </div>
                </div>

                    <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <input type="hidden" name="old_image" value="<?php echo (isset($result['image']) && $result['image']!='') ? $result['image'] : '' ?>" />
                        <input type="text" class="add-image-input" placeholder="Upload Image"
                        class="form-control" id="exampleInputPassword122">
                        <input type="file" name="media_image" class="form-control visually-hidden"
                        id="inputGroupFilemediaimage" accept=".png, .jpg, .jpeg" required>
                        <label class="input-group-text add-image" for="inputGroupFilemediaimage">
                        <?php echo lang('add_image') ?>
                        </label>
                    </div>
                        <!-- <div class="mb-3 d-flex justify-content-between">
                            <button type="button" class="btn btn-primary w-100 text-start"
                                data-bs-toggle="modal" data-bs-target="#upload-image"> Add Image
                            </button>
                        </div> -->
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <textarea class="form-control" placeholder="Description" name="media_caption"
                                id="exampleFormControlTextarea1" rows="2"><?php echo (isset($result['media_caption']) && $result['media_caption']!='') ? $result['media_caption'] : '' ?></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex mb-3 form-radio">
                            <div class="form-check me-3">
                                <label class="form-check-label" for="flexRadioDefault3mediaispublic">
                                    Public
                                </label>
                                <input class="form-check-input" type="radio" name="media_ispublic" value="1" <?php echo (isset($result['title']) && $result['title']=='1') ? 'checked="checked"' : '' ?>
                                    id="flexRadioDefault3mediaispublic">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="flexRadioDefault4isprivate">
                                    Private
                                </label>
                                <input class="form-check-input" type="radio" name="media_ispublic" value="2" <?php echo (isset($result['title']) && $result['title']=='2') ? 'checked="checked"' : '' ?>
                                    id="flexRadioDefault4isprivate" checked>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3 d-flex">
                            <button type="submit" name="update" class=" btn-submit-request dark-btn"><?php echo lang('update') ?></button>
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