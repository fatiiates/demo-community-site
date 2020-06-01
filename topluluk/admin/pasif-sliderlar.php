<?php
require_once('header.php');
require_once('side-bar.php');

$param='False';
$slidersor="SELECT * FROM ana_slider where slider_durum = $param ";
$result = mysqli_query( $conn, $slidersor);

$say=mysqli_num_rows($result);
if($say < 1)
    header("Location:sliderlar.php");

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line ">Pasif Sliderlar paneline hoşgeldiniz.</h1>
                        <h1 class="page-subhead-line">Buradan pasif sliderları aktifleştirebilir ve silebilirsiniz.</h1>

                    </div>
                    <div class="col-md-12" >
                      <a href="sliderlar.php" style="margin-left:10px" ><button class="btn btn-success" >Aktif Sliderlar</button></a>
                      <form class="col-md-1" action="netting/islem.php" method="post">
                        <button class="btn btn-success" type="submit" name="slider_Tumunu_Sil" >Tümünü Sil</button>
                      </form>
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        Pasif Sliderlar
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
                                <input id="aktif" style="display:none" name="aktif" value="0">
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
                                                <td><button type="submit" class="btn btn-primary" name="slider_pasif_GeriAl" value="<?php echo $satir['slider_id']; ?>" >Aktifleştir</button></a></td>
                                                <td><button type="submit" class="btn btn-danger" name="sliderDelete" value="<?php echo $satir['slider_id']; ?>" >Sil</button></a></td>
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
