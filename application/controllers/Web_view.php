<?php

class Web_view extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Bagasse_sale_model');
		$this->load->model('Suppliers_model');
		$this->load->model('Gate_entry_pass_model');
		$this->load->model('Material_model');
		$this->load->model('Customer_model');
		$this->load->model('Petrol_pumps_model');
		$this->load->model('State_model');
		$this->load->model('Transporter_model');
		$this->load->model('Transport_details_model');
		$this->load->model('Diesel_payments_model');
	}

	function add_sales_order($user_id) {

		try {
		$newdata = mobile_login($user_id);
		$this->session->set_userdata($newdata);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				extract($_POST);

				$insert = array(
					"sale_code" => 'AVS' . date('Yhms'),
					"customer_id" => $customer,
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
				redirect('deliver/sales_list');

			} else {
				$data['state'] = $this->State_model->get_all_state();
				$data['customer'] = $this->Customer_model->get_all_customer();
				$data['material'] = $this->db->query("select * from material")->result_array();
				$data['_view'] = 'deliver/add';
				$this->load->view('deliver/add_sales_order', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in add function - ' . $ex);
		}
	}
	public function sales_list($user_id) {

		$newdata = mobile_login($user_id);
		$this->session->set_userdata($newdata);

		try {
			$data['noof_page'] = 0;
			$data['deliver'] = $this->db->query("select * from bagasse_sale")->result_array();
			$data['customer'] = $this->Customer_model->get_all_customer();
			$this->load->view('deliver/sales_list', $data);
		} catch (Exception $ex) {
			throw new Exception('Deliver Controller : Error in index function - ' . $ex);
		}
	}
	public function purchase_list() {
		try {
			$data['noof_page'] = 0;
			$data['customer'] = $this->Customer_model->get_all_customer();
			$data['purchase'] = $this->db->query("select * from purchase")->result_array();
			$this->load->view('purchase/purchase_list', $data);
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in index function - ' . $ex);
		}
	}
	function add_purchase_order($user_id) {

		try {
			$newdata = mobile_login($user_id);
		$this->session->set_userdata($newdata);

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
				redirect('purchase/purchase_list');

			} else {
				$data['state'] = $this->State_model->get_all_state();
				$data['supplier'] = $this->db->query("select * from suppliers")->result_array();
				$data['material'] = $this->db->query("select * from material")->result_array();
				$data['_view'] = 'purchase/add_purchase_order';
				$this->load->view('purchase/add_purchase_order', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in add function - ' . $ex);
		}
	}
	function mobile_dashboard($user_id) {
       $newdata = mobile_login($user_id);
		$this->session->set_userdata($newdata);

		$data['_view'] = 'dashboard';
		$this->load->view('mobile_dashboard', $data);
	}

	 function getpass_list($user_id)
	{
		$newdata = mobile_login($user_id);
		$this->session->set_userdata($newdata);

		$data['noof_page'] = 0;
		$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_all_gate_entry_pass();

			$data['_view'] = 'gate_entry_pass/index';
			$this->load->view('mobile_view/gate_pass_list', $data);
	}

	function getpass_add($user_id) {
		
		$newdata = mobile_login($user_id);
		$this->session->set_userdata($newdata);

		$data['vehicle'] = $this->db->query("select * from vehicle")->result_array();

		$data['_view'] = 'gate_entry_pass/add';
		$this->load->view('mobile_view/getpass_add', $data);

	}
 function getpass_edit($id)
{
	try {
			$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
			$user_data = $this->session->userdata();
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['gate_entry_pass']['id'])) {
				$params = array(
					'date' => $this->input->post('date'),
					'gate_pass_for' => $this->input->post('gate_pass_for'),
					'gate_pass_given_to' => $this->input->post('gate_pass_given_to'),
					'place' => $this->input->post('place'),
					'truck_number_id' => $this->input->post('truck_number'),
					'gat_pass_create_with_name' => $this->input->post('gat_pass_create_with_name'),

					'company_id' => $user_data['id'],
					'updated_by' => date('Y-m-d H:m:s'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Gate_entry_pass_model->update_gate_entry_pass($id, $params);
					$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
					redirect('ws_getpass_list/'.$id);
				} else {
					$data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
					
					$data['_view'] = 'gate_entry_pass/edit';
					$this->load->view('mobile_view/getpass_edit', $data);
				}
			} else {
				show_error('The gate_entry_pass you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass Controller : Error in edit function - ' . $ex);
		}
	}
	
 function getpass_print($id) {
		try {
			$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
			//print_r($data['gate_entry_pass']);exit();
			if (isset($data['gate_entry_pass']['id'])) {
				$data['_view'] = 'mobile_view/view_more';
				$this->load->view('mobile_view/getpass_print', $data);
			} else {
				show_error('The gate_entry_pass you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass Controller : Error in View more function - ' . $ex);
		}
	}

 function transport_details_list($user_id){
	$newdata = mobile_login($user_id);
	$this->session->set_userdata($newdata);
	try {
			$data['noof_page'] = 0;
			$data['transport_details'] = $this->Transport_details_model->get_all_transport_details();
			$data['_view'] = 'mobile_view/index';
			$this->load->view('mobile_view/transport_details_list', $data);
		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in index function - ' . $ex);
		}
}
function transport_details_add($user_id){

	 $newdata = mobile_login($user_id);
	  $this->session->set_userdata($newdata);

	      $data['last_transport'] = $this->Transport_details_model->get_last_transport();

				$data['_view'] = 'transport_details/add';
				$data['suppliers'] = $this->Suppliers_model->get_all_suppliers();
				$data['transporter'] = $this->Transporter_model->get_all_transporter();
				$data['material'] = $this->Material_model->get_all_material();
				$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
				$data['labour'] = $this->Petrol_pumps_model->get_all_labour();
				$data['so'] = $this->db->query("select * from bagasse_sale")->result_array();
				
				$this->load->view('mobile_view/transport_details_add', $data);
}
 function transport_details_diesel_print($id) {

		try {

			$data['diesel_transaction'] = $this->Transport_details_model->get_all_diesel_transaction($id);
			//print_r($data['diesel_transaction']);exit();
			if (isset($data['diesel_transaction'])) {
				$data['_view'] = 'transport_details/view_more';
				$this->load->view('mobile_view/transport_details_diesel_print', $data);
			} else {
				show_error('The transport_details you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in View more function - ' . $ex);
		}
	}

	 function transport_details_view_more($id) {
		try {
			$data['transport_details'] = $this->Transport_details_model->get_transport_details($id);
			$data['diesel_transaction'] = $this->Transport_details_model->get_all_diesel_transaction($id);
			if (isset($data['transport_details']['id'])) {
				$data['_view'] = 'transport_details/view_more';
				$this->load->view('mobile_view/transport_details_view', $data);
			} else {
				show_error('The transport_details you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in View more function - ' . $ex);
		}
	}
	 function transport_details_view_print($id){
		try {
			$data['transport_details'] = $this->Transport_details_model->get_transport_details($id);
			$data['diesel_transaction'] = $this->Transport_details_model->get_all_diesel_transaction($id);

			if (isset($data['transport_details']['id'])) {
				$data['_view'] = 'transport_details/view_more';
				$this->load->view('mobile_view/transport_details_view_print', $data);
			} else {
				show_error('The transport_details you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in View more function - ' . $ex);
		}
	}
	 function transport_details_edit($id) {
		extract($_POST);

		try
		{
			$data['transport_details'] = $this->Transport_details_model->get_transport_details($id);

			$data['labour'] = $this->Petrol_pumps_model->get_all_labour();
			$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();

			$this->load->library('upload');
			$this->load->library('form_validation');

			if (isset($data['transport_details']['id'])) {

				if (!empty($_FILES['delivery_proof']['name'])) {
					$config['upload_path'] = 'uploads/document/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['file_name'] = $_FILES['delivery_proof']['name'];
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if ($this->upload->do_upload('delivery_proof')) {
						$uploadData = $this->upload->data();
						$delivery_proof = $uploadData['file_name'];

						$is_deliver = 'Y';

						$update = array('weight_dispatch' => $delivery_weight);
						$this->db->where('id', $so_id);
						$this->db->update("bagasse_sale", $update);

					} else {
						$delivery_proof = '';
						$is_deliver = 'N';

					}
				} else {
					$delivery_proof = '';
					$is_deliver = 'N';

				}

				$params = array(

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
					'unloading_id' => $this->input->post('unloading_id'),
					'delivery_proof' => $delivery_proof,
					'is_deliver' => $is_deliver,
					'updated_at' => date('Y-m-d H:m:s'),
				);
				if (isset($_POST) && count($_POST) > 0) {
					$this->Transport_details_model->update_transport_details($id, $params);
					$this->db->delete('diesel_transaction', array('transport_id' => $id));
					//print_r($pumps_id);exit();
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
					$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
					redirect('transport_details/index');
				} else {

					$data['diesel_transaction'] = $this->Transport_details_model->get_all_diesel_transaction($id);

					$data['_view'] = 'transport_details/edit';
					$this->load->view('mobile_view/transport_details_edit', $data);
				}
			} else {
				show_error('The transport_details you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in edit function - ' . $ex);
		}
	}

function diesel_payment_list($user_id){
	
	try {
		 $newdata = mobile_login($user_id);
	    $this->session->set_userdata($newdata);
		$data['noof_page'] = 0;
	  $data['diesel_payment'] = $this->Diesel_payments_model->get_all_diesel_payment();
	  $data['_view'] = 'transport_details/index';
	 $this->load->view('mobile_view/diesel_payment_list', $data);
	}catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in edit function - ' . $ex);
		}
}
 function diesel_payment_add($user_id) {

		try {
			 $newdata = mobile_login($user_id);
	        $this->session->set_userdata($newdata);
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
				redirect('Web_view/diesel_payment_list');
			} else {
				$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
				$data['transporter'] = $this->db->query("select * from transporter")->result_array();
				$data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
				$data['material'] = $this->Material_model->get_all_material();
				$data['labour'] = $this->Petrol_pumps_model->get_all_labour();
				$data['_view'] = 'customer/add';
				$this->load->view('mobile_view/diesel_payment_add', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in add function - ' . $ex);
		}
	}
	 function diesel_payment_edit($id) {

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
					redirect('Web_view/diesel_payment_list');
				} else {
					$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
					$data['transporter'] = $this->db->query("select * from transporter")->result_array();
					$data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
					$data['material'] = $this->Material_model->get_all_material();
					$data['labour'] = $this->Petrol_pumps_model->get_all_labour();

					$data['_view'] = 'customer/edit';
					$this->load->view('mobile_view/diesel_payment_edit', $data);
				}
			} else {
				show_error('The customer you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Customer Controller : Error in edit function - ' . $ex);
		}
	}
}