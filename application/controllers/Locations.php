<?php 

class Locations extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Locations_model');
       $user_data = $this->session->userdata();
         if($user_data['username'] == ''){
          redirect('logout');
        }
 } 
 
public function index()
{
  try{
      $data['noof_page'] = 0;
     $data['locations'] = $this->Locations_model->get_all_locations();
      $data['_view'] = 'locations/index';
      $this->load->view('locations/index',$data);
    } catch (Exception $ex) {
      throw new Exception('Locations Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new locations
  */
 function add()
 {  
try{
      $params = array(
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
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
              redirect('locations/index');
        }
        else
        { 
           $data['_view'] = 'locations/add';
            $this->load->view('locations/add',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Locations Controller : Error in add function - ' . $ex);
  }  
 }  
  
 public function edit($id)
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
           'isActive'=> 'Y',
           'company_id'=> '1',
           'updated_at'=>  date('Y-m-d H:m:s'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Locations_model->update_locations($id,$params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('locations/index');
           }
           else
          {
              $data['_view'] = 'locations/edit';
              $this->load->view('locations/edit',$data);
          }
  }
  else
  show_error('The locations you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Locations Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting locations
  */
  function remove($id)
   {
    try{
      $locations = $this->Locations_model->get_locations($id);
  // check if the locations exists before trying to delete it
       if(isset($locations['id']))
       {
         $this->Locations_model->delete_locations($id);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('locations/index');
       }
       else
       show_error('The locations you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Locations Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a locations
 */
 public function view_more($id)
 {   
try{
   $data['locations'] = $this->Locations_model->get_locations($id);
     if(isset($data['locations']['id']))
      {
              $data['_view'] = 'locations/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The locations you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Locations Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of locations
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['locations'] = $this->Locations_model->get_all_locations_by_cat($column_name,$value_id);
      $data['_view'] = 'locations/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- locations
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Locations_model->update_locations($id,$params);
   $data['noof_page'] = 0;
  $data['locations'] = $this->Locations_model->get_all_locations();
  $this->load->view('locations/index',$data);
}
 }
