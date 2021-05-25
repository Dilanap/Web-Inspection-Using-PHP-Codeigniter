<?php
/**
* 
*/
class Login extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pegawai');
	}
	
	function index()
	{
		$this->load->view('tampilan_depan');
	}
	
	

}