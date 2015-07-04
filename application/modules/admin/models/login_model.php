<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login_model
 *
 * @author T. Siva Kumar
 */
class Login_model extends CI_Model {

  function login_authenticate($username = '', $password = '', $uri_segment = '') {
    $result = array();
    $query = $this->db->select('u.id, u.username, u.role_id, u.email')
        ->from('js_users u')
        ->join('js_user_roles ur', 'ur.id = u.role_id', 'Left')
        ->where('u.username', $username)
        ->where('u.password', $password)
        ->where('u.status', 'y');

    if ($uri_segment == 'admin') {
      $query = $this->db->where('ur.id', ADMIN_ID)->get();
    } else {
      $query = $this->db->where_in('ur.id', array('2', '3'))->get();
    }
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());
    if ($query->num_rows() > 0) {
      $result = $query->row_array();
    }
    return $result;
  }

  function session_details($session_details = array()) {
    $this->db->insert('js_user_sessions', $session_details);
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());
    return true;
  }

  function update_session_old($where_arr = array()) {
    $this->db->where($where_arr)->update('js_user_sessions', array('logout_time' => current_timestamp_database()));
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());
    return true;
  }
  
  function update_session($user_id = '', $session_id = '') {
    $this->db->where("user_id = '".$user_id."' AND logout_time IS null")->update('js_user_sessions', array('logout_time' => current_timestamp_database()));
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());
    return true;
  }

}
