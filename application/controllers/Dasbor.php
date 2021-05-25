<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	
	// Index login
	public function index() {
		$data = array(	'title'	=> 'Halaman Dasbor',
						'isi'	=> 'dasbor_view');
		$this->load->view('layout/wrapper',$data);
	}
	
	// Fungsi lain
	
}