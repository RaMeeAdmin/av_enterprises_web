<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Petrol_pumps extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Petrol_pumps_model');
	}
	/*
		* Listing of petrol_pumps
	*/
	public function get_all_post() {
		try {
			$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
			if ($data['petrol_pumps'] && $data['petrol_pumps'] != null) {
				$petrol_pumps_ar = array();
				foreach ($data['petrol_pumps'] as $p) {
					$p_ar = array();
					$p_ar['id'] = $p['id'];
					$p_ar['petrol_pumps_name'] = $p['petrol_pumps_name'];
					$p_ar['address'] = $p['address'];
					$p_ar['contact_person_name'] = $p['contact_person_name'];
					$p_ar['contact_person_number'] = $p['contact_person_number'];
					$p_ar['isActive'] = $p['isActive'];
					$p_ar['company_id'] = $p['company_id'];
					$p_ar['created_at'] = $p['created_at'];
					$p_ar['updated_at'] = $p['updated_at'];
					$petrol_pumps_ar[] = $p_ar;
				}
				$response = array(
					'status' => 200,
					'message' => 'get all data Succesfully',
					'data' => $petrol_pumps_ar,
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
			throw new Exception('Petrol_pumps controller_name : Error in get_all_post function - ' . $ex);
		}
	}

	function addnew_post() {
		try {

			$company_id = $this->session->userdata('company_id');
			$params = array(
				'petrol_pumps_name' => $this->input->post('petrol_pumps_name'),
				'address' => $this->input->post('address'),
				'contact_person_name' => $this->input->post('contact_person_name'),
				'contact_person_number' => $this->input->post('contact_person_number'),
				// 'isActive'=> $this->input->post('isActive'),
				// 'company_id'=> $this->input->post('company_id'),
				// 'created_at'=> $this->input->post('created_at'),
				// 'updated_at'=> $this->input->post('updated_at'),

				'isActive' => 'Y',
				'company_id' => $company_id,
				'created_at' => date('Y-m-d H:m:s'),

			);
			print_r($params);
			exit();
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {

				$id = $this->Petrol_pumps_model->add_petrol_pumps($params);
				$data['petrol_pumps'] = $this->Petrol_pumps_model->get_petrol_pumps($id);
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
			throw new Exception('Petrol_pumps controller_name : Error in new petrol_pumps function - ' . $ex);
		}
	}

	public function pumpsList_post() {
		$postData = $this->input->post();
		$data = $this->Petrol_pumps_model->pumpsList($postData);
		echo json_encode($data);
	}
	public function getpetrol_pumps_post() {
		extract($_POST);
		$data = $this->Petrol_pumps_model->get_petrol_pumps($id);
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

	function edit_post($id) {

		extract($_POST);
		try {
			$data['petrol_pumps'] = $this->Petrol_pumps_model->get_petrol_pumps($id);

			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['petrol_pumps']['id'])) {
				$params = array(
					'petrol_pumps_name' => $this->input->post('petrol_pumps_name'),
					'address' => $this->input->post('address'),
					'contact_person_name' => $this->input->post('contact_person_name'),
					'contact_person_number' => $this->input->post('contact_person_number'),

					'isActive' => $this->input->post('isActive'),
					'company_id' => $this->input->post('company_id'),
					'created_at' => $this->input->post('created_at'),
					'updated_at' => $this->input->post('updated_at'),
				);

				if (isset($_POST) && count($_POST) > 0) {
					$this->Petrol_pumps_model->update_petrol_pumps($id, $params);
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
			throw new Exception('Petrol_pumps controller_name : Error in edit_post function - ' . $ex);
		}
	}

	function remove_post($id) {
		try {
			$petrol_pumps = $this->Petrol_pumps_model->get_petrol_pumps($id);

			if (isset($petrol_pumps['id'])) {
				$this->Petrol_pumps_model->delete_petrol_pumps($id);
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
			throw new Exception('Petrol_pumps controller_name : Error in remove_post function - ' . $ex);
		}
	}
}
