<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array('dosen_m', 'matkul_m', 'jadwal_dosen', 'user_m'));
		if ($this->session->userdata('id') == NULL) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login First!</div>');
				redirect('auth');
		}
	}

	public function index(){
		$data = [
			'title' => 'CBIS | Home',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'login' => "dosen",
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/dosen/sidebar/dash_side', $data);
		$this->load->view('template/sidebar/dosen/topbar', $data);
		$this->load->view('dosen/home', $data);
		$this->load->view('template/footer');
	}

	public function profile(){
		$data = [
			'title' => 'CBIS | Profile',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'login' => "dosen",
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/dosen/sidebar/dash_side', $data);
		$this->load->view('template/sidebar/dosen/topbar', $data);
		$this->load->view('dosen/profile', $data);
		$this->load->view('template/footer');
	}

	public function edit_profile()
	{
		$data = [
			'title' => 'CBIS | Edit Profile',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'login' => 'dosen',
		];
		$pesan = $_GET['pesan'];
		if ($pesan == "belum") {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/dosen/sidebar/dash_side', $data);
			$this->load->view('template/sidebar/dosen/topbar', $data);
			$this->load->view('dosen/edit_profile', $data);
			$this->load->view('template/footer');
		} else {
			$this->db->set(array(
				'name_dosen' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'sex' => $this->input->post('sex'),
				'region' => $this->input->post('region'),
				'birth_place' => $this->input->post('place'),
				'birth_date' => $this->input->post('date'),
				'phone' => $this->input->post('phone'),
			));
			$this->db->where('nip', $data['user']['nip']);
			$this->db->update('dosen');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile edit successfully!</div>');
			redirect('dosen/profile');
		}
	}

	public function change_password()
	{
		$data = [
			'title' => 'CBIS | Change Password',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'login' => 'dosen',
		];
		$this->form_validation->set_rules('new_pass1', 'New Password', 'required', [
			'required' => 'Insert Password!',
		]);
		$this->form_validation->set_rules('new_pass2', 'New Password', 'required|matches[new_pass1]', [
			'required' => 'Insert Password!',
			'matches' => 'Password not match',
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/dosen/sidebar/dash_side', $data);
			$this->load->view('template/sidebar/dosen/topbar', $data);
			$this->load->view('dosen/change_pass', $data);
			$this->load->view('template/footer');
		} else {
			$new_pass = password_hash($this->input->post('new_pass2'), PASSWORD_DEFAULT);
			$user = array(
				'id' => $_GET['id'],
				'password' => $new_pass,
			);

			$this->user_m->update($user);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has change!</div>');
			redirect('dosen/change_password');
		}
	}

	public function pilih_matkul(){
		$this->form_validation->set_rules('pilih', 'Pilih', 'required');
		$data = [
			'title' => 'CBIS | Input Mata Kuliah',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'matkul' => $this->matkul_m->_read(),
			'login' => "dosen",
		];
		
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/dosen/sidebar/pilih_side', $data);
			$this->load->view('template/sidebar/dosen/topbar', $data);
			$this->load->view('dosen/pilih_matkul', $data);
			$this->load->view('template/footer');
			
		} else {
			$pilih = $this->input->post('pilih');
			$data['matkul_pilih'] = $this->matkul_m->get($pilih); 
			
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/dosen/sidebar/pilih_side', $data);
			$this->load->view('template/sidebar/dosen/topbar', $data);
			$this->load->view('dosen/input_matkul', $data);
			$this->load->view('template/footer');
		}
	}
	
	public function input_matkul(){
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('hari', 'Hari', 'required');
		$this->form_validation->set_rules('jam', 'Jam', 'required');
		$this->form_validation->set_rules('ruang', 'Ruang', 'required');
		$id = $_GET['id'];
		
		$data = [
			'title' => 'CBIS | Input Mata Kuliah',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'matkul' => $this->matkul_m->get($id),
			'login' => "dosen",
		];
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/dosen/sidebar/pilih_side', $data);
			$this->load->view('template/sidebar/dosen/topbar', $data);
			$this->load->view('dosen/input_matkul', $data);
			$this->load->view('template/footer');
			
		} else {
			
			$jadwal = array(
				'nip' => $data['user']['nip'],
				'kelas' => $this->input->post('kelas'),
				'hari' => $this->input->post('hari'),
				'jam' => $this->input->post('jam'),
				'ruang' => $this->input->post('ruang'),
				'id_matkul' => $data['matkul']['id_matkul'],
			);
			$this->jadwal_dosen->create($jadwal);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data save successfully!</div>');
			redirect('dosen/tampil_matkul');		
		}
	}

	public function tampil_matkul(){
		$data = [
			'title' => 'CBIS | Mata Kuliah',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'jadwal' => $this->jadwal_dosen->read($this->session->userdata('id')),
			'login' => "dosen",
		];
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/dosen/sidebar/tampil_side', $data);
		$this->load->view('template/sidebar/dosen/topbar', $data);
		$this->load->view('dosen/tampil_matkul', $data);
		$this->load->view('template/footer');
	}

	public function edit_matkul(){
		$this->form_validation->set_rules('jam', 'Jam', 'required', [
			'required' => 'Insert Date!'
		]);

		$id_edit = $_GET['id_edit'];
		$data = [
			'title' => 'CBIS | Mata Kuliah',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'edit' => $this->jadwal_dosen->get_id($id_edit),
			'matkul' => $this->matkul_m->read_all(),
			'login' => "dosen",
		];
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/dosen/sidebar/tampil_side', $data);
			$this->load->view('template/sidebar/dosen/topbar', $data);
			$this->load->view('dosen/edit_matkul', $data);
			$this->load->view('template/footer');
		} else {			
				$this->db->set(array(
					'kelas' => $this->input->post('kelas'),
					'hari' => $this->input->post('hari'),
					'jam' => $this->input->post('jam'),
					'ruang' => $this->input->post('ruang'),
					'id_matkul' => $this->input->post('id_matkul'),
				));
				$this->db->where('id', $id_edit);
				$this->db->update('jadwal_dosen');

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data edit successfully!</div>');
				redirect('dosen/tampil_matkul');			
		}
	}

	public function tampil_jadwal(){
		$data = [
			'title' => 'CBIS | Jadwal',
			'user' => $this->dosen_m->get($this->session->userdata('id')),
			'jadwal' => $this->jadwal_dosen->read($this->session->userdata('id')),
			'login' => "dosen",
		];
		
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/dosen/sidebar/tampil_jadwal', $data);
		$this->load->view('template/sidebar/dosen/topbar', $data);
		$this->load->view('dosen/tampil_jadwal', $data);
		$this->load->view('template/footer');
	}

	public function delete_matkul(){
		$id = $_GET['id_delete'];
		$this->jadwal_dosen->delete($id);
		$this->tampil_matkul();
	}
}
