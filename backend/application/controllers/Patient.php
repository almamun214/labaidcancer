<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Patient
 *
 * @author AFRAKIB
 */
class Patient extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('patient_model', 'penm');
        $this->load->model('doctors_model', 'dm');
    }

    function addpatient() {

        $data['body'] = 'Patient/add_patient';
        $data['pagehead'] = "Add New Patient";


        $this->form_validation->set_rules('p_name', 'Patient Name', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('p_phone', 'Patient Phone', 'required|strip_tags|is_unique[patient.p_phone]|is_natural');
        $this->form_validation->set_rules('p_email', 'Patient Email', 'strip_tags|is_unique[patient.p_email]|max_length[200]');
        $this->form_validation->set_rules('d_gender', 'Patient Gender', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('p_address', 'Patient Address', 'required|strip_tags|max_length[240]');

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->penm->add_patient();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('patient/addpatient');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function Patientstestimonial() {


        $data['body'] = 'Patient/add_testimonial';
        $data['pagehead'] = "Add New Testimonial";
        $data['department'] = $this->dm->departmentList();


        $this->form_validation->set_rules('p_name', 'Patient Name', 'required|strip_tags|max_length[100]');
        $this->form_validation->set_rules('department', 'Department', 'required|strip_tags');
        $this->form_validation->set_rules('p_message', 'Patient Message', 'strip_tags|max_length[115]');

        $config['upload_path'] = './uploads/testimonial/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 100;
        $config['max_height'] = 100;
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
                    $filename = 'uploads/testimonial/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = 'asset/images/noimage.png';
            }

            $result = $this->penm->Patientstestimonial($filename);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('patient/patientstestimonial');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function testimoniallist() { 
        $data['body'] = 'Patient/testimonial_list';
        $data['pagehead'] = "Testimonial List";
        $data['testimonial'] = $this->penm->testimonial_list();
        $this->tpl->admin($data);
    }

    function updateamtestimonial($id="") {


        $data['body'] = 'Patient/update_testimonial';
        $data['pagehead'] = "Update Testimonial";
        $data['department'] = $this->dm->departmentList();
        $data['testo']=$this->penm->testimonial_single($id);


        $this->form_validation->set_rules('p_name', 'Patient Name', 'required|strip_tags|max_length[100]');
        $this->form_validation->set_rules('department', 'Department', 'required|strip_tags');
        $this->form_validation->set_rules('p_message', 'Patient Message', 'strip_tags|max_length[115]');

        $config['upload_path'] = './uploads/testimonial/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 500;
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
                    $filename = 'uploads/testimonial/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = 'asset/images/noimage.png';
            }

            $result = $this->penm->update_testimonial($filename,$id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('patient/testimoniallist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
    function deleteamtestimonial($id=""){
        
        $result=$this->penm->deleteamtestimonial($id);
       
        if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Deleted');
                redirect('patient/testimoniallist');
            } else {
                 $this->session->set_flashdata('msg', 'Not Deleted');
                redirect('patient/testimoniallist');
            }
    }
    
}
