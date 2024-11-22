<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacao_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_localizacoes()
    {
        $query = $this->db->get('localizacao');
        return $query->result_array();
    }

    public function get_localizacao($id)
    {
        $query = $this->db->get_where('localizacao', array('id_localizacao' => $id));
        return $query->row_array();
    }

    public function criar_localizacao($data)
    {
        return $this->db->insert('localizacao', $data);
    }

    public function atualizar_localizacao($id, $data)
    {
        $this->db->where('id_localizacao', $id);
        return $this->db->update('localizacao', $data);
    }

    public function excluir_localizacao($id)
    {
        return $this->db->delete('localizacao', array('id_localizacao' => $id));
    }
}