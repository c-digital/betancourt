<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'patient_model',
			'doctor_model',
            'document_model', 
            'setting_model'
		));
		$this->load->library(array('email'));
		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
	}
 
	public function index(){ 
		$data['module'] = display("patient");
		$data['title'] = display('patient_list');
		$data['patients'] = $this->patient_model->read();
		$data['content'] = $this->load->view('patient/patient',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	// search patient by id or name 
	public function search(){ 
		$data['module'] = display("patient");
		$data['title'] = display('search');
		$searchText = $this->input->get('search_text', true);
		$data['patients'] = $this->patient_model->search_patient($searchText);
		$data['content'] = $this->load->view('patient/patient_search_result',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

    public function email_check($email, $id){ 
        $emailExists = $this->db->select('email')
            ->where('email',$email) 
            ->where_not_in('id',$id) 
            ->get('patient')
            ->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
    }

	public function create(){
		$data['module'] = display("patient");
		$data['title'] = display('add_patient');
        $id = $this->input->post('id');
		#-------------------------------#
		$this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

		$this->form_validation->set_rules('email', display('email'),'required|max_length[100]');
		$this->form_validation->set_rules('phone', display('phone'),'max_length[20]');
		$this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[20]');
		// $this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
		$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'required|max_length[10]');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/patient/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize( 
				$picture, 293, 350
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', display('invalid_picture'));
		}
		#-------------------------------#
		if ($this->input->post('id') == null) { //create a patient
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id'),
				'patient_id'   => "P".$this->randStrGen(2,7),
				'firstname'    => $this->input->post('firstname'),
				'lastname' 	   => $this->input->post('lastname'),
				'email' 	   => $this->input->post('email'),
				'password' 	   => md5((!empty($this->input->post('password'))?$this->input->post('password'):12345)), 
				'phone'   	   => $this->input->post('phone'),
				'mobile'       => $this->input->post('mobile'),
				'blood_group'  => $this->input->post('blood_group'),
				'sex' 		   => $this->input->post('sex'), 
				'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth') != null)? $this->input->post('date_of_birth'): date('Y-m-d'))),
				'address' 	   => $this->input->post('address'),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'create_date'  => date('Y-m-d'),
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => $this->input->post('status'),
			]; 
		} else { // update patient
			$data['patient'] = (object)$postData = [
				'id'   		   => $this->input->post('id'),
				'firstname'    => $this->input->post('firstname'),
				'lastname' 	   => $this->input->post('lastname'),
				'email' 	   => $this->input->post('email'),
				'password' 	   => md5((!empty($this->input->post('password'))?$this->input->post('password'):12345)), 
				'phone'   	   => $this->input->post('phone'),
				'mobile'       => $this->input->post('mobile'),
				'blood_group'  => $this->input->post('blood_group'),
				'sex' 		   => $this->input->post('sex'),
				'date_of_birth' => date('Y-m-d', strtotime($this->input->post('date_of_birth'))),
				'address' 	   => $this->input->post('address'),
				'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
				'created_by'   => $this->session->userdata('user_id'),
				'status'       => $this->input->post('status'),
			]; 
		}

		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data 
			if (empty($postData['id'])) {
				$rows = $this->db->select("patient_id")
			             	->from("patient")
			             	->where("patient_id", $postData['patient_id'])
			             	->where("email", $postData['email'])
			             	->get()
			             	->row();
			    if(empty($rows)){
					if ($this->patient_model->create($postData)) {
						$patient_id = $this->db->insert_id();
						 #accounts information
					   $coa = $this->patient_model->headcode();

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
						// insert coa data
						$this->patient_model->create_coa($coaData);

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

		                /*----------Send mail------------*/
		                if(!empty($postData['email'])){
		                	$setting = $this->setting_model->read();
				            /* --------INITIAL CONFIG---------*/
				            $this->email->initialize(array(
				                'protocol' => (!empty($setting->protocol) ? $setting->protocol : 'sendmail '),
				                'mailpath' => (!empty($setting->mailpath) ? $setting->mailpath : '/usr/sbin/sendmail'),
				                'mailtype' => (!empty($setting->mailtype) ? $setting->mailtype : 'html'),
				                'validate_email' => (!empty($setting->validate_email) ? $setting->validate_email : false),
				                'wordwrap' => (!empty($setting->wordwrap) ? $setting->wordwrap : true),
				            )); 

				            $postData['subject'] = 'Your password for login.';
				            $postData['message']= 'Your Password is :'.(!empty($this->input->post('password'))?$this->input->post('password'):12345);

				            $this->email->to($postData['email']);
				            $this->email->from($this->session->userdata('email'));
				            $this->email->subject($postData['subject']);
				            $this->email->message($postData['message']);

				            $this->email->send();
				             
		                }

						#set success message
						$this->session->set_flashdata('message', display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('patient/profile/' . $patient_id);
				}else{
					$this->session->set_flashdata('exception', display('patient').' '.display('already_exists').' '.display('please_try_again'));
					redirect('patient/create');
				}

			} else {
				if ($this->patient_model->update($postData)) {
					#set success message
					$this->session->set_flashdata('message', display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				redirect('patient/edit/'.$postData['id']);
			}

		} else {
			$data['content'] = $this->load->view('patient/patient_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}


	public function profile($patient_id = null){ 
		$data['module'] = display("patient");
		$data['title'] =  display('patient_information');
		#-------------------------------#
		$data['profile'] = $this->patient_model->read_by_id($patient_id);
		$data['documents'] = $this->document_model->read_by_patient($patient_id);
		$data['content'] = $this->load->view('patient/patient_profile',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function edit($patient_id = null){ 
		$data['module'] = display("patient");
		$data['title'] = display('patient_edit');
		#-------------------------------#
		$data['patient'] = $this->patient_model->read_by_id($patient_id);
		$data['content'] = $this->load->view('patient/patient_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($patient_id = null) 
	{ 
		if ($this->patient_model->delete($patient_id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('patient');
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


	public function document(){ 
		$data['module'] = display("patient");
		$data['title'] = display('document_list');
		#--------------------------------------#
		$role = $this->session->userdata('user_role');
		if($role==2){
			$data['documents'] = $this->document_model->read_by_doctor();
		}else{
			$data['documents'] = $this->document_model->read();
		}
		$data['content'] = $this->load->view('patient/document',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 



    public function document_form(){  
    	$data['module'] = display("patient");
        $data['title'] = display('add_document'); 
        /*----------VALIDATION RULES----------*/
        $urole = $this->session->userdata('user_role');
        $this->form_validation->set_rules('patient_id', display('patient_id') ,'required|max_length[30]');
        if($urole!=2){
        	 $this->form_validation->set_rules('doctor_id', display('doctor_name'),'required|max_length[11]');
        }
        $this->form_validation->set_rules('description', display('document_title'),'required|trim|max_length[50]');
        $this->form_validation->set_rules('hidden_attach_file', display('attach_file'),'required|max_length[255]');
        /*-------------STORE DATA------------*/
        $data['document'] = (object)$postData = array( 
            'patient_id'  => $this->input->post('patient_id'),
            'doctor_id'   => (($urole==2)?$this->session->userdata('user_id'):$this->input->post('doctor_id')),
            'description' => $this->input->post('description'),
            'hidden_attach_file' => $this->input->post('hidden_attach_file'),
            'date'        => date('Y-m-d'),
            'upload_by'   => (($urole==10)?0:$this->session->userdata('user_id'))
        );  

        /*-----------CREATE A NEW RECORD-----------*/ 
        if ($this->form_validation->run() === true) { 
 
            if ($this->document_model->create($postData)) {
                #set success message
                $this->session->set_flashdata('message', display('save_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('patient/document_form');
        } else {
            $data['doctor_list'] = $this->doctor_model->doctor_list(); 
            $data['content'] = $this->load->view('patient/document_form',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        }  
    } 


    public function do_upload(){
        ini_set('memory_limit', '200M');
        ini_set('upload_max_filesize', '200M');  
        ini_set('post_max_size', '200M');  
        ini_set('max_input_time', 3600);  
        ini_set('max_execution_time', 3600);

        if (($_SERVER['REQUEST_METHOD']) == "POST") { 
            $filename = $_FILES['attach_file']['name'];
            $filename = strstr($filename, '.', true);
            $email    = $this->session->userdata('email');
            $filename = strstr($email, '@', true)."_".$filename;
            $filename = strtolower($filename);
            /*-----------------------------*/

            $config['upload_path']   = FCPATH .'./assets/attachments/';
            $config['allowed_types'] = 'pdf|doc|docx|bmp|gif|jpg|jpeg|jpe|png';
            $config['max_size']      = 0;
            $config['max_width']     = 0;
            $config['max_height']    = 0;
            $config['encrypt_name']  = true; 
            $config['file_ext_tolower'] = true; 
            $config['overwrite']     = false;

            $this->load->library('upload', $config);

            $name = 'attach_file';
            if ( ! $this->upload->do_upload($name) ) {
                $data['exception'] = $this->upload->display_errors();
                $data['status'] = false;
                echo json_encode($data);
            } else {
                $upload =  $this->upload->data();
                $data['message'] = display('upload_successfully');
                $data['filepath'] = './assets/attachments/'.$upload['file_name'];
                $data['status'] = true;
                echo json_encode($data);
            }
        }  
    } 


    public function document_delete($id = null)
    {
    	if ($this->document_model->delete($id)) {

	    	$file = $this->input->get('file');
	    	if (file_exists($file)) {
	    		@unlink($file);
	    	}
    		$this->session->set_flashdata('message', display('save_successfully'));

    	} else {
    		$this->session->set_flashdata('exception', display('please_try_again'));
    	}

    	redirect($_SERVER['HTTP_REFERER']);
    }

    public function import_csv_data(){ 
		$data['module'] = display("patient");
		$data['title'] = display('import_csv_data');
		#-------------------------------#
		$data['content'] = $this->load->view('patient/import_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	// import csv patient data
	public function import(){
		  $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		  foreach($file_data as $row){
			   $data = array(
			        'patient_id'   => "P".$this->randStrGen(2,7),
					'firstname'    => $row["First Name"],
					'lastname' 	   => $row["Last Name"],
					'email' 	   => $row["Email"],
					'password' 	   => md5((!empty($row["Password"])?$row["Password"]:12345)), 
					'phone'   	   => $row["Phone"],
					'mobile'       => $row["Mobile"],
					'blood_group'  => $row["Blood"],
					'sex' 		   => $row["Sex"], 
					'date_of_birth' => date('Y-m-d', strtotime(($row["DOB"] != null)? $row["DOB"]: date('Y-m-d'))),
					'address' 	   => $row["Address"],
					'create_date'  => date('Y-m-d'),
					'created_by'   => $this->session->userdata('user_id'),
					'status'       => 1
			   );
			   $this->patient_model->create($data);
			   
			  #accounts information
			   $coa = $this->patient_model->headcode();

				if($coa->HeadCode!=NULL){
					$headcode=$coa->HeadCode+1;
				}else{
					$headcode="102030200001";
				}

				$c_code = $row["Patient Id"];
				$c_name = $row["First Name"].'-'.$row["Last Name"];
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
				// insert coa data
				$this->patient_model->create_coa($coaData);
				/*-----------------------------*/
		  }
	 }

}
