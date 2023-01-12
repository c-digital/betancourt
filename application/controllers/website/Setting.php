<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/setting_model',
			'website/home_model'
		));

		if ($this->session->userdata('isLogIn') == false) 
		redirect('login'); 
	}
   

	public function index(){
		$data['module'] = display("website");
		$data['title'] = display('website_setting');
		#-------------------------------#
		//check setting table row if not exists then insert a row
		$this->check_setting();
		#-------------------------------#
		$data['settings'] = $this->setting_model->read();
		$data['content'] = $this->load->view('website/pages/setting',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
  
	public function create($id = null){
		$data['module'] = display("website");
		$data['title'] = display('website_setting');
		#-------------------------------#  
		$this->form_validation->set_rules('title', display('website_title'),'required|max_length[100]');
		$this->form_validation->set_rules('description', display('description'),'max_length[255]');
		$this->form_validation->set_rules('meta_tag', display('meta_tag'),'max_length[255]');
		$this->form_validation->set_rules('meta_keyword', display('meta_keyword'),'max_length[255]');
		$this->form_validation->set_rules('phone', display('phone'),'required');
		$this->form_validation->set_rules('address', display('address'),'required|max_length[255]'); 
		$this->form_validation->set_rules('closed_day', display('closed_day'),'required|max_length[25]'); 
		$this->form_validation->set_rules('open_day', display('open_day'),'required|max_length[30]'); 
		$this->form_validation->set_rules('copyright_text', display('copyright_text'),'max_length[255]');  
		#-------------------------------#
		$data['setting'] = (object)$postData = [
			'id'  		  => $this->input->post('id'),
			'language' 	  => $this->input->post('language'),
			'title' 	  => $this->input->post('title'),
			'description' => $this->input->post('description',false),
			'meta_tag' 	  => $this->input->post('meta_tag'),
			'meta_keyword' => $this->input->post('meta_keyword'),
			'address'     => $this->input->post('address'),
			'phone' 	  => $this->input->post('phone'),
			'closed_day'  => $this->input->post('closed_day'),
			'open_day' 	  => $this->input->post('open_day'),
			'text' 	      => $this->input->post('text'),
			'fax' 	      => $this->input->post('fax'),
			'copyright_text' => $this->input->post('copyright_text',false),
			'working_hour' => $this->input->post('working_hour',true),
			'status'      => $this->input->post('status'),
		]; 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($postData['id'])) {
				//check language exists
				$pos_res = $this->db->select('*')
							->from('ws_setting')
							->where('language', $postData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('website/setting/create');
				}else{
					if ($this->setting_model->create($postData)) {
					$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
				}
			} else {

				if ($this->setting_model->update($postData)) {
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					$this->session->set_flashdata('exception', display('please_try_again'));
				} 
			}
			redirect('website/setting');

		} else { 
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('website/pages/setting_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	public function edit($id = null) { 
		$data['module'] = display("website");
		$data['title'] = display('website_setting');
		#-------------------------------#		
		$data['languageList'] = $this->setting_model->languageList();
		$data['setting'] = $this->setting_model->read_by_id($id);
		$data['content'] = $this->load->view('website/pages/setting_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	// delete setting
	public function delete($id = null){
        if ($this->setting_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('website/setting');
    }

	// common settings
	public function common(){
		$data['module'] = display("website");
		$data['title'] = display('website_setting');
		#-------------------------------#
		$data['settings'] = $this->setting_model->read_common();
		$data['content'] = $this->load->view('website/pages/common',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	// update common settings
	public function update_common($id = null){
		$data['module'] = display("website");
		$data['title'] = display('website_setting');
		#-------------------------------# 
		$this->form_validation->set_rules('email', display('email'),'required'); 
		$this->form_validation->set_rules('app_url', display('app_store').' '.display('url'),'required'); 
		$this->form_validation->set_rules('twitter_api', display('twitter_api'),'max_length[1000]'); 
		$this->form_validation->set_rules('google_map', display('google_map'),'max_length[1000]'); 
		$this->form_validation->set_rules('google_map_api', display('google_map_api'),'max_length[1000]'); 
		$this->form_validation->set_rules('facebook', display('facebook_url'),'valid_url|max_length[100]');
		$this->form_validation->set_rules('twitter', display('twitter_url'),'valid_url|max_length[100]');
		$this->form_validation->set_rules('vimeo',display('vimeo_url'),'valid_url|max_length[100]');
		$this->form_validation->set_rules('instagram', display('instagram_url'),'valid_url|max_length[100]');
		$this->form_validation->set_rules('dribbble', display('dribbble_url'),'valid_url|max_length[100]');
		$this->form_validation->set_rules('skype', display('skype_url'),'valid_url|max_length[100]');
		#-------------------------------#
		//logo upload
		$logo = $this->fileupload->do_upload(
			'assets_web/images/icons/',
			'logo'
		);
		// if logo is uploaded then resize the logo
		if ($logo !== false && $logo != null) {
			$this->fileupload->do_resize(
				$logo, 
				150,
				45
			);
		}
		//if logo is not uploaded
		if ($logo === false) {
			$this->session->set_flashdata('exception', display('invalid_logo'));
		}

		//favicon upload
		$favicon = $this->fileupload->do_upload(
			'assets_web/images/icons/',
			'favicon'
		);
		// if favicon is uploaded then resize the favicon
		if ($favicon !== false && $favicon != null) {
			$this->fileupload->do_resize(
				$favicon, 
				32,
				32
			);
		}
		//if favicon is not uploaded
		if ($favicon === false) {
			$this->session->set_flashdata('exception', display('invalid_favicon'));
		}
		#-------------------------------# 

		$data['setting'] = (object)$postData = [
			'id'  		  => $this->input->post('id'),
			'email' 	  => $this->input->post('email'),
			'AppStoreUrl' => $this->input->post('app_url'),
			'logo' 	      => (!empty($logo)?$logo:$this->input->post('old_logo')),
			'favicon' 	  => (!empty($favicon)?$favicon:$this->input->post('old_favicon')),
			'twitter_api' => $this->input->post('twitter_api',false),
			'google_map'  => $this->input->post('google_map',false),
			'google_map_api'  => $this->input->post('google_map_api',false),
			'facebook'    => $this->input->post('facebook'),
			'twitter'     => $this->input->post('twitter'),
			'vimeo'       => $this->input->post('vimeo'),
			'instagram'   => $this->input->post('instagram'),
			'dribbble'    => $this->input->post('dribbble'),
			'skype'       => $this->input->post('skype'),
			'google_plus' => $this->input->post('google_plus'),
			'direction'    => $this->input->post('direction'),
			'latitude'    => $this->input->post('latitude'),
			'longitude'   => $this->input->post('longitude'),
			'map_active'   => $this->input->post('map_active'),
			'status'      => $this->input->post('status'),
		]; 
		#-------------------------------#
		if ($this->form_validation->run() === true) {
			
			if ($this->setting_model->update_common($postData)) {
				$this->session->set_flashdata('message', display('update_successfully'));
			} else {
				$this->session->set_flashdata('exception', display('please_try_again'));
			} 
			redirect('website/setting/update_common/'.$postData['id']);

		} else { 
			$data['setting'] = $this->setting_model->read_common_by_id($id);
			$data['content'] = $this->load->view('website/pages/basic_setting_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	//check setting table row if not exists then insert a row
	public function check_setting(){

	}

	// change website QR status
	public function change_qr() {

		$this->form_validation->set_rules('id', display('id'), 'required|strip_tags|max_length[11]');  
		#-------------------------------#		
		if ($this->form_validation->run() === true) {

			$id = $this->input->post('id', true);
			$value = $this->input->post('value', true);

			$this->db->set('isQRCode', $value)
					->where('id', $id)
					->update('ws_setting');

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
