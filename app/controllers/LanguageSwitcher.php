<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LanguageSwitcher extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
 
    function switchLanguage($language = "") {
        if($language == "khmer"){
            $this->session->set_userdata('site_lang', $language);
        }else if($language == "english"){
        	$this->session->set_userdata('site_lang', $language);
        }
        redirect($_SERVER['HTTP_REFERER']);
        //redirect(base_url());
    }
}?>