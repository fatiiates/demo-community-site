

function reloadPage()
{
 window.location.reload()
}
function islem_onsubmit()
{
    if (document.imageInsert.slider_ad.value == ""){

        alert ("Slider adı girmelisiniz!");
        document.imageInsert.slider_ad.focus();
        return false;
    }
    if (document.imageInsert.slidegorsel.value == ""){

        alert ("Resim yüklemelisiniz!");
        document.imageInsert.slidegorsel.focus();
        return false;
    }
    if (document.imageInsert.slider_url.value == ""){

        alert ("Sliderin görüneceği url adresini belirtmelisiniz!");
        document.imageInsert.slider_url.focus();
        return false;
    }
    if (document.imageInsert.slider_sıra.value == ""){

        alert ("Sliderin görüntülenme sırasını belirtmelisinz!");
        document.imageInsert.slider_sıra.focus();
        return false;
    }
}
function update_onsubmit()
{
    if (document.imageInsert.slider_ad.value == ""){

        alert ("Slider adı girmelisiniz!");
        document.imageInsert.slider_ad.focus();
        return false;
    }
    if (document.imageInsert.slidegorsel.value == ""){
        if(!$('#control').length){
            alert ("Resim yüklemelisiniz!");
            document.imageInsert.slidegorsel.focus();
            return false;
        }
    }
    if (document.imageInsert.slider_url.value == ""){

        alert ("Sliderin görüneceği url adresini belirtmelisiniz!");
        document.imageInsert.slider_url.focus();
        return false;
    }
    if (document.imageInsert.slider_sıra.value == ""){

        alert ("Sliderin görüntülenme sırasını belirtmelisinz!");
        document.imageInsert.slider_sıra.focus();
        return false;
    }
}
function tıklanınca1(){
  var x = document.getElementById("combobox1");
  var option = document.createElement("option");
  option.text = document.getElementById("comboboxAdd").value;
  x.add(option);
}
function  msg(secenek,soruSayi)
{
  var x = document.getElementById(secenek).value;
  x = x.substr(0,1);
  alert(x+soruSayi);

}



function maxDeger(x){

    if ($(x).attr("name") == "soru_Esli_Sayi" && x.value > 10)
       document.getElementById("soru_Esli_Sayi").value=10;
    else if ($(x).attr("name") == "soru_Test_Sayi" && x.value >= 20)
      document.getElementById("soru_Test_Sayi").value=20;
    else if ($(x).attr("name") == "soru_DY_Sayi" && x.value >= 20)
      document.getElementById("soru_DY_Sayi").value=20;
    else if ($(x).attr("name") == "soru_Esli_Sayi" && x.value < 0)
       document.getElementById("soru_Esli_Sayi").value=0;
    else if ($(x).attr("name") == "soru_Test_Sayi" && x.value < 0)
      document.getElementById("soru_Test_Sayi").value=0;
    else if ($(x).attr("name") == "soru_DY_Sayi" && x.value < 0)
      document.getElementById("soru_DY_Sayi").value=0;

}



    function selectDegisDers(){
      var y = document.getElementById("konu_ders").value;
      if (y == "undefined")
        window.location="dergi-ekle.php";
      else
        window.location="?konu_ders="+y;

      document.getElementById("konu_ders").value=y;
    }
    function selectDegisSinavTur(control){

      if (control) {
        var x = document.getElementById("konu_sinavTuru").value;
        var y = document.getElementById("konu_ders").value;
        if (x == "undefined" || y =="undefined")
          window.location="?konu_ders="+y;
        else {
          window.location="?konu_ders="+y+"&konu_sinavTuru="+x;
        }
        document.getElementById("konu_ders").value=y;
        document.getElementsById("konu_sinavTuru").value=x;
      }
      else if (!control){
        var x = document.getElementById("konu_sinavTuru").value;
        if (x == "undefined")
          window.location="dergi-ekle.php";
        else
          window.location="?konu_sinavTuru="+x;

        document.getElementById("konu_sinavTuru").value=x;
      }
    }



function selectDegisDersInsert(){
  var y = document.getElementById("ekle_konu_ders").value;
  if (y == "undefined")
    window.location="dergi-update.php";
  else
    window.location="?ekle_konu_ders="+y;

  document.getElementById("ekle_konu_ders").value=y;
}
function selectDegisSinavTurInsert(control){

  if (control) {
    var x = document.getElementById("ekle_konu_sinavTuru").value;
    var y = document.getElementById("ekle_konu_ders").value;
    if (x == "undefined" || y =="undefined")
      window.location="?ekle_konu_ders="+y;
    else {
      window.location="?ekle_konu_ders="+y+"&ekle_konu_sinavTuru="+x;
    }
    document.getElementById("ekle_konu_ders").value=y;
    document.getElementsById("ekle_konu_sinavTuru").value=x;
  }
  else if (!control){
    var x = document.getElementById("ekle_konu_sinavTuru").value;
    if (x == "undefined")
      window.location="dergi-update.php";
    else
      window.location="?ekle_konu_sinavTuru="+x;

    document.getElementById("ekle_konu_sinavTuru").value=x;
  }
}



    function selectDegisDersUpdate(){
      var y = document.getElementById("konu_ders").value;
      if (y == "undefined")
        window.location="dergi-update.php";
      else
        window.location="?konu_ders="+y;

      document.getElementById("konu_ders").value=y;
    }
    function selectDegisSinavTurUpdate(control){

      if (control) {
        var x = document.getElementById("konu_sinavTuru").value;
        var y = document.getElementById("konu_ders").value;
        if (x == "undefined" || y =="undefined")
          window.location="?konu_ders="+y;
        else {
          window.location="?konu_ders="+y+"&konu_sinavTuru="+x;
        }
        document.getElementById("konu_ders").value=y;
        document.getElementsById("konu_sinavTuru").value=x;
      }
      else if (!control){
        var x = document.getElementById("konu_sinavTuru").value;
        if (x == "undefined")
          window.location="dergi-update.php";
        else
          window.location="?konu_sinavTuru="+x;

        document.getElementById("konu_sinavTuru").value=x;
      }
    }



function selectDegisDersUpdateTest(){
  var y = document.getElementById("test_ders").value;
  if (y == "undefined")
    window.location="test-update.php";
  else
    window.location="?test_ders="+y;

  document.getElementById("test_ders").value=y;
}
function selectDegisSinavTurUpdateTest(control){

  if (control) {
    var x = document.getElementById("test_sinavTuru").value;
    var y = document.getElementById("test_ders").value;
    if (x == "undefined" || y =="undefined")
      window.location="?test_ders="+y;
    else {
      window.location="?test_ders="+y+"&test_sinavTuru="+x;
    }
    document.getElementById("test_ders").value=y;
    document.getElementsById("test_sinavTuru").value=x;
  }
  else if (!control){
    var x = document.getElementById("test_sinavTuru").value;
    if (x == "undefined")
      window.location="test-update.php";
    else
      window.location="?test_sinavTuru="+x;

    document.getElementById("test_sinavTuru").value=x;
  }
}



    function selectDegisDersTest(){
      var y = document.getElementById("test_ders").value;
      if (y == "undefined")
        window.location="test-ekle.php";
      else
        window.location="?test_ders="+y;

      document.getElementById("test_ders").value=y;
    }
    function selectDegisSinavTurTest(control){

      if (control) {
        var x = document.getElementById("test_sinavTuru").value;
        var y = document.getElementById("test_ders").value;
        if (x == "undefined" || y =="undefined")
          window.location="?test_ders="+y;
        else {
          window.location="?test_ders="+y+"&test_sinavTuru="+x;
        }
        document.getElementById("test_ders").value=y;
        document.getElementsById("test_sinavTuru").value=x;
      }
      else if (!control){
        var x = document.getElementById("test_sinavTuru").value;
        if (x == "undefined")
          window.location="test-ekle.php";
        else
          window.location="?test_sinavTuru="+x;

        document.getElementById("test_sinavTuru").value=x;
      }
    }



function selectDegisDersSoruvEkle(){
  var y = document.getElementById("test_ders").value;
  if (y == "undefined")
    window.location="soru-insert.php";
  else
    window.location="?test_ders="+y;

  document.getElementById("test_ders").value=y;
}
function selectDegisSinavTurSoruvEkle(control){

  if (control) {
    var x = document.getElementById("test_sinavTuru").value;
    var y = document.getElementById("test_ders").value;
    if (x == "undefined" || y =="undefined")
      window.location="?test_ders="+y;
    else {
      window.location="?test_ders="+y+"&test_sinavTuru="+x;
    }
    document.getElementById("test_ders").value=y;
    document.getElementsById("test_sinavTuru").value=x;
  }
  else if (!control){
    var x = document.getElementById("test_sinavTuru").value;
    if (x == "undefined")
      window.location="soru-insert.php";
    else
      window.location="?test_sinavTuru="+x;

    document.getElementById("test_sinavTuru").value=x;
  }
}



      function selectDegisDersSoruvUpdate(){
        var y = document.getElementById("test_ders").value;
        if (y == "undefined")
          window.location="soru-update.php";
        else
          window.location="?test_ders="+y;

        document.getElementById("test_ders").value=y;
      }
      function selectDegisSinavTurSoruvUpdate(control){

        if (control) {
          var x = document.getElementById("test_sinavTuru").value;
          var y = document.getElementById("test_ders").value;
          if (x == "undefined" || y =="undefined")
            window.location="?test_ders="+y;
          else {
            window.location="?test_ders="+y+"&test_sinavTuru="+x;
          }
          document.getElementById("test_ders").value=y;
          document.getElementsById("test_sinavTuru").value=x;
        }
        else if (!control){
          var x = document.getElementById("test_sinavTuru").value;
          if (x == "undefined")
            window.location="soru-update.php";
          else
            window.location="?test_sinavTuru="+x;

          document.getElementById("test_sinavTuru").value=x;
        }
      }



      function selectDegisDersSinavOlustur(){
        var y = document.getElementById("test_ders").value;
        if (y == "undefined")
          window.location="sinav-olustur.php";
        else
          window.location="?test_ders="+y;

        document.getElementById("test_ders").value=y;
      }
      function selectDegisTurSinavOlustur(control){

        if (control) {
          var x = document.getElementById("test_sinavTuru").value;
          var y = document.getElementById("test_ders").value;
          if (x == "undefined" || y =="undefined")
            window.location="?test_ders="+y;
          else {
            window.location="?test_ders="+y+"&test_sinavTuru="+x;
          }
          document.getElementById("test_ders").value=y;
          document.getElementsById("test_sinavTuru").value=x;
        }
        else if (!control){
          var x = document.getElementById("test_sinavTuru").value;
          if (x == "undefined")
            window.location="sinav-olustur.php";
          else
            window.location="?test_sinavTuru="+x;

          document.getElementById("test_sinavTuru").value=x;
        }
      }



