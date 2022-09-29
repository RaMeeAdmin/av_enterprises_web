<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
       <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Add New Locations</h3>
        </div>
        <div class="box-body">
          <?php //echo form_open('locations/add'); ?>
           <form id="add_name" >
          <div class="col-md-6">
           <label for="name" class="control-label"> <span class="text-danger"></span>Name</label>
           <div class="form-group">
            <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control " id="name" required="required" />
            <span class="text-danger"><?php echo form_error('name');?></span>
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
       <label for="contact_person_name" class="control-label"> <span class="text-danger"></span>Contact person name</label>
       <div class="form-group">
        <input type="text" name="contact_person_name" value="<?php echo $this->input->post('contact_person_name'); ?>" class="form-control " id="contact_person_name" required="required" />
        <span class="text-danger"><?php echo form_error('contact_person_name');?></span>
      </div>
    </div>
    <div class="col-md-6">
     <label for="contact_number" class="control-label"> <span class="text-danger"></span>Contact number</label>
     <div class="form-group">
      <input type="text" name="contact_number" value="<?php echo $this->input->post('contact_number'); ?>" class="form-control " id="contact_number" required="required" />
      <span class="text-danger"><?php echo form_error('contact_number');?></span>
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
</section>
</div>
<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
 $('#butsave').click(function(){
  var name = $('#name').val();
  var address = $('#address').val();
  var contact_person_name = $('#contact_person_name').val();
  var contact_number = $('#contact_number').val();
  
 
  if(name==''){
    alert('Name Is Required');
    document.getElementById("name").focus();
   return false;
  }
  if(address==''){
    alert('Address Is Required');
    document.getElementById("address").focus();
   return false;
  }
  if(contact_person_name==''){
    alert('Contact Person Name Is Required');
    document.getElementById("contact_person_name").focus();
   return false;
  }
  if(contact_number==''){
    alert('Contact Number Is Required');
    document.getElementById("contact_number").focus();
   return false;
  }
     $.ajax({
     'url':'<?=base_url()?>api/Locations/addnew',
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

      alert('Record Inserted Successfully.');
      window.location = "<?=base_url()?>locations";
      }

    });
   });
  });
 </script>