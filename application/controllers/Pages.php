<?php
/**
 *
 */
class Pages extends CI_Controller
{

  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->helper('form');
    $this->load->library('session');
    $this->load->helper('cookie');
    $this->load->helper('url_helper');
    $this->load->model('Easyfood_model');
  }

  public function read()
{
  $object['controller']=$this;
  $this->load->view('read',$object);
}

  public function view($page = 'index') {
    if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
      show_404();
    }
    $data['title']  = ucfirst($page);
    $this->load->view('templates/header');
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
  }

  public function insertUser() {
    $uid = $this->input->post('uid');
    $fname = $this->input->post('fname');
    $lname = $this->input->post('lname');
    $email = $this->input->post('email');
    $psw = $this->input->post('psw');
    $code = $this->generateCode($fname, $lname);
    if (isset($_POST['submit'])) {
      $data['result'] = $this->Easyfood_model->createNewUser($uid, $fname, $lname, $email, $psw, $code);
      if ($data['result'] == 1) {
          $newdata = array(
          'uid' => $uid,
          'fname' => $fname,
          'lname' => $lname,
          'email' =>$email,
          'psw' => $psw,
          'activate'=>$code
         );
         $this->session->set_userdata($newdata);
         $this->send_verify_email();
         $this->load->view('templates/header');
         $this->load->view('pages/resetQuestions', $data);
         $this->load->view('templates/footer');
      } else {
        if ($data['result']) {
          $data['result'] = "User name or email has been registered";
        } else {
          $data['result'] = "Register Failed, Please try again";
        }


        $this->load->view('templates/header');
        $this->load->view('pages/signup', $data);
        $this->load->view('templates/footer');
      }
    } else {
      $this->load->view('templates/header');
      $this->load->view('pages/signup', $data);
      $this->load->view('templates/footer');
    }
  }

  public function login() {
    $uid = $this->input->post('uid');
    $psw = $this->input->post('psw');
    setcookie("uid", $uid, time()+86400, "/");
    $data['login'] = "Please submit your login information";
    if (isset($_POST['submit'])) {
      $data['login'] = $this->Easyfood_model->checkLogin($uid, $psw);
      if ($data['login'] === null) {
        $data['login'] = "Wrong Password";
        $this->load->view('templates/header');
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer');
      } elseif (!$data['login']) {
        $data['login'] = "User name or email does not exist";
        $this->load->view('templates/header');
        $this->load->view('pages/login', $data);
        $this->load->view('templates/footer');
      } else {
        $newdata = array(
          'uid' => $data['login']->uid,
          'fname' => $data['login']->firstname,
          'lname' => $data['login']->lastname,
          'email' => $data['login']->email,
          'psw' => $data['login']->password,
          'activate' => $data['login']->activate
        );
        $this->session->set_userdata($newdata);
        setcookie("uid", $uid, time()+86400, "/");
        if(isset($_POST['check'] )) {
          setcookie('psw', $psw, time()+84600, "/");
          setcookie('check', 'true', time()+84600, "/");
        }
        $this->load->view('templates/header');
        $this->load->view('pages/index', $data);
        $this->load->view('templates/footer');
      }
    }
  }

  public function uploadComment() {
    if (isset($_POST['submit'])) {
      $uid = $_SESSION['uid'];
      $restaurant = $_POST['restaurant'];
      $comment = $_POST['comment'];
      $data['result'] = $this->Easyfood_model->insertComment($uid, $restaurant, $comment);
      if ($data['result']) {
        $data['result'] = "Comment Post Successfully";
        redirect(base_url("pages/view/insertcomment?Comment post Successfully"));
      } else {
        $data['result'] = "Fail to Comment";
        redirect(base_url("pages/view/insertcomment?Failed to Comment"));
      }
    }
  }

  public function getComments() {
    $uid = $_SESSION['uid'];
    $data['comments'] = $this->Easyfood_model->retriveComments($uid);
    $this->load->view('templates/header');
    $this->load->view('pages/insertcomment', $data);
    $this->load->view('templates/footer');
  }

  public function uploadImage() {
    if (isset($_POST['submit'])) {
      $uid = $_SESSION['uid'];
      $image=addslashes (file_get_contents($_FILES['image']['tmp_name']));
      $name = addslashes($_FILES['image']['name']);
      $size = getimagesize($_FILES['image']['tmp_name']);
      if ($size == FALSE) {
        $data['upload'] = "That is not a image";
      } else {
        $data['upload'] = $this->Easyfood_model->uploadImage($uid, $name, $image);
        if (!$data['upload']) {
          $data['upload'] = "Fail to upload this image";
        } else {
          $data['upload'] = "Upload Successfully";
        }
      }
      $data['accountInfo'] = $this->Easyfood_model->getPersonalInfo($uid);
      $data['info'] = $this->Easyfood_model->getPersonalInfo2($uid);
      $this->load->view('templates/header');
      $this->load->view('pages/personalprofile', $data);
      $this->load->view('templates/footer');
    }
  }

  public function getImageNum() {
    if (isset($_POST['view'])) {
      $uid = $_SESSION['uid'];
      $data['imageNum'] = $this->Easyfood_model->getImageNum($uid);
    }
    $data['accountInfo'] = $this->Easyfood_model->getPersonalInfo($uid);
    $data['info'] = $this->Easyfood_model->getPersonalInfo2($uid);
    $this->load->view('templates/header');
    $this->load->view('pages/personalprofile', $data);
    $this->load->view('templates/footer');
  }

  public function displayImage() {
    $uid = $_SESSION['uid'];
    $image = $this->Easyfood_model->getImage($uid);
    header("Content-type: image/jpeg");
    print($image);
  }

  public function getPersonalInfo() {
    $uid = $_SESSION['uid'];
    $data['accountInfo'] = $this->Easyfood_model->getPersonalInfo($uid);
    $data['info'] = $this->Easyfood_model->getPersonalInfo2($uid);
    $this->load->view('templates/header');
    $this->load->view('pages/personalprofile', $data);
    $this->load->view('templates/footer');
  }


  public function logout() {
    $array_items = array('uid','fname', 'lname', 'email', 'psw');
    $this->session->unset_userdata($array_items);
    session_destroy();
    redirect(base_url('Pages/view/index'));
  }

  public function updateInfo() {
    if (isset($_POST['update'])) {
      $uid = $_SESSION['uid'];
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $address = $_POST['address'];
      $result = $this->Easyfood_model->updateInfo($uid, $fname, $lname, $email, $gender,$address);
      $data['accountInfo'] = $this->Easyfood_model->getPersonalInfo($uid);
      $data['info'] = $this->Easyfood_model->getPersonalInfo2($uid);
      $this->load->view('templates/header');
      $this->load->view('pages/personalprofile', $data);
      $this->load->view('templates/footer');
    }
  }

  public function search() {
    if (isset($_POST['search'])) {
      $search = $_POST['key'];
      $data['results'] = $this->Easyfood_model->search($search);
      $this->load->view('templates/header');
      $this->load->view('pages/postresult', $data);
      $this->load->view('templates/footer');
    }
  }

  public function resetQuestions() {
    $data['reset'] = "Please submit your security questions.";
    if (isset($_POST['submit'])) {
      $uid = $_SESSION['uid'];
      $email = $_SESSION['email'];


      $q1 = $_POST['q1'];
      $q2 = $_POST['q2'];
      $a1 = $_POST['a1'];
      $a2 = $_POST['a2'];
      $data['reset'] = $this->Easyfood_model->setQuestions($uid, $email, $q1, $q2, $a1, $a2);
      if ($data['reset']) {
        $this->load->view('templates/header');
        $this->load->view('pages/index');
        $this->load->view('templates/footer');
      } else {
        $data['reset'] = "Failed to reset your security questions";
        $this->load->view('templates/header');
        $this->load->view('pages/resetQuestions', $data);
        $this->load->view('templates/footer');
      }
    } else {
      $this->load->view('templates/header');
      $this->load->view('pages/resetQuestions', $data);
      $this->load->view('templates/footer');
    }
  }

  public function checkAnswer() {
    $uid = $_POST['uid'];
    $_SESSION['uid'] = $uid;
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    if (isset($_POST['submit'])) {
      $data['answer'] = $this->Easyfood_model->getQuestions($uid);
      if (($a1 == $data['answer']->a1) && ($a2 == $data['answer']->a2)) {
        $this->load->view('templates/header');
        $this->load->view('pages/resetpsw');
        $this->load->view('templates/footer');
      } else {
        $data['questions'] = $data['answer'];
        $data['answer'] = "Wrong answers";
        $this->load->view('templates/header');
        $this->load->view('pages/verifysecur', $data);
        $this->load->view('templates/footer');
      }
    }
  }

  public function updatePsw() {
    $uid = $_SESSION['uid'];
    $psw = $_POST['psw'];
    $data['login'] = $this->Easyfood_model->resetPsw($uid, $psw);
    $newdata = array(
      'uid' => $data['login']->uid,
      'fname' => $data['login']->firstname,
      'lname' => $data['login']->lastname,
      'email' => $data['login']->email,
      'psw' => $data['login']->password
    );
    $this->session->set_userdata($newdata);
    $this->load->view('templates/header');
    $this->load->view('pages/index', $data);
    $this->load->view('templates/footer');
  }

  public function checkexistun() {
    if(isset($_POST['username'])) {
        $uid = $_POST['username'];
        $numRow = $this->Easyfood_model->getusername($uid);
        if ($numRow) {
            echo "<span class = 'text-success'>This username is available now.</span>";
        } else {
            echo "<span class = 'text-danger'>This username has been used</span>";
        }
    }
  }

  public function checkexiste() {
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
        $numRow = $this->Easyfood_model->getuseremail($email);
        if ($numRow) {
            echo "<span class = 'text-success'>This email address is available now.</span>";
        } else {
            echo "<span class = 'text-danger'>This email address has been used</span>";
        }
    }
  }

  public function viewMore($did) {
    $data['detail'] = $this->Easyfood_model->getDish($did);
    $data['did'] = $did;
    $this->load->view('templates/header');
    $this->load->view('pages/dishes', $data);
    $this->load->view('templates/footer');
  }

  public function send_verify_email() {
    $this->load->library('email');
    $code = $this->generateCode($_SESSION['fname'], $_SESSION['lname']);
    $this->email->from('hongwei.li@uqconnect.edu.au', 'EasyFood');
    $this->email->to($_SESSION['email']);
    // $this->email->cc('another@another-example.com');
    // $this->email->bcc('them@their-example.com');

    $this->email->subject('Verify code from EasyFood: ');
    $this->email->message($code);

    $this->email->send();
  }

  public function generateCode($fname, $lname) {
    $first = substr($fname, -1);
    $second = substr($lname, -1);
    $com = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $code = "";
    $code1 = "";
    for ($i=0; $i < 52 ; $i++) {
      if ($first == substr($com, $i)) {
          $code = $i;
      }
      if ($second == substr($com, $i)) {
          $code1 = $i;
      }
    }
    if ($code == "" || $code1 == "") {
      return "qunimabi";
    } else {
      $code = $code*$code1;
      return strval($code);
    }
  }

  public function verify() {
    $code = $_POST['code'];
    if ($code == $_SESSION['activate']) {
      $this->Easyfood_model->changeStatus($_SESSION['uid']);
      $_SESSION['activate'] = '-1';
    } else {
      $data['v'] = "WRONG CODE";
    }
    $this->load->view('templates/header');
    $this->load->view('pages/index', $data);
    $this->load->view('templates/footer');
  }


  public function dishes() {
    if (isset($_POST['query'])) {
      $key = $_POST['query'];
      $output = "<ul class = 'auto'>";
      $dishes = $this->Easyfood_model->search1($key);
      foreach ($dishes as $dish) {
        $output .= "<li>".$dish->name."</li>";
      }
      $output.="</ul>";
      echo $output;

    }
  }

  public function addToChart($did) {
    $uid = $_SESSION['uid'];
    $data['did'] = $did;
    $data['detail'] = $this->Easyfood_model->getDish($did);
    $data['result'] = $this->Easyfood_model->addToChart($did, $uid, $data['detail']->name, $data['detail']->price);
    $this->load->view('templates/header');
    $this->load->view('pages/dishes', $data);
    $this->load->view('templates/footer');
  }

  public function viewChart() {
    $uid = $_SESSION['uid'];
    $data['items'] = $this->Easyfood_model->retriveChart($uid);
    $this->load->view('templates/header');
    $this->load->view('pages/viewChart', $data);
    $this->load->view('templates/footer');
  }

  public function removeFromChart($did) {
    $uid = $_SESSION['uid'];
    $data['remove'] = $this->Easyfood_model->removeDish($uid, $did);
    $data['items'] = $this->Easyfood_model->retriveChart($uid);
    $this->load->view('templates/header');
    $this->load->view('pages/viewChart', $data);
    $this->load->view('templates/footer');
  }

  public function favIt($did) {
    $data['favourate'] = $this->Easyfood_model->giveFav($did);
    $data['detail'] = $this->Easyfood_model->getDish($did);
    $data['did'] = $did;
    $this->load->view('templates/header');
    $this->load->view('pages/dishes', $data);
    $this->load->view('templates/footer');
  }

  public function addDish() {
    $restaurant = $_POST['restaurant'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $avaliable = $_POST['avaliable'];
    $data['added'] = $this->Easyfood_model->addDish($restaurant, $category, $name, $price, $avaliable);
    $this->load->view('templates/header');
    $this->load->view('pages/index', $data);
    $this->load->view('templates/footer');

  }

  public function manageRestaurant() {
    $this->load->view('templates/header');
    $this->load->view('pages/manageRestaurant');
    $this->load->view('templates/footer');
  }

  // public function generatePdf($did) {
  //   $data['detail'] = $this->Easyfood_model->getDish($did);
  //   if (isset($_POST['pdf'])) {
  //     require_once('tcpdf/tcpdf.php');
  //     $obj_pdf = new TCPDF('P',PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  //     $obj_pdf->SetCreator(PDF_CREATOR);
  //     $obj_pdf->SetTitle('Description');
  //     $obj_pdf->SetHeaderData('','', PDF_HEADER_STRING);
  //     $obj_pdf->SetHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONTSIZE_MAIN));
  //     $obj_pdf->SetFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONTSIZE_DATA));
  //     $obj_pdf->SetDefaultMonospacedFont('helvetica');
  //     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
  //     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
  //     $obj_pdf->setPrintHeader('false');
  //     $obj_pdf->setPrintFooter('false');
  //     $obj_pdf->SetAutoPageBreak(TRUE, 10);
  //     $obj_pdf->SetFont('helvetica', '', 12);
  //
  //     $content = '';
  //     $content .= "<h3 align = 'center'>Description for This Dish</h3>
  //     <label for='name'>Name</label><br>
  //     <h5>".$data['detail']->name."</h5>
  //     <label for='restaurant'>Restaurant</label><br>
  //     <h5>".$data['detail']->restaurant."</h5>
  //     <label for='category'>Category</label><br>
  //     <h5>".$data['detail']->category."</h5>
  //     <label for='votes'>Votes</label><br>
  //     <h5>".$data['detail']->fav."</h5>
  //     <label for='avaliable'>Avaliable</label><br>
  //     <h5>".$avaliable."</h5>
  //     <label for='price'>Price</label><br>
  //     <h5>".$data['detail']->price."</h5>";
  //     $obj_pdf->writeHTML($content);
  //     $obj_pdf->Output("dish.pdf", "I");
  //   }
  // }

  function pdf($did)
  {
      $this->load->helper('pdf_helper');

      $data['detail'] = $this->Easyfood_model->getDish($did);

      $this->load->view('pages/pdfreport', $data);
  }





}


 ?>
