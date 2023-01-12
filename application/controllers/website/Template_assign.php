<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template_Assign extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/menu_model',
			'website/template_model'
		)); 
 
		
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
 

	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('template_assign');
		#-------------------------------#
		$data['templates'] = $this->template_model->read();
		$data['content'] = $this->load->view('website/pages/template_assign',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function create(){
		$data['module'] = display("website");
		$data['title'] = display('add_template');
		#-------------------------------# 
		$this->form_validation->set_rules('title', display('title'),'max_length[150]');
		$this->form_validation->set_rules('description', display('description'),'trim');
		$this->form_validation->set_rules('menu_id', display('menu_name'),'required');
		$this->form_validation->set_rules('url', display('template_name'),'required');
		#-------------------------------#

		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets_web/img/template/',
			'featured_image'
		); 
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_featured_image'));
		}
		
		$data['template'] = (object)$tempData = [
			'id' 			 => $this->input->post('id'),
			'menu_id' 	     => $this->input->post('menu_id'),
			'title' 		 => $this->input->post('title'),
			'description'    => $this->input->post('description'),
			'featured_image' => (!empty($picture)?$picture:$this->input->post('old_image')),
			'url' 	         => $this->input->post('url'),
			'create_date'    => date('Y-m-d'),
			'status'         => $this->input->post('status')
		];

		#-------------------------------#
		if ($this->form_validation->run() === true) {
			#if empty $id then insert data
			if (empty($tempData['id'])) {

				    if($this->permission->method('add_template','create')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }


				if ($this->template_model->create($tempData)) {
					#set success message
					$this->session->set_flashdata('message', display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/template_assign/create');
			} else {

				    if($this->permission->method('template','update')->access()){

		            }
		            else{
		           	    redirect('dashboard/home');
		            }

				
				if ($this->template_model->update($tempData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('website/template_assign/edit/'.$tempData['id']);
			}
		} else {
			$data['menu_list'] = $this->menu_model->template_menu_list();
			$data['content'] = $this->load->view('website/pages/template_assign_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 


	public function edit($id = null){
		$data['module'] = display("website");
		$data['title'] = display('template_edit');
		#-------------------------------#		
		$data['menu_list'] = $this->menu_model->template_menu_list();
		$data['template'] = $this->template_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/template_assign_form',$data,true);
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
		redirect('website/template_assign/');
	}

	public function change_status(){

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
