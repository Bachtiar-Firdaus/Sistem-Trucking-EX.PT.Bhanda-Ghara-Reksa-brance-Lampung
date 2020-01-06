<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pantau_indikasi_timbangan extends CI_Model {

    
    public function getindikasi1() {
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
        $d = $result1->jtgudangbgr;

        $e = date('H:i:s', strtotime($d, strtotime($a)));

        $d1 = $result2->jtgudangbgr;

        $e1 = date('H:i:s', strtotime($d1, strtotime($e)));

        if($e1>=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal != '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'BGR SERENGSEM')");
        return $query->result();
        }


        else if ($e1<=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal = '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'BGR SERENGSEM')");
        return $query->result();
        }
        }





    }   
    public function getindikasi2() {
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
        $d = $result1->jtgudangyapindex;

        $e = date('H:i:s', strtotime($d, strtotime($a)));

        $d1 = $result2->jtgudangyapindex;

        $e1 = date('H:i:s', strtotime($d1, strtotime($e)));



        if($e1>=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal != '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'YAPINDEX')");
        return $query->result();
        }


        else if ($e1<=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal = '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'YAPINDEX')");
        return $query->result();
        }
    }

    }   
    public function getindikasi3() {
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
        $d = $result1->jtgudangwaterindex;

        $e = date('H:i:s', strtotime($d, strtotime($a)));

        $d1 = $result2->jtgudangwaterindex;

        $e1 = date('H:i:s', strtotime($d1, strtotime($e)));




        if($e1>=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal != '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'WATERINDEX')");
        return $query->result();
        }


        else if ($e1<=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal = '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'WATERINDEX')");
        return $query->result();
        }
    }
    }   
    public function getindikasi4() {
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
        $d = $result1->jtgudangisab;

        $e = date('H:i:s', strtotime($d, strtotime($a)));

        $d1 = $result2->jtgudangisab;

        $e1 = date('H:i:s', strtotime($d1, strtotime($e)));
        
     

        if($e1>=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal != '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'ISAB')");
        return $query->result();
        }


        else if ($e1<=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal = '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'ISAB')");
        return $query->result();
        }
    }
    }   
    public function getindikasi5() {
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
        $d = $result1->jtgudangpundi;

        $e = date('H:i:s', strtotime($d, strtotime($a)));

        $d1 = $result2->jtgudangpundi;

        $e1 = date('H:i:s', strtotime($d1, strtotime($e)));




        if($e1>=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal != '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'PUNDI')");
        return $query->result();
        }


        else if ($e1<=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal = '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'PUNDI')");
        return $query->result();
        }
    }
    }   
    public function getindikasi6() {
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
        $d = $result1->jtgudangtatum;

        $e = date('H:i:s', strtotime($d, strtotime($a)));

        $d1 = $result2->jtgudangtatum;

        $e1 = date('H:i:s', strtotime($d1, strtotime($e)));



        if($e1>=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal != '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'TATUM')");
        return $query->result();
        }


        else if ($e1<=$a) {
        $query = $this->db->query("SELECT * FROM tbl_pelabuhan_timbangan WHERE (tiba <= '$e1')  AND (tanggal = '$c') AND (nobongkar = '$b') AND (beratbersih != '0') AND (bermasalah = '1') AND (tujuangudang = 'TATUM')");
        return $query->result();
        }
    }
    }

}
