<?php

class easyfood_model extends CI_Model {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function checkLogin($uid, $psw) {
    $query = $this->db->query("SELECT * FROM users WHERE uid =? OR email =?;", array($uid, $uid));
    $result = $query->row();
    if (password_verify($psw, $result->password)) { //https://www.youtube.com/watch?v=Qq96ZgiY1dY
        return $result;
    } else {
      return null;
    }
    return 0;

  }

  public function createNewUser($uid, $fname, $lname, $email, $psw, $code) {
    $sql = "SELECT * FROM users WHERE uid =?OR email =?;";
    $check = $this->db->query($sql, array($uid, $email));
    if ($check->num_rows()) {
      return 2;
    } else {
      $psw  = password_hash($psw, PASSWORD_DEFAULT); //https://www.youtube.com/watch?v=Qq96ZgiY1dY
      $sql = "INSERT INTO users (firstname, lastname, email,
              uid, password, activate) VALUES (?,?,?,?,?,?);";
      $query = $this->db->query($sql, array($fname, $lname, $email, $uid, $psw, $code));
      //$infoSql = "INSERT INTO information (uid, address, gender) VALUES (?,?,?)";
      $setInfo = $this->db->query("INSERT INTO information (uid, address, gender) VALUES (?,?,?)", array($uid, 'Prefer Not To Say', 'Prefer Not To Say'));
      $check = $this->db->query("SELECT * FROM users WHERE uid = ?;", array($uid));
      if ($check->num_rows()) {
        return 1;
      } else {
        return 0;
      }
    }
  }

  public function insertComment($uid, $restaurant, $comment) {
    $sql = "INSERT INTO comment (uid, restaurant, comment) VALUES (?, ?, ?);";
    $query = $this->db->query($sql, array($uid, $restaurant, $comment));
    $check = $this->db->query("SELECT * FROM comment WHERE uid = ?;", array($uid));
    if ($check->num_rows()) {
      return 1;
    } else {
      return 0;
    }
  }

  public function retriveComments($uid) {
    $query = $this->db->query("SELECT * FROM comment WHERE uid = ?;", array($uid));
    return $query->result();
  }

  public function uploadImage($uid, $name, $image) {
    $exist = $this->db->query("SELECT image FROM photo WHERE uid = ?;", array($uid));
    $num = $exist->num_rows();
    $sql = "INSERT INTO photo (name, image, uid) VALUES (?, ?,?);";
    $query = $this->db->query($sql, array($name, $image, $uid));
    $check = $this->db->query("SELECT image FROM photo WHERE uid = ?;", array($uid));
    if ($check->num_rows() == ($num + 1)) {
      return 1;
    } else {
      return 0;
    }


  }

  public function getImage($uid) {
    $data = '';
    $query = $this->db->query("SELECT image FROM photo WHERE uid=?;", array($uid));
    if ($query->num_rows())
    {
        $data = $query->row_array();
        $data = $data['image'];
    }
    return $data;
  }

  public function getImageNum($uid) {
    $query = $this->db->query("SELECT image FROM photo WHERE uid = ?;", array($uid));
    return $query->num_rows();
  }

  public function getPersonalInfo($uid) {
    $query = $this->db->query("SELECT * FROM users WHERE uid = ?;", array($uid));
    return $query->row();
  }

  public function getPersonalInfo2($uid) {
    $query = $this->db->query("SELECT * FROM information WHERE uid = ?;", array($uid));
    return $query->row();
  }

  public function updateInfo($uid, $fname, $lname, $email, $gender,$address) {
    $sql = "UPDATE users SET firstname = ?, lastname = ?,
      email = ? WHERE  uid = ?;";
    $query = $this->db->query($sql, array($fname, $lname, $email, $uid));
    $sql2 = "UPDATE information SET address = ?, gender = ? WHERE uid = ?;";
    $query2 = $this->db->query($sql2, array($address, $gender, $uid));
  }

  public function search($search) {
    $this->db->select('*');
    $this->db->from('dishes');
    $this->db->like('name',$search);
    $this->db->or_like('restaurant',$search);
    $this->db->or_like('category',$search);
    $query = $this->db->get();
    if ($query->num_rows()) {
      return $query->result();
    }
    return 0;
  }

  public function setQuestions($uid, $email, $q1, $q2, $a1, $a2) {
    if ($q1 == "addr") {
      $d1 = "What is your current address?";
    }elseif ($q1 == 'city') {
      $d1 = "What is your born city?";
    } else {
      $d1 = "What is your middle name?";
    }
    if ($q2 == "pet") {
      $d2 = "What is the name of your pet?";
    }elseif ($q1 == 'mother') {
      $d2 = "What is the name of your mother?";
    } else {
      $d2 = "What is the name of your father?";
    }
    $sql = "INSERT INTO securequestion (uid,email, q1, d1, a1, q2, d2, a2)
            VALUES (?, ?,?,?, ?, ?, ?, ?);";
    $query = $this->db->query($sql, array($uid, $email, $q1, $d1, $a1, $q2, $d2, $a2));
    $check = $this->db->query("SELECT * FROM securequestion WHERE uid = ?;", array($uid));
    if ($check->num_rows()) {
      return 1;
    } else {
      return 0;
    }

  }

  public function getQuestions($uid) {
    $query = $this->db->query("SELECT * FROM securequestion WHERE uid = ? OR email = ?;", array($uid, $uid));
    return $query->row();
  }

  public function resetPsw($uid, $psw) {
    $sql = "UPDATE users SET password = ? WHERE uid = ? OR email = ?;";
    $query = $this->db->query($sql, array($psw, $uid, $uid));
    $sql2 = "SELECT * FROM users WHERE uid = ? OR email = ?;";
    $info = $this->db->query($sql2, array($uid, $uid));
    return $info->row();
  }

  public function getusername($uid) {
    $query = $this->db->query("SELECT * FROM users WHERE uid = ?;", array($uid));
    if ($query->num_rows()) {
      return 0;
    }
    return 1;
  }

  public function getuseremail($email) {
    $query = $this->db->query("SELECT * FROM users WHERE email = ?;", array($email));
    if ($query->num_rows()) {
      return 0;
    }
    return 1;
  }

  public function getDish($did) {
    $query = $this->db->query("SELECT * FROM dishes WHERE did = ?;", array($did));
    return $query->row();
  }

  public function changeStatus($uid) {
    $query = $this->db->query("UPDATE users SET activate = ? WHERE uid = ?;", array('-1', $uid));
  }

  public function search1($key) {
    $sql = "SELECT * FROM dishes WHERE name LIKE '%".$key."%'";
    $query = $this->db->query($sql);
    return $query->result();
  }

  public function addToChart($did, $uid, $name, $price) {
    $sql = "INSERT INTO userchart (uid, did, dishname, price) VALUES (?, ?, ?, ?);";
    $query = $this->db->query($sql, array($uid, $did, $name, $price));
    return "This dish has been added into chart";
  }

  public function retriveChart($uid) {
    $sql = "SELECT * FROM userchart WHERE uid = ?;";
    $query = $this->db->query($sql, array($uid));
    return $query->result();
  }

  public function removeDish($uid, $did) {
    $sql = "DELETE FROM userchart WHERE uid = ? AND did = ?;";
    $this->db->query($sql, array($uid, $did));
    return "This dish has been remove successfully";
  }

  public function giveFav($did) {
    $this->db->query("UPDATE dishes SET fav = fav + 1 WHERE did = ?", array($did));
    return "Vote it successfully";
  }

  public function addDish($restaurant, $category, $name, $price, $avaliable) {
    $sql = "INSERT INTO dishes (avalibility, name, restaurant, price, category) VALUES (?, ?, ?, ?, ?);";
    $this->db->query($sql, array($avaliable, $name, $restaurant, $price, $category));
    return "Dish Added";
  }
}




?>
