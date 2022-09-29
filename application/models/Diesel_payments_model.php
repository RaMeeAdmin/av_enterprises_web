

<?php 

class Diesel_payments_model extends CI_Model 
{ 
     function __construct()
      {
          parent::__construct();
      }
     
        function get_all_diesel_payment($params = array())
      {
        try{
              $this->db->order_by('id', 'desc');
              if(isset($params) && !empty($params)){
               $this->db->limit($params['limit'], $params['offset']);
              }
               return $this->db->get('diesel_payment')->result_array();
           } catch (Exception $ex) {
             throw new Exception('get_all_diesel_payment model : Error in get_all_diesel_payment function - ' . $ex);
           }  
      } 
      function add_diesel_payment($params)
      {
        try{
          $this->db->insert('diesel_payment',$params);
        return $this->db->insert_id();
           } catch (Exception $ex) {
             throw new Exception('Customer_model model : Error in add_customer function - ' . $ex);
           }  
      }
      function get_Diesel_payments($id){
        try{
           return $this->db->get_where('diesel_payment',array('id'=>$id))->row_array();
           } catch (Exception $ex) {
             throw new Exception('Customer_model Model : Error in get_customer function - ' . $ex);
           } 
      }
      function update_Diesel_payments($id,$params){
         try{
            $this->db->where('id',$id);
        return $this->db->update('diesel_payment',$params);
           } catch (Exception $ex) {
             throw new Exception('Customer_model model : Error in update_customer function - ' . $ex);
           }
      }
function delete_diesel_payment($id)
       {
        try{
             return $this->db->delete('diesel_payment',array('id'=>$id));
           } catch (Exception $ex) {
             throw new Exception('Customer_model model : Error in delete_customer function - ' . $ex);
           }  
       }
  }
  ?>