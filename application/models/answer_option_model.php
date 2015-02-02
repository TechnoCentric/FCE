<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Answer_Option_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_answer_option($option_id = FALSE)
    {
        if ($option_id === FALSE)
        {
            $query = $this->db->get('answer_option');
            return $query->result_array();
        }

        if(is_array($option_id)) {
            $query = $this->db->where_in('option_id', $option_id);
            $query = $this->db->get('answer_option');
            return $query->result_array();
        }

        $query = $this->db->get_where('answer_option', array('option_id' => $option_id));
        return $query->row_array();
    }

    public function set_answer_option()
    {
        $this->load->helper('url');

        $data = array(
            'displayed_name' => $this->input->post('displayed_name'),
            'value' => $this->input->post('value'),
            'score' => $this->input->post('score')
        );

        return $this->db->insert('answer_option', $data);
    }
}