<?php
defined('BASEPATH') or exit('No direct script access allowed');

class item_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function criar($nome_item, $descricao, $preco, $quantidade) 
    {
      $data["nome_item"] = $nome_item
      $data["descricao"] = $descricao
      $data["preco"] = $preco
      $data["quantidade"] = $quantidade 
        return $this->db->insert('item', $data);
    }

    public function update_item($id_item, $descricao, $preco, $quantidade) {
        $data["nome_item"] = $nome_item
        $data["descricao"] = $descricao
        $data["preco"] = $preco
        $data["quantidade"] = $quantidade 
        $this->db->where('id_item', $id_item);
        $this->db->update('item', $data);
    }

    public function deletar($id_item)
    {
        $this->db->where('id_item', $id_item);
        return $this->db->delete('item');
    }


    public function get_all_items()
    {
        $query = $this->db->get('item');
        return $query->result_array();
    }
}