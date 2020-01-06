<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor_projek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('m_kantor_projek','kantor_projek');
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

        $data['pricipal'] = $this->m_pricipal->getpricipalprojek(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_kantor_projek',$data);
		
	}

	public function ajax_list()
	{
		$list = $this->kantor_projek->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kantor_projek) {			
            $row[] = $no++;
			$row = array();
            $row[] = $kantor_projek->nobongkar;
            $row[] = $kantor_projek->pricipal;
            $row[] = number_format($kantor_projek->party,0,',','.');
            $row[] = "KG";
            $row[] = $kantor_projek->kapal;
            $row[] = $kantor_projek->jenispupuk;
            $row[] = $kantor_projek->tanggal;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kantor_projek('."'".$kantor_projek->nobongkar."'".')"><i class="glyphicon glyphicon-trash"></i> SELESAI</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kantor_projek->count_all(),
						"recordsFiltered" => $this->kantor_projek->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kantor_projek->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{            
		$p = $this->input->post('nobongkar');
        $data11 = $this->db->where('nobongkar', $p);
        $data1 = $data11->get('tbl_pricipal');
        $result1 = $data1->row();
		$a = $result1->nobongkar;
		$b = $result1->pricipal;
		$c = $result1->party;
		$d = $result1->kapal;
		$e = $result1->jenispupuk;
		$f = $result1->tanggal;
		$data = array(
				'nobongkar' => $a,
				'pricipal' => $b,
				'party' => $c,
				'kapal' => $d,
				'jenispupuk' => $e,
				'tanggal' => $f,
			);
		$insert = $this->kantor_projek->save($data);
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
		$this->kantor_projek->update(array('nobongkar' => $this->input->post('nobongkar')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$data = array(
				'Keterangan' => "SUDAH BONGKAR",
			);
		$this->kantor_projek->update(array('nobongkar' => $id), $data);
		$this->kantor_projek->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
