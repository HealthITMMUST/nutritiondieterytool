<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diseases extends CI_Controller {

	public function index()
	{
		$data['diseases'] = getTableDataObjectOrderAsc('disease', 'position');
		$this->load->view('header');
		$this->load->view('sider');
		$this->load->view('diseases',$data );
		$this->load->view('footer');
	}

	public function disease($id){
		$data['diseaseId'] = $id;
		$this->load->view('header');
		$this->load->view('sider');
		$this->load->view('single_disease',$data );
		$this->load->view('footer');
	}

	public function  add(){
		$this->load->view('header');
		$this->load->view('sider');
		$this->load->view('add_disease');
		$this->load->view('footer');
	}

public function  edit($id){
	$data['diseaseId'] = $id;
		$this->load->view('header');
		$this->load->view('sider');
		$this->load->view('edit_disease',$data);
		$this->load->view('footer');
	}

	public function addDisease(){
		$diseaseName = $this->input->post('name');
		$description = $this->input->post('description');
		$position = $this->input->post('position');
		$prevention = $this->input->post('prevention');
		$nutrition = $this->input->post('nutrition');

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
			'name' => $diseaseName,
			'description' => $description,
			'position' => $position,
			'icon' => $file_name,
			'prevention' => $prevention,
			'nutrition' => $nutrition
		);

		$insertArray = insertRecord('disease', $post_array);

		if ($insertArray['success'] == true){
			redirect('diseases');
		}else{
			echo "failed";
		}
	}

	public function deleteDisease($id){
		$deleteArr = deleteRecord('disease', array('id'=>$id));
		if ($deleteArr['success'] == true){
			redirect('diseases');
		}else{
			echo "failed";
		}
	}
	public function editDisease($id){
		$diseaseName = $this->input->post('name');
		$description = $this->input->post('description');
		$position = $this->input->post('position');
		$prevention = $this->input->post('prevention');
		$nutrition = $this->input->post('nutrition');

		$post_array = array(
			'name' => $diseaseName,
			'description' => $description,
			'position' => $position,
			'prevention' => $prevention,
			'nutrition' => $nutrition
		);

		$updateArray = updateRecord(array('id'=>$id), 'disease', $post_array);
		if ($updateArray['success'] == true){
			redirect('diseases');
		}else{
			echo "failed";
		}
	}
}
