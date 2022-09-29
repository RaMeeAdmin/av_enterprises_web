<?php

class Diesel_payments extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Transport_details_model');
		$this->load->model('Diesel_payments_model');
		$this->load->model('Transporter_model');
		$this->load->model('Material_model');
		$this->load->model('Gate_entry_pass_model');
		$this->load->model('Petrol_pumps_model');
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
	}

	public function index() {
		try {
			$data['noof_page'] = 0;
			$data['diesel_payment'] = $this->Diesel_payments_model->get_all_diesel_payment();
			$data['_view'] = 'transport_details/index';
			$this->load->view('diesel_payment/index', $data);
		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in index function - ' . $ex);
		}
	}

	public function add() {
		try {
			$params = array(
				'date' => date("Y-m-d", strtotime($this->input->post('date'))),
				'pump_id' => $this->input->post('pump_id'),
				'paid_to' => $this->input->post('paid_to'),
				'transporter_id' => $this->input->post('transporter_id'),
				'vehicle_id' => $this->input->post('vehicle_id'),
				'loading_id' => $this->input->post('loading_id'),
				'unloading_id' => $this->input->post('unloading_id'),
				'qty' => $this->input->post('quntity'),
				'rate' => $this->input->post('rant'),
				'amount' => $this->input->post('amount'),
				'remarks' => $this->input->post('remarks'),
				'company_id' => '1',
				'created_on' => date('Y-m-d H:m:s'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Diesel_payments_model->add_diesel_payment($params);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
				redirect('diesel_payments/index');
			} else {
				$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
				$data['transporter'] = $this->db->query("select * from transporter")->result_array();
				$data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
				$data['material'] = $this->Material_model->get_all_material();
				$data['labour'] = $this->Petrol_pumps_model->get_all_labour();
				$data['_view'] = 'customer/add';
				$this->load->view('diesel_payment/add', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in add function - ' . $ex);
		}
	}
	public function edit($id) {

		try {
			$data['diesel_payments'] = $this->Diesel_payments_model->get_Diesel_payments($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['diesel_payments']['id'])) {
				$params = array(
					'date' => date("Y-m-d", strtotime($this->input->post('date'))),
					'pump_id' => $this->input->post('pump_id'),
					'paid_to' => $this->input->post('paid_to'),
					'transporter_id' => $this->input->post('transporter_id'),
					'vehicle_id' => $this->input->post('vehicle_id'),
					'loading_id' => $this->input->post('loading_id'),
					'unloading_id' => $this->input->post('unloading_id'),
					'qty' => $this->input->post('quntity'),
					'rate' => $this->input->post('rant'),
					'amount' => $this->input->post('amount'),
					'remarks' => $this->input->post('remarks'),
					'company_id' => '1',
					'updated_on' => date('Y-m-d H:m:s'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Diesel_payments_model->update_Diesel_payments($id, $params);
					$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
					redirect('diesel_payments/index');
				} else {
					$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
					$data['transporter'] = $this->db->query("select * from transporter")->result_array();
					$data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
					$data['material'] = $this->Material_model->get_all_material();
					$data['labour'] = $this->Petrol_pumps_model->get_all_labour();

					$data['_view'] = 'customer/edit';
					$this->load->view('diesel_payment/edit', $data);
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
			$Diesel_payments = $this->Diesel_payments_model->get_Diesel_payments($id);
			// check if the customer exists before trying to delete it
			if (isset($Diesel_payments['id'])) {
				$this->Diesel_payments_model->delete_diesel_payment($id);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
				redirect('diesel_payments/index');
			} else {
				show_error('The customer you are trying to delete does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in remove function - ' . $ex);
		}
	}

}
