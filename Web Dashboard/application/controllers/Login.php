<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public  function authenticate(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

//		$password = md5($password);
		$where = array('name'=> $username, 'password'=>$password);
		if (get_count_where('tb_users', $where) > 0 ){
			$d=array(
				'userID'=>getColumn('tb_users',$where,'id'),
				'userName'=>$username,
				'photoPath'=>getColumn('tb_users', $where,'icon')
			);
			$this->session->set_userdata($d);
			redirect('dashboard');
		}else{
			echo "Wrong Credentials";
		}
	}
}
