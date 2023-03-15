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
                  <div class="mb-3">
                     <label for="exampleFormControlInputfn1" class="form-label"><?php echo lang('firstname') ?></label>
                     <input type="text" name="firstname" placeholder="First Name" class="form-control required" value="<?php echo (isset($result['firstname']) && $result['firstname']!='') ? $result['firstname'] : '' ?>">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="mb-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('lastname') ?></label>
                     <input type="text" name="lastname" placeholder="Last Name" class="form-control required" value="<?php echo (isset($result['lastname']) && $result['lastname']!='') ? $result['lastname'] : '' ?>">
                  </div>
               </div>
               
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputcn1" class="form-label"><?php echo lang('contactnumber') ?></label>
                     <input type="tel" id="register-phone" placeholder="<?php echo lang('contactnumber') ?>" name="contactnumber" class="form-control required" oninput="this.value=this.value.replace(/[^0-9.,]/g,'');" autocomplete="off" value="<?php echo (isset($result['contactnumber']) && $result['contactnumber']!='') ? $result['contactnumber'] : '' ?>">
                  </div>
               </div>
               <input type="hidden" name="id" value="<?php echo (isset($result['id']) && $result['id']!='') ? $result['id'] : '' ?>">
               
               <div class="col-12 col-md-6">
                  <div class="mt-3">
                     <label for="exampleFormControlInputln1" class="form-label"><?php echo lang('dob') ?></label>
                     <input type="date" name="dob" max="<?php echo date('Y-m-d') ?>" placeholder="<?php echo lang('dob') ?>" class="form-control required" value="<?php echo (isset($result['dob']) && $result['dob']!='') ? $result['dob'] : '' ?>" style="margin-top:0;">
                  </div>
               </div>

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
            <button type="submit" name="submit" class="btn btn-primary btn-style"><?php echo lang('update') ?></button>
         </form>
      </div>
   </div>
</div>
</div>
</div>
</section>