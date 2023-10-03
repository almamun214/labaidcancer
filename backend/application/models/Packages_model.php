<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Packages_model
 *
 * @author AFRAKIB
 */
class Packages_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_diagnostics_packages = "diagnostics_packages";
    protected $tbl_diagnostics_packages_main = "diagnostics_packages_main";
    protected $tbl_patient_packages_main = "patient_packages_main";
    protected $tbl_patient_packages = "patient_packages";
    protected $tbl_service_we_offer = "service_we_offer";

    function add_package($filename) {
        $data = array(
            'dpm_name' => $this->input->post('qname'),
            'dpm_image' => $filename
        );
        $this->db->insert($this->tbl_diagnostics_packages_main, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function package_list() {
        return $this->db->get($this->tbl_diagnostics_packages_main)->result();
    }

    function single_package($id) {
        return $this->db->get_where($this->tbl_diagnostics_packages_main, array('dpm_id' => $id))->row_array();
    }

    function delete_daigonostic_packge($id) {
        $this->db->trans_begin();
        
        $this->db->where(array('dpm_id'=>$id));
        $this->db->delete($this->tbl_diagnostics_packages_main);
        
        $this->db->where(array('dpm_id'=>$id));
        $this->db->delete($this->tbl_diagnostics_packages);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    function single_package_slug($id) {
//        $sql="SELECT $this->tbl_diagnostics_packages.*,$this->tbl_diagnostics_packages_main.dpm_id as dpmid,$this->tbl_diagnostics_packages_main.dpm_name,$this->tbl_diagnostics_packages_main.dpm_image FROM $this->tbl_diagnostics_packages
//INNER JOIN $this->tbl_diagnostics_packages_main ON $this->tbl_diagnostics_packages.dpm_id=$this->tbl_diagnostics_packages_main.dpm_id where $this->tbl_diagnostics_packages.dp_id=$id";
//        return $this->db->query($sql)->result(); 
        return $this->db->get_where($this->tbl_diagnostics_packages, array('dpm_id' => $id))->result();
    }

    function update_package($filename, $id) {
        $data = array(
            'dpm_name' => $this->input->post('qname'),
            'dpm_image' => $filename
        );
        $this->db->where(array('dpm_id' => $id));
        $this->db->update($this->tbl_diagnostics_packages_main, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function addTabdata($sectionname, $Cancerdetails, $dpm_id) {
        $data = array(
            'dp_name' => $sectionname,
            'dp_description' => $Cancerdetails,
            'dpm_id' => $dpm_id
        );
        $this->db->insert($this->tbl_diagnostics_packages, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function package_tablist() {
        return $this->db->get($this->tbl_diagnostics_packages)->result();
    }

    function package_tablist_json($dpm_id) {
        return $this->db->get_where($this->tbl_diagnostics_packages, array('dpm_id' => $dpm_id))->result_array();
    }

    function removePackageTab($id) {
        $this->db->where(array('dp_id' => $id));
        $this->db->delete($this->tbl_diagnostics_packages);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /* =================== Patient Package Section ====================== */

    function add_patient_package($filename) {
        $data = array(
            'pqm_name' => $this->input->post('qname'),
            'pqm_image' => $filename
        );
        $this->db->insert($this->tbl_patient_packages_main, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function patient_package_list() {
        return $this->db->get($this->tbl_patient_packages_main)->result();
    }

    function single_patient_package($id) {
        return $this->db->get_where($this->tbl_patient_packages_main, array('pqm_id' => $id))->row_array();
    }

    function single_patient_package_slug($id) {

        return $this->db->get_where($this->tbl_patient_packages, array('pqmm_id' => $id))->result();
    }

    function update_patient_package($filename, $id) {
        $data = array(
            'pqm_name' => $this->input->post('qname'),
            'pqm_image' => $filename
        );
        $this->db->where(array('pqm_id' => $id));
        $this->db->update($this->tbl_patient_packages_main, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function add_patientTabdata($sectionname, $Cancerdetails, $dpm_id) {
        $data = array(
            'pqp_name' => $sectionname,
            'pqp_description' => $Cancerdetails,
            'pqmm_id' => $dpm_id
        );
        $this->db->insert($this->tbl_patient_packages, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function package_patient_tablist_json($pqmm_id) {
        return $this->db->get_where($this->tbl_patient_packages, array('pqmm_id' => $pqmm_id))->result_array();
    }

    function remove_patient_PackageTab($id) {
        $this->db->where(array('pqp_id' => $id));
        $this->db->delete($this->tbl_patient_packages);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    
    
    function patient_delete_package($id) {
        $this->db->trans_begin();
        
        $this->db->where(array('pqm_id'=>$id));
        $this->db->delete($this->tbl_patient_packages_main);
        
        $this->db->where(array('pqmm_id'=>$id));
        $this->db->delete($this->tbl_patient_packages);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    
    
    /* =================== Service We Offer ====================== */

    function add_Service_We_offer($filename) {
        $data = array(
            'swo_name' => $this->input->post('qname'),
            'swo_image' => $filename
        );
        $this->db->insert($this->tbl_service_we_offer, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function service_offer_list() {
        return $this->db->get($this->tbl_service_we_offer)->result();
    }

    function service_offer_single($id) {
        return $this->db->get_where($this->tbl_service_we_offer, array('swo_id' => $id))->row_array();
    }

    function update_service_offer($filename, $id) {
        $data = array(
            'swo_name' => $this->input->post('qname'),
            'swo_image' => $filename
        );
        $this->db->where(array('swo_id' => $id));
        $this->db->update($this->tbl_service_we_offer, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function delete_serviceoffer($id) {
        $this->db->where(array('swo_id' => $id));
        $this->db->delete($this->tbl_service_we_offer);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
