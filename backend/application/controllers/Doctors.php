<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Doctors
 *
 * @author Rakib
 */
class Doctors extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('doctors_model', 'dm');
    }

//this function is created for add new department on this hospital software
    function adddepartment() {
        $data['body'] = 'Doctors/add_department';
        $data['pagehead'] = "Add Department";

        $this->form_validation->set_rules('dpname', 'Department Name', 'required|strip_tags');
        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->dm->Add_department();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('doctors/adddepartment');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function departmentlist() {
        $data['body'] = 'Doctors/department_list';
        $data['pagehead'] = "Department List";
        $data['department'] = $this->dm->departmentList();
        $this->tpl->admin($data);
    }
    
    function delete_department($id) {
        $result = $this->dm->delete_department($id);
        if ($result['status'] == true) {
            $this->session->set_flashdata('msg', $result['msg']);
            redirect('doctors/departmentlist');
        } else {
            $this->session->set_flashdata('msg', $result['msg']);
            redirect('doctors/departmentlist');
        }
    }

    function Settimeschedule() {
        $data['body'] = 'Doctors/Settimeschedule';
        $data['pagehead'] = "Set Time Schedule";
        $data['department'] = $this->dm->departmentList();
        $this->tpl->admin($data);
    }

    function updatedepartment($id = "") {
        $data['body'] = 'Doctors/update_department';
        $data['pagehead'] = "Add Department";
        $data['department'] = $this->dm->department_by_id($id);

        $this->form_validation->set_rules('dpname', 'Department Name', 'required|strip_tags');
        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->dm->update_department($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('doctors/departmentlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    //this function is created to add new doctor in this hospital 
    function adddoctor() {
        $data['body'] = 'Doctors/Add_doctor';
        $data['pagehead'] = "Add Doctor";
        $data['department'] = $this->dm->departmentList();

        $this->form_validation->set_rules('fullname', 'Full Name', 'required|max_length[100]');
        $this->form_validation->set_rules('emailaddress', 'Email Address', 'valid_email|strip_tags|is_unique[doctors.d_email]|max_length[200]');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'max_length[255]');
        $this->form_validation->set_rules('address', 'Address', 'strip_tags');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'is_natural');
        $this->form_validation->set_rules('career_title', 'Career Title', 'max_length[200]');
        $this->form_validation->set_rules('short_biography', 'Short Biography', 'max_length[10000]');
        $this->form_validation->set_rules('education', 'Education', 'max_length[1000]');
        $this->form_validation->set_rules('keyword', 'Keyword', 'max_length[100]');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'max_length[160]');

        $config['upload_path'] = './uploads/doctor/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            if (!$this->upload->do_upload('picture')) {
                $data['upload_errors'] = $this->upload->display_errors();

                $this->tpl->admin($data);
            } else {
                $filename = 'uploads/doctor/' . $this->upload->data('file_name');

                $result = $this->dm->Add_doctor($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('doctors/adddoctor');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function updatedoctor($id = "") {
        $data['body'] = 'Doctors/update_doctor';
        $data['pagehead'] = "Add Doctor";
        $data['department'] = $this->dm->departmentList();
        $data['doctor'] = $this->dm->single_doctor($id);

        $this->form_validation->set_rules('fullname', 'Full Name', 'required|max_length[100]');
        $this->form_validation->set_rules('emailaddress', 'Email Address', 'valid_email|strip_tags|max_length[200]');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'max_length[255]');
        $this->form_validation->set_rules('address', 'Address', 'strip_tags');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'is_natural');
        $this->form_validation->set_rules('career_title', 'Career Title', 'max_length[200]');
        $this->form_validation->set_rules('short_biography', 'Short Biography', 'max_length[10000]');
        $this->form_validation->set_rules('education', 'Education', 'max_length[1000]');
        $this->form_validation->set_rules('keyword', 'Keyword', 'max_length[100]');
        $this->form_validation->set_rules('metadata', 'Meta Description', 'max_length[160]');

        $config['upload_path'] = './uploads/doctor/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;
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
                    $filename = 'uploads/doctor/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->dm->update_doctor($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('doctors/doctorslist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    //This function is created to show only doctor list page without any data
    function doctorslist() {
        $data['body'] = 'Doctors/Doctors_list';
        $data['pagehead'] = "Doctors List";
        $data['department'] = $this->dm->departmentList();
        $data['doctor']=$this->dm->all_doctor_random();
        $this->tpl->admin($data);
    }

    
    function delete_doctor($id) {
        $result = $this->dm->delete_doctor($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('doctors/doctorslist');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('doctors/doctorslist');
        }
    }
    
    function speciality($id = "") {
        $data['body'] = 'Doctors/speciality';
        $data['pagehead'] = "Specialist On";
        $data['doctor'] = $this->dm->single_doctor($id);
        $this->tpl->admin($data);
    }
    
    function working_hour($id = "") {
        $data['body'] = 'Doctors/working_hour';
        $data['pagehead'] = "Working Hour";
        $data['doctor'] = $this->dm->single_doctor($id);
        $data['time_chart']= $this->dm->time_chart();
        $data['working_days']= $this->dm->working_days();
        $this->tpl->admin($data);
    }
    
    function addAjaxWorkingHour(){
        $doctor = $this->input->post('doctor');
        $day = $this->input->post('day');
        $timefrom = $this->input->post('timefrom');
        $timeto = $this->input->post('timeto');
        $result = $this->dm->addAjaxWorkingHour($doctor, $day,$timefrom,$timeto);
        echo json_encode($result);
    }
    
    function displayDataWorkingHour(){
        $doctor = $this->input->post('doctor');
        $result = $this->dm->displayDataWorkingHour($doctor);
        echo json_encode($result);
    }
    
    function removeDataWorkingHour(){
         $id = $this->input->post('id');
        $result = $this->dm->removeDataWorkingHour($id);
        echo json_encode($result);
    }

    //This function is created to get doctor list from ajax calling on doctor list page

    function GetDoctorList() {
        $department = $this->input->post('department');
        $result = $this->dm->doctorBydepartment($department);
        echo json_encode($result);
    }

    function GetCancer() {
        $doctor = 1; //$this->input->post('doctor');
        $result = $this->dm->GetCancerbyDoctor($doctor);
        echo json_encode($result);
    }

    function addAjaxCancer() {
        $doctor = $this->input->post('doctor');
        $Cancer = $this->input->post('Cancer');
        $result = $this->dm->addAjaxCancer($doctor, $Cancer);
        echo json_encode($result);
    }

    function displayDataCancer() {
        $doctor = $this->input->post('doctor');
        $Cancer = $this->input->post('Cancer');
        $result = $this->dm->displayDataCancer($doctor, $Cancer);
        echo json_encode($result);
    }

    function removeDataCancer() {
        $id = $this->input->post('id');

        $result = $this->dm->removeDataCancer($id);
        echo json_encode($result);
    }

}
