<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_gudang_yapindex extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_gudang_yapindex');
        $this->load->library('dompdf_gen');
    }
 
    public function index(){
        $this->load->view('v_kantor_gudang_yapindex');
    }
    public function cetak(){      
        $tanggal       = $this->input->post('tanggal'); 
        $tanggal1       = $this->input->post('tanggal1');   
        $nobongkar       = $this->input->post('nobongkar');     

        $data['gudang_bgrserengsem'] = $this->m_gudang_yapindex->gettimbanganbgr($tanggal,$tanggal1,$nobongkar); 
        $data['timbanganbgr1'] = $this->m_gudang_yapindex->gettimbanganbgr1($tanggal,$tanggal1,$nobongkar);
        $data['isibgr'] = $this->m_gudang_yapindex->getisibgr($tanggal,$tanggal1,$nobongkar); 
        $data['kosongbgr'] = $this->m_gudang_yapindex->getkosongbgr($tanggal,$tanggal1,$nobongkar); 
        $data['totalbgr'] = $this->m_gudang_yapindex->gettotalbgr($tanggal,$tanggal1,$nobongkar); 
        $data['daus'] = $this->m_gudang_yapindex->getkapal($nobongkar); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_gudang_yapindex', $data);
 
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
        
        $data['gudang_bgrserengsem'] = $this->m_gudang_yapindex->gettimbanganbgrfull($nobongkar); 
        $data['timbanganbgr1'] = $this->m_gudang_yapindex->gettimbanganbgr1full($nobongkar);
        $data['isibgr'] = $this->m_gudang_yapindex->getisibgrfull($nobongkar); 
        $data['kosongbgr'] = $this->m_gudang_yapindex->getkosongbgrfull($nobongkar); 
        $data['totalbgr'] = $this->m_gudang_yapindex->gettotalbgrfull($nobongkar); 
        $data['daus'] = $this->m_gudang_yapindex->getkapal($nobongkar); 
        



        $data['min'] = $this->m_gudang_yapindex->min($nobongkar); 
        $data['max'] = $this->m_gudang_yapindex->max($nobongkar); 









        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_gudang_yapindex', $data);
 
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