<?php $this->load->view('section/mobile_header');?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Generate P.O.</h3>
        </div>
        <div class="box-body">
          <?php echo form_open('purchase/add_purchase_order'); ?>
          <div class="col-md-6">
           <label for="name" class="control-label"> <span class="text-danger"></span>Supplier Name</label>
           <div class="form-group">
             <select name="supplier" class="form-control" required>
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
          <input type="date" name="date"  class="form-control"  required/>
        </div>
      </div>
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-bordered" id="dynamic_field">
            <tr>
              <td>
               <select name="material[]" class="form-control" required>
                <option value="">Select Material</option>
                <?php foreach ($material as $row): ?>
                 <option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>
               <?php endforeach?>
             </select>
           </td>
           <td><input type="text" placeholder="Weight" required class="form-control"  id="weight0" name="weight[]"></td>
         </tr>
         <tr>
           <td><input type="text" placeholder="Rate" required class="form-control" id="rate0"onkeyup="cal(0)" name="price[]"></td>
           <td><input type="text" placeholder="Total" required class="form-control" id="total0"  name="total[]"></td>
           <td><button type="button" name="add" id="add"  class="btn btn-success">Add</button></td>
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
<?php $this->load->view('section/mobile_footer');?>
<script type="text/javascript">

  $(document).ready(function(){
    var postURL = "/addmore.php";
    var i=1;
    $('#add').click(function(){

     i++;
     $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added row'+i+'">'+
       '<td><select name="material[]" class="form-control" required>'+
       '<option value="">Select Material</option>'+
       '<?php foreach ($material as $row): ?>'+
       '<option value="<?php echo $row['id'] ?>"> <?php echo $row['name'] ?></option>'+
       '<?php endforeach?>'+
       '</select>'+
       '</td>'+
       '<td><input type="text" placeholder="Weight" required class="form-control" id="weight'+i+'" required name="weight[]"></td></tr><tr id="row'+i+'" class="dynamic-added row'+i+'">'+
       '<td><input type="text" placeholder="Rate" required class="form-control" id="rate'+i+'" onkeyup="cal('+i+')" required name="price[]"></td><td><input type="text" required id="total'+i+'" class="form-control" required placeholder="Total" name="total[]"></td>'+
       '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');

   });


    $(document).on('click', '.btn_remove', function(){
     var button_id = $(this).attr("id");
     $('.row'+button_id+'').remove();
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
    var weight=$('#weight'+$id).val();
    var rate= $('#rate'+$id).val();
    var total= weight*rate;
    $('#total'+$id).val(total);
  }
</script>