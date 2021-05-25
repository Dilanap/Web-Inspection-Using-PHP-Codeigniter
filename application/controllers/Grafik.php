<?php
class Grafik extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_grafik');
    }
    function index(){
        $x['data']=$this->M_grafik->get_data_stok();
        $this->load->view('V_grafik',$x);
    }
}