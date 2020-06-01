function validateMakale(){
  var maxSize=5242880;
  var size=0;
  var type="";

  for (var i = 0; i < $('#pic')[0].files.length; i++) {

    size=$('#pic')[0].files[i].size;
    type=$('#pic')[0].files[i].type;

    if (size > maxSize) {
      alert(i+1+". Dosyanın boyutu 5 MB veya daha küçük olmalıdır.");
      return false;
    }
    if (type != "image/png" && type != "image/jpeg" && type != "image/gif") {
      alert(i+1+". Dosyanın tipi png,jpeg veya gif olmalıdır.");
      return false;
    }

  }

}
function validateMakaleUpdate(){
  var maxSize=5242880;
  var size=0;
  var type="";

  for (var j = 0; j < $('.__resim').length; j++) {

    if ($('.__resim')[j].files[0] != undefined) {
      size=$('.__resim')[j].files[0].size;
      type=$('.__resim')[j].files[0].type;

      if (size > maxSize) {
        alert(j+1+". Dosyanın boyutu 5 MB veya daha küçük olmalıdır.");
        return false;
      }
      if (type != "image/png" && type != "image/jpeg" && type != "image/gif") {
        alert(j+1+". Dosyanın tipi png,jpeg veya gif olmalıdır.");
        return false;
      }
    }

  }
  size=0;
  type="";
  for (var i = 0; i < $('#pic')[0].files.length; i++) {

    size=$('#pic')[0].files[i].size;
    type=$('#pic')[0].files[i].type;

    if (size > maxSize) {
      alert(i+1+". Yeni dosyanın boyutu 5 MB veya daha küçük olmalıdır.");
      return false;
    }
    if (type != "image/png" && type != "image/jpeg" && type != "image/gif") {
      alert(i+1+". Yeni dosyanın tipi png,jpeg veya gif olmalıdır.");
      return false;
    }


  }

}
