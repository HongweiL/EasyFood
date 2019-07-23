<?php
class Papers_model extends CI_Model{
  public function __construct() {
    $his->load->database();
  }

  public function get_paper($year = FALSE) {
    if ($year === FALSE) {
      $query = $this->db->get(‘papers’);
      return $query->result_array();
    }
    $query = $this->db->get_where(‘papers’, array(‘year’ => $year));
    return $query->row_array();
  }

}
