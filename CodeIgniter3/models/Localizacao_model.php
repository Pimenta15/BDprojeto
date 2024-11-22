<?php
defined('BASEPATH') or exit('No direct script access allowed');

class localizacao_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function criar($nome_local, $capacidade) 
    {
      $data["nome_local"] = $nome_local
      $data["capacidade"] = $capacidade
        return $this->db->insert('localizacao', $data);
    }

    public function update_localizacao($id_localizacao, $corbertura, $mensalidade) {
        $data["nome_local"] = $nome_local
        $data["capacidade"] = $capacidade
        $this->db->where('id_localizacao', $id_localizacao);
        $this->db->update('localizacao', $data);
    }

    public function deletar($id_localizacao)
    {
        $this->db->where('id_localizacao', $id_localizacao);
        return $this->db->delete('localizacao');
    }


    public function get_all_localizacoes()
    {
        $query = $this->db->get('localizacao');
        return $query->result_array();
    }
}