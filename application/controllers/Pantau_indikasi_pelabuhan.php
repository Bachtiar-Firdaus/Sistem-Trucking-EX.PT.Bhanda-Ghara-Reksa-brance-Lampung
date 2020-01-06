<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau_indikasi_pelabuhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		
		
		$this->load->model('m_pantau_indikasi_pelabuhan');


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

        $data['indikasi'] = $this->m_pantau_indikasi_pelabuhan->getindikasi(); 
		$this->load->view('v_pantau_indikasi_pelabuhan',$data);
		
	}

	

}
