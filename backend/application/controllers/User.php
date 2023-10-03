<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author AFRAKIB
 */
class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    function Createuser() {
        $data['body'] = 'User/create_user';
        $data['pagehead'] = "Add New User";

        $this->form_validation->set_rules('fname', 'Full Name', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|strip_tags|max_length[200]|is_unique[admin_logins.a_user]');
        $this->form_validation->set_rules('pass', 'Password', 'required|strip_tags|max_length[200]');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->user_model->create_user();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('user/createuser');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function userlist() {
        $data['body'] = 'User/user_list';
        $data['pagehead'] = "User List";
        $data['list'] = $this->user_model->user_list();
        $this->tpl->admin($data);
    }

    function delete_user($id) {
        $result = $this->user_model->delete_user($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('user/userlist');
        } else {
            $this->session->set_flashdata('msg', 'Not Delete Yet');
            redirect('user/userlist');
        }
    }

    function changepass() {
        $data['body'] = 'User/change_pass';
        $data['pagehead'] = "Update Password";

        $this->form_validation->set_rules('oldpass', 'Old password', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('newpass', 'New Password', 'required|strip_tags|max_length[200]');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->user_model->change_pass();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                $this->session->sess_destroy();
                redirect('home/login');
            } else {
                $this->session->set_flashdata('msg', 'Password Not Changed');
                redirect('user/changepass');
            }
        }
    }

    function changepass_admin($id = "") {
        $result = $this->user_model->change_pass_admin($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully updated to : 123456');
            redirect('user/userlist');
        } else {
            $this->session->set_flashdata('msg', 'Password Not Changed');
            redirect('user/userlist');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('home/login');
    }

}
