<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
  header("Location:error.php");
  exit;
}
?>
<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>

                            <div class="inner-text" style="min-height:140px;padding:20px;background-color:#428bca;color:white;font-weight:bold;border-top:2px solid black;text-align:center;vertical-align:center">
                               <p style="margin-top:35px"> Hoşgeldin Admin</p>
                            </div>

                    </li>


                    <li>
                        <a class="menu" href="index.php"><i class="fa fa-dashboard "></i>Anasayfa</a>
                    </li>
                    <li>
                        <a class="menu" href="ayarlar.php"><i class="fa fa-dashboard "></i>Site Ayarları</a>
                    </li>
                    <li>
                      <a class="menu" href="sliderlar.php"><i class="fa fa-dashboard "></i>Sliderlar(Kayan Fotoğraflar)<span class="fa arrow" ></span></a>
                      <ul class="nav nav-second-level collapse">
                        <li><a class="menu" href="sliderlar.php"><i class="fa fa-dashboard "></i>Sliderlar</a></li>
                        <li><a class="menu" href="slider-insert.php"><i class="fa fa-plus "></i>Sliderlar Ekle</a></li>
                        <li><a class="menu" href="pasif-sliderlar.php"><i class="fa fa-minus "></i>Pasif Sliderlar</a></li>
                      </ul>
                    </li>
                    <li>
                      <a class="menu" href="projeler.php"><i class="fa fa-dashboard "></i>Projeler<span class="fa arrow" ></span></a>
                      <ul class="nav nav-second-level collapse">
                        <li><a class="menu" href="projeler.php"><i class="fa fa-dashboard "></i>Projeler</a></li>
                        <li><a class="menu" href="proje-ekle.php"><i class="fa fa-plus "></i>Proje Ekle</a></li>
                        <li><a class="menu" href="pasif-projeler.php"><i class="fa fa-minus "></i>Pasif Projeler</a></li>
                      </ul>
                    </li>
                    <li>
                      <a class="menu" href="haberler.php"><i class="fa fa-dashboard "></i>Haberler<span class="fa arrow" ></span></a>
                      <ul class="nav nav-second-level collapse">
                        <li><a class="menu" href="haberler.php"><i class="fa fa-dashboard "></i>Haberler</a></li>
                        <li><a class="menu" href="haber-ekle.php"><i class="fa fa-plus "></i>Haber Ekle</a></li>
                        <li><a class="menu" href="pasif-haberler.php"><i class="fa fa-minus "></i>Pasif Haberler</a></li>
                      </ul>
                    </li>
                    <li>
                        <a class="menu" href="sifre-update.php"><i class="fa fa-dashboard "></i>Şifremi Değiştir</a>
                    </li>


                </ul>

            </div>

        </nav>
