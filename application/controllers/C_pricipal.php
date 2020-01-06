<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pricipal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pricipal');
        $this->load->library('dompdf_gen');
    }
 
    public function index(){
        $this->load->view('v_kantor_pricipal');
    }

    public function cetak(){      
        $data['pricipal'] = $this->m_pricipal->getpricipal(); 
        $data['total'] = $this->m_pricipal->gettotal(); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_pricipal', $data);
 
        $paper_size  = 'LEGAL'; //paper size

        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array("Attachment"=>0));
    }

}
/* End of file claporanpdf.php */
/* Location: ./application/controllers/claporanpdf.php */

/*$this->input->post('tanggal')*/