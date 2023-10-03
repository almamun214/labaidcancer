<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ambulance
 *
 * @author AFRAKIB
 */
class Ambulance extends CI_Controller {

    function __construct() {
        parent::__construct();
           $this->load->model('ambulance_model', 'abm');
    }

    function addambulance() {
        $data['body'] = 'Ambulance/Add_ambulance';
        $data['pagehead'] = "Add New Ambulance";

        $this->form_validation->set_rules('vehicle_no', 'Vehicle Number', 'required|strip_tags|max_length[100]');
        $this->form_validation->set_rules('driver_name', 'Driver Name', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('driver_nid', 'Driver NID', 'required|strip_tags|max_length[100]');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|strip_tags|is_natural|max_length[15]');

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->abm->Add_ambulance();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('ambulance/addambulance');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
    
    function amblulancelist(){
        $data['body'] = 'Ambulance/Amblulance_list';
        $data['pagehead'] = "Ambulance List";
        $data['ambulance_list']= $this->abm->ambulance_list();
        $this->tpl->admin($data);
    }

    
    function updateambulance($id="") {
        $data['body'] = 'Ambulance/Update_ambulance';
        $data['pagehead'] = "Update Ambulance";
        $data['ambulance']= $this->abm->ambulance_by_id($id);
        
        $this->form_validation->set_rules('vehicle_no', 'Vehicle Number', 'required|strip_tags|max_length[100]');
        $this->form_validation->set_rules('driver_name', 'Driver Name', 'required|strip_tags|max_length[200]');
        $this->form_validation->set_rules('driver_nid', 'Driver NID', 'required|strip_tags|max_length[100]');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|strip_tags|is_natural|max_length[15]');

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->abm->update_ambulance($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Updated');
                redirect('ambulance/amblulancelist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
}
