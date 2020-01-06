<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	function index()
		{
			if($this->session->userdata('akses')!='10'){
	      	$url=base_url();
			redirect($url);
	    }
		$this->load->view('menu');
		$this->load->view('v_pantau');
	}
}