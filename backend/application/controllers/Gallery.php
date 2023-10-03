<?php

defined('BASEPATH')OR exit('Direct Access Not Allowed');

class Gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('gallery_model');
    }

    public function index($id = "") {
        if ($id != "") {
            $data['getid'] = $this->db->get_where('tbl_image', array('imgtitle_id' => $id))->row_array();
        }

        $data['body'] = 'Gallery/Index';
        $data['pagehead'] = "Image Gallery";
        $this->tpl->admin($data);
    }

    function do_upload() {
        $config['upload_path'] = './uploads/gallery/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = 90240;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $upload_errors = $this->upload->display_errors();
            echo json_encode($upload_errors);
        } else {
            $file_name = 'uploads/gallery/' . $this->upload->data('file_name');
            $title = $this->input->post('title');
            $id = $this->input->post('id');

            $result = $this->gallery_model->uploadImg($file_name, $title, $id);
            echo json_encode($result);
        }
    }

    public function GalleryList() {
        $data['body'] = 'Gallery/Gallery';
        $data['pagehead'] = "Image Gallery List";
        $data['image'] = $this->db->get('tbl_image')->result();
        $this->tpl->admin($data);
    }

    public function Delete() {
        $id = $this->uri->segment(2);
        $this->db->trans_begin();

        $this->db->delete('tbl_image_gallery', array('imgtitle_id' => $id));
        $this->db->delete('tbl_image', array('imgtitle_id' => $id));

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            redirect('Gallery/GalleryList');
        } else {
            $this->db->trans_commit();
            redirect('Gallery/GalleryList');
        }
    }

    public function getImages() {
        $id = $this->input->post('id');
        $result = $this->db->get_where('tbl_image_gallery', array('imgtitle_id' => $id))->result_array();
        echo json_encode($result);
    }

    public function RemoveImg() {
        $id = $this->input->post('id');
        $this->db->trans_begin();

        $this->db->delete('tbl_image_gallery', array('img_id' => $id));


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode($id);
        } else {
            $this->db->trans_commit();
            echo json_encode($id);
        }
    }

    public function slider() {
        $data['list'] = $this->gallery_model->getall_slider_Images();
        $data['body'] = 'Gallery/slider';
        $data['pagehead'] = "Slider Image";
        $this->tpl->admin($data);
    }

    function sliderdo_upload() {
        $config['upload_path'] = './uploads/slider/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 90240;
        $config['max_width'] = 1950;
        $config['max_height'] = 400;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $upload_errors['error'] = $this->upload->display_errors();
            $upload_errors['success']='';
            echo json_encode($upload_errors);
        } else {
            $file_name = 'uploads/slider/' . $this->upload->data('file_name');


            $result = $this->gallery_model->uploadsliderImg($file_name);
            $upload_errors['error'] = '';
            $upload_errors['success']='';
            echo json_encode($result);
        }
    }

    function get_slider_Images() {
        $result = $this->gallery_model->get_slider_Images();
        echo json_encode($result);
    }

    function RemoveImgslider() {

        $id = $this->input->post('id');
        $this->db->trans_begin();

        $this->db->delete('home_slider', array('sld_id' => $id));


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            echo json_encode($id);
        } else {
            $this->db->trans_commit();
            echo json_encode($id);
        }
    }

    /*========== Room Rent Image =======*/
    
    public function roomrent() {
        $data['body'] = 'Gallery/room_rent';
        $data['pagehead'] = "Room Rent Images";
        $this->tpl->admin($data);
    }
    
    function do_upload_room() {
        $config['upload_path'] = './uploads/gallery/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size'] = 90240;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $upload_errors = $this->upload->display_errors();
            echo json_encode($upload_errors);
        } else {
            $file_name = 'uploads/gallery/' . $this->upload->data('file_name');
          

            $result = $this->gallery_model->uploadImg_room($file_name);
            echo json_encode($result);
        }
    }
    
        public function getImages_room() {
        
        $result = $this->gallery_model->getImages_room();
        echo json_encode($result);
    }

    public function RemoveImg_room() {
        $id = $this->input->post('id');
        $result = $this->gallery_model->RemoveImg_room($id);
        if($result !=false){
            unlink($result['rm_image']);
            echo json_encode(true);
        } else {
            echo json_encode(true);
        }
        
    }
    
}
