<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Department
 *
 * @author AFRAKIB
 */
class Department extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('department_model','dep_mod');
    }
    
     function Adddepartment() {

        $data['body'] = 'Department/Add_department';
        $data['pagehead'] = "Add New Department";
        

        $this->form_validation->set_rules('title', 'Department Name', 'required|strip_tags|max_length[250]');
        $this->form_validation->set_rules('content', 'Content', 'required');

        $config['upload_path'] = './uploads/department/';
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
                $filename = 'uploads/department/' . $this->upload->data('file_name');

                $result = $this->dep_mod->add_department($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('department/adddepartment');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function departmentlist(){ 
        $data['body'] = 'Department/department_list';
        $data['pagehead'] = "Department List";
        $data['department'] = $this->dep_mod->department_list();
        $this->tpl->admin($data);
    }

    function delete_department($id){
        
        $result = $this->dep_mod->delete_department($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('department/departmentlist');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('department/departmentlist');
        }
    }

    function updatedepartment($id="") {

        $data['body'] = 'Department/update_department';
        $data['pagehead'] = "Update Department";
        $data['post'] = $this->dep_mod->department_single($id);

        $this->form_validation->set_rules('title', 'Department Name', 'required|strip_tags|max_length[250]');
        $this->form_validation->set_rules('content', 'Content', 'required');

        $config['upload_path'] = './uploads/department/';
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
                    $filename = 'uploads/department/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->dep_mod->update_department($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('department/departmentlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
}
