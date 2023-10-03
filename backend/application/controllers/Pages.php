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
class Pages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('page_model', 'pmod');
    }

    function headpage() {
        $data['body'] = 'Page/headpage';
        $data['pagehead'] = "Create Pages";


        $this->form_validation->set_rules('title', 'Page Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('department', 'Category', 'required|strip_tags');
        $this->form_validation->set_rules('keyword', 'Keyword', 'strip_tags');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'strip_tags');

        $config['upload_path'] = './uploads/pagepicture/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 3600;
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
                    redirect('page/headpage');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function pagelist() {
        $data['body'] = 'Page/pagelist';
        $data['pagehead'] = "Pages";
        $data['page'] = $this->pmod->pagelist();
        $this->tpl->admin($data);
    }

    function updatepage($id = "") {

        $data['body'] = 'Page/updatepage';
        $data['pagehead'] = "Update Pages";
        $data['singlepage'] = $this->pmod->singlepage($id);


        $this->form_validation->set_rules('title', 'Page Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('department', 'Category', 'required|strip_tags');
        $this->form_validation->set_rules('keyword', 'Keyword', 'strip_tags');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'strip_tags');


        $config['upload_path'] = './uploads/pagepicture/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 3600;
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
                redirect('page/pagelist');
            } else {
                redirect('page/updatepage/'.$id);
            }
        }
    }

}
