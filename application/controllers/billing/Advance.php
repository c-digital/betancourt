<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class advance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'billing/advance_model' 
		));

		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
	}
 
	public function index(){
		$data['module'] = display("billing"); 
		$data['title'] = display('advance_list');
        #-------------------------------#
        #
        #pagination starts
        #
        $config["base_url"] = base_url('billing/advance/index');
        $config["total_rows"] = $this->db->count_all('bill_advanced');
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
        $data['advances'] = $this->advance_model->read($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends
        #    
		$data['content'] = $this->load->view('billing/advance/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 



	public function form($id = null){
		$data['module'] = display("billing");
		$data['title'] = display('add_advance');
		// get admission id
		$data['admission_id'] = (!empty($this->input->get('aid'))?$this->input->get('aid'):null);
		#-------------------------------#
		$this->form_validation->set_rules(
		    'admission_id', display('admission_id'),
		    array(
		        'required',
			    array(
	                'admission_callable',
			        function($value)
			        {
						$rows = $this->db->select("admission_id")
			             	->from("bill_admission")
			             	->where("admission_id", $value)
			             	->get()
			             	->num_rows();

			            if ($rows>0) 
			            {
			            	return true;
			            }
			            else 
			            {
			            	$this->form_validation->set_message('admission_callable', 'The {field} is not valid!');
	                       
			            	return false;
			            }
			        }
			    )
		    )
		);

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
		$this->form_validation->set_rules('amount', display('amount'),'required|max_length[11]');
		$this->form_validation->set_rules('payment_method', display('payment_method'),'max_length[255]');
		$this->form_validation->set_rules('cash_card_or_cheque', display('cash_card_or_cheque'),'max_length[10]');
		$this->form_validation->set_rules('receipt_no', display('receipt_no'),'max_length[100]');
		#-------------------------------#
		$data['advance'] = (object)$postData = array(
			'id'           => $this->input->post('id'), 
			'admission_id' => $this->input->post('admission_id'), 
			'patient_id'   => $this->input->post('patient_id'), 
			'amount'       => $this->input->post('amount'), 
			'payment_method'      => $this->input->post('payment_method'), 
			'cash_card_or_cheque' => $this->input->post('cash_card_or_cheque'), 
			'receipt_no'   => $this->input->post('receipt_no'), 
			'date'         => date("Y-m-d H:i:s") 
		); 
		#-------------------------------#
		if ($this->form_validation->run() === true) {

			#if empty $id then insert data
			if (empty($id)) 
			{
				if ($this->advance_model->create($postData)) {
					$adv_id = $this->db->insert_id();
					#--------Chart Of Account Info--#
					$patient_id = $postData['patient_id'];
					$p_name = $this->db->select('firstname,lastname')->from('patient')->where('patient_id',$patient_id)->get()->row();
					$c_acc=$patient_id.'-'.$p_name->firstname.'-'.$p_name->lastname;
			        $coatransactionInfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$c_acc)->get()->row();
			        $COAID = $coatransactionInfo->HeadCode;
						
				    // patient advance credit
				    $patientCredit = array(
				      'VNo'         => $adv_id,
				      'Vtype'       => 'Patient Advance',
				      'VDate'       => date('Y-m-d'),
				      'COAID'       => $COAID,
				      'Narration'   => 'Advance For Patient Id '.$patient_id,
				      'Debit'       => 0,
				      'Credit'      => $postData['amount'],
				      'StoreID'     => 2,
				      'IsPosted'    => 1,
				      'CreateBy'    => $this->session->userdata('user_id'),
				      'CreateDate'  => date('Y-m-d H:i:s'),
				      'IsAppove'    => 1
			        ); 

			        if($postData['cash_card_or_cheque']=='cash'){
			        	//Account cash in hand receivable  Debit
			        	$receivable = array(
					      'VNo'            => $adv_id,
					      'Vtype'          => 'Patient Advance',
					      'VDate'          => date('Y-m-d'),
					      'COAID'          => 1020101,
					      'Narration'      => 'Advance Payment For Patient Id '.$patient_id,
					      'Debit'          => $postData['amount'],
					      'Credit'         => 0,
					      'IsPosted'       => 1,
					      'StoreID'        => 2,
					      'CreateBy'       => $this->session->userdata('user_id'),
					      'CreateDate'     => date('Y-m-d H:i:s'),
					      'IsAppove'       => 1
					    );
			        }else{
			        	//Account check or card in state bank receivable  Debit
			        	$receivable = array(
					      'VNo'            => $adv_id,
					      'Vtype'          => 'Patient Advance',
					      'VDate'          => date('Y-m-d'),
					      'COAID'          => 102010204,
					      'Narration'      => 'Advance Payment For Patient Id '.$patient_id,
					      'Debit'          => $postData['amount'],
					      'Credit'         => 0,
					      'IsPosted'       => 1,
					      'StoreID'        => 2,
					      'CreateBy'       => $this->session->userdata('user_id'),
					      'CreateDate'     => date('Y-m-d H:i:s'),
					      'IsAppove'       => 1
					    );
			        }
			 	    
					// insert transaction
					$this->db->insert('acc_transaction',$patientCredit);
				    $this->db->insert('acc_transaction',$receivable);
				    #--------------------------------#
					$this->session->set_flashdata('message', display('save_successfully'));
				} 
				else 
				{
					$this->session->set_flashdata('exception', display('please_try_again'));
				} 
				redirect('billing/advance/form/');
			}
			else 
			{

				if ($this->advance_model->update($postData)) {
					$this->session->set_flashdata('message', display('update_successfully'));
				} 
				else 
				{
					$this->session->set_flashdata('exception', display('please_try_again'));
				} 
				redirect('billing/advance/form/'.$id);
			}

		} else { 
			if (!empty($id))
			{
				$data['advance'] = $this->advance_model->read_by_id($id);
			}
			$data['content'] = $this->load->view('billing/advance/form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

  

    public function delete($id = null) 
    {
        if ($this->advance_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
		redirect('billing/advance/index');
    }

    // get patint id by admission id
    public function patient_id_by_admission()
    {
        $admission_id = $this->input->post('admission_id');

        if (!empty($admission_id)) {
            $query = $this->db->select('patient_id')
                ->from('bill_admission')
                ->where('admission_id',$admission_id)
                ->get();

            if ($query->num_rows() > 0) {
                $data['message'] = $query->row()->patient_id;
                $data['status'] = true;
            } else {
                $data['message'] = display('invalid_input');
                $data['status'] = false;
            }
        } 

        echo json_encode($data);
    }


}
