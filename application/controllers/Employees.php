<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employees extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('employees_model');
        $this->load->helper('converter');
    }

    public function index()
    {
        $employees = $this->employees_model->get_all_employees();
        $data['employees'] = $employees;
        $this->load->view('employees_page', $data);
    }

    public function add()
    {
        $this->load->view('add_employees_page');
    }

    public function add_employee()
    {
        $data['name'] = $_POST['name'];
        $date = str_replace('/', '-', $_POST['birthday']);
        $tmp =  date('Y-m-d', strtotime($date));
        $data['birthday'] = $tmp;
        $data['cpf'] = preg_replace('~\D~', '', $_POST['cpf']);
        $data['rg'] = preg_replace('~\D~', '', $_POST['rg']);
        $data['email'] = $_POST['email'];
        $data['occupation'] = $_POST['occupation'];
        $data['phone'] = preg_replace('~\D~', '', $_POST['phone']);
        $data['phones'] =  explode(";", $_POST['others_phone']);
        $data['cep'] = preg_replace('~\D~', '', $_POST['cep']);
        $data['state'] = $_POST['state'];
        $data['city'] = $_POST['city'];
        $data['district'] = $_POST['district'];
        $data['street'] = $_POST['street'];
        $data['street_number'] = $_POST['street_number'];
        $data['file'] = $_POST['street_number'];
        $imagename = $_FILES['image']['name'];
        $data['imagePath'] = "assets/archive/" . $imagename;

        $this->load->library('upload');

        $configuracao = array(
            'upload_path'   => './assets/archive',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'file_name'     => $imagename,
        );

        $this->upload->initialize($configuracao);
        if ($this->upload->do_upload('image')) {
            $send = true;
        } else {
            $send = false;
        }

        if ($send) {
            $this->employees_model->add_employee($data);
        }
        $this->output->set_output(json_encode(true));
    }

    public function edit($cpf = '')
    {
        //$data = json_decode(file_get_contents('php://input'), true);
        //$cpf = $data['cpf'];
        $employee = $this->employees_model->get_employee($cpf);
        $employee_phones = $this->employees_model->get_employee_phone($cpf);
        $data['employee'] = $employee;
        $data['phones'] = $employee_phones;

        $this->load->view('edit_employees_page', $data);
    }

    public function edit_employee()
    {
        $data['name'] = $_POST['name'];
        $date = str_replace('/', '-', $_POST['birthday']);
        $tmp =  date('Y-m-d', strtotime($date));
        $data['birthday'] = $tmp;
        $data['cpf'] = preg_replace('~\D~', '', $_POST['cpf']);
        $data['rg'] = preg_replace('~\D~', '', $_POST['rg']);
        $data['email'] = $_POST['email'];
        $data['occupation'] = $_POST['occupation'];
        $data['phone'] = preg_replace('~\D~', '', $_POST['phone']);
        $data['phones'] =  explode(";", $_POST['others_phone']);
        $data['cep'] = preg_replace('~\D~', '', $_POST['cep']);
        $data['state'] = $_POST['state'];
        $data['city'] = $_POST['city'];
        $data['district'] = $_POST['district'];
        $data['street'] = $_POST['street'];
        $data['street_number'] = $_POST['street_number'];
        $other_fones[] = json_decode($_POST['others_phone']);
        $imagename = $_FILES['image']['name'];
        $data['imagePath'] = "assets/archive/" . $imagename;

        $this->load->library('upload');

        $configuracao = array(
            'upload_path'   => './assets/archive',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'file_name'     => $imagename,
        );

        $this->upload->initialize($configuracao);
        if ($this->upload->do_upload('image')) {
            $send = true;
        } else {
            $send = false;
        }

        if ($send) {
            $this->employees_model->edit_image($data);
        }
        $this->employees_model->edit_employee($data);

        $this->employees_model->edit_employee_phones($data['cpf'], $other_fones[0]);
        $this->output->set_output(json_encode(true));
    }

    public function delete_employee()
    {
        $cpf = $_POST['cpf'];
        $this->employees_model->delete_employee($cpf);
        $this->output->set_output(json_encode(true));
        
    }
}
