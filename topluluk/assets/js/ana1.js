var i=0;
var y=0;

window.onload=function(){
$('#preloader').remove();
}
$(function(){
  $('.menuyuAc').click(function (){
    $('.topnavbar').children('ul').children('li').toggle();
  });
});
i=2;
function picAdd(el){

  $(el).parent().append('<div style="margin-left:15px;" ><div class="fileupload fileupload-new" data-provides="fileupload"><span class="btn btn-file btn-default"><span class="fileupload-new">Resim Seç</span><span class="fileupload-exists">Değiştir</span><input type="file" name="pic'+i+'"></span><span class="fileupload-preview"></span><a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">×</a></div></div><a id="picture-add" class=""onclick="picadd(this)">+<a>');
  $(el).remove();
  i++;

}
function paginationProje(el){
  var id=$(el).attr('href');
  $('.pagi').hide();
  $(id).show();
  $(".pagi-anchor").removeAttr("style");
  $(".pagi-anchor:first").css({
    "color":"#e8341b",
    "background-color":"white"
  });
  $(el).css({
    "color":"white",
    "background":"#e8341b"
  });


}
function paginationHaber(el){
  var id=$(el).attr('href');
  $('.pagi').hide();
  $(id).show();
  $(".pagi-anchor").removeAttr("style");
  $(".pagi-anchor:first").css({
    "color":"#33ffcc",
    "background-color":"white"
  });
  $(el).css({
    "color":"white",
    "background":"#33ffcc"
  });


}
