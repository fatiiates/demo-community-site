<?php
require_once('baglan.php');
require_once('function.php');

date_default_timezone_set('Europe/Istanbul');

if (!isset($_POST['admin_login'])) {
  if(empty($_SESSION['admin_userID'])){
      header("Location:../error.php");
      exit;
  }
}

if(isset($_POST['ayarKaydet'])){
    is_login();
    $id=0;

    //$logo_durum=$_POST['logo_durum'];
    $title=mysqli_real_escape_string($conn, $_POST['ayar_title']);
    $description=mysqli_real_escape_string($conn, $_POST['ayar_description']);
    $telefon=mysqli_real_escape_string($conn, $_POST['ayar_telefon']);
    $mail=mysqli_real_escape_string($conn, $_POST['ayar_mail']);
    $fax=mysqli_real_escape_string($conn, $_POST['ayar_fax']);
    $facebook=mysqli_real_escape_string($conn, $_POST['ayar_facebook']);
    $twitter=mysqli_real_escape_string($conn, $_POST['ayar_twitter']);
    $youtube=mysqli_real_escape_string($conn, $_POST['ayar_youtube']);
    $google=mysqli_real_escape_string($conn, $_POST['ayar_google']);
    $footer=mysqli_real_escape_string($conn, $_POST['ayar_footer']);
    $adres=mysqli_real_escape_string($conn, $_POST['ayar_adres']);
    $googleurl=mysqli_real_escape_string($conn, $_POST['ayar_googleUrl']);
    $vizyon=mysqli_real_escape_string($conn, $_POST['ayar_vizyon']);
    $misyon=mysqli_real_escape_string($conn, $_POST['ayar_misyon']);
    $hakkımızda=mysqli_real_escape_string($conn, $_POST['ayar_hakkimizda']);
    $keywords=mysqli_real_escape_string($conn, $_POST['ayar_keywords']);

    $control=0;
    if($ayarcek['ayar_title'] != $title)
        $control= true;
    else if($ayarcek['ayar_description'] != $description)
        $control= true;
    else if($ayarcek['ayar_telefon'] != $telefon)
        $control= true;
    else if($ayarcek['ayar_mail'] != $mail)
        $control= true;
    else if($ayarcek['ayar_fax'] != $fax)
        $control= true;
    else if($ayarcek['ayar_facebook'] != $facebook)
        $control= true;
    else if($ayarcek['ayar_twitter'] != $twitter)
        $control= true;
    else if($ayarcek['ayar_youtube'] != $youtube)
        $control= true;
    else if($ayarcek['ayar_google'] != $google)
        $control= true;
    else if($ayarcek['ayar_adres'] != $adres)
        $control= true;
    else if($ayarcek['ayar_googleUrl'] != $googleurl)
        $control= true;
    else if($ayarcek['ayar_vizyon'] != $vizyon)
        $control= true;
    else if($ayarcek['ayar_misyon'] != $misyon)
        $control= true;
    else if($ayarcek['ayar_hakkimizda'] != $hakkımızda)
        $control= true;
    else if($ayarcek['ayar_keywords'] != $keywords)
        $control= true;
    else
        $control= false;
    //$conn=mysqli_connect($serverName,$userID,$userPass,$database);
    $sql_query="update ayarlar set ayar_title=?, ayar_description=?,ayar_keywords=?, ayar_telefon=?,
    ayar_mail=?, ayar_fax=?, ayar_facebook=?, ayar_twitter=?,
    ayar_youtube=?, ayar_google=?, ayar_adres=?,
    ayar_googleUrl=?,ayar_vizyon=?,ayar_misyon=?,ayar_hakkimizda=? where ayar_id=?";
    $sorgula = $conn->prepare($sql_query);
    $sorgula->bind_param("sssssssssssssssi",$title,$description,$keywords,$telefon,$mail,$fax,$facebook,$twitter,$youtube,$google,$adres,$googleurl,$vizyon,$misyon,$hakkımızda,$id);
    $sorgula->execute();

    if($control && $sorgula)
     header("Location:../ayarlar.php?control=true");
    else
     header("Location:../ayarlar.php?control=false");

}
else if(isset($_POST['admin_login'])){

    session_start();
    $admin_userID=md5(mysqli_real_escape_string($conn, $_POST['admin_userID']));
    $admin_PASS=md5(mysqli_real_escape_string($conn, $_POST['admin_pass']));

    if($admin_userID && $admin_PASS){


        $admin_query="Select * From admin_login where admin_userID = ? and admin_pass= ? ";
        $sorgula = $conn->prepare($admin_query);
        $sorgula->bind_param("ss",$admin_userID,$admin_PASS);
        $sorgula->execute();
        $sorgula->store_result();
        $verisay=$sorgula->num_rows;
        if($verisay > 0){
            session_destroy();
            session_start();
            $_SESSION['admin_userID']=$admin_userID;
            header("Location:../index.php");
        }
        else{
            header("Location:sa-login.php?login=false");
        }

    }
}
else if(isset($_POST['admin_sifreUpdate'])){
    is_login();

    $id=1;
    $param=$id;
    $sifre_query="select admin_pass from admin_login where admin_id= ?";
    $sorgula = $conn->prepare($sifre_query);
    $sorgula->bind_param("i",$param);
    $sorgula->execute();
    $sorgula->bind_result($adminold_pass);
    $sorgula->fetch();
    mysqli_close($conn);
    if(($_POST['admin_sifre_new'] != $_POST['admin_sifre_new_r']) || $_POST['admin_sifre_new'] == ""  || md5($_POST['admin_sifre']) != $adminold_pass ){
        header("Location:../sifre-update.php?pass=error");
    }
    else{
      $conn=mysqli_connect($serverName,$userID,$userPass,$database);

        $newpass=md5(mysqli_real_escape_string($conn, $_POST['admin_sifre_new']));
        $newpass_query="update admin_login set admin_pass = ? where admin_id = ?";
        $sorgula = $conn->prepare($newpass_query);
        $sorgula->bind_param("si",$newpass,$param);
        $sorgula->execute();
        mysqli_close($conn);
        if($sorgula){
            include 'logout.php';
        }
        else
            header("Location:../sifre-update.php?pass=error");
    }
}

