<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

if (!function_exists('create_slt_box')) {

  function create_slt_box($name = '', $id = '', $class = '', $label = '', $options = array(), $event = '', $selected = '', $multiple = false, $required = '', $params = '', $select = array()) {

//    if ($multiple == true) {
//      $return = '<select name="' . $name . '" class="' . $class . '" id="' . $id . '" multiple="multiple" onchange="' . $event . '"';
//    } else {
//      $return = '<select name="' . $name . '" class="' . $class . '" id="' . $id . '" onchange="' . $event . '"';
//    }

    if ($multiple == true) {
      $return = '<select name="' . $name . '" class="' . $class . '" id="' . $id . '" multiple="multiple" ';
    } else {
      $return = '<select name="' . $name . '" class="' . $class . '" id="' . $id . '" ';
    }

    if (is_array($params)) {
      foreach ($params as $key => $value) {
        $return.= ' ' . $key . '="' . $value . '"';
      }
    } else {
      $return.= $params;
    }
    $return.= '>';
    if ($label != '') {
      $return.='<option value="">' . $label . '</option>';
    }
    if ($multiple == true) {
      foreach ($options as $key => $value) {
        $return.='<option value="' . $key . '"' . (in_array($key, $select) ? 'selected="selected"' : '') . '>' . $value . '</option>';
      }
    } else {
//      foreach ($options as $key => $value) {
//        $return.='<option value="' . $key . '"' . ($selected != $key ? '' : ' selected="selected"') . '>' . $value . '</option>';
//      }
      ############ Nandu #############
      foreach ($options as $key => $value) {
        if (is_array($value)) {
          $return.='<optgroup label="' . $key . '">';
          foreach ($value as $key1 => $value1) {
            $return.='<option value="' . $key1 . '"' . ($selected != $key1 ? '' : ' selected="selected"') . '>' . $value1 . '</option>';
          }
          $return.='</optgroup>';
        } else {
          $return.='<option value="' . $key . '"' . ($selected != $key ? '' : ' selected="selected"') . '>' . $value . '</option>';
        }
      }
      ############ Nandu #############
    }
    return $return . '</select>';
  }

}

if (!function_exists('log_array')) {

  function log_array($level = 'INFO', $array, $php_error = FALSE) {
    ob_start();
    var_export($array);
    $tab_debug = ob_get_contents();
    ob_end_clean();

    $CI = &get_instance();
    $CI->log->write_log($level, $tab_debug, $php_error);
  }

}

if (!function_exists('current_timestamp_database')) {

  function current_timestamp_database() {
    $CI = &get_instance();
    $CI->load->helper('date');
    return date("Y-m-d H:i:s", local_to_gmt(time()));
  }

}


if (!function_exists('simple_captcha_elements')) {

  function simple_captcha_elements() {
    $operations = array('-', '+', '*');
    $data = array();
    $data['one'] = mt_rand(0, 9);
    $data['two'] = mt_rand(0, 9);
    $data['operation'] = $operations[mt_rand(0, 2)];
    $data['total'] = 0;
    eval('$data["total"] = $data["one"] ' . $data['operation'] . ' $data["two"];');
    $data['operation'] = $data['operation'] == '*' ? 'x' : $data['operation'];
    return $data;
  }

}

if (!function_exists('encrypt_password')) {

  function encrypt_password($password = '') {
    $encrypt_password = md5($password);
    return $encrypt_password;
  }

}

if (!function_exists('encrypt_decrypt')) {

  function encrypt_decrypt($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'This is my secret key';
    $secret_iv = 'This is my secret iv';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
      $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
      $output = base64_encode($output);
    } else if ($action == 'decrypt') {
      $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    log_message('error', __METHOD__ . $output);
    return $output;
  }

}

if (!function_exists('check_session_exists')) {

  function check_session_exists() {
    $CI = &get_instance();
    $CI->load->library('session');
    if ($CI->session->userdata('user_id') != "") {
      log_message('error', __METHOD__ . $CI->session->userdata('link'));
      return true;
    } else {
      log_message('error', __METHOD__ . $CI->session->userdata('link'));
      return false;
    }
  }

}


