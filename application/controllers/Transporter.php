<?php

class Transporter extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('Transporter_model');
		$user_data = $this->session->userdata();
		if ($user_data['username'] == '') {
			redirect('logout');
		}
	}

	public function index() {
		try {
			$data['noof_page'] = 0;
			$data['transporter'] = $this->Transporter_model->get_all_transporter();
			$data['_view'] = 'transporter/index';
			$this->load->view('transporter/index', $data);
		} catch (Exception $ex) {
			throw new Exception('Transporter Controller : Error in index function - ' . $ex);
		}
	}

	function add() {
		extract($_POST);
		try {
			$params = array(
				'owner_name' => $this->input->post('owner_name'),
				'address' => $this->input->post('address'),
				'contact_person_name' => $this->input->post('contact_person_name'),
				'contact_person_number' => $this->input->post('contact_person_number'),
				'pan_number' => $this->input->post('pan_number'),
				'gst_number' => $this->input->post('gst_number'),
				
			);	
			$this->load->library('upload');
			$this->load->library('form_validation');
			
			 $config = array(
            'upload_path'   => 'uploads/document/',
            'allowed_types' => 'jpg|gif|png',
            'overwrite'     => 1,                       
        );

        $this->load->library('upload', $config);       		
			
			if (isset($_POST) && count($_POST) > 0) {
			$data = [];
   
      $count = count($_FILES['rcbook']['name']);
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['rcbook']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['rcbook']['name'][$i];
          $_FILES['file']['type'] = $_FILES['rcbook']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['rcbook']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['rcbook']['error'][$i];
          $_FILES['file']['size'] = $_FILES['rcbook']['size'][$i];
  
          $config['upload_path'] = 'uploads/document'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['rcbook']['name'][$i];
   
          $this->load->library('upload',$config); 
    	$this->upload->initialize($config);
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename1 = $uploadData['file_name'];
            $data['totalFiles'][] = $filename1;
          }
        }
   
      }

      $data1 = [];
       $count = count($_FILES['insurance']['name']);
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['insurance']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['insurance']['name'][$i];
          $_FILES['file']['type'] = $_FILES['insurance']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['insurance']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['insurance']['error'][$i];
          $_FILES['file']['size'] = $_FILES['insurance']['size'][$i];
  
          $config['upload_path'] = 'uploads/document'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['insurance']['name'][$i];
   
          $this->load->library('upload',$config); 
    	  $this->upload->initialize($config);
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            $data1['totalFiles'][] = $filename;
          }
        }
   
      }



				$this->db->insert('vehicle_owner', $params);
				$id = $this->db->insert_id();

				for ($i = 0; $i < count($vehicle_no); $i++) {

					

					$vehicle = array(
						'vehicle_number' => $vehicle_no[$i],
						'rc_book' => $data1['totalFiles'][$i],
						'insurance_copy' => $data['totalFiles'][$i],
						'vehicle_owner_id' => $id,
					);
					$this->db->insert('vehicle', $vehicle);

				}
			for ($i = 0; $i < count($account_holder_name); $i++) {
					$bank_details = array(
						'account_holder_name' => $account_holder_name[$i],
						'account_number' => $account_number[$i],
						'ifsc' => $ifsc[$i],
						'vehicle_owner_id' => $id,
					);
					$this->db->insert('vehicle_owner_bank_details', $bank_details);

				}
				//$id = $this->Transporter_model->add_transporter($params);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully added.</div>');
				redirect('transporter/index');
			} else {
				$data['_view'] = 'transporter/add';
				$this->load->view('transporter/add', $data);
			}
	
		} catch (Exception $ex) {
			throw new Exception('Transporter Controller : Error in add function - ' . $ex);
		}
	}

	public function edit($id) {
		extract($_POST);
		try {
			$data['transporter'] = $this->Transporter_model->get_transporter($id);
			$this->load->library('upload');
			$this->load->library('form_validation');
			if (isset($data['transporter']['id'])) {

				$params = array(
				'owner_name' => $this->input->post('owner_name'),
				'address' => $this->input->post('address'),
				'contact_person_name' => $this->input->post('contact_person_name'),
				'contact_person_number' => $this->input->post('contact_person_number'),
				'pan_number' => $this->input->post('pan_number'),
				'gst_number' => $this->input->post('gst_number'),
				
			);
			if (isset($_POST) && count($_POST) > 0) {
			$data = [];
   
      $count = count($_FILES['rcbook']['name']);
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['rcbook']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['rcbook']['name'][$i];
          $_FILES['file']['type'] = $_FILES['rcbook']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['rcbook']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['rcbook']['error'][$i];
          $_FILES['file']['size'] = $_FILES['rcbook']['size'][$i];
  
          $config['upload_path'] = 'uploads/document'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['rcbook']['name'][$i];
   
          $this->load->library('upload',$config); 
    	$this->upload->initialize($config);
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename1 = $uploadData['file_name'];
            $data['totalFiles'][] = $filename1;
          }
        }
   
      }

      $data1 = [];
       $count = count($_FILES['insurance']['name']);
      for($i=0;$i<$count;$i++){
    
        if(!empty($_FILES['insurance']['name'][$i])){
    
          $_FILES['file']['name'] = $_FILES['insurance']['name'][$i];
          $_FILES['file']['type'] = $_FILES['insurance']['type'][$i];
          $_FILES['file']['tmp_name'] = $_FILES['insurance']['tmp_name'][$i];
          $_FILES['file']['error'] = $_FILES['insurance']['error'][$i];
          $_FILES['file']['size'] = $_FILES['insurance']['size'][$i];
  
          $config['upload_path'] = 'uploads/document'; 
          $config['allowed_types'] = 'jpg|jpeg|png|gif';
          $config['max_size'] = '5000';
          $config['file_name'] = $_FILES['insurance']['name'][$i];
   
          $this->load->library('upload',$config); 
    	  $this->upload->initialize($config);
          if($this->upload->do_upload('file')){
            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];
            $data1['totalFiles'][] = $filename;
          }
        }
   
      }



				//$this->db->insert('vehicle_owner', $params);
				$this->db->where('id',$id);
       			$this->db->update('vehicle_owner',$params);

       			$this->db->delete('vehicle',array('vehicle_owner_id'=>$id));
       			$this->db->delete('vehicle_owner_bank_details',array('vehicle_owner_id'=>$id));
				//$id = $this->db->insert_id();

				for ($i = 0; $i < count($vehicle_no); $i++) {
					//$data1['totalFiles'][$i]
					

					$vehicle = array(
						'vehicle_number' => $vehicle_no[$i],
						'rc_book' => $data1['totalFiles'][$i],
						'insurance_copy' => $data['totalFiles'][$i],
						'vehicle_owner_id' => $id,
					);
					$this->db->insert('vehicle', $vehicle);

				}
			for ($i = 0; $i < count($account_holder_name); $i++) {
					$bank_details = array(
						'account_holder_name' => $account_holder_name[$i],
						'account_number' => $account_number[$i],
						'ifsc' => $ifsc[$i],
						'vehicle_owner_id' => $id,
					);
					$this->db->insert('vehicle_owner_bank_details', $bank_details);

				}

					//$this->Transporter_model->update_transporter($id, $params);
					$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully updated.</div>');
					redirect('transporter/index');
				} else {

					$data['vehicle_owner'] = $this->db->query("select * from vehicle_owner where vehicle_owner.id='$id' ")->result_array();
					$data['vehicle'] = $this->db->query("select * from vehicle where vehicle_owner_id='$id' ")->result_array();
					$data['bank_details'] = $this->db->query("select * from vehicle_owner_bank_details where vehicle_owner_id ='$id' ")->result_array();
					$data['_view'] = 'transporter/edit';
					$this->load->view('transporter/edit', $data);
				}
			} else {
				show_error('The transporter you are trying to edit does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transporter Controller : Error in edit function - ' . $ex);
		}
	}

	function remove($id) {
		try {
			$transporter = $this->Transporter_model->get_transporter($id);
			// check if the transporter exists before trying to delete it
			if (isset($transporter['id'])) {
				$this->Transporter_model->delete_transporter($id);
				$this->session->set_flashdata('alert_msg', '<div class="alert alert-success text-center">Succesfully Removed.</div>');
				redirect('transporter/index');
			} else {
				show_error('The transporter you are trying to delete does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transporter Controller : Error in remove function - ' . $ex);
		}
	}

	public function view_more($id) {
		try {
			$data['transporter'] = $this->Transporter_model->get_transporter($id);
			if (isset($data['transporter']['id'])) {
				$data['_view'] = 'transporter/view_more';
				$this->load->view('layouts/main', $data);
			} else {
				show_error('The transporter you are trying to view more does not exist.');
			}

		} catch (Exception $ex) {
			throw new Exception('Transporter Controller : Error in View more function - ' . $ex);
		}
	}

	public function search_by_clm() {
		$column_name = $this->input->post('column_name');
		$value_id = $this->input->post('value_id');
		$data['noof_page'] = 0;
		$params = array();
		$data['transporter'] = $this->Transporter_model->get_all_transporter_by_cat($column_name, $value_id);
		$data['_view'] = 'transporter/index';
		$this->load->view('layouts/main', $data);
	}

	public function get_search_values_by_clm() {
		$clm_name = $this->input->post('clm_name');
		$value = $this->input->post('value');
		$id = $this->input->post('id');
		$params = array(
			$clm_name => $value,
		);
		$this->Transporter_model->update_transporter($id, $params);
		$data['noof_page'] = 0;
		$data['transporter'] = $this->Transporter_model->get_all_transporter();
		$this->load->view('transporter/index', $data);
	}
}
