<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau_pelabuhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		
		
		$this->load->model('m_pantau_pelabuhan','pantau_pelabuhan');
		$this->load->model('m_pricipal');


	}

	public function index()
	{
		if($this->session->userdata('akses')!='10'){
      	$url=base_url();
		redirect($url);
    }

		$this->load->helper('url');
		$this->load->view('menu');

        $data['pricipal'] = $this->m_pricipal->getpricipal(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_pantau_pelabuhan',$data);
		
	}

	public function ajax_list()
	{

		$list = $this->pantau_pelabuhan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pantau_pelabuhan) {			
            $row[] = $no++;
			$row = array();
            $row[] = $pantau_pelabuhan->nourut;
            $row[] = $pantau_pelabuhan->nobongkar;
            $row[] = $pantau_pelabuhan->nosuratjalan;
            $row[] = $pantau_pelabuhan->nopolisi;
            $row[] = $pantau_pelabuhan->namasupir;
            $row[] = $pantau_pelabuhan->tujuangudang;
            $row[] = $pantau_pelabuhan->pricipal;
            $row[] = number_format($pantau_pelabuhan->party,0,',','.');
            $row[] = "KG";
            $row[] = $pantau_pelabuhan->jenispupuk;
            $row[] = $pantau_pelabuhan->tanggal;
            $row[] = $pantau_pelabuhan->brangkat;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_pantau_pelabuhan('."'".$pantau_pelabuhan->nosuratjalan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pantau_pelabuhan('."'".$pantau_pelabuhan->nosuratjalan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pantau_pelabuhan->count_all(),
						"recordsFiltered" => $this->pantau_pelabuhan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->pantau_pelabuhan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		date_default_timezone_set("Asia/Jakarta");/*
		date("Y-m-d H:i:s"),*/                       
                       
			
			
       		
 
		$data = array(
				'nourut' => $this->input->post('nourut'),
				'nobongkar' => $this->input->post('nobongkar'),
				'nosuratjalan' => $this->input->post('nosuratjalan'),
				'nopolisi' => $this->input->post('nopolisi'),
				'namasupir' => $this->input->post('namasupir'),
				'tujuangudang' => $this->input->post('tujuangudang'),
				'pricipal' => $a,
				'party' => $b,
				'jenispupuk' => $c,
				'tanggal' => date("Y-m-d"),
				'brangkat' => date("H:i:s"),
				'bermasalah' => "0",
			);
		$insert = $this->pantau_pelabuhan->save($data);
		echo json_encode(array("status" => TRUE));
	
	}

	public function ajax_update()
	{
			
		$data = array(
				'nourut' => $this->input->post('nourut'),
				'nobongkar' => $this->input->post('nobongkar'),
				'nopolisi' => $this->input->post('nopolisi'),
				'namasupir' => $this->input->post('namasupir'),
				'tujuangudang' => $this->input->post('tujuangudang'),
				'pricipal' => $a,
				'party' => $b,
				'jenispupuk' => $c,
				'tanggal' => date("Y-m-d"),
				'brangkat' => date("H:i:s"),
				'bermasalah' => "0",
			);
		$this->pantau_pelabuhan->update(array('nosuratjalan' => $this->input->post('nosuratjalan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->pantau_pelabuhan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
