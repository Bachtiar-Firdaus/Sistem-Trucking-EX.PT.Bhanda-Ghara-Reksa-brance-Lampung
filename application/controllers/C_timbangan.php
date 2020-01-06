<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class C_timbangan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('m_timbangan');
        $this->load->library('dompdf_gen');
    }
 
    public function index(){
        $this->load->view('v_kantor_timbangan');
    }

    public function cetak(){      
        $tanggal       = $this->input->post('tanggal'); 
        $tanggal1       = $this->input->post('tanggal1');   
        $nobongkar       = $this->input->post('nobongkar');     




        $data['timbanganbgr'] = $this->m_timbangan->gettimbanganbgr($tanggal,$tanggal1,$nobongkar); 
        $data['timbanganisab'] = $this->m_timbangan->gettimbanganisab($tanggal,$tanggal1,$nobongkar); 
        $data['timbangantatum'] = $this->m_timbangan->gettimbangantatum($tanggal,$tanggal1,$nobongkar); 
        $data['timbanganpundi'] = $this->m_timbangan->gettimbanganpundi($tanggal,$tanggal1,$nobongkar); 
        $data['timbanganwaterindex'] = $this->m_timbangan->gettimbanganwaterindex($tanggal,$tanggal1,$nobongkar); 
        $data['timbanganyapindex'] = $this->m_timbangan->gettimbanganyapindex($tanggal,$tanggal1,$nobongkar); 



        $data['timbanganbgr1'] = $this->m_timbangan->gettimbanganbgr1($tanggal,$tanggal1,$nobongkar);
        $data['timbanganisab1'] = $this->m_timbangan->gettimbanganisab1($tanggal,$tanggal1,$nobongkar);
        $data['timbangantatum1'] = $this->m_timbangan->gettimbangantatum1($tanggal,$tanggal1,$nobongkar);
        $data['timbanganpundi1'] = $this->m_timbangan->gettimbanganpundi1($tanggal,$tanggal1,$nobongkar);
        $data['timbanganwaterindex1'] = $this->m_timbangan->gettimbanganwaterindex1($tanggal,$tanggal1,$nobongkar);
        $data['timbanganyapindex1'] = $this->m_timbangan->gettimbanganyapindex1($tanggal,$tanggal1,$nobongkar);




        $data['isibgr'] = $this->m_timbangan->getisibgr($tanggal,$tanggal1,$nobongkar); 
        $data['isiisab'] = $this->m_timbangan->getisiisab($tanggal,$tanggal1,$nobongkar); 
        $data['isitatum'] = $this->m_timbangan->getisitatum($tanggal,$tanggal1,$nobongkar); 
        $data['isipundi'] = $this->m_timbangan->getisipundi($tanggal,$tanggal1,$nobongkar); 
        $data['isiwaterindex'] = $this->m_timbangan->getisiwaterindex($tanggal,$tanggal1,$nobongkar); 
        $data['isiyapindex'] = $this->m_timbangan->getisiyapindex($tanggal,$tanggal1,$nobongkar); 




        $data['kosongbgr'] = $this->m_timbangan->getkosongbgr($tanggal,$tanggal1,$nobongkar); 
        $data['kosongisab'] = $this->m_timbangan->getkosongisab($tanggal,$tanggal1,$nobongkar); 
        $data['kosongtatum'] = $this->m_timbangan->getkosongtatum($tanggal,$tanggal1,$nobongkar); 
        $data['kosongpundi'] = $this->m_timbangan->getkosongpundi($tanggal,$tanggal1,$nobongkar); 
        $data['kosongwaterindex'] = $this->m_timbangan->getkosongwaterindex($tanggal,$tanggal1,$nobongkar);
        $data['kosongyapindex'] = $this->m_timbangan->getkosongyapindex($tanggal,$tanggal1,$nobongkar); 





        $data['totalbgr'] = $this->m_timbangan->gettotalbgr($tanggal,$tanggal1,$nobongkar); 
        $data['totalisab'] = $this->m_timbangan->gettotalisab($tanggal,$tanggal1,$nobongkar); 
        $data['totaltatum'] = $this->m_timbangan->gettotaltatum($tanggal,$tanggal1,$nobongkar); 
        $data['totalpundi'] = $this->m_timbangan->gettotalpundi($tanggal,$tanggal1,$nobongkar); 
        $data['totalwaterindex'] = $this->m_timbangan->gettotalwaterindex($tanggal,$tanggal1,$nobongkar); 
        $data['totalyapindex'] = $this->m_timbangan->gettotalyapindex($tanggal,$tanggal1,$nobongkar); 






        $data['grandtotalisi'] = $this->m_timbangan->grandtotalisi($tanggal,$tanggal1,$nobongkar); 
        $data['grandtotalkosong'] = $this->m_timbangan->grandtotalkosong($tanggal,$tanggal1,$nobongkar); 
        $data['grandtotalbersih'] = $this->m_timbangan->grandtotalbersih($tanggal,$tanggal1,$nobongkar); 
        $data['grandtotalmobil'] = $this->m_timbangan->grandtotalmobil($tanggal,$tanggal1,$nobongkar); 


        $data['timbangan'] = $this->m_timbangan->getkapal($nobongkar); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_timbangan', $data);
 
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
        
        $data['timbanganbgr'] = $this->m_timbangan->gettimbanganbgrfull($nobongkar); 
        $data['timbanganisab'] = $this->m_timbangan->gettimbanganisabfull($nobongkar); 
        $data['timbangantatum'] = $this->m_timbangan->gettimbangantatumfull($nobongkar); 
        $data['timbanganpundi'] = $this->m_timbangan->gettimbanganpundifull($nobongkar); 
        $data['timbanganwaterindex'] = $this->m_timbangan->gettimbanganwaterindexfull($nobongkar); 
        $data['timbanganyapindex'] = $this->m_timbangan->gettimbanganyapindexfull($nobongkar); 



        $data['timbanganbgr1'] = $this->m_timbangan->gettimbanganbgr1full($nobongkar);
        $data['timbanganisab1'] = $this->m_timbangan->gettimbanganisab1full($nobongkar);
        $data['timbangantatum1'] = $this->m_timbangan->gettimbangantatum1full($nobongkar);
        $data['timbanganpundi1'] = $this->m_timbangan->gettimbanganpundi1full($nobongkar);
        $data['timbanganwaterindex1'] = $this->m_timbangan->gettimbanganwaterindex1full($nobongkar);
        $data['timbanganyapindex1'] = $this->m_timbangan->gettimbanganyapindex1full($nobongkar);




        $data['isibgr'] = $this->m_timbangan->getisibgrfull($nobongkar); 
        $data['isiisab'] = $this->m_timbangan->getisiisabfull($nobongkar); 
        $data['isitatum'] = $this->m_timbangan->getisitatumfull($nobongkar); 
        $data['isipundi'] = $this->m_timbangan->getisipundifull($nobongkar); 
        $data['isiwaterindex'] = $this->m_timbangan->getisiwaterindexfull($nobongkar); 
        $data['isiyapindex'] = $this->m_timbangan->getisiyapindexfull($nobongkar); 




        $data['kosongbgr'] = $this->m_timbangan->getkosongbgrfull($nobongkar); 
        $data['kosongisab'] = $this->m_timbangan->getkosongisabfull($nobongkar); 
        $data['kosongtatum'] = $this->m_timbangan->getkosongtatumfull($nobongkar); 
        $data['kosongpundi'] = $this->m_timbangan->getkosongpundifull($nobongkar); 
        $data['kosongwaterindex'] = $this->m_timbangan->getkosongwaterindexfull($nobongkar);
        $data['kosongyapindex'] = $this->m_timbangan->getkosongyapindexfull($nobongkar); 





        $data['totalbgr'] = $this->m_timbangan->gettotalbgrfull($nobongkar); 
        $data['totalisab'] = $this->m_timbangan->gettotalisabfull($nobongkar); 
        $data['totaltatum'] = $this->m_timbangan->gettotaltatumfull($nobongkar); 
        $data['totalpundi'] = $this->m_timbangan->gettotalpundifull($nobongkar); 
        $data['totalwaterindex'] = $this->m_timbangan->gettotalwaterindexfull($nobongkar); 
        $data['totalyapindex'] = $this->m_timbangan->gettotalyapindexfull($nobongkar); 






        $data['min'] = $this->m_timbangan->min($nobongkar); 
        $data['max'] = $this->m_timbangan->max($nobongkar); 

        $data['grandtotalisi'] = $this->m_timbangan->grandtotalisifull($nobongkar); 
        $data['grandtotalkosong'] = $this->m_timbangan->grandtotalkosongfull($nobongkar); 
        $data['grandtotalbersih'] = $this->m_timbangan->grandtotalbersihfull($nobongkar); 
        $data['grandtotalmobil'] = $this->m_timbangan->grandtotalmobilfull($nobongkar); 


        $data['timbangan'] = $this->m_timbangan->getkapal($nobongkar); 
        
        $data['title'] = 'Cetak PDF Data BAR';  
        //query model semua barang 
        $this->load->view('v_report/v_c_timbangan', $data);
 
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