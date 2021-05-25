<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

      function __construct(){

            parent::__construct();

            $this->load->model('M_jadwal');

      }

     

      public function index(){

            $x['data']=$this->M_jadwal->lihat_data();

            $this->template->content->view('v_jadwal',$x);
            $this->template->publish();

            
      }

}