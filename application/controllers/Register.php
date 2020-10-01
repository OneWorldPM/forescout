<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('user/m_register', 'objregister');
        $this->load->model('user/m_login', 'objlogin');
    }

    public function index() {
        $partnerId = $this->input->get("partnerId");
        $data['partner_id'] = "";
        if ($partnerId != "") {
            $data['partner_id'] = $partnerId;
            $data['type'] = "referral_register";
        } else {
            $data['type'] = "register";
        }
        $data['cust_id'] = "";
        $this->load->view('main_header');
        $this->load->view('set_location', $data);
        $this->load->view('footer');
    }

    public function add_user($id) {
        $data['type'] = $this->input->get("type");
        $data["myprofile"] = $this->objregister->get_user_profile_details($id);
        $this->load->view('main_header');
        $this->load->view('register', $data);
        $this->load->view('footer');
    }

    public function add_customer() {
        $post = $this->input->post();
        $result = $this->objregister->add_customer();
        if ($result == "exist") {
            header('location:' . base_url() . 'register?msg=A'); //email or phone already Exist
        } else if ($result == "error") {
            header('location:' . base_url() . 'register?msg=E'); //Some Error
        } else {
//            $cust_id = $data['cust_id'];
//            $user_details = $this->db->get_where("customer_master", array("cust_id" => $cust_id))->row();
//            $session = array(
//                'cid' => $user_details->cust_id,
//                'cname' => $user_details->first_name,
//                'fullname' => $user_details->first_name . " " . $user_details->last_name,
//                'email' => $user_details->email,
//                'userType' => 'user'
//            );
//            $this->session->set_userdata($session);
//            redirect('setlocation?id=' . base64_encode($data['cust_id']) . '&type=register');
            $msg = "";
            if ($post['type'] == "email_login") {
                $msg = "Thank you for registering! Please return October 21! Click here to save to google calendar or Outlook";
            } else if ($post['type'] == "register") {
                $msg = "Thank you for your interest in the conference; Staff will approve your registration shortly. Please check your inbox.";
            } else {
                $msg = "Thank you for your interest in the conference; Staff will approve your registration shortly. Please check your inbox.";
            }
            $this->session->set_flashdata('msg', $msg);
            $myprofile = $this->objregister->get_user_profile_details($result);
            $from = 'admin@yourconference.live';
            $subject = 'Registration is Successful';
            $message = '<p>Thanks for registering! Your account is pending verification<br><br><br> Best Regards,<br>Forescout Team<p>';
            $this->common->sendEmail($from, trim($myprofile->email), $subject, $message);
            header('location:' . base_url() . 'register/register_message/' . $result); //Some Error
        }
    }

    function register_message($cust_id) {
        $data["location_status"] = $this->objregister->get_location_region($cust_id);
        $this->load->view('main_header');
        $this->load->view('register_message', $data);
        $this->load->view('footer');
    }

    public function user_profile($reg_id) {
        $data["myprofile"] = $this->objregister->get_user_profile_details($reg_id);
        $data["cms_details"] = $this->objregister->get_cms_details(1);
        $this->load->view('header');
        $this->load->view('update_user', $data);
        $this->load->view('footer');
    }

    public function update_user() {
        $cust_id = $this->objregister->update_user();
        if ($cust_id == "exist") {
            $post = $this->input->post();
            $cust_id = $post['cust_id'];
            header('location:' . base_url() . 'register/user_profile/' . $cust_id . '?msg=AE');
        } else {
            $post = $this->input->post();
            $cust_id = $post['cust_id'];
            $user_details = $this->db->get_where("customer_master", array("cust_id" => $cust_id))->row();
            $session = array(
                'cid' => $user_details->cust_id,
                'cname' => $user_details->first_name,
                'fullname' => $user_details->first_name . " " . $user_details->last_name,
                'email' => $user_details->email,
                'userType' => 'user'
            );
            $this->session->set_userdata($session);
            redirect('home');
            //   header('location:' . base_url() . 'register/plan_pricing/' . $cust_id);
        }
    }

    public function plan_pricing($cust_id) {
        $data["plan_pricing"] = $this->objregister->get_plan_pricing();
        $data["myprofile"] = $this->objregister->get_user_profile_details($cust_id);
        $data["cms_details"] = $this->objregister->get_cms_details(2);
        $this->load->view('header');
        $this->load->view('plan_pricing', $data);
        $this->load->view('footer');
    }

    public function update_registration_type() {
        $cust_id = $this->objregister->update_registration_type();
        header('location:' . base_url() . 'register/payment/' . $cust_id);
    }

    public function payment($cust_id) {
        $data["myprofile"] = $this->objregister->get_user_payment_details($cust_id);
        $data["cancellation_policy"] = $this->objregister->get_cms_details(3);
        $data["cms_details"] = $this->objregister->get_cms_details(3);
        $this->load->view('header');
        $this->load->view('payment', $data);
        $this->load->view('footer');
    }

    public function pay_payment() {
        $cust_id = $this->objregister->pay_payment();
        header('location:' . base_url() . 'register/payment_confirmed/' . $cust_id);
    }

    public function payment_confirmed($cust_id) {
        $data["cms_details"] = $this->objregister->get_cms_details(5);
        $data["cust_id"] = $cust_id;
        $this->load->view('header');
        $this->load->view('payment_confirmed', $data);
        $this->load->view('footer');
    }

    public function get_promo_code_details() {
        $promo_code_details = $this->objregister->get_promo_code_details();
        if (!empty($promo_code_details)) {
            echo json_encode(array("status" => "success", "promo_code_details" => $promo_code_details));
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

}
