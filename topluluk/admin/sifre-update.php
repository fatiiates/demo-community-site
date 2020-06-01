<?php
require_once('header.php');
require_once('side-bar.php');


?>

<!-- İndex göbek -->
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Şifre Değiştirme Panelindesiniz</h1>


                    <?php
                    if($_GET['pass'] == "success") {
                    ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Düzenleme Başarıyla Gerçekleştirildi.
                            </div>
                    <?php } else if($_GET['pass'] == "error"){ ?>
                        <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Düzenleme Başarısız! Şifre girilmemiş olabilir, eski şifreniz uyuşmuyor olabilir veya şifreler birbiriyle uyuşmuyor.
                            </div>
                    <?php } ?>

                        <h1 class="page-subhead-line">Şifrenizi değiştiriyorsunuz...</h1>

                    </div>


                </div>
                <!-- /. PAGE INNER  -->
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">ŞİFRE DEĞİŞTİRME</div>
                        <div class="panel-body">
                            <form action="netting/islem.php"  method="POST">
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Eski Şifreniz*</label>
                                        <input class="form-control" type="password"  name="admin_sifre" required  >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Yeni Şifreniz*</label>
                                        <input class="form-control" type="password"  name="admin_sifre_new"  required >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group col-md-12" >
                                        <label>Yeni Şifreniz Tekrar*</label>
                                        <input class="form-control" type="password"  name="admin_sifre_new_r" required  >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" style="margin-left:15px" class="btn btn-danger" name="admin_sifreUpdate">Şifreyi Değiştir</button>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
</div>

<?php require_once('footer.php'); ?>
