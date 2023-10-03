<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bed
 *
 * @author AFRAKIB
 */
class Bed extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('bed_model', 'bedm');
    }

    function addroom() {
        $data['body'] = 'Bed/Add_room';
        $data['pagehead'] = "Add New Room";
        
        $this->form_validation->set_rules('roomname','Room Name','required|strip_tags|max_length[50]');
        $this->form_validation->set_rules('description','Description','strip_tags');
        $this->form_validation->set_rules('bedlimit','Bed Limit','required|strip_tags|is_natural|max_length[3]');
        $this->form_validation->set_rules('costbed','Cost Per Bed','required|strip_tags|max_length[11]');
        
        if($this->form_validation->run()===false){
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
    
    function roomlist() {
        $data['body'] = 'Bed/room_list';
        $data['pagehead'] = "Room List";
        $data['room']= $this->bedm->roomlist();
        $this->tpl->admin($data);           
    }
    
    function updateroom($id="") {
        $data['body'] = 'Bed/update_room';
        $data['pagehead'] = "Update Room";
        $data['room']=$this->bedm->room_by_id($id);
        
        $this->form_validation->set_rules('roomname','Room Name','required|strip_tags|max_length[50]');
        $this->form_validation->set_rules('description','Description','strip_tags');
        $this->form_validation->set_rules('bedlimit','Bed Limit','required|strip_tags|is_natural|max_length[3]');
        $this->form_validation->set_rules('costbed','Cost Per Bed','required|strip_tags|max_length[11]');
        
        if($this->form_validation->run()===false){
            $this->tpl->admin($data);
        } else {
            $result = $this->bedm->update_room($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Updated');
                redirect('bed/roomlist');
            } else {
                $this->tpl->admin($data);
            }
        }
        
          
    }
    
    /* End of the Room Section */
    
    function addbed() {
        $data['body'] = 'Bed/add_bed';
        $data['pagehead'] = "Add Bed In Room";
        $data['room']= $this->bedm->roomlist();
        
        
        $this->form_validation->set_rules('roomname','Room Name','required|strip_tags|max_length[50]');
        $this->form_validation->set_rules('description','Description','strip_tags');
        $this->form_validation->set_rules('bedlimit','Bed Limit','required|strip_tags|is_natural|max_length[3]');
        if($this->form_validation->run()===false){
            $this->tpl->admin($data); 
        }else{
            $result = $this->bedm->Add_bed();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('bed/addbed');
            } else {
                $this->tpl->admin($data);
            }
        }
        
                  
    }
    
    function bedlist() {
        $data['body'] = 'Bed/bed_list';
        $data['pagehead'] = "Bed List";
        $data['room']= $this->bedm->bed_list();
        
        $this->tpl->admin($data);           
    }
    
    function updatebed($id="") {
        $data['body'] = 'Bed/update_bed';
        $data['pagehead'] = "Add Bed In Room";
        $data['room']= $this->bedm->roomlist();
        $data['bed']= $this->bedm->bed_by_id($id);
        
        
        
        $this->form_validation->set_rules('description','Description','strip_tags');
        $this->form_validation->set_rules('bedlimit','Bed Limit','required|strip_tags|is_natural|max_length[3]');
        if($this->form_validation->run()===false){
            $this->tpl->admin($data); 
        }else{
            $result = $this->bedm->update_bed($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Updated');
                redirect('bed/bedlist');
            } else {
                $this->tpl->admin($data);
            }
        }
        
                  
    }
    
}
