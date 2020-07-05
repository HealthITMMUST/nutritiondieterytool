<?php


require APPPATH . 'libraries/REST_Controller.php';


class Diseases extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index_get(){

    	$baseUrl = base_url();

        $diseases = getTableData('disease');
        $mainArray = array();
        foreach ($diseases as $disease){
        	$icon = $disease['icon'];
				$imagePath = $baseUrl . 'assets/imgs/' . $icon;
				$disease['baseUrl'] = $imagePath;
			array_push($mainArray, $disease);
		}
        $res = array(
            'success' => true,
            'data' => $mainArray
        );

        $this->response($res, REST_Controller::HTTP_OK);
    }


	public function index_post()
	{
		$firstname = $this->input->post('fname');
		$surname = $this->input->post('surname');
		$phone = $this->input->post('phone');
		$device_id = $this->input->post('device_id');
		$location = $this->input->post('location');
		$gender = $this->input->post('gender');
		$dob = $this->input->post('dob');
		$national_id = $this->input->post('national_id');

		if ($firstname != null && $surname != null && $phone != null && $device_id != null && $location != null && $gender != null && $dob != null  && $national_id != null ) {

			$formdata = $this->input->post();
			$count = get_count_where('users',array('device_id'=>$device_id));
			if ($count > 0){
				$qry = updateRecord(array('device_id'=>$device_id),'users',$formdata);
				if ($qry) {
					$res = array('success' => true, 'message' => "User has been added updated");
				} else {
					$res = array('success' => false, 'message' => "Error while trying to update the user. Try again");
				}

			}else {
				$qry = $this->db->insert('users', $formdata);
				if ($qry) {
					$res = array('success' => true, 'message' => "User has been added successfully");
				} else {
					$res = array('success' => false, 'message' => "Error during registration. Try again");
				}
			}

		}else{
			$res = array('success' => false, 'message' => "Provide all the required fields");
		}


		$this->response($res, REST_Controller::HTTP_OK);


	}


}
