<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau_indikasi_timbangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		
		
		$this->load->model('m_pantau_indikasi_timbangan');


	}

	public function index()
	{
		if($this->session->userdata('akses')!='10'){
		if($this->session->userdata('akses')!='3'){
      	$url=base_url();
		redirect($url);
    }
}

		$this->load->helper('url');
		$this->load->view('menu');

        $data['indikasi1'] = $this->m_pantau_indikasi_timbangan->getindikasi1(); 
        $data['indikasi2'] = $this->m_pantau_indikasi_timbangan->getindikasi2(); 
        $data['indikasi3'] = $this->m_pantau_indikasi_timbangan->getindikasi3(); 
        $data['indikasi4'] = $this->m_pantau_indikasi_timbangan->getindikasi4(); 
        $data['indikasi5'] = $this->m_pantau_indikasi_timbangan->getindikasi5(); 
        $data['indikasi6'] = $this->m_pantau_indikasi_timbangan->getindikasi6(); 
		$this->load->view('v_pantau_indikasi_timbangan',$data);
		
	}

	

}
