<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/menu_model',
			'setting_model'
		)); 
 
		
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
 

	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('menu_list');
		#-------------------------------#
		$data['menus'] = $this->menu_model->read();
		$data['menuLang'] = $this->menu_model->read_language();
		$data['content'] = $this->load->view('website/pages/menu',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_menu');
		#-------------------------------# 
		$this->form_validation->set_rules('name', display('menu_name'),'required');
		$this->form_validation->set_rules('position', display('position'),'required');
		#-------------------------------#

		$data['menu'] = (object)$menuData = [
			'id' 			 => $this->input->post('id'),
			'name' 			 => $this->input->post('name'),
			'parent_id' 	 => $this->input->post('parent_id'),
			'position' 		 => $this->input->post('position'),
			'status'         => $this->input->post('status')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($menuData['id'])) {

				    if($this->permission->method('menu','create')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->menu_model->create($menuData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/menu/create');
			} else {

				    if($this->permission->method('menu','update')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

				
				if ($this->menu_model->update($menuData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/menu/edit/'.$menuData['id']);
			}
		} else {
			$data['menu_list'] = $this->menu_model->menu_list();
			$data['content'] = $this->load->view('website/pages/menu_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 

	public function create_language($id = null){
		$data['module'] = display("website");
		$data['title'] = display('language');
		#-------------------------------# 
		$this->form_validation->set_rules('language', display('language'),'required');
		$this->form_validation->set_rules('menu_id', display('menu_name'),'required');
		$this->form_validation->set_rules('title', display('title'),'required|max_length[60]');
		#-------------------------------#

		$data['menu'] = (object)$menuData = [
			'id' 			 => $this->input->post('id'),
			'menu_id' 		 => $this->input->post('menu_id'),
			'title' 		 => $this->input->post('title'),
			'language'       => $this->input->post('language')
		];
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($menuData['id'])) {

				    if($this->permission->method('menu','create')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

		        //check language exists
				$pos_res = $this->db->select('*')
							->from('ws_menu_lang')
							->where('menu_id',$menuData['menu_id'])
							->where('language', $menuData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('website/menu/create_language/'.$menuData['menu_id']);
				}else{
					if ($this->menu_model->create_lang($menuData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('website/menu/create_language/'.$menuData['menu_id']);
				}
			} else {

				    if($this->permission->method('menu','update')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

				
				if ($this->menu_model->update_lang($menuData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/menu/edit_lang/'.$menuData['id']);
			}
		} else {
			$data['languageList'] = $this->setting_model->languageList();
			$data['menu'] = $this->menu_model->read_by_id($id);
			$data['content'] = $this->load->view('website/pages/menu_lang_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 


	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('menu_edit');
		#-------------------------------#		
		$data['menu_list'] = $this->menu_model->menu_list();
		$data['menu'] = $this->menu_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/menu_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
	
	public function edit_lang($id = null){
		$data['module'] = display("website");
		$data['title'] = display('menu_edit');
		#-------------------------------#		
		$data['languageList'] = $this->setting_model->languageList();
		$data['menu'] = $this->menu_model->read_lang_by_id($id);
		$data['content'] = $this->load->view('website/pages/menu_lang_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($id = null) 
	{
		if ($this->menu_model->delete($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/menu/');
	}

	public function delete_lang($id = null) 
	{
		if ($this->menu_model->delete_lang($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception', display('please_try_again'));
		}
		redirect('website/menu/');
	}

	public function change_status() {
		$this->form_validation->set_rules('id', display('id'), 'required|strip_tags|max_length[11]'); 
		$this->form_validation->set_rules('value',display('menu'), 'required|strip_tags|max_length[11]');   
		#-------------------------------#		
		if ($this->form_validation->run() === true) {

			$id = $this->input->post('id', true);
			$value = $this->input->post('value', true);

			$this->db->set('status', $value)
					->where('id', $id)
					->update('ws_menu');

			if ($this->db->affected_rows() > 0) {
				#set success message
				if ($value == 1) {
					$data['message'] = display('added_to_website_successfully');
				} else {
					$data['message'] = display('removed_form_website_successfully');
				}
			} else {
				#set exception message
				$data['exception'] = display('please_try_again');
			}

		} else {
			#set exception message
			$data['exception'] = validation_errors();
		}  
		echo json_encode($data);
	}



}
