<?php
require_once('header.php');
require_once('side-bar.php');

    $param=mysqli_real_escape_string($conn, $_GET['updateSlider']);
    $slidersor=mysqli_query($conn,"Select * From ana_slider where slider_id = $param");
    $slidercek=mysqli_fetch_array($slidersor);

?>

<!-- İndex göbek -->
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Slider Düzenleme Panelindesiniz</h1>


                    <?php
                    if($_GET['control'] == "success") {
                    ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Düzenleme Başarıyla Gerçekleştirildi.
                            </div>
                    <?php } else if($_GET['control'] == "error"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Düzenleme Başarısız!
                            </div>
                    <?php } ?>
                    <?php if($_GET['durum'] == "falseSize"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Düzenleme Başarısız! Dosya boyutu <b>2 MB</b>'dan küçük olmalıdır.
                            </div>
                    <?php } else if($_GET['durum'] == "falseType"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Düzenleme Başarısız! Dosya uzantısı <b>JPG,PNG veya GİF</b> olabilir.
                            </div>
                    <?php } ?>

                        <h1 class="page-subhead-line">Sliderı düzenliyorsunuz...</h1>

                    </div>


                </div>
                <!-- /. PAGE INNER  -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">SLİDER DÜZENLEME</div>
                        <div class="panel-body">
                            <form action="netting/islem.php" onSubmit="return update_onsubmit()" name="imageInsert" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Slider Adı*</label>
                                        <input class="form-control" type="text" value="<?php echo $slidercek['slider_ad'] ?>" name="slider_ad"  required >
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                <div class="form-group" >
                                    <label class="control-label col-lg-4">Resim Yükleme*</label>
                                    <div class="">
                                        <div class="fileupload fileupload-preview fileupload-exists" data-provides="fileupload" style="margin-left:15px">
                                            <div  class="fileupload-preview thumbnail" style="width: 200px; height: 150px;">
                                            <img id="control" src="<?php echo "../".$slidercek['slider_resimyolu'] ?>" />
                                            </div>
                                            <div>
                                                <span class="btn btn-file btn-success">
                                                    <span class="fileupload-new">Resim Seç</span>
                                                    <span class="fileupload-exists">Değiştir</span>
                                                    <input type="file" value="../<?php echo "../".$slidercek['slider_resimyolu'] ?>" name="slidegorsel">
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
                                        <input class="form-control" type="text" name="slider_url" value="<?php echo $slidercek['slider_url'] ?>" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Slider Başlık*</label>
                                        <input class="form-control" type="text" name="slider_baslik" value="<?php echo $slidercek['slider_baslik'] ?>"  required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Slider Açıklama*</label>
                                        <input class="form-control" type="text" name="slider_aciklama" value="<?php echo $slidercek['slider_aciklama'] ?>" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" style="margin-left:15px" class="btn btn-danger" value="<?php echo $slidercek['slider_id'] ?>" name="sliderUpdate">Sliderı Kaydet</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
</div>

<?php require_once('footer.php'); ?>
