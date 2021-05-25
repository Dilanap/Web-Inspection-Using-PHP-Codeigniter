<?php
class A3 extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pr');
	}
	
	function index(){
		$data['record']=$this->M_pr->lihat_data();
		$this->template->content->view('A3/lihat_data',$data);
		$this->template->publish();
    }
    function Tampil_report_masuk(){
		$data['record']			= $this->M_pr->Tampil_report_masuk();
		$data['r_status']		= $this->M_pr->status_report();
		$this->template->content->view('A3/lihat_data1',$data);
		$this->template->publish();	
	}
	function ubah_status($id){
		$this->M_pr->ubah_status($id);
		redirect('A3/lihat_data1');

	}
	function lihat_data(){
		$data['record'] = $this->M_pr->tampilkan_data();
		$this->template->content->view('A3/lihat_status',$data);
		$this->template->publish();
	
}