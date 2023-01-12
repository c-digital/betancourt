<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

public function __construct(){
        parent::__construct();

        $this->load->model(array(
            'dashboard_model',
            'user_dashboard_model',
            'setting_model',
            'noticeboard/notice_model',
            'messages/message_model',
            'website/home_model'
        )); 
} 
public function index(){
        // redirect to dashboard home page
    if($this->session->userdata('isLogIn')) 
    $this->redirectTo($this->session->userdata('user_role'));

    $this->form_validation->set_rules('email', display('email'),'required|max_length[50]|valid_email');
    $this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
    $this->form_validation->set_rules('user_role',display('user_type'),'required');
    #-------------------------------#
    $setting = $this->setting_model->read();
    $data['favicon'] = $setting->favicon;
    $data['title'] = $setting->title;

    $user_role = $this->input->post('user_role',true);

    $data['user'] = (object)$postData = [
        'email'     => $this->input->post('email',true),
        'password'  => md5($this->input->post('password',true)),
    ]; 
        #-------------------------------#
     if ($this->form_validation->run() === true) {
            //check user data
            //$check_user = $this->dashboard_model->check_user($postData); 
        if ($user_role == 1) {
            $check_user = $this->dashboard_model->check_user($postData);
            if(!empty($check_user)){
                if($check_user[0]->user_role == 1){
                  $checkPermission = $this->dashboard_model->userPermissionadmin($check_user[0]->user_id);
                }
                else{
                  $checkPermission = $this->dashboard_model->userPermission($check_user[0]->user_id);
                }
                $roleid=$check_user[0]->user_role;
                $rolename=$this->dashboard_model->check_role($roleid);
            }else {
                $this->session->set_flashdata('exception',display('incorrect_email_password'));
                //redirect to login form
                redirect('login');
                // print_r($rolename->type);exit;    
           }
            
        }
        
        $permission = array();
        if(!empty($checkPermission))
        foreach ($checkPermission as $value) {
            $permission[$value->directory] = array(
                'create' => $value->create,
                'read'   => $value->read,
                'update' => $value->update,
                'delete' => $value->delete
            );
        }
        if($check_user){
            // codeigniter session stored data          
            $session_data=$this->session->set_userdata([
                'isLogIn'     => true,
                'isAdmin'     => (($check_user[0]->user_role == 1)?true:false),
                'user_id'     => (($user_role==10)?$check_user[0]->id:$check_user[0]->user_id),
                'patient_id'  => (($user_role==10)?$check_user[0]->patient_id:null),
                'email'       => $check_user[0]->email,
                'fullname'    => $check_user[0]->firstname.' '.$check_user[0]->lastname,
                'user_role'   => (($user_role==10)?10:$check_user[0]->user_role),
                'rolename'    => $rolename->type, 
                'picture'     => $check_user[0]->picture, 
                'title'       => (!empty($setting->title)?$setting->title:null),
                'address'     => (!empty($setting->description)?$setting->description:null),
                'logo'        => (!empty($setting->logo)?$setting->logo:null),
                'favicon'     => (!empty($setting->favicon)?$setting->favicon:null),
                'footer_text' => (!empty($setting->footer_text)?$setting->footer_text:null),
                'tableLang' => (!empty($setting->language)?$setting->language:'english'),
                'permission'  => json_encode($permission)
            ]);

            #store user log
            $check_log = $this->db->get_where('user_log', array('user_id'=>$check_user[0]->user_id, 'date'=>date('Y-m-d')))->row();
            if(empty($check_log)){
                $user_log = array(
                    'user_id'   =>$check_user[0]->user_id,
                    'in_time'   =>date('H:i:s'),
                    'date'      =>date('Y-m-d'),
                    'status'   =>1
                );
                $this->db->insert('user_log', $user_log);
            }else{
                $user_log = array(
                    'user_id'   =>$check_user[0]->user_id,
                    'status'   =>1
                );
                $this->dashboard_model->log_update($user_log);
            }
            #---------------------------------------#
             #set welcome message
             $this->session->set_flashdata('welcome',display('welcome_back').' '.$this->session->userdata('fullname'));

            $this->redirectTo($user_role);
        }
        else {
             #set exception message
             $this->session->set_flashdata('exception',display('incorrect_email_password'));
            //redirect to login form
            redirect('login');
        } 
     }
     else {
            $this->load->view('layout/login_wrapper',$data);
     } 
    }  

    public function patient_login(){

        if($this->session->userdata('isLogIn_patient')) 
            $this->redirectTo($this->session->userdata('user_role'));

        $this->form_validation->set_rules('email', display('email'),'required|max_length[50]|valid_email');
        $this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');
        $this->form_validation->set_rules('user_role',display('user_type'),'required');
        #-------------------------------#
        $setting = $this->setting_model->read();
        $data['title']   = (!empty($setting->title)?$setting->title:null);
        $data['logo']    = (!empty($setting->logo)?$setting->logo:null); 
        $data['favicon'] = (!empty($setting->favicon)?$setting->favicon:null); 
        $data['footer_text'] = (!empty($setting->footer_text)?$setting->footer_text:null); 

        $user_role = $this->input->post('user_role',true);

        $data['user'] = (object)$postData = [
            'email'     => $this->input->post('email',true),
            'password'  => md5($this->input->post('password',true)),
        ]; 
            #-------------------------------#
           if ($this->form_validation->run() === true) {
                //check user data 
                //$check_user = $this->dashboard_model->check_user($postData); 
             if ($user_role == 10) {
                    $check_user = $this->dashboard_model->check_patient($postData); 
             }
             else {
                $this->session->set_flashdata('exception',display('incorrect_email_password'));
                //redirect to login form
                redirect('patient_login'); 
            }
            $permission = array();
            if(!empty($checkPermission))
            foreach ($checkPermission as $value) {
                $permission[$value->directory] = array(
                    'create' => $value->create,
                    'read'   => $value->read,
                    'update' => $value->update,
                    'delete' => $value->delete
                );
            }
            if($check_user){
                // codeigniter session stored data          
                $session_data=$this->session->set_userdata([
                    'isLogIn_patient'     => true,
                    'isAdmin'     => (($check_user[0]->user_role == 1)?true:false),
                    'user_id'     => (($user_role==10)?$check_user[0]->id:$check_user[0]->user_id),
                    'patient_id'  => (($user_role==10)?$check_user[0]->patient_id:null),
                    'email'       => $check_user[0]->email,
                    'fullname'    => $check_user[0]->firstname.' '.$check_user[0]->lastname,
                    'user_role'   => (($user_role==10)?10:$check_user[0]->user_role),
                    'picture'     => $check_user[0]->picture, 
                    'title'       => (!empty($setting->title)?$setting->title:null),
                    'address'     => (!empty($setting->description)?$setting->description:null),
                    'logo'        => (!empty($setting->logo)?$setting->logo:null),
                    'favicon'     => (!empty($setting->favicon)?$setting->favicon:null),
                    'footer_text' => (!empty($setting->footer_text)?$setting->footer_text:null),
                    'permission'  => json_encode($permission)
                ]);

                //set cookie data for language
                $userLang = $this->input->post('userLang',true);
                if(!empty($userLang)){
                    $cookie = array(
                      'name'   => 'Lng',
                      'value'  => $userLang,
                      'expire' => 31536000,
                      'domain' => ''
                    );
                    $this->input->set_cookie($cookie);
                }

                $this->redirectTo($user_role);
            }
            else {
                 #set exception message
                 $this->session->set_flashdata('exception',display('incorrect_email_password'));
                //redirect to login form
                redirect('patient_login');
            }
          }
          else {
                $data['languageList'] = $this->setting_model->languageList();
                $data['setting'] = $this->setting_model->read();
                $data['section'] = $this->home_model->section('signin');
                $data['contents'] = $this->load->view('website/login',$data, true);
                $this->load->view('website/patient_login_wrapper',$data);
          } 
    }

    public function redirectTo($user_role = null)
    {
      //  redirect('dashboard/home');
        //redirect to dashboard/home page
        switch ($user_role) {
            //case 1:
             case 1:
                    redirect('dashboard/home');
                break; 
            case 10:
                    redirect('dashboard_patient/home');
                break; 
            //if $user_role is not set 
            //then redirect to login
            default: 
                    redirect('login');
                break;
        }        
    }
 

    public function home(){      
        $data['module'] = display("dashboard");
        $data['title'] = display('home');
        #------------------------------#
        $dashboard = $this->session->userdata('isAdmin');
        $user_id = $this->session->userdata('user_id');
        // for admission
        if($dashboard==1){
            $data['notify']   = $this->dashboard_model->notify(); 
            $data['enquires'] = $this->dashboard_model->enquiry(); 
            $month='';
            $allPatient = '';
            $allAppoint = '';
            $allPrescrip = '';
            for ($i=1; $i <=12 ; $i++) {
                $month1 = date('m', strtotime("+$i month"));
                $year= date('Y', strtotime("+$i month - 1 year"));
                $month.= '"'.date('M-y', strtotime("+$i month - 1 year")).'",';
                $patient =  $this->dashboard_model->chart_patient($year,$month1);
                $appointment =  $this->dashboard_model->chart_appoint($year,$month1);
                $prescription =  $this->dashboard_model->chart_prescription($year,$month1);
                $allPatient.= $patient.','; 
                $allAppoint.= $appointment.','; 
                $allPrescrip.= $prescription.','; 
              }  
            $data['allmonth']     =  trim($month,',');
            $data['allPatient']   =  trim($allPatient,',');
            $data['allAppoint']   =  trim($allAppoint,',');
            $data['allPrescrip']  =  trim($allPrescrip,',');
            $data['lastPatient']    = $this->dashboard_model->today_patient();  

            $data['content']  = $this->load->view('home',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        }else{
            // others user
            $data['notices'] = $this->notice_model->read();
            $data['messages'] = $this->message_model->inbox($user_id);
            $data['notify']   = $this->user_dashboard_model->notify($user_id); 
            $data['enquires'] = $this->user_dashboard_model->enquiry(); 
            $month='';
            $allAppoint = '';
            $allPrescrip = '';
            for ($i=1; $i <=12 ; $i++) {
                $month1 = date('m', strtotime("+$i month"));
                $year= date('Y', strtotime("+$i month - 1 year"));
                $month.= '"'.date('M-y', strtotime("+$i month - 1 year")).'",';
                $appointment =  $this->user_dashboard_model->chart_appoint($year,$month1,$user_id);
                $prescription =  $this->user_dashboard_model->chart_prescription($year,$month1,$user_id); 
                $allAppoint.= $appointment.','; 
                $allPrescrip.= $prescription.','; 
              }  
            $data['allmonth']     =  trim($month,',');
            $data['allAppoint']   =  trim($allAppoint,',');
            $data['allPrescrip']  =  trim($allPrescrip,',');
            $data['lastPatient']    = $this->user_dashboard_model->today_patient();  

            $data['content']  = $this->load->view('home_user',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        }
       
    } 

    public function profile()
    {  
        $data['title'] = display('profile');
        #------------------------------# 
        $user_id = $this->session->userdata('user_id');
        $data['user']    = $this->dashboard_model->profile($user_id);
        $data['content'] = $this->load->view('profile', $data, true);
        $this->load->view('layout/main_wrapper',$data);
    } 

     public function profile_languages()
    {  
        $data['title'] = display('profile');
        #------------------------------# 
        $user_id = $this->session->userdata('user_id');
        $data['languages']    = $this->dashboard_model->profile_languages($user_id);
        $data['content'] = $this->load->view('profile_language', $data, true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function edit_language($id = null){
        $data['title'] = display('edit_profile');
        #------------------------------# 
        $user_id = $this->session->userdata('user_id');
        $data['languageList'] = $this->setting_model->languageList();
        $data['user']    = $this->dashboard_model->read_plang_by_id($id);
        $data['content'] = $this->load->view('edit_profile_language', $data, true);
        $this->load->view('layout/main_wrapper',$data);
    }
 
    public function update_language()
    {
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
            'lastname'     => $this->input->post('lastname',true),
            'designation'  => $this->input->post('designation',true),
            'address'      => $this->input->post('address',true),
            'phone'        => $this->input->post('phone',true),
            'mobile'       => $this->input->post('mobile', true), 
            'career_title' => $this->input->post('career_title',true),
            'short_biography' => $this->input->post('short_biography',true),
            'specialist'   => $this->input->post('specialist', true),
            'degree'       => $this->input->post('degree',true)
        ]; 
        #-------------------------------#

        if ($this->form_validation->run() === true) {

            if ($this->dashboard_model->update_language($postData)) {
                
                #set success message
                $this->session->set_flashdata('message',display('update_successfully'));
            } else {
                #set exception message
                $this->session->set_flashdata('exception', display('please_try_again'));
            }
            
            redirect('dashboard/edit_language/'.$postData['id']);

        } else {
            redirect('dashboard/edit_language/'.$postData['id']);
        } 
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

    public function form(){
        $data['title'] = display('edit_profile');
        $user_id = $this->session->userdata('user_id');
        #-------------------------------#
        $this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
        $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');

        $this->form_validation->set_rules('email',display('email'), "required|max_length[50]|valid_email|callback_email_check[$user_id]");

        $this->form_validation->set_rules('password', display('password'),'required|max_length[32]|md5');

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
            'lastname'     => $this->input->post('lastname',true),
            'email'        => $this->input->post('email',true),
            'password'     => md5($this->input->post('password',true)),
            'picture'      => (!empty($picture)?$picture:$this->input->post('old_picture')),
            'date_of_birth'=> date('Y-m-d', strtotime($this->input->post('date_of_birth',true))),
            'sex'          => $this->input->post('sex',true),
            'blood_group'  => $this->input->post('blood_group',true),
            'vacation'     => $this->input->post('vacation',true),
            'facebook'     => $this->input->post('facebook',true),
            'twitter'      => $this->input->post('twitter',true),
            'youtube'      => $this->input->post('youtube',true),
            'dribbble'     => $this->input->post('dribbble',true),
            'behance'      => $this->input->post('behance',true),
            'created_by'   => $this->session->userdata('user_id'),
            'create_date'  => date('Y-m-d'),
            'status'       => $this->input->post('status',true),
        ]; 
        #-------------------------------#
        if ($this->form_validation->run() === true) {

            if ($this->dashboard_model->update($postData)) {
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
            
            redirect('dashboard/form/');

        } else {
            $user_id = $this->session->userdata('user_id');
            $data['doctor'] = $this->dashboard_model->profile($user_id); 
            $data['content'] = $this->load->view('profile_form',$data,true);
            $this->load->view('layout/main_wrapper',$data);
        } 
    }
 
    public function registration(){
        $data['title'] = display('registration');
        $data['setting'] = $this->setting_model->read();
        $data['section'] = $this->home_model->section('signup');
        $data['contents'] = $this->load->view('website/registration',$data, true);
        $this->load->view('website/patient_login_wrapper',$data);
    }

    public function save_registration(){

        $this->form_validation->set_rules('firstname', display('first_name') ,'required|max_length[50]');
        $this->form_validation->set_rules('lastname', display('last_name'),'required|max_length[50]');
        $this->form_validation->set_rules('email', display('email'),'required|max_length[100]');
        $this->form_validation->set_rules('password', display('password'),'required|max_length[20]');
        #-------------------------------#
        
        $data['patient'] = (object)$postData = [
            'patient_id'   => "P".$this->randStrGen(2,7),
            'firstname'    => $this->input->post('firstname',true),
            'lastname'     => $this->input->post('lastname',true),
            'email'        => $this->input->post('email',true),
            'password'     => md5($this->input->post('password',true)),
            'create_date'  => date('Y-m-d'),
            'status'       => 1,
        ]; 
        #-------------------------------#
        if ($this->form_validation->run() === true) {
            $this->db->insert('patient', $postData);

            if ($this->db->affected_rows() > 0) {
                #set success message
                $data['message'] = display('thank_you_for_registration');
            } else {
                #set exception message
               $data['exception'] = display('please_try_again');
            }

        } else {
            $data['exception'] = validation_errors();
        } 
        echo json_encode($data);
    }

    public function forgotPassword(){

        $this->form_validation->set_rules('email', display('email'),'required|max_length[50]|valid_email');
        $this->form_validation->set_rules('new_pass', display('password'),'required|max_length[32]|md5');

        $data['patient'] = (object)$postData = [
            'email'     => $this->input->post('email',true),
            'password'  => md5($this->input->post('new_pass',true)),
        ]; 
            #-------------------------------#
        if ($this->form_validation->run() === true) {
            //check user data 
            $checkEmail = $this->dashboard_model->resetPatientPass($postData); 
            if(!empty($checkEmail)){
                $this->session->set_flashdata('message', display('update_successfully'));
                //redirect to login form
                redirect('patient_login');
            }else {
                 #set exception message
                 $this->session->set_flashdata('exception',display('email_is_not_existed'));
                //redirect to login form
                redirect('forgot_password');
            }
          }else {
            $data['title'] = display('password');
            $data['setting'] = $this->setting_model->read();
            $data['contents'] = $this->load->view('website/forgot_password',$data, true);
            $this->load->view('website/patient_login_wrapper',$data);
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
 



    public function logout()
    {   
        #store user log
        $user_log = array(
            'user_id'   =>$this->session->userdata('user_id'),
            'out_time'   =>date('H:i:s'),
            'status'   =>0
        );
        $this->dashboard_model->log_update($user_log);
        #---------------------------------------#

        $this->session->sess_destroy(); 
        redirect('login');
    } 
 
}
