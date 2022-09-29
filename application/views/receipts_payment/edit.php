<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Receipts Payment Edit</h3>
            <?php echo form_open('receipts_payment/edit/'.$receipts_payment['id']); ?>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="id" class="control-label">  <span class="text-danger"></span>Id</label>
                <div class="form-group">
                  <input type="text" name="id" value="<?php echo ($this->input->post('id') ? $this->input->post('id') : $receipts_payment['id']); ?>" class="form-control" id="id" />
                    <span class="text-danger"><?php echo form_error('id');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="date" class="control-label">  <span class="text-danger"></span>Date</label>
                <div class="form-group">
                  <input type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $receipts_payment['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                   <span class="text-danger"><?php echo form_error('date');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="voucher_no" class="control-label">  <span class="text-danger"></span>Voucher no</label>
                <div class="form-group">
                  <input type="text" name="voucher_no" value="<?php echo ($this->input->post('voucher_no') ? $this->input->post('voucher_no') : $receipts_payment['voucher_no']); ?>" class="form-control" id="voucher_no" />
                    <span class="text-danger"><?php echo form_error('voucher_no');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="payment_type" class="control-label">  <span class="text-danger"></span>Payment type</label>
                <div class="form-group">
                  <input type="text" name="payment_type" value="<?php echo ($this->input->post('payment_type') ? $this->input->post('payment_type') : $receipts_payment['payment_type']); ?>" class="form-control" id="payment_type" />
                    <span class="text-danger"><?php echo form_error('payment_type');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="from_to_bank" class="control-label">  <span class="text-danger"></span>From to bank</label>
                <div class="form-group">
                  <input type="text" name="from_to_bank" value="<?php echo ($this->input->post('from_to_bank') ? $this->input->post('from_to_bank') : $receipts_payment['from_to_bank']); ?>" class="form-control" id="from_to_bank" />
                    <span class="text-danger"><?php echo form_error('from_to_bank');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="user_type" class="control-label">  <span class="text-danger"></span>User type</label>
                <div class="form-group">
                  <input type="text" name="user_type" value="<?php echo ($this->input->post('user_type') ? $this->input->post('user_type') : $receipts_payment['user_type']); ?>" class="form-control" id="user_type" />
                    <span class="text-danger"><?php echo form_error('user_type');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="customer_id" class="control-label">  <span class="text-danger"></span>Customer id</label>
                <div class="form-group">
                  <input type="text" name="customer_id" value="<?php echo ($this->input->post('customer_id') ? $this->input->post('customer_id') : $receipts_payment['customer_id']); ?>" class="form-control" id="customer_id" />
                    <span class="text-danger"><?php echo form_error('customer_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="supplier_id" class="control-label">  <span class="text-danger"></span>Supplier id</label>
                <div class="form-group">
                  <input type="text" name="supplier_id" value="<?php echo ($this->input->post('supplier_id') ? $this->input->post('supplier_id') : $receipts_payment['supplier_id']); ?>" class="form-control" id="supplier_id" />
                    <span class="text-danger"><?php echo form_error('supplier_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="vehicle_id" class="control-label">  <span class="text-danger"></span>Vehicle id</label>
                <div class="form-group">
                  <input type="text" name="vehicle_id" value="<?php echo ($this->input->post('vehicle_id') ? $this->input->post('vehicle_id') : $receipts_payment['vehicle_id']); ?>" class="form-control" id="vehicle_id" />
                    <span class="text-danger"><?php echo form_error('vehicle_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="supervisor_id" class="control-label">  <span class="text-danger"></span>Supervisor id</label>
                <div class="form-group">
                  <input type="text" name="supervisor_id" value="<?php echo ($this->input->post('supervisor_id') ? $this->input->post('supervisor_id') : $receipts_payment['supervisor_id']); ?>" class="form-control" id="supervisor_id" />
                    <span class="text-danger"><?php echo form_error('supervisor_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="pump_id" class="control-label">  <span class="text-danger"></span>Pump id</label>
                <div class="form-group">
                  <input type="text" name="pump_id" value="<?php echo ($this->input->post('pump_id') ? $this->input->post('pump_id') : $receipts_payment['pump_id']); ?>" class="form-control" id="pump_id" />
                    <span class="text-danger"><?php echo form_error('pump_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="remark" class="control-label">  <span class="text-danger"></span>Remark</label>
                <div class="form-group">
                  <input type="text" name="remark" value="<?php echo ($this->input->post('remark') ? $this->input->post('remark') : $receipts_payment['remark']); ?>" class="form-control" id="remark" />
                    <span class="text-danger"><?php echo form_error('remark');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="amount" class="control-label">  <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $receipts_payment['amount']); ?>" class="form-control" id="amount" />
                    <span class="text-danger"><?php echo form_error('amount');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="blty_or_dc_no" class="control-label">  <span class="text-danger"></span>Blty or dc no</label>
                <div class="form-group">
                  <input type="text" name="blty_or_dc_no" value="<?php echo ($this->input->post('blty_or_dc_no') ? $this->input->post('blty_or_dc_no') : $receipts_payment['blty_or_dc_no']); ?>" class="form-control" id="blty_or_dc_no" />
                    <span class="text-danger"><?php echo form_error('blty_or_dc_no');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="company_id" class="control-label">  <span class="text-danger"></span>Company id</label>
                <div class="form-group">
                  <input type="text" name="company_id" value="<?php echo ($this->input->post('company_id') ? $this->input->post('company_id') : $receipts_payment['company_id']); ?>" class="form-control" id="company_id" />
                    <span class="text-danger"><?php echo form_error('company_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="created_at" class="control-label">  <span class="text-danger"></span>Created at</label>
                <div class="form-group">
                  <input type="text" name="created_at" value="<?php echo ($this->input->post('created_at') ? $this->input->post('created_at') : $receipts_payment['created_at']); ?>" class="form-control" id="created_at" />
                    <span class="text-danger"><?php echo form_error('created_at');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="updated_at" class="control-label">  <span class="text-danger"></span>Updated at</label>
                <div class="form-group">
                  <input type="text" name="updated_at" value="<?php echo ($this->input->post('updated_at') ? $this->input->post('updated_at') : $receipts_payment['updated_at']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="updated_at" />
                   <span class="text-danger"><?php echo form_error('updated_at');?></span>
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
