<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Answer_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_answer_by_user($question_id, $user_id)
    {
        $query = $this->db->get_where('answer', array('user_id' => $user_id, 'question_id' => $question_id));
        return $query->row_array();
    }

    public function get_all_answers_by_user($user_id) {
        $this->db->order_by('answer_id', 'asc');
        $query = $this->db->get_where('answer', array('user_id' => $user_id));
        return $query->result_array();
    }

    public function insert_answer($user_id, $question_id, $answer)
    {
        $this->load->helper('url');

        $data = array(
            'user_id' => $user_id,
            'question_id' => $question_id,
            'answer' => $answer
        );

        return $this->db->insert('answer', $data);
    }

    public function update_answer($user_id, $question_id, $answer)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('question_id', $question_id);
        $this->db->update('answer', array('answer' => $answer));
    }

    public function get_number_of_questions_answered_by_user($user_id) {
        $query = $this->db->get_where('answer', array('user_id' => $user_id));
        return $query->num_rows();
    }

    //public function get
}