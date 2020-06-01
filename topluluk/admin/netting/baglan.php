<?php

ob_start();

session_start();


if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {

header("Location:../error.php");

exit;
}

if (empty($_SESSION['admin_userID']) && !isset($_POST['admin_login'])) {

header("Location:../error.php");

exit;

}




$serverName="localhost:3306";// sunucu adresi
$database="122548";
$userID="122548";
$userPass="melodica123";



$conn=mysqli_connect($serverName,$userID,$userPass,$database);

$conn->set_charset("utf8");
?>
