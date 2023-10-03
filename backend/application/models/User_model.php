<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_model
 *
 * @author AFRAKIB
 */
class User_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_admin_logins = "admin_logins";

    function create_user() {
        $data = array(
            'a_name' => $this->input->post('fname'),
            'a_user' => $this->input->post('email'),
            'a_pass' => md5($this->input->post('pass')),
            'a_rule' => 2
        );
        $this->db->insert($this->tbl_admin_logins, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function user_list() {
        return $this->db->get($this->tbl_admin_logins)->result();
    }

    function delete_user($id) {
        $this->db->where(array('a_id' => $id));
        $this->db->delete($this->tbl_admin_logins);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function change_pass(){
        $user=$this->session->userdata('a_user');
        
        $check=$this->db->get_where($this->tbl_admin_logins,array('a_user'=> $user,'a_pass'=> md5($this->input->post('oldpass'))))->row_array();
        if(empty($check)){
            return false;
        }
        $data = array(
           
            'a_pass' => md5($this->input->post('newpass'))
            
        );
        $this->db->where(array('a_user'=>$user));
        $this->db->update($this->tbl_admin_logins, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function change_pass_admin($id){
     
        $data = array(
           
            'a_pass' => md5('123456')
            
        );
        $this->db->where(array('a_id'=>$id));
        $this->db->update($this->tbl_admin_logins, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
