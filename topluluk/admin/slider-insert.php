<?php
require_once('header.php');
require_once('side-bar.php');



?>

<!-- İndex göbek -->
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Slider Ekleme Panelindesiniz</h1>


                    <?php
                    if($_GET['control'] == "success") {
                    ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ekleme Başarıyla Gerçekleştirildi.
                            </div>
                    <?php } else if($_GET['control'] == "error"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Ekleme Başarısız!
                            </div>
                    <?php } ?>
                    <?php if($_GET['durum'] == "falseSize"){ ?>
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

                        <h1 class="page-subhead-line">Slider Ekliyorsunuz...</h1>

                    </div>


                </div>
                <!-- /. PAGE INNER  -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">SLİDER EKLEME</div>
                        <div class="panel-body">
                            <form action="netting/islem.php" onSubmit="return islem_onsubmit()" name="imageInsert" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Slider Adı*</label>
                                        <input class="form-control" type="text" name="slider_ad"  required >
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                <div class="form-group" >
                                    <label class="control-label col-lg-4">Resim Yükleme*</label>
                                    <div class="">
                                        <div class="fileupload fileupload-new" data-provides="fileupload" style="margin-left:15px">
                                            <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-file btn-success">
                                                    <span class="fileupload-new">Resim Seç</span>
                                                    <span class="fileupload-exists">Değiştir</span>
                                                    <input type="file" name="slidegorsel" required >
                                                </span>
                                                <span class="fileupload-previvew"></span>
                                                <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Sil</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Slider Url*</label>
                                        <input class="form-control" type="text" name="slider_url" value="http://" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Slider Başlığı*</label>
                                        <input class="form-control" type="text" name="slider_baslik" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Slider Açıklaması*</label>
                                        <input class="form-control" type="text" name="slider_aciklama"  required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" style="margin-left:15px" class="btn btn-danger" name="sliderEkle">Sliderı Kaydet</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
</div>

<?php require_once('footer.php'); ?>
