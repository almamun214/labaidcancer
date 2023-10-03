<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menucontrol_model
 *
 * @author AFRAKIB
 */
class Menucontrol_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_about_tab_content = "about_tab_content";
    protected $tbl_page_banners = "page_banners";
    protected $tbl_management_team = "management_team";
    protected $tbl_oporajoyi_tab_content = "oporajoyi_tab_content";

    function page_content_list() {
        return $this->db->get($this->tbl_about_tab_content)->result();
    }
    function oporajoyi_content_list() {
        return $this->db->get($this->tbl_oporajoyi_tab_content)->result();
    }

    function page_header_list() {
        return $this->db->get($this->tbl_page_banners)->result();
    }

    function single_page_content($id) {
        return $this->db->get_where($this->tbl_about_tab_content, array('ab_id' => $id))->row_array();
    }

    function single_page_header($id) {
        return $this->db->get_where($this->tbl_page_banners, array('pgb_id' => $id))->row_array();
    }

    function single_page_content_slug($id) {
        return $this->db->get_where($this->tbl_about_tab_content, array('ab_slug' => $id))->row_array();
    }

    function single_page_header_slug($id) {
        return $this->db->get_where($this->tbl_page_banners, array('pgb_slug' => $id))->row_array();
    }
    function update_pagecontent($id) {
        $data = array(
            'ab_description' => $this->input->post('descripton')
        );
        $this->db->where(array('ab_id' => $id));
        $this->db->update($this->tbl_about_tab_content, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


   // sagor
    function oporsjoyi_page_content($id) {
        return $this->db->get_where($this->tbl_oporajoyi_tab_content, array('op_id' => $id))->row_array();
    }
    // sagor
    function oporsjoyi_page_slug($id) {
        return $this->db->get_where($this->tbl_oporajoyi_tab_content, array('op_slug' => $id))->row_array();
    }
    // sagor
    function update_oporajoyi_pagecontent($id) {
        $data = array(
            'op_description' => $this->input->post('descripton')
        );
        $this->db->where(array('op_id' => $id));
        $this->db->update($this->tbl_oporajoyi_tab_content, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_pageheader($filename, $id) {
        $data = array(
            'pgb_name' => $this->input->post('title'),
            'pgb_description' => $this->input->post('descripton'),
            'pgb_image' => $filename
        );
        $this->db->where(array('pgb_id' => $id));
        $this->db->update($this->tbl_page_banners, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    
    function addManagement($filename) {
        $data = array(
            'mmt_name' => $this->input->post('name'),
            'mmt_description' => $this->input->post('content'),
            'mmt_designation' => $this->input->post('designation'),
            'mmt_order' => $this->input->post('order'),
            'mmt_image' => $filename,
        );
        
        $this->db->insert($this->tbl_management_team, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function management_team_list(){
        $this->db->order_by('mmt_order','asc');
        return $this->db->get($this->tbl_management_team)->result();
    }
    function management_team_single($id){
        return $this->db->get_where($this->tbl_management_team,array('mmt_id'=>$id))->row_array(); 
    }
    
    function update_team($filename, $id) {
        $data = array(
            'mmt_name' => $this->input->post('name'),
            'mmt_description' => $this->input->post('content'),
            'mmt_designation' => $this->input->post('designation'),
            'mmt_order' => $this->input->post('order'),
            'mmt_image' => $filename,
        );
        
        $this->db->where(array('mmt_id'=>$id));
        $this->db->update($this->tbl_management_team, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
     function delete_team($id = "") {
          $this->db->where(array('mmt_id'=>$id));
        $this->db->delete($this->tbl_management_team);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
