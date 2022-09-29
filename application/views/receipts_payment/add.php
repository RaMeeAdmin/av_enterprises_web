<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<style type="text/css">
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}</style>

<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Vendor Payment</h3>
            </div>
            <div class="box-body">
            <?php echo form_open('receipts_payment/add'); ?>
            
             <div class="col-md-6">
               <label for="date" class="control-label"> <span class="text-danger"></span>Date</label>
                <div class="form-group">
                  <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control"  id="date" />
                   <span class="text-danger"><?php echo form_error('date');?></span>
               </div>
             </div>
              <div class="col-md-6">
               <label for="payment_type" class="control-label"> <span class="text-danger"></span>Payment type</label>
                <div class="form-group">
                 <!--  <input type="text" name="payment_type" value="<?php echo $this->input->post('payment_type'); ?>" class="form-control " id="payment_type" /> -->
                 <select class="form-control" name="payment_type" id="payment_type" required="required">
                   <option value='' >- Select -</option>
                   <option value='Disesl Card Pay'>Disesl Card Pay</option>
                   <option value='Payment Cash'>Payment Cash</option>
                   <option value='Payment NEFT/RTGS/Online'>Payment NEFT/RTGS/Online</option>
                   <option value='Receipt Cash'>Receipt Cash</option>
                   <option value='Receipt NEFT/RTGS/Online'>Receipt NEFT/RTGS/Online</option>
                
                    </select>
                   <span class="text-danger"><?php echo form_error('payment_type');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="from_to_bank" class="control-label"> <span class="text-danger"></span>From to bank</label>
                <div class="form-group">
                 <select class="form-control" name="from_to_bank" id="from_to_bank" required="required">
                  <option value='' >- Select -</option>
                    <?php foreach ($bank as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                  <?php  } ?>
                    </select>
                   <span class="text-danger"><?php echo form_error('from_to_bank');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="voucher_no" class="control-label"> <span class="text-danger"></span>Voucher no</label>
                <div class="form-group">
                  <input type="text" name="voucher_no" readonly="" value="<?php $i = $receipts_payment['id'];$id = $i + 1;echo 'RP00' . $id;  ?>" class="form-control "  id="voucher_no"  />
                   <span class="text-danger"><?php echo form_error('voucher_no');?></span>
               </div>
             </div>
            
             
             <div class="col-md-6">
               <label for="user_type" class="control-label"> <span class="text-danger"></span>User type</label>
                <div class="form-group">
                  <input type="radio" onchange="show(this.value)" name="user_type" value="Customers" id="user_type" checked="checked" />
                  <label for="user_type" class="control-label">  Customers  </label>&nbsp;
                   <input type="radio" onchange="show2()" name="user_type" value="Suppliers"  id="user_type" />
                   <label for="user_type" class="control-label"> Suppliers </label>&nbsp;
                    <input type="radio" name="user_type" onchange="show3()" value="Vehicle No" id="user_type" />
                    <label for="user_type" class="control-label"> Vehicle No</label>&nbsp;
                   <input type="radio" name="user_type" onchange="show4()"  value="Supervisor" id="user_type" />
                     <label for="user_type" class="control-label"> Supervisor </label>
                     &nbsp;
                      <input type="radio" name="user_type" onchange="show5()" value=" Pump"  id="user_type" />&nbsp;
                      <label for="user_type" class="control-label"> Pump</label>
                  
               </div>
             </div>
          
          <div class="col-md-6">
               <label for="customer_id" class="control-label"> <span class="text-danger"></span>Customer / Supplier / Pump / Vehicle / Supervisor</label>
                <div class="form-group">
                  <div id="sh1">
                    <select class="form-control" name="customer_id" id="customer_id"  >
                     <option value='' >- Select Customer -</option>
                    <?php foreach ($customer as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                  <?php  } ?>
                    </select>
                  </div>
      
                <div id="sh2" style="display:none;"> 
                  <select class="form-control" name="supplier_id" id="supplier_id" >
                     <option value='' >- Select Supplier -</option>
                    <?php foreach ($supplier as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['company_name'] ?></option>
                  <?php  } ?>
                    </select>
                  </div>
                <div id="sh3" style="display:none;"> 
                  <select class="form-control" name="truck_id" id="truck_id">
                     <option value='' >- Select Vehicle -</option>
                    <?php foreach ($truck_number as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['vehicle_number'] ?></option>
                  <?php  } ?>
                    </select></div>
                <div id="sh4" style="display:none;">
                 <select class="form-control" name="superviser_id" id="superviser_id" >
                     <option value='' >- Select Superviser -</option>
                    <?php foreach ($superviser as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                  <?php  } ?>
                    </select>

               </div>
                <div id="sh5" style="display:none;"> 
                  <select class="form-control" name="pumps_id" id="pumps_id" >
                     <option value='' >- Select Petrol Pumps -</option>
                    <?php foreach ($petrol_pumps as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['petrol_pumps_name'] ?></option>
                  <?php  } ?>
                    </select></div>
               </div>
             </div>
             <div class="col-md-6">
               <label for="amount" class="control-label"> <span class="text-danger"></span>Outstanding</label>
                <div class="form-group" id="outstanding2" style="display:block;">
                  <input type="text" name="outstanding" readonly="readonly" value="<?php echo $this->input->post('amount'); ?>" class="form-control " id="outstanding" />
                   <span class="text-danger"><?php echo form_error('amount');?></span>
               </div>
               <div class="form-group" id="outstanding1" style="display:none;">
                <!-- <label>Total Amount= <input style="border:none;font-weight:bold; "  id="total"> </label> -->
                <table style="width:100%">
                  <tr>
                  <th style="text-align: center;">DC No</th>
                  <th style="text-align: center;">Date</th>
                  <th style="text-align: center;">O/s</th>
                  <th style="text-align: center;">Paid</th>
                  </tr>
                   <tbody id="dynamic_field">
                 
                  </tbody>
                </table>
               </div>
             </div>
            

             <div class="col-md-6">
               <label for="amount" class="control-label"> <span class="text-danger"></span>Amount</label>
                <div class="form-group">
                  <input type="text" name="amount" value="<?php echo $this->input->post('amount'); ?>" class="form-control " id="amount" />
                   <span class="text-danger"><?php echo form_error('amount');?></span>
               </div>
             </div>
              <div class="col-md-6">
               <label for="remark" class="control-label"> <span class="text-danger"></span>Remark</label>
                <div class="form-group">
                  <input type="text" name="remark" value="<?php echo $this->input->post('remark'); ?>" class="form-control " id="remark" />
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

$(document).on("change", "input[name='paid']", function () {
 // alert('hii');
  var input = document.getElementsByName("paid");
  var total = 0;
   for (var i = 0; i < input.length; i++)
   {
      if (input[i].checked)
      {
         total += parseFloat(input[i].value);
      }
   }
   document.getElementById("amount").value =  total.toFixed(2);
  
});

 
 

$("#customer_id").on('change',function() {
  document.getElementById('outstanding2').style.display = 'block';
  document.getElementById('outstanding1').style.display = 'none';
  var id = $(this).val();
$("#outstanding").val('0.00');
  $.ajax({
   url: "<?=base_url()?>api/receipts_payment/get_customer_outstanding",
   type: 'POST',
   data: {id : id},
     datatype:'json',
   success: function(response) {
     $("#outstanding").val(response.data);
  }
});
});
$("#supplier_id").on('change',function() {
   document.getElementById('outstanding2').style.display = 'block';
  document.getElementById('outstanding1').style.display = 'none';
  var id = $(this).val();
$("#outstanding").val('0.00');
  $.ajax({
   url: "<?=base_url()?>api/receipts_payment/get_supplier_outstanding",
   type: 'POST',
   data: {id : id},
     datatype:'json',
   success: function(response) {
     $("#outstanding").val(response.data);
  }
});
});
$("#truck_id").on('change',function() {
  var id = $(this).val();
  document.getElementById('outstanding2').style.display = 'none';
  document.getElementById('outstanding1').style.display = 'block';
$("#outstanding").val('0.00');
  $.ajax({
   url: "<?=base_url()?>api/receipts_payment/get_vehicle_outstanding",
   type: 'POST',
   data: {id : id},
     datatype:'json',
   success: function(response) {
    $('#dynamic_field').empty();
      var len = response.data.all.length;
  
      for( var i = 0; i<len; i++){
        var dc_number = response.data.all[i].dc_number;
        var date = response.data.all[i].date;
        var amount = response.data.all[i].delivery_amount;
        var id = response.data.all[i].id;
      

    
      $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
       '<td style="text-align: center;">'+dc_number+'</td>'+
       '<td style="text-align: center;">'+date+'</td><td style="text-align: center;">'+amount+'</td>'+
       '<td style="text-align: center;"><input class="envoyer admin" type="checkbox" id="'+id+'" value="'+amount+'"  name="paid" /></td></tr>');
        }
  }
});
});
$("#pumps_id").on('change',function() {
  document.getElementById('outstanding2').style.display = 'block';
  document.getElementById('outstanding1').style.display = 'none';
  var id = $(this).val();
$("#outstanding").val('0.00');
  $.ajax({
   url: "<?=base_url()?>api/receipts_payment/get_pump_outstanding",
   type: 'POST',
   data: {id : id},
     datatype:'json',
   success: function(response) {
     $("#outstanding").val(response.data);
  }
});
});

            function show(str){
                document.getElementById('sh2').style.display = 'none';
                document.getElementById('sh1').style.display = 'block';
                document.getElementById('sh3').style.display = 'none';
                document.getElementById('sh4').style.display = 'none';
                document.getElementById('sh5').style.display = 'none';
                document.getElementById('outstanding2').style.display = 'block';
                document.getElementById('outstanding1').style.display = 'none';
            }
            function show2(sign){
                document.getElementById('sh2').style.display = 'block';
                document.getElementById('sh1').style.display = 'none';
                document.getElementById('sh3').style.display = 'none';
                document.getElementById('sh4').style.display = 'none';
                document.getElementById('sh5').style.display = 'none';
                document.getElementById('outstanding2').style.display = 'block';
                document.getElementById('outstanding1').style.display = 'none';
            }
             function show3(sign){
                document.getElementById('sh2').style.display = 'none';
                document.getElementById('sh1').style.display = 'none';
                document.getElementById('sh3').style.display = 'block';
                document.getElementById('sh4').style.display = 'none';
                document.getElementById('sh5').style.display = 'none';
                document.getElementById('outstanding2').style.display = 'block';
                document.getElementById('outstanding1').style.display = 'none';
            }
             function show4(sign){
                document.getElementById('sh2').style.display = 'none';
                document.getElementById('sh1').style.display = 'none';
                document.getElementById('sh3').style.display = 'none';
                document.getElementById('sh4').style.display = 'block';
                document.getElementById('sh5').style.display = 'none';
                document.getElementById('outstanding2').style.display = 'block';
                document.getElementById('outstanding1').style.display = 'none';
            }
             function show5(sign){
                document.getElementById('sh2').style.display = 'none';
                document.getElementById('sh1').style.display = 'none';
                document.getElementById('sh3').style.display = 'none';
                document.getElementById('sh4').style.display = 'none';
                document.getElementById('sh5').style.display = 'block';
                document.getElementById('outstanding2').style.display = 'block';
                document.getElementById('outstanding1').style.display = 'none';
            }
        </script>
        