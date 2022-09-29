<?php $this->load->view('section/mobile_header');?>
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
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">

         <div class="box-body">
          <h2 style="text-align:center">&nbsp;<strong>AV Enterprises</strong></h2>

          <p style="text-align:center"><strong>KEDGAON, TAL.DAUND, DIST.PUNE</strong></p>

          <p style="text-align:center">GST No. 27ABBFA3576F1ZK</p>
          <p style="text-align:right"><strong>&nbsp;Transport Receipt</strong></p>
          <table border="1" cellpadding="1" cellspacing="1" style="width:100%">
            <tbody>
              <tr>
                <td colspan="2" style="width:564px">&nbsp; DC No :&nbsp;<b><?php echo $transport_details['dc_number']; ?></b></td>
                <td style="width:316px"> &nbsp;Invoice No :&nbsp;<b><?php echo $transport_details['invoice_number']; ?></b></td>
                <td colspan="2" style="width:365px">&nbsp;Date :&nbsp;<b><?php echo date("d-m-Y", strtotime($transport_details['date'])); ?></b></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Supply From</td>
                <td style="width:249px">&nbsp;<?php echo get_supplier_name($transport_details['supply_form_id']); ?></td>
                <td style="width:316px">&nbsp;Supply To</td>
                <td colspan="2" style="width:365px">&nbsp;<?php echo get_customer_details($transport_details['supply_to_id']); ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Fill Wt Rec No.</td>
                <td style="width:249px">&nbsp;</td>
                <td style="width:316px">&nbsp;Del Wr Rec No.</td>
                <td colspan="2" style="width:365px">&nbsp;</td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Loading</td>
                <td style="width:249px">&nbsp;<?php echo $transport_details['name']; ?></td>
                <td style="width:316px">&nbsp;Unloading</td>
                <td colspan="2" style="width:365px">&nbsp;<?php echo get_labour_name($transport_details['unloading_id']) ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Driver Name</td>
                <td style="width:249px">&nbsp;<?php echo $transport_details['driver_name']; ?></td>
                <td style="width:316px">&nbsp;Vehicle No</td>
                <td colspan="2" style="width:365px">&nbsp;<?php echo get_vehicle_name($transport_details['vehicle_id']); ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Driver License</td>
                <td style="width:249px">&nbsp;<?php echo @$transport_details['license_number']; ?></td>
                <td style="width:316px">&nbsp;Driver Mobile</td>
                <td colspan="2" style="width:365px">&nbsp;<?php $owner_details = get_owner_details(@$transport_details['vehicle_owner_id']);

echo $owner_details['contact_person_number'];
?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Transporter</td>
                <td style="width:249px">&nbsp;<?php echo get_transporter_name($transport_details['transporter_id']); ?></td>
                <td style="width:316px">&nbsp;PAN No.</td>
                <td colspan="2" style="width:365px">&nbsp;<?php echo $owner_details['pan_number']; ?></td>
              </tr>
              <tr>
                <td style="background-color:#aaaaaa; text-align:center; width:275px"><strong>&nbsp;Material Transported</strong></td>
                <td style="background-color:#aaaaaa; text-align:center; width:249px"><strong>&nbsp;Challan Weight / Quantity</strong></td>
                <td style="background-color:#aaaaaa; text-align:center; width:316px"><strong>&nbsp;Rate</strong></td>
                <td colspan="2" style="background-color:#aaaaaa; text-align:center; width:365px"><strong>Amount</strong></td>
              </tr>
              <tr>
                <td style="width:275px; text-align:center;">&nbsp;<?php echo get_material_name($transport_details['material_id']); ?></td>
                <td style="width:249px;text-align:center;">&nbsp;
                  <?php echo number_format((float) $transport_details['chalan_weight'], 2, '.', ''); ?>
                </td>
                <td style="width:316px;text-align:center;">&nbsp;
                  <?php echo number_format((float) $transport_details['chalan_rate'], 2, '.', ''); ?>
                </td>
                <td colspan="2" style="width:365px;text-align:center;">&nbsp;
                  <?php echo number_format((float) $transport_details['chalan_amount'], 2, '.', ''); ?>
                </td>
              </tr>

              <tr>
                <td colspan="5" style="background-color:#aaaaaa; text-align:center; width:589px"><strong>&nbsp;ADVANCE</strong></td>
              </tr>
              <tr>
                <td style="background-color:#dddddd; text-align:center; width:275px"><strong>&nbsp;Type</strong></td>
                <td style="background-color:#dddddd; text-align:center; width:249px"><strong>&nbsp;Description</strong></td>
                <td style="background-color:#dddddd; text-align:center; width:316px"><strong>&nbsp;Quantity</strong></td>
                <td style="background-color:#dddddd; text-align:center; width:125px"><strong>&nbsp;Rate</strong></td>
                <td style="background-color:#dddddd; text-align:center; width:267px"><strong>&nbsp;Amount</strong></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;
                  <?php echo 'Cheque Advance'; ?>
                </td>
                <td style="width:249px">&nbsp;</td>
                <td style="width:316px">&nbsp;</td>
                <td style="width:125px">&nbsp;</td>
                <td style="width:267px; text-align:center;" >&nbsp;<?php echo number_format((float) $transport_details['cheque_amount'], 2, '.', ''); ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;
                  <?php echo 'Diesel Advance'; ?>
                </td>
                <td style="width:249px">&nbsp;</td>
                <td style="width:316px">&nbsp;</td>
                <td style="width:125px">&nbsp;</td>
                <td style="width:267px;text-align:center;">&nbsp;<?php echo number_format((float) $transport_details['diesel_advance'], 2, '.', ''); ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;
                  <?php echo 'Cash Advance'; ?>
                </td>
                <td style="width:249px">&nbsp;</td>
                <td style="width:316px">&nbsp;</td>
                <td style="width:125px">&nbsp;</td>
                <td style="width:267px;text-align:center;">&nbsp;<?php echo number_format((float) $transport_details['cash_amount'], 2, '.', ''); ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;
                  <?php echo 'RTGS Advance'; ?>
                </td>
                <td style="width:249px">&nbsp;</td>
                <td style="width:316px">&nbsp;</td>
                <td style="width:125px">&nbsp;</td>
                <td style="width:267px;text-align:center;">&nbsp;<?php echo number_format((float) $transport_details['rtgs_amount'], 2, '.', '');
$advance_amount = number_format((float) $transport_details['total_advance'], 2, '.', ''); ?></td>
              </tr>
              <?php $i = 1;
$diesel_amount = 0;foreach ($diesel_transaction as $dt) {
	?>
                <tr>

                  <td style="width:275px">&nbsp;Diesel Pump <?php echo $i++; ?></td>
                  <td style="width:249px;text-align:center;" >&nbsp;<?php echo get_pumps_name($dt['pumps_id']); ?></td>
                  <td style="width:316px;text-align:center;">&nbsp;<?php echo number_format((float) $dt['diesel_qty'], 2, '.', ''); ?></td>
                  <td style="width:125px;text-align:center;">&nbsp;<?php echo number_format((float) $dt['diesel_rate'], 2, '.', ''); ?></td>
                  <td style="width:267px;text-align:center;">&nbsp;<?php echo number_format((float) $dt['diesel_amount'], 2, '.', '');
	$diesel_amount += number_format((float) $dt['diesel_amount'], 2, '.', ''); ?></td>

                </tr>
              <?php }?>

              <tr>
                <td colspan="2" style="width:564px">&nbsp;</td>
                <td colspan="2" rowspan="1" style="text-align:right; width:413px">Total Advance &nbsp;</td>
                <td style="width:267px;text-align:center;">&nbsp;<?php $total = $advance_amount + $diesel_amount;
echo number_format((float) $total, 2, '.', '');?></td>
              </tr>
              <tr>
                <td colspan="5" style="width:548px">&nbsp;Amount in words :&nbsp;<?php echo getIndianCurrency($total); ?></td>
              </tr>
              <tr>
                <td colspan="5" style="width:548px">
                  <p><span style="font-size:9px">&nbsp;Terms and Conditions</span></p>

                  <p><span style="font-size:9px">&nbsp;1. Unloading of goods shipped as above. 2. Fare deduction if there is a shortage of more than 100 kg. 3. Receipt of goods will be mandatory and the acknowledgement should have the company&#39;s stamp on it</span></p>
                </td>
              </tr>
              <tr>
                <td style="width:275px">
                  <p>&nbsp;</p>

                  <p>&nbsp;Factory Stamp</p>
                </td>
                <td colspan="2" rowspan="1" style="width:249px">
                  <p>&nbsp;</p>

                  <p>&nbsp;Driver Sign and Mobile Number</p>
                </td>
                <td colspan="2" style="width:365px">
                  <p>&nbsp;Mobile :&nbsp;9697979765</p>

                  <p>&nbsp;For AV Enterprises</p>
                </td>
              </tr>
            </tbody>
          </table>

          <h2 style="text-align:center"><strong>AV Enterprises</strong></h2>

          <p style="text-align:center"><strong>KEDGAON, TAL.DAUND, DIST.PUNE</strong></p>

          <p style="text-align:center">&nbsp;GST No. 27ABBFA3576F1ZK</p>

          <p style="text-align:right"><strong>&nbsp;Factory Receipt</strong></p>

          <table border="1" cellpadding="1" cellspacing="1" style="width:100%">
            <tbody>
              <tr>
                <td colspan="2" style="width:564px">&nbsp;DC No :&nbsp;<b><?php echo $transport_details['dc_number']; ?></b></td>
                <td style="width:316px">&nbsp;Invoice No :&nbsp;<b><?php echo $transport_details['invoice_number']; ?></b></td>
                <td colspan="2" style="width:365px">&nbsp;Date :&nbsp;<b><?php echo date("d-m-Y", strtotime($transport_details['date'])); ?></b></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Supply From</td>
                <td style="width:249px">&nbsp;<?php echo get_supplier_name($transport_details['supply_form_id']); ?></td>
                <td style="width:316px">&nbsp;Supply To</td>
                <td colspan="2" style="width:365px">&nbsp;<?php echo get_customer_details($transport_details['supply_to_id']); ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Fill Wt Rec No.</td>
                <td style="width:249px">&nbsp;</td>
                <td style="width:316px">&nbsp;Del Wt&nbsp;Rec No.</td>
                <td colspan="2" style="width:365px">&nbsp;</td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Driver Name</td>
                <td style="width:249px">&nbsp;<?php echo $transport_details['driver_name']; ?></td>
                <td style="width:316px">&nbsp;Vehicle No</td>
                <td colspan="2" style="width:365px">&nbsp;<?php echo get_vehicle_name($transport_details['vehicle_id']); ?></td>
              </tr>
              <tr>
                <td style="width:275px">&nbsp;Driver License</td>
                <td style="width:249px">&nbsp;<?php echo @$transport_details['name']; ?></td>
                <td style="width:316px">&nbsp;Driver Mobile</td>
                <td colspan="2" style="width:365px">&nbsp;</td>
              </tr>
              <tr>
                <td colspan="2" rowspan="1" style="background-color:#aaaaaa; text-align:center; width:275px"><strong>&nbsp;Material Transported</strong></td>
                <td colspan="3" rowspan="1" style="background-color:#aaaaaa; text-align:center; width:316px"><strong>&nbsp;Challan Weight / Quantity</strong></td>
              </tr>
              <tr>
                <td colspan="2" rowspan="1" style="width:275px">&nbsp;<?php echo get_material_name($transport_details['material_id']); ?></td>
                <td colspan="3" rowspan="1" style="width:316px">&nbsp;
                  <?php echo number_format((float) $transport_details['chalan_weight'], 2, '.', ''); ?></td>
                </tr>
                <tr>
                  <td colspan="2" rowspan="1" style="width:275px">&nbsp;</td>
                  <td colspan="3" rowspan="1" style="width:316px">&nbsp;</td>
                </tr>
                <tr>
                  <td style="width:275px">
                    <p>&nbsp;</p>

                    <p>&nbsp;Factory Stamp</p>
                  </td>
                  <td colspan="3" rowspan="1" style="width:275px">
                    <p>&nbsp;</p>

                    <p>&nbsp;Driver Sign and Mobile Number</p>
                  </td>
                  <td style="width:316px">
                    <p>&nbsp;</p>

                    <p>&nbsp;For AV Enterprises</p>
                  </td>
                </tr>
              </tbody>
            </table>

          </div>
          <div class="box-footer">
            <button class="btn btn-primary" id="printPageButton" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
          </div>
        </div>
      </div>
    </div>

  </section>

<?php $this->load->view('section/mobile_footer');?>
