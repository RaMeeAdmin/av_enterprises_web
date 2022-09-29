<?php

class Gate_entry_pass extends CI_Controller {
	function __construct() {
		parent::__construct();
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
		$this->load->model('Gate_entry_pass_model');
	}

	public function index() {
		try {
			$data['noof_page'] = 0;
			$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_all_gate_entry_pass();

			$data['_view'] = 'gate_entry_pass/index';
			$this->load->view('gate_entry_pass/index', $data);
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass Controller : Error in index function - ' . $ex);
		}
	}

	function add() {

		$company_id = $this->session->userdata('company_id');
		$data['vehicle'] = $this->db->query("select * from vehicle")->result_array();
		$data['supplier'] = $this->db->query("select * from suppliers where company_id='$company_id'")->result_array();

		$data['_view'] = 'gate_entry_pass/add';
		$this->load->view('gate_entry_pass/add', $data);

	}

	public function edit($id) {
		try {
				$company_id = $this->session->userdata('company_id');
			$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
			$data['supplier'] = $this->db->query("select * from suppliers where company_id='$company_id'")->result_array();
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
					redirect('gate_entry_pass/index');
				} else {
					$data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
					// print_r($data['truck_number']);exit();
					$data['_view'] = 'gate_entry_pass/edit';
					$this->load->view('gate_entry_pass/edit', $data);
				}
			} else {
				show_error('The gate_entry_pass you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass Controller : Error in edit function - ' . $ex);
		}
	}
/*
 * Deleting gate_entry_pass
 */
	function remove($id) {
		try {
			$gate_entry_pass = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
			// check if the gate_entry_pass exists before trying to delete it
			if (isset($gate_entry_pass['id'])) {
				$this->Gate_entry_pass_model->delete_gate_entry_pass($id);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
				redirect('gate_entry_pass/index');
			} else {
				show_error('The gate_entry_pass you are trying to delete does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass Controller : Error in remove function - ' . $ex);
		}
	}

	public function mst_vehicle() {
		extract($_POST);
		//print_r($_POST);exit();
		$response = array();
		$records = $this->db->query("SELECT * FROM vehicle WHERE vehicle_number like'%" . $search . "%' ")->result();
		foreach ($records as $row) {
			$response[] = array("id" => $row->id, "value" => $row->id, "label" => $row->vehicle_number);
		}
		echo json_encode($response);
	}
	/*
		  * View more a gate_entry_pass
	*/
	public function view_more($id) {
		try {
			$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_gate_entry_pass($id);
			//print_r($data['gate_entry_pass']);exit();
			if (isset($data['gate_entry_pass']['id'])) {
				$data['_view'] = 'gate_entry_pass/view_more';
				$this->load->view('gate_entry_pass/view_more', $data);
			} else {
				show_error('The gate_entry_pass you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass Controller : Error in View more function - ' . $ex);
		}
	}
	/*
		* Listing of gate_entry_pass
	*/
	public function search_by_clm() {
		$column_name = $this->input->post('column_name');
		$value_id = $this->input->post('value_id');
		$data['noof_page'] = 0;
		$params = array();
		$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_all_gate_entry_pass_by_cat($column_name, $value_id);
		$data['_view'] = 'gate_entry_pass/index';
		$this->load->view('layouts/main', $data);
	}
	/*
		* get search values by column- gate_entry_pass
	*/
	public function get_search_values_by_clm() {
		$clm_name = $this->input->post('clm_name');
		$value = $this->input->post('value');
		$id = $this->input->post('id');
		$params = array(
			$clm_name => $value,
		);
		$this->Gate_entry_pass_model->update_gate_entry_pass($id, $params);
		$data['noof_page'] = 0;
		$data['gate_entry_pass'] = $this->Gate_entry_pass_model->get_all_gate_entry_pass();
		$this->load->view('gate_entry_pass/index', $data);
	}

}