if (!function_exists('generate_image_thumbnail')) {

  function generate_image_thumbnail($source_image_path, $thumbnail_image_path, $THUMBNAIL_IMAGE_MAX_WIDTH = '', $THUMBNAIL_IMAGE_MAX_HEIGHT = '') {
    list($source_image_width, $source_image_height, $source_image_type) = getimagesize($source_image_path);
    switch ($source_image_type) {
      case IMAGETYPE_GIF:
        $source_gd_image = imagecreatefromgif($source_image_path);
        break;
      case IMAGETYPE_JPEG:
        $source_gd_image = imagecreatefromjpeg($source_image_path);
        break;
      case IMAGETYPE_PNG:
        $source_gd_image = imagecreatefrompng($source_image_path);
        break;
    }
    if ($source_gd_image === false) {
      return false;
    }
    $source_aspect_ratio = $source_image_width / $source_image_height;
    $thumbnail_aspect_ratio = $THUMBNAIL_IMAGE_MAX_WIDTH / $THUMBNAIL_IMAGE_MAX_HEIGHT;
    if ($source_image_width <= $THUMBNAIL_IMAGE_MAX_WIDTH && $source_image_height <= $THUMBNAIL_IMAGE_MAX_HEIGHT) {
      $thumbnail_image_width = $source_image_width;
      $thumbnail_image_height = $source_image_height;
    } elseif ($thumbnail_aspect_ratio > $source_aspect_ratio) {
      $thumbnail_image_width = (int) ($THUMBNAIL_IMAGE_MAX_HEIGHT * $source_aspect_ratio);
      $thumbnail_image_height = $THUMBNAIL_IMAGE_MAX_HEIGHT;
    } else {
      $thumbnail_image_width = $THUMBNAIL_IMAGE_MAX_WIDTH;
      $thumbnail_image_height = (int) ($THUMBNAIL_IMAGE_MAX_WIDTH / $source_aspect_ratio);
    }
    $thumbnail_image_width = $THUMBNAIL_IMAGE_MAX_WIDTH;
    $thumbnail_image_height = $THUMBNAIL_IMAGE_MAX_HEIGHT;
    $thumbnail_gd_image = imagecreatetruecolor($thumbnail_image_width, $thumbnail_image_height);
    imagecopyresampled($thumbnail_gd_image, $source_gd_image, 0, 0, 0, 0, $thumbnail_image_width, $thumbnail_image_height, $source_image_width, $source_image_height);
    imagejpeg($thumbnail_gd_image, $thumbnail_image_path, 90);
    imagedestroy($source_gd_image);
    imagedestroy($thumbnail_gd_image);
    return true;
  }

}


if (!function_exists('replace_phrase')) {

  function replace_phrase($matches) {
    return $matches[1] . ($matches[2] + 1);
  }

}


if (!function_exists('generate_unique_id')) {

  function generate_unique_id() {
    return uniqid();
  }

}

if (!function_exists('get_user_name')) {

  function get_user_name($created_by = '') {
    $result = '';
    $CI = &get_instance();
    $query = $CI->db->select('concat(first_name, " ", last_name) as username', false)
            ->from('js_users')
            ->where('id', $created_by)
            ->get();
    log_array('error', __METHOD__ . $CI->db->last_query());
    if ($query->num_rows() > 0) {
      $row = $query->row_array();
      $result = $row['username'];
    }
    return ($result == 'admin admin') ? 'Admin' : $result;
  }

}

if (!function_exists('date_format_database')) {

  function date_format_database($input_date = '') {
    return date('Y-m-d', strtotime($input_date));
  }

}

if (!function_exists('date_format_application')) {

  function date_format_application($input_date = '') {
    return date('Y-m-d H:i:s', strtotime($input_date));
  }

}




