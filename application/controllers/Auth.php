<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index()
	{
		$data = array(
			'title' => 'CBIS | Login',
		);

		$this->form_validation->set_rules('id', 'ID', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('auth/login', $data);
		} else {
			$this->login();
		}
	}

	private function login()
	{
		$id = $this->input->post('id');
		$password = $this->input->post('password');

		$query = $this->user_m->get($id);

		if ($query) {
			if (password_verify($password, $query['password'])) {
				if ($query['level'] == 'Admin') {
					$data = [
						'id' => $query['id'],
						'level' => $query['level']
					];
					$this->session->set_userdata($data);
					redirect('admin');
				} else if ($query['level'] == 'Mahasiswa') {
					$data = [
						'id' => $query['id'],
						'level' => $query['level']
					];
					$this->session->set_userdata($data);
					redirect('mahasiswa');
				} else {
					$data = [
						'id' => $query['id'],
						'level' => $query['level']
					];
					$this->session->set_userdata($data);
					redirect('dosen');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">ID is not exist!</div>');
			redirect('auth');
		}
	}

	public function logout(){
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('level');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You have logout!</div>');
		redirect('auth');		
	}
}
