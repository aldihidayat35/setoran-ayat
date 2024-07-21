<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Login';
$route['404_override'] = 'error/show_404'; // pastikan 'error/show_404' ada dan benar
$route['translate_uri_dashes'] = FALSE;
$route['setoran/print'] = 'setoran/print_pdf';



