<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// load model
		$this->load->model(array(
			'human_resources/employee_model',
			'setting_model'
		));
		
		if ($this->session->userdata('isLogIn') == false) 
		redirect('login');  
	}
     
  
	public function index(){
		$data['module'] = display("human_resources");
        $data['title'] = display("employees_list");
		#-------------------------------#
		$data['employees'] = $this->employee_model->employees_list();
		$data['employeeLang'] = $this->employee_model->employees_lang();
		$data['role_name'] = $this->employee_model->role_list();

		$data['content'] = $this->load->view('human_resources/view', $data, true);
		$this->load->view('layout/main_wrapper',$data);
	} 

    public function email_check($email, $user_id)
    { 
    	$emailExists = $this->db->select('email')
    		->where('email',$email) 
    		->where_not_in('user_id',$user_id) 
    		->get('user')
    		->num_rows();

        if ($emailExists > 0) {
            $this->form_validation->set_message('email_check', 'The {field} field must contain a unique value.');
            return false;
        } else {
            return true;
        }
    }


	public function form($user_id = null)
	{  
		$this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
		$this->form_validation->set_rules('lastname',display('last_name'),'required|max_length[50]');

		if (!empty($user_id)) {
			$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");
		} else {
			$this->form_validation->set_rules('email',display('email'),'required|max_length[50]|valid_email|callback_email_check');
			//
		}
        if (empty($user_id)) {
		 $this->form_validation->set_rules('password',display('password'),'required|max_length[32]|md5');
        }
		$this->form_validation->set_rules('sex',display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('status',display('status'),'required');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/human_resources/',
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
		$user_role = $this->input->post('user_role');
		#-------------------------------#
		//when create a user
		$data['employee'] = (object)$postData = array(
			'user_id'      => $this->input->post('user_id'),
			'firstname'    => $this->input->post('firstname'),
			'lastname' 	   => $this->input->post('lastname'),
			'email' 	   => $this->input->post('email'),
			'password' 	   => md5($this->input->post('password')),
			'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
			'user_role'    => $this->input->post('user_role'),
			'sex'          => $this->input->post('sex'),
			'create_date'  => date('Y-m-d'),
			'created_by'   => $this->session->userdata('user_id'),
			'status'       => $this->input->post('status'),
		); 

        /*-----------CHECK ID -----------*/
        if (empty($user_id)) {

            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->employee_model->create($postData)){
                	$user_id = $this->db->insert_id();
                	//create role assign
					$data['employee'] = (object)$roleassignData = array(
						'user_id'      => $user_id,
						'roleid'      =>$user_role,
						'createby'   => $this->session->userdata('user_id'),
						'createdate'  => date('Y-m-d'),
							
					); 
                	$this->employee_model->create_role($roleassignData);

                	$langData = [
						'user_id'      => $user_id,
						'language'     => $this->session->userdata('tableLang'),
						'firstname'    => $this->input->post('firstname',true),
						'lastname' 	   => $this->input->post('lastname',true),
						'designation'  => $this->input->post('designation',true),
						'address' 	   => $this->input->post('address',true),
						'phone'        => $this->input->post('phone',true),
						'mobile'       => $this->input->post('mobile', true), 
						'career_title' => $this->input->post('career_title',true),
						'short_biography' => $this->input->post('short_biography',true),
						'specialist'   => $this->input->post('specialist', true),
						'degree'       => $this->input->post('degree',true)
					]; 
					$this->employee_model->create_lang($langData);

                	#chart of account inf
					$coa = $this->employee_model->headcode();
					if($coa->HeadCode!=NULL){
						$headcode=$coa->HeadCode+1;
					}else{
						$headcode="502020100001";
					}

					$c_code = $user_id;
					$c_name = $postData['firstname'].'-'.$postData['lastname'];
					$c_acc=$c_code.'-'.$c_name;
					$createby = $this->session->userdata('user_id');
					$createdate = date('Y-m-d H:i:s');
					$data['aco']  = (Object) $coaData = [
						'HeadCode'         => $headcode,
						'HeadName'         => $c_acc,
						'PHeadName'        => 'Employee Payable',
						'HeadLevel'        => '4',
						'IsActive'         => '1',
						'IsTransaction'    => '1',
						'IsGL'             => '0',
						'HeadType'         => 'L',
						'IsBudget'         => '0',
						'IsDepreciation'   => '0',
						'DepreciationRate' => '0',
						'CreateBy'         => $createby,
						'CreateDate'       => $createdate,
					];
					$this->employee_model->create_coa($coaData);
					/*-----------------------------*/

                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('human_resources/employee/form');
            } else {
            	//view section
				$data['title'] = display('add_employee');
                //$data['userRoles'] = $this->user_roles();
                $data['userRoles'] = $this->employee_model->user_roles();
                $data['content'] = $this->load->view('human_resources/form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        }
        else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->employee_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('human_resources/employee/form/'.$postData['user_id']);
            } else {
            	//view section
            	$data['module'] = display("employees");
                $data['title'] = display('employee_edit');
                $data['employee'] = $this->employee_model->read_by_id($user_id);
                $data['userRoles'] = $this->employee_model->user_roles();
                $data['content'] = $this->load->view('human_resources/edit_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
	}
 
	public function add_language($user_id = null){
		$data['module'] = display("employees");
		$data['title'] = display('languages');
		#-------------------------------#
		$this->form_validation->set_rules('language', display('language') ,'required');
		$this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
		$this->form_validation->set_rules('designation', display('designation') ,'required|max_length[100]');
		$this->form_validation->set_rules('address', display('address'),'required|max_length[255]');
		$this->form_validation->set_rules('phone', display('phone'),'required|max_length[25]');
		$this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[25]');
		$this->form_validation->set_rules('career_title', display('career_title'),'required|max_length[200]');
		$this->form_validation->set_rules('short_biography',display('short_biography'),'trim');
		$this->form_validation->set_rules('specialist', display('specialist'),'required|max_length[200]');
		#-------------------------------#
		
		$data['employee'] = (object)$postData = [
			'id'           => $this->input->post('id'),
			'user_id'      => $this->input->post('user_id',true),
			'language'     => $this->input->post('language',true),
			'firstname'    => $this->input->post('firstname',true),
			'lastname' 	   => $this->input->post('lastname',true),
			'designation'  => $this->input->post('designation',true),
			'address' 	   => $this->input->post('address',true),
			'phone'        => $this->input->post('phone',true),
			'mobile'       => $this->input->post('mobile', true), 
			'career_title' => $this->input->post('career_title',true),
			'short_biography' => $this->input->post('short_biography',true),
			'specialist'   => $this->input->post('specialist', true),
			'degree'       => $this->input->post('degree',true)
		]; 
		#-------------------------------#

		if ($this->form_validation->run() === true) {

			#if empty $user_id then insert data
			if (empty($postData['id'])) {
				//check language exists
				$pos_res = $this->db->select('user_id, language')
							->from('user_lang')
							->where('user_id',$postData['user_id'])
							->where('language', $postData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('human_resources/employee/add_language/'.$postData['user_id']);
				}else{
					if ($this->employee_model->create_lang($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('human_resources/employee/add_language/'.$postData['user_id']);
				}

			} else {
				if ($this->employee_model->update_lang($postData)) {
					
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				
				redirect('human_resources/employee/edit_lang/'.$postData['id']);
			}

		} else {
			$data['user'] = $this->employee_model->read_user_by_id($user_id);
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('human_resources/language_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

	public function edit_lang($id = null){
		$data['module'] = display("employees");
		$data['title'] = display('employee_edit');
		$data['languageList'] = $this->setting_model->languageList();
        $data['employee'] = $this->employee_model->read_lang_by_id($id);
        $data['content'] = $this->load->view('human_resources/edit_language_form',$data,true);
        $this->load->view('layout/main_wrapper',$data);
	}
 
	public function profile($user_id = null){  
		$data['module'] = display("employees");
		$data['title'] =  display('employee_information');
		#-------------------------------# 
		$data['profile'] = $this->employee_model->read_profile_by_id($user_id);
		$data['role_type'] = $this->employee_model->role_type($user_id);
		$data['content'] = $this->load->view('human_resources/profile',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function delete($user_id = null, $user_role = null) 
	{		 
		if ($this->employee_model->delete($user_id, $user_role)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function delete_lang($id = null) 
	{		 
		if ($this->employee_model->delete_lang($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function user_roles($user_role = null)
	{
		$user_list = array(
			'Admin'          => 1,
			'Doctor'         => 2,
			'Accountant'     => 3,
			'Laboratorist'   => 4,
			'Nurse'          => 5,
			'Pharmacist'     => 6,
			'Receptionist'   => 7,
			'Representative' => 8,
			'Case_manager'   => 9,
		);

		if (!empty($user_role)) {
			$user_role = ucfirst($user_role);
			if (array_key_exists($user_role, $user_list)) {
				return $user_list[$user_role];
			} else {
				return null;
			}			
		} else {
			return array_flip($user_list);
		}

	}	

	//change by user
	public function profile_edit()
	{   
		$user_id       = $this->session->userdata('user_id');
		#-------------------------------#
		$this->form_validation->set_rules('firstname', display('first_name'),'required|max_length[50]');
		$this->form_validation->set_rules('lastname',display('last_name'),'required|max_length[50]');
		$this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");
		$this->form_validation->set_rules('password',display('password'),'required|max_length[32]|md5');
		$this->form_validation->set_rules('mobile',display('mobile'),'required|max_length[20]');
		$this->form_validation->set_rules('sex',display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('address',display('address'),'required|max_length[255]');
		$this->form_validation->set_rules('status',display('status'),'required');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/human_resources/',
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
		$data['employee'] = (object)$postData = array(
			'user_id'      => $user_id,
			'firstname'    => $this->input->post('firstname'),
			'lastname' 	   => $this->input->post('lastname'),
			'email' 	   => $this->input->post('email'),
			'password' 	   => md5($this->input->post('password')),
			'mobile'       => $this->input->post('mobile'),
			'sex' 		   => $this->input->post('sex'),
			'address' 	   => $this->input->post('address'),
			'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
		); 
		#-------------------------------#
        if ($this->form_validation->run() === true) { 
            if ($this->employee_model->update($postData)) {
                #set success message
                $this->session->set_flashdata('message', display('update_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('dashboard/profile');
        } else {
        	//view section
        	$data['module'] = display("employees");
            $data['title'] = display('edit_profile');
            $data['employee'] = $this->employee_model->read_by_id($user_id);
            $data['userRoles'] = $this->user_roles(); 
            $data['content'] = $this->load->view('human_resources/profile_edit',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
	}
}

