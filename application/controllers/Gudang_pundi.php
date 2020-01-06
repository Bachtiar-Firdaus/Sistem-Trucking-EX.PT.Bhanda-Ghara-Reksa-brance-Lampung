<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang_pundi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_gudang_pundi','gudang_pundi');
		$this->load->model('m_pricipal');
	}

	public function index()
	{
		if($this->session->userdata('akses')!='6')
			{
		      	$url=base_url();
				redirect($url);
    		}

		$this->load->helper('url');
		$this->load->view('menu');
        $data['pricipal'] = $this->m_pricipal->getpricipal(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_gudang_pundi',$data);
	}

	public function ajax_list()
	{
		$list = $this->gudang_pundi->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $gudang_pundi) {			
            $row[] = $no++;
			$row = array();
            $row[] = $gudang_pundi->nourut;
            $row[] = $gudang_pundi->nobongkar;
            $row[] = $gudang_pundi->nosuratjalan;
            $row[] = $gudang_pundi->nopolisi;
            $row[] = $gudang_pundi->namasupir;
            $row[] = $gudang_pundi->tujuangudang;
            $row[] = $gudang_pundi->pricipal;
            $row[] = number_format($gudang_pundi->party,0,',','.');
            $row[] = $gudang_pundi->jenispupuk;
            $row[] = number_format($gudang_pundi->timbangisi,0,',','.');
            $row[] = number_format($gudang_pundi->timbangkosong,0,',','.');
            $row[] = number_format($gudang_pundi->beratbersih,0,',','.');
            $row[] = "KG";
            $row[] = $gudang_pundi->tanggal;
            $row[] = $gudang_pundi->brangkat;
            $row[] = $gudang_pundi->tiba;
            $row[] = $gudang_pundi->subgudang;
            $row[] = $gudang_pundi->keterangan;

			//add html for action                
				$data1 = $this->db->get('tbl_projek');
                $result1 = $data1->row();
                if($result1 != null && $gudang_pundi->subgudang == null){	
					$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_gudang_pundi('."'".$gudang_pundi->nosuratjalan."'".')"><i class="glyphicon glyphicon-pencil"></i> KONFIRMASI</a>';
				}else{
                	$row[] = "-";
                }
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->gudang_pundi->count_all(),
						"recordsFiltered" => $this->gudang_pundi->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->gudang_pundi->get_by_id($id);
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
		$insert = $this->gudang_pundi->save($data);
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


		$this->gudang_pundi->update(array('nourut' => $this->input->post('nourut')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->gudang_pundi->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
