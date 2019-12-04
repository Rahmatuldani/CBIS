<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_m extends CI_Model {
	public function __construct(){
		parent::__construct();
    }
    
    public function create($data){
        $this->db->insert('dosen', $data);
        return true;
    }

    public function read($limit){
        $query = $this->db->get('dosen', $limit);
        return $query->result_array();
    }

    public function update($data){
        $this->db->where('nip', $data['id']);
        $this->db->update('dosen', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('nip', $id);
        $this->db->delete('dosen');
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('nip', $id);
        $query = $this->db->get();
        return $query->row_array();
	}
	public function countall(){
		return $this->db->get('dosen')->num_rows();
	}

	public function get_nip($nip){
		$this->db->select('nip');
        $this->db->from('dosen');
        $this->db->where('nip', $nip);
        $query = $this->db->get();
        return $query->result_array();
	}
}
