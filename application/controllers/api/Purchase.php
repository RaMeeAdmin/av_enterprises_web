<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Purchase extends REST_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Purchase_model');
		$this->load->model('Deliver_model');
		$this->load->database();
	}

	public function empList_post() {
		$postData = $this->input->post();
		$data = $this->Purchase_model->getEmployees($postData);
		echo json_encode($data);
	}

	public function list_post() {
		$postData = $this->input->post();
		$data = $this->Deliver_model->getsalesorder($postData);
		echo json_encode($data);

	}
	function get_material_gst_post(){
		extract($_POST);
		$material = $this->db->query("select * from material where id = '$id'")->row_array();
		if (count($material) != 0) {
			$response = array(
				'success' => true,
				'message' => 'get all data Succesfully',
				'data' => $material,
			);
			$this->response($response, REST_Controller::HTTP_OK);
		} else {
			$response = array(
				'success' => false,
				'message' => 'Detail is not found',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
	}
	function price_change_post(){
		extract($_POST);

		$purchase = $this->db->query("select * from purchase where id='$id'")->row_array();
		$purchaseitems = $this->db->query("select * from purchaseitems where purchase_id='$id'")->result_array();
		
        $this->db->where('id',$id);
       $this->db->update('purchase',array("status" => 'close'));
		if (isset($_POST) && count($_POST) > 0) {
				extract($_POST);
				$total_cost = $price * $purchaseitems[0]['weight'];
				$insert = array(
					"purchase_code" => 'AV' . date('Yhms'),
					"supplier_id" => $purchase['supplier_id'],
					"reference_no"=> $purchase['purchase_code'],
					"purchase_date" => date('Y-m-d'),
					'subtotal' => $total_cost,
					'grand_total' => $total_cost,
					'weight' => $purchase['weight'],
					'purchase_note' => $purchase['purchase_note'],
					'status'=> 'open',
					'due_date'=>$due_date,
				);

				$this->db->insert('purchase', $insert);
				$insert_id = $this->db->insert_id();
				for ($i = 0; $i < count($purchaseitems); $i++) {
					$total_cost = $price * $purchaseitems[$i]['weight'];
					$params = array(
						'item_id' => $purchaseitems[$i]['item_id'],
						'weight' => $purchaseitems[$i]['weight'],
						'rate' =>$price,
						'total_cost' => $total_cost,
						'purchase_status' => 'Order',
						'purchase_id' => $insert_id,
					);
					$this->db->insert('purchaseitems', $params);
				}

			}
			$response = array(
				'success' => true,
				'message' => 'data added Succesfully',

			);
			$this->response($response, REST_Controller::HTTP_OK);
		
	}

	function add_post() {

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
					'status'=> 'open',
					'due_date'=>$due_date,

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

			}
			$response = array(
				'success' => true,
				'message' => 'data added Succesfully',

			);
			$this->response($response, REST_Controller::HTTP_OK);
		} catch (Exception $ex) {
			$response = array(
				'success' => false,
				'message' => 'Detail is not found',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
	}

	function add_so_post() {

		try {

			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				extract($_POST);

				$insert = array(
					"sale_code" => 'AVS' . date('Yhms'),
					"customer_id" => $customer,
					"purchase_id" => $purchase_id,
					"sale_date" => $date,
					'subtotal' => array_sum($total),
					'grand_total' => array_sum($total),
					'weight' => array_sum($weight),
					'sale_note' => $note,

				);
				$this->db->insert('bagasse_sale', $insert);
				$insert_id = $this->db->insert_id();

				for ($i = 0; $i < count($material); $i++) {

					$total_cost = $price[$i] * $weight[$i];
					$params = array(
						'item_id' => $material[$i],
						'weight' => $weight[$i],
						'rate' => $price[$i],
						'total_cost' => $total_cost,
						'status' => 'deliver',
						'sale_id' => $insert_id,
					);
					$this->db->insert('sales_item', $params);
				}

				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
				redirect('deliver/index');

			} else {
				$data['state'] = $this->State_model->get_all_state();
				$data['customer'] = $this->Customer_model->get_all_customer();
				$data['material'] = $this->db->query("select * from material")->result_array();
				$data['_view'] = 'deliver/add';
				$this->load->view('deliver/add', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in add function - ' . $ex);
		}
	}
	function view_purchase_receipt_post() {
		extract($_POST);
		$data['purchaseitems'] = $this->db->query("select material.name,purchaseitems.weight,purchaseitems.total_cost,rate from purchaseitems left join material on material.id=purchaseitems.item_id where purchase_id='$id'")->result_array();

		$data['purchase'] = $this->db->query("select purchase_date,purchase_code from purchase  where id='$id'")->row_array();

		$data['supplier'] = $this->db->query("select suppliers.company_name,suppliers.address,suppliers.phone from purchase left join suppliers on suppliers.id=purchase.supplier_id where purchase.id='$id'")->row_array();
		if (count($data) != 0) {
			$response = array(
				'success' => true,
				'message' => 'get all data Succesfully',
				'data' => $data,
			);
			$this->response($response, REST_Controller::HTTP_OK);
		} else {
			$response = array(
				'success' => false,
				'message' => 'Detail is not found',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}

	}
	function view_sales_receipt_post() {
		extract($_POST);

		$data['deliver'] = $this->db->query("select material.name,sales_item.weight,sales_item.total_cost,rate from sales_item left join material on material.id=sales_item.item_id where sale_id='$id'")->result_array();

		$data['sales'] = $this->db->query("select sale_date,sale_code from bagasse_sale where id='$id'")->row_array();

		$data['customer'] = $this->db->query("select customer.name,customer.address,customer.phone from bagasse_sale left join customer on customer.id=bagasse_sale.customer_id where bagasse_sale.id='$id'")->row_array();

		if (count($data) != 0) {
			$response = array(
				'success' => true,
				'message' => 'get all data Succesfully',
				'data' => $data,
			);
			$this->response($response, REST_Controller::HTTP_OK);
		} else {
			$response = array(
				'success' => false,
				'message' => 'Detail is not found',
			);
			$this->response($response, REST_Controller::HTTP_OK);
		}
	}
	public function get_all_post() {

		$data['purchase'] = $this->db->query("select * from purchase")->row_array();

		$response = array(
			'status' => 200,
			'message' => 'get all data Succesfully',
			'data' => $data,
		);
		$this->response($response, REST_Controller::HTTP_OK);

	}

	function addnew_post() {
		try {
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
