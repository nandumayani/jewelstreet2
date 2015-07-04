<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_model
 *
 * @author T. Siva Kumar
 */
class User_model extends CI_Model {

  function get_user_list($uri_segment = '') {
    $return_arr = array();
    $query = $this->db->select('id, first_name, last_name, username, gender, shop, status', FALSE)
        ->from('js_users')
        ->where_in('role_id', array('2', '3'))
        ->get();
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());

    if ($query->num_rows() > 0) {
      $results = $query->result_array();
      $i = 0;
      foreach ($query->result_array() as $result) {
//        $res['user_id'] = $result['id'];
         $res['name'] = $result['first_name'] . ' ' . $result['last_name'];
       //  $res['name'] = $result['last_name'];
        $res['username'] = $result['username'];
        $res['gender'] = $result['gender'];
        $res['shop'] = $result['shop'];
        $res['status'] = ($result['status'] == 'y') ? 'Active' : 'Inactive';

        $return_arr[] = array_values($res);
        $i++;
      }
    }
    return $return_arr;
  }

  function get_user_sessions_list($uri_segment = '') {
    $return_arr = array();
    $query = $this->db->select('us.user_id, u.first_name, u.last_name, u.shop,  us.login_time, us.logout_time, MINUTE(TIMEDIFF(us.login_time, us.logout_time)) AS timegap ', FALSE)
        ->from('js_user_sessions us')
        ->join('js_users u', 'us.user_id = u.id', 'LEFT')
        ->where_in('u.role_id', array('2', '3'))
        ->order_by('us.login_time', 'DESC')
        ->get();
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());

    if ($query->num_rows() > 0) {
      $results = $query->result_array();
      $i = 0;
      foreach ($query->result_array() as $result) {
//        $res['user_id'] = $result['id'];
        $res['name'] = $result['first_name'] . ' ' . $result['last_name'];
        $res['shop'] = $result['shop'];
        $res['login_time'] = $result['login_time'];
        $res['logout_time'] = $result['logout_time'];
        $res['timegap'] = $result['timegap'];

        $return_arr[] = array_values($res);
        $i++;
      }
    }
    return $return_arr;
  }

  function insert_update_user($user_id = '', $user_data = '', $uri_segment = '') {
    $result = '';
    if ($user_id == "") {
      $this->db->insert('js_users', $user_data);
      $result = $this->db->insert_id();
    } else {
      $sub_client = ($uri_segment == "admin") ? 'n' : 'y';
      $this->db->where('id', $user_id)->update('js_users', $user_data);
      $result = $user_id;
    }
    return $result;
  }

  function get_user_details($user_id = '') {
    $results = array();
    $query = $this->db->select('id, first_name, last_name, username, gender, shop, status')
        ->from('js_users')
        ->where('id', $user_id)
        ->get();
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());
    if ($query->num_rows() > 0) {
      $results = $query->row_array();
    }
    return $results;
  }

}
