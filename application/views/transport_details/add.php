<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>

<style>
ul.ui-autocomplete {
 box-sizing: border-box;
 -moz-border-radius: 15px;
 border-radius: 15px;
}
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
       <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Delivery Challan</h3>
        </div>
        <div class="box-body">
         <?php
$i = $last_transport['id'];
$id = $i + 1?>

         <form id="add_name">
          <div class="row">
           <div class="col-md-2">
             <label for="dc_number" class="control-label"> Sales Order <span class="text-danger">*</span></label>
             <div class="form-group">

              <select class="form-control" name="so_number" id="so_number" required="required">
               <option value="">Select SO</option>
               <?php foreach ($so as $key) {?>
                 <option value="<?php echo $key['id'] ?>"><?php echo $key['sale_code'] ?></option>
               <?php }?>
             </select>

           </div>
         </div>
         <div class="col-md-2">
           <label for="transporter_id" class="control-label"> Material <span class="text-danger">*</span> </label>
           <div class="form-group">

            <select class="form-control" name="material_id" id="material_id" required="required">
             <option value="">Select Material</option>
          <!--    <//?php foreach ($material as $key) {?>
               <option value="<//?php echo $key['id'] ?>"><//?php echo $key['name'] ?></option>
             <//?php }?> -->
           </select>
           <span class="text-danger"><?php echo form_error('material_id'); ?></span>
         </div>
       </div>

       <div class="col-md-2">
         <label for="date" class="control-label"> Date <span class="text-danger">*</span></label>
         <div class="form-group">
          <input type="text"  name="date" readonly value="<?php echo date('Y-m-d') ?>" class="has-datepicker form-control"  id="date" required="" />
          <span class="text-danger"><?php echo form_error('date'); ?></span>
        </div>
      </div>
      <div class="col-md-2">
       <label for="dc_number" class="control-label"> DC Number <span class="text-danger">*</span></label>
       <div class="form-group">
        <input type="text" readonly name="dc_number" value="<?php echo 'DC00' . $id; ?>" class="form-control" id="dc_number" required="" />
        <span class="text-danger"><?php echo form_error('dc_number'); ?></span>
      </div>
    </div>
     <!--  <div class="col-md-2">
       <label for="invoice_number" class="control-label">Invoice Number <span class="text-danger">*</span></label>
       <div class="form-group">
        <input type="text" readonly name="invoice_number" value="<?php echo 'INV00' . $id; ?>" class="form-control " id="invoice_number" required="" />
        <span class="text-danger"><?php echo form_error('invoice_number'); ?></span>
      </div>
    </div> -->
  </div>
  <div class="row">
<!--    <div class="col-md-3">
     <label for="supply_form_id" class="control-label"> Supply Form  <span class="text-danger">*</span></label>
     <div class="form-group">

      <select class="form-control" name="supply_form_id" id="supply_form_id" required="required">
       <option value="">Select Supplier</option>

                     </select>
                     <span class="text-danger"><?php echo form_error('supply_form_id'); ?></span>
                   </div>
                 </div> -->
             <!--     <div class="col-md-3">
                   <label for="supply_to_id" class="control-label"> Supply To <span class="text-danger">*</span> </label>
                   <div class="form-group">
                     <select class="form-control" name="supply_to_id" id="supply_to_id" required="required">
                       <option value="">Select Customer</option>

                       </select>
                       <span class="text-danger"><?php echo form_error('supply_to_id'); ?></span>
                     </div>
                   </div> -->
                   <div class="col-md-3">
                     <label for="transporter_id" class="control-label"> Transporter <span class="text-danger">*</span> </label>
                     <div class="form-group">
                      <select class="form-control" name="transporter_id" id="transporter_id" required="required">
                       <option value="">Select Transporter</option>

                     </select>
                     <span class="text-danger"><?php echo form_error('transporter_id'); ?></span>
                   </div>
                 </div>
                 <div class="col-md-2">
                   <label for="truck_number" class="control-label"> <span class="text-danger"></span>Vehicle No <span class="text-danger">*</span></label>
                   <div class="form-group">

                    <select class="form-control" name="vehicle_id" id="vehicle_id" required="required">
                     <option value="">Select Vehicle</option>

                   </select>

           <!--       <input type="text" name="truck_number" value="<//?php echo $this->input->post('truck_number'); ?>" class="form-control" id="truck_number" required="required" />
                 <input type="hidden" name="tid" id="tid" >
               -->

               <span class="text-danger"><?php echo form_error('truck_number'); ?></span>
             </div>
           </div>

           <div class="col-md-2">
             <label for="driver_id" class="control-label">  Driver <span class="text-danger">*</span> </label>
             <div class="form-group">
              <input type="text" name="drivername" value="<?php echo $this->input->post('driver_name'); ?>" class="form-control " id="drivername" required="" />
              <input type="hidden" name="driverid" id="did" />

                 <!--     <select class="form-control" name="driver_name" id="driver_id" required="required">
                       <option value="">Select Driver</option>

                       </select>
                     -->
                   </div>
                 </div>

               </div>
               <div class="row">

           <!--   <div class="col-md-3">
               <label for="pan_no" class="control-label">  PAN No <span class="text-danger">*</span> </label>
                <div class="form-group">
                  <input type="text" name="pan_no" value="<//?php echo $this->input->post('pan_no'); ?>" class="form-control" required="" id="pan_no" />
                   <span class="text-danger"><//?php echo form_error('pan_no'); ?></span>
               </div>
             </div> -->
            <!--  <div class="col-md-3">
               <label for="licence_no" class="control-label"> Licence No <span class="text-danger">*</span></label>
                <div class="form-group">
                  <input type="text" name="licence_no" value="<//?php echo $this->input->post('licence_no'); ?>" required="" class="form-control " id="licence_no" />
                   <span class="text-danger"><//?php echo form_error('licence_no'); ?></span>
               </div>
             </div> -->
           <!--    <div class="col-md-3">
               <label for="contact_number" class="control-label"> Driver Mobile No <span class="text-danger">*</span></label>
                <div class="form-group">
                   <input type="text" name="contact_number" value="</?php echo $this->input->post('contact_number'); ?>" class="form-control " id="contact_number" required="required" />

                   <span class="text-danger"><//?php echo form_error('contact_number'); ?></span>
               </div>
             </div> -->

             <div class="col-md-2">
               <label  class="control-label"> Chalan Weight <span class="text-danger">*</span></label>
               <div class="form-group">
                <input type="text" name="chalan_weight"  class="form-control chalan" id="chalan_weight" required="" />
                <span class="text-danger"><?php echo form_error('chalan_weight'); ?></span>
              </div>
            </div>
            <div class="col-md-2">
             <label for="chalan_rate" class="control-label"> Chalan Rate <span class="text-danger">*</span></label>
             <div class="form-group">
              <input type="text" name="chalan_rate" value="<?php echo $this->input->post('chalan_rate'); ?>" class="form-control chalan"  id="chalan_rate" required="" />
              <span class="text-danger"><?php echo form_error('chalan_rate'); ?></span>
            </div>
          </div>
          <div class="col-md-2">
           <label for="chalan_amount" class="control-label"> Chalan Amount <span class="text-danger">*</span></label>
           <div class="form-group">
            <input type="text" readonly="readonly" name="chalan_amount" value="<?php echo $this->input->post('chalan_amount'); ?>" class="form-control " id="chalan_amount" />
            <span class="text-danger"><?php echo form_error('chalan_amount'); ?></span>
          </div>
        </div>
        <div class="col-md-2">
         <label for="loading_id" class="control-label"> <span class="text-danger">*</span>Loader</label>
         <div class="form-group">
          <select class="form-control" name="loading_id" id="loading_id" required="required">
           <option value="">Select Loader</option>
           <?php foreach ($labour as $key) {?>
             <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
           <?php }?>
         </select>
         <span class="text-danger"><?php echo form_error('loading_id'); ?></span>
       </div>
     </div>
   </div>
          <!--    <div class="row">


          </div> -->
          <div class="row">
          <!--  <div class="col-md-2">
             <label for="cheque_amount" class="control-label"> Cheque Advance </label>
             <div class="form-group">
              <input type="number" name="cheque_amount" value="<?php echo $this->input->post('cheque_amount'); ?>" class="form-control advance " id="cheque_amount"  />
              <span class="text-danger"><?php echo form_error('cheque_amount'); ?></span>
            </div>
          </div> -->
          <div class="col-md-2">
           <label for="cash_amount" class="control-label"> <span class="text-danger"></span>Cash Advance</label>
           <div class="form-group">
            <input type="number" name="cash_amount" value="<?php echo $this->input->post('cash_amount'); ?>" class="form-control advance" id="cash_amount"  />
            <span class="text-danger"><?php echo form_error('cash_amount'); ?></span>
          </div>
        </div>

        <div class="col-md-2">
         <label for="rtgs_amount" class="control-label"> <span class="text-danger"></span>RTGS Advance</label>
         <div class="form-group">
          <input type="number" name="rtgs_amount" value="<?php echo $this->input->post('rtgs_amount'); ?>" class="form-control advance" id="rtgs_amount"  />

          <span class="text-danger"><?php echo form_error('rtgs_amount'); ?></span>
        </div>
      </div>
      <div class="col-md-2">
       <label for="total_advance" class="control-label"> <span class="text-danger"></span>Total Advance</label>
       <div class="form-group">
        <input type="text" name="total_advance" value="<?php echo $this->input->post('total_advance'); ?>" class="form-control " id="total_advance" readonly />
        <span class="text-danger"><?php echo form_error('total_advance'); ?></span>
      </div>
    </div>

  </div>

  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered" id="dynamic_field">
        <tr>
          <th>Pump Name</th>
          <th>Diesel Qty</th>
          <th>Diesel Rate</th>
          <th>Diesel Amount</th>
          <th>Action</th>
        </tr>

        <tr>
          <td>

           <select name="pumps_id[]" class="form-control" id="pumps_id" required>
            <option value="">Select Pump Name</option>
            <?php foreach ($petrol_pumps as $row): ?>
             <option value="<?php echo $row['id'] ?>"> <?php echo $row['petrol_pumps_name'] ?></option>
           <?php endforeach?>
         </select>

       </td>
       <td><input type="number" class="form-control"  id="diesel_qty0" name="diesel_qty[]"></td>
       <td><input type="number" class="form-control" id="diesel_rate0"onkeyup="cal(0)" name="diesel_rate[]"></td>
       <td><input type="number" class="form-control" id="diesel_amount0"   name="diesel_amount[]"></td>

       <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
     </tr>
   </table>
 </div>
</div>


<div class="col-md-6">
 <label for="" class="control-label"> </label>
 <div class="form-group">
   <button type="button" class="btn btn-success" id="butsave">
     <i class="fa fa-check"></i> Save
   </button>
 </div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<?php $this->load->view('section/footer');?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function(){


//    $.ajax({
//     'url':'<//?=base_url()?>api/user/get_suppliers',
//     type: "POST",
//     data: {
//     },
//     dataType: 'json',
//     success: function(response)
//     {
//       var len = response.data.length;
//       for( var i = 0; i<len; i++){
//         var id = response.data[i].id;
//         var company_name = response.data[i].company_name;
//         $("#supply_form_id").append("<option value='"+id+"'>"+company_name+"</option>");
//       //  $("#supply_to_id").append("<option value='"+id+"'>"+company_name+"</option>");
//     }

//   },
//   error: function(result) {

//   }
// });
//    $.ajax({
//     'url':'<//?=base_url()?>api/customer/get_customer_details',
//     type: "POST",
//     data: {
//     },
//     dataType: 'json',
//     success: function(response)
//     {
//       var len = response.data.length;
//       for( var i = 0; i<len; i++){
//         var id = response.data[i].id;
//         var name = response.data[i].name;
//       //  $("#supply_form_id").append("<option value='"+id+"'>"+company_name+"</option>");
//       $("#supply_to_id").append("<option value='"+id+"'>"+name+"</option>");
//     }

//   },
//   error: function(result) {

//   }
// });



 // $.ajax({
 //    'url':'<//?=base_url()?>api/user/get_so',
 //    type: "POST",
 //    data: {
 //    },
 //    dataType: 'json',
 //    success: function(response)
 //    {
 //      var len = response.data.length;
 //      for( var i = 0; i<len; i++){
 //        var id = response.data[i].id;
 //        var company_name = response.data[i].company_name;
 //        $("#supply_form_id").append("<option value='"+id+"'>"+company_name+"</option>");
 //        $("#supply_to_id").append("<option value='"+id+"'>"+company_name+"</option>");
 //      }

 //    },
 //    error: function(result) {

 //    }
 //  });



 $.ajax({
  'url':'<?=base_url()?>api/transport_details/get_transpoter_name',
  type: "POST",
  data: {
  },
  dataType: 'json',
  success: function(response)
  {
    var len = response.data.length;
    for( var i = 0; i<len; i++){
      var id = response.data[i].id;
      var transporter_name = response.data[i].transporter_name;
      $("#transporter_id").append("<option value='"+id+"'>"+transporter_name+"</option>");
    }

  },
  error: function(result) {


  }
});


 $.ajax({
  url: "<?=base_url()?>transport_details/mst_driver",
  type: 'post',
  dataType: "json",

      success: function(response) {
       var len = response.vehicle.length;

       for( var i = 0; i<len; i++)
       {
        var id = response.vehicle[i].id;
        var name = response.vehicle[i].vehicle_number;
        $("#vehicle_id").append("<option value='"+id+"'>"+name+"</option>");
      }
    }
  });


//  $("#truck_number").autocomplete({
//    source: function( request, response ) {
//     $.ajax({
//       url: "<?=base_url()?>gate_entry_pass/mst_vehicle",
//       type: 'post',
//       dataType: "json",
//       data: {
//         search: request.term,
//       },
//       success: function( data ) {
//         response( data );
//       }
//     });
//   },
//   select: function (event, ui) {
//     $('#truck_number').val(ui.item.label);
//     $('#tid').val(ui.item.value);
//     return false;
//   }
// });

 $(".advance").on("keyup",function(event) {

  var total=0;
  var cheque_amount=0;
  var cash_amount=$('#cash_amount').val();
     // var diesel_amount=$('#diesel_amount').val();
     var rtgs_amount=$('#rtgs_amount').val();
     var total = (Number(rtgs_amount) + Number(cheque_amount) + Number(cash_amount) ).toFixed(2);

     $('#total_advance').val(total);
   });

 $("#chalan_rate").on("keyup",function(event) {
   var chalan_rate=$('#chalan_rate').val();
   var chalan_weight=$('#chalan_weight').val();
   var total = (chalan_rate*chalan_weight).toFixed(2);
   $('#chalan_amount').val(total);

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
   $('#difference_amount').val(total);

 });

 $(".diesel").on("keyup",function(event) {
  var diesel_rate=$('#diesel_rate').val();
  var diesel_qty=$('#diesel_qty').val();
  var total = (diesel_rate*diesel_qty).toFixed(2);
  $('#diesel_amount').val(total);

});
});


$(document).ready(function(){
  var postURL = "/addmore.php";
  var i=1;
  $('#add').click(function(){

   i++;
   $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
     '<td><select name="pumps_id[]" id="pumps_id" class="form-control" required>'+
     '<option value="">Select Pump Name</option>'+
     '<?php foreach ($petrol_pumps as $row): ?>'+
     '<option value="<?php echo $row['id'] ?>"> <?php echo $row['petrol_pumps_name'] ?></option>'+
     '<?php endforeach?>'+
     '</select>'+
     '</td>'+
     '<td><input type="number" class="form-control" id="diesel_qty'+i+'" required name="diesel_qty[]"></td>'+
     '<td><input type="number" class="form-control" id="diesel_rate'+i+'" onkeyup="cal('+i+')" required name="diesel_rate[]"></td><td><input type="number" id="diesel_amount'+i+'" class="form-control" required name="diesel_amount[]"></td>'+
     '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

 });


  $(document).on('click', '.btn_remove', function(){
   var button_id = $(this).attr("id");
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
      alert('Delivery Challan Inserted Successfully.');

    }

  });
 });
});

$(document).ready(function() {

  $('#butsave').on('click', function() {
    var date = $('#date').val();
    var so_number= $('#so_number').val();
    var dc_number = $('#dc_number').val();
    var invoice_number = $('#invoice_number').val();
    var supply_form_id = $('#supply_form_id').val();
    var supply_to_id = $('#supply_to_id').val();
    var transporter_id = $('#transporter_id').val();
    var material_id = $('#material_id').val();
    var driver_id = $('#driver_id').val();
    var tid = $('#tid').val();
    var did = $('#did').val();
    var pan_no = $('#pan_no').val();
    var licence_no = $('#licence_no').val();
    var contact_number = $('#contact_number').val();
    var truck_number = $('#truck_number').val();
    var chalan_weight = $('#chalan_weight').val();
    var chalan_rate = $('#chalan_rate').val();
    var chalan_amount = $('#chalan_amount').val();
    var cheque_amount = $('#cheque_amount').val();
    var cash_amount = $('#cash_amount').val();
    var diesel_advance = $('#diesel_advance').val();
    var rtgs_amount = $('#rtgs_amount').val();
    var loading_id = $('#loading_id').val();
    var pumps_id = $('#pumps_id').val();
    var diesel_qty0 = $('#diesel_rate0').val();
    var diesel_amount0 = $('#diesel_amount0').val();

    var vehicle_id = $('#vehicle_id').val();
    var drivername = $('#drivername').val();


    if(so_number=="")
    {
     alert("Sales Order is Required!" );
     document.getElementById("so_number").focus();
     return false;
   }
    if(material_id=="")
    {
     alert("Material is Required!" );
     document.getElementById("material_id").focus();
     return false;
   }
    if(transporter_id=="")
    {
     alert("Transporter is Required!" );
     document.getElementById("transporter_id").focus();
     return false;
   }
    if(vehicle_id=="")
    {
     alert("vehicle is Required!" );
     document.getElementById("vehicle_id").focus();
     return false;
   }
    if(drivername=="")
    {
     alert("driver name is Required!" );
     document.getElementById("drivername").focus();
     return false;
   }

   if(chalan_rate=="")
    {
     alert("chalan rate is Required!" );
     document.getElementById("chalan_rate").focus();
     return false;
   }


   if(Number(chalan_rate) <1)
    {
     alert("chalan rate greater than 0" );
      $("chalan_rate").val("");
     document.getElementById("chalan_rate").focus();
     return false;
   }
 
if(chalan_weight=="")
    {
     alert("chalan weight is Required!" );
     document.getElementById("chalan_weight").focus();
     return false;
   }


if(Number(chalan_weight) <1)
    {
     alert("chalan weight greater than 0" );
      $("#chalan_weight").val("");
     document.getElementById("chalan_weight").focus();
     return false;
   }
   if(Number(chalan_weight) > 50)
    {
     alert("chalan rate less than 50" );
      $("chalan_rate").val("");
     document.getElementById("chalan_rate").focus();
     return false;
   }
if(loading_id=="")
    {
     alert("Loader is Required!" );
     document.getElementById("loading_id").focus();
     return false;
   }






   if(dc_number!="" && date!="" && invoice_number!="" && supply_form_id!=""){
    /*  $("#butsave").attr("disabled", "disabled"); */
    $.ajax({
      url: "<?=base_url()?>api/transport_details/add",
      type: "POST",
      data:$('#add_name').serialize(),
      cache: false,
      success: function(dataResult){

       alert('Delivery Challan Inserted Successfully.');

       window.location = "<?=base_url()?>transport_details";

     }
   });
  }
  else{
    alert('Please fill all the field !');
  }
});
});
function cal($id)
{
  var diesel_qty=$('#diesel_qty'+$id).val();
  var diesel_rate= $('#diesel_rate'+$id).val();
  var total= diesel_qty*diesel_rate;
  $('#diesel_amount'+$id).val(total);
}

$("#so_number").on('change',function() {

  var id = $(this).val();
  $.ajax({
   url: "<?=base_url()?>api/transport_details/get_so_details",
   type: 'POST',
   data: {id : id},
   success: function(response) {
 var len = response.data.sales_item.length;

   $("#material_id").empty("");
     $("#material_id").append("<option value=''>Select</option>");
     for( var i = 0; i<len; i++)
    {
      var item_id = response.data.sales_item[i].item_id;
      var name = response.data.sales_item[i].name;
      $("#material_id").append("<option value='"+item_id+"'>"+name+"</option>");
    }

  }
});
});


$("#material_id").on('change',function() {

  var id = $(this).val();
   var sale_id = $("#so_number").val();
  $.ajax({
   url: "<?=base_url()?>api/transport_details/get_material_rate",
   type: 'POST',
   data: {id : id,sale_id:sale_id},
   success: function(response) {

     var rate = response.data.rate;

// $("#chalan_rate").val(rate);



  }
});
});








// $("#transporter_id").on('change',function() {
//   var id = $(this).val();
//   $.ajax({
//    url: "<?=base_url()?>api/transport_details/get_transporter_details",
//    type: 'POST',
//    data: {id : id},
//    success: function(response) {
//     var len = response.vehicle.length;

//     for( var i = 0; i<len; i++)
//     {
//       var id = response.vehicle[i].id;
//       var name = response.vehicle[i].name;
//       $("#driver_id").append("<option value='"+id+"'>"+name+"</option>");
//     }



//   }
// });
// });



</script>
