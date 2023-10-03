<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page
 *
 * @author AFRAKIB
 */
class Footerpage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('footerpage_model', 'pmod');
    }

    function headpage() {
        $data['body'] = 'Footer_Page/headpage';
        $data['pagehead'] = "Footer Pages";


        $this->form_validation->set_rules('title', 'Page Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('department', 'Category', 'required|strip_tags');
        $this->form_validation->set_rules('keyword', 'Keyword', 'strip_tags');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'strip_tags');

        $config['upload_path'] = './uploads/pagepicture/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 2400;
        $config['max_height'] = 3600;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            if (!$this->upload->do_upload('picture')) {
                $data['upload_errors'] = $this->upload->display_errors();

                $this->tpl->admin($data);
            } else {
                $filename = 'uploads/pagepicture/' . $this->upload->data('file_name');

                $result = $this->pmod->addHeadPage($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('footerpage/headpage');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function pagelist() {
        $data['body'] = 'Footer_Page/pagelist';
        $data['pagehead'] = "Footer Pages";
        $data['page'] = $this->pmod->pagelist();
        $this->tpl->admin($data);
    }

    function delete_footerpage($id=""){
        $result = $this->pmod->delete_footerpage($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('footerpage/pagelist');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('footerpage/pagelist');
        }
    }


    function updatepage($id = "") {

        $data['body'] = 'Footer_Page/updatepage';
        $data['pagehead'] = "Update Footer Pages";
        $data['singlepage'] = $this->pmod->singlepage($id);


        $this->form_validation->set_rules('title', 'Page Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('department', 'Category', 'required|strip_tags');
        $this->form_validation->set_rules('keyword', 'Keyword', 'strip_tags');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'strip_tags');


        $config['upload_path'] = './uploads/pagepicture/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 2400;
        $config['max_height'] = 3600;
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
                    $filename = 'uploads/pagepicture/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->pmod->update_page($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Updated');
                redirect('footerpage/pagelist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

}
