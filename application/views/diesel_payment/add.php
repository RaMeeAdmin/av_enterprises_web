<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Add New Diesel Payment</h3>
            </div>
            <div class="box-body">
            <?php echo form_open('diesel_payments/add'); ?>
            
             <div class="col-md-6">
               <label for="date" class="control-label"> <span class="text-danger"></span>Date</label>
                <div class="form-group">
                  <input type="date" name="date" value="<?php echo $this->input->post('date'); ?>" class="form-control " id="date" required="required" />
                   <span class="text-danger"><?php echo form_error('date');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="pump_id" class="control-label"> <span class="text-danger"></span>Pump Name</label>
                <div class="form-group">
                 <select class="form-control" name="pump_id" id="pump_id" required="required">
                    <?php foreach ($petrol_pumps as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['petrol_pumps_name'] ?></option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('pump_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="paid_to" class="control-label"> <span class="text-danger"></span>Paid_to</label>
                <div class="form-group">
                  <input type="text" name="paid_to" value="<?php echo $this->input->post('paid_to'); ?>" class="form-control " id="paid_to" required="required" />
                   <span class="text-danger"><?php echo form_error('paid_to');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="transporter_id" class="control-label"> <span class="text-danger"></span>Transpoter Name</label>
                <div class="form-group">
                 <select class="form-control" name="transporter_id" id="transporter_id" required="required">
                    <?php foreach ($transporter as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['transporter_name'] ?></option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('transporter_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="vehicle_id" class="control-label"> <span class="text-danger"></span>Vehicle Number</label>
                <div class="form-group">
                 <select class="form-control" name="vehicle_id" id="vehicle_id" required="required">
                    <?php foreach ($truck_number as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['vehicle_number'] ?></option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('vehicle_id');?></span>
               </div>
             </div>
              <div class="col-md-6">
               <label for="loading_id" class="control-label"> <span class="text-danger"></span>Loading Name</label>
                <div class="form-group">
                 <select class="form-control" name="loading_id" id="loading_id" required="required">
                    <?php foreach ($labour as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('loading_id');?></span>
               </div>
             </div>
              <div class="col-md-6">
               <label for="unloading_id" class="control-label"> <span class="text-danger"></span>Unloading Name</label>
                <div class="form-group">
                 <select class="form-control" name="unloading_id" id="unloading_id" required="required">
                    <?php foreach ($labour as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('unloading_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="quntity" class="control-label"> <span class="text-danger"></span>Quntity</label>
                <div class="form-group">
                  <input type="text" name="quntity" value="<?php echo $this->input->post('quntity'); ?>" class="form-control rant" id="quntity" required="required" />
                   <span class="text-danger"><?php echo form_error('quntity');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="rant" class="control-label"> <span class="text-danger" ></span>Rate</label>
                <div class="form-group">
                 <input type="text" name="rant" value="<?php echo $this->input->post('rant'); ?>" class="form-control rant" id="rant" required="required">
                   <span class="text-danger"><?php echo form_error('state');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="amount" class="control-label"> <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control" id="amount" readonly />
                   <span class="text-danger"><?php echo form_error('amount');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="remark" class="control-label"> <span class="text-danger"></span>Remark </label>
                <div class="form-group">
                  <input type="text" name="remarks" value="<?php echo $this->input->post('remark'); ?>" class="form-control " id="remark" required="required" />
                   <span class="text-danger"><?php echo form_error('remark');?></span>
               </div>
             </div>
            
            
             <div class="col-md-12">
               <label for=" " class="control-label"> </label>
                <div class="form-group">
                   <button type="submit" class="btn btn-success">  
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
   $(document).ready(function(){
   $(".rant").on("keyup",function(event) {
   var rant=$('#rant').val();
   var quntity=$('#quntity').val();
   var total= (quntity*rant).toFixed(2);
   $('#amount').val(total);
 });
    });
</script>