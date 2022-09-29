<?php 

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('User_model');
      $this->load->model('Locations_model');
      $this->load->model('Suppliers_model');
 } 
 
public function get_all_post()
{
  try{
  $data['user'] = $this->User_model->get_all_user();
     if($data['user'] && $data['user']!=null){
       $user_ar = array();
       foreach($data['user'] as $u)
       {
       $u_ar = array();
       $u_ar['id'] = $u['id'];
       $u_ar['name'] = $u['name'];
       $u_ar['mobile_number'] = $u['mobile_number'];
       $u_ar['email'] = $u['email'];
       $u_ar['username'] = $u['username'];
       $u_ar['password'] = $u['password'];
       $u_ar['user_type'] = $u['user_type'];
       $u_ar['location_id'] = $u['location_id'];
       $u_ar['isActive'] = $u['isActive'];
       $u_ar['is_mobile_login'] = $u['is_mobile_login'];
       $u_ar['company_id'] = $u['company_id'];
       $u_ar['created_at'] = $u['created_at'];
       $u_ar['updated_at'] = $u['updated_at'];
       $u_ar['is_delete'] = $u['is_delete'];
       $user_ar[] = $u_ar;
       }
       $response = array(
       'status' => 200,
       'message' => 'get all data Succesfully',
       'data' => $user_ar,
       );
       $this->response($response, REST_Controller::HTTP_OK);
     }
     else{
       $response = array(
      'status' => 400,
      'message' => 'Detail is not found'
        );
       $this->response($response, REST_Controller::HTTP_OK); 
        }
       } catch (Exception $ex) {
             throw new Exception('User controller_name : Error in get_all_post function - ' . $ex);
        }  
}
 
 function addnew_post()
 {  
  try{
      $l = $this->input->post('location');
  $user_type=$this->input->post('user_type');
  if ($user_type=='2') {
   $company_id=$this->input->post('company_id');
  }else{
    $company_id='';
  }
  $location = implode(',', (array) $l);
      $params = array(
       'name'=> $this->input->post('name'),
       'mobile_number'=> $this->input->post('mobile_number'),
       'email'=> $this->input->post('email'),
       'username'=> $this->input->post('username'),
       'password'=> base64_encode($this->input->post('password')),
       'user_type'=> $this->input->post('user_type'),
       'location_id'=> $location,
       'isActive'=> 'Y',
       'is_mobile_login'=> 'N',
       'company_id'=> $company_id,
       'is_delete'=>'N',
       'created_at'=> date('Y-m-d H:m:s'),
       // 'updated_at'=> $this->input->post('updated_at'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $id= $this->User_model->add_user($params);
   $data['user'] = $this->User_model->get_user($id);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Added',
            'data' => $data
             );
           $this->response($response, REST_Controller::HTTP_OK);
        }
        else
        { 
           $response = array(
            'status' => 400,
            'message' => 'Not Added try again',
            'data' => ''
             );
           $this->response($response, REST_Controller::HTTP_OK);
        }
       } catch (Exception $ex) {
             throw new Exception('User controller_name : Error in new user function - ' . $ex);
       }  
 }  


 function userList_post(){
   $postData = $this->input->post();
    $data = $this->User_model->userList($postData);
    echo json_encode($data);
 }


 function get_user_role_post(){
  $data = $this->User_model->get_all_type();
   if($data!=''){
    $response = array(
        'success' => true,
        'message' => 'Record found',
        'data' => $data
      );
      $this->response($response, REST_Controller::HTTP_OK);
    }else{
     $response = array(
      'success' => false,
      'message' => 'Not Record found',
      'data' => ''
      );
      $this->response($response, REST_Controller::HTTP_OK);
    }
 }

 function get_locations_post(){
  $data = $this->Locations_model->get_all_locations();
   if($data!=''){
    $response = array(
        'success' => true,
        'message' => 'Record found',
        'data' => $data
      );
      $this->response($response, REST_Controller::HTTP_OK);
    }else{
     $response = array(
      'success' => false,
      'message' => 'Not Record found',
      'data' => ''
      );
      $this->response($response, REST_Controller::HTTP_OK);
    }
 }
 
  function get_suppliers_post(){

 $data =  $this->Suppliers_model->get_all_suppliers();
 if($data!=''){
    $response = array(
        'success' => true,
        'message' => 'Record found',
        'data' => $data
      );
      $this->response($response, REST_Controller::HTTP_OK);
    }else{
     $response = array(
      'success' => false,
      'message' => 'Not Record found',
      'data' => ''
      );
      $this->response($response, REST_Controller::HTTP_OK);
    }
  }
  /*
  * Editing a user
 */
  function edit_post($id)
 {   
  try{
   $data['user'] = $this->User_model->get_user($id);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['user']['id']))
      {
        $params = array(
           'name'=> $this->input->post('name'),
           'mobile_number'=> $this->input->post('mobile_number'),
           'email'=> $this->input->post('email'),
           'username'=> $this->input->post('username'),
           'password'=> $this->input->post('password'),
           'user_type'=> $this->input->post('user_type'),
           'location_id'=> $this->input->post('location_id'),
           'isActive'=> $this->input->post('isActive'),
           'is_mobile_login'=> $this->input->post('is_mobile_login'),
           'company_id'=> $this->input->post('company_id'),
           'created_at'=> $this->input->post('created_at'),
           'updated_at'=> $this->input->post('updated_at'),
           'is_delete'=> $this->input->post('is_delete'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->User_model->update_user($id,$params);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Updated',
            'data' => $id
             );
           $this->response($response, REST_Controller::HTTP_OK);
           }
           else
          {
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $id
             );
           $this->response($response, REST_Controller::HTTP_OK);
          }
  }
       } catch (Exception $ex) {
             throw new Exception('User controller_name : Error in edit_post function - ' . $ex);
        }  
} 
/*
  * Deleting user
  */
  function remove_post($id)
   {
  try{
      $user = $this->User_model->get_user($id);
  // check if the user exists before trying to delete it
       if(isset($user['id']))
       {
         $this->User_model->delete_user($id);
           $response = array(
            'status' => 200,
            'message' => 'Succesfully Removed',
            'data' => $id
             );
           $this->response($response, REST_Controller::HTTP_OK);
       }
       else
           $response = array(
            'status' => 400,
            'message' => 'Not Updated Try again',
            'data' => $id
             );
           $this->response($response, REST_Controller::HTTP_OK);
       } catch (Exception $ex) {
             throw new Exception('User controller_name : Error in remove_post function - ' . $ex);
        }  
  }
 }

