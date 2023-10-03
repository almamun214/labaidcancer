<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Blog
 *
 * @author AFRAKIB
 */
class Blog extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function Addpost() {

        $data['body'] = 'News/Addpost';
        $data['pagehead'] = "Add New Post";

        $this->form_validation->set_rules('roomname', 'Room Name', 'required|strip_tags|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'strip_tags');
        $this->form_validation->set_rules('bedlimit', 'Bed Limit', 'required|strip_tags|is_natural|max_length[3]');
        $this->form_validation->set_rules('costbed', 'Cost Per Bed', 'required|strip_tags|max_length[11]');

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->bedm->Add_room();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('bed/addroom');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

}
