<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('googlecalendar');
    }

    public function login() {
        $data = array('loginUrl' => $this->googlecalendar->loginUrl());
//      $this->load->view('calendar/login', $data);
        redirect($this->googlecalendar->loginUrl(), 'refresh');
    }

    public function oauth() {
        $code = $this->input->get('code', true);
        $this->googlecalendar->login($code);
        redirect(base_url() . 'main', 'refresh');
    }

    public function logout() {
        $this->googleplus->revokeToken();
        $this->session->sess_destroy();
        redirect(base_url() . 'main', 'refresh');
    }

}
