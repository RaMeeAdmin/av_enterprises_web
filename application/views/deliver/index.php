<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Order Details</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('deliver/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i>Generate S.O.</a> </div>
            </div>
            <?php echo $this->session->flashdata('alert_msg'); ?>
            <div class="box-body">
              <table id="empTable" class="table table-bordered table-striped">
               <thead>
                <tr>
                 <th>Order Code</th>
                  <th>Order Date</th>
                  <th>Grand Total</th>
                  <th>Order Note</th>
                  <th>Paid Amount</th>
                  <th>Weight</th>
                  <th>Dispatch Weight</th>

                  <th>Action</th>
                </tr>
              </thead>

       </table>
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
             'url':'<?=base_url()?>api/purchase/list'
          },
          'columns': [
             { data: 'sale_code'},
             { data: 'sale_date'},

             { data: 'grand_total'},
             { data: 'sale_note'},
             { data: 'paid_amount'},
             { data: 'weight'},
            { data: 'weight_dispatch'},

             { data: 'href'},
          ]
        });
     });
     </script>
