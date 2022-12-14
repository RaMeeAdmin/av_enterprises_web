<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Petrol_pumps_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get petrol_pumps by id 
      */ 
      function get_petrol_pumps($id)
      {
        try{
           return $this->db->get_where('petrol_pumps',array('id'=>$id))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model Model : Error in get_petrol_pumps function - ' . $ex);
           }  
      }
      /*
        * Get petrol_pumps by  column name
      */ 
      function get_petrol_pumpsbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('petrol_pumps',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model Madel : Error in get_petrol_pumpsbyclm_name function - ' . $ex);
           }  
      }
  function pumpsList($postData = null){
      $response = array();

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
      $searchQuery = " (petrol_pumps_name like '%" . $searchValue . "%'  or address like '%" . $searchValue . "%' or contact_person_name like '%" . $searchValue . "%' or contact_person_number like '%" . $searchValue . "%' ) ";
    }

    ## Total number of records without filtering
    $this->db->select('count(*) as allcount');
    $records = $this->db->get('petrol_pumps')->result();
    $totalRecords = $records[0]->allcount;

    ## Total number of record with filtering
    $this->db->select('count(*) as allcount');
    if ($searchQuery != '') {
      $this->db->where($searchQuery);
    }

    $records = $this->db->get('petrol_pumps')->result();
    $totalRecordwithFilter = $records[0]->allcount;

    $this->db->select('*');
    if ($searchQuery != '') {
      $this->db->where($searchQuery);
    }

    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get('petrol_pumps')->result();

    $data = array();
    $i='1';
    foreach ($records as $record) {
      $href="petrol_pumps/edit/".$record->id;
      $href1="locations/remove/".$record->id;
      $data[] = array(
        "id" => $i++,
        "petrol_pumps_name" => $record->petrol_pumps_name,
        "address" => $record->address,
        "contact_person_name" => $record->contact_person_name,
        "contact_person_number" => $record->contact_person_number,
        
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

     /*
        * Get All petrol_pumps count 
      */ 
      function get_all_petrol_pumps_count()
      {
        try{
           $this->db->from('petrol_pumps');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in get_all_petrol_pumps_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join petrol_pumpscount 
      */ 
      function get_all_with_asso_petrol_pumps()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in get_all_with_asso_petrol_pumps function - ' . $ex);
           }  
      }
      /*
          * Get all petrol_pumps 
      */ 
      function get_all_petrol_pumps($params = array())
      {
        try{
              $this->db->order_by('id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('petrol_pumps')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in get_all_petrol_pumps function - ' . $ex);
           }  
      } 

      function get_all_labour($params = array())
      {
        try{
              $this->db->order_by('id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('labour')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in get_all_petrol_pumps function - ' . $ex);
           }  
      } 
      /*
         * function to add new petrol_pumps 
      */
      function add_petrol_pumps($params)
      {
        try{
          $this->db->insert('petrol_pumps',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in add_petrol_pumps function - ' . $ex);
           }  
      }
      /* 
          * function to update petrol_pumps 
      */
      function update_petrol_pumps($id,$params)
      {
        try{
            $this->db->where('id',$id);
        return $this->db->update('petrol_pumps',$params);
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in update_petrol_pumps function - ' . $ex);
           }  
       }
     /* 
          * function to delete petrol_pumps 
      */
       function delete_petrol_pumps($id)
       {
        try{
             return $this->db->delete('petrol_pumps',array('id'=>$id));
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in delete_petrol_pumps function - ' . $ex);
           }  
       }
      /*
        * Get petrol_pumps by  column name where not in particular id
      */ 
      function get_petrol_pumpsbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('id!=', $where_cond);
           return $this->db->get_where('petrol_pumps',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in get_petrol_pumpsbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join petrol_pumpscount 
      */ 
      function get_all_with_asso_petrol_pumps_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in get_all_with_asso_petrol_pumps_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all petrol_pumps_by_cat 
      */ 
      function get_all_petrol_pumps_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('id', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('petrol_pumps')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Petrol_pumps_model model : Error in get_all_petrol_pumps_by_cat function - ' . $ex);
           }  
      } 
 }
