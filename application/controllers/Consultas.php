<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model(array(
            'appointment_model',
            'department_model',
            'patient_model',
            'billing/bill_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) {
            return redirect('login');
        }
    }
   
    public function index(){ 
        $data['module'] = 'Consultas';
        $data['title'] = 'Consultas';

        $cajero = $this->session->userdata('fullname');

        $caja = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row();
        $data['estado'] = $caja->estado;

        $where = [];

        if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
            $inicio = $_GET['inicio'];
            $where[] = "c.fecha >= '$inicio'";
        }

        if (isset($_GET['fin']) && $_GET['fin'] != '') {
            $fin = $_GET['fin'];
            $where[] = "c.fecha <= '$fin'";
        }

        if (isset($_GET['paciente']) && $_GET['paciente'] != '') {
            $paciente = $_GET['paciente'];
            $where[] = "CONCAT_WS(' ', p.firstname, p.lastname) LIKE '%$paciente%'";
        }

        if (isset($_GET['profesional']) && $_GET['profesional'] != '') {
            $profesional = $_GET['profesional'];
            $where[] = "CONCAT_WS(' ', u.firstname, u.lastname) LIKE '%$profesional%'";
        }

        if (isset($_GET['estado']) && $_GET['estado'] != '') {
            $estado = $_GET['estado'];
            $where[] = "c.estado = '$estado'";
        }

        if (!isset($_GET['estado']) || $_GET['estado'] == '') {
            $estado = $_GET['estado'];
            $where[] = "(c.estado != 'Pagado' AND c.estado != 'Cancelada')";
        }

        if (empty($where)) {
            $where = '';
        } else {
            $where = ' WHERE ' . implode(' AND ', $where); 
        }

        $query = $this->db->query("
            SELECT
                c.id,
                CONCAT_WS(' ', p.firstname, p.lastname) AS paciente,
                CONCAT_WS(' ', u.firstname, u.lastname) AS profesional,
                c.fecha,
                c.monto,
                c.estado
            FROM
                consultas c
                    LEFT JOIN patient p ON c.patient_id = p.patient_id
                    LEFT JOIN user u ON u.user_id = c.profesional_id
            $where
        ");

        $data['consultas'] = $query->result();

        $data['content'] = $this->load->view('consultas',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    } 

    public function editar($id)
    {
        $data['module'] = 'Consultas';
        $data['title'] = 'Editar consultas';

        if (isset($_GET['estado']) && $_GET['estado'] == 'En atención') {
            $this->db->query("UPDATE consultas SET estado = 'En atención' WHERE id = $id");
            return 1;
        }

        if (isset($_GET['estado']) && $_GET['estado'] == 'Cancelar') {
            $this->session->set_flashdata('success', 'Consulta cancelada');
            $this->db->query("UPDATE consultas SET estado = 'Cancelada' WHERE id = $id");
            redirect('/consultas');
            return 1;
        }

        $query = $this->db->query("
            SELECT
                c.*,
                p.date_of_birth AS nacimiento
            FROM
                consultas c
                    LEFT JOIN patient p ON c.patient_id = p.patient_id
            WHERE
                c.id = $id
        ");
        $data['consulta'] = $query->row();

        $data['edad'] = $this->calcularEdad($data['consulta']->nacimiento);

        $patient_id = $data['consulta']->patient_id;

        $query = $this->db->query("SELECT * FROM consultas WHERE patient_id = '$patient_id' AND consultas.foto_perfil IS NOT NULL");
        $query = $query->row();
        $data['foto_perfil'] = isset($query->foto_perfil) ? $query->foto_perfil : '';

        $query = $this->db->query("SELECT *, (CONCAT_WS(' ', firstname, lastname)) AS nombre FROM patient");
        $data['clientes'] = $query->result();

        $query = $this->db->query("SELECT *, (CONCAT_WS(' ', firstname, lastname)) AS nombre FROM user");
        $data['profesionales'] = $query->result();

        $data['anamnesis'] = json_decode($data['consulta']->anamnesis);

        $query = $this->db->query("
            SELECT
                *
            FROM
                enfermedades
        ");

        $data['enfermedades'] = $query->result();

        $data['content'] = $this->load->view('editar_consulta', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function create(){
        $data['module'] = 'Consultas';
        $data['title'] = 'Agregar consulta';

        $query = $this->db->query("
            SELECT
                patient.*
            FROM
                patient
        ");

        $data['clientes'] = $query->result();

        $query = $this->db->query("SELECT * FROM user");
        $data['profesionales'] = $query->result();

        $data['department_list'] = $this->department_model->department_list(); 

        $query = $this->db->query("
            SELECT
                *
            FROM
                enfermedades
        ");

        $data['enfermedades'] = $query->result();

        $data['content'] = $this->load->view('crear_consulta', $data, true);

        $this->load->view('layout/main_wrapper', $data);
    }

    public function guardar()
    {
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/consultas/' . $_FILES['foto_perfil']['name']);

        $i = 0;

        foreach ($_FILES['fotos']['name'] as $item) {
            move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/uploads/consultas/' . $item);

            $i = $i + 1;
        }

        $patient_id = $_POST['patient_id'];
        $profesional_id = $_POST['profesional_id'];
        $foto_perfil = $_FILES['foto_perfil']['name'];
        $anamnesis = json_encode($_POST['anamnesis']);
        $monto = $_POST['monto'];
        $fotos = json_encode($_FILES['fotos']['name']);

        $this->db->query("
            INSERT INTO
                consultas
                (monto, foto_perfil, fotos, patient_id, profesional_id, fecha, anamnesis, estado)
            VALUES
                ('$monto', '$foto_perfil', '$fotos', '$patient_id', '$profesional_id', NOW(), '$anamnesis', 'En espera');
        ");

        return redirect('/consultas');
    }

    public function modificar()
    {
        move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/uploads/consultas/' . $_FILES['foto_perfil']['name']);

        $i = 0;

        foreach ($_FILES['fotos']['name'] as $item) {
            move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $_SERVER['DOCUMENT_ROOT'] . '/uploads/consultas/' . $item);

            $i = $i + 1;
        }

        $id = $_POST['id'];
        $patient_id = $_POST['patient_id'];
        $profesional_id = $_POST['profesional_id'];
        $foto_perfil = $_FILES['foto_perfil']['name'];
        $anamnesis = json_encode($_POST['anamnesis']);
        $monto = $_POST['monto'];
        $fotos = json_encode($_FILES['fotos']['name']);

        $this->db->query("
            UPDATE consultas SET
                monto = '$monto',
                foto_perfil = '$foto_perfil',
                fotos = '$fotos',
                patient_id = '$patient_id',
                profesional_id = '$profesional_id',
                anamnesis = '$anamnesis'
            WHERE
                id = '$id'
        ");

        return redirect('/consultas');
    }

    public function ver($id)
    {
        $data['module'] = 'Consultas';
        $data['title'] = 'Ver consulta';

        $query = $this->db->query("
            SELECT
                *,
                (SELECT
                    CONCAT_WS(' ', patient.firstname, patient.lastname)
                FROM
                    patient
                WHERE
                    patient.patient_id = consultas.patient_id) AS patient
            FROM
                consultas
            WHERE
                id = $id
        ");
        $data['consulta'] = $query->row();

        $patient_id = $data['consulta']->patient_id;

        $query = $this->db->query("SELECT * FROM consultas WHERE patient_id = '$patient_id' AND consultas.foto_perfil IS NOT NULL");
        $query = $query->row();
        $data['foto_perfil'] = isset($query->foto_perfil) ? $query->foto_perfil : '';

        $query = $this->db->query("SELECT * FROM patient");
        $data['clientes'] = $query->result();

        $query = $this->db->query("SELECT * FROM user");
        $data['profesionales'] = $query->result();

        $data['anamnesis'] = json_decode($data['consulta']->anamnesis);

        $query = $this->db->query("SELECT * FROM enfermedades");
        $data['enfermedades'] = $query->result();

        $data['edad'] = $this->calcularEdad($this->db->query("SELECT * FROM patient WHERE patient_id = '$patient_id'")->row()->date_of_birth);

        $data['content'] = $this->load->view('ver_consulta',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function eliminar($id)
    {
        $this->db->query("DELETE FROM tblconsultas WHERE id = '$id'");
        $this->session->set_flashdata('success', 'Consulta eliminada satisfactoriamente');
        redirect('/admin/consultas');
    }

    public function cobrar($id)
    {
        $cajero = $this->session->userdata('fullname');

        $estado = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row()->estado;

        $pagos = json_encode($_POST['pagos']);

        $this->db->query("UPDATE consultas SET estado = 'Pagado', pagos = '$pagos' WHERE id = '$id'");

        if ($estado == 'Caja abierta') {
            $concepto = "Pago de consulta #$id";

            foreach ($_POST['pagos'] as $metodo => $monto) {
                if ($monto != 0) {
                    $saldo = $this->db->query("SELECT * FROM caja WHERE cajero = '$cajero' ORDER BY id DESC")->row()->saldo;

                    $sql = "
                        INSERT INTO caja (
                            tipo_movimiento,
                            fecha,
                            monto,
                            metodo_pago,
                            concepto,
                            saldo,
                            estado,
                            cajero
                        ) VALUES (
                            'Entrada',
                            NOW(),
                            '$monto',
                            '$metodo',
                            '$concepto',
                            '$saldo',
                            '$estado',
                            '$cajero'
                        )
                    ";
                }

            }


            $this->db->query($sql);

            $this->session->set_flashdata('error', 'La caja esta cerrada. No se puede realizar operaciones.');

            return redirect('/consultas');
        }

        $this->session->set_flashdata('success', 'Consulta cobrada satisfactoriamente');

        return redirect('/consultas');
    }

    public function factura($id)
    {
        $data['module'] = 'Consultas';
        $data['title'] = 'Ver factura de consulta';

        $data['website'] = $this->bill_model->website();

        $sql = "
            SELECT
                c.id AS numero_factura,
                CONCAT_WS(' ', p.firstname, p.lastname) AS cliente,
                c.fecha,
                c.monto
            FROM
                consultas c
                    INNER JOIN patient p ON c.patient_id = p.patient_id
            WHERE
                c.id = $id
        ";

        $data['consulta'] = $this->db->query($sql)->row();

        $data['content'] = $this->load->view('consulta_factura', $data, true);
        return $this->load->view('layout/main_wrapper', $data);
    }

    public function info()
    {
        $id = $_POST['id'];
        $fecha = $this->db->query("SELECT * FROM patient WHERE patient_id = '$id'")->row()->date_of_birth;
        echo $this->calcularEdad($fecha);
    }

    public function calcularEdad($fecha){
        list($ano, $mes, $dia) = explode("-",$fecha);

        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;

        if ($dia_diferencia < 0 || $mes_diferencia < 0) {
            $ano_diferencia--;
        }

        return $ano_diferencia;
    }
}
