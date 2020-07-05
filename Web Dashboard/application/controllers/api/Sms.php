<?php


require APPPATH . 'libraries/REST_Controller.php';


class Sms extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index_get(){
        $users = getTableDataObject('users');
        $res = array(
            'success' => true,
            'data' => $users
        );

        $this->response($res, REST_Controller::HTTP_OK);
    }


	public function index_post()
	{
		$message ='This is a test';
		$sender_id = '22136'; //Your Default senderId
		$phone = '254705537065'; //for multiple concatinate with comma(,)
		$apikey = 'MjA1ZDYzNDlkOWY2M2YzNDhmMjQ2OD'; // Check under Settings->API Keys in vsoft.co.ke
		$username= 'Codemaster'; // Your sms.vsoft.co.ke Username
		$api_url="https://sms.vsoft.co.ke/api/send_sms";
		$post_data = 'username='.$username.'&api_key='.$apikey.'&message='.$message.'&phone='.$phone.'&sender_id='.$sender_id;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $api_url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch);
		echo $result;

		$res = array('success' => false, 'message' => "Provide all the required fields");
		$this->response($res, REST_Controller::HTTP_OK);


	}


}
