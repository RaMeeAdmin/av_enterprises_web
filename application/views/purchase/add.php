<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Generate P.O.</h3>
          </div>
          <div class="box-body">

          <form id="add_name" enctype="multipart/form-data">
            <div class="col-md-6">
             <label for="name" class="control-label"> <span class="text-danger"></span>Supplier Name</label>
                <div class="form-group">
               <select name="supplier" id="supplier" class="form-control" required>
                <option value="">Select</option>
                <?php foreach ($supplier as $row): ?>
                 <option value="<?php echo $row['id'] ?>"> <?php echo $row['company_name'] ?></option>
               <?php endforeach?>
             </select>
           </div>
         </div>
         <div class="col-md-6">
           <label for="phone" class="control-label"> <span class="text-danger"></span>P.O. Date</label>
           <div class="form-group">
            <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" class="form-control"  required/>

          </div>
        </div>
        <div class="col-md-6">
           <label for="due_date" class="control-label"> <span class="text-danger"></span>Due Date</label>
           <div class="form-group">
            <input type="date" name="due_date" value="<?php echo date('Y-m-d'); ?>" class="form-control"  required/>

          </div>
        </div>
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field">
              <tr>
                <th>Material</th>
                <th>Weight</th>
                <th>Rate Per Tonne</th>
                <th>Total</th>
               <!--  <th>Action</th> -->
              </tr>

              <tr>
                <td>
                 <select name="material[]" id="material0" class="form-control" required>
                  <option value="">Select Material</option>
                  <?php foreach ($material as $row): ?>
                   <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
                 <?php endforeach?>
               </select>

             </td>
             <td><input type="text" required class="form-control"  id="weight0" name="weight[]"></td>
             <td><input type="text" required class="form-control" id="rate0" onkeyup="cal(0)" name="price[]"></td>
             <td><input type="text" required class="form-control" id="total0"  name="total[]"></td>

            <!--  <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> -->
           </tr>
         </table>
       </div>
     </div>
       <div class="col-md-6">
           <label  class="control-label"> <span class="text-danger"></span>Note</label>
           <div class="form-group">
       <textarea type="text" class="form-control" id="note" name="note"></textarea>

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
   </form>
   </div>
 </div>
</div>
</div>
</div>
</section>
</div>
<?php $this->load->view('section/footer');?>
<script type="text/javascript">

  $(document).ready(function()
  {
    var postURL = "/addmore.php";
    var i=1;
    $('#add').click(function(){
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added">'+
       '<td><select name="material[]" id="material'+i+'" class="form-control" required>'+
       '<option value="">Select Material</option>'+
       '<?php foreach ($material as $row): ?>'+
       '<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>'+
       '<?php endforeach?>'+
       '</select>'+
       '</td>'+
       '<td><input type="text" required class="form-control" id="weight'+i+'" required name="weight[]"></td>'+
       '<td><input type="text" required class="form-control" id="rate'+i+'" onkeyup="cal('+i+')" required name="price[]"></td><td><input type="text" id="total'+i+'" class="form-control" required name="total[]"></td>'+
       '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
 i++;
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
          var supplier=$("#supplier").val();
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
           alert("Supplier Name is Required!" );
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
     'url':'<?=base_url()?>api/purchase/add',
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

        alert('P.O. Inserted Successfully.');

       window.location = "<?=base_url()?>purchase";

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
</script>