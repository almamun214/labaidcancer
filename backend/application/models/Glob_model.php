<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Glob_model
 *
 * @author AFRAKIB
 */
class Glob_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_site_setting = "site_setting";
    protected $tbl_footer_page = "footer_page";
    protected $tbl_department = 'doctor_department';
    protected $tbl_doctors = "doctors";
    protected $tbl_checkupName = "checkup_name";
    protected $tbl_checkupCategory = "checkup_category";
    protected $tbl_blog = 'blog';
    protected $tbl_blog_category = 'blog_category';
    protected $tbl_technology = "technology";
    protected $tbl_cancer = "cancer";

    function updatesitesetting_data() {
        return $this->db->get_where($this->tbl_site_setting, array('ss_id' => 1))->row_array();
    }

    function f_pagelist() {
        $this->db->group_by('pg_category', 'asc');
        return $this->db->get($this->tbl_footer_page)->result();
    }

    function f_singlepage($slug) {
        return $this->db->get_where($this->tbl_footer_page, array('pg_slug' => $slug))->row_array();
    }

    function advancesearch() {
        $input = $this->input->post('ads');
        $search = array();
        if (isset($input)) {

            $this->db->join($this->tbl_department, "$this->tbl_doctors.d_department=$this->tbl_department.dd_id");
            $this->db->like('d_name', $input, 'both');
            $search['doctor'] = $this->db->get($this->tbl_doctors)->result();

            $this->db->join($this->tbl_checkupCategory, "$this->tbl_checkupName.ch_category=$this->tbl_checkupCategory.cc_id");
            $this->db->like('ch_name', $input, 'both');
            $search['test'] = $this->db->get($this->tbl_checkupName)->result();


            $this->db->like('bl_title', $input, 'both');
            $search['blog'] = $this->db->get($this->tbl_blog)->result();

            $this->db->like('cn_name', $input, 'both');
            $search['cancer'] = $this->db->get($this->tbl_cancer)->result();

            return $search;
        } else {
            $search = array();
        }
    }

    function dashboard_data() {
        $data['media'] = $this->db->get($this->tbl_blog)->num_rows();
        $data['drcat'] = $this->db->get($this->tbl_department)->num_rows();
        $data['total_doc'] = $this->db->get($this->tbl_doctors)->num_rows();
        $data['total_test'] = $this->db->get($this->tbl_checkupName)->num_rows();
        $data['total_tech'] = $this->db->get($this->tbl_technology)->num_rows();
        return $data;
    }

}
