<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');

	}

    public function index(){
		$this->load->view('V_login');
	}

	public function login(){
		$email = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $email,
			'password' => md5($password)
			);
		$cek = $this->M_login->cek_login("akun",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'email' => $email,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("Homepage"));

		}else{
			echo "<script>alert('Email atau Password salah! Silahkan cek kembali');history.go(-1);</script>";	
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Homepage'));
	}

}
