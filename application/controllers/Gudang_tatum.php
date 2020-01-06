<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_tatum extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_gudang_tatum','gudang_tatum');
		$this->load->model('m_pricipal');
	}

	public function index()
	{
			if($this->session->userdata('akses')!='7')
			{
		      	$url=base_url();
				redirect($url);
    		}

		$this->load->helper('url');
		$this->load->view('menu');
        $data['pricipal'] = $this->m_pricipal->getpricipal(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_gudang_tatum',$data);
	}

	public function ajax_list()
	{
		$list = $this->gudang_tatum->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $gudang_tatum) {			
            $row[] = $no++;
			$row = array();
            $row[] = $gudang_tatum->nourut;
            $row[] = $gudang_tatum->nobongkar;
            $row[] = $gudang_tatum->nosuratjalan;
            $row[] = $gudang_tatum->nopolisi;
            $row[] = $gudang_tatum->namasupir;
            $row[] = $gudang_tatum->tujuangudang;
            $row[] = $gudang_tatum->pricipal;
            $row[] = number_format($gudang_tatum->party,0,',','.');
            $row[] = $gudang_tatum->jenispupuk;
            $row[] = number_format($gudang_tatum->timbangisi,0,',','.');
            $row[] = number_format($gudang_tatum->timbangkosong,0,',','.');
            $row[] = number_format($gudang_tatum->beratbersih,0,',','.');
            $row[] = "KG";
            $row[] = $gudang_tatum->tanggal;
            $row[] = $gudang_tatum->brangkat;
            $row[] = $gudang_tatum->tiba;
            $row[] = $gudang_tatum->subgudang;
            $row[] = $gudang_tatum->keterangan;

			//add html for action                
				$data1 = $this->db->get('tbl_projek');
                $result1 = $data1->row();
                if($result1 != null && $gudang_tatum->subgudang == null){	
				$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_gudang_tatum('."'".$gudang_tatum->nosuratjalan."'".')"><i class="glyphicon glyphicon-pencil"></i> KONFIRMASI</a>';
		}else{
                	$row[] = "-";
                }
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->gudang_tatum->count_all(),
						"recordsFiltered" => $this->gudang_tatum->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->gudang_tatum->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
				$a = $this->input->post('timbangisi');
				$b = $this->input->post('timbangkosong');
				$c = $a - $b;
		$data = array(
				'nourut' => $this->input->post('nourut'),
				'nobongkar' => $this->input->post('nobongkar'),
				'nosuratjalan' => $this->input->post('nosuratjalan'),
				'nopolisi' => $this->input->post('nopolisi'),
				'namasupir' => $this->input->post('namasupir'),
				'tujuangudang' => $this->input->post('tujuangudang'),
				'pricipal' => $this->input->post('pricipal'),
				'party' => $this->input->post('party'),
				'jenispupuk' => $this->input->post('jenispupuk'),
				'timbangisi' => $this->input->post('timbangisi'),
				'timbangkosong' => $this->input->post('timbangkosong'),
				'beratbersih' => $c,
				'tanggal' => $this->input->post('tanggal'),
				'brangkat' => $this->input->post('brangkat'),
				'tiba' => $this->input->post('tiba'),
				'subgudang' => $this->input->post('subgudang'),
				'keterangan' => $this->input->post('keterangan'),
			);
		$insert = $this->gudang_tatum->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		date_default_timezone_set("Asia/Jakarta");/*
		date("Y-m-d H:i:s"),*/

		$a = $this->input->post('timbangisi');
		$b = $this->input->post('timbangkosong');
		$c = $a - $b;		
		$data = array(
				'tiba' => date("H:i:s"),
				'subgudang' => $this->input->post('subgudang'),
				'keterangan' => "SUDAH BONGKAR",
				'bermasalah' => "2",
			);	
        

        
		$q  = $this->input->post('nourut');
		$p = $this->input->post('nobongkar');

        $datas= array(
				'bermasalah' => '2',);
        $dataw= array(
				'nobongkar' => $p,
				'nourut' => $q,);
        $this->db->update('tbl_pelabuhan_timbangan',$datas,$dataw);
        $this->db->affected_rows();


		$this->gudang_tatum->update(array('nourut' => $this->input->post('nourut')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->gudang_tatum->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
