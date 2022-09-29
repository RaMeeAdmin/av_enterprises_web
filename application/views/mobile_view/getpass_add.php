<?php $this->load->view('section/mobile_header');?>
<style>
  ul.ui-autocomplete {
         box-sizing: border-box;
        -moz-border-radius: 15px;
        border-radius: 15px;
    }
</style>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Add New Get Pass</h3>
          </div>
          <div class="box-body">
            <form id="add_name">
              <div class="col-md-6">
               <label for="date" class="control-label"> <span class="text-danger"></span>Date</label>

               <div class="form-group">
                <input required="required" type="date" name="date" value="<?php echo $this->input->post('date'); ?>"  class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
              </div>
            </div>
            <div class="col-md-6">
             <label for="gate_pass_for" class="control-label"> <span class="text-danger"></span>Gate Pass For</label>
             <div class="form-group">
              <input type="text" name="gate_pass_for" value="<?php echo $this->input->post('gate_pass_for'); ?>" class="form-control " id="gate_pass_for" required="required" />
            </div>
          </div>
          <div class="col-md-6">
           <label for="gate_pass_given_to" class="control-label"> <span class="text-danger"></span>Gate Pass Given To</label>
           <div class="form-group">
            <input type="text" name="gate_pass_given_to" value="<?php echo $this->input->post('gate_pass_given_to'); ?>" class="form-control " id="gate_pass_given_to" required="required" />
          </div>

        </div>
        <div class="col-md-6">
         <label for="place" class="control-label"> <span class="text-danger"></span>Place</label>
         <div class="form-group">
          <input type="text" name="place" value="<?php echo $this->input->post('place'); ?>" class="form-control " id="place" required="required" />
        </div>
      </div>
      <div class="col-md-6">
       <label for="truck_number" class="control-label"> <span class="text-danger"></span>Truck Number</label>


      <select name="truck_number" id="truck_number" class="form-control">
<?php foreach ($vehicle as $row) {?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['vehicle_number'] ?></option>
      <?php }?>
      </select>
    </div>
    <div class="col-md-6">
     <label for="gat_pass_create_with_name" class="control-label"> <span class="text-danger"></span>Gat Pass Create With Name</label>
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
<?php $this->load->view('section/mobile_footer');?>

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
      alert('Record Inserted Successfully.');
      //window.location = "<?=base_url()?>ws_getpass_list";
      window.location.reload()

    }
  });
  });
 });

</script>
