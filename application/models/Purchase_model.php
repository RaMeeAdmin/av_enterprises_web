<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Purchase_model extends CI_Model {

	function getEmployees($postData = null) {

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
			$searchQuery = " (purchase_code like '%" . $searchValue . "%' or purchase_date like '%" . $searchValue . "%' or grand_total like'%" . $searchValue . "%' ) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('purchase')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}

		$records = $this->db->get('purchase')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}

		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
	    $this->db->where('status','open');
		$records = $this->db->get('purchase')->result();

		$data = array();

		foreach ($records as $record) {

			$href = "purchase/view_more/" . $record->id;
			//$href1 = "purchase/remove/" . $record->id;

			// <a id='is_remove' data-id='$record->id' value='$record->id' class='btn btn-danger btn-xs is_remove'> <span class='fa fa-trash'></span> Delete</a>",

			$data[] = array(
				"id" => $record->id,
				"purchase_code" => $record->purchase_code,
				"purchase_date" => $record->purchase_date,
				"due_date" => $record->due_date,
				"grand_total" => $record->grand_total,
				"purchase_note" => $record->purchase_note,
				"paid_amount" => $record->paid_amount,
				"weight" => $record->weight,
				//"weight_dispatch" => $record->weight_dispatch,
				"href" => $record->id = "<a href='$href' class='btn btn-info btn-xs'> <span class='fa fa-eye' ></span> View</a> 
				<button type='button' id='$record->id' class='btn btn-primary btn-xs price' data-toggle='modal' data-target='#exampleModalCenter'>Changes Price</button>",

			);
		}

		## Response
		$response = array(
			'success' => true,
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"data" => $data,
			'message' => 'get all data Succesfully',
		);

		return $response;
	}

}