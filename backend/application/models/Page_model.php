<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page_model
 *
 * @author AFRAKIB
 */
class Page_model extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    protected $tbl_page="page";
            
    function addHeadPage($file_name){
        $title=$this->input->post('title');
        $data=array(
            'pg_name'=> $title,
            'pg_description'=>$this->input->post('content'),
            'pg_category'=>$this->input->post('department'),
            'pg_image'=>$file_name,
            'pg_slug'=> url_title($title,'-', true),
            'pg_keyword'=>$this->input->post('keyword'),
            'pg_meta'=>$this->input->post('metadata')
        );
        
         $this->db->insert($this->tbl_page,$data);
        if($this->db->affected_rows()>0){
            return true;
        } else {
            return false;
        }
    }
    
    function pagelist(){
        return $this->db->get($this->tbl_page)->result();
    }
    
    function singlepage($id){
        return $this->db->get_where($this->tbl_page,array('pg_id'=>$id))->row_array();
    }
    
    function update_page($file_name, $id){
        $title=$this->input->post('title');
        $data=array(
            'pg_name'=> $title,
            'pg_description'=>$this->input->post('content'),
            'pg_category'=>$this->input->post('department'),
            'pg_image'=>$file_name,
            'pg_keyword'=>$this->input->post('keyword'),
            'pg_meta'=>$this->input->post('metadata')
        );
        
        $this->db->where(array('pg_id'=>$id));
         $this->db->update($this->tbl_page,$data);
        if($this->db->affected_rows()>0){
            return true;
        } else {
            return false;
        }
    }
    
    function article_byslug($id){
        return $this->db->get_where($this->tbl_page,array('pg_slug'=>$id))->row_array();
    }
    
}
