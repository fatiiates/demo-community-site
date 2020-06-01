function makaleSearchSort(){

  $.ajax({
  type:'POST',
  url:'ajax.php',
  data:$('#searchSort').serialize(),
  success:function(sonuc){
    $('#makale-tbody').empty();
    $('#makale-tbody').html(sonuc);
  }
 });
}
function slideSearchSort(){

  $.ajax({
  type:'POST',
  url:'ajax.php',
  data:$('#searchSort').serialize(),
  success:function(sonuc){
    $('#slide-tbody').empty();
    $('#slide-tbody').html(sonuc);
  }
 });
}
