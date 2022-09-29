<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Vendor Payment Listing</h3>
              <div class="box-tools">
                <a href="<?php echo site_url('receipts_payment/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i> Add</a> 
                </div>
                   </div>
   <?php echo $this->session->flashdata('alert_msg');?>
            <div class="box-body table-responsive no-padding">
                <table id="example2" class="table table-striped">
                    <thead>
                    <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Voucher no</th>
                    <th>Payment type</th>
                    <th>From to bank</th>
                    <th>Party Name</th>
                    <th>Amount</th>
                    <th>Remark</th>
                    <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=$noof_page+1; 
           if(isset($receipts_payment) && $receipts_payment!=null)
           {
           foreach($receipts_payment as $r){ ?>
                    <tr>
                    <td ><?php echo $i++; ?></td>
                  
                    <td><?php echo date("d-m-Y", strtotime($r['date']));?></td>
                    <td><?php echo $r['voucher_no']; ?></td>
                    <td><?php echo $r['payment_type']; ?></td>
                    <td><?php echo getbankname($r['bank_id']); ?></td>
                    <!-- <td><?php echo $r['user_type']; ?></td> -->
                    <td><?php echo get_customer_details($r['customer_id']); ?></td>
                    <!-- <td><?php echo $r['supplier_id']; ?></td>
                    <td><?php echo $r['vehicle_id']; ?></td>
                    <td><?php echo $r['supervisor_id']; ?></td>
                    <td><?php echo $r['pump_id']; ?></td> -->
                    
                    <td><?php echo $r['amount']; ?></td>
                   <td><?php echo $r['remark']; ?></td>
                     <td><a href="<?php echo site_url('receipts_payment/edit/'.$r['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
 <a href="<?php echo site_url('receipts_payment/view_more/'.$r['id']); ?>" class="btn btn-info btn-xs">  View </a>               
     <!--<a onclick="return confirm('Are you sure You want to delete?')"
                             href="<?php echo site_url('receipts_payment/remove/'.$r['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a> -->
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
</section>
</div>
<?php $this->load->view('section/footer');?>
