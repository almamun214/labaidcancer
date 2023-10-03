<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News_model
 *
 * @author AFRAKIB
 */
class News_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_blog = 'blog';
    protected $tbl_blog_category = 'blog_category';

    function blog_category() {
        return $this->db->get($this->tbl_blog_category)->result();
    }

    function article_category($id) {
        return $this->db->get_where($this->tbl_blog_category, array('bc_slug' => $id))->row_array();
    }

    function addPost($file_name) {
        $data = array(
            'bl_title' => $this->input->post('title'),
            'bl_content' => $this->input->post('content'),
            'bl_category' => $this->input->post('department'),
            'bl_featured_image' => $file_name,
            'bl_post_by' => '',
            'bl_published_date' => date("Y-m-d"),
            'bl_slug'=> url_title($this->input->post('title')),
            'bl_keyword'=>$this->input->post('keyword'),
            'bl_meta'=>$this->input->post('metadata'),
        );

        $this->db->insert($this->tbl_blog, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function updatepost($filename, $id) {
        $data = array(
            'bl_title' => $this->input->post('title'),
            'bl_content' => $this->input->post('content'),
            'bl_category' => $this->input->post('department'),
            'bl_featured_image' => $filename,
            'bl_keyword'=>$this->input->post('keyword'),
            'bl_meta'=>$this->input->post('metadata'),
        );

        $this->db->where(array('bl_id' => $id));
        $this->db->update($this->tbl_blog, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function newslist($id) {
        $this->db->order_by('bl_id', 'desc');
        return $this->db->get_where($this->tbl_blog, array('bl_category' => $id))->result();
    }

    function singlenews($id) {
        $sql="SELECT * FROM blog WHERE bl_slug='$id'";
        return $this->db->query($sql)->row_array();
    }
    
    function singlenews_byid($id) {
        $sql="SELECT * FROM blog WHERE bl_id='$id'";
        return $this->db->query($sql)->row_array();
    }

function deletePost($id){
     $this->db->where(array('bl_id' => $id));
        $this->db->delete($this->tbl_blog);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
}

}
