<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Menucontrol
 *
 * @author AFRAKIB
 */
class Menucontrol extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('menucontrol_model', 'mc_model');
    }

    function page_content_list() {
        $data['body'] = 'Menu_control/page_content_list';
        $data['pagehead'] = "Content List";
        $data['gqlist'] = $this->mc_model->page_content_list();
        $this->tpl->admin($data);
    }


    function update_pagecontent($id = "") {

        $data['body'] = 'Menu_control/update_page_content';
        $data['pagehead'] = "Update Page";
        $data['gq'] = $this->mc_model->single_page_content($id); 


        $this->form_validation->set_rules('descripton', 'Descripton', 'required');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->mc_model->update_pagecontent($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('menucontrol/page_content_list');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    //sagor
    function oporajoyi_content_list() {
        $data['body'] = 'Menu_control/oporajoyi_content_list';
        $data['pagehead'] = "Oporajoyi List";
        $data['gqlist'] = $this->mc_model->oporajoyi_content_list();
        $this->tpl->admin($data);
    }
    //sagor
    function update_oporajoyi_content($id = "") {

        $data['body'] = 'Menu_control/update_oporajoyi_page_content';
        $data['pagehead'] = "Update Page";
        $data['gq'] = $this->mc_model->oporsjoyi_page_content($id);


        $this->form_validation->set_rules('descripton', 'Descripton', 'required');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->mc_model->update_oporajoyi_pagecontent($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('menucontrol/oporajoyi_content_list');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function page_header_list() {
        $data['body'] = 'Menu_control/page_header_list';
        $data['pagehead'] = "Content List";
        $data['gqlist'] = $this->mc_model->page_header_list();
        $this->tpl->admin($data);
    }

    function update_pageheader($id = "") {

        $data['body'] = 'Menu_control/update_header_content';
        $data['pagehead'] = "Update Page Header";
        $data['gq'] = $this->mc_model->single_page_header($id);

        $this->form_validation->set_rules('descripton', 'Descripton', '');
        $this->form_validation->set_rules('title', 'title', 'required');

        $config['upload_path'] = './asset/images/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 2000;
        $config['max_height'] = 500;
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
                    $filename = 'asset/images/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }


            $result = $this->mc_model->update_pageheader($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Updated');
                redirect('menucontrol/page_header_list');
            } else {
                redirect('menucontrol/update_pageheader/'.$id);
            }
        }
    }

    function addManagement() {

        $data['body'] = 'Menu_control/addManagement';
        $data['pagehead'] = "Team Member";


        $this->form_validation->set_rules('name', 'Name', 'required|strip_tags|max_length[250]');
        $this->form_validation->set_rules('designation', 'Designation', 'required|strip_tags|max_length[250]');
        $this->form_validation->set_rules('order', 'Order', 'required|strip_tags|max_length[5]');
        $this->form_validation->set_rules('content', 'Content', '');

        $config['upload_path'] = './uploads/management/';
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
                $filename = 'uploads/management/' . $this->upload->data('file_name');

                $result = $this->mc_model->addManagement($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('menucontrol/addmanagement');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function management_team() {
        $data['body'] = 'Menu_control/management_team';
        $data['pagehead'] = "Management Team List";
        $data['mtl'] = $this->mc_model->management_team_list();
        $this->tpl->admin($data);
    }

    function update_team($id = "") {

        $data['body'] = 'Menu_control/update_team';
        $data['pagehead'] = "Update Team Member";
        $data['mtl'] = $this->mc_model->management_team_single($id); 

        $this->form_validation->set_rules('name', 'Name', 'required|strip_tags|max_length[250]');
        $this->form_validation->set_rules('designation', 'Designation', 'required|strip_tags|max_length[250]');
        $this->form_validation->set_rules('order', 'Order', 'required|strip_tags|max_length[5]');
        $this->form_validation->set_rules('content', 'Content', '');

        $config['upload_path'] = './uploads/management/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 10000;
        $config['max_width'] = 400;
        $config['max_height'] = 400;
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
                    $filename = 'uploads/management/'.$this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->mc_model->update_team($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Update');
                redirect('menucontrol/management_team');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
    function delete_team($id = "") {
         $result = $this->mc_model->delete_team($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Deleted');
                redirect('menucontrol/management_team');
            } else {
                $this->session->set_flashdata('msg', 'Not Deleted');
                redirect('menucontrol/management_team');
            }
    }

}
