<?php
require_once('header.php');
require_once('side-bar.php');

$param = 'True';
$slidersor="SELECT * FROM ana_slider where slider_durum = $param ";
$result = mysqli_query( $conn, $slidersor);

$param='False';
$slidersor="SELECT * FROM ana_slider where slider_durum = $param";
$saycek = mysqli_query( $conn, $slidersor);
$say=mysqli_num_rows($saycek);

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Sliderlar Paneline Hoşgeldiniz.</h1>
                        <h1 class="page-subhead-line">Sliderlarınızı bu panelden yönetebilirsiniz. </h1>

                    </div>
                    <div class="col-md-12" >
                    <a href="slider-insert.php" ><button class="btn btn-success" >Slider Ekle</button></a>
                    <a href="pasif-sliderlar.php" class="btn btn-success" style="visibility:<?php if($say < 1)
                                                                                                      echo "hidden";
                                                                                                  else
                                                                                                      echo "visible";?>" >Pasif Sliderlar</a>
                    <hr>
                    </div>
                    <div class="col-md-12">
                      <?php
                      if($_GET['durum'] == "success") {
                      ?>
                              <div class="alert alert-success alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  Düzenleme Başarıyla Gerçekleştirildi.
                              </div>
                      <?php } else if($_GET['durum'] == "error"){ ?>
                          <div class="alert alert-danger alert-dismissable">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  Düzenleme Başarısız!
                              </div>
                      <?php } ?>
                          <div class="alert alert-danger alert-dismissable">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                              Sliderlar silinmeyip pasif kaldığı takdirde her bir sliderın resim boyutundan dolayı kaplayacağı belirli bir alan vardır.
                              (Her bir slider ortalama olarak 1-2 MB yer kaplamaktadır.)
                          </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Aktif Sliderlar
                          <div class="col-md-6 searchPanel" style="float:right">
                            <form id="searchSort" class="" method="post">
                                  <div class="col-md-6 searchPanel" onkeyup="slideSearchSort()">
                                    <input id="slideAra" class="form-control" type="text" placeholder="Ara..." name="slideAra" value="">
                                  </div>
                                  <div class="col-md-6 searchPanel">
                                    <select id="slideSirala" class="form-control" onchange="slideSearchSort()" name="slideSirala">
                                      <option value="undefined">Biçim Seçiniz...</option>
                                      <option value="ad/1">Ad - Artan</option>
                                      <option value="ad/2">Ad - Azalan</option>
                                      <option value="baslik/1">Başlık - Artan</option>
                                      <option value="baslik/2">Başlık - Azalan</option>
                                      <option value="url/1">URL - Artan</option>
                                      <option value="url/2">URL - Azalan</option>
                                      <option value="aciklama/1">Açıklama - Artan</option>
                                      <option value="aciklama/2">Açıklama - Azalan</option>
                                    </select>
                                  </div>
                                  <input id="aktif" style="display:none" name="aktif" value="1">
                            </form>
                          </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive" style="overflow-x:auto;overflow-y:auto;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Slider Resmi</th>
                                            <th>Slider Adı</th>
                                            <th>Slider Url</th>
                                            <th>Slider Başlık</th>
                                            <th>Slider Açıklaması</th>
                                            <th style="width:20px"></th>
                                            <th style="width:20px"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="slide-tbody" >
                                    <form action="netting/islem.php" method="POST">
                                        <?php
                                            $i=1;
                                            while ($satir=mysqli_fetch_array($result))
                                            {
                                            ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                  <a href="#img_<?php echo $i; ?>"><img width="200px" height="100px" src="<?php echo "../".$satir['slider_resimyolu']; ?>" alt="Slider Resmi"></a>
                                                  <a href="#_<?php echo $i; ?>" class="lightbox trans" id="img_<?php echo $i; ?>"><img src="<?php echo "../".$satir['slider_resimyolu']; ?>"></a>
                                                </td>
                                                <td><?php echo $satir['slider_ad']; ?></td>
                                                <td><?php echo $satir['slider_url']; ?></td>
                                                <td><?php echo $satir['slider_baslik']; ?></td>
                                                <td><?php echo $satir['slider_aciklama']; ?></td>
                                                <td ><a href="slider-update.php?updateSlider=<?php echo $satir['slider_id']; ?>"><input type="button" class="btn btn-primary" value="Düzenle"/></a></td>
                                                <td><button type="submit" class="btn btn-danger" name="sliderPasif" value="<?php echo $satir['slider_id']; ?>" >Pasifleştir</button></a></td>
                                            </tr>
                                            <?php $i++; } ?>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

<?php require_once('footer.php'); ?>
