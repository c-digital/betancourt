<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('isLogIn') == false) {
            redirect('login');
        }

        $this->db->query("SET sql_mode=''");
    }
   
    public function productos()
    { 
        $data['module'] = 'Reportes';
        $data['title'] = 'Productos';

        $where = [];

        if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
            $inicio = $_GET['inicio'];
            $where[] =  "fecha_vencimiento_producto >= '$inicio'";
        }

        if (isset($_GET['fin']) && $_GET['fin'] != '') {
            $fin = $_GET['fin'];
            $where[] =  "fecha_vencimiento_producto <= '$fin'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $sql = "
            SELECT
                nombre_producto AS producto,
                fecha_vencimiento_producto AS fecha_vencimiento,
                proveedor,
                SUM(cantidad) AS cantidad
            FROM
                mercaderia
            WHERE
                $where
            GROUP BY
                producto,
                proveedor;
        ";

        $data['productos'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('reportes/productos',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function caja()
    {
        $data['module'] = 'Reportes';
        $data['title'] = 'Caja';

        $data['usuarios'] = $this->db->query("SELECT CONCAT_WS(' ', firstname, lastname) AS nombre FROM user")->result();

        $where = [];

        if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
            $inicio = $_GET['inicio'];
            $where[] =  "DATE(fecha) >= '$inicio'";
        }

        if (isset($_GET['fin']) && $_GET['fin'] != '') {
            $fin = $_GET['fin'];
            $where[] =  "DATE(fecha) <= '$fin'";
        }

        if (isset($_GET['usuario']) && $_GET['usuario'] != '') {
            $usuario = $_GET['usuario'];
            $where[] =  "cajero = '$usuario'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $sql = "
            SELECT
                tipo_movimiento,
                monto,
                metodo_pago,
                concepto,
                cajero AS usuario,
                fecha
            FROM
                caja
            WHERE
                $where
        ";

        $data['movimientos'] = $this->db->query($sql)->result();

        $data['efectivo'] = $this->db->query("SELECT SUM(monto) AS monto FROM caja WHERE metodo_pago = 'Efectivo' AND $where")->row()->monto;
        $data['transferencia'] = $this->db->query("SELECT SUM(monto) AS monto FROM caja WHERE metodo_pago = 'Transferencia' AND $where")->row()->monto;
        $data['cheque'] = $this->db->query("SELECT SUM(monto) AS monto FROM caja WHERE metodo_pago = 'Cheque' AND $where")->row()->monto;

        $data['content'] = $this->load->view('reportes/caja',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function medicamentos()
    {
        $data['module'] = 'Reportes';
        $data['title'] = 'Medicamentos';

        $where = [];

        if (isset($_GET['ingreso']) && $_GET['ingreso'] != '') {
            $ingreso = $_GET['ingreso'];
            $where[] =  "m.fecha_entrada >= '$ingreso'";
        }

        if (isset($_GET['vencimiento']) && $_GET['vencimiento'] != '') {
            $vencimiento = $_GET['vencimiento'];
            $where[] =  "m.fecha_vencimiento_producto >= '$vencimiento'";
        }

        if (isset($_GET['proveedor']) && $_GET['proveedor'] != '') {
            $proveedor = $_GET['proveedor'];
            $where[] =  "m.proveedor = '$proveedor'";
        }

        if (isset($_GET['producto']) && $_GET['producto'] != '') {
            $producto = $_GET['producto'];
            $where[] =  "p.name LIKE '%$producto%'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $sql = "
            SELECT
                m.lote,
                p.name AS producto,
                p.quantity AS cantidad,
                m.fecha_vencimiento_producto AS fecha_vencimiento,
                m.proveedor AS proveedor
            FROM
                almacenes_productos p
                    LEFT JOIN mercaderia m ON p.name = m.nombre_producto
            WHERE
                $where
            GROUP BY
                producto,
                proveedor
            ORDER BY
                producto;
        ";

        $data['medicamentos'] = $this->db->query($sql)->result();

        $sql = "SELECT nombre AS proveedor FROM proveedores";

        $data['proveedores'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('reportes/medicamentos', $data, true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function consultas()
    {
        $data['module'] = 'Reportes';
        $data['title'] = 'Consultas';

        $where = [];

        if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
            $inicio = $_GET['inicio'];
            $where[] =  "c.fecha >= '$inicio'";
        }

        if (isset($_GET['fin']) && $_GET['fin'] != '') {
            $fin = $_GET['fin'];
            $where[] =  "c.fecha <= '$fin'";
        }

        if (isset($_GET['paciente']) && $_GET['paciente'] != '') {
            $paciente = $_GET['paciente'];
            $where[] =  "CONCAT_WS(' ', p.firstname, p.lastname) LIKE '%$paciente%'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $data['profesionales'] = $this->db->query("SELECT CONCAT_WS(' ', firstname, lastname) AS profesional FROM user")->result();

        $sql = "
            SELECT
                c.fecha,
                c.id AS numero_consulta,
                CONCAT_WS(' ', u.firstname, u.lastname) AS profesional,
                CONCAT_WS(' ', p.firstname, p.lastname) AS paciente,
                c.monto
            FROM consultas c
                LEFT JOIN user u ON c.profesional_id = u.user_id
                LEFT JOIN patient p ON c.patient_id = p.patient_id
            WHERE
                $where
        ";

        $data['consultas'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('reportes/consultas',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function uti()
    {
        $data['module'] = 'Reportes';
        $data['title'] = 'UTI';

        $where = [];

        if (isset($_GET['fecha']) && $_GET['fecha'] != '') {
            $fecha = $_GET['fecha'];
            $where[] =  "d.date = '$fecha'";
        }

        if (isset($_GET['paciente']) && $_GET['paciente'] != '') {
            $paciente = $_GET['paciente'];
            $where[] =  "CONCAT_WS(' ', p.firstname, p.lastname) LIKE '%$paciente%'";
        }

        if (isset($_GET['historia_clinica']) && $_GET['historia_clinica'] != '') {
            $historia_clinica = $_GET['historia_clinica'];
            $where[] =  "d.admission_id = '$historia_clinica'";
        }

        if (isset($_GET['servicio']) && $_GET['servicio'] != '') {
            $servicio = $_GET['servicio'];
            $where[] =  "d.service_id = '$servicio'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $sql = "
            SELECT
                CONCAT_WS(' ', p.firstname, p.lastname) AS paciente,
                s.name AS tratamiento,
                d.amount AS valor
            FROM
                bill_details d
                    LEFT JOIN bill_service s ON s.id = s.id
                    LEFT JOIN bill_admission a ON a.admission_id = d.admission_id
                    LEFT JOIN patient p ON a.patient_id = p.patient_id
            WHERE
                s.uci = 'Si' AND
                $where
        ";

        $data['utis'] = $this->db->query($sql)->result();

        $sql = "SELECT id, name AS nombre FROM bill_service";
        $data['servicios'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('reportes/uti',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function comisiones()
    {
        $data['module'] = 'Reportes';
        $data['title'] = 'Comisiones';

        $sql = "SELECT user_id AS id, CONCAT_WS(' ', firstname, lastname) AS nombre FROM user";
        $data['profesionales'] = $this->db->query($sql)->result();

        $where = [];

        if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
            $inicio = $_GET['inicio'];
            $where[] =  "d.date >= '$inicio'";
        }

        if (isset($_GET['fin']) && $_GET['fin'] != '') {
            $fin = $_GET['fin'];
            $where[] =  "d.date <= '$fin'";
        }

        if (isset($_GET['numero_internacion']) && $_GET['numero_internacion'] != '') {
            $numero_internacion = $_GET['numero_internacion'];
            $where[] =  "d.admission_id <= '$numero_internacion'";
        }

        if (isset($_GET['profesional']) && $_GET['profesional'] != '') {
            $profesional = $_GET['profesional'];
            $where[] =  "d.professional_id = '$profesional'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $sql = "
            SELECT
                d.date AS fecha,
                d.admission_id AS numero_internacion,
                CONCAT_WS(' ', p.firstname, p.lastname) AS paciente,
                s.name AS servicio,
                CONCAT_WS(' ', u.firstname, u.lastname) AS profesional,
                d.amount AS monto
            FROM
                bill_details d
                    LEFT JOIN bill_admission a ON d.admission_id = a.admission_id
                    LEFT JOIN patient p ON p.patient_id = a.patient_id
                    LEFT JOIN bill_service s ON d.service_id = s.id
                    LEFT JOIN user u ON u.user_id = d.professional_id
            WHERE
                d.professional_id IS NOT NULL AND 
                $where
        ";

        $data['comisiones'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('reportes/comisiones',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function almacenes()
    {
        $data['module'] = 'Reportes';
        $data['title'] = 'Almacenes';

        $where = [];

        if (isset($_GET['almacen']) && $_GET['almacen'] != '') {
            $almacen = $_GET['almacen'];
            $where[] =  "p.id_almacen = '$almacen'";
        }

        if (isset($_GET['producto']) && $_GET['producto'] != '') {
            $producto = $_GET['producto'];
            $where[] =  "p.name = '$producto'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $sql = "
            SELECT
                p.name AS producto,
                p.quantity AS cantidad,
                a.nombre AS almacen,
                m.fecha_vencimiento_producto AS fecha_vencimiento
            FROM
                almacenes_productos p
                    LEFT JOIN almacenes a ON p.id_almacen = a.id
                    LEFT JOIN mercaderia m ON m.nombre_producto = p.name
            WHERE
                $where
        ";

        $data['productos'] = $this->db->query($sql)->result();

        $data['almacenes'] = $this->db->query("SELECT * FROM almacenes")->result();

        $data['content'] = $this->load->view('reportes/almacenes',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }

    public function compras()
    {
        $data['module'] = 'Reportes';
        $data['title'] = 'Compras';

        $data['proveedores'] = $this->db->query("SELECT * FROM proveedores")->result();

        $where = [];

        if (isset($_GET['inicio']) && $_GET['inicio'] != '') {
            $inicio = $_GET['inicio'];
            $where[] =  "fecha_entrada >= '$inicio'";
        }

        if (isset($_GET['fin']) && $_GET['fin'] != '') {
            $fin = $_GET['fin'];
            $where[] =  "fecha_entrada >= '$fin'";
        }

        if (isset($_GET['proveedor']) && $_GET['proveedor'] != '') {
            $proveedor = $_GET['proveedor'];
            $where[] =  "proveedor = '$proveedor'";
        }

        if (isset($_GET['numero_factura']) && $_GET['numero_factura'] != '') {
            $numero_factura = $_GET['numero_factura'];
            $where[] =  "numero_factura = '$numero_factura'";
        }

        if (isset($_GET['producto']) && $_GET['producto'] != '') {
            $producto = $_GET['producto'];
            $where[] =  "nombre_producto LIKE '%$producto%'";
        }

        if (count($where)) {
            $where = implode(' AND ', $where);
        } else {
            $where = '1';
        }

        $sql = "
            SELECT
                fecha_entrada AS fecha,
                numero_factura AS numero_factura,
                proveedor,
                SUM(cantidad) * SUM(precio_compra) AS monto_total
            FROM
                mercaderia
            WHERE
                $where
            GROUP BY
                numero_factura
        ";

        $data['mercaderias'] = $this->db->query($sql)->result();

        $data['content'] = $this->load->view('reportes/compras',$data,true);
        $this->load->view('layout/main_wrapper', $data);
    }
}