else if(isset($_POST['sliderEkle'])){
    is_login();

    $maxBoyut=5242880;
    if($_FILES['slidegorsel']["size"] > $maxBoyut){
        header("Location:../slider-insert.php?durum=falseSize");
    }
    else {
        $type=$_FILES['slidegorsel']["type"];
        if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

            if(is_uploaded_file($_FILES['slidegorsel']["tmp_name"])){

                $uploads_dir="../../assets/img/slider";
                $tmp_name=$_FILES ["slidegorsel"]["tmp_name"];
                $name=$_FILES ["slidegorsel"]["name"];
                $sayı1=rand(20000,32000);
                $sayı2=rand(20000,32000);
                $sayı3=rand(20000,32000);
                $sayı4=rand(20000,32000);
                $essizad=$sayı1.$sayı2.$say3.$say4;
                $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                $dosyayol=$uploads_dir."/".$essizad.$name;
                $dosyayol=ingilizceCeviri($dosyayol);
                $refimgyol=ingilizceCeviri($refimgyol);
                $tasi = move_uploaded_file($tmp_name,$dosyayol);
                if($tasi){
                    $slider_query="insert into ana_slider (slider_ad,slider_resimyolu,slider_url,slider_baslik,slider_aciklama,slider_durum) values (?,?,?,?,?,?) ";
                    $param=1;
                    $sorgula = $conn->prepare($slider_query);
                    $sorgula->bind_param("sssssi",
                                         mysqli_real_escape_string($conn, $_POST['slider_ad']),
                                         $refimgyol,
                                         mysqli_real_escape_string($conn, $_POST['slider_url']),
                                         mysqli_real_escape_string($conn, $_POST['slider_baslik']),
                                         mysqli_real_escape_string($conn, $_POST['slider_aciklama']),
                                         $param);
                    $sorgula->execute();
                    mysqli_close($conn);
                    if($sorgula)
                        header("Location:../sliderlar.php?control=success");
                    else
                        header("Location:../slider-insert.php?control=error");

                }
                else
                    header("Location:../slider-insert.php?control=error");
            }
        }else{
            header("Location:../slider-insert.php?durum=falseType");
        }
    }
}
else if(isset($_POST['sliderUpdate'])){
    is_login();

    $maxBoyut=5242880;
    $type=$_FILES['slidegorsel']["type"];
    $isim=$_FILES['slidegorsel']["name"];
    if($isim == ""){
        $id=$_POST['sliderUpdate'];
        $slider_query="update ana_slider set slider_ad=?, slider_url=?, slider_baslik=?, slider_aciklama=? where slider_id =? ";
        $sorgula = $conn->prepare($slider_query);
        $sorgula->bind_param("ssssi",
                             mysqli_real_escape_string($conn, $_POST['slider_ad']),
                             mysqli_real_escape_string($conn, $_POST['slider_url']),
                             mysqli_real_escape_string($conn, $_POST['slider_baslik']),
                             mysqli_real_escape_string($conn, $_POST['slider_aciklama']),
                             $id);
        $sorgula->execute();
        mysqli_close($conn);
        if($sorgula)
            header("Location:../sliderlar.php?control=success");
        else
            header("Location:../slider-update.php?control=error&updateSlider=".$id);
        }
    else if($_FILES['slidegorsel']["size"] > $maxBoyut){
        header("Location:../slider-update.php?durum=falseSize");
    }
    else {
            if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

                if(is_uploaded_file($_FILES['slidegorsel']["tmp_name"])){


                    $uploads_dir="../../assets/img/slider";
                    $tmp_name=$_FILES ["slidegorsel"]["tmp_name"];
                    $name=$_FILES ["slidegorsel"]["name"];
                    $sayı1=rand(20000,32000);
                    $sayı2=rand(20000,32000);
                    $sayı3=rand(20000,32000);
                    $sayı4=rand(20000,32000);
                    $essizad=$sayı1.$sayı2.$say3.$say4;
                    $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                    $dosyayol=$uploads_dir."/".$essizad.$name;
                    $dosyayol=ingilizceCeviri($dosyayol);
                    $refimgyol=ingilizceCeviri($refimgyol);
                    $id=$_POST['sliderUpdate'];
                    $path_query="select slider_resimyolu from ana_slider where slider_id = $id";
                    $param=array($id);
                    $pathDelete=mysqli_query($conn,$path_query);
                    $pathcek=mysqli_fetch_array($pathDelete);
                    mysqli_close($conn);
                    if(unlink("../../".$pathcek['slider_resimyolu'])){
                        $tasi = move_uploaded_file($tmp_name,$dosyayol);
                        if($tasi){

                            $conn=mysqli_connect($serverName,$userID,$userPass,$database);
                            $slider_query="update ana_slider set slider_ad=?, slider_resimyolu=?, slider_url=?, slider_baslik=?, slider_aciklama=? where slider_id =? ";
                            $sorgula = $conn->prepare($slider_query);
                            $sorgula->bind_param("sssssi",
                                                 mysqli_real_escape_string($conn, $_POST['slider_ad']),
                                                 $refimgyol,
                                                 mysqli_real_escape_string($conn, $_POST['slider_url']),
                                                 mysqli_real_escape_string($conn, $_POST['slider_baslik']),
                                                 mysqli_real_escape_string($conn, $_POST['slider_aciklama']),
                                                 $id);
                            $sorgula->execute();
                            mysqli_close($conn);
                            if($sorgula)
                                header("Location:../sliderlar.php?control=success");
                            else
                                header("Location:../slider-update.php?control=error");

                        }
                        else
                            header("Location:../slider-update.php?control=error");
                    }
                    else {
                      $tasi = move_uploaded_file($tmp_name,$dosyayol);
                      if($tasi){

                        $conn=mysqli_connect($serverName,$userID,$userPass,$database);
                        $slider_query="update ana_slider set slider_ad=?, slider_resimyolu=?, slider_url=?, slider_baslik=?, slider_aciklama=? where slider_id =? ";
                        $sorgula = $conn->prepare($slider_query);
                        $sorgula->bind_param("sssssi",
                                             mysqli_real_escape_string($conn, $_POST['slider_ad']),
                                             $refimgyol,
                                             mysqli_real_escape_string($conn, $_POST['slider_url']),
                                             mysqli_real_escape_string($conn, $_POST['slider_baslik']),
                                             mysqli_real_escape_string($conn, $_POST['slider_aciklama']),
                                             $id);
                        $sorgula->execute();
                        mysqli_close($conn);
                        if($sorgula)
                            header("Location:../sliderlar.php?control=success");
                        else
                            header("Location:../slider-update.php?control=error");

                      }
                      else
                          header("Location:../slider-update.php?control=error");
                    }
                }
            else{
                header("Location:../slider-update.php?durum=falseType");
            }

        } else {
            header("Location:../sliderlar.php?durum=error");
        }

    }
}
else if(isset($_POST['sliderPasif'])){
    is_login();

    $id=mysqli_real_escape_string($conn, $_POST['sliderPasif']);
    $param=0;

    $sliderPasif_query="update ana_slider set slider_durum = ? where slider_id = ?";
    $sorgula = $conn->prepare($sliderPasif_query);
    $sorgula->bind_param("ii",$param,$id);
    $sorgula->execute();
    if(!$sorgula)
      header("Location:../pasif-sliderlar.php?durum=error");
    else{
      header("Location:../sliderlar.php?durum=success");
    }


}
else if(isset($_POST['slider_pasif_GeriAl'])){
  is_login();

  $id=mysqli_real_escape_string($conn, $_POST['slider_pasif_GeriAl']);
  $param=1;

  $sliderPasifGeri_query="update ana_slider set slider_durum = ? where slider_id = ?";
  $sorgula = $conn->prepare($sliderPasifGeri_query);
  $sorgula->bind_param("ii",$param,$id);
  $sorgula->execute();
  if(!$sorgula)
    header("Location:../pasif-sliderlar.php?durum=error");
  else{
    header("Location:../sliderlar.php?durum=success");
  }


}
else if(isset($_POST['sliderDelete'])){
    is_login();

    $id=mysqli_real_escape_string($conn, $_POST['sliderDelete']);
    $path_query="select slider_resimyolu from ana_slider where slider_id = $id";
    $pathDelete=mysqli_query($conn,$path_query);
    $pathcek=mysqli_fetch_array($pathDelete);
    if(unlink("../../".$pathcek['slider_resimyolu'])){
        $slider_query="delete from ana_slider where slider_id= ?";
        $sorgula = $conn->prepare($slider_query);
        $sorgula->bind_param("i",$id);
        $sorgula->execute();
        if(!$sorgula)
             header("Location:../pasif-sliderlar.php?durum=error");
        else
             header("Location:../pasif-sliderlar.php?durum=success");
    }
    else if(!file_exists("../../".$pathcek['slider_resimyolu'])){
      $slider_query="delete from ana_slider where slider_id= ?";
      $sorgula = $conn->prepare($slider_query);
      $sorgula->bind_param("i",$id);
      $sorgula->execute();
      if(!$sorgula)
           header("Location:../pasif-sliderlar.php?durum=error");
      else
           header("Location:../pasif-sliderlar.php?durum=success");
    }
    else {
      $slider_query="delete from ana_slider where slider_id= ?";
      $sorgula = $conn->prepare($slider_query);
      $sorgula->bind_param("i",$id);
      $sorgula->execute();
      if(!$sorgula)
           header("Location:../pasif-sliderlar.php?durum=error");
      else
           header("Location:../pasif-sliderlar.php?durum=success");
    }


}
else if(isset($_POST['slider_Tumunu_Sil'])){
      is_login();

      $param=0;
      $path_query="select slider_resimyolu from ana_slider where slider_durum = $param";
      $pathDelete=mysqli_query($conn,$path_query);
      $hataVar=true;
      while ($pathcek=mysqli_fetch_array($pathDelete)) {
        if(unlink("../../".$pathcek['slider_resimyolu'])){

          mysqli_close($conn);
          $conn=mysqli_connect($serverName,$userID,$userPass,$database);

          $slider_query="delete from ana_slider where slider_resimyolu= ? and slider_durum = ?";
          $sorgula = $conn->prepare($slider_query);
          $sorgula->bind_param("si",$pathcek['slider_resimyolu'],$param);
          $sorgula->execute();
          if(!$sorgula)
            $hataVar=false;
        }
        else if(!file_exists("../../".$pathcek['slider_resimyolu'])){
          mysqli_close($conn);

          $conn=mysqli_connect($serverName,$userID,$userPass,$database);

          $slider_query="delete from ana_slider where slider_resimyolu= ? and slider_durum = ?";
          $sorgula = $conn->prepare($slider_query);
          $sorgula->bind_param("si",$pathcek['slider_resimyolu'],$param);
          $sorgula->execute();
          if(!$sorgula)
            $hataVar=false;
        }
        else {
          mysqli_close($conn);

          $conn=mysqli_connect($serverName,$userID,$userPass,$database);

          $slider_query="delete from ana_slider where slider_resimyolu= ? and slider_durum = ?";
          $sorgula = $conn->prepare($slider_query);
          $sorgula->bind_param("si",$pathcek['slider_resimyolu'],$param);
          $sorgula->execute();
          if(!$sorgula)
            $hataVar=false;

        }

      }
      if ($hataVar) {
        header("Location:../sliderlar.php?durum=success");
      }else {
        header("Location:../sliderlar.php?durum=?error");
      }
}
else if(isset($_POST['projeEkle'])){
    is_login();

    $maxBoyut=5242880;
    $temp_id=-1;
    $proje_ad=mysqli_real_escape_string($conn ,$_POST['proje_ad']);
    $proje_baslik=mysqli_real_escape_string($conn ,$_POST['proje_baslik']);
    $proje_aciklama=mysqli_real_escape_string($conn ,$_POST['proje_aciklama']);
    $temp_row_query="select proje_id from projeler where proje_makale LIKE '%$proje_aciklama%' order by proje_id desc ";
    $temp_row=mysqli_query($conn ,$temp_row_query);
    $temp_row_count=mysqli_num_rows($temp_row);
    if ($temp_row_count > 0){
      header("Location:../proje-ekle.php?durum=makale");
      exit;
    }

     $add_pro_query="insert into projeler (proje_ad,proje_baslik,proje_makale,proje_durum) values ('$proje_ad','$proje_baslik','$proje_aciklama',0)";
  if ($add_pro=mysqli_query($conn ,$add_pro_query)) {
      $temp_row_query="select proje_id from projeler where proje_makale LIKE '%$proje_aciklama%' order by proje_id desc ";
      $temp_row=mysqli_query($conn ,$temp_row_query);
      $temp_row_result=mysqli_fetch_array($temp_row);
      $temp_id=$temp_row_result['proje_id'];

          for ($i=0; $i < count($_FILES['pic']['name']) ; $i++) {

            if($_FILES['pic']['size'][$i] > $maxBoyut){
                header("Location:../proje-ekle.php?durum=falseSize");
            }
            else {
                $type=$_FILES['pic']['type'][$i];
                if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

                    if(is_uploaded_file($_FILES['pic']['tmp_name'][$i])){

                        $uploads_dir="../../assets/img/projeler";
                        $tmp_name=$_FILES['pic']['tmp_name'][$i];
                        $name=$_FILES['pic']['name'][$i];
                        $sayı1=rand(20000,32000);
                        $sayı2=rand(20000,32000);
                        $sayı3=rand(20000,32000);
                        $sayı4=rand(20000,32000);
                        $essizad=$sayı1.$sayı2.$say3.$say4;
                        $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                        $dosyayol=$uploads_dir."/".$essizad.$name;
                        $dosyayol=ingilizceCeviri($dosyayol);
                        $refimgyol=ingilizceCeviri($refimgyol);
                        $tasi = move_uploaded_file($tmp_name,$dosyayol);
                        if($tasi){
                            $pro_resim_query="insert into proje_resimler (proje_id,resim_yol) values ($temp_id,'$refimgyol') ";
                            $pro_resim=mysqli_query($conn ,$pro_resim_query);
                            if(!$pro_resim)
                                header("Location:../proje-ekle.php?control=error");
                        }
                        else
                            header("Location:../proje-ekle.php?control=error");
                    }
                }else
                    header("Location:../proje-ekle.php?durum=falseType");
            }
        }
        header("Location:../proje-ekle.php?durum=success");

    }else {
      header("Location:../proje-ekle.php?durum=none");
    }

}
else if(isset($_POST['projeUpdate'])){

    $id=mysqli_real_escape_string($conn ,$_POST['projeUpdate']);
    $ad=mysqli_real_escape_string($conn ,$_POST['proje_ad']);
    $baslik=mysqli_real_escape_string($conn ,$_POST['proje_baslik']);
    $makale=mysqli_real_escape_string($conn ,$_POST['proje_aciklama']);

    $updatesor="update projeler set proje_ad='$ad', proje_baslik='$baslik', proje_makale='$makale' where proje_id = $id";
    $update=mysqli_query($conn ,$updatesor);
    if (!$update)
      header("Location:../proje-update.php?updateProje=$id&durum=exception");

    $maxBoyut=5242880;

    $resimsor="select * from proje_resimler where proje_id = $id";
    $resimcek=mysqli_query($conn ,$resimsor);
    while ($resimresult=mysqli_fetch_array($resimcek)) {

      $resimid=$resimresult['resim_id'];

      if ($_FILES['resim_'.$resimid]['size'] == 0 )
        continue;
      else if ($_FILES['resim_'.$resimid]['size'] > $maxBoyut) {
        header("Location:../proje-update.php?updateProje=$id&durum=falseSize");
      }
      else{
        $type=$_FILES['resim_'.$resimid]['type'];
        if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

            unlink("../../".$resimresult['resim_yol']);

            if(is_uploaded_file($_FILES['resim_'.$resimid]['tmp_name'])){

                $uploads_dir="../../assets/img/projeler";
                $tmp_name=$_FILES['resim_'.$resimid]['tmp_name'];
                $name=$_FILES['resim_'.$resimid]['name'];
                $sayı1=rand(20000,32000);
                $sayı2=rand(20000,32000);
                $sayı3=rand(20000,32000);
                $sayı4=rand(20000,32000);
                $essizad=$sayı1.$sayı2.$say3.$say4;
                $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                $dosyayol=$uploads_dir."/".$essizad.$name;
                $dosyayol=ingilizceCeviri($dosyayol);
                $refimgyol=ingilizceCeviri($refimgyol);
                $tasi = move_uploaded_file($tmp_name,$dosyayol);
                if($tasi){
                    $pro_resim_query="update proje_resimler set resim_yol = '$refimgyol' where resim_id =$resimid ";
                    $pro_resim=mysqli_query($conn ,$pro_resim_query);
                    if(!$pro_resim)
                        $exception="hata";
                }
                else
                  $exception="hata";
            }
            else
              $exception="hata";

        }else
            header("Location:../proje-update.php?updateProje=$id&durum=falseType");
      }

    }

    for ($i=0; $i < count($_FILES['pic']['name']) ; $i++) {

      if($_FILES['pic']['size'][$i] > $maxBoyut){
          header("Location:../proje-update.php?updateProje=$id&durum=falseSize");
      }
      else {
          $type=$_FILES['pic']['type'][$i];
          if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

              if(is_uploaded_file($_FILES['pic']['tmp_name'][$i])){

                  $uploads_dir="../../assets/img/projeler";
                  $tmp_name=$_FILES['pic']['tmp_name'][$i];
                  $name=$_FILES['pic']['name'][$i];
                  $sayı1=rand(20000,32000);
                  $sayı2=rand(20000,32000);
                  $sayı3=rand(20000,32000);
                  $sayı4=rand(20000,32000);
                  $essizad=$sayı1.$sayı2.$say3.$say4;
                  $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                  $dosyayol=$uploads_dir."/".$essizad.$name;
                  $dosyayol=ingilizceCeviri($dosyayol);
                  $refimgyol=ingilizceCeviri($refimgyol);
                  $tasi = move_uploaded_file($tmp_name,$dosyayol);
                  if($tasi){
                      $pro_resim_query="insert into proje_resimler (proje_id,resim_yol) values ($id,'$refimgyol') ";
                      $pro_resim=mysqli_query($conn ,$pro_resim_query);
                      if(!$pro_resim)
                          header("Location:../proje-update.php?updateProje=$id&control=error");
                  }
                  else
                      header("Location:../proje-update.php?updateProje=$id&control=error");
              }
              else
                header("Location:../proje-update.php?updateProje=$id&control=error");
          }else
              header("Location:../proje-update.php?updateProje=$id&durum=falseType");
      }
  }
  header("Location:../proje-update.php?updateProje=$id&durum=success");


}
else if(isset($_POST['projePasif'])){
    is_login();

    $id=mysqli_real_escape_string($conn, $_POST['projePasif']);
    $param=0;

    $projePasif_query="update projeler set proje_durum = ? where proje_id = ?";
    $sorgula = $conn->prepare($projePasif_query);
    $sorgula->bind_param("ii",$param,$id);
    $sorgula->execute();
    if(!$sorgula)
      header("Location:../pasif-projeler.php?durum=error");
    else{
      header("Location:../projeler.php?durum=success");
    }


}
else if(isset($_POST['proje_pasif_GeriAl'])){
  is_login();

  $id=mysqli_real_escape_string($conn, $_POST['proje_pasif_GeriAl']);
  $param=1;

  $projePasifGeri_query="update projeler set proje_durum = ? where proje_id = ?";
  $sorgula = $conn->prepare($projePasifGeri_query);
  $sorgula->bind_param("ii",$param,$id);
  $sorgula->execute();
  if(!$sorgula)
    header("Location:../pasif-projeler.php?durum=error");
  else{
    header("Location:../pasif-projeler.php?durum=success");
  }


}
else if(isset($_POST['projeDelete'])){
    is_login();
    $exception="none";
    $id=mysqli_real_escape_string($conn, $_POST['projeDelete']);
    $path_query="select resim_id,resim_yol from proje_resimler where proje_id = $id";
    $pathDelete=mysqli_query($conn,$path_query);

    while ($pathcek=mysqli_fetch_array($pathDelete)) {

      if(unlink("../../".$pathcek['resim_yol'])){
        $proje_query="delete from proje_resimler where resim_id= ?";
        $sorgula = $conn->prepare($proje_query);
        $sorgula->bind_param("i",$pathcek['resim_id']);
        $sorgula->execute();
        if(!$sorgula)
          $exception="hata";
      }
      else if(!file_exists("../../".$pathcek['resim_yol'])){
        $proje_query="delete from proje_resimler where resim_id= ?";
        $sorgula = $conn->prepare($proje_query);
        $sorgula->bind_param("i",$pathcek['resim_id']);
        $sorgula->execute();
        if(!$sorgula)
          $exception="hata";
      }
      else
        $exception="hata";

    }
    if ($exception == "hata") {
      $proje_query="delete from projeler where proje_id= ?";
      $sorgula = $conn->prepare($proje_query);
      $sorgula->bind_param("i",$id);
      $sorgula->execute();
      if(!$sorgula)
           header("Location:../pasif-projeler.php?durum=error&exception=hata");
      else
           header("Location:../pasif-projeler.php?durum=success&exception=hata");
    }else {
      $proje_query="delete from projeler where proje_id= ?";
      $sorgula = $conn->prepare($proje_query);
      $sorgula->bind_param("i",$id);
      $sorgula->execute();
      if(!$sorgula)
           header("Location:../pasif-projeler.php?durum=error");
      else
           header("Location:../pasif-projeler.php?durum=success");
    }

}
else if(isset($_POST['proje_Tumunu_Sil'])){
    is_login();
    $exception="none";
    $path_query="select proje_id from projeler";
    $pathcek_proje=mysqli_query($conn,$path_query);
    while ($pathcek_proje_result=mysqli_fetch_array($pathcek_proje)) {

      $id=mysqli_real_escape_string($conn, $pathcek_proje_result['proje_id']);
      $path_query="select resim_id,resim_yol from proje_resimler where proje_id = $id";
      $pathDelete=mysqli_query($conn,$path_query);

      while ($pathcek=mysqli_fetch_array($pathDelete)) {

        if(unlink("../../".$pathcek['resim_yol'])){
          $proje_query="delete from proje_resimler where resim_id= ?";
          $sorgula = $conn->prepare($proje_query);
          $sorgula->bind_param("i",$pathcek['resim_id']);
          $sorgula->execute();
          if(!$sorgula)
            $exception="hata";
        }
        else if(!file_exists("../../".$pathcek['resim_yol'])){
          $proje_query="delete from proje_resimler where resim_id= ?";
          $sorgula = $conn->prepare($proje_query);
          $sorgula->bind_param("i",$pathcek['resim_id']);
          $sorgula->execute();
          if(!$sorgula)
            $exception="hata";
        }
        else
          $exception="hata";

      }
        $proje_query="delete from projeler where proje_id= ?";
        $sorgula = $conn->prepare($proje_query);
        $sorgula->bind_param("i",$id);
        $sorgula->execute();
        if(!$sorgula)
          $exception="hata";
        else
          $exception="hata";

    }
    if($exception="hata")
         header("Location:../projeler.php?durum=success&exception=hata");
    else
         header("Location:../projeler.php?durum=success");



}

