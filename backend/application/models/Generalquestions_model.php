<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generalquestions_model
 *
 * @author AFRAKIB
 */
class Generalquestions_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_general_questions = "general_questions";

    function addquestion() {
        $data = array(
            'gq_title' => $this->input->post('qname'),
            'gq_description' => $this->input->post('descripton'),
            'gq_category' => 0
        );
        $this->db->insert($this->tbl_general_questions, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function questionlist() {
        $this->db->where(array('gq_category' => 0));
        return $this->db->get($this->tbl_general_questions)->result();
    }

    function single_question($id) {
        return $this->db->get_where($this->tbl_general_questions, array('gq_id' => $id))->row_array();
    }

    function update_question($id) {

        $data = array(
            'gq_title' => $this->input->post('qname'),
            'gq_description' => $this->input->post('descripton')
        );
        $this->db->where(array('gq_id' => $id));
        $this->db->update($this->tbl_general_questions, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* Diagnosis and Treatment */

    function addDiagnosisTreatment() {
        $data = array(
            'gq_title' => $this->input->post('qname'),
            'gq_description' => $this->input->post('descripton'),
            'gq_category' => 1
        );
        $this->db->insert($this->tbl_general_questions, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function DiagnosisTreatmentlist() {
        $this->db->where(array('gq_category' => 1));
        return $this->db->get($this->tbl_general_questions)->result();
    }

    function update_DiagnosisTreatment($id) {

        $data = array(
            'gq_title' => $this->input->post('qname'),
            'gq_description' => $this->input->post('descripton')
        );
        $this->db->where(array('gq_id' => $id));
        $this->db->update($this->tbl_general_questions, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function delete_diagnosistreatment($id = "") {
        $this->db->where(array('gq_id' => $id));
        $this->db->delete($this->tbl_general_questions);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false; 
        }
    }

}
