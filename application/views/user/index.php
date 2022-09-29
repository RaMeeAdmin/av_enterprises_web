<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">User  List</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('user/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add Users</a> 
                </div>
              </div>
               <div class="box-body">
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="empTable" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Mobile number</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>User Type</th>
                    <th>Location</th>
                   
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- <?php $i=$noof_page+1; 
                   if(isset($user) && $user!=null)
                   {
                   foreach($user as $u){ ?>
                    <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $u['name']; ?></td>
                    <td><?php echo $u['mobile_number']; ?></td>
                    <td><?php echo $u['email']; ?></td>
                    <td><?php echo $u['username']; ?></td>
                    <td><?php echo get_usertype($u['user_type']); ?></td>
                    <td><?php $data= get_userlocation($u['location_id']);
                    foreach ($data as $key) {
                      echo $key['name'];
                    } ?></td>
                   
                      <td><label class="switch">
                    <?php if($u['isActive']=='Y'){ ?>
                      <input type="checkbox" checked id="<?php echo $u['id']; ?>" class="status_checks ?>" value="<?php echo $u['isActive']; ?>">
                    <?php }else{ ?>
                      <input type="checkbox" class="status_checks" value="<?php echo $u['isActive']; ?>" id="<?php echo $u['id']; ?>">
                    <?php } ?>

                    <span class="slider round"></span>
                  </label>
                </td>
                    <td><a href="<?php echo site_url('user/edit/'.$u['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                         <a onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('user/remove/'.$u['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                     </td>
                    </tr>
                     <?php }
                    
                           }

          ?> -->
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>
</div>
</section>
</div>

<?php $this->load->view('section/footer'); ?>
<script type="text/javascript">
   $(document).on('click','.status_checks',function()
         {  
        var status = ($('.status_checks')) ? 'Y' : 'N'; 
        var msg = (status=='Y')? 'Deactivate' : 'Activate'; 
        if(confirm("Are you sure to "+ msg))
        { 
            var current_element = $(this); 
            var id = $(current_element).attr('id');
          
            url = "<?php echo 
             site_url().'/user/update_status'?>"; 
                $.ajax({
                  type:"POST",
                  url: url, 
                  data: {"id":id,"status":status}, 
                  success: function(data) { 
                  location.reload();
            } });
         }  
         });
</script>
<script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>api/user/userList'
          },
          'columns': [
             { data: 'id'},
             { data: 'name'},
             { data: 'mobile_number'},
             { data: 'email'},
             { data: 'username'},
             { data: 'user_type'},
             { data: 'location_id'},
             {data:'href'},
           
          ]
        });
         });
      </script>
