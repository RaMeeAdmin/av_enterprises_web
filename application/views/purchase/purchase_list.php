<?php $this->load->view('section/mobile_header');?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Purchase Details</h3>
            <div class="box-tools">
             <!--  <a href="<?php echo site_url('Web_view/add_purchase_order'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i></a> </div> -->
            </div>
            <?php echo $this->session->flashdata('alert_msg'); ?>
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>#</th>
                  <th>Purchase Code</th>
                  <th>Purchase Date</th>
                  <th>Grand Total</th>
                  <th>Purchase Note</th>
                  <th>Paid Amount</th>
                  <th>Weight</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
$i = 1;
foreach ($purchase as $row) {
	?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['purchase_code']; ?></td>
                    <td><?php echo $row['purchase_date']; ?></td>
                    <td><?php echo $row['grand_total']; ?></td>
                    <td><?php echo $row['purchase_note']; ?></td>
                    <td><?php echo $row['paid_amount']; ?></td>
                  <td><?php echo $row['weight']; ?></td>

                 <!--  <td><a href="<?php echo site_url('customer/edit/' . $row['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a>
                   <a
                   onclick="return confirm('Are you sure You want to delete?')"
                   href="<?php echo site_url('customer/remove/' . $row['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash">
                   </span> Delete</a>
                 </td> -->
                  <td>
                    <a href="#" class="btn btn-info btn-xs"><span class="fa fa-money"></span> Make Payment</a>

                    <a href="<?php echo site_url('purchase/view_more/' . $row['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-eye"></span> View</a>
                  </td>
               </tr>
             <?php

}?>
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>


<?php $this->load->view('section/mobile_footer');?>


