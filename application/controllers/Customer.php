<?php

class Customer extends CI_Controller {
	function __construct() {
		parent::__construct();
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
		$this->load->model('Customer_model');
		$this->load->model('State_model');

	}
	/*
		* Listing of customer
	*/
	public function index() {
		try {
			$data['noof_page'] = 0;
			$data['customer'] = $this->Customer_model->get_all_customer();
			// $data['_view'] = 'customer/index';

			$this->load->view('customer/index', $data);
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in index function - ' . $ex);
		}
	}
	/*
		  * Adding a new customer
	*/
	function add() {
		try {
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
				'created_at' => date('Y-m-d H:m:s'),
				// 'updated_at'=> $this->input->post('updated_at'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Customer_model->add_customer($params);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
				redirect('customer/index');
			} else {
				$data['state'] = $this->State_model->get_all_state();
				$data['_view'] = 'customer/add';
				$this->load->view('customer/add', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in add function - ' . $ex);
		}
	}
	/*
		  * Editing a customer
	*/
	public function edit($id){
  
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
					//'created_at'=> $this->input->post('created_at'),
					'updated_at' => date('Y-m-d H:m:s'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Customer_model->update_customer($id, $params);
					$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
					redirect('customer/index');
				} else {
					$data['state'] = $this->State_model->get_all_state();
					$data['_view'] = 'customer/edit';
					$this->load->view('customer/edit', $data);
				}
			} else {
				show_error('The customer you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in edit function - ' . $ex);
		}
	}
/*
 * Deleting customer
 */
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
	/*
		  * View more a customer
	*/
	public function view_more($id) {
		try {
			$data['customer'] = $this->Customer_model->get_customer($id);
			if (isset($data['customer']['id'])) {
				$data['_view'] = 'customer/view_more';
				$this->load->view('layouts/main', $data);
			} else {
				show_error('The customer you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in View more function - ' . $ex);
		}
	}
	/*
		* Listing of customer
	*/
	public function search_by_clm() {
		$column_name = $this->input->post('column_name');
		$value_id = $this->input->post('value_id');
		$data['noof_page'] = 0;
		$params = array();
		$data['customer'] = $this->Customer_model->get_all_customer_by_cat($column_name, $value_id);
		$data['_view'] = 'customer/index';
		$this->load->view('layouts/main', $data);
	}
	/*
		* get search values by column- customer
	*/
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
