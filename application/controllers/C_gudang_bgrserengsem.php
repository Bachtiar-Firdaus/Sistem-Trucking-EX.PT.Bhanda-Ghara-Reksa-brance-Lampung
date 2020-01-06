<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_gudang_bgrserengsem extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_gudang_bgrserengsem');
        $this->load->library('dompdf_gen');
    }
 
    public function index(){
        $this->load->view('v_kantor_gudang_bgrserengsem');
    }

    public function cetak(){      
        $tanggal       = $this->input->post('tanggal'); 
        $tanggal1       = $this->input->post('tanggal1');   
        $nobongkar       = $this->input->post('nobongkar');     

        $data['gudang_bgrserengsem'] = $this->m_gudang_bgrserengsem->gettimbanganbgr($tanggal,$tanggal1,$nobongkar); 
        $data['timbanganbgr1'] = $this->m_gudang_bgrserengsem->gettimbanganbgr1($tanggal,$tanggal1,$nobongkar);
        $data['isibgr'] = $this->m_gudang_bgrserengsem->getisibgr($tanggal,$tanggal1,$nobongkar); 
        $data['kosongbgr'] = $this->m_gudang_bgrserengsem->getkosongbgr($tanggal,$tanggal1,$nobongkar); 
        $data['totalbgr'] = $this->m_gudang_bgrserengsem->gettotalbgr($tanggal,$tanggal1,$nobongkar); 
        $data['daus'] = $this->m_gudang_bgrserengsem->getkapal($nobongkar); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_gudang_bgrserengsem', $data);
 
        $paper_size  = 'LEGAL'; //paper size

        $orientation = 'POTRAIT'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array("Attachment"=>0));
    }

    public function cetak_full(){       
        $nobongkar       = $this->input->post('nobongkar');     
        
        $data['gudang_bgrserengsem'] = $this->m_gudang_bgrserengsem->gettimbanganbgrfull($nobongkar); 
        $data['timbanganbgr1'] = $this->m_gudang_bgrserengsem->gettimbanganbgr1full($nobongkar);
        $data['isibgr'] = $this->m_gudang_bgrserengsem->getisibgrfull($nobongkar); 
        $data['kosongbgr'] = $this->m_gudang_bgrserengsem->getkosongbgrfull($nobongkar); 
        $data['totalbgr'] = $this->m_gudang_bgrserengsem->gettotalbgrfull($nobongkar); 


        $data['min'] = $this->m_gudang_bgrserengsem->min($nobongkar); 
        $data['max'] = $this->m_gudang_bgrserengsem->max($nobongkar); 




        $data['daus'] = $this->m_gudang_bgrserengsem->getkapal($nobongkar); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_gudang_bgrserengsem', $data);
 
        $paper_size  = 'LEGAL'; //paper size

        $orientation = 'POTRAIT'; //tipe format kertas
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