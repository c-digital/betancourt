<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 |----Doctor for BackEnd-------|
*/
class Doctor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'doctor_model',
			'department_model',
			'setting_model'
		));

		if ($this->session->userdata('isLogIn') == false)
		redirect('login'); 	
	}
 
  
	public function index(){  
		$data['module'] = display("doctors");
		$data['title'] = display('doctor_list');
		$data['doctors'] = $this->doctor_model->read();
		$data['languages'] = $this->doctor_model->read_doctor_language();
		$data['content'] = $this->load->view('doctor',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 


	public function create(){
		$data['module'] = display("doctors");
		$data['title'] = display('add_doctor');
		#-------------------------------#
		$this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
		if ($this->input->post('user_id',true) == null) {
			$this->form_validation->set_rules('email', display('email'),'required|max_length[50]|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
		}
		$this->form_validation->set_rules('blood_group', display('blood_group'),'max_length[10]');
		$this->form_validation->set_rules('sex', display('sex'),'required|max_length[10]');
		$this->form_validation->set_rules('date_of_birth', display('date_of_birth'),'max_length[10]');
		$this->form_validation->set_rules('status',display('status'),'required');
		#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'assets/images/doctor/',
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
		$data['doctor'] = (object)$postData = [
			'user_id'      => $this->input->post('user_id',true),
			'firstname'    => $this->input->post('firstname',true),
			'lastname' 	   => $this->input->post('lastname',true),
			'email' 	   => $this->input->post('email',true),
			'password' 	   => md5($this->input->post('password',true)),
			'user_role'    => 2,
			'department_id' => $this->input->post('department_id',true),
			'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
        	'date_of_birth' => date('Y-m-d', strtotime(($this->input->post('date_of_birth',true) != null)? $this->input->post('date_of_birth',true): date('Y-m-d'))),
			'sex' 		   => $this->input->post('sex',true),
			'blood_group'  => $this->input->post('blood_group',true),
			'created_by'   => $this->session->userdata('user_id'),
			'create_date'  => date('Y-m-d'),
			'status'       => $this->input->post('status',true),
		]; 
		#-------------------------------#

		if ($this->form_validation->run() === true) {

			#if empty $user_id then insert data
			if (empty($postData['user_id'])) {
				if ($this->doctor_model->create($postData)) {
					$insertId = $this->db->insert_id();

					#-------insert language data-------#
					$name   = $this->input->post('name');
					$rating = $this->input->post('rating');
					$type  = $this->input->post('type');
			
					$languages = array();
					for ($i=0; $i < sizeof($name); $i++)
					{
						if(!empty($name[$i]))  
						$this->db->insert('user_language', array(
							'user_id' 	   => $insertId,
							'name' => $name[$i],
							'rating'   => $rating[$i],
							'type'   => $type[$i]
						));
					} 

					// insert language data
					$langData = [
						'user_id'      => $insertId,
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
					$this->doctor_model->create_lang($langData);

					#chart of account info
					$coa = $this->doctor_model->headcode();
					if($coa->HeadCode!=NULL){
						$headcode=$coa->HeadCode+1;
					}else{
						$headcode="502020100001";
					}

					$c_code = $insertId;
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
					$this->doctor_model->create_coa($coaData);
					/*-----------------------------*/
					
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id')) {
					$this->session->set_userdata([
						'picture'   => $postData['picture'],
						'fullname'  => $postData['firstname'].' '.$postData['lastname']
					]); 
				}

				redirect('doctor/create');
			} else {
				if ($this->doctor_model->update($postData)) {
					
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}

				//update profile picture
				if ($postData['user_id'] == $this->session->userdata('user_id')) {					
					$this->session->set_userdata([
						'picture'   => $postData['picture'],
						'fullname'  => $postData['firstname'].' '.$postData['lastname']
					]); 
				}
				
				redirect('doctor/edit/'.$postData['user_id']);
			}

		} else {
			$data['languageList'] = $this->setting_model->languageList();
			$data['department_list'] = $this->department_model->department_list(); 
			$data['content'] = $this->load->view('doctor_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}
 
	public function add_language($user_id = null){
		$data['module'] = display("doctors");
		$data['title'] = display('languages');
		#-------------------------------#
		$this->form_validation->set_rules('language', display('language') ,'required');
		$this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
		$this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
		$this->form_validation->set_rules('designation', display('designation') ,'required|max_length[100]');
		$this->form_validation->set_rules('address', display('address'),'max_length[255]');
		$this->form_validation->set_rules('mobile', display('mobile'),'required|max_length[25]');
		$this->form_validation->set_rules('career_title', display('career_title'),'max_length[200]');
		$this->form_validation->set_rules('short_biography',display('short_biography'),'trim');
		$this->form_validation->set_rules('specialist', display('specialist'),'required|max_length[200]');
		#-------------------------------#
		
		$data['doctor'] = (object)$postData = [
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
				$pos_res = $this->db->select('*')
							->from('user_lang')
							->where('user_id',$postData['user_id'])
							->where('language', $postData['language'])
							->get()
							->num_rows();
				if($pos_res > 0){
					#set exception message
					$this->session->set_flashdata('exception', display('language').' '.display('already_exists'));
					redirect('doctor/add_language/'.$postData['user_id']);
				}else{
					if ($this->doctor_model->create_lang($postData)) {
					#set success message
					$this->session->set_flashdata('message',display('save_successfully'));
					} else {
						#set exception message
						$this->session->set_flashdata('exception', display('please_try_again'));
					}
					redirect('doctor/add_language/'.$postData['user_id']);
				}

			} else {
				if ($this->doctor_model->update_lang($postData)) {
					
					#set success message
					$this->session->set_flashdata('message',display('update_successfully'));
				} else {
					#set exception message
					$this->session->set_flashdata('exception', display('please_try_again'));
				}
				
				redirect('doctor/edit_lang/'.$postData['id']);
			}

		} else {
			$data['user'] = $this->doctor_model->read_by_id($user_id);
			$data['languageList'] = $this->setting_model->languageList();
			$data['content'] = $this->load->view('doctor_lang_form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}
 

	public function profile($user_id = null){ 	
		$data['module'] = display("doctors");	 
		$data['title'] = display('doctor_profile');
		#-------------------------------#
		$data['user'] = $this->doctor_model->read_profile_by_id($user_id);
		$data['content'] = $this->load->view('doctor_profile',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function edit($user_id = null) {
		$data['module'] = display("doctors");
		$user_role = $this->session->userdata('user_role');
		if ($user_role == 1 && $this->session->userdata('user_id') == $user_id)
			$data['title'] = display('edit_profile');  
		elseif ($user_role == 2)
			$data['title'] = display('edit_profile');  
		else
			$data['title'] = display('edit_doctor');  
		#-------------------------------#
		$data['department_list'] = $this->department_model->department_list(); 
		$data['doctor'] = $this->doctor_model->read_by_id($user_id);
		$data['languages'] = $this->doctor_model->read_language($user_id);
		#-------------------------------#
		if (($data['doctor']->user_id != $this->session->userdata('user_id'))
		&& $this->session->userdata('user_role') != 1)
			redirect('login');
		#-------------------------------#
		$data['content'] = $this->load->view('doctor_form',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function edit_lang($id = null) {
		$data['module'] = display("doctors");
		$user_role = $this->session->userdata('user_role');
		if ($user_role == 1)
			$data['title'] = display('edit_profile');  
		elseif ($user_role == 2)
			$data['title'] = display('edit_profile');  
		else
			$data['title'] = display('edit_doctor');  
		#-------------------------------#
		$data['languageList'] = $this->setting_model->languageList();
		$data['doctor'] = $this->doctor_model->read_lang_by_id($id);
		#-------------------------------#
		if (($data['doctor']->user_id != $this->session->userdata('user_id'))
		&& $this->session->userdata('user_role') != 1)
			redirect('login');
		#-------------------------------#
		$data['content'] = $this->load->view('doctor_lang_edit',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}
 

	public function delete($user_id = null){ 
		if ($this->doctor_model->delete($user_id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('doctor');
	}

	public function delete_lang($id = null){ 
		if ($this->doctor_model->delete_lang($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('doctor');
	}

	/*
	 |----------User Language---------
	*/
	public function create_language(){
		$data['module'] = display("doctors");
		$this->form_validation->set_rules('user_id',display('doctor_name')  ,'required');
		#-------------------------------#
		
		$user_id = $this->input->post('user_id');
		$name   = $this->input->post('name');
		$rating = $this->input->post('rating');
		$type  = $this->input->post('type');
		
		/*-----------CREATE A NEW RECORD-----------*/
        if ($this->form_validation->run() === true) { 
        	        #-------insert language data-------#
					for ($i=0; $i < sizeof($name); $i++)
					{
						if(!empty($name[$i]))  
						$this->db->insert('user_language', array(
							'user_id' 	   => $user_id,
							'name'         => $name[$i],
							'rating'       => $rating[$i],
							'type'         => $type[$i]
						));
					} 
            if ($this->db->affected_rows() > 0) {
                #set success message
                $this->session->set_flashdata('message', display('save_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception',display('please_try_again'));
            }
            redirect('doctor/create_language');
        } else {
            $data['title'] = display('language');
            $data['doctor_list'] = $this->doctor_model->doctor_list();
            $data['content'] = $this->load->view('user_language_form',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
	}

	public function languages(){ 		
		$data['module'] = display("doctors"); 
		$data['title'] = display('language');
		#-------------------------------#
		$data['languages'] = $this->doctor_model->read_language();
		$data['content'] = $this->load->view('user_languages',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	public function delete_language($id = null){ 
		if ($this->doctor_model->delete_language($id)) {
			#set success message
			$this->session->set_flashdata('message',display('delete_successfully'));
		} else {
			#set exception message
			$this->session->set_flashdata('exception',display('please_try_again'));
		}
		redirect('doctor/languages');
	}

	public function import(){
		  $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		  foreach($file_data as $row){
			   $data = array(
			          'firstname' => $row["First Name"],
			          'lastname'  => $row["Last Name"],
			          'password'  => md5($row["Password"]),
			          'email'     => $row["Email"],
			          'blood_group'=> $row["Blood"],
			          'sex'       => $row["Sex"],
			          'date_of_birth'=> date('Y-m-d', strtotime($row["DOB"])),
			          'user_role' => 2,
			          'created_by'=> $this->session->userdata('user_id'),
			          'create_date'=> date('Y-m-d'),
			          'status'    => 1
			   );
			   $this->doctor_model->create($data);
			   $did = $this->db->insert_id();
			   $lanData = array(
			   		  'user_id'   => $did,
			          'firstname' => $row["First Name"],
			          'lastname'  => $row["Last Name"],
			          'language'  => 'english',
			          'designation'=> $row["Designation"],
			          'mobile'    => $row["Mobile"],
			          'phone'     => $row["Phone"],
			          'specialist'=> $row["Medical Specialty"]
			   );
			   $this->doctor_model->create_lang($lanData);
			 //   #chart of account info
				$coa = $this->doctor_model->headcode();
				if($coa->HeadCode!=NULL){
					$headcode=$coa->HeadCode+1;
				}else{
					$headcode="502020100001";
				}

				$c_code = $did;
				$c_name = $row["First Name"].'-'.$row["Last Name"];
				$c_acc=$c_code.'-'.$c_name;
				$createby = $this->session->userdata('user_id');
				$createdate = date('Y-m-d H:i:s');
				$data1['aco']  = (Object) $coaData = [
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
				$this->doctor_model->create_coa($coaData);
				/*-----------------------------*/
		  }
	 }

	
}
