 <?php
$ci = &get_instance();
function no_cache() {
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
}

function get_usertype($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM user_roles WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['name'];

}
function get_userlocation($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT name FROM locations WHERE id in('$id')");
	$class = $class->row_array();
	//print_r($class);exit();
	// foreach ($class as $key ) {
	// 	$name[]=$key['name'];
	// }
	return $class['name'];
	// return $class;
	// $ci =& get_instance();
	// 	$class = $ci->db->query("SELECT * FROM location WHERE id in'".array($id)."'");
	//   $class = $class->result_array();
	//   print_r($class);exit();
	//   return $class['name'];
	//$data=$this->db->get_where('location',array('id'=>$id))->row_array();
}
function get_supplier_name($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM suppliers WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['company_name'];

}
function get_customer_details($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM customer WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['name'];

}
function get_vehicle_name($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM vehicle WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['vehicle_number'];

}
function get_loading($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM labour WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['name'];
}
function get_driver_name($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT name FROM driver WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['name'];

}
function get_owner_details($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM  vehicle_owner WHERE id='" . $id . "'");
	$class = $class->row_array();
	return $class;

}
function get_transporter_name($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT transporter_name FROM transporter WHERE id='" . $id . "'");
	$class = $class->row_array();
	return $class['transporter_name'];

}
function get_labour_name($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT name FROM labour WHERE id='" . $id . "'");
	$class = $class->row_array();
	return $class['name'];

}
function get_pumps_name($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM petrol_pumps WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['petrol_pumps_name'];

}

function getIndianCurrency(float $number) {
	$decimal = round($number - ($no = floor($number)), 2) * 100;
	$hundred = null;
	$digits_length = strlen($no);
	$i = 0;
	$str = array();
	$words = array(0 => '', 1 => 'one', 2 => 'two',
		3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
		7 => 'seven', 8 => 'eight', 9 => 'nine',
		10 => 'ten', 11 => 'eleven', 12 => 'twelve',
		13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
		16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
		19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
		40 => 'forty', 50 => 'fifty', 60 => 'sixty',
		70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
	$digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
	while ($i < $digits_length) {
		$divider = ($i == 2) ? 10 : 100;
		$number = floor($no % $divider);
		$no = floor($no / $divider);
		$i += $divider == 10 ? 1 : 2;
		if ($number) {
			$plural = (($counter = count($str)) && $number > 9) ? 's' : null;
			$hundred = ($counter == 1 && $str[0]) ? ' ' : null;
			$str[] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural . ' ' . $hundred : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural . ' ' . $hundred;
		} else {
			$str[] = null;
		}

	}
	$Rupees = implode('', array_reverse($str));
	$paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
	return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}
function get_material_name($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM material WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['name'];

}
function getbankname($id) {
	$ci = &get_instance();

	$class = $ci->db->query("SELECT * FROM bank WHERE id='" . $id . "'");
	$class = $class->row_array();

	return $class['name'];

}

function mobile_login($user_id) {
	$ci = &get_instance();
	$get_login = $ci->db->query("select id,username,email,user_type from user where id='$user_id'")->row_array();
	$newdata = array(
		'id' => $get_login['id'],
		'username' => $get_login['username'],
		'email' => $get_login['email'],
		'roll' => $get_login['user_type'],
		'logged_in' => TRUE,
	);

	return $newdata;
}

?>