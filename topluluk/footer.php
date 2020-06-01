<?php
date_default_timezone_set('Europe/Istanbul');

if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header("Location:error.php");
}

?>
<div id="footer" style="text-align:center" >
    <div id="buresk" class="col-md-12" >
      <ul class="social-icons">
          <li><a target="_blank" href="<?php echo $ayar_result['ayar_google']; ?>" class="social-icon"> <i class="fa fa-google-plus"></i></a></li>
          <li><a target="_blank" href="<?php echo $ayar_result['ayar_instagram']; ?>" class="social-icon"> <i class="fa fa-instagram fa-lg"></i></a></li>
          <li><a target="_blank" href="<?php echo $ayar_result['ayar_facebook']; ?>" class="social-icon"> <i class="fa fa-facebook"></i></a></li>
          <li><a target="_blank" href="<?php echo $ayar_result['ayar_facebook']; ?>" class="social-icon"> <i class="fa fa-uye-ol">KATIL !</i></a></li>

      </ul>
      <p>© 2019 Bilişim ve Kodlama Topluluğu | Tüm hakları saklıdır.</p>
      <div class="contact">
        <a href="contact.php">Bize Ulaşın</a>
      </div>
    </div>

</div>
  </body>
</html>
