<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medico_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_medicos()
    {
        $query = $this->db->get('medico');
        return $query->result_array();
    }

    public function get_medico($id)
    {
        $query = $this->db->get_where('medico', array('id_medico' => $id));
        return $query->row_array();
    }

    public function criar_medico($data)
    {
        return $this->db->insert('medico', $data);
    }

    public function atualizar_medico($id, $data)
    {
        $this->db->where('id_medico', $id);
        return $this->db->update('medico', $data);
    }

    public function excluir_medico($id)
    {
        return $this->db->delete('medico', array('id_medico' => $id));
    }
}