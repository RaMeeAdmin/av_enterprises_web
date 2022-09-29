<?php 

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Material extends REST_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Material_model');
	} 

    public function get_all_post()
    {

       try{
          $data['material'] = $this->Material_model->get_all_material();
          if($data['material'] && $data['material']!=null){
             $material_ar = array();
             foreach($data['material'] as $m)
             {
                $m_ar = array();
                $m_ar['id'] = $m['id'];
                $m_ar['name'] = $m['name'];
                $m_ar['code'] = $m['code'];
                $m_ar['isActive'] = $m['isActive'];
                $m_ar['company_id'] = $m['company_id'];
                $m_ar['created_at'] = $m['created_at'];
                $m_ar['updated_at'] = $m['updated_at'];
                $material_ar[] = $m_ar;
            }
            $response = array(
                'success' => true,
                'message' => 'get all data Succesfully',
                'data' => $material_ar,
            );
            $this->response($response, REST_Controller::HTTP_OK);
        }
        else{
         $response = array(
            'success' => flase,
            'message' => 'Detail is not found'
        );
         $this->response($response, REST_Controller::HTTP_OK); 
     }
 } catch (Exception $ex) {
  throw new Exception('Material controller_name : Error in get_all_post function - ' . $ex);
}  

}
function getmaterial_post(){
  extract($_POST);
 // echo $id;
  $data = $this->Material_model->get_material($id);
  //print_r($data);exit();
  if($data!=''){
$response = array(
                'success' => true,
                'message' => 'get all data Succesfully',
                'data' => $data,
            );
            $this->response($response, REST_Controller::HTTP_OK);
        }
        else{
         $response = array(
            'success' => flase,
            'message' => 'Detail is not found'
        );
       }
}

 function addnew_post()
 {  

 	try{
 		$params = array(
 			'name'=> $this->input->post('name'),
 			'code'=> $this->input->post('code'),
       'gst'=> $this->input->post('gst'),
 			'isActive'=> $this->input->post('isActive'),
 			'company_id'=> $this->input->post('company_id'),
 			'created_at'=>date('Y-m-d H:m:s'),
 			//'updated_at'=> $this->input->post('updated_at'),
 		);
 		$this->load->library('upload');
 		$this->load->library('form_validation');
 		if(isset($_POST) && count($_POST) > 0)     
 		{  
 			$id= $this->Material_model->add_material($params);
 			$data['material'] = $this->Material_model->get_material($id);
 			$response = array(
              'success' => true,
              'message' => 'Succesfully Added',
              'data' => $data
          );
 			$this->response($response, REST_Controller::HTTP_OK);
 		}
 		else
 		{ 
 			$response = array(
              'success' => false,
              'message' => 'Not Added try again',
              'data' => ''
          );
 			$this->response($response, REST_Controller::HTTP_OK);
 		}
 	} catch (Exception $ex) {
 		throw new Exception('Material controller_name : Error in new material function - ' . $ex);
 	}  

 }  
function edit_post(){
  extract($_POST);
    try{
    $params = array(
      'name'=> $this->input->post('name'),
      'code'=> $this->input->post('code'),
       'gst'=> $this->input->post('gst'),
      'isActive'=> $this->input->post('isActive'),
      'company_id'=> $this->input->post('company_id'),
      'created_at'=>date('Y-m-d H:m:s'),
      //'updated_at'=> $this->input->post('updated_at'),
    );
    $this->load->library('upload');
    $this->load->library('form_validation');
    if(isset($_POST) && count($_POST) > 0)     
    {  
      $id= $this->Material_model->update_material($id,$params);
      //$data['material'] = $this->Material_model->get_material($id);
      $response = array(
              'success' => true,
              'message' => 'Succesfully Added',
              'data' => $id
          );
      $this->response($response, REST_Controller::HTTP_OK);
    }
    else
    { 
      $response = array(
              'success' => false,
              'message' => 'Not Added try again',
              'data' => ''
          );
      $this->response($response, REST_Controller::HTTP_OK);
    }
  } catch (Exception $ex) {
    throw new Exception('Material controller_name : Error in new material function - ' . $ex);
  }  

}


	public function empList_post() {
		$postData = $this->input->post();
		$data = $this->Material_model->getmaterial($postData);
		echo json_encode($data);
	}
}
