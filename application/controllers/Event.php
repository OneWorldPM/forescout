<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->model('auth');
        $this->load->model('googlecalendar');
    }

    public function addEvent($location_status) {
        $session_set = array(
            'location_status' => $location_status
        );
        $this->session->set_userdata($session_set);
        
        $tbl_region = $this->db->get_where("tbl_region", array("region_name" => $location_status))->row();
        if (!empty($tbl_region)) {
            $event = array(
                'summary' => $tbl_region->title,
                'start' => $tbl_region->start_date . "T" . $tbl_region->start_time . "+03:00",
                'end' => $tbl_region->end_date . "T" . $tbl_region->end_time . "+03:00",
                'description' => $tbl_region->description,
            );
        } else {
            $event = array(
                'summary' => "Forescout Event",
                'start' => "2020-09-21T17:00:00+03:00",
                'end' => "2022-09-22T18:00:00+04:00",
                'description' => "Start Conference October 21",
            );
        }

        $foo = $this->googlecalendar->addEvent('primary', $event);
        if ($foo->status == 'confirmed') {

            $data['message'] = '<div class="alert alert-success">Event saved to your calendar.</div>';
        }

        $this->session->unset_userdata('location_status');
         $data["location_status"] = $tbl_region->region_name; 
        $this->load->helper('form');
        $this->load->view('main_header');
        $this->load->view('register_message', $data);
        $this->load->view('footer');
    }

    public function eventList() {
        
    }

}
