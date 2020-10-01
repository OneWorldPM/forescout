<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('user/m_login', 'objlogin');
    }

    public function index() {
        $get_user_token_details = $this->common->get_user_details($this->session->userdata('cid'));
        if ($this->session->userdata('cid') != "" && $this->session->userdata('userType') == "user" && $this->session->userdata('token') == $get_user_token_details->token) {
            redirect('home');
        } else {
            $this->load->view('main_header');
            $this->load->view('login');
            $this->load->view('footer');
        }
    }

    public function authentication() {
        $username = $this->input->post('email');
        $password = $this->input->post('password');

        if (strlen(trim(preg_replace('/\xb2\xa0/', '', $username))) == 0 || strlen(trim(preg_replace('/\xb2\xa0/', '', $password))) == 0) {
            $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Please enter Username or Password</div><br>');
            redirect('login');
        } else {
            $arr = array(
                'email' => $username,
                'password' => base64_encode($password)
            );
            $data = $this->objlogin->user_login($arr);
            if ($data) {
                if ($data['customer_master_status'] == 0) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">Your account is pending verification</div>');
                    redirect('login');
                } else if ($data['customer_master_status'] == 2) {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger">Your account has been pending account rejected</div>');
                    redirect('login');
                } else {
                    $token = $this->objlogin->update_user_token($data['cust_id']);
                    $session = array(
                        'cid' => $data['cust_id'],
                        'cname' => $data['first_name'],
                        'email' => $data['email'],
                        'token' => $token,
                        'userType' => 'user'
                    );
                    $this->session->set_userdata($session);
                    redirect('home');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Username or Password is Wrong.</div>');
                redirect('login');
            }
        }
    }

    function register_login($cust_id) {
        $data = $this->objlogin->register_login($cust_id);
        if ($data) {
            $token = $this->objlogin->update_user_token($data['cust_id']);
            $session = array(
                'cid' => $data['cust_id'],
                'cname' => $data['first_name'],
                'fullname' => $data['first_name'] . " " . $data['last_name'],
                'email' => $data['email'],
                'token' => $token,
                'userType' => 'user'
            );
            $this->session->set_userdata($session);
            redirect('home');
        } else {
            redirect('login');
        }
    }

    function logout() {
        $this->session->unset_userdata('cid');
        $this->session->unset_userdata('cname');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userType');
        header('location:' . base_url() . 'login');
    }

    function via_email_login($id) {
        if ($id != "") {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://444-cqd-069.mktorest.com/identity/oauth/token?grant_type=client_credentials&client_id=e31261cd-7b6f-4a93-b563-d18efb539c8b&client_secret=bUKrsoXPRb4kDW6HCzIFV7QZwDRxeW2d",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => FALSE,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST"
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);

            if (!empty($response)) {
                if (isset($response->access_token)) {
                    if ($response->access_token != "") {
                        $curl = curl_init();
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://444-cqd-069.mktorest.com/rest/v1/lead/" . $id . ".json?access_token=" . $response->access_token . "&fields=email,address,id,firstName,lastName,title,city,state,country,phone,company,numberOfEmployees,industry,twitterId,facebookId,website,leadRole,department",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_SSL_VERIFYPEER => FALSE,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET"
                        ));
                        $lead_response = curl_exec($curl);
                        curl_close($curl);
                        $lead_response = json_decode($lead_response);

                        if (!empty($lead_response)) {
                            if ($lead_response->success == 1) {
                                if (!empty($lead_response->result[0])) {
                                    if ($lead_response->result[0]->email != "") {
                                        $user_details = $this->db->get_where("customer_master", array("email" => $lead_response->result[0]->email))->row();

                                        if (!empty($user_details)) {

                                            $set = array(
                                                'first_name' => $lead_response->result[0]->firstName,
                                                'last_name' => $lead_response->result[0]->lastName,
                                                'email' => $lead_response->result[0]->email,
                                                'password' => base64_encode(123),
                                                'address' => $lead_response->result[0]->address,
                                                'title' => $lead_response->result[0]->title,
                                                'job_title' => $lead_response->result[0]->title,
                                                'city' => $lead_response->result[0]->city,
                                                'state' => $lead_response->result[0]->state,
                                                'country' => $lead_response->result[0]->country,
                                                'phone' => $lead_response->result[0]->phone,
                                                'company_name' => $lead_response->result[0]->company,
                                                'number_of_employees' => $lead_response->result[0]->numberOfEmployees,
                                                'industry' => $lead_response->result[0]->industry,
                                                'twitter_id' => $lead_response->result[0]->twitterId,
                                                'facebook_id' => $lead_response->result[0]->facebookId,
                                                'website' => $lead_response->result[0]->website,
                                                'register_date' => date("Y-m-d h:i")
                                            );
                                            $this->db->update("customer_master", $set, array("cust_id" => $cust_id));
                                            $cust_id = $user_details->cust_id;
                                            redirect('setlocation?id=' . base64_encode($cust_id) . '&type=email_login');
//                                            $token = $this->objlogin->update_user_token($user_details->cust_id);
//                                            $session = array(
//                                                'cid' => $user_details->cust_id,
//                                                'cname' => $user_details->first_name,
//                                                'fullname' => $user_details->first_name . " " . $user_details->last_name,
//                                                'email' => $user_details->email,
//                                                'token' => $token,
//                                                'userType' => 'user'
//                                            );
//                                            $this->session->set_userdata($session);
                                            // redirect('setlocation?id=' . base64_encode($cust_id) . '&type=register');
                                            //redirect('home');
                                        } else {
                                            $this->db->order_by("cust_id", "desc");
                                            $row_data = $this->db->get("customer_master")->row();
                                            if (!empty($row_data)) {
                                                $reg_id = $row_data->cust_id;
                                                $register_id = date("Y") . '-20' . $reg_id;
                                            } else {
                                                $register_id = date("Y") . '-200';
                                            }

                                            $set = array(
                                                "register_id" => $register_id,
                                                'user_id' => $lead_response->result[0]->id,
                                                'first_name' => $lead_response->result[0]->firstName,
                                                'last_name' => $lead_response->result[0]->lastName,
                                                'email' => $lead_response->result[0]->email,
                                                'password' => base64_encode(123),
                                                'address' => $lead_response->result[0]->address,
                                                'title' => $lead_response->result[0]->title,
                                                'job_title' => $lead_response->result[0]->title,
                                                'city' => $lead_response->result[0]->city,
                                                'state' => $lead_response->result[0]->state,
                                                'country' => $lead_response->result[0]->country,
                                                'phone' => $lead_response->result[0]->phone,
                                                'company_name' => $lead_response->result[0]->company,
                                                'number_of_employees' => $lead_response->result[0]->numberOfEmployees,
                                                'industry' => $lead_response->result[0]->industry,
                                                'twitter_id' => $lead_response->result[0]->twitterId,
                                                'facebook_id' => $lead_response->result[0]->facebookId,
                                                'website' => $lead_response->result[0]->website,
                                                'member_status' => "",
                                                'status' => 0,
                                                'customer_master_status' => 1,
                                                'register_date' => date("Y-m-d h:i")
                                            );
                                            $this->db->insert("customer_master", $set);
                                            $cust_id = $this->db->insert_id();
                                            $user_details = $this->db->get_where("customer_master", array("cust_id" => $cust_id))->row();
                                            if (!empty($user_details)) {
                                                $leads = array(
                                                    array("id" => $id)
                                                );
                                                $token = array(
                                                        //array("name" => "TestToken", "value" => "123")
                                                );
                                                $requestBody = array(
                                                    "input" => array("leads" => $leads, "tokens" => $token)
                                                );
                                                $requestBody = json_encode($requestBody);
                                                $url = "https://444-cqd-069.mktorest.com/rest/v1/campaigns/21786/trigger.json?access_token=" . $response->access_token;
                                                $ch = curl_init($url);
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json', 'Content-Type: application/json'));
                                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                                                curl_setopt($ch, CURLOPT_POST, 1);
                                                curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
                                                curl_getinfo($ch);
                                                $send_email_response = curl_exec($ch);
                                                
                                                redirect('setlocation?id=' . base64_encode($cust_id) . '&type=email_login');
//                                                $token = $this->objlogin->update_user_token($user_details->cust_id);
//                                                $session = array(
//                                                    'cid' => $user_details->cust_id,
//                                                    'cname' => $user_details->first_name,
//                                                    'fullname' => $user_details->first_name . " " . $user_details->last_name,
//                                                    'email' => $user_details->email,
//                                                    'token' => $token,
//                                                    'userType' => 'user'
//                                                );
//                                                $this->session->set_userdata($session);
                                                //   redirect('setlocation?id=' . base64_encode($data['cust_id']) . '&type=register');
                                                //   redirect('home');
                                            }
                                        }
                                    } else {
                                        redirect('login');
                                    }
                                } else {
                                    redirect('login');
                                }
                            } else {
                                redirect('login');
                            }
                        } else {
                            redirect('login');
                        }
                    } else {
                        redirect('login');
                    }
                } else {
                    redirect('login');
                }
            } else {
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

}
