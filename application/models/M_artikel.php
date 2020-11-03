<?php 

class M_artikel extends CI_Model{	

	function artikel(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->order_by('artikel.id', 'DESC'); 
	  return $query = $this->db->get()->result();
	}


  function hapus_admin($id){
      $this->db->where("id",$id);
      $this->db->delete('artikel');
    }


	function detail($id){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left'); 
	  $this->db->where("artikel.id",$id); 
	  return $query = $this->db->get()->result();
	}

  public function cari($keyword){
   
    $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
    $this->db->from('artikel'); 
    $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
    $this->db->order_by('artikel.id', 'DESC'); 

    $this->db->like('judul',$keyword);
    $this->db->or_like('penulis',$keyword);

     return $this->db->get()->result();
  }

  function tampil_komentar($id){
      $this->db->select('komentar.*, akun.*'); 
      $this->db->from('komentar'); 
      $this->db->join('akun', 'akun.username = komentar.username', 'left'); 
      $this->db->where("komentar.id_artikel",$id); 
       return $query = $this->db->get()->result();
    }

  public function input_komentar($data){
      $this->db->insert('komentar',$data);
  }

	 function penilaian_bintang($id){
    	$this->db->where("id_artikel",$id);
        return $this->db->get('laporan1')->result();
    }

   	function bintang2($id){
    	$this->db->where("id_artikel",$id);
        return $this->db->get('laporan2')->result();
    }

    function nilai3($id){
    	$this->db->where("id_artikel",$id);
        return $this->db->get('laporan3')->result();
    }

    public function update_bintang($id,$data){
		$this->db->where("id",$id);
		$this->db->update('artikel',$data);
	}

	function budaya(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->where("kategori = 'budaya'");
	  $this->db->order_by('artikel.id', 'DESC'); 
	  return $query = $this->db->get()->result();
	}

	function agama(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->where("kategori = 'agama'"); 
	  $this->db->order_by('artikel.id', 'DESC');
	  return $query = $this->db->get()->result();
	}

	function politik(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->where("kategori = 'politik'"); 
	  $this->db->order_by('artikel.id', 'DESC');
	  return $query = $this->db->get()->result();
	}

	function ekonomi(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->where("kategori = 'ekonomi'"); 
	  $this->db->order_by('artikel.id', 'DESC');
	  return $query = $this->db->get()->result();
	}

	function militer(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->where("kategori = 'militer'"); 
	  $this->db->order_by('artikel.id', 'DESC');
	  return $query = $this->db->get()->result();
	}

	function iptek(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->where("kategori = 'iptek'");
	  $this->db->order_by('artikel.id', 'DESC'); 
	  return $query = $this->db->get()->result();
	}

	function tokoh(){
       
	  $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
	  $this->db->from('artikel'); 
	  $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
	  $this->db->where("kategori = 'tokoh'"); 
	  $this->db->order_by('artikel.id', 'DESC');
	  return $query = $this->db->get()->result();
	}

    function historigrafis(){
       
    $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
    $this->db->from('artikel'); 
    $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
    $this->db->where("kategori = 'historigrafis'"); 
    $this->db->order_by('artikel.id', 'DESC');
    return $query = $this->db->get()->result();
  }

  function folklore(){
       
    $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username'); 
    $this->db->from('artikel'); 
    $this->db->join('akun', 'akun.id = artikel.id_akun', 'left');
    $this->db->where("kategori = 'folklore'"); 
    $this->db->order_by('artikel.id', 'DESC');
    return $query = $this->db->get()->result();
  }

	public function admin_artikel(){
    return $this->db->get('artikel')->result();
    }

    public function hapus_artikel($id){
    	$this->db->where("id",$id);
    	$this->db->delete('artikel');
    }		

    public function update_artikel($id,$data){
		$this->db->where("id",$id);
		$this->db->update('artikel',$data);
	}

	public function edit_artikel($id){
		$this->db->where("id",$id);
		return $this->db->get('artikel');
	}

	public function upload()
    {
        $config['upload_path']          = './foto_artikel/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 1024;

         $this->load->library('upload', $config);
         $this->upload->initialize($config);
    
        if ( !$this->upload->do_upload('foto_artikel')){
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

    function tampil_penilaian($username){
       
      $this->db->where("username",$username); 
      return $query = $this->db->get('akun')->result();
    }

    function tampil_penilaian_id($id_artikel){
       
      $this->db->select('artikel.*, akun.nama,akun.foto,akun.status,akun.username,akun.telepon,akun.email,akun.sekolah,akun.jeniskelamin'); 
      $this->db->from('artikel'); 
      $this->db->join('akun', 'akun.id = artikel.id_akun', 'left'); 
      $this->db->where("artikel.id",$id_artikel); 
      return $query = $this->db->get()->result();
    }

    function status_penilaian($id_artikel){
    	$this->db->where("id_artikel",$id_artikel);
        return $this->db->get('laporan1')->result();
    }

    function status_penilaian2($id_artikel){
    	$this->db->where("id_artikel",$id_artikel);
        return $this->db->get('laporan2')->result();
    }

    function status_penilaian3($id_artikel){
    	$this->db->where("id_artikel",$id_artikel);
        return $this->db->get('laporan3')->result();
    }

    public function soal(){
		return $this->db->get('soal')->result();
	}

	function jumlah_soal(){
        return $this->db->get('soal')->num_rows();
    }

    public function input_soal($data){
    	$this->db->insert('laporan1',$data);
    }

    public function soal2(){
		return $this->db->get('soal2')->result();
	}

	function jumlah_soal2(){
        return $this->db->get('soal2')->num_rows();
    }

    public function input_soal2($data){
    	$this->db->insert('laporan2',$data);
    }

    public function soal3(){
		return $this->db->get('soal3')->result();
	}

	function jumlah_soal3(){
        return $this->db->get('soal3')->num_rows();
    }

    public function input_soal3($data){
    	$this->db->insert('laporan3',$data);
    }

   	function download_excel(){
      $this->db->select('laporan1.*, artikel.*'); 
      $this->db->from('laporan1'); 
      $this->db->join('artikel', 'laporan1.id_artikel = artikel.id', 'left'); 
      return $query = $this->db->get()->result();
    }

    function download_excel2(){
      $this->db->select('laporan2.*, artikel.*'); 
      $this->db->from('laporan2'); 
      $this->db->join('artikel', 'laporan2.id_artikel = artikel.id', 'left'); 
      return $query = $this->db->get()->result();
    }

    function download_excel3(){
      $this->db->select('laporan3.*, artikel.*'); 
      $this->db->from('laporan3'); 
      $this->db->join('artikel', 'laporan3.id_artikel = artikel.id', 'left'); 
      return $query = $this->db->get()->result();
    }

}

?>