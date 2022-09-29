<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Locations Edit</h3>
            <?php echo form_open('locations/edit/'.$locations['id']); ?>
            <div class="box-body">
              <div class="row clearfix">
              <div class="col-md-6">
               <label for="name" class="control-label">  <span class="text-danger"></span>Name</label>
               <div class="form-group">
                <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $locations['name']); ?>" class="form-control" id="name" required="required" />
                <span class="text-danger"><?php echo form_error('name');?></span>
              </div>
            </div> 
            <div class="col-md-6">
             <label for="address" class="control-label">  <span class="text-danger"></span>Address</label>
             <div class="form-group">
              <input type="text" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $locations['address']); ?>" class="form-control" id="address" required="required" />
              <span class="text-danger"><?php echo form_error('address');?></span>
            </div>
          </div> 
          <div class="col-md-6">
           <label for="contact_person_name" class="control-label">  <span class="text-danger"></span>Contact person name</label>
           <div class="form-group">
            <input type="text" name="contact_person_name" value="<?php echo ($this->input->post('contact_person_name') ? $this->input->post('contact_person_name') : $locations['contact_person_name']); ?>" class="form-control" id="contact_person_name" required="required" />
            <span class="text-danger"><?php echo form_error('contact_person_name');?></span>
          </div>
        </div> 
        <div class="col-md-6">
         <label for="contact_number" class="control-label">  <span class="text-danger"></span>Contact number</label>
         <div class="form-group">
          <input type="text" name="contact_number" value="<?php echo ($this->input->post('contact_number') ? $this->input->post('contact_number') : $locations['contact_number']); ?>" class="form-control" id="contact_number" required="required" />
          <span class="text-danger"><?php echo form_error('contact_number');?></span>
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
</section>
</div>
<?php $this->load->view('section/footer'); ?>