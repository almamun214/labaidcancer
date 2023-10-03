<?php

class Template {

//ci instance
    private $CI;

    //template Data


    public function __construct() {
        $this->CI = & get_instance();
    }

    public function Admin($data = null) { 
        return $this->CI->load->view('Template/admin_theme', $data);
    }

    public function Client($data = null) {
        return $this->CI->load->view('Template/client_theme', $data);
    }
    
    public function cfooter() { // Client Footer = cfooter
        return $this->CI->load->view('Template/client_footer');
    }
    public function Client_head() {
        return $this->CI->load->view('Template/client_head');
    }

    public function subcat($data= null) {// All Subcategory will show here
        return $this->CI->load->view('Template/client_category',$data);
    }
    
   
    
}

/* This is the end of main template class location application/modules/templete/controller/template.php */
