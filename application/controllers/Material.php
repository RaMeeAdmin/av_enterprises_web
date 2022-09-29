<?php 

class Material extends CI_Controller{
 function __construct()
 {
       parent::__construct();
      $this->load->model('Material_model');
       $user_data = $this->session->userdata();
         if($user_data['username'] == ''){
          redirect('logout');
        }
 } 
 
public function index()
{
  try{
      $data['noof_page'] = 0;
     $data['material'] = $this->Material_model->get_all_material();
      $data['_view'] = 'material/index';
      $this->load->view('material/index',$data);
    } catch (Exception $ex) {
      throw new Exception('Material Controller : Error in index function - ' . $ex);
  }  
}
 
 function add()
 {  
try{
      $params = array(
       //'date'=> $this->input->post('date'),
       'name'=> $this->input->post('name'),
       //'quantity'=> $this->input->post('quantity'),
       'isActive'=> 'Y',
       'company_id'=> '1',
       'created_at'=>  date('Y-m-d H:m:s'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $id= $this->Material_model->add_material($params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
              redirect('material/index');
        }
        else
        { 
           $data['_view'] = 'material/add';
            $this->load->view('material/add',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Material Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a material
 */
 public function edit($id)
 {   
  try{
   $data['material'] = $this->Material_model->get_material($id);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['material']['id']))
      {
        $params = array(
           'date'=> $this->input->post('date'),
           'name'=> $this->input->post('name'),
           'quantity'=> $this->input->post('quantity'),
           'isActive'=> 'Y',
           'company_id'=> '1',
           'updated_at'=>  date('Y-m-d H:m:s'),
          
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Material_model->update_material($id,$params);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('material/index');
           }
           else
          {
              $data['_view'] = 'material/edit';
              $this->load->view('material/edit',$data);
          }
  }
  else
  show_error('The material you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Material Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting material
  */
  function remove($id)
   {
    try{
      $material = $this->Material_model->get_material($id);
  // check if the material exists before trying to delete it
       if(isset($material['id']))
       {
         $this->Material_model->delete_material($id);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('material/index');
       }
       else
       show_error('The material you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Material Controller : Error in remove function - ' . $ex);
  }  
  }
  /*
  * View more a material
 */
 public function view_more($id)
 {   
try{
   $data['material'] = $this->Material_model->get_material($id);
     if(isset($data['material']['id']))
      {
              $data['_view'] = 'material/view_more';
              $this->load->view('layouts/main',$data);
      }
      else
        show_error('The material you are trying to view more does not exist.');
    } catch (Exception $ex) {
    throw new Exception('Material Controller : Error in View more function - ' . $ex);
  }  
} 
 
public function search_by_clm()
{
    $column_name= $this->input->post('column_name');
    $value_id= $this->input->post('value_id');
     $data['noof_page'] = 0;
     $params = array();
    $data['material'] = $this->Material_model->get_all_material_by_cat($column_name,$value_id);
      $data['_view'] = 'material/index';
      $this->load->view('layouts/main',$data);
}

public function get_search_values_by_clm()
{
    $clm_name= $this->input->post('clm_name');
    $value= $this->input->post('value');
    $id= $this->input->post('id');
        $params = array(
        $clm_name=>$value,
        );
        $this->Material_model->update_material($id,$params);
   $data['noof_page'] = 0;
  $data['material'] = $this->Material_model->get_all_material();
  $this->load->view('material/index',$data);
}
 }
