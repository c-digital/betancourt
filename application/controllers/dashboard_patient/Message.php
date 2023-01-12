<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
            'patient/message_model'  
		));

        if ($this->session->userdata('isLogIn_patient') == false) 
            redirect('login'); 
	}

    // echo "<pre>";
    // print_r($data['messages']);die();
 
    public function index(){
        $data['module'] = display("messages");
        $data['title']    =  display('inbox');
        $patient_id = $this->session->userdata('patient_id'); 
        #-------------------------------#
        $data['messages'] = $this->message_model->inbox($patient_id, $type='patient');
        $data['content']  = $this->load->view('dashboard_patient/messages/inbox' ,$data,true);
        $this->load->view('dashboard_patient/main_wrapper',$data);
    } 
 
	public function sent(){
        $data['module'] = display("messages");
        $data['title']    =  display('sent');
        $patient_id = $this->session->userdata('patient_id'); 
		#-------------------------------#
		$data['messages'] = $this->message_model->sent($patient_id, $type='patient');
		$data['content'] = $this->load->view('dashboard_patient/messages/sent' ,$data,true);
		$this->load->view('dashboard_patient/main_wrapper',$data);
	} 

    public function inbox_information($id = null, $sender_id = null){  
        $data['module'] = display("messages");
        $data['title'] = display('messages');
        $receiver_id = $this->session->userdata('user_id'); 
        #-------------------------------#
        $this->message_model->update(
            array(
                'id' => $id, 
                'receiver_status' => 1
            )
        );
        #-------------------------------#
        $data['message'] = $this->message_model->inbox_information($id, $sender_id, $receiver_id);
        $data['content'] = $this->load->view('dashboard_patient/messages/inbox_information',$data,true);
        $this->load->view('dashboard_patient/main_wrapper',$data);
    }

    public function sent_information($id = null, $type='patient'){  
        $data['module'] = display("messages");
        $data['title'] = display('messages');
        #-------------------------------#
        $data['messages'] = $this->message_model->sent_information($id, $type);
        $data['content'] = $this->load->view('dashboard_patient/messages/sent_information',$data,true);
        $this->load->view('dashboard_patient/main_wrapper',$data);
    }
 

    public function new_message(){ 
        $data['module'] = display("messages");
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('receiver_id', display('receiver_name') ,'required|max_length[11]');
        $this->form_validation->set_rules('subject', display('subject'),'required|max_length[150]');
        $this->form_validation->set_rules('message', display('message'),'required|trim');
        /*-------------STORE DATA------------*/
        $patient_id = $this->session->userdata('patient_id');

        $data['message'] = (object)$postData = array( 
            'id'          => $this->input->post('id'),
            'sender_id'   => $patient_id,
            'receiver_id' => $this->input->post('receiver_id'),
            'subject'     => $this->input->post('subject'),
            'message'     => $this->input->post('message', true),
            'type'        => 'patient', 
        );  

        /*-----------CREATE A NEW RECORD-----------*/
        if ($this->form_validation->run() === true) { 
            if ($this->message_model->create($postData)) {
                #set success message
                $this->session->set_flashdata('message', display('message_sent'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('dashboard_patient/message/new_message');
        } else {
            $data['title'] = display('new_message');
            $data['user_list'] = $this->message_model->user_list();
            $data['content'] = $this->load->view('dashboard_patient/messages/new_message',$data,true);
            $this->load->view('dashboard_patient/main_wrapper',$data);
        }  
    }

    public function addReplies(){
        $mid = $this->input->post('mid');
        $message = $this->input->post('message');
        $pid = $this->session->userdata('patient_id');
        $postData = array(
            'message_id'  => $mid,
            'replies'     => $message,
            'sender_id'   => $pid,
            'sender_type' => 2
        );
        $this->message_model->add_replies($postData);
        echo 'success';
    }
 

    public function delete($id = null, $sender_id = null, $receiver_id = null) 
    {
        $user_id = $this->session->userdata('user_id');
        if ($user_id == $sender_id) {
            $condition = "sender_status";
            $this->message_model->delete($id, $condition);
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else if ($user_id == $receiver_id) {
            $condition = "receiver_status";
            $this->message_model->delete($id, $condition);
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect($_SERVER['HTTP_REFERER']); 
    }
  
	
}
