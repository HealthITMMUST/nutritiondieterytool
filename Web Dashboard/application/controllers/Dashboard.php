<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$userId = $this->session->userdata('userID');
		if(empty($userId)){
			redirect('login');
		}else {

			$data['notifications'] = getTableDataObjectOrderAsc('notifications', 'id');
			$this->load->view('header');
			$this->load->view('sider');
			$this->load->view('dashboard', $data);
			$this->load->view('footer');
		}
	}

	public function addNotifications(){

		$message = $this->input->post('message');

		$userId = $this->session->userdata('userID');

		date_default_timezone_set('Africa/Nairobi');
		$today = date("F j, Y, g:i a");

		$postData = array(
			'message' => $message,
			'sender_id'=>$userId,
			'date'=> $today
		);
		$insertArray = insertRecord('notifications', $postData);
		if ($insertArray['success'] == true){
			redirect('dashboard');
		}else{
			echo "failed";
		}
	}


}
