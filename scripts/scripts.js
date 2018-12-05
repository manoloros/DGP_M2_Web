function cambiarVisibilidad(id){
	if(document.getElementById(id).style.visibility=="visible") {
		document.getElementById(id).style.visibility="hidden";
	}else
		document.getElementById(id).style.visibility="visible";
}
var num = 3;
function guardarComentario(){
		var fecha = new Date();
		var dia = fecha.getDate();
		var mes = fecha.getMonth();
		var anio = fecha.getFullYear();
		var min = fecha.getMinutes();
		var hora = fecha.getHours();
		var nombre = document.getElementById('nombre').value;
		var comentario = document.getElementById('coment').value;
		document.getElementById("guardaComentarios").innerHTML += "<div><p>#" + num + " " + nombre + "</p><p>" + comentario + "</p><p>" + dia + "/" + mes + "/" + anio + "   " + hora + ":" + min + "</p></div>";
		num++;
}

function cambiarImagenC() {
	document.getElementById('imagenNoticiaC').innerHTML = "Enviar esta imagen: <input name='imagenC' type='file' form='formu' required/>";
}

function filtrarSubseccion(subsecciones) {
	document.getElementById("subsecciones").innerHTML = "";
	var value = document.getElementById("seccionElegida").value;
	var cadena = subsecciones.split(".");
	document.getElementById("subsecciones").innerHTML += "<option value=' ' selected></option>";
	for (i in cadena){
		var separador = cadena[i].split(",");
		if(separador[0]==value)
			document.getElementById("subsecciones").innerHTML += "<option value='"+separador[1]+"'>"+separador[1]+"</option>";
	}
}

function cambiarImagen() {
	document.getElementById('imagenNoticia').innerHTML = "Enviar esta imagen: <input name='imagen' type='file' form='formu' required/>";
}

function cambiarImagenPubli() {
	document.getElementById('imagenPubli').innerHTML = "Enviar esta imagen: <input name='imagen' type='file' form='formu' required/>";
}
function cambiarVideo() {
	document.getElementById('video').innerHTML = "Enviar video: <input name='video' type='file' form='formu'/>";
}
function comprobarPalabras(palabrotas){
	
	var filtro = palabrotas.split(" ");
	
	var comentario = document.getElementById('coment').value;
	
	for(i in filtro){
		var re = RegExp(filtro[i],"gi");
		var tamanio = filtro[i].length;
		var cambio = '';
		var j=0;
		while(j<tamanio){
			cambio = cambio + '*';
			j++;
		}
		j=0;
		comentario = comentario.replace(re,cambio);
	}
	document.getElementById('coment').value = comentario;
}

function boton(tipo) {
	var modal = document.getElementById('myModal');
	var string = "Se publicará en " +tipo+ " el siguiente mensaje:";
	document.getElementById("cabeza").innerHTML = string;
    modal.style.display = "block";
}
function cierra(){
	var modal = document.getElementById('myModal');
    modal.style.display = "none";
}

window.onclick = function(event) {
	var modal = document.getElementById('myModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

function buscar(str) {
	if(str == ""){
		document.getElementById("resultados").innerHTML = "";
		document.getElementById('resultados').style.visibility = 'hidden';
	}else{
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
				document.getElementById('resultados').style.visibility = 'visible';
                document.getElementById("resultados").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","php/buscarNoticia.php?q="+str,true);
        xmlhttp.send();
	}
}