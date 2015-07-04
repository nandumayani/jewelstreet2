<?php

/*
  Author: T. Siva Kumar
  Date: 25-03-2015
  Version: 1.0
 */
error_reporting(0);

class Sale_management extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->library('parser');
    $this->template->set_template('main_template');
    $this->load->model("sale_model");
    $this->load->helper('common_helper');
    $this->load->helper('string');
    $data['login'] = '';
  }

  function insert_update_quantity() {
    $postData = array_map('trim', $this->input->post());
    log_message('error', __METHOD__);
    log_array('error', $postData);

    $quantity_data['user_id'] = $this->session->userdata('user_id');
    $quantity_data['quantity'] = $postData['quantity'];
    $quantity_data['created_datetime'] = current_timestamp_database();
    $quantity_data['status'] = 'y';
    $row_id = $this->sale_model->insert_update_quantity($quantity_data);

    echo $row_id;
  }

  function get_sales_list($uri_segment = '') {
    $sales = $this->sale_model->get_sales_list($uri_segment);
    log_message('error', __METHOD__);
    log_array('error', $sales);
    echo '{ "data":' . json_encode($sales) . '}';
  }

  function sale_list() {
    if (check_session_exists()) {
      log_message('error', __METHOD__ . 'allowed');
      $data = array();
      $data['login'] = '';
      $data['uri_segment'] = $this->uri->segment(1);
      $this->template->write('admin_header', $this->load->view('admin_header', $data, true));
      $this->template->write('left_menu', $this->load->view('left_menu', $data, true));
      $this->template->write('common_js', $this->load->view('js/common_js', $data, true));
      $this->template->write('admin_js', $this->load->view('js/sale_js', $data, true));
      $this->template->write('main_content', $this->load->view('admin_sale_list', $data, true));
      $this->template->write('admin_footer', $this->load->view('admin_footer', $data, true));
      $this->template->render();
    } else {
      redirect('admin/login', 'refresh');
    }
  }

  function get_sale_list($uri_segment = '') {
    $sales = $this->sale_model->get_sale_list($uri_segment);
    log_message('error', __METHOD__);
    log_array('error', $sales);
    echo '{ "data":' . json_encode($sales) . '}';
  }


}
