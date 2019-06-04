<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Getlocation extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('pagination');
        $this->load->library('encrypt');
        $this->load->helper(array('form', 'url'));
        $this->load->model("site/modsite","site");
        //header('Content-Type: application/json; charset=utf-8');
    }
    function getAutoLocation()
    {
        $q = $this->input->get('q');
        header("content-type:text/x-json");
        $result = $this->site->autoLocation($q);
        echo json_encode($result);
    }
}