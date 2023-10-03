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
class subscriber extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function index(){
        echo "Thsi is sub";
    }

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
}
