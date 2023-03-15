<!-- Form Start -->
<div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4"><?php echo lang('update_email_template') ?></h6>
                    <?php if(validation_errors()){ echo '<div class="alert alert-danger">'.validation_errors().'</div>';} ?>

                    <form action="<?php echo site_url('admin/edit-emailtemplate/'.$response['id']) ?>" method="post">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="exampleInput1" class="form-label"><?php echo lang('subject') ?>*</label>
                                <input type="text" class="form-control" id="exampleInput1"
                                    aria-describedby="emailHelp" name="subject" placeholder="<?php echo lang('firstname') ?>" required value="<?php echo ($response['subject']!='') ? $response['subject']  :''; ?>">
                            </div>
                        </div>
                            <div class="mb-3 col-md-12">
                                <label for="mytextarea" class="form-label"><?php echo lang('message') ?></label>
                                <textarea name="bodymsg" id="editor" placeholder="<?php echo lang('body') ?>"><?php echo (isset($response['bodymsg'])) ? $response['bodymsg']  :''; ?></textarea>
                                
                            </div>
                        <button type="submit" name="update" class="btn btn-primary"><?php echo lang('submit') ?></button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Form End -->
    <!-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
    <!-- <script src="https://unpkg.com/@ckeditor/ckeditor5-build-classic@12.2.0/build/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor', {
        skin: 'moono',
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode:CKEDITOR.ENTER_P,
        toolbar: [{ name: 'basicstyles', groups: [ 'basicstyles' ], items: [ 'Bold', 'Italic', 'Underline', "-", 'TextColor', 'BGColor' ] },
                    { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                    { name: 'scripts', items: [ 'Subscript', 'Superscript' ] },
                    { name: 'justify', groups: [ 'blocks', 'align' ], items: [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'] },
                    { name: 'links', items: [ 'Link', 'Unlink' ] },
                    { name: 'insert', items: [ 'Image'] },
                    { name: 'spell', items: [ 'jQuerySpellChecker' ] },
                    { name: 'table', items: [ 'Table' ] }
                    ],
        });
        /*ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
            console.log( 'successful' );
        })
        .catch( error => {
            console.error( 'faile' );
        });
        */
        /*      
        tinymce.init({
        selector: '#mytextarea',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
        });
        */
    </script>