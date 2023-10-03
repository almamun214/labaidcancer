<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Checkup_model
 *
 * @author AFRAKIB
 */
class Checkup_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_checkupName = "checkup_name";
    protected $tbl_checkupCategory = "checkup_category";

    public function add_test_name() {

        $did = $this->db->order_by('ch_aid', 'desc')->limit(1)->get($this->tbl_checkupName)->row_array();
        if (empty($did)) {
            $did = 1;
        } else {
            $did = $did['ch_id'] + 1;
        }

        $data = array(
            'ch_id' => $did,
            'ch_name' => $this->input->post('testname'),
            'ch_short_name' => $this->input->post('description'),
            'ch_price' => $this->input->post('testprice'),
            'ch_category' => $this->input->post('category'),
            'ch_status' => 1,
            'ch_date' => date('Y-m-d')
        );

        $this->db->insert($this->tbl_checkupName, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function test_list() {
        $this->db->join($this->tbl_checkupCategory, "$this->tbl_checkupName.ch_category=$this->tbl_checkupCategory.cc_id");
        $this->db->order_by('ch_category', 'asc');
        return $this->db->get($this->tbl_checkupName)->result();
    }

    public function testname_by_id($param) {
        return $this->db->get_where($this->tbl_checkupName, array('ch_aid' => $param))->row_array();
    }

    function delete_checkup($id) {


        $this->db->trans_begin();

        $this->db->where(array('ch_aid' => $id));
        $this->db->delete($this->tbl_checkupName);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function delete_category($id) {

        $ddid = $this->db->get_where($this->tbl_checkupName, array('ch_category' => $id))->row_array();

        if (!empty($ddid)) {
            $ee['msg'] = 'Remove Test From This Category';
            $ee['status'] = false;
            return $ee;
        }

        $this->db->trans_begin();

        $this->db->where(array('cc_id' => $id));
        $this->db->delete($this->tbl_checkupCategory);


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $ee['msg'] = 'Category Not Deleted';
            $ee['status'] = false;
            return $ee;
        } else {
            $this->db->trans_commit();
            $ee['msg'] = 'Successfully Deleted';
            $ee['status'] = true;
            return $ee;
        }
    }

    public function update_test($id) {


        $data = array(
            'ch_name' => $this->input->post('testname'),
            'ch_short_name' => $this->input->post('description'),
            'ch_price' => $this->input->post('testprice'),
            'ch_category' => $this->input->post('category')
        );

        $this->db->where(array('ch_aid' => $id));
        $this->db->update($this->tbl_checkupName, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function category_list() {
        return $this->db->get($this->tbl_checkupCategory)->result();
    }

    function add_categoryname() {
        $data = array(
            'cc_name' => $this->input->post('testname'),
        );

        $this->db->insert($this->tbl_checkupCategory, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_categoryname($id) {
        $data = array(
            'cc_name' => $this->input->post('testname'),
        );

        $this->db->where(array('cc_id' => $id));
        $this->db->update($this->tbl_checkupCategory, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function category_single($id) {
        return $this->db->get_where($this->tbl_checkupCategory, array('cc_id' => $id))->row_array();
    }

    function findtest() {
        $findtest = $this->input->post('findtest');
        $this->db->join($this->tbl_checkupCategory, "$this->tbl_checkupName.ch_category=$this->tbl_checkupCategory.cc_id");
        $this->db->like('ch_name', $findtest, 'both');
        return $this->db->get($this->tbl_checkupName)->result();
    }

}
