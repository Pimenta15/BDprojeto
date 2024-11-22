<?php
defined('BASEPATH') or exit('No direct script access allowed');

class plano_saude_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function criar($nome_plano_saude, $corbertura, $mensalidade) 
    {
      $data["nome_plano"] = $nome_plano
      $data["corbertura"] = $corbertura
      $data["mensalidade"] = $mensalidade
        return $this->db->insert('plano_saude', $data);
    }

    public function update_plano_saude($id_plano, $corbertura, $mensalidade) {
        $data["nome_plano"] = $nome_plano
        $data["corbertura"] = $corbertura
        $data["mensalidade"] = $mensalidade
        $this->db->where('id_plano', $id_plano);
        $this->db->update('plano_saude', $data);
    }

    public function deletar($id_plano_saude)
    {
        $this->db->where('id_plano', $id_plano);
        return $this->db->delete('plano_saude');
    }


    public function get_all_plano_saudes()
    {
        $query = $this->db->get('plano_saude');
        return $query->result_array();
    }
}