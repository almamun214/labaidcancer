<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Appointment
 *
 * @author AFRAKIB
 */
class Appointment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('doctors_model', 'dm');
        $this->load->model('patient_model', 'penm');
    }

    function Addappointment() {

        $data['body'] = 'Appointment/Add_appointment';
        $data['pagehead'] = "Add Appointment";
        $data['department'] = $this->dm->departmentList();

        $this->form_validation->set_rules('roomname', 'Room Name', 'required|strip_tags|max_length[50]');
        $this->form_validation->set_rules('description', 'Description', 'strip_tags');
        $this->form_validation->set_rules('bedlimit', 'Bed Limit', 'required|strip_tags|is_natural|max_length[3]');
        $this->form_validation->set_rules('costbed', 'Cost Per Bed', 'required|strip_tags|max_length[11]');

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->bedm->Add_room();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('bed/addroom');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function pending_appointment() {
        $data['body'] = 'Appointment/Pending_appointment';
        $data['pagehead'] = "Appointment";
        $data['apoint'] = $this->penm->pending_appointment();
        
        $this->tpl->admin($data);
    }

    function appointment_details($id = "") {
        $data['body'] = 'Appointment/appointment_details';
        $data['pagehead'] = "Appointment";
        $data['apoint'] = $this->penm->pending_appointment_single($id);
        $this->tpl->admin($data);
    }

    function complete_appointment($id = "") {

        $result = $this->penm->complete_appointment($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Updated');
            redirect('appointment/pending_appointment');
        } else {
            $this->session->set_flashdata('msg', 'Not Updated Yet');
            redirect('appointment/pending_appointment');
        }
    }
    
    function cancel_appointment($id=""){
         $result = $this->penm->cancel_appointment($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Updated');
            redirect('appointment/pending_appointment');
        } else {
            $this->session->set_flashdata('msg', 'Not Updated Yet');
            redirect('appointment/pending_appointment');
        }
    }
    function test_email(){
        $this->load->view('mailer/form');
    }

    # mailer/myapp/application/controllers/Mailer.php

public function send() {
   
    $this->load->config('email');
        $this->load->library('email');
    
        $from = 'no-reply@myapp.com';
        $to = $this->input->post('to');
    
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject('New email');
    $this->email->message('New email received!');
    
        if ($this->email->send()) {
    echo 'Sent with success!';
        } else {
    show_error($this->email->print_debugger());
    }
    }

}
