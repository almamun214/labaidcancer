<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Department_model
 *
 * @author AFRAKIB
 */
class Department_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_coe_department = "coe_department";

    function add_department($filename) {
        $data = array(
            'dpt_name' => $this->input->post('title'),
            'dpt_description' => $this->input->post('content'),
            'dpt_image' => $filename,
            'dpt_slug' => url_title($this->input->post('title'))
        );
        $this->db->insert($this->tbl_coe_department, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function department_list() {
        return $this->db->get($this->tbl_coe_department)->result();
    }

    function delete_department($id) {
        $result= $this->db->get_where($this->tbl_coe_department,array('dpt_id' => $id))->row_array();
        
        $this->db->where(array('dpt_id' => $id));
        $this->db->delete($this->tbl_coe_department);
        
         unlink($result['dpt_image']);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function department_single($id) {
        return $this->db->get_where($this->tbl_coe_department, array('dpt_id' => $id))->row_array();
    }

    function department_single_slug($id) {
        return $this->db->get_where($this->tbl_coe_department, array('dpt_slug' => $id))->row_array();
    }

    function update_department($filename, $id) {
        $data = array(
            'dpt_name' => $this->input->post('title'),
            'dpt_description' => $this->input->post('content'),
            'dpt_image' => $filename
        );
        $this->db->where(array('dpt_id' => $id));
        $this->db->update($this->tbl_coe_department, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
