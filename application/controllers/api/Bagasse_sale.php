<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Bagasse_sale extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Bagasse_sale_model');
	}

	public function get_all_post() {
		try {
			$data['bagasse_sale'] = $this->Bagasse_sale_model->get_all_bagasse_sale();
			if ($data['bagasse_sale'] && $data['bagasse_sale'] != null) {
				$bagasse_sale_ar = array();
				foreach ($data['bagasse_sale'] as $b) {
					$b_ar = array();
					$b_ar['id'] = $b['id'];
					$b_ar['sale_code'] = $b['sale_code'];
					$b_ar['date'] = $b['date'];
					$b_ar['customer_id'] = $b['customer_id'];
					$b_ar['sale_date'] = $b['sale_date'];
					$b_ar['vehicle_id'] = $b['vehicle_id'];
					$b_ar['loading_id'] = $b['loading_id'];
					$b_ar['user'] = $b['user'];
					$b_ar['material_id'] = $b['material_id'];
					$b_ar['qty'] = $b['qty'];
					$b_ar['rate'] = $b['rate'];
					$b_ar['weight'] = $b['weight'];
					$b_ar['amount'] = $b['amount'];
					$b_ar['subtotal'] = $b['subtotal'];
					$b_ar['grand_total'] = $b['grand_total'];
					$b_ar['paid_amount'] = $b['paid_amount'];
					$b_ar['sale_note'] = $b['sale_note'];
					$b_ar['company_id'] = $b['company_id'];
					$b_ar['created_on'] = $b['created_on'];
					$b_ar['updated_on'] = $b['updated_on'];
					$bagasse_sale_ar[] = $b_ar;
				}
				$response = array(
					'status' => 200,
					'message' => 'get all data Succesfully',
					'data' => $bagasse_sale_ar,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'status' => 400,
					'message' => 'Detail is not found',
				);
				$this->response($response, REST_Controller::HTTP_OK);
			}
		} catch (Exception $ex) {
			throw new Exception('Bagasse_sale controller_name : Error in get_all_post function - ' . $ex);
		}
	}

	function addnew_post() {
		try {
			$params = array(
				'sale_code' => $this->input->post('sale_code'),
				'date' => $this->input->post('date'),
				'customer_id' => $this->input->post('customer_id'),
				'sale_date' => $this->input->post('sale_date'),
				'vehicle_id' => $this->input->post('vehicle_id'),
				'loading_id' => $this->input->post('loading_id'),
				'user' => $this->input->post('user'),
				'material_id' => $this->input->post('material_id'),
				'qty' => $this->input->post('qty'),
				'rate' => $this->input->post('rate'),
				'weight' => $this->input->post('weight'),
				'amount' => $this->input->post('amount'),
				'subtotal' => $this->input->post('subtotal'),
				'grand_total' => $this->input->post('grand_total'),
				'paid_amount' => $this->input->post('paid_amount'),
				'sale_note' => $this->input->post('sale_note'),
				'company_id' => $this->input->post('company_id'),
				'created_on' => $this->input->post('created_on'),
				'updated_on' => $this->input->post('updated_on'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Bagasse_sale_model->add_bagasse_sale($params);
				$data['bagasse_sale'] = $this->Bagasse_sale_model->get_bagasse_sale($id);
				$response = array(
					'status' => 200,
					'message' => 'Succesfully Added',
					'data' => $data,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'status' => 400,
					'message' => 'Not Added try again',
					'data' => '',
				);
				$this->response($response, REST_Controller::HTTP_OK);
			}
		} catch (Exception $ex) {
			throw new Exception('Bagasse_sale controller_name : Error in new bagasse_sale function - ' . $ex);
		}
	}

	function edit_post($id) {
		try {
			$data['bagasse_sale'] = $this->Bagasse_sale_model->get_bagasse_sale($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['bagasse_sale']['id'])) {
				$params = array(
					'sale_code' => $this->input->post('sale_code'),
					'date' => $this->input->post('date'),
					'customer_id' => $this->input->post('customer_id'),
					'sale_date' => $this->input->post('sale_date'),
					'vehicle_id' => $this->input->post('vehicle_id'),
					'loading_id' => $this->input->post('loading_id'),
					'user' => $this->input->post('user'),
					'material_id' => $this->input->post('material_id'),
					'qty' => $this->input->post('qty'),
					'rate' => $this->input->post('rate'),
					'weight' => $this->input->post('weight'),
					'amount' => $this->input->post('amount'),
					'subtotal' => $this->input->post('subtotal'),
					'grand_total' => $this->input->post('grand_total'),
					'paid_amount' => $this->input->post('paid_amount'),
					'sale_note' => $this->input->post('sale_note'),
					'company_id' => $this->input->post('company_id'),
					'created_on' => $this->input->post('created_on'),
					'updated_on' => $this->input->post('updated_on'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Bagasse_sale_model->update_bagasse_sale($id, $params);
					$response = array(
						'status' => 200,
						'message' => 'Succesfully Updated',
						'data' => $id,
					);
					$this->response($response, REST_Controller::HTTP_OK);
				} else {
					$response = array(
						'status' => 400,
						'message' => 'Not Updated Try again',
						'data' => $id,
					);
					$this->response($response, REST_Controller::HTTP_OK);
				}
			}
		} catch (Exception $ex) {
			throw new Exception('Bagasse_sale controller_name : Error in edit_post function - ' . $ex);
		}
	}

	function remove_post($id) {
		try {
			$bagasse_sale = $this->Bagasse_sale_model->get_bagasse_sale($id);
			// check if the bagasse_sale exists before trying to delete it
			if (isset($bagasse_sale['id'])) {
				$this->Bagasse_sale_model->delete_bagasse_sale($id);
				$response = array(
					'status' => 200,
					'message' => 'Succesfully Removed',
					'data' => $id,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'status' => 400,
					'message' => 'Not Updated Try again',
					'data' => $id,
				);
			}

			$this->response($response, REST_Controller::HTTP_OK);
		} catch (Exception $ex) {
			throw new Exception('Bagasse_sale controller_name : Error in remove_post function - ' . $ex);
		}
	}
}
