<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_artikel');
		$this->load->model('M_akun');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('slug');
	}

	public function index()
	{
		$data['artikel'] = $this->M_artikel->artikel();
		$this->load->view('V_homepage',$data);
	}

	public function menulis($username)
	{
		$data['profile'] = $this->M_akun->profile_akun($username);
		$this->load->view('V_menulis',$data);
	}

	public function aksi_upload(){
		$config['upload_path']          = './assets/artikel';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 1000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('v_upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('v_upload_sukses', $data);
		}
	}

}
