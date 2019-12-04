<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_semester extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function create($data){
		$this->db->insert('input_semester', $data);
	}

	public function delete(){
		$this->db->empty_table('input_semester');
	}

	public function read(){
		$query = $this->db->get('input_semester');
		return $query->result_array();
	}
}
