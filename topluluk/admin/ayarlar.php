<?php
 require_once('header.php');
 require_once('side-bar.php');

?>

<!-- İndex göbek -->
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">SİTE GENEL AYARLARI</h1>


                    <?php
                    if($_GET['control'] == "true") {
                    ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Güncelleme Başarıyla Gerçekleştirildi.
                            </div>
                    <?php }else if ($_GET['control'] == "false"){ ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Güncelleme Başarısız!
                            </div>
                    <?php } ?>
                        <h1 class="page-subhead-line">Sitenizin ayarlarını aşağıdan düzenleyebilirsiniz.</h1>

                    </div>


                </div>
                <!-- /. PAGE INNER  -->
                <div class="col-md-12 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Site Ayarları</div>
                        <div class="panel-body">
                            <form action="netting/islem.php" method="post">
                                <div class="col-md-12">
                                    <div class="form-group col-md-6" >
                                        <label>Sayfa Başlığı</label>
                                        <input class="form-control" type="text" name="ayar_title" value="<?php echo $ayarcek['ayar_title'];  ?> " required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Sayfa Açıklaması</label>
                                        <input class="form-control" type="text" name="ayar_description" value="<?php echo $ayarcek['ayar_description'];  ?>" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Anahtar Kelimeler</label>
                                        <input class="form-control" type="text" name="ayar_keywords" value="<?php echo $ayarcek['ayar_keywords'];  ?>"  required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-3">
                                        <label>Telefon Numaranız</label>
                                        <input class="form-control" type="text" name="ayar_telefon" value="<?php echo $ayarcek['ayar_telefon'];  ?>"  required >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Email Adresiniz</label>
                                        <input class="form-control" type="text" name="ayar_mail" value="<?php echo $ayarcek['ayar_mail'];  ?>" required >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Faks Numaranız</label>
                                        <input class="form-control" type="text" name="ayar_fax" value="<?php echo $ayarcek['ayar_fax'];  ?>" required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-3">
                                        <label>Facebook Adresiniz</label>
                                        <input class="form-control" type="text" name="ayar_facebook" value="<?php echo $ayarcek['ayar_facebook'];  ?>" required >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Twitter Adresiniz</label>
                                        <input class="form-control" type="text" name="ayar_twitter" value="<?php echo $ayarcek['ayar_twitter'];  ?>" required >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Youtube Adresiniz</label>
                                        <input class="form-control" type="text" name="ayar_youtube" value="<?php echo $ayarcek['ayar_youtube'];  ?>" required >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Google Adresiniz</label>
                                        <input class="form-control" type="text" name="ayar_google" value="<?php echo $ayarcek['ayar_google'];  ?>" required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12" >
                                        <label>Adresiniz</label>

                                        <textarea name="ayar_adres" rows="4" style="resize:none" class="form-control" cols="40"  required ><?php echo $ayarcek['ayar_adres']?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Adresinizin Google Urlsi</label>
                                        <input class="form-control" type="text" name="ayar_googleUrl" value="<?php echo $ayarcek['ayar_googleUrl'];  ?>"  required >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12" >
                                        <label>Vizyonumuz</label>

                                        <textarea name="ayar_vizyon" rows="4" style="resize:none" class="form-control" cols="40"  required ><?php echo $ayarcek['ayar_vizyon']?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12" >
                                        <label>Misyonumuz</label>

                                        <textarea name="ayar_misyon" rows="4" style="resize:none" class="form-control" cols="40"  required ><?php echo $ayarcek['ayar_misyon']?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group col-md-12" >
                                        <label>Hakkımızda kısmına eklemek istedikleriniz</label>

                                        <textarea name="ayar_hakkimizda" rows="4" style="resize:none" class="form-control" cols="40"  required ><?php echo $ayarcek['ayar_hakkimizda']?></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" style="margin-left:15px" class="btn btn-primary" name="ayarKaydet"  required >Ayarları Kaydet</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
</div>

<?php include 'footer.php'; ?>
