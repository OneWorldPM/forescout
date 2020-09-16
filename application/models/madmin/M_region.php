<?php

class M_region extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_region() {
        $this->db->select('*');
        $this->db->from('tbl_region');
        $tbl_region = $this->db->get();
        if ($tbl_region->num_rows() > 0) {
            return $tbl_region->result();
        } else {
            return '';
        }
    }

    function add_region($post) {

        if ($post['cr_type'] == 'save') {
            $data = array(
                'title' => $post['title'],
                'description' => $post['description'],
                'start_date' => date("Y-m-d", strtotime($post['start_date'])),
                'end_date' => date("Y-m-d", strtotime($post['end_date'])),
                'start_time' => date("h:i:s", strtotime($post['start_time'])),
                'end_time' => date("h:i:s", strtotime($post['end_time']))
            );
            $this->db->insert('tbl_region', $data);
            $rid = $this->db->insert_id();
            if ($rid) {
                return $rid;
            } else {
                return '';
            }
        } else if ($post['cr_type'] == 'update') {
            $set_array = array(
                'title' => $post['title'],
                'description' => $post['description'],
                'start_date' => date("Y-m-d", strtotime($post['start_date'])),
                'end_date' => date("Y-m-d", strtotime($post['end_date'])),
                'start_time' => date("h:i:s", strtotime($post['start_time'])),
                'end_time' => date("h:i:s", strtotime($post['end_time']))
            );
            $this->db->update('tbl_region', $set_array, array('tbl_region_id' => $post['tbl_region_id']));
            if ($this->db->affected_rows()) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
