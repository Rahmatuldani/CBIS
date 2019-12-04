<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_mahasiswa extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function create($data)
	{
		$this->db->insert('jadwal_mahasiswa', $data);
		return true;
	}

	public function get($nim)
	{
		$this->db->select('*');
		$this->db->from('jadwal_mahasiswa');
		$this->db->join('jadwal_dosen', 'jadwal_mahasiswa.id_jadwal = jadwal_dosen.id');
		$this->db->join('dosen', 'dosen.nip = jadwal_dosen.nip');
		$this->db->join('matkul', 'matkul.id_matkul = jadwal_dosen.id_matkul');
		$this->db->where('jadwal_mahasiswa.nim', $nim);
		$query = $this->db->get();
		return $query->result_array();
	}

	// public function read($nip)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('jadwal_mahasiswa');
	// 	$this->db->join('dosen', 'dosen.nip = jadwal_dosen.nip');
	// 	$this->db->join('matkul', 'matkul.id_matkul = jadwal_dosen.id_matkul');
	// 	$this->db->where('jadwal_dosen.nip', $nip);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

}
