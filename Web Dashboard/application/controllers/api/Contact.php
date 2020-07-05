<?php


require APPPATH . 'libraries/REST_Controller.php';


class Contact extends REST_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function index_get()
	{

		$contacts = getTableDataObject('contact');
		$res = array(
			'success' => true,
			'data' => $contacts
		);

		$this->response($res, REST_Controller::HTTP_OK);
	}

	//This method sends messages. It is called by the Update User method. You will not use it directly

	public function sendSmS($phone, $message)
	{

		//	echo 'Send alert message to ' . $phone . "<br>";
		//	echo 'Message' . $message . "<br>";
		$sender_id = 'eKonnect'; //Your Default senderId
		$apikey = 'ZDg3MjUxNzdlODc3NDk3N2U4MjVjY2'; // Check under Settings->API Keys in vsoft.co.ke
		$username = 'tesla'; // Your sms.vsoft.co.ke Username
		$api_url = "https://sms.vsoft.co.ke/api/send_sms";
		$post_data = 'username=' . $username . '&api_key=' . $apikey . '&message=' . $message . '&phone=' . $phone . '&sender_id=' . $sender_id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		echo $result;


	}

	public function index_post()
	{
		$from_contact = $this->input->post('from_contact');
		$to_contact = $this->input->post('to_contact');
		$location = $this->input->post('location');
		$date = $this->input->post('date');

		if ($from_contact != null && $to_contact != null && $location != null && $date != null) {
			if ($from_contact == $to_contact) {
				$res = array('success' => false, 'message' => "Invalid data");

			} else {

				$formdata = $this->input->post();
				$qry = $this->db->insert('contact', $formdata);
				if ($qry) {
					$res = array('success' => true, 'message' => "Record has been added successfully");
				} else {
					$res = array('success' => false, 'message' => "Error during data transmission. Try again");
				}

				$to_contactHealthStatus = getColumn('users', array('device_id' => $to_contact), 'status');
				if ($to_contactHealthStatus === 'positive') {
					$from_contactPhone = getColumn('users', array('device_id' => $from_contact), 'phone');
					$messageToSend = "Hello, you have come in contact with a covid-19 patient. Kindly follow: 1. Quarantine yourself 2. Contact health ministry by dialing 719.";
					$this->sendSmS($from_contactPhone, $messageToSend);
				}
			}
		} else {
			$res = array('success' => false, 'message' => "Provide all the required fields");
		}
		$this->response($res, REST_Controller::HTTP_OK);
	}


}
