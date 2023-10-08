<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Public
 *
 * @author AFRAKIB
 */
class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('checkup_model', 'chm');
        $this->load->model('doctors_model', 'dm');
        $this->load->model('news_model', 'nem');
        $this->load->model('cancer_model', 'canmo');
        $this->load->model('patient_model', 'pm');
        $this->load->model('page_model', 'pmod');
        $this->load->model('technology_model', 'techmod');
        $this->load->model('gallery_model', 'imgg');
        $this->load->model('Generalquestions_model','gq_mod');
        $this->load->model('packages_model','pkg_mod');
        $this->load->model('menucontrol_model','mc_model');
        $this->load->model('department_model','dep_mod');
        $this->load->model('settings_model');
        $this->load->model('comprehensiveCares_model', 'cc_mod');

    }

    function login(){
        redirect('user/login');
    }

     function advancesearch(){
        $data['body'] = 'Home/advance_search';
        $data['title'] = "Advance Search";
        $data['sr'] = $this->glob_model->advancesearch();
        $this->tpl->client($data); 
    }

    

    function index() {
        $data['title'] = 'Labaid Cancer Hospital and Super Speciality  Center';
        $data['body'] = 'Home/home';
        $data['doctor'] = $this->dm->all_doctor_random();
        $data['canmo'] = $this->canmo->all_cancer();
        $data['techno'] = $this->techmod->techlist();
        $data['slider']= $this->imgg->getall_slider_Images();
        $data['testimonial']= $this->pm->testimonial_list();
        $data['general_question']=$this->gq_mod->questionlist();
        $data['homeservice']= $this->settings_model->homeservice_list();
        $data['awards']= $this->nem->newslist(2);
        $this->tpl->client($data);
    }

    function contact() {
        $this->form_validation->set_rules('name', 'Name', 'required|strip_tags');

        $this->form_validation->set_rules('phone', 'Phone', 'required|strip_tags|is_natural');
        $this->form_validation->set_rules('message', 'Message Body', 'required|strip_tags');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Contact Us';
            $data['body'] = 'Home/contact_us';
            $this->tpl->client($data);
        } else {
            $subject = "Web User Contact Mail";
            $to = 'info@labaidcancer.com';
            $name = $this->input->post('name');
            $message = $this->input->post('message');
            $phone = $this->input->post('phone');
            $this->SendEmail($subject, $to, $name, $message, $phone);
        }
    }

    public function SendEmail($subject, $to, $name, $message, $phone) {
        $this->load->library('email');
        $this->email->clear();
        $config = array(
            'protocol' => 'sendmail',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'labaidcancer@gmail.com',
            'smtp_pass' => 'cancer@2021',
            'smtp_timeout' => '5',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('labaidcancer@gmail.com', 'Labaid Cancer Hospital and Super Speciality  Center');
        $data = array(
            'message' => $message,
            'name' => $name,
            'phone' => $phone,
            'from' => $from
        );

        $this->email->to($to); // replace it with receiver mail id
        $this->email->subject($subject); // replace it with relevant subject
        $body = $this->load->view('email_template', $data, TRUE);
        $this->email->message($body);

        //Send mail
        if ($this->email->send()) {
            $this->session->set_flashdata("email_sent", "<br/>Congragulation Email Send Successfully.");
        } else {
            $this->session->set_flashdata("email_sent", "<br/>You have encountered an error");
        }
        redirect('home/contact');
    }

    function technology() {
        $data['title'] = 'Technology';
        $data['body'] = 'Home/technology';
        $data['tech'] = $this->techmod->techlist();
        $data['headimage']= $this->mc_model->single_page_header_slug('technology'); 
        $this->tpl->client($data);
    }
//al
    function winningOverCancer() {
        $data['title'] = 'Winning Over Cancer';
        $data['body'] = 'Home/winningOverCancer';
       // $data['gq']= $this->mc_model->single_page_content_slug('messageOfmd');
        $this->tpl->client($data);
    }
    function messageOfmd() {
        $data['title'] = 'Message Of Managing Director';
        $data['body'] = 'Home/messageOfmd';
        $data['gq']= $this->mc_model->single_page_content_slug('messageOfmd');
        $this->tpl->client($data);
    }

    function about() {
        $data['title'] = 'About Us';
        $data['body'] = 'Home/about';
        $data['gq']= $this->mc_model->single_page_content_slug('about');
        $data['headimage']= $this->mc_model->single_page_header_slug('about');
        $this->tpl->client($data);
    }
    //sagor
    function aboutOporajoyi() {
        $data['title'] = 'About Oporajoyi';
        $data['body'] = 'Home/oporajoyi_abashon';
        $data['gq']= $this->mc_model->oporsjoyi_page_slug('aboutOporajoyi');
        $this->tpl->client($data);
    }
    //sagor
    function serviceDetails() {
        $data['title'] = 'Service Details';
        $data['body'] = 'Home/oporajoyi_abashon';
        $data['gq']= $this->mc_model->oporsjoyi_page_slug('serviceDetails');
        $this->tpl->client($data);
    }
    function visitorpolicy(){
        $data['title'] = 'Visitor Policy';
        $data['body'] = 'Home/visitor_policy';
        $data['gq']= $this->mc_model->single_page_content_slug('visitorpolicy');
        $data['headimage']= $this->mc_model->single_page_header_slug('visitorpolicy');
        $this->tpl->client($data);
    }
    
    function privacypolicy(){
        $data['title'] = 'Privacy Policys';
        $data['body'] = 'Home/visitor_policy';
        $data['gq']= $this->mc_model->single_page_content_slug('privacypolicy');
        $data['headimage']= $this->mc_model->single_page_header_slug('privacypolicy');
        $this->tpl->client($data);
    }
    
     function disclaimer(){
        $data['title'] = 'Disclaimer';
        $data['body'] = 'Home/visitor_policy';
        $data['gq']= $this->mc_model->single_page_content_slug('disclaimer');
        $data['headimage']= $this->mc_model->single_page_header_slug('disclaimer');
        $this->tpl->client($data);
    }

    function gallery() {
        $data['title'] = 'Gallery';
        $data['body'] = 'Home/gallery';
        $this->tpl->client($data);
    }

    function awards_recognition() {
        $data['title'] = 'Diagnosis and Treatment';
        $data['body'] = 'Home/awards_recognition';

        $this->tpl->client($data);
    }
    function diagnosis_treatment() {
        $data['title'] = 'Diagnosis and Treatment';
        $data['body'] = 'Home/diagnosis_treatment';
        $data['headimage']= $this->mc_model->single_page_header_slug('diagnosis_treatment');
        $data['general_question']=$this->gq_mod->diagnosistreatmentlist();
        $this->tpl->client($data);
    }


    function service_we_offer() {
        $data['title'] = 'Service We Offer';
        $data['body'] = 'Home/service';
        $data['headimage']= $this->mc_model->single_page_header_slug('service_we_offer'); 
        $data['service']= $this->pkg_mod->service_offer_list();
        $this->tpl->client($data);
    }

    function department() {
        $data['title'] = 'Department';
        $data['body'] = 'Home/department';
        $data['headimage']= $this->mc_model->single_page_header_slug('department'); 
        $data['department'] = $this->dep_mod->department_list();
        $this->tpl->client($data);
    }
    
    function department_details($id="") {
        $data['department'] = $this->dep_mod->department_single_slug($id);
        $data['title'] = $data['department']['dpt_name'];
        $data['body'] = 'Home/department_details';
        $data['headimage']= $this->mc_model->single_page_header_slug('department'); 
        $data['keyword'] = $data['department']['dpt_name']; 
        $data['metadescription'] = $data['department']['dpt_name'];
        $this->tpl->client($data);
    }

    function package() {
        $data['title'] = 'Diagnostic Package';
        $data['body'] = 'Home/package';
        $data['gqlist']= $this->pkg_mod->package_list();
        $data['headimage']= $this->mc_model->single_page_header_slug('package'); 
        $this->tpl->client($data);
    }
    function comprehensive_care() {
        $data['title'] = 'Comprehensive Care';
        $data['body'] = 'Home/comprehensive_care';
        $data['gqlist']= $this->cc_mod->comprehensive_care_list();
        $data['headimage']= $this->mc_model->single_page_header_slug('comprehensive_care'); 
        $this->tpl->client($data);
    }
    function roomrent() {
        $data['title'] = 'Room Rent';
        $data['body'] = 'Home/room_rent';
        $data['gqlist']= $this->pkg_mod->package_list();
        $data['headimage']= $this->mc_model->single_page_header_slug('roomrent'); 
        $data['image']= $this->imgg->getImages_room_all();
        $this->tpl->client($data);
    }

    function package_details($id = "") {
        $data['pkg'] = $this->pkg_mod->single_package($id);
        $data['pkg_details']= $this->pkg_mod->single_package_slug($id);
        $data['title'] = $data['pkg']['dpm_name'];
        $data['keyword'] = $data['pkg']['dpm_name']; 
        $data['metadescription'] = $data['pkg']['dpm_name'];
        $data['body'] = 'Home/Package_details';
        $this->tpl->client($data);
    }
    
    function patientpackage() {
        $data['title'] = 'Patient Package';
        $data['body'] = 'Home/patient_package';
        $data['gqlist']= $this->pkg_mod->patient_package_list();
        $data['headimage']= $this->mc_model->single_page_header_slug('patientpackage'); 
        $this->tpl->client($data); 
    }
    
     function patientpackage_details($id = "") {
        $data['pkg'] = $this->pkg_mod->single_patient_package($id);
        $data['pkg_details']= $this->pkg_mod->single_patient_package_slug($id);
        $data['title'] = $data['pkg']['pqm_name'];
        $data['keyword'] = $data['pkg']['pqm_name']; 
        $data['metadescription'] = $data['pkg']['pqm_name'];
        $data['body'] = 'Home/patient_package_details';
        $this->tpl->client($data);
    }
    
    function messageOfchairman() { 
        $data['title'] = 'Message Of Chairman';
        $data['body'] = 'Home/chairman';
        $data['gq']= $this->mc_model->single_page_content_slug('messageOfchairman');
        $this->tpl->client($data);
    }

    function management() {
        $data['title'] = 'Management Team';
        $data['body'] = 'Home/managementteam';
        $data['headimage']= $this->mc_model->single_page_header_slug('management');
        $data['mtl'] = $this->mc_model->management_team_list();
        $this->tpl->client($data);
    }

    function techview($id = "") {
        $data['tech'] = $this->techmod->single_techlist($id);
        $data['title'] = $data['tech']['tec_name'];
        $data['keyword'] = $data['tech']['tec_keyword'];
        $data['metadescription'] = $data['tech']['tec_meta'];
        $data['body'] = 'Home/techview';
        $this->tpl->client($data);
    }

    function article($id = "") {
        $data['arcat'] = $this->nem->article_category($id);
        $data['title'] = $data['arcat']['bc_title'];
        $data['body'] = 'Home/News';
        $data['newslist'] = $this->nem->newslist($data['arcat']['bc_id']);
        $data['keyword'] = $data['arcat']['bc_keyword'];
        $data['metadescription'] = $data['arcat']['bc_meta'];
        $this->tpl->client($data);
    }

    function newsview($id = "") {
        $data['news'] = $this->nem->singlenews($id);
        $data['title'] = $data['news']['bl_title'];
        $data['keyword'] = $data['news']['bl_keyword'];
        $data['metadescription'] = $data['news']['bl_meta'];
        $data['body'] = 'Home/Newsview';
        $this->tpl->client($data);
    }

    function page($id = "") {
        $data['news'] = $this->pmod->article_byslug($id);
        $data['title'] = $data['news']['pg_name'];
        $data['keyword'] = $data['news']['pg_keyword'];
        $data['metadescription'] = $data['news']['pg_meta'];
        $data['body'] = 'Home/page_view';
        $this->tpl->client($data);
    }

    function fpage($id = "") {
        $data['news'] = $this->glob_model->f_singlepage($id);
        $data['title'] = $data['news']['pg_name'];
        $data['keyword'] = $data['news']['pg_keyword'];
        $data['metadescription'] = $data['news']['pg_meta'];
        $data['body'] = 'Home/page_view';

        $this->tpl->client($data);
    }

    function appointment() {
        $this->form_validation->set_rules('name', 'Full Name', 'required|strip_tags|max_length[100]');
        // $this->form_validation->set_rules('email', 'Email Address', 'required|strip_tags|max_length[100]|valid_email|is_unique[patient.p_email]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|strip_tags|max_length[100]|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required|strip_tags|max_length[8]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|strip_tags|max_length[11]|is_natural');
        $this->form_validation->set_rules('booking_date', 'Booking Date', 'required|strip_tags');
        // $this->form_validation->set_rules('department', 'Department', 'required|strip_tags|max_length[3]');
        $this->form_validation->set_rules('doctor', 'Doctor', 'required|strip_tags|max_length[3]');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required|strip_tags');
        $this->form_validation->set_rules('district', 'District', 'required|strip_tags|max_length[3]');
        // $this->form_validation->set_rules('address', 'Present Address', 'required|strip_tags');

        if ($this->form_validation->run() === false) {
            $data['title'] = 'Appointment';
            $data['body'] = 'Home/appointment';
            $data['doctors'] = $this->dm->all_doctor_random();
            $data['selected_doctor'] = null;
            $data['districts'] = $this->dm->all_district();
            $this->tpl->client($data);
        } 
        else {
            $captcha_response = trim($this->input->post('g-recaptcha-response'));

            if($captcha_response != '')
            {
                $keySecret = '6LcPaskiAAAAADmaT0cTXu_Ilz9EY_0OLuQ8KTDh';

                $check = array(
                    'secret'		=>	$keySecret,
                    'response'		=>	$this->input->post('g-recaptcha-response')
                );

                $startProcess = curl_init();

                curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

                curl_setopt($startProcess, CURLOPT_POST, true);

                curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

                curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

                $receiveData = curl_exec($startProcess);

                $finalResponse = json_decode($receiveData, true);

                if($finalResponse['success'])
                {
                    $result = $this->pm->patient_appointment();
                    if ($result == true) {
                        $this->session->set_flashdata('success', 'Successfully Submited');
                        redirect('appointment');
                    } else {
                        $this->tpl->client($data);
                    }
                }
                else
                {
                    $this->session->set_flashdata('failed', 'Validation Fail Try Again');
                    redirect('appointment');
                }
            }
            else
            {
                $this->session->set_flashdata('failed', 'Validation Fail Try Again');

                redirect('appointment');
            } 
        }
    }

    function diagnostictest() {
        $data['title'] = 'Diagnostic & Test';
        $data['body'] = 'Home/diagnostic_test';
        $data['dtest'] = $this->chm->test_list();
        $this->tpl->client($data);
    }

    function doctors() {
        $data['title'] = 'Doctors'; 
        $data['body'] = 'Home/Doctor';
        $data['doctor'] = $this->dm->initial_doctor_list(3);
        $data['department'] = $this->dm->departmentList();
        $data['headimage']= $this->mc_model->single_page_header_slug('doctors');
        $this->tpl->client($data);
    }

    function doctordetails($id = "") {
        $data['doctor'] = $this->dm->single_doctor_slug($id);
        $data['title'] = $data['doctor']['d_name'];
        $data['body'] = 'Home/doctor_details';
        $data['doctor_wh']= $this->dm->single_doctor_workinghour($data['doctor']['d_id']);
        $this->tpl->client($data);
    }

    function CentresofExcellence() {
       $data['title'] = 'Centres of Excellence';
        $data['body'] = 'Home/Cancer';
        $data['cancer'] = $this->canmo->all_cancer();
        $this->tpl->client($data);
    }
    
    function Cancer_details($id = "") {
        $data['cancer'] = $this->canmo->single_cancer_slug($id);
        $data['cancer_details'] = $this->canmo->cancerSectionData($data['cancer']['cn_id']);
        $data['doctor'] = $this->dm->cancer_wise_doctor($data['cancer']['cn_id']);
        $data['title'] = $data['cancer']['cn_name'];
        $data['body'] = 'Home/Cancer_details';
        $this->tpl->client($data);
    }

    function finddoctor() {
        $data['title'] = 'Find Doctor';
        $data['body'] = 'Home/finddoctor';
        $data['doctor'] = $this->dm->finddoctor();
        $this->tpl->client($data);
    }

    function findtest() {
        $data['title'] = 'Find Test';
        $data['body'] = 'Home/findtest';
        $data['dtest'] = $this->chm->findtest();
        $this->tpl->client($data);
    }

    public function imagegallery() {

        $data['title'] = "Image Gallery";
        $data['body'] = 'Home/gallery';
        $data['image'] = $this->imgg->front_imagelist();
        $this->tpl->client($data);
    }

    public function Viewgallery($id = "") {

        $data['title'] = "View Image Gallery";
        $data['body'] = 'Home/Viewgallery';
        $data['image'] = $this->db->query("SELECT * FROM tbl_image_gallery where imgtitle_id=$id")->result();
        $this->tpl->client($data);
    }

    function doctor_appointment($id = "") {

        $this->form_validation->set_rules('name', 'Full Name', 'required|strip_tags|max_length[100]');
        // $this->form_validation->set_rules('email', 'Email Address', 'required|strip_tags|max_length[100]|valid_email|is_unique[patient.p_email]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|strip_tags|max_length[100]|valid_email');
        $this->form_validation->set_rules('gender', 'Gender', 'required|strip_tags|max_length[8]');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|strip_tags|max_length[11]|is_natural');
        $this->form_validation->set_rules('booking_date', 'Booking Date', 'required|strip_tags');
        // $this->form_validation->set_rules('department', 'Department', 'required|strip_tags|max_length[3]');
        $this->form_validation->set_rules('doctor', 'Doctor', 'required|strip_tags|max_length[3]');
        $this->form_validation->set_rules('dob', 'Date Of Birth', 'required|strip_tags');
        $this->form_validation->set_rules('district', 'District', 'required|strip_tags|max_length[3]');
        // $this->form_validation->set_rules('address', 'Present Address', 'required|strip_tags');

        if ($this->form_validation->run() === false) {
            $data['title'] = 'Appointment';
            $data['body'] = 'Home/appointment';
            $data['doctors'] = $this->dm->all_doctor_random();
            $data['districts'] = $this->dm->all_district();
            $data['selected_doctor']=$this->dm->single_doctor_slug($id);
            $this->tpl->client($data);
        } 
        else {
            $captcha_response = trim($this->input->post('g-recaptcha-response'));

            if($captcha_response != '')
            {
                $keySecret = '6LdvdskiAAAAAKQkGsZK8JtOWZ8mJWyXBTValZPx';

                $check = array(
                    'secret'		=>	$keySecret,
                    'response'		=>	$this->input->post('g-recaptcha-response')
                );

                $startProcess = curl_init();

                curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

                curl_setopt($startProcess, CURLOPT_POST, true);

                curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

                curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

                curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

                $receiveData = curl_exec($startProcess);

                $finalResponse = json_decode($receiveData, true);

                if($finalResponse['success'])
                {
                    $result = $this->pm->patient_appointment();
                    if ($result == true) {
                        $this->session->set_flashdata('success', 'Successfully Submited');
                        redirect('appointment');
                    } else {
                        $this->tpl->client($data);
                    }
                }
                else
                {
                    $this->session->set_flashdata('failed', 'Validation Fail Try Again');
                    redirect('appointment');
                }
            }
            else
            {
                $this->session->set_flashdata('failed', 'Validation Fail Try Again');

                redirect('appointment');
            } 
        }
    }

}
