function testCikar(x){
  if ($(x).attr("value") != "") {

    $(x).parent('td').parent('tr').children("#ekle_value").empty();
    $(x).parent('td').parent('tr').children("#ekle_konu_ad").empty();
    $(x).parent('td').parent('tr').children("#ekle_resim").empty();
    $(x).parent('td').parent('tr').children("#ekle_soru").empty();

    $(".term-test[data-item-id="+$(x).attr("value")+"]").show();

    $(x).parent('td').parent('tr').children('td').children('input').removeAttr("value");
    $(x).parent('td').parent('tr').children('td').children('button').removeAttr("value");
    $(x).parent('td').parent('tr').removeAttr("data-item-id");


  }
}
function dyCikar(x){
  if ($(x).attr("value") != "") {

    $(x).parent('td').parent('tr').children("#ekle_value").empty();
    $(x).parent('td').parent('tr').children("#ekle_konu_ad").empty();
    $(x).parent('td').parent('tr').children("#ekle_soru").empty();
    $(x).parent('td').parent('tr').children("#ekle_resim").empty();
    $(".term-dy[data-item-id="+$(x).attr("value")+"]").show();

    $(x).parent('td').parent('tr').children('td').children('input').removeAttr("value");
    $(x).parent('td').parent('tr').children('td').children('button').removeAttr("value");
    $(x).parent('td').parent('tr').removeAttr("data-item-id");


  }
}
function esliCikar(x){
  if ($(x).attr("value") != "") {

    $(x).parent('td').parent('tr').children("#ekle_value").empty();
    $(x).parent('td').parent('tr').children("#ekle_konu_ad").empty();
    var y=1;
    while (y <= 5){
      $(x).parent('td').parent('tr').children("#ekle_resim_"+y).empty();
      y++;

    }
    $(".term-esli[data-item-id="+$(x).attr("value")+"]").show();

    $(x).parent('td').parent('tr').children('td').children('input').removeAttr("value");
    $(x).parent('td').parent('tr').children('td').children('button').removeAttr("value");
    $(x).parent('td').parent('tr').removeAttr("data-item-id");


  }
}

var term_kap_id="#kapsayici1";

