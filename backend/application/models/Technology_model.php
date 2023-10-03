<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ttechnology_model
 *
 * @author AFRAKIB
 */
class Technology_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_technology = "technology";

    function addHeadPage($file_name) {
        $title = $this->input->post('title');
        $data = array(
            'tec_name' => $title,
            'tec_content' => $this->input->post('content'),
            'tec_image' => $file_name,
            'tec_slug' => url_title($title, '-', true)
        );

        $this->db->insert($this->tbl_technology, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_technology($filename, $id) {
        $title = $this->input->post('title');
        $data = array(
            'tec_name' => $title,
            'tec_content' => $this->input->post('content'),
            'tec_image' => $filename
        );

        $this->db->where(array('tec_id' => $id));
        $this->db->update($this->tbl_technology, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function techlist() {
        return $this->db->get($this->tbl_technology)->result();
    }

    function single_tech_id($id) {
        return $this->db->get_where($this->tbl_technology, array('tec_id' => $id))->row_array();
    }

    function single_techlist($id) {
        return $this->db->get_where($this->tbl_technology, array('tec_slug' => $id))->row_array();
    }

    function delete_technology($id = "") {
        $result = $this->db->get_where($this->tbl_technology, array('tec_id' => $id))->row_array();

        $this->db->trans_begin();

        $this->db->where(array('tec_id' => $id));
        $this->db->delete($this->tbl_technology);

        unlink($result['tec_image']);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}
