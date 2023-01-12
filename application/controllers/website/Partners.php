<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/partner_model'
		)); 
 
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}

	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('partner_list');
		#-------------------------------#
		$data['partners'] = $this->partner_model->read();
		$data['content'] = $this->load->view('website/pages/partner',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_partner');
		#-------------------------------# 
		$this->form_validation->set_rules('name', display('name'),'max_length[100]');
		$this->form_validation->set_rules('url',  display('url'), 'trim|required|prep_url');
		#-------------------------------#		
		//image upload
		$image = $this->fileupload->do_upload(
			'assets_web/img/client-logo/',
			'image'
		); 

		//if image is not uploaded
		if ($image === false) {
			$this->session->set_flashdata('exception', display('invalid_image'));
		} 

		#-------------------------------# 
		$data['partner'] = (object)$parData = [
			'id' 			 => $this->input->post('id'),
			'name' 		 => $this->input->post('name'),
			'url' 		 => $this->input->post('url'),
			'image' => (!empty($image)?$image:$this->input->post('old_image')),
			'status' => $this->input->post('status')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			if(empty($parData['image'])) {
				$this->session->set_flashdata('exception', display('image_is_required'));
				redirect('website/partners/create');
			}



			#if empty $id then insert data
			if (empty($parData['id'])) {
				
				   if($this->permission->method('partner','create')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

				if ($this->partner_model->create($parData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/partners/create');
			} 

			else {
				    if($this->permission->method('partner','update')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->partner_model->update($parData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/partners/edit/'.$parData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/partner_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('partner_edit');
		#-------------------------------# 	
		$data['partner'] = $this->partner_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/partner_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null) 
	{
		if ($this->partner_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/partner/');
	}

}

