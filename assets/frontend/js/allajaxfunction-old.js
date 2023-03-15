// function forgotpassword(element){
//     var email = $(element).find('input[name=email]').val();
//     var form_mailid = $(element).attr('id');
//     console.log('forgotpassword',email);
//     $.ajax({
//         url: "forgotpassword",
//         type : 'POST',
//         data:{'email':email},
//         async: false,
//         dataType: 'json',
//         cache: true,
//         success: function(data){
//            if(data.status==true){
//                console.log('asdad');
//                $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
//             }else{
//                 $('.'+form_mailid+'-error').removeClass('hide').text(data.message);
//             }
//         console.log(data);
//         }
//     });
//     return false;
// }

function life_modal_gallery(album_id) {
    // $('body').on('click','#',function(){
    // var album_id = $(this).data('albumid');
    console.log(album_id);
    $.ajax({
        url: "singleimage_popup",
        type: 'POST',
        data: { 'album_id': album_id },
        success: function (data) {
            // console.log(data);
            data = JSON.parse(data);
            if (data.status == true) {
                console.log('asdad');
                $('.single-imagepopup').html(data.data);
                return false;
            } else {
                //$('.'+form_mailid+'-error').removeClass('hide').html(data.message);
                return false;
            }
            return false;
            console.log(data);
        }
    });
    // });
}

function setfeature_post(element, id, table, status = 1) {
    if (id != '' && table != '') {
        $.ajax({
            url: "setfeaturepost/",
            type: 'POST',
            data: { 'table': table, 'id': id, 'status': status },
            success: function (resp) {
                location.reload();
                var data = JSON.parse(resp);
                if (data.status == true) {
                    // console.log(data);
                    $('.alert').addClass('hide');
                    location.reload();

                } else {
                    $('.memories-postdata').prepend('<div class="alert alert-danger">' + data.message + '</div>');
                }
                //console.log(data);
            }
        });
    }
}



function getfeature_post(element) {

    $.ajax({
        url: "getfeaturepost/",
        type: 'GET',
        success: function (resp) {
            var data = JSON.parse(resp);
            // console.log(data.status);
            // loaderimghide(element);
            if (data.status == true) {
                // console.log(data);
                $('.alert').addClass('hide');
                $('.feature_post_row').html(data.body);
                // $('.memories-postdata').prepend('<div class="alert alert-success">'+data.message+'</div>')

            } else {
                $('.memories-postdata').prepend('<div class="alert alert-danger">' + data.message + '</div>')
            }
            //console.log(data);
        }
    });

}


function deletemomory_post(ele, id) {
    if (confirm("You want to delete this!")) {
        $('.memories-postdata').find('.alert').remove();
        $.ajax({
            url: "memoriespost_delete/" + id,
            type: 'GET',
            success: function (resp) {
                var data = JSON.parse(resp);
                // console.log(data.status);
                // loaderimghide(element);
                if (data.status == true) {
                    // console.log(data);
                    $('.alert').addClass('hide');
                    $('#shareMemory').removeClass('show');
                    // console.log('asdad',data);
                    $('.memories-postdata').html(data.body);
                    $('#editmemorypopup').modal('hide');
                    $('.memories-postdata').prepend('<div class="alert alert-success">' + data.message + '</div>')

                } else {
                    $('.memories-postdata').prepend('<div class="alert alert-danger">' + data.message + '</div>')
                }
                //console.log(data);
            }
        });
    }
}

function deletetimeline_post(ele, id) {
    if (confirm("You want to delete this!")) {
        $('.memories-postdata').find('.alert').remove();
        $.ajax({
            url: "timelinepost_delete/" + id,
            type: 'GET',
            success: function (resp) {
                var data = JSON.parse(resp);
                // console.log(data.status);
                // loaderimghide(element);
                if (data.status == true) {
                    // console.log(data);
                    $('.alert').remove();
                    $('#shareMemory').removeClass('show');
                    // console.log('asdad',data);
                    $('.timeline-postloop').html(data.body);
                    $('#editmemorypopup').modal('hide');
                    $('.timeline-postloop').prepend('<div class="alert alert-success">' + data.message + '</div>')

                } else {
                    $('.timeline-postloop').prepend('<div class="alert alert-danger">' + data.message + '</div>')
                }
                //console.log(data);
            }
        });
    }
}

function deleterespect_post(ele, id) {
    if (confirm("You want to delete this!")) {
        $('.recent-post-data').find('.alert').remove();
        $.ajax({
            url: "respectpost_delete/" + id,
            type: 'GET',
            success: function (resp) {
                var data = JSON.parse(resp);
                console.log(data.status);
                // loaderimghide(element);
                if (data.status == true) {
                    // location.reload();
                    // console.log(data);
                    // $('.alert').addClass('hide');
                    // $('#shareMemory').removeClass('show');
                    // console.log('asdad',data);
                    $('.recent-post-data').html(data.body);
                    $('#editmemorypopup').modal('hide');
                    $('.recent-post-data').prepend('<div class="alert alert-success">' + data.message + '</div>')

                } else {
                    $('.recent-post-data').prepend('<div class="alert alert-danger">' + data.message + '</div>')
                }
                //console.log(data);
            }
        });
    }
}

function setcoverphoto_post(element, id, album_id) {
    if (id != '' && $(element).is(':checked')) {
        // alert('asasdd');
        $('.media-show-data').find('.alert').remove();
        $.ajax({
            url: "set_coverphotopost",
            type: 'POST',
            data: { 'id': id, 'album_id': album_id },
            success: function (resp) {
                // location.reload();
                $('.life-modal').modal('hide');
                var data = JSON.parse(resp);
                if (data.status == true) {
                    // console.log(data);
                    $('.alert').addClass('hide');
                    // location.reload();
                    $('.media-show-data').html(data.body);
                    $('.media-show-data').prepend('<div class="alert alert-success">' + data.message + '</div>')

                } else {
                    $('.memories-postdata').prepend('<div class="alert alert-danger">' + data.message + '</div>');
                }
                //console.log(data);
            }
        });
    }
}

function deletemedia_imagepost(ele, id, album_id) {
    if (confirm("Are you sure you want to delete this")) {
        $('.media-show-data').find('.alert').remove();
        $.ajax({
            url: "mediapost_imagedelete",
            type: 'POST',
            data: { 'id': id, 'album_id': album_id },
            success: function (data) {
                console.log(data);
                data = JSON.parse(data);
                if (data.status == true) {
                    console.log('asdad');
                    $('.single-imagepopup').html(data.data);
                    return false;
                } else {
                    //$('.'+form_mailid+'-error').removeClass('hide').html(data.message);
                    return false;
                }
                return false;
                console.log(data);
            }
        });
    }
}

function deletemedia_albumpost(ele, id, album_id) {
    if (confirm("Are you sure you want to delete this")) {
        $('.media-show-data').find('.alert').remove();
        $.ajax({
            url: "mediapost_albumdelete",
            type: 'POST',
            data: { 'id': id, 'album_id': album_id },
            success: function (data) {
                // console.log(data);
                data = JSON.parse(data);
                if (data.status == true) {
                    console.log('asdad');
                    $('.media-show-data').html(data.data);
                    return false;
                } else {
                    //$('.'+form_mailid+'-error').removeClass('hide').html(data.message);
                    return false;
                }
                return false;
                console.log(data);
            }
        });
    }
}

function deletemedia_post(ele, id) {
    if (confirm("Are you sure you want to delete this album, along with all its content?")) {
        $('.media-show-data').find('.alert').remove();
        $.ajax({
            url: "mediapost_delete/" + id,
            type: 'GET',
            success: function (resp) {
                var data = JSON.parse(resp);
                // console.log(data.status);
                // loaderimghide(element);
                if (data.status == true) {
                    //$('.life-modal').modal('hide');
                    // location.reload();
                    // console.log(data);
                    // $('.alert').addClass('hide');
                    // $('#shareMemory').removeClass('show');
                    // console.log('asdad',data);
                    $('.media-show-data').html(data.body);
                    $('.media-show-data').prepend('<div class="alert alert-success">' + data.message + '</div>')

                } else {
                    $('.media-show-data').prepend('<div class="alert alert-danger">' + data.message + '</div>')
                }
                //console.log(data);
            }
        });
    }
}

function deletejournal_post(ele, id) {
    if (confirm("You want to delete this journal!")) {
        $('.memories-postdata').find('.alert').remove();
        $.ajax({
            url: "journalpost_delete/" + id,
            type: 'GET',
            success: function (resp) {
                var data = JSON.parse(resp);
                // console.log(data.status);
                // loaderimghide(element);
                // location.reload();
                if (data.status == true) {
                    // console.log(data);
                    // $('.alert').addClass('hide');
                    // $('#shareMemory').removeClass('show');
                    // console.log('asdad',data);
                    // $('.journalpost-section').html(data.body);
                    $('.journalpost-section').html(data.body);
                    $('#editmemorypopup').modal('hide');
                    $('.journalpost-section').prepend('<div class="alert alert-success">' + data.message + '</div>')

                } else {
                    $('.journalpost-section').prepend('<div class="alert alert-danger">' + data.message + '</div>')
                }
                //console.log(data);
            }
        });
    }
}

