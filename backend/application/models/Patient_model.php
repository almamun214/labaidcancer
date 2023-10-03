<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Patient_model
 *
 * @author AFRAKIB
 */
class Patient_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_patient = "patient";
    protected $tbl_appointment = "appointment";
    protected $tbl_doctors = "doctors";
    protected $tbl_department = 'doctor_department';
    protected $tbl_patients_testimonial = "patients_testimonial";
    protected $tbl_districts = 'districts';
    protected $tbl_admin_logins = 'admin_logins';

    public function add_patient() {
        $did = $this->db->order_by('p_aid', 'desc')->limit(1)->get($this->tbl_patient)->row_array();
        if (empty($did)) {
            $did = 1;
        } else {
            $did = $did['p_id'] + 1;
        }


        $data = array(
            'p_id' => $did,
            'p_name' => $this->input->post('p_name'),
            'p_email' => $this->input->post('p_email'),
            'p_phone' => $this->input->post('p_phone'),
            'p_alt_phone' => $this->input->post('p_alt_phone'),
            'p_address' => $this->input->post('p_address'),
            'd_gender' => $this->input->post('d_gender'),
            'p_blood_group' => $this->input->post('p_blood_group'),
            'p_date_of_birth' => $this->input->post('p_date_of_birth'),
            'p_create_date' => date('Y-m-d'),
            'p_status' => 1,
            'p_user_role' => 2
        );
        $this->db->insert($this->tbl_patient, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function patient_appointment() {

        $this->db->trans_begin();

        // $did = $this->db->order_by('p_aid', 'desc')->limit(1)->get($this->tbl_patient)->row_array();
        // if (empty($did)) {
        //     $did = 1;
        // } else {
        //     $did = $did['p_id'] + 1;
        // }


        // $patientData = array(
        //     'p_id' => $did,
        //     'p_name' => $this->input->post('name'),
        //     'p_email' => $this->input->post('email'),
        //     'p_password' => md5($this->input->post('password')),
        //     'p_phone' => $this->input->post('phone'),
        //     'p_address' => $this->input->post('address'),
        //     'd_gender' => $this->input->post('gender'),
        //     'p_date_of_birth' => $this->input->post('dob'),
        //     'p_create_date' => date('Y-m-d'),
        //     'p_status' => 1,
        //     'p_user_role' => 2
            
        // );

        $appointData = array(
            // 'patient_id' => $did,
            // 'department_id' => $this->input->post('department'),
            'district_id' => $this->input->post('district'),
            'remarks' => $this->input->post('remarks'),
            'doctor_id' => $this->input->post('doctor'),
            'appointment_date' => $this->input->post('booking_date'),
            'confirm_appointment_date' => '0000-00-00 00:00:00',
            'create_date' => date('Y-m-d'),
            'status' => 1,
            'p_name' => $this->input->post('name'),
            'p_email' => $this->input->post('email'),
            'p_gender' =>  $this->input->post('gender'),
            'phone' => $this->input->post('phone'),
            'dob' => $this->input->post('dob'),
            

        );

        // $this->db->insert($this->tbl_patient, $patientData);
        $this->db->insert($this->tbl_appointment, $appointData);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();

            return true;
        }
    }

    function pending_appointment() {


        // $this->db->join($this->tbl_doctors, "$this->tbl_appointment.doctor_id=$this->tbl_doctors.d_id");
        // $this->db->join($this->tbl_patient, "$this->tbl_appointment.patient_id=$this->tbl_patient.p_id");
        $this->db->join($this->tbl_doctors, "$this->tbl_appointment.doctor_id=$this->tbl_doctors.d_id");
        $this->db->join($this->tbl_districts, "$this->tbl_appointment.district_id=$this->tbl_districts.id");
        $this->db->join($this->tbl_admin_logins, "$this->tbl_appointment.updated_by=$this->tbl_admin_logins.a_id","left");
        return $this->db->get_where($this->tbl_appointment)->result();
    }

    function pending_appointment_single($id) {
        $this->db->join($this->tbl_doctors, "$this->tbl_appointment.doctor_id=$this->tbl_doctors.d_id");
        // $this->db->join($this->tbl_patient, "$this->tbl_appointment.patient_id=$this->tbl_patient.p_id");
        $this->db->join($this->tbl_districts, "$this->tbl_appointment.district_id=$this->tbl_districts.id");

        return $this->db->get_where($this->tbl_appointment, array('appointment_id' => $id))->row_array();
    }

    function complete_appointment($id) {
        
        $data = array(
            'status' => $this->input->post('status'),
            'serial_no' => $this->input->post('serial_no'),
            'confirm_appointment_date' => $this->input->post('confirm_appointment_date'),
            'appointment_time' => $this->input->post('confirm_appointment_time'),
            'note' => $this->input->post('note'),
            'updated_by' => $this->session->userdata('a_id')

        );
        $this->db->where(array('appointment_id' => $id));
        $this->db->update($this->tbl_appointment,$data);
        if($this->input->post('status')==2){
            $subject = "Appointment Confirmation";
            $to = $this->input->post('email');
            $name = $this->input->post('name');
            $message = $this->input->post('message');
            $phone = $this->input->post('phone');
            $this->SendEmail($subject, $to, $name, $message, $phone);

        }
        
        if($this->input->post('status')==3){
            $subject = "Your Appointment has Canceled";
            $to = $this->input->post('email');
            $name = $this->input->post('name');
            $message = $this->input->post('message');
            $phone = $this->input->post('phone');
            $this->SendCancelEmail($subject, $to, $name, $message, $phone);
        }
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function cancel_appointment($id) {
        $data = array(
            'status' => 3
        );
        $this->db->where(array('appointment_id' => $id));
        $this->db->update($this->tbl_appointment,$data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function Patientstestimonial($filename) {
        $data = array(
            'category_id' => $this->input->post('department'),
            'pt_name' => $this->input->post('p_name'),
            'pt_message' => $this->input->post('p_message'),
            'pt_image' => $filename
        );
        $this->db->insert($this->tbl_patients_testimonial, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function testimonial_list() {
        $this->db->join($this->tbl_department, "$this->tbl_patients_testimonial.category_id=$this->tbl_department.dd_id");
        return $this->db->get($this->tbl_patients_testimonial)->result();
    }

    function testimonial_single($id) {
        return $this->db->get_where($this->tbl_patients_testimonial, array('pt_id' => $id))->row_array();
    }

    function update_testimonial($filename, $id) {
        $data = array(
            'category_id' => $this->input->post('department'),
            'pt_name' => $this->input->post('p_name'),
            'pt_message' => $this->input->post('p_message'),
            'pt_image' => $filename
        );
        $this->db->where(array('pt_id' => $id));
        $this->db->update($this->tbl_patients_testimonial, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

function deleteamtestimonial($id=""){
        $this->db->where(array('pt_id' => $id));
        $this->db->delete($this->tbl_patients_testimonial);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    public function SendEmail($subject, $to, $message) {
        $this->load->config('email');
        $this->load->library('email');
    
    
        $this->email->from('labaidcancer@gmail.com', 'Labaid Cancer Hospital and Super Speciality  Center');
        $this->email->to($to);
        $this->email->subject($subject);
        $date = $this->input->post('confirm_appointment_date');
        $dt = new DateTime($date);
        $data = array(
            'message' => $message,
            'p_name' => $this->input->post('p_name'),
            'phone' => $this->input->post('phone'),
            'd_name' => $this->input->post('d_name'),
            'appointment_date' =>$dt->format('d-M-Y') ,
            'appointment_time' => date("g:iA", strtotime($this->input->post('confirm_appointment_time'))),
            'serial' => $this->input->post('serial_no'),

            //'from' => $from
        );
        
        $body = $this->load->view('email_template', $data, TRUE);
        $this->email->message($body);
    
        if ($this->email->send()) {
    echo 'Sent with success!';
        } else {
    // show_error($this->email->print_debugger());
    }

    }

    public function SendCancelEmail($subject, $to, $message) {
        $this->load->config('email');
        $this->load->library('email');
    
    
        $this->email->from('labaidcancer@gmail.com', 'Labaid Cancer Hospital and Super Speciality  Center');
        $this->email->to($to);
        $this->email->subject($subject);
        $date = $this->input->post('appointment_date');
        $dt = new DateTime($date);
        $data = array(
            'message' => $message,
            'p_name' => $this->input->post('p_name'),
            'phone' => $this->input->post('phone'),
            'd_name' => $this->input->post('d_name'),
            'appointment_date' =>$dt->format('d-M-Y') ,

            //'from' => $from
        );
        
        $body = $this->load->view('email_cancel_template', $data, TRUE);
        $this->email->message($body);
    
        if ($this->email->send()) {
    echo 'Sent with success!';
        } else {
    // show_error($this->email->print_debugger());
    }

    }

}
