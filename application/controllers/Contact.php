<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'website/home_model',
			'website/appointment_instruction_model',
			'enquiry_model',
			'website/menu_model',
			'website/about_model',
			'website/department_model'
		));

	}
 
	public function index()
	{
		$data['title'] = display('contact');
		#-----------Setting-------------# 
        $data['setting'] = $this->home_model->setting();  
        // redirect if website status is disabled
        if ($data['setting']->status == 0) 
            redirect(base_url('login'));
       
       $data['basics'] = $this->home_model->basic_setting();  
       $data['languageList'] = $this->home_model->languageList(); 
       $data['about'] = $this->about_model->read();
       $data['deptsFooter'] = $this->department_model->read_footer();
       //get menu list dynamically
       $data['parent_menu'] = $this->menu_model->get_parent_menu();
		#-----active appointment instruction--------#
       $data['instruction'] = $this->appointment_instruction_model->read_active_instuction();

		$data['content'] = $this->load->view('website/contact',$data,true);
       $this->load->view('website/index', $data);
	} 

	public function create()
	{
		$this->form_validation->set_rules('name',display('full_name'),'required|max_length[50]');
		$this->form_validation->set_rules('email',display('email')  ,'required|max_length[100]|valid_email');
		$this->form_validation->set_rules('subject',display('subject')  ,'required|max_length[100]');
		$this->form_validation->set_rules('enquiry',display('enquiry') ,'required');
		$this->form_validation->set_rules('human',display('human') ,'required');
		#-------------------------------#
		$postData = [
			'email' 	 => $this->input->post('email',true),
			'subject' 	 => $this->input->post('subject',true),
			'name' 		 => $this->input->post('name',true),
			'enquiry' 	 => $this->input->post('enquiry',true),
			'ip_address' => $this->input->ip_address(),
			'user_agent' => $this->input->user_agent(),
			'created_date' => date('Y-m-d H:i:s'),
			'status'     => 1
			];  

		if ($this->form_validation->run() === true) {
			if($this->input->post('capcha',true)==$this->input->post('human',true)){
				
				$this->db->insert('enquiry', $postData);
				if ($this->db->affected_rows() > 0) {
					#set success message
					$data['message'] = display('thank_you_for_contacting_with_us');
				} else {
					#set exception message
					$data['exception'] = display('please_try_again');
				} 
			 }else{
			 	#set capcha exception message
				$data['exception'] = display('invalid_captcha');
			 }

		} else {
			$data['exception'] = validation_errors();
		}  

		echo json_encode($data);
	}

 	
}
