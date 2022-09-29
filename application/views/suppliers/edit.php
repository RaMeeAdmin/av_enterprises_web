<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Suppliers Edit</h3>
            <?php// echo form_open('suppliers/edit/'.$suppliers['id']); ?>
             <form id="add_name">
            <div class="box-body">
              <div class="row clearfix">
        
                        <div class="col-md-6">
               <label for="company_name" class="control-label">  <span class="text-danger"></span>Company name</label>
                <div class="form-group">
                  <input type="text" name="company_name"  class="form-control" id="company_name" required="required" />
                    <span class="text-danger"><?php echo form_error('company_name');?></span>
               </div>
             </div> 
                     
              <div class="col-md-6">
               <label for="phone" class="control-label">  <span class="text-danger"></span>Phone</label>
                <div class="form-group">
                  <input type="text" name="phone" class="form-control" id="phone" />
                    <span class="text-danger"><?php echo form_error('phone');?></span>
               </div>
             </div> 
               <div class="col-md-6">
               <label for="email" class="control-label">  <span class="text-danger"></span>Email</label>
                <div class="form-group">
                  <input type="text" name="email" class="form-control" id="email" />
                    <span class="text-danger"><?php echo form_error('email');?></span>
               </div>
             </div> 
                <div class="col-md-6">
               <label for="address" class="control-label">  <span class="text-danger"></span>Address</label>
                <div class="form-group">
                  <input type="text" name="address" class="form-control" id="address" required="required"/>
                    <span class="text-danger"><?php echo form_error('address');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="state" class="control-label">  <span class="text-danger"></span>State</label>
                <div class="form-group">
               
                <select class="form-control" name="state" id="state" required="required">
                    <?php foreach ($state as $key ) {?>
                      
                       <option value="<?php echo $suppliers['state_id']; ?>"<?php if($key['state_id']==$suppliers['state_id']) echo 'selected="selected"'; ?>><?php echo $key['name']; ?></option>
                  <?php  } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('state');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="contact_person_name" class="control-label">  <span class="text-danger"></span>Contact person name</label>
                <div class="form-group">
                  <input type="text" name="contact_person_name"  class="form-control" id="contact_person_name" />
                    <span class="text-danger"><?php echo form_error('contact_person_name');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="contact_person_number" class="control-label">  <span class="text-danger"></span>Contact person number</label>
                <div class="form-group">
                  <input type="text" name="contact_person_number"  class="form-control" id="contact_person_number" />
                    <span class="text-danger"><?php echo form_error('contact_person_number');?></span>
               </div>
             </div> 
                      
                        <div class="col-md-6">
               <label for="gstn_uin" class="control-label">  <span class="text-danger"></span>Gstn uin</label>
                <div class="form-group">
                  <input type="text" name="gsts_no"  class="form-control" id="gstn_uin" />
                    <span class="text-danger"><?php echo form_error('gstn_uin');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="opening_balance" class="control-label">  <span class="text-danger"></span>Opening balance</label>
                <div class="form-group">
                  <input type="text" name="opening_balance"  class="form-control" id="opening_balance" />
                  <input type="hidden" name="id" id="edit_id">
                    <span class="text-danger"><?php echo form_error('opening_balance');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="cr_dr" class="control-label">  <span class="text-danger"></span>Cr dr</label>
                <div class="form-group">
                  <input type="text" name="cr_dr"  class="form-control" id="cr_dr" />
                    <span class="text-danger"><?php echo form_error('cr_dr');?></span>
               </div>
             </div> 
                
        </div>
      </div>
            <div class="box-footer">
              <button type="button" class="btn btn-success" id="butsave">
                <i class="fa fa-check"></i> Save
              </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
</section>
</div>
<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
     $(document).ready(function(){

      var url = window.location.pathname;
      var id = url.substring(url.lastIndexOf('/') + 1);

        $.ajax({
     'url':'<?=base_url()?>api/suppliers/getsupplier',
      type: "POST",
      data:{'id':id},
      datatype:'json',
      success:function(response)
      {
       var id = response.data.id;
       var name = response.data.company_name;
       var phone = response.data.phone;
       var email = response.data.email;
       var address = response.data.address;
       var contact_person_name = response.data.contact_person_name;
       var contact_person_number = response.data.contact_person_number;
       var gstn_uin = response.data.gsts_no;
       var opening_balance = response.data.opening_balance;
       var cr_dr = response.data.cr_dr;
       $('#company_name').val(name);
       $('#phone').val(phone);
       $('#email').val(email);
       $('#address').val(address);
       $('#contact_person_name').val(contact_person_name);
       $('#contact_person_number').val(contact_person_number);
       $('#gstn_uin').val(gstn_uin);
       $('#opening_balance').val(opening_balance);
        $('#cr_dr').val(cr_dr);
       $('#edit_id').val(id);
       
      
      //alert('Record Inserted Successfully.');
     // window.location = "<?=base_url()?>material";
      }

    });

        $('#butsave').click(function(){
         var name = $('#name').val();
      var phone = $('#phone').val();
      var email = $('#email').val();
     // var state = $('#state').val();
      var contact_person = $('#contact_person_name').val();
 
  if(name==''){
    alert('Name Is Required');
    document.getElementById("name").focus();
   return false;
  }
  if(phone==''){
    alert('Phone Is Required');
    document.getElementById("phone").focus();
   return false;
  }
  if(email==''){
    alert('Email Is Required');
    document.getElementById("email").focus();
   return false;
  }
  // if(state==''){
  //   alert('State Is Required');
  //   document.getElementById("state").focus();
  //  return false;
  // }
   if(contact_person==''){
    alert('Contact person Name Is Required');
    document.getElementById("contact_person_name").focus();
   return false;
  }
     $.ajax({
     'url':'<?=base_url()?>api/suppliers/edit/'+id,
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

      alert('Record Updated Successfully.');
      window.location = "<?=base_url()?>suppliers";
      }

    });
   });
     });

      </script>