<?php

require_once('header.php');

$proje_query="select * from projeler where proje_durum = 1 ";
$projecek=mysqli_query($conn ,$proje_query);

$sonLimit=mysqli_num_rows($projecek);

$pagi=ceil($sonLimit/7);

 ?>
 <style media="screen">

 </style>
 <div class="ortablok" >
         <div class="limiter" >
             <div class="container-login100" style="background-color:darkgray;margin:auto;align-items:start;background-image: url('assets/img/projeler.jpg');">
                 <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" style="width:70%;margin-top:5%;background-color: rgba(255, 255, 255, 1);">
                   <p class="projeler">PROJELER</p>
                       <form id="makaleSearch" class="" method="post">
                         <div class="search">
                           <div>
                             Ara:
                             <input id="makaleAra" type="text" name="makaleAra" onchange="makaleSearch()" onkeypress="makaleSearch()" onkeyup="makaleSearch()" onkeydown="makaleSearch()" placeholder="       Ara . . ." required>
                             <input id="makale" type="hidden" name="makale" value="proje">
                           </div>
                         </div>
                       </form>
                       <div id="makale-content">

                       <?php
                       $i=1;

                       for ($x=$pagi; $x > 0; $x--) {

                         $son=$x*7;

                         $baslangic=$son-7;
                         if ($baslangic < 0)
                           $baslangic=0;

                         $proje_query_pagi="select * from projeler where proje_durum = 1 order by proje_id desc LIMIT $baslangic,$son ";
                         $projecek_pagi=mysqli_query($conn ,$proje_query_pagi);

                          ?>
                         <div class="pagi" id="sayfa_<?php echo $x; ?>" <?php if($x != 1)
                                                                                echo 'style="display:none;"'?>>
                        <?php while ($proje_result=mysqli_fetch_array($projecek_pagi)) {

                           $pid=$proje_result['proje_id'];
                           $resimcek_query="select resim_yol from proje_resimler where proje_id=$pid";
                           $resimcek=mysqli_query($conn ,$resimcek_query);

                           $pid=$pid*98765432123456789;
                           ?>
                             <div class="projeContent" >
                               <div class="paragraf">
                                 <?php if ($resimcek_result=mysqli_fetch_array($resimcek)) { ?>
                                   <a href="#img_<?php echo $i; ?>"><img src="<?php echo $resimcek_result['resim_yol']; ?>" height="200px" ></a>
                                   <a href="#_<?php echo $i; ?>" class="lightbox trans" id="img_<?php echo $i; ?>"><img style="float: none!important;margin: 0 auto!important;" src="<?php echo $resimcek_result['resim_yol']; ?>"></a>

                                 <?php } ?>

                                 <a href="proje.php?proje=<?php echo $pid; ?>"><p class="baslik" ><?php echo $proje_result['proje_baslik']; ?></p></a>
                                 <a href="proje.php?proje=<?php echo $pid; ?>"><p class="aciklama" ><?php echo $proje_result['proje_makale']; ?></p></a>
                                 <a href="proje.php?proje=<?php echo $pid; ?>" class="git">İncele!</a>
                               </div>
                             </div>
                         <?php $i++; } ?>
                       </div>
                       <?php } ?>
                       <div class="pagination-proje">
                         <?php
                         $a=1;
                         $color='style="color:white;background:#e8341b"';
                         while ($a <= $pagi) { ?>
                             <a class="pagi-anchor" onclick="paginationProje(this)" href="#sayfa_<?php echo $a; ?>"><?php echo $a ?></a>

                         <?php $a++; } ?>
                       </div>

                     </div>
                 </div>
             </div>
         </div>
       </div>
 </div>
 <?php

 require_once('footer.php');

  ?>
