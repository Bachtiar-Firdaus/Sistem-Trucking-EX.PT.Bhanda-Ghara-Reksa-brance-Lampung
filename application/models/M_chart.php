<?php
class M_chart extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
 
	public function graph()
	{

        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;

		$data = $this->db->query("SELECT * FROM `tbl_pelabuhan_timbangan` WHERE nobongkar = '".$a."'");
		return $data->result();
	} 	}

	public function graphbag1()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT * FROM `tbl_projek` WHERE nobongkar = '".$a."'");
		return $data->result();
	}
}
	public function graphbag2()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS value_sum FROM `tbl_pelabuhan_timbangan` WHERE nobongkar = '".$a."'");
		return $data->result();
	}
}
	public function graph2bag2()
	{        
		$data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){

		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS value_sum FROM `tbl_pelabuhan_timbangan` WHERE  (bermasalah = '1') AND (nobongkar = '$a')");
		return $data->result();
	}}
	public function graph2bag22()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_value_sum FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '1') AND (nobongkar = '$a')");
		return $data->result();
	} 
}
	public function graph2bag222()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_value_sum FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah between '1' AND '2') AND (nobongkar = '$a')");
		return $data->result();
	} 
}
	public function graphbag10()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS bgr FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND  (nobongkar = '$a') AND (tujuangudang = 'BGR SERENGSEM')");
		return $data->result();
	}
}
	public function graphbag11()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_bgr FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'BGR SERENGSEM')");
		return $data->result();
	} 
}
	public function graphbag20()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS isab FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'ISAB')");
		return $data->result();
	}
}
	public function graphbag21()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_isab FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'ISAB')");
		return $data->result();
	} 
}
	public function graphbag30()
	{
		$data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS pundi FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'PUNDI')");
		return $data->result();
	}
}
	public function graphbag31()
	{

		$data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_pundi FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'PUNDI')");
		return $data->result();
	} 
}
	public function graphbag40()
	{
		$data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS tatum FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'TATUM')");
		return $data->result();
	}}
	public function graphbag41()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_tatum FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'TATUM')");
		return $data->result();
	} 
}
	public function graphbag50()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS waterindex FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'WATERINDEX')");
		return $data->result();
	}
}
	public function graphbag51()
	{   $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){

		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_waterindex FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'WATERINDEX')");
		return $data->result();
	} 
}
	public function graphbag60()
	{

		$data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT SUM(beratbersih) AS yapindex FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'YAPINDEX')");
		return $data->result();
	}
}
	public function graphbag61()
	{
        $data = $this->db->get('tbl_projek');
        $result = $data->row();
        if($result != null){
		
		$data = $this->db->get('tbl_projek');
		$result = $data->row();
		$a = $result->nobongkar;
		$data = $this->db->query("SELECT COUNT(nobongkar) AS mob_yapindex FROM `tbl_pelabuhan_timbangan` WHERE (bermasalah = '2') AND (nobongkar = '$a') AND (tujuangudang = 'YAPINDEX')");
		return $data->result();
	} 
 }
}