<?php
require_once('header.php');
require_once('side-bar.php');

$id=mysqli_real_escape_string($conn , $_GET['updateHaber']);
$habersor="select * from haberler where haber_id = $id LIMIT 1";
$habercek=mysqli_query($conn ,$habersor);
$haberresult=mysqli_fetch_array($habercek);

$resimsor="select * from haber_resimler where haber_id = $id";
$resimcek=mysqli_query($conn ,$resimsor);


?>

<!-- İndex göbek -->
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Haber Güncelleme Panelindesiniz</h1>
                        <h1 class="page-subhead-line">Haber Güncelleme...</h1>
                    </div>
                </div>
                <!-- /. PAGE INNER  -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">HABER GÜNCELLEME</div>
                        <div class="panel-body">
                            <form action="netting/islem.php" onsubmit="return validateMakaleUpdate()" name="imageInsert" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Haber Adı*</label>
                                        <input class="form-control" type="text" name="haber_ad" value="<?php echo $haberresult['haber_ad'] ?>" required >
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                  <?php while ($resimresult=mysqli_fetch_array($resimcek)) {
                                    $resimad=explode("/",$resimresult['resim_yol']);
                                    $resimad =array_reverse($resimad);
                                    ?>
                                    <div class="form-group" >

                                          <div style="margin-left:15px;" >
                                              <div class="fileupload fileupload-exists" data-provides="fileupload">
                                                <input type="hidden" value="" name="">
                                                <span class="btn btn-file btn-success">
                                                      <span class="fileupload-new">Resim Seç</span>
                                                      <span class="fileupload-exists">Değiştir</span>
                                                      <input type="file" class="__resim" id="resim_<?php echo $resimresult['resim_id'] ?>" name="resim_<?php echo $resimresult['resim_id'] ?>" accept="image/png,image/gif,image/jpeg" multiple>
                                                  </span>
                                                  <span class="fileupload-preview"><?php echo $resimad[0] ?></span>
                                                  <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                              </div>
                                          </div>

                                    </div>
                                  <?php } ?>
                                <div class="form-group" >

                                      <div style="margin-left:15px;" >
                                          <div class="fileupload fileupload-new" data-provides="fileupload">
                                              <span class="btn btn-file btn-warning">
                                                  <span class="fileupload-new">YENİ EKLE</span>
                                                  <span class="fileupload-exists">Değiştir</span>
                                                  <input type="file" id="pic" name="pic[]" accept="image/png,image/gif,image/jpeg" multiple>
                                              </span>
                                              <span class="fileupload-preview"></span>
                                              <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a>
                                          </div>
                                      </div>

                                </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Haber Başlığı*</label>
                                        <input class="form-control" type="text" name="haber_baslik" value="<?php echo $haberresult['haber_baslik'] ?>" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Haber Açıklaması*</label>
                                        <textarea class="form-control" cols="5" rows="10" type="text"  name="haber_aciklama"  required ><?php echo $haberresult['haber_makale'] ?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" style="margin-left:15px" value="<?php echo $haberresult['haber_id'] ?>"  class="btn btn-danger" name="haberUpdate">Haberi Kaydet</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
</div>

<?php require_once('footer.php'); ?>
