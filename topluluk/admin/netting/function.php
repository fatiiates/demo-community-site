<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header("Location:../error.php");
  exit;
}
function is_login(){
    if(empty($_SESSION['admin_userID'])){
        header("Location:error.php");
        exit;
    }
}

function ingilizceCeviri($degisken){
  $degisecekler = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü',' ');
  $yerlestirilecekler = array('c','c','g','g','i','i','o','o','s','s','u','u','-');
  $degisken = strtolower(str_replace($degisecekler,$yerlestirilecekler,$degisken));
  return $degisken;
}

?>
