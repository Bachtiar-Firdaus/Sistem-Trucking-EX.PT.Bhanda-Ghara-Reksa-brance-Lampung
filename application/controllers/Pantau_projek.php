<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pantau_projek extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('m_pantau_projek','pantau_projek');
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

        $data['pricipal'] = $this->m_pricipal->getpricipalprojek(); 
        $data['projek'] = $this->m_pricipal->getprojek(); 
		$this->load->view('v_pantau_projek',$data);
		
	}

	public function ajax_list()
	{
		$list = $this->pantau_projek->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pantau_projek) {			
            $row[] = $no++;
			$row = array();
            $row[] = $pantau_projek->nobongkar;
            $row[] = $pantau_projek->pricipal;
            $row[] = number_format($pantau_projek->party,0,',','.');
            $row[] = "KG";
            $row[] = $pantau_projek->kapal;
            $row[] = $pantau_projek->jenispupuk;
            $row[] = $pantau_projek->tanggal;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_pantau_projek('."'".$pantau_projek->nobongkar."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pantau_projek->count_all(),
						"recordsFiltered" => $this->pantau_projek->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->pantau_projek->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{            
		$data = array(
				'nobongkar' => $a,
				'pricipal' => $b,
				'party' => $c,
				'kapal' => $d,
				'jenispupuk' => $e,
				'tanggal' => $f,
			);
		$insert = $this->pantau_projek->save($data);
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
		$this->pantau_projek->update(array('nobongkar' => $this->input->post('nobongkar')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$data = array(
				'Keterangan' => "SUDAH BONGKAR",
			);
		$this->pantau_projek->update(array('nobongkar' => $id), $data);
		$this->pantau_projek->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
