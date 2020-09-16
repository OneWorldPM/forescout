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
            $startTime = strtotime($tbl_region->start_time);
            $endTime = strtotime($tbl_region->end_time);
            $subject = $tbl_region->title;
            $desc = $tbl_region->description;
        } else {
            $date = 1600679661;
            $startTime = 1300;
            $endTime = 1400;
            $subject = "Forescout Event";
            $desc = "Forescout Event";
        }


        header("Content-Type: text/Calendar");
        header("Content-Disposition: inline; filename=forescout.ics");
        echo "BEGIN:VCALENDAR\n";
        echo "PRODID:-//Forescout Event//Outlook 12.0 MIMEDIR//EN\n";
        echo "VERSION:2.0\n";
        echo "METHOD:PUBLISH\n";
        echo "X-MS-OLK-FORCEINSPECTOROPEN:TRUE\n";
        echo "BEGIN:VEVENT\n";
        echo "CLASS:PUBLIC\n";
        echo "CREATED:1600689294T101015Z\n";
        echo "DESCRIPTION:Forescout Event\\n\\n\\nEvent Page\\n\\nhttps://yourconference.live/forescout\n";
        echo "DTEND:1600689294T040000Z\n";
        echo "DTSTAMP:1600689294T093305Z\n";
        echo "DTSTART:1600689294T003000Z\n";
        echo "LAST-MODIFIED:1600689294T101015Z\n";
        echo "LOCATION:Forescout Event\n";
        echo "PRIORITY:5\n";
        echo "SEQUENCE:0\n";
        echo "SUMMARY;LANGUAGE=en-us:Forescout Event\n";
        echo "TRANSP:OPAQUE\n";
        echo "UID:040000008200E00074C5B7101A82E008000000008062306C6261CA01000000000000000\n";
        echo "X-MICROSOFT-CDO-BUSYSTATUS:BUSY\n";
        echo "X-MICROSOFT-CDO-IMPORTANCE:1\n";
        echo "X-MICROSOFT-DISALLOW-COUNTER:FALSE\n";
        echo "X-MS-OLK-ALLOWEXTERNCHECK:TRUE\n";
        echo "X-MS-OLK-AUTOFILLLOCATION:FALSE\n";
        echo "X-MS-OLK-CONFTYPE:0\n";
        echo "BEGIN:VALARM\n";
        echo "TRIGGER:-PT1440M\n";
        echo "ACTION:DISPLAY\n";
        echo "DESCRIPTION:Reminder\n";
        echo "END:VALARM\n";
        echo "END:VEVENT\n";
        echo "END:VCALENDAR\n";
    }

}
