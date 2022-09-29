<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Vehicle Owner Master</h3>
          </div>
          <div class="box-body">
            <!-- <form id="add_name" enctype="multipart/form-data"> -->
               <?php echo form_open_multipart('transporter/add'); ?>
              <div class="row">
                <div class="col-md-3">
                 <label for="owner_name" class="control-label">Owner Name<span class="text-danger">*</span></label>
                 <div class="form-group">
                  <input type="text" name="owner_name"  class="form-control " id="owner_name" required="required"/>
                </div>
              </div>

              <div class="col-md-3">
               <label for="contact_person_name" class="control-label">Contact person name <span class="text-danger">*</span></label>
               <div class="form-group">
                <input type="text" name="contact_person_name"  class="form-control " id="contact_person_name" />

              </div>
            </div>
            <div class="col-md-3">
             <label for="contact_person_number" class="control-label">Contact person number<span class="text-danger">*</span></label>
             <div class="form-group">
              <input type="text" name="contact_person_number" maxlength="10" minlength="10" class="form-control" id="contact_person_number" />

            </div>
          </div>
          <div class="col-md-3">
           <label for="address" class="control-label">Address<span class="text-danger">*</span></label>
           <div class="form-group">
             <textarea name="address" id="address" class="form-control"></textarea>
           </div>
         </div>
       </div>
       <div class="row">
        <div class="col-md-3">
         <label  class="control-label">PAN Number<span class="text-danger">*</span></label>
         <div class="form-group">
          <input type="text" name="pan_number" class="form-control " id="pan_number" />
        </div>
      </div>
      <div class="col-md-3">
       <label for="gst_number" class="control-label">GST Number <span class="text-danger"></span></label>
       <div class="form-group">
        <input type="text" name="gst_number"  class="form-control" id="gst_number" />

      </div>
    </div>
  </div>
  <div class="row">
 <div class="col-md-12">
  <h3>Bank Details</h3>
 </div>
</div>
  <div class="row">  
<div class="col-md-12">
  <div class="table-responsive">
    <table class="table table-bordered" id="dynamic_field1">
      <tr>
        <th>Account Holder Name</th>
        <th>Account Number</th>
        <th>IFSC Code</th>
        <th>Action</th>
      </tr>
      <tr>
       <td><input type="text" required class="form-control"  id="account_holder_name0" name="account_holder_name[]"></td>
       <td><input type="text" required class="form-control" id="account_number0" name="account_number[]" maxlength="25"></td>
       <td><input type="text" required class="form-control" id="ifsc0"  name="ifsc[]"></td>
       <td><button type="button" name="add1" id="add1" class="btn btn-success">Add More</button></td>
     </tr>
   </table>
 </div>
</div>
</div>
  <div class="row">
 <div class="col-md-12">
  <h3>Vehicle  Details</h3>
 </div>
</div>
<div class="row">
 <div class="col-md-12">
  <div class="table-responsive">
    <table class="table table-bordered" id="dynamic_field">
      <tr>
        <th>Vehicle No</th>
        <th>RC Book</th>
        <th>Insurance copy</th>
        <th>Action</th>
      </tr>

      <tr>

       <td><input type="text" required class="form-control"  id="vehicle_no0" name="vehicle_no[]"></td>
       <td><input type="file" required class="form-control" id="rcbook0" name="rcbook[]"></td>
       <td><input type="file" required class="form-control" id="insurance0"  name="insurance[]"></td>
       <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
     </tr>
   </table>
 </div>
</div>
</div>
<div class="col-md-12">
 <label for=" " class="control-label"> </label>
 <div class="form-group">
   <button type="submit" class="btn btn-success" >
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
    var owner_name=$('#owner_name').val();
    var address = $('#address').val();
    var contact_person_name = $('#contact_person_name').val();
    var contact_person_number = $('#contact_person_number').val();
     var pan_number = $('#pan_number').val();




    if(owner_name==''){
      alert('Owner Name Is Required');
      document.getElementById("owner_name").focus();
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
      alert('Contact person Number Is Required');
      document.getElementById("contact_person_number").focus();
      return false;
    }
      if(pan_number==''){
      alert('Pan Number Number Is Required');
      document.getElementById("pan_number").focus();
      return false;
    }

    $.ajax({
     'url':'<?=base_url()?>api/transporter/addnew',
     type: "POST",
     data:$('#add_name').serialize(),
     datatype:'json',
     success:function(data)

     {
      alert('Record Inserted Successfully.');
     window.location = "<?=base_url()?>transporter";
 }

});
  });

 });



  $(document).ready(function()
  {
    var postURL = "/addmore.php";
    var i=1;
    $('#add').click(function(){
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
       '<td><input type="text" required class="form-control" id="vehicle_no'+i+'" required name="vehicle_no[]"></td>'+
       '<td><input type="file" required class="form-control" id="rcbook'+i+'"  name="rcbook[]"></td><td><input type="file" id="insurance'+i+'" class="form-control" required name="insurance[]"></td>'+
       '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
     i++;
   });

  });
  $(document).on('click', '.btn_remove', function(){
   var button_id = $(this).attr("id");
   $('#row'+button_id+'').remove();
 });


  $(document).ready(function()
  {
    var postURL = "/addmore.php";
    var i=1;
    $('#add1').click(function(){
     $('#dynamic_field1').append('<tr id="row1'+i+'" class="dynamic-added">'+
       '<td><input type="text" required class="form-control" id="account_holder_name'+i+'" required name="account_holder_name[]"></td>'+
       '<td><input type="text" required class="form-control" id="account_number'+i+'"  name="account_number[]"></td><td><input type="text" id="ifsc'+i+'" class="form-control" required name="ifsc[]"></td>'+
       '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove1">X</button></td></tr>');
     i++;
   });

  });
  $(document).on('click', '.btn_remove1', function(){
   var button_id = $(this).attr("id");
   $('#row1'+button_id+'').remove();
 });

</script>