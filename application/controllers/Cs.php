<?php
/**
* 
*/
class Cs extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model(array('M_cs','M_part','M_jadwal'));
	}
	function index(){
			if (isset($_POST['submit'])) {
			$Id_jadwal		=	$this->input->post('Id_jadwal');
			$Id_part		=	$this->input->post('Id_part');
			$remark			=	$this->input->post('remark');
			$data 			= array('Id_jadwal' => $Id_jadwal,
									'Id_part' 	=> $Id_part,
									'remark'	=> $remark);
			$this->M_cs->simpan_cs_detail($data);
			redirect('cs');
			}
		else{
			$data['kode'] 			= $this->M_cs->kode();	
			$data['barang_jadi'] 	= $this->M_part->lihat_data()->result();
			$data['tb_inspeksi'] = $this->M_cs->get_inspeksi()->result();
			$data['jadwal']			= $this->M_jadwal->lihat_data()->result();
			$data['detail'] 		= $this->M_cs->tampilkan_cs();
			//menampilkan form input
			$this->template->content->view('Cs/Form_input',$data);
			$this->template->publish();	
     }
    }
	
	
	function Tampil_cs(){
		$data['record']			= $this->M_cs->Tampil_cs();
		$data['barang_jadi']		= $this->M_part->lihat_data()->result();
		
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('Cs/Tampil_cs',$data);
		$this->template->publish();	
	}
	
	function Tampil_cs_masuk(){
		$data['record']			= $this->M_cs->Tampil_cs_masuk();
		$data['barang_jadi']	= $this->M_part->lihat_data()->result();
		
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('Cs/Tampil_cs',$data);
		$this->template->publish();	
	}
	
	function Tampil_cs_receipt(){
		$data['record']			= $this->M_cs->Tampil_cs_receipt();
		$data['barang_jadi']	= $this->M_part->lihat_data()->result();
		
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('Cs/Tampil_cs_receipt',$data);
		$this->template->publish();	
	}
	
	function inspeksi1(){
		$data['tb_inspeksi'] = $this->M_cs->get_inspeksi()->result();
		$this->load->view('Cs/form_input', $data);
	}
	function inspeksi_d(){
		$id = $this->input->post('id',TRUE);
		$data = $this->M_cs->inspeksi($id)->result();
		echo json_encode($data);
	}

	
	function lihat_data_ok(){
		$data['record']		= $this->M_cs->Tampil_cs_ok();
		$data['kode']		= $this->M_cs->kode();
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('Cs/lihat_data',$data);
		$this->template->publish();
	}
	
	//untuk part yang ng
	function lihat_data(){
		$data['record']		= $this->M_cs->Tampil_cs();
		$data['kode']		= $this->M_cs->kode();
		$data['total'] = $this->M_cs->hitung_rejeck();
		//$data['total_ng'] = $this->M_cs->hitungJumlahNG();
		//$data['b']			= $this->M_cs->Tampil_rejeck();
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('Cs/lihat_data1',$data);
		$this->template->publish();
	}
	
	function lihat_data_cpar(){
		$data['record']		= $this->M_cs->Tampil_cpar();
		$data['kode']		= $this->M_cs->kode();
		$data['total'] = $this->M_cs->hitung_rejeck();
		//$data['total_ng'] = $this->M_cs->hitungJumlahNG();
		//$data['b']			= $this->M_cs->Tampil_rejeck();
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('Cpar/lihat_cpar',$data);
		$this->template->publish();
	}

	function selesai(){
		$hasilkode = $this->M_cs->kode();
		$this->M_cs->simpan_cs($hasilkode);
		$this->M_cs->selesai($hasilkode);
		redirect('cs/lihat_data');
	
}

	function hapusitem(){
		  $id = $this->uri->segment(3);
		  $this->M_cs->hapusitem($id);
		  redirect('cs');
	}
	//menampilkan tabel detail dgn klik tombol detail
	//tampilan detail untuk customer
	function tampil_detail1(){

		$id_check 	=$this->uri->segment(3);
		//$data['kode'] 			= $this->M_do->kode();
		$data['record']  =	$this->M_cs->detail2($Id_check)->result();
		$data['record2'] =	$this->M_cs->detail($Id_check)->row_array();
		$data['record3'] =	$this->M_cs->detail2($Id_check)->row_array();
		$this->template->content->view('Cs/detail',$data);
		$this->template->publish();

	}
	function status(){
		$Id_detailcs 	=$this->uri->segment(3);
		$this->M_cs->status($Id_detailcs);
		redirect('Cs/Tampil_cs');
	}
	
	function edit (){
		if (isset($_POST['submit'])) {
			$Id_detailcs	=	$this->input->post('Id_detailcs');
			$Id_check	=	$this->input->post('Id_check');
			$id_pengguna	=	$this->input->post('id_pengguna');
			$Id_part	=	$this->input->post('Id_part');
			$st_item		=	$this->input->post('st_item');
			$tgl_kirim		=	$this->input->post('tgl_kirim');
			$method		=	$this->input->post('metode');
	
			$data 			=	array('Id_detailcs'=>$Id_detailcs,
										'Id_check'=>$Id_check,
										'id_pengguna'=>$id_pengguna,
										'Id_part'=>$Id_part,
										'st_item'=>$st_item,
										'tgl_kirim'=>$tgl_kirim,
										'metode'=>$method);
			
			$this->M_cs->edit($data,$Id_detailcs);
			redirect('Cs');
		}
		else {
			$id 				= $this->uri->segment(3);
		$data['record'] 	= $this->M_cs->tampilkan_detail_id($id)->row_array();
		$data['barang_jadi'] 	= $this->M_part->lihat_data()->result();
		$this->template->content->view('Cs/Form_edit',$data);
		$this->template->publish();
		}
	}
	

	function update(){
		$Id_detailcs	= $this->input->post('Id_detailcs');
		$Id_part 					= $this->input->post('Id_part');
		$st_item 				= $this->input->post('st_item');
		$method				= $this->input->post('method');
		$data 					= array('Id_detailcs' => $Id_detailcs,
										'Id_part' => $Id_part,
										'st_item' => $st_item, 
										'method' => $method,
										'Id_part' => $Id_part);
		$this->M_cs->update($data,$Id_detailcs);
		redirect('cs/lihat_data');

	}
	//menghapus data ditabel po
	function hapuscs(){
	  $Id_detailcs = $this->uri->segment(3);
			$Id_check = $this->uri->segment(4);
			$this->M_cs->hapuscs($Id_detailcs,$Id_check);
	  redirect('cs/lihat_data');
	}

}