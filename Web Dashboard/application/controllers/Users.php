<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{

		$data['users'] = getTableData('tb_users');
			$this->load->view('header');
		$this->load->view('sider');
		$this->load->view('users', $data);
		$this->load->view('footer');
	}


	public function addUser(){
		$userName = $this->input->post('name');
		$password = $this->input->post('password');

		$password = md5($password);
		$config['upload_path'] = FCPATH.'assets/imgs';
		$config['allowed_types'] = 'jpg|jpeg|png|pdf';
//
//		$config['max_size'] = '102400';
//		$config['max_width'] = '1024';
//		$config['max_height'] = '768';
		$config['field_name'] = 'icon';
		$new_name = time() . '-' . $_FILES["icon"]['name'];

		$config['file_name'] = $new_name;

		$_FILES["icon"]["name"];
		$this->load->library('upload', $config);

		if($this->upload->do_upload('icon')) {
			$data = $this->upload->data();
			$file_name= $data['file_name'];
			echo 	FCPATH.'assets/imgs';
		} else {

			print_r($this->upload->display_errors());
			echo 	FCPATH.'assets/imgs';
			return;
		}
		$this->load->library('upload', $config);

		$post_array = array(
			'name' => $userName,
			'icon' => $file_name,
			'password' => $password
		);

		$insertArray = insertRecord('tb_users', $post_array);

		if ($insertArray['success'] == true){
			redirect('users');
		}else{
			echo "failed";
		}
	}

}
