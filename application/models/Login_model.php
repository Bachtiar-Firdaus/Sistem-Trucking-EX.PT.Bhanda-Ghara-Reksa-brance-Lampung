<?php
class Login_model extends CI_Model{
	//cek nip dan password dosen
	function auth_dosen($username,$password){
		$query=$this->db->query("SELECT * FROM dosen WHERE nip='$username' AND pass='$password' LIMIT 1");
		return $query;
	}

		//cek nim dan password mahasiswa
		function auth_mahasiswa($username,$password){
			$query=$this->db->query("SELECT * FROM mahasiswa WHERE nim='$username' AND pass='$password' LIMIT 1");
			return $query;
		}

}





