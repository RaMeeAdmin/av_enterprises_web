<?php
class Purchase extends CI_Controller {
	function __construct() {
		parent::__construct();
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
		$this->load->model('Customer_model');
		$this->load->model('State_model');
	}

	public function index() {

		$this->load->view('purchase/index');
	}

	function add() {
		extract($_POST);

		try {

			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {

				$insert = array(
					"purchase_code" => 'AV' . date('Yhms'),
					"supplier_id" => $supplier,
					"purchase_date" => $date,
					'subtotal' => array_sum($total),
					'grand_total' => array_sum($total),
					'weight' => array_sum($weight),
					'purchase_note' => $note,

				);
				$this->db->insert('purchase', $insert);
				$insert_id = $this->db->insert_id();

				for ($i = 0; $i < count($material); $i++) {

					$total_cost = $price[$i] * $weight[$i];
					$params = array(
						'item_id' => $material[$i],
						'weight' => $weight[$i],
						'rate' => $price[$i],
						'total_cost' => $total_cost,
						'purchase_status' => 'Order',
						'purchase_id' => $insert_id,
					);
					$this->db->insert('purchaseitems', $params);
				}

				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
				redirect('purchase/index');

			} else {
				$data['state'] = $this->State_model->get_all_state();
				$data['supplier'] = $this->db->query("select * from suppliers")->result_array();
				$data['material'] = $this->db->query("select * from material")->result_array();
				$data['_view'] = 'purchase/add';
				$this->load->view('purchase/add', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in add function - ' . $ex);
		}
	}

	public function edit($id) {
		try {

			$data['customer'] = $this->Customer_model->get_customer($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['customer']['id'])) {
				$params = array(
					'name' => $this->input->post('name'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'state_id' => $this->input->post('state'),
					'contact_person_name' => $this->input->post('contact_person_name'),
					'contact_person_contact_number' => $this->input->post('contact_person_contact_number'),
					'gstno' => $this->input->post('gstn_uin'),
					'credit_days' => $this->input->post('credit_days'),
					'isActive' => 'Y',
					'company_id' => '1',
					'updated_at' => date('Y-m-d H:m:s'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Customer_model->update_customer($id, $params);
					$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
					redirect('purchase/view');
				} else {
					$data['state'] = $this->State_model->get_all_state();
					$data['_view'] = 'purchase/view';
					$this->load->view('purchase/view', $data);
				}
			} else {
				show_error('The customer you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in edit function - ' . $ex);
		}
	}

	function remove($id) {
		try {
			$customer = $this->Customer_model->get_customer($id);
			// check if the customer exists before trying to delete it
			if (isset($customer['id'])) {
				$this->Customer_model->delete_customer($id);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
				redirect('customer/index');
			} else {
				show_error('The customer you are trying to delete does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in remove function - ' . $ex);
		}
	}

	public function view_more($id) {

		$data['_view'] = 'purchase/view_more';
		$this->load->view('purchase/view_more');

	}

	public function search_by_clm() {
		$column_name = $this->input->post('column_name');
		$value_id = $this->input->post('value_id');
		$data['noof_page'] = 0;
		$params = array();
		$data['customer'] = $this->Customer_model->get_all_customer_by_cat($column_name, $value_id);
		$data['_view'] = 'customer/index';
		$this->load->view('layouts/main', $data);
	}

	public function get_search_values_by_clm() {
		$clm_name = $this->input->post('clm_name');
		$value = $this->input->post('value');
		$id = $this->input->post('id');
		$params = array(
			$clm_name => $value,
		);
		$this->Customer_model->update_customer($id, $params);
		$data['noof_page'] = 0;
		$data['customer'] = $this->Customer_model->get_all_customer();
		$this->load->view('customer/index', $data);
	}
}
