<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pantau_indikasi_pelabuhan extends CI_Model {

	
    public function getindikasi() {
    	date_default_timezone_set("Asia/Jakarta");
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){

        $data = $this->db->get('tbl_projek');
        $result = $data->row();

        $data11 = $this->db->where('id', '1');
        $data1 = $data11->get('tbl_jpt');
        $result1 = $data1->row();

        $data22 = $this->db->where('id', '2');
        $data2 = $data22->get('tbl_jpt');
        $result2 = $data2->row();

    	$a = date("H:i:s");
        $b = $result->nobongkar;
		$c = date("Y-m-d");
		$d = $result1->jtpelabuhantimbangan;

        $e = date('H:i:s', strtotime($d, strtotime($a)));

        $d1 = $result2->jtpelabuhantimbangan;

        $e1 = date('H:i:s', strtotime($d1, strtotime($e)));




        if($e1>=$a) {
            $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (brangkat <= '$e1') AND (tanggal != '$c') AND (nobongkar = '$b') AND (tiba = '00:00:00')");
            return $query->result();
        }


        else if ($e1<=$a) {
            $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (brangkat <= '$e1') AND (tanggal = '$c') AND (nobongkar = '$b') AND (tiba = '00:00:00')");
            return $query->result();
        }
    }


        }


}
