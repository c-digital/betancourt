<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'bed_manager/room_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 


    }
 
    public function index(){
        $data['module'] = display("bed_manager");
        $data['title'] = display('room_list'); 
        #-------------------------------#
        $data['rooms'] = $this->room_model->read();
        $data['content'] = $this->load->view('bed_manager/room_view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function form($id = null){ 
        $data['module'] = display("bed_manager");
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('room_name', display('room_name') ,'required|max_length[100]');
        $this->form_validation->set_rules('description', display('description'),'trim');
        $this->form_validation->set_rules('limit', display('bed_limit') ,'required|max_length[100]');
        $this->form_validation->set_rules('charge', display('charge') ,'required|max_length[100]');
        $this->form_validation->set_rules('status', display('status') ,'required');

        /*-------------STORE DATA------------*/
        $data['room'] = (object)$postData = array( 
            'id'          => $this->input->post('id',true),
            'room_name'        => $this->input->post('room_name',true),
            'description' => $this->input->post('description',true),
            'limit'       => $this->input->post('limit',true),
            'charge'      => $this->input->post('charge',true),
            'status'      => $this->input->post('status',true)
        );  

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->room_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('bed_manager/room/form');
            } else {
                $data['title'] = display('add_room');
                $data['content'] = $this->load->view('bed_manager/room_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->room_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('bed_manager/room/form/'.$postData['id']);
            } else {
                $data['title'] = display('room_edit');
                $data['room'] = $this->room_model->read_by_id($id);
                $data['content'] = $this->load->view('bed_manager/room_edit_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->room_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('bed_manager/bed');
    }
  
}
