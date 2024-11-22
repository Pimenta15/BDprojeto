<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_itens()
    {
        $query = $this->db->get('item');
        return $query->result_array();
    }

    public function get_item($id)
    {
        $query = $this->db->get_where('item', array('id_item' => $id));
        return $query->row_array();
    }

    public function criar_item($data)
    {
        return $this->db->insert('item', $data);
    }

    public function atualizar_item($id, $data)
    {
        $this->db->where('id_item', $id);
        return $this->db->update('item', $data);
    }

    public function excluir_item($id)
    {
        return $this->db->delete('item', array('id_item' => $id));
    }
}