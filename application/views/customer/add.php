<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Add New Customer</h3>
            </div>
            <div class="box-body">
            <?php// echo form_open('customer/add'); ?>
            <form id="add_name">
             <div class="col-md-6">
               <label for="name" class="control-label"> Name <span class="text-danger">*</span></label>
                <div class="form-group">
                  <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control " id="name" required="required" />
                   <span class="text-danger"><?php echo form_error('name');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="phone" class="control-label"> <span class="text-danger"></span>Phone  <span class="text-danger">*</span></label>
                <div class="form-group">
                  <input type="number" minlength="10" maxlength="10" name="phone" value="<?php echo $this->input->post('phone'); ?>"  class="form-control" id="phone" required="required"/>
                   <span class="text-danger"><?php echo form_error('phone');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="email" class="control-label"> <span class="text-danger"></span>Email <span class="text-danger">*</span></label>
                <div class="form-group">
                  <input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control " id="email" required="required" />
                   <span class="text-danger"><?php echo form_error('email');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="address" class="control-label"> <span class="text-danger"></span>Address</label>
                <div class="form-group">
                  <input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control " id="address" required="required" />
                   <span class="text-danger"><?php echo form_error('address');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="state" class="control-label"> <span class="text-danger" ></span>State  <span class="text-danger">*</span></label>
                <div class="form-group">
                  <select class="form-control" name="state" id="state" required="required">
                    <option value="Select state">Select State *</option>
                    </select>
                    
                   <span class="text-danger"><?php echo form_error('state');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="contact_person_name" class="control-label"> <span class="text-danger"></span>Contact person name  <span class="text-danger">*</span></label>
                <div class="form-group">
                  <input type="text" name="contact_person_name" value="<?php echo $this->input->post('contact_person_name'); ?>" class="form-control " id="contact_person_name" required="required" />
                   <span class="text-danger"><?php echo form_error('contact_person_name');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="contact_person_contact_number" class="control-label"> <span class="text-danger"></span>Contact person contact number</label>
                <div class="form-group">
                  <input type="text" name="contact_person_contact_number" value="<?php echo $this->input->post('contact_person_contact_number'); ?>" class="form-control " id="contact_person_contact_number" required="required" />
                   <span class="text-danger"><?php echo form_error('contact_person_contact_number');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="gstn_uin" class="control-label"> <span class="text-danger"></span>Gstn uin</label>
                <div class="form-group">
                  <input type="text" name="gstn_uin" value="<?php echo $this->input->post('gstn_uin'); ?>" class="form-control " id="gstn_uin" required="required" />
                   <span class="text-danger"><?php echo form_error('gstn_uin');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="credit_days" class="control-label"> <span class="text-danger"></span>Credit days</label>
                <div class="form-group">
                  <input type="text" name="credit_days" value="<?php echo $this->input->post('credit_days'); ?>" class="form-control " id="credit_days" />
                   <span class="text-danger"><?php echo form_error('credit_days');?></span>
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
   // alert('hiii');
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
     'url':'<?=base_url()?>api/customer/addnew',
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