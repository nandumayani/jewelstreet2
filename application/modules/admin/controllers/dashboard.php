<?php

/*
  Author: T. Siva Kumar
  Date: 25-03-2015
  Version: 1.0
 */

class Dashboard extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->library('parser');
    $this->template->set_template('main_template');
    $this->load->model("dashboard_model");
    $this->load->helper('common_helper');
  }

  function index() {
    
  }
}
