<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Updated on View More</h3>
            <div class="box-body">
              <div class="row clearfix">
           <div class="col-md-6">
               <label for="id" class="control-label">  <span class="text-danger"></span>Id</label>
                <div class="form-group">
                  <input disabled type="text" name="id" value="<?php echo ($this->input->post('id') ? $this->input->post('id') : $bagasse_sale['id']); ?>" class="form-control" id="id" />
                    <span class="text-danger"><?php echo form_error('id');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="date" class="control-label">  <span class="text-danger"></span>Date</label>
                <div class="form-group">
                  <input disabled type="text" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $bagasse_sale['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                   <span class="text-danger"><?php echo form_error('date');?></span>
               </div>
             </div>
           <div class="col-md-6">
               <label for="supplier_id" class="control-label">  <span class="text-danger"></span>Supplier id</label>
                <div class="form-group">
                  <input disabled type="text" name="supplier_id" value="<?php echo ($this->input->post('supplier_id') ? $this->input->post('supplier_id') : $bagasse_sale['supplier_id']); ?>" class="form-control" id="supplier_id" />
                    <span class="text-danger"><?php echo form_error('supplier_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="sale_to" class="control-label">  <span class="text-danger"></span>Sale to</label>
                <div class="form-group">
                  <input disabled type="text" name="sale_to" value="<?php echo ($this->input->post('sale_to') ? $this->input->post('sale_to') : $bagasse_sale['sale_to']); ?>" class="form-control" id="sale_to" />
                    <span class="text-danger"><?php echo form_error('sale_to');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="vehicle_id" class="control-label">  <span class="text-danger"></span>Vehicle id</label>
                <div class="form-group">
                  <input disabled type="text" name="vehicle_id" value="<?php echo ($this->input->post('vehicle_id') ? $this->input->post('vehicle_id') : $bagasse_sale['vehicle_id']); ?>" class="form-control" id="vehicle_id" />
                    <span class="text-danger"><?php echo form_error('vehicle_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="loadin" class="control-label">  <span class="text-danger"></span>Loadin</label>
                <div class="form-group">
                  <input disabled type="text" name="loadin" value="<?php echo ($this->input->post('loadin') ? $this->input->post('loadin') : $bagasse_sale['loadin']); ?>" class="form-control" id="loadin" />
                    <span class="text-danger"><?php echo form_error('loadin');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="user" class="control-label">  <span class="text-danger"></span>User</label>
                <div class="form-group">
                  <input disabled type="text" name="user" value="<?php echo ($this->input->post('user') ? $this->input->post('user') : $bagasse_sale['user']); ?>" class="form-control" id="user" />
                    <span class="text-danger"><?php echo form_error('user');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="material_id" class="control-label">  <span class="text-danger"></span>Material id</label>
                <div class="form-group">
                  <input disabled type="text" name="material_id" value="<?php echo ($this->input->post('material_id') ? $this->input->post('material_id') : $bagasse_sale['material_id']); ?>" class="form-control" id="material_id" />
                    <span class="text-danger"><?php echo form_error('material_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="qty" class="control-label">  <span class="text-danger"></span>Qty</label>
                <div class="form-group">
                  <input disabled type="text" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $bagasse_sale['qty']); ?>" class="form-control" id="qty" />
                    <span class="text-danger"><?php echo form_error('qty');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="rate" class="control-label">  <span class="text-danger"></span>Rate</label>
                <div class="form-group">
                  <input disabled type="text" name="rate" value="<?php echo ($this->input->post('rate') ? $this->input->post('rate') : $bagasse_sale['rate']); ?>" class="form-control" id="rate" />
                    <span class="text-danger"><?php echo form_error('rate');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="amount" class="control-label">  <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input disabled type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $bagasse_sale['amount']); ?>" class="form-control" id="amount" />
                    <span class="text-danger"><?php echo form_error('amount');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="company_id" class="control-label">  <span class="text-danger"></span>Company id</label>
                <div class="form-group">
                  <input disabled type="text" name="company_id" value="<?php echo ($this->input->post('company_id') ? $this->input->post('company_id') : $bagasse_sale['company_id']); ?>" class="form-control" id="company_id" />
                    <span class="text-danger"><?php echo form_error('company_id');?></span>
               </div>
             </div> 
                        <div class="col-md-6">
               <label for="created_on" class="control-label">  <span class="text-danger"></span>Created on</label>
                <div class="form-group">
                  <input disabled type="text" name="created_on" value="<?php echo ($this->input->post('created_on') ? $this->input->post('created_on') : $bagasse_sale['created_on']); ?>" class="form-control" id="created_on" />
                    <span class="text-danger"><?php echo form_error('created_on');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="updated_on" class="control-label">  <span class="text-danger"></span>Updated on</label>
                <div class="form-group">
                  <input disabled type="text" name="updated_on" value="<?php echo ($this->input->post('updated_on') ? $this->input->post('updated_on') : $bagasse_sale['updated_on']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="updated_on" />
                   <span class="text-danger"><?php echo form_error('updated_on');?></span>
               </div>
             </div>
        </div>
      </div>
            <div class="box-footer">
            </div>
        </div>
    </div>
</div>
</div>
