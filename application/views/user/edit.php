<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<style type="text/css">
  #hidden_div {
    display: none;
}</style>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">User Edit</h3>
            <?php echo form_open('user/edit/' . $user['id']); ?>
            <div class="box-body">
              <div class="row clearfix">
             <div class="col-md-6">
               <label for="name" class="control-label">  <span class="text-danger"></span>Name</label>
                <div class="form-group">
                  <input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $user['name']); ?>" class="form-control" id="name" />
                    <span class="text-danger"><?php echo form_error('name'); ?></span>
               </div>
             </div>
               <div class="col-md-6">
               <label for="mobile_number" class="control-label">  <span class="text-danger"></span>Mobile Number</label>
                <div class="form-group">
                  <input type="text" name="mobile_number" value="<?php echo ($this->input->post('mobile_number') ? $this->input->post('mobile_number') : $user['mobile_number']); ?>" class="form-control" id="mobile_number" />
                    <span class="text-danger"><?php echo form_error('mobile_number'); ?></span>
               </div>
             </div>
                <div class="col-md-6">
               <label for="email" class="control-label">  <span class="text-danger"></span>Email</label>
                <div class="form-group">
                  <input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $user['email']); ?>" class="form-control" id="email" />
                    <span class="text-danger"><?php echo form_error('email'); ?></span>
               </div>
             </div>
              <div class="col-md-6">
               <label for="username" class="control-label">  <span class="text-danger"></span>Username</label>
                <div class="form-group">
                  <input type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $user['username']); ?>" class="form-control" id="username" />
                    <span class="text-danger"><?php echo form_error('username'); ?></span>
               </div>
             </div>
              <div class="col-md-6">
               <label for="location" class="control-label"> <span class="text-danger" ></span>Location</label>
                <div class="form-group">
                  <select class="form-control select2" style="width: 100%;" name="location" id="location" required="required" multiple="multiple">
                    <?php foreach ($locations as $key) {
	?>
                       <option value="<?php echo $user['location_id']; ?>"<?php if ($key['id'] == $user['location_id']) {
		echo 'selected="selected"';
	}
	?>><?php echo $key['name']; ?></option>
                  <?php }?>
                    </select>
                   <span class="text-danger"><?php echo form_error('location'); ?></span>
               </div>
             </div>

               <div class="col-md-6">
               <label for="user_type" class="control-label"> <span class="text-danger" ></span>User Role</label>
                <div class="form-group">
                  <select class="form-control" name="user_type" id="user_type" required="required" onchange="showDiv('hidden_div', this)">
                    <?php foreach ($user_type as $key) {
	?>

                       <option value="<?php echo $key['id']; ?>"<?php if ($key['id'] == $user['user_type']) {
		echo 'selected="selected"';
	}
	?>><?php echo $key['name']; ?></option>
                  <?php }?>
                    </select>
                   <span class="text-danger"><?php echo form_error('user_type'); ?></span>
               </div>
             </div>
              <div class="col-md-6" id="hidden_div">
              <label for="company_id" class="control-label"> <span class="text-danger"></span>Company Name</label>
                <div class="form-group">
                  <select class="form-control" name="company_id" id="company_id" required="required">
                    <?php foreach ($suppliers as $key) {
	?>

                        <option value="<?php echo $key['id']; ?>"<?php if ($key['id'] == $user['company_id']) {
		echo 'selected="selected"';
	}
	?>><?php echo $key['company_name']; ?></option>
                  <?php }?>
                    </select>
                  <span class="text-danger"><?php echo form_error('company_id'); ?></span>
               </div>
             </div>
              </div>
         </div>
      </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-success">
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
<script type="text/javascript">
  function showDiv(divId, element)
{
  // alert(element.value);
    document.getElementById(divId).style.display = element.value == 2 ? 'block' : 'none';
}
</script>
<?php $this->load->view('section/footer');?>
