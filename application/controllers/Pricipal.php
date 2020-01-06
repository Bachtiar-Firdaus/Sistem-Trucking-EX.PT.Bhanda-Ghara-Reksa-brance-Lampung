<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pricipal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('m_pricipal','pricipal');
	}

	public function index()
	{
		if($this->session->userdata('akses')!='3'){
      	$url=base_url();
		redirect($url);
    
}
		$this->load->helper('url');
		$this->load->view('menu');
		$this->load->view('v_pricipal');
	}

	public function ajax_list()
	{
		$list = $this->pricipal->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pricipal) {			
            $row[] = $no++;
			$row = array();
            $row[] = $pricipal->nobongkar;
            $row[] = $pricipal->pricipal;
            $row[] = number_format($pricipal->party,0,',','.');
            $row[] = "KG";
            $row[] = $pricipal->kapal;
            $row[] = $pricipal->jenispupuk;
            $row[] = $pricipal->tanggal;
            $row[] = $pricipal->keterangan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pricipal('."'".$pricipal->nobongkar."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pricipal('."'".$pricipal->nobongkar."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pricipal->count_all(),
						"recordsFiltered" => $this->pricipal->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->pricipal->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nobongkar' => $this->input->post('nobongkar'),
				'pricipal' => $this->input->post('pricipal'),
				'party' => $this->input->post('party'),
				'kapal' => $this->input->post('kapal'),
				'jenispupuk' => $this->input->post('jenispupuk'),
				'tanggal' => $this->input->post('tanggal'),
				'keterangan' => "BELUM BONGKAR",
			);
		$insert = $this->pricipal->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nobongkar' => $this->input->post('nobongkar'),
				'pricipal' => $this->input->post('pricipal'),
				'party' => $this->input->post('party'),
				'kapal' => $this->input->post('kapal'),
				'jenispupuk' => $this->input->post('jenispupuk'),
				'tanggal' => $this->input->post('tanggal'),
			);
		$this->pricipal->update(array('nobongkar' => $this->input->post('nobongkar')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->pricipal->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
