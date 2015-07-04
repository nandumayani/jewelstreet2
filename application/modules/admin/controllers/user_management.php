<?php

/*
  Author: T. Siva Kumar
  Date: 25-03-2015
  Version: 1.0
 */
error_reporting(0);

class User_management extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->library('parser');
    $this->template->set_template('main_template');
    $this->load->model("user_model");
    $this->load->helper('common_helper');
    $this->load->helper('string');
  }

  function users_list() {
    if (check_session_exists()) {
      log_message('error', __METHOD__ . 'allowed');
      $data = array();
      $data['uri_segment'] = $this->uri->segment(1);
      $this->template->write('admin_header', $this->load->view('admin_header', $data, true));
      $this->template->write('left_menu', $this->load->view('left_menu', $data, true));
      $this->template->write('common_js', $this->load->view('js/common_js', $data, true));
      if ($this->uri->segment(1) == "admin") {
        $this->template->write('admin_js', $this->load->view('js/user_js', $data, true));
        $this->template->write('main_content', $this->load->view('admin_user_list', $data, true));
      } else {
        $this->template->write('admin_js', $this->load->view('js/subclient_js', $data, true));
        $this->template->write('main_content', $this->load->view('admin_client_list', $data, true));
      }
      $this->template->write('admin_footer', $this->load->view('admin_footer', $data, true));
      $this->template->render();
    } else {
      redirect('admin/login', 'refresh');
    }
  }

  function users_sessions_list() {
    if (check_session_exists()) {
      log_message('error', __METHOD__ . 'allowed');
      $data = array();
      $data['uri_segment'] = $this->uri->segment(1);
      $this->template->write('admin_header', $this->load->view('admin_header', $data, true));
      $this->template->write('left_menu', $this->load->view('left_menu', $data, true));
      $this->template->write('common_js', $this->load->view('js/common_js', $data, true));
      $this->template->write('admin_js', $this->load->view('js/user_js', $data, true));
      $this->template->write('main_content', $this->load->view('admin_user_sessions_list', $data, true));
      $this->template->write('admin_footer', $this->load->view('admin_footer', $data, true));
      $this->template->render();
    } else {
      redirect('admin/login', 'refresh');
    }
  }

  function get_user_list($uri_segment = '') {
    $clients = $this->user_model->get_user_list($uri_segment);
    log_message('error', __METHOD__);
    log_array('error', $clients);
    echo '{ "data":' . json_encode($clients) . '}';
  }
  
  function get_user_sessions_list($uri_segment = '') {
    $clients = $this->user_model->get_user_sessions_list($uri_segment);
    log_message('error', __METHOD__);
    log_array('error', $clients);
    echo '{ "data":' . json_encode($clients) . '}';
  }
  

  function check_username() {
    $search_entry = $this->input->get_post('newEntry');
    if (!$this->user_model->check_username($search_entry)) {
      echo "true";
    } else {
      echo "false";
    }
  }

  function check_user_email() {
    $search_entry = $this->input->get_post('newEntry');
    if (!$this->user_model->check_user_email($search_entry)) {
      echo "true";
    } else {
      echo "false";
    }
  }

  function insert_update_user() {
    $user_data = array();
    $postData = array_map('trim', $this->input->post());
    log_array('error', $postData);
    $user_id = ($postData['user_id'] != "") ? $postData['user_id'] : "";
    $uri_segment = $this->input->post('uri_segment');
    $user_data = array(
        'first_name' => $postData['first_name'],
        'last_name' => $postData['last_name'],
        'username' => $postData['username'],
        'email' => $postData['email'],
        'role_id' => $postData['user_type'],
        'created_by' => $this->session->userdata('user_id'),
        'created_datetime' => current_timestamp_database(),
        'status' => 'y'
    );
    if ($user_id == "") {
      $user_data['password'] = encrypt_password(strtoupper($postData['password']));
    }
    $user_status = $this->user_model->insert_update_user($user_id, $user_data, $uri_segment);
    if ($user_status != "" && $user_id == "") {
      log_message('error', __METHOD__ . '======user email called=====' . $user_status);
      $email_template_user = "USER_REGISTRATION_EMAIL";
      $to = $postData['email'];
      $from = EMAIL_SEND_FROM;
      $new_client_link = base_url() . 'user/' . strtoupper($postData['password']);
      $email_required_data = array(
          '{REGISTRATION_FIRST_LAST_NAME}' => $postData['first_name'] . " " . $postData['last_name'],
          '{CLIENT_LINK}' => $new_client_link,
          '{USERNAME}' => $postData['username'],
          '{PASSWORD}' => strtoupper($postData['password'])
      );
      $mail_status = send_mail($to, $from, $email_template_user, $email_required_data);
    }
    echo "success";
  }

  function view_user($user_id = '') {
    log_message('error', __METHOD__ . ' user id : ' . $user_id);
    $user_id = encrypt_decrypt('decrypt', $user_id);
    log_message('error', __METHOD__ . 'After Decrypt user id : ' . $user_id);
    $data['user_details'] = $this->user_model->get_user_details($user_id);
    $this->template->write('admin_header', $this->load->view('admin_header', $data, true));
    $this->template->write('left_menu', $this->load->view('left_menu', $data, true));
    $this->template->write('common_js', $this->load->view('js/common_js', $data, true));
    $this->template->write('admin_js', $this->load->view('js/user_js', $data, true));
    $this->template->write('main_content', $this->load->view('admin_view_user', $data, true));
    $this->template->write('admin_footer', $this->load->view('footer', $data, true));
    $this->template->render();
  }

}
