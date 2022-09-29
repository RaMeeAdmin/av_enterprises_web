<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Bagasse Sale Edit</h3>
            <?php echo form_open('bagasse_sale/edit/'.$bagasse_sale['id']); ?>
            <div class="box-body">
              <div class="row clearfix">
                
               <div class="col-md-6">
                 <label for="date" class="control-label">  Date <span class="text-danger">*</span></label>
                 <div class="form-group">
                  <input type="date" name="date" value="<?php echo ($this->input->post('date') ? $this->input->post('date') : $bagasse_sale['date']); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                  <span class="text-danger"><?php echo form_error('date');?></span>
                </div>
              </div>
              <div class="col-md-6">
               <label for="supplier_id" class="control-label">  Supplier Name <span class="text-danger">*</span></label>
               <div class="form-group">
                <select class="form-control" name="supplier_id" id="supplier_id" required="required">
                  <option value='' >- Select -</option>
                  <?php foreach ($suppliers as $key ) {?>
                   <option value="<?php echo $bagasse_sale['supplier_id']; ?>"<?php if($key['id']==$bagasse_sale['supplier_id']) echo 'selected="selected"'; ?>><?php echo $key['company_name']; ?></option>
                 <?php  } ?>
               </select>
             </div>
           </div> 
           <div class="col-md-6">
             <label for="sale_to" class="control-label">  Sale To <span class="text-danger">*</span> </label>
             <div class="form-group">
              <input type="text" name="sale_to" value="<?php echo ($this->input->post('sale_to') ? $this->input->post('sale_to') : $bagasse_sale['sale_to']); ?>" class="form-control" id="sale_to" />
              
              <span class="text-danger"><?php echo form_error('sale_to');?></span>
            </div>
          </div> 
          <div class="col-md-6">
           <label for="vehicle_id" class="control-label">  Vehicle Number <span class="text-danger">*</span></label>
           <div class="form-group">
             <select class="form-control" name="vehicle_id" id="vehicle_id" required="required">
               <option value=''>- Select -</option>
               <?php foreach ($truck_number as $key ) {?>
                 
                <option value="<?php echo $bagasse_sale['vehicle_id']; ?>"<?php if($key['id']==$bagasse_sale['vehicle_id']) echo 'selected="selected"'; ?>><?php echo $key['vehicle_number']; ?></option>
              <?php  } ?>
            </select>
            <span class="text-danger"><?php echo form_error('vehicle_id');?></span>
          </div>
        </div> 
        <div class="col-md-6">
         <label for="loadin" class="control-label">  Loading <span class="text-danger">*</span></label>
         <div class="form-group">
          <select class="form-control" name="loadin" id="loadin" required="required">
           <option value=''>- Select -</option>
           <?php foreach ($labour as $key ) {?>
             
            <option value="<?php echo $bagasse_sale['loading']; ?>"<?php if($key['id']==$bagasse_sale['loading']) echo 'selected="selected"'; ?>><?php echo $key['name']; ?></option>
          <?php  } ?>
        </select>
        <span class="text-danger"><?php echo form_error('loadin');?></span>
      </div>
    </div> 
    <div class="col-md-6">
     <label for="user" class="control-label">  <span class="text-danger"></span>User</label>
     <div class="form-group">
      <input type="text" name="user" value="<?php echo ($this->input->post('user') ? $this->input->post('user') : $bagasse_sale['user']); ?>" class="form-control" id="user" />
      <span class="text-danger"><?php echo form_error('user');?></span>
    </div>
  </div> 
  <div class="col-md-6">
   <label for="material_id" class="control-label">  <span class="text-danger"></span>Material Name</label>
   <div class="form-group">
    <select class="form-control" name="material_id" id="material_id" required="required">
     <option value=''>- Select -</option>
     <?php foreach ($material as $key ) {?>
       
      <option value="<?php echo $bagasse_sale['material_id']; ?>"<?php if($key['id']==$bagasse_sale['material_id']) echo 'selected="selected"'; ?>><?php echo $key['name']; ?></option>
    <?php  } ?>
  </select>
  <span class="text-danger"><?php echo form_error('material_id');?></span>
</div>
</div> 
<div class="col-md-6">
 <label for="qty" class="control-label">  <span class="text-danger"></span>Qty</label>
 <div class="form-group">
  <input type="text" name="qty" value="<?php echo ($this->input->post('qty') ? $this->input->post('qty') : $bagasse_sale['qty']); ?>" class="form-control rant" id="qty" />
  <span class="text-danger"><?php echo form_error('qty');?></span>
</div>
</div> 
<div class="col-md-6">
 <label for="rate" class="control-label">  <span class="text-danger"></span>Rate</label>
 <div class="form-group">
  <input type="text" name="rate" value="<?php echo ($this->input->post('rate') ? $this->input->post('rate') : $bagasse_sale['rate']); ?>" class="form-control rant" id="rate" />
  <span class="text-danger"><?php echo form_error('rate');?></span>
</div>
</div> 
<div class="col-md-6">
 <label for="amount" class="control-label">  <span class="text-danger"></span>Amount</label>
 <div class="form-group">
  <input type="text" name="amount" value="<?php echo ($this->input->post('amount') ? $this->input->post('amount') : $bagasse_sale['amount']); ?>" class="form-control" id="amount" />
  <span class="text-danger"><?php echo form_error('amount');?></span>
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
     var qty=$('#qty').val();
     var rate=$('#rate').val();
     var total= (rate*qty).toFixed(2);
     $('#amount').val(total);
   });
 });
</script>
