<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Answer_Type_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_answer_type($answer_type_id = FALSE)
    {
        if ($answer_type_id === FALSE)
        {
            $query = $this->db->get('type_of_answer');
            return $query->result_array();
        }

        $query = $this->db->get_where('type_of_answer', array('answer_type_id' => $answer_type_id));
        return $query->row_array();
    }

    public function set_answer_type()
    {
        $this->load->helper('url');

        $data = array(
            'name' => $this->input->post('name'),
            'description' => $this->input->post('description'),
            'option_id' => $this->input->post('option_id')
        );

        return $this->db->insert('type_of_answer', $data);
    }
}