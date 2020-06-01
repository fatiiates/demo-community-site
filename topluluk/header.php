<?php
define('ROOT_DIR', dirname(__FILE__));
require_once(ROOT_DIR.'/login/netting/baglan.php');

date_default_timezone_set('Europe/Istanbul');
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header("Location:error.php");
  exit;
}

$ayarlar_query="select * from ayarlar where ayar_id = 0";
$ayarcek=mysqli_query($conn , $ayarlar_query);
$ayar_result=mysqli_fetch_array($ayarcek);

$file = $_SERVER["SCRIPT_NAME"];
$sayfa_adi = basename($file,".php");
$licss="background-color:#1a99d4;border-radius:10px;";
$acss="color:white;"

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="<?php echo $ayar_result['ayar_description']; ?>">
    <meta name="keywords" content="<?php echo $ayar_result['ayar_keywords']; ?>">
    <meta name="author" content="DERSHANE">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Bilişim ve Kodlama Topluluğu</title>
    <link href="assets/css/login-man1.css" rel="stylesheet" />
    <link href="assets/css/login-uti.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/pre.css">
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/ana6.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/slider3.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style3.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/search1.css" />


    <link href="assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
    <link href="assets/css/basic.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link type="text/css" href="assets/css/img.css" rel="stylesheet" />



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/ajax.jquery.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <script src="assets/js/slider.js"></script>

    <script src="assets/js/pre.js"></script>
    <script src="assets/js/bootstrap-fileupload.js"></script>
    <script src="assets/js/ana1.js"></script>
    <script type="text/javascript" src="assets/js/ajax2.js" ></script>
    <style media="screen">
      .ortablok{
        padding-bottom: 0;
      }
      .topnavbar{
        margin-top: 50px;
      }
      .topnavbar ul li a{
        color:#161923;
        font-size:16px;
      }
      .bottomLine:before{
        background: #161923;
      }
      #headerLogo{
        margin-left: 20%;
        padding-left: 0;
        width: 120px;
        height: 120px;
        margin-top:10px;

      }
      @media screen and (max-width:998px) {
        #header{
          text-align: center;
        }
        #headerLogo{
          margin-left: 0;
        }
      }
    </style>
  </head>
  <body>
    <div id="preloader">
      <div class="loader">
      </div>
    </div>
    <div id="header">
        <img id="headerLogo" src="assets/img/bilkod.png" alt="" width="120px" height="120px">
      <div class="topnavbar">
        <div class="menuyuAc"><img src="assets/img/menu-icon.png" ></div>
        <ul>
          <li class="bottomLine" ><a class="bottomLine" href="index.php">ANASAYFA</a></li>
          <li class="<?php if($sayfa_adi != "about")
                                                echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "about")
                                                echo $licss; ?>" >
                                                <a class="<?php if($sayfa_adi != "about")
                                                                                      echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "about")
                                                                                      echo $acss; ?>" href="about.php">HAKKIMIZDA</a>
          </li>

          <li class="<?php if($sayfa_adi != "projeler" || $sayfa_adi != "proje")
                                                echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "projeler"  || $sayfa_adi == "proje")
                                                echo $licss; ?>" ><a class="<?php if($sayfa_adi != "projeler"  || $sayfa_adi != "proje")
                                                                                      echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "projeler" || $sayfa_adi == "proje" )
                                                                                      echo $acss; ?>" href="projeler.php">PROJELER</a>
          </li>
          <li class="<?php if($sayfa_adi != "haberler" || $sayfa_adi != "haber")
                                                echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "haberler" || $sayfa_adi == "haber")
                                                echo $licss; ?>" ><a class="<?php if($sayfa_adi != "haberler" || $sayfa_adi != "haber")
                                                                                      echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "haberler" || $sayfa_adi == "haber")
                                                                                      echo $acss; ?>" href="haberler.php">HABERLER</a>
          </li>

          <li class="<?php if($sayfa_adi != "contact")
                                                echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "contact")
                                                echo $licss; ?>" ><a class="<?php if($sayfa_adi != "contact")
                                                                                      echo "bottomLine"; ?>" style="<?php if($sayfa_adi == "contact")
                                                                                      echo $acss; ?>" href="contact.php">İLETİŞİM</a>
          </li>


        </ul>
      </div>
    </div>
