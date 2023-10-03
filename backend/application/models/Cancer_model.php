<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cancer_model
 *
 * @author AFRAKIB
 */
class Cancer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_cancer = 'cancer';
    protected $tbl_department = 'doctor_department';
    protected $tbl_cancer_details="cancer_details";
                function addnew($file_name) {
        $data = array(
            'cn_name' => $this->input->post('title'),
            'cn_details' => $this->input->post('content'),
            'cn_icon' => $file_name,
            'department_id'=>$this->input->post('department'),
            'cn_slug'=> url_title($this->input->post('title')),
            'cn_keyword'=>$this->input->post('keyword'),
            'cn_meta'=>$this->input->post('metadata'),
        );

        $this->db->insert($this->tbl_cancer, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function all_cancer() {
        $this->db->join($this->tbl_department,"$this->tbl_cancer.department_id=$this->tbl_department.dd_id");
        return $this->db->get($this->tbl_cancer)->result();
    }

    function single_cancer($id) {
        return $this->db->get_where($this->tbl_cancer, array('cn_id' => $id))->row_array();
    }
    
    function single_cancer_slug($id) {
        if(is_numeric($id)){
            return $this->db->get_where($this->tbl_cancer, array('cn_id' => $id))->row_array();
        }else{
            return $this->db->get_where($this->tbl_cancer, array('cn_slug' => $id))->row_array();    
        }
        
    }

    function update_cancer($file_name, $id) {
        $data = array(
            'cn_name' => $this->input->post('title'),
            'cn_details' => $this->input->post('content'),
            'cn_icon' => $file_name,
            'department_id'=>$this->input->post('department'),
             'cn_keyword'=>$this->input->post('keyword'),
            'cn_meta'=>$this->input->post('metadata'),
        );

        $this->db->where(array('cn_id' => $id));
        $this->db->update($this->tbl_cancer, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function addSection($sectionname,$Cancerdetails,$cnid){
        
        $data = array(
            'cancer_id' => $cnid,
            'cd_section_title' => $sectionname,
            'cd_details' =>$Cancerdetails,
            'cd_slug'=>url_title($sectionname,'-', true)
        );

        $this->db->insert($this->tbl_cancer_details,$data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    function cancerSectionData($cnid){
        return $this->db->get_where($this->tbl_cancer_details,array('cancer_id'=>$cnid))->result();
    }
    
    function displayData($cnid){
        return $this->db->get_where($this->tbl_cancer_details,array('cancer_id'=>$cnid))->result_array();
    }
    
    function removeDataCancer($id){
        $this->db->where(array('cd_id'=>$id));
        $this->db->delete($this->tbl_cancer_details);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
