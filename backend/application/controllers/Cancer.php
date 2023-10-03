<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cancer
 *
 * @author AFRAKIB
 */
class Cancer extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('cancer_model', 'canmo');
        $this->load->model('doctors_model', 'dm');
    }

    function addnew() {


        $data['body'] = 'cancer/addnew';
        $data['pagehead'] = "Add Cancer Details";
        $data['department'] = $this->dm->departmentList();

        $this->form_validation->set_rules('title', 'News Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', "");
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('keyword', 'Keyword', 'strip_tags');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'strip_tags');

        $config['upload_path'] = './uploads/cancer/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 400;
        $config['max_height'] = 400;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            if (!$this->upload->do_upload('picture')) {
                $data['upload_errors'] = $this->upload->display_errors();

                $this->tpl->admin($data);
            } else {
                $filename = 'uploads/cancer/' . $this->upload->data('file_name');

                $result = $this->canmo->addnew($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('cancer/addnew');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function cancerlist() {
        $data['body'] = 'cancer/Cancer_list';
        $data['pagehead'] = "Cancer List";
        $data['cancer'] = $this->canmo->all_cancer();
        $this->tpl->admin($data);
    }

    function updatecancer($id = "") {



        $data['body'] = 'cancer/Update_cancer';
        $data['pagehead'] = "Update Cancer Details";
        $data['cancer'] = $this->canmo->single_cancer($id);
        $data['department'] = $this->dm->departmentList();

        $this->form_validation->set_rules('title', 'News Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', '');
        $this->form_validation->set_rules('department', 'Department', 'required');

        $config['upload_path'] = './uploads/cancer/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 600;
        $config['max_height'] = 600;
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
                    $filename = 'uploads/cancer/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->canmo->update_cancer($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('cancer/cancerlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function cancersection($id="") {
        $data['body'] = 'cancer/cancer_section';
        $data['pagehead'] = "Update Cancer Section";
        $this->tpl->admin($data);
    }

    function addSection() {
        $sectionname = $this->input->post('sectionname');
        $Cancerdetails = $this->input->post('Cancerdetails');
        $cnid = $this->input->post('cnid');
        $result = $this->canmo->addSection($sectionname, $Cancerdetails, $cnid);
        echo json_encode($result);
    }

    function displayData() {
        $cnid = $this->input->post('cnid');
        $result = $this->canmo->displayData($cnid);
        echo json_encode($result);
    }

    function removeDataCancer() {
        $id = $this->input->post('id');
        $result = $this->canmo->removeDataCancer($id);
        echo json_encode($result);
    }

}