function editmemory_post(element, id = '') {
    $('#shareMemory').addClass('show');
    /**/
    var element = '#shareMemory-form';
    // $('input[name=lifeof_type]').val(type);
    // $('input[name=title]').val(type.replace('-',' '));
    // $('input[name=lifeof_id]').val('');
    $(element).find('textarea[name=comment]').val('');
    if (id != '') {
        $('input[name=lifeof_id]').val(id);
    }
    $('input[name=memory_id]').remove();
    if (id != '') {
        $.ajax({
            url: "memoriespost_edit/" + id,
            type: 'POST',
            success: function (resp) {
                // $(element).find('input[name=title]').remove();
                var data = JSON.parse(resp);
                console.log(data);
                if (data.status == true) {
                    console.log('memory', data.body);
                    $(element).append('<input type="hidden" name="memory_id" vlaue="asdasdd"/>');
                    $(element).find('textarea[name=comment]').val(data.body.comment);
                } else {
                    $(element).parents('.row').find('.featurepost-error').removeClass('hide').text(data.message);
                }
                console.log(data);
            }
        });
    }
}


function loaderimg(btnid) {
    // $(btnid).find('.loading').remove();
    // $(btnid).find('button[name=submit]').append('<span class="loading"><img src="assets/frontend/uploads/loading1.gif" style="width:25px"/></span>');
    // $(btnid).find('input[name=submit]').append('<span class="loading"><img src="assets/frontend/uploads/loading1.gif" style="width:25px;margin-left:15px;"/></span>');
}

function loaderimghide(btnid) {
    // $(btnid).find('.loading').remove();
}
function timeline_popup(id = 0) {
    console.log('timeline_popup', id);
    var popupid = 'time-line-modal';
    $('#' + popupid).find('.modal-body').hide();
    var urlpath = 'edittimelinepost';
    $.ajax({
        url: urlpath + "/" + id,
        type: 'GET',
        success: function (resp) {
            var data = JSON.parse(resp);
            if (data.status == true) {
                console.log(data, data.rowcount);
                // var img_url = '<?php echo base_url("assets/frontend/uploads/") ?>';

                $('#' + popupid).find('.portfolio img').attr('src', data.body.image_url);
                $('#' + popupid).find('.description').html('<p>' + data.body.description + '</p>');
                $('#' + popupid).find('.timeline-title').text(data.body.title + data.body.from_todate);
                console.log(id, 'timeline', data.rowcount);
                var this_popup = $('#' + popupid);
                console.log('this_popup', $('#' + popupid).find('#loadMore_otherpost').html(), popupid);
                //console.log(data.rowcount, this_popup.find('#loadMore_otherpost').html());
                $('#' + popupid).find('.media-post-comment').html(data.body.body);
                $('#' + popupid).find('#comment-timeline #postid').val(id);
                $('#' + popupid).find('#comment-timeline #post_type').val('timeline');
                $('#loadMore_otherpost').hide();
                // $('#' + popupid).find('#loadMore_otherpost').hide();
                if (data.rowcount > 2) {

                    $('#' + popupid).find('#loadMore_otherpost').show();
                    $('#' + popupid).find('#loadMore_otherpost').attr('data-postid', id);
                    $('#' + popupid).find('#loadMore_otherpost').attr('data-posttype', 'timeline');
                }
                setTimeout(function () {
                    $('#' + popupid).find('.modal-body').show();
                    // console.log(data);
                    $('#' + popupid).find('.loadingimg').addClass('hide');
                }, 1000);
            }
            // console.log(data);
        }
    });
}




function showreadmorepopup(id, popupid, urlpath, post_type = '', user_id = '') {
    $('#' + popupid).find('.modal-body').hide();
    console.log('id', id,popupid);
    // alert('df');
    //$('#' + popupid).find('.btn-submit-request').show();
    $('#' + popupid).find('.loadingimg').removeClass('hide');
    $.ajax({
        url: urlpath + "/" + id,
        type: 'GET',
        success: function (resp) {
            var data = JSON.parse(resp);
            console.log(data,data.body.name);
            console.log('data.body.image_url',data.body.image_url);
            if (data.status == true) {
                $('#comment-otherpost').parent().find('button.btn-submit-request').removeClass('hide')
                if (post_type == 'life_of' && user_id != '' && data.body.user_id != user_id) {
                    console.log(data.body.user_id, user_id);
                    $('#comment-otherpost').parent().find('button.btn-submit-request').addClass('hide');
                }
                // var img_url = '<?php echo base_url("assets/frontend/uploads/") ?>';
                $('#' + popupid).find('.postlikebtn').attr('data-tablename', data.body.tablename);
                $('#' + popupid).find('.postlikebtn').attr('data-postid', id);
                if (data.body.image_url && data.body.image_url != '') {
                    fullfilename = data.body.image_url
                    var explodefile = fullfilename.split('.')
                    if(explodefile[explodefile.length-1]=='mp4'){
                        $('#' + popupid).find('.img-cover-life').html('<video src = "'+data.body.image_url+'"  style="width:100%;" controls>Your browser does not support the <video> element. </video>');
                    }else if(explodefile[explodefile.length-1]=='mp3'){
                        $('#' + popupid).find('.img-cover-life').html('<audio controls class="w-100"><source src="'+data.body.image_url+'" type="audio/mpeg">Your browser does not support the audio element.</audio>');
                    }else{
                        $('#' + popupid).find('.img-cover-life').html('<img src="'+data.body.image_url+'" class="w-100 life-modal-img" onerror="this.onerror=null; this.src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/LifeoEarlyLife.png">');
                        //$('#' + popupid).find('.' + popupid + '-img').attr('src', data.body.image_url);
                    }
                    // $('#' + popupid).find('.' + popupid + '-img').attr('src', data.body.image_url);
                }
                $('#' + popupid).find('.' + popupid + '-sharedby').parent().find('p:first-child').text('Created By');
                $('#' + popupid).find('.' + popupid + '-sharedby').text(data.body.profile_name);
                $('#' + popupid).find('.' + popupid + '-name').text(data.body.name);
                $('#' + popupid).find('.' + popupid + '-postdate').text(data.body.post_date);
                $('#' + popupid).find('.' + popupid + '-desc').text(data.body.description);
                $('#' + popupid).find('.likecount').text(data.body.likecount);
                $('#' + popupid).find('#comment-otherpost #postid').val(id);
                $('#' + popupid).find('#comment-otherpost #post_type').val(post_type);
                $('#' + popupid).find('.media-post-comment').html(data.comment_body);


                var this_popup = $('#' + popupid).find('.media-post-comment');
                this_popup.find('#loadMore_otherpost').hide();
                console.log(data.rowcount, this_popup.find('#loadMore_otherpost').html());
                if (data.rowcount > 2) {
                    this_popup.find('#loadMore_otherpost').show();
                    this_popup.find('#loadMore_otherpost').attr('data-postid', id);
                    this_popup.find('#loadMore_otherpost').attr('data-posttype', post_type);
                }
                setTimeout(function () {
                    $('#' + popupid).find('.modal-body').show();
                    console.log(data);
                    $('#' + popupid).find('.loadingimg').addClass('hide');
                }, 1000);
            }
            console.log(data);
        }
    });
    // console.log(lifeof_arr[ind]);

}

function postlike(element) {
    var thisele = $(element);
    var tablename = $(element).attr('data-tablename');
    var postid = $(element).attr('data-postid');

    var random_number = Math.floor(Math.random() * 50);
    var uidlocal = localStorage.getItem('uid');
    if(uidlocal==null){
        localStorage.setItem('uid', 'uid-'+random_number); 
        var uidlocalss  = uidlocal = 'uid-'+random_number; 
    }
    // console.log('asdasdasdasasdasdas postlike dasdasdasdasd',random_number,uidlocal,'ass',uidlocalss);
    $.ajax({
        url: "postlike",
        type: 'POST',
        data: { 'post_id': postid, 'tablename': tablename,'uidlocal':uidlocal },
        success: function (data) {
            var data = JSON.parse(data);
                console.log(data,data.body);

            if (data.status == true) {
                thisele.find('.likecount').text(data.body);

            }
        }
    });
}


