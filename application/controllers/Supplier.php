<?php
/**
* 
*/
class Supplier extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_supplier');
	}
	function index()
	{
		$data['record']	=	$this->M_supplier->lihat_data();
		$data['kode'] 	= 	$this->M_supplier->kode();
		$this->template->content->view('Supplier/lihat_data',$data);
		$this->template->publish();
	}
	function post(){
		if (isset($_POST['submit'])) {
			$id_supplier	=	$this->input->post('id_supplier');
			$nama_supplier	=	$this->input->post('nama_supplier');
			$email			=	$this->input->post('email');
			$telepon		= 	$this->input->post('telepon');
			$alamat			= 	$this->input->post('alamat');
			$data 			=	array('id_supplier'=>$id_supplier,
										'nama_supplier'=>$nama_supplier,
										'email'=>$email,
										'telepon'=>$telepon,
										'alamat'=>$alamat);
			$this->M_supplier->post($data);
			redirect('Supplier');
		}
		else {
			$this->template->content->view('Supplier/form_input');
			$this->template->publish();
		}
	}
	function edit (){
		if (isset($_POST['submit'])) {
			$id_supplier	=	$this->input->post('id_supplier');
			$nama_supplier	=	$this->input->post('nama_supplier');
			$email			=	$this->input->post('email');
			$telepon		= 	$this->input->post('telepon');
			$alamat			= 	$this->input->post('alamat');
			$data 			=	array('id_supplier'=>$id_supplier,
										'nama_supplier'=>$nama_supplier,
										'email'=>$email,
										'telepon'=>$telepon,
										'alamat'=>$alamat);
			
			$this->M_supplier->edit($data,$id_supplier);
			redirect('Supplier');
		}
		else {
			$id=	$this->uri->segment(3);
			$this->load->model('M_supplier');
			$data['Supplier']=	$this->M_supplier->lihat_data()->result();
			$data['record']=	$this->M_supplier->get_one($id)->row_array();
			$this->template->content->view('Supplier/form_edit',$data);
			$this->template->publish();
		}
	}
	function delete (){
			$id=	$this->uri->segment(3);
			$this->M_supplier->delete($id);
			redirect('Supplier');
}
}