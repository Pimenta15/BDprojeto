<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medico_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function criar($CRM, $espec) 
    {
      $data["CRM"] = $CRM
      $data["espec"] = $espec
        return $this->db->insert('medico', $data);
    }

    public function update_medico($id_medico, $CRM, $espec) {
        $data["CRM"] = $CRM
        $data["espec"] = $espec
        $this->db->where('id_medico', $id_medico);
        $this->db->update('medico', $data);
    }

    public function deletar($id_medico)
    {
        $this->db->where('id_medico', $id_medico);
        return $this->db->delete('medico');
    }


    public function get_all_medicos()
    {
        $query = $this->db->get('medico');
        return $query->result_array();
    }

    public function get_user_by_CRM($CRM)
    {
        $query = $this->db->get_where('medico', ['CRM' => $CRM]);
        return $query->row_array();
    }
    
}