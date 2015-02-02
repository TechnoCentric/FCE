<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Question_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_question_count() {
        $query = $this->db->get('question');
        return $query->num_rows();
    }

    public function get_question($question_id = FALSE)
    {
        if ($question_id === FALSE)
        {
            $this->db->order_by('question_order_number', 'asc');
            $query = $this->db->get('question');
            return $query->result_array();
        }

        $query = $this->db->get_where('question', array('question_id' => $question_id));
        return $query->row_array();
    }

    public function set_question()
    {
        $this->load->helper('url');

        $data = array(
            'section_id' => $this->input->post('section_id'),
            'question' => $this->input->post('question'),
            'question_order_number' => $this->input->post('question_order_number'),
            'type_of_answer' => $this->input->post('type_of_answer'),
            'created_by' => $this->input->post('created_by')
        );

        return $this->db->insert('question', $data);
    }

    public function delete_question($question_id) {
        return $this->db->delete('question', array('question_id' => $question_id));
    }
}