<?php

class Employees_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_employees()
    {
        $this->db->select('fe.ds_tax_document_cpf,
                    fe.ds_full_name,
                    fe.ds_tax_document_rg,
                    fe.ds_email,
                    fe.ds_zip,
                    fe.ds_address,
                    fe.ds_number,
                    fe.ds_neighborhood,
                    fe.ds_city,
                    fe.ds_state,
                    fe.dt_birthday,
                    fe.ln_photo,
                    fe.occupation,
                    fe.ds_phone_number_principal')
            ->from('func_employee AS fe');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_employee($cpf)
    {
        $this->db->select('fe.ds_tax_document_cpf,
                fe.ds_full_name,
                fe.ds_tax_document_rg,
                fe.ds_email,
                fe.ds_zip,
                fe.ds_address,
                fe.ds_number,
                fe.ds_neighborhood,
                fe.ds_city,
                fe.ds_state,
                fe.dt_birthday,
                fe.ln_photo,
                fe.occupation,
                fe.ds_phone_number_principal')
            ->from('func_employee AS fe')
            ->where('fe.ds_tax_document_cpf', $cpf);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_employee_phone($cpf)
    {
        $this->db->select('ds_phone')
            ->from('func_phone_number')
            ->where('fk_employee', $cpf);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function add_employee($data)
    {
        $this->db->trans_start();

        $this->db->insert('func_employee', [
            'ds_tax_document_cpf' => $data['cpf'],
            'ds_full_name' => $data['name'],
            'ds_tax_document_rg' => $data['rg'],
            'ds_email' => $data['email'],
            'ds_zip' => $data['cep'],
            'ds_address' => $data['street'],
            'ds_number' => $data['street_number'],
            'ds_neighborhood' => $data['district'],
            'ds_city' => $data['city'],
            'ds_state' => $data['state'],
            'dt_birthday' => $data['birthday'],
            'ln_photo' => $data['imagePath'],
            'occupation' => $data['occupation'],
            'ds_phone_number_principal' => $data['phone'],
        ]);

        foreach ((array) $data['phones'] as $value) {
            $this->db->insert('func_phone_number', [
                'fk_employee' => $data['cpf'],
                'ds_phone' => trim($value),
            ]);
        }

        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function edit_image($data)
    {
        $this->db->trans_start();
        $this->db->where('ds_tax_document_cpf', $data['cpf'])
            ->update('func_employee', [
                'ln_photo' => $data['imagePath'],
            ]);
        $this->db->trans_complete();

        return $this->db->trans_status();
    }

    public function edit_employee($data)
    {
        $this->db->where('ds_tax_document_cpf', $data['cpf'])
            ->update('func_employee', [
                'ds_full_name' => $data['name'],
                'ds_tax_document_rg' => $data['rg'],
                'ds_email' => $data['email'],
                'ds_zip' => $data['cep'],
                'ds_address' => $data['street'],
                'ds_number' => $data['street_number'],
                'ds_neighborhood' => $data['district'],
                'ds_city' => $data['city'],
                'ds_state' => $data['state'],
                'dt_birthday' => $data['birthday'],
                'occupation' => $data['occupation'],
                'ds_phone_number_principal' => $data['phone'],
            ]);
    }

    public function edit_employee_phones($cpf, $phones)
    {
        $this->db->where('fk_employee', $cpf);
        $this->db->delete('func_phone_number');

        /*foreach ($phones as $value) {
            $this->db->insert('func_phone_number', [
                'fk_employee' => $cpf,
                'ds_phone' => trim($value),
            ]);
        }*/

        for ($i = 0; $i < count($phones); $i++) {
            $this->db->insert('func_phone_number', [
                'fk_employee' => $cpf,
                'ds_phone' => $phones[$i],
            ]);
        }
    }

    public function delete_employee($cpf)
    {
        $this->db->trans_start();
        $this->db->where('fk_employee', $cpf);
        $this->db->delete('func_phone_number'); //

        $this->db->where('ds_tax_document_cpf', $cpf);
        $this->db->delete('func_employee');

        $var = $this->db->trans_complete();

        return $this->db->trans_status();
    

    }
}
