<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project_model
 *
 * @author T. Siva Kumar
 */
class Sale_model extends CI_Model {

  //put your code here
  function insert_update_quantity($input_arr = array()) {
    $this->db->insert('js_sales', $input_arr);
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());
    return $this->db->insert_id();
  }

  function get_sales_list($uri_segment = '') {
    $return_arr = array();
    $action = '';
    $query = $this->db->select('s.id, u.first_name, u.last_name, u.shop, s.quantity, s.created_datetime')
        ->from('js_sales s')
        ->join('js_users u', 's.user_id = u.id', 'LEFT')
        ->where_in('s.status', array('y'));
    if ($uri_segment == 'admin') {
      $query = $this->db->order_by('s.created_datetime', 'desc')->get();
    } else {
      $query = $this->db->where('s.user_id', $this->session->userdata('user_id'))->order_by('s.created_datetime', 'desc')->get();
    }
    log_message('error', __METHOD__ . '--> ' . $this->db->last_query());

    if ($query->num_rows() > 0) {
      $i = 0;
      foreach ($query->result_array() as $result) {
        // $res['id'] = $result['id'];
        $res['name'] = $result['first_name'] . ' ' . $result['last_name'];
        $res['shop'] = $result['shop'];
        $res['quantity'] = $result['quantity'];
        $res['date'] = date_format_application($result['created_datetime']);

        $return_arr[] = array_values($res);
        $i++;
      }
    }
    return $return_arr;
  }

}
