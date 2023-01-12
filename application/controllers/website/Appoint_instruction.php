<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appoint_instruction extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();

        $this->load->model(array(
            'website/appointment_instruction_model',
            'setting_model'
        ));   
    } 

    
    public function instructions(){
        $data['module'] = display("website");
        $data['title'] = display('instruction_list');
        #-------------------------------#   
        $data['instructions'] = $this->appointment_instruction_model->read();
        $data['content'] = $this->load->view('website/pages/appointment_instruction',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    public function instruction_form(){
        $data['module'] = display("website");
        $data['title'] = display('add_instruction');
        #-------------------------------# 
        $this->form_validation->set_rules('title', display('title'),'required|max_length[30]');
        $this->form_validation->set_rules('short_instruction', display('short_instruction'),'required|max_length[150]');
        $this->form_validation->set_rules('instruction', display('instructions'),'required|trim');
        $this->form_validation->set_rules('note',  display('notes'), 'required|trim|max_length[150]');
        #-------------------------------#       
        
        $data['instruction'] = (object)$instData = [
            'id'             => $this->input->post('id'),
            'language'       => $this->input->post('language'),
            'title'          => $this->input->post('title'),
            'short_instruction' => $this->input->post('short_instruction'),
            'instruction'       => $this->input->post('instruction'),
            'note'    => $this->input->post('note'),
            'status'  => $this->input->post('status'),
        ];
        #-------------------------------#
        if ($this->form_validation->run() === true) {

            #if empty $id then insert data
            if (empty($instData['id'])) {
        
                   if($this->permission->method('appoint_instruction','create')->access()){}
                    else{
                        redirect('dashboard/home');
                    }
                //check language exists
                $pos_res = $this->db->select('*')
                            ->from('ws_appoint_instruction')
                            ->where('language', $instData['language'])
                            ->get()
                            ->num_rows();
                if($pos_res > 0){
                    #set exception message
                    $this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
                    redirect('website/appoint_instruction/instruction_form/');
                }else{
                    if ($this->appointment_instruction_model->create($instData)) {
                        #set success message
                        $this->session->set_flashdata('message', display('save_successfully'));
                    } else {
                        #set exception message
                        $this->session->set_flashdata('exception', display('please_try_again'));
                    }
                    redirect('website/appoint_instruction/instruction_form');
                }
            } 

            else {
                    if($this->permission->method('appoint_instruction','update')->access()){}
                    else{
                        redirect('dashboard/home');
                    }


                if ($this->appointment_instruction_model->update($instData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception', display('please_try_again'));
                }
                redirect('website/appoint_instruction/instruction_edit/'.$instData['id']);
            }
        } else {
            $data['languageList'] = $this->setting_model->languageList();
            $data['content'] = $this->load->view('website/pages/appoint_instruction_form',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
    } 

    public function instruction_edit($id = null){
        $data['module'] = display("website");
        $data['title'] = display('instruction_edit');
        #-------------------------------#   
        $data['languageList'] = $this->setting_model->languageList();
        $data['instruction'] = $this->appointment_instruction_model->read_by_id($id);
        $data['content'] = $this->load->view('website/pages/appoint_instruction_form',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    public function instruction_delete($id = null) 
    {
        if ($this->appointment_instruction_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('website/appoint_instruction/instructions/');
    }

}