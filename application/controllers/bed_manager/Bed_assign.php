<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bed_assign extends CI_Controller {

    public function __construct()
    {
        parent::__construct(); 
        
        $this->load->model(array( 
            'bed_manager/bed_model',
            'bed_manager/bed_assign_model', 'bed_manager/room_model', 'bed_manager/bed_transfer_model', 'billing/admission_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 

    }
   
    public function index(){
        $data['module'] = display("bed_manager");
        $data['title'] = display('bed_assign_list');
        #-------------------------------#
        $data['beds'] = $this->bed_assign_model->read();
        $data['content'] = $this->load->view('bed_manager/bedAssign_view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 
 
    public function create(){
        $data['module'] = display("bed_manager");
        $data['title'] = display('bed_assign');
        #-------------------------------#
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[20]');
        $this->form_validation->set_rules('room_id', display('room_name') ,'required|max_length[15]');
        $this->form_validation->set_rules('bed_id', display('bed_number') ,'required|max_length[15]');
        $this->form_validation->set_rules('description', display('description'),'trim'); 
        $this->form_validation->set_rules('assign_date', display('assign_date') ,'required|max_length[100]');
        $this->form_validation->set_rules('status', display('status') ,'required');
        #-------------------------------#
        $data['bed'] = (object)$postData = array( 
            'patient_id'  => $this->input->post('patient_id',true),
            'serial'      => $this->randStrGen(2,6),
            'room_id'      => $this->input->post('room_id',true),
            'bed_id'      => $this->input->post('bed_id',true),
            'description' => $this->input->post('description',true),
            'assign_date' => date('Y-m-d', strtotime(($this->input->post('assign_date',true) != null)? $this->input->post('assign_date',true): date('Y-m-d'))),
            'discharge_date' => $this->input->post('discharge_date', true),
            'assign_by'   => $this->session->userdata('user_id'),
            'status'      => $this->input->post('status',true)
        );  
        #-------------------------------#
        if ($this->check_bed(true) === false) {
            $this->session->set_flashdata('exception',display('bed_not_available')." / ".display('select_only_avaiable_days'));
        } 
        #-------------------------------#
        if ($this->form_validation->run() === true && $this->check_bed(true) === true) { 
            // check bed already booked
            $pidExists = $this->db->select('patient_id')
                ->where('patient_id',$postData['patient_id']) 
                ->where('status',1) 
                ->get('bm_bed_assign')
                ->num_rows();
            if ($pidExists > 0) {
                $this->session->set_flashdata('exception',display('already_bed_assign_this_id').' <b>'.$postData['patient_id'].'</b>');
                redirect('bed_manager/bed_assign/create');
            }
            
            $this->bed_assign_model->create($postData);
            // change bed number status
            $status = 0;
            $this->bed_model->update_bed_status($postData['bed_id'], $status);
            $this->session->set_flashdata('message', display('save_successfully')); 
           
            redirect('bed_manager/bed_assign/create');

        } else {
            $data['room_list'] = $this->room_model->room_list();
            $data['bed_list'] = $this->bed_model->bed_list();
            $data['content'] = $this->load->view('bed_manager/bedAssign_form',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
    }


    public function edit($serial = null) {
        $data['module'] = display("bed_manager");
        $data['title'] = display('bed_assign_edit');
        #-------------------------------# 
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[11]');
        $this->form_validation->set_rules('bed_id', display('bed_type') ,'required|max_length[11]');
        $this->form_validation->set_rules('description', display('description'),'trim'); 
        $this->form_validation->set_rules('assign_date', display('assign_date') ,'required|max_length[100]');
        $this->form_validation->set_rules('status', display('status') ,'required');
        #-------------------------------#
        $newSerial        = $this->input->post('serial',true);
        $data['bed'] = (object)$postData = array( 
            'patient_id'  => $this->input->post('patient_id',true),
            'serial'      => $newSerial,
            'room_id'      => $this->input->post('room_id',true),
            'bed_id'      => $this->input->post('bed_id',true),
            'description' => $this->input->post('description',true),
            'assign_date' => date('Y-m-d', strtotime($this->input->post('assign_date',true))),
            'discharge_date' => date('Y-m-d', strtotime($this->input->post('discharge_date',true))),
            'assign_by'   => $this->session->userdata('user_id'),
            'status'      => $this->input->post('status',true)
        ); 
 
        #-------------------------------#
        if($this->check_bed(true) === false) {
            #set exception message
            $this->session->set_flashdata('exception',display('bed_not_available'));
        }
        #-------------------------------#
        if ($this->form_validation->run() === true && $this->check_bed(true) === true) { 
            
            $this->bed_assign_model->update_assign_data($postData);
            $this->session->set_flashdata('message', display('update_successfully')); 
            

            redirect('bed_manager/bed_assign/edit/'.$newSerial);

        } else {
            $data['bed']      = $this->bed_assign_model->read_by_serial($serial);
            $data['room_list'] = $this->room_model->room_list();
            $data['bed_list'] = $this->bed_model->bed_list();
            $data['content']  = $this->load->view('bed_manager/bedAssign_edit',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        }
    }

    /*
    |--------------Bed Transfer To Patient-------------
    */
    public function transfer($serial = null){
        $data['module'] = display("bed_manager");
        $data['title'] = display('bed_transfer');
        #-------------------------------#
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[11]');
        $this->form_validation->set_rules('room_id', display('room_name') ,'required|max_length[15]');
        $this->form_validation->set_rules('bed_id', display('bed_number') ,'required|max_length[15]');
        $this->form_validation->set_rules('description', display('description'),'trim'); 
        $this->form_validation->set_rules('assign_date', display('assign_date') ,'required|max_length[100]');
        $this->form_validation->set_rules('status', display('status') ,'required');
        #-------------------------------#
        $newSerial = $this->input->post('serial',true);
        $form_bed_id = $this->input->post('form_bed_id',true);
        $data['bed'] = (object)$postData = array( 
            'patient_id'  => $this->input->post('patient_id',true),
            'serial'      => $this->randStrGen(2,6),
            'room_id'     => $this->input->post('room_id',true),
            'form_bed_id' => $form_bed_id,
            'to_bed_id'      => $this->input->post('bed_id',true),
            'description' => $this->input->post('description',true),
            'assign_date' => date('Y-m-d', strtotime(($this->input->post('assign_date',true) != null)? $this->input->post('assign_date',true): date('Y-m-d'))),
            'discharge_date' => $this->input->post('discharge_date',true),
            'assign_by'   => $this->session->userdata('user_id'),
            'status'      => $this->input->post('status',true)
        );  
        #-------------------------------#
        if ($this->check_bed(true) === false) {
            $this->session->set_flashdata('exception',display('bed_not_available')." / ".display('select_only_avaiable_days')); 
        }
        #-------------------------------#
        if ($this->form_validation->run() === true && $this->check_bed(true) === true) {

               $assign_date = strtotime($this->input->post('assign_date',true));
                 
                $this->bed_transfer_model->create($postData);

                #----------update assign table data----#
                $assignData = array(
                    'update_by'=> $postData['assign_by'],
                    'discharge_date'=>$postData['assign_date'],
                    'serial'=> $newSerial
                );
                $this->bed_assign_model->update_assign_data($assignData);
                
                #-------change release bed status------#
                $data = array(
                    'id'=> $form_bed_id,
                    'status'=> 0
                );
                $this->bed_model->update($data);
                $this->session->set_flashdata('message', display('save_successfully')); 

            redirect('bed_manager/bed_assign/');

        } else { 
            $data['bed'] = $this->bed_assign_model->read_by_serial($serial);
            $data['room_list'] = $this->room_model->room_list();
            $data['bed_list'] = $this->bed_model->bed_list();
            $data['content'] = $this->load->view('bed_manager/bed_transfer_form',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
    }
 
    public function bed_transfer_list(){
        $data['module'] = display("bed_manager");
        $data['title'] = display('bed_transfer_list');
        #-------------------------------#
        $data['beds'] = $this->bed_transfer_model->read_transfer_bed();
        $data['content'] = $this->load->view('bed_manager/bed_transfer_view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    }
 

    public function delete($serial = null) 
    {
        if ($this->bed_assign_model->delete($serial)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('bed_manager/bed_assign');
    }
  

    public function check_patient($mode = null)
    {
        $patient_id = $this->input->post('patient_id');

        if (!empty($patient_id)) {
            $query = $this->db->select('firstname,lastname, mobile')
                ->from('patient')
                ->where('patient_id',$patient_id)
                ->where('status',1)
                ->get();

            if ($query->num_rows() > 0) {
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

    public function check_bed($mode = null)
    { 
        $serial      = $this->input->post('serial');
        $room_id      = $this->input->post('room_id');
        $bed_id      = $this->input->post('bed_id');
        $assign_date = strtotime($this->input->post('assign_date',true));
        $current_date = strtotime(date('Y-m-d'));
        #----------------------------------------------------#
        if (!empty($bed_id) && !empty($assign_date) && $current_date <= $assign_date) {

            $timeDiff = abs($assign_date - $current_date);
            $numberDays = $timeDiff/86400;  
            $numberDays = intval($numberDays);

            $result  = "";
            $result .= "<div class=\"alert alert-info\">"; 
            $successCount = 0;
            $errorCount   = 0;
            for ($i = 0; $i <= $numberDays; $i++) {
                $date = date('Y-m-d', strtotime("$i day", $current_date));

                $query = $this->db->select('COUNT(id) as allocated')
                    ->from('bm_bed')
                    ->where('room_id',$room_id)
                    ->get()
                    ->row(); 

                $total_bed = $this->db->select("COUNT(id) as booked")
                    ->from('bm_bed')
                    ->where('room_id', $room_id)
                    ->where('status', 1)
                    ->get()
                    ->row();

                if (!empty($query)) {
                    $free_bed = $query->allocated - $total_bed->booked; 
                } else {
                    $free_bed = $total_bed->booked;
                }

                if ($free_bed > 0) {
                    $result .= "<p class=\"text-success\">$date [$free_bed ".display('bed_available')."]</p>";  
                    $successCount++; 
                } else {
                    $result .= "<p class=\"text-danger\">$date [".display('bed_not_available')."]</p>"; 
                    $errorCount++;
                }   
            }
            $result .= "</div>";  

            if ($mode == true && $errorCount > 0) {
                return false; 
            } else if ($mode == true && $successCount > 0) {
                return true;
            } 

            $data['status']  = true;
            $data['message'] = $result;
        } else {
            $data['message']     = display('invlid_input');
            $data['status']      = null;

            if ($mode == true) {
                return null;
            }
        }

        if($mode == null) {
            echo json_encode($data);
        } 

    }

    public function discharged($serial=null){
        $data['module'] = display("bed_manager");
        $data['title'] = display('discharged');
        #-------------------------------#
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required');
        $this->form_validation->set_rules('discharge_date', display('discharge_date') ,'required');
        #-------------------------------#
        $data['discharged'] = $this->bed_assign_model->read_bed_assign_by_serial($serial);
    
       $postData = array( 
            'serial'         => $data['discharged']->serial,
            'patient_id'     =>  $data['discharged']->patient_id,
            'discharge_date' => date('Y-m-d', strtotime($this->input->post('discharge_date',true))),
            'update_by'      =>$this->session->userdata('user_id'),
            'status'         => 0
        );    
        #-------------------------------# 
        if ($this->form_validation->run() === true) { 
            // get assign bed info
            $this->bed_assign_model->bed_discharge($postData);
            // change bed number status
            $status = 1;
            $this->bed_model->update_bed_status($data['discharged']->bed_id, $status);
            // bill admission discharge date update
            $dis_date = array(
                'patient_id'   =>$data['discharged']->patient_id,
                'discharge_date' => $postData['discharge_date']
            );
            $this->admission_model->update_discharge_date($dis_date);

            $this->session->set_flashdata('message', display('update_successfully')); 
           
            redirect('bed_manager/bed_assign/');

        } else {
            $data['content'] = $this->load->view('bed_manager/bed_discharged',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
    }

    public function discharged_pid(){
        $data['module'] = display("bed_manager");
        $data['title'] = display('discharged');
        #-------------------------------#
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required');
        $this->form_validation->set_rules('discharge_date', display('discharge_date') ,'required');
        #-------------------------------#
        $pid = $this->input->post('patient_id', true);
        $pinfo = $this->bed_assign_model->read_bed_assign_by_pid($pid);
    
       $postData = array( 
            'patient_id'     => $pid,
            'discharge_date' => date('Y-m-d', strtotime($this->input->post('discharge_date',true))),
            'update_by'      =>$this->session->userdata('user_id'),
            'status'         => 0
        );    
       //print_r($pinfo);die();
        #-------------------------------# 
        if ($this->form_validation->run() === true) { 
            // get assign bed info
            $this->bed_assign_model->bed_discharge_by_pid($postData);
            // change bed number status
            $status = 1;
            $this->bed_model->update_bed_status($pinfo->bed_id, $status);
            // bill admission discharge date update
            $dis_date = array(
                'patient_id'   =>$pid,
                'discharge_date' => $postData['discharge_date']
            );
            $this->admission_model->update_discharge_date($dis_date);

            $this->session->set_flashdata('message', display('update_successfully')); 
           
            redirect('bed_manager/bed_assign/');

        } else {
            $data['content'] = $this->load->view('bed_manager/bed_discharged',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
    }




    /*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------     
    */
    public function randStrGen($mode = null, $len = null){
        $result = "";
        if($mode == 1):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 2):
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        elseif($mode == 3):
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        elseif($mode == 4):
            $chars = "0123456789";
        endif;

        $charArray = str_split($chars);
        for($i = 0; $i < $len; $i++) {
                $randItem = array_rand($charArray);
                $result .="".$charArray[$randItem];
        }
        return $result;
    }
    /*
    |----------------------------------------------
    |         Ends of id genaretor
    |----------------------------------------------
    */


}
