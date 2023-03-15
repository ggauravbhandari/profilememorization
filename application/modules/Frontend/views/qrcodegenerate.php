<script src="<?php echo site_url('assets/frontend/') ?>js/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<div id="qrcode-2" style="display:none;"></div>
<script type="text/javascript">
   var qrcode = new QRCode(document.getElementById("qrcode-2"), {
       text: "<?php echo site_url().'?profile='.$userprofiledata['profile_url'] ?>",
       width: 128,
       height: 128,
       colorDark: "#000000",
       colorLight: "#ffffff",
       correctLevel: QRCode.CorrectLevel.H
   });
   myFunction();
   
   
   function myFunction() {
       setTimeout(function() {
   
           var qrcode = $('#qrcode-2').find('img').attr('src');
           $.ajax({
               type: "POST",
               url: 'update_qrcode',
               data: {
                   profile_id: '<?php echo $userprofiledata['id'] ?>',
                   qrcode: qrcode // <-- category ID of clicked item / link
               },
               success: function (data) {
                   console.log('myFunction',data);
                   // if (data.status == true) {
                   //     console.log(data.body);
                   //     $(element).removeClass('show');
                   //     $(element).find('textarea').val('');
                   //     $('#post-detail-popup .journal-post-comment').html(data.body);
                   //     return false;
                   // } else {
                   //     return false;
                   // }
                   // console.log(data);
               }
           })
   
       }, 200);
   }
</script>