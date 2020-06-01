<?php
session_start();

if (!empty($_SESSION['admin_userID'])) {
	header("Location:../");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yönetim Paneli Giriş</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="../../assets/css/admin-login.css">
</head>

<body>



	<form action="islem.php" class="login-form" method="POST">
        <?php if($_GET['login'] == "false"){ ?>
            <input type="text" readonly=" readonly " value="Kullanıcı Bulunamadı!" class="admin-login-error"/>
        <?php } ?>
        <p class="login-text">
            <span class="fa-stack fa-lg">
            <i class="fa fa-circle fa-stack-2x"></i>
            <i class="fa fa-lock fa-stack-1x"></i>
            </span>
        </p>
        <input type="text" class="login-username" autofocus="true" required="true" placeholder="Email" style="width:auto" name="admin_userID" />
        <input type="password" class="login-password" required="true" placeholder="Password" style="width:auto" name="admin_pass" />
        <button type="submit"  class="login-submit" name="admin_login" > Giriş</button>
    </form>
    <div class="underlay-photo" style="background-color:#418787"></div>
    <div class="underlay-black"></div>




</body>
</html>
