<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Settings_model
 *
 * @author AFRAKIB
 */
class Settings_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_home_service = "home_service";
    protected $tbl_site_setting = "site_setting";

    function addhomeservcie() {
        $data = array(
            'hs_icon' => $this->input->post('hs_icon'),
            'hs_name' => $this->input->post('hs_name')
        );

        $this->db->insert($this->tbl_home_service, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function single_home_service($id) {
        return $this->db->get_where($this->tbl_home_service, array('hs_id' => $id))->row_array();
    }

    function homeservice_list() {
        return $this->db->get($this->tbl_home_service)->result();
    }

    function update_service($id) {
        $data = array(
            'hs_icon' => $this->input->post('hs_icon'),
            'hs_name' => $this->input->post('hs_name')
        );

        $this->db->where(array('hs_id' => $id));
        $this->db->update($this->tbl_home_service, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function deleteservice($id) {
        $this->db->where(array('hs_id' => $id));
        $this->db->delete($this->tbl_home_service);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
   
    function updatesitesetting(){
        $social['Youtube']=$this->input->post('Youtube');
        $social['Linkedin']=$this->input->post('Linkedin');
        $social['Twitter']=$this->input->post('Twitter');
        $social['Facebook']=$this->input->post('Facebook');        
        
        $data = array(
            'ss_hotline' => $this->input->post('ss_hotline'),
            'ss_emargency' => $this->input->post('ss_emargency'),
            'ss_email' => $this->input->post('ss_email'),
            'ss_social'=> json_encode($social)
        );

        $this->db->where(array('ss_id' =>1));
        $this->db->update($this->tbl_site_setting, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
