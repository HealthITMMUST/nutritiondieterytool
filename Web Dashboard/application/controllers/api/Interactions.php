<?php


require APPPATH . 'libraries/REST_Controller.php';


class Interactions extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function index_get($device_id){

		$this->db
			->from('contact')
			->where( array("from_contact"=> $device_id))
			->or_where( array("to_contact"=> $device_id));

		$qry = $this->db->get()->result();

		foreach ($qry as $interaction){
			$from =  $interaction->from_contact;
			$to =  $interaction->to_contact;

			if ($from == $device_id){
				$partnerStatus = getColumn('users', array('device_id'=> $to), 'status');
				$interaction->healthStatus = $partnerStatus;
			}else{
				$partnerStatus = getColumn('users', array('device_id'=> $from), 'status');
				$interaction-> healthStatus = $partnerStatus;
			}
		}

        $res = array(
            'success' => true,
            'data' => $qry
        );
        $this->response($res, REST_Controller::HTTP_OK);
    }


}
