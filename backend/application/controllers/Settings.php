<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Settings
 *
 * @author AFRAKIB
 */
class Settings extends CI_Controller {

    function __construct() {
        ob_start();
        parent::__construct();
        $this->load->model('settings_model');
    }

    function addhomeservcie() {

        $data['body'] = 'Settings/add_home_service';
        $data['pagehead'] = "Add New Service";

        $this->form_validation->set_rules('hs_icon', 'Icon', 'required|strip_tags|max_length[50]');
        $this->form_validation->set_rules('hs_name', 'Name', 'required|strip_tags|max_length[50]');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->settings_model->addhomeservcie();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('settings/addhomeservcie');
            } else {
                $this->tpl->admin($data);
            }
        }
    }

    function homeservicelist() {
        $data['body'] = 'Settings/home_service_list';
        $data['pagehead'] = "Add New Service";
        $data['list'] = $this->settings_model->homeservice_list();
        $this->tpl->admin($data);
    }

    function updateservice($id = "") {

        $data['body'] = 'Settings/update_home_service';
        $data['pagehead'] = "Update Service";
        $data['single'] = $this->settings_model->single_home_service($id);

        $this->form_validation->set_rules('hs_icon', 'Icon', 'required|strip_tags|max_length[50]');
        $this->form_validation->set_rules('hs_name', 'Name', 'required|strip_tags|max_length[50]');


        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->settings_model->update_service($id);
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('settings/homeservicelist');
            } else {
                $this->session->set_flashdata('msg', 'Not Update Yet');
                redirect('settings/homeservicelist');
            }
        }
    }

    function deleteservice($id = "") {
        $result = $this->settings_model->deleteservice($id);
        if ($result == true) {
            $this->session->set_flashdata('msg', 'Successfully Deleted');
            redirect('settings/homeservicelist');
        } else {
            $this->session->set_flashdata('msg', 'Not Delete Yet');
            redirect('settings/homeservicelist');
        }
    }

    
    
    function updatesitesetting() {

        $data['body'] = 'Settings/update_site_setting';
        $data['pagehead'] = "Update Site Setting";
        $data['single'] = $this->glob_model->updatesitesetting_data();

        $this->form_validation->set_rules('ss_hotline', 'Hotline', 'strip_tags|max_length[50]');
        $this->form_validation->set_rules('ss_emargency', 'Emergency', 'strip_tags|max_length[50]');
        $this->form_validation->set_rules('ss_email', 'Email', 'strip_tags|max_length[100]');
        $this->form_validation->set_rules('Facebook', 'Facebook', 'max_length[200]');
        $this->form_validation->set_rules('Twitter', 'Twitter', 'max_length[200]');
        $this->form_validation->set_rules('Linkedin', 'Linkedin', 'max_length[200]');
        $this->form_validation->set_rules('Youtube', 'Youtube', 'max_length[200]');        
       

        if ($this->form_validation->run() === false) {
            $this->tpl->admin($data);
        } else {
            $result = $this->settings_model->updatesitesetting();
            if ($result == true) {
                $this->session->set_flashdata('msg', 'Successfully Added');
                redirect('settings/updatesitesetting');
            } else {
                $this->session->set_flashdata('msg', 'Not Update Yet');
                redirect('settings/updatesitesetting');
            }
        }
    }
    
/* Subscription*/

    function addsubscriber()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|strip_tags|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|strip_tags|max_length[200]');


        if ($this->form_validation->run() === false) {
            echo json_encode(false);
        } else {
            $data = array(

                'sb_name' => $this->input->post('name'),
                'sb_email' => $this->input->post('email'),
                'sb_date' => date('Y-m-d')
            );

            $this->db->insert('subscribers', $data);
            if ($this->db->affected_rows() > 0) {
                echo json_encode(true);
            } else {
                echo json_encode(false);
            }
        }
    }

    function list()
    {
        $data['body'] = 'subscribe/subcribers';
        $data['pagehead'] = "Subscribers";
        $data['result'] = $this->db->get('subscribers')->result();
        $this->tpl->admin($data);
    }

    function campaign()
    {
        $data['body'] = 'subscribe/campaign';
        $data['pagehead'] = "Campaign";
        $this->tpl->admin($data);
    }

    function runcampaign()
    {
        $result = $this->db->get('subscribers')->result();
        $sendTo = array();
        foreach ($result as $key) {
            $sendTo[] = $key->sb_email;
        }
        $this->load->library('email');
        $this->email->clear(TRUE); //any attachments in loop will be cleared.
        $this->email->from('no-reply@labaidcancer.com', 'Labaid Cancer Hospital and Super Speciality Center');
        $this->email->to($sendTo);
        $this->email->subject($_POST['Subject']);
        $this->email->message($_POST['Message']);
        //Check if there is an attachment
        if ($_FILES['attachfile']['name'] != '' && $_FILES['attachfile']['size'] > 0) {
            $attach_path = $_FILES['attachfile']['tmp_name'];
            $attach_name = $_FILES['attachfile']['name'];
            $this->email->attach($attach_path, 'attachment', $attach_name);
        }
        if ($this->email->send()) {
            $this->session->set_flashdata('msg', 'Successfully Email Send');
            redirect('subscriber/campaign');
        } else {
            $this->session->set_flashdata('msg', 'Please Check and Try');
            redirect('subscriber/campaign');
        }
    }
    
     function careermail()
    {
        $message="I am ".$_POST['nsname']." ";
        $message .="Phone Number: ".$_POST['nsmobile']." ";
        $message .="Email : ".$_POST['nsemail']." ";
        
        $this->load->library('email');
        $this->email->clear(TRUE); //any attachments in loop will be cleared.
        $this->email->from('no-reply@labaidcancer.com', 'Labaid Cancer Hospital and Super Speciality Center');
        $this->email->to('career@labaidcancer.com');
        $this->email->subject($_POST['Subject']);
        $this->email->message($message);
        //Check if there is an attachment
        if ($_FILES['attachfile']['name'] != '' && $_FILES['attachfile']['size'] > 0) {
            $attach_path = $_FILES['attachfile']['tmp_name'];
            $attach_name = $_FILES['attachfile']['name'];
            $this->email->attach($attach_path, 'attachment', $attach_name);
        }
        if ($this->email->send()) {
           echo "<script>alert('Successfully submited');</script>";
           header("Location:". $_SERVER['HTTP_REFERER']);
        } else {
           echo "<script>alert('Error found');</script>";
           header("Location:". $_SERVER['HTTP_REFERER']);
        }
    }
    
}
