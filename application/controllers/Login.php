<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model'); //load model
	}

	//fungsi index
	public function index()
	{
		$this->load->view('login/login'); //load view
	}

	//fungsi login 
	public function login()
	{
		//validasi form
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		//akhir validasi form

		if ($this->form_validation->run() == false) { //jika validasi gagal
			redirect(base_url());
		} else { //jika validasi berhasil
			$this->validationLogin();
		}
	}

	//fungsi untuk validasi login
	public function validationLogin()
	{
		$email = $this->input->post('username'); //ambil value dari form
		$password = $this->input->post('password'); //ambil value dari form
		$user = $this->login_model->getuser($email); //ambil data user
		
		$data["user"] = $user;
		if ($user) { //jika data user ada
			$saved_password = password_hash($user['user_password'], PASSWORD_DEFAULT);
			if (password_verify($password, $saved_password)) { //cek kecocokan password

				//set session
				$_SESSION["login"] = true;
				$_SESSION["staff_user"] = $email;
			
				//akhir set session
				
				$this->session->set_flashdata('status-login', 'Berhasil');

				if ($user["login"] == "true") { //jika yang login C-Level
					redirect(base_url('index.php/home/home/') . $email);
				} else {
					redirect(base_url('index.php/home/home/') . $email);
				}
			} else {
				redirect(base_url());
			}
		} else {
			redirect(base_url());
		}
	}
}
