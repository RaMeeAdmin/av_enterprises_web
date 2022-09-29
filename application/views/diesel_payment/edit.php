<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Diesel Payment Edit</h3>
            <?php echo form_open('diesel_payments/edit/'.$diesel_payments['id']); ?>
            <div class="box-body">
              <div class="row clearfix">
                <div class="col-md-6">
                 <label for="date" class="control-label">  <span class="text-danger"></span>Date</label>
                 <div class="form-group">
                  <input type="date" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('name') : $diesel_payments['date']); ?>" class="form-control" id="name" required="required" />
                  <span class="text-danger"><?php echo form_error('name');?></span>
                </div>
              </div> 
              <div class="col-md-6">
               <label for="pump_id" class="control-label">  <span class="text-danger"></span>Pump Name</label>
               <div class="form-group">
                <select class="form-control" name="pump_id" id="pump_id" required="required">
                    <?php foreach ($petrol_pumps as $key ) {?>
                     <option value="<?php echo $diesel_payments['pump_id']; ?>"<?php if($key['id']==$diesel_payments['pump_id']) echo 'selected="selected"'; ?>><?php echo $key['petrol_pumps_name']; ?></option>
                  <?php  } ?>
                    </select>
                <span class="text-danger"><?php echo form_error('phone');?></span>
              </div>
            </div> 
            <div class="col-md-6">
               <label for="paid_to" class="control-label"> <span class="text-danger"></span>Paid_to</label>
                <div class="form-group">
                  <input type="text" name="paid_to" value="<?php echo ($this->input->post('paid_to') ? $this->input->post('paid_to') : $diesel_payments['paid_to']); ?>" class="form-control " id="paid_to" required="required" />
                <span class="text-danger"><?php echo form_error('paid_to');?></span>
               </div>
          </div> 
          <div class="col-md-6">
               <label for="transporter_id" class="control-label"> <span class="text-danger"></span>Transpoter Name</label>
                <div class="form-group">
                 <select class="form-control" name="transporter_id" id="transporter_id" required="required">
                    <?php foreach ($transporter as $key ) {?>
                       
                       <option value="<?php echo $diesel_payments['transporter_id']; ?>"<?php if($key['id']==$diesel_payments['transporter_id']) echo 'selected="selected"'; ?>><?php echo $key['transporter_name']; ?></option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('transporter_id');?></span>
               </div>
             </div> 
        <div class="col-md-6">
         <label for="vehicle_id" class="control-label">  <span class="text-danger"></span>Vehicle Number</label>
         <div class="form-group">
          <select class="form-control" name="vehicle_id" id="vehicle_id" required="required">
                    <?php foreach ($truck_number as $key ) {?>
                       <option value="<?php echo $diesel_payments['vehicle_id']; ?>"<?php if($key['id']==$diesel_payments['vehicle_id']) echo 'selected="selected"'; ?>><?php echo $key['vehicle_number']; ?> </option>
                  <?php  } ?>
                    </select>
          <span class="text-danger"><?php echo form_error('state');?></span>
        </div>
      </div> 
     <div class="col-md-6">
               <label for="loading_id" class="control-label"> <span class="text-danger"></span>Loading Name</label>
                <div class="form-group">
                 <select class="form-control" name="loading_id" id="loading_id" required="required">
                    <?php foreach ($labour as $key ) {?>
                      <option value="<?php echo $diesel_payments['loading_id']; ?>"<?php if($key['id']==$diesel_payments['loading_id']) echo 'selected="selected"'; ?>><?php echo $key['name']; ?> </option>
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
                       <option value="<?php echo $diesel_payments['unloading_id']; ?>"<?php if($key['id']==$diesel_payments['unloading_id']) echo 'selected="selected"'; ?>><?php echo $key['name']; ?> </option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('unloading_id');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="quntity" class="control-label"> <span class="text-danger"></span>Quntity</label>
                <div class="form-group">
                  <input type="text" name="quntity"  value="<?php echo ($this->input->post('quntity') ? $this->input->post('quntity') : $diesel_payments['qty']); ?>" class="form-control rant" id="quntity" required="required" />
                   <span class="text-danger"><?php echo form_error('quntity');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="rant" class="control-label"> <span class="text-danger" ></span>Rate</label>
                <div class="form-group">
                 <input type="text" name="rant" value="<?php echo ($this->input->post('rant') ? $this->input->post('rant') : $diesel_payments['rate']); ?>" class="form-control rant" id="rant" required="required">
                   <span class="text-danger"><?php echo form_error('rate');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="amount" class="control-label"> <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount"  value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $diesel_payments['amount']); ?>" class="form-control" id="amount" readonly />
                   <span class="text-danger"><?php echo form_error('amount');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="remark" class="control-label"> <span class="text-danger"></span>Remark </label>
                <div class="form-group">
                  <input type="text" name="remarks"value="<?php echo ($this->input->post('remark') ? $this->input->post('remark') : $diesel_payments['remarks']); ?>" class="form-control " id="remark" required="required" />
                   <span class="text-danger"><?php echo form_error('remark');?></span>
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