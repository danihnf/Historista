<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_login');
		$this->load->model('M_akun');
		$this->load->model('M_artikel');

	}

	public function index()
	{	
		$this->load->view('admin/V_login');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->M_login->cek_login_admin("admin",$where)->num_rows();
		if($cek > 0){

			$data_session = array(
				'username' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("Dashboard/admin"));

		}else{
			echo "<script>alert('Email atau Password salah! Silahkan cek kembali');history.go(-1);</script>";	
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('Dashboard'));
	}

	public function admin()
	{
		$data['jumlah_user'] = $this->M_akun->jumlah_user();
		$data['jumlah_artikel'] = $this->M_akun->jumlah_artikel();
		$this->load->view('admin/V_admin.php',$data);
	}

	public function inputuser(){
		
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		$data = array(
			
			'username' => $username,
			'password' => md5($password)

			);
		
			$this->M_akun->daftar_admin($data);
	
		redirect('Dashboard/akun');
	}

	public function update_admin(){
		
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	
		$data = array(
			
			'username' => $username,
			'password' => md5($password)

			);
		
			$this->M_akun->update_admin($id,$data);
	
		redirect('Dashboard/akun');
	}

	public function akun()
	{
		$data['admin'] = $this->M_akun->akun_admin();
		$this->load->view('admin/V_akun',$data);
	}

	public function hapus_admin($id)
	{
		$this->M_akun->hapus_admin($id);
		redirect('Dashboard/akun');
	}

	public function edit_admin($id)
	{
		$data['edit'] = $this->M_akun->edit_admin($id);
		$this->load->view('admin/V_editadmin',$data);
	}

	public function update_artikel(){
		
		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$isi = $this->input->post('isi');
		$kategori = $this->input->post('kategori');
	
		$data = array(
			
			'judul' => $judul,
			'isi' => $isi,
			'kategori' => $kategori
			);
		
			$this->M_artikel->update_artikel($id,$data);
	
		redirect('Dashboard/artikel');
	}

	public function artikel()
	{
		$data['artikel'] = $this->M_artikel->admin_artikel();
		$this->load->view('admin/V_artikel',$data);
	}

	public function hapus_artikel($id)
	{
		$this->M_artikel->hapus_artikel($id);
		redirect('Dashboard/artikel');
	}

	public function edit_artikel($id)
	{
		$data['edit'] = $this->M_artikel->edit_artikel($id);
		$this->load->view('admin/V_editartikel',$data);
	}

	public function download()
	{
		$this->load->view('admin/V_download');
	}

	function action(){

    include APPPATH.'libraries/PHPExcel/Classes/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Penailaian")
                 ->setSubject("Penilaian")
                 ->setDescription("Laporan")
                 ->setKeywords("Data Penilaian");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENILAIAN 1"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "PENILAI"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "SEKOLAH"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TELEPON"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "EMAIL"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "PENULIS"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "1"); 
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "2"); 
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "3"); 
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "4"); 
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "5"); 
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "6"); 
    $excel->setActiveSheetIndex(0)->setCellValue('N3', "7"); 
    $excel->setActiveSheetIndex(0)->setCellValue('O3', "8"); 
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "9"); 
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "10"); 
    $excel->setActiveSheetIndex(0)->setCellValue('R3', "11"); 
    $excel->setActiveSheetIndex(0)->setCellValue('S3', "12"); 
    $excel->setActiveSheetIndex(0)->setCellValue('T3', "13"); 
    $excel->setActiveSheetIndex(0)->setCellValue('U3', "14"); 
    $excel->setActiveSheetIndex(0)->setCellValue('V3', "15"); 
    $excel->setActiveSheetIndex(0)->setCellValue('W3', "16"); 
    $excel->setActiveSheetIndex(0)->setCellValue('X3', "17"); 
    $excel->setActiveSheetIndex(0)->setCellValue('Y3', "18"); 

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $penilaian = $this->M_artikel->download_excel();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($penilaian as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->penilai);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jeniskelamin);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telepon);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->email);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->penulis);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->soal1);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->soal2);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->soal3);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->soal4);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->soal5);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->soal6);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->soal7);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->soal8);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->soal9);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->soal10);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->soal11);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->soal12);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->soal13);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->soal14);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->soal15);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->soal16);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->soal17);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->soal18);

      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);

      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5); 
 
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Penilaian");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Penilaian1.xls"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

  function action2(){

    include APPPATH.'libraries/PHPExcel/Classes/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Penailaian")
                 ->setSubject("Penilaian")
                 ->setDescription("Laporan")
                 ->setKeywords("Data Penilaian");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENILAIAN 2"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "PENILAI"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "SEKOLAH"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TELEPON"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "EMAIL"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "PENULIS"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "1"); 
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "2"); 
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "3"); 
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "4"); 
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "5"); 
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "6"); 
    $excel->setActiveSheetIndex(0)->setCellValue('N3', "7"); 
    $excel->setActiveSheetIndex(0)->setCellValue('O3', "8"); 
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "9"); 
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "10"); 
    $excel->setActiveSheetIndex(0)->setCellValue('R3', "11"); 
    $excel->setActiveSheetIndex(0)->setCellValue('S3', "12"); 
    $excel->setActiveSheetIndex(0)->setCellValue('T3', "13"); 
    $excel->setActiveSheetIndex(0)->setCellValue('U3', "14"); 
    $excel->setActiveSheetIndex(0)->setCellValue('V3', "15"); 
    $excel->setActiveSheetIndex(0)->setCellValue('W3', "16"); 
    $excel->setActiveSheetIndex(0)->setCellValue('X3', "17"); 
    $excel->setActiveSheetIndex(0)->setCellValue('Y3', "18"); 
    $excel->setActiveSheetIndex(0)->setCellValue('Z3', "19"); 
    $excel->setActiveSheetIndex(0)->setCellValue('AA3', "20"); 

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('AA3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $penilaian = $this->M_artikel->download_excel2();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($penilaian as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->penilai);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jeniskelamin);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telepon);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->email);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->penulis);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->soal1);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->soal2);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->soal3);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->soal4);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->soal5);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->soal6);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->soal7);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->soal8);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->soal9);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->soal10);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->soal11);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->soal12);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->soal13);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->soal14);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->soal15);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->soal16);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->soal17);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->soal18);
      $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->soal19);
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->soal20);

      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);

      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(5); 
 
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Penilaian");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Penilaian2.xls"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

    function action3(){

    include APPPATH.'libraries/PHPExcel/Classes/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Penailaian")
                 ->setSubject("Penilaian")
                 ->setDescription("Laporan")
                 ->setKeywords("Data Penilaian");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENILAIAN 3"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3', "PENILAI"); // Set kolom B3 dengan tulisan "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3', "SEKOLAH"); // Set kolom C3 dengan tulisan "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3', "JENIS KELAMIN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
    $excel->setActiveSheetIndex(0)->setCellValue('E3', "TELEPON"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3', "EMAIL"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "PENULIS"); // Set kolom E3 dengan tulisan "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "1"); 
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "2"); 
    $excel->setActiveSheetIndex(0)->setCellValue('J3', "3"); 
    $excel->setActiveSheetIndex(0)->setCellValue('K3', "4"); 
    $excel->setActiveSheetIndex(0)->setCellValue('L3', "5"); 
    $excel->setActiveSheetIndex(0)->setCellValue('M3', "6"); 
    $excel->setActiveSheetIndex(0)->setCellValue('N3', "7"); 
    $excel->setActiveSheetIndex(0)->setCellValue('O3', "8"); 
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "9"); 
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "10"); 
    $excel->setActiveSheetIndex(0)->setCellValue('R3', "11"); 
    $excel->setActiveSheetIndex(0)->setCellValue('S3', "12"); 
    $excel->setActiveSheetIndex(0)->setCellValue('T3', "13"); 
    $excel->setActiveSheetIndex(0)->setCellValue('U3', "14"); 
    $excel->setActiveSheetIndex(0)->setCellValue('V3', "15"); 
    $excel->setActiveSheetIndex(0)->setCellValue('W3', "16"); 
    $excel->setActiveSheetIndex(0)->setCellValue('X3', "17"); 
    $excel->setActiveSheetIndex(0)->setCellValue('Y3', "18"); 

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_col);

    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $penilaian = $this->M_artikel->download_excel3();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($penilaian as $data){ // Lakukan looping pada variabel siswa
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->penilai);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->sekolah);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->jeniskelamin);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->telepon);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->email);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->penulis);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->soal1);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->soal2);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->soal3);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->soal4);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->soal5);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->soal6);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->soal7);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->soal8);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->soal9);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->soal10);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->soal11);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->soal12);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->soal13);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->soal14);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->soal15);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->soal16);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->soal17);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->soal18);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); 
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15); 
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(5); 
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5); 
 
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Laporan Data Penilaian");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Penilaian3.xls"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

}
