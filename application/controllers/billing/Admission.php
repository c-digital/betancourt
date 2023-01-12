<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admission extends CI_Controller {
 
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'billing/admission_model', 'bed_manager/room_model', 'bed_manager/bed_model', 'bed_manager/bed_assign_model', 'patient_model'
		));

		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
	}
   
	public function index(){ 
		$data['module'] = display("billing");
		$data['title'] = display('admission_list'); 
		$role = $this->session->userdata('user_role');
        $user_id = $this->session->userdata('user_id');
        $total = $this->db->where('doctor_id', $user_id)->count_all('bill_admission');
        #-------------------------------#
        #
        #pagination starts
        #
        $config["base_url"] = base_url('billing/admission/index');
        if($role==2){
        	$config["total_rows"] = $total;
        }else{
        	$config["total_rows"] = $this->db->count_all('bill_admission');
        }
        $config["per_page"] = 25;
        $config["uri_segment"] = 4;
        $config["last_link"] = "Last"; 
        $config["first_link"] = "First"; 
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';  
        $config['full_tag_open'] = "<ul class='pagination col-xs pull-right'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tag_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* ends of bootstrap */
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        if($role==2){
        	$data['admissions'] = $this->admission_model->read_doctor($config["per_page"], $page);
        }else{
        	$data['admissions'] = $this->admission_model->read($config["per_page"], $page);
        }
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends
        #   
		$data['content'] = $this->load->view('billing/admission/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 



	public function form($admission_id = null){ 
		$data['module'] = display("billing");
		$data['title'] = display('add_admission');
		$data['patient_id'] = (!empty($this->input->get('pid'))?$this->input->get('pid'):null);
		#-------------------------------# 
		$this->form_validation->set_rules(
		    'patient_id', display('patient_id'),
		    array( 
		        'required',
			    array(
	                'patient_callable',
			        function($value)
			        {
						$rows = $this->db->select("patient_id")
			             	->from("patient")
			             	->where("patient_id", $value)
			             	->get()
			             	->num_rows();

			            if ($rows>0) 
			            {
			            	return true;
			            }
			            else 
			            {
			            	$this->form_validation->set_message('patient_callable', 'The {field} is not valid!');
	                       
			            	return false;
			            }
			        }
			    )
		    )
		);

		$this->form_validation->set_rules('doctor_id', display('doctor_name'),'required|max_length[11]');
		$this->form_validation->set_rules('admission_date', display('admission_date'),'required|max_length[15]');
		$this->form_validation->set_rules('room_id', display('room_name') ,'required|max_length[15]');
        $this->form_validation->set_rules('bed_id', display('bed_number') ,'required|max_length[15]');

		$this->form_validation->set_rules('package_id', display('package_name'),'max_length[11]');
		$this->form_validation->set_rules('insurance_id', display('insurance_name'),'max_length[11]');
		$this->form_validation->set_rules('policy_no', display('policy_no'),'max_length[100]');
		$this->form_validation->set_rules('agent_name', display('agent_name'),'max_length[255]');
		$this->form_validation->set_rules('guardian_name', display('guardian_name'),'max_length[255]');
		$this->form_validation->set_rules('guardian_relation', display('guardian_relation'),'max_length[255]');
		$this->form_validation->set_rules('guardian_contact', display('guardian_contact'),'max_length[255]');
		$this->form_validation->set_rules('guardian_address', display('guardian_address'),'max_length[255]');
		$this->form_validation->set_rules('status', display('status'),'required'); 
		#-------------------------------#  
		$data['admission'] = (object)$postData = array(
			'admission_id'    => 'U'.$this->randStrGen(2, 7), 
			'patient_id'      => $this->input->post('patient_id'), 
			'doctor_id'       => $this->input->post('doctor_id'), 
			'admission_date' => date('Y-m-d', strtotime(($this->input->post('admission_date',true) != null)? $this->input->post('admission_date',true): date('Y-m-d'))),
            'discharge_date' => $this->input->post('discharge_date'),
            'assign_by'   => $this->session->userdata('user_id'),  
			'package_id'      => $this->input->post('package_id'),  
			'insurance_id'    => $this->input->post('insurance_id'), 
			'policy_no'       => $this->input->post('policy_no'),  
			'agent_name'      => $this->input->post('agent_name'),  
			'guardian_name'   => $this->input->post('guardian_name'), 
			'guardian_relation' => $this->input->post('guardian_relation'), 
			'guardian_contact'  => $this->input->post('guardian_contact'), 
			'guardian_address'  => $this->input->post('guardian_address'), 
			'status'          => $this->input->post('status'),
		); 
		$data['room'] = (object)$bedAssignData = array(
			'patient_id'      => $this->input->post('patient_id'),
			'serial'      => $this->randStrGen(2,6),
			'room_id'      => $this->input->post('room_id'), 
			'bed_id'      => $this->input->post('bed_id'),
			'assign_date' => date('Y-m-d', strtotime(($this->input->post('admission_date',true)))),
            'discharge_date' => $this->input->post('discharge_date',true),
			'assign_by'   => $this->session->userdata('user_id'),
            'status'      => 0
		);
		#-------------------------------#  

		if ($this->form_validation->run() === true) {
			// check bed already booked
            $pidExists = $this->db->select('patient_id')
                ->where('patient_id',$postData['patient_id']) 
                ->where('status',1) 
                ->get('bm_bed_assign')
                ->num_rows();
            if ($pidExists > 0) {
                $this->session->set_flashdata('exception',display('already_bed_assign_this_id').' <b>'.$postData['patient_id'].'</b>');
                redirect('billing/admission/form?pid='.$postData['patient_id']);
            }

			if ($this->admission_model->create($postData)) {
				# unset the patient id session
                $this->session->unset_userdata('patientID');
				// insert bed info
				$this->bed_assign_model->create($bedAssignData);
                // change bed number status
                $this->bed_model->update_bed_status($bedAssignData['bed_id'], $bedAssignData['status']);
				#set success message
				$this->session->set_flashdata('message', display('save_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception', display('please_try_again'));
			} 
			redirect('billing/admission/form/');
		} else {  
			$data['doctor_list'] = $this->admission_model->doctor_list();
			$data['room_list'] = $this->room_model->room_list();
			$data['package_list'] = $this->admission_model->package_list();
			$data['insurance_list'] = $this->admission_model->insurance_list();
			$data['content'] = $this->load->view('billing/admission/form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}


	public function edit($admission_id = null){ 
		$data['module'] = display("billing");
		$data['title'] = display('edit_admission');
		#-------------------------------# 
		$this->form_validation->set_rules(
		    'patient_id', display('patient_id'),
		    array(
		        'required',
			    array(
	                'patient_callable',
			        function($value)
			        {
						$rows = $this->db->select("patient_id")
			             	->from("patient")
			             	->where("patient_id", $value)
			             	->get()
			             	->num_rows();

			            if ($rows>0) 
			            {
			            	return true;
			            }
			            else 
			            {
			            	$this->form_validation->set_message('patient_callable', 'The {field} is not valid!');
	                       
			            	return false;
			            }
			        }
			    )
		    )
		);

		$this->form_validation->set_rules('doctor_id', display('doctor_name'),'required|max_length[11]');
		$this->form_validation->set_rules('admission_date', display('admission_date'),'required|max_length[15]');
		$this->form_validation->set_rules('discharge_date', display('discharge_date'),'max_length[15]');

		$this->form_validation->set_rules('package_id', display('package_name'),'max_length[11]');
		$this->form_validation->set_rules('insurance_id', display('insurance_name'),'max_length[11]');
		$this->form_validation->set_rules('policy_no', display('policy_no'),'max_length[100]');
		$this->form_validation->set_rules('agent_name', display('agent_name'),'max_length[255]');
		$this->form_validation->set_rules('guardian_name', display('guardian_name'),'max_length[255]');
		$this->form_validation->set_rules('guardian_relation', display('guardian_relation'),'max_length[255]');
		$this->form_validation->set_rules('guardian_contact', display('guardian_contact'),'max_length[255]');
		$this->form_validation->set_rules('guardian_address', display('guardian_address'),'max_length[255]');
		$this->form_validation->set_rules('status', display('status'),'required'); 
		#-------------------------------# 
		$admission_date = $this->input->post('admission_date');
		$admission_date = (!empty($admission_date)?date("Y-m-d", strtotime($admission_date)):null);
		$discharge_date = $this->input->post('discharge_date');
		$discharge_date = (!empty($discharge_date)?date("Y-m-d", strtotime($discharge_date)):null);
		#-------------------------------#  
		$data['admission'] = (object)$postData = array(
			'admission_id'    => $admission_id, 
			'patient_id'      => $this->input->post('patient_id'), 
			'doctor_id'       => $this->input->post('doctor_id'), 
			'admission_date'  => $admission_date,  
			'discharge_date'  => $discharge_date,  
			'package_id'      => $this->input->post('package_id'),  
			'insurance_id'    => $this->input->post('insurance_id'), 
			'policy_no'       => $this->input->post('policy_no'),  
			'agent_name'      => $this->input->post('agent_name'),  
			'guardian_name'   => $this->input->post('guardian_name'), 
			'guardian_relation' => $this->input->post('guardian_relation'),  
			'guardian_contact'  => $this->input->post('guardian_contact'), 
			'guardian_address'  => $this->input->post('guardian_address'), 
			'status'          => $this->input->post('status'),
		); 
		#-------------------------------#  
		if ($this->form_validation->run() === true) {

			if ($this->admission_model->update($postData)) {
				#set success message
				$this->session->set_flashdata('message', display('update_successfully'));
			} else {
				#set exception message
				$this->session->set_flashdata('exception', display('please_try_again'));
			} 
			redirect('billing/admission/form/'.$admission_id);

		} else {  
			$data['admission'] = $this->admission_model->read_by_id($admission_id);
			$data['doctor_list'] = $this->admission_model->doctor_list();
			$data['room_list'] = $this->room_model->room_list();
			$data['package_list'] = $this->admission_model->package_list();
			$data['insurance_list'] = $this->admission_model->insurance_list();
			$data['content'] = $this->load->view('billing/admission/edit',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}


 


	public function view($id = null){
		$data['module'] = display("billing");
		$data['title'] = display('admission');
		#-------------------------------#  
		$data['admission'] = $this->admission_model->read_by_id($id);
		$data['content'] = $this->load->view('admission/admission_view',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}



    public function delete($id = null) 
    {
        if ($this->admission_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
		redirect('billing/admission/index');
    }

    // create new patient
    public function create_patient(){
    	$data['module'] = display("billing");
        $this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
        $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
        $this->form_validation->set_rules('phone', display('phone'),'max_length[20]');
        $this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
        $this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
        $this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'required|max_length[10]');
        $this->form_validation->set_rules('address', display('address'),'required|max_length[255]');
        #-------------------------------#
        
        //create a patient
        $data['patient'] = (object)$postData = [
            'patient_id'   => "P".$this->randStrGen(2,7),
            'firstname'    => $this->input->post('firstname', true),
            'lastname'     => $this->input->post('lastname'),
            'email'        => $this->input->post('email'),
            'password'     => md5($this->input->post('password')),
            'phone'        => $this->input->post('phone'),
            'mobile'       => $this->input->post('mobile'),
            'blood_group'  => $this->input->post('blood_group'),
            'sex'          => $this->input->post('sex'), 
            'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth') != null)? $this->input->post('date_of_birth'): date('Y-m-d'))),
            'address'      => $this->input->post('address'),
            'create_date'  => date('Y-m-d'),
            'created_by'   => $this->session->userdata('user_id'),
            'status'       => 1,
        ]; 

        #accounts information
	   $coa = $this->admission_model->headcode();

		if($coa->HeadCode!=NULL){
			$headcode=$coa->HeadCode+1;
		}else{
			$headcode="102030200001";
		}

		$c_code = $postData['patient_id'];
		$c_name = $this->input->post('firstname').'-'.$this->input->post('lastname');
		$c_acc=$c_code.'-'.$c_name;
		$createby = $this->session->userdata('user_id');
		$createdate = date('Y-m-d H:i:s');
		$data['aco']  = (Object) $coaData = [
			'HeadCode'         => $headcode,
			'HeadName'         => $c_acc,
			'PHeadName'        => 'Patient Receivable',
			'HeadLevel'        => '4',
			'IsActive'         => '1',
			'IsTransaction'    => '1',
			'IsGL'             => '0',
			'HeadType'         => 'A',
			'IsBudget'         => '0',
			'IsDepreciation'   => '0',
			'DepreciationRate' => '0',
			'CreateBy'         => $createby,
			'CreateDate'       => $createdate,
		]; 
        #-------------------------------#
        if ($this->form_validation->run() === true) {
        	// check exist patient ID
        	$rows = $this->db->select("patient_id")
			             	->from("patient")
			             	->where("patient_id", $postData['patient_id'])
			             	->get()
			             	->row();
			if(empty($rows)){
	            if ($this->patient_model->create($postData)) {
	                $patient_id = $this->db->insert_id();
	                // insert coa data
	                $this->admission_model->create_coa($coaData);
	                
	                $this->session->set_userdata(['patientID'=> $postData['patient_id']]);
	                #-------------------------------------------------------#
	            #-------------------------SMS SEND -----------------------------#
	                #-------------------------------------------------------#
	                # SMS Setting
	                $setting = $this->db->select('registration')
	                   ->from('sms_setting')
	                   ->get()
	                   ->row();

	                if (!empty($setting) && ($setting->registration==1))
	                { 
	                    #-----------------------------------#
	                    # SMS Gateway Setting
	                    $gateway = $this->db->select('*')
	                       ->from('sms_gateway')
	                       ->where('default_status', 1)
	                       ->get()
	                       ->row();

	                    #-----------------------------------#
	                    # schedules list
	                    $sms_teamplate = $this->db->select('teamplate')
	                        ->from('sms_teamplate')
	                        ->where('status', 1)
	                        ->where('default_status', 1)
	                        ->like('type', 'Registration', 'both')
	                        ->get()
	                        ->row();  
	                        
	                    #-----------------------------------#
	                    # sms  

	                    if(!empty($gateway) && !empty($sms_teamplate)) 
	                    {
	                        $this->load->library('smsgateway');
	                        $template = $this->smsgateway->template([
	                            'patient_name'   => $postData['firstname'].' '.$postData['lastname'],
	                            'patient_id'     => $postData['patient_id'],
	                            'message'        => $sms_teamplate->teamplate
	                        ]); 

	                        $this->smsgateway->send([
	                            'apiProvider' => $gateway->provider_name,
	                            'username'    => $gateway->user,
	                            'password'    => $gateway->password,
	                            'from'        => $gateway->authentication,
	                            'to'          => $postData['mobile'],
	                            'message'     => $template
	                        ]);

	                        // save delivary data
	                        $this->db->insert('custom_sms_info', array(
	                           'gateway' => $gateway->provider_name,
	                           'reciver'          => $postData['mobile'],
	                           'message'          => $template ,
	                           'sms_date_time'    => date("Y-m-d h:i:s")
	                        ));
	                    }
	                }
	                #-------------------------------------------------------#
	            #-------------------------SMS SEND -----------------------------#
	                #-------------------------------------------------------#

	                #set success message
	                $this->session->set_flashdata('message', display('save_successfully'));
	            } else {
	                #set exception message
	                $this->session->set_flashdata('exception', display('please_try_again'));
	            }
	            redirect('billing/admission/form');
	        }else{
	        	#set exception message
	        	$this->session->set_flashdata('exception', display('patient_id').' '.display('already_exists').' '.display('please_try_again'));
	        	redirect('billing/admission/form');
	        }

        } else {
            $data['doctor_list'] = $this->admission_model->doctor_list();
			$data['room_list'] = $this->room_model->room_list();
			$data['package_list'] = $this->admission_model->package_list();
			$data['insurance_list'] = $this->admission_model->insurance_list();
			$data['content'] = $this->load->view('billing/admission/form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
        } 
    }

    // create new patient and admission
    public function create_patient_admission(){
    	$data['module'] = display("billing");
        $this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
        $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
        $this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
        $this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
        #-------------------------------#
        
        //create a patient
        $data['patient'] = (object)$postData = [
            'patient_id'   => "P".$this->randStrGen(2,7),
            'firstname'    => $this->input->post('firstname'),
            'lastname'     => $this->input->post('lastname'),
            'password'     => md5(12345),
            'mobile'       => $this->input->post('mobile'),
            'blood_group'  => $this->input->post('blood_group'),
            'sex'          => $this->input->post('sex'), 
            'create_date'  => date('Y-m-d'),
            'created_by'   => $this->session->userdata('user_id'),
            'status'       => 1,
        ]; 

        //create a admission
        $data['admission'] = (object)$postAdmission = [
            'admission_id' => "U".$this->randStrGen(2,7),
            'patient_id'   => $postData['patient_id'],
            'doctor_id'    => $this->input->post('doctor_id'),
            'admission_date'  => date('Y-m-d'),
            'assign_by'   => $this->session->userdata('user_id'),
            'status'       => 1,
        ]; 

        //bed assign to patient
        $data['bed'] = (object)$postBed = [
            'serial'       => $this->randStrGen(2,6),
            'patient_id'   => $postData['patient_id'],
            'room_id'      => $this->input->post('room_id'),
            'bed_id'       => $this->input->post('bed_id'),
            'assign_date'  => date('Y-m-d'),
            'assign_by'   => $this->session->userdata('user_id'),
            'status'       => 1,
        ]; 
        #-------------------------------#

        #accounts information
	   $coa = $this->admission_model->headcode();

		if($coa->HeadCode!=NULL){
			$headcode=$coa->HeadCode+1;
		}else{
			$headcode="102030200001";
		}

		$c_code = $postData['patient_id'];
		$c_name = $this->input->post('firstname').'-'.$this->input->post('lastname');
		$c_acc=$c_code.'-'.$c_name;
		$createby = $this->session->userdata('user_id');
		$createdate = date('Y-m-d H:i:s');
		$data['aco']  = (Object) $coaData = [
			'HeadCode'         => $headcode,
			'HeadName'         => $c_acc,
			'PHeadName'        => 'Patient Receivable',
			'HeadLevel'        => '4',
			'IsActive'         => '1',
			'IsTransaction'    => '1',
			'IsGL'             => '0',
			'HeadType'         => 'A',
			'IsBudget'         => '0',
			'IsDepreciation'   => '0',
			'DepreciationRate' => '0',
			'CreateBy'         => $createby,
			'CreateDate'       => $createdate,
		]; 
        #-------------------------------#

        if ($this->form_validation->run() === true) {
        	// check exist patient ID
        	$rows = $this->db->select("patient_id")
			             	->from("patient")
			             	->where("patient_id", $postData['patient_id'])
			             	->get()
			             	->row();
			if(empty($rows)){
	            if ($this->patient_model->create($postData)) {
	                
	                // insert patient admission data
	                $this->admission_model->create($postAdmission);
	                $this->session->set_userdata(['admission_id'=> $postAdmission['admission_id']]);
	                // insert patient bed assign data
	                $this->bed_assign_model->create($postBed);
	                // change bed number status
		            $status = 0;
		            $this->bed_model->update_bed_status($postBed['bed_id'], $status);

		            // insert coa data
	                $this->admission_model->create_coa($coaData);

	                #-------------------------------------------------------#
	            #-------------------------SMS SEND -----------------------------#
	                #-------------------------------------------------------#
	                # SMS Setting
	                $setting = $this->db->select('registration')
	                   ->from('sms_setting')
	                   ->get()
	                   ->row();

	                if (!empty($setting) && ($setting->registration==1))
	                { 
	                    #-----------------------------------#
	                    # SMS Gateway Setting
	                    $gateway = $this->db->select('*')
	                       ->from('sms_gateway')
	                       ->where('default_status', 1)
	                       ->get()
	                       ->row();

	                    #-----------------------------------#
	                    # schedules list
	                    $sms_teamplate = $this->db->select('teamplate')
	                        ->from('sms_teamplate')
	                        ->where('status', 1)
	                        ->where('default_status', 1)
	                        ->like('type', 'Registration', 'both')
	                        ->get()
	                        ->row();  
	                        
	                    #-----------------------------------#
	                    # sms  

	                    if(!empty($gateway) && !empty($sms_teamplate)) 
	                    {
	                        $this->load->library('smsgateway');
	                        $template = $this->smsgateway->template([
	                            'patient_name'   => $postData['firstname'].' '.$postData['lastname'],
	                            'patient_id'     => $postData['patient_id'],
	                            'message'        => $sms_teamplate->teamplate
	                        ]); 

	                        $this->smsgateway->send([
	                            'apiProvider' => $gateway->provider_name,
	                            'username'    => $gateway->user,
	                            'password'    => $gateway->password,
	                            'from'        => $gateway->authentication,
	                            'to'          => $postData['mobile'],
	                            'message'     => $template
	                        ]);

	                        // save delivary data
	                        $this->db->insert('custom_sms_info', array(
	                           'gateway' => $gateway->provider_name,
	                           'reciver'          => $postData['mobile'],
	                           'message'          => $template ,
	                           'sms_date_time'    => date("Y-m-d h:i:s")
	                        ));
	                    }
	                }
	                #-------------------------------------------------------#
	            #-------------------------SMS SEND -----------------------------#
	                #-------------------------------------------------------#


	                #set success message
	                $this->session->set_flashdata('message', display('save_successfully'));
	            } else {
	                #set exception message
	                $this->session->set_flashdata('exception', display('please_try_again'));
	            }
	            redirect('billing/bill/form');
            }else{
	        	#set exception message
	        	$this->session->set_flashdata('exception', display('patient_id').' '.display('already_exists').' '.display('please_try_again'));
	        	redirect('billing/bill/form');
	        }

        } else {
            $data['doctor_list'] = $this->admission_model->doctor_list();
			$data['room_list'] = $this->room_model->room_list();
			$data['package_list'] = $this->admission_model->package_list();
			$data['insurance_list'] = $this->admission_model->insurance_list();
			$data['content'] = $this->load->view('billing/admission/form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
        } 
    }


    /*
    |----------------------------------------------
    |        id genaretor
    |----------------------------------------------     
    */
    public function randStrGen($mode = null, $len = null)
    {
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
