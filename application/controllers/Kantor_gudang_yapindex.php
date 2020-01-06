<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor_gudang_yapindex extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kantor_gudang_yapindex','kantor_gudang_yapindex');
		$this->load->model('m_pricipal');
	}

	public function index()
	{
		if($this->session->userdata('akses')!='3')
			{
		      	$url=base_url();
				redirect($url);
    		}

		$this->load->helper('url');
		$this->load->view('menu');

        $data['pricipal'] = $this->m_pricipal->getpricipal(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_kantor_gudang_yapindex',$data);
	}

	public function ajax_list()
	{
		$list = $this->kantor_gudang_yapindex->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kantor_gudang_yapindex) {			
            $row[] = $no++;
			$row = array();
            $row[] = $kantor_gudang_yapindex->nourut;
            $row[] = $kantor_gudang_yapindex->nobongkar;
            $row[] = $kantor_gudang_yapindex->nosuratjalan;
            $row[] = $kantor_gudang_yapindex->nopolisi;
            $row[] = $kantor_gudang_yapindex->namasupir;
            $row[] = $kantor_gudang_yapindex->tujuangudang;
            $row[] = $kantor_gudang_yapindex->pricipal;
            $row[] = number_format($kantor_gudang_yapindex->party,0,',','.');
            $row[] = $kantor_gudang_yapindex->jenispupuk;
            $row[] = number_format($kantor_gudang_yapindex->timbangisi,0,',','.');
            $row[] = number_format($kantor_gudang_yapindex->timbangkosong,0,',','.');
            $row[] = number_format($kantor_gudang_yapindex->beratbersih,0,',','.');
            $row[] = "KG";
            $row[] = $kantor_gudang_yapindex->tanggal;
            $row[] = $kantor_gudang_yapindex->brangkat;
            $row[] = $kantor_gudang_yapindex->tiba;
            $row[] = $kantor_gudang_yapindex->subgudang;
            $row[] = $kantor_gudang_yapindex->keterangan;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kantor_gudang_yapindex('."'".$kantor_gudang_yapindex->nosuratjalan."'".')"><i class="glyphicon glyphicon-pencil"></i> KONFIRMASI</a><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kantor_gudang_yapindex('."'".$kantor_gudang_yapindex->nosuratjalan."'".')">
				<i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kantor_gudang_yapindex->count_all(),
						"recordsFiltered" => $this->kantor_gudang_yapindex->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kantor_gudang_yapindex->get_by_id($id);
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
		$insert = $this->kantor_gudang_yapindex->save($data);
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
				'keterangan' => "SUDAH DATANG",
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


		$this->kantor_gudang_yapindex->update(array('nourut' => $this->input->post('nourut')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kantor_gudang_yapindex->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