function showreadmorepopup_featurepost(id, popupid, urlpath, tablename,imagename='') {
    console.log('id asd', id, tablename);

    // console.log('likecount', likecount);
    $('#' + popupid).find('.loadingimg').removeClass('hide');
    // $('#'+popupid).find('.modal-content');
    $('#' + popupid).find('.' + popupid + '-img').attr('src', '');
    $('#' + popupid).find('.' + popupid + '-sharedby').text('');
    $('#' + popupid).find('.' + popupid + '-postdate').text('');
    $('#' + popupid).find('.' + popupid + '-desc').text('');
    $('#' + popupid).find('.' + popupid + '-name').text('');
    $.ajax({
        url: urlpath,
        type: 'POST',
        data: { 'id': id, 'tablename': tablename },
        success: function (resp) {
            $('#' + popupid).find('.modal-body').hide();
            // var data = resp;
            var data = JSON.parse(resp);
            if (data.status == true) {
                let tbname = (tablename == 'memories') ? 'memory_post' : tablename;
                console.log('memories', tbname);
                // console.log($('#' + popupid).find('.modal-body'));
                // var img_url = '<?php echo base_url("assets/frontend/uploads/") ?>';
                $('#' + popupid).find('.postlikebtn').attr('data-tablename', tbname);
                $('#' + popupid).find('.postlikebtn').attr('data-postid', id);
                var img_name = (imagename!='') ? imagename : data.body.image_url;
                // var img_name = (imagename!='') ? imagename : data.body.image_url;
                // fullfilename = data.body.image_url
                var explodefile = img_name.split('.')
                if(explodefile[explodefile.length-1]=='mp4'){
                    $('#' + popupid).find('.img-cover-life').html('<video src = "'+img_name+'"  style="width:100%;" controls>Your browser does not support the <video> element. </video>');
                }else if(explodefile[explodefile.length-1]=='mp3'){
                    $('#' + popupid).find('.img-cover-life').html('<audio controls class="w-100"><source src="'+img_name+'" type="audio/mpeg">Your browser does not support the audio element.</audio>');
                }else{

                    $('#' + popupid).find('.img-cover-life').html('<img src="'+img_name+'" class="w-100 life-modal-img" onerror="this.onerror=null; this.src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/LifeoEarlyLife.png">');
                    //$('#' + popupid).find('.' + popupid + '-img').attr('src', data.body.image_url);
                }
                // $('#' + popupid).find('.' + popupid + '-img').attr('src', img_name);
                $('#' + popupid).find('.' + popupid + '-sharedby').text(data.body.profile_name);
                $('#' + popupid).find('.' + popupid + '-postdate').text(data.body.post_date);
                $('#' + popupid).find('.' + popupid + '-desc').text(data.body.description);
                $('#' + popupid).find('.' + popupid + '-name').text(data.body.name);
                $('#' + popupid).find('.likecount').text(data.body.likecount);
                $('#' + popupid).find('.btn-submit-request').show();
                $('#' + popupid).find('.btn-submit-request').removeClass('hide');
                // console.log(tablename, data);
                // if (tablename == 'memories') {
                $('#' + popupid).find('#comment-featurepost #postid').val(id);
                $('#' + popupid).find('#comment-featurepost #post_type').val(tbname);
                $('#' + popupid).find('.media-post-comment').html(data.comment_body);
                var this_popup = $('#' + popupid).find('.media-post-comment');
                this_popup.find('#loadMore_otherpost').hide();
                console.log(data.rowcount, this_popup.find('#loadMore_otherpost').html());
                if (data.rowcount > 2) {
                    this_popup.find('#loadMore_otherpost').show();
                    this_popup.find('#loadMore_otherpost').attr('data-postid', id);
                    this_popup.find('#loadMore_otherpost').attr('data-posttype', tbname);
                }
                // }


                // if (tablename == 'timeline') {
                //$('#' + popupid).find('.btn-submit-request').hide();
                // }
                setTimeout(function () {
                    $('#' + popupid).find('.modal-body').show();
                    console.log(data);
                    $('#' + popupid).find('.loadingimg').addClass('hide');
                }, 1000);
            }
            // console.log(resp);
        }
    });
    // console.log(lifeof_arr[ind]);

}

function mediapost_popup(ele, id = 0, post_type) {
    console.log(id, ele,post_type);
    var popupid = 'life-modal';
    var urlpath = 'edittimelinepost';
    var this_popup = $('#life-modal');
    $('#' + popupid).find('.modal-body').hide();
    $.ajax({
        url: "mediasinglepost/" + id,
        type: 'GET',
        success: function (data) {
            var data = JSON.parse(data);
            if (data.status == true) {
                $(ele).parents('#life-modal-gallery').modal('hide');
                
                fullfilename = data.body.image_url
                var explodefile = fullfilename.split('.')
                console.log('mediasinglepost as',explodefile[explodefile.length-1]);
                //$('#' + popupid).find('.postlikebtn').attr('data-tablename', data.body.tablename);
                $('#' + popupid).find('.postlikebtn').attr('data-postid', id);

                $('#' + popupid).find('.postlikebtn').attr('data-tablename', data.body.tablename);
                $('#' + popupid).find('.postlikebtn').attr('data-postid', id);
                var videotype = ['mp4','MOV','mov'];
                if(videotype.includes(explodefile[explodefile.length-1])){
                    $('#' + popupid).find('.img-cover-life').html('<video src = "'+data.body.image_url+'"  style="width:100%;" controls>Your browser does not support the <video> element. </video>');
                }else if(explodefile[explodefile.length-1]=='mp3'){
                    $('#' + popupid).find('.img-cover-life').html('<audio controls class="w-100"><source src="'+data.body.image_url+'" type="audio/mpeg">Your browser does not support the audio element.</audio>');
                }else{

                    $('#' + popupid).find('.img-cover-life').html('<img src="'+data.body.image_url+'" class="w-100 life-modal-img" onerror="this.onerror=null; this.src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/LifeoEarlyLife.png">');
                    //$('#' + popupid).find('.' + popupid + '-img').attr('src', data.body.image_url);
                }
                $('#' + popupid).find('.' + popupid + '-sharedby').parent().find('p:first-child').text('Created By:');
                $('#' + popupid).find('.' + popupid + '-sharedby').text(data.body.profile_name);
                $('#' + popupid).find('.' + popupid + '-postdate').text(data.body.post_date);
                $('#' + popupid).find('.' + popupid + '-desc').text(data.body.description);
                $('#' + popupid).find('.likecount').text(data.body.likecount);
                $('#' + popupid).find('#comment-otherpost #postid').val(id);
                $('#' + popupid).find('#comment-otherpost #post_type').val(post_type);


                // media - post - comment

                $('#' + popupid).find('.media-post-comment').html(data.comment_body);
                console.log('data',data);

                $('#' + popupid).find('#loadMore_mediapost').hide();
                if (data.rowcount > 2) {
                    $('#' + popupid).find('#loadMore_mediapost').show();
                    $('#' + popupid).find('#loadMore_mediapost').attr('data-postid', id);
                }
                setTimeout(function () {
                    $('#' + popupid).find('.modal-body').show();
                    console.log(data);
                    $('#' + popupid).find('.loadingimg').addClass('hide');
                }, 1000);

            }
            // console.log(data);
        }
    });
}

function journal_popup(ele, id = 0) {
    
    console.log('asasdasd',id, ele);
    var popupid = 'post-detail-popup';
    var urlpath = 'edittimelinepost';
    var this_popup = $('#post-detail-popup');
    this_popup.find('.journalpost_image img').attr('src', '');
    this_popup.find('.journalpost_desc').text('');
    this_popup.find('.journalpost_name').text('');
    this_popup.find('.journalpost-title').text('');
    this_popup.find('.journalpost-category').text('');
    this_popup.find('.journalpost_date').text('');
    $('#' + popupid).find('.modal-body').hide();

    $.ajax({
        url: "journalpost_view/" + id,
        type: 'GET',
        success: function (data) {
            var data = JSON.parse(data);
            console.log(data.body.title);
            if (data.status == true) {

                // $('#comment-journal').find('input[name=name]').val('');
                // $('#comment-journal').find('input[name=email]').val('');
                // console.log(data.body.journalcomment);
                // var img_url = '<?php echo base_url("assets/frontend/uploads/") ?>';
                // console.log(data.body.image_url);
                if (data.body.image_url && data.body.image_url != '') {
                    fullfilename = data.body.image_url
                    var explodefile = fullfilename.split('.')
                    if(explodefile[explodefile.length-1]=='mp4'){
                        this_popup.find('.journalpost-image').html('<video src = "'+data.body.image_url+'"  style="width:100%;" controls>Your browser does not support the <video> element. </video>');
                    }else if(explodefile[explodefile.length-1]=='mp3'){
                        this_popup.find('.journalpost-image').html('<audio controls class="w-100"><source src="'+data.body.image_url+'" type="audio/mpeg">Your browser does not support the audio element.</audio>');
                    }else{
                        this_popup.find('.journalpost-image').html('<img src="'+data.body.image_url+'" class="w-100 life-modal-img" onerror="this.onerror=null; this.src="https://staging-profile.memorisation.co.uk/assets/frontend/uploads/LifeoEarlyLife.png">');
                        //$('#' + popupid).find('.' + popupid + '-img').attr('src', data.body.image_url);
                    }
                    // $('#' + popupid).find('.' + popupid + '-img').attr('src', data.body.image_url);
                }
                // this_popup.find('.journalpost-image img').attr('src', data.body.image_url);
                this_popup.find('.journalpost-desc').html('<p>' + data.body.description + '</p>');
                this_popup.find('.journalpost-title').text(data.body.title);
                this_popup.find('.journalpost-category').text(data.body.category);
                this_popup.find('.journalpost-name').text(data.body.profile_name);
                this_popup.find('.journalpost-date').text(data.body.postdate);
                this_popup.find('input#postid').val(id);
                this_popup.find('.journal-post-comment').html(data.body.journalcomment);
                console.log(data.rowcount);

                this_popup.find('#loadMore_journolpost').hide();
                if (data.rowcount > 2) {
                    console.log(data.rowcount);
                    this_popup.find('#loadMore_journolpost').show();
                    this_popup.find('#loadMore_journolpost').attr('data-postid', id);
                }
                setTimeout(function () {
                    $('#' + popupid).find('.modal-body').show();
                    console.log(data);
                    $('#' + popupid).find('.loadingimg').addClass('hide');
                }, 1000);
            }
            // console.log(data);
        }
    });
}

