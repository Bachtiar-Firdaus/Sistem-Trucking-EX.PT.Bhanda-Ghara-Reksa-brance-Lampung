<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor_pelabuhan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		
		
		$this->load->model('m_kantor_pelabuhan','kantor_pelabuhan');
		$this->load->model('m_pricipal');


	}

	public function index()
	{
		if($this->session->userdata('akses')!='3'){
      	$url=base_url();
		redirect($url);
    }

		$this->load->helper('url');
		$this->load->view('menu');

        $data['pricipal'] = $this->m_pricipal->getpricipal(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_kantor_pelabuhan',$data);
		
	}

	public function ajax_list()
	{

		$list = $this->kantor_pelabuhan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kantor_pelabuhan) {			
            $row[] = $no++;
			$row = array();
            $row[] = $kantor_pelabuhan->nourut;
            $row[] = $kantor_pelabuhan->nobongkar;
            $row[] = $kantor_pelabuhan->nosuratjalan;
            $row[] = $kantor_pelabuhan->nopolisi;
            $row[] = $kantor_pelabuhan->namasupir;
            $row[] = $kantor_pelabuhan->tujuangudang;
            $row[] = $kantor_pelabuhan->pricipal;
            $row[] = number_format($kantor_pelabuhan->party,0,',','.');
            $row[] = "KG";
            $row[] = $kantor_pelabuhan->jenispupuk;
            $row[] = $kantor_pelabuhan->tanggal;
            $row[] = $kantor_pelabuhan->brangkat;

			//add html for action

            
        $data1 = $this->db->get('tbl_projek');
        $result1 = $data1->row();
		if($result1 != null){
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kantor_pelabuhan('."'".$kantor_pelabuhan->nosuratjalan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kantor_pelabuhan('."'".$kantor_pelabuhan->nosuratjalan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		}else{
					$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kantor_pelabuhan('."'".$kantor_pelabuhan->nosuratjalan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
				}
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kantor_pelabuhan->count_all(),
						"recordsFiltered" => $this->kantor_pelabuhan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kantor_pelabuhan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
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
		$insert = $this->kantor_pelabuhan->save($data);
		echo json_encode(array("status" => TRUE));
	
	}

	public function ajax_update()
	{
		date_default_timezone_set("Asia/Jakarta");
			
		$data = array(
				'nourut' => $this->input->post('nourut'),
				'nopolisi' => $this->input->post('nopolisi'),
				'namasupir' => $this->input->post('namasupir'),
				'tujuangudang' => $this->input->post('tujuangudang'),
				'tanggal' => date("Y-m-d"),
				'brangkat' => date("H:i:s"),
				'bermasalah' => "0",
			);
		$this->kantor_pelabuhan->update(array('nosuratjalan' => $this->input->post('nosuratjalan')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kantor_pelabuhan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