$( function() {
  $(".term").hover(function (){
    term_kap_id="#"+$(this).parent("#terms").parent("#term-region").parent('.soruContent').attr("id");
    $( ".term" ).draggable( "option", "containment", term_kap_id );
    var containment = $( ".term" ).draggable( "option", "containment" );
  });

  $(".term").draggable({

    containment:term_kap_id,
    revert: true,
    revertDuration: 200
  }
);

$(".term").droppable({
  drop:function(event,ui){
    $(".term[data-item-id="+$(ui.draggable).attr("data-item-id")+"]").removeClass("hideTerm");
    $(".term[data-item-id="+$(ui.draggable).attr("data-item-id")+"]").children("#options").children('p').show();
    $(".term[data-item-id="+$(ui.draggable).attr("data-item-id")+"]").draggable("enable");
    if ($(ui.draggable).attr("id") != undefined) {

      $(ui.draggable).parent(".box").children(".target-box").children("#selectedAns").children("input").attr("value",$(ui.draggable).parent(".box").children(".target-box").attr("data-item-id")+"/");
      $(ui.draggable).remove();

    }
  }
});
var dataItemId=0;

$(".target-box").droppable({
  over:function(){
    $(this).addClass("active");
  },
  out:function(){
    $(this).removeClass("active");
  },
  drop:function(event, ui){
    if($(this).parent(".box").children("#selected").attr("data-item-id") != undefined){
      $(".term[data-item-id="+$(this).parent(".box").children("#selected").attr("data-item-id")+"]").removeClass("hideTerm");
      $(".term[data-item-id="+$(this).parent(".box").children("#selected").attr("data-item-id")+"]").children("#options").children('p').show();
      $(".term[data-item-id="+$(this).parent(".box").children("#selected").attr("data-item-id")+"]").draggable("enable");
      $(this).parent(".box").children("#selected").remove();

    }
    dataItemId=$(ui.draggable).attr("data-item-id");
    $(ui.draggable).addClass("hideTerm ");
    $(ui.draggable).addClass("ui-draggable-disabled ");
    $(ui.draggable).addClass("ui-state-disabled ");
    $(this).addClass("ui-draggable");
    $(ui.draggable).attr("aria-disabled","true");
    addClasses: false;
    $(ui.draggable).draggable("disable");
    var paragraf="";
    if ($(ui.draggable).attr('id') == undefined) {
      paragraf=$(ui.draggable).children("#options").children('p').text();
    }else {
      paragraf=$(ui.draggable).children("#options").children("#selectedAns").children('p').text();

    }
    $(this).parent(".box").append('<div id="selected" style="background-color: white;position:relative;margin-top:-45px;;z-index:0" class="target-box none ui-droppable ui-draggable ui-draggable-handle"><div id="options" ><div id="selectedAns"><p>'+paragraf+'</p></div></div></div>');
    $(this).parent(".box").children("#selected").attr("data-item-id",dataItemId);
    $(this).parent(".box").children("#selected").draggable({
      containment:"#kapsayici",
      revert: true,
      revertDuration: 200,

    });
    $(this).children("#selectedAns").children("input").attr("value",$(this).attr("data-item-id")+"/"+$(this).parent(".box").children("#selected").attr("data-item-id"));

    $(this).removeClass("active");

    if ($(ui.draggable).attr('id') != undefined) {
      $(ui.draggable).remove();
    }else {
      $(ui.draggable).children("#options").children('p').hide();
    }

  }
});


//////////////////////////////////
  $("#tbody-test").sortable({
    containment:"#kapsayici-test",

  });
  $("#tbody-test").draggable({
      containment:"#kapsayici-test",
      revert:true,
      revertDuration:200

  });

  $(".target-test").droppable({
    drop:function(event,ui){
      if ($(this).children('td').children('input').attr("value") != "") {
        $(".term-test[data-item-id="+$(this).children('td').children('input').attr("value")+"]").show();
      }
      $(this).children("#ekle_value").empty();
      $(this).children("#ekle_value").append($(ui.draggable).children('#ekle_value').html());
      $(this).children("#ekle_konu_ad").empty();
      $(this).children("#ekle_konu_ad").append($(ui.draggable).children('#ekle_konu_ad').html());
      $(this).children("#ekle_resim").empty();
      $(this).children("#ekle_resim").append($(ui.draggable).children('#ekle_resim').html());
      $(this).children("#ekle_soru").empty();
      $(this).children("#ekle_soru").append($(ui.draggable).children('#ekle_soru').html());
      $(this).children('td').children('input').removeAttr("value");
      $(this).children('td').children('input').attr("value",$(ui.draggable).children('#ekle_value').html());
      $(this).children('td').children('button').removeAttr("value");
      $(this).children('td').children('button').attr("value",$(ui.draggable).children('#ekle_value').html());
      $(this).removeAttr("data-item-id");
      $(this).attr("data-item-id",$(ui.draggable).children('#ekle_value').html());
      $(ui.draggable).draggable().draggable('disable');
      $(ui.draggable).hide();
    }
  });

  //////////////////////////////////

  $("#tbody-dy").sortable({
    containment:"#kapsayici-dy",

  });
  $("#tbody-dy").draggable({
      containment:"#kapsayici-dy",
      revert:true,
      revertDuration:200

  });

  $(".target-dy").droppable({
    drop:function(event,ui){
      if ($(this).children('td').children('input').attr("value") != "") {
        $(".term-dy[data-item-id="+$(this).children('td').children('input').attr("value")+"]").show();
      }
      $(this).children("#ekle_value").empty();
      $(this).children("#ekle_value").append($(ui.draggable).children('#ekle_value').html());
      $(this).children("#ekle_konu_ad").empty();
      $(this).children("#ekle_konu_ad").append($(ui.draggable).children('#ekle_konu_ad').html());
      $(this).children("#ekle_resim").empty();
      $(this).children("#ekle_resim").append($(ui.draggable).children('#ekle_resim').html());
      $(this).children("#ekle_soru").empty();
      $(this).children("#ekle_soru").append($(ui.draggable).children('#ekle_soru').html());
      $(this).children('td').children('input').removeAttr("value");
      $(this).children('td').children('input').attr("value",$(ui.draggable).children('#ekle_value').html());
      $(this).children('td').children('button').removeAttr("value");
      $(this).children('td').children('button').attr("value",$(ui.draggable).children('#ekle_value').html());
      $(this).removeAttr("data-item-id");
      $(this).attr("data-item-id",$(ui.draggable).children('#ekle_value').html());
      $(ui.draggable).draggable().draggable('disable');
      $(ui.draggable).hide();
    }
  });

  //////////////////////////////////

  $("#tbody-esli").sortable({
    containment:"#kapsayici-esli",

  });
  $("#tbody-esli").draggable({
      containment:"#kapsayici-esli",
      revert:true,
      revertDuration:200

  });

  $(".target-esli").droppable({
    drop:function(event,ui){
      if ($(this).children('td').children('input').attr("value") != "") {
        $(".term-esli[data-item-id="+$(this).children('td').children('input').attr("value")+"]").show();
      }
      $(this).children("#ekle_value").empty();
      $(this).children("#ekle_value").append($(ui.draggable).children('#ekle_value').html());
      $(this).children("#ekle_konu_ad").empty();
      $(this).children("#ekle_konu_ad").append($(ui.draggable).children('#ekle_konu_ad').html());

      var x=1;
      while (x <= 5) {
        $(this).children("#ekle_resim_"+x).empty();
        $(this).children("#ekle_resim_"+x).append($(ui.draggable).children("#ekle_resim_"+x).html());
        x++;
      }

      $(this).children('td').children('input').removeAttr("value");
      $(this).children('td').children('input').attr("value",$(ui.draggable).children('#ekle_value').html());
      $(this).children('td').children('button').removeAttr("value");
      $(this).children('td').children('button').attr("value",$(ui.draggable).children('#ekle_value').html());
      $(this).removeAttr("data-item-id");
      $(this).attr("data-item-id",$(ui.draggable).children('#ekle_value').html());
      $(ui.draggable).draggable().draggable('disable');
      $(ui.draggable).hide();
    }
  });


});
