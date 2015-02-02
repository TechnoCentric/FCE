<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/11/2014
 * Time: 5:16 AM
 */

class BPSR_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('role_model');
        $this->load->model('answer_model');
        $this->load->model('section_model');
        $this->load->model('question_model');
        $this->load->model('organization_model');
        $this->load->model('answer_type_model');
        $this->load->model('answer_option_model');

        $this->load->library('session');

        $this->load->helper('url');
        $this->load->helper('form');

        //$this->session->userdata('data'); // user_name, role_id, user_id
        $user_session_data = $this->session->all_userdata();
        // if user has not logged in, redirect to login page
        if(! isset($user_session_data['user_name'])) {
            redirect(base_url().'user/login');
        }
    }
}