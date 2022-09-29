<?php 

class Quick_sales_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
     
      function get_quick_sale($id)
      {
        try{
           return $this->db->get_where('quick_sales',array('id'=>$id))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model Model : Error in get_bagasse_sale function - ' . $ex);
           }  
      }
   
      function get_quick_salebyclm_name($clm_name,$clm_value)
      {
        try{
           return $this->db->get_where('quick_sales',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model Madel : Error in get_bagasse_salebyclm_name function - ' . $ex);
           }  
      }
    
      function get_all_quick_count()
      {
        try{
           $this->db->from('quick_sales');
           return $this->db->count_all_results();
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in get_all_bagasse_sale_count function - ' . $ex);
           }  
      }
    
      function get_all_with_asso_quick_sale()
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in get_all_with_asso_bagasse_sale function - ' . $ex);
           }  
      }
      
      function get_all_quick_sale($params = array())
      {
        try{
              $this->db->order_by('id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('quick_sales')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in get_all_bagasse_sale function - ' . $ex);
           }  
      } 
      
      function add_quick_sale($params)
      {
        try{
          $this->db->insert('quick_sales',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in add_bagasse_sale function - ' . $ex);
           }  
      }
      
      function update_quick_sale($id,$params)
      {
        try{
          
            $this->db->where('id',$id);
        return $this->db->update('quick_sales',$params);
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in update_bagasse_sale function - ' . $ex);
           }  
       }
     
       function delete_quick_sale($id)
       {
        try{
             return $this->db->delete('quick_sales',array('id'=>$id));
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in delete_bagasse_sale function - ' . $ex);
           }  
       }
      /*
        * Get bagasse_sale by  column name where not in particular id
      */ 
      function get_quick_salebyclm_name_not_id($clm_name,$clm_value,$where_cond)
      {
        try{
            $this->db->where('id!=', $where_cond);
           return $this->db->get_where('quick_sales',array($clm_name=>$clm_value))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in get_bagasse_salebyclm_name_not_id function - ' . $ex);
           }  
      }
     /*
        * Get All with associated tables join bagasse_salecount 
      */ 
      function get_all_with_asso_quick_sale_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
          $query = $this->db->get(); 
            if($query->num_rows() != 0){
               return $query->result_array();
            }else{
                return false;
            }
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in get_all_with_asso_bagasse_sale_by_cat function - ' . $ex);
           }  
      }
      /*
          * Get all bagasse_sale_by_cat 
      */ 
      function get_all_quick_sale_by_cat($column_name=null,$value_id=null,$params=array())
      {
        try{
              $this->db->order_by('id', 'desc');
              $this->db->where($column_name, $value_id);
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('quick_sales')->result_array();
           } catch (Exception $ex) {
             throw new Exception('Bagasse_sale_model model : Error in get_all_bagasse_sale_by_cat function - ' . $ex);
           }  
      } 
 }
