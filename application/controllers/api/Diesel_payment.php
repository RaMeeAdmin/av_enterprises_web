<?php
/*
Generated by Manuigniter v2.0
www.manuigniter.com
 */
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Diesel_payment extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Diesel_payment_model');
	}
	/*
		* Listing of diesel_payment
	*/
	public function get_all_post() {
		try {
			$data['diesel_payment'] = $this->Diesel_payment_model->get_all_diesel_payment();
			if ($data['diesel_payment'] && $data['diesel_payment'] != null) {
				$diesel_payment_ar = array();
				foreach ($data['diesel_payment'] as $d) {
					$d_ar = array();
					$d_ar['id'] = $d['id'];
					$d_ar['date'] = $d['date'];
					$d_ar['paid_to'] = $d['paid_to'];
					$d_ar['pump_id'] = $d['pump_id'];
					$d_ar['transporter_id'] = $d['transporter_id'];
					$d_ar['vehicle_id'] = $d['vehicle_id'];
					$d_ar['loading_id'] = $d['loading_id'];
					$d_ar['unloading_id'] = $d['unloading_id'];
					$d_ar['qty'] = $d['qty'];
					$d_ar['rate'] = $d['rate'];
					$d_ar['amount'] = $d['amount'];
					$d_ar['remarks'] = $d['remarks'];
					$d_ar['company_id'] = $d['company_id'];
					$d_ar['created_on'] = $d['created_on'];
					$d_ar['updated_on'] = $d['updated_on'];
					$diesel_payment_ar[] = $d_ar;
				}
				$response = array(
					'status' => 200,
					'message' => 'get all data Succesfully',
					'data' => $diesel_payment_ar,
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
			throw new Exception('Diesel_payment controller_name : Error in get_all_post function - ' . $ex);
		}
	}
	/*
		  * Adding a new diesel_payment
	*/
	function addnew_post() {
		try {
			$params = array(
				'date' => $this->input->post('date'),
				'paid_to' => $this->input->post('paid_to'),
				'pump_id' => $this->input->post('pump_id'),
				'transporter_id' => $this->input->post('transporter_id'),
				'vehicle_id' => $this->input->post('vehicle_id'),
				'loading_id' => $this->input->post('loading_id'),
				'unloading_id' => $this->input->post('unloading_id'),
				'qty' => $this->input->post('qty'),
				'rate' => $this->input->post('rate'),
				'amount' => $this->input->post('amount'),
				'remarks' => $this->input->post('remarks'),
				'company_id' => $this->input->post('company_id'),
				'created_on' => $this->input->post('created_on'),
				'updated_on' => $this->input->post('updated_on'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Diesel_payment_model->add_diesel_payment($params);
				$data['diesel_payment'] = $this->Diesel_payment_model->get_diesel_payment($id);
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
			throw new Exception('Diesel_payment controller_name : Error in new diesel_payment function - ' . $ex);
		}
	}
	/*
		  * Editing a diesel_payment
	*/
	function edit_post($id) {
		try {
			$data['diesel_payment'] = $this->Diesel_payment_model->get_diesel_payment($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['diesel_payment']['id'])) {
				$params = array(
					'date' => $this->input->post('date'),
					'paid_to' => $this->input->post('paid_to'),
					'pump_id' => $this->input->post('pump_id'),
					'transporter_id' => $this->input->post('transporter_id'),
					'vehicle_id' => $this->input->post('vehicle_id'),
					'loading_id' => $this->input->post('loading_id'),
					'unloading_id' => $this->input->post('unloading_id'),
					'qty' => $this->input->post('qty'),
					'rate' => $this->input->post('rate'),
					'amount' => $this->input->post('amount'),
					'remarks' => $this->input->post('remarks'),
					'company_id' => $this->input->post('company_id'),
					'created_on' => $this->input->post('created_on'),
					'updated_on' => $this->input->post('updated_on'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Diesel_payment_model->update_diesel_payment($id, $params);
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
			throw new Exception('Diesel_payment controller_name : Error in edit_post function - ' . $ex);
		}
	}
/*
 * Deleting diesel_payment
 */
	function remove_post($id) {
		try {
			$diesel_payment = $this->Diesel_payment_model->get_diesel_payment($id);
			// check if the diesel_payment exists before trying to delete it
			if (isset($diesel_payment['id'])) {
				$this->Diesel_payment_model->delete_diesel_payment($id);
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
			throw new Exception('Diesel_payment controller_name : Error in remove_post function - ' . $ex);
		}
	}
}