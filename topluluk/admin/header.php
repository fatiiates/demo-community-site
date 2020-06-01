<?php
require_once('netting/baglan.php');
require_once('netting/function.php');
is_login();

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header("Location:error.php");
  exit;
}

$ayarsor=mysqli_query($conn,"Select * From ayarlar");
$ayarcek=mysqli_fetch_array($ayarsor);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Yönetici Paneli</title>

    <link type="text/css" href="../assets/css/img.css" rel="stylesheet" />
    <link type="text/css" href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link type="text/css" href="../assets/css/ana1.css" rel="stylesheet" />

    <link type="text/css" href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link type="text/css" href="../assets/css/error.css" rel="stylesheet" />
    <link type="text/css" href="../assets/css/bootstrap-fileupload.min.css" rel="stylesheet" />
    <link type="text/css" href="../assets/css/basic.css" rel="stylesheet" />
    <link type="text/css" href="../assets/css/custom.css" rel="stylesheet" />
    <script type="text/javascript" src="../assets/js/jquery.min.js" ></script>

    <script type="text/javascript" src="../assets/js/ana3.js" ></script>
    <script type="text/javascript" src="../assets/js/control3.js" ></script>

    <script type="text/javascript" src="../assets/js/function2.js" ></script>

    <script type="text/javascript" src="netting/ajax2.js" ></script>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../">Bilişim ve Kodlama Topluluğu</a>
            </div>

            <div class="header-right">

                <a href="netting/logout.php" class="btn btn-danger" title="Logout" style=""><i class="fa fa-exclamation-circle fa-2x"></i> Güvenli Çıkış</a>

            </div>
        </nav>
