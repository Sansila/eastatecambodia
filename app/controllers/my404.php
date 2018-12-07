<?php
   class My404 extends CI_Controller
   {
      public function __construct()
      {
         parent::__construct();
         $this->load->model("site/modsite","site");
      }
      public function index()
      {
         $this->output->set_status_header('404');
   
         $datas['profile'] = $this->site->getSiteprofile();
         $datas['menu'] = $this->site->get_menu();
         $this->load->view('site/contain/header',$datas);
         $this->load->view('site/404page');
         $this->load->view('site/contain/footer',$datas);
      }
   }
?>