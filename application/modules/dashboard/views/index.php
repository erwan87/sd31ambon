<?php
$this->load->view('templates/template/v_headerdashboard');

$this->load->view('templates/template/v_sidebar');

$this->load->view($view);

$this->load->view('templates/template/v_footerdashboard');
