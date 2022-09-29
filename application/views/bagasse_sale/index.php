<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Bagasse_sale List</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('bagasse_sale/add'); ?>" class="btn btn-primary btn-sm">Add Bagasse Sale</a> 
            </div>
          </div>
          <div class="box-body">
           <?php echo $this->session->flashdata('alert_msg');?>
           <div class="box-body table-responsive no-padding">
            <table id="example2" class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Supplier Name</th>
                  <th>Sale to</th>
                  <th>Vehicle Number</th>
                  <th>Loading</th>
                  <th>User</th>
                  <th>Material </th>
                  <th>Qty</th>
                  <th>Rate</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=$noof_page+1; 
                if(isset($bagasse_sale) && $bagasse_sale!=null)
                {
                 foreach($bagasse_sale as $b){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>

                    <td><?php echo $b['date']; ?></td>
                    <td><?php echo get_supplier_name($b['supplier_id']); ?></td>
                    <td><?php echo $b['sale_to']; ?></td>
                    <td><?php echo get_vehicle_name($b['vehicle_id']); ?></td>
                    <td><?php echo get_loading($b['loading']); ?></td>
                    <td><?php echo $b['user']; ?></td>
                    <td><?php echo get_material_name($b['material_id']); ?></td>
                    <td><?php echo $b['qty']; ?></td>
                    <td><?php echo $b['rate']; ?></td>
                    <td><?php echo $b['amount']; ?></td>

                    <td><a href="<?php echo site_url('bagasse_sale/edit/'.$b['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                      <!-- <a href="<?php echo site_url('bagasse_sale/view_more/'.$b['id']); ?>" class="btn btn-info btn-xs">  View More</a>  -->
                         <!-- <a
                            onclick="return confirm('Are you sure You want to delete?')"
                            href="<?php echo site_url('bagasse_sale/remove/'.$b['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
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

