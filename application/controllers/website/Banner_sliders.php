<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_sliders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/banner_model'
		)); 
 
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}

	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('banner_list');
		#-------------------------------#
		$data['banners'] = $this->banner_model->read();
		$data['content'] = $this->load->view('website/pages/banner_list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_banner_slider');
		#-------------------------------# 
		$this->form_validation->set_rules('status', display('status'),'max_length[100]');
		//image upload
		$image = $this->fileupload->do_upload(
			'assets_web/img/banner/',
			'image'
		); 

		//if image is not uploaded
		if ($image === false) {
			$this->session->set_flashdata('exception', display('invalid_image'));
		} 

		#-------------------------------# 
		$data['slider'] = (object)$postData = [
			'id' 			 => $this->input->post('id'),
			'image' => (!empty($image)?$image:$this->input->post('old_image')),
			'status' => $this->input->post('status')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			if(empty($postData['image'])) {
				$this->session->set_flashdata('exception', display('image_is_required'));
				redirect('website/banner_sliders/create');
			}

			#if empty $id then insert data
			if (empty($postData['id'])) {
				
				   if($this->permission->method('slider','create')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }

				if ($this->banner_model->create($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/banner_sliders/create');
			} 

			else {
				    if($this->permission->method('slider','update')->access()){}
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->banner_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/banner_sliders/edit/'.$postData['id']);
			}
		} else {
			$data['content'] = $this->load->view('website/pages/add_banner_slider',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('edit_banner');
		#-------------------------------# 	
		$data['slider'] = $this->banner_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/add_banner_slider',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null) 
	{
		if ($this->banner_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/banner_sliders/');
	}

}

