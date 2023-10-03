<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Packages
 *
 * @author AFRAKIB
 */
class Packages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('packages_model', 'pkg_mod');
    }

    function test() {
        $sql = "";
        $this->db->query($sql);
    }

    function addpackage() {


        $data['body'] = 'Packages/add_package';
        $data['pagehead'] = "Add New Package";

        $this->form_validation->set_rules('qname', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/package/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
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
                $filename = 'uploads/package/' . $this->upload->data('file_name');

                $result = $this->pkg_mod->add_package($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('packages/addpackage');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function packagelist() {
        $data['body'] = 'Packages/digonostic_package_list';
        $data['pagehead'] = "Package Tab List";
        $data['gqlist'] = $this->pkg_mod->package_list();
        $this->tpl->admin($data);
    }

    function update_package($id = "") {


        $data['body'] = 'Packages/update_package';
        $data['pagehead'] = "Update Question";
        $data['gq'] = $this->pkg_mod->single_package($id);

        $this->form_validation->set_rules('qname', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/package/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
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
                    $filename = 'uploads/package/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->pkg_mod->update_package($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Update');
                redirect('packages/packagelist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function delete_daigonostic_packge($id) {
        $result = $this->pkg_mod->delete_daigonostic_packge($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('packages/packagelist');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('packages/packagelist');
        }
    }

    function addTab($id = '') {

        $data['body'] = 'Packages/addTab';
        $data['pagehead'] = "Add New Tab";
        $this->tpl->admin($data);
    }

    function addTabdata() {
        $sectionname = $this->input->post('sectionname');
        $Cancerdetails = $this->input->post('Cancerdetails');
        $dpm_id = $this->input->post('cnid');
        $result = $this->pkg_mod->addTabdata($sectionname, $Cancerdetails, $dpm_id);
        echo json_encode($result);
    }

    function displayJsonData() {
        $dpm_id = $this->input->post('cnid');
        $result = $this->pkg_mod->package_tablist_json($dpm_id);
        echo json_encode($result);
    }

    function removePackageTab() {
        $id = $this->input->post('id');
        $result = $this->pkg_mod->removePackageTab($id);
        echo json_encode($result);
    }

    /* ======= Patient Query package Section ======= */

    function addpatientpackage() {


        $data['body'] = 'Packages/add_patient_package';
        $data['pagehead'] = "Add New Patient Package";

        $this->form_validation->set_rules('qname', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/package/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
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
                $filename = 'uploads/package/' . $this->upload->data('file_name');

                $result = $this->pkg_mod->add_patient_package($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('packages/addpatientpackage');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function patientpackagelist() {
        $data['body'] = 'Packages/patient_package_list';
        $data['pagehead'] = "Patient Package List";
        $data['gqlist'] = $this->pkg_mod->patient_package_list();
        $this->tpl->admin($data);
    }

    function update_patient_package($id = "") {


        $data['body'] = 'Packages/update_patient_package';
        $data['pagehead'] = "Update Question";
        $data['gq'] = $this->pkg_mod->single_patient_package($id);

        $this->form_validation->set_rules('qname', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/package/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
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
                    $filename = 'uploads/package/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->pkg_mod->update_patient_package($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Update');
                redirect('packages/patientpackagelist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function patient_addtab($id = '') {

        $data['body'] = 'Packages/patient_addtab';
        $data['pagehead'] = "Add New Tab";
        $this->tpl->admin($data);
    }

    function add_patientTabdata() {
        $sectionname = $this->input->post('sectionname');
        $Cancerdetails = $this->input->post('Cancerdetails');
        $dpm_id = $this->input->post('cnid');
        $result = $this->pkg_mod->add_patientTabdata($sectionname, $Cancerdetails, $dpm_id);
        echo json_encode($result);
    }

    function display_patientJsonData() {
        $dpm_id = $this->input->post('cnid');
        $result = $this->pkg_mod->package_patient_tablist_json($dpm_id);
        echo json_encode($result);
    }

    function remove_patientPackageTab() {
        $id = $this->input->post('id');
        $result = $this->pkg_mod->remove_patient_PackageTab($id);
        echo json_encode($result);
    }
    
    
    function patient_delete_package($id=""){
         $result = $this->pkg_mod->patient_delete_package($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('packages/patientpackagelist');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('packages/patientpackagelist');
        }
    }

    /* ============= Service We Offer Section =============== */

    function addserviceoffer() {


        $data['body'] = 'Packages/add_service_offer';
        $data['pagehead'] = "Add New Service";

        $this->form_validation->set_rules('qname', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/package/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
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
                $filename = 'uploads/package/' . $this->upload->data('file_name');

                $result = $this->pkg_mod->add_Service_We_offer($filename);
                if ($result == true) {
                    $this->session->set_flashdata('msg', 'Successfully Added');
                    redirect('packages/addserviceoffer');
                } else {
                    $this->tpl->admin($data);
                }
            }
        }
    }

    function serviceofferlist() {
        $data['body'] = 'Packages/service_offer_list';
        $data['pagehead'] = "Service List";
        $data['gqlist'] = $this->pkg_mod->service_offer_list();
        $this->tpl->admin($data);
    }

    function update_serviceoffer($id = "") {


        $data['body'] = 'Packages/update_service_offer';
        $data['pagehead'] = "Update Question";
        $data['gq'] = $this->pkg_mod->service_offer_single($id);

        $this->form_validation->set_rules('qname', 'Name', 'required|max_length[200]');


        $config['upload_path'] = './uploads/package/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
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
                    $filename = 'uploads/package/' . $this->upload->data('file_name');
                }
            }

            if (empty($filename)) {
                $filename = $this->input->post('oldimg');
            }

            $result = $this->pkg_mod->update_service_offer($filename, $id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Update');
                redirect('packages/serviceofferlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function delete_serviceoffer($id = "") {
        $result = $this->pkg_mod->delete_serviceoffer($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('packages/serviceofferlist');
        } else {
            $this->session->set_flashdata('msg', 'Not Deleted');
            redirect('packages/serviceofferlist');
        }
    }

}
