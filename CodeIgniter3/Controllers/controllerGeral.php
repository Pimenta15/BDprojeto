<?php
defined('BASEPATH') or exit('No direct script access allowed');

class medico extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Medico_model');
        $this->load->model('Item_model');
        $this->load->model('Plano_saude_model');
        $this->load->model('Localizacao_model');
    }

    public function index()
    {
        $this->home();
    }

    public function home()
    {
        $dados['titulo'] = "Página Home";
        $dados['medicos'] = $this->Medico_model->get_all_medicos();
        $this->load->view('home', $dados);
        
    }

    public function cadastrar_medico()
    {
        $dados['titulo'] = "Página de cadastro de Médicos";
        $this->load->view('cadastrar_medico', $dados);

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $CRM = $this->input->post('CRM');
            $espec = $this->input->post('espec');

            if ($this->Medico_model->get_user_by_CRM($CRM)) {
                $dados['error'] = "Este nome de usuário já foi cadastrado.";
            } else {
                if ($this->Medico_model->insert($CRM,$espec)) {
                    $dados['success'] = "Cadastro realizado com sucesso!";
                } else {
                    $dados['error'] = "Erro ao cadastrar usuário.";
                }
            }
            $this->load->view('cadastrar_medico', $dados);
        }
    }
    
    public function deletar_medico($id_medico)
    {
        if ($this->Medico_model->deletar($id_medico)) {
            $dados['success'] = "Medico deletado com sucesso!";
        } else {
            $dados['error'] = "Erro ao deletar medico.";
        }
        redirect('home/medico');
    }

    public function atualizar_medico($id_medico, $CRM, $espec)
    {
        $this->load->model('atividade_model');
        $CRM = $this->input->post('CRM');
        $espec = $this->input->post('espec');
        $this->atividade_model->update_atividade($id_medico, $CRM, $espec);
        redirect('pagina/atividades');
    }
}