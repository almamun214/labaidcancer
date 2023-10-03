<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generalquestions
 *
 * @author AFRAKIB
 */
class Generalquestions extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Generalquestions_model','gq_mod');
    }

    function index() {
        redirect('dashboard/index');
    }

    function addquestion() {

        $data['body'] = 'Generalquestions/addquestion';
        $data['pagehead'] = "Add New Question";

        $this->form_validation->set_rules('qname', 'Question Name', 'required|max_length[200]');
        $this->form_validation->set_rules('descripton', 'Descripton', 'required');
        

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->gq_mod->addquestion();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('generalquestions/addquestion');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
    function questionlist(){
        $data['body'] = 'Generalquestions/question_list';
        $data['pagehead'] = "Question List";
        $data['gqlist']= $this->gq_mod->questionlist();
        $this->tpl->admin($data);
    }
    
    function updatequestion($id=""){
        

        $data['body'] = 'Generalquestions/update_question';
        $data['pagehead'] = "Update Question";
        $data['gq']= $this->gq_mod->single_question($id);
        
        $this->form_validation->set_rules('qname', 'Question Name', 'required|max_length[200]');
        $this->form_validation->set_rules('descripton', 'Descripton', 'required');
        

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->gq_mod->update_question($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('generalquestions/questionlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    /*Diagnosis and Treatment*/
    
    function addDiagnosisTreatment() {

        $data['body'] = 'Generalquestions/add_Diagnosis_Treatment';
        $data['pagehead'] = "Add New Diagnosis and Treatment";

        $this->form_validation->set_rules('qname', 'Question Name', 'required|max_length[200]');
        $this->form_validation->set_rules('descripton', 'Descripton', '');
        

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->gq_mod->addDiagnosisTreatment();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('generalquestions/adddiagnosistreatment');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
    function DiagnosisTreatmentlist(){
        $data['body'] = 'Generalquestions/DiagnosisTreatment_list';
        $data['pagehead'] = "Diagnosis Treatment List";
        $data['gqlist']= $this->gq_mod->DiagnosisTreatmentlist();
        $this->tpl->admin($data);
    }
    
    function updateDiagnosisTreatment($id=""){
        

        $data['body'] = 'Generalquestions/update_DiagnosisTreatment';
        $data['pagehead'] = "Update Question";
        $data['gq']= $this->gq_mod->single_question($id);
        
        $this->form_validation->set_rules('qname', 'Question Name', 'required|max_length[200]');
        $this->form_validation->set_rules('descripton', 'Descripton', '');
        

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {

            $result = $this->gq_mod->update_DiagnosisTreatment($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('generalquestions/diagnosistreatmentlist');
            } else {
                $this->tpl->admin($data);
            }
        }
    }
    
    
    function delete_diagnosistreatment($id=""){
         $result = $this->gq_mod->delete_diagnosistreatment($id="");
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Deleted');
                redirect('generalquestions/diagnosistreatmentlist');
            } else {
                $this->session->set_flashdata('msg', 'Not Deleted');
                redirect('generalquestions/diagnosistreatmentlist'); 
            }
    }
}
