<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dashboard
 *
 * @author AFRAKIB
 */
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $data['body']='Dashboard/index';
        $data['pagehead']='Dashboard';
        $data['ddata']= $this->glob_model->dashboard_data();
        $this->tpl->admin($data);
    }
    
}