else if(isset($_POST['haberEkle'])){
    is_login();

    $maxBoyut=5242880;
    $temp_id=-1;
    $haber_ad=mysqli_real_escape_string($conn ,$_POST['haber_ad']);
    $haber_baslik=mysqli_real_escape_string($conn ,$_POST['haber_baslik']);
    $haber_aciklama=mysqli_real_escape_string($conn ,$_POST['haber_aciklama']);
    $temp_row_query="select haber_id from haberler where haber_makale LIKE '%$haber_aciklama%' order by haber_id desc ";
    $temp_row=mysqli_query($conn ,$temp_row_query);
    $temp_row_count=mysqli_num_rows($temp_row);
    if ($temp_row_count > 0){
      header("Location:../haber-ekle.php?durum=makale");
      exit;
    }

     $add_pro_query="insert into haberler (haber_ad,haber_baslik,haber_makale,haber_durum) values ('$haber_ad','$haber_baslik','$haber_aciklama',0)";
  if ($add_pro=mysqli_query($conn ,$add_pro_query)) {
      $temp_row_query="select haber_id from haberler where haber_makale LIKE '%$haber_aciklama%' order by haber_id desc ";
      $temp_row=mysqli_query($conn ,$temp_row_query);
      $temp_row_result=mysqli_fetch_array($temp_row);
      $temp_id=$temp_row_result['haber_id'];

          for ($i=0; $i < count($_FILES['pic']['name']) ; $i++) {

            if($_FILES['pic']['size'][$i] > $maxBoyut){
                header("Location:../haber-ekle.php?durum=falseSize");
            }
            else {
                $type=$_FILES['pic']['type'][$i];
                if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

                    if(is_uploaded_file($_FILES['pic']['tmp_name'][$i])){

                        $uploads_dir="../../assets/img/haberler";
                        $tmp_name=$_FILES['pic']['tmp_name'][$i];
                        $name=$_FILES['pic']['name'][$i];
                        $sayı1=rand(20000,32000);
                        $sayı2=rand(20000,32000);
                        $sayı3=rand(20000,32000);
                        $sayı4=rand(20000,32000);
                        $essizad=$sayı1.$sayı2.$say3.$say4;
                        $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                        $dosyayol=$uploads_dir."/".$essizad.$name;
                        $dosyayol=ingilizceCeviri($dosyayol);
                        $refimgyol=ingilizceCeviri($refimgyol);
                        $tasi = move_uploaded_file($tmp_name,$dosyayol);
                        if($tasi){
                            $pro_resim_query="insert into haber_resimler (haber_id,resim_yol) values ($temp_id,'$refimgyol') ";
                            $pro_resim=mysqli_query($conn ,$pro_resim_query);
                            if(!$pro_resim)
                                header("Location:../haber-ekle.php?control=error");
                        }
                        else
                            header("Location:../haber-ekle.php?control=error");
                    }
                }else
                    header("Location:../haber-ekle.php?durum=falseType");
            }
        }
        header("Location:../haber-ekle.php?durum=success");

    }else {
      header("Location:../haber-ekle.php?durum=none");
    }

}
else if(isset($_POST['haberUpdate'])){

    $id=mysqli_real_escape_string($conn ,$_POST['haberUpdate']);
    $ad=mysqli_real_escape_string($conn ,$_POST['haber_ad']);
    $baslik=mysqli_real_escape_string($conn ,$_POST['haber_baslik']);
    $makale=mysqli_real_escape_string($conn ,$_POST['haber_aciklama']);

    $updatesor="update haberler set haber_ad='$ad', haber_baslik='$baslik', haber_makale='$makale' where haber_id = $id";
    $update=mysqli_query($conn ,$updatesor);
    if (!$update)
      header("Location:../haber-update.php?updateHaber=$id&durum=exception");

    $maxBoyut=5242880;

    $resimsor="select * from haber_resimler where haber_id = $id";
    $resimcek=mysqli_query($conn ,$resimsor);
    while ($resimresult=mysqli_fetch_array($resimcek)) {

      $resimid=$resimresult['resim_id'];

      if ($_FILES['resim_'.$resimid]['size'] == 0 )
        continue;
      else if ($_FILES['resim_'.$resimid]['size'] > $maxBoyut) {
        header("Location:../haber-update.php?updateHaber=$id&durum=falseSize");
      }
      else{
        $type=$_FILES['resim_'.$resimid]['type'];
        if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

            unlink("../../".$resimresult['resim_yol']);

            if(is_uploaded_file($_FILES['resim_'.$resimid]['tmp_name'])){

                $uploads_dir="../../assets/img/haberler";
                $tmp_name=$_FILES['resim_'.$resimid]['tmp_name'];
                $name=$_FILES['resim_'.$resimid]['name'];
                $sayı1=rand(20000,32000);
                $sayı2=rand(20000,32000);
                $sayı3=rand(20000,32000);
                $sayı4=rand(20000,32000);
                $essizad=$sayı1.$sayı2.$say3.$say4;
                $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                $dosyayol=$uploads_dir."/".$essizad.$name;
                $dosyayol=ingilizceCeviri($dosyayol);
                $refimgyol=ingilizceCeviri($refimgyol);
                $tasi = move_uploaded_file($tmp_name,$dosyayol);
                if($tasi){
                    $pro_resim_query="update haber_resimler set resim_yol = '$refimgyol' where resim_id =$resimid ";
                    $pro_resim=mysqli_query($conn ,$pro_resim_query);
                    if(!$pro_resim)
                        $exception="hata";
                }
                else
                  $exception="hata";
            }
            else
              $exception="hata";

        }else
            header("Location:../haber-update.php?updateHaber=$id&durum=falseType");
      }

    }

    for ($i=0; $i < count($_FILES['pic']['name']) ; $i++) {

      if($_FILES['pic']['size'][$i] > $maxBoyut){
          header("Location:../haber-update.php?updateHaber=$id&durum=falseSize");
      }
      else {
          $type=$_FILES['pic']['type'][$i];
          if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif"){

              if(is_uploaded_file($_FILES['pic']['tmp_name'][$i])){

                  $uploads_dir="../../assets/img/haberler";
                  $tmp_name=$_FILES['pic']['tmp_name'][$i];
                  $name=$_FILES['pic']['name'][$i];
                  $sayı1=rand(20000,32000);
                  $sayı2=rand(20000,32000);
                  $sayı3=rand(20000,32000);
                  $sayı4=rand(20000,32000);
                  $essizad=$sayı1.$sayı2.$say3.$say4;
                  $refimgyol=substr($uploads_dir,6)."/".$essizad.$name;
                  $dosyayol=$uploads_dir."/".$essizad.$name;
                  $dosyayol=ingilizceCeviri($dosyayol);
                  $refimgyol=ingilizceCeviri($refimgyol);
                  $tasi = move_uploaded_file($tmp_name,$dosyayol);
                  if($tasi){
                      $pro_resim_query="insert into haber_resimler (haber_id,resim_yol) values ($id,'$refimgyol') ";
                      $pro_resim=mysqli_query($conn ,$pro_resim_query);
                      if(!$pro_resim)
                          header("Location:../haber-update.php?updateHaber=$id&control=error");
                  }
                  else
                      header("Location:../haber-update.php?updateHaber=$id&control=error");
              }
              else
                header("Location:../haber-update.php?updateHaber=$id&control=error");
          }else
              header("Location:../haber-update.php?updateHaber=$id&durum=falseType");
      }
  }
  header("Location:../haber-update.php?updateHaber=$id&durum=success");


}
else if(isset($_POST['haberPasif'])){
    is_login();

    $id=mysqli_real_escape_string($conn, $_POST['haberPasif']);
    $param=0;

    $haberPasif_query="update haberler set haber_durum = ? where haber_id = ?";
    $sorgula = $conn->prepare($haberPasif_query);
    $sorgula->bind_param("ii",$param,$id);
    $sorgula->execute();
    if(!$sorgula)
      header("Location:../pasif-haberler.php?durum=error");
    else{
      header("Location:../haberler.php?durum=success");
    }


}
else if(isset($_POST['haber_pasif_GeriAl'])){
  is_login();

  $id=mysqli_real_escape_string($conn, $_POST['haber_pasif_GeriAl']);
  $param=1;

  $haberPasifGeri_query="update haberler set haber_durum = ? where haber_id = ?";
  $sorgula = $conn->prepare($haberPasifGeri_query);
  $sorgula->bind_param("ii",$param,$id);
  $sorgula->execute();
  if(!$sorgula)
    header("Location:../pasif-haberler.php?durum=error");
  else{
    header("Location:../pasif-haberler.php?durum=success");
  }


}
else if(isset($_POST['haberDelete'])){
    is_login();
    $exception="none";
    $id=mysqli_real_escape_string($conn, $_POST['haberDelete']);
    $path_query="select resim_id,resim_yol from haber_resimler where haber_id = $id";
    $pathDelete=mysqli_query($conn,$path_query);

    while ($pathcek=mysqli_fetch_array($pathDelete)) {

      if(unlink("../../".$pathcek['resim_yol'])){
        $haber_query="delete from haber_resimler where resim_id= ?";
        $sorgula = $conn->prepare($haber_query);
        $sorgula->bind_param("i",$pathcek['resim_id']);
        $sorgula->execute();
        if(!$sorgula)
          $exception="hata";
      }
      else if(!file_exists("../../".$pathcek['resim_yol'])){
        $haber_query="delete from haber_resimler where resim_id= ?";
        $sorgula = $conn->prepare($haber_query);
        $sorgula->bind_param("i",$pathcek['resim_id']);
        $sorgula->execute();
        if(!$sorgula)
          $exception="hata";
      }
      else
        $exception="hata";

    }
    if ($exception == "hata") {
      $haber_query="delete from haberler where haber_id= ?";
      $sorgula = $conn->prepare($haber_query);
      $sorgula->bind_param("i",$id);
      $sorgula->execute();
      if(!$sorgula)
           header("Location:../pasif-haberler.php?durum=error&exception=hata");
      else
           header("Location:../pasif-haberler.php?durum=success&exception=hata");
    }else {
      $haber_query="delete from haberler where haber_id= ?";
      $sorgula = $conn->prepare($haber_query);
      $sorgula->bind_param("i",$id);
      $sorgula->execute();
      if(!$sorgula)
           header("Location:../pasif-haberler.php?durum=error");
      else
           header("Location:../pasif-haberler.php?durum=success");
    }

}
else if(isset($_POST['haber_Tumunu_Sil'])){
    is_login();
    $exception="none";
    $path_query="select haber_id from haberler";
    $pathcek_haber=mysqli_query($conn,$path_query);
    while ($pathcek_haber_result=mysqli_fetch_array($pathcek_haber)) {

      $id=mysqli_real_escape_string($conn, $pathcek_haber_result['haber_id']);
      $path_query="select resim_id,resim_yol from haber_resimler where haber_id = $id";
      $pathDelete=mysqli_query($conn,$path_query);

      while ($pathcek=mysqli_fetch_array($pathDelete)) {

        if(unlink("../../".$pathcek['resim_yol'])){
          $haber_query="delete from haber_resimler where resim_id= ?";
          $sorgula = $conn->prepare($haber_query);
          $sorgula->bind_param("i",$pathcek['resim_id']);
          $sorgula->execute();
          if(!$sorgula)
            $exception="hata";
        }
        else if(!file_exists("../../".$pathcek['resim_yol'])){
          $haber_query="delete from haber_resimler where resim_id= ?";
          $sorgula = $conn->prepare($haber_query);
          $sorgula->bind_param("i",$pathcek['resim_id']);
          $sorgula->execute();
          if(!$sorgula)
            $exception="hata";
        }
        else
          $exception="hata";

      }
        $haber_query="delete from haberler where haber_id= ?";
        $sorgula = $conn->prepare($haber_query);
        $sorgula->bind_param("i",$id);
        $sorgula->execute();
        if(!$sorgula)
          $exception="hata";
        else
          $exception="hata";

    }
    if($exception="hata")
         header("Location:../haberler.php?durum=success&exception=hata");
    else
         header("Location:../haberler.php?durum=success");



}

else
  header("Location:../error.php");
?>
