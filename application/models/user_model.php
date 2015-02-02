<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
        $this->load->library('encrypt');
    }

    public function validate_user() {
        $password = $this->input->post('password');

        $data = array(
            'user_name' => $this->input->post('username')
        );
        $query = $this->db->get_where('user', $data);
        $result = $query->row_array();
        if(!empty($result)) {
            $password_in_db = $this->encrypt->decode($result['password']);
            if($password == $password_in_db) {
                return $result;
            }
        }
        $result = array();
        return $result;
    }

    public function get_user($user_id = FALSE)
    {
        if ($user_id === FALSE)
        {
            $query = $this->db->get('user');
            return $query->result_array();
        }

        $query = $this->db->get_where('user', array('user_id' => $user_id));
        return $query->row_array();
    }

    public function set_user()
    {
        $this->load->helper('url');
        $password = $this->input->post('password');
        $password = $this->encrypt->encode($password);

        $data = array(
            'user_name' => $this->input->post('user_name'),
            'password' => $password,
            'role_id' => '2',
            'created_by' => $this->input->post('created_by'),
            'date_created' => $this->input->post('date_created')
        );

        return $this->db->insert('user', $data);
    }

    public function register_site_user()
    {
        $this->load->helper('url');
        $password = $this->input->post('new_password');
        $password = $this->encrypt->encode($password);

        $user = array(
            'user_name' => $this->input->post('new_username'),
            'password' => $password,
            'role_id' => '3',
            'created_by' => 0
        );

        // insert into user table
        $user_table_return_value = $this->db->insert('user', $user);

        // update user table with created_by info
        $created_by = $this->db->insert_id();
        $this->db->where('user_id', $created_by);
        $this->db->update('user', array('created_by' => $created_by));
        $level = $this->input->post('level');
        if($level !== FALSE && $level == 'Other') {
            $level = $this->input->post('other_level');
        }

        $organization = array(
            'user_id' => $created_by,
            'organization_name' => $this->input->post('organization'),
            'level' => $level,
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone_number')
        );

        // insert into organization table
        $organization_table_return_value = $this->db->insert('organization', $organization);

        return array(
            'user_table_return_value' => $user_table_return_value,
            'organization_table_return_value' => $organization_table_return_value
        );
    }
}