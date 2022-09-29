<?php $this->load->view('section/mobile_header');?>

<style>
  ul.ui-autocomplete {
         box-sizing: border-box;
        -moz-border-radius: 15px;
        border-radius: 15px;
    }
</style>

  <section class="content">
<div class="row">
    <div class="col-md-12">
       <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Transport Details Edit</h3>
            </div>
            <div class="box-body">
           <?php echo form_open_multipart('transport_details/edit/' . $transport_details['id']);
$id = $transport_details['id']; ?>
            <div class="row">
             <div class="col-md-2">
               <label for="dc_number" class="control-label"> Dc Number: </label> <?php echo @$transport_details['dc_number'] ?>
             </div>
             <div class="col-md-2">
               <label for="date" class="control-label">Date:</label> <?php echo @$transport_details['date']; ?>
             </div>

             <div class="col-md-2">
               <label for="supply_form_id" class="control-label">Supply Form: </label> <?php echo get_supplier_name($transport_details['supply_form_id']); ?>
             </div>
             <div class="col-md-2">
               <label for="supply_to_id" class="control-label">Supply To </label><?php echo get_supplier_name($transport_details['supply_to_id']); ?>

             </div>
             <div class="col-md-3">
               <label for="transporter_id" class="control-label"> <span class="text-danger"></span>Transporter: </label> <?php echo get_transporter_name($transport_details['transporter_id']); ?>
             </div>
           </div>


             <div class="row">
              <div class="col-md-4">
               <label for="material_id" class="control-label"> <span class="text-danger"></span>Material Transported: </label> <?php echo get_material_name($transport_details['material_id']); ?>
             </div>
             <div class="col-md-3">
               <label for="driver_id" class="control-label"> <span class="text-danger"></span>Driver: </label> <?php echo $transport_details['driver_name'] ?>
             </div>

                <div class="col-md-3">
               <label for="truck_number" class="control-label">Vehicle No: </label><?php echo get_vehicle_name($transport_details['vehicle_id']) ?>
             </div>

           </div>
            <div class="row">
             <div class="col-md-2">
               <label for="chalan_weight" class="control-label"> <span class="text-danger"></span>Chalan Weight:</label> <?php echo @$transport_details['chalan_weight']; ?>
  <input type="hidden" name="chalan_weight" value="<?php echo @$transport_details['chalan_weight']; ?>" class="form-control chalan" id="chalan_weight" required="" />

 <input type="hidden" name="so_id" value="<?php echo @$transport_details['so_id']; ?>" class="form-control" id=" so_id" required="" />

             </div>
             <div class="col-md-2">
               <label for="chalan_rate" class="control-label"> <span class="text-danger"></span>Chalan Rate: </label> <?php echo @$transport_details['chalan_rate']; ?>
                 <input type="hidden" name="chalan_rate" value=" <?php echo @$transport_details['chalan_rate']; ?>" class="form-control chalan" id="chalan_rate" required="" />
             </div>
             <div class="col-md-3">
               <label for="chalan_amount" class="control-label"> <span class="text-danger"></span>Chalan Amount:</label><?php echo @$transport_details['chalan_amount']; ?>

               <input type="hidden" readonly="readonly" name="chalan_amount" value="<?php echo @$transport_details['chalan_amount']; ?>" class="form-control " id="chalan_amount" />

             </div>
           </div>
            <div class="row">
             <div class="col-md-2">
               <label for="delivery_weight" class="control-label"> <span class="text-danger">*</span>Delivery Weight</label>
                <div class="form-group">
                  <input type="text" required="" name="delivery_weight" value="<?php echo ($this->input->post('delivery_weight') ? $this->input->post('delivery_weight') : $transport_details['delivery_weight']); ?>" class="form-control delivery" id="delivery_weight" />
                   <span class="text-danger"><?php echo form_error('delivery_weight'); ?></span>
               </div>
             </div>
             <div class="col-md-2">
               <label for="delivery_rate" class="control-label"> <span class="text-danger">*</span>Delivery Rate</label>
                <div class="form-group">
                  <input type="text"  required="" name="delivery_rate" value="<?php echo ($this->input->post('delivery_rate') ? $this->input->post('delivery_rate') : $transport_details['delivery_rate']); ?>" class="form-control delivery" id="delivery_rate"  />
                   <span class="text-danger"><?php echo form_error('delivery_rate'); ?></span>
               </div>
             </div>
             <div class="col-md-2">
               <label for="delivery_amount" class="control-label"> <span class="text-danger"></span>Delivery Amount</label>
                <div class="form-group">
                  <input type="text" name="delivery_amount" value="<?php echo ($this->input->post('delivery_amount') ? $this->input->post('delivery_amount') : $transport_details['delivery_amount']); ?>" class="form-control " id="delivery_amount" readonly="readonly" />
                   <span class="text-danger"><?php echo form_error('delivery_amount'); ?></span>
               </div>
             </div>
             <div class="col-md-2">
               <label for="difference_qty" class="control-label"> <span class="text-danger"></span>Difference Qty</label>
                <div class="form-group">
                  <input type="text" readonly="readonly" name="difference_qty" value="<?php echo ($this->input->post('difference_qty') ? $this->input->post('difference_qty') : $transport_details['difference_qty']); ?>" class="form-control" id="difference_qty"  />
                   <span class="text-danger"><?php echo form_error('difference_qty'); ?></span>
               </div>
             </div>

           </div>
           <div class="row">
             <div class="col-md-2">
               <label for="difference_amount" class="control-label"> <span class="text-danger"></span>Difference Amount</label>
                <div class="form-group">
                  <input type="text" readonly="readonly" name="difference_amount" value="<?php echo ($this->input->post('difference_amount') ? $this->input->post('difference_amount') : $transport_details['difference_amount']); ?>" class="form-control" id="difference_amount" />
                   <span class="text-danger"><?php echo form_error('difference_amount'); ?></span>
               </div>
             </div>
              <div class="col-md-2">
               <label for="cheque_amount" class="control-label"> <span class="text-danger"></span>Cheque Advance</label>
                <div class="form-group">
              <input type="number" name="cheque_amount"  value="<?php echo ($this->input->post('cheque_amount') ? $this->input->post('cheque_amount') : $transport_details['cheque_amount']); ?>" class="form-control advance " id="cheque_amount"  />
              <span class="text-danger"><?php echo form_error('cheque_amount'); ?></span>
               </div>
             </div>
             <div class="col-md-2">
               <label for="cash_amount" class="control-label"> <span class="text-danger"></span>Cash Advance</label>
                <div class="form-group">
              <input type="number" name="cash_amount"  value="<?php echo ($this->input->post('cash_amount') ? $this->input->post('cash_amount') : $transport_details['cash_amount']); ?>" class="form-control advance" id="cash_amount" required="" />
          <span class="text-danger"><?php echo form_error('cash_amount'); ?></span>
               </div>
             </div>
             <div class="col-md-2">
               <label for="diesel_advance" class="control-label"> <span class="text-danger"></span>Diesel Advance</label>
                <div class="form-group">
              <input type="number" name="diesel_advance" value="<?php echo ($this->input->post('diesel_advance') ? $this->input->post('diesel_advance') : $transport_details['diesel_advance']); ?>" class="form-control advance" id="diesel_amount"  />
                   <span class="text-danger"><?php echo form_error('diesel_advance'); ?></span>
               </div>
             </div>
             <div class="col-md-2">
               <label for="rtgs_amount" class="control-label"> <span class="text-danger"></span>RTGS Advance</label>
                <div class="form-group">
              <input type="number" name="rtgs_amount"  value="<?php echo ($this->input->post('rtgs_amount') ? $this->input->post('rtgs_amount') : $transport_details['rtgs_amount']); ?>" class="form-control advance" id="rtgs_amount"  />

                <span class="text-danger"><?php echo form_error('rtgs_amount'); ?></span>
               </div>
             </div>
             <div class="col-md-2">
               <label for="total_advance" class="control-label"> <span class="text-danger"></span>Total Advance</label>
                <div class="form-group">
                  <input type="text" name="total_advance" value="<?php echo ($this->input->post('total_advance') ? $this->input->post('total_advance') : $transport_details['total_advance']); ?>" class="form-control " id="total_advance" readonly />
                   <span class="text-danger"><?php echo form_error('total_advance'); ?></span>
               </div>
             </div>

             </div>

             <div class="row">
              <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                <th>Pumps Name</th>
                <th>Diesel Qty</th>
                <th>Diesel Rate</th>
                <th>Diesel Amount</th>
                <th>Action</th>
              </tr>
            <?php $i = 0;
