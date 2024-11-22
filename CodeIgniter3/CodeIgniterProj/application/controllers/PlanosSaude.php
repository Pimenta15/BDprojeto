<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlanosSaude extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('planosaude_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Gerenciamento de Planos de Saúde';
        $data['planos_saude'] = $this->planosaude_model->get_planos_saude();

        $this->load->view('templates/header', $data);
        $this->load->view('planos_saude/index', $data);
        $this->load->view('templates/footer');
    }

    public function criar()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Adicionar Plano de Saúde';

        $this->form_validation->set_rules('nome_plano', 'Nome do Plano', 'required');
        $this->form_validation->set_rules('corbertura', 'Cobertura', 'required');
        $this->form_validation->set_rules('mensalidade', 'Mensalidade', 'required|numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('planos_saude/criar');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->planosaude_model->criar_plano_saude($this->input->post());
            redirect('planos-saude');
        }
    }

    public function editar($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Editar Plano de Saúde';
        $data['plano_saude'] = $this->planosaude_model->get_plano_saude($id);

        $this->form_validation->set_rules('nome_plano', 'Nome do Plano', 'required');
        $this->form_validation->set_rules('corbertura', 'Cobertura', 'required');
        $this->form_validation->set_rules('mensalidade', 'Mensalidade', 'required|numeric');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('planos_saude/editar', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->planosaude_model->atualizar_plano_saude($id, $this->input->post());
            redirect('planos-saude');
        }
    }

    public function excluir($id)
    {
        $this->planosaude_model->excluir_plano_saude($id);
        redirect('planos-saude');
    }
}