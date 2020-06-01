<?php

require_once('header.php');

?>
<div class="ortablok" >
        <div class="limiter" >
            <div class="container-login100" style="background-color:darkgray;margin:auto;align-items:start;background-image: url('assets/img/contact.jpg');">
                <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" style="width:70%;margin-top:5%;background-color: rgba(255, 255, 255, 0.93);">
                    <div style="height:auto;font-size;display: table;owerflow:hidden" >
                        <div class="contactContent" style="border:none">
                            <div class="alert">
                                <p><u>ADRES:</u><br></p>
                                <p>&emsp; <?php echo $ayar_result['ayar_adres'] ?></p>
                            </div>
                            <div class="alert" >
                                <p><u>TELEFON:</u><br></p>
                                <p>&emsp;  <?php echo $ayar_result['ayar_telefon'] ?></p>
                            </div>
                            <div class="alert" >
                                <p><u>E-Posta:</u><br></p>
                                <p>&emsp;  <?php echo $ayar_result['ayar_mail'] ?></p>
                            </div>
                        </div>

                        <div class="contactContent"  style="padding:10px;">
                            <iframe src="<?php echo $ayar_result['ayar_googleUrl'] ?>" width="100%" height="443px" frameborder="0" style="border:0;margin-top:5px" allowfullscreen></iframe>
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
