<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
* @author    : bdtask 
* @created at: 25.11.2017
*/
 
class Bill extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array(
			'billing/admission_model',
			'billing/bill_model',
			'billing/service_model', 
			'bed_manager/room_model', 
			'bed_manager/bed_model'
		));

		$this->db->query("SET sql_mode=''");

		if ($this->session->userdata('isLogIn') == false) 
			redirect('login');
	}

	public function cobrar()
	{
		extract($_POST);

		$cajero = $this->session->userdata('fullname');
		$caja = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row();
		$estado = $caja->estado;

		$saldo = $caja->saldo;
		$saldo = $saldo + $monto;

		if ($estado == 'Caja cerrada') {
			$this->session->set_flashdata('exception', 'No puede realizar operaciones de facturacion porque la caja está cerrada');
			return redirect("/billing/bill/all/$admission_id");
		}

		$concepto = 'Pago de internacion: ' . $admission_id;

		$this->db->query("INSERT INTO caja (tipo_movimiento, fecha, monto, metodo_pago, concepto, saldo, estado, cajero) VALUES ('Entrada', NOW(), '$monto', '$metodo_pago', '$concepto', '$saldo', 'Caja abierta', '$cajero')");

		$this->db->query("UPDATE bill_admission SET pagado = pagado + $monto WHERE admission_id = '$admission_id'");

		return redirect("/billing/bill/all/$admission_id");
	}

	public function all($admission_id)
	{
		$sql = "
			SELECT
				b.admission_id,
				DATE(NOW()) AS bill_date,
				ba.patient_id AS patient_id,
				p.date_of_birth,
				CONCAT_WS(' ', p.firstname, p.lastname) AS patient_name,
				p.sex,
				p.address,
				CONCAT_WS(' ', d.firstname, d.lastname) AS doctor_name,
				ba.admission_date,
				bp.name as package_name,
				DATEDIFF(ba.discharge_date, ba.admission_date) as total_days,
				ba.discharge_date AS discharge_date,
				ini.insurance_name AS insurance_name,
				ba.policy_no,
				ba.pagado
			FROM
				bill b
					LEFT JOIN bill_admission ba ON ba.admission_id = b.admission_id
					LEFT JOIN patient p ON p.patient_id = ba.patient_id
					LEFT JOIN user d ON d.user_id = ba.doctor_id
					LEFT JOIN bill_package bp ON bp.id = ba.package_id
					LEFT JOIN inc_insurance ini ON ini.id = ba.insurance_id
			WHERE
				b.admission_id = '$admission_id'
		";

		$data['services'] = $this->db->select("
				bill_details.*, 
				bill_service.id AS id, 
				bill_service.name AS name,
				CONCAT_WS(' ', user.firstname, user.lastname) AS professional,
				bill_details.professional_id,
				IF (bill.status, 'Pagada', 'Pendiente') AS bill_status
			")->from("bill_details")
			->join('bill', 'bill.bill_id = bill_details.bill_id', 'left')
			->join("bill_service", "bill_service.id = bill_details.service_id","left")
			->join("user", "user.user_id = bill_details.professional_id","left")
			->where("bill_details.admission_id", $admission_id)
			->get()
			->result();

		$data['advance'] = $this->db->select("DATE(a.date) AS date, a.receipt_no, a.amount")
			->from("bill_advanced AS a")
			->where("a.admission_id", $admission_id)
			->get()
			->result();

		$data['bed'] = $this->db->query("
			SELECT
			    bdas.assign_date AS adate,
			    bdas.discharge_date AS ddate,
			    bm_room.charge,
			    bm_bed.bed_number,
			    DATEDIFF(bdas.discharge_date, bdas.assign_date) AS tdays
			FROM
			    bm_bed_assign as bdas
			    LEFT JOIN bm_room ON bm_room.id = bdas.room_id
			    LEFT JOIN bm_bed ON bm_bed.id = bdas.bed_id
			WHERE
			    bdas.bill_id IN (
			        SELECT
			            bill.bill_id
			        FROM
			            bill
			        WHERE
			            bill.admission_id = 'UXUNS6AB'
			    );
			")->result();

		$data['website'] = $this->bill_model->website();
		$data['bill'] = $this->db->query($sql)->row();

		$data['content'] = $this->load->view('billing/bill/all', $data, true);		
		$this->load->view('layout/main_wrapper', $data);
	}
 
	public function index(){
		$data['module'] = display("billing"); 
		$data['title'] = display('bill_list');
        #-------------------------------#
        #
        #pagination starts
        #
        $config["base_url"] = base_url('billing/bill/index');
        $config["total_rows"] = $this->db->count_all('bill');
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
        $data['bills'] = $this->bill_model->read($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        #
        #pagination ends
        #    
		$data['content'] = $this->load->view('billing/bill/list',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	} 

	public function form_credit(){
		if (isset($_GET['aid'])) {
			$admission_id = $_GET['aid'];
			
			$data['admission'] = $this->db->query("
				SELECT
				    *,
				    inc_insurance.insurance_name,
				    patient.address,
				    patient.sex AS patient_sex,
				    CONCAT_WS(' ', patient.firstname, patient.lastname) AS patient_name,
				    patient.date_of_birth,
				    bill_package.name AS package_name
				FROM
				    bill_admission
				    LEFT JOIN patient ON bill_admission.patient_id = patient.patient_id
				    LEFT JOIN inc_insurance ON bill_admission.insurance_id = inc_insurance.id
				    LEFT JOIN bill_package ON bill_admission.package_id = bill_package.id
				WHERE
				    bill_admission.admission_id = '$admission_id'
			")->row();
		}
		
		$almacenes = $this->db->query('SELECT * FROM ha_medicine WHERE quantity > 0 GROUP BY name')->result();

		$i = 0;
		$j = 1;

		foreach ($almacenes as $almacen) {
			$data['medicines'][$i]['i'] = $j;
			$data['medicines'][$i]['name'] = 'Producto: ' . $almacen->name . ' (Almacen general)';
			$data['medicines'][$i]['id'] = $almacen->id;
			$data['medicines'][$i]['quantity'] = $almacen->quantity;
			$data['medicines'][$i]['price'] = $almacen->price;
			$data['medicines'][$i]['professional'] = '';
			$data['medicines'][$i]['product'] = '1';
			$data['medicines'][$i]['almacen'] = 'general';

			$i++;
			$j++;
		}

		$farmacias = $this->db->query('SELECT a.*, f.nombre FROM almacenes_productos a INNER JOIN almacenes f ON a.id_almacen = f.id WHERE quantity > 0 GROUP BY name')->result();

		foreach ($farmacias as $farmacia) {
			$data['medicines'][$i]['i'] = $j;
			$data['medicines'][$i]['name'] = 'Producto: ' . $farmacia->name . ' (' . $farmacia->nombre . ')';
			$data['medicines'][$i]['id'] = $farmacia->id;
			$data['medicines'][$i]['quantity'] = $farmacia->quantity;
			$data['medicines'][$i]['price'] = $farmacia->price;
			$data['medicines'][$i]['professional'] = '';
			$data['medicines'][$i]['product'] = '1';
			$data['medicines'][$i]['almacen'] = $farmacia->id_almacen;

			$i++;
			$j++;
		}

		$cajero = $this->session->userdata('fullname');
		$caja = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row();
		$estado = $caja->estado;

		if ($estado == 'Caja cerrada') {
			$this->session->set_flashdata('exception', 'No puede realizar operaciones de facturacion porque la caja está cerrada');
			return redirect('billing/bill');
		}

		$data['module'] = display("billing");
		$data['title'] = display('add_bill');
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
 
		$this->form_validation->set_rules('total', display('total'),'required|max_length[11]');
		$this->form_validation->set_rules('note', display('note'),'max_length[1024]');

		#-------------------------------#
		$bill_id = 'BL'.$this->randStrGen(2, 7);
		$patient_id = $this->input->post('patient_id');
		$admission_id = $this->input->post('admission_id');
		$package_id   = $this->input->post('package_id');
		#-------------------------------#
		$data['bill'] = (object)$postData = array(
			'bill_id'        => $bill_id, 
			'bill_type'      => 'ipd', 
			'bill_date'      => date('Y-m-d', strtotime($this->input->post('bill_date'))),
			'admission_id'   => $admission_id, 
			'discount'       => $this->input->post('discount'), 
			'tax'            => $this->input->post('tax'), 
			'total'          => $this->input->post('payable'), 
			'payment_method' => $this->input->post('payment_method'),   
			'card_cheque_no' => $this->input->post('card_cheque_no'),
			'receipt_no'     => $this->input->post('receipt_no'),
			'note'           => $this->input->post('note'),
			'date'           => date('Y-m-d H:i:s'),
			'status'         => $this->input->post('status'),
		);

		#-------------------------------#
		if ($this->form_validation->run()) {

			if ($this->bill_model->create($postData)) {
				$this->session->unset_userdata('admission_id');

				#------------bill details--------------#
				$sID   			= $this->input->post('service_id');
				$sName 			= $this->input->post('service_name');
				$sProfessional  = $this->input->post('service_professional');
				$sQty  			= $this->input->post('quantity');
				$sAmt  			= $this->input->post('amount');
				$product  		= $this->input->post('product');
				$almacen  		= $this->input->post('almacen');
				$services 		= array();

				for ($i=0; $i < sizeof($sID); $i++)
				{
					$service_id = $sID[$i];
					$service = $this->db->query("SELECT * FROM bill_service WHERE id = $service_id")->row();

					if (isset($service->professional_commission) && $service->professional_commission) {
						$professional_id = $sProfessional[0];
					}

					if(!empty($sID[$i]))  
					$this->db->insert('bill_details', array(
						'bill_id' 	   		=> $bill_id,
						'admission_id' 		=> $admission_id,
						'package_id'   		=> $package_id,
						'service_id'   		=> $sID[$i],
						'professional_id'   => $professional_id,
						'product'           => $product[$i],
						'almacen'           => $almacen[$i],
						'quantity'     		=> $sQty[$i],
						'amount'       		=> $sAmt[$i],
						'date'         		=> date('Y-m-d')
					));

					if (isset($service->professional_commission) && $service->professional_commission) {
						unset($sProfessional[0]);
					}
				} 
				#-------------------------------#

			   #--------Chart Of Account Info-------#
			   $p_name = $this->db->select('firstname,lastname')->from('patient')->where('patient_id',$patient_id)->get()->row();
			  
			   $c_acc=$patient_id.'-'.$p_name->firstname.'-'.$p_name->lastname;
		       $coatransactionInfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$c_acc)->get()->row();
		       $COAID = $coatransactionInfo->HeadCode;

		        // patient cash in for credit 
			   $patientCashInCredit = array(
			      'VNo'         => $bill_id,
			      'Vtype'       => 'Patient Bill',
			      'VDate'       => date('Y-m-d'),
			      'COAID'       => $COAID,
			      'Narration'   => 'Patient Credit For Bill amount - '.$patient_id,
			      'Debit'       => 0,
			      'Credit'      => $postData['total'],
			      'StoreID'     => 2,
			      'IsPosted'    => 1,
			      'CreateBy'    => $this->session->userdata('user_id'),
			      'CreateDate'  => date('Y-m-d H:i:s'),
			      'IsAppove'    => 1
		       ); 

		        if($postData['payment_method']=='cash'){
			  		 //ACC cash in hand receivable  Debit
				 	  $receivable = array(
					      'VNo'            => $bill_id,
					      'Vtype'          => 'Patient Bill',
					      'VDate'          => date('Y-m-d'),
					      'COAID'          => 1020101,
					      'Narration'      => 'Cash In Hand Debit For Bill from Patient- '.$patient_id,
					      'Debit'          => $postData['total'],
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
					      'VNo'            => $bill_id,
					      'Vtype'          => 'Patient Bill',
					      'VDate'          => date('Y-m-d'),
					      'COAID'          => 102010204,
					      'Narration'      => 'Card or Cheque In Debit For Bill from Patient- '.$patient_id,
					      'Debit'          => $postData['total'],
					      'Credit'         => 0,
					      'IsPosted'       => 1,
					      'StoreID'        => 2,
					      'CreateBy'       => $this->session->userdata('user_id'),
					      'CreateDate'     => date('Y-m-d H:i:s'),
					      'IsAppove'       => 1
					    );
				}
		      
				// insert transaction
				$this->db->insert('acc_transaction',$patientCashInCredit);
			    $this->db->insert('acc_transaction',$receivable);
			    #--------------------------------#

				$this->session->set_flashdata('message', display('save_successfully'));

				if ($postData['status']==1){
					$monto = $this->input->post('payable');

					if ($this->input->post('payment_method') == 'Cash') {
						$metodo_pago = 'Efectivo';
					}

					if ($this->input->post('payment_method') == 'Card') {
						$metodo_pago = 'Tarjeta';
					}

					if ($this->input->post('payment_method') == 'Cheque') {
						$metodo_pago = 'Cheque';
					}

					$concepto = 'Pago de factura: ' . $bill_id;

					$saldo = $caja->saldo+$monto;

					$cajero = $_SESSION['fullname'];

					$this->db->query("
						INSERT INTO caja (
								tipo_movimiento,
								fecha,
								monto,
								metodo_pago,
								concepto,
								saldo,
								estado,
								cajero)
						VALUES (
							'Entrada',
							NOW(),
							'$monto',
							'$metodo_pago',
							'$concepto',
							'$saldo',
							'Caja abierta',
							'$cajero');
					");
					$this->db->where('patient_id', $patient_id)->where('bill_id', null)->update('medication', array('bill_id'=>$bill_id, 'status'=>1));
					redirect("billing/bill/view/".$postData['bill_id']);
				}else{
					$this->db->where('patient_id', $patient_id)->where('bill_id', null)->update('medication', array('bill_id'=>$bill_id));
				}

			} 
			else 
			{
				$this->session->set_flashdata('exception', display('please_try_again'));
			} 
			redirect('billing/bill/form_credit');
		} else {  
			$data['doctor_list'] = $this->admission_model->doctor_list();
			$data['room_list'] = $this->room_model->room_list();
			$data['service_list'] = $this->service_model->readList();
			$data['content'] = $this->load->view('billing/bill/form_credit',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 


	public function form(){
		$cajero = $this->session->userdata('fullname');
		$caja = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row();
		$estado = $caja->estado;

		$almacenes = $this->db->query('SELECT * FROM ha_medicine WHERE quantity > 0 GROUP BY name')->result();

		$i = 0;
		$j = 1;

		if (isset($_GET['aid'])) {
			$admission_id = $_GET['aid'];

			$data['admission'] = $this->db->query("
				SELECT
				    *,
				    inc_insurance.insurance_name,
				    patient.address,
				    patient.sex AS patient_sex,
				    CONCAT_WS(' ', patient.firstname, patient.lastname) AS patient_name,
				    patient.date_of_birth,
				    bill_package.name AS package_name
				FROM
				    bill_admission
				    LEFT JOIN patient ON bill_admission.patient_id = patient.patient_id
				    LEFT JOIN inc_insurance ON bill_admission.insurance_id = inc_insurance.id
				    LEFT JOIN bill_package ON bill_admission.package_id = bill_package.id
				WHERE
				    bill_admission.admission_id = '$admission_id'
			")->row();
		}

		foreach ($almacenes as $almacen) {
			$data['medicines'][$i]['i'] = $j;
			$data['medicines'][$i]['name'] = 'Producto: ' . $almacen->name . ' (Almacen general)';
			$data['medicines'][$i]['id'] = $almacen->id;
			$data['medicines'][$i]['quantity'] = $almacen->quantity;
			$data['medicines'][$i]['price'] = $almacen->price;
			$data['medicines'][$i]['professional'] = '';
			$data['medicines'][$i]['product'] = '1';
			$data['medicines'][$i]['almacen'] = 'general';

			$i++;
			$j++;
		}

		$farmacias = $this->db->query('SELECT a.*, f.nombre FROM almacenes_productos a INNER JOIN almacenes f ON a.id_almacen = f.id WHERE quantity > 0 GROUP BY name')->result();

		foreach ($farmacias as $farmacia) {
			$data['medicines'][$i]['i'] = $j;
			$data['medicines'][$i]['name'] = 'Producto: ' . $farmacia->name . ' (' . $farmacia->nombre . ')';
			$data['medicines'][$i]['id'] = $farmacia->id;
			$data['medicines'][$i]['quantity'] = $farmacia->quantity;
			$data['medicines'][$i]['price'] = $farmacia->price;
			$data['medicines'][$i]['professional'] = '';
			$data['medicines'][$i]['product'] = '1';
			$data['medicines'][$i]['almacen'] = $farmacia->id_almacen;

			$i++;
			$j++;
		}

		if ($estado == 'Caja cerrada') {
			$this->session->set_flashdata('exception', 'No puede realizar operaciones de facturacion porque la caja está cerrada');
			return redirect('billing/bill');
		}

		$data['module'] = display("billing");
		$data['title'] = display('add_bill');
		$data['admission_id'] = (!empty($this->input->get('aid'))?$this->input->get('aid'):null);
		#-------------------------------#
 
		$this->form_validation->set_rules('bill_date', display('bill_date'),'required|max_length[10]');
		$this->form_validation->set_rules('total', display('total'),'required|max_length[11]');
		$this->form_validation->set_rules('payment_method', display('payment_method'),'required|max_length[255]'); 
		$this->form_validation->set_rules('note', display('note'),'max_length[1024]');

		#-------------------------------#
		$bill_id = 'BL'.$this->randStrGen(2, 7);
		$patient_id = $this->input->post('patient_id');
		$admission_id = $this->input->post('admission_id');
		$package_id   = $this->input->post('package_id');
		#-------------------------------#
		$data['bill'] = (object)$postData = array(
			'bill_id'        => $bill_id, 
			'bill_type'      => 'ipd', 
			'bill_date'      => date('Y-m-d', strtotime($this->input->post('bill_date'))),
			'admission_id'   => $admission_id, 
			'discount'       => $this->input->post('discount'), 
			'tax'            => $this->input->post('tax'), 
			'total'          => $this->input->post('payable'), 
			'payment_method' => $this->input->post('payment_method'),   
			'card_cheque_no' => $this->input->post('card_cheque_no'),
			'receipt_no'     => $this->input->post('receipt_no'),
			'note'           => $this->input->post('note'),
			'date'           => date('Y-m-d H:i:s'),
			'status'         => $this->input->post('status'),
		);

		#-------------------------------#
		if ($this->form_validation->run()) {

			if ($this->bill_model->create($postData)) {
				$this->session->unset_userdata('admission_id');

				#------------bill details--------------#
				$sID   			= $this->input->post('service_id');
				$sName 			= $this->input->post('service_name');
				$sProfessional  = $this->input->post('service_professional');
				$sQty  			= $this->input->post('quantity');
				$sAmt  			= $this->input->post('amount');
				$product  		= $this->input->post('product');
				$almacen  		= $this->input->post('almacen');
				$services 		= array();

				for ($i=0; $i < sizeof($sID); $i++)
				{
					$service_id = $sID[$i];
					$service = $this->db->query("SELECT * FROM bill_service WHERE id = $service_id")->row();

					if (isset($service->professional_commission) && $service->professional_commission) {
						$professional_id = $sProfessional[0];
					}

					if(!empty($sID[$i]))  
					$this->db->insert('bill_details', array(
						'bill_id' 	   		=> $bill_id,
						'admission_id' 		=> $admission_id,
						'package_id'   		=> $package_id,
						'service_id'   		=> $sID[$i],
						'professional_id'   => $professional_id,
						'product'           => $product[$i],
						'almacen'           => $almacen[$i],
						'quantity'     		=> $sQty[$i],
						'amount'       		=> $sAmt[$i],
						'date'         		=> date('Y-m-d')
					));

					if (isset($service->professional_commission) && $service->professional_commission) {
						unset($sProfessional[0]);
					}
				} 
				#-------------------------------#

			   #--------Chart Of Account Info-------#
			   $p_name = $this->db->select('firstname,lastname')->from('patient')->where('patient_id',$patient_id)->get()->row();
			  
			   $c_acc=$patient_id.'-'.$p_name->firstname.'-'.$p_name->lastname;
		       $coatransactionInfo = $this->db->select('HeadCode')->from('acc_coa')->where('HeadName',$c_acc)->get()->row();
		       $COAID = $coatransactionInfo->HeadCode;

		        // patient cash in for credit 
			   $patientCashInCredit = array(
			      'VNo'         => $bill_id,
			      'Vtype'       => 'Patient Bill',
			      'VDate'       => date('Y-m-d'),
			      'COAID'       => $COAID,
			      'Narration'   => 'Patient Credit For Bill amount - '.$patient_id,
			      'Debit'       => 0,
			      'Credit'      => $postData['total'],
			      'StoreID'     => 2,
			      'IsPosted'    => 1,
			      'CreateBy'    => $this->session->userdata('user_id'),
			      'CreateDate'  => date('Y-m-d H:i:s'),
			      'IsAppove'    => 1
		       ); 

		        if($postData['payment_method']=='cash'){
			  		 //ACC cash in hand receivable  Debit
				 	  $receivable = array(
					      'VNo'            => $bill_id,
					      'Vtype'          => 'Patient Bill',
					      'VDate'          => date('Y-m-d'),
					      'COAID'          => 1020101,
					      'Narration'      => 'Cash In Hand Debit For Bill from Patient- '.$patient_id,
					      'Debit'          => $postData['total'],
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
					      'VNo'            => $bill_id,
					      'Vtype'          => 'Patient Bill',
					      'VDate'          => date('Y-m-d'),
					      'COAID'          => 102010204,
					      'Narration'      => 'Card or Cheque In Debit For Bill from Patient- '.$patient_id,
					      'Debit'          => $postData['total'],
					      'Credit'         => 0,
					      'IsPosted'       => 1,
					      'StoreID'        => 2,
					      'CreateBy'       => $this->session->userdata('user_id'),
					      'CreateDate'     => date('Y-m-d H:i:s'),
					      'IsAppove'       => 1
					    );
				}
		      
				// insert transaction
				$this->db->insert('acc_transaction',$patientCashInCredit);
			    $this->db->insert('acc_transaction',$receivable);
			    #--------------------------------#

				$this->session->set_flashdata('message', display('save_successfully'));

				if ($postData['status']==1){
					$monto = $this->input->post('payable');

					if ($this->input->post('payment_method') == 'Cash') {
						$metodo_pago = 'Efectivo';
					}

					if ($this->input->post('payment_method') == 'Card') {
						$metodo_pago = 'Tarjeta';
					}

					if ($this->input->post('payment_method') == 'Cheque') {
						$metodo_pago = 'Cheque';
					}

					$concepto = 'Pago de factura: ' . $bill_id;

					$saldo = $caja->saldo+$monto;

					$cajero = $_SESSION['fullname'];

					$this->db->query("UPDATE bill_admission SET pagado = pagado + $monto WHERE admission_id = '$admission_id'");

					$this->db->query("
						INSERT INTO caja (
								tipo_movimiento,
								fecha,
								monto,
								metodo_pago,
								concepto,
								saldo,
								estado,
								cajero)
						VALUES (
							'Entrada',
							NOW(),
							'$monto',
							'$metodo_pago',
							'$concepto',
							'$saldo',
							'Caja abierta',
							'$cajero');
					");
					$this->db->where('patient_id', $patient_id)->where('bill_id', null)->update('medication', array('bill_id'=>$bill_id, 'status'=>1));
					redirect("billing/bill/view/".$postData['bill_id']);
				}else{
					$this->db->where('patient_id', $patient_id)->where('bill_id', null)->update('medication', array('bill_id'=>$bill_id));
				}

			} 
			else 
			{
				$this->session->set_flashdata('exception', display('please_try_again'));
			} 
			redirect("billing/bill/view/$bill_id");
		} else {  
			$data['doctor_list'] = $this->admission_model->doctor_list();
			$data['room_list'] = $this->room_model->room_list();
			$data['service_list'] = $this->service_model->readList();
			$data['content'] = $this->load->view('billing/bill/form',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	} 



	public function view($bill_id = null){
		$data['module'] = display("billing");
		$data['title']   = display('bill_details');
		$data['bill']    = $this->bill_model->bill_by_id($bill_id);
		
		$data['services']= $this->bill_model->services_by_id($bill_id);  
		$data['advance'] = $this->bill_model->advance_payment($bill_id);
		$data['bed']     = $this->bill_model->bed_payment($data['bill']->patient_id, $bill_id);  
		$data['pay_medicine'] = $this->bill_model->medicine_amount($data['bill']->patient_id, $bill_id);
		$data['website'] = $this->bill_model->website();  

		$data['content'] = $this->load->view('billing/bill/view',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}

	// complete bill list
	public function complete(){
		$data['module'] = display("billing");
		$data['title']   = display('complete_bill_list');
		$data['admissions'] = $this->bill_model->complete_bill();
		$data['content'] = $this->load->view('billing/bill/complete',$data,true);
		$this->load->view('layout/main_wrapper',$data);
	}


	public function edit($bill_id = null)
	{
		$cajero = $this->session->userdata('fullname');
		$caja = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row();
		$estado = $caja->estado;

		if ($estado == 'Caja cerrada') {
			$this->session->set_flashdata('exception', 'No puede realizar operaciones de facturacion porque la caja está cerrada');
			return redirect('billing/bill');
		}
		

		$this->form_validation->set_rules('bill_date', display('bill_date'),'required|max_length[10]');
		$this->form_validation->set_rules('total', display('total'),'required|max_length[11]');
		$this->form_validation->set_rules('payment_method', display('payment_method'),'required|max_length[255]'); 
		$this->form_validation->set_rules('note', display('note'),'max_length[1024]');

		#-------------------------------#
		//$bill_id = $this->input->post('bill_id');
		$admission_id = $this->input->post('admission_id');
		$package_id   = $this->input->post('package_id');
		#-------------------------------#
		$data['bill'] = (object)$postData = array(
			'bill_id'      => $bill_id, 
			'bill_type'    => 'ipd', 
			'bill_date'    => date('Y-m-d', strtotime($this->input->post('bill_date'))),
			'admission_id' => $admission_id, 
			'discount'     => $this->input->post('discount'), 
			'tax'          => $this->input->post('tax'), 
			'total'        => $this->input->post('total'), 
			'payment_method' => $this->input->post('payment_method'),   
			'card_cheque_no' => $this->input->post('card_cheque_no'),
			'receipt_no'     => $this->input->post('receipt_no'),
			'note'           => $this->input->post('note'),
			'date'           => date('Y-m-d H:i:s'),
			'status'       => $this->input->post('status'),
			'exam'       => $this->input->post('exam'),
		);  

		#-------------------------------#
		if ($this->form_validation->run()) 
		{


			if ($this->bill_model->delete($bill_id))
			{
				if ($this->bill_model->create($postData)) 
				{
					#------------bill details--------------#
					$sID   = $this->input->post('service_id');
					$sName = $this->input->post('service_name');
					$sQty  = $this->input->post('quantity');
					$sAmt  = $this->input->post('amount');
					$product = $this->input->post('product');
					$almacen = $this->input->post('almacen');
					$product = $this->input->post('product');
					$services = array();

					if ($sID) {
						for ($i=0; $i < sizeof($sID); $i++)
						{
							if(!empty($sID[$i]))  
							$this->db->insert('bill_details', array(
								'bill_id' 	   => $bill_id,
								'admission_id' => $admission_id,
								'package_id'   => $package_id,
								'service_id'   => $sID[$i],
								'quantity'     => $sQty[$i],
								'amount'       => $sAmt[$i],
								'product'           => $product[$i],
								'almacen'           => $almacen[$i],
								'date'         => date('Y-m-d')
							));
						} 
					}
					#-------------------------------#

					$this->session->set_flashdata('message', display('save_successfully'));

					if ($postData['status']==1){
						$monto = $this->input->post('total');

						if ($this->input->post('payment_method') == 'Cash') {
							$metodo_pago = 'Efectivo';
						}

						if ($this->input->post('payment_method') == 'Card') {
							$metodo_pago = 'Tarjeta';
						}

						if ($this->input->post('payment_method') == 'Cheque') {
							$metodo_pago = 'Cheque';
						}

						$concepto = 'Pago de factura: ' . $bill_id;

						$saldo = $caja->saldo+$monto;

						$cajero = $_SESSION['fullname'];

						$this->db->query("
							INSERT INTO caja (
								tipo_movimiento,
								fecha,
								monto,
								metodo_pago,
								concepto,
								saldo,
								estado,
								cajero)
							VALUES (
								'Entrada',
								NOW(),
								'$monto',
								'$metodo_pago',
								'$concepto',
								'$saldo',
								'Caja abierta',
								'$cajero');
						");
						
						$this->db->where('bill_id', $bill_id)->update('medication', array('status'=>1));
						redirect("billing/bill/view/".$postData['bill_id']);
					}
				} 
				else 
				{
					$this->session->set_flashdata('exception', display('please_try_again'));
				} 
			} 
			else
			{
				$this->session->set_flashdata('exception', display('please_try_again'));

			}

			redirect('billing/bill/edit/'.$postData['bill_id']);
		} else {   
			$data['module'] = display("billing");
			$data['title'] = display('update_bill');
			$data['bill'] = $this->bill_model->bill_by_id($bill_id);
			$data['services'] = $this->bill_model->services_by_id($bill_id); 
			$data['advance'] = $this->bill_model->advance_payment($bill_id);
			$data['medicines'] = $this->bill_model->medicine_bill($bill_id);
			$data['bed']     = $this->bill_model->bed_payment($data['bill']->patient_id, $bill_id);
			$data['service_list'] = $this->service_model->readList(); 
			$data['content'] = $this->load->view('billing/bill/edit',$data,true);
			$this->load->view('layout/main_wrapper',$data);
		} 
	}

    public function delete($id = null) 
    {
        if ($this->bill_model->delete($id)) {
            #set success message
            $this->session->set_flashdata('message', display('delete_successfully'));
        } else {
            #set exception message
            $this->session->set_flashdata('exception', display('please_try_again'));
        }
		redirect('billing/bill/index');
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

    public function getInfo()
    {
    	$patient = $this->db->from('patient')
    		->where('patient_id', $this->input->get('patient_id'))
    		->get()
    		->row();

    	echo json_encode($patient);
    }

	public function getInformation()
	{
		$aid = $this->input->post('admission_id', true);
		$data = array();

		/*--------------patient informatoin-----------------*/
		$info = $this->db->select("
				ba.patient_id AS patient_id,
				ba.admission_date AS admission_date,
				ba.discharge_date AS discharge_date, 
				DATEDIFF(ba.discharge_date, ba.admission_date) as total_days,
				ba.patient_id AS doctor_id,
				ba.insurance_id AS insurance_id,
				ba.policy_no AS policy_no,

				CONCAT_WS(' ', pa.firstname, pa.lastname) AS patient_name,
				pa.address AS address,
				pa.date_of_birth AS date_of_birth,
				pa.sex AS sex,
				pa.picture AS picture,

				CONCAT_WS(' ', dr.firstname, dr.lastname) AS doctor_name,

				in.insurance_name AS insurance_name,

				bp.id as package_id,
				bp.name as package_name,
				bp.discount as discount,
				bp.services as services
			")
			->from("bill_admission AS ba")
			->join("patient AS pa", "pa.patient_id = ba.patient_id", "left")
			->join("user AS dr", "dr.user_id = ba.doctor_id", "left")
			->join("inc_insurance AS in", "in.id = ba.insurance_id", "left")
			->join("bill_package AS bp", "bp.id = ba.package_id", "left")
			->where("ba.admission_id", $aid)
			->get(); 

		if ($info->num_rows()>0)
		{
			$data['status'] = true;
			$data['result'] = $info->row();
			$patient_id = $info->row()->patient_id;
		} 
		else 
		{
			$data['status'] = false;
			$data['result'] = "Invalid AID!";
		}
		/*--------------patient informatoin-----------------*/



		/*--------------advance payment-----------------*/
		$advance = $this->db->select("
			DATE(date) AS date, 
			receipt_no, 
			amount
			")
			->from("bill_advanced")
			->where("admission_id",$aid)
			->get();


		$pay_advance = 0;
		if ($advance->num_rows()>0)
		{
			$result = "";
			foreach ($advance->result() as $adv) {
				$result .= "<tr>";
				$result .= "<td>$adv->date</td>";
				$result .= "<td>$adv->receipt_no</td>";
				$result .= "<td>$adv->amount</td>";
				$result .= "</tr>";
				$pay_advance = $pay_advance + $adv->amount;
			} 
			$data['pay_advance'] = $pay_advance;
			$data['advance_data'] = $result;
		}
		else 
		{
			$data['pay_advance']  = $pay_advance;
			$data['advance_data'] = "<tr><td colspan=\"3\" align=\"center\">No record found!</td></tr>";
		}
		/*--------------advance payment-----------------*/

		/*--------------medicine payment-----------------*/
		$pay_medicine = 0;
		if(!empty($patient_id)){
			$medicine = $this->db->select("m.*, hm.price, hm.name, CONCAT_WS(' ', user.firstname, user.lastname) as doctor")
				->from("medication m")
				->join('ha_medicine hm', 'hm.id=m.medicine_id', 'left')
				->join('user', 'user.user_id=m.prescribe_by', 'left')
				->where("m.patient_id",$patient_id)
				->where("m.status",0)
				->get();

			if ($medicine->num_rows()>0){
				$result = "";
				foreach ($medicine->result() as $medi) {
					$from = strtotime($medi->from_date);
	                $to = strtotime($medi->to_date);
	                $day = abs($to - $from);
	                $totalDay = $day/86400 +1;
	                $quantity = $totalDay*$medi->per_day_intake;
	                $price = $quantity*$medi->price;

					$result .= "<tr>";
					$result .= "<td>$medi->name</td>";
					$result .= "<td>$quantity</td>";
					$result .= "<td>$medi->price</td>";
					$result .= "<td>$medi->doctor</td>";
					$result .= "<td>$price</td>";
					$result .= "</tr>";

					$pay_medicine = $pay_medicine + $price;
				} 
				$data['medicine_bill'] = $pay_medicine;
				$data['medicine_data'] = $result;
			}else{
				$data['medicine_bill']  = $pay_medicine;
				$data['medicine_data'] = "<tr><td colspan=\"5\" align=\"center\">No record found!</td></tr>";
			}
		}else{
			$data['medicine_bill']  = $pay_medicine;
			$data['medicine_data'] = "<tr><td colspan=\"5\" align=\"center\">No record found!</td></tr>";
		}

		/*--------------bed information-----------------*/
		if(!empty($patient_id)){
			$bed = $this->db->select("
			bdas.assign_date AS adate,
			bdas.discharge_date AS ddate,
			bm_room.charge,
			bm_bed.bed_number,
			DATEDIFF(bdas.discharge_date, bdas.assign_date) AS tdays
			")
			->from("bm_bed_assign as bdas")
			->join("bm_room","bm_room.id=bdas.room_id","left")
			->join("bm_bed","bm_bed.id=bdas.bed_id","left")
			->where("bdas.patient_id",$patient_id)
			->where("bdas.status",0)
			->get();


			$bed_amount = 0;
			if ($bed->num_rows()>0)
			{
				$result = "";
				foreach ($bed->result() as $value) {
					$totalDays = $value->tdays + 1;
					$bedAmount = $totalDays*$value->charge;
					$result .= "<tr>";
					$result .= "<td>$value->adate</td>";
					$result .= "<td>$value->ddate</td>";
					$result .= "<td>$totalDays</td>";
					$result .= "<td>$value->bed_number</td>";
					$result .= "<td>$bedAmount</td>";
					$result .= "</tr>";
					$bed_amount = $bed_amount + $bedAmount;
				} 
				$data['pay_bed'] = $bed_amount;
				$data['bed_data'] = $result;
			}
			else 
			{
				$data['pay_bed']  = $bed_amount;
				$data['bed_data'] = "<tr><td colspan=\"5\" align=\"center\">No record found!</td></tr>";
			}
		}
		/*--------------bed info-----------------*/

		$examenes = $this->db->query("SELECT * FROM laboratorio_solicitudes WHERE internacion = '$aid'")->result();

		foreach ($examenes as $examen) {
			$data['examenes'] = $examen->examenes;
		}
 
		echo json_encode($data);
	}


}
