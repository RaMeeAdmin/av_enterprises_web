<?php 
/*
   Generated by Manuigniter v2.0 
   www.manuigniter.com
*/
class Locations_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
      /*
        * Get locations by id 
      */ 
      function get_locations($id)
      {
        try{
           return $this->db->get_where('locations',array('id'=>$id))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Locations_model Model : Error in get_locations function - ' . $ex);
           }  
      }
      /*
        * Get locations by  column name
      */ 
      function get_locationsbyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('locations',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Locations_model Madel : Error in get_locationsbyclm_name function - ' . $ex);
           }  
      }

      function getlocations($postData = null){
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
      $searchQuery = " (address like '%" . $searchValue . "%' or name like '%" . $searchValue . "%' or contact_person_name like '%" . $searchValue . "%' or contact_number like '%" . $searchValue . "%') ";
    }

    ## Total number of records without filtering
    $this->db->select('count(*) as allcount');
    $records = $this->db->get('locations')->result();
    $totalRecords = $records[0]->allcount;

    ## Total number of record with filtering
    $this->db->select('count(*) as allcount');
    if ($searchQuery != '') {
      $this->db->where($searchQuery);
    }

    $records = $this->db->get('locations')->result();
    $totalRecordwithFilter = $records[0]->allcount;

    $this->db->select('*');
    if ($searchQuery != '') {
      $this->db->where($searchQuery);
    }

    $this->db->order_by($columnName, $columnSortOrder);
    $this->db->limit($rowperpage, $start);
    $records = $this->db->get('locations')->result();

    $data = array();

    foreach ($records as $record) {
      $href="locations/edit/".$record->id;
      $href1="locations/remove/".$record->id;
      $data[] = array(
        "id" => $record->id,
        "name" => $record->name,
        "address" => $record->address,
        "contact_person_name" => $record->address,
        "contact_number" => $record->contact_number,
       
        "href" => $record->id="<a href='$href' class='btn btn-info btn-xs'> <span class='fa fa-pencil'></span> Edit</a>
            <a id='is_remove' data-id='$record->id' value='$record->id' class='btn btn-danger btn-xs is_remove'> <span class='fa fa-trash'></span> Delete</a>",
        
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
        * Get All locations count 
      */ 
      function get_all_locations_count()
      {
        try{
           $this->db->from('locations');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in get_all_locations_count function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join locationscount 
      */ 
      function get_all_with_asso_locations()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in get_all_with_asso_locations function - ' . $ex);
           }  
      }
      /*
          * Get all locations 
      */ 
      function get_all_locations($params = array())
      {
        try{
              $this->db->order_by('id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('locations')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in get_all_locations function - ' . $ex);
           }  
      } 
      /*
         * function to add new locations 
      */
      function add_locations($params)
      {
        try{
          $this->db->insert('locations',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in add_locations function - ' . $ex);
           }  
      }
      /* 
          * function to update locations 
      */
      function update_locations($id,$params)
      {
        try{
            $this->db->where('id',$id);
        return $this->db->update('locations',$params);
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in update_locations function - ' . $ex);
           }  
       }
     /* 
          * function to delete locations 
      */
       function delete_locations($id)
       {
        try{
             return $this->db->delete('locations',array('id'=>$id));
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in delete_locations function - ' . $ex);
           }  
       }
      /*
        * Get locations by  column name where not in particular id
      */ 
      function get_locationsbyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('id!=', $where_cond);
           return $this->db->get_where('locations',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in get_locationsbyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join locationscount 
      */ 
      function get_all_with_asso_locations_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in get_all_with_asso_locations_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all locations_by_cat 
      */ 
      function get_all_locations_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('id', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('locations')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Locations_model model : Error in get_all_locations_by_cat function - ' . $ex);
           }  
      } 
 }