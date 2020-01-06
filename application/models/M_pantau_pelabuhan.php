<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pantau_pelabuhan extends CI_Model {

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
    public function getpelabuhan($tanggal,$nobongkar) {
        $query = $this->db->query("SELECT * FROM  tbl_pelabuhan_timbangan where tanggal = '$tanggal' AND nobongkar = '$nobongkar'");
        return $query->result();
    }

    public function gettotal($tanggal){
    	$query = $this->db->query("SELECT SUM(beratbersih) AS value_sum FROM tbl_pelabuhan_timbangan WHERE tanggal = '$tanggal'");
        return $query->result();
    }    

    public function getkapal($nobongkar){
    	$query = $this->db->query("SELECT kapal FROM tbl_pricipal WHERE nobongkar = '$nobongkar'");
        return $query->result();
    } 

}
