<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {
	public function __construct(){
		parent::__construct();
    }
    
    public function create($data){
        $this->db->insert('users', $data);	
        return true;
	}
	
    public function update($data){
        $this->db->where('id', $data['id']);
        $this->db->update('users', $data);
        return true;
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('users');
    }

    public function get($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}
}
