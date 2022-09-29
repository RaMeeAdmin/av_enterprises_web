<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Purchase2 extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('purchase_model');
		$this->load->model('customer_model');
		$this->load->database();
	}

	public function empList_post() {
		$postData = $this->input->post();
		$data = $this->purchase_model->getEmployees($postData);
		echo json_encode($data);
	}

	function addnew_post() {

		try {

			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				extract($_POST);

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

			$this->load->library('upload');
			$this->load->library('form_validation');

			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->Purchase_model->add_purchase($params);
				$data['purchase'] = $this->Purchase_model->get_purchase($id);
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
			throw new Exception('Purchase controller_name : Error in new purchase function - ' . $ex);
		}
	}

	function edit_post($id) {
		try {
			$data['purchase'] = $this->Purchase_model->get_purchase($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['purchase']['id'])) {
				$params = array(
					'unit_id' => $this->input->post('unit_id'),
					'purchase_code' => $this->input->post('purchase_code'),
					'reference_no' => $this->input->post('reference_no'),
					'purchase_date' => $this->input->post('purchase_date'),
					'purchase_status' => $this->input->post('purchase_status'),
					'supplier_id' => $this->input->post('supplier_id'),
					'subtotal' => $this->input->post('subtotal'),
					'grand_total' => $this->input->post('grand_total'),
					'purchase_note' => $this->input->post('purchase_note'),
					'payment_status' => $this->input->post('payment_status'),
					'paid_amount' => $this->input->post('paid_amount'),
					'weight' => $this->input->post('weight'),
					'created_date' => $this->input->post('created_date'),
					'created_time' => $this->input->post('created_time'),
					'created_by' => $this->input->post('created_by'),
					'company_id' => $this->input->post('company_id'),
					'status' => $this->input->post('status'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Purchase_model->update_purchase($id, $params);
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
			throw new Exception('Purchase controller_name : Error in edit_post function - ' . $ex);
		}
	}

	function remove_post($id) {
		try {
			$purchase = $this->Purchase_model->get_purchase($id);
			// check if the purchase exists before trying to delete it
			if (isset($purchase['id'])) {
				$this->Purchase_model->delete_purchase($id);
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
			throw new Exception('Purchase controller_name : Error in remove_post function - ' . $ex);
		}
	}
}
