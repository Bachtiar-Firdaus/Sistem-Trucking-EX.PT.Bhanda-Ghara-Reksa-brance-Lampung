<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		$this->load->view('login');
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_pelabuhan=$this->login_model->auth_dosen($username,$password);

        if($cek_pelabuhan->num_rows() > 0){ //jika login sebagai dosen
						$data=$cek_pelabuhan->row_array();
        		$this->session->set_userdata('masuk',TRUE);

		         if($data['level']=='1'){ //Akses pelabuhan
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');

		         }else if($data['level']=='2'){ //akses timbangan
		            $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');

		         }else if($data['level']=='3'){ //akses kantor
		            $this->session->set_userdata('akses','3');
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');

		        }else if($data['level']=='4'){
		        	$this->session->set_userdata('akses','4'); //gudang_bgr_serengsem
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');

		        }else if($data['level']=='5'){
		        	$this->session->set_userdata('akses','5'); //akses_gudang_isab
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');

		        }else if($data['level']=='6'){
		        	$this->session->set_userdata('akses','6'); ////akses_gudang_pundi
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');

		        }else if($data['level']=='7'){
		        	$this->session->set_userdata('akses','7'); //akses_gudang_tatum
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');

		        }else if($data['level']=='8'){
		        	$this->session->set_userdata('akses','8'); //akses_gudang_waterindex
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');
		        }else if($data['level']=='9'){
		        	$this->session->set_userdata('akses','9'); //akses_gudang_yapindex
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');
		        }else if($data['level']=='10'){
		        	$this->session->set_userdata('akses','10'); //akses_gudang_yapindex
					$this->session->set_userdata('ses_id',$data['nip']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            redirect('page');
       			 }
       			}else{ 
							$url=base_url();
							echo $this->session->set_flashdata('msg','Username Atau Password Salah !!!');
							redirect($url);
					
        }

    }


    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}
