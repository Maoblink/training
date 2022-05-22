var aumento = 0;
function obtenerAltura(medir, modificar, css, cuenta, replies){
	var altura = $(medir).outerHeight();

	if(cuenta <= 30  && css == "height"){
		console.log("Reinicio")
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