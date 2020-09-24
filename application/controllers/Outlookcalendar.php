<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outlookcalendar extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function addEvent($location_status) {
        
        $tbl_region = $this->db->get_where("tbl_region", array("region_name" => $location_status))->row();
        if (!empty($tbl_region)) {
            $date = strtotime($tbl_region->start_date);
            $startTime = date("Ymd",strtotime($tbl_region->start_time));
            $endTime = strtotime($tbl_region->end_time);
            $subject = $tbl_region->title;
            $desc = $tbl_region->description;
        } else {
            $date = 1600679661;
            $startTime = date("Ymd");
            $endTime = 1400;
            $subject = "Forescout Event";
            $desc = "Forescout Event";
        }
        
        header("Content-Type: text/Calendar");
        header("Content-Disposition: inline; filename=outlookcalendar.ics");
        echo "BEGIN:VCALENDAR\n";
        echo "VERSION:2.0\n";
        echo "PRODID:-//Foobar Corporation//NONSGML Foobar//EN\n";
        echo "METHOD:REQUEST\n"; // requied by Outlook
        echo "BEGIN:VEVENT\n";
        echo "UID:" . date('Ymd') . 'T' . date('His') . "-" . rand() . "-https://yourconference.live/forescout\n"; // required by Outlok
        echo "DTSTAMP:" . date('Ymd') . 'T' . date('His') . "\n"; // required by Outlook
        echo "DTSTART:".$startTime."T000000\n";
        echo "SUMMARY:".$subject."\n";
        echo "DESCRIPTION: ".$desc."\n";
        echo "END:VEVENT\n";
        echo "END:VCALENDAR\n";
    }

}
