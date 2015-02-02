<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Role_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_role($role_id = FALSE)
    {
        if ($role_id === FALSE)
        {
            $query = $this->db->get('role');
            return $query->result_array();
        }

        $query = $this->db->get_where('role', array('role_id' => $role_id));
        return $query->row_array();
    }

    public function set_role()
    {
        $this->load->helper('url');

        $data = array(
            'role_name' => $this->input->post('role_name'),
            'landing_page' => $this->input->post('landing_page'),
            'permission' => $this->input->post('permission')
        );

        return $this->db->insert('role', $data);
    }
}