<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<style>
  ul.ui-autocomplete {
         box-sizing: border-box;
        -moz-border-radius: 15px;
        border-radius: 15px;
    }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Add New Gate Pass</h3>
          </div>
          <div class="box-body">
            <form id="add_name">
              <div class="col-md-3">
               <label for="date" class="control-label"> <span class="text-danger"></span>तारीख</label>
               <div class="form-group">
                <input required="required" type="date" name="date" value="<?php echo date('Y-m-d'); ?>"  class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
              </div>
            </div>
            <div class="col-md-6">
             <label for="gate_pass_for" class="control-label"> <span class="text-danger"></span>प्रति</label>
             <div class="form-group">

           
                <select class="form-control" name="gate_pass_for" id="gate_pass_for">
                  <option value="">Select</option>
                  <?php foreach($supplier as $row){?>

                  <option value="<?php echo $row['id'] ?>"><?php echo $row['company_name'] ?></option>

                  <?php } ?>
                </select>



            </div>
          </div>
          <div class="col-md-6">
           <label for="gate_pass_given_to" class="control-label"> <span class="text-danger"></span>महाशय</label>
           <div class="form-group">
            <input type="text" name="gate_pass_given_to" value="<?php echo $this->input->post('gate_pass_given_to'); ?>" class="form-control " id="gate_pass_given_to" required="required" />
          </div>

        </div>
        <div class="col-md-6">
         <label for="place" class="control-label"> <span class="text-danger"></span>ठिकाण</label>
         <div class="form-group">
          <input type="text" name="place"  class="form-control " id="place" required="required">
        </div>
      </div>
      <div class="col-md-3">
       <label for="truck_number" class="control-label"> <span class="text-danger"></span>ट्रक नंबर</label>
      <select name="truck_number" id="truck_number" class="form-control">
        <option value="">Select</option>
<?php foreach ($vehicle as $row) {?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['vehicle_number'] ?></option>
      <?php }?>
      </select>
    </div>
    <div class="col-md-6">
     <label for="gat_pass_create_with_name" class="control-label"> <span class="text-danger"></span>गेटपास या नावाने करणे</label>
     <div class="form-group">
      <input type="text" name="gat_pass_create_with_name" value="<?php echo $this->input->post('gat_pass_create_with_name'); ?>" class="form-control" required="required" id="gat_pass_create_with_name" />
    </div>
  </div>
  <div class="col-md-6">
   <label for=" " class="control-label"> </label>
   <div class="form-group">
     <button type="button" id="submit" class="btn btn-success">
       <i class="fa fa-check"></i> Save
     </button>
   </div>
 </div>
</form>
</div>
</div>
</div>
</div>
</div>
</section>
<?php $this->load->view('section/footer');?>

<script type="text/javascript">
  $(document).ready(function()
  {
   $('#submit').click(function()
   {
    $.ajax({
     'url':'<?=base_url()?>api/Gate_entry_pass/add',
     type: "POST",
     data:$('#add_name').serialize(),
     datatype:'json',
     success:function(data)
     {
      alert('Gate Entry Pass Inserted Successfully.');
      window.location = "<?=base_url()?>gate_entry_pass";

    }
  });
  });
 });

  $("#gate_pass_for").on('change',function() {

  var id = $(this).val();
  $.ajax({
   url: "<?=base_url()?>api/transport_details/get_location",
   type: 'POST',
   data: {id : id},
     datatype:'json',
   success: function(response) {
   
     $("#place").val(response.data.address);
 

  }
});
});

</script>
