<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jt extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('m_jt','jt');
	}

	public function index()
	{
		if($this->session->userdata('akses')!='3'){
      	$url=base_url();
		redirect($url);
    
}
		$this->load->helper('url');
		$this->load->view('menu');
		$this->load->view('v_jt');
	}

	public function ajax_list()
	{
		$list = $this->jt->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $jt) {			
            $row[] = $no++;
			$row = array();
            $row[] = $jt->jtpelabuhantimbangan;
            $row[] = $jt->jtgudangbgr;
            $row[] = $jt->jtgudangyapindex;
            $row[] = $jt->jtgudangwaterindex;
            $row[] = $jt->jtgudangisab;
            $row[] = $jt->jtgudangpundi;
            $row[] = $jt->jtgudangtatum;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_jt('."'".$jt->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
			
/*				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_jt('."'".$jt->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>*/
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->jt->count_all(),
						"recordsFiltered" => $this->jt->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->jt->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$data = array(
				'jtpelabuhantimbangan' => $this->input->post('jtpelabuhantimbangan'),
				'jtgudangbgr' => $this->input->post('jtgudangbgr'),
				'jtgudangyapindex' => $this->input->post('jtgudangyapindex'),
				'jtgudangwaterindex' => $this->input->post('jtgudangwaterindex'),
				'jtgudangisab' => $this->input->post('jtgudangisab'),
				'jtgudangpundi' => $this->input->post('jtgudangpundi'),
				'jtgudangtatum' => $this->input->post('jtgudangtatum'),
			);
		$insert = $this->jt->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'jtpelabuhantimbangan' => $this->input->post('jtpelabuhantimbangan'),
				'jtgudangbgr' => $this->input->post('jtgudangbgr'),
				'jtgudangyapindex' => $this->input->post('jtgudangyapindex'),
				'jtgudangwaterindex' => $this->input->post('jtgudangwaterindex'),
				'jtgudangisab' => $this->input->post('jtgudangisab'),
				'jtgudangpundi' => $this->input->post('jtgudangpundi'),
				'jtgudangtatum' => $this->input->post('jtgudangtatum'),
			);
		$this->jt->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->jt->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
