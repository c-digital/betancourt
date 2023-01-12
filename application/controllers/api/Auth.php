<?php 

class Auth extends CI_Controller {
/*  
 *  @author   : BDTASK
 *  date    : 25 November, 2018
 *---------Developer------->
     Ashraf Rahman Babul
 *  Hospital Management System Pro
 *  http://bdtask.com
 *  support@bdtask.com
 */
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'api/auth_model',
            'patient_model'
        ));
        $this->api_key = 'BD@task987';
    }

    // api success out put
    public function JSONSuccessOutput($data) {
        header('Content-Type: application/json');
        $data['success'] = 'Ok';
        $response['response'] = $data;
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    // api error output
    public function JSONErrorOutput($errorMessage = 'Unknown Error') {
        header('Content-Type: application/json');
        $data['success'] = 'Error';
        $data['message'] = $errorMessage;
        $response['response'] = $data;
        echo json_encode($response, JSON_PRETTY_PRINT);
        exit;
    }

    /*
    |---------------------------------------------------
    |   Get apps settings
    |---------------------------------------------------
    */
    public function getSetting(){
        
          $response = $this->auth_model->get_settings();
          if(!empty($response)){
              $this->JSONSuccessOutput($response);
          }else{
              $this->JSONErrorOutput('Setting not found!');
          }
    }
 
    /*
    |---------------------------------------------------
    |   Get Login info
    |---------------------------------------------------
    */
    public function login(){  
        // check if click post or not
        $email = $this->input->get('email');
        $password =  $this->input->get('password');


        if (empty($email) || empty($password)) {
            $this->JSONErrorOutput('All fields required');

        } else {
                $data['user'] = (object) $userData =  [
                    'email'      => $email,
                    'password'   => $password
                ];

                $user = $this->checkUser($userData);
                if($user->num_rows() > 0) {
                     $response['data'] = $user->row();
                     $this->JSONSuccessOutput($response);

                } else {
                    // if email or password wrong
                    $this->JSONErrorOutput('Wrong Email or Password!');
                }
          }
    }

    // Auth check user
    public function checkUser($data = array()){

        return $this->db->select("*")
            ->from('patient')
            ->where('email', $data['email'])
            ->where('password', md5($data['password']))
            ->where('status', 1)
            ->get();
    }
    //----------------------------

    //patient registration
    public function registration(){
      //Read registration information
      $get_data = file_get_contents('php://input');
      $data = json_decode($get_data);

          $postData = array(
          'patient_id'   => "P".$this->randStrGen(2,7),
          'firstname'    => $data->firstname,
          'lastname'     => $data->lastname,
          'email'        => $data->email,
          'password'     => md5($data->password), 
          'mobile'       => $data->mobile,
          'affliate'     => null,
          'create_date'  => date('Y-m-d'),
          'created_by'   => 0,
          'status'       => 1
          );

           // check authencate 
           if ($this->checkAuth($data->api_key)) {
                // check required fields
                if (empty($postData['firstname']) || empty($postData['lastname']) || empty($postData['email']) || empty($postData['mobile'])) {
                      $this->JSONErrorOutput('Please fillup require fields!');
                  } else {
                    $paitentExist = $this->patient_model->getExistPatient($postData['email']);
                    if(empty($getExistPatient)){
                        if($this->auth_model->create($postData)){
                          
                             #accounts information
                             $coa = $this->patient_model->headcode();

                            if($coa->HeadCode!=NULL){
                              $headcode=$coa->HeadCode+1;
                            }else{
                              $headcode="102030200001";
                            }
                   
                            $c_code = $postData['patient_id'];
                            $c_name = $data->firstname.'-'.$data->lastname;
                            $c_acc=$c_code.'-'.$c_name;
                            $createby = 0;
                            $createdate = date('Y-m-d H:i:s');
                            $coaData = [
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

                          $response['message'] = 'Registration Successfully!';
                          $this->JSONSuccessOutput($response);
                        }
                      }else{
                        $response = display('patient').' '.display('already_exists');
                        $this->JSONErrorOutput($response);
                      }
                    }
                      
              }else{
               $this->JSONErrorOutput('Data not inserted!');
            }
      }

      //patient profile edit
    public function edit_profile(){
      //Read profile information
      $get_data = file_get_contents('php://input');
      $data = json_decode($get_data);

          $postData = array(
          'id'           => $data->id,
          'patient_id'   => $data->patient_id,
          'firstname'    => $data->firstname,
          'lastname'     => $data->lastname,
          'email'        => $data->email,
          'password'     => md5($data->password), 
          'phone'        => $data->phone,
          'mobile'       => $data->mobile,
          'blood_group'  => $data->blood_group,
          'sex'          => $data->sex, 
          'date_of_birth'=> date('Y-m-d', strtotime($data->date_of_birth)),
          'address'      => $data->address,
          'picture'      => $data->picture,
          'affliate'     => null,
          'created_by'   => 0,
          'status'       => 1
          );

           // check authencate 
           if ($this->checkAuth($data->api_key)) {
                // check required fields
                if (empty($postData['firstname']) || empty($postData['lastname']) || empty($postData['email']) || empty($postData['mobile'])) {
                      $this->JSONErrorOutput('Please fillup require fields!');
                  } else {
                      $this->auth_model->udate_profile($postData);
                      $response['message'] = 'Profile updated successfully!';
                      $this->JSONSuccessOutput($response);
                  }
              }else{
               $this->JSONErrorOutput('Data not updated!');
            }
      }

    public function UploadToServer(){
   
        // Check if image file is a actual image or fake image
        if (isset($_FILES["file"])) 
        {

        $target_dir = "assets/images/patient/";

        $temp = explode(".", @$_FILES["file"]["name"]);

        $newfilename = round(microtime(true)) . '.' . end($temp);

        $target_file_name = $target_dir .basename($newfilename);

             if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) 
             {
                $success = "Ok";
                $message = "Successfully Uploaded file";
                $filepath = $target_dir.$newfilename;
             }
             else 
             {
              $success = "Error";
              $message = "Error while uploading";
             }
        }
        else 
        {
             $success = "Error";
             $message = "Required Field Missing";
        }
        
        $json['response'] = [
            'success'   =>@$success,
            'message'   =>@$message,
            'file_path' =>@$filepath,
        ];

        echo json_encode($json, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    }

    public function getDoctors(){
          $list = $this->auth_model->get_doctors();
          if(!empty($list)){
              $response['data'] = $list;
              $this->JSONSuccessOutput($response);
          }else{
              $this->JSONErrorOutput('Doctor data not found!');
          }
    }

    public function getDepartments(){
        
          $list = $this->auth_model->get_departments();
          if(!empty($list)){
              $response['data'] = $list;
              $this->JSONSuccessOutput($response);
          }else{
              $this->JSONErrorOutput('Department not found!');
          }
    }

    //insert patient appointment 
    public function appointment(){
        //read patient document
        $get_data = file_get_contents('php://input');
        $data = json_decode($get_data);

           $postData = array(
              'appointment_id' => 'A'.$this->randStrGen(2, 7),
              'patient_id'     => $data->patient_id, 
              'department_id'  => $data->department_id, 
              'doctor_id'      => $data->doctor_id, 
              'schedule_id'    => $data->schedule_id, 
              'serial_no'      => $data->serial_no, 
              'problem'        => $data->problem, 
              'date'           => date('Y-m-d',strtotime($data->date)),
              'created_by'     => 0, 
              'create_date'    => date('Y-m-d'),
              'status'         => 1
            );

           // check authencate 
           if ($this->checkAuth($data->api_key)) {
              // check required fields
              if (empty($postData['patient_id']) || empty($postData['department_id']) || empty($postData['doctor_id']) || empty($postData['serial_no']) || empty($postData['schedule_id'])) {
                  #set required message
                  $this->JSONErrorOutput('Please fillup require fields!');
              }else{
                if ($this->auth_model->create_appointment($postData)) {

                              #-------------------------------------------------------#
                  #-------------------------SMS SEND -----------------------------#
                      #-------------------------------------------------------#
                      # SMS Setting
                      $setting = $this->db->select('appointment')
                         ->from('sms_setting')
                         ->get()
                         ->row();

                      if (!empty($setting) && ($setting->appointment==1))
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
                              ->like('type', 'Appointment', 'both')
                              ->get()
                              ->row();  


                          #-----------------------------------#
                          # sms
                          $sms = $this->db->select("
                                  a.*,
                                  CONCAT_WS(' ', d.firstname, d.lastname) AS doctor_name,
                                  CONCAT_WS(' ', p.firstname, p.lastname) AS patient_name,
                                  p.mobile
                              ")
                              ->from('appointment AS a')
                              ->join('user AS d', 'd.user_id=a.doctor_id', 'left')
                              ->join('patient AS p', 'p.patient_id=a.patient_id', 'left')
                              ->where('a.appointment_id', $postData['appointment_id'])
                              ->get()
                              ->row();


                          if(!empty($gateway) && !empty($sms_teamplate)) 
                          {
                              $this->load->library('smsgateway');
                              $template = $this->smsgateway->template([
                                  'doctor_name'    => $sms->doctor_name,
                                  'appointment_id' => $sms->appointment_id,
                                  'patient_name'   => $sms->patient_name,
                                  'patient_id'     => $sms->patient_id,
                                  'sequence'       => $sms->serial_no, 
                                  'appointment_date' => date('d F Y',strtotime($sms->date)),
                                  'message'        => $sms_teamplate->teamplate
                              ]); 

                              $this->smsgateway->send([
                                  'apiProvider' => $gateway->provider_name,
                                  'username'    => $gateway->user,
                                  'password'    => $gateway->password,
                                  'from'        => $gateway->authentication,
                                  'to'          => $sms->mobile,
                                  'message'     => $template
                              ]);
                             
                              // save data to sms info
                              $this->db->insert('sms_info', array(
                                  'doctor_id'   => $sms->doctor_id,
                                  'patient_id'  => $sms->patient_id,
                                  'phone_no'    => $sms->mobile,
                                  'appointment_id'   => $sms->appointment_id,
                                  'appointment_date' => $sms->date,
                                  'status'      => 0,
                                  'sms_counter' => 0
                              ));                        

                              // save delivary data
                              $this->db->insert('custom_sms_info', array(
                                 'gateway' => $gateway->provider_name,
                                 'reciver'          => $sms->mobile,
                                 'message'          => $template ,
                                 'sms_date_time'    => date("Y-m-d h:i:s")
                              ));
                          }
                      }
                      #-------------------------------------------------------#
                  #-------------------------SMS SEND -----------------------------#
                      #-------------------------------------------------------#

                        #set success message 
                        $response['message'] = 'Appointment Successfully!';
                        $this->JSONSuccessOutput($response);
                    }
              }
           }
    }

     public function UploadPatientFile(){
   
        // Check if image file is a actual image or fake image
        if (isset($_FILES["file"])) 
        {

        $target_dir = "assets/attachments/";

        $temp = explode(".", @$_FILES["file"]["name"]);

        $newfilename = round(microtime(true)) . '.' . end($temp);

        $target_file_name = $target_dir .basename($newfilename);

             if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_name)) 
             {
                $success = true;
                $message = "Successfully Uploaded file";
                $filepath = $target_dir.$newfilename;
             }
             else 
             {
              $success = false;
              $message = "Error while uploading";
             }
        }
        else 
        {
             $success = false;
             $message = "Required Field Missing";
        }
        
        $json['response'] = [
            'success'   =>@$success,
            'message'   =>@$message,
            'file_path' =>@$filepath,
        ];

        echo json_encode($json, JSON_UNESCAPED_UNICODE);
    }


    //insert patient appointment 
    public function patientDocument(){
        //read patient document
        $get_data = file_get_contents('php://input');
        $data = json_decode($get_data);
           $postData = array(
              'id'             => $data->id,
              'patient_id'     => $data->patient_id, 
              'doctor_id'      => $data->doctor_id, 
              'description'    => $data->description, 
              'hidden_attach_file'=> $data->hidden_attach_file, 
              'date'           => date('Y-m-d'),
              'upload_by'      => 0
            );

           // check authencate 
           if ($this->checkAuth($data->api_key)) {
              // check required fields
              if (empty($postData['patient_id']) || empty($postData['doctor_id'])) {
                  $this->JSONErrorOutput('Please fillup require fields!');
              }else{
                if(empty($postData['id'])){
                  if ($this->auth_model->upload_patient_document($postData)) {
                        #set success message
                        $response['message'] = 'Document uploaded successfully!';
                        $this->JSONSuccessOutput($response);
                  }
                }else{
                   $this->auth_model->update_patient_document($postData);
                   #set success message
                   $response['message'] = 'Document updated successfully!';
                    $this->JSONSuccessOutput($response);
                }
              }
           }
    }

    public function getPatientDocList(){
        # read json data
        $get_data = file_get_contents('php://input');
        $data = json_decode($get_data);

        if(!empty($data->patient_id)){
          $list = $this->auth_model->get_document_list($data->patient_id);
          if(!empty($list)){
              $response['data'] = $list;
              $this->JSONSuccessOutput($response);
          }else{
              #set data not found message
              $this->JSONErrorOutput('Data not found!');
          }
        }else{
          #set patient id empty message
          $this->JSONErrorOutput('Patient ID required!');
        }
    }

    // delete patient document by id
    public function deletePatientDoc(){
        # read document id data
        $get_data = file_get_contents('php://input');
        $data = json_decode($get_data);

        if(!empty($data->id)){
          $list = $this->auth_model->delete_patient_document($data->id, $data->path);
          if(!empty($list)){
              $response['message'] = 'Delete successful!';
              $this->JSONSuccessOutput($response);
          }
        }else{
          #set document id empty message
          $this->JSONErrorOutput('Document ID required!');
        }
    }

    public function getSchedules(){
         $list = $this->auth_model->get_schedules();
        if(!empty($list)){
            $response['data'] = $list;
            $this->JSONSuccessOutput($response);
          }else{
              $this->JSONErrorOutput('Data not found!');
          }
            
    }

    public function getPrescriptions(){
          # read json data
          $get_data = file_get_contents('php://input');
          $data = json_decode($get_data);

          if(!empty($data->patient_id)){
              $list = $this->auth_model->get_prescriptions($data->patient_id);
               if(!empty($list)){
                  $response['data'] = $list;
                  $this->JSONSuccessOutput($response);
              }else{
                  $this->JSONErrorOutput('Data not found!');
              }
            }else{
              #set patient id empty message
              $this->JSONErrorOutput('Patient ID required!');
            }
    }
 
    public function viewPrescription(){
          # read json data
          $get_data = file_get_contents('php://input');
          $data = json_decode($get_data);

          if(!empty($data->patient_id)){
              $list = $this->auth_model->get_single_prescription($data->id, $data->patient_id, $data->language);
               if(!empty($list)){
                  $response['data'] = $list;
                  $this->JSONSuccessOutput($response);
              }else{
                  $this->JSONErrorOutput('Data not found!');
              }
            }else{
              #set patient id empty message
              $this->JSONErrorOutput('Please fillup required fields!');
            }
    }

    public function pdf_prescription(){
          // get data
          $id         = $this->input->get('id');
          $patient_id = $this->input->get('patient_id');
          $language   = $this->input->get('language');

          if(!empty($patient_id)){
               $list['prescription'] = $this->auth_model->get_single_prescription($id, $patient_id, $language);
               $list['website'] = $this->auth_model->website();
               if(!empty($list['prescription'])){
                  // PDF Generator 
                  $this->load->library('pdfgenerator');
                  $dompdf = new DOMPDF();
                  $page = $this->load->view('prescription/pdf_prescription',$list,true);
                  $dompdf->load_html($page);
                  $dompdf->render();
                  $output = $dompdf->output();
                  file_put_contents('assets/data/pdf/'.$list['prescription']->patient_name.'_'.$list['prescription']->patient_id.'.pdf', $output);
                  $pdf    = 'assets/data/pdf/'.$list['prescription']->patient_name.'_'.$list['prescription']->patient_id.'.pdf';
                  #-------------------------------#
                  $response['data'] = $pdf;
                  $this->JSONSuccessOutput($response);
              }else{
                  $this->JSONErrorOutput('Data not found!');
              }
            }else{
              #set patient id empty message
              $this->JSONErrorOutput('Please fillup required fields!');
            }
    }

    // get doctor available days & time by doctor
    public function getAvailableDateTimes(){
          # read json data
          $get_data = file_get_contents('php://input');
          $data = json_decode($get_data);

          if(!empty($data->doctor_id)){
              $list = $this->auth_model->get_available_date_inMonth($data->doctor_id);
               if(!empty($list)){
                  $response['data'] = $list;
                  $this->JSONSuccessOutput($response);
              }else{
                  $this->JSONErrorOutput('Schedule not found!');
              }
            }else{
              #set patient id empty message
              $this->JSONErrorOutput('Doctor ID required!');
            }
    }

    public function getAppointSerials(){
        # read json data
        $get_data = file_get_contents('php://input');
        $data = json_decode($get_data);

        $date       = date("Y-m-d", strtotime($data->date)); 
        $day        = date("l", strtotime($data->date)); 

        if (!empty($data->doctor_id) && !empty($day)) {
            $query = $this->db->select('*')
                ->from('schedule')
                ->where('doctor_id',$data->doctor_id) 
                ->where('available_days',$day) 
                ->where('status',1)
                ->order_by('available_days','desc')
                ->get()->row();

            if(!empty($query)){
              /*get start and end time*/ 
              $start_time   = strtotime($query->start_time);
              $end_time     = strtotime($query->end_time);

              /*convert per patient time to minute*/
              $time_parse = date_parse($query->per_patient_time);
              $minute = $time_parse['hour'] * 60 + $time_parse['minute'];

              /*count total minute*/
              $total_minute = round(abs($end_time - $start_time) / 60,2); 
              /*total serial*/  
              $total_serial = round(abs($total_minute / $minute));
              /*--------- ------------------------------- */ 
              $serials = null; 
               if ($query->serial_visibility_type == 2) {
                      /*set sequential */
                      $seq = 1;
                      $timestamp = strtotime($query->start_time);
                      while ($seq <= $total_serial) {
                          $time_from = date('H:i',$timestamp); 
                          $timestamp = strtotime("+$minute minutes" , $timestamp); 
                          $time_to   = date('H:i',$timestamp);
                          //check serial number
                          $chech_exists_serial = $this->chech_exists_serial($query->doctor_id, $query->schedule_id, $seq, $date);
                          // store free serial
                          if(empty($chech_exists_serial)){
                            $serials[] = array(
                              'serial'=>$seq,
                              'sequence'=>$time_from.'-'.$time_to
                            );
                          }

                          $seq++;
                      } 
                      
                  } else {
                      /*set timestamp*/
                      $ts = 1;   
                      while ($ts <= $total_serial) {
                          //check serial number
                          $chech_exists_serial = $this->chech_exists_serial($query->doctor_id, $query->schedule_id, $ts, $date);
                          // store free serial
                          if(empty($chech_exists_serial)){
                            $serials[] = array(
                              'serial'=>$ts,
                              'sequence'=>(($ts<=9)?"0$ts":$ts)
                            );
                          }

                          $ts++;
                      }
                  }

                  if(!empty($serials)){
                  $response['data'] = $serials;
                  $this->JSONSuccessOutput($response);
              }else{
                  #if empty
                  $this->JSONErrorOutput('Data not found!');
              }
            
            }else{
              #if not availabe schedule
              $this->JSONErrorOutput('schedule not availabe!');
            }
          }else{
            #set required message
            $this->JSONErrorOutput('Please fillup required fields!');
          }
    }

    //chech serial number
    public function chech_exists_serial($doctor_id, $schedule, $serial, $date){
         return $this->db->select("*")
            ->from('appointment') 
            ->where('schedule_id', $schedule) 
            ->where('serial_no', $serial) 
            ->where('doctor_id', $doctor_id) 
            ->where('date', $date) 
            ->get()
            ->row();
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

    // check the api authincate
    public function checkAuth($key) {
        // get the api request
        $api_key = $key;

        // check the api username
        if (!$api_key || empty($api_key)) {
            $this->JSONErrorOutput('API Access key require!');
        } elseif ($api_key != $this->api_key) {
            $this->JSONErrorOutput('API Access Key is invalid !!!');
        }
        return true;
    }


}