function historyForward(){
  history.back();
}

function sinavUpdateKonuAdıChange(x){

$('#konuAdUpdate').attr("value",$(x).find('option:selected').val());

}




function sinavSoruSayisi(el){

  if ($(el).val() <= 20 && $(el).val() >= 0 && $(el).attr("name") == "soru_Test_Sayi") {
    $('#test-tbody').empty();
    var x=0;
    var length=$('#tbody-test').children('tr').length;
    while (x < length) {
      $('#tbody-test').children('tr').eq(x).removeAttr("style");
      x++;
    }
    x=1;
    while (x <= $(el).val()) {

      var tr='<tr class="target-test ui-droppable" >';
       tr+='<td><button id="soru_cikar_test_'+x+'" type="button" onclick="testCikar(this)" class="btn btn-danger" name="soru_cikar_test_'+x+'" >Çıkar</button></td>';
       tr+='<td id="ekle_value" ></td>';
       tr+='<td id="ekle_konu_ad" ></td>';
       tr+='<td id="ekle_resim" ></td>';
       tr+='<td id="ekle_soru" ></td>';
       tr+='<td id="input_value"><input id="soru_Test_'+x+'" style="width:1px;height:1px" type="number" name="soru_Test_'+x+'" required></td>';
       tr+='</tr>';
        $('#test-tbody').append(tr);

      x++;
    }
  }
  else if ($(el).val() <= 20 && $(el).val() >= 0 && $(el).attr("name") == "soru_DY_Sayi") {
    $('#dy-tbody').empty();
    var x=0;
    var length=$('#tbody-dy').children('tr').length;
    while (x < length) {
      $('#tbody-dy').children('tr').eq(x).removeAttr("style");
      x++;
    }
    x=1;
    while (x <= $(el).val()) {

      var tr='<tr class="target-dy ui-droppable">';
       tr+='<td><button id="soru_cikar_dy_'+x+'" type="button" onclick="dyCikar(this)" class="btn btn-danger" name="soru_cikar_dy_'+x+'" >Çıkar</button></td>';
       tr+='<td id="ekle_value" ></td>';
       tr+='<td id="ekle_konu_ad" ></td>';
       tr+='<td id="ekle_resim" ></td>';
       tr+='<td id="ekle_soru" ></td>';
       tr+='<td id="input_value"><input id="soru_DY_'+x+'" style="width:1px;height:1px" type="number" name="soru_DY_'+x+'" required></td>';
       tr+='</tr>';
        $('#dy-tbody').append(tr);

      x++;
    }
  }
  else if ($(el).val() <= 10 && $(el).val() >= 0 && $(el).attr("name") == "soru_Esli_Sayi") {
    //$('#esli-tbody').empty();
    var x=0;
    var length=$('#tbody-esli').children('tr').length;
    while (x < length) {
      $('#tbody-esli').children('tr').eq(x).removeAttr("style");
      x++;
    }
    x=1;
    while (x <= $(el).val()) {

      var tr='<tr class="target-esli ui-droppable" >';
       tr+='<td><button id="soru_cikar_esli_'+x+'" type="button" class="btn btn-danger" onclick="esliCikar(this)" name="soru_cikar_esli_'+x+'">Çıkar</button></a></td>';
       tr+='<td id="ekle_value" ></td>';
       tr+='<td id="ekle_konu_ad" ></td>';
       tr+='<td id="ekle_resim_1" ></td>';
       tr+='<td id="ekle_resim_2" ></td>';
       tr+='<td id="ekle_resim_3" ></td>';
       tr+='<td id="ekle_resim_4" ></td>';
       tr+='<td id="ekle_resim_5" ></td>';
       tr+='<td id="input_value" ><input id="soru_Esli_'+x+'" style="width:1px;height:1px" type="number" name="soru_Esli_'+x+'"  required></td>';
       tr+='</tr>';
        $('#esli-tbody').append(tr);

      x++;
    }
  }
}
