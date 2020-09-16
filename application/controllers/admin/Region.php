<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Region extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_region', 'mregion');
    }

    public function index() {
        $data['region'] = $this->mregion->get_region();
        $this->load->view('admin/header');
        $this->load->view('admin/region', $data);
        $this->load->view('admin/footer');
    }

    public function add_region() {
        $post = $this->input->post();
        if (!empty($post)) {
            $res = $this->mregion->add_region($post);
            if ($res) {
                header('Location: ' . base_url() . 'admin/region?msg=S');
            } else {
                header('Location: ' . base_url() . 'admin/region?msg=E');
            }
        }
    }

    public function getRegionById($tbl_region_id) {
        $q = $this->db->get_where('tbl_region', array('tbl_region_id' => $tbl_region_id));
        if ($q->num_rows() > 0) {
            $plan = $q->row();
            $data['msg'] = 'success';
            $data['data'] = $plan;
        } else {
            $data['msg'] = 'error';
            $data['data'] = 'Record not found please try again later!';
        }
        echo json_encode($data);
    }

    public function deleteRegion($tbl_region_id) {
        $this->db->delete('tbl_region', array('tbl_region_id' => $tbl_region_id));
        header('Location: ' . base_url() . 'admin/region?msg=D');
    }

}
