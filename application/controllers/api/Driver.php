<?php
/*
Generated by Manuigniter v2.0
www.manuigniter.com
 */
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Driver extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Driver_model');
		$this->load->model('Deliver_model');
	}

	function addnew_post() {
		try {
			$params = array(
				'name' => $this->input->post('name'),
				'pan' => $this->input->post('pan'),
				'license_number' => $this->input->post('license_number'),
				'contact_number' => $this->input->post('contact_number'),
				'transporter_id' => $this->input->post('transporter_id'),
				'created_at' => $this->input->post('created_at'),
				'updated_at' => $this->input->post('updated_at'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Driver_model->add_driver($params);
				$data['driver'] = $this->Driver_model->get_driver($id);
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
			throw new Exception('Driver controller_name : Error in new driver function - ' . $ex);
		}
	}
	/*
		  * Editing a driver
	*/
	function edit_post($id) {
		try {
			$data['driver'] = $this->Driver_model->get_driver($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['driver']['id'])) {
				$params = array(
					'name' => $this->input->post('name'),
					'pan' => $this->input->post('pan'),
					'license_number' => $this->input->post('license_number'),
					'contact_number' => $this->input->post('contact_number'),
					'transporter_id' => $this->input->post('transporter_id'),
					'created_at' => $this->input->post('created_at'),
					'updated_at' => $this->input->post('updated_at'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Driver_model->update_driver($id, $params);
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
			throw new Exception('Driver controller_name : Error in edit_post function - ' . $ex);
		}
	}
/*
 * Deleting driver
 */
	function remove_post($id) {
		try {
			$driver = $this->Driver_model->get_driver($id);
			// check if the driver exists before trying to delete it
			if (isset($driver['id'])) {
				$this->Driver_model->delete_driver($id);
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
			throw new Exception('Driver controller_name : Error in remove_post function - ' . $ex);
		}
	}
}
