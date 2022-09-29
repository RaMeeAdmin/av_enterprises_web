<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Material Edit</h3>
            <?php //echo form_open('material/edit/'.$material['id']); ?>
            <form id="add_name" >
            <div class="box-body">
              <div class="row clearfix">
                <div class="col-md-6">
                 <label for="code" class="control-label">  <span class="text-danger"></span>Code</label>
                 <div class="form-group">
                  <input type="code" name="code"  class="form-control" id="code" required="required" />
                  <input type="hidden" name="id" id="edit_id">
                  <span class="text-danger"><?php echo form_error('date');?></span>
                </div>
              </div> 
              <div class="col-md-6">
               <label for="name" class="control-label">  <span class="text-danger"></span>Name</label>
               <div class="form-group">
                <input type="text" name="name" class="form-control" id="name"  required="required"/>
                <span class="text-danger"><?php echo form_error('name');?></span>
              </div>
            </div> 
              <div class="col-md-6">
               <label for="name" class="control-label"> GST No </label>
                <div class="form-group">
                <select name="gst" id="gst" class="form-control gst">
                  <!-- <option value=""> ---Select GST---</option>
                  <option value="5">5 % </option>
                  <option value="9">9 % </option>
                  <option value="18">18 % </option> -->
                </select>
                   <span class="text-danger"><?php echo form_error('gst_no');?></span>
               </div>
             </div>
          </div>
      </div>
      <div class="box-footer">
        <button type="button" class="btn btn-success" id="butsave">
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
    var url = window.location.pathname;
    var id = url.substring(url.lastIndexOf('/') + 1);

        $.ajax({
     'url':'<?=base_url()?>api/material/getmaterial',
      type: "POST",
      data:{'id':id},
      datatype:'json',
      success:function(response)
      {
       var code = response.data.code;
       var name = response.data.name;
       var gst = response.data.gst;
       $('#code').val(code);
       $('#name').val(name);
       $("#gst").append("<option class='gst1' value=''>Select</option> <option class='gst2'value='5'>5 % </option><option class='gst3' value='9'>9 % </option><option value='18' class='gst4'>18 % </option>");
       $('#edit_id').val(id);
      if (gst=='5') {
        $('.gst2').attr('Selected');
      }
      if(gst=='9'){
     
      $('.gst3').attr('Selected', 'Selected');
      }
      if(gst=='18'){
      
       $('.gst3').attr('Selected', 'Selected');
      }
      if(gst==''){
       $('.gst1').attr('Selected', 'Selected');
      }
      //alert('Record Inserted Successfully.');
     // window.location = "<?=base_url()?>material";
      }

    });

  $('#butsave').click(function(){
  var code = $('#code').val();
  var name = $('#name').val();
  var gst = $('#gst').val();
  var id = $('#edit_id').val();
  if(name==''){
    alert('Name Is Required');
    document.getElementById("name").focus();
   return false;
  }
   if(gst==''){
    alert('GST Is Required');
    document.getElementById("gst").focus();
   return false;
  }
     $.ajax({
     'url':'<?=base_url()?>api/material/edit/'+id,
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

      alert('Record Inserted Successfully.');
      window.location = "<?=base_url()?>material";
      }

    });
   });
     });
     $(document).on("change", "input[name='gst']", function () {
      $('.gst1').removeAttr('Selected', 'Selected');
      $('.gst2').removeAttr('Selected', 'Selected');
      $('.gst3').removeAttr('Selected', 'Selected');
      $('.gst4').removeAttr('Selected', 'Selected');
     });
 // alert('hii');
   </script>