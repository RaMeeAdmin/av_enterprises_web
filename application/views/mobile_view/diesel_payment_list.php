<?php  $this->load->view('section/mobile_header');?>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Diesel Payments Details</h3>
            <div class="box-tools">
              <!-- <a href="<?php echo site_url('diesel_payments/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Add Diesel Payments</a> --> </div>
            </div>
            <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Petrol Pumps Name</th>
                  <th>Paid To </th>
                  <th>Transpoter Name</th>
                  <th>Vehicle Number</th>
                  <th>Qty</th>
                  <th>Rate</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=$noof_page+1; 
                if(isset($diesel_payment) && $diesel_payment!=null)
                {
                 foreach($diesel_payment as $c){ ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $c['date']; ?></td>
                    <td><?php echo get_pumps_name($c['pump_id']); ?></td>
                    <td><?php echo $c['paid_to']; ?></td>
                    <td><?php echo get_transporter_name($c['transporter_id']); ?></td>
                    <td><?php echo get_vehicle_name($c['vehicle_id']); ?></td>
                    <td><?php echo $c['qty']; ?></td>
                    <td><?php echo $c['rate']; ?></td>
                   <td><?php echo $c['amount']; ?></td>
                   <!--  <td><?php echo $c['credit_days']; ?></td> -->
                  
                  <td><a href="<?php echo site_url('diesel_payments/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                <!--    <a
                   onclick="return confirm('Are you sure You want to delete?')"
                   href="<?php echo site_url('diesel_payments/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash">
                   </span> Delete</a> -->
                 </td>
               </tr>
             <?php }

           } ?>
         </tbody>
       </table>
     </div><!-- /.box-body -->
   </div><!-- /.box -->
 </div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->

<?php $this->load->view('section/mobile_footer');?>

<!-- SlimScroll -->

