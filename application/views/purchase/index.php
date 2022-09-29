<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Purchase Details</h3>
            <div class="box-tools">
              <a href="<?php echo site_url('purchase/add'); ?>" class="btn btn-primary btn-sm"> <i class="fa fa-plus"> </i>Generate P.O.</a> </div>
            </div>
            <?php echo $this->session->flashdata('alert_msg'); ?>
            <div class="box-body">
              <table id="empTable" class="table table-bordered table-striped">
               <thead>
                <tr>
                  <th>Purchase Code</th>
                  <th>Purchase Date</th>
                  <th>Due Date</th>
                  <th>Grand Total</th>
                  <th>Purchase Note</th>
                  <th>Paid Amount</th>
                  <th>Weight</th>

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
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Changes Prices</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form id="add_name" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="col-md-12">
           <label for="phone" class="control-label"> New Prices <span class="text-danger">*</span></label>
           <div class="form-group">
            <input type="text" id="price" name="price" maxlength="10"  class="form-control"  required/>
          <input type="hidden" name="id" id="id" maxlength="10"  class="form-control"  />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('section/footer');?>



     <!-- Script -->
     <script type="text/javascript">
         $(document).on('click', '.price', function(){
          var button_id = $(this).attr("id");
           $('#id').val(button_id);
        });
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>api/Purchase/empList'
          },
          'columns': [
             { data: 'purchase_code'},
             { data: 'purchase_date'},
             { data : 'due_date'},
             { data: 'grand_total'},
             { data: 'purchase_note'},
             { data: 'paid_amount'},
             { data: 'weight'},

             { data: 'href'},
          ]
        });
     });
      $('#submit').click(function()
        {
           var price=$("#price").val();
          var id=$("#id").val();
           if(price=="")
          {
           alert("Price is Required!" );
            document.getElementById("price").focus();
            return false;
          }
          $.ajax({
     'url':'<?=base_url()?>api/purchase/price_change',
      type: "POST",
      data: {id:id,price:price},
      datatype:'json',
      success:function(data)

      {

       alert('Price Successfully Changes.');
window.location = "<?=base_url()?>purchase";

      }

    });
 });
     </script>
