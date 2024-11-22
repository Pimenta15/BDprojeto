<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacoes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('localizacao_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Gerenciamento de Localizações';
        $data['localizacoes'] = $this->localizacao_model->get_localizacoes();

        $this->load->view('templates/header', $data);
        $this->load->view('localizacoes/index', $data);
        $this->load->view('templates/footer');
    }

    public function criar()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Adicionar Localização';

        $this->form_validation->set_rules('nome_local', 'Nome do Local', 'required');
        $this->form_validation->set_rules('capacidade', 'Capacidade', 'required|integer');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('localizacoes/criar');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->localizacao_model->criar_localizacao($this->input->post());
            redirect('localizacoes');
        }
    }

    public function editar($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Editar Localização';
        $data['localizacao'] = $this->localizacao_model->get_localizacao($id);

        $this->form_validation->set_rules('nome_local', 'Nome do Local', 'required');
        $this->form_validation->set_rules('capacidade', 'Capacidade', 'required|integer');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('localizacoes/editar', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->localizacao_model->atualizar_localizacao($id, $this->input->post());
            redirect('localizacoes');
        }
    }

    public function excluir($id)
    {
        $this->localizacao_model->excluir_localizacao($id);
        redirect('localizacoes');
    }
}