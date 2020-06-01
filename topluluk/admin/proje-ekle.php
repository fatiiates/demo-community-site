<?php
require_once('header.php');
require_once('side-bar.php');



?>

<!-- İndex göbek -->
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Proje Ekleme Panelindesiniz</h1>


                    <?php
                    if($_GET['durum'] == "success") {
                    ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ekleme Başarıyla Gerçekleştirildi.
                            </div>
                    <?php } else if($_GET['durum'] == "error"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ekleme Başarısız!
                            </div>
                    <?php } if($_GET['durum'] == "makale"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                MAKALESİ AYNI OLAN PROJELER EKLENEMEZ.
                            </div>
                    <?php } else if($_GET['durum'] == "falseSize"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ekleme Başarısız! Dosya boyutu <b>2 MB</b>'dan küçük olmalıdır.
                            </div>
                    <?php } else if($_GET['durum'] == "falseType"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ekleme Başarısız! Dosya uzantısı <b>JPG,PNG veya GİF</b> olabilir.
                            </div>
                    <?php } ?>

                        <h1 class="page-subhead-line">Proje Ekliyorsunuz...</h1>

                    </div>


                </div>
                <!-- /. PAGE INNER  -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">PROJE EKLEME</div>
                        <div class="panel-body">
                            <form action="netting/islem.php" onsubmit="return validateMakale()" name="imageInsert" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Proje Adı*</label>
                                        <input class="form-control" type="text" name="proje_ad"  required >
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                <div class="form-group" >

                                      <div style="margin-left:15px;" >
                                          <div class="fileupload fileupload-new" data-provides="fileupload">
                                              <span class="btn btn-file btn-default">
                                                  <span class="fileupload-new">Resim Seç</span>
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
                                        <label>Proje Başlığı*</label>
                                        <input class="form-control" type="text" name="proje_baslik" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Proje Açıklaması*</label>
                                        <textarea class="form-control" cols="5" rows="10" type="text" name="proje_aciklama"  required ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" style="margin-left:15px" value="1"  class="btn btn-danger" name="projeEkle">Projeyi Kaydet</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
</div>

<?php require_once('footer.php'); ?>
