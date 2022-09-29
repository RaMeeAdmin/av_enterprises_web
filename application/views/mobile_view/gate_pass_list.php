<?php $this->load->view('section/mobile_header');?>

  <section class="content">
    
     
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Gate Entry Pass List</h3>
            <!-- <div class="box-tools">
              <a href="<?php echo site_url('web_view/getpass_add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Add Gate Pass</a> 
            </div> -->
          </div>
           <div class="box-body">
            <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Gate Pass For</th>
                    <th>Gate Pass Given To</th>
                    <th>Place</th>
                    <th>Truck Number</th>
                    <th>Gat Pass Create With Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=$noof_page+1; 
                  if(isset($gate_entry_pass) && $gate_entry_pass!=null)
                  {
                    
                   foreach($gate_entry_pass as $g){ ?>
                    <tr>
                      <td><?php echo $i++; ?></td>
                      <td><?php echo $g['date']; ?></td>
                      <td><?php echo $g['gate_pass_for']; ?></td>
                      <td><?php echo $g['gate_pass_given_to']; ?></td>
                      <td><?php echo $g['place']; ?></td>
                      <td><?php echo $g['vehicle_number']; ?></td>
                      <td><?php echo $g['gat_pass_create_with_name']; ?></td>

                      <td><a href="<?php echo site_url('web_view/getpass_edit/'.$g['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                        <a href="<?php echo site_url('web_view/getpass_print/'.$g['id']); ?>" class="btn btn-info btn-xs"> <i class="fa fa-print"></i> Print </a> 
                       <!--  <a
                        onclick="return confirm('Are you sure You want to delete?')"
                        href="<?php echo site_url('gate_entry_pass/remove/'.$g['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                      </td>
                    </tr>
                  <?php }

                }

                ?>
              </tbody>
            </table>
           
          </div>

        </div>
     
<!-- /.content -->
</div>
<?php $this->load->view('section/mobile_footer');?>
