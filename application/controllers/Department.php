<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 |----Department for BackEnd-------|
*/
class Department extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'department_model', 
			'main_department_model',
			'setting_model'
		));
		
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 

	}
 
	public function index(){
		$data['module'] = display("departments");
		$data['title'] = display('department_list');
		#-------------------------------#
		$data['departments'] = $this->department_model->read();
		$data['departLang'] = $this->department_model->read_language();
		$data['content'] = $this->load->view('department/department',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

 	public function create(){
 		$data['module'] = display("departments");
		$data['title'] = display('add_department');
		#-------------------------------#
		$this->form_validation->set_rules('name', display('department_name') ,'required|max_length[100]');
		$this->form_validation->set_rules('description', display('description'),'trim');
		$this->form_validation->set_rules('main_id', display('main_department'),'required');
		$this->form_validation->set_rules('status', display('status') ,'required');
		#-------------------------------#

		//image upload
		$image = $this->fileupload->do_upload(
			'assets_web/img/department/',
			'image'
		); 

		//if image is not uploaded
		if ($image === false) {
			$this->session->set_flashdata('exception', display('invalid_image'));
		} 

		$data['department'] = (object)$postData = [
			'dprt_id' 	  => $this->input->post('dprt_id',true),
			'name' 		  => $this->input->post('name',true),
			'main_id' 		  => $this->input->post('main_id',true),
			'flaticon' 		  => $this->input->post('flaticon',false),
			'description' => $this->input->post('description',true),
			'image' => (!empty($image)?$image:$this->input->post('old_image')),
			'status'      => $this->input->post('status',true)
		]; 
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if image file is emplty
			if(empty($postData['image'])) {
				$this->session->set_flashdata('exception', display('image_is_required'));
				redirect('department/create');
			}

			#if empty $dprt_id then insert data
			if (empty($postData['dprt_id'])) {
				if ($this->department_model->create($postData)) {
					$ID = $this->db->insert_id();
					$langtData = [
						'department_id' => $ID,
						'language' 		=> $this->session->userdata('tableLang'),
						'name' 		    => $this->input->post('name',true),
						'description'   => $this->input->post('description',true),
						'status'        => $this->input->post('status',true)
					]; 
					$this->department_model->create_lang($langtData);
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('department/create');
			} else {
				if ($this->department_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('department/edit/'.$postData['dprt_id']);
			}

		} else {
			$data['main_department'] = $this->main_department_model->main_department_list();
			$data['content'] = $this->load->view('department/department_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	public function edit($dprt_id = null){
		$data['module'] = display("departments");
		$data['title'] = display('department_edit');
		#-------------------------------#
		$data['department'] = $this->department_model->read_by_id($dprt_id);
		$data['main_department'] = $this->main_department_model->main_department_list();
		$data['content'] = $this->load->view('department/department_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($dprt_id = null) 
	{
		if ($this->department_model->delete($dprt_id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('department');
	}

	public function create_language($department_id = null){
		$data['module'] = display("departments");
		$data['title'] = display('add_department');
		#-------------------------------#
		$this->form_validation->set_rules('name', display('department_name') ,'required|max_length[100]');
		$this->form_validation->set_rules('description', display('description'),'trim');
		#-------------------------------#

		$data['department'] = (object)$postData = [
			'id' 	        => $this->input->post('id',true),
			'department_id' => $this->input->post('department_id',true),
			'language' 		    => $this->input->post('language',true),
			'name' 		    => $this->input->post('name',true),
			'description'   => $this->input->post('description',true),
			'status'      => $this->input->post('status',true)
		]; 

		#-------------------------------#
		if ($this->form_validation->run() === true) {
		
			#if empty $dprt_id then insert data
			if (empty($postData['id'])) {
				//check language exists
				$pos_res = $this->db->select('*')
							->from('department_lang')
							->where('department_id',$postData['department_id'])
							->where('language', $postData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('department/create_language/'.$postData['department_id']);
				}else{
					if ($this->department_model->create_lang($postData)) {
						#set success message
						$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception',display('please_try_again'));
					}
					redirect('department/create_language/'.$postData['department_id']);
				}
			} else {
				if ($this->department_model->update_lang($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception',display('please_try_again'));
				}
				redirect('department/edit_lang/'.$postData['id']);
			}

		} else {
			$data['department'] = $this->department_model->read_by_id($department_id);
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('department/department_lang_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	public function edit_lang($id = null){
		$data['module'] = display("departments");
		$data['title'] = display('department_edit');
		#-------------------------------#
		$data['languageList'] = $this->setting_model->languageList();
		$data['deptLang'] = $this->department_model->read_lang_by_id($id);
		$data['content'] = $this->load->view('department/department_lang_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
  
}
