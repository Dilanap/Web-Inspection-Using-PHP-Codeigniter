<?php 
class Laporan extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model(array('M_laporan','M_part','M_pegawai'));
	}

	

    function pemeriksaan(){
    	$bulan = $this->input->post('bulan');
    	$tahun = $this->input->post('tahun');    	
    	$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;    		
		$data['record'] = $this->M_laporan-> laporan_pemeriksaan($bulan,$tahun); 
		$this->template->content->view('laporan/laporan_pemeriksaan',$data);
		$this->template->publish(); 
	}
	

	function cetakpemeriksaan(){
    	$bulan = $this->uri->segment(3);
      	$tahun = $this->uri->segment(4);  	
 		$data_bulan = array('1' => 'JANUARI', 
 			'2' => 'FEBRUARI',
 			'3' => 'MARET', 
 			'4' => 'APRIL', 
 			'5' => 'MEI', 
 			'6' => 'JUNI', 
 			'7' => 'JULI', 
 			'8' => 'AGUSTUS', 
 			'9' => 'SEPTEMBER', 
 			'10' => 'OKTOBER' , 
 			'11' => 'NOVEMBER', 
 			'12' => 'DESEMBER');
  
    	$data['bulan'] = $data_bulan[$bulan];	
		$data['record'] = $this->M_laporan->laporan_pemeriksaan($bulan,$tahun); 
		$this->load->view('laporan/cetak_pemeriksaan',$data);
		
	}
	
	
	


}