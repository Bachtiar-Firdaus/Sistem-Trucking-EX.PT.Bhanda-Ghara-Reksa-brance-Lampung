<?php
class Chart extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->view('menu');
		$this->load->model('m_chart');
	}
 
	public function index()
	{
		$data['graph'] = $this->m_chart->graph();
		$data['graph1'] = $this->m_chart->graphbag1();
		$data['graph2'] = $this->m_chart->graphbag2();
		$data['graph10'] = $this->m_chart->graphbag10();
		$data['graph20'] = $this->m_chart->graphbag20();
		$data['graph30'] = $this->m_chart->graphbag30();
		$data['graph40'] = $this->m_chart->graphbag40();
		$data['graph50'] = $this->m_chart->graphbag50();
		$data['graph60'] = $this->m_chart->graphbag60();

		$data['gra2ph2'] = $this->m_chart->graph2bag2();
		$data['gra2ph22'] = $this->m_chart->graph2bag22();
   	    $data['gra2ph222'] = $this->m_chart->graph2bag222();

		$data['graphbag11'] = $this->m_chart->graphbag11();
    	$data['graphbag21'] = $this->m_chart->graphbag21();
	    $data['graphbag31'] = $this->m_chart->graphbag31();
	    $data['graphbag41'] = $this->m_chart->graphbag41();
	    $data['graphbag51'] = $this->m_chart->graphbag51();
	    $data['graphbag61'] = $this->m_chart->graphbag61();
		$this->load->view('v_chart', $data);
	}
 
}