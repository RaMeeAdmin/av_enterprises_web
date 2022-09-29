<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Transport_details extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Transport_details_model');
		$this->load->model('Suppliers_model');
		$this->load->model('Transporter_model');
		$this->load->model('Material_model');
		$this->load->model('Petrol_pumps_model');
	}

	public function get_all_post() {
		try {
			$data['transport_details'] = $this->Transport_details_model->get_all_transport_details();
			if ($data['transport_details'] && $data['transport_details'] != null) {
				$transport_details_ar = array();
				foreach ($data['transport_details'] as $t) {
					$t_ar = array();
					$t_ar['id'] = $t['id'];
					$t_ar['dc_number'] = $t['dc_number'];
					$t_ar['date'] = $t['date'];
					$t_ar['invoice_number'] = $t['invoice_number'];
					$t_ar['supply_form_id'] = $t['supply_form_id'];
					$t_ar['supply_to_id'] = $t['supply_to_id'];
					$t_ar['transporter_id'] = $t['transporter_id'];
					$t_ar['material_id'] = $t['material_id'];
					$t_ar['driver_id'] = $t['driver_id'];
					$t_ar['vehicle_id'] = $t['vehicle_id'];
					$t_ar['chalan_weight'] = $t['chalan_weight'];
					$t_ar['chalan_rate'] = $t['chalan_rate'];
					$t_ar['chalan_amount'] = $t['chalan_amount'];
					$t_ar['delivery_weight'] = $t['delivery_weight'];
					$t_ar['delivery_rate'] = $t['delivery_rate'];
					$t_ar['delivery_amount'] = $t['delivery_amount'];
					$t_ar['difference_qty'] = $t['difference_qty'];
					$t_ar['difference_amount'] = $t['difference_amount'];
					$t_ar['total_advance'] = $t['total_advance'];
					$t_ar['cheque_amount'] = $t['cheque_amount'];
					$t_ar['cash_amount'] = $t['cash_amount'];
					$t_ar['rtgs_amount'] = $t['rtgs_amount'];
					$t_ar['diesel_advance'] = $t['diesel_advance'];
					$t_ar['loading_id'] = $t['loading_id'];
					$t_ar['delivery_proof'] = $t['delivery_proof'];
					$t_ar['created_at'] = $t['created_at'];
					$t_ar['updated_at'] = $t['updated_at'];
					$transport_details_ar[] = $t_ar;
				}
				$response = array(
					'success' => true,
					'message' => 'get all data Succesfully',
					'data' => $transport_details_ar,
				);
				$this->response($response, REST_Controller::HTTP_OK);
			} else {
				$response = array(
					'success' => flase,
					'message' => 'Detail is not found',
				);
				$this->response($response, REST_Controller::HTTP_OK);
			}
		} catch (Exception $ex) {
			throw new Exception('Transport_details controller_name : Error in get_all_post function - ' . $ex);
		}
	}

	function add_post() {
		try {
			$user_data = $this->session->userdata();

			$company_id = $user_data['company_id'];

			$tid = $this->input->post('tid');
			$driver_id = $this->input->post('driver_id');

			if (isset($_POST) && count($_POST) > 0) {

				$so_number = $this->input->post('so_number');

				$bagasse_sale = $this->db->query("select customer_id from bagasse_sale where id='$so_number'")->row_array();
				$customer_id = $bagasse_sale['customer_id'];

				$params = array(
					'dc_number' => $this->input->post('dc_number'),
					'so_id' => $this->input->post('so_number'),
					'date' => date("Y-m-d", strtotime($this->input->post('date'))),
					'invoice_number' => $this->input->post('invoice_number'),
					'supply_form_id' => $company_id,
					'supply_to_id' => $customer_id,
					'transporter_id' => $this->input->post('transporter_id'),
					'material_id' => $this->input->post('material_id'),
					'driver_name' => $this->input->post('drivername'),
					'vehicle_id' => $this->input->post('vehicle_id'),
					'chalan_weight' => $this->input->post('chalan_weight'),
					'chalan_rate' => $this->input->post('chalan_rate'),
					'chalan_amount' => $this->input->post('chalan_amount'),
					'delivery_weight' => $this->input->post('delivery_weight'),
					'delivery_rate' => $this->input->post('delivery_rate'),
					'delivery_amount' => $this->input->post('delivery_amount'),
					'difference_qty' => $this->input->post('difference_qty'),
					'difference_amount' => $this->input->post('difference_amount'),
					'cheque_amount' => $this->input->post('cheque_amount'),
					'cash_amount' => $this->input->post('cash_amount'),
					'diesel_advance' => $this->input->post('diesel_advance'),
					'rtgs_amount' => $this->input->post('rtgs_amount'),
					'total_advance' => $this->input->post('total_advance'),
					'company_id' => $company_id,
					//'pumps_id'=> $this->input->post('pumps_id'),
					//'diesel_qty'=> $this->input->post('diesel_qty'),
					//'diesel_rate'=> $this->input->post('diesel_rate'),
					// 'diesel_amount'=> $this->input->post('diesel_amount'),
					'loading_id' => $this->input->post('loading_id'),
				);

				$pumps_id = $this->input->post('pumps_id');
				$diesel_qty = $this->input->post('diesel_qty');
				$diesel_rate = $this->input->post('diesel_rate');
				$diesel_amount = $this->input->post('diesel_amount');

				$this->load->library('upload');
				$this->load->library('form_validation');
				if (isset($_POST) && count($_POST) > 0) {
					$id = $this->Transport_details_model->add_transport_details($params);
					for ($i = 0; $i < count($pumps_id); $i++) {
						$params = array(
							'pumps_id' => $pumps_id[$i],
							'diesel_qty' => $diesel_qty[$i],
							'diesel_rate' => $diesel_rate[$i],
							'diesel_amount' => $diesel_amount[$i],
							'transport_id' => $id,
						);
						$this->db->insert('diesel_transaction', $params);
					}
					$data['transport_details'] = $this->Transport_details_model->get_transport_details($id);
					$response = array(
						'success' => true,
						'message' => 'Succesfully Added',
						'data' => $data,
					);
					$this->response($response, REST_Controller::HTTP_OK);
				} else {
					$response = array(
						'success' => flase,
						'message' => 'Not Added try again',
						'data' => '',
					);
					$this->response($response, REST_Controller::HTTP_OK);
				}
			}
		} catch (Exception $ex) {
			throw new Exception('Transport_details controller_name : Error in new transport_details function - ' . $ex);
		}
	}

	function get_transpoter_post() {
		$data = $this->Transporter_model->get_all_transporter();
		if ($data != '') {
			$response = array(
				'success' => true,
				'message' => 'Record found',
				'data' => $data,
			);
			$this->response($response, REST_Controller::HTTP_OK);
		} else {
			$response = array(
				'success' => false,
				'message' => 'Not Record found',
				'data' => '',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
	}
	function get_transpoter_name_post() {
		$data = $this->db->query("select * from transporter")->result_array();
		if ($data != '') {
			$response = array(
				'success' => true,
				'message' => 'Record found',
				'data' => $data,
			);
			$this->response($response, REST_Controller::HTTP_OK);
		} else {
			$response = array(
				'success' => false,
				'message' => 'Not Record found',
				'data' => '',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
	}

	function edit_post($id) {
		try {
			$data['transport_details'] = $this->Transport_details_model->get_transport_details($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['transport_details']['id'])) {
				$params = array(
					'dc_number' => $this->input->post('dc_number'),
					'date' => $this->input->post('date'),
					'invoice_number' => $this->input->post('invoice_number'),
					'supply_form_id' => $this->input->post('supply_form_id'),
					'supply_to_id' => $this->input->post('supply_to_id'),
					'transporter_id' => $this->input->post('transporter_id'),
					'material_id' => $this->input->post('material_id'),
					'driver_id' => $this->input->post('driver_id'),
					'vehicle_id' => $this->input->post('vehicle_id'),
					'chalan_weight' => $this->input->post('chalan_weight'),
					'chalan_rate' => $this->input->post('chalan_rate'),
					'chalan_amount' => $this->input->post('chalan_amount'),
					'delivery_weight' => $this->input->post('delivery_weight'),
					'delivery_rate' => $this->input->post('delivery_rate'),
					'delivery_amount' => $this->input->post('delivery_amount'),
					'difference_qty' => $this->input->post('difference_qty'),
					'difference_amount' => $this->input->post('difference_amount'),
					'total_advance' => $this->input->post('total_advance'),
					'cheque_amount' => $this->input->post('cheque_amount'),
					'cash_amount' => $this->input->post('cash_amount'),
					'rtgs_amount' => $this->input->post('rtgs_amount'),
					'diesel_advance' => $this->input->post('diesel_advance'),
					'loading_id' => $this->input->post('loading_id'),
					'delivery_proof' => $this->input->post('delivery_proof'),
					'created_at' => $this->input->post('created_at'),
					'updated_at' => $this->input->post('updated_at'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Transport_details_model->update_transport_details($id, $params);
					$response = array(
						'success' => true,
						'message' => 'Succesfully Updated',
						'data' => $id,
					);
					$this->response($response, REST_Controller::HTTP_OK);
				} else {
					$response = array(
						'success' => flase,
						'message' => 'Not Updated Try again',
						'data' => $id,
					);
					$this->response($response, REST_Controller::HTTP_OK);
				}
			}
		} catch (Exception $ex) {
			throw new Exception('Transport_details controller_name : Error in edit_post function - ' . $ex);
		}
	}

	function remove_post($id) {
		try {
			$transport_details = $this->Transport_details_model->get_transport_details($id);
			// check if the transport_details exists before trying to delete it
			if (isset($transport_details['id'])) {
				$this->Transport_details_model->delete_transport_details($id);
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
			throw new Exception('Transport_details controller_name : Error in remove_post function - ' . $ex);
		}
	}

	function get_so_details_post() {
		extract($_POST);
		$data['sale'] = $this->db->query("select * from bagasse_sale where id='$id'")->row_array();
		$customer_id = $data['sale']['customer_id'];

		$data['customer'] = $this->db->query("select * from bagasse_sale where id='$customer_id'")->row_array();
		$data['sales_item'] = $this->db->query("select * from sales_item left join material on material.id=sales_item.item_id where sales_item.sale_id='$id'")->result_array();
		//	echo json_encode($data);
		$response = array(
			'status' => 200,
			'message' => 'Succesfully Removed',
			'data' => $data,
		);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	function get_transporter_details_post() {
		extract($_POST);
		$data['vehicle'] = $this->db->query("select * from vehicle where transport_id='$id'")->row_array();
		$data['driver'] = $this->db->query("select * from driver where transporter_id='$id'")->row_array();

		$response = array(
			'status' => 200,
			'message' => 'Get Data',
			'data' => $data,
		);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	function get_material_rate_post() {

		extract($_POST);
		$data = $this->db->query("select * from sales_item where sale_id='$sale_id' and item_id='$id'")->row_array();

		$response = array(
			'status' => 200,
			'message' => 'Get Data',
			'data' => $data,
		);
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function get_location_post() {
		extract($_POST);
		$supplier = $this->db->query("select address from suppliers where id='$id'")->row_array();
		$response = array(
			'status' => 200,
			'message' => 'Get Data',
			'data' => $supplier,
		);
		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function get_po_details_post() {
		extract($_POST);
		$data['purchase'] = $this->db->query("select * from purchaseitems left join material on material.id=purchaseitems.item_id  where purchase_id='$id'")->result_array();
		$response = array(
			'status' => 200,
			'message' => 'Get Data',
			'data' => $data,
		);
		$this->response($response, REST_Controller::HTTP_OK);

	}

}
