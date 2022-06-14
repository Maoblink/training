$(document).ready(function(){
  $(".commentMenu").click(function(e){
    var target = $(this).parent();
    var target = $(".commentMenuBlock", target);
    displayMenu(target);
  });

  $(".deleteComment").click(function(e){
    var target = $(this).parent();
    var target = $(target).parent();
    var target = $(target).parent();
    var target = $(target).parent();
    var target = $(target).parent();
    var idComentario = $(target).attr("idReply");
    console.log("deleteEvent");
    console.log("target = "+idComentario);

    deleteComment(idComentario);
  });

  $('#audienceMenuOptions button').click(function(e){
    $("input", this).prop("checked", true);
  });

});