<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ComprehensiveCares
 *
 * @author Sagor
 */
class ComprehensiveCares extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('comprehensiveCares_model', 'cc_mod');
    }

    function test() {
        $sql = "";
        $this->db->query($sql);
    }

    function add_comprehensive_care() {


        $data['body'] = 'ComprehensiveCare/add_comprehensive_care';
        $data['pagehead'] = "Add New Comprehensive Care Team";

        $this->form_validation->set_rules('cc_name', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/comprehensive_care/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            if (!$this->upload->do_upload('picture')) {
                $data['upload_errors'] = $this->upload->display_errors();

                $this->tpl->admin($data);
            } else {
                $filename = 'uploads/comprehensive_care/' . $this->upload->data('file_name');

                $result = $this->cc_mod->add_comprehensive_care($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('comprehensiveCares/add_comprehensive_care');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function comprehensive_care_list() {
        $data['body'] = 'ComprehensiveCare/comprehensive_care_list';
        $data['pagehead'] = "Comprehensive Care Tab List";
        $data['gqlist'] = $this->cc_mod->comprehensive_care_list();
        $this->tpl->admin($data);
    }

    function comprehensive_care_update($id = "") {


        $data['body'] = 'ComprehensiveCare/comprehensive_care_update';
        $data['pagehead'] = "Update Comprehensive Care";
        $data['gq'] = $this->cc_mod->single_comprehensive_care($id);

        $this->form_validation->set_rules('cc_name', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/comprehensive_care/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 2000;
        $config['max_width'] = 1000;
        $config['max_height'] = 1000;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            if (!empty($_FILES['picture']['tmp_name'])) {
                if (!$this->upload->do_upload('picture')) {
                    $data['upload_errors'] = $this->upload->display_errors();

                    $this->tpl->admin($data);
                } else {
                    $filename = 'uploads/comprehensive_care/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->cc_mod->update_comprehensive_care($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Update');
                redirect('comprehensiveCares/comprehensive_care_list');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function comprehensive_care_delete($id) {
        $result = $this->cc_mod->delete_comprehensive_care($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('comprehensiveCares/comprehensive_care_list');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('comprehensiveCares/comprehensive_care_list');
        }
    }

   

}
