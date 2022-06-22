Dropzone.autoDiscover = false;

$(document).ready(function(){

  /*$("#createSubmit").click(function(e){
    console.log("---------");
    console.log("Creat Post Call");

    var form = $("#createPostForm");

    var user = $("[name='user']", form).val();
    var text = $("textarea", form).val();
    var image = $("[name='file']", form).css("background-color", "red");

    console.log("User: "+user);
    console.log("Text: "+text);
    //console.log("Image: "+image);

    //createPost(user, text, image);
  });*/

  $("#btnCreate").click(function(){
    $("#createPostForm").css("display", "block");
    $("#fondoOpaco").css("display", "block");
  });

  $("#createPostHeader .closeBtn").click(function(){
    $("#createPostForm").css("display", "none");
    $("#fondoOpaco").css("display", "none");
  });

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


// ****************************************************************************
// *                               Drag and Drop                              *
// ****************************************************************************

  let dropzonePost = new Dropzone("#dragNDrop", { 
    url: "php/createPost.php",
    autoProcessQueue: false,
    uploadMultiple: true,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 20,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    paramName: "image",
    init: function() {

      //SISTEMA DE ENVIO
        dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

        // for Dropzone to process the queue (instead of default form behavior):
        document.getElementById("createSubmit").addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();
            dzClosure.processQueue();
        });

        //send all the form data along with the files:
        this.on("sendingmultiple", function(data, xhr, formData) {
            formData.append("text", jQuery("#creatPostText").val());
            formData.append("user", jQuery("#userInputPost").val()); 
        });

        this.on("successmultiple", function(file, response){
          $("#crearPublicacion").after(response);
        });

        this.on("addedfile", function(){

          setTimeout(function(){
            var files = dropzonePost.getQueuedFiles();

            if(files.length == 1){
              $("#dragNDrop").prepend("<div id='dragNDropOptions'><button class='whiteBtn' id='editImageNewPost'><img src='Imagenes/iconosMenu/editIcon.png' alt='Editar Imagenes'>Editar</button> <button class='whiteBtn' id='addImageNewPost'><img src='Imagenes/iconosMenu/cameraIcon.png' alt='Añadir fotos o videos'>Añadir Imagen/Video</button></div>")

              $("#phoneImageDrop").remove();
            };

            console.log(files.length);
          }, 200)
        });

        this.on("removedfile", function(){
          setTimeout(function(){
            var files = dropzonePost.getQueuedFiles();

            if(files.length == 0){
              $("#editImageNewPost").remove();
              $("#addImageNewPost").remove();
              $("#dragNDrop").after('<div class="hoverBtn1-static d-flex align-items-center" id="phoneImageDrop"><img class="marcoCircularBtn me-3" src="Imagenes/iconosMenu/smartphone.png" alt="Añadir Imagen desde Telefono"><p>Añadir fotos o vídeos desde tu dispositivo móvil.</p><button class="publicBtn hover ms-auto">Añadir</button></div>');
            };

            console.log(files.length);
          }, 200)
        });
    }
  });

});