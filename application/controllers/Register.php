<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_akun');

	}

	public function index()
	{
		$this->load->view('V_register');
	}

	public function daftar(){
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$status = $this->input->post('status');
		$sekolah = $this->input->post('sekolah');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$lahir = $this->input->post('lahir');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$password = $this->input->post('password');
			$lahir2 = date('Y-m-d', strtotime($lahir));
	
		$data = array(
			
			'nama' => $nama,
			'username' => $username,
			'status' => $status,
			'sekolah' => $sekolah,
			'email' => $email,
			'telepon' => $telepon,
			'lahir' => $lahir2,
			'jeniskelamin' => $jeniskelamin,
			'password' => md5($password)

			);
		
			$this->M_akun->daftar($data);
	
		redirect('Login');
	}
}
