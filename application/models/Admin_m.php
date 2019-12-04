<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model {
	public function __construct(){
		parent::__construct();
    }
    
    public function create($data){
        $this->db->insert('admin', $data);
        return true;
    }

    public function read($limit){
        $query = $this->db->get('admin', $limit);
        return $query->result_array();
    }

    public function update($data){
        $this->db->where('id_admin', $data['id']);
        $this->db->update('admin', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('id_admin', $id);
        $this->db->delete('admin');
    }

    public function get($id){
		$this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id_admin', $id);
        $query = $this->db->get();
		return $query->row_array();
	}
}
