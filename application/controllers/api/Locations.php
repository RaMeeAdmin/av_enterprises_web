<?php 
/*
    Generated by Manuigniter v2.0 
    www.manuigniter.com
*/
    use Restserver\Libraries\REST_Controller;
    defined('BASEPATH') OR exit('No direct script access allowed');
    require APPPATH . '/libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    class Locations extends REST_Controller{
     function __construct()
     {
       parent::__construct();
       $this->load->model('Locations_model');
     } 
 /*
* Listing of locations
 */
public function get_all_post()
{
  try{
    $data['locations'] = $this->Locations_model->get_all_locations();
    if($data['locations'] && $data['locations']!=null){
     $locations_ar = array();
     foreach($data['locations'] as $l)
     {
       $l_ar = array();
       $l_ar['id'] = $l['id'];
       $l_ar['name'] = $l['name'];
       $l_ar['address'] = $l['address'];
       $l_ar['contact_person_name'] = $l['contact_person_name'];
       $l_ar['contact_number'] = $l['contact_number'];
       $l_ar['isActive'] = $l['isActive'];
       $l_ar['created_at'] = $l['created_at'];
       $l_ar['updated_at'] = $l['updated_at'];
       $l_ar['company_id'] = $l['company_id'];
       $locations_ar[] = $l_ar;
     }
     $response = array(

       'success' => true,
       'message' => 'get all data Succesfully',
       'data' => $locations_ar,
     );
     $this->response($response, REST_Controller::HTTP_OK);
   }
   else{
     $response = array(
      'success' => false,
      'message' => 'Detail is not found'
    );
     $this->response($response, REST_Controller::HTTP_OK); 
   }
 } catch (Exception $ex) {
   throw new Exception('Locations controller_name : Error in get_all_post function - ' . $ex);
 }  
}

public function empList_post() {
  $postData = $this->input->post();
  $data = $this->Locations_model->getlocations($postData);
  echo json_encode($data);
}

function addnew_post()
{  
  try{
    $params = array(

     'name'=> $this->input->post('name'),
     'address'=> $this->input->post('address'),
     'contact_person_name'=> $this->input->post('contact_person_name'),
     'contact_number'=> $this->input->post('contact_number'),
     'isActive'=> $this->input->post('isActive'),
     'created_at'=> $this->input->post('created_at'),
     'updated_at'=> $this->input->post('updated_at'),
     'company_id'=> $this->input->post('company_id'),
     'name'=> $this->input->post('name'),
     'address'=> $this->input->post('address'),
     'contact_person_name'=> $this->input->post('contact_person_name'),
     'contact_number'=> $this->input->post('contact_number'),
     'isActive'=> 'Y',
     'company_id'=> '1',
     'created_at'=>  date('Y-m-d H:m:s'),

   );
    $this->load->library('upload');
    $this->load->library('form_validation');
    if(isset($_POST) && count($_POST) > 0)     
    {  
      $id= $this->Locations_model->add_locations($params);

      $data['locations'] = $this->Locations_model->get_locations($id);


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
     throw new Exception('Locations controller_name : Error in new locations function - ' . $ex);
   }  
 }  

 function edit_post($id)
 {   
  try{
   $data['locations'] = $this->Locations_model->get_locations($id);
   $this->load->library('upload');
   $this->load->library('form_validation');
   if(isset($data['locations']['id']))
   {
    $params = array(

     'name'=> $this->input->post('name'),
     'address'=> $this->input->post('address'),
     'contact_person_name'=> $this->input->post('contact_person_name'),
     'contact_number'=> $this->input->post('contact_number'),
     'isActive'=> $this->input->post('isActive'),
     'created_at'=> $this->input->post('created_at'),
     'updated_at'=> $this->input->post('updated_at'),
     'company_id'=> $this->input->post('company_id'),
     'name'=> $this->input->post('name'),
     'address'=> $this->input->post('address'),
     'contact_person_name'=> $this->input->post('contact_person_name'),
     'contact_number'=> $this->input->post('contact_number'),
     'isActive' => 'Y',
     'company_id' => '1', 
     'updated_at' => date('Y-m-d H:m:s'),


   );
    if(isset($_POST) && count($_POST) > 0)     
    {  
     $this->Locations_model->update_locations($id,$params);
     $response = array(

      'success' => true,
      'message' => 'Succesfully Updated',
      'data' => $id
    );
     $this->response($response, REST_Controller::HTTP_OK);
   }
   else
   {
     $response = array(
      'success' => false,
      'message' => 'Not Updated Try again',
      'data' => $id
    );
     $this->response($response, REST_Controller::HTTP_OK);
   }
 }
} catch (Exception $ex) {
 throw new Exception('Locations controller_name : Error in edit_post function - ' . $ex);
}  
} 

function remove_post($id)
{
  try{
    $locations = $this->Locations_model->get_locations($id);
  // check if the locations exists before trying to delete it
    if(isset($locations['id']))
    {
     $this->Locations_model->delete_locations($id);
     $response = array(
      'success' => true,
      'message' => 'Succesfully Removed',
      'data' => $id
    );
     $this->response($response, REST_Controller::HTTP_OK);
   }
   else
     $response = array(

      'success' => false,
      'message' => 'Not Updated Try again',
      'data' => $id
    );
   $this->response($response, REST_Controller::HTTP_OK);
 } catch (Exception $ex) {
   throw new Exception('Locations controller_name : Error in remove_post function - ' . $ex);
 }  
}
}
