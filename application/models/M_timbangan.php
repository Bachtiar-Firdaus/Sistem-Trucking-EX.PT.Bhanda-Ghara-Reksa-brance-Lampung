<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_timbangan extends CI_Model {

	var $table = 'tbl_pelabuhan_timbangan';
	var $table1 = 'tbl_gd_bgrserengsem';
	var $table2 = 'tbl_gd_tatum';
	var $table3 = 'tbl_gd_yapindex';
	var $table4 = 'tbl_gd_waterindex';
	var $table5 = 'tbl_gd_pundi';
	var $table6 = 'tbl_gd_isab';
	var $column_order = array('nourut','nobongkar','nosuratjalan','nopolisi','namasupir','tujuangudang','pricipal','party','jenispupuk','timbangisi','timbangkosong','beratbersih','tanggal','brangkat','tiba','bermasalah',null); //set column field database for datatable orderable
	var $column_search = array('nourut','nobongkar','nosuratjalan','nopolisi','namasupir','tujuangudang','pricipal','party','jenispupuk','timbangisi','timbangkosong','beratbersih','tanggal','brangkat','tiba','bermasalah'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('nourut' => 'desc'); // default order 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		if($result != null){
		$a = $result->nobongkar;
		$this->db->like('nobongkar', $a);
		}
		$this->db->from($this->table);

		$i = 0;
	
		foreach ($this->column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('nosuratjalan',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save1($data1)
	{
		$this->db->insert($this->table1, $data1);
		return $this->db->insert_id();
	}
	public function save2($data1)
	{
		$this->db->insert($this->table2, $data1);
		return $this->db->insert_id();
	}
	public function save3($data1)
	{
		$this->db->insert($this->table3, $data1);
		return $this->db->insert_id();
	}
	public function save4($data1)
	{
		$this->db->insert($this->table4, $data1);
		return $this->db->insert_id();
	}
	public function save5($data1)
	{
		$this->db->insert($this->table5, $data1);
		return $this->db->insert_id();
	}
	public function save6($data1)
	{
		$this->db->insert($this->table6, $data1);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('nosuratjalan', $id);
		$this->db->delete($this->table);
	}








	public function gettimbanganbgr($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
	public function gettimbanganbgr1($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_bgr FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	}
    public function getisibgr($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    
    public function getkosongbgr($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function gettotalbgr($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    } 





	public function gettimbanganisab($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
	public function gettimbanganisab1($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_isab FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	}
    public function getisiisab($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    
    public function getkosongisab($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function gettotalisab($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    } 













	public function gettimbangantatum($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
	public function gettimbangantatum1($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_tatum FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	}
    public function getisitatum($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    
    public function getkosongtatum($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function gettotaltatum($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    } 









	public function gettimbanganpundi($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
	public function gettimbanganpundi1($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_pundi FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	}
    public function getisipundi($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    
    public function getkosongpundi($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function gettotalpundi($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    } 








	public function gettimbanganwaterindex($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
	public function gettimbanganwaterindex1($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_waterindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	}
    public function getisiwaterindex($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    
    public function getkosongwaterindex($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function gettotalwaterindex($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    } 







	public function gettimbanganyapindex($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
	public function gettimbanganyapindex1($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_yapindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	}
    public function getisiyapindex($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    
    public function getkosongyapindex($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function gettotalyapindex($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    } 



	public function grandtotalmobil($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS gm FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar'  AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	}
    public function grandtotalisi($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    
    public function grandtotalkosong($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function grandtotalbersih($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    } 



























































	public function gettimbanganbgrfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' ");
        return $query->result();
    }
	public function gettimbanganbgr1full($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_bgr FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' ");
		return $data->result();
	}
    public function getisibgrfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' ");
        return $query->result();
    }    
    public function getkosongbgrfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' ");
        return $query->result();
    }
    public function gettotalbgrfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' ");
        return $query->result();
    } 





	public function gettimbanganisabfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' ");
        return $query->result();
    }
	public function gettimbanganisab1full($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_isab FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' ");
		return $data->result();
	}
    public function getisiisabfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' ");
        return $query->result();
    }    
    public function getkosongisabfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' ");
        return $query->result();
    }
    public function gettotalisabfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' ");
        return $query->result();
    } 













	public function gettimbangantatumfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' ");
        return $query->result();
    }
	public function gettimbangantatum1full($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_tatum FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' ");
		return $data->result();
	}
    public function getisitatumfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' ");
        return $query->result();
    }    
    public function getkosongtatumfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' ");
        return $query->result();
    }
    public function gettotaltatumfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' ");
        return $query->result();
    } 









	public function gettimbanganpundifull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' ");
        return $query->result();
    }
	public function gettimbanganpundi1full($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_pundi FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' ");
		return $data->result();
	}
    public function getisipundifull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI'");
        return $query->result();
    }    
    public function getkosongpundifull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' ");
        return $query->result();
    }
    public function gettotalpundifull($nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI'");
        return $query->result();
    } 








	public function gettimbanganwaterindexfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' ");
        return $query->result();
    }
	public function gettimbanganwaterindex1full($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_waterindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' ");
		return $data->result();
	}
    public function getisiwaterindexfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' ");
        return $query->result();
    }    
    public function getkosongwaterindexfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' ");
        return $query->result();
    }
    public function gettotalwaterindexfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX'");
        return $query->result();
    } 







	public function gettimbanganyapindexfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' ");
        return $query->result();
    }
	public function gettimbanganyapindex1full($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_yapindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' ");
		return $data->result();
	}
    public function getisiyapindexfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' ");
        return $query->result();
    }    
    public function getkosongyapindexfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' ");
        return $query->result();
    }
    public function gettotalyapindexfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX'");
        return $query->result();
    } 



	public function grandtotalmobilfull($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS gm FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar'  ");
		return $data->result();
	}
    public function grandtotalisifull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangisi) AS isi FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar' ");
        return $query->result();
    }    
    public function grandtotalkosongfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(timbangkosong) AS kosong FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar'");
        return $query->result();
    }
    public function grandtotalbersihfull($nobongkar){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS bersih FROM tbl_pelabuhan_timbangan WHERE nobongkar = '$nobongkar'  ");
        return $query->result();
    } 







	public function min($nobongkar)
	{
		$data = $this->db->query("SELECT MIN(tanggal) AS min FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar'  ");
		return $data->result();
	}


	public function max($nobongkar)
	{
		$data = $this->db->query("SELECT MAX(tanggal) AS max FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar'  ");
		return $data->result();
	}











    public function getkapal($nobongkar){
    	$query = $this->db->query("SELECT * FROM tbl_pricipal WHERE nobongkar = '$nobongkar'");
        return $query->result();
    } 
}
