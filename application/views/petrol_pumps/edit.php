<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Petrol Pumps Edit</h3>
            <?php// echo form_open('petrol_pumps/edit/'.$petrol_pumps['id']); ?>
            <form id="add_name" >
              <div class="box-body">
                <div class="row clearfix">
                 <div class="col-md-6">
                   <label for="petrol_pumps_name" class="control-label">  <span class="text-danger"></span>Petrol pumps name</label>
                   <div class="form-group">
                    <input type="text" name="petrol_pumps_name" class="form-control" id="petrol_pumps_name" required="required" />
                    <span class="text-danger"><?php echo form_error('petrol_pumps_name');?></span>
                  </div>
                </div> 
                <div class="col-md-6">
                 <label for="address" class="control-label">  <span class="text-danger"></span>Address</label>
                 <div class="form-group">
                  <input type="text" name="address"  class="form-control" id="address"  required="required"/>
                  <span class="text-danger"><?php echo form_error('address');?></span>
                </div>
              </div> 
              <div class="col-md-6">
               <label for="contact_person_name" class="control-label">  <span class="text-danger"></span>Contact person name</label>
               <div class="form-group">
                <input type="text" name="contact_person_name"  class="form-control" id="contact_person_name" required="required" />
                <span class="text-danger"><?php echo form_error('contact_person_name');?></span>
              </div>
            </div> 
            <div class="col-md-6">
             <label for="contact_person_number" class="control-label">  <span class="text-danger"></span>Contact person number</label>
             <div class="form-group">
              <input type="text" name="contact_person_number" class="form-control" id="contact_person_number" />
              <input type="hidden" name="id" id="edit_id">
              <span class="text-danger"><?php echo form_error('contact_person_number');?></span>
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
   'url':'<?=base_url()?>api/petrol_pumps/getpetrol_pumps',
   type: "POST",
   data:{'id':id},
   datatype:'json',
   success:function(response)
   {
     var id = response.data.id;
     var petrol_pumps_name = response.data.petrol_pumps_name;
     var address = response.data.address;
     var contact_person_name = response.data.contact_person_name;
     var contact_person_number = response.data.contact_person_number;

     $('#petrol_pumps_name').val(petrol_pumps_name);
     $('#address').val(address);
     $('#contact_person_name').val(contact_person_name);
     $('#contact_person_number').val(contact_person_number);

     $('#edit_id').val(id);

   }

 });

  $('#butsave').click(function(){
   var petrol_pumps_name = $('#petrol_pumps_name').val();

   var address = $('#address').val();
   var contact_person_name = $('#contact_person_name').val();
   var contact_person_number = $('#contact_person_number').val();
   var id = $('#edit_id').val();
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
    alert('Contact person Name Is Required');
    document.getElementById("contact_person_name").focus();
    return false;
  }
  if(contact_person_number==''){
    alert('Contact person Number Is Required');
    document.getElementById("contact_person_number").focus();
    return false;
  }
  $.ajax({
   'url':'<?=base_url()?>api/petrol_pumps/edit/'+id,
   type: "POST",
   data:$('#add_name').serialize(),
   datatype:'json',
   success:function(data)
   {
    alert('Record Updated Successfully.');
    window.location = "<?=base_url()?>petrol_pumps";
  }

});
});
});

</script>