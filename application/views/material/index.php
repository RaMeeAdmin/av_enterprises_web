<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Material  List</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('material/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"></i> Add Material</a> 
            </div>
          </div>
          <div class="box-body"> 
           <?php echo $this->session->flashdata('alert_msg');?>
           <div class="box-body table-responsive no-padding">
            <table id="empTable" class="table table-striped">
              <thead>
                <tr>
                <!--   <th>#</th> -->
                  <th>Code</th>
                  <th>Name</th>
                 <!--  <th>Quantity</th> -->
                 <!--  <th>Status</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <!--  <?php $i=$noof_page+1; 
                if(isset($material) && $material!=null)
                {
                 foreach($material as $m){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                   <td><?php echo $m['date']; ?></td> 
                    <td><?php echo $m['name']; ?></td>
              
                    <td><a href="<?php echo site_url('material/edit/'.$m['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                     <a
                     onclick="return confirm('Are you sure You want to delete?')"
                     href="<?php echo site_url('material/remove/'.$m['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                   </td>
                 </tr>
               <?php }
             }
             ?> -->
           </tbody>
         </table>
         <div class="pull-right">
          <?php echo $this->pagination->create_links(); ?> 
        </div>
      </div>

    </div>
  </div>

</div>

</section>
</div>
<?php $this->load->view('section/footer'); ?>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>api/material/empList'
          },
          'columns': [
             { data: 'code'},
             { data: 'name'},
             { data: 'href'},
           
          ]
        });
        $('.is_remove').click(function(){
          alert('hii');exit();
           var fired_button = $(this).val();
        alert(fired_button);
      });
     });
     </script>