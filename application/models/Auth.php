<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->model('googlecalendar');

        if (!$this->googlecalendar->isLogin()) {
            redirect('auth/login', 'refresh');
        }
    }
}
