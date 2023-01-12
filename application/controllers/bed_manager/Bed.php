<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bed extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        $this->load->model(array(
            'bed_manager/bed_model', 'bed_manager/room_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
        redirect('login'); 


    }
  
    public function index(){
        $data['module'] = display("bed_manager");
        $data['title'] = display('bed_list');
        #-------------------------------#
        $data['beds'] = $this->bed_model->read();
        $data['content'] = $this->load->view('bed_manager/bed_view',$data,true);
        $this->load->view('layout/main_wrapper',$data);
    } 

    public function form($id = null)
    { 
        /*----------FORM VALIDATION RULES----------*/
        $this->form_validation->set_rules('room_id', display('room_name') ,'required|max_length[100]');
        $this->form_validation->set_rules('description', display('description'),'trim');
        $this->form_validation->set_rules('bed_number', display('bed_number') ,'required|max_length[20]');
        $this->form_validation->set_rules('status', display('status') ,'required');

        /*-------------STORE DATA------------*/
        $data['room'] = (object)$postData = array( 
            'id'          => $this->input->post('id',true),
            'room_id'          => $this->input->post('room_id',true),
            'description' => $this->input->post('description',true),
            'bed_number'       => $this->input->post('bed_number',true),
            'status'      => $this->input->post('status',true)
        );  

        /*-----------CHECK ID -----------*/
        if (empty($id)) {
            /*-----------CREATE A NEW RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->bed_model->create($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('save_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('bed_manager/bed/form');
            } else {
                $data['module'] = display("bed_manager");
                $data['title'] = display('add_bed');
                $data['room_list'] = $this->room_model->room_list();
                $data['content'] = $this->load->view('bed_manager/bed_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 

        } else {
            /*-----------UPDATE A RECORD-----------*/
            if ($this->form_validation->run() === true) { 
                if ($this->bed_model->update($postData)) {
                    #set success message
                    $this->session->set_flashdata('message', display('update_successfully'));
                } else {
                    #set exception message
                    $this->session->set_flashdata('exception',display('please_try_again'));
                }
                redirect('bed_manager/bed/form/'.$postData['id']);
            } else {
                $data['module'] = display("bed_manager");
                $data['title'] = display('bed_edit');
                $data['bed'] = $this->bed_model->read_by_id($id);
                $data['room_list'] = $this->room_model->room_list();
                $data['content'] = $this->load->view('bed_manager/bed_edit_form',$data,true);
                $this->load->view('layout/main_wrapper',$data);
            } 
        } 
        /*---------------------------------*/
    }
 

    public function delete($id = null) 
    {
        if ($this->bed_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
        redirect('bed_manager/bed');
    }


    public function bed_by_room()
    {
        $room_id = $this->input->post('room_id');

        if (!empty($room_id)) {
            $query = $this->db->select('id,bed_number')
                ->from('bm_bed')
                ->where('room_id',$room_id)
                ->where('status',0)
                ->get();

            $option = "<option value=\"\">".display('select_option')."</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $bed) {
                    $option .= "<option value=\"$bed->id\">$bed->bed_number</option>";
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = display('bed_not_available');
                $data['status'] = false;
            }
        } else {
            $data['message'] = display('invalid_input');
            $data['status'] = null;
        }

        echo json_encode($data);

    }

    public function check_bed_limit($mode = null)
    {
        $room_id = $this->input->post('room_id');

        if (!empty($room_id)) {
            $query = $this->db->select('limit')
                ->from('bm_room')
                ->where('id',$room_id)
                ->where('status',1)
                ->get();
            if ($query->num_rows() > 0) {
                $result = $query->row();
            }

            $total_bed = $this->db->select('COUNT(id) as id')
                ->from('bm_bed')
                ->where('room_id',$room_id)
                ->get()->row();

            if($result->limit > $total_bed->id){
                $data['message'] = display('bed_number').' '.display('available');
                $data['status'] = true;
            } else {
                $data['message'] = display('bed_limit').' '.$result->limit.' '.display('bed_not_available');
                $data['status'] = false;
            }
        }

        //return data
        if ($mode === true) {
            return json_encode($data);
        } else {
            echo json_encode($data);
        }
    }
    
  
}
