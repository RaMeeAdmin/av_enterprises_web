<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Suppliers_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get suppliers by id 
      */ 
      function get_suppliers($id)
      {
        try{
         
           return $this->db->get_where('suppliers',array('id'=>$id))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model Model : Error in get_suppliers function - ' . $ex);
           }  
      }
      /*
        * Get suppliers by  column name
      */ 
      function get_suppliersbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('suppliers',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model Madel : Error in get_suppliersbyclm_name function - ' . $ex);
           }  
      }
     /*
        * Get All suppliers count 
      */ 
     function getsupplierList($postData = null){
      $response = array();

    ## Read value
    $draw = $postData['draw'];
    $start = $postData['start'];
    $rowperpage = $postData['length']; // Rows display per page
    $columnIndex = $postData['order'][0]['column']; // Column index
    $columnName = $postData['columns'][$columnIndex]['data']; // Column name
    $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
    $searchValue = $postData['search']['value']; // Search value

    ## Search
    $searchQuery = "";
    if ($searchValue != '') {
      $searchQuery = " (company_name like '%" . $searchValue . "%' or phone like '%" . $searchValue . "%' or email like '%" . $searchValue . "%' or address like '%" . $searchValue . "%' or contact_person_name like '%" . $searchValue . "%' or contact_person_number like '%" . $searchValue . "%') ";
    }

    ## Total number of records without filtering
    $this->db->select('count(*) as allcount');
    $records = $this->db->get('suppliers')->result();
    $totalRecords = $records[0]->allcount;

    ## Total number of record with filtering
    $this->db->select('count(*) as allcount');
    if ($searchQuery != '') {
      $this->db->where($searchQuery);
    }

    $records = $this->db->get('suppliers')->result();
    $totalRecordwithFilter = $records[0]->allcount;

    $this->db->select('*');
    if ($searchQuery != '') {
      $this->db->where($searchQuery);
    }

    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get('suppliers')->result();

    $data = array();
    $i='1';
    foreach ($records as $record) {
      $href="suppliers/edit/".$record->id;
      $href1="locations/remove/".$record->id;
      $data[] = array(
        "id" => $i++,
        "name" => $record->company_name,
        "phone" => $record->phone,
        "email" => $record->email,
        "address" => $record->address,
        "contact_person_name" => $record->contact_person_name,
        "contact_number" => $record->contact_person_number,
        "href" => $record->id="<a href='$href' class='btn btn-info btn-xs'> <span class='fa fa-pencil'></span> Edit</a>
           ",
         // <a id='is_remove' data-id='$record->id' value='$record->id' class='btn btn-danger btn-xs is_remove'> <span class='fa fa-trash'></span> Delete</a>
      );
    }

    ## Response
    $response = array(
      "draw" => intval($draw),
      "iTotalRecords" => $totalRecords,
      "iTotalDisplayRecords" => $totalRecordwithFilter,
      "aaData" => $data,
    );

    return $response;
     }

      function get_all_suppliers_count()
      {
        try{
           $this->db->from('suppliers');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in get_all_suppliers_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join supplierscount 
      */ 
      function get_all_with_asso_suppliers()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in get_all_with_asso_suppliers function - ' . $ex);
           }  
      }
      /*
          * Get all suppliers 
      */ 
      function get_all_suppliers($params = array())
      {
        try{
            $this->db->select('suppliers.*,state.name as state_name'); 
            $this->db->join('state','state.state_id = suppliers.state_id');
              $this->db->order_by('suppliers.id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('suppliers')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in get_all_suppliers function - ' . $ex);
           }  
      } 
      /*
         * function to add new suppliers 
      */
      function add_suppliers($params)
      {
        try{
          $this->db->insert('suppliers',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in add_suppliers function - ' . $ex);
           }  
      }
      /* 
          * function to update suppliers 
      */
      function update_suppliers($id,$params)
      {
        try{
            $this->db->where('id',$id);
        return $this->db->update('suppliers',$params);
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in update_suppliers function - ' . $ex);
           }  
       }
     /* 
          * function to delete suppliers 
      */
       function delete_suppliers($id)
       {
        try{
             return $this->db->delete('suppliers',array('id'=>$id));
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in delete_suppliers function - ' . $ex);
           }  
       }
      /*
        * Get suppliers by  column name where not in particular id
      */ 
      function get_suppliersbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('id!=', $where_cond);
           return $this->db->get_where('suppliers',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in get_suppliersbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join supplierscount 
      */ 
      function get_all_with_asso_suppliers_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in get_all_with_asso_suppliers_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all suppliers_by_cat 
      */ 
      function get_all_suppliers_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('id', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('suppliers')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Suppliers_model model : Error in get_all_suppliers_by_cat function - ' . $ex);
           }  
      } 
 }