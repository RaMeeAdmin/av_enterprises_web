<?php $this->load->view('section/mobile_header');?>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Gate Entry Pass Edit</h3>
          </div>
          <div class="box-body">
              <div class="row clearfix">
            <?php echo form_open('web_view/getpass_edit/'.$gate_entry_pass['id']); ?>
                         
              <div class="col-md-6">
               <label for="date" class="control-label">  <span class="text-danger"></span>Date</label>
               <div class="form-group">
                <input type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $gate_entry_pass['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                <span class="text-danger"><?php echo form_error('date');?></span>
              </div>
            </div>
            <div class="col-md-6">
             <label for="gate_pass_for" class="control-label">  <span class="text-danger"></span>Gate Pass For</label>
             <div class="form-group">
              <input type="text" name="gate_pass_for" value="<?php echo ($this->input->post('gate_pass_for') ? $this->input->post('gate_pass_for') : $gate_entry_pass['gate_pass_for']); ?>" class="form-control" id="gate_pass_for" />
              <span class="text-danger"><?php echo form_error('gate_pass_for');?></span>
            </div>
          </div> 
          <div class="col-md-6">
            <label for="gate_pass_given_to" class="control-label">  <span class="text-danger"></span>Gate Pass Given To</label>
           <div class="form-group">
            <input type="text" name="gate_pass_given_to" value="<?php echo ($this->input->post('gate_pass_given_to') ? $this->input->post('gate_pass_given_to') : $gate_entry_pass['gate_pass_given_to']); ?>" class="form-control" id="gate_pass_given_to" />
            <span class="text-danger"><?php echo form_error('gate_pass_given_to');?></span>
          </div>
        </div> 
        <div class="col-md-6">
         <label for="place" class="control-label">  <span class="text-danger"></span>Place</label>
         <div class="form-group">
          <input type="text" name="place" value="<?php echo ($this->input->post('place') ? $this->input->post('place') : $gate_entry_pass['place']); ?>" class="form-control" id="place" />
          <span class="text-danger"><?php echo form_error('place');?></span>
        </div>
      </div> 
      <div class="col-md-6">
       <label for="truck_number" class="control-label">  <span class="text-danger"></span>Truck Number</label>
       <div class="form-group">
      <select class="form-control" name="truck_number" id="truck_number" required="required">
                    <?php foreach ($truck_number as $key ) {?>
                     <option value="<?php echo $key['id']; ?>"<?php if($key['id']==$gate_entry_pass['truck_number_id']) echo 'selected="selected"'; ?>><?php echo $key['vehicle_number']; ?></option>
                  <?php  } ?>
                    </select>
          <span class="text-danger"><?php echo form_error('state');?></span>
       
      </div>
    </div> 
    <div class="col-md-6">
     <label for="gat_pass_create_with_name" class="control-label">  <span class="text-danger"></span>Gat Pass Create With Name</label>
     <div class="form-group">
      <input type="text" name="gat_pass_create_with_name" value="<?php echo ($this->input->post('gat_pass_create_with_name') ? $this->input->post('gat_pass_create_with_name') : $gate_entry_pass['gat_pass_create_with_name']); ?>" class="form-control" id="gat_pass_create_with_name" />
      <span class="text-danger"><?php echo form_error('gat_pass_create_with_name');?></span>
    </div>
  </div> 
</div>
</div>
<div class="box-footer">
  <button type="submit" class="btn btn-success">
    <i class="fa fa-check"></i> Save
  </button>
</div>
<?php echo form_close(); ?>
</div>
</div>
</div>
</div>
</div>
</section>
<?php $this->load->view('section/mobile_footer');?>