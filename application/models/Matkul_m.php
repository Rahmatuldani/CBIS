<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul_m extends CI_Model {
	public function __construct(){
		parent::__construct();
    }
    
    public function create($data){
        $this->db->insert('matkul', $data);
        return true;
    }

    public function read($limit, $start){
		$this->db->order_by('semester ASC');
		$this->db->order_by('id_matkul ASC');
        $query = $this->db->get('matkul', $limit, $start);
        return $query->result_array();
    }

    public function update($data){
        $this->db->where('id_matkul', $data['id']);
        $this->db->update('matkul', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('id_matkul', $id);
        $this->db->delete('matkul');
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('matkul');
        $this->db->where('id_matkul', $id);
        $query = $this->db->get();
        return $query->row_array();
	}

	public function countall(){
		return $this->db->get('matkul')->num_rows();
	}

	public function _read(){
		$this->db->order_by('name_matkul ASC');
        $query = $this->db->get('matkul');
        return $query->result_array();
	}
	
	public function read_all(){
		$query = $this->db->get('matkul');
        return $query->result_array();
	}
}
