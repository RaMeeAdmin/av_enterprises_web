<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Vehicle Owner List</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('transporter/add'); ?>" class="btn btn-primary btn-sm">  <i class="fa fa-plus"> </i> Add</a>
            </div>
          </div>
          <div class="box-body">
           <?php echo $this->session->flashdata('alert_msg'); ?>
           <div class="box-body table-responsive no-padding">
            <table id="empTable" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Owner name</th>
                  <th>Address</th>
                  <th>Contact person name</th>
                  <th>Contact person number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
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
<?php $this->load->view('section/footer');?>
<script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>api/transporter/transporterList'
          },
          'columns': [
             { data: 'id'},
             { data: 'owner_name'},
             { data: 'address'},
             { data: 'contact_person_name'},
             { data: 'contact_person_number'},
            {data:'href'},

          ]
        });
         });
      </script>

