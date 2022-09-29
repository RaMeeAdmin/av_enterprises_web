<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Add New Bagasse Sales</h3>
          </div>
          <div class="box-body">
            <?php echo form_open('bagasse_sale/add'); ?>

            <div class="col-md-6">
             <label for="date" class="control-label"> Date <span class="text-danger">*</span></label>
             <div class="form-group">
              <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="date" />
              <span class="text-danger"><?php echo form_error('date');?></span>
            </div>
          </div>
          <div class="col-md-6">
           <label for="supplier_id" class="control-label">Supplier Name <span class="text-danger">*</span></label>
           <div class="form-group">
            
             <select class="form-control" name="supplier_id" id="supplier_id" required="required">
               <option value='' >- Select -</option>
               <?php foreach ($suppliers as $key ) {?>
                 <option value="<?php echo $key['id'] ?>"><?php echo $key['company_name'] ?></option>
               <?php  } ?>
             </select>
           </div>
         </div>
         <div class="col-md-6">
           <label for="sale_to" class="control-label"> Sale To <span class="text-danger">*</span></label>
           <div class="form-group">
             <input type="text" name="sale_to" required="" value="<?php echo $this->input->post('sale_to'); ?>"  class="form-control " id="sale_to" />

              <div class="col-md-6">
               <label for="date" class="control-label"> <span class="text-danger"></span>Date</label>
                <div class="form-group">
                  <input type="date" name="date" value="<?php echo $this->input->post('date'); ?>" class="has-datepicker form-control" data-date-format='YYYY-MM-DD' id="date" />
                   <span class="text-danger"><?php echo form_error('date'); ?></span>
               </div>
             </div>

             <div class="col-md-6">
               <label for="supplier_id" class="control-label"> <span class="text-danger"></span>Supplier Name</label>
                <div class="form-group">
                   <select class="form-control" name="supplier_id" id="supplier_id" required="required">
                    <?php foreach ($suppliers as $key) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['company_name'] ?></option>
                  <?php }?>
                    </select>
               </div>
             </div>
             <div class="col-md-6">
               <label for="sale_to" class="control-label"> <span class="text-danger"></span>Sale To</label>
                <div class="form-group">
                  <select class="form-control" name="sale_to" id="sale_to" required="required">
                    <?php foreach ($suppliers as $key) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['company_name'] ?></option>
                  <?php }?>
                    </select>
               </div>
             </div>
             <div class="col-md-6">
               <label for="vehicle_id" class="control-label"> <span class="text-danger"></span>Vehicle Name</label>
                <div class="form-group">
                  <select class="form-control" name="vehicle_id" id="vehicle_id" required="required">
                    <?php foreach ($truck_number as $key) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['vehicle_number'] ?></option>
                  <?php }?>
                    </select>
               </div>
             </div>
             <div class="col-md-6">
               <label for="loadin" class="control-label"> <span class="text-danger"></span>Loading</label>
                <div class="form-group">
                  <input type="text" name="loadin" value="<?php echo $this->input->post('loadin'); ?>" class="form-control " id="loadin" />
                   <span class="text-danger"><?php echo form_error('loadin'); ?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="user" class="control-label"> <span class="text-danger"></span>User</label>
                <div class="form-group">
                  <input type="text" name="user" value="<?php echo $this->input->post('user'); ?>" class="form-control " id="user" />
                   <span class="text-danger"><?php echo form_error('user'); ?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="material_id" class="control-label"> <span class="text-danger"></span>Material Name</label>
                <div class="form-group">
                 <select class="form-control" name="material_id" id="material_id" required="required">
                    <?php foreach ($material as $key) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                  <?php }?>
                    </select>
               </div>
             </div>
             <div class="col-md-6">
               <label for="qty" class="control-label"> <span class="text-danger"></span>Qty</label>
                <div class="form-group">
                  <input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control " id="qty" />
                   <span class="text-danger"><?php echo form_error('qty'); ?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="rate" class="control-label"> <span class="text-danger"></span>Rate</label>
                <div class="form-group">
                  <input type="text" name="rate" value="<?php echo $this->input->post('rate'); ?>" class="form-control " id="rate" />
                   <span class="text-danger"><?php echo form_error('rate'); ?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="amount" class="control-label"> <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control " id="amount" />
                   <span class="text-danger"><?php echo form_error('amount'); ?></span>
               </div>
             </div>

             <div class="col-md-6">
               <label for="" class="control-label"> </label>
                <div class="form-group">
                   <button type="submit" class="btn btn-success">
                   <i class="fa fa-check"></i> Save
                    </button>
               </div>
             </div>


           </div>
         </div>
         <div class="col-md-6">
           <label for="vehicle_id" class="control-label"> Vehicle Name <span class="text-danger">*</span></label>
           <div class="form-group">
            <select class="form-control" name="vehicle_id" id="vehicle_id" required="required">
             <option value=''>- Select -</option>
             <?php foreach ($truck_number as $key ) {?>
               <option value="<?php echo $key['id'] ?>"><?php echo $key['vehicle_number'] ?></option>
             <?php  } ?>
           </select>
         </div>
       </div>
       <div class="col-md-6">
         <label for="loadin" class="control-label"> Loading <span class="text-danger">*</span></label>
         <div class="form-group">
           <select class="form-control" name="loadin" id="loadin" required="required">
            <option value=''>- Select -</option>
            <?php foreach ($labour as $key ) {?>
             <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
           <?php  } ?>
         </select>
       </div>
     </div>
     <div class="col-md-6">
       <label for="user" class="control-label"> User</label>
       <div class="form-group">
        <input type="text" name="user" value="<?php echo $this->input->post('user'); ?>" class="form-control " id="user" />
        <span class="text-danger"><?php echo form_error('user');?></span>
      </div>
    </div>
    <div class="col-md-6">
     <label for="material_id" class="control-label"> Material Name <span class="text-danger">*</span></label>
     <div class="form-group">
       <select class="form-control" name="material_id" id="material_id" required="required">
         <option value='' >- Select -</option>
         <?php foreach ($material as $key ) {?>
           <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
         <?php  } ?>
       </select>
     </div>
   </div>
   <div class="col-md-6">
     <label for="qty" class="control-label"> Qty <span class="text-danger">*</span></label>
     <div class="form-group">
      <input type="text" name="qty" value="<?php echo $this->input->post('qty'); ?>" class="form-control rant" required="required" id="qty" />
      <span class="text-danger"><?php echo form_error('qty');?></span>
    </div>
  </div>
  <div class="col-md-6">
   <label for="rate" class="control-label"> Rate <span class="text-danger">*</span></label>
   <div class="form-group">
    <input type="text" name="rate" required="" value="<?php echo $this->input->post('rate'); ?>" class="form-control rant" id="rate" />
    <span class="text-danger"><?php echo form_error('rate');?></span>
  </div>
</div>
<div class="col-md-6">
 <label for="amount" class="control-label"> Amount <span class="text-danger">*</span></label>
 <div class="form-group">
  <input type="text" name="amount" readonly="readonly" value="<?php echo $this->input->post('amount'); ?>"   class="form-control" id="amount" />
  <span class="text-danger"><?php echo form_error('amount');?></span>
</div>
</div>                        

<div class="col-md-6">
 <label for="" class="control-label"> </label>
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


