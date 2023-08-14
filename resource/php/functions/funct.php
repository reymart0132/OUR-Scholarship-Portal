<?php

function callAppAlert(){
  echo '<div class="alert alert-light alert-dismissible fade show" role="alert">
  <strong>*Attention!</strong> You are applying for <b class="text-danger">Manila Campus Scholarship</b>.
  <br>For Makati Scholarships please visit: <a href="www.ceumktregistrar.com/ourscholar/index">www.ceumktregistrar.com/ourscholar/index</a>
  <br>For Malolos Scholarships please visit:<a href="www.ceumlsregistrar.com/ourscholar/index">www.ceumlsregistrar.com/ourscholar/index</a>

  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
function CheckSuccess($status){
    if($status =='Success'){
        echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
                <b>Congratulations!</b> You have successfully submitted your application! <br /> Please take note of your Scholarship Reference Number: <b><a href="#">'.$_GET["tn"].'</a>
                <br /></b> You may visit our scholarship status checker to check the status of your scholarship application by clicking <b><a href="scrstatus">here</a>.
                <br />Kindly check your email for the confirmation message. Thank you and please stay safe!</b>
                </b><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
    }elseif($status =='upload1'){
      echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
              <b>Application Failed!</b> Please upload the correct file extension (PDF) and make sure that the size is not greater than 2mb.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }elseif($status =='tamper'){
      echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
              <b>Application Failed!</b> Please complete all the required fields before submitting.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }elseif($status =='captchaError'){
      echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
              <b>Captcha Entry Error!</b> You have entered an Invalid CAPTCHA Value.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }elseif($status =='MultipleTrans'){
      echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
              <b>Application Failed!</b> You can only apply for a scholarship once. If you think this is an error please contact the following person:<br />
              for CEU Manila : mmcombine@ceu.edu.ph <br />
              for CEU Malolos : kdeleon@ceu.edu.ph <br/>
              for CEU Makati : ibmercado@ceu.edu.ph
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }elseif($status =='notElig'){
      echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
              <b>Scholarship Application is not eligible.</br></b> We are sorry to inform you that you are not qualified for the scholarship that you have applied for.<br>
              Reason: <b><a href="#">GWA is higher than (1.504 for undergraduates), (1.154 for Graduate School) and (2.04 for Medicine)</a>.</b>
              <br>If you think this is a mistake please contact the following person:<br />
              for CEU Manila : mmcombine@ceu.edu.ph <br />
              for CEU Malolos : kdeleon@ceu.edu.ph <br/>
              for CEU Makati : ibmercado@ceu.edu.ph
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>';
    }else{
      header("location:index");
    }
}

function Success(){
    echo '<div class="alert alert-success alert-dismissible fade show col-12" role="alert">
            <b>Congratulations!</b> You have successfully registered a new Student Records Assistant!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
function loginError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid username/Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
function curpassError(){
        echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
                <b>Error!</b> Invalid Current Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }

function pError($error){
    echo '<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">
            <b>Error!</b> '.$error.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }

function vald(){
     if(input::exists()){
      if(Token::check(input::get('Token'))){
         if(!empty($_POST['College'])){
             $_POST['College'] = implode(',',input::get('College'));
         }else{
            $_POST['College'] ="";
         }
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true'
            ),
            'College'=>array(
                'required'=>'true'
            )));

            if($validate->passed()){
                $user = new user();
                $salt = Hash::salt(32);
                try {
                    $user->create(array(
                        'username'=>input::get('username'),
                        'password'=>Hash::make(input::get('password'),$salt),
                        'salt'=>$salt,
                        'name'=> input::get('fullName'),
                        'joined'=>date('Y-m-d H:i:s'),
                        'groups'=>1,
                        'colleges'=> input::get('College'),
                        'email'=> input::get('email'),
                    ));

                    $user->createC(array(
                        'checker'=> input::get('fullName'),

                    ));
                    $user->createV(array(
                        'verifier'=> input::get('fullName'),
                    ));

                    $user->createR(array(
                        'releasedby'=> input::get('fullName'),

                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }

                Success();
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
            }
        }
            }else{
                return false;
            }
        }

        function logd(){
            if(input::exists()){
                if(Token::check(input::get('token'))){
                    $validate = new Validate();
                    $validation = $validate->check($_POST,array(
                        'username' => array('required'=>true),
                        'password'=> array('required'=>true)
                    ));
                    if($validation->passed()){
                        $user = new user();
                        $remember = (input::get('remember') ==='on') ? true :false;
                        $login = $user->login(input::get('username'),input::get('password'),$remember);
                        if($login){
                            if($user->data()->groups == 1){
                              Redirect::to('adminscrdashboard.php');
                            }elseif($user->data()->groups == 2){
                              Redirect::to('saodashboard.php');
                            }elseif($user->data()->groups == 3){
                              Redirect::to('deancrdashboard.php');
                            }elseif($user->data()->groups == 4){
                              Redirect::to('registrardashboard.php');
                            }elseif($user->data()->groups == 5){
                              Redirect::to('actdashboard.php');
                            }else{
                              Redirect::to('template.php');
                            }
                        }else{
                            loginError();
                        }
                    }else{
                        foreach($validation->errors() as $error){
                            echo $error.'<br />';
                        }
                    }
                }
            }
        }

        function isLogin(){
            $user = new user();
            if(!$user->isLoggedIn()){
                Redirect::to('sitelogin.php');
            }
        }

function profilePic(){
    $view = new view();
    if($view->getdpSRA()!=="" || $view->getdpSRA()!==NULL){
        echo "<img class='rounded profpic img-thumbnail ml-3' alt='100x100' src='data:".$view->getMmSRA().";base64,".base64_encode($view->getdpSRA())."'/>";
    }else{
        echo "<img class='rounded profpic img-thumbnail' alt='100x100' src='resource/img/user.jpg'/>";
    }
}

function updateProfile(){
    if(input::exists()){
        if(!empty($_POST['College'])){
            $_POST['College'] = implode(',',input::get('College'));
        }else{
           $_POST['College'] ="";
        }

        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'username'=>array(
                'required'=>'true',
                'min'=>4,
                'max'=>20,
                'unique'=>'tbl_accounts'
            ),
            'fullName'=>array(
                'required'=>'true',
                'min'=>2,
                'max'=>50,
            ),
            'email'=>array(
                'required'=>'true',
                'min'=>5,
                'max'=>50,
            ),
            'College'=>array(
                'required'=>'true'
            )));

            if($validate->passed()){
                $user = new user();

             try {
                    $user->update(array(
                        'username'=>input::get('username'),
                        'name'=> input::get('fullName'),
                        'colleges'=> input::get('College'),
                        'email'=> input::get('email')
                    ));
                } catch (Exception $e) {
                    die($e->getMessage());
                }
                Redirect::to('logout.php');
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
        }

    }
}







function isAdmin($user){
  if($user === "1"){
    //do what it is supposed to do
  }
  else {
    header("HTTP/1.1 403 Forbidden");
    exit;
  }
}

function isSAO($user){
  if($user === "2"){
    //do what it is supposed to do
  }
  else {
    header("HTTP/1.1 403 Forbidden");
    exit;
  }
}

function isDean($user){
  if($user === "3"){
    //do what it is supposed to do
  }
  else {
    header("HTTP/1.1 403 Forbidden");
    exit;
  }
}

function isRegistrar($user){
  if($user === "4"){
    //do what it is supposed to do
  }
  else {
    header("HTTP/1.1 403 Forbidden");
    exit;
  }
}

function isAccounting($user){
  if($user === "5"){
    //do what it is supposed to do
  }
  else {
    header("HTTP/1.1 403 Forbidden");
    exit;
  }
}

function findCollege($course){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_course` where `id`=$course";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    return $rows[0]->collegedept;
}
function findUsername($id){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` where `id`=$id";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    return $rows[0]->username;
}
function findName($id){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_accounts` where `id`=$id";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    return $rows[0]->name;
}
function findCourseABV($course){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_course` where `id`=$course";
    $data = $con->prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    return $rows[0]->abvcourse;
}

function findCollegeName($college){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_college` where `id`=$college";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    return $rows[0]->collegedept;
}

function sanitize($dirty){
  $clean = filter_var ($dirty, FILTER_SANITIZE_SPECIAL_CHARS);
  return $clean;
}

function datevalidationESA($std){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_entrance_scholarship` WHERE `studentnumber`='$std' AND `ysemester` ='".getSemester2()."'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);

    if(count($rows)==0){
      return true;
    }else{
      return false;
    }
  }
function datevalidationEGA($std){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_entrance_grant` WHERE `studentnumber`='$std' AND `ysemester` ='".getSemester2()."'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);

    if(count($rows)==0){
      return true;
    }else{
      return false;
    }
  }
function datevalidationUSA($std){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_university_scholarship` WHERE `studentnumber`='$std' AND `ysemester` ='".getSemester2()."'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);

    if(count($rows)==0){
      return true;
    }else{
      return false;
    }
  }
function datevalidationUGA($std){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_university_grants` WHERE `studentnumber`='$std' AND `ysemester` ='".getSemester2()."'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);

    if(count($rows)==0){
      return true;
    }else{
      return false;
    }
  }


  function findESinfo($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_scholarship` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows;
  }
  function findEGinfo($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_grant` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows;
  }
  function findUSinfo($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_university_scholarship` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows;
  }
  function findUGinfo($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_university_grants` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows;
  }
  function findUGtype($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_university_grants` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->scholarshiptype;
  }
    function findEGtype($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_grant` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->scholarshiptype;
  }
  function findEStype($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_scholarship` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->scholarshiptype;
  }
  function findESinfoData($std){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_scholarship_data` where `studentnumber`='$std'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows;
  }
  function findESfile($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_scholarship` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->rof13;
  }
  function findEGfile($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_grant` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->rof64;
  }
  function findUSfile($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_university_scholarship` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->rof15;
  }
  function findUGfile($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_university_grants` where `transnumber`='$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->rof65;
  }
  function findEginfoData($std){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_grant_data` where `studentnumber`='$std'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows;
  }

  function getSemester(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->schoolyear;
  }
  function getESLock(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->eslock;
  }
  function getEGLock(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->eglock;
  }
  function getUSLock(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->uslock;
  }
  function getUGLock(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->uglock;
  }

  function checkSemester(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      echo $rows[0]->semester;
  }
  function getSemester2(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->semester;
  }
  function checklock($lock){
    if($lock == 1){
      echo "Unlocked";
    }else{
      echo "Locked";
    }
  }
  function getSY(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->schoolyear;
  }
    function getSY2(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      return $rows[0]->durationsy;
  }

  function ESLock($lock){
    if($lock == true){
      //do what it is supposed to do
    }
    else {
      header("location:locked");
      exit;
    }
  }

  function breakString($string, $maxLenght) {

      //preparing string, getting lenght, max parts number and so on
  $string = trim($string, ' ');
  $stringLenght = strlen($string);
  $parts = ($stringLenght / $maxLenght );
  $finalPatrsNumber = ceil($parts);
  $arrayString = explode(' ', $string);
      //defining variables used to store data into a foreach loop
  $partString ='';
  $new = array();
  $arrayNew = array();

     /**
      * go througt every word and glue it to a $partstring
      *
      * check $partstring lenght if it exceded $maxLenght
      * then delete last word and pass it again to $partstring
      * and create now array value
      */

  foreach($arrayString as $word){
      $partString.=$word.' ';

      while(  strlen( $partString ) > $maxLenght) {
          $partString = trim($partString, ' ');
          $new = explode(' ', $partString);
          $partString = '';
          $partString.= end($new).' ';
          array_pop($new);
          //var_dump($new);
          if( strlen(implode( $new, ' ' )) < $maxLenght){
              $value = implode( $new, ' ' );
              $arrayNew[] = $value;
          }
      }
  }

  //    /**
  //    * psuh last part of the string into array
  //    */
  $string2 = implode(' ', $arrayNew);


  $string2 = trim($string2, ' ');
  $string2lenght = strlen($string2);
  $newPart = substr($string, $string2lenght);
  $arrayNew[] = $newPart;

    /**
     * return array with broken $parts of $string
      * $party max lenght is < $maxlenght
      * and breaks are only after words
     */
  return $arrayNew;

  }

function checkRemarks($remarks){
  $remarks = substr($remarks, 0, -1);
  if($remarks == "PENDING"){
    $remarks ="Awaiting Initial Review";
    return $remarks;
  }elseif($remarks == "DEAN"){
    $remarks ="For Dean's Signature";
    return $remarks;
  }elseif($remarks == "SAO"){
    $remarks ="Awaiting Students Affairs Office Review";
    return $remarks;
  }elseif($remarks == "REG"){
    $remarks ="For Registrar's Signature";
    return $remarks;
  }elseif($remarks == "APP"){
    $remarks ="Scholarhip/Grant Approved";
    return $remarks;
  }elseif($remarks == "REJ"){
    $remarks ="Scholarhip/Grant Rejected";
    return $remarks;
  };
}

function insertBB($fullname,$stype,$stdn){
    $config = new config;
    $con = $config->con();
    $sql = "INSERT INTO `tbl_bulletinboard`(`fullname`, `scholarshiptype`, `stdn`) VALUES ('$fullname','$stype','$stdn')";
    $data = $con-> prepare($sql);
    $data ->execute();
}

function bblistES(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_bulletinboard` WHERE `scholarshiptype`='ES' ORDER BY `fullname` ASC";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
            echo '<div class="col-lg-2 mt-1">';
            echo '<p>'.$row->stdn.' - '.$row->fullname.'</p>';
            echo '</div>';
          }
}
function bblistEG(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_bulletinboard` WHERE `scholarshiptype`='EG' ORDER BY `fullname` ASC";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
            echo '<div class="col-lg-2 mt-1">';
            echo '<p>'.$row->stdn.' - '.$row->fullname.'</p>';
            echo '</div>';
          }
}
function bblistUS(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_bulletinboard` WHERE `scholarshiptype`='US' ORDER BY `fullname` ASC";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
            echo '<div class="col-lg-2 mt-1">';
            echo '<p>'.$row->stdn.' - '.$row->fullname.'</p>';
            echo '</div>';
          }
}
function bblistUG(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_bulletinboard` WHERE `scholarshiptype`='UG' ORDER BY `fullname` ASC";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
        foreach ($rows as $row) {
            echo '<div class="col-lg-2 mt-1">';
            echo '<p>'.$row->stdn.' - '.$row->fullname.'</p>';
            echo '</div>';
          }
}

function getAnnouncement(){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT * FROM `tbl_announcement` ORDER BY DATE DESC LIMIT 1";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    return $rows[0]->announcement;
}
function checkTransaction($tn){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT `remarks` FROM `tbl_university_scholarship` WHERE `transnumber` ='$tn'
            UNION
            SELECT `remarks` FROM `tbl_university_grants` WHERE `transnumber` ='$tn'
            UNION
            SELECT `remarks` FROM `tbl_entrance_grant` WHERE `transnumber` ='$tn'
            UNION
            SELECT `remarks` FROM `tbl_entrance_scholarship` WHERE `transnumber` ='$tn'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    if(count($rows) > 0){
      return $rows[0]->remarks;
    }else{
      return "invalid5";
    }
}
function findNameStudent($tn){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT `firstname`,`lastname`,`middlename` FROM `tbl_university_scholarship` WHERE `transnumber` ='$tn'
            UNION
            SELECT `firstname`,`lastname`,`middlename` FROM `tbl_university_grants` WHERE `transnumber` ='$tn'
            UNION
            SELECT `firstname`,`lastname`,`middlename` FROM `tbl_entrance_grant` WHERE `transnumber` ='$tn'
            UNION
            SELECT `firstname`,`lastname`,`middlename` FROM `tbl_entrance_scholarship` WHERE `transnumber` ='$tn'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    if(count($rows) > 0){
      $fullname = $rows[0]->firstname." ".$rows[0]->lastname." ".$rows[0]->middlename;
      return $fullname;
    }else{
      return "Student";
    }
}
function findCollegeName2($tn){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT `college` FROM `tbl_university_scholarship` WHERE `transnumber` ='$tn'
            UNION
            SELECT `college` FROM `tbl_university_grants` WHERE `transnumber` ='$tn'
            UNION
            SELECT `college` FROM `tbl_entrance_grant` WHERE `transnumber` ='$tn'
            UNION
            SELECT `college` FROM `tbl_entrance_scholarship` WHERE `transnumber` ='$tn'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    if(count($rows) > 0){
      return $rows[0]->college;
    }else{
      return "invalid";
    }
}
function findReason($tn){
    $config = new config;
    $con = $config->con();
    $sql = "SELECT `rejectreason` FROM `tbl_university_scholarship` WHERE `transnumber` ='$tn'
            UNION
            SELECT `rejectreason` FROM `tbl_university_grants` WHERE `transnumber` ='$tn'
            UNION
            SELECT `rejectreason` FROM `tbl_entrance_grant` WHERE `transnumber` ='$tn'
            UNION
            SELECT `rejectreason` FROM `tbl_entrance_scholarship` WHERE `transnumber` ='$tn'";
    $data = $con-> prepare($sql);
    $data ->execute();
    $rows =$data-> fetchAll(PDO::FETCH_OBJ);
    if(count($rows) > 0){
      return $rows[0]->rejectreason;
    }else{
      return "invalid application";
    }
}

function findOfficerEmail(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_accounts` WHERE `groups`= 1 LIMIT 1";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->email;
      }else{
        return "your office of the registrar.";
      }

}

function countESApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_scholarship`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countForReviewESApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_scholarship` WHERE `remarks` ='PENDING1'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countPendingESApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_scholarship` WHERE `remarks` NOT IN ('PENDING1','REJ1')";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countDeanPendingESApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_scholarship` WHERE `remarks` ='DEAN1'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRegPendingESApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_scholarship` WHERE `remarks` ='REG1'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countApprovePendingESApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_scholarship` WHERE `remarks` ='APP1'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRejectedESApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_scholarship` WHERE `remarks` ='REJ1'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countUSApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_scholarship`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countForReviewUSApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_scholarship` WHERE `remarks` ='PENDING3'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countPendingUSApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_scholarship` WHERE `remarks` NOT IN ('PENDING3','REJ3')";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countDeanPendingUSApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_scholarship` WHERE `remarks` ='DEAN3'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRegPendingUSApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_scholarship` WHERE `remarks` ='REG3'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countApprovePendingUSApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_scholarship` WHERE `remarks` ='APP3'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRejectedUSApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_scholarship` WHERE `remarks` ='REJ3'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countForReviewUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants` WHERE `remarks` ='PENDING4'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countPendingUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants` WHERE `remarks` NOT IN ('PENDING4','REJ4')";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countDeanPendingUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants` WHERE `remarks` ='DEAN4'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRegPendingUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants` WHERE `remarks` ='REG4'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countSAOPendingUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants` WHERE `remarks` ='SAO4'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countApprovePendingUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants` WHERE `remarks` ='APP4'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRejectedUGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_university_grants` WHERE `remarks` ='REJ4'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant`";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countForReviewEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant` WHERE `remarks` ='PENDING2'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}

function countPendingEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant` WHERE `remarks` NOT IN ('PENDING2','REJ2')";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countDeanPendingEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant` WHERE `remarks` ='DEAN2'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRegPendingEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant` WHERE `remarks` ='REG2'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countSAOPendingEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant` WHERE `remarks` ='SAO2'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countApprovePendingEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant` WHERE `remarks` ='APP2'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}
function countRejectedEGapplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT count(*) AS `count` FROM `tbl_entrance_grant` WHERE `remarks` ='REJ2'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      if(count($rows) > 0){
        return $rows[0]["count"];
      }else{
        return 0;
      }
}



function findOfficerSAOEmail(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_accounts` WHERE `groups`= 2 LIMIT 1";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->email;
      }else{
        return "your office of the registrar.";
      }
}
function findOfficerRegEmail(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_accounts` WHERE `groups`= 4 LIMIT 1";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->email;
      }else{
        return "your office of the registrar.";
      }
}
function findOfficerDeanEmail($college){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_accounts` WHERE `colleges`= '$college' LIMIT 1";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->email;
      }else{
        return "your office of the registrar.";
      }
}

function findROF13($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_scholarship` WHERE `transnumber`= '$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->rof13;
      }else{
        return "#";
      }
}
function findROF14($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_scholarship` WHERE `transnumber`= '$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->rof13;
      }else{
        return "#";
      }
}
function findROF64($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_entrance_grant` WHERE `transnumber`= '$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->rof64;
      }else{
        return "#";
      }
}

function findROF15($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_university_scholarship` WHERE `transnumber`= '$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->rof15;
      }else{
        return "#";
      }
}
function findROF65($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `tbl_university_grants` WHERE `transnumber`= '$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return $rows[0]->rof65;
      }else{
        return "#";
      }
}
function getTotalApplicant(){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT DATE(total.date_applied) as `dit`,count(`transnumber`) AS `tots` FROM ( SELECT transnumber,date_applied FROM `tbl_university_scholarship` UNION ALL SELECT transnumber,date_applied FROM `tbl_university_grants` UNION ALL SELECT transnumber,date_applied FROM `tbl_entrance_grant` UNION ALL SELECT transnumber,date_applied FROM `tbl_entrance_scholarship` ) as total GROUP BY CAST(total.date_applied AS DATE)";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_ASSOC);
      return $rows;
    }

function secretCode($tn){
      $config = new config;
      $con = $config->con();
      $sql = "SELECT * FROM `adminconfig` WHERE `seckey`= '$tn'";
      $data = $con-> prepare($sql);
      $data ->execute();
      $rows =$data-> fetchAll(PDO::FETCH_OBJ);
      if(count($rows) > 0){
        return true;
      }else{
        return false;
      }
}

function truncateBB(){
      $config = new config;
      $con = $config->con();
      $sql = "TRUNCATE TABLE `tbl_bulletinboard`";
      $data = $con-> prepare($sql);
      $data ->execute();
}

function truncateES(){
      $config = new config;
      $con = $config->con();
      $sql = "TRUNCATE TABLE `tbl_entrance_scholarship`";
      $data = $con-> prepare($sql);
      $data ->execute();
}

function truncateEG(){
      $config = new config;
      $con = $config->con();
      $sql = "TRUNCATE TABLE `tbl_entrance_grant`";
      $data = $con-> prepare($sql);
      $data ->execute();
}
function truncateES2(){
      $config = new config;
      $con = $config->con();
      $sql = "TRUNCATE TABLE `tbl_entrance_scholarship_data`";
      $data = $con-> prepare($sql);
      $data ->execute();
}

function truncateEG2(){
      $config = new config;
      $con = $config->con();
      $sql = "TRUNCATE TABLE `tbl_entrance_grant_data`";
      $data = $con-> prepare($sql);
      $data ->execute();
}

function truncateUG(){
      $config = new config;
      $con = $config->con();
      $sql = "TRUNCATE TABLE `tbl_university_grants`";
      $data = $con-> prepare($sql);
      $data ->execute();
}

function truncateUS(){
      $config = new config;
      $con = $config->con();
      $sql = "TRUNCATE TABLE `tbl_university_scholarship`";
      $data = $con-> prepare($sql);
      $data ->execute();
}
function changeP(){
    if(input::exists()){
        $validate = new Validate;
        $validate = $validate->check($_POST,array(
            'password_current'=>array(
                'required'=>'true',
            ),
            'password'=>array(
                'required'=>'true',
                'min'=>6,
            ),
            'ConfirmPassword'=>array(
                'required'=>'true',
                'matches'=>'password'
            )));

            if($validate->passed()){
                $user = new user();
                if(Hash::make(input::get('password_current'),$user->data()->salt) !== $user->data()->password){
                    curpassError();
                }else{
                    $user = new user();
                    $salt = Hash::salt(32);
                    try {
                        $user->update(array(
                            'password'=>Hash::make(input::get('password'),$salt),
                            'salt'=>$salt
                        ));
                    } catch (Exception $e) {
                        die($e->getMessage());
                    }
                    Redirect::to('Logout.php');
                }
            }else{
                foreach ($validate->errors()as $error) {
                pError($error);
                }
        }
    }
}

 ?>
