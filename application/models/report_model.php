<?php
/**
 * Created by PhpStorm.
 * User: Ibrahim
 * Date: 12/5/2014
 * Time: 11:39 AM
 */

class Report_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_all_mdas_report()
    {
        return $query = $this->db->get('answer');
    }
}