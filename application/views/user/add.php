<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<style type="text/css">
  #hidden_div {
    display: none;
}</style>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
      <div class="box-header">
            <h3 class="box-title">Add New Users</h3>
            </div>
            <div class="box-body">
           <!--  <?php// echo form_open('user/add'); ?> -->
           <form id="add_name">
             <div class="col-md-6">
               <label for="name" class="control-label"> <span class="text-danger"></span>Name</label>
                <div class="form-group">
                  <input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control " id="name" required="required"/>
                   <span class="text-danger"><?php echo form_error('name');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="mobile_number" class="control-label"> <span class="text-danger"></span>Mobile number</label>
                <div class="form-group">
                  <input type="text" name="mobile_number" value="<?php echo $this->input->post('mobile_number'); ?>" min="10" max="10" class="form-control" id="mobile_number" required="required" />
                   <span class="text-danger"><?php echo form_error('mobile_number');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="email" class="control-label"> <span class="text-danger"></span>Email</label>
                <div class="form-group">
                  <input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" required="required" class="form-control " id="email" />
                   <span class="text-danger"><?php echo form_error('email');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="username" class="control-label"> <span class="text-danger"></span>Username</label>
                <div class="form-group">
                  <input type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control " id="username" required="required" />
                   <span class="text-danger"><?php echo form_error('username');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="password" class="control-label"> <span class="text-danger"></span>Password</label>
                <div class="form-group">
                  <input type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control " id="password" required="required" />
                   <span class="text-danger"><?php echo form_error('password');?></span>
               </div>
             </div>
             
             <div class="col-md-6">
               <label for="location" class="control-label"> <span class="text-danger" ></span>Location</label>
                <div class="form-group">
                <!-- <select class="form-control select2" style="width: 100%;" name="location[]" id="location" required="required" multiple="multiple">
                    <?php foreach ($locations as $key ) {?>
                       <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                  <?php  } ?>
                    </select> -->
                    <select class="form-control select2" style="width: 100%;" name="location[]" id="location" required="required" multiple="multiple">
                    <option value="Select state">Select location *</option>
                    </select>
                   <span class="text-danger"><?php echo form_error('location');?></span>
               </div>
             </div>
             <div class="col-md-6">
               <label for="user_type" class="control-label"> <span class="text-danger" ></span>User Role</label>
                <div class="form-group">
                  
                     <select class="form-control" name="user_type" id="user_type" required="required" onchange="showDiv('hidden_div', this)">
                    <option value=" ">Select User Role *</option>
                    </select>
                   <span class="text-danger"><?php echo form_error('user_type');?></span>
               </div>
             </div>
           <div class="col-md-6" id="hidden_div">
              <label for="company_id" class="control-label"> <span class="text-danger"></span>Company Name</label>
                <div class="form-group">
                 
                    <select class="form-control" name="company_id" id="company_id" required="required">
                    <option value="">Select User Role *</option>
                    </select>
                  <span class="text-danger"><?php echo form_error('company_id');?></span>
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
 </div>
</div>
</section>
</div>
<script type="text/javascript">
  function showDiv(divId, element)
{
    document.getElementById(divId).style.display = element.value == 2 ? 'block' : 'none';
}
</script>
<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
  $(document).ready(function() {
 $('#butsave').click(function(){
  var name = $('#name').val();
  var mobile_number = $('#mobile_number').val();
  var email = $('#email').val();
  var username = $('#username').val();
  var password = $('#password').val();
  var locations = $('#locations').val();
  
 
  if(name == ''){
    alert('Name Is Required');
    document.getElementById("name").focus();
   return false;
  }
  if(mobile_number ==''){
    alert('Mobile Number Is Required');
    document.getElementById("mobile_number").focus();
   return false;
  }
  if(email == ''){
    alert('Email Is Required');
    document.getElementById("email").focus();
   return false;
  }
  if(username == ''){
    alert('Useruame Is Required');
    document.getElementById("username").focus();
   return false;
  }
  if(password == ''){
    alert('Password Is Required');
    document.getElementById("password").focus();
   return false;
  }
  if(locations == ''){
    alert('Locations Is Required');
    document.getElementById("locations").focus();
   return false;
  }
     $.ajax({
     'url':'<?=base_url()?>api/user/addnew',
      type: "POST",
      data:$('#add_name').serialize(),
      datatype:'json',
      success:function(data)

      {

      alert('Record Inserted Successfully.');
      window.location = "<?=base_url()?>user";
      }

    });
   });

 $.ajax({

    'url':'<?=base_url()?>api/user/get_user_role',
    type: "POST",
    data: {

    },
    dataType: 'json',
    success: function(response)
    {

      var len = response.data.length;
      for( var i = 0; i<len; i++){
        var id = response.data[i].id;
        var name = response.data[i].name;
        $("#user_type").append("<option value='"+id+"'>"+name+"</option>");

      }

    },
    error: function(result) {

    }
  });


 $.ajax({
    'url':'<?=base_url()?>api/user/get_locations',
    type: "POST",
    data: {

    },
    dataType: 'json',
    success: function(response)
    {

      var len = response.data.length;
      for( var i = 0; i<len; i++){
        var id = response.data[i].id;
        var name = response.data[i].name;
        $("#location").append("<option value='"+id+"'>"+name+"</option>");

      }

    },
    error: function(result) {

    }
  });
  $.ajax({
    'url':'<?=base_url()?>api/user/get_suppliers',
    type: "POST",
    data: {

    },
    dataType: 'json',
    success: function(response)
    {

      var len = response.data.length;
      for( var i = 0; i<len; i++){
        var id = response.data[i].id;
        var company_name = response.data[i].company_name;
        $("#company_id").append("<option value='"+id+"'>"+company_name+"</option>");

      }

    },
    error: function(result) {

    }
  });

  });
 </script>
