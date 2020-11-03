<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_artikel');
		$this->load->model('M_akun');
		$this->load->helper('slug');
	}

	public function detail($id)
	{
		$data['detail'] = $this->M_artikel->detail($id);
		$data['penilaian_bintang'] = $this->M_artikel->penilaian_bintang($id);
		$data['bintang'] = $this->M_artikel->bintang2($id);
		$data['nilai'] = $this->M_artikel->nilai3($id);
		$data['tampil_komentar'] = $this->M_artikel->tampil_komentar($id);
		$this->load->view('V_content',$data);
	}

    public function cari(){

    $keyword = $this->input->post('keyword');

    $data['hasil_pencarian'] =   $this->M_artikel->cari($keyword);
    $this->load->view('V_pencarian',$data);
    
  }

	public function input_komentar(){
		
		$id = $this->input->post('id');
		$id_artikel = $this->input->post('id_artikel');
		$username = $this->input->post('username');
		$komentar = $this->input->post('komentar');
		$total_komentar = $this->input->post('total_komentar');
		$tanggal_komentar = $this->input->post('tanggal_komentar');
	
		$data = array(
			
			'id_artikel' => $id_artikel,
			'username' => $username,
			'komentar' => $komentar,
			'total_komentar' => $total_komentar,
			'tanggal_komentar' => $tanggal_komentar

			);
		
			$this->M_artikel->input_komentar($data);
	
		redirect('Content/detail/'.$id_artikel);
	}

	public function hapus_artikel_profile($id)
	{
		$this->M_artikel->hapus_artikel($id);
		redirect('Homepage');
	}

	public function edit_artikel_profile($id)
	{
		$data['edit'] = $this->M_artikel->edit_artikel($id);
		$this->load->view('Content/V_editartikel',$data);
	}

	public function update_bintang(){
		
		$id = $this->input->post('id_bintang');
		$bintang = $this->input->post('bintang');
	
		$data = array(
			'bintang' => $bintang
			);
		
			$this->M_artikel->update_bintang($id,$data);
			redirect('Content/detail/'.$id);
	}

	public function tulis_artikel(){
			$upload = $this->M_artikel->upload();

			if ($upload['result'] == "success") {
            	$this->M_akun->tulis_artikel($upload);
            } else {
            	$this->M_akun->tulis_artikel($upload);
          }
		redirect('Homepage');
	}

	public function budaya()
	{
		$data['budaya'] = $this->M_artikel->budaya();
		$this->load->view('V_budaya',$data);
	}

	public function agama()
	{
		$data['agama'] = $this->M_artikel->agama();
		$this->load->view('V_agama',$data);
	}

	public function politik()
	{
		$data['politik'] = $this->M_artikel->politik();
		$this->load->view('V_politik',$data);
	}

	public function ekonomi()
	{
		$data['ekonomi'] = $this->M_artikel->ekonomi();
		$this->load->view('V_ekonomi',$data);
	}

	public function militer()
	{
		$data['militer'] = $this->M_artikel->militer();
		$this->load->view('V_militer',$data);
	}

	public function iptek()
	{
		$data['iptek'] = $this->M_artikel->iptek();
		$this->load->view('V_iptek',$data);
	}

	public function tokoh()
	{
		$data['tokoh'] = $this->M_artikel->tokoh();
		$this->load->view('V_tokoh',$data);
	}

	public function historigrafis()
	{
		$data['historigrafis'] = $this->M_artikel->historigrafis();
		$this->load->view('V_historigrafis',$data);
	}

	public function folklore()
	{
		$data['folklore'] = $this->M_artikel->folklore();
		$this->load->view('V_folklore',$data);
	}

	public function nilai($username,$id_artikel){
    	$data['penilaian'] = $this->M_artikel->tampil_penilaian($username);
    	$data['penilaian_id'] = $this->M_artikel->tampil_penilaian_id($id_artikel);
    	$data['soal'] = $this->M_artikel->soal();
    	$data['soal2'] = $this->M_artikel->soal2();
    	$data['soal3'] = $this->M_artikel->soal3();
    	$data['jumlah_soal'] = $this->M_artikel->jumlah_soal();
    	$data['jumlah_soal2'] = $this->M_artikel->jumlah_soal2();
    	$data['jumlah_soal3'] = $this->M_artikel->jumlah_soal3();
    	$data['status_penilaian'] = $this->M_artikel->status_penilaian($id_artikel);
    	$data['status_penilaian2'] = $this->M_artikel->status_penilaian2($id_artikel);
    	$data['status_penilaian3'] = $this->M_artikel->status_penilaian3($id_artikel);
		$this->load->view('V_penilaian',$data);
	}

	public function input_nilai(){
		
		$id = $this->input->post('id');
		$id_artikel = $this->input->post('id_artikel');
		$penilai = $this->input->post('penilai');
		$penulis = $this->input->post('penulis');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$sekolah = $this->input->post('sekolah');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$status = $this->input->post('status');

		$q = $this->input->post('soal0'); $w = $this->input->post('soal1'); $e = $this->input->post('soal2');$r = $this->input->post('soal3');$t = $this->input->post('soal4');$y = $this->input->post('soal5');$u = $this->input->post('soal6');$i = $this->input->post('soal7');$o = $this->input->post('soal8');$p = $this->input->post('soal9');$a = $this->input->post('soal10');$s = $this->input->post('soal11');$d = $this->input->post('soal12');$f = $this->input->post('soal13');$g = $this->input->post('soal14');$h = $this->input->post('soal15');$j = $this->input->post('soal16');$k = $this->input->post('soal17');
	
		$data = array(
			
			'id_artikel' => $id_artikel,'penilai' => $penilai,'penulis' => $penulis,'jeniskelamin' => $jeniskelamin,'sekolah' => $sekolah,'telepon' => $telepon,'email' => $email,'status_penilaian' => $status,'soal1' => $q,'soal2' => $w,'soal3' => $e,'soal4' => $r,'soal5' => $t,'soal6' => $y,'soal7' => $u,'soal8' => $i,'soal9' => $o,'soal10' => $p,'soal11' => $a,'soal12' => $s,'soal13' => $d,'soal14' => $f,'soal15' => $g,'soal16' => $h,'soal17' => $j,'soal18' => $k

			);
		
			$this->M_artikel->input_soal($data);
	
		redirect('Content/detail/'.$id_artikel);
	}

	public function input_nilai2(){
		
		$id = $this->input->post('id');
		$id_artikel = $this->input->post('id_artikel');
		$penilai = $this->input->post('penilai');
		$penulis = $this->input->post('penulis');
		$jeniskelamin = $this->input->post('jeniskelamin');
		$sekolah = $this->input->post('sekolah');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$status = $this->input->post('status');

		$q = $this->input->post('soal0');$w = $this->input->post('soal1');$e = $this->input->post('soal2');$r = $this->input->post('soal3');$t = $this->input->post('soal4');$y = $this->input->post('soal5');$u = $this->input->post('soal6');$i = $this->input->post('soal7');$o = $this->input->post('soal8');$p = $this->input->post('soal9');$a = $this->input->post('soal10');$s = $this->input->post('soal11');$d = $this->input->post('soal12');$f = $this->input->post('soal13');$g = $this->input->post('soal14');$h = $this->input->post('soal15');$j = $this->input->post('soal16');$k = $this->input->post('soal17');$l = $this->input->post('soal18');$z = $this->input->post('soal19');
	
		$data = array(
			
			'id_artikel' => $id_artikel,'penilai' => $penilai,'penulis' => $penulis,'jeniskelamin' => $jeniskelamin,'sekolah' => $sekolah,'telepon' => $telepon,'email' => $email,'status_penilaian' => $status,'soal1' => $q,'soal2' => $w,'soal3' => $e,'soal4' => $r,'soal5' => $t,'soal6' => $y,'soal7' => $u,'soal8' => $i,'soal9' => $o,'soal10' => $p,'soal11' => $a,'soal12' => $s,'soal13' => $d,'soal14' => $f,'soal15' => $g,'soal16' => $h,'soal17' => $j,'soal18' => $k,'soal19' => $l,'soal20' => $z

			);
		
			$this->M_artikel->input_soal2($data);
	
		redirect('Content/detail/'.$id_artikel);
	}

	public function input_nilai3(){
		
		$id = $this->input->post('id');
		$id_artikel = $this->input->post('id_artikel');
		$penilai = $this->input->post('penilai');
		$penulis = $this->input->post('penulis');
		$jeniskelamin = $this->input->post('jeniskelamin');
		;$sekolah = $this->input->post('sekolah');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$status = $this->input->post('status');

		$q = $this->input->post('soal0');$w = $this->input->post('soal1');$e = $this->input->post('soal2');$r = $this->input->post('soal3');$t = $this->input->post('soal4');$y = $this->input->post('soal5');$u = $this->input->post('soal6');$i = $this->input->post('soal7');$o = $this->input->post('soal8');$p = $this->input->post('soal9');$a = $this->input->post('soal10');$s = $this->input->post('soal11');$d = $this->input->post('soal12');$f = $this->input->post('soal13');$g = $this->input->post('soal14');$h = $this->input->post('soal15');$j = $this->input->post('soal16');$k = $this->input->post('soal17');
	
		$data = array(
			
			'id_artikel' => $id_artikel,'penilai' => $penilai,'penulis' => $penulis,'jeniskelamin' => $jeniskelamin,'sekolah' => $sekolah,'telepon' => $telepon,'email' => $email,'status_penilaian' => $status,'soal1' => $q,'soal2' => $w,'soal3' => $e,'soal4' => $r,'soal5' => $t,'soal6' => $y,'soal7' => $u,'soal8' => $i,'soal9' => $o,'soal10' => $p,'soal11' => $a,'soal12' => $s,'soal13' => $d,'soal14' => $f,'soal15' => $g,'soal16' => $h,'soal17' => $j,'soal18' => $k

			);
		
			$this->M_artikel->input_soal3($data);
	
		redirect('Content/detail/'.$id_artikel);
	}
}
