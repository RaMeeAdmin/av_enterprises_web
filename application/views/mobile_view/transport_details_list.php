<?php $this->load->view('section/mobile_header');?>

  <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Transport Details  Listing</h3>
                <div class="box-tools">
                  <a href="<?php echo site_url('web_view/transport_details_add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Add Transport Details</a>
              </div>
          </div>
          <div class="box-body">
            <?php echo $this->session->flashdata('alert_msg'); ?>
            <div class="box-body table-responsive no-padding">
                <table id="example2" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Dc Number</th>
                            <th>Date</th>
                            <th>Supply form Name</th>
                            <th>Supply to Name</th>
                            <th>Transporter Name</th>
                            <th>Driver Name</th>
                            <th>Vehicle No</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $noof_page + 1;
               if (isset($transport_details) && $transport_details != null) {
	              foreach ($transport_details as $t) {?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $t['dc_number']; ?></td>
                                <td><?php echo $t['date']; ?></td>
                                <!--      <td><//?php echo $t['invoice_number']; ?></td> -->
                                <td><?php echo get_supplier_name($t['supply_form_id']); ?></td>
                                <td><?php echo get_customer_details($t['supply_to_id']); ?></td>
                                <td><?php echo get_transporter_name($t['transporter_id']); ?></td>
                                <td><?php echo $t['driver_name']; ?></td>
                                <td><?php echo get_vehicle_name($t['vehicle_id']); ?></td>
                                <td>
                                    <?php if ($t['is_deliver'] == 'N') {?>
                                        <a href="<?php echo site_url('Web_view/transport_details_edit/' . $t['id']); ?>" class="btn btn-info btn-xs" style="
                                        margin-bottom: 10px;
                                        "><span class="fa fa-pencil"></span> Edit</a>

                                    <?php }?>
                                    <a href="<?php echo site_url('Web_view/transport_details_diesel_print/' . $t['id']); ?>" class="btn btn-warning btn-xs" style="
                                    margin-bottom: 10px;
                                    "><span class="fa fa-print"></span> Diesel Print </a>
                                    <a href="<?php echo site_url('Web_view/transport_details_view_more/' . $t['id']); ?>" class="btn btn-info btn-xs" style="
                                    margin-bottom: 10px;
                                    "><span class="fa fa-eye"></span> View </a>
                                    <a href="<?php echo site_url('Web_view/transport_details_view_print/' . $t['id']); ?>" class="btn btn-info btn-xs" style="
                                    margin-bottom: 10px;
                                    "><span class="fa fa-print"></span> Print </a>
                       <!--   <a onclick="return confirm('Are you sure You want to delete?')"
                         href="<//?php echo site_url('transport_details/remove/' . $t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
                     </td>
                 </tr>
             <?php }

}

?>
     </tbody>
 </table>
 
</div>

</div>
</div>

</div>
</section>

<?php $this->load->view('section/mobile_footer');?>