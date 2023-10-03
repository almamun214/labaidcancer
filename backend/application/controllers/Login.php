<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author AFRAKIB
 */
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run()===false){
            $this->load->view('Login');
        } else {
            $result=$this->db->get_where('admin_logins',array('a_user'=> $this->input->post('username'),'a_pass'=> md5($this->input->post('password'))))->row_array();
            if(!empty($result)){
                 $this->session->set_userdata((array) $result);
                 if($this->session->userdata('a_rule') == 1){
                    redirect(base_url().'dashboard/index');
                 }
                 if($this->session->userdata('a_rule') == 2|$this->session->userdata('a_rule') == 3|$this->session->userdata('a_rule') == 4 |$this->session->userdata('a_rule') == 5){
                    redirect(base_url().'appointment/pending_appointment');
                }
                 
            }else{
                $this->session->set_flashdata('msg','Username Or Password Wrong');
                redirect('user/login');
            }
        }
        
        
    }

}
