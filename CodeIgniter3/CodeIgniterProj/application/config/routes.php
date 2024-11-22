<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['medicos'] = 'medicos/index';
$route['medicos/criar'] = 'medicos/criar';
$route['medicos/editar/(:num)'] = 'medicos/editar/$1';
$route['medicos/excluir/(:num)'] = 'medicos/excluir/$1';

$route['planos-saude'] = 'planossaude/index';
$route['planos-saude/criar'] = 'planossaude/criar';
$route['planos-saude/editar/(:num)'] = 'planossaude/editar/$1';
$route['planos-saude/excluir/(:num)'] = 'planossaude/excluir/$1';

$route['localizacoes'] = 'localizacoes/index';
$route['localizacoes/criar'] = 'localizacoes/criar';
$route['localizacoes/editar/(:num)'] = 'localizacoes/editar/$1';
$route['localizacoes/excluir/(:num)'] = 'localizacoes/excluir/$1';

$route['itens'] = 'itens/index';
$route['itens/criar'] = 'itens/criar';
$route['itens/editar/(:num)'] = 'itens/editar/$1';
$route['itens/excluir/(:num)'] = 'itens/excluir/$1';