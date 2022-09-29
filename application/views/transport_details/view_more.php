<?php $this->load->view('section/header');?>
<?php $this->load->view('section/sidebar');?>
<style type="text/css">
  @media print {
    #printPageButton {
      display: none;
    }
  }
  td{
    font-size: 16px;
     font-family: Arial, Helvetica, sans-serif;
  }
  .box{
    border-top:aliceblue;
  }
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">

           <div class="box-body">
              <table border="1" cellpadding="1" cellspacing="0" style="width:100%">
        <tbody>
                <tr>
                        <td colspan="3" style="width:564px">&nbsp;DC No :&nbsp;<b><?php echo $transport_details['dc_number']; ?></b></td>
                        <td style="width:316px">&nbsp;Invoice No :&nbsp;<b><?php echo $transport_details['invoice_number']; ?></b></td>
                        <td colspan="2" style="width:365px">&nbsp;Date :&nbsp;<b><?php echo date("d-m-Y", strtotime($transport_details['date'])); ?></b></td>
                </tr>
                <tr>
                        <td colspan="2" style="width:275px">&nbsp;Supply From</td>
                        <td style="width:249px">&nbsp;<?php echo get_supplier_name($transport_details['supply_form_id']); ?></td>
                        <td style="width:316px">&nbsp;Supply To</td>
                        <td colspan="2" style="width:365px">&nbsp;<?php echo get_customer_details($transport_details['supply_to_id']); ?></td>
                </tr>
                <tr>
                        <td colspan="2" style="width:275px">&nbsp;Fill Wt Rec No.</td>
                        <td style="width:249px">&nbsp;</td>
                        <td style="width:316px">&nbsp;Del Wt&nbsp;Rec No.</td>
                        <td colspan="2" style="width:365px">&nbsp;</td>
                </tr>
                <tr>
                        <td colspan="2" style="width:275px">&nbsp;Loading</td>
                        <td style="width:249px">&nbsp;<?php echo $transport_details['name']; ?></td>
                        <td style="width:316px">&nbsp;Unloading</td>
                        <td colspan="2" style="width:365px">&nbsp;<?php echo get_labour_name($transport_details['unloading_id']) ?></td>
                </tr>
                <tr>
                        <td colspan="2" style="width:275px">&nbsp;Driver Name</td>
                        <td style="width:249px">&nbsp;<?php echo $transport_details['driver_name']; ?></td>
                        <td style="width:316px">&nbsp;Vehicle No</td>
                        <td colspan="2" style="width:365px">&nbsp;<?php echo get_vehicle_name($transport_details['vehicle_id']); ?></td>
                </tr>
                <tr>
                        <td colspan="2" style="width:275px">&nbsp;Driver License/Driver Mobile</td>
                        <td style="width:249px">&nbsp;<?php $owner_details = get_owner_details(@$transport_details['vehicle_owner_id']);

echo $owner_details['contact_person_number'];
?></td>

                        <td colspan="2" style="width:275px">&nbsp;Transporter</td>
                        <td style="width:249px">&nbsp;<?php echo get_transporter_name($transport_details['transporter_id']); ?></td>
                </tr>
                <tr>
                        <td style="width:316px">&nbsp;Material Transported</td>
                        <td colspan="2" style="width:365px">&nbsp;<?php echo get_material_name($transport_details['material_id']); ?></td>
                        <td style="width:316px">&nbsp;PAN No. <?php echo @$transport_details['pan']; ?></td>
                        <td colspan="2" style="width:365px">Created By :&nbsp;</td>
                </tr>
        </tbody>
</table>

<p>&nbsp;</p>

<table border="1" cellpadding="1" cellspacing="0" style="width:100%">
        <tbody>
                <tr>
                        <td style="background-color:#aaaaaa; text-align:center; width:148px">&nbsp;</td>
                        <td style="background-color:#aaaaaa; text-align:center; width:127px"><strong>Quantity</strong></td>
                        <td style="background-color:#aaaaaa; text-align:center; width:106px"><strong>Rate</strong></td>
                        <td style="background-color:#aaaaaa; text-align:center; width:135px"><strong>Amount</strong></td>
                        <td style="background-color:#aaaaaa; text-align:center; width:162px"><strong>Advances</strong></td>
                        <td style="background-color:#aaaaaa; text-align:center; width:154px"><strong>Amount</strong></td>
                        <td style="background-color:#aaaaaa; text-align:center; width:152px"><strong>Advances</strong></td>
                        <td style="background-color:#aaaaaa; text-align:center"><strong>Amount</strong></td>
                </tr>
                <tr>
                        <td style="width:148px">&nbsp;Challan Weight</td>
                        <td style="width:127px;text-align: center;">&nbsp;<?php echo number_format((float) $transport_details['chalan_weight'], 2, '.', ''); ?> Tons</td>
                        <td style="width:106px;text-align: center;">&nbsp;<?php echo $chalan_rate = number_format((float) $transport_details['chalan_rate'], 2, '.', ''); ?></td>
                        <td style="width:135px;text-align: center;">&nbsp;<?php echo number_format((float) $transport_details['chalan_amount'], 2, '.', ''); ?></td>
                        <td style="width:162px;">&nbsp;Cheque Advance</td>
                        <td style="width:154px;">&nbsp;<?php echo number_format((float) $transport_details['cheque_amount'], 2, '.', ''); ?></td>
                        <td style="width:152px;">&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>
                <tr>
                        <td style="width:148px">&nbsp;Delivery Weight</td>
                        <td style="width:127px;text-align: center;">&nbsp;<?php echo number_format((float) $transport_details['delivery_weight'], 2, '.', ''); ?> Tons</td>
                        <td style="width:106px;text-align: center;">&nbsp;<?php echo $delivery_rate = number_format((float) $transport_details['delivery_rate'], 2, '.', ''); ?></td>
                        <td style="width:135px;text-align: center;">&nbsp;<?php echo number_format((float) $transport_details['delivery_amount'], 2, '.', ''); ?></td>
                        <td style="width:162px">&nbsp;Cash&nbsp;Advance</td>
                        <td style="width:154px">&nbsp;<?php echo number_format((float) $transport_details['cash_amount'], 2, '.', ''); ?></td>
                        <td style="width:152px">&nbsp;Balance Amount</td>
                        <td>&nbsp; <?php $total = $transport_details['total_advance'] - $transport_details['difference_amount'] ;
echo number_format((float) $total, 2, '.', '');?></td>
                </tr>
                <tr>
                        <td style="background-color:#dddddd; width:148px">&nbsp;Difference</td>
                        <td style="background-color:#dddddd; width:127px;text-align: center;"><?php echo number_format((float) $transport_details['difference_qty'], 2, '.', ''); ?> Tons</td>
                        <td style="background-color:#dddddd; width:106px;text-align: center;"><?php $t = $chalan_rate - $delivery_rate;
echo number_format((float) $t, 2, '.', '');?></td>
                        <td style="background-color:#dddddd; width:135px;text-align: center;" ><?php echo number_format((float) $transport_details['difference_amount'], 2, '.', ''); ?></td>
                        <td style="width:162px">&nbsp;Diesel&nbsp;Advance</td>
                        <td style="width:154px">&nbsp;<?php echo number_format((float) $transport_details['diesel_advance'], 2, '.', ''); ?></td>
                        <td style="width:152px">&nbsp;Balance Pending</td>
                        <td>&nbsp; <?php $total = $transport_details['total_advance'] - $transport_details['difference_amount'];
echo number_format((float) $total, 2, '.', '');?></td>
                </tr>
                <?php $i = 1;
$diesel_amount = 0;foreach ($diesel_transaction as $dt) {
	?>
      <tr>


        <td style="width:249px;text-align:center;" >&nbsp;<?php echo get_pumps_name($dt['pumps_id']); ?></td>
        <td style="width:316px;text-align:center;">&nbsp;<?php echo number_format((float) $dt['diesel_qty'], 2, '.', ''); ?> Ltr</td>
        <td style="width:125px;text-align:center;">&nbsp;<?php echo number_format((float) $dt['diesel_rate'], 2, '.', ''); ?></td>
        <td style="width:267px;text-align:center;">&nbsp;<?php echo number_format((float) $dt['diesel_amount'], 2, '.', '');
	$diesel_amount += number_format((float) $dt['diesel_amount'], 2, '.', ''); ?></td>
        <?php if ($i == '1') {?>
           <td style="width:162px">&nbsp;RTGS&nbsp;Advance&nbsp;</td>
                        <td style="width:154px">&nbsp;<?php echo number_format((float) $transport_details['rtgs_amount'], 2, '.', ''); ?></td>
                        <td style="width:152px">&nbsp;Balance Paid</td>
                        <td>&nbsp;0.00</td>
                        <?php}else{  ?>
                        <?php }?>
      </tr>
      <?php $i++;}?>

                <tr>
                        <td style="width:148px">&nbsp;</td>
                        <td style="width:127px">&nbsp;</td>
                        <td style="width:106px">&nbsp;</td>
                        <td style="width:135px">&nbsp;</td>
                        <td style="background-color:#dddddd; width:162px"><strong>&nbsp;Total Advance</strong></td>
                        <td style="background-color:#dddddd; width:154px">&nbsp;<?php echo number_format((float) $transport_details['total_advance'], 2, '.', ''); ?></td>
                        <td style="background-color:#dddddd; width:152px"><strong>&nbsp;Balance</strong></td>
                        <td style="background-color:#dddddd">&nbsp; <?php $total =   $transport_details['total_advance'] - $transport_details['difference_amount'];
echo number_format((float) $total, 2, '.', '');?></td>
                </tr>
                <tr>
                        <td style="width:148px">&nbsp;</td>
                        <td style="width:127px">&nbsp;</td>
                        <td style="width:106px">&nbsp;</td>
                        <td style="width:135px">&nbsp;</td>
                        <td style="width:162px">&nbsp;</td>
                        <td style="width:154px">&nbsp;</td>
                        <td style="width:152px">&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>
                <tr>
                        <td style="width:148px">&nbsp;</td>
                        <td style="width:127px">&nbsp;</td>
                        <td style="width:106px">&nbsp;</td>
                        <td style="width:135px">&nbsp;</td>
                        <td style="width:162px">&nbsp;Loading</td>
                        <td style="width:154px">&nbsp;<?php echo get_loading($transport_details['loading_id']); ?></td>
                        <td style="width:152px">&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>
        </tbody>
</table>

<p>&nbsp;</p>

<p><strong>Cheque Paid Details</strong></p>

<table border="1" cellpadding="1" cellspacing="0" style="width:100%">
        <tbody>
                <tr>
                        <td style="background-color:#dddddd; text-align:center; width:358px"><strong>Cheque / RTGS Details</strong></td>
                        <td style="background-color:#dddddd; text-align:center; width:152px"><strong>Date</strong></td>
                        <td style="background-color:#dddddd; text-align:center; width:208px"><strong>Paid By</strong></td>
                        <td style="background-color:#dddddd; text-align:center; width:253px"><strong>Paid To</strong></td>
                        <td style="background-color:#dddddd; text-align:center"><strong>Amount</strong></td>
                </tr>
                <tr>
                        <td style="text-align:center; width:358px">&nbsp;</td>
                        <td style="text-align:center; width:152px">&nbsp;</td>
                        <td style="text-align:center; width:208px">&nbsp;</td>
                        <td style="text-align:center; width:253px">&nbsp;</td>
                        <td style="text-align:center">&nbsp;</td>
                </tr>
        </tbody>
</table>

<p>&nbsp;</p>


</div>
<!-- <div class="box-footer">
  <button class="btn btn-primary" id="printPageButton" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
</div> -->
</div>
</div>
</div>

</section>
</div>
<?php $this->load->view('section/footer');?>
