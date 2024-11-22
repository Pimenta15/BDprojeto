<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlanoSaude_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_planos_saude()
    {
        $query = $this->db->get('plano_saude');
        return $query->result_array();
    }

    public function get_plano_saude($id)
    {
        $query = $this->db->get_where('plano_saude', array('id_plano' => $id));
        return $query->row_array();
    }

    public function criar_plano_saude($data)
    {
        return $this->db->insert('plano_saude', $data);
    }

    public function atualizar_plano_saude($id, $data)
    {
        $this->db->where('id_plano', $id);
        return $this->db->update('plano_saude', $data);
    }

    public function excluir_plano_saude($id)
    {
        return $this->db->delete('plano_saude', array('id_plano' => $id));
    }
}