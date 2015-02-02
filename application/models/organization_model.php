<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Organization_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_organization($user_id = FALSE)
    {
        if ($user_id === FALSE)
        {
            $query = $this->db->get('organization');
            return $query->result_array();
        }

        $query = $this->db->get_where('organization', array('user_id' => $user_id));
        return $query->row_array();
    }

    public function get_unique_organizations_count()
    {
        $this->db->distinct();
        $query = $this->db->get('organization');
        return $query->num_rows();
    }
}