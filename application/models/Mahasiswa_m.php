<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_m extends CI_Model {
	public function __construct(){
		parent::__construct();
    }
    
    public function create($data){
        $this->db->insert('mahasiswa', $data);
        return true;
    }

    public function read($limit){
        $query = $this->db->get('mahasiswa', $limit);
        return $query->result_array();
	}

    public function update($data){
        $this->db->where('nim', $data['id']);
        $this->db->update('mahasiswa', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('nim', $id);
        $this->db->delete('mahasiswa');
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('nim', $id);
        $query = $this->db->get();
        return $query->row_array();
	}
	
	public function countall(){
		return $this->db->get('mahasiswa')->num_rows();
	}
}
