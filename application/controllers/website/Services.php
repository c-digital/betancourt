<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/service_model',
			'setting_model'
		)); 

		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
 
 
	public function index(){
		$data['module'] = display("website");
		$data['title'] = display("service");
		#-------------------------------#v
		$data['services'] = $this->service_model->read();
		$data['languages'] = $this->service_model->read_language();
		$data['content'] = $this->load->view('website/pages/service',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_service');
		#-------------------------------#  
		$this->form_validation->set_rules('language', display('language') , 'required'); 
		$this->form_validation->set_rules('name', display('name') , 'required|max_length[20]'); 
		$this->form_validation->set_rules('title', display('title') ,'required|max_length[100]');			
		$this->form_validation->set_rules('description',display('description'),'required'); 
		$this->form_validation->set_rules('position', display('position'),'numeric|max_length[2]'); 
		#-------------------------------#		
		//icon_image upload
		$icon_image = $this->fileupload->do_upload(
			'assets_web/img/service/',
			'icon_image'
		);
		
		//if icon_image is not uploaded
		if ($icon_image === false) {
			$this->session->set_flashdata('exception', display('invalid_icon_image'));
		}		
		#-------------------------------#
		
		$data['service'] = (object)$serviceData = [
			'id' 			 => $this->input->post('id', true),
			'language' 		 => $this->input->post('language', true),
			'name' 			 => $this->input->post('name', true),
			'title' 		 => $this->input->post('title', true),
			'description'    => $this->input->post('description', true),
			'position'       => $this->input->post('position', true),
			'icon_image'     => (!empty($icon_image)?$icon_image:$this->input->post('old_image')),
			'status'         => $this->input->post('status', true),
			'date'           => date('Y-m-d'),
			'is_parent'      => 0
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($serviceData['id'])) {

				if($this->permission->method('service','create')->access()){
	            }
	            else{
	           	    redirect('dashboard/home');
	            }
				
				if ($this->service_model->create($serviceData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/services/create');
			} else {

				if($this->permission->method('service','update')->access()){
	            }
	            else{
	           	    redirect('dashboard/home');
	            }
				

				if ($this->service_model->update($serviceData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/services/edit/'.$serviceData['id']);
			}
		} else {
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('website/pages/service_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function create_language($id = null){
		$data['module'] = display("website");
		$data['title'] = display('add_service');
		#-------------------------------#  
		$this->form_validation->set_rules('language', display('language') , 'required'); 
		$this->form_validation->set_rules('name', display('name') , 'required|max_length[20]'); 
		$this->form_validation->set_rules('title', display('title') ,'required|max_length[100]');			
		$this->form_validation->set_rules('description',display('description'),'required'); 
		$this->form_validation->set_rules('position', display('position'),'numeric|max_length[2]'); 
		#-------------------------------#		
		//icon_image upload
		$icon_image = $this->fileupload->do_upload(
			'assets_web/img/service/',
			'icon_image'
		);
		
		//if icon_image is not uploaded
		if ($icon_image === false) {
			$this->session->set_flashdata('exception', display('invalid_icon_image'));
		}		
		#-------------------------------# 
		
		$data['service'] = (object)$serviceData = [
			'id' 			 => $this->input->post('id', true),
			'language' 		 => $this->input->post('language', true),
			'name' 			 => $this->input->post('name', true),
			'title' 		 => $this->input->post('title', true),
			'description'    => $this->input->post('description', true),
			'position'       => $this->input->post('position', true),
			'icon_image'     => (!empty($icon_image)?$icon_image:$this->input->post('old_image')),
			'status'         => $this->input->post('status', true),
			'date'           => date('Y-m-d'),
			'is_parent'      => $this->input->post('service_id')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($serviceData['id'])) {

				if($this->permission->method('service','create')->access()){
	            }
	            else{
	           	    redirect('dashboard/home');
	            }

	            //check language exists
				$pos_res = $this->db->select('*')
							->from('ws_service')
							->group_start()
							    ->where('is_parent', 0)
							    ->or_where('is_parent',$serviceData['is_parent'])
							->group_end()
							->where('language', $serviceData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('website/services/create_language/'.$serviceData['is_parent']);
				}else{
					if ($this->service_model->create($serviceData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('website/services/create_language/'.$serviceData['is_parent']);
				}
			} else {

				if($this->permission->method('service','update')->access()){
	            }
	            else{
	           	    redirect('dashboard/home');
	            }

				if ($this->service_model->update($serviceData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/services/edit_lang/'.$serviceData['id']);
			}
		} else {
			$data['service'] = $this->service_model->read_by_id($id);
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('website/pages/service_lang_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 


	public function edit($id = null){ 
		$data['module'] = display("website");
		$data['title'] = display('service_edit');
		#-------------------------------#		
		$data['languageList'] = $this->setting_model->languageList();
		$data['service'] = $this->service_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/service_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function edit_lang($id = null){ 
		$data['module'] = display("website");
		$data['title'] = display('service_edit');
		#-------------------------------#		
		$data['languageList'] = $this->setting_model->languageList();
		$data['service'] = $this->service_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/service_lang_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete($id = null) 
	{ 
		if ($this->service_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message', display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('website/services/');
	}

}
