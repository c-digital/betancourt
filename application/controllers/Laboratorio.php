<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laboratorio extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

        $this->load->library('ciqrcode');

        $this->load->model(array(
            'billing/bill_model'
        ));
        
        if ($this->session->userdata('isLogIn') == false) 
            redirect('login');
	}
  
	public function agregar_categoria()
    {
        $data['title'] = 'Agregar categoría';
        $data['module'] = 'Laboratorio';

        $data['content'] = $this->load->view('laboratorio/agregar_categoria', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function guardar_categoria()
    {
        extract($_POST);
        $this->db->query("INSERT INTO laboratorio_categorias (nombre, descripcion, estado) VALUES ('$nombre', '$descripcion', '$estado')");
        redirect('/laboratorio/categorias');
    }

    public function categorias()
    {
        $data['title'] = 'Listado de categorías de examenes';
        $data['module'] = 'Laboratorio';

        $data['categorias'] = $this->db->query("SELECT * FROM laboratorio_categorias")->result();

        $data['content'] = $this->load->view('laboratorio/categorias', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function editar_categoria($id)
    {
        $data['title'] = 'Editar categoría';
        $data['module'] = 'Laboratorio';

        $data['categoria'] = $this->db->query("SELECT * FROM laboratorio_categorias WHERE id = $id")->row();

        $data['content'] = $this->load->view('laboratorio/editar_categoria', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function actualizar_categoria()
    {
        extract($_POST);
        $this->db->query("UPDATE laboratorio_categorias SET nombre = '$nombre', descripcion = '$descripcion', estado = '$estado' WHERE id = $id");
        redirect('/laboratorio/categorias');
    }

    public function eliminar_categoria($id)
    {
        $this->db->query("DELETE FROM laboratorio_categorias WHERE id = $id");
        redirect('/laboratorio/categorias');
    }

    public function agregar_examen()
    {
        $data['title'] = 'Agregar examen';
        $data['module'] = 'Laboratorio';

        $data['categorias'] = $this->db->query("SELECT * FROM laboratorio_categorias")->result();

        $data['content'] = $this->load->view('laboratorio/agregar_examen', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function guardar_examen()
    {
        extract($_POST);
        $this->db->query("INSERT INTO laboratorio_examenes (nombre, categoria, valor_referencia, precio) VALUES ('$nombre', '$categoria', '$valor_referencia', '$precio')");
        redirect('/laboratorio/examenes');
    }

    public function examenes()
    {
        $data['title'] = 'Listado de examenes';
        $data['module'] = 'Laboratorio';

        $data['examenes'] = $this->db->query("SELECT *, (SELECT laboratorio_categorias.nombre FROM laboratorio_categorias WHERE laboratorio_categorias.id = laboratorio_examenes.categoria) AS nombre_categoria FROM laboratorio_examenes")->result();

        $data['content'] = $this->load->view('laboratorio/examenes', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function editar_examen($id)
    {
        $data['title'] = 'Editar examen';
        $data['module'] = 'Laboratorio';

        $data['categorias'] = $this->db->query("SELECT * FROM laboratorio_categorias")->result();
        $data['examen'] = $this->db->query("SELECT * FROM laboratorio_examenes WHERE id = $id")->row();

        $data['content'] = $this->load->view('laboratorio/editar_examen', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function actualizar_examen()
    {
        extract($_POST);
        $this->db->query("UPDATE laboratorio_examenes SET nombre = '$nombre', categoria = '$categoria', valor_referencia = '$valor_referencia', precio = '$precio' WHERE id = $id");
        redirect('/laboratorio/examenes');
    }

    public function eliminar_examen($id)
    {
        $this->db->query("DELETE FROM laboratorio_examenes WHERE id = $id");
        redirect('/laboratorio/examenes');
    }

    public function crear_solicitud()
    {
        $data['title'] = 'Crear solicitud';
        $data['module'] = 'Laboratorio';

        $data['examenes'] = $this->db->query("SELECT * FROM laboratorio_examenes")->result();
        $data['pacientes'] = $this->db->query("SELECT id, CONCAT_WS(' ', firstname, lastname) AS nombre FROM patient")->result();

        $data['content'] = $this->load->view('laboratorio/crear_solicitud', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function guardar_solicitud()
    {
        $paciente = $_POST['paciente'];
        $internacion = $_POST['internacion'];
        $examenes = json_encode($_POST['examenes']);
        $code = $this->randStrGen(2, 5);

        $this->db->query("INSERT INTO laboratorio_solicitudes (paciente, examenes, fecha, estado, internacion, code) VALUES ('$paciente', '$examenes', NOW(), 'Pendiente', '$internacion', '$code')");

        $id = $this->db->insert_id();

        redirect("/laboratorio/ver_solicitud/$id");
    }

    public function solicitudes()
    {
        $data['title'] = 'Listado de solicitudes';
        $data['module'] = 'Laboratorio';

        $where = '';

        if (isset($_GET['patient_id']) && $_GET['patient_id'] != '') {
            $patient_id = $_GET['patient_id'];
            $where = "WHERE paciente = $patient_id";
        }

        $data['solicitudes'] = $this->db->query("
            SELECT laboratorio_solicitudes.id AS id, (SELECT CONCAT_WS(' ', patient.firstname, patient.lastname) FROM patient WHERE patient.id = laboratorio_solicitudes.paciente) AS paciente, laboratorio_solicitudes.fecha, laboratorio_solicitudes.estado FROM laboratorio_solicitudes $where ORDER BY id DESC")->result();

        $data['content'] = $this->load->view('laboratorio/solicitudes', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function ver_solicitud($id)
    {

        $data['title'] = 'Ver solicitud';
        $data['module'] = 'Laboratorio';

        $data['website'] = $this->bill_model->website();

        $data['solicitud'] = $this->db->query("
            SELECT
                laboratorio_solicitudes.id AS id,
                (SELECT CONCAT_WS(' ', patient.firstname, patient.lastname) FROM patient WHERE patient.id = laboratorio_solicitudes.paciente) AS paciente,
                laboratorio_solicitudes.fecha,
                laboratorio_solicitudes.estado,
                laboratorio_solicitudes.examenes,
                laboratorio_solicitudes.internacion,
                laboratorio_solicitudes.code
            FROM
                laboratorio_solicitudes
            WHERE
                id = $id;
        ")->row();


        $params['data'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . "uploads/qr/$id.png";
        $this->ciqrcode->generate($params);

        $data['content'] = $this->load->view('laboratorio/ver_solicitud', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function en_analisis($id)
    {
        $this->db->query("UPDATE laboratorio_solicitudes SET estado = 'En análisis' WHERE id = $id");

        $solicitud = $this->db->query("SELECT * FROM laboratorio_solicitudes WHERE id = $id")->row();
        $patient_id = $solicitud->paciente;
        $internacion = $solicitud->internacion;
        $id_solicitud = $solicitud->id;

        if ($internacion) {
            $admission_id = $solicitud->internacion;
            
        } else {
            $patient = $this->db->query("SELECT * FROM patient WHERE id = $patient_id")->row();
            $patient_id = $patient->patient_id;

            $admission_id = 'U'.$this->randStrGen(2, 7);
            $assign_by = $this->session->userdata('user_id');

            $this->db->query("INSERT INTO bill_admission (admission_id, patient_id, admission_date, discharge_date, status, isComplete, assign_by) VALUES ('$admission_id', '$patient_id', DATE(NOW()), DATE(NOW()), 0, 1, 1)");

            $admission_id = $this->db->query("SELECT * FROM bill_admission ORDER BY id DESC")->row();
            $admission_id = $admission_id->admission_id;
        }

        $bill_id = 'BL'.$this->randStrGen(2, 7);
        $total = array_sum(array_column(json_decode($solicitud->examenes, true), 'precio'));

        $this->db->query("INSERT INTO bill (bill_id, bill_type, bill_date, admission_id, discount, tax, total, payment_method, date, status, exam) VALUES ('$bill_id', 'ipd', DATE(NOW()), '$admission_id', 0, 0, '$total', 'Cash', DATE(NOW()), 0, $id_solicitud)");

        redirect("/laboratorio/solicitudes");
    }

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

    public function completar($id)
    {
        if (isset($_POST['guardar'])) {
            $examenes = json_encode($_POST['examenes']);

            $this->db->query("UPDATE laboratorio_solicitudes SET estado = 'Completado', examenes = '$examenes' WHERE id = $id");

            redirect('/laboratorio/solicitudes');
        }

        $data['title'] = 'Completar solicitud';
        $data['module'] = 'Laboratorio';

        $data['solicitud'] = $this->db->query("
            SELECT
                laboratorio_solicitudes.id AS id,
                (SELECT CONCAT_WS(' ', patient.firstname, patient.lastname) FROM patient WHERE patient.id = laboratorio_solicitudes.paciente) AS paciente,
                laboratorio_solicitudes.fecha,
                laboratorio_solicitudes.estado,
                laboratorio_solicitudes.examenes
            FROM
                laboratorio_solicitudes
            WHERE
                id = $id;
        ")->row();

        $data['content'] = $this->load->view('laboratorio/completar_solicitud', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function eliminar_solicitud($id)
    {
        $this->db->query("DELETE FROM laboratorio_solicitudes WHERE id = $id");
        redirect('/laboratorio/solicitudes');
    }
}
