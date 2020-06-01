<?php

require_once('header.php');

?>
<style media="screen">
  @media screen and (max-width:500px){
    .wrap-login100{
      padding-right: 10px;
      padding-left: 10px;
    }
  }
</style>
<div class="ortablok" >
        <div class="limiter" >
            <div class="container-login100" style="background-color:darkgray;margin:auto;align-items:start;background-image: url('assets/img/about.jpg')">
                <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" style="width:60%;margin-top:5%;margin-bottom:50px;background-color: rgba(255, 255, 255, 0.9);">
                    <div style="height:auto;font-size;display: table;owerflow:hidden" >
                      <div class="aboutContent" style="width:100%">

                          <p class="baslik">Vizyon</p>
                          <p>&emsp;<?php echo $ayar_result['ayar_vizyon'] ?></p>
                          <hr style="border-bottom:1px solid #c2877f;" >

                          <p class="baslik">Misyon</p>
                          <p>&emsp;<?php echo $ayar_result['ayar_misyon'] ?></p>
                          <hr style="border-bottom:1px solid #c2877f;" >
                          <p class="baslik">Hakkımızda</p>
                          <p>&emsp;<?php echo $ayar_result['ayar_hakkimizda'] ?></p>

                      </div>
                    </div>
                </div>
            </div>
      </div>

</div>
<?php
require_once('footer.php');
?>
