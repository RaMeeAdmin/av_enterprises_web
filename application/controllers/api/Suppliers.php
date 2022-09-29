<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Suppliers extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Suppliers_model');
	}
	/*
		* Listing of suppliers
	*/
	public function get_all_post() {
		try {
			$data['suppliers'] = $this->Suppliers_model->get_all_suppliers();
			if ($data['suppliers'] && $data['suppliers'] != null) {
				$suppliers_ar = array();
				foreach ($data['suppliers'] as $s) {
					$s_ar = array();
					$s_ar['id'] = $s['id'];
					$s_ar['company_name'] = $s['company_name'];
					$s_ar['address'] = $s['address'];
					$s_ar['state_id'] = $s['state_id'];
					$s_ar['phone'] = $s['phone'];
					$s_ar['contact_person_name'] = $s['contact_person_name'];
					$s_ar['contact_person_number'] = $s['contact_person_number'];
					$s_ar['email'] = $s['email'];
					$s_ar['gsts_no'] = $s['gsts_no'];
					$s_ar['opening_balance'] = $s['opening_balance'];
					$s_ar['cr_dr'] = $s['cr_dr'];
					$s_ar['isActive'] = $s['isActive'];
					$s_ar['company_id'] = $s['company_id'];
					$s_ar['created_at'] = $s['created_at'];
					$s_ar['updated_at'] = $s['updated_at'];
					$suppliers_ar[] = $s_ar;
				}
				$response = array(
					'success' => true,
					'status' => 200,
					'message' => 'get all data Succesfully',
					'data' => $suppliers_ar,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'success' => false,
					'status' => 400,
					'message' => 'Detail is not found',
				);
				$this->response($response, REST_Controller::HTTP_OK);
			}
		} catch (Exception $ex) {
			throw new Exception('Suppliers controller_name : Error in get_all_post function - ' . $ex);
		}
	}
	function getsupplier_post() {
		extract($_POST);
		$data = $this->Suppliers_model->get_suppliers($id);
		if (count($data) != '0') {
			$response = array(
				'success' => true,
				'message' => 'Record Not Found',
				'data' => $data,
			);
			$this->response($response, REST_Controller::HTTP_OK);
		} else {
			$response = array(
				'success' => flase,
				'message' => 'Record Not Found',
				'data' => $id,
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
	}

	/*
		  * Adding a new suppliers
	*/
	public function supplierList_post() {
		$postData = $this->input->post();
		$data = $this->Suppliers_model->getsupplierList($postData);
		echo json_encode($data);
	}
	function addnew_post() {
		try {
			$params = array(
				'company_name' => $this->input->post('company_name'),
				'address' => $this->input->post('address'),
				'state_id' => $this->input->post('state_id'),
				'phone' => $this->input->post('phone'),
				'contact_person_name' => $this->input->post('contact_person_name'),
				'contact_person_number' => $this->input->post('contact_person_number'),
				'email' => $this->input->post('email'),
				'gsts_no' => $this->input->post('gsts_no'),
				'opening_balance' => $this->input->post('opening_balance'),
				'cr_dr' => $this->input->post('cr_dr'),
				'isActive' => $this->input->post('isActive'),
				'company_id' => $this->input->post('company_id'),
				'created_at' => $this->input->post('created_at'),
				'updated_at' => $this->input->post('updated_at'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Suppliers_model->add_suppliers($params);
				$data['suppliers'] = $this->Suppliers_model->get_suppliers($id);
				$response = array(
					'success' => true,
					'status' => 200,
					'message' => 'Succesfully Added',
					'data' => $data,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'success' => false,
					'status' => 400,
					'message' => 'Not Added try again',
					'data' => '',
				);
				$this->response($response, REST_Controller::HTTP_OK);
			}
		} catch (Exception $ex) {
			throw new Exception('Suppliers controller_name : Error in new suppliers function - ' . $ex);
		}
	}

	function edit_post($id) {
		try {
			$data['suppliers'] = $this->Suppliers_model->get_suppliers($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['suppliers']['id'])) {
				$params = array(
					'company_name' => $this->input->post('company_name'),
					'address' => $this->input->post('address'),
					'state_id' => $this->input->post('state_id'),
					'phone' => $this->input->post('phone'),
					'contact_person_name' => $this->input->post('contact_person_name'),
					'contact_person_number' => $this->input->post('contact_person_number'),
					'email' => $this->input->post('email'),
					'gsts_no' => $this->input->post('gsts_no'),
					'opening_balance' => $this->input->post('opening_balance'),
					'cr_dr' => $this->input->post('cr_dr'),
					'isActive' => $this->input->post('isActive'),
					'company_id' => $this->input->post('company_id'),
					'created_at' => $this->input->post('created_at'),
					'updated_at' => $this->input->post('updated_at'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Suppliers_model->update_suppliers($id, $params);
					$response = array(

						'success' => true,
						'message' => 'Succesfully Updated',
						'status' => 200,
						'message' => 'Succesfully Updated',
						'data' => $id,
					);
					$this->response($response, REST_Controller::HTTP_OK);
				} else {
					$response = array(
						'success' => false,
						'status' => 400,
						'message' => 'Not Updated Try again',
						'data' => $id,
					);
					$this->response($response, REST_Controller::HTTP_OK);
				}
			}
		} catch (Exception $ex) {
			throw new Exception('Suppliers controller_name : Error in edit_post function - ' . $ex);
		}
	}
/*
 * Deleting suppliers
 */
	function remove_post($id) {
		try {
			$suppliers = $this->Suppliers_model->get_suppliers($id);
			// check if the suppliers exists before trying to delete it
			if (isset($suppliers['id'])) {
				$this->Suppliers_model->delete_suppliers($id);
				$response = array(
					'success' => true,
					'status' => 200,
					'message' => 'Succesfully Removed',
					'data' => $id,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'success' => false,
					'status' => 400,
					'message' => 'Not Updated Try again',
					'data' => $id,
				);
			}

			$this->response($response, REST_Controller::HTTP_OK);
		} catch (Exception $ex) {
			throw new Exception('Suppliers controller_name : Error in remove_post function - ' . $ex);
		}
	}
}
