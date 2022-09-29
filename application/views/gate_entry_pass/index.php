<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Gate Entry Pass List</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('gate_entry_pass/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Add Gate Pass</a> 
            </div>
          </div>
           <div class="box-body">
            <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
              <table id="example2" class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>तारीख</th>
                    <th>प्रति</th>
                    <th>महाशय</th>
                    <th>ठिकाण</th>
                    <th>ट्रक नंबर</th>
                    <th>गेटपास या नावाने करणे</th>
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
                      <td><?php echo $g['company_name']; ?></td>
                      <td><?php echo $g['gate_pass_given_to']; ?></td>
                      <td><?php echo $g['place']; ?></td>
                      <td><?php echo $g['vehicle_number']; ?></td>
                      <td><?php echo $g['gat_pass_create_with_name']; ?></td>

                      <td><a href="<?php echo site_url('gate_entry_pass/edit/'.$g['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                        <a href="<?php echo site_url('gate_entry_pass/view_more/'.$g['id']); ?>" class="btn btn-info btn-xs">  View </a> 
                      <!--  <a
                        onclick="return confirm('Are you sure You want to delete?')"
                        href="<//?php echo site_url('gate_entry_pass/remove/'.$g['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>-->
                      </td>
                    </tr>
                  <?php }

                }

                ?>
              </tbody>
            </table>
            <div class="pull-right">
              <?php echo $this->pagination->create_links(); ?> 
            </div>
          </div>

        </div>
      </div>

    </div>
  </section><!-- /.content -->
</div>
<?php $this->load->view('section/footer'); ?>
