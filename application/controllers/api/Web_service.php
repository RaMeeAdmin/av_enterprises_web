<?php
use \Firebase\JWT\JWT;

require 'vendor/autoload.php';
class Web_service extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function login() {

		$username = $this->input->post('username');
		$password = base64_encode($this->input->post('password'));

		if ($username != '' && $password != '') {

			$arr = $this->db->query("select * from user where username='$username' and password='$password'")->row_array();

			$kunci = $this->config->item('thekey');
			$token['id'] = $arr['id']; //From here
			$token['username'] = $arr['username'];
			$date = new DateTime();
			$token['iat'] = $date->getTimestamp();
			$token['exp'] = $date->getTimestamp() + 60 * 60 * 5; //To here is to generate token
			$get_token = JWT::encode($token, $kunci, 'HS256'); //This is the output token

			if (!empty($arr)) {

				$response_arr = array(
					'success' => true,
					'message' => 'Login Successful',
					'token' => $get_token,
					'data' => $arr,

				);
				echo json_encode($response_arr);
			} else {

				$response_arr = array(
					'success' => false,
					'message' => 'Username and password is incorrect',
				);
				echo json_encode($response_arr);
			}

		} else {
			$response_arr = array(
				'success' => false,
				'message' => 'Parameters Missing',
			);
			echo json_encode($response_arr);
		}
	}
}