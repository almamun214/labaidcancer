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
class News extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('news_model', 'nem');
    }

    function Addpost() {

        $data['body'] = 'News/Addpost';
        $data['pagehead'] = "Add New Post";
        $data['department'] = $this->nem->blog_category();

        $this->form_validation->set_rules('title', 'News Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('department', 'Blog Category', 'required|strip_tags');
        $this->form_validation->set_rules('keyword', 'Keyword', 'strip_tags');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'strip_tags');


        $config['upload_path'] = './uploads/news/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10000;
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
                $filename = 'uploads/news/' . $this->upload->data('file_name');

                $result = $this->nem->addPost($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('news/addpost');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function listpost() {
        $data['body'] = 'News/list_post';
        $data['pagehead'] = "Post List";
        $data['department'] = $this->nem->blog_category();
        $this->tpl->admin($data);
    }

    function getpost() {
        $department = $this->input->post('department');
        $result = $this->nem->newslist($department);
        echo json_encode($result);
    }

    function updatepost($id) {

        $data['body'] = 'News/update_post';
        $data['pagehead'] = "Update Post";
        $data['department'] = $this->nem->blog_category();
        $data['post'] = $this->nem->singlenews_byid($id);

        $this->form_validation->set_rules('title', 'News Title', 'required|strip_tags|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('department', 'Blog Category', 'required|strip_tags');
        $this->form_validation->set_rules('keyword', 'Keyword', 'strip_tags');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'strip_tags');

        $config['upload_path'] = './uploads/news/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10000;
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
                    $filename = 'uploads/news/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->nem->updatepost($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('news/listpost');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
    function deletepost($id=''){
        $result = $this->nem->deletePost($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Deleted');
                redirect('news/listpost');
            } else {
                $this->tpl->admin($data);
            }
    }

}
