<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Deliver_model extends CI_Model {

	function getsalesorder($postData = null) {

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
			$searchQuery = " (sale_code like '%" . $searchValue . "%' or sale_date like '%" . $searchValue . "%' or 	grand_total like'%" . $searchValue . "%' ) ";
		}

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
		$records = $this->db->get('bagasse_sale')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}

		$records = $this->db->get('bagasse_sale')->result();
		$totalRecordwithFilter = $records[0]->allcount;

		## Fetch records
		$this->db->select('*');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}

		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$records = $this->db->get('bagasse_sale')->result();

		$data = array();

		foreach ($records as $record) {
			$href = "deliver/view_more/" . $record->id;
			$data[] = array(
				"sale_code" => $record->sale_code,
				"sale_date" => $record->sale_date,
				"grand_total" => $record->grand_total,
				"sale_note" => $record->sale_note,
				"paid_amount" => $record->paid_amount,
				"weight" => $record->weight,
				"weight_dispatch" => $record->weight_dispatch,
				"href" => $record->id = "<a href='$href' class='btn btn-info btn-xs'> <span class='fa fa-eye'></span> View</a>",
			);
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"data" => $data,
		);

		return $response;
	}

}