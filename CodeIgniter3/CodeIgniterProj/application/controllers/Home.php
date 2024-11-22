<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Barzin do lucas e seus comparças';
        $data['sections'] = [
            ['title' => 'Médicos', 'description' => 'Gerenciar informações de médicos', 'href' => 'medicos'],
            ['title' => 'Planos de Saúde', 'description' => 'Gerenciar planos de saúde', 'href' => 'planos-saude'],
            ['title' => 'Localizações', 'description' => 'Gerenciar localizações', 'href' => 'localizacoes'],
            ['title' => 'Itens', 'description' => 'Gerenciar itens', 'href' => 'itens'],
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');
    }
}