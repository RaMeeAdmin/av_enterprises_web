<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Customer Edit</h3>
            <?php// echo form_open('customer/edit/'.$customer['id']); ?>
            <form id="add_name" >
            <div class="box-body">
              <div class="row clearfix">
                <div class="col-md-6">
                 <label for="name" class="control-label">  <span class="text-danger"></span>Name</label>
                 <div class="form-group">
                  <input type="text" name="name"  class="form-control" id="name" required="required" />
                  <span class="text-danger"><?php echo form_error('name');?></span>
                </div>
              </div> 
              <div class="col-md-6">
               <label for="phone" class="control-label">  <span class="text-danger"></span>Phone</label>
               <div class="form-group">
                <input type="text" name="phone"  class="form-control" id="phone" required="required"/>
                <span class="text-danger"><?php echo form_error('phone');?></span>
              </div>
            </div> 
            <div class="col-md-6">
             <label for="email" class="control-label">  <span class="text-danger"></span>Email</label>
             <div class="form-group">
              <input type="text" name="email"  class="form-control" id="email" required="required"/>
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
                     <option value="<?php echo $customer['state_id']; ?>"<?php if($key['state_id']==$customer['state_id']) echo 'selected="selected"'; ?>><?php echo $key['name']; ?></option>
                  <?php  } ?>
                    </select>
          <span class="text-danger"><?php echo form_error('state');?></span>
        </div>
      </div> 
      <div class="col-md-6">
       <label for="contact_person_name" class="control-label">  <span class="text-danger"></span>Contact person name</label>
       <div class="form-group">
        <input type="text"  name="contact_person_name"  class="form-control" id="contact_person_name" required="required" />
        <span class="text-danger"><?php echo form_error('contact_person_name');?></span>
      </div>
    </div> 
    <div class="col-md-6">
     <label for="contact_person_contact_number" class="control-label">  <span class="text-danger"></span>Contact person contact number</label>
     <div class="form-group">
      <input type="text" name="contact_person_contact_number"  class="form-control" id="contact_person_contact_number" />
      <span class="text-danger"><?php echo form_error('contact_person_contact_number');?></span>
    </div>
  </div> 
  <div class="col-md-6">
   <label for="gstn_uin" class="control-label">  <span class="text-danger"></span>Gstn uin</label>
   <div class="form-group">
    <input type="text" name="gstn_uin" class="form-control" id="gstn_uin" />
    <input type="hidden" id="edit_id">
    <span class="text-danger"><?php echo form_error('gstn_uin');?></span>
  </div>
</div> 
<div class="col-md-6">
 <label for="credit_days" class="control-label">  <span class="text-danger"></span>Credit days</label>
 <div class="form-group">
  <input type="text" name="credit_days" class="form-control" id="credit_days" />
  <span class="text-danger"><?php echo form_error('credit_days');?></span>
</div>
</div> 
           </div>
         </div>
         <div class="box-footer">
          <button type="submit" class="btn btn-success" id="butsave">
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
     'url':'<?=base_url()?>api/customer/getcustomer',
      type: "POST",
      data:{'id':id},
      datatype:'json',
      success:function(response)
      {
       var id = response.data.id;
       var name = response.data.name;
       var phone = response.data.phone;
       var email = response.data.email;
       var address = response.data.address;
       var contact_person_name = response.data.contact_person_name;
       var contact_person_contact_number = response.data.contact_person_contact_number;
       var gstn_uin = response.data.gstn_uin;
       var credit_days= response.data.credit_days;
       $('#name').val(name);
       $('#phone').val(phone);
       $('#email').val(email);
       $('#address').val(address);
       $('#contact_person_name').val(contact_person_name);
       $('#contact_person_contact_number').val(contact_person_contact_number);
       $('#gstn_uin').val(gstn_uin);
       $('#credit_days').val(credit_days);
       $('#edit_id').val(id);
       
      
      //alert('Record Inserted Successfully.');
     // window.location = "<?=base_url()?>material";
      }

    });

        $('#butsave').click(function(){
         var name = $('#name').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  var state = $('#state').val();
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
  if(state==''){
    alert('State Is Required');
    document.getElementById("state").focus();
   return false;
  }
   if(contact_person==''){
    alert('Contact person Name Is Required');
    document.getElementById("contact_person_name").focus();
   return false;
  }
     $.ajax({
     'url':'<?=base_url()?>api/customer/edit/'+id,
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

      alert('Record Inserted Successfully.');
      window.location = "<?=base_url()?>customer";
      }

    });
   });
     });

      </script>