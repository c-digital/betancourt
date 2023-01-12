<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    private $table = "patient";
    public function __construct()
    {
        parent::__construct();
        $this->language = $this->input->cookie('Lng', true);
        $this->defualt = $this->db->get('setting')->row()->language;
    }

    // get apps setting
    public function get_settings(){
        $about = $this->db->select("title as about_title, description as about_details")
                    ->from("ws_about")
                    ->where('language', $this->defualt)
                    ->where('status', 1)
                    ->get()
                    ->row();
        $hospital= $this->db->select("email, logo, facebook, twitter, instagram, skype, vimeo, dribbble")
                    ->from("ws_basic")
                    ->get()
                    ->row();
        $setting = $this->db->select("title, phone, address")
                    ->from("ws_setting")
                    ->where('language', $this->defualt)
                    ->where('status', 1)
                    ->get()
                    ->row();
        $footerText = $this->db->select("footer_text")->from("setting")->get()->row();
        $result = array(
            'about'       => $about,
            'contact'     => $hospital,
            'setting'     => $setting,
            'footer_text' => $footerText->footer_text
        );
        return $result;
    }

    public function create($data = [])
    {    
        return $this->db->insert($this->table,$data);
    }

    public function udate_profile($data = [])
    {    
        return $this->db->where('id', $data['id'])
                        ->update($this->table, $data);
    }
 
    // get all doctors
    public function get_doctors(){
    	return $this->db->select("user_lang.*, user.email,user.user_role, user.department_id, user.picture, user.date_of_birth, user.sex, user.blood_group, user.vacation, user.create_date")
			->from("user")
            ->join('user_lang', 'user_lang.user_id=user.user_id', 'left')
            ->where('user_lang.language',(!empty($this->language)?$this->language:$this->defualt)) 
			->where('user_role',2)
			->where('status',1)
			->order_by('user_id','asc')
			->get()
			->result_array();
    }

    // get all departments
    public function get_departments(){
        return $this->db->select("*")
            ->from("department")
            ->where('status',1)
            ->order_by('dprt_id','asc')
            ->get()
            ->result_array();
    }


    // insert appointment information
    public function create_appointment($data = [])
    {    
        return $this->db->insert('appointment',$data);
    }

    // insert patient document information
    public function upload_patient_document($data = [])
    {    
        return $this->db->insert('document',$data);
    }

    // update patient document information
    public function update_patient_document($data = [])
    {    
        return $this->db->where('id', $data['id'])
                        ->update('document', $data);
                
    }

    public function get_schedules(){
        $schedules = $this->db->select("dprt_id, name")
            ->from("department")
            ->where('status',1)
            ->order_by('dprt_id','asc')
            ->get()
            ->result();
        $i = 0;
        foreach ($schedules as $schedule) {
           $schedules[$i]->doctors = $this->get_doctor($schedule->dprt_id);
           $i++;
        }
        return $schedules;
    }

    public function get_doctor($dept_id = null){
        $schedules = $this->db->select("user_id, firstname, lastname, email, mobile")
            ->from("user")
            ->where('status',1)
            ->where('user_role',2)
            ->where('department_id', $dept_id)
            ->get()
            ->result();
        $i = 0;
        foreach ($schedules as $schedule) {
           $schedules[$i]->timetable = $this->get_schedule_by_doctor($schedule->user_id);
           $i++;
        }
        return $schedules;
    }

    public function get_schedule_by_doctor($doctor_id = null){
        $schedules = $this->db->select("*")
            ->from("schedule")
            ->where('doctor_id',$doctor_id)
            ->get()
            ->result();
    
        return $schedules;
    }

    // get available date in a month
    public function get_available_date_inMonth($doctor_id=null){
        $daystimes = $this->db->select("schedule_id, available_days")
            ->from("schedule")
            ->where('doctor_id',$doctor_id)
            ->get()
            ->result();
        $i=0;
        foreach ($daystimes as $value) {
           
            $current_day_this_month = date('d');
            $last_day_this_month  = date('t');
              $date = '';
              for($d=$current_day_this_month; $d<=$last_day_this_month; $d++ ){
                  $day = '';
                  $fulldate = date("Y-m-d", strtotime("-$d day +30 days"));
                  //$nextMonth = date("m", strtotime("m +  1 month"));
                  $day = date("l", strtotime("-$d day +30 days"));
                  $shortDay = date("D", strtotime("-$d day +30 days"));
                  if($day == $value->available_days){
                      $day1 = date("d", strtotime("-$d day +30 days"));
                      $dates[] = array(
                        "schedule_id"=>$value->schedule_id,
                        "date"       =>$shortDay.' '.$day1,
                        "fulldate"   =>$fulldate
                      );
                  }
              }
            $i++;
        }
        if(!empty($dates)){
            return $dates;
        }
    }


    public function get_prescriptions($patient_id = null)
    {
        return $this->db->select("pr.*, CONCAT_WS(' ', user.firstname, user.lastname) as doctor_name")
            ->from('pr_prescription as pr') 
            ->join('user', 'user.user_id=pr.doctor_id', 'left')
            ->where('patient_id', $patient_id) 
            ->order_by('id','desc')
            ->get()
            ->result();
    } 
  
    public function get_single_prescription($id, $patient_id, $language)
    { 
            
        return $this->db->select("
                pr.*, 
                CONCAT_WS(' ', pe.firstname, pe.lastname) AS patient_name,  
                pe.patient_id,
                pe.sex,
                pe.date_of_birth,
                CONCAT_WS(' ', drln.firstname, drln.lastname) AS doctor_name,  
                drln.designation,
                drln.address,
                drln.specialist,
                dp.name as department_name,
                in.insurance_name
            ")
            ->from('pr_prescription AS pr') 
            ->join('patient AS pe', 'pe.patient_id = pr.patient_id', 'left')
            ->join('user AS dr', 'dr.user_id = pr.doctor_id', 'left') 
            ->join('user_lang AS drln', 'drln.user_id = pr.doctor_id', 'left') 
            ->join('department AS dp', 'dp.dprt_id = dr.department_id', 'left')
            ->join('inc_insurance AS in', 'in.id = pr.insurance_id', 'left') 
            ->where('pr.id', $id) 
            ->where('drln.language',(!empty($language)?$language:'english')) 
            ->where('pr.patient_id',$patient_id) 
            ->get()
            ->row(); 
    } 

     public function website()
    {
        return $this->db->select('title, description, email, phone')
            ->from('setting')
            ->get()
            ->row();
    }

    public function get_document_list($id = null)
    {
        return $this->db->query("
            SELECT 
                document.*,
                CONCAT_WS(' ',u1.firstname, u1.lastname) AS doctor_name,
                IF (document.upload_by=0,'Patient',CONCAT_WS(' ',u2.firstname, u2.lastname)) AS upload_by
            FROM 
                document
            INNER JOIN 
                patient ON patient.patient_id = document.patient_id
            LEFT JOIN 
                user u1 ON u1.user_id = document.doctor_id
            LEFT JOIN 
                user u2 ON u2.user_id = document.upload_by
            WHERE 
                patient.patient_id = '$id'
            GROUP BY 
                document.id
            ")
            ->result(); 
    } 

    /*
     |-------------------------------
     | Delete part
     |-------------------------------
    */

     // delete patient document
     public function delete_patient_document($id, $file){
            $this->db->where('id',$id)
                ->delete('document');

            if ($this->db->affected_rows()) {
                if (file_exists($file)) {
                  @unlink($file);
                }
                return true;
            } else {
                return false;
            }
     }


}
