<?php

/*
  Author: T. Siva Kumar
  Date: 25-03-2015
  Version: 1.0
 */

class Login extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->load->library('template');
    $this->load->library('parser');
    $this->template->set_template('admin_template');
    $this->load->model("login_model");
    $this->load->helper('common_helper');
  }

  function login_main() {
    if (check_session_exists()) {
      redirect('admin/users_list', 'refresh');
    } else {
      $data = array();
      $data['login'] = 'login_page';
      $this->template->write('admin_header', $this->load->view('admin_header', $data, true));
      $this->template->write('common_js', $this->load->view('js/common_js', $data, true));
      $this->template->write('admin_js', $this->load->view('js/login_js', $data, true));
      $this->template->write('main_content', $this->load->view('admin_login_form', $data, true));
      $this->template->write('admin_footer', $this->load->view('admin_footer', $data, true));
      $this->template->render();
    }
  }

  function login_authenticate() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $uri_segment = $this->input->post('uri_segment');
    log_message('error', __METHOD__);
    $result = $this->login_model->login_authenticate($username, encrypt_password($password), $uri_segment);
    if (count($result) > 0 && $result['id'] != '') {
      $this->session->set_userdata('user_id', $result['id']);
      $this->session->set_userdata('user_email', $result['email']);
      $this->session->set_userdata('username', $result['username']);
      $this->session->set_userdata('role_id', $result['role_id']);
      $this->session->set_userdata('link', base_url() . $uri_segment . '/');
      $status = 'y';
      $login_session = array(
          'session_id' => $this->session->userdata('session_id'),
          'login_ip' => $this->input->ip_address(),
          'login_time' => current_timestamp_database(),
          'login_client' => $this->input->user_agent(),
          'user_id' => $result['id']
      );
      $this->login_model->session_details($login_session);
      $remember_me = ($this->input->post('remember_me')) ? TRUE : FALSE;
      if ($remember_me) { // set sess_expire_on_close to 0 or FALSE when remember me is checked.
        log_message('error', __METHOD__ . 'remember me called status' . $remember_me);
        $this->session->sess_expire_on_close = 'false';
      }
    } else {
      $status = 'n';
    }
    echo json_encode(array('status' => $status, 'uri_segment' => $uri_segment));
  }

  function logout() {
//    $logout_session = array(
//        'session_id' => $this->session->userdata('session_id'),
//        'user_id' => $this->session->userdata('user_id')
//    );
//     $this->login_model->update_session($logout_session);
    $this->login_model->update_session($this->session->userdata('user_id'), $this->session->userdata('session_id'));

    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('client_code');
    $this->session->unset_userdata('role_id');
    // $this->session->unset_userdata('link');
    if ($this->session->userdata('link') != "") {
      redirect($this->session->userdata('link'), 'refresh');
    } else {
      redirect('admin/login', 'refresh');
    }
  }

  function update_password() {
    $user_id = $this->input->post('user_id');
    $password = $this->input->post('reset_password');
    $user_id = $this->login_model->update_password($user_id, $password);
    if ($user_id != "") {
      echo ALERT_SUCCESS;
    }
  }

}

?>