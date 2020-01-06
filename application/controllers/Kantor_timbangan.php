<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor_timbangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('m_timbangan','timbangan');
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
		$this->load->view('v_kantor_timbangan',$data);
		
	}

	public function ajax_list()
	{
		$list = $this->timbangan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kantor_timbangan) {			
            $row[] = $no++;
			$row = array();
            $row[] = $kantor_timbangan->nourut;
            $row[] = $kantor_timbangan->nobongkar;
            $row[] = $kantor_timbangan->nosuratjalan;
            $row[] = $kantor_timbangan->nopolisi;
            $row[] = $kantor_timbangan->namasupir;
            $row[] = $kantor_timbangan->tujuangudang;
            $row[] = $kantor_timbangan->pricipal;
            $row[] = number_format($kantor_timbangan->party,0,',','.');
            $row[] = $kantor_timbangan->jenispupuk;
            $row[] = number_format($kantor_timbangan->timbangisi,0,',','.');
            $row[] = number_format($kantor_timbangan->timbangkosong,0,',','.');
            $row[] = number_format($kantor_timbangan->beratbersih,0,',','.');
            $row[] = "KG";
            $row[] = $kantor_timbangan->tanggal;
            $row[] = $kantor_timbangan->tiba;

			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kantor_timbangan('."'".$kantor_timbangan->nosuratjalan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->timbangan->count_all(),
						"recordsFiltered" => $this->timbangan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->timbangan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'nourut' => $this->input->post('nourut'),
				'nosuratjalan' => $this->input->post('nosuratjalan'),
				'nopolisi' => $this->input->post('nopolisi'),
				'namasupir' => $this->input->post('namasupir'),
				'tujuangudang' => $this->input->post('tujuangudang'),
				'pricipal' => $this->input->post('pricipal'),
				'party' => $this->input->post('party'),
				'jenispupuk' => $this->input->post('jenispupuk'),
				'timbangisi' => $this->input->post('timbangisi'),
				'timbangkosong' => $this->input->post('timbangkosong'),
				'beratbersih' => $this->input->post('beratbersih'),
				'tanggal' => $this->input->post('tanggal'),
				'brangkat' => $this->input->post('brangkat'),
				'bermasalah' => "1",
			);
		$insert = $this->timbangan->save($data);
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
				'nourut' => $this->input->post('nourut'),
				'nosuratjalan' => $this->input->post('nosuratjalan'),
				'nopolisi' => $this->input->post('nopolisi'),
				'namasupir' => $this->input->post('namasupir'),
				'tujuangudang' => $this->input->post('tujuangudang'),
				'pricipal' => $this->input->post('pricipal'),
				'party' => $this->input->post('party'),
				'jenispupuk' => $this->input->post('jenispupuk'),
				'timbangisi' => $this->input->post('timbangisi'),
				'timbangkosong' => $this->input->post('timbangkosong'),
				'tiba' => date("H:i:s"),
				'beratbersih' => $c,
				'tanggal' => $this->input->post('tanggal'),
				'brangkat' => $this->input->post('brangkat'),
				'bermasalah' => "1",
			);
		$data1 = array(
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
				'brangkat' => date("H:i:s"),
			);
		$tujuan = $this->input->post('tujuangudang');
		if("BGR SERENGSEM" == $tujuan)
			{
				$insert = $this->timbangan->save1($data1);
			}
		elseif("TATUM" == $tujuan)
			{
				$insert = $this->timbangan->save2($data1);
			}
		elseif("YAPINDEX" == $tujuan)
			{
				$insert = $this->timbangan->save3($data1);
			}
		elseif("WATERINDEX" == $tujuan)
			{
				$insert = $this->timbangan->save4($data1);
			}
		elseif("PUNDI" == $tujuan)
			{
				$insert = $this->timbangan->save5($data1);
			}
		elseif("ISAB" == $tujuan)
			{
				$insert = $this->timbangan->save6($data1);
			}
		$this->timbangan->update(array('nosuratjalan' => $this->input->post('nosuratjalan')), $data);
		echo json_encode(array("status" => TRUE));
	}


	public function ajax_delete($id)
	{
		$this->timbangan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
