<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('session');
	}
	public function index() {
		$this->load->view('welcome_message');
	}

	public function login() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('username', 'username', 'required');
		if ($this->form_validation->run()) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$get_login = $this->user_model->get_login($username, $password);

			if ($get_login == '') {
				$this->session->set_flashdata('alertDmessage', 'Invalid Username or password');
				$this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
				redirect('admin');
			} else {
				$newdata = array(
					'id' => $get_login['id'],
					'username' => $get_login['username'],
					'email' => $get_login['email'],
					'role' => $get_login['role'],
					'company_id' => $get_login['company_id'],
					'user_type' => $get_login['user_type'],
					'logged_in' => TRUE,
				);
				//print_r($newdata);exit();
				$this->session->set_userdata($newdata);
				redirect('Dashboard/index');
			}
		} else {
			$data['logintype'] = 'admin';
			$this->load->view('login', $data);
		}

	}
	public function logout() {
		$user_data = $this->session->userdata();
		$date = date('Y-m-d');
		$time = date('H:i:s');
		$newdata = array(
			'id' => @$user_data['id'],
			'username' => @$user_data['username'],
			'email' => @$user_data['email'],
			'user_type' => $user_data['user_type'],
			'role' => @$user_data['role'],
			'logged_in' => FALSE,

		);

		$this->session->unset_userdata($newdata);
		$this->session->sess_destroy();
		redirect(base_url() . "admin/", 'refresh');
	}

}
