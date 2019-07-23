<?php

class createpdf extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->helper('cookie');
    $this->load->helper('url_helper');
    $this->load->model('Easyfood_model');
  }

  function pdf($did)
  {
      $this->load->helper('pdf_helper');

      $data['detail'] = $this->Easyfood_model->getDish($did);

      $this->load->view('pdfreport', $data);
  }

}

?>
