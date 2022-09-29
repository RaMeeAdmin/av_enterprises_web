<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Add New Suppliers</h3>
            </div>
             <div class="box-body">
            <?php// echo form_open('suppliers/add'); ?>
              <form id="add_name">
             <div class="col-md-6">
               <label for="company_name" class="control-label"> <span class="text-danger"></span>Company name <span class="text-danger"></span>*</label>
                <div class="form-group">
                  <input type="text" name="company_name" value="<?php echo $this->input->post('company_name'); ?>" class="form-control " id="company_name" required="required" />
                   <span class="text-danger"><?php echo form_error('company_name');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="phone" class="control-label"> <span class="text-danger"></span>Phone</label>
                <div class="form-group">
                  <input type="text" name="phone" value="<?php echo $this->input->post('phone'); ?>" class="form-control " id="phone" />
                   <span class="text-danger"><?php echo form_error('phone');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="email" class="control-label"> <span class="text-danger"></span>Email</label>
                <div class="form-group">
                  <input type="text" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control " id="email" />
                   <span class="text-danger"><?php echo form_error('email');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="address" class="control-label"> <span class="text-danger"></span>Address</label>
                <div class="form-group">
                  <input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control " id="address"  required="required"/>
                   <span class="text-danger"><?php echo form_error('address');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="state" class="control-label"> <span class="text-danger"></span>State</label>
                <div class="form-group">
                  <select class="form-control" name="state" id="state" required="required">
                    <option value=" ">Select State *</option>
                    </select>
                    
                   <span class="text-danger"><?php echo form_error('state');?></span>
               </div>
             </div>
             
             <div class="col-md-6">
               <label for="contact_person_name" class="control-label"> <span class="text-danger"></span>Contact person name</label>
                <div class="form-group">
                  <input type="text" name="contact_person_name" value="<?php echo $this->input->post('contact_person_name'); ?>" class="form-control " id="contact_person_name" />
                   <span class="text-danger"><?php echo form_error('contact_person_name');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="contact_person_number" class="control-label"> <span class="text-danger"></span>Contact person number</label>
                <div class="form-group">
                  <input type="text" name="contact_person_number" value="<?php echo $this->input->post('contact_person_number'); ?>" class="form-control " id="contact_person_number" />
                   <span class="text-danger"><?php echo form_error('contact_person_number');?></span>
               </div>
             </div>
             
             <div class="col-md-6">
               <label for="gstn_uin" class="control-label"> <span class="text-danger"></span>Gstn uin</label>
                <div class="form-group">
                  <input type="text" name="gsts_no" value="<?php echo $this->input->post('gstn_uin'); ?>" class="form-control " id="gstn_uin" />
                   <span class="text-danger"><?php echo form_error('gstn_uin');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="opening_balance" class="control-label"> <span class="text-danger"></span>Opening balance</label>
                <div class="form-group">
                  <input type="text" name="opening_balance" value="<?php echo $this->input->post('opening_balance'); ?>" class="form-control " id="opening_balance" />
                   <span class="text-danger"><?php echo form_error('opening_balance');?></span>
               </div>
             </div>
         
             <div class="col-md-12">
               <label for=" " class="control-label"> </label>
                <div class="form-group">
                   <button type="button" class="btn btn-success" id="butsave">  
                   <i class="fa fa-check"></i> Save 
                        </button> 
               </div>
             </div>
            <?php echo form_close(); ?>
          </div>
        </div>
        </div>
    </div>
</div>
</section>
</div>
<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
 $('#butsave').click(function(){
  var name = $('#company_name').val();
  var phone = $('#phone').val();
  var email = $('#email').val();
  var state = $('#state').val();
  var contact_person = $('#contact_person_name').val();
 
  if(name==''){
    alert('Name Is Required');
    document.getElementById("company_name").focus();
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
     'url':'<?=base_url()?>api/suppliers/addnew',
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {
      alert('Record Inserted Successfully.');
      window.location = "<?=base_url()?>suppliers";
      }

    });
   });

 $.ajax({

    'url':'<?=base_url()?>api/customer/get_state',
    type: "POST",
    data: {

    },
    dataType: 'json',
    success: function(response)
    {

      var len = response.data.length;
      for( var i = 0; i<len; i++){
        var id = response.data[i].state_id;
        var name = response.data[i].name;
        $("#state").append("<option value='"+id+"'>"+name+"</option>");

      }

    },
    error: function(result) {

    }
  });

  });
</script>