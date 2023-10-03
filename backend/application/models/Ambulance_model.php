<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ambulance_model
 *
 * @author AFRAKIB
 */
class Ambulance_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    protected $tbl_ambulance="ambulance";
    
    public function Add_ambulance() {
        $did = $this->db->order_by('ab_aid', 'desc')->limit(1)->get($this->tbl_ambulance)->row_array();
        if (empty($did)) {
            $did = 1;
        } else {
            $did = $did['ab_id'] + 1;
        }

        $data = array(
            'ab_id' => $did,
            'ab_vehicle_no' => $this->input->post('vehicle_no'),
            'ab_driver_name' => $this->input->post('driver_name'),
            'ab_driver_nid' => $this->input->post('driver_nid'),
            'ab_contact' => $this->input->post('contact_no'),
            'ab_date' => date('Y-m-d')
        );

        $this->db->insert($this->tbl_ambulance, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function ambulance_list() {
        return $this->db->get($this->tbl_ambulance)->result();
    }
    
    public function ambulance_by_id($id) {
        return $this->db->get_where($this->tbl_ambulance,array('ab_aid'=>$id))->row_array();
    }
    
    
    public function update_ambulance($id) {
      
        $data = array(
  
            'ab_vehicle_no' => $this->input->post('vehicle_no'),
            'ab_driver_name' => $this->input->post('driver_name'),
            'ab_driver_nid' => $this->input->post('driver_nid'),
            'ab_contact' => $this->input->post('contact_no'),
      
        );

        $this->db->where(array('ab_aid'=>$id));
        $this->db->update($this->tbl_ambulance, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
