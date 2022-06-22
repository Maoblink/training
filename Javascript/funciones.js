var aumento = 0;
function obtenerAltura(medir, modificar, css, cuenta, replies){
	var altura = $(medir).outerHeight();

	if(cuenta <= 30  && css == "height"){
		aumento = 0;
	}

	if(css == "height"){
		aumento = aumento + altura;
	}

	var altura = parseFloat(altura) - 20;
	var altura = parseFloat(altura) + parseFloat(cuenta);

	if(css == "top"){
		var altura = parseFloat(altura) + 40;
	}

	var altura = altura + "px";

	$(modificar).css(css, altura);

	if (cuenta > 0) {

		var cambio = aumento + (25 * replies);

		if(css == "top"){
			var cambio = cambio + (replies * 70);
		}

		var cambio = cambio + "px";

		$(modificar).css("top", cambio);
	}
}

// ****************************************************************************
// *                            Comments Functions                            *
// ****************************************************************************


function sendComment(target, textArea){

	console.log("----------");
	console.log("sendComment");

	var id = $(".idForm", target).val();
	var user = $(".userForm", target).val();
	var comment = $("textarea" ,textArea).val();

	var commentP = $(textArea).parent();
	var commentP = $(commentP).parent();
	console.log(commentP);
	var reply = $(commentP).attr("idReply");

	console.log(id);
	console.log(user);
	console.log(reply);
	console.log(comment);

	$.post("php/uploadComment.php", {commentBody:comment, user:user, id:id, reply:reply}, function(datos){
		$(".commentCore" ,commentP).append(datos);
		//$(target).remove();
	});

	setTimeout(function(){
		$(".commentMenu").off("click");

		$(".commentMenu").click(function(e){
		  var target = $(this).parent();
		  var target = $(".commentMenuBlock", target);
		  displayMenu(target);
		});

		$(".deleteComment").off("click");
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

		console.log("setTimeout listo!")
	}, 200);

	console.log("----------");

};

function replyComment(target){

	console.log("-----------");
	console.log("replyComment");

	if(typeof replyCount === "undefined"){
		replyCount = 1
	};

	var commentArea = $(target).parent();
	var commentArea = $(commentArea).parent();

	console.log(commentArea);
	var commentP = commentArea;

	var commentArea = $(commentArea).parent();
	var commentArea = $(commentArea).parent();
	var id = $("form", commentArea);
	var id = $('[name="id"]', id).val();

	console.log(commentArea);
	

	var iconPerfil = $("form .avatar", commentArea).attr("src");
	var userSession = $(".userForm", commentArea).val();
	var idReply = $(commentP).attr("idReply");
	var test = $(target).attr("reply");

	console.log(idReply);

	if(test == "false"){
		$(target).after('<form class="d-flex commentForm replyForm" id="reply'+replyCount+'" method="post" action="#"> <a><img class="avatarReply" src="'+iconPerfil+'" alt="Perfil"></a> <textarea class="flex-fill px-2 mt-1 mb-2 commentBody" placeholder="Escribe un comentario..." type="text" name="commentBody"></textarea> <input class="idForm" type="hidden" name="id" value="'+id+'"> <input class="userForm" type="hidden" name="user" value="'+userSession+'"> <input class="replyForm" type="hidden" name="reply" value="'+idReply+'"> </form>');

		$(target).attr("reply", "true");

		$('.commentBody').keypress(function(e) {
		  if(e.which === 13) {
		  	console.log("*********");
		  	console.log("Enter Press");

		   	var form = $(this).parent();
		   	var wraper = $(form).parent();
		   	var wraper = $(wraper).parent();

			console.log(wraper);

		  	var id = $(".idForm", form).val();
		  	var user = $(".userForm", form).val();
		  	var reply = $(".replyForm", form).val();
		  	var comment = $(".commentBody", form).val();
		  	$(".commentBody", form).val("");

		  	$.post("php/uploadComment.php", {commentBody:comment, user:user, id:id, reply:reply}, function(datos){
		  		$(wraper).append(datos);
		  	});
		    e.preventDefault();

		    setTimeout(function(){

		    	$(".replyForm").remove();
		    	
		    	$(".commentMenu").off("click");
		    	$(".commentMenu").click(function(e){
		    	  var target = $(this).parent();
		    	  var target = $(".commentMenuBlock", target);
		    	  displayMenu(target);
		    	});

		    	$(".deleteComment").off("click");
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

		    	console.log("setTimeout listo!")
		    }, 200);

		  };
		});

	}else{
		var formReply = $(target).parent();

		$(".replyForm", formReply).remove();
		$(target).attr("reply", "false");
	};

	console.log("-----------");
};

function deleteComment(idComentario){
	console.log("-----------");
	console.log("deleteComment Function");
	console.log("id = "+idComentario);

	$.ajax({
	    type: "POST",
	    url: "php/deleteComment.php",
	    data: {id:idComentario},
	    success: function(data){
	        console.log("Envio realizado Con exito");
	        $("[idReply='"+idComentario+"']").remove();
	    }
	});
};

// ****************************************************************************
// *                            Interface Functions                           *
// ****************************************************************************


function displayMenu(target){

	console.log("-----------");
	console.log("displayMenu")
	console.log("Menu Abierto");

	var display = $(target).css("display");
	$(window).click(function() {
	  if(display == "block"){
	  	$(target).css("display", "none");
	  	console.log("Menu Cerrado");
	  };
	});

	$(target).click(function(event){
	  event.stopPropagation();
	});

	setTimeout(function(){

		if(display == "none"){
			$(target).css("display", "block");
		}else{
			$(target).css("display", "none");
		};
		
	}, 100);

	console.log("---------");

};

function createPost(user, text, image){
	console.log("---------");
	console.log("createPost JS Function");
	console.log("texto: "+text+" User: "+user+" Image: "+image);
	
	$.post("php/createPost.php", {text:text, user:user, image:image}, function(datos){
		$("#crearPublicacion").after(datos);
	});
};

$(document).ready(function(){
  $('.commentBody').keypress(function(e) {
    if(e.which === 13) {

     	var form = $(this).parent();
     	var wraper = $(form).parent();
     	var wraper = $(".commentWraper", wraper);

    	var id = $(".idForm", form).val();
    	var user = $(".userForm", form).val();
    	var reply = $(".replyForm", form).val();
    	var comment = $(".commentBody", form).val();
    	$(".commentBody", form).val("");

    	$.post("php/uploadComment.php", {commentBody:comment, user:user, id:id, reply:reply}, function(datos){
    		$(wraper).append(datos);
    	});
      e.preventDefault();

      setTimeout(function(){
      	$(".commentMenu").off("click");

      	$(".commentMenu").click(function(e){
      	  var target = $(this).parent();
      	  var target = $(".commentMenuBlock", target);
      	  displayMenu(target);
      	});

      	$(".deleteComment").off("click");
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

      	console.log("setTimeout listo!")
      }, 200);

    };
  });

  $(".replyButton").click(function(e){
  	var wraper = $(this).parent();
  	replyComment(wraper);
  });

});