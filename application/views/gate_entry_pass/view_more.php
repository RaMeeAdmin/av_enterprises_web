<?php $this->load->view('section/header'); ?>
<?php $this->load->view('section/sidebar'); ?>
<style type="text/css">
  @media print {
  #printPageButton {
    display: none;
  }
}
</style>
<div class="content-wrapper">
  <section class="content">
<div class="row">
    <div class="col-md-12">
    <div class="box">
     <div class="box-body">   
   <table border="1" cellpadding="1" cellspacing="1" style="width:500px">
  <thead>
    <tr>
      <th colspan="2" scope="col">
      <p style="text-align:center">मे. अे.&nbsp;व्ही. एन्टरप्रायझेस</p>

      <p style="text-align:center">चैतन्य रेसिडेन्सी, फ्लॅट नं. १२, रुई, एम.आय.डी.सी. बारामती</p>

      <p style="text-align:center">मो.&nbsp;७३५०३२९९९९</p>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td colspan="2" style="text-align:center"><strong>गेट पास</strong></td>
    </tr>
    <tr>
      <td style="width:194px">&nbsp;नं :&nbsp;<?php echo $gate_entry_pass['id'];?></td>
      <td style="width:292px">&nbsp;दि :&nbsp;<?php echo $gate_entry_pass['date'];?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;प्रति :&nbsp;<?php echo $gate_entry_pass['company_name'];?>&nbsp;</td>
    </tr>
    <tr>
      <td style="width:194px">&nbsp;महाशय :&nbsp; <?php echo $gate_entry_pass['gate_pass_given_to'];?></td>
      <td style="width:292px">&nbsp;ठिकाण :&nbsp;<?php echo $gate_entry_pass['place'];?>&nbsp;</td>
    </tr>
    <tr>
      <td style="width:194px">&nbsp;ट्रक नंबर :&nbsp;<?php echo $gate_entry_pass['vehicle_number'];?>&nbsp;</td>
      <td style="width:292px">&nbsp;बगॅससाठी भरण्यास पाठविली तरी भरून देणे&nbsp;</td>
    </tr>
    <tr>
      <td style="width:194px">&nbsp;गेटपास :&nbsp;<?php echo $gate_entry_pass['gat_pass_create_with_name'];?>&nbsp;</td>
      <td style="width:292px">&nbsp;या नावाने करणे.&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">
      <p>&nbsp;</p>

      <p style="text-align:right">मे. अे.&nbsp;व्ही. एन्टरप्रायझेस&nbsp; &nbsp;&nbsp;</p>
      </td>
    </tr>
  </tbody>
</table>

<p>&nbsp;</p>

</br>
<button class="btn btn-primary" id="printPageButton" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
<p>&nbsp;</p>
</div>
</div>
</div>
</div>
</section><!-- /.content -->
</div>
<?php $this->load->view('section/footer'); ?>