<?php 

class M_akun extends CI_Model{	
	
	public function daftar($data){
    	$this->db->insert('akun',$data);
    }

    public function daftar_admin($data){
    	$this->db->insert('admin',$data);
    }

    public function akun_admin(){
    	return $this->db->get('admin')->result();
    }

	public function edit_admin($id){
		$this->db->where("id",$id);
		return $this->db->get('admin');
	}

    public function hapus_admin($id){
    	$this->db->where("id",$id);
    	$this->db->delete('admin');
    }

    public function update_admin($id,$data){
		$this->db->where("id",$id);
		$this->db->update('admin',$data);
	}

    function jumlah_user(){
        return $this->db->get('akun')->num_rows();
    }

    function jumlah_artikel(){
        return $this->db->get('artikel')->num_rows();
    }

    function profile($username){
       
      $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username,akun.email,akun.alamat,akun.password,akun.sekolah,akun.telepon,akun.lahir,akun.jeniskelamin'); 
      $this->db->from('artikel'); 
      $this->db->join('akun', 'akun.id = artikel.id_akun', 'left'); 
      $this->db->where("akun.username",$username); 
      return $query = $this->db->get()->result();
    }

    public function profile_akun($username){
        $this->db->where("username",$username);
        return $this->db->get('akun')->result();
    }

    public function profile_akunid($id){
        $this->db->where("id",$id);
        return $this->db->get('akun')->result();
    }

    public function update_profile($id,$data){
        $this->db->where("id",$id);
        $this->db->update('akun',$data);
    }

    public function tulis_artikel($upload){
        $id = $this->input->post('id');
        $id_akun = $this->input->post('id_akun');
        $penulis = $this->input->post('penulis');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $isi = $this->input->post('isi');
        $tgl_buat = $this->input->post('tgl_buat');
    
        $data = array(
            'id_akun' => $id,
            'penulis' => $penulis,
            'foto_artikel' => $upload['file']['file_name'],
            'judul' => $judul,
            'isi' => $isi,
            'kategori' => $kategori,
            'tgl_buat' => $tgl_buat
            );
        $this->db->insert('artikel',$data);
    }

    public function update_profiles($id,$upload){

        $this->db->where('id', $id);
        
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
            'password' => md5($password),
            'foto' => $upload['file']['file_name']
            );
        
            $this->db->update('akun',$data);
    
        redirect('Homepage');
    }

    public function upload()
    {
        $config['upload_path']          = './foto/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10240;

         $this->load->library('upload', $config);
         $this->upload->initialize($config);
    
        if ( !$this->upload->do_upload('foto')){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            $return = array(
                'result' => 'failed',
                'error' => $this->upload->display_errors(),
                'file' => $this->upload->data()
            );
        }else{
            $data = array('upload_data' => $this->upload->data());
            $return = array(
                'result' => 'succcess',
                'file' => $this->upload->data(),
            );
            return $return;
        }

    }
}

?>