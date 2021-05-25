<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Filter extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    
    $this->load->model('M_laporan');
  }
  
  public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'Filter/cetak?filter=1&tahun='.$tgl;
                $transaksi = $this->M_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di M_laporan
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'Filter/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->M_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di M_laporan
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'Filter/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->M_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di M_laporan
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'Filter/cetak';
            $transaksi = $this->M_laporan->view_all(); // Panggil fungsi view_all yang ada di M_laporan
        }
        
    $data['ket'] = $ket;
    $data['url_cetak'] = base_url('index.php/'.$url_cetak);
    $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->M_laporan->option_tahun();
   $this->template->content->view('view',$data);
		$this->template->publish(); 
  }
  
  public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->M_laporan->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di M_laporan
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->M_laporan->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di M_laporan
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->M_laporan->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di M_laporan
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->M_laporan->view_all(); // Panggil fungsi view_all yang ada di M_laporan
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        
    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Transaksi.pdf', 'D');
  }
}