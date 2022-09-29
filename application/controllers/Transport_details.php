<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transport_details extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Transport_details_model');
		$this->load->model('Suppliers_model');
		$this->load->model('Transporter_model');
		$this->load->model('Material_model');
		$this->load->model('Petrol_pumps_model');
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
	}

	public function index() {
		try {
			$data['noof_page'] = 0;
			$data['transport_details'] = $this->Transport_details_model->get_all_transport_details();
			$data['_view'] = 'transport_details/index';
			$this->load->view('transport_details/index', $data);
		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in index function - ' . $ex);
		}
	}

	function add() {
		try {

			extract($_POST);
			$user_data = $this->session->userdata();
			$tid = $this->input->post('tid');
			$driver_id = $this->input->post('driver_id');

			if (isset($_POST) && count($_POST) > 0) {
				if ($tid == '') {

					$params = array(
						'vehicle_number' => $this->input->post('truck_number'),
						'created_on' => date('Y-m-d H:m:s'),
						'added_by' => $user_data['id'],
					);
					$data = $this->db->insert('vehicle', $params);
					$tid = $this->db->insert_id();
				}
				if ($driver_id == '') {

					$params = array(
						'name' => $this->input->post('driver_name'),
						'pan' => $this->input->post('pan_no'),
						'license_number' => $this->input->post('licence_no'),
						'contact_number' => $this->input->post('contact_number'),
						'created_at' => date('Y-m-d H:m:s'),

					);
					$data = $this->db->insert('driver', $params);
					$driver_id = $this->db->insert_id();
				}
			}
			$params = array(
				'dc_number' => $this->input->post('dc_number'),
				'date' => date("Y-m-d", strtotime($this->input->post('date'))),
				'invoice_number' => $this->input->post('invoice_number'),
				'supply_form_id' => $this->input->post('supply_form_id'),
				'supply_to_id' => $this->input->post('supply_to_id'),
				'transporter_id' => $this->input->post('transporter_id'),
				'material_id' => $this->input->post('material_id'),
				'driver_id' => $driver_id,
				'vehicle_id' => $tid,
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
				//'pumps_id'=> $this->input->post('pumps_id'),
				//'diesel_qty'=> $this->input->post('diesel_qty'),
				//'diesel_rate'=> $this->input->post('diesel_rate'),
				// 'diesel_amount'=> $this->input->post('diesel_amount'),
				'loading_id' => $this->input->post('loading_id'),
			);
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
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
				redirect('transport_details/index');
			} else {
				$data['last_transport'] = $this->Transport_details_model->get_last_transport();

				$data['_view'] = 'transport_details/add';
				$data['suppliers'] = $this->Suppliers_model->get_all_suppliers();
				$data['transporter'] = $this->Transporter_model->get_all_transporter();
				$data['material'] = $this->Material_model->get_all_material();
				$data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
				$data['labour'] = $this->Petrol_pumps_model->get_all_labour();
				$data['so'] = $this->db->query("select * from bagasse_sale")->result_array();
				$this->load->view('transport_details/add', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in add function - ' . $ex);
		}
	}

	public function mst_driver() {
		extract($_POST);

		$response = array();
		$data['vehicle'] = $this->db->query("SELECT * FROM vehicle")->result_array();
		// foreach ($records as $row) {
		// 	$response[] = array("id" => $row->id, "value" => $row->id, "label" => $row->name, "pan" => $row->pan, "license_number" => $row->license_number, "contact_number" => $row->contact_number);
		// }
		echo json_encode($data);
	}
	/*
		  * Editing a transport_details
	*/
	public function edit($id) {
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
					$this->load->view('transport_details/edit', $data);
				}
			} else {
				show_error('The transport_details you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in edit function - ' . $ex);
		}
	}

	function remove($id) {
		try {
			$transport_details = $this->Transport_details_model->get_transport_details($id);
			// check if the transport_details exists before trying to delete it
			if (isset($transport_details['id'])) {
				$this->Transport_details_model->delete_transport_details($id);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
				redirect('transport_details/index');
			} else {
				show_error('The transport_details you are trying to delete does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in remove function - ' . $ex);
		}
	}
	/*
		  * View more a transport_details
	*/
	public function view_more($id) {
		try {
			$data['transport_details'] = $this->Transport_details_model->get_transport_details($id);
			$data['diesel_transaction'] = $this->Transport_details_model->get_all_diesel_transaction($id);
			if (isset($data['transport_details']['id'])) {
				$data['_view'] = 'transport_details/view_more';
				$this->load->view('transport_details/view_more', $data);
			} else {
				show_error('The transport_details you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in View more function - ' . $ex);
		}
	}
	public function diesel_print($id) {

		try {

			$data['diesel_transaction'] = $this->Transport_details_model->get_all_diesel_transaction($id);
			//print_r($data['diesel_transaction']);exit();
			if (isset($data['diesel_transaction'])) {
				$data['_view'] = 'transport_details/view_more';
				$this->load->view('transport_details/diesel_print', $data);
			} else {
				show_error('The transport_details you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in View more function - ' . $ex);
		}
	}
	public function view_print($id) {
		try {
			$data['transport_details'] = $this->Transport_details_model->get_transport_details($id);
			$data['diesel_transaction'] = $this->Transport_details_model->get_all_diesel_transaction($id);

			if (isset($data['transport_details']['id'])) {
				$data['_view'] = 'transport_details/view_more';
				$this->load->view('transport_details/view_print', $data);
			} else {
				show_error('The transport_details you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transport_details Controller : Error in View more function - ' . $ex);
		}
	}
	/*
		* Listing of transport_details
	*/
	public function search_by_clm() {
		$column_name = $this->input->post('column_name');
		$value_id = $this->input->post('value_id');
		$data['noof_page'] = 0;
		$params = array();
		$data['transport_details'] = $this->Transport_details_model->get_all_transport_details_by_cat($column_name, $value_id);
		$data['_view'] = 'transport_details/index';
		$this->load->view('layouts/main', $data);
	}
	
	public function get_search_values_by_clm() {
		$clm_name = $this->input->post('clm_name');
		$value = $this->input->post('value');
		$id = $this->input->post('id');
		$params = array(
			$clm_name => $value,
		);
		$this->Transport_details_model->update_transport_details($id, $params);
		$data['noof_page'] = 0;
		$data['transport_details'] = $this->Transport_details_model->get_all_transport_details();
		$this->load->view('transport_details/index', $data);
	}

	
}
