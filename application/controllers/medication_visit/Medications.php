<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medications extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'medication_visit/medication_model', 'doctor_model', 'pharmacy/medicine_model', 'medication_visit/report_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 
    }
   
    public function index(){
        $data['module'] = display("medications_and_visits");
        $data['title'] = display('medication_list');
        $role = $this->session->userdata('user_role');
        #-------------------------------#
        if($role==2){
            $data['medications'] = $this->medication_model->read_doctor();
        }else{
            $data['medications'] = $this->medication_model->read();
        }
        $data['content'] = $this->load->view('medication_visit/medication/view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function create($id = null){ 
        $data['module'] = display("medications_and_visits");
        $data['title'] = display('add_medication');
        $data['patient_id'] = (!empty($this->input->get('pid'))?$this->input->get('pid'):null);

        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[20]');
        $this->form_validation->set_rules('from_date', display('from_date') ,'required');
        $this->form_validation->set_rules('to_date', display('to_date') ,'required');
        $this->form_validation->set_rules('medicine_id', display('medicine_name'),'required|trim');
        if($this->session->userdata('user_role')!=2){
            $this->form_validation->set_rules('prescribe_by', display('doctor_name') ,'required|max_length[100]');
        }
        $this->form_validation->set_rules('dosage', display('dosage'),'required|trim');
        $this->form_validation->set_rules('per_day_intake', display('per_day_intake'),'required|trim');

        /*-------------STORE DATA------------*/
        $data['medication'] = (object)$postData = array( 
            'id'          => $this->input->post('id'),
            'patient_id'  => $this->input->post('patient_id'),
            'medicine_id' => $this->input->post('medicine_id'),
            'dosage'       => $this->input->post('dosage'),
            'per_day_intake' => $this->input->post('per_day_intake'),
            'full_stomach'   => (!empty($this->input->post('full_stomach')?1:0)),
            'other_instruction'   => $this->input->post('other_instruction'),
            'from_date'   => date('Y-m-d', strtotime(($this->input->post('from_date',true)))),
            'to_date'   => date('Y-m-d', strtotime(($this->input->post('to_date',true)))),
            'prescribe_by'   => (($this->session->userdata('user_role')==2)?$this->session->userdata('user_id'):$this->input->post('prescribe_by')),
            'intake_time'      => $this->input->post('intake_time')
        );  

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                    $from = strtotime($postData['from_date']);
                    $to = strtotime($postData['to_date']);
                    $day = abs($to - $from);
                    $totalDay = $day/86400 +1;
                    $quantity = $totalDay*$postData['per_day_intake'];
                    // get medicine price by medicine id
                    $medicine = $this->db->select('price,quantity')
                                         ->from('ha_medicine')
                                         ->where('id', $postData['medicine_id'])
                                         ->get()->row();

                    $stock['quantity'] = $medicine->quantity - $quantity;
                    
                if ($this->medication_model->create($postData)) {
                    $bill_id = $this->db->insert_id();
                    // update medicine stock quantity
                    $this->db->where('id', $postData['medicine_id'])
                             ->update('ha_medicine', $stock);
                   
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('medication_visit/medications/create');
            } else {
                $data['title'] = display('add_medication');
                $data['doctor_list'] = $this->doctor_model->doctor_list();
                $data['medicine_list'] = $this->medicine_model->category_list();
                $data['content'] = $this->load->view('medication_visit/medication/form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->medication_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('medication_visit/medications/create/'.$postData['id']);
            } else {
                $data['title'] = display('medication_edit'); 
                $data['medication'] = $this->medication_model->read_by_id($id);
                $data['doctor_list'] = $this->doctor_model->doctor_list();
                $data['medicine_list'] = $this->medicine_model->category_list();
                $data['content'] = $this->load->view('medication_visit/medication/edit_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }

 
    public function delete($id = null) 
    {
        if ($this->medication_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('medication_visit/medications');
    }

    public function report(){
        $data['module'] = display("medications_and_visits");
        $data['title'] = display('medication_report'); 
        #--------------------------------#
        $data['date'] = (object)$getData = [
            'start_date' => (($this->input->get('start_date') != null) ? $this->input->get('start_date'):date('d-m-Y')),
            'end_date'  => (($this->input->get('end_date') != null) ? $this->input->get('end_date'):date('d-m-Y')) 
        ]; 

        #-------------------------------#
        $data['result'] = $this->report_model->read($getData);
        $data['content'] = $this->load->view('medication_visit/medication/report',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    public function filtering(){
        $data['title'] = display('medication_report'); 
        #--------------------------------#
        $data['content'] = $this->load->view('medication_visit/medication/filter',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }

    public function fetch(){
        
        $output = '';
        $query = '';
        #------if query string true-----#
        if($this->input->post('query'))
        {
            $query = $this->input->post('query');
        }
        $data = $this->report_model->fetch_data($query);
        
        $output .= '
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Patient ID</th>
                            <th>Doctor</th>
                            <th>Form Date</th>
                            <th>To Date</th>
                            <th>Instruction</th>
                        </tr>';

        if(!empty($data)){
            foreach($data->result() as $row){
                $output .= '
                        <tr>
                            <td>'.$row->patient_id.'</td>
                            <td>'.$row->prescribe_by.'</td>
                            <td>'.$row->from_date.'</td>
                            <td>'.$row->to_date.'</td>
                            <td>'.$row->other_instruction.'</td>
                        </tr>
                ';
            }
        }
        else
        {
            $output .= '<tr>
                            <td colspan="5">No Data Found</td>
                        </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
 
    public function check_patient($mode = null){
        $patient_id = $this->input->post('patient_id');

        if (!empty($patient_id)) {
            $patient = $this->db->select('patient_id')
                ->from('bill_admission')
                ->where('patient_id',$patient_id)
                ->where('status',1)
                ->get()->row();

            if (!empty($patient)) {
                $query = $this->db->select('firstname,lastname, mobile')
                    ->from('patient')
                    ->where('patient_id',$patient->patient_id)
                    ->where('status',1)
                    ->get();

                $result = $query->row();
                $data['message'] = $result->firstname . ' ' . $result->lastname . '-'. $result->mobile;
                $data['status'] = true;

                if($mode == true) {
                    return true;
                }

            } else {
                $data['message'] = display('invalid_patient_id');
                $data['status'] = false;

                if($mode == true) {
                    return false;
                }

            }
        } else {
            $data['message'] = display('invlid_input');
            $data['status'] = null;
        }
 
        echo json_encode($data);
    }


}
