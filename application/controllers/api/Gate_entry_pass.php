<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Gate_entry_pass extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Gate_entry_pass_model');
	}

	public function get_all_post() {
		try {
			$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_all_gate_entry_pass();
			if ($data['gate_entry_pass'] && $data['gate_entry_pass'] != null) {
				$gate_entry_pass_ar = array();
				foreach ($data['gate_entry_pass'] as $g) {
					$g_ar = array();
					$g_ar['id'] = $g['id'];
					$g_ar['date'] = $g['date'];
					$g_ar['gate_pass_for'] = $g['gate_pass_for'];
					$g_ar['gate_pass_given_to'] = $g['gate_pass_given_to'];
					$g_ar['place'] = $g['place'];
					$g_ar['truck_number_id'] = $g['truck_number_id'];
					$g_ar['gat_pass_create_with_name'] = $g['gat_pass_create_with_name'];
					$g_ar['company_id'] = $g['company_id'];
					$g_ar['created_by'] = $g['created_by'];
					$g_ar['updated_by'] = $g['updated_by'];
					$gate_entry_pass_ar[] = $g_ar;
				}
				$response = array(
					'status' => 200,
					'message' => 'get all data Succesfully',
					'data' => $gate_entry_pass_ar,
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
			throw new Exception('Gate_entry_pass controller_name : Error in get_all_post function - ' . $ex);
		}
	}

	function add_post() {
		try {
			$params = array(
				'date' => $this->input->post('date'),
				'gate_pass_for' => $this->input->post('gate_pass_for'),
				'gate_pass_given_to' => $this->input->post('gate_pass_given_to'),
				'place' => $this->input->post('place'),
				'truck_number_id' => $this->input->post('truck_number'),
				'gat_pass_create_with_name' => $this->input->post('gat_pass_create_with_name'),
				'company_id' => $this->input->post('company_id'),
				'created_by' => $this->input->post('created_by'),
				'updated_by' => $this->input->post('updated_by'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Gate_entry_pass_model->add_gate_entry_pass($params);
				$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
				$response = array(
					'success' => true,
					'message' => 'Succesfully Added',
					'data' => $data,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'success' => false,
					'message' => 'Not Added try again',
					'data' => '',
				);
				$this->response($response, REST_Controller::HTTP_OK);
			}
		} catch (Exception $ex) {
			$response = array(
				'success' => false,
				'message' => 'Not Added try again',
				'data' => '',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
	}

	function edit_post($id) {
		try {
			$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['gate_entry_pass']['id'])) {
				$params = array(
					'date' => $this->input->post('date'),
					'gate_pass_for' => $this->input->post('gate_pass_for'),
					'gate_pass_given_to' => $this->input->post('gate_pass_given_to'),
					'place' => $this->input->post('place'),
					'truck_number_id' => $this->input->post('truck_number_id'),
					'gat_pass_create_with_name' => $this->input->post('gat_pass_create_with_name'),
					'company_id' => $this->input->post('company_id'),
					'created_by' => $this->input->post('created_by'),
					'updated_by' => $this->input->post('updated_by'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Gate_entry_pass_model->update_gate_entry_pass($id, $params);
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
			throw new Exception('Gate_entry_pass controller_name : Error in edit_post function - ' . $ex);
		}
	}
/*
 * Deleting gate_entry_pass
 */
	function remove_post($id) {
		try {
			$gate_entry_pass = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
			// check if the gate_entry_pass exists before trying to delete it
			if (isset($gate_entry_pass['id'])) {
				$this->Gate_entry_pass_model->delete_gate_entry_pass($id);
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
			throw new Exception('Gate_entry_pass controller_name : Error in remove_post function - ' . $ex);
		}
	}
}
