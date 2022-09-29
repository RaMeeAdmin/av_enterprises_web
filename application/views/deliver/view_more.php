<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>

<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <div class="box-body">
             <section class="h-100 h-custom">
              <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                  <div class="col-lg-8 col-xl-6">
                    <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                      <div class="card-body p-5">
                        <p  style="color: #f37a27;text-align: center;">Delivery Receipt</p>
                        <div class="row">
                         <div class="col-md-6">
                          <div class="col mb-3">
                            <p id="date">Date : </p>
                          </div>
                          <div class="col mb-3">
                            <p id="so">S.O. No.:</p>
                          </div>
                           </div>
                            <div class="col-md-6">
                               <div class="col mb-3">
                            <p id="customer">Customer Name : </p>

                          </div>
                            <div class="col mb-3">
                            <p id="address">Customer Address : </p>
                          </div>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dynamic_field">
                            <tr>
                              <th>Material</th>
                              <th>Weight</th>
                              <th>Rate Per Tonne</th>
                              <th>Total</th>
                            </tr>


                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>
<?php $this->load->view('section/footer');?>
<script>
  var url = window.location.pathname;
  var id = url.substring(url.lastIndexOf('/') + 1);
  $.ajax({
   'url':'<?=base_url()?>api/purchase/view_sales_receipt',
   type: "POST",
   data:{'id':id},
   datatype:'json',
   success:function(response)
   {
    $("#customer").append(response.data.customer.name);
    $("#address").append(response.data.customer.address);

    var len = response.data.deliver.length;


     $("#date").append(response.data.sales.sale_date);
     $("#so").append(response.data.sales.sale_code);


    for( var i = 0; i<len; i++)
    {

      var name = response.data.deliver[i].name;
      var weight = response.data.deliver[i].weight;
      var total_cost = response.data.deliver[i].total_cost;
      var rate = response.data.deliver[i].rate;

      $("#dynamic_field").append("<tr><td>"+name+"</td><td>"+weight+"</td><td>"+rate+"</td><td>"+total_cost+"</td>"+
                        "</tr>");

    }

  }
});
</script>