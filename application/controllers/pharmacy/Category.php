<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'pharmacy/category_model'
		));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 
	}
 
	public function index(){
        $data['module'] = display("pharmacy");
		$data['title'] = display('medicine_category_list');  ;
		$data['categorys'] = $this->category_model->read();
		$data['content'] = $this->load->view('pharmacy/category_view',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 
 

	public function details($category_id = null)
	{  
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
        $data['module'] = display("pharmacy");
		$data['title'] = display('pharmacy');
		#-------------------------------#
		$data['category'] = $this->category_model->read_by_id($category_id);
		$data['content'] = $this->load->view('pharmacy/details',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

    public function form($id = null){ 
        $data['module'] = display("pharmacy");
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('name', display('category_name') ,'required|max_length[255]');
        $this->form_validation->set_rules('description', display('description'),'trim');
        $this->form_validation->set_rules('status', display('status') ,'required');

        /*-------------STORE DATA------------*/
        $start_date = $this->input->post('start_date');
        $end_date   = $this->input->post('end_date');

        $data['category'] = (object)$postData = array( 
            'id'          => $this->input->post('id'),
            'name'        => $this->input->post('name'),
            'description' => $this->input->post('description', true),
            'status'      => $this->input->post('status')
        );  

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->category_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy/category/form');
            } else {
                $data['title'] = display('add_medicine_category');
                $data['content'] = $this->load->view('pharmacy/category_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->category_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('pharmacy/category/form/'.$postData['id']);
            } else {
                $data['title'] = display('medicine_category_edit');
                $data['category'] = $this->category_model->read_by_id($id);
                $data['content'] = $this->load->view('pharmacy/category_edit_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->category_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('pharmacy/category');
    }
  
	
}
