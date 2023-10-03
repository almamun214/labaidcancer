<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Doctors_model
 *
 * @author Rakib
 */
class Doctors_model extends CI_Model {

    protected $tbl_department = 'doctor_department';
    protected $tbl_doctors = "doctors";
    protected $tbl_doctor_working_hour = "doctor_working_hour";
    protected $tbl_time_chart = "time_chart";
    protected $tbl_working_days = "working_days";
    protected $tbl_specialist = "specialist";
    protected $tbl_cancer = 'cancer';
    protected $tbl_district = 'districts';

    function __construct() {
        parent::__construct();
    }

    function time_chart() {
        return $this->db->get($this->tbl_time_chart)->result();
    }

    function working_days() {
        return $this->db->get($this->tbl_working_days)->result();
    }

    public function Add_department() {
        $did = $this->db->order_by('dd_aid', 'desc')->limit(1)->get($this->tbl_department)->row_array();
        if (empty($did)) {
            $did = 1;
        } else {
            $did = $did['dd_id'] + 1;
        }

        $data = array(
            'dd_id' => $did,
            'dd_name' => $this->input->post('dpname'),
            'dd_date' => date('Y-m-d'),
            'dd_slug' => url_title($this->input->post('dpname'))
        );

        $this->db->insert($this->tbl_department, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function departmentList() {
        return $this->db->get($this->tbl_department)->result();
    }

    function department_by_id($id) {
        return $this->db->get_where($this->tbl_department, array('dd_aid' => $id))->row_array();
    }

    function delete_department($id){
        
        $ddid= $this->db->get_where($this->tbl_doctors, array('d_department' => $id))->row_array();
        
        if(!empty($ddid)){
            $ee['msg']='Remove Doctors From This Category';
            $ee['status']=false;
            return $ee;
        }
        
        
        $this->db->trans_begin();

        $this->db->where(array('dd_id'=>$id));
        $this->db->delete($this->tbl_department);
       

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            $ee['msg']='Category Not Deleted';
            $ee['status']=false;
            return $ee;
        } else {
            $this->db->trans_commit();
            $ee['msg']='Successfully Deleted';
            $ee['status']=true;
            return $ee;
        }
    }


    public function update_department($id) {

        $data = array(
            'dd_name' => $this->input->post('dpname'),
        );

        $this->db->where(array('dd_aid' => $id));
        $this->db->update($this->tbl_department, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function addAjaxWorkingHour($doctor, $day, $timefrom, $timeto) {
        $data = array(
            'doctor_id' => $doctor,
            'working_days' => $day,
            'working_from' => $timefrom,
            'working_to' => $timeto
        );

        $this->db->insert($this->tbl_doctor_working_hour, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function removeDataWorkingHour($id) {
        $this->db->where(array('dwh_aid' => $id));
        $this->db->delete($this->tbl_doctor_working_hour);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function displayDataWorkingHour($doctor) {
        return $this->db->get_where($this->tbl_doctor_working_hour, array('doctor_id' => $doctor))->result_array();
    }

    public function Add_doctor($picture) {
        $did = $this->db->order_by('d_aid', 'desc')->limit(1)->get($this->tbl_doctors)->row_array();
        if (empty($did)) {
            $did = 1;
        } else {
            $did = $did['d_id'] + 1;
        }

        $data = array(
            'd_id' => $did,
            'd_name' => $this->input->post('fullname'),
            'd_email' => $this->input->post('emailaddress'),
            'd_department' => $this->input->post('department'),
            'd_gender' => $this->input->post('gender'),
            'd_designation' => $this->input->post('designation'),
            'd_address' => $this->input->post('address'),
            'd_mobile' => $this->input->post('mobile'),
            'd_career_title' => $this->input->post('career_title'),
            'd_biography' => $this->input->post('short_biography'),
            'd_education' => $this->input->post('education'),
            'd_picture' => $picture,
            'd_slug' => url_title($this->input->post('fullname')),
            'd_keyword' => $this->input->post('keyword'),
            'd_meta' => $this->input->post('metadata'),
            'doctor_order' => $this->input->post('doctor_order'),
        );

        $this->db->insert($this->tbl_doctors, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_doctor($filename, $id) {


        $data = array(
            'd_name' => $this->input->post('fullname'),
            'd_email' => $this->input->post('emailaddress'),
            'd_department' => $this->input->post('department'),
            'd_gender' => $this->input->post('gender'),
            'd_designation' => $this->input->post('designation'),
            'd_address' => $this->input->post('address'),
            'd_mobile' => $this->input->post('mobile'),
            'd_career_title' => $this->input->post('career_title'),
            'd_biography' => $this->input->post('short_biography'),
            'd_education' => $this->input->post('education'),
            'd_picture' => $filename,
            'd_keyword' => $this->input->post('keyword'),
            'd_meta' => $this->input->post('metadata'),
            'doctor_order' => $this->input->post('doctor_order'),
        );

        $this->db->where(array('d_id' => $id));
        $this->db->update($this->tbl_doctors, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function doctorBydepartment($dpt) {
        return $this->db->order_by('doctor_order', 'ASC nulls last')->get_where($this->tbl_doctors, array('d_department' => $dpt))->result_array();
    }
    function initial_doctor_list($dpt) {
        $this->db->join($this->tbl_department, "$this->tbl_doctors.d_department=$this->tbl_department.dd_id");
        return $this->db->order_by('doctor_order', 'ASC nulls last')->get_where($this->tbl_doctors, array('d_department' => $dpt))->result();
        
    }
    function all_doctor_random() {
        $this->db->join($this->tbl_department, "$this->tbl_doctors.d_department=$this->tbl_department.dd_id");
        $this->db->order_by('doctor_order', 'ASC nulls last');
        return $this->db->get($this->tbl_doctors)->result();
        
    }

    function single_doctor($id) {
        $this->db->join($this->tbl_department, "$this->tbl_doctors.d_department=$this->tbl_department.dd_id");
        return $this->db->get_where($this->tbl_doctors, array("d_id" => $id))->row_array();
    }

    function single_doctor_slug($id) {
        $this->db->join($this->tbl_department, "$this->tbl_doctors.d_department=$this->tbl_department.dd_id");
        return $this->db->get_where($this->tbl_doctors, array("d_slug" => $id))->row_array();
    }

    function single_doctor_workinghour($doctor) {
        return $this->db->get_where($this->tbl_doctor_working_hour, array('doctor_id' => $doctor))->result();
    }

    function cancer_wise_doctor($id) {
        $this->db->join($this->tbl_specialist, "$this->tbl_doctors.d_id=$this->tbl_specialist.doc_id");
        $this->db->order_by('d_id', 'random');
        $this->db->limit(3);
        return $this->db->get_where($this->tbl_doctors, array("$this->tbl_specialist.can_id" => $id))->result();
    }

    function GetCancerbyDoctor($doctor) {
        $sql = "SELECT * FROM cancer";
        return $this->db->query($sql)->result_array();
    }

    function addAjaxCancer($doctor, $Cancer) {
        $check = $this->db->get_where($this->tbl_specialist, array('doc_id' => $doctor, 'can_id' => $Cancer))->result();
        if (!empty($check)) {
            return false;
        } else {

            $data = array('doc_id' => $doctor, 'can_id' => $Cancer);
            $this->db->insert($this->tbl_specialist, $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    function displayDataCancer($doctor, $Cancer) {
        $this->db->join($this->tbl_cancer, "$this->tbl_specialist.can_id=$this->tbl_cancer.cn_id");
        return $this->db->get_where($this->tbl_specialist, array('doc_id' => $doctor))->result_array();
    }

    function removeDataCancer($id) {
        $this->db->where('sp_id', $id);
        $this->db->delete($this->tbl_specialist);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function finddoctor() {
        $finddoc = $this->input->post('finddoc');
        $this->db->join($this->tbl_department, "$this->tbl_doctors.d_department=$this->tbl_department.dd_id");
        $this->db->like('d_name', $finddoc, 'both');
        return $this->db->get($this->tbl_doctors)->result();
    }

    function delete_doctor($id) {
        $result= $this->db->get_where($this->tbl_doctors,array('d_id'=>$id))->row_array();
        
        $this->db->trans_begin();

        $this->db->where(array('doctor_id'=>$id));
        $this->db->delete($this->tbl_doctor_working_hour);
        
        $this->db->where(array('doc_id'=>$id));
        $this->db->delete($this->tbl_specialist);
        
        $this->db->where(array('d_id'=>$id));
        $this->db->delete($this->tbl_doctors);

        unlink($result['d_picture']);
        
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }


    function all_district() {
        $this->db->order_by('dis_name', 'ASC nulls last');
        return $this->db->get($this->tbl_district)->result();
    }
}