if (isset($diesel_transaction) && $diesel_transaction != null) {
	foreach ($diesel_transaction as $t) {
		?>
              <tr>

                <td>
                 <select name="pumps_id[]" class="form-control"  readonly>
                  <option value="">Select Pumps Name</option>
                  <?php foreach ($petrol_pumps as $row) {
			?>

                   <option value="<?php echo $t['pumps_id']; ?>"<?php if ($row['id'] == $t['pumps_id']) {
				echo 'selected="selected"';
			}
			?>><?php echo $row['petrol_pumps_name']; ?></option>
                 <?php }?>
               </select>

             </td>
             <td><input type="text" class="form-control"  id="diesel_qty<?php echo $i; ?>" value="<?php echo $t['diesel_qty'] ?>" name="diesel_qty[]" readonly></td>
             <td><input type="text" class="form-control" id="diesel_rate<?php echo $i; ?>"onkeyup="cal(0)" name="diesel_rate[]" value="<?php echo $t['diesel_rate'] ?>" readonly></td>
             <td><input type="text" class="form-control" id="diesel_amount<?php echo $i; ?>"  name="diesel_amount[]" value="<?php echo $t['diesel_amount'] ?>" readonly></td>
             <?php if ($i == '0') {?>
             <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
             <?php } else {?>
          <!-- <td><button type="button" name="remove" id="<?php echo $i; ?>" class="btn btn-danger btn_remove">X</button></td> -->
           <?php }?>
           </tr>
         <?php $i++;}

}?>
       <input type="hidden" id='last_id' value="<?php echo $i; ?>">
         </table>
       </div>
     </div>
           </div>
           <div class="row">
             <div class="col-md-3">
               <label for="unloading_id" class="control-label"> <span class="text-danger">*</span>UnLoading</label>
                <div class="form-group">
                 <select class="form-control" name="unloading_id" id="unloading_id" required="required">
                  <option value="">Select</option>
                    <?php foreach ($labour as $key) {?>
                     <option value="<?php echo $key['id']; ?>"><?php echo $key['name']; ?></option>
                  <?php }?>
                    </select>
                   <span class="text-danger"><?php echo form_error('loading_id'); ?></span>
               </div>
             </div>
             <div class="col-md-3">
               <label for="delivery_proof" class="control-label"> <span class="text-danger"></span>Delivery Proof</label>
                <div class="form-group">
                  <input type="file"  name="delivery_proof"  class="form-control" id="delivery_proof" />
                   <span class="text-danger"><?php echo form_error('delivery_proof'); ?></span>
               </div>
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
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
</section>
<?php $this->load->view('section/mobile_footer');?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
   $("#driver_id").autocomplete({
   source: function( request, response ) {
  $.ajax({
    url: "<?=base_url()?>transport_details/mst_driver",
    type: 'post',
    dataType: "json",
    data: {
      search: request.term,
         },
    success: function( data ) {
      response( data );
    }
  });
},
select: function (event, ui) {
          $('#driver_id').val(ui.item.label);
          $('#did').val(ui.item.value);
          $('#licence_no').val(ui.item.license_number);
          $('#pan_no').val(ui.item.pan);

          return false;
        }
      });

   $("#truck_number").autocomplete({
   source: function( request, response ) {
  $.ajax({
    url: "<?=base_url()?>gate_entry_pass/mst_vehicle",
    type: 'post',
    dataType: "json",
    data: {
      search: request.term,
         },
    success: function( data ) {
      response( data );
    }
  });
},
select: function (event, ui) {
          $('#truck_number').val(ui.item.label);
          $('#tid').val(ui.item.value);
          return false;
        }
      });
   $(".chalan").on("keyup",function(event) {
   var chalan_rate=$('#chalan_rate').val();
   var chalan_weight=$('#chalan_weight').val();
   var total = (chalan_rate*chalan_weight).toFixed(2);
   $('#chalan_amount').val(total);

    });

    $(".advance").on("keyup",function(event) {

      var total=0;
      var cheque_amount=$('#cheque_amount').val();
      var cash_amount=$('#cash_amount').val();
      var diesel_amount=$('#diesel_amount').val();
      var rtgs_amount=$('#rtgs_amount').val();
      var total = (Number(rtgs_amount) + Number(cheque_amount) + Number(cash_amount) + Number(diesel_amount)).toFixed(2);

      $('#total_advance').val(total);

        });
    $(".delivery").on("keyup",function(event) {
   var delivery_weight=$('#delivery_weight').val();
   var delivery_rate=$('#delivery_rate').val();
   var chalan_weight=$('#chalan_weight').val();
   var total = (delivery_rate*delivery_weight).toFixed(2);
   var differe = (chalan_weight-delivery_weight).toFixed(2);
   $('#difference_qty').val(differe);
   $('#delivery_amount').val(total);
    var delivery_amount=$('#delivery_amount').val();
    var chalan_amount=$('#chalan_amount').val();
    var amount = (delivery_amount-chalan_amount).toFixed(2);
   $('#difference_amount').val(amount);

    });
    $(".diesel").on("keyup",function(event) {
    var diesel_rate=$('#diesel_rate').val();
    var diesel_qty=$('#diesel_qty').val();
    var total = (diesel_rate*diesel_qty).toFixed(2);
    $('#diesel_amount').val(total);
    //diesel_rate,diesel_qty,diesel_amount
    });
 });
 $(document).ready(function(){
    var postURL = "/addmore.php";
    var id=$('#last_id').val();

    var i=id;
    $('#add').click(function(){

     i++;
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
       '<td><select name="pumps_id[]" class="form-control" required>'+
       '<option value="">Select Material</option>'+
       '<?php foreach ($petrol_pumps as $row): ?>'+
       '<option value="<?php echo $row['id'] ?>"> <?php echo $row['petrol_pumps_name'] ?></option>'+
       '<?php endforeach?>'+
       '</select>'+
       '</td>'+
       '<td><input type="text" class="form-control" id="diesel_qty'+i+'" required name="diesel_qty[]"></td>'+
       '<td><input type="text" class="form-control" id="diesel_rate'+i+'" onkeyup="cal('+i+')" required name="diesel_rate[]"></td><td><input type="text" id="diesel_amount'+i+'" class="form-control" required name="diesel_amount[]"></td>'+
       '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

   });


    $(document).on('click', '.btn_remove', function(){
     var button_id = $(this).attr("id");
     //alert()
     $('#row'+button_id+'').remove();
   });


    $('#submit').click(function(){

     $.ajax({

      url:postURL,
      method:"POST",
      data:$('#add_name').serialize(),
      type:'json',
      success:function(data)

      {

        i=1;

        $('.dynamic-added').remove();
        $('#add_name')[0].reset();
        alert('Record Inserted Successfully.');
      }

    });
   });
  });
  function cal($id)
  {
    var diesel_qty=$('#diesel_qty'+$id).val();
    var diesel_rate= $('#diesel_rate'+$id).val();
    var total= diesel_qty*diesel_rate;
    $('#diesel_amount'+$id).val(total);
}
</script>
