<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelabuhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		
		
		$this->load->model('m_pelabuhan','pelabuhan');
		$this->load->model('m_pricipal');


	}

	public function index()
	{
		if($this->session->userdata('akses')!='1'){
      	$url=base_url();
		redirect($url);
    }

		$this->load->helper('url');
		$this->load->view('menu');

        $data['pricipal'] = $this->m_pricipal->getpricipal(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_pelabuhan',$data);
		
	}

	public function ajax_list()
	{

		$list = $this->pelabuhan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pelabuhan) {			
            $row[] = $no++;
			$row = array();
            $row[] = $pelabuhan->nourut;
            $row[] = $pelabuhan->nobongkar;
            $row[] = $pelabuhan->nosuratjalan;
            $row[] = $pelabuhan->nopolisi;
            $row[] = $pelabuhan->namasupir;
            $row[] = $pelabuhan->tujuangudang;
            $row[] = $pelabuhan->pricipal;
            $row[] = number_format($pelabuhan->party,0,',','.');
            $row[] = "KG";
            $row[] = $pelabuhan->jenispupuk;
            $row[] = $pelabuhan->tanggal;
            $row[] = $pelabuhan->brangkat;

		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pelabuhan->count_all(),
						"recordsFiltered" => $this->pelabuhan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->pelabuhan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		date_default_timezone_set("Asia/Jakarta");
		/*
		date("Y-m-d H:i:s"),*/  

        $data1 = $this->db->get('tbl_projek');
        $result1 = $data1->row();
		$a = $result1->pricipal;
		$b = $result1->party;
		$c = $result1->jenispupuk;
		$d = $result1->nobongkar;
			
			
       		
 
		$data = array(
				'nourut' => $this->input->post('nourut'),
				'nobongkar' => $d,
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
		$insert = $this->pelabuhan->save($data);
		echo json_encode(array("status" => TRUE));
	
	}

	public function ajax_update()
	{
		date_default_timezone_set("Asia/Jakarta");/*
		date("Y-m-d H:i:s"),*/                        
            
        $data1 = $this->db->get('tbl_projek');
        $result1 = $data1->row();
		$a = $result1->pricipal;
		$b = $result1->party;
		$c = $result1->jenispupuk;
		$d = $result1->nobongkar;
			
		$data = array(
				'nourut' => $this->input->post('nourut'),
				'nobongkar' => $d,
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
		$this->pelabuhan->update(array('nosuratjalan' => $this->input->post('nosuratjalan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->pelabuhan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
