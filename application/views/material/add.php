<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Add New Material</h3>
            </div>
            <div class="box-body">
            <?php// echo form_open('material/add'); ?>
            <form id="add_name" >
           <div class="col-md-6">
               <label for="code" class="control-label"> <span class="text-danger"></span>Code</label>
                <div class="form-group">
                  <input type="text" name="code" value="<?php echo $this->input->post('code'); ?>" class="form-control" id="code" required="required" />
                   <span class="text-danger"><?php echo form_error('code');?></span>
               </div>
             </div> 
             <div class="col-md-6">
               <label for="name" class="control-label"> <span class="text-danger"></span>Name</label>
                <div class="form-group">
                  <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control " id="name" required="required" />
                   <span class="text-danger"><?php echo form_error('name');?></span>
               </div>
             </div>
               <div class="col-md-6">
               <label for="name" class="control-label"> GST No </label>
                <div class="form-group">
                <select name="gst" id="gst" class="form-control">
                  <option value=""> ---Select GST---</option>
                  <option value="5">5 % </option>
                  <option value="9">9 % </option>
                  <option value="18">18 % </option>
                </select>
                   <span class="text-danger"><?php echo form_error('gst_no');?></span>
               </div>
             </div>
             
             <div class="col-md-12">
               <label for=" " class="control-label"> </label>
                <div class="form-group">
                   <button type="button" class="btn btn-success" id="butsave">  
                   <i class="fa fa-check"></i> Save 
                        </button> 
               </div>
             </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</section>
</div>
<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
 $('#butsave').click(function(){
  var code = $('#code').val();
  var name = $('#name').val();
   var gst = $('#gst').val();
 
  if(name==''){
    alert('Name Is Required');
    document.getElementById("name").focus();
   return false;
  }
  if(gst==''){
    alert('Name Is Required');
    document.getElementById("gst").focus();
   return false;
  }
     $.ajax({
     'url':'<?=base_url()?>api/material/addnew',
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
 </script>