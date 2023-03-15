<!-- Icon Font Stylesheet -->
<style>
   .flag-container{
      height:35px !important;
   }
   
</style>
<?php echo $this->load->view('userpanel/userpanel_header') ?>
<div class="col-10">
   <div class="bg-light rounded h-100 p-4">
      <div class="row">
         <?php echo ($this->session->flashdata('error')) ? '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>' : ''; ?>
         <form action="" method="post" id="wardenForm" novalidate="novalidate" style="width:100%;">
            <div class="row">
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInput1" class="form-label"><?php echo lang('emailaddress') ?></label>
                     <input type="email" placeholder="<?php echo lang('emailaddress') ?>" name="email" class="form-control required" aria-describedby="emailHelp" id="signupemail">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputcn1" class="form-label mb-3"><?php echo lang('contactnumber') ?></label>
                     <input type="tel" id="register-phone" placeholder="<?php echo lang('contactnumber') ?>" name="contactnumber" class="form-control required" oninput="this.value=this.value.replace(/[^0-9.,]/g,'');" autocomplete="off">
                  </div>
               </div>
               <!-- <div class="col-12 col-md-6">
                  <div class="mb-3">
                     <label for="exampleFormControlInputppasword" class="form-label"><?php echo lang('password') ?></label>
                     <input type="password" name="password" placeholder="<?php echo lang('password') ?>" class="form-control required" id="password">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="mb-3">
                     <label for="exampleFormControlInputcp1" class="form-label">Confirm Password</label>
                     <input type="password" name="conpassword" placeholder="Confirm Password" class="form-control required">
                  </div>
               </div> -->
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputfn1" class="form-label"><?php echo lang('firstname') ?></label>
                     <input type="text" name="firstname" placeholder="First Name" class="form-control required">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('lastname') ?></label>
                     <input type="text" name="lastname" placeholder="Last Name" class="form-control required">
                  </div>
               </div>
               <input type="hidden" name="userplan_type" value="1">
               <?php /*
               <!-- <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('house_no') ?></label>
                     <input type="text" name="house_number" placeholder="<?php echo lang('house_no') ?>" class="form-control required   " oninput="this.value=this.value.replace(/[^0-9.,]/g,'');">
                  </div>
               </div> 
               <div class="col-12 col-md-6">
                  <div class="mb-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('address_1') ?></label>
                     <input type="text" name="address_1" placeholder="<?php echo lang('address_1') ?>" class="form-control required">
                  </div>
               </div> -->
               */ ?>
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('dob') ?></label>
                     <input type="date" name="dob" max="<?php echo date('Y-m-d') ?>" placeholder="<?php echo lang('dob') ?>" class="form-control required">
                  </div>
               </div>
               <?php /*
               <!-- <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('region') ?></label>
                     <input type="text" name="region" placeholder="<?php echo lang('region') ?>" class="form-control required">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('city') ?></label>
                     <input type="text" name="city" placeholder="<?php echo lang('city') ?>" class="form-control required">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('postcode') ?></label>
                     <input type="text" name="postcode" placeholder="<?php echo lang('postcode') ?>" class="form-control required">
                  </div>
               </div> -->
               */ ?>
               <div class="col-12 col-md-6 <?php //echo(user_allfamilygroup()['ids']==1) ? 'hide' : '' ?>">
                  <div class="mt-3">
                     <!-- <input type="hidden" name="warden_limit" id="warden_limit" value="2"/> -->
                     <label for="checkgroup_wardenlimit" class="form-label mb-3"><?php echo lang('family_group') ?></label>
                     <select class="form-control" name="warden_group_id" id="checkgroup_wardenlimit" style="border-radius: 50px;">
                        <!-- <option value="">Select Group</option> -->
                        <?php if(isset($grouplist) && $grouplist!=''){
                           foreach ($grouplist as $gkey => $gvalue) { ?>
                              <option value="<?php echo $gvalue->id ?>" <?php echo (isset($result['warden_group_id']) && $result['warden_group_id']==$gvalue->id) ? 'selected="selected"' : '' ?>><?php echo $gvalue->group_name ?></option>      
                           <?php }
                        }
                        ?>
                     </select>
                  </div>
               </div>
               
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-style">Submit</button>
         </form>
      </div>
   </div>
</div>
</div>
</div>
</section>
<script type="text/javascript">
   /*$('#checkgroup_wardenlimit').change(function(){
   alert('asdasdd');
   $('#family_group-error').remove();
   var value = $(this).val();
      console.log(value,$('#warden_limit').val());
      var isValidwardenlimit = false;
      if (value == '')
          return isValidwardenlimit;

      // id_send= '';
      // if(params[1] !='')
      //    id_send ='id='+params[1]+'&';

      $.ajax({
          url: "checkgroup_wardenlimit?groupid=" + value,
          type: 'GET',
          async: false,
          dataType: 'json',
          cache: true,
          success: function (data) {
              isValidwardenlimit = data;
              console.log(data);
          }
      });
      if(!isValidwardenlimit){
         alert('limit over');
         $('#checkgroup_wardenlimit').parent().append('<label id="family_group-error" class="error">This group limit is over please select other group.</label>');
      }
      return isValidwardenlimit;

}
   // jQuery.validator.format("Already subscribed by this Email Address")
);*/
</script>