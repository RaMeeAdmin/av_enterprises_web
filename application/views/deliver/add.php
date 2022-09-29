<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>dfdgf

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Sales Order</h3>
          </div>
          <div class="box-body">
      <!--       <//?php echo form_open('deliver/add'); ?> -->
        <form id="add_name" enctype="multipart/form-data">
                 <div class="col-md-3">
               <label for="purchase_id" class="control-label"> <span class="text-danger"></span>Purchase Code</label>
                <div class="form-group">
                   <select class="form-control" name="purchase_id" id="purchase_id" required="required">
                    <option>Select</option>
                    <?php foreach ($purchase as $key) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['purchase_code'] ?></option>
                  <?php }?>
                    </select>
               </div>
             </div>
            <div class="col-md-3">
             <label for="name" class="control-label"> <span class="text-danger"></span>Customer Name</label>

             <div class="form-group">
               <select name="customer" id="customer" class="form-control" required>
                <option value="">Select</option>
                <?php foreach ($customer as $row): ?>
                 <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
               <?php endforeach?>
             </select>
           </div>
         </div>
         <div class="col-md-3">
           <label for="phone" class="control-label"> <span class="text-danger"></span>Date</label>
           <div class="form-group">
            <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"  id="date" class="form-control"  required/>
          </div>
        </div>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                <th>Material</th>
                <th>GST</th>
                <th>Weight</th>
                <th>Rate Per Tonne</th>
                <th>Total</th>
               <!--  <th>Action</th> -->
              </tr>

              <tr>
                <td>
                 <select name="material[]" id="material0" class="form-control material" required>
                  <option value="">Select Material</option>
                  <?php foreach ($material as $row): ?>
                   <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
                 <?php endforeach?>
               </select>

             </td>
             <td><input type="text" class="form-control"  id="gst" name="gst[]"></td>
             <td><input type="text" class="form-control"  id="weight0" name="weight[]"></td>
             <td><input type="text" class="form-control" id="rate0"onkeyup="cal(0)" name="price[]"></td>
             <td><input type="text" class="form-control" id="total0"  name="total[]"></td>

             <!-- <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> -->
           </tr>
         </table>
       </div>
     </div>
       <div class="col-md-6">
           <label  class="control-label"> <span class="text-danger"></span>Note</label>
           <div class="form-group">
       <textarea type="text" class="form-control" name="note"></textarea>

          </div>
        </div>
     <div class="col-md-12">
       <label  class="control-label"> </label>
       <div class="form-group">
         <button type="button" id="submit" class="btn btn-success">
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
<?php $this->load->view('section/footer');?>
<script type="text/javascript">

  $(document).ready(function(){
    var postURL = "/addmore.php";
    var i=1;
    $('#add').click(function(){

     i++;
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
       '<td><select name="material[]" class="form-control material"  required>'+
       '<option value="">Select Material</option>'+
       '<?php foreach ($material as $row): ?>'+
       '<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>'+
       '<?php endforeach?>'+
       '</select>'+
       '</td>'+
       '<td><input type="text" class="form-control" id="weight'+i+'" required name="weight[]"></td>'+
       '<td><input type="text" class="form-control" id="rate'+i+'" onkeyup="cal('+i+')" required name="price[]"></td><td><input type="text" id="total'+i+'" class="form-control" required name="total[]"></td>'+
       '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');


   });


    $(document).on('click', '.btn_remove', function(){
     var button_id = $(this).attr("id");
     $('#row'+button_id+'').remove();
   });



        $('#submit').click(function()
        {

          elements = document.getElementsByName("weight[]");
          for (let i = 0; i < elements.length; i++)
          {
          var supplier=$("#customer").val();
          var material=$("#material"+i).val();
          var weight=$("#weight"+i).val();
          var rate=$("#rate"+i).val();
          var total=$("#total"+i).val();
          var note=$("#note").val();
          var date=$("#date").val();
          // if(note.contains("<script>")){

          //   alert("script tag Not allowed");
          //   $("#note").val("");
          // }
          if(supplier=="")
          {
           alert("Customer Name is Required!" );
            document.getElementById("supplier").focus();
            return false;
          }
           if(material=="")
          {
           alert("material is Required!" );
            document.getElementById("material"+i).focus();
            return false;
          }

          if(weight=="")
          {
           alert("weight is Required!" );
            document.getElementById("weight"+i).focus();
            return false;
          }
          if(rate=="")
          {
           alert("rate is Required!" );
            document.getElementById("rate"+i).focus();
            return false;
          }
           if(total=="")
          {
           alert("total is Required!" );
            document.getElementById("total"+i).focus();
            return false;
          }
           if(note=="")
          {
           alert("note is Required!" );
            document.getElementById("note"+i).focus();
            return false;
          }
    }
     $.ajax({
     'url':'<?=base_url()?>api/purchase/add_so',
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

        alert('Sales Order Inserted Successfully.');

        window.location = "<?=base_url()?>deliver";


      }

    });
   });

  });
  function cal($id)
  {
    var weight=$('#weight'+$id).val();
    var rate= $('#rate'+$id).val();
    var total= weight*rate;
    $('#total'+$id).val(total);
}
 $(document).on("change", ".material", function () {
  var id = $(this).val();
 
  $("#gst").val('0.00');
  $.ajax({
   url: "<?=base_url()?>api/purchase/get_material_gst",
   type: 'POST',
   data: {id : id},
     datatype:'json',
   success: function(response) {
     var gst= response.data.gst + ' %';
     $("#gst").val(gst);
  }
});

   });
$("#purchase_id").on('change',function() {

  var id = $(this).val();
  $.ajax({
   url: "<?=base_url()?>api/transport_details/get_po_details",
   type: 'POST',
   data: {id : id},
   success: function(response) {
 var len = response.data.purchase.length;

   $(".material").empty("");
   $(".material").append("<option value=''>Select</option>");
   for( var i = 0; i<len; i++)
    {
      var item_id = response.data.purchase[i].item_id;
      var name = response.data.purchase[i].name;
      var rate = response.data.purchase[i].rate;
      // $("#rate"+i).val(rate);
      $(".material").append("<option value='"+item_id+"'>"+name+"</option>");
    }
  }
});
});



</script>