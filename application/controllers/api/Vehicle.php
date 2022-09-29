<?php 
/*
    Generated by Manuigniter v2.0 
    www.manuigniter.com
*/
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Vehicle extends REST_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Vehicle_model');
 } 
 /*
* Listing of vehicle
 */
public function get_all_post()
{
  try{
  $data['vehicle'] = $this->Vehicle_model->get_all_vehicle();
     if($data['vehicle'] && $data['vehicle']!=null){
       $vehicle_ar = array();
       foreach($data['vehicle'] as $v)
       {
       $v_ar = array();
       $v_ar['id'] = $v['id'];
       $v_ar['vehicle_number'] = $v['vehicle_number'];
       $v_ar['added_by'] = $v['added_by'];
       $v_ar['created_on'] = $v['created_on'];
       $v_ar['updated_on'] = $v['updated_on'];
       $vehicle_ar[] = $v_ar;
       }
       $response = array(
       'status' => 200,
       'message' => 'get all data Succesfully',
       'data' => $vehicle_ar,
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
             throw new Exception('Vehicle controller_name : Error in get_all_post function - ' . $ex);
        }  
}
 /*
  * Adding a new vehicle
  */
 function addnew_post()
 {  
  try{
      $params = array(
       'vehicle_number'=> $this->input->post('vehicle_number'),
       'added_by'=> $this->input->post('added_by'),
       'created_on'=> $this->input->post('created_on'),
       'updated_on'=> $this->input->post('updated_on'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $id= $this->Vehicle_model->add_vehicle($params);
   $data['vehicle'] = $this->Vehicle_model->get_vehicle($id);
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
             throw new Exception('Vehicle controller_name : Error in new vehicle function - ' . $ex);
       }  
 }  
  /*
  * Editing a vehicle
 */
  function edit_post($id)
 {   
  try{
   $data['vehicle'] = $this->Vehicle_model->get_vehicle($id);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['vehicle']['id']))
      {
        $params = array(
           'vehicle_number'=> $this->input->post('vehicle_number'),
           'added_by'=> $this->input->post('added_by'),
           'created_on'=> $this->input->post('created_on'),
           'updated_on'=> $this->input->post('updated_on'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Vehicle_model->update_vehicle($id,$params);
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
             throw new Exception('Vehicle controller_name : Error in edit_post function - ' . $ex);
        }  
} 
/*
  * Deleting vehicle
  */
  function remove_post($id)
   {
  try{
      $vehicle = $this->Vehicle_model->get_vehicle($id);
  // check if the vehicle exists before trying to delete it
       if(isset($vehicle['id']))
       {
         $this->Vehicle_model->delete_vehicle($id);
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
             throw new Exception('Vehicle controller_name : Error in remove_post function - ' . $ex);
        }  
  }
 }
