<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_dosen extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data)
	{
		$this->db->insert('jadwal_dosen', $data);
		return true;
	}

	public function read($nip)
	{
		$this->db->select('*');
		$this->db->from('jadwal_dosen');
		$this->db->join('dosen', 'dosen.nip = jadwal_dosen.nip');
		$this->db->join('matkul', 'matkul.id_matkul = jadwal_dosen.id_matkul');
		$this->db->where('jadwal_dosen.nip', $nip);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get($nip)
	{
		$this->db->select('*');
		$this->db->from('jadwal_dosen');
		$this->db->join('dosen', 'dosen.nip = jadwal_dosen.nip');
		$this->db->join('matkul', 'matkul.id_matkul = jadwal_dosen.id_matkul');
		$this->db->where('jadwal_dosen.nip', $nip);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_id($id)
	{
		$this->db->select('*');
		$this->db->from('jadwal_dosen');
		$this->db->join('dosen', 'dosen.nip = jadwal_dosen.nip');
		$this->db->join('matkul', 'matkul.id_matkul = jadwal_dosen.id_matkul');
		$this->db->where('jadwal_dosen.id', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function select($id){
		$this->db->select('*');
		$this->db->from('jadwal_dosen');
		$this->db->join('dosen', 'dosen.nip = jadwal_dosen.nip');
		$this->db->join('matkul', 'matkul.id_matkul = jadwal_dosen.id_matkul');
		$this->db->where('matkul.semester', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete($id){
		$this->db->delete('jadwal_dosen', array('id' => $id));
	}
}
