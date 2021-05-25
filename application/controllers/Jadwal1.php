<?php
/**
* 
*/
class Jadwal1 extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_jadwal1');
	}
	
	function index(){
		$data['record']=$this->M_jadwal1->lihat_data();
		$this->template->content->view('Jadwal1/lihat_data',$data);
		$this->template->publish();
	}

function post(){

		if (isset($_POST['submit'])) {

			$Id_jadwal	=	$this->input->post('Id_jadwal');
			$type_unit		=	$this->input->post('type_unit');
			$sequence			=	$this->input->post('sequence');
			$no_chasis			=	$this->input->post('no_chasis');
			$warna		 	= 	$this->input->post('warna');
			$data 				=	array('Id_jadwal' =>$Id_jadwal,
				                       'type_unit'=>$type_unit,
										'sequence'=>$sequence,
										'no_chasis'=>$no_chasis,
										'warna'=>$warna);
			
			$this->M_jadwal1->post($data);
		
			redirect('Jadwal1');
		}
		else {
			$this->template->content->view('Jadwal1/form_input');

			$this->template->publish();
		}
	}

function edit (){
		if (isset($_POST['submit'])) {

			$Id_jadwal		=	$this->input->post('Id_jadwal');
			$type_unit		=	$this->input->post('type_unit');
			$sequence			=	$this->input->post('sequence');
			$no_chasis			=	$this->input->post('no_chasis');
			$warna		 	= 	$this->input->post('warna');
			$data 				=	array('Id_jadwal'=>$Id_jadwal,
										'type_unit'=>$type_unit,
										'sequence'=>$sequence,
										'no_chasis'=>$no_chasis,
										'warna'=>$warna);
			
			$this->M_jadwal1->edit($data,$Id_jadwal);
			redirect('Jadwal1');
		}
		else {
			$Id=	$this->uri->segment(3);
			$this->load->model('M_jadwal1');
			$data['Jadwal1']=	$this->M_jadwal1->lihat_data()->result();
			$data['record']=	$this->M_jadwal1->get_one($Id)->row_array();
			$this->template->content->view('Jadwal1/Form_edit',$data);
			$this->template->publish();
		}
	}
function delete (){
			$Id=	$this->uri->segment(3);
			$this->M_jadwal1->delete($Id);
			redirect('Jadwal1');
	}
}