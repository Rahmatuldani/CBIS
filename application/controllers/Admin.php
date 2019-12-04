<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('user_m', 'admin_m', 'mahasiswa_m', 'dosen_m', 'matkul_m', 'input_semester'));
		if ($this->session->userdata('id') == NULL) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login First!</div>');
				redirect('auth');
		}
	}

	public function index()
	{
		$data = array(
			'title' => 'CBIS | Administrator',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'login' => 'administrator',
		);
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/home', $data);
		$this->load->view('template/footer');
	}

	public function profile()
	{
		$data = [
			'title' => 'CBIS | Profile',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'login' => 'administrator',
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/profile', $data);
		$this->load->view('template/footer');
	}

	public function edit_profile()
	{
		$data = [
			'title' => 'CBIS | Edit Profile',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'login' => 'administrator',
		];
		$pesan = $_GET['pesan'];
		if ($pesan == "belum") {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/edit_profile', $data);
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
			$this->db->where('id_admin', $data['user']['id_admin']);
			$this->db->update('admin');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile edit successfully!</div>');
			redirect('admin/profile');
		}
	}

	public function change_password()
	{
		$data = [
			'title' => 'CBIS | Change Password',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'login' => 'administrator',
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
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/change_pass', $data);
			$this->load->view('template/footer');
		} else {
			$new_pass = password_hash($this->input->post('new_pass2'), PASSWORD_DEFAULT);
			$user = array(
				'id' => $_GET['id'],
				'password' => $new_pass,
			);

			$this->user_m->update($user);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has change!</div>');
			redirect('admin/change_password');
		}
	}

	public function tambah()
	{
		$this->form_validation->set_rules('id', 'ID', 'required|is_unique[users.id]', [
			'required' => 'Insert ID!',
			'is_unique' => 'This ID already exist!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Insert password!'
		]);
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Insert name!'
		]);
		$this->form_validation->set_rules('level', 'Level', 'required', [
			'required' => 'Insert level!'
		]);

		$data = [
			'title' => 'CBIS | Add Users',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'login' => 'administrator',
		];
		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/admin/add', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/tambah', $data);
			$this->load->view('template/footer');
		} else {

			if ($this->input->post('level') == 'Admin') {
				$data = array(
					'id_admin' => $this->input->post('id'),
					'name_admin' => $this->input->post('name'),
				); 

				$user = array(
					'id' => $this->input->post('id'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'level' => $this->input->post('level'),
				);

				$this->user_m->create($user);
				$this->admin_m->create($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data save successfully!</div>');
				redirect('admin/admin');
			} else if ($this->input->post('level') == 'Mahasiswa') {
				$data = array(
					'nim' => $this->input->post('id'),
					'name_mhs' => $this->input->post('name'),
				); 

				$user = array(
					'id' => $this->input->post('id'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'level' => $this->input->post('level'),
				);

				$this->user_m->create($user);
				$this->mahasiswa_m->create($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data save successfully!</div>');
				redirect('admin/mahasiswa');
			} else if ($this->input->post('level') == 'Dosen') {
				$data = array(
					'nip' => $this->input->post('id'),
					'name_dosen' => $this->input->post('name'),
				); 

				$user = array(
					'id' => $this->input->post('id'),
					'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'level' => $this->input->post('level'),
				);

				$this->user_m->create($user);
				$this->dosen_m->create($data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data save successfully!</div>');
				redirect('admin/dosen');
			}
		}
	}

	public function admin(){
		$data = [
			'title' => 'CBIS | Administrator',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'admin' => $this->admin_m->read(15),
			'login' => 'administrator',
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/data/admin', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/admin', $data);
		$this->load->view('template/footer');
	}

	public function mahasiswa(){
		// Pagination
		$config['base_url'] = 'http://localhost/CodeIgniter/CBIS_revisi/admin/mahasiswa';
		$config['total_rows'] = $this->mahasiswa_m->countall();
		$config['per_page'] = 15;

		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['pref_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'CBIS | Mahasiswa';
		$data['user'] = $this->admin_m->get($this->session->userdata('id'));
		$data['mahasiswa'] = $this->mahasiswa_m->read($config['per_page'], $data['start']);
		$data['login'] = "administrator";

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/data/mahasiswa', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/mahasiswa', $data);
		$this->load->view('template/footer');
	}

	public function dosen(){
		// Pagination
		$config['base_url'] = 'http://localhost/CodeIgniter/CBIS_revisi/admin/dosen';
		$config['total_rows'] = $this->dosen_m->countall();
		$config['per_page'] = 15;

		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['pref_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'CBIS | Dosen';
		$data['user'] = $this->admin_m->get($this->session->userdata('id'));
		$data['dosen'] = $this->dosen_m->read($config['per_page'], $data['start']);
		$data['login'] = "administrator";

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/data/dosen', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/dosen', $data);
		$this->load->view('template/footer');
	}

	public function matkul(){
		// Pagination
		$config['base_url'] = 'http://localhost/CodeIgniter/CBIS_revisi/admin/matkul';
		$config['total_rows'] = $this->matkul_m->countall();
		$config['per_page'] = 15;

		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['pref_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'CBIS | Mata Kuliah';
		$data['user'] = $this->admin_m->get($this->session->userdata('id'));
		$data['matkul'] = $this->matkul_m->read($config['per_page'], $data['start']);
		$data['login'] = "administrator";

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/data/matkul', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/matkul', $data);
		$this->load->view('template/footer');
	}

	public function update_admin(){
		$data = [
			'title' => 'CBIS | Update - Administrator',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'admin' => $this->admin_m->read(15),
			'login' => "administrator",
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/update/admin', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/update/admin', $data);
		$this->load->view('template/footer');
	}

	public function update_mahasiswa(){
		// Pagination
		$config['base_url'] = 'http://localhost/CodeIgniter/CBIS_revisi/admin/update_mahasiswa';
		$config['total_rows'] = $this->mahasiswa_m->countall();
		$config['per_page'] = 15;

		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['pref_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'CBIS | Update - Mahasiswa';
		$data['user'] = $this->admin_m->get($this->session->userdata('id'));
		$data['mahasiswa'] = $this->mahasiswa_m->read($config['per_page'], $data['start']);
		$data['login'] = "administrator";

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/update/mahasiswa', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/update/mahasiswa', $data);
		$this->load->view('template/footer');
	}

	public function update_dosen(){
		// Pagination
		$config['base_url'] = 'http://localhost/CodeIgniter/CBIS_revisi/admin/update_dosen';
		$config['total_rows'] = $this->dosen_m->countall();
		$config['per_page'] = 15;

		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['pref_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'CBIS | Update - Dosen';
		$data['user'] = $this->admin_m->get($this->session->userdata('id'));
		$data['dosen'] = $this->dosen_m->read($config['per_page'], $data['start']);
		$data['login'] = "administrator";

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/update/dosen', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/update/dosen', $data);
		$this->load->view('template/footer');
	}

	public function update_matkul(){
		// Pagination
		$config['base_url'] = 'http://localhost/CodeIgniter/CBIS_revisi/admin/update_matkul';
		$config['total_rows'] = $this->matkul_m->countall();
		$config['per_page'] = 12;

		$config['full_tag_open'] = '<nav aria-label="pagination"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';
		
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['pref_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		
		$config['attributes'] = array('class' => 'page-link');
		
		$this->pagination->initialize($config);
		
		$data['start'] = $this->uri->segment(3);
		$data['title'] = 'CBIS | Update - Mata Kuliah';
		$data['user'] = $this->admin_m->get($this->session->userdata('id'));
		$data['matkul'] = $this->matkul_m->read($config['per_page'], $data['start']);
		$data['login'] = "administrator";

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/admin/update/matkul', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('admin/update/matkul', $data);
		$this->load->view('template/footer');
	}

	public function pilih_semester(){
		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$data = [
			'title' => 'CBIS | Insert Semester',
			'user' => $this->admin_m->get($this->session->userdata('id')),
			'login' => "administrator",
		];

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/admin/pilih_semester', $data);
			$this->load->view('template/topbar', $data);
			$this->load->view('admin/pilih_semester', $data);
			$this->load->view('template/footer');
		} else {
			$semester = array(
				'id_semester' => $this->input->post('id'),
				'nama_semester' => $this->input->post('name'),
			);

			$this->input_semester->create($semester);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Semester has change!</div>');
			redirect('admin/pilih_semester');
		}
	}

	public function delete_semester(){
		$this->input_semester->delete();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Semester has delete!</div>');
		redirect('admin/pilih_semester');
	}
}
