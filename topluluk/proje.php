<?php

require_once('header.php');
if (empty($_GET['proje']))
  header("Location:projeler.php");
else{
  $pid=mysqli_real_escape_string($conn, $_GET['proje']);
  $pid=$pid/98765432123456789;
}

$proje_query="select * from projeler where proje_durum = 1 and proje_id = $pid LIMIT 1";
$projecek=mysqli_query($conn ,$proje_query);
$proje_result=mysqli_fetch_array($projecek);

$satirsay=mysqli_num_rows($projecek);
if ($satirsay <= 0) {
  header("Location:projeler.php");
}

 ?>
 <script>
var slideIndex = 1;

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length)
    slideIndex = 1;
  if (n < 1)
    slideIndex = x.length;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" white", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " white";
}
</script>
 <style media="screen">
   .content{
     width: 100%;
     height: 100%;
     background-color: rgba(255 ,255 ,255 ,1);
   }
   .baslik{
     font-size: 36px;
     color: #161923;
     text-indent: 25px;
     text-transform: uppercase;
     text-align: center;
   }
   hr{
     border-bottom: 1px solid gray;
     width: 50%;
     margin: 40px auto 40px auto;
   }
   .lightbox img
   {
     width: 70%;
     height: auto;
   }

   .slider-content{
     margin-left: auto;
     margin-right: auto;
     height: 300px;
     position: relative;
     max-width:800px;
     width:600px;
     transition: .2s all;
   }
   .center {
     text-align: center!important;
     margin-top: 16px!important;
     margin-bottom: 16px!important;
     font-size: 18px!important;
     color: #fff!important;
     position: absolute;
     left: 50%;
     bottom: 0;
     transform: translate(-50%,0%);
     padding: 0.01em 16px;
     transition: .2s all;

    }
    .center:before{
      content: "";
      display: table;
      clear: both;
      box-sizing: inherit;
      transition: .2s all;

    }
     .center .demo{
      height: 13px;
      width: 13px;
      color: #fff;
      display: inline-block;
      padding-left: 8px;
      padding-right: 8px;
      text-align: center;
      padding: 0;
      border: 1px solid #ccc!important;
      border-radius: 10px;
      transition: .2s all;

     }
     .center .demo:hover{
       background-color: white;
     }
     .center .pre{
      float: left !important;
      cursor: pointer;
      transition: .2s all;

     }
     .center .next{
      float: right !important;
      cursor: pointer;
      transition: .2s all;

     }
     .center .next:hover,.pre:hover{
      color: gray;
     }
     .white{
       background-color: white!important;
     }
     .mySlides {
       display:none;
       height: 100%;
       width:auto;
       width:100%;
     }
     .mySlides:hover{
       opacity: .9;
     }
     .paragraf {
       text-indent: 25px;
       text-align: center;
       font-size:25px;
     }
     @media screen and (max-width:700px) {
       .slider-content{
         width: 100%;
       }
       .lightbox img
       {
         width: 90%;
       }
     }
 </style>


 <div class="ortablok" >
         <div class="limiter" >
             <div class="container-login100" style="background-color:darkgray;margin:auto;align-items:start;background-image: url('assets/img/proje.jpg');">
                 <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" style="width:70%;margin-top:5%;background-color: rgba(255, 255, 255, 1);">
                   <div class="content">
                       <p class="baslik" ><?php echo $proje_result['proje_baslik']; ?></p>
                       <hr>
                       <?php

                       $resimcek_query="select resim_yol from proje_resimler where proje_id=$pid";
                       $resimcek=mysqli_query($conn ,$resimcek_query);
                       $resimrow=mysqli_num_rows($resimcek);
                       $i=1;
                       if ($resimrow > 0) {?>
                         <div class="slider-content">

                           <?php while ($resimcek_result=mysqli_fetch_array($resimcek)) { ?>

                             <a href="#img_<?php echo $i; ?>"><img class="mySlides" src="<?php echo $resimcek_result['resim_yol'] ?>" <?php if($i == 1)
                                                                                                                                              echo 'style="display:block;"';?>></a>
                             <a href="#_<?php echo $i; ?>" class="lightbox trans" id="img_<?php echo $i; ?>"><img src="<?php echo $resimcek_result['resim_yol'] ?>"></a>

                           <?php $i++; } ?>
                            <!--<a href="#img_1"><img class="mySlides" src="assets/img/pro1.jpg" style="display:block;"></a>
                            <a href="#_1" class="lightbox trans" id="img_1"><img src="assets/img/pro1.jpg"></a>

                            <a href="#img_2"><img class="mySlides" src="assets/img/pro2.jpg" ></a>
                            <a href="#_2" class="lightbox trans" id="img_2"><img src="assets/img/pro2.jpg"></a>

                            <a href="#img_3"><img class="mySlides" src="assets/img/pro3.jpg"></a>
                            <a href="#_3" class="lightbox trans" id="img_3"><img src="assets/img/pro3.jpg"></a>-->

                            <div class="center" style="width:100%">
                              <div class="pre" onclick="plusDivs(-1)">&#10094;</div>
                              <div class="next" onclick="plusDivs(1)">&#10095;</div>
                              <?php for ($k=1; $k < $i; $k++) { ?>
                                <span class="demo<?php if($k == 1)
                                                      echo ' white';?>" onclick="currentDiv(<?php echo $k; ?>)"></span>

                              <?php } ?>
                            </div>
                          </div>
                          <hr>

                        <?php
                        } ?>
                        <p class="paragraf" ><?php echo $proje_result['proje_makale']; ?></p>
                   </div>
                 </div>
             </div>
         </div>
       </div>
 </div>
 <?php

 require_once('footer.php');

  ?>
