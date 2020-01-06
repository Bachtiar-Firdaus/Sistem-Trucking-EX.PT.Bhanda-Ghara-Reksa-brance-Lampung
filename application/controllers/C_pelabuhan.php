<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pelabuhan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_pelabuhan');
        $this->load->library('dompdf_gen');
    }
 
    public function index(){
        $this->load->view('v_kantor_pelabuhan');
    }

    public function cetak(){      
        $tanggal       = $this->input->post('tanggal'); 
        $tanggal1       = $this->input->post('tanggal1');   
        $nobongkar       = $this->input->post('nobongkar');     

        $data['pelabuhanbgr'] = $this->m_pelabuhan->getpelabuhanbgr($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanisab'] = $this->m_pelabuhan->getpelabuhanisab($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanpundi'] = $this->m_pelabuhan->getpelabuhanpundi($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhantatum'] = $this->m_pelabuhan->getpelabuhantatum($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanwaterindex'] = $this->m_pelabuhan->getpelabuhanwaterindex($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanyapindex'] = $this->m_pelabuhan->getpelabuhanyapindex($tanggal,$tanggal1,$nobongkar); 




        $data['pelabuhanbgr1'] = $this->m_pelabuhan->getpelabuhanbgr1($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanisab1'] = $this->m_pelabuhan->getpelabuhanisab1($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanpundi1'] = $this->m_pelabuhan->getpelabuhanpundi1($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhantatum1'] = $this->m_pelabuhan->getpelabuhantatum1($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanwaterindex1'] = $this->m_pelabuhan->getpelabuhanwaterindex1($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhanyapindex1'] = $this->m_pelabuhan->getpelabuhanyapindex1($tanggal,$tanggal1,$nobongkar); 





        $data['grandtotal'] = $this->m_pelabuhan->grandtotal($tanggal,$tanggal1,$nobongkar); 
        $data['pelabuhan'] = $this->m_pelabuhan->getkapal($nobongkar); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_pelabuhan', $data);
 
        $paper_size  = 'LEGAL'; //paper size

        $orientation = 'potrait'; //tipe format kertas
        $html = $this->output->get_output();
 
        $this->dompdf->set_paper($paper_size, $orientation);
        //Convert to PDF
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan.pdf", array("Attachment"=>0));
    }


    public function cetak_full(){        
        $nobongkar       = $this->input->post('nobongkar');     


        $data['max'] = $this->m_pelabuhan->tanggalmax($nobongkar); 
        $data['min'] = $this->m_pelabuhan->tanggalmin($nobongkar); 



        $data['pelabuhanbgr'] = $this->m_pelabuhan->getpelabuhanbgrfull($nobongkar); 
        $data['pelabuhanisab'] = $this->m_pelabuhan->getpelabuhanisabfull($nobongkar); 
        $data['pelabuhanpundi'] = $this->m_pelabuhan->getpelabuhanpundifull($nobongkar); 
        $data['pelabuhantatum'] = $this->m_pelabuhan->getpelabuhantatumfull($nobongkar); 
        $data['pelabuhanwaterindex'] = $this->m_pelabuhan->getpelabuhanwaterindexfull($nobongkar); 
        $data['pelabuhanyapindex'] = $this->m_pelabuhan->getpelabuhanyapindexfull($nobongkar); 




        $data['pelabuhanbgr1'] = $this->m_pelabuhan->getpelabuhanbgr1full($nobongkar); 
        $data['pelabuhanisab1'] = $this->m_pelabuhan->getpelabuhanisab1full($nobongkar); 
        $data['pelabuhanpundi1'] = $this->m_pelabuhan->getpelabuhanpundi1full($nobongkar); 
        $data['pelabuhantatum1'] = $this->m_pelabuhan->getpelabuhantatum1full($nobongkar); 
        $data['pelabuhanwaterindex1'] = $this->m_pelabuhan->getpelabuhanwaterindex1full($nobongkar); 
        $data['pelabuhanyapindex1'] = $this->m_pelabuhan->getpelabuhanyapindex1full($nobongkar); 
        $data['grandtotal'] = $this->m_pelabuhan->grandtotalfull($nobongkar); 





        
        $data['pelabuhan'] = $this->m_pelabuhan->getkapal($nobongkar); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_pelabuhan', $data);
 
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