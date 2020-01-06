<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
    $this->load->helper('url');
    $this->load->view('menu');
    $this->load->model('m_chart');
  }

  function index(){
    $data['graph'] = $this->m_chart->graph();
    $data['graph1'] = $this->m_chart->graphbag1();
    $data['graph2'] = $this->m_chart->graphbag2();
    $data['graph10'] = $this->m_chart->graphbag10();
    $data['graph20'] = $this->m_chart->graphbag20();
    $data['graph30'] = $this->m_chart->graphbag30();
    $data['graph40'] = $this->m_chart->graphbag40();
    $data['graph50'] = $this->m_chart->graphbag50();
    $data['graph60'] = $this->m_chart->graphbag60();
    $data['graphbag11'] = $this->m_chart->graphbag11();
    $data['graphbag21'] = $this->m_chart->graphbag21();
    $data['graphbag31'] = $this->m_chart->graphbag31();
    $data['graphbag41'] = $this->m_chart->graphbag41();
    $data['graphbag51'] = $this->m_chart->graphbag51();
    $data['graphbag61'] = $this->m_chart->graphbag61();


    $data['gra2ph2'] = $this->m_chart->graph2bag2();
    $data['gra2ph22'] = $this->m_chart->graph2bag22();
    $data['gra2ph222'] = $this->m_chart->graph2bag222();
    $this->load->view('v_chart', $data);
  }

  function data_mahasiswa(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
      $this->load->view('v_pelabuhan');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }

  }

  function input_nilai(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='2'){
      $this->load->view('v_input_nilai');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }

  function krs(){
    // function ini hanya boleh diakses oleh admin dan mahasiswa
    if($this->session->userdata('akses')=='3'){
      $this->load->view('v_krs');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
  function lhs(){
    // function ini hanya boleh diakses oleh admin dan mahasiswa
    if($this->session->userdata('akses')=='3'){
      $this->load->view('v_lhs');
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
  }
}
