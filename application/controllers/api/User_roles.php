<?php 
/*
    Generated by Manuigniter v2.0 
    www.manuigniter.com
*/
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class User_roles extends REST_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('User_roles_model');
 } 
 /*
* Listing of user_roles
 */
public function get_all_post()
{
  try{
  $data['user_roles'] = $this->User_roles_model->get_all_user_roles();
     if($data['user_roles'] && $data['user_roles']!=null){
       $user_roles_ar = array();
       foreach($data['user_roles'] as $u)
       {
       $u_ar = array();
       $u_ar['id'] = $u['id'];
       $u_ar['name'] = $u['name'];
       $u_ar['created_at'] = $u['created_at'];
       $u_ar['updated_at'] = $u['updated_at'];
       $user_roles_ar[] = $u_ar;
       }
       $response = array(
       'status' => 200,
       'message' => 'get all data Succesfully',
       'data' => $user_roles_ar,
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
             throw new Exception('User_roles controller_name : Error in get_all_post function - ' . $ex);
        }  
}
 /*
  * Adding a new user_roles
  */
 function addnew_post()
 {  
  try{
      $params = array(
       'name'=> $this->input->post('name'),
       'created_at'=> $this->input->post('created_at'),
       'updated_at'=> $this->input->post('updated_at'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $id= $this->User_roles_model->add_user_roles($params);
   $data['user_roles'] = $this->User_roles_model->get_user_roles($id);
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
             throw new Exception('User_roles controller_name : Error in new user_roles function - ' . $ex);
       }  
 }  
  /*
  * Editing a user_roles
 */
  function edit_post($id)
 {   
  try{
   $data['user_roles'] = $this->User_roles_model->get_user_roles($id);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['user_roles']['id']))
      {
        $params = array(
           'name'=> $this->input->post('name'),
           'created_at'=> $this->input->post('created_at'),
           'updated_at'=> $this->input->post('updated_at'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->User_roles_model->update_user_roles($id,$params);
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
             throw new Exception('User_roles controller_name : Error in edit_post function - ' . $ex);
        }  
} 
/*
  * Deleting user_roles
  */
  function remove_post($id)
   {
  try{
      $user_roles = $this->User_roles_model->get_user_roles($id);
  // check if the user_roles exists before trying to delete it
       if(isset($user_roles['id']))
       {
         $this->User_roles_model->delete_user_roles($id);
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
             throw new Exception('User_roles controller_name : Error in remove_post function - ' . $ex);
        }  
  }
 }
