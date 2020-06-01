<?php
require_once('netting/baglan.php');
require_once('netting/function.php');

is_login();

if (!empty($_POST['makaleAra']) || !empty($_POST['makaleSirala'])) {

  echo "###Bulunamadı";

      $filter = mysqli_real_escape_string($conn, $_POST['makaleAra']);
      $sorter = mysqli_real_escape_string($conn, $_POST['makaleSirala']);
      $aktif = mysqli_real_escape_string($conn, $_POST['aktif']);

      $file = htmlspecialchars($_SERVER['HTTP_REFERER']);;
      $sayfa_adi = basename($file,".php");

      $tablo="";
      if ($sayfa_adi == "haberler" || $sayfa_adi == "pasif-haberler") {
        $tablo="haber";
      }else if ($sayfa_adi == "projeler" || $sayfa_adi == "pasif-projeler") {
        $tablo="proje";
      }


      if (!empty($filter))
          $_SESSION['filter']=$filter;
      else
        unset($_SESSION['filter']);

      if ($sorter == "undefined")
        unset($_SESSION['sorter']);
      else
        $_SESSION['sorter']=$sorter;

        $sort="";
        if (!empty($_SESSION['sorter'])) {

          $sortArray = explode("/", $_SESSION['sorter']);
          if ($sortArray[0] == "ad")
            $sort=" order by ".$tablo."_ad";
          else if ($sortArray[0] == "baslik")
            $sort=" order by ".$tablo."_baslik";
          else if ($sortArray[0] == "aciklama")
            $sort=" order by ".$tablo."_makale";

          if ($sortArray[1] == "1")
            $sort.=" asc";
          else if ($sortArray[1] == "2")
            $sort.=" desc";
        }

        if (empty($_SESSION['filter']))
          $search="";
        else
          $search=" and (".$tablo."_ad LIKE '%".$_SESSION['filter']."%' OR ".$tablo."_baslik LIKE '%".$_SESSION['filter']."%' OR ".$tablo."_makale LIKE '%".$_SESSION['filter']."%' )";

        $makale_query="select * from ".$tablo."ler where ".$tablo."_durum = $aktif".$search.$sort;
        $makalecek=mysqli_query($conn ,$makale_query);

        $i=1;
        while ($makaleresult=mysqli_fetch_array($makalecek)) {

    echo "<tr>";
    echo '<td>'.$i.'</td>';
    echo '<td>'.$makaleresult[$tablo.'_ad'].'</td>';
    echo '<td>'.$makaleresult[$tablo.'_baslik'].'</td>';
    echo '<td>'.$makaleresult[$tablo.'_makale'].'</td>';
          if ($aktif == 1) {
    echo '<td ><a href="'.$tablo.'-update.php?update'.mb_convert_case($tablo, MB_CASE_TITLE, "UTF-8").'='.$makaleresult[$tablo.'_id'].'"><input type="button" class="btn btn-primary" value="Düzenle"/></a></td>';
    echo '<td><form action="netting/islem.php" method="POST"><button type="submit" class="btn btn-danger" name="'.$tablo.'Pasif" value="'.$makaleresult[$tablo.'_id'].'" >Pasifleştir</button></form></td>';
          }else if ($aktif == 0) {
    echo '<td><form action="netting/islem.php" method="POST"><button type="submit" class="btn btn-primary" name="'.$tablo.'_pasif_GeriAl" value="'.$makaleresult[$tablo.'_id'].'" >Aktifleştir</button></form></td>';
    echo '<td><form action="netting/islem.php" method="POST"><button type="submit" class="btn btn-danger" name="'.$tablo.'Delete" value="'.$makaleresult[$tablo.'_id'].'" >Sil</button></form></td>';
          }
    echo "</tr>";

          $i++;
        }

}
else if (!empty($_POST['slideAra']) || !empty($_POST['slideSirala'])) {

  echo "###Bulunamadı";

  $filter = mysqli_real_escape_string($conn, $_POST['slideAra']);
  $sorter = mysqli_real_escape_string($conn, $_POST['slideSirala']);
  $aktif = mysqli_real_escape_string($conn, $_POST['aktif']);

  if (!empty($filter))
      $_SESSION['filter']=$filter;
  else
    unset($_SESSION['filter']);

  if ($sorter == "undefined")
    unset($_SESSION['sorter']);
  else
    $_SESSION['sorter']=$sorter;

  $sort="";
  if (!empty($_SESSION['sorter'])) {

    $sortArray = explode("/", $_SESSION['sorter']);
    if ($sortArray[0] == "ad")
      $sort=" order by slider_ad";
    else if ($sortArray[0] == "url")
      $sort=" order by slider_url";
    else if ($sortArray[0] == "baslik")
      $sort=" order by slider_baslik";
    else if ($sortArray[0] == "aciklama")
      $sort=" order by slider_aciklama";

    if ($sortArray[1] == "1")
      $sort.=" asc";
    else if ($sortArray[1] == "2")
      $sort.=" desc";
  }

  if (empty($_SESSION['filter']))
    $search="";
  else
    $search=" and (slider_ad LIKE '%".$_SESSION['filter']."%' OR slider_url LIKE '%".$_SESSION['filter']."%' OR slider_baslik LIKE '%".$_SESSION['filter']."%' OR slider_aciklama LIKE '%".$_SESSION['filter']."%' )";

  $slider_query="select * from ana_slider where slider_durum = $aktif".$search.$sort;
  $slidercek=mysqli_query($conn ,$slider_query);

  $i=1;
  while ($sliderresult=mysqli_fetch_array($slidercek)) {

    echo "<tr>";
    echo '<td>'.$i.'</td>';
    echo '<td><a href="#img_'.$i.'"><img width="200px" height="100px" src="'.'../'.$sliderresult['slider_resimyolu'].'" alt="Slider Resmi"></a><a href="#_'.$i.'" class="lightbox trans" id="img_'.$i.'"><img src="'.'../'.$sliderresult['slider_resimyolu'].'"></a></td>';
    echo '<td>'.$sliderresult['slider_ad'].'</td>';
    echo '<td>'.$sliderresult['slider_url'].'</td>';
    echo '<td>'.$sliderresult['slider_baslik'].'</td>';
    echo '<td>'.$sliderresult['slider_aciklama'].'</td>';
    if ($aktif == 1) {
      echo '<td ><a href="slider-update.php?updateSlider='.$sliderresult['slider_id'].'"><input type="button" class="btn btn-primary" value="Düzenle"/></a></td>';
      echo '<td><form action="netting/islem.php" method="POST"><button type="submit" class="btn btn-danger" name="sliderPasif" value="'.$sliderresult['slider_id'].'" >Pasifleştir</button></form></td>';
    }else if ($aktif == 0) {
      echo '<td><form action="netting/islem.php" method="POST"><button type="submit" class="btn btn-primary" name="slider_pasif_GeriAl" value="'.$sliderresult['slider_id'].'" >Aktifleştir</button></form></td>';
      echo '<td><form action="netting/islem.php" method="POST"><button type="submit" class="btn btn-danger" name="sliderDelete" value="'.$sliderresult['slider_id'].'" >Sil</button></form></td>';
    }
    echo "</tr>";

    $i++;
  }
}else {
  echo "###Bulunamadı";
}


 ?>
