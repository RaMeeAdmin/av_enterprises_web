<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Petrol Pumps  List</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('petrol_pumps/add'); ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"> </i> Add Petrol Pumps</a> 
            </div>
          </div>
          <div class="box-body"> 
           <?php echo $this->session->flashdata('alert_msg');?>
           <div class="box-body table-responsive no-padding">
            <table id="empTable" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Petrol pumps name</th>
                  <th>Address</th>
                  <th>Contact person name</th>
                  <th>Contact person number</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               <!--  <?php $i=$noof_page+1; 
                if(isset($petrol_pumps) && $petrol_pumps!=null)
                {
                 foreach($petrol_pumps as $p){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $p['petrol_pumps_name']; ?></td>
                    <td><?php echo $p['address']; ?></td>
                    <td><?php echo $p['contact_person_name']; ?></td>
                    <td><?php echo $p['contact_person_number']; ?></td>
                
                    
                    <td><a href="<?php echo site_url('petrol_pumps/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                     <a
                     onclick="return confirm('Are you sure You want to delete?')"
                     href="<?php echo site_url('petrol_pumps/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                   </td>
                 </tr>
               <?php }
               
             }

             ?> -->
           </tbody>
         </table>
       <!--   <div class="pull-right">
          <?php// echo $this->pagination->create_links(); ?> 
        </div> -->
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
             'url':'<?=base_url()?>api/petrol_pumps/pumpslist'
          },
          'columns': [
             { data: 'id'},
             { data: 'petrol_pumps_name'},
             { data: 'address'},
             { data: 'contact_person_name'},
             { data: 'contact_person_number'},
            {data:'href'},
           
          ]
        });
         });
      </script>
