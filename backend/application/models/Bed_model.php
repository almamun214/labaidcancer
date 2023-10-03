<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bed_model
 *
 * @author AFRAKIB
 */
class Bed_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    protected $tbl_room = "bm_room";
    protected $tbl_bed="bm_bed";

    public function Add_room() {
        $did = $this->db->order_by('room_aid', 'desc')->limit(1)->get($this->tbl_room)->row_array();
        if (empty($did)) {
            $did = 1;
        } else {
            $did = $did['room_id'] + 1;
        }

        $data = array(
            'room_id' => $did,
            'room_name' => $this->input->post('roomname'),
            'description' => $this->input->post('description'),
            'limit' => $this->input->post('bedlimit'),
            'charge' => $this->input->post('costbed'),
            'status' => 1,
            'room_date' => date('Y-m-d')
        );

        $this->db->insert($this->tbl_room, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_room($id) {
       
        $data = array(
            'room_name' => $this->input->post('roomname'),
            'description' => $this->input->post('description'),
            'limit' => $this->input->post('bedlimit'),
            'charge' => $this->input->post('costbed'),
        );
        $this->db->where(array('room_aid'=>$id));
        $this->db->update($this->tbl_room, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function room_by_id($param) {
        return $this->db->get_where($this->tbl_room,array('room_aid'=>$param))->row_array();
    }


    public function roomlist() {
        return $this->db->get($this->tbl_room)->result();
    }

    public function Add_bed() {
        
         $did = $this->db->order_by('bed_aid', 'desc')->limit(1)->get($this->tbl_bed)->row_array();
        if (empty($did)) {
            $did = 1;
        } else {
            $did = $did['bed_id'] + 1;
        }
        
        $room_name=$this->input->post('roomname');
        
        $room_status=checkBedLimit($param);
        if($room_status==true){
            return false;
        }
        $data = array(
            'bed_id' => $did,
            'room_id' => $room_name,
            'bed_description' => $this->input->post('description'),
            'bed_number' => $this->input->post('bedlimit'),
            'bed_status' => 1,
            'bed_date' => date('Y-m-d')
        );

        $this->db->insert($this->tbl_bed, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkBedLimit($param) {
        $roomBed= $this->db->get_where($this->tbl_room,array('room_id'=>$param))->row_array();
        $usedBed=$this->db->get_where($this->tbl_bed,array('room_id'=>$param))->num_rows();
        
        if($roomBed['limit']==$usedBed){
            return true;
        }else{
            return false;
        }
        
        
    }

    public function bed_list() {
        $this->db->join($this->tbl_room, "$this->tbl_room.room_id = $this->tbl_bed.room_id");
        $this->db->order_by("$this->tbl_bed.room_id",'asc');
        return $this->db->get($this->tbl_bed)->result();
    }
    
    public function bed_by_id($param) {
        return $this->db->get_where($this->tbl_bed,array('bed_aid'=>$param))->row_array();
    }
    
    
    public function update_bed($id) {
      
        $data = array(

            'bed_description' => $this->input->post('description'),
            'bed_number' => $this->input->post('bedlimit'),
        );

        $this->db->where(array('bed_aid'=>$id));
        $this->db->update($this->tbl_bed, $data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
}
