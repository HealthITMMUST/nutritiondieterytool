<?php


require APPPATH . 'libraries/REST_Controller.php';


class Notifications extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index_get()
	{
		$notifications = getTableData('notifications');
		$res = array(
			'success' => true,
			'data' => $notifications
		);

		$this->response($res, REST_Controller::HTTP_OK);
	}

}
