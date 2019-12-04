<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('mahasiswa_m', 'jadwal_mahasiswa', 'user_m', 'matkul_m', 'input_semester', 'jadwal_dosen'));
		if ($this->session->userdata('id') == NULL) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login First!</div>');
			redirect('auth');
		}
	}

	public function index()
	{
		$data = [
			'title' => 'CBIS | Home',
			'user' => $this->mahasiswa_m->get($this->session->userdata('id')),
			'login' => "mahasiswa",
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/mahasiswa/sidebar/dash_side', $data);
		$this->load->view('template/sidebar/mahasiswa/topbar', $data);
		$this->load->view('mahasiswa/home', $data);
		$this->load->view('template/footer');
	}

	public function profile()
	{
		$data = [
			'title' => 'CBIS | Profile',
			'user' => $this->mahasiswa_m->get($this->session->userdata('id')),
			'login' => "mahasiswa",
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/mahasiswa/sidebar/dash_side', $data);
		$this->load->view('template/sidebar/mahasiswa/topbar', $data);
		$this->load->view('mahasiswa/profile', $data);
		$this->load->view('template/footer');
	}

	public function edit_profile()
	{
		$data = [
			'title' => 'CBIS | Edit Profile',
			'user' => $this->mahasiswa_m->get($this->session->userdata('id')),
			'login' => 'mahasiswa',
		];
		$pesan = $_GET['pesan'];
		if ($pesan == "belum") {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/mahasiswa/sidebar/dash_side', $data);
			$this->load->view('template/sidebar/mahasiswa/topbar', $data);
			$this->load->view('mahasiswa/edit_profile', $data);
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
			$this->db->where('nim', $data['user']['nim']);
			$this->db->update('mahasiswa');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile edit successfully!</div>');
			redirect('mahasiswa/profile');
		}
	}

	public function change_password()
	{
		$data = [
			'title' => 'CBIS | Change Password',
			'user' => $this->mahasiswa_m->get($this->session->userdata('id')),
			'login' => 'mahasiswa',
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
			$this->load->view('template/sidebar/mahasiswa/sidebar/dash_side', $data);
			$this->load->view('template/sidebar/mahasiswa/topbar', $data);
			$this->load->view('mahasiswa/change_pass', $data);
			$this->load->view('template/footer');
		} else {
			$new_pass = password_hash($this->input->post('new_pass2'), PASSWORD_DEFAULT);
			$user = array(
				'id' => $_GET['id'],
				'password' => $new_pass,
			);

			$this->user_m->update($user);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has change!</div>');
			redirect('mahasiswa/change_password');
		}
	}

	public function pilih_matkul()
	{
		$data = [
			'title' => 'CBIS | Pilih Mata Kuliah',
			'user' => $this->mahasiswa_m->get($this->session->userdata('id')),
			'semester' => $this->input_semester->read(),
			'login' => "mahasiswa",
		];

		$this->form_validation->set_rules('pilih', 'Pilih', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/mahasiswa/sidebar/pilih_matkul', $data);
			$this->load->view('template/sidebar/mahasiswa/topbar', $data);
			$this->load->view('mahasiswa/pilih_matkul', $data);
			$this->load->view('template/footer');
		} else {
			$id = $this->input->post('pilih');
			$data['matkul'] = $this->jadwal_dosen->select($id);

			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar/mahasiswa/sidebar/pilih_matkul', $data);
			$this->load->view('template/sidebar/mahasiswa/topbar', $data);
			$this->load->view('mahasiswa/insert_matkul', $data);
			$this->load->view('template/footer');
		}
	}

	public function masukin_jadwal()
	{
		$user = $this->mahasiswa_m->get($this->session->userdata('id'));
		if (isset($_POST['submit'])) {
			if (!empty($_POST['pilihan'])) {
				// Loop to store and display values of individual checked checkbox.
				foreach ($_POST['pilihan'] as $selected) {
					$pilihan[] =  $selected;
				}
			}
		}
		$banyak = count($pilihan);
		for ($i = 0; $i < $banyak; $i++) {
			$data['id_jadwal'] = $pilihan[$i];
			$data['nim'] = $user['nim'];
			$this->jadwal_mahasiswa->create($data);
		}
		$this->jadwal();
	}

	public function jadwal()
	{
		$data = [
			'title' => 'CBIS | Jadwal Kuliah',
			'user' => $this->mahasiswa_m->get($this->session->userdata('id')),
			'jadwal' => $this->jadwal_mahasiswa->get($this->session->userdata('id')),
			'login' => 'mahasiswa',
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar/mahasiswa/sidebar/jadwal', $data);
		$this->load->view('template/sidebar/mahasiswa/topbar', $data);
		$this->load->view('mahasiswa/jadwal', $data);
		$this->load->view('template/footer');
	}
}
