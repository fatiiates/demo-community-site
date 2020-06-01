<?php
require_once('header.php');
require_once('side-bar.php');

$param = 'True';
$habersor="SELECT * FROM haberler where haber_durum = $param ";
$result = mysqli_query( $conn, $habersor);

$param='False';
$habersor="SELECT * FROM haberler where haber_durum = $param";
$saycek = mysqli_query( $conn, $habersor);
$say=mysqli_num_rows($saycek);

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Haberler Paneline Hoşgeldiniz.</h1>
                        <h1 class="page-subhead-line">Haberlerinizi bu panelden yönetebilirsiniz. </h1>

                    </div>
                    <div class="col-md-12" >
                    <a href="haber-ekle.php" ><button class="btn btn-success" >Haber Ekle</button></a>
                    <a href="pasif-haberler.php" class="btn btn-success" style="visibility:<?php if($say < 1)
                                                                                                      echo "hidden";
                                                                                                  else
                                                                                                      echo "visible";?>" >Pasif Haberler</a>
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
                              Haberler silinmeyip pasif kaldığı takdirde her bir habernin resim boyutundan dolayı kaplayacağı belirli bir alan vardır.
                              (Her bir haber ortalama olarak 3MB+ yer kaplamaktadır.)
                          </div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                          Aktif Haberler
                          <div class="col-md-6 searchPanel" style="float:right">
                            <form id="searchSort" class="" method="post">
                                  <div class="col-md-6 searchPanel" onkeyup="makaleSearchSort()">
                                    <input id="makaleAra" class="form-control" type="text" placeholder="Ara..." name="makaleAra" value="">
                                  </div>
                                  <div class="col-md-6 searchPanel">
                                    <select id="makaleSirala" class="form-control" onchange="makaleSearchSort()" name="makaleSirala">
                                      <option value="undefined">Biçim Seçiniz...</option>
                                      <option value="ad/1">Ad - Artan</option>
                                      <option value="ad/2">Ad - Azalan</option>
                                      <option value="baslik/1">Başlık - Artan</option>
                                      <option value="baslik/2">Başlık - Azalan</option>
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
                                            <th>Haber Adı</th>
                                            <th>Haber Başlık</th>
                                            <th>Haber Açıklaması</th>
                                            <th style="width:20px"></th>
                                            <th style="width:20px"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="makale-tbody" >
                                    <form action="netting/islem.php" method="POST">
                                        <?php
                                            $i=1;
                                            while ($satir=mysqli_fetch_array($result))
                                            {
                                            ?>

                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $satir['haber_ad']; ?></td>
                                                <td><?php echo $satir['haber_baslik']; ?></td>
                                                <td><?php echo $satir['haber_makale']; ?></td>
                                                <td ><a href="haber-update.php?updateHaber=<?php echo $satir['haber_id']; ?>"><input type="button" class="btn btn-primary" value="Düzenle"/></a></td>
                                                <td><button type="submit" class="btn btn-danger" name="haberPasif" value="<?php echo $satir['haber_id']; ?>" >Pasifleştir</button></a></td>
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
