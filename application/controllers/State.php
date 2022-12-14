<?php 
/*
 Generated by Manuigniter v2.0 
 www.manuigniter.com
*/
class State extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('State_model');
 } 
 /*
* Listing of state
 */
public function index()
{
  try{
      $data['noof_page'] = 0;
     $data['state'] = $this->State_model->get_all_state();
      $data['_view'] = 'state/index';
      $this->load->view('layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('State Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new state
  */
 function add()
 {  
try{
      $params = array(
       'name'=> $this->input->post('name'),
       'country_id'=> $this->input->post('country_id'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $state_id= $this->State_model->add_state($params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
              redirect('state/index');
        }
        else
        { 
           $data['_view'] = 'state/add';
            $this->load->view('layouts/main',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('State Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a state
 */
 public function edit($state_id)
 {   
  try{
   $data['state'] = $this->State_model->get_state($state_id);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['state']['state_id']))
      {
        $params = array(
           'name'=> $this->input->post('name'),
           'country_id'=> $this->input->post('country_id'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->State_model->update_state($state_id,$params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('state/index');
           }
           else
          {
              $data['_view'] = 'state/edit';
              $this->load->view('layouts/main',$data);
          }
  }
  else
  show_error('The state you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('State Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting state
  */
  function remove($state_id)
   {
    try{
      $state = $this->State_model->get_state($state_id);
  // check if the state exists before trying to delete it
       if(isset($state['state_id']))
       {
         $this->State_model->delete_state($state_id);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('state/index');
       }
       else
       show_error('The state you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('State Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a state
 */
 public function view_more($state_id)
 {   
try{
   $data['state'] = $this->State_model->get_state($state_id);
     if(isset($data['state']['state_id']))
      {
              $data['_view'] = 'state/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The state you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('State Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of state
 */
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['state'] = $this->State_model->get_all_state_by_cat($column_name,$value_id);
      $data['_view'] = 'state/index';
      $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- state
 */
public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
           $this->State_model->update_state($id,$params);
   $data['noof_page'] = 0;
  $data['state'] = $this->State_model->get_all_state();
  $this->load->view('state/index',$data);
}
 }
