<?php
/*
Generated by Manuigniter v2.0
www.manuigniter.com
 */
class Gate_entry_pass_model extends CI_Model {
	function __construct() {
		parent::__construct();
	}
	/*
		        * Get gate_entry_pass by id
	*/
	function get_gate_entry_pass($id) {
		try {
			$this->db->select('gate_entry_pass.*,vehicle.vehicle_number,suppliers.company_name');
			$this->db->join('vehicle', 'vehicle.id = gate_entry_pass.truck_number_id');
		   $this->db->join('suppliers', 'suppliers.id = gate_entry_pass.gate_pass_for');
			return $this->db->get_where('gate_entry_pass', array('gate_entry_pass.id' => $id))->row_array();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model Model : Error in get_gate_entry_pass function - ' . $ex);
		}
	}
	/*
		        * Get gate_entry_pass by  column name
	*/
	function get_gate_entry_passbyclm_name($clm_name, $clm_value) {
		try {
			return $this->db->get_where('gate_entry_pass', array($clm_name => $clm_value))->row_array();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model Madel : Error in get_gate_entry_passbyclm_name function - ' . $ex);
		}
	}
	/*
		        * Get All gate_entry_pass count
	*/
	function get_all_gate_entry_pass_count() {
		try {
			$this->db->from('gate_entry_pass');
			return $this->db->count_all_results();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in get_all_gate_entry_pass_count function - ' . $ex);
		}
	}
	/*
		        * Get All with associated tables join gate_entry_passcount
	*/
	function get_all_with_asso_gate_entry_pass() {
		try {
			$query = $this->db->get();
			if ($query->num_rows() != 0) {
				return $query->result_array();
			} else {
				return false;
			}
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in get_all_with_asso_gate_entry_pass function - ' . $ex);
		}
	}
	/*
		          * Get all gate_entry_pass
	*/
	function get_all_gate_entry_pass($params = array()) {
		try {
			$this->db->select('gate_entry_pass.*,vehicle.vehicle_number,suppliers.company_name');
			$this->db->join('vehicle', 'vehicle.id = gate_entry_pass.truck_number_id');
			$this->db->join('suppliers', 'suppliers.id = gate_entry_pass.gate_pass_for');
			$this->db->order_by('id', 'desc');
			if (isset($params) && !empty($params)) {
				$this->db->limit($params['limit'], $params['offset']);
			}
			return $this->db->get('gate_entry_pass')->result_array();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in get_all_gate_entry_pass function - ' . $ex);
		}
	}

	public function get_truck_number() {
		try {

			$this->db->order_by('id', 'desc');
			if (isset($params) && !empty($params)) {
				$this->db->limit($params['limit'], $params['offset']);
			}
			return $this->db->get('vehicle')->result_array();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in get_all_gate_entry_pass function - ' . $ex);
		}
	}
	/*
		         * function to add new gate_entry_pass
	*/
	function add_gate_entry_pass($params) {
		try {
			$this->db->insert('gate_entry_pass', $params);
			return $this->db->insert_id();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in add_gate_entry_pass function - ' . $ex);
		}
	}
	/*
		          * function to update gate_entry_pass
	*/
	function update_gate_entry_pass($id, $params) {
		try {
			$this->db->where('id', $id);
			return $this->db->update('gate_entry_pass', $params);
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in update_gate_entry_pass function - ' . $ex);
		}
	}
	/*
		          * function to delete gate_entry_pass
	*/
	function delete_gate_entry_pass($id) {
		try {
			return $this->db->delete('gate_entry_pass', array('id' => $id));
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in delete_gate_entry_pass function - ' . $ex);
		}
	}
	/*
		        * Get gate_entry_pass by  column name where not in particular id
	*/
	function get_gate_entry_passbyclm_name_not_id($clm_name, $clm_value, $where_cond) {
		try {
			$this->db->where('id!=', $where_cond);
			return $this->db->get_where('gate_entry_pass', array($clm_name => $clm_value))->row_array();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in get_gate_entry_passbyclm_name_not_id function - ' . $ex);
		}
	}
	/*
		        * Get All with associated tables join gate_entry_passcount
	*/
	function get_all_with_asso_gate_entry_pass_by_cat($column_name = null, $value_id = null, $params = array()) {
		try {
			$query = $this->db->get();
			if ($query->num_rows() != 0) {
				return $query->result_array();
			} else {
				return false;
			}
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in get_all_with_asso_gate_entry_pass_by_cat function - ' . $ex);
		}
	}
	/*
		          * Get all gate_entry_pass_by_cat
	*/
	function get_all_gate_entry_pass_by_cat($column_name = null, $value_id = null, $params = array()) {
		try {
			$this->db->order_by('id', 'desc');
			$this->db->where($column_name, $value_id);
			if (isset($params) && !empty($params)) {
				$this->db->limit($params['limit'], $params['offset']);
			}
			return $this->db->get('gate_entry_pass')->result_array();
		} catch (Exception $ex) {
			throw new Exception('Gate_entry_pass_model model : Error in get_all_gate_entry_pass_by_cat function - ' . $ex);
		}
	}
}