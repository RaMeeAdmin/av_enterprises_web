<?php
class Dashboard extends CI_Controller {
	function __construct() {
		parent::__construct();
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
		
	}

	function index() {

		$data['purchase'] = $this->db->query("select sum(weight) as gtotal from purchase")->result_array();
		$data['sale'] = $this->db->query("select sum(weight) as stotal from bagasse_sale")->result_array();
		$data['transport'] = $this->db->query("select sum(delivery_weight) as delivery_weight from transport_details")->result_array();
		$data['transport_details'] = $this->db->query("select sum(weight_dispatch) as weight_dispatch FROM `bagasse_sale` left join transport_details on transport_details.so_id=bagasse_sale.id left join purchase on purchase.id=bagasse_sale.purchase_id where transport_details.delivery_proof!=''")->result_array();

		$data['_view'] = 'dashboard';
		$this->load->view('dashboard', $data);
	}

}
