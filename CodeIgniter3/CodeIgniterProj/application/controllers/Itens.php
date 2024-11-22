<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Itens extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('item_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Gerenciamento de Itens';
        $data['itens'] = $this->item_model->get_itens();

        $this->load->view('templates/header', $data);
        $this->load->view('itens/index', $data);
        $this->load->view('templates/footer');
    }

    public function criar()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Adicionar Item';

        $this->form_validation->set_rules('nome_item', 'Nome do Item', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('preco', 'Preço', 'required|numeric');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required|integer');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('itens/criar');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->item_model->criar_item($this->input->post());
            redirect('itens');
        }
    }

    public function editar($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Editar Item';
        $data['item'] = $this->item_model->get_item($id);

        $this->form_validation->set_rules('nome_item', 'Nome do Item', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('preco', 'Preço', 'required|numeric');
        $this->form_validation->set_rules('quantidade', 'Quantidade', 'required|integer');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('itens/editar', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->item_model->atualizar_item($id, $this->input->post());
            redirect('itens');
        }
    }

    public function excluir($id)
    {
        $this->item_model->excluir_item($id);
        redirect('itens');
    }
}