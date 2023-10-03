<?php

defined('BASEPATH') OR exit("Direct Access Not Allowed");

class Gallery_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_image = "tbl_image";
    protected $tbl_gallery = "tbl_image_gallery";
    protected $tbl_home_slider = "home_slider";
    protected $tbl_room_images = "room_images";

    function uploadImg($file_name, $title, $id) {

        $data1 = array(
            'imgtitle_fulltitle' => $title,
            'imgtitle_date' => date('Y-m-d')
        );



        if ($id == "") {
            $this->db->insert($this->tbl_image, $data1);
            $id = $this->db->insert_id();
        } else {
            $this->db->where('imgtitle_id', $id);
            $this->db->update($this->tbl_image, $data1);
        }

        $data2 = array(
            'img_name' => $file_name,
            'imgtitle_id' => $id
        );
        $this->db->insert($this->tbl_gallery, $data2);

        return $id;
    }

    function front_imagelist() {
        return $this->db->query("SELECT $this->tbl_image.*,$this->tbl_gallery.img_name FROM $this->tbl_image
INNER JOIN $this->tbl_gallery ON $this->tbl_image.imgtitle_id=$this->tbl_gallery.imgtitle_id
GROUP BY imgtitle_id")->result();
    }

    function uploadsliderImg($file_name) {
        $data = array(
            'sld_image' => $file_name
        );
        $this->db->insert($this->tbl_home_slider, $data);
        return true;
    }

    function getall_slider_Images() {
        return $this->db->get($this->tbl_home_slider)->result();
    }

    function get_slider_Images() {
        return $this->db->get($this->tbl_home_slider)->result_array();
    }

    /* ============ Room Rent Images ========== */

    function uploadImg_room($file_name) {
        $data = array(
            'rm_image' => $file_name
        );
        $this->db->insert($this->tbl_room_images, $data);
        return $this->db->insert_id();
    }

    function getImages_room() {
        return $this->db->get($this->tbl_room_images)->result_array();
    }

    function getImages_room_all() {
        return $this->db->get($this->tbl_room_images)->result();
    }
    
    function RemoveImg_room($id) {
        $this->db->trans_begin();
        $result = $this->db->get_where($this->tbl_room_images, array('rm_id' => $id))->row_array();
        $this->db->delete($this->tbl_room_images, array('rm_id' => $id));


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return $result;
        }
    }

}