function deletefeature_post(element, id, parent_class, posttype) {
    var mesg = 'Please confirm you wish to removing as a featured';
    if (confirm(mesg)) {
        $.ajax({
            url: "delete-featuredpost/",
            type: 'POST',
            data: { posttype, id },
            success: function (resp) {
                var data = JSON.parse(resp);
                if (data.status == true) {
                    location.reload();
                    $(parent_class).removeClass('d-flex').hide();
                    console.log('asdad');
                    $(element).parents('.row').find('.featurepost-sucess').removeClass('hide').text(data.message);
                    $('#pills-home .feature_post_row').html(data.body);
                    // $(element).parents('.feature_postarr').remove();
                    // //    console.log($('.feature_post_row .feature_postarr').length);
                    // $('.feature_post_row > h3').show();
                    //    window.location.href=data.url;
                } else {
                    $(element).parents('.row').find('.featurepost-error').removeClass('hide').text(data.message);
                }
                console.log(data);
            }
        });
    }

    return false;
}

function delete_comment(element, id, parentclass) {
    var mesg = 'Please confirm you wish to delete this item';
    if (confirm(mesg)) {
        var element = $(element);

        // console.log($(parentclass).length);
        $.ajax({
            url: "delete-commentpost/" + id,
            type: 'GET',
            success: function (resp) {
                var data = JSON.parse(resp);
                console.log('delete-commentpost', data);

                if (data.status == true) {
                    console.log('asdad', data);
                    element.parents(parentclass).hide();
                    if (data.resp_count <= 2) {
                        $('#loadMore_mediapost').hide();
                        $('#loadMore_otherpost').hide();
                    }
                    if (data.resp_count == 0) {
                        $('.comment-view-btn').hide();
                    }
                } else {
                    $(element).parents('.row').find('.featurepost-error').removeClass('hide').text(data.message);
                }
            }
        });
    }
    return false;
}


var _URL = window.URL || window.webkitURL;
$("#inputGroupFilefeaturepost").change(function (e) {
    var file, img;
    $(this).parent().find('.error').remove();
    // if ((file = this.files[0])) {
    var file = $(this)[0].files[0];
    var fileInput = document.getElementById('inputGroupFilefeaturepost');

    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (allowedExtensions.exec(filePath)) {
        img = new Image();
        img.src = _URL.createObjectURL(file);
        img.onload = function () {
            imgwidth = this.width;
            imgheight = this.height;
            if (imgheight < 300) {
                // alert('image is not in proper size.Min height 300px and Width 200px');
                $(this).parent().append('<label class="error">Image is not in proper size.Min height 300px and Width 200px</label>')
                fileInput.value = '';
                return false;
            }
            console.log(imgwidth, imgheight);
        }
    } else {
        // alert('Invalid file type');
        $(this).parent().append('<label class="error">Invalid file type</label>')
        fileInput.value = '';
        return false;
    }

    // img.src = objectUrl;
    // }
});


function editfeature_post(element, id) {

    $.ajax({
        url: "edit-featuredpost/" + id,
        type: 'GET',
        success: function (resp) {
            var data = JSON.parse(resp);
            if (data.status == true) {
                $('#featurepost-edit').modal('show');
                //    $('#featurepost-form').addClass('show');
                var element = '#editfeaturepost-form';

                $(element).find('input[name=title]').val(data.body.title);
                $(element).find('input[name=post_date]').val(data.body.post_date);

                // $(element).append('<input type="hidden" value="'+data.body.post_image+'" name="post_image_old" />');
                $(element).append('<input type="hidden" value="' + data.body.id + '" name="featurepost_id" />');
                $(element).find('#featuredpost_description').val(data.body.post_description);
                $(element).find('input[name=post_author]').val(data.body.post_author);
                $(element).find('input[name=post_postedby]').val(data.body.post_postedby);
                $(element).find('button[name=submit]').text('Update');
                console.log('asdad', data.body);

                //    window.location.href=data.url;
            } else {
                $(element).parents('.row').find('.featurepost-error').removeClass('hide').text(data.message);
            }
            console.log(data);
        }
    });
}



function loginform(element) {
    var email = $(element).find('input[name=email]').val();
    var user_table = $(element).find('select[name=user_table]').val();
    var password = $(element).find('input[name=password]').val();
    var redirect_status = $(element).find('#redirect_status').val();
    console.log('redirect_status', redirect_status,user_table);
    var form_mailid = $(element).attr('id');
    console.log('loginform', email);
    $.ajax({
        url: "./user-login",
        type: 'POST',
        data: { 'email': email, 'password': password,'user_table':user_table },
        async: false,
        dataType: 'json',
        cache: true,
        success: function (data) {
            if (data.status == true) {
                console.log('asdad');
                if (redirect_status && redirect_status == 'true') {
                    window.location.href = data.url;
                } else {
                    window.location.href = redirect_status;
                }
                // $('#login-modal').hide();
                //    $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
            } else {
                $('.' + form_mailid + '-error').removeClass('hide').text(data.message);
            }
            console.log(data);
        }
    });
    return false;
}

function profilebio(element) {
    var count = $(element).val().length;
    // alert(count);
    $('#currentbiocount').text(count);

}
// $("#userprofile-form input[name=bio]").on('keyup', function (e) {
// $(this).parent().find(".applyCount").text(count);
// });

