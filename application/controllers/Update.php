<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model(array('admin_m', 'user_m', 'mahasiswa_m', 'dosen_m', 'matkul_m'));
		if ($this->session->userdata('id') == NULL) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login First!</div>');
				redirect('auth');
		}
	}

	public function add_matkul(){
		$this->form_validation->set_rules('id', 'ID', 'required|is_unique[matkul.id_matkul]', [
			'required' => 'Insert ID!',
			'is_unique' => 'This ID already exist!'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Insert name!'
		]);
		$this->form_validation->set_rules('semester', 'Semester', 'required', [
			'required' => 'Insert Semester!'
		]);
		$this->form_validation->set_rules('sks', 'SKS', 'required', [
			'required' => 'Insert SKS!'
		]);

		$data = [
			'title' => 'CBIS | Update - Matkul',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'login' => "administrator",
		];
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/admin/update/matkul', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/add_matkul', $data);
			$this->load->view('template/footer');
		} else {
			$matkul = array(
				'id_matkul' => $this->input->post('id'),
				'name_matkul' => $this->input->post('name'),
				'semester' => $this->input->post('semester'),
				'sks' => $this->input->post('sks'),
			);

			$this->matkul_m->create($matkul);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data save successfully!</div>');
			redirect('admin/update_matkul');			
		}
	}

	public function edit_admin(){
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Insert name!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Insert password!'
		]);
		$id_edit = $_GET['id_edit'];
		$data = [
			'title' => 'CBIS | Update - Administrator',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'edit' => $this->admin_m->get($id_edit),
			'login' => "administrator",
		];
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/admin/update/admin', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/edit/admin', $data);
			$this->load->view('template/footer');
		} else {			
				$this->db->set(array(
					'name_admin' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'sex' => $this->input->post('sex'),
					'region' => $this->input->post('region'),
					'birth_place' => $this->input->post('place'),
					'birth_date' => $this->input->post('date'),
					'phone' => $this->input->post('phone'),
				));
				$this->db->where('id_admin', $data['edit']['id_admin']);
				$this->db->update('admin');

				$this->db->set(array(
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				));
				$this->db->where('id', $data['edit']['id_admin']);
				$this->db->update('users');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data edit successfully!</div>');
				redirect('admin/update_admin');			
		}
	}

	public function edit_mahasiswa(){
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Insert name!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Insert password!'
		]);
		$id_edit = $_GET['id_edit'];
		$data = [
			'title' => 'CBIS | Update - Mahasiswa',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'edit' => $this->mahasiswa_m->get($id_edit),
			'login' => "administrator",
		];
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/admin/update/mahasiswa', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/edit/mahasiswa', $data);
			$this->load->view('template/footer');
		} else {			
				$this->db->set(array(
					'name_mhs' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'sex' => $this->input->post('sex'),
					'region' => $this->input->post('region'),
					'birth_place' => $this->input->post('place'),
					'birth_date' => $this->input->post('date'),
					'phone' => $this->input->post('phone'),
				));
				$this->db->where('nim', $data['edit']['nim']);
				$this->db->update('mahasiswa');

				$this->db->set(array(
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				));
				$this->db->where('id', $data['edit']['nim']);
				$this->db->update('users');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data edit successfully!</div>');
				redirect('admin/update_mahasiswa');			
		}
	}

	public function edit_dosen(){
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Insert name!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Insert password!'
		]);
		$id_edit = $_GET['id_edit'];
		$data = [
			'title' => 'CBIS | Update - Dosen',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'edit' => $this->dosen_m->get($id_edit),
			'login' => "administrator",
		];
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/admin/update/dosen', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/edit/dosen', $data);
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
			$this->db->where('nip', $data['edit']['nip']);
			$this->db->update('dosen');

			$this->db->set(array(
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			));
			$this->db->where('id', $data['edit']['nip']);
			$this->db->update('users');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data edit successfully!</div>');
			redirect('admin/update_dosen');			
		}
	}

	public function edit_matkul(){
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Insert name!'
		]);
		$this->form_validation->set_rules('semester', 'Semester', 'required', [
			'required' => 'Insert Semester!'
		]);
		$this->form_validation->set_rules('sks', 'SKS', 'required', [
			'required' => 'Insert SKS!'
		]);
		$id_edit = $_GET['id_edit'];
		$data = [
			'title' => 'CBIS | Update - Mata Kuliah',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'edit' => $this->matkul_m->get($id_edit),
			'login' => "administrator",
		];
		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/admin/update/matkul', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/edit/matkul', $data);
			$this->load->view('template/footer');
		} else {	
			$this->db->set(array(
				'name_matkul' => $this->input->post('name'),
				'semester' => $this->input->post('semester'),
				'sks' => $this->input->post('sks'),
			));
			$this->db->where('id_matkul', $data['edit']['id_matkul']);
			$this->db->update('matkul');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data edit successfully!</div>');
			redirect('admin/update_matkul');			
		}
	}

	public function delete_admin(){
		$id_delete = $_GET['id_delete'];
		if ($id_delete == $this->session->userdata('id')) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Cannot delete this account!<br>Because you using this account</div>');
			redirect('admin/update_admin');	
		} else {
		$this->admin_m->delete($id_delete);
		$this->user_m->delete($id_delete);
				
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data delete successfully!</div>');
		redirect('admin/update_admin');	
		}
	}

	public function delete_mahasiswa(){
		$id_delete = $_GET['id_delete'];
		$this->mahasiswa_m->delete($id_delete);
		$this->user_m->delete($id_delete);
				
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data delete successfully!</div>');
		redirect('admin/update_mahasiswa');	
	}

	public function delete_dosen(){
		$id_delete = $_GET['id_delete'];
		$this->dosen_m->delete($id_delete);
		$this->user_m->delete($id_delete);
				
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data delete successfully!</div>');
		redirect('admin/update_dosen');	
	}

	public function delete_matkul(){
		$id_delete = $_GET['id_delete'];
		$this->matkul_m->delete($id_delete);
		$this->user_m->delete($id_delete);
				
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data delete successfully!</div>');
		redirect('admin/update_matkul');	
	}
}
