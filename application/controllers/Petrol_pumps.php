<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class Petrol_pumps extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Petrol_pumps_model');
       $user_data = $this->session->userdata();
         if($user_data['username'] == ''){
          redirect('logout');
        }
 } 
 /*
* Listing of petrol_pumps
 */
public function index()
{
  try{
      $data['noof_page'] = 0;
     $data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
      $data['_view'] = 'petrol_pumps/index';
      $this->load->view('petrol_pumps/index',$data);
    } catch (Exception $ex) {
      throw new Exception('Petrol_pumps Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new petrol_pumps
  */
 function add()
 {  
try{
      $params = array(
       'petrol_pumps_name'=> $this->input->post('petrol_pumps_name'),
       'address'=> $this->input->post('address'),
       'contact_person_name'=> $this->input->post('contact_person_name'),
       'contact_person_number'=> $this->input->post('contact_person_number'),
       'isActive'=> 'Y',
       'company_id'=> '1',
       'created_at'=>  date('Y-m-d H:m:s'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $id= $this->Petrol_pumps_model->add_petrol_pumps($params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
              redirect('petrol_pumps/index');
        }
        else
        { 
           $data['_view'] = 'petrol_pumps/add';
            $this->load->view('petrol_pumps/add',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Petrol_pumps Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a petrol_pumps
 */
 public function edit($id)
 {   
  try{
   $data['petrol_pumps'] = $this->Petrol_pumps_model->get_petrol_pumps($id);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['petrol_pumps']['id']))
      {
        $params = array(
           'petrol_pumps_name'=> $this->input->post('petrol_pumps_name'),
           'address'=> $this->input->post('address'),
           'contact_person_name'=> $this->input->post('contact_person_name'),
           'contact_person_number'=> $this->input->post('contact_person_number'),
           'isActive'=> 'Y',
           'company_id'=> '1',
           'updated_at'=>  date('Y-m-d H:m:s'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Petrol_pumps_model->update_petrol_pumps($id,$params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('petrol_pumps/index');
           }
           else
          {
              $data['_view'] = 'petrol_pumps/edit';
              $this->load->view('petrol_pumps/edit',$data);
          }
  }
  else
  show_error('The petrol_pumps you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Petrol_pumps Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting petrol_pumps
  */
  function remove($id)
   {
    try{
      $petrol_pumps = $this->Petrol_pumps_model->get_petrol_pumps($id);
  // check if the petrol_pumps exists before trying to delete it
       if(isset($petrol_pumps['id']))
       {
         $this->Petrol_pumps_model->delete_petrol_pumps($id);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('petrol_pumps/index');
       }
       else
       show_error('The petrol_pumps you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Petrol_pumps Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a petrol_pumps
 */
 public function view_more($id)
 {   
try{
   $data['petrol_pumps'] = $this->Petrol_pumps_model->get_petrol_pumps($id);
     if(isset($data['petrol_pumps']['id']))
      {
              $data['_view'] = 'petrol_pumps/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The petrol_pumps you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Petrol_pumps Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of petrol_pumps
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps_by_cat($column_name,$value_id);
      $data['_view'] = 'petrol_pumps/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- petrol_pumps
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->Petrol_pumps_model->update_petrol_pumps($id,$params);
   $data['noof_page'] = 0;
  $data['petrol_pumps'] = $this->Petrol_pumps_model->get_all_petrol_pumps();
  $this->load->view('petrol_pumps/index',$data);
}
 }