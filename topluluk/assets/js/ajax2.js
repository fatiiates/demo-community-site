function makaleSearch(){

  $.ajax({
  type:'POST',
  url:'ajax.php',
  data:$('#makaleSearch').serialize(),
  success:function(sonuc){
    $('#makale-content').empty();
    $('#makale-content').html(sonuc);
  }
 });
}