$(document).ready(function () {



    $('.sharememory-btn').click(function () {
        $('#shareMemory-form').find('input[name=title]').val('');
        $('#shareMemory-form').find('#exampleInputPassword121').val('');
    })

    $('input[type="file"]').change(function (e) {
        var file = e.target.files[0].name;
        $(this).siblings('input[type=text]').val(file);
        // alert('The file "' + file + '" has been selected.');
    });

    $('.btn-submit-request').click(function () {
        $(this).parents('.tab-pane').find('.alert').addClass('hide');
    });

    $('.menu-close').click(function () {
        // $('.menu-btn-toggle').toggleClass("click");
        $('.sidebar').removeClass("show");
        $('.overlay-div').removeClass("overlay");
        $('body').removeClass("overflow-hidden");
    });


    /*$("#userprofile-form").validate({
        rules: {
            profile_name: {
                required: true
            },
            profile_url: {
                required: true,
                unique_profileurl: ['profile_url']
            },
            first_name: {
                required: true
                // lettersonly: true
            },
            last_name: {
                required: true
                // lettersonly: true
            },
            dob: 'required',
            bio: {
                required: true,
                minlength: 60,
                maxlength: 120
            }
        },
        submitHandler: function (form) {

            $('input[name=thumbnail]').removeClass('error');
            $('input[name=thumbnail]').parent().find('.thumberror').remove();
            var element = '#userprofile-form';
            // console.log($(element).find('input[name=admin_profile]').val());
            var profile_file = $('input[name=profile_pic]');
            var profile_pic = profile_file[0].files[0];
            var background_file = $('input[name=background_pic]');
            var background_pic = background_file[0].files[0];
            var thumbnail = $('input[name=thumbnail]');
            var thumbnail_pic = thumbnail[0].files[0];
            console.log('thumbnail_pic', thumbnail[0].files, thumbnail_pic);
            var ajax = false;
            if (thumbnail[0].files.length > 0) {
                img = new Image();
                img.src = _URL.createObjectURL(thumbnail_pic);
                img.onload = function () {
                    imgwidth = this.width;
                    imgheight = this.height;
                    console.log(imgwidth, imgheight);
                    if (imgwidth <= 50 && imgheight <= 50) {
                        ajax = true;
                        // alert('true');
                    } else {
                        $('input[name=thumbnail]').addClass('error');
                        $('input[name=thumbnail]').parent().append('<span class="text-danger thumberror">Thumbnail image size 50X50</span>');
                        ajax = false;
                    }
                }
            } else {
                ajax = true;
            }
            // alert(ajax);
            // $("#width").text(imgwidth);
            // $("#height").text(imgheight);
            var formdata = new FormData(form);
            // formdata.append('admin_profile',$(element).find('input[name=admin_profile]').val());
            formdata.append('profile_pic', profile_pic);
            formdata.append('background_pic', background_pic);
            formdata.append('thumbnail', thumbnail_pic);
            console.log('signupForm', formdata);
            if (ajax == true) {
                $.ajax({
                    url: "profileupdate",
                    type: 'POST',
                    data: formdata,
                    async: false,
                    dataType: 'json',
                    cache: true,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if (data.status == true) {
                            console.log('asdad');
                            // $('#signupsuccessModal').modal('show');
                            $('#createProfile').modal('hide');

                            window.location.href = 'familygroup';
                            // // $('#emailconfirm_userid').val(data.data.id);
                            // //    $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                            // $('.signupsuccessModal-sucess').removeClass('hide').text(data.message);
                            // element.preventDefault();
                            return false;
                        } else {
                            //$('.'+form_mailid+'-error').removeClass('hide').html(data.message);
                            return false;
                        }
                        return false;
                        console.log(data);
                    }
                });
            }


            return false;
        }
    });*/

    $.validator.addMethod('width', function (value, element) {
        if ($(element).data('width') >= 50) {
            return $(element).data('width') >= 50;
        }

        return true;
    }, 'Image needs to be 50X50 size');

    // $.validator.addMethod('timelinewidthheight', function (value, element) {
    //     if ($(element).data('width') >= 400 && $(element).data('height') >= 250) {
    //         return $(element).data('width') >= 400;
    //     }

    //     return true;
    // }, 'Image needs to be 400X250 size');

    // $.validator.addMethod("unique_profileurl",
    //     function (value) {
    //         $('#profile_url_name').text('');
    //         var profile_id = 0;
    //         var pro_id = $('#userprofile-form').find('input[name=profile_id]').val();
    //         if (pro_id && pro_id > 0 && pro_id != 'undefined') {
    //             profile_id = pro_id;
    //         }
    //         var isUnique = false;
    //         if (value == '')
    //             return isUnique;


    //         console.log("../profile_urlcheck/" + value + '/' + profile_id);
    //         $.ajax({
    //             url: "../profile_urlcheck/" + value + '/' + profile_id,
    //             type: 'GET',
    //             async: false,
    //             dataType: 'json',
    //             cache: true,
    //             success: function (data) {
    //                 $('#profile_url_name').text(value);
    //                 isUnique = data.status;
    //                 // console.log('asd',data);
    //             }
    //         });

    //         return isUnique;

    //     },
    //     jQuery.validator.format("This URL is in use. Please try another one.")
    // );


    $("#wardenForm").validate({
        rules: {
            firstname: {
                required: true
                // lettersonly: true
            },
            warden_group_id: {
                required: true
                // lettersonly: true
            },
            lastname: {
                required: true
                // lettersonly: true
            },
            contactnumber: "required",
            // username: {
            // 	required: true,
            // 	minlength: 2
            // },
            password: {
                required: true,
                minlength: 6
            },
            conpassword: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true,
                checkemailid_warden: ['email'],
            },
            house_number: 'required',
            address_1: 'required',
            region: 'required',
            city: 'required',
            postcode: 'required',
        },
        messages: {
            firstname: {
                required: "Please enter your firstname"
                // lettersonly: "Please enter only alphabets"
            },
            contactnumber: "Please enter your contact number",
            lastname: {
                required: "Please enter your firstname"
                // lettersonly: "Please enter only alphabets"
            },
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            conpassword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address",
            }
        }
    });

    $("#signupForm").validate({
        rules: {
            firstname: {
                required: true
                // lettersonly: true
            },
            lastname: {
                required: true
                // lettersonly: true
            },
            contactnumber: "required",
            // username: {
            // 	required: true,
            // 	minlength: 2
            // },
            password: {
                required: true,
                minlength: 6
            },
            conpassword: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true,
                unique: ['email'],
            }
        },
        messages: {
            firstname: {
                required: "Please enter your firstname"
                // lettersonly: "Please enter only alphabets"
            },
            contactnumber: "Please enter your contact number",
            lastname: {
                required: "Please enter your firstname"
                // lettersonly: "Please enter only alphabets"
            },
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            conpassword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address",
            }
        },
        submitHandler: function (form) {
            var element = '#signupForm'
            var email = $(element).find('input[name=email]').val();
            var contactnumber = $(element).find('input[name=contactnumber]').val();
            var password = $(element).find('input[name=password]').val();
            var conpassword = $(element).find('input[name=conpassword]').val();
            var userplan_type = $(element).find('select[name=userplan_type]').val();
            var address = $(element).find('textarea[name=address]').val();
            var firstname = $(element).find('input[name=firstname]').val();
            var orderid = $(element).find('input[name=orderid]').val();
            var customer_id = $(element).find('input[name=customer_id]').val();
            var group_name = $(element).find('input[name=group_name]').val();
            var lastname = $(element).find('input[name=lastname]').val();
            var address_1 = $(element).find('input[name=address_1]').val();
            var address_2 = $(element).find('input[name=address_2]').val();
            var region = $(element).find('input[name=region]').val();
            var city = $(element).find('input[name=city]').val();
            var postcode = $(element).find('input[name=postcode]').val();
            var house_number = $(element).find('input[name=house_number]').val();
            var form_mailid = $(element).attr('id');
            console.log(email, address_1, address_1, city, region, postcode);
            $.ajax({
                url: "user-register",
                type: 'POST',
                data: { 'email': email, 'contactnumber': contactnumber, 'password': password, 'conpassword': conpassword, 'firstname': firstname, 'lastname': lastname, 'userplan_type': userplan_type, 'address_1': address_1, 'address_2': address_2, 'region': region, 'city': city, 'postcode': postcode, 'house_number': house_number, 'group_name': group_name,'orderid':orderid,'customer_id':customer_id },
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    // data = JSON.parse(resp);
                    if (data.status == true) {
                        //console.log('asdad');
                        //    window.location.href=data.url;
                        $('#signupsuccessModal').modal('show');
                        $('#signupModal').modal('hide');
                        // $('#emailconfirm_userid').val(data.data.id);
                        //    $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                        $('.signupsuccessModal-sucess').removeClass('hide').text(data.message);
                        // element.preventDefault();
                        return false;
                    } else {
                        $('.' + form_mailid + '-error').removeClass('hide').html(data.message);
                        return false;
                    }
                    console.log(data);
                }
            });
            return false;
        }
    });

    $("#emailconfirmForm").validate({
        rules: {
            user_id: "required",
            confirm_code: "required",
        },
        messages: {
            user_id: "Please fill all fileds",
            confirm_code: "Please code",
        },
        submitHandler: function (form) {
            var element = '#emailconfirmForm'
            var user_id = $(element).find('input[name=user_id]').val();
            var confirm_code = $(element).find('input[name=confirm_code]').val();
            console.log('signupForm', confirm_code, user_id);
            var form_mailid = $(element).attr('id');
            $.ajax({
                url: "user-emailconfirm",
                type: 'POST',
                data: { 'email': email, 'contactnumber': contactnumber, 'password': password, 'conpassword': conpassword, 'firstname': firstname, 'lastname': lastname, 'userplan_type': userplan_type, 'address': address },
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    if (data.status == true) {
                        console.log('asdad');
                        $('.' + form_mailid + '-sucess').removeClass('hide').text(data.message);
                        // element.preventDefault();
                        return false;
                    } else {
                        $('.' + form_mailid + '-error').removeClass('hide').html(data.message);
                        return false;
                    }
                    console.log(data);
                }
            });
            return false;
        }
    });




    $('#changepassword').validate({
        rules: {
            oldpassword: "required",
            password: {
                required: true,
                minlength: 6
            },
            conpassword: {
                required: true,
                minlength: 6,
                equalTo: "#changeinputpassword"
            },
        },
        messages: {
            oldpassword: "Please fill old password",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },
            conpassword: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long",
                equalTo: "Please enter the same password as above"
            },
        },
        submitHandler: function (form) {
            var element = '#changepassword'

            var password = $(element).find('input[name=password]').val();
            var conpassword = $(element).find('input[name=conpassword]').val();
            var oldpassword = $(element).find('input[name=oldpassword]').val();

            var form_mailid = $(element).attr('id');
            console.log('signupForm', form_mailid);
            $.ajax({
                url: "change-password",
                type: 'POST',
                data: { 'oldpassword': oldpassword, 'password': password, 'conpassword': conpassword },
                async: false,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        console.log('asdad');
                        //    window.location.href=data.url;
                        //    $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                        $('.' + form_mailid + '-sucess').removeClass('hide').text(data.message);
                        // element.preventDefault();
                        return false;
                    } else {
                        $('.' + form_mailid + '-error').removeClass('hide').html(data.message);
                        return false;
                    }
                }
            });
            return false;
        }
    });

    // $('button[name=submit],input[name=submit]').click(function(){
    //     var form_mailid = $(this).parents('form').attr('id');
    //     console.log('form_mailid',form_mailid);
    //     $('.'+form_mailid+'-sucess').addClass('hide');
    //     $('.'+form_mailid+'-error').addClass('hide');
    // })

    $('#forgotpassword_form').validate({
        rules: {
            email: {
                required: true,
                email: true,
            }
        },
        messages: {
            email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address",

            }

        },
        submitHandler: function (form) {
            var element = '#forgotpassword_form';
            var form_mailid = $(element).attr('id');
            var email = $(element).find('input[name=email]').val();
            var user_table = $(element).find('*[name=user_table]').val();
            console.log('forgotpassword', email,user_table,form_mailid);
            $('.' + form_mailid + '-sucess').removeClass('hide');
            $('.' + form_mailid + '-error').removeClass('hide');
            $.ajax({
                url: "forgotpassword",
                type: 'POST',
                data: { 'email': email,'user_table':user_table },
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    if (data.status == true) {
                        console.log('asdad');
                        $('.' + form_mailid + '-sucess').removeClass('hide').text(data.message);
                    } else {
                        $('.' + form_mailid + '-error').removeClass('hide').text(data.message);
                    }
                    console.log(data);
                }
            });
            return false;
        }
    });


    $("#featurepost-formvalidate").validate({
        rules: {
            title: "required",
            post_date: "required",
            // post_image:"required",
            post_description: "required",
            post_author: "required",
            post_postedby: "required",
        },
        submitHandler: function (form) {
            // console.log(form); 
            var element = '#featurepost-formvalidate';
            var form_mailid = $(element).attr('id');
            // console.log(form_mailid);
            // let formdata1 = [];
            // let formdata = [];
            var inputFile = $('input[name=post_image]');
            var fileToUpload = inputFile[0].files[0];
            // if(fileToUpload && fileToUpload!=''){
            var other_data = $(element).serializeArray();
            console.log('fileToUpload', fileToUpload);
            var formdata = new FormData(form);
            // formdata.append('other_data',other_data);
            formdata.append('fileToUpload', fileToUpload);
            // formdata.push(other_data);
            // console.log(formdata);
            var title = $(element).find('input[name=title]').val();
            var post_date = $(element).find('input[name=post_date]').val();
            var post_image = $(element).find('input[name=post_image]').val();
            var post_description = $(element).find('#featuredpost_description').val();
            var post_author = $(element).find('input[name=post_author]').val();
            var post_postedby = $(element).find('input[name=post_postedby]').val();
            // console.log(formdata,'post_image',post_image,post_author);

            $.ajax({
                url: "feature-post",
                type: 'POST',
                data: formdata,
                async: false,
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == true) {
                        $('.alert').addClass('hide');

                        // console.log('asdad',data);
                        $(element).find('input[name=title]').val('');
                        $(element).find('input[name=post_date]').val('');
                        $(element).find('textarea').val('');
                        $('.feature_post_row').prepend(data.body);
                        $('#featurepost-form').removeClass('show');
                        $('.feature_post_row > h3').hide();
                        $('.featurepost-sucess').removeClass('hide').text(data.message);
                    } else {
                        $('.featurepost-error').removeClass('hide').text(data.message);
                    }
                    // console.log(data);
                }
            });
            // }else{
            //     $(inputFile).parent().append('<label class="error">This field is required</label>')
            // }
            return false;
        }
    });



    $("#editprofile-formvalidate").validate({
        rules: {
            title: "required",
            post_date: "required",
            // post_image:"required",
            post_description: "required",
            post_author: "required",
            post_postedby: "required",
        },
        submitHandler: function (form) {
            // console.log(form); 
            var element = '#featurepost-formvalidate';
            var form_mailid = $(element).attr('id');
            // console.log(form_mailid);
            // let formdata1 = [];
            // let formdata = [];
            var inputFile = $('input[name=post_image]');
            var fileToUpload = inputFile[0].files[0];
            // if(fileToUpload && fileToUpload!=''){
            var other_data = $(element).serializeArray();
            console.log('fileToUpload', fileToUpload);
            var formdata = new FormData(form);
            // formdata.append('other_data',other_data);
            formdata.append('fileToUpload', fileToUpload);
            // formdata.push(other_data);
            // console.log(formdata);
            var title = $(element).find('input[name=title]').val();
            var post_date = $(element).find('input[name=post_date]').val();
            var post_image = $(element).find('input[name=post_image]').val();
            var post_description = $(element).find('#featuredpost_description').val();
            var post_author = $(element).find('input[name=post_author]').val();
            var post_postedby = $(element).find('input[name=post_postedby]').val();
            // console.log(formdata,'post_image',post_image,post_author);

            $.ajax({
                url: "feature-post",
                type: 'POST',
                data: formdata,
                async: false,
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == true) {
                        $('.alert').addClass('hide');

                        // console.log('asdad',data);
                        $(element).find('input[name=title]').val('');
                        $(element).find('input[name=post_date]').val('');
                        $(element).find('textarea').val('');
                        $('.feature_post_row').prepend(data.body);
                        $('#featurepost-form').removeClass('show');
                        $('.feature_post_row > h3').hide();
                        $('.featurepost-sucess').removeClass('hide').text(data.message);
                    } else {
                        $('.featurepost-error').removeClass('hide').text(data.message);
                    }
                    // console.log(data);
                }
            });
            // }else{
            //     $(inputFile).parent().append('<label class="error">This field is required</label>')
            // }
            return false;
        }
    });
    // timeline-formvalidation

    $('#timeline-formvalidation').validate({
        rules: {
            title: "required",
            title_for_date: "required",
            from_date: "required",
            description: "required"
        },
        submitHandler: function (form) {
            console.log(form); 
            var element = '#timeline-formvalidation';
            var form_mailid = $(element).attr('id');

            var inputFile = $(element).find('input[name=timelineimage]');
            var post_imageold = $('input[name=post_imageold]').val();
            var fileToUpload = inputFile[0].files[0];
            console.log(post_imageold);
            console.log('fileToUpload', post_imageold, fileToUpload);
            if ((post_imageold && post_imageold != '') || (fileToUpload && fileToUpload != '')) {
                var other_data = $(element).serializeArray();
                console.log('fileToUpload', fileToUpload);
                var formdata = new FormData(form);
                formdata.append('fileToUpload', fileToUpload);

                $.ajax({
                    url: "profile-timeline",
                    type: 'POST',
                    data: formdata,
                    async: false,
                    dataType: 'json',
                    cache: true,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        console.log(data);
                        if (data.status == true) {
                            $('.alert').addClass('hide');
                            $('#timeline-form').parent().prepend('<div class="alert alert-success">' + data.message + '</div>');
                            $('#timeline-form').removeClass('show');
                            //     $('#lifeof_loop').html(data.body);
                            $('.timeline-postloop').html(data.body);
                            $(element).find('input[name=title_for_date]').val('');
                            $(element).find('input.add-image-input').val('');
                            $(element).find('input[name=title]').val('');
                            $(element).find('input[name=from_date]').val('');
                            $(element).find('input[name=to_date]').val('');
                            $(element).find('textarea[name=description]').val('');
                        } else {
                            $('.featurepost-error').removeClass('hide').text(data.message);
                        }
                        // console.log(data);
                    }
                });
            } else {
                console.log('fileds required image timeline');
                $(inputFile).parent().append('<label class="error">This field is required</label>')
            }
            return false;
        }
    })

    $("#lifeof-formvalidate").validate({
        rules: {
            title: "required",
            // lifeofpost_image:"required",
            description: "required"
        },
        submitHandler: function (form) {
            // console.log(form); 
            var element = '#lifeof-formvalidate';
            var form_mailid = $(element).attr('id');
            // console.log(form_mailid);
            // let formdata1 = [];
            // let formdata = [];
            var inputFile = $('input[name=lifeofpost_image]');
            var post_imageold = $('input[name=post_imageold]').val();
            var fileToUpload = inputFile[0].files[0];
            console.log(post_imageold);
            console.log('fileToUpload', post_imageold, fileToUpload);
            // if((post_imageold && post_imageold!='') || (fileToUpload && fileToUpload!='')){
            var other_data = $(element).serializeArray();
            console.log('fileToUpload', fileToUpload);
            var formdata = new FormData(form);
            // formdata.append('other_data',other_data);
            formdata.append('fileToUpload', fileToUpload);

            loaderimg(element);
            $.ajax({
                url: "lifeof-post",
                type: 'POST',
                data: formdata,
                async: false,
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    loaderimghide(element);
                    if (data.status == true) {
                        $('.alert').addClass('hide');
                        $('#lifeof-edit').modal('hide');
                        // console.log('asdad',data);
                        $('#lifeof_loop').html(data.body);

                    } else {
                        $('.featurepost-error').removeClass('hide').text(data.message);
                    }
                    // console.log(data);
                }
            });
            // }else{
            //     $(inputFile).parent().append('<label class="error">This field is required</label>')
            // }
            return false;
        }
    });

    $('#shareMemory-form').validate({
        rules: {
            name: "required",
            email: "required",
            comment: "required",
            title: "required",
            // memoryimage: "required"
        },
        submitHandler: function (form) {
            // console.log('form',form); 
            var element = '#shareMemory-form';
            $('.memories-postdata').find('.alert').remove();
            var form_mailid = $(element).attr('id');
            // console.log(form_mailid);
            // let formdata1 = [];
            // let formdata = [];
            $(element).find("button[name=submit]").attr("disabled", true);
            //$(element).find('button[name=submit]').prepend('<img class="form-loading-img" src="https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif" width="20px"/>');
            $(element).find('button[name=submit]').text('images are bening uplaoded...');
            
            var inputFile = $('input[name=memoryimage]');
            // var post_imageold=$('input[name=post_memoryimageold]').val();
            var fileToUpload = inputFile[0].files[0];
            // console.log(post_imageold);
            console.log('fileToUpload', fileToUpload);
            // if((post_imageold && post_imageold!='') || (fileToUpload && fileToUpload!='')){
            var other_data = $(element).serializeArray();
            console.log('other_data', other_data);
            var formdata = new FormData(form);
            // formdata.append('other_data',other_data);
            formdata.append('fileToUpload', fileToUpload);

            loaderimg(element);
            $.ajax({
                url: "memoriespost",
                type: 'POST',
                data: formdata,
                async: false,
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log('success', data);
                    loaderimghide(element);
                    $(element).find("button[name=submit]").attr("disabled", false);
                    $(element).find("button[name=submit]").text('submit');
                    
                    if (data.status == true) {
                        $('.alert').addClass('hide');
                        $('#shareMemory').removeClass('show');
                        $(element).find('input[name=title]').val('');
                        $(element).find('input[name=memoryimage]').val('');
                        $(element).find('textarea[name=comment]').val('');
                        // console.log('asdad',data);
                        $('.memories-postdata').html(data.body);
                        $('.memories-postdata').prepend('<div class="alert alert-success">' + data.message + '</div>')

                    } else {
                        $('.memories-postdata').prepend('<div class="alert alert-success">' + data.message + '</div>')
                    }
                    console.log(data);
                }
            });
            // }else{
            //     $(inputFile).parent().append('<label class="error">This field is required</label>')
            // }
            return false;
        }
    })



    $('body').on('click', '#loadMore_journolpost', function () {
        var postid = $(this).data('postid');
        console.log('postid', postid);
        $.ajax({
            url: "journalpost_view_limit/" + postid + '/all',
            type: 'GET',
            success: function (data) {
                var data = JSON.parse(data);
                if (data.status == true) {

                    $('#post-detail-popup .journal-post-comment').html(data.body.journalcomment);
                    $('#post-detail-popup .journal-post-comment').find('.recent-item').addClass('show');
                    $('#loadMore_journolpost').hide();
                }
                // console.log(data);
            }
        });
    });

    $('body').on('click', '#loadMore_otherpost', function () {
        var postid = $(this).data('postid');
        var posttype = $(this).data('posttype');
        console.log('postid', postid, posttype);
        $.ajax({
            url: "otherpost_view_limit/" + postid + '/all/' + posttype,
            type: 'GET',
            success: function (data) {
                var data = JSON.parse(data);
                console.log(data);
                if (data.status == true) {

                    $('#life-modal .media-post-comment').html(data.body.othercomment);
                    $('#life-modal .media-post-comment').find('.recent-item').addClass('show');
                    $('#featurepost-modal .media-post-comment').html(data.body.othercomment);
                    $('#featurepost-modal .media-post-comment').find('.recent-item').addClass('show');
                    $('#time-line-modal .media-post-comment').html(data.body.othercomment);
                    $('#time-line-modal .media-post-comment').find('.recent-item').addClass('show');
                    $('#time-line-modal').find('#loadMore_otherpost').hide();
                    $('#featurepost-modal').find('#loadMore_otherpost').hide();
                    $('#life-modal').find('#loadMore_otherpost').hide();
                }
                // console.log(data);
            }
        });
    });



    $('body').on('click', '#loadMore_mediapost', function () {
        var postid = $(this).data('postid');
        console.log('postid', postid);
        $.ajax({
            url: "mediapost_view_limit/" + postid + '/all',
            type: 'GET',
            success: function (data) {
                var data = JSON.parse(data);
                if (data.status == true) {
                    console.log('log', data);
                    $('#life-modal .media-post-comment').html(data.body.journalcomment);
                    $('#life-modal .media-post-comment').find('.recent-item').addClass('show');
                    $('#loadMore_mediapost').hide();
                }
                // console.log(data);
            }
        });
    });

    $('#comment-mediapost').validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            comment: "required",
        },
        submitHandler: function (form) {
            console.log(form);
            var element = '#comment-mediapost';

            var form_mailid = $(element).attr('id');
            var other_data = $(element).serializeArray();
            console.log(other_data);
            $.ajax({
                url: "media_commentpost",
                type: 'POST',
                data: other_data,
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    if (data.status == true) {
                        // console.log(data.body);
                        $(element).removeClass('show');
                        $(element).find('input[name=name]').val('');
                        $(element).find('input[name=email]').val('');
                        $(element).find('textarea').val('');
                        $('#life-modal .media-post-comment').html(data.body);
                        var this_popup = $('#life-modal');
                        //this_popup.find('.media-post-comment').html(data.comment_body);
                        // console.log(data.count_commentrow);

                        this_popup.find('#loadMore_mediapost').hide();
                        if (data.count_commentrow > 2) {
                            this_popup.find('#loadMore_mediapost').show();
                            this_popup.find('#loadMore_mediapost').attr('data-postid', data.postid);
                        }

                        return false;
                    } else {
                        return false;
                    }
                    console.log(data);
                }
            });
            return false;
        }
    });

    $('#comment-timeline').validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            comment: "required",
        },
        submitHandler: function (form) {
            var authuser = '<?php echo (checkauth()) ? get_frontauthuser()["user_id"] ?>';
            console.log('form',authuser);
            var element = '#comment-timeline';
            let id = $(element).find('#postid').val();
            let post_type = $(element).find('#post_type').val();
            var form_mailid = $(element).attr('id');
            var other_data = $(element).serializeArray();
            console.log('form', other_data);
            $.ajax({
                url: "other_commentpost",
                type: 'POST',
                data: other_data,
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    if (data.status == true) {
                        console.log(data);
                        $(element).removeClass('show');

                        // $(element).find('input[name=name]').val('');
                        // $(element).find('input[name=email]').val('');
                        $(element).find('textarea').val('');
                        const this_popup = $('#time-line-modal');
                        this_popup.find('#life-modal .media-post-comment').html(data.body);
                        this_popup.find('#life-modal .media-post-comment').prepend(data.message);
                        this_popup.find('.likecount').text(data.body.likecount);
                        this_popup.find('#postid').val(id);
                        this_popup.find('#post_type').val(post_type);
                        this_popup.find('.media-post-comment').html(data.body);
                        this_popup.find('.media-post-comment').prepend(data.message);


                        //this_popup.find('.media-post-comment').html(data.comment_body);
                        // console.log(data.count_commentrow);

                        this_popup.find('#loadMore_otherpost').hide();
                        if (data.rowcount > 2) {
                            this_popup.find('#loadMore_otherpost').show();
                            this_popup.find('#loadMore_otherpost').attr('data-posttype', post_type);
                            this_popup.find('#loadMore_otherpost').attr('data-postid', id);
                        }

                        return false;
                    } else {
                        return false;
                    }
                    console.log(data);
                }
            });
            return false;
        }
    });


    $('#comment-featurepost').validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            comment: "required",
        },
        submitHandler: function (form) {
            console.log(form);
            var element = '#comment-featurepost';

            var form_mailid = $(element).attr('id');
            var postid = $(element).find('input[name=postid]').val();
            var post_type = $(element).find('input[name=post_type]').val();
            var other_data = $(element).serializeArray();
            console.log('other_data', other_data);
            $.ajax({
                url: "other_commentpost",
                type: 'POST',
                data: other_data,
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    if (data.status == true) {
                        console.log(data);
                        $(element).removeClass('show');
                        $(element).find('input[name=name]').val('');
                        $(element).find('input[name=email]').val('');
                        $(element).find('textarea').val('');
                        $('#featurepost-modal .media-post-comment').html(data.body);
                        $('#featurepost-modal .media-post-comment').prepend(data.message);
                        var this_popup = $('#featurepost-modal');
                        //this_popup.find('.media-post-comment').html(data.comment_body);
                        // console.log(data.count_commentrow);

                        this_popup.find('#loadMore_otherpost').hide();
                        if (data.rowcount > 2) {
                            this_popup.find('#loadMore_otherpost').show();
                            this_popup.find('#loadMore_otherpost').attr('data-postid', postid);
                            this_popup.find('#loadMore_otherpost').attr('data-posttype', post_type);
                        }

                        return false;
                    } else {
                        return false;
                    }
                    console.log(data);
                }
            });
            return false;
        }
    });

    

    $('#user_subscription').validate({
        rules: {
            email: {
                required: true,
                email: true,
                checkemailid_sub: ['email'],
            },
        }
    })

    // messages: {
    //     title: {
    //         required: "Please enter your title"
    //         // lettersonly: "Please enter only alphabets"
    //     },
    // },

    $('#journal-post-form').validate({
        rules: {
            title: "required",
            journal_category: "required",
            description: "required",
            // image: "required",
            is_public: "required"
        },
        submitHandler: function (form) {
            // console.log('form',form); 
            var element = '#journal-post-form';
            var form_mailid = $(element).attr('id');
            $('.recent-post').find('.alert').remove();
            // console.log(form_mailid);
            // let formdata1 = [];
            // let formdata = [];
            var inputFile = $(element).find('input[name=image]');
            var post_imageold = '';//$('input[name=post_memoryimageold]').val();
            var fileToUpload = inputFile[0].files[0];
            console.log(post_imageold);
            console.log('fileToUpload', post_imageold, fileToUpload);
            // if((post_imageold && post_imageold!='') || (fileToUpload && fileToUpload!='')){
            var other_data = $(element).serializeArray();
            // console.log('other_data',other_data);
            // console.log('fileToUpload',fileToUpload);
            var formdata = new FormData(form);
            // formdata.append('other_data',other_data);
            formdata.append('fileToUpload', fileToUpload);

            loaderimg(element);
            $.ajax({
                url: "journal_post",
                type: 'POST',
                data: formdata,
                async: false,
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(data);
                    //location.reload();
                    // jQuery(function () {
                    //     // Owl Carousel
                    //     var owl = jQuery(".owl-carousel");
                    //     owl.owlCarousel({
                    //         items: 1,
                    //         margin: 10,
                    //         loop: true,
                    //         nav: true
                    //     });
                    // });

                    loaderimghide(element);
                    if (data.status == true) {
                        $('.alert').addClass('hide');
                        $('.journal-form').removeClass('show');
                        // console.log('bodyhtml', data.bodyhtml);
                        $('.journalpost-section').html(data.body);
                        // $('.journal-posthtmldata').html(data.bodyhtml);

                        $('.journalpost-section').prepend('<div class="alert alert-success">' + data.message + '</div>')

                    } else {
                        $('.journalpost-section').prepend('<div class="alert alert-success">' + data.message + '</div>')
                    }
                    console.log(data);
                }
            });
            // }else{
            //     $(inputFile).parent().append('<label class="error">This field is required</label>')
            // }
            return false;
        }
    })

    $('.create_album_div').click(function () {
        
        $('#create-album').find('input[name=title]').val('');
    });

    $('#create-album-form').validate({
        rules: {
            title: "required",
        },
        submitHandler: function (form) {
            $('.alert').remove
            var element = '#create-album-form';


            $('#media-upload').find('.alert').remove();
            var form_mailid = $(element).attr('id');
            var other_data = $(element).serializeArray();
            // console.log('signupForm',form_mailid,other_data);
            $.ajax({
                url: "create-album",
                type: 'POST',
                data: other_data,
                async: false,
                dataType: 'json',
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        console.log('asdad');
                        $('#media-upload').prepend('<div class="alert alert-success">' + data.message + '</div>');
                        $('#create-album').modal('hide');
                        //    window.location.href=data.url;
                        // $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                        // $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                        // element.preventDefault();
                        $('#media-album-name').html(data.data);
                        $('#create-album').find('input[type=text]').val('');
                        $('#create-album').find('textarea').val('');
                        return false;
                    } else {
                        $('#media-upload').prepend('<div class="alert alert-success">' + data.message + '</div>');
                        return false;
                    }
                }
            });
            return false;
        }
    });



    $('#media-upload').validate({
        rules: {
            //title: "required",
            album_id: "required",
            //media_caption: "required",
            media_ispublic: "required"
        },
        submitHandler: function (form) {
            console.log('17000456asdadd');
            $('.alert').remove();
            var element = '#media-upload';
            loaderimg(element);
            // var album_id = $(element).find('input[name=album_id]').val();
            // var media_caption = $(element).find('input[name=media_caption]').val();
            // var media_ispublic = $(element).find('input[name=media_ispublic]:checked').val();
            $('.pills-media').find('.alert').remove();
            var form_mailid = $(element).attr('id');
            var other_data = $(element).serializeArray();


            var inputFile = $(element).find('input[name^=media_image]');
            var fileToUpload = inputFile[0].files[0];
            console.log('fileToUpload', fileToUpload);
            if ((fileToUpload && fileToUpload != '')) {
                $(element).find("button[name=submit]").attr("disabled", true);
                //$(element).find('button[name=submit]').prepend('<img class="form-loading-img" src="https://media.tenor.com/On7kvXhzml4AAAAj/loading-gif.gif" width="20px"/>');
                $(element).find('button[name=submit]').text('images are bening uplaoded...');
                // console.log('fileToUpload', fileToUpload);
                var formdata = new FormData(form);
                // formdata.append('other_data',other_data);
                formdata.append('respect_image', fileToUpload);
                
                 console.log('signupForm',form_mailid,other_data);
                 setTimeout(function () {
                     $.ajax({
                         url: "media_image",
                         type: 'POST',
                         data: formdata,
                         async: false,
                         dataType: 'json',
                         cache: true,
                         processData: false,
                         contentType: false,
                         success: function (data) {
                             console.log('17456asdadd');
                             // setTimeout(function () {
                                 $('.alert').fadeOut('slow');
                                 $(element).find("button[name=submit]").attr("disabled", false);
                                 $(element).find("button[name=submit]").text('submit');
                                 // $("#btnSubmit").attr("disabled", false);
                             // }, 1500)
                             //return false;
                             if (data.status == true) {
                                 $(element).find('button .form-loading-img').remove();
                                 console.log('asdad', data.status, data.message);
                                 $('#media-upload').removeClass('show');
                                 $('#media-upload').find('select[name=album_id]').val('');
                                 $('#media-upload').find('input[type=text]').val('');
                                 $('#media-upload').find('input[type=file]').val('');
                                 $('#media-upload').find('textarea').val('');
                                 //    window.location.href=data.url;
                                 // $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                                 // $('.'+form_mailid+'-sucess').removeClass('hide').text(data.message);
                                 // element.preventDefault();
                                 $('.media-show-data').html(data.data);
                                 $('.media-show-data').prepend('<div class="alert alert-success">' + data.message + '</div>');
                                 return false;
                            } else {
                                 $('#media-show-data').prepend('<div class="alert alert-success">' + data.message + '</div>');
                                 return false;
                             }
                         }
                    });
                 },2000);

            } else {
                console.log('fileds required image');
                $(inputFile).parent().append('<label class="error">This field is required</label>');
                return false;
            }

            return false;
        }
    });

    $('.respect-comment').click(function () {
        var href_comment = $(this).attr('data-bs-target');
        $(href_comment).toggleClass('show');
    });

    $("#editfeaturepost-form").validate({
        rules: {
            title: "required",
            post_date: "required",
            // post_image:"required",
            post_description: "required",
            post_author: "required",
            post_postedby: "required",
        },
        submitHandler: function (form) {
            // console.log(form); 
            var element = '#editfeaturepost-form';
            var form_mailid = $(element).attr('id');
            // console.log(form_mailid);
            // let formdata1 = [];
            // let formdata = [];
            var inputFile = $('input[name=post_image]');
            var fileToUpload = inputFile[0].files[0];
            var other_data = $(element).serializeArray();

            var formdata = new FormData(form);
            // formdata.append('other_data',other_data);
            formdata.append('fileToUpload', fileToUpload);
            // formdata.push(other_data);
            // console.log(formdata);
            var title = $(element).find('input[name=title]').val();
            var post_date = $(element).find('input[name=post_date]').val();
            var post_image = $(element).find('input[name=post_image]').val();
            var post_description = $(element).find('#featuredpost_description').val();
            var post_author = $(element).find('input[name=post_author]').val();
            var post_postedby = $(element).find('input[name=post_postedby]').val();
            // console.log(formdata,'post_image',post_image,post_author);

            $.ajax({
                url: "feature-post",
                type: 'POST',
                data: formdata,
                async: false,
                dataType: 'json',
                cache: true,
                processData: false,
                contentType: false,
                success: function (data) {
                    if (data.status == true) {
                        $('.alert').addClass('hide');
                        $('#featurepost-edit').modal('hide');
                        $('.postid' + data.postid).replaceWith(data.body);
                        // console.log('asdad',data);
                        $(element).find('input[name=title]').val('');
                        $(element).find('input[name=post_date]').val('');
                        $(element).find('textarea').val('');
                        // $('.feature_post_row').prepend(data.body);
                        $('#featurepost-form').removeClass('show');
                        $('.featurepost-sucess').removeClass('hide').text(data.message);
                    } else {
                        $('.featurepost-error').removeClass('hide').text(data.message);
                    }
                    // console.log(data);
                }
            });
            return false;
        }
    });

    // jQuery.validator.addMethod("lettersonly", function (value, element) {
    //     return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
    // }, "Letters only please");

    $.validator.addMethod("checkemailid_sub",
        function (value) {
            // console.log(value);
            var isUnique = false;
            if (value == '')
                return isUnique;

            // id_send= '';
            // if(params[1] !='')
            //    id_send ='id='+params[1]+'&';

            $.ajax({
                url: "checkemailid_sub?email=" + value,
                type: 'GET',
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    isUnique = data;
                    console.log(data);
                }
            });

            return isUnique;

        },
        jQuery.validator.format("Already subscribed by this Email Address")
    );

    

    $.validator.addMethod("checkemailid",
        function (value) {
            console.log(value);
            var isUnique = false;
            if (value == '')
                return isUnique;

            // id_send= '';
            // if(params[1] !='')
            //    id_send ='id='+params[1]+'&';

            $.ajax({
                url: "checkuser_email?email=" + value,
                type: 'GET',
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    isUnique = data;
                    console.log(data);
                }
            });

            return isUnique;

        },
        jQuery.validator.format("Email Address already exits")
    );

    $.validator.addMethod("checkemailid_warden",
        function (value) {
            console.log(value);
            var isUnique = false;
            if (value == '')
                return isUnique;

            // id_send= '';
            // if(params[1] !='')
            //    id_send ='id='+params[1]+'&';

            $.ajax({
                url: "checkregisterwardenuser_email?email=" + value,
                type: 'GET',
                async: false,
                dataType: 'json',
                cache: true,
                success: function (data) {
                    isUnique = data;
                    console.log(data);
                }
            });

            return isUnique;

        },
        jQuery.validator.format("Email Address already exits")
    );

});