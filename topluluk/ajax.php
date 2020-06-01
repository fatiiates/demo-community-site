<?php
require_once('login/netting/baglan.php');

if (isset($_POST['makaleAra'])) {

    $aranacak=mysqli_real_escape_string($conn , $_POST['makaleAra']);
    $tablo=mysqli_real_escape_string($conn , $_POST['makale']);

    $proje_query="select * from ".$tablo."ler where ".$tablo."_durum = 1 and (".$tablo."_baslik LIKE '%$aranacak%' OR ".$tablo."_makale LIKE '%$aranacak%') ";
    $projecek=mysqli_query($conn ,$proje_query);

    $sonLimit=mysqli_num_rows($projecek);

    if ($sonLimit <= 0) {
      echo '<p style="font-size:35px;color:black" >Ooooops! Bulunamadı</p>';
    }else {


      $pagi=ceil($sonLimit/7);

      $i=1;

      for ($x=$pagi; $x > 0; $x--) {

        $son=$x*7;

        $baslangic=$son-7;
        if ($baslangic < 0)
          $baslangic=0;

        $proje_query_pagi="select * from ".$tablo."ler where ".$tablo."_durum = 1 and (".$tablo."_baslik LIKE '%$aranacak%' OR ".$tablo."_makale LIKE '%$aranacak%') order by ".$tablo."_id desc LIMIT $baslangic,$son ";
        $projecek_pagi=mysqli_query($conn ,$proje_query_pagi);

        $pagidisp="";
        if($x != 1)
           $pagidisp= 'style="display:none;"';

      echo '<div class="pagi" id="sayfa_'.$x.'" '.$pagidisp.'>';

        while ($proje_result=mysqli_fetch_array($projecek_pagi)) {

           $pid=$proje_result[$tablo.'_id'];
           $resimcek_query="select resim_yol from ".$tablo."_resimler where ".$tablo."_id=$pid";
           $resimcek=mysqli_query($conn ,$resimcek_query);

           $pid=$pid*98765432123456789;

      echo '<div class="'.$tablo.'Content" >';
      echo '<div class="paragraf">';

            if ($resimcek_result=mysqli_fetch_array($resimcek)) {

      echo '<a href="#img_'.$i.'"><img src="'.$resimcek_result['resim_yol'].'" height="200px" ></a>';
      echo '<a href="'.$i.'" class="lightbox trans" id="img_'.$i.'"><img style="float: none!important;margin: 0 auto!important;" src="'.$resimcek_result['resim_yol'].'"></a>';

            }

      echo '<a href="'.$tablo.'.php?'.$tablo.'='.$pid.'"><p class="baslik" >'.$proje_result[$tablo.'_baslik'].'</p></a>';
      echo '<a href="'.$tablo.'.php?'.$tablo.'='.$pid.'"><p class="aciklama" >'.$proje_result[$tablo.'_makale'].'</p></a>';
      echo '<a href="'.$tablo.'.php?'.$tablo.'='.$pid.'" class="git">İncele!</a>';

      echo '</div>';
      echo '</div>';
            $i++;
            }
      echo '</div>';
            }
      echo '<div class="pagination-'.$tablo.'">';

            $a=1;

            while ($a <= $pagi) {
      echo '<a class="pagi-anchor" onclick="pagination(this)" href="#sayfa_'.$a.'" >'.$a.'</a>';

            $a++;
            }
      echo '</div>';

    }



}
else {
  echo "###Bulunamadı";
}

?>
