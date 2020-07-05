<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class One extends CI_Controller
{
	public function index()
	{
		$this->load->view('one');
	}

	public function download()
	{
		$this->load->helper('download');
		$path = FCPATH.'/assets/downloads/Health Pile.apk';
		force_download($path, NULL);
	}
}
