<?php
/*
Generated by Manuigniter v2.0
www.manuigniter.com
 */

class User extends CI_Controller {
	function __construct() {
		parent::__construct();
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
		$this->load->model('User_model');
		$this->load->model('Locations_model');
		$this->load->helper('general');
		$this->load->model('Suppliers_model');
	}
	/*
		* Listing of user
	*/
	public function index() {
		try {
			$data['noof_page'] = 0;
			$data['user'] = $this->User_model->get_all_user();
			$data['_view'] = 'user/index';
			$this->load->view('user/index', $data);
		} catch (Exception $ex) {
			throw new Exception('User Controller : Error in index function - ' . $ex);
		}
	}
	/*
		  * Adding a new user
	*/
	function add() {
		try {
			$l = $this->input->post('location');
			$user_type = $this->input->post('user_type');
			if ($user_type == '2') {
				$company_id = $this->input->post('company_id');
			} else {
				$company_id = '';
			}
			$location = implode(',', (array) $l);
			$params = array(
				'name' => $this->input->post('name'),
				'mobile_number' => $this->input->post('mobile_number'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => base64_encode($this->input->post('password')),
				'user_type' => $this->input->post('user_type'),
				'location_id' => $location,
				'isActive' => 'Y',
				'is_mobile_login' => 'N',
				'company_id' => $company_id,
				'is_delete' => 'N',
				'created_at' => date('Y-m-d H:m:s'),
				// 'updated_at'=> $this->input->post('updated_at'),
			);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($_POST) && count($_POST) > 0) {
				$id = $this->User_model->add_user($params);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
				redirect('user/index');
			} else {
				$data['_view'] = 'user/add';
				$data['user_type'] = $this->User_model->get_all_type();
				$data['suppliers'] = $this->Suppliers_model->get_all_suppliers();
				$data['locations'] = $this->Locations_model->get_all_locations();
				$this->load->view('user/add', $data);
			}
		} catch (Exception $ex) {
			throw new Exception('User Controller : Error in add function - ' . $ex);
		}
	}
	/*
		  * Editing a user
	*/
	public function edit($id) {
		try {
			$data['user'] = $this->User_model->get_user($id);
			$user_type = $this->input->post('user_type');
			if ($user_type == '2') {
				$company_id = $this->input->post('company_id');
			} else {
				$company_id = '';
			}
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['user']['id'])) {
				$params = array(
					'name' => $this->input->post('name'),
					'mobile_number' => $this->input->post('mobile_number'),
					'email' => $this->input->post('email'),
					'username' => $this->input->post('username'),
					//'password'=> base64_decode($this->input->post('password')),
					'user_type' => $this->input->post('user_type'),
					'location_id' => $this->input->post('location'),
					//'Status'=> $this->input->post('Status'),
					// 'mobile_login'=> $this->input->post('mobile_login'),
					'company_id' => $company_id,
					// 'created_at'=> $this->input->post('created_at'),
					'updated_at' => date('Y-m-d H:m:s'),
				);

				if (isset($_POST) && count($_POST) > 0) {

					$this->User_model->update_user($id, $params);
					$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
					redirect('user/index');
				} else {
					$data['_view'] = 'user/edit';
					$data['user_type'] = $this->User_model->get_all_type();
					$data['suppliers'] = $this->Suppliers_model->get_all_suppliers();
					$data['locations'] = $this->Locations_model->get_all_locations();
					$this->load->view('user/edit', $data);
				}
			} else {
				show_error('The user you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('User Controller : Error in edit function - ' . $ex);
		}
	}

	public function update_status() {
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		if ($status == 'Y') {
			$params = array('isActive' => 'N');
		} else {
			$params = array('isActive' => 'Y');
		}
		$this->User_model->update_user($id, $params);
	}
/*
 * Deleting user
 */
	function remove($id) {
		try {
			$user = $this->User_model->get_user($id);
			// check if the user exists before trying to delete it
			if (isset($user['id'])) {
				//$this->User_model->delete_user($id);
				$params = array('is_delete' => 'Y');
				$this->User_model->update_user($id, $params);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
				redirect('user/index');
			} else {
				show_error('The user you are trying to delete does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('User Controller : Error in remove function - ' . $ex);
		}
	}
	/*
		  * View more a user
	*/
	public function view_more($id) {
		try {
			$data['user'] = $this->User_model->get_user($id);
			if (isset($data['user']['id'])) {
				$data['_view'] = 'user/view_more';
				$this->load->view('layouts/main', $data);
			} else {
				show_error('The user you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('User Controller : Error in View more function - ' . $ex);
		}
	}
	/*
		* Listing of user
	*/
	public function search_by_clm() {
		$column_name = $this->input->post('column_name');
		$value_id = $this->input->post('value_id');
		$data['noof_page'] = 0;
		$params = array();
		$data['user'] = $this->User_model->get_all_user_by_cat($column_name, $value_id);
		$data['_view'] = 'user/index';
		$this->load->view('layouts/main', $data);
	}
	/*
		* get search values by column- user
	*/
	public function get_search_values_by_clm() {
		$clm_name = $this->input->post('clm_name');
		$value = $this->input->post('value');
		$id = $this->input->post('id');
		$params = array(
			$clm_name => $value,
		);
		$this->User_model->update_user($id, $params);
		$data['noof_page'] = 0;
		$data['user'] = $this->User_model->get_all_user();
		$this->load->view('user/index', $data);
	}
}
