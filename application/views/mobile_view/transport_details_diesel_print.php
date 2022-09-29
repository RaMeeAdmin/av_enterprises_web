<?php $this->load->view('section/mobile_header');?>
<style type="text/css">
  @media print {
  #printPageButton {
    display: none;
  }
}

 .box{
    border-top:aliceblue;
  }
</style>

  <section class="content">
<div class="row">
    <div class="col-md-12">
    <div class="box">

 <?php foreach ($diesel_transaction as $dt) {?>
<h1 style="text-align:center"><strong>&nbsp;A.V. Enterprises</strong></h1>

<p style="text-align:right"><strong>Petrol Pump Challan</strong></p>

<table border="1" cellpadding="1" cellspacing="0" style="width:100%">
        <tbody>
                <tr>
                        <td style="width:523px"><span style="font-size:18px">&nbsp; Bill No : <?php echo '00' . $dt['id'] ?></span></td>
                        <td style="width:661px"><span style="font-size:18px">&nbsp;Date :<?php echo date('d-m-Y', strtotime($dt['created_at'])) ?></span></td>
                </tr>
                <tr>
                        <td style="width:523px; text-align:center;"><span style="font-size:18px">&nbsp;Address : Anand Heritage, C-108, 1st Floor, Bori Pardhi  Kedgaon, Tal. Daund, Dist. Pune, Pin - 412203</span></td>
                        <td style="width:661px"><span style="font-size:18px">&nbsp;E-mail : sales.aventerprise@gmail.com</span></td>
                </tr>
                <tr>
                      <td colspan="2" style="width:523px"><span style="font-size:18px">&nbsp;Name of Petrol Pump :&nbsp; <?php echo get_pumps_name($dt['pumps_id']) ?></span></td>
                </tr>
                <tr>
                        <td style="width:523px"><span style="font-size:18px">&nbsp;Driver Name :&nbsp;<?php echo $dt['driver_name']; ?></span></td>
                        <td style="width:661px"><span style="font-size:18px">&nbsp;Vehicle Number :&nbsp; <?php echo $dt['vehicle_number']; ?></span></td>
                </tr>
                <tr>
                        <td style="width:523px"><span style="font-size:18px">&nbsp;Diesel Ltr :&nbsp;<?php echo number_format((float) $dt['diesel_qty'], 2, '.', ''); ?></span></td>
                        <td style="width:661px"><span style="font-size:18px">&nbsp;Diesel Amount :&nbsp; <?php echo number_format((float) $dt['diesel_amount'], 2, '.', ''); ?></span></td>
                </tr>
                <tr>
                        <td colspan="2" style="width:523px"><span style="font-size:18px">&nbsp;Amount in words :&nbsp;<?php echo getIndianCurrency($dt['diesel_amount']) ?></span></td>
                </tr>
                <tr>
                        <td style="width:523px">
                        <p style="text-align:center">&nbsp;</p>

                        <p style="text-align:center">&nbsp;</p>

                        <p style="text-align:center"><span style="font-size:18px"><strong>&nbsp;Driver&#39;s Sign</strong></span></p>
                        </td>
                        <td style="width:661px">
                        <p style="text-align:center"><span style="font-size:18px">&nbsp;Supervisor</span></p>

                        <p style="text-align:center">&nbsp;</p>

                        <p style="text-align:center"><span style="font-size:18px"><strong>&nbsp;M/s. A.V. Enterprises</strong></span></p>
                        </td>
                </tr>
        </tbody>
</table>
<?php }?>
<p>&nbsp;</p>

</br>
<button class="btn btn-primary" id="printPageButton" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
</section><!-- /.content -->

<?php $this->load->view('section/mobile_footer');?>