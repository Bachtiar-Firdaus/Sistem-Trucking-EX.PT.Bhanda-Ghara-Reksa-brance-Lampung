<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau_pricipal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pricipal','pricipal');
	}

	public function index()
	{
		
			if($this->session->userdata('akses')!='1'){
			if($this->session->userdata('akses')!='3'){
	      		if ($this->session->userdata('akses')!='2') {
	      			if ($this->session->userdata('akses')!='4') {
	      				if ($this->session->userdata('akses')!='5') {
	      					if ($this->session->userdata('akses')!='6') {
	      						if ($this->session->userdata('akses')!='7') {
	      							if ($this->session->userdata('akses')!='8') {
	      								if ($this->session->userdata('akses')!='9') {
	      								if ($this->session->userdata('akses')!='10') {


	      		$url=base_url();
				redirect($url);
	      	}
	    }
	}
	}
}
}
}}
}
}
	    
		$this->load->helper('url');
		$this->load->view('menu');
		$this->load->view('v_pantau_pricipal');
	}

	public function ajax_list()
	{
		$list = $this->pantau_pricipal->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pantau_pricipal) {			
            $row[] = $no++;
			$row = array();
            $row[] = $pantau_pricipal->nobongkar;
            $row[] = $pantau_pricipal->pantau_pricipal;
            $row[] = number_format($pantau_pricipal->party,0,',','.');
            $row[] = "KG";
            $row[] = $pantau_pricipal->kapal;
            $row[] = $pantau_pricipal->tanggal;
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pantau_pricipal->count_all(),
						"recordsFiltered" => $this->pantau_pricipal->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->pantau_pricipal->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'pantau_pricipal' => $this->input->post('pantau_pricipal'),
				'party' => $this->input->post('party'),
			);
		$insert = $this->pantau_pricipal->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(/*
				'pantau_pricipal' => $this->input->post('pantau_pricipal'),*/
				'party' => $this->input->post('party'),
			);
		$this->pantau_pricipal->update(array('pantau_pricipal' => $this->input->post('pantau_pricipal')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->pantau_pricipal->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
