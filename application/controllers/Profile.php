<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_akun');
		$this->load->helper(array('form', 'url'));

	}

    public function detail($username){
    	$data['profile'] = $this->M_akun->profile($username);
    	$data['akun'] = $this->M_akun->profile_akun($username);
		$this->load->view('V_profile',$data);
	}

	public function edit($id){
		$data['profile'] = $this->M_akun->profile_akunid($id);
		$this->load->view('V_editprofile',$data);
	}

	public function update_profile(){
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$sekolah = $this->input->post('sekolah');
		$email = $this->input->post('email');
		$telepon = $this->input->post('telepon');
		$alamat = $this->input->post('alamat');
		$password = $this->input->post('password');

		$data = array(
			
			'nama' => $nama,
			'sekolah' => $sekolah,
			'email' => $email,
			'telepon' => $telepon,
			'alamat' => $alamat,
			'password' => md5($password)

			);
		
			$this->M_akun->update_profile($id,$data);
	
		redirect('Homepage');
	}

	public function update($id)
    {
            $upload = $this->M_akun->upload();
            if ($upload['result'] == "success") {
            	$this->M_akun->update_profiles($id, $upload);
            } else {
            	$this->M_akun->update_profiles($id, $upload);
            }
    }

}
