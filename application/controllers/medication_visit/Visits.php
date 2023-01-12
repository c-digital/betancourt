<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visits extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'medication_visit/visit_model', 'doctor_model', 'pharmacy/medicine_model', 'medication_visit/report_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 
    }
 
    public function index(){
        $data['module'] = display("medications_and_visits");
        $data['title'] = display('visit_list');
        $role = $this->session->userdata('user_role');
        #-------------------------------#
        if($role==2){
            $data['visits'] = $this->visit_model->read_doctor();
        }else{
            $data['visits'] = $this->visit_model->read();
        }
        
        $data['content'] = $this->load->view('medication_visit/visit/view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function create($id = null){ 
        $data['module'] = display("medications_and_visits");
        $data['title'] = display('add_medication');
        $data['patient_id'] = $this->input->get('pid');
        $role = $this->session->userdata('user_role');
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[20]');
        $this->form_validation->set_rules('visit_date', display('visit_date') ,'required');
        if($role!=2){
            $this->form_validation->set_rules('user_id', display('doctor_name') ,'required|max_length[100]');
             $this->form_validation->set_rules('visit_by', display('visit_by'),'required');
        }
        $this->form_validation->set_rules('visit_time', display('visit_time'),'required');
        $this->form_validation->set_rules('finding', display('finding'),'max_length[255]');
        $this->form_validation->set_rules('instructions', display('instructions'),'max_length[255]');
        
        /*-------------STORE DATA------------*/
        $data['visit'] = (object)$postData = array( 
            'id'          => $this->input->post('id'),
            'patient_id'  => $this->input->post('patient_id', true),
            'user_type'  => (($role==2)?2:$this->input->post('visit_by')),
            'user_id' => (($role==2)?$this->session->userdata('user_id'):$this->input->post('user_id')),
            'visit_date'=> date('Y-m-d', strtotime($this->input->post('visit_date', true))),
            'visit_time' => $this->input->post('visit_time', true),
            'finding'   => $this->input->post('finding'),
            'instructions'   => $this->input->post('instructions'),
            'fees'      => $this->input->post('fees', true)
        );  

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
               
                if ($this->visit_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('medication_visit/visits/create');
            } else {
                $data['title'] = display('add_visit');
                $data['doctor_list'] = $this->doctor_model->doctor_list();
                $data['content'] = $this->load->view('medication_visit/visit/form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->visit_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('medication_visit/visits/create/'.$postData['id']);
            } else {
                $data['title'] = display('visit_edit'); 
                $data['visit'] = $this->visit_model->read_by_id($id);
                $data['doctor_list'] = $this->doctor_model->doctor_list();
                $data['content'] = $this->load->view('medication_visit/visit/edit_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }


    public function delete($id = null) 
    {
        if ($this->visit_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('medication_visit/visits');
    }

    public function doctor_or_nurse_list()
    {
        $user_role = $this->input->post('user_role');

        if (!empty($user_role)) {
            $query = $this->db->select("user_id, CONCAT_WS(' ', firstname, lastname) as name")
                ->from('user')
                ->where('user_role',$user_role)
                ->where('status',1)
                ->get();

            $option = "<option value=\"\">".display('select_option')."</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $user) {
                    $option .= "<option value=\"$user->user_id\">$user->name</option>";
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = 'Not availabe.';
                $data['status'] = false;
            }
        } 

        echo json_encode($data);

    }

    public function report(){
        $data['module'] = display("medications_and_visits");
        $data['title'] = display('visit_report'); 
        #--------------------------------#
        $data['date'] = (object)$getData = [
            'start_date' => (($this->input->get('start_date') != null) ? $this->input->get('start_date'):date('d-m-Y')),
            'end_date'  => (($this->input->get('end_date') != null) ? $this->input->get('end_date'):date('d-m-Y')) 
        ]; 

        #-------------------------------#
        $data['result'] = $this->report_model->visit_report($getData);
        $data['content'] = $this->load->view('medication_visit/visit/report',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }
  
}
