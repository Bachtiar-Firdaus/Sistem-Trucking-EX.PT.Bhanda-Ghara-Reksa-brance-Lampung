<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelabuhan extends CI_Model {

	var $table = 'tbl_pelabuhan_timbangan';
	var $column_order = array('nourut','nobongkar','nosuratjalan','nopolisi','namasupir','tujuangudang','pricipal','party','jenispupuk','tanggal','brangkat','tiba','bermasalah',null); //set column field database for datatable orderable
	var $column_search = array('nourut','nobongkar','nosuratjalan','nopolisi','namasupir','tujuangudang','pricipal','party','jenispupuk','tanggal','brangkat','tiba','bermasalah'); //set column field database for datatable searchable just firstname , lastname , address are searchable
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

	public function save($data)
	{
		$this->db->insert($this->table, $data);
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
    public function getpelabuhanbgr($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }



	public function getpelabuhanbgr1($tanggal,$tanggal1,$nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_bgr FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
	} 




    public function getpelabuhanisab($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }

    public function getpelabuhanisab1($tanggal,$tanggal1,$nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_isab FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
    }








    public function getpelabuhantatum($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function getpelabuhantatum1($tanggal,$tanggal1,$nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_tatum FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'TATUM' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
    }




    public function getpelabuhanpundi($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    

    public function getpelabuhanpundi1($tanggal,$tanggal1,$nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_pundi FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:01' AND '06:00:00') AND tanggal = '$tanggal1'))) ");
		return $data->result();
    }





    public function getpelabuhanwaterindex($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function getpelabuhanwaterindex1($tanggal,$tanggal1,$nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_waterindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
    }






    public function getpelabuhanyapindex($tanggal,$tanggal1,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }
    public function getpelabuhanyapindex1($tanggal,$tanggal1,$nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_yapindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
		return $data->result();
    }

    public function grandtotal($tanggal,$tanggal1,$nobongkar){
    	$query = $this->db->query("SELECT COUNT(nobongkar) AS gt FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND ((((brangkat between '06:00:00' AND '23:59:59') AND tanggal = '$tanggal') OR ((brangkat between '00:00:00' AND '05:59:59') AND tanggal = '$tanggal1'))) ");
        return $query->result();
    }    


















    public function getpelabuhanbgrfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where  nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM' ");
        return $query->result();
    }



	public function getpelabuhanbgr1full($nobongkar)
	{
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_bgr FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'BGR SERENGSEM'");
		return $data->result();
	} 




    public function getpelabuhanisabfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' ");
        return $query->result();
    }

    public function getpelabuhanisab1full($nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_isab FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'ISAB' ");
		return $data->result();
    }








    public function getpelabuhantatumfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'TATUM'");
        return $query->result();
    }
    public function getpelabuhantatum1full($nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_tatum FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'TATUM'");
		return $data->result();
    }




    public function getpelabuhanpundifull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' ");
        return $query->result();
    }    

    public function getpelabuhanpundi1full($nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_pundi FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'PUNDI' ");
		return $data->result();
    }





    public function getpelabuhanwaterindexfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' ");
        return $query->result();
    }
    public function getpelabuhanwaterindex1full($nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_waterindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'WATERINDEX' ");
		return $data->result();
    }






    public function getpelabuhanyapindexfull($nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' ");
        return $query->result();
    }
    public function getpelabuhanyapindex1full($nobongkar) {
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_yapindex FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar' AND tujuangudang = 'YAPINDEX' ");
		return $data->result();
    }

    public function grandtotalfull($nobongkar){
    	$query = $this->db->query("SELECT COUNT(nobongkar) AS gt FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar'");
        return $query->result();
    } 
    
    public function tanggalmax($nobongkar){
    	$query = $this->db->query("SELECT MAX(tanggal) AS max FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar'");
        return $query->result();
    }      

    public function tanggalmin($nobongkar){
    	$query = $this->db->query("SELECT MIN(tanggal) AS min FROM `tbl_pelabuhan_timbangan` where nobongkar = '$nobongkar'");
        return $query->result();
    }    

















    public function getkapal($nobongkar){
    	$query = $this->db->query("SELECT * FROM tbl_pricipal WHERE nobongkar = '$nobongkar'");
        return $query->result();
    } 

}
