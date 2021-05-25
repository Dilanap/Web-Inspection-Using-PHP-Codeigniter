<?php
/**
* 
*/
class Pr extends CI_Controller 
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pr','M_A3');
	}
	
	function index(){
        if (isset($_POST['submit'])) {
			$Id_a3report		=	$this->input->post('Id_a3report');
			$Id_rincian			=	$this->input->post('Id_rincian');
			$Id_peg				=	$this->input->post('Id_peg');
			$tema	        	=	$this->input->post('tema');
			$problem_statement	=	$this->input->post('problem_statement');
			$target		        =	$this->input->post('target');
			$aliran_proses		= 	$this->input->post('aliran_proses');
            $implementasi			    =	$this->input->post('implementasi');
            $yokoten			    =	$this->input->post('yokoten');
			$status				=	'Sudah dibuat A3';
			$data 		    	= array('Id_a3report'       => $Id_a3report,
										'Id_peg'       		=> $Id_peg,
										'Id_rincian'       		=> $Id_rincian,
									    'tema' 	            => $tema,
									    'problem_statement'	=> $problem_statement,
									    'target'        	=> $target,
									    'aliran_proses' 	=> $aliran_proses,
                                        'implementasi'      => $implementasi,
                                        'yokoten'        	=> $yokoten);
										
			
			$data2				= array ('Id_a3report'  => $Id_a3report,
										 'Id_rincian'	=> $Id_rincian);
			$data3				= array ('Id_rincian' => $Id_rincian,
											'status'	    => $status);
			$this->M_A3->post($data);
			$this->M_A3->update_rincian($data2, $Id_a3report);
			$this->M_A3->update_rincian2($data3, $Id_rincian);
			redirect('Checksheet/CPAR2');
			}
		else{
			$data['kode'] 			= $this->M_pr->kode();
			$data['record'] = $this->M_A3->PR();
			//menampilkan form input
			$this->template->content->view('Pr/Form_input',$data);
			$this->template->publish();		
	 }
	 
	 function detail_pr(){
		$Id_rincian 	=$this->uri->segment(3);
		//$Id_check 	=$this->uri->segment(4);
		$data['kode'] 			= $this->M_A3->kode();
		$data['record']  =	$this->M_A3->post($Id_rincian)->result();
		$this->template->content->view('Pr/Form_input',$data);
		$this->template->publish();
	}
	function lihatdata(){
		$data['record']=$this->M_A3->tampil_pr($id);
		$this->template->content->view('A3/lihat_data',$data);
		$this->template->publish();
	}
    
	
}}