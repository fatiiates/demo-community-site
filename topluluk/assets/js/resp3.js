var height;

$(function(){
  var slideKontrol=0;
  var y =0;
    $('.menuyuAc').click(function(){

        $(this).parent('.content').next('div').children('div').children('ul').children('li').slideToggle(300);

    });
    $('.topnavbar').children('.menu').children('#headerNav').children('li').mouseover(function(){
      var ww=$(window).width();

      if (ww > 1560) {
        $(this).children('#dergiler').css({
          "display":"block"
        });
        if (height > 35) {

          $(this).children('#dergiler').children("li:first-child").css({
              "height":"10px"
          });
        }

      }

    });
    $('.topnavbar').children('.menu').children('#headerNav').children('li').mouseout(function(){
      var ww=$(window).width();
      if (ww > 1560) {
        $(this).children('#dergiler').css({
          "display":"none"
        });
        $(this).children('#dergiler').children("li:first-child").css({
            "display":"none"
          });
      }
    });
    $('.topnavbar').children('.menu').children('#headerNav').children('li').click(function(){

      var ww=$(window).width();
      var elSayi=$(this).children('#dergiler').children('li').length ;
      if (ww < 1560) {
      $(this).children('#dergiler').toggle();
      $(this).children('#dergiler').children('li').slideToggle();
      $(this).children('#dergiler').children('li:first-child').hide();
    }

    });
  });

$(window).scroll(function(){
    height=$(this).scrollTop();
    var width=$(window).width();
    if (height > 35) {

      $('#headerBottomPanel').css({
        "top":"0",
        "height":"60px",
        "position":"fixed"
      });
      $('#headerLogo').css({
        "top":"15px"
      });
      $('#headerId').css({
        "height":"95px"
      });
      $('.menuyuAc').css({
        "top":"12px"
      });
      if (width < 1560) {
        $('.menu').css({
          "margin-top":"-17px"
        });
      }
      $('#headerLogo').children("a").children('p').css({
        "font-size":"25px"
      });
      $('.topnavbar').css({
        "top":"15px"
      });

    }else {
      $('#headerBottomPanel').css({
        "top":"auto",
        "height":"86px",
        "position":"relative"
      });
      $('#headerLogo').css({
        "top":"20px"
      });
      $('#headerId').css({
        "height":"121px"
      });
      $('.menuyuAc').css({
        "top":"25px"
      });
      $('.menu').css({
        "margin-top":"0px"
      });
      $('#headerLogo').children("a").children('p').css({
        "font-size":"30px"
      });
      $('.topnavbar').css({
        "top":"25px"
      });
    }
});
window.onresize = function(){
  var width=$(window).width();
  height=$(this).scrollTop();
  if (width >= 1560) {
    if ( height > 35) {
      $('.menu').css({
        "margin-top":"0px"
      });
    }
    $('.altListe').css({
      "display":"none"
    });
    $('.altListe').children('li').css({
      "display":"none"
    });

  }

};
