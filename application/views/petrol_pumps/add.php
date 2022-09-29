<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<div class="content-wrapper">
<section class="content">
<div class="row">
    <div class="col-md-12">
       <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Add New Petrol Pumps</h3>
            </div>
            <div class="box-body">
            <?php //echo form_open('petrol_pumps/add'); ?>
             <form id="add_name" >
           <div class="col-md-6">
               <label for="petrol_pumps_name" class="control-label"> <span class="text-danger"></span>Petrol pumps name</label>
                <div class="form-group">
                  <input type="text" name="petrol_pumps_name" value="<?php echo $this->input->post('petrol_pumps_name'); ?>" class="form-control " id="petrol_pumps_name" required="required" />
                   <span class="text-danger"><?php echo form_error('petrol_pumps_name'); ?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="address" class="control-label"> <span class="text-danger"></span>Address</label>
                <div class="form-group">
                  <input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control " id="address"  required="required"/>
                   <span class="text-danger"><?php echo form_error('address'); ?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="contact_person_name" class="control-label"> <span class="text-danger"></span>Contact person name</label>
                <div class="form-group">
                  <input type="text" name="contact_person_name" value="<?php echo $this->input->post('contact_person_name'); ?>" class="form-control " id="contact_person_name" required="required" />
                   <span class="text-danger"><?php echo form_error('contact_person_name'); ?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="contact_person_number" class="control-label"> <span class="text-danger"></span>Contact person number</label>
                <div class="form-group">
                  <input type="text" name="contact_person_number" maxlength="10" minlength="10" value="<?php echo $this->input->post('contact_person_number'); ?>" class="form-control " id="contact_person_number" required="required" />
                   <span class="text-danger"><?php echo form_error('contact_person_number'); ?></span>
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
<?php $this->load->view('section/footer');?>
<script type="text/javascript">
  $(document).ready(function() {
 $('#butsave').click(function(){
  var petrol_pumps_name = $('#petrol_pumps_name').val();
  var address = $('#address').val();
  var contact_person_name = $('#contact_person_name').val();
  var contact_person_number = $('#contact_person_number').val();


  if(petrol_pumps_name==''){
    alert('Petrol Pumps Name Is Required');
    document.getElementById("petrol_pumps_name").focus();
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
  if(contact_person_number==''){
    alert('Contact Person Number Is Required');
    document.getElementById("contact_person_number").focus();
   return false;
  }
     $.ajax({
     'url':'<?=base_url()?>api/petrol_pumps/addnew',
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

      alert('Record Inserted Successfully.');
      window.location = "<?=base_url()?>petrol_pumps";
      }

    });
   });
  });
 </script>
