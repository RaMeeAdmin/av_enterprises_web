<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Updated at View More</h3>
            <div class="box-body">
              <div class="row clearfix">
          
             <div class="col-md-6">
               <label for="date" class="control-label">  <span class="text-danger"></span>Date</label>
                <div class="form-group">
                  <input disabled type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $receipts_payment['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                   
               </div>
             </div>
           <div class="col-md-6">
               <label for="voucher_no" class="control-label">  <span class="text-danger"></span>Voucher no</label>
                <div class="form-group">
                  <input disabled type="text" name="voucher_no" value="<?php echo ($this->input->post('voucher_no') ? $this->input->post('voucher_no') : $receipts_payment['voucher_no']); ?>" class="form-control" id="voucher_no" />
                    
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="payment_type" class="control-label">  <span class="text-danger"></span>Payment type</label>
                <div class="form-group">
                  <input disabled type="text" name="payment_type" value="<?php echo ($this->input->post('payment_type') ? $this->input->post('payment_type') : $receipts_payment['payment_type']); ?>" class="form-control" id="payment_type" />
                   
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="bank_id" class="control-label">  <span class="text-danger"></span>From to bank</label>
                <div class="form-group">
                  <input disabled type="text" name="bank_id" value="<?php echo ($this->input->post('bank_id') ? $this->input->post('bank_id') : $receipts_payment['bank_id']); ?>" class="form-control" id="bank_id" />
                   
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="user_type" class="control-label">  <span class="text-danger"></span>User type</label>
                <div class="form-group">
                  <input disabled type="text" name="user_type" value="<?php echo ($this->input->post('user_type') ? $this->input->post('user_type') : $receipts_payment['user_type']); ?>" class="form-control" id="user_type" />
                   
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="customer_id" class="control-label">  <span class="text-danger"></span>Customer id</label>
                <div class="form-group">
                  <input disabled type="text" name="customer_id" value="<?php echo ($this->input->post('customer_id') ? $this->input->post('customer_id') : $receipts_payment['customer_id']); ?>" class="form-control" id="customer_id" />
                  
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="supplier_id" class="control-label">  <span class="text-danger"></span>Supplier id</label>
                <div class="form-group">
                  <input disabled type="text" name="supplier_id" value="<?php echo ($this->input->post('supplier_id') ? $this->input->post('supplier_id') : $receipts_payment['supplier_id']); ?>" class="form-control" id="supplier_id" />
                  
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="vehicle_id" class="control-label">  <span class="text-danger"></span>Vehicle id</label>
                <div class="form-group">
                  <input disabled type="text" name="vehicle_id" value="<?php echo ($this->input->post('vehicle_id') ? $this->input->post('vehicle_id') : $receipts_payment['vehicle_id']); ?>" class="form-control" id="vehicle_id" />
                 
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="supervisor_id" class="control-label">  <span class="text-danger"></span>Supervisor id</label>
                <div class="form-group">
                  <input disabled type="text" name="supervisor_id" value="<?php echo ($this->input->post('supervisor_id') ? $this->input->post('supervisor_id') : $receipts_payment['supervisor_id']); ?>" class="form-control" id="supervisor_id" />
                    
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="pump_id" class="control-label">  <span class="text-danger"></span>Pump id</label>
                <div class="form-group">
                  <input disabled type="text" name="pump_id" value="<?php echo ($this->input->post('pump_id') ? $this->input->post('pump_id') : $receipts_payment['pump_id']); ?>" class="form-control" id="pump_id" />
                   
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="remark" class="control-label">  <span class="text-danger"></span>Remark</label>
                <div class="form-group">
                  <input disabled type="text" name="remark" value="<?php echo ($this->input->post('remark') ? $this->input->post('remark') : $receipts_payment['remark']); ?>" class="form-control" id="remark" />
                    
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="amount" class="control-label">  <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input disabled type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $receipts_payment['amount']); ?>" class="form-control" id="amount" />
                   
               </div>
             </div> 
                     <!--    <div class="col-md-6">
               <label for="blty_or_dc_no" class="control-label">  <span class="text-danger"></span>Blty or dc no</label>
                <div class="form-group">
                  <input disabled type="text" name="blty_or_dc_no" value="<?php echo ($this->input->post('blty_or_dc_no') ? $this->input->post('blty_or_dc_no') : $receipts_payment['blty_or_dc_no']); ?>" class="form-control" id="blty_or_dc_no" />
                    <span class="text-danger"><?php echo form_error('blty_or_dc_no');?></span>
               </div>
             </div>  -->
                       
        </div>
      </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>
</div>

</section>
</div>

<?php $this->load->view('section/footer'); ?>
