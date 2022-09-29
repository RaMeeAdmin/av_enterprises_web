<?php 

class Bagasse_sale extends CI_Controller{
 function __construct()
 {
  
  parent::__construct();
  $this->load->model('Bagasse_sale_model');
  $this->load->model('Quick_sales_model');
  $this->load->model('Suppliers_model');
  $this->load->model('Gate_entry_pass_model');
  $this->load->model('Material_model');
  $this->load->model('Petrol_pumps_model');
  $user_data = $this->session->userdata();
  if($user_data['username'] == ''){
    redirect('logout');
  }
} 
 /*
* Listing of bagasse_sale
 */
public function index()
{
  try{
    $data['noof_page'] = 0;
    $data['bagasse_sale'] = $this->Quick_sales_model->get_all_quick_sale();
    $this->load->view('bagasse_sale/index',$data);
  } catch (Exception $ex) {
    throw new Exception('Bagasse_sale Controller : Error in index function - ' . $ex);
  }  
}
 /*
  * Adding a new bagasse_sale
  */
 function add()
 {  
  try{
    $company_id = $this->session->userdata('company_id');
    $params = array(
     'date'=> date("Y-m-d", strtotime($this->input->post('date'))),
     'supplier_id'=> $this->input->post('supplier_id'),
     'sale_to'=> $this->input->post('sale_to'),
     'vehicle_id'=> $this->input->post('vehicle_id'),
     'loading'=> $this->input->post('loadin'),
     'user'=> $this->input->post('user'),
     'material_id'=> $this->input->post('material_id'),
     'qty'=> $this->input->post('qty'),
     'rate'=> $this->input->post('rate'),
     'amount'=> $this->input->post('amount'),
     'company_id'=> $company_id,
     'created_by'=> $this->input->post('created_on'),
      // 'updated_on'=> $this->input->post('updated_on'),
   );
     //print_r($params);exit();
    $this->load->library('upload');
    $this->load->library('form_validation');
    if(isset($_POST) && count($_POST) > 0)     
    {  
      $id= $this->Quick_sales_model->add_quick_sale($params);
      $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
      redirect('bagasse_sale/index');
    }
    else
    { 
      $data['suppliers'] = $this->Suppliers_model->get_all_suppliers();
      $data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
      $data['material'] = $this->Material_model->get_all_material();
      $data['labour'] = $this->Petrol_pumps_model->get_all_labour();
      $this->load->view('bagasse_sale/add',$data);
    }
  } catch (Exception $ex) {
    throw new Exception('Bagasse_sale Controller : Error in add function - ' . $ex);
  }  
}  
  /*
  * Editing a bagasse_sale
 */
  public function edit($id)
  {   
    try{
     $data['bagasse_sale'] = $this->Quick_sales_model->get_quick_sale($id);
     $this->load->library('upload');
     $this->load->library('form_validation');
     if(isset($data['bagasse_sale']['id']))
     {
       $company_id = $this->session->userdata('company_id');
       $params = array(
         'date'=> date("Y-m-d", strtotime($this->input->post('date'))),
         'supplier_id'=> $this->input->post('supplier_id'),
         'sale_to'=> $this->input->post('sale_to'),
         'vehicle_id'=> $this->input->post('vehicle_id'),
         'loading'=> $this->input->post('loadin'),
         'user'=> $this->input->post('user'),
         'material_id'=> $this->input->post('material_id'),
         'qty'=> $this->input->post('qty'),
         'rate'=> $this->input->post('rate'),
         'amount'=> $this->input->post('amount'),
         'company_id'=> $company_id,
         'updated_by'=> date('Y-m-d H:m:s'),
       );
        //print_r($id);exit();
       if(isset($_POST) && count($_POST) > 0)     
       {  
         $this->Quick_sales_model->update_quick_sale($id,$params);
         $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
         redirect('bagasse_sale/index');
       }
       else
       {
         $data['suppliers'] = $this->Suppliers_model->get_all_suppliers();
         $data['truck_number'] = $this->Gate_entry_pass_model->get_truck_number();
         $data['material'] = $this->Material_model->get_all_material();
         $data['labour'] = $this->Petrol_pumps_model->get_all_labour();
         $this->load->view('bagasse_sale/edit',$data);
       }
     }
     else
      show_error('The bagasse_sale you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Bagasse_sale Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting bagasse_sale
  */
function remove($id)
{
  try{
    $bagasse_sale = $this->Quick_sales_model->get_bagasse_sale($id);
  // check if the bagasse_sale exists before trying to delete it
    if(isset($bagasse_sale['id']))
    {
     $this->Quick_sale_model->delete_quick_sale($id);
     $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
     redirect('bagasse_sale/index');
   }
   else
     show_error('The bagasse_sale you are trying to delete does not exist.');
 } catch (Exception $ex) {
  throw new Exception('Bagasse_sale Controller : Error in remove function - ' . $ex);
}  
}
  /*
  * View more a bagasse_sale
 */
  public function view_more($id)
  {   
    try{
     $data['bagasse_sale'] = $this->Bagasse_sale_model->get_bagasse_sale($id);
     if(isset($data['bagasse_sale']['id']))
     {
      $data['_view'] = 'bagasse_sale/view_more';
      $this->load->view('layouts/main',$data);
    }
    else
      show_error('The bagasse_sale you are trying to view more does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Bagasse_sale Controller : Error in View more function - ' . $ex);
  }  
} 
 /*
* Listing of bagasse_sale
 */
public function search_by_clm()
{
  $column_name= $this->input->post('column_name');
  $value_id= $this->input->post('value_id');
  $data['noof_page'] = 0;
  $params = array();
  $data['bagasse_sale'] = $this->Bagasse_sale_model->get_all_bagasse_sale_by_cat($column_name,$value_id);
  $data['_view'] = 'bagasse_sale/index';
  $this->load->view('layouts/main',$data);
}
 /*
* get search values by column- bagasse_sale
 */
public function get_search_values_by_clm()
{
  $clm_name= $this->input->post('clm_name');
  $value= $this->input->post('value');
  $id= $this->input->post('id');
  $params = array(
    $clm_name=>$value,
  );
  $this->Bagasse_sale_model->update_bagasse_sale($id,$params);
  $data['noof_page'] = 0;
  $data['bagasse_sale'] = $this->Bagasse_sale_model->get_all_bagasse_sale();
  $this->load->view('bagasse_sale/index',$data);
}
}
