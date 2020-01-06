<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor_pricipal extends CI_Controller {

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


	      		$url=base_url();
				redirect($url);
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
		$this->load->view('v_kantor_pricipal');
	}

	public function ajax_list()
	{
		$list = $this->kantor_pricipal->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kantor_pricipal) {			
            $row[] = $no++;
			$row = array();
            $row[] = $kantor_pricipal->nobongkar;
            $row[] = $kantor_pricipal->kantor_pricipal;
            $row[] = number_format($kantor_pricipal->party,0,',','.');
            $row[] = "KG";
            $row[] = $kantor_pricipal->kapal;
            $row[] = $kantor_pricipal->tanggal;
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kantor_pricipal->count_all(),
						"recordsFiltered" => $this->kantor_pricipal->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kantor_pricipal->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'kantor_pricipal' => $this->input->post('kantor_pricipal'),
				'party' => $this->input->post('party'),
			);
		$insert = $this->kantor_pricipal->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(/*
				'kantor_pricipal' => $this->input->post('kantor_pricipal'),*/
				'party' => $this->input->post('party'),
			);
		$this->kantor_pricipal->update(array('kantor_pricipal' => $this->input->post('kantor_pricipal')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kantor_pricipal->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
