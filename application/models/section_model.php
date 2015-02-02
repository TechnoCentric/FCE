<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Section_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_section($section_id = FALSE)
    {
        if ($section_id === FALSE)
        {
            $query = $this->db->get('section');
            return $query->result_array();
        }

        $query = $this->db->get_where('section', array('section_id' => $section_id));
        return $query->row_array();
    }

    public function set_section()
    {
        $this->load->helper('url');

        $data = array(
            'section_name' => $this->input->post('section_name'),
            'created_by' => $this->input->post('created_by')
        );

        return $this->db->insert('section', $data);
    }
}