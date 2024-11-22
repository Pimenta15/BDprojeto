<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicos extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('medico_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['title'] = 'Gerenciamento de Médicos';
        $data['medicos'] = $this->medico_model->get_medicos();

        $this->load->view('templates/header', $data);
        $this->load->view('medicos/index', $data);
        $this->load->view('templates/footer');
    }

    public function criar()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Adicionar Médico';

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('especialidade', 'Especialidade', 'required');
        $this->form_validation->set_rules('crm', 'CRM', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('medicos/criar');
            $this->load->view('templates/footer');
        }
        else
        {
            $this->medico_model->criar_medico($this->input->post());
            redirect('medicos');
        }
    }

    public function editar($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Editar Médico';
        $data['medico'] = $this->medico_model->get_medico($id);

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('especialidade', 'Especialidade', 'required');
        $this->form_validation->set_rules('crm', 'CRM', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('medicos/editar', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->medico_model->atualizar_medico($id, $this->input->post());
            redirect('medicos');
        }
    }

    public function excluir($id)
    {
        $this->medico_model->excluir_medico($id);
        redirect('medicos');
    }
}