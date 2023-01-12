<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'doctor_model',
            'portfolio_model',
            'setting_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 
    }
  
    public function index(){
        $data['module'] = display("doctors");
        $data['title'] = display('portfolio_list');
        #-------------------------------#
        $data['portfolios'] = $this->portfolio_model->read();
        $data['othersLang'] = $this->portfolio_model->read_all();
        $data['content'] = $this->load->view('portfolio',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function create($id = null){ 
        $data['module'] = display("doctors");
        $data['title'] = display('add_portfolio');

        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('language', display('language') ,'required');
        $this->form_validation->set_rules('institute', display('institute_name') ,'required|max_length[100]');
        $this->form_validation->set_rules('user_id', display('doctor_name') ,'required');
        $this->form_validation->set_rules('title', display('designation') ,'required');
        $this->form_validation->set_rules('description', display('description'),'required|min_length[200]');
        
        /*-------------STORE DATA------------*/
        $data['portfolio'] = (object)$postData = array( 
            'id'          => $this->input->post('id'),
            'user_id'     => $this->input->post('user_id', true),
            'language'    => $this->input->post('language', true),
            'title'       => $this->input->post('title', true),
            'institute'   => $this->input->post('institute', true),
            'from_date'   => date('Y-m-d', strtotime(!empty($this->input->post('from_date'))?$this->input->post('from_date'):date('Y-m-d'))),
            'to_date'     => date('Y-m-d', strtotime(!empty($this->input->post('to_date'))?$this->input->post('to_date'):date('Y-m-d'))),
            'description' => $this->input->post('description', true),
            'status'      => $this->input->post('status')
        );  

        
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                /*-----------CHECK ID -----------*/
               if (empty($postData['id'])) {

                    if ($this->portfolio_model->create($postData)) {
                        #set success message
                        $this->session->set_flashdata('message', display('save_successfully'));
                    } else {
                        #set exception message
                        $this->session->set_flashdata('exception',display('please_try_again'));
                    }
                    redirect('portfolio/create');
                }else{
                    if ($this->portfolio_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                    } else {
                        #set exception message
                        $this->session->set_flashdata('exception',display('please_try_again'));
                    }
                    redirect('portfolio/edit/'.$postData['id']);
                }
            }else{
                $data['title'] = display('add_portfolio');
                /*------------------------------*/
                $data['languageList'] = $this->setting_model->languageList();
                $data['doctor_list'] = $this->doctor_model->doctor_list();
                $data['content'] = $this->load->view('portfolio_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            }
           /*---------------------------------*/
    }

    public function delete($id = null) 
    {
        if ($this->portfolio_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('portfolio');
    }

    public function edit($id = null){
        $data['module'] = display("doctors");
        $data['title'] = display('portfolio_edit');
        /*------------------------------*/
        $data['languageList'] = $this->setting_model->languageList();
        $data['portfolio'] = $this->portfolio_model->read_by_id($id);
        $data['doctor_list'] = $this->doctor_model->doctor_list();
        $data['content'] = $this->load->view('portfolio_form',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    
}
