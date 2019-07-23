<?php
class post_model extends CI_Model {
  public function __construct() {
    $this->load->database();
  }
  public function get_post($slug = FALSE) {
    if ($slug === FALSE) {
      $query = $this->db->get('posts');
      return $query->result_array();
    }
    $query = $this->db->get('posts', array('slug' => $slug));
    return $query->row_array();
  }
}
 ?>
