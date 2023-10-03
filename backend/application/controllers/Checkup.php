<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Checkup
 *
 * @author AFRAKIB
 */
class Checkup extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('checkup_model', 'chm');
    }

    function testname() {
        $data['body'] = 'Checkup/add_test_name';
        $data['pagehead'] = "Test Name";
        $data['chcat'] = $this->chm->category_list();

        $this->form_validation->set_rules('testname', 'Test Name', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('description', 'Test Description', 'strip_tags|max_length[200]');
        $this->form_validation->set_rules('category', 'Category', 'required|strip_tags');
        $this->form_validation->set_rules('testprice', 'Test Price', 'strip_tags');

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->chm->add_test_name();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('checkup/testname');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function testlist() {
        $data['body'] = 'Checkup/test_list';
        $data['pagehead'] = "Test List";
        $data['test'] = $this->chm->test_list();
        $this->tpl->admin($data);
    }

    function delete_checkup($id = "") {
        $result = $this->chm->delete_checkup($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('checkup/testlist');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('checkup/testlist');
        }
    }
    
    function delete_category($id=""){
        
        $result =  $this->chm->delete_category($id);
        if ($result['status'] == true) {
            $this->session->set_flashdata('msg', $result['msg']);
            redirect('checkup/categorytlist');
        } else {
            $this->session->set_flashdata('msg', $result['msg']);
            redirect('checkup/categorytlist');
        }
    }

    function updatetest($id = "") {
        $data['body'] = 'Checkup/update_test';
        $data['pagehead'] = "Test Name";
        $data['test'] = $this->chm->testname_by_id($id);
        $data['chcat'] = $this->chm->category_list();

        $this->form_validation->set_rules('testname', 'Test Name', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('description', 'Test Description', 'strip_tags');
        $this->form_validation->set_rules('testprice', 'Test Price', 'required|strip_tags');

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->chm->update_test($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('checkup/testlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    /* Category Sectin started */

    function categoryname() {
        $data['body'] = 'Checkup/category_name';
        $data['pagehead'] = "Test Category Name";


        $this->form_validation->set_rules('testname', 'Test Name', 'required|strip_tags|max_length[200]');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->chm->add_categoryname();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('checkup/categoryname');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function categorytlist() {
        $data['body'] = 'Checkup/category_list';
        $data['pagehead'] = "Category List";
        $data['test'] = $this->chm->category_list();
        $this->tpl->admin($data);
    }

    function updatecategory($id = "") {
        $data['body'] = 'Checkup/update_category';
        $data['pagehead'] = "Test Category Name";
        $data['test'] = $this->chm->category_single($id);


        $this->form_validation->set_rules('testname', 'Test Name', 'required|strip_tags|max_length[200]');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->chm->update_categoryname($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Updated');
                redirect('checkup/categorytlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

}
