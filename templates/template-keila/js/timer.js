// Aquí va el código JavaScript de la función `timeFest`
function timeFest(
  mes,
  dia,
  hora,
  fraseDeEspera = '<span class="font-keyla-cursiva" style="font-size: 2rem">Falta poco !</span><hr>'
) {
  var coma = ",";
  var targetDate = new Date(mes + " " + dia + coma + " 2024 " + hora).getTime();

  document.getElementById("show").innerHTML = fraseDeEspera;

  var timer = setInterval(function () {
    var now = new Date().getTime();
    var distance = targetDate - now;

    // Calculando días, horas, minutos y segundos restantes
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor(
      (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    );
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Mostrando el contador en la página
    document.getElementById("countdown").innerHTML =
      "<span class='font-keyla-cursiva' style='font-size: 1.5rem'>" +
      days +
      " " +
      " Dias <br>" +
      hours +
      " h " +
      minutes +
      " m " +
      seconds +
      " s </span>";

    // Redirige a la página cuando el contador llega a cero
    if (distance < 0) {
      clearInterval(timer);

      // Seleccionamos todos los elementos con la clase 'ocultar-false'
      const COMPONETS_FALSE = document.querySelectorAll(".ocultar-false");
      const AGRADECIMIENTOSx = document.getElementsByClassName(".ocultar-agradecimiento");
      const AGRADECIMIENTOS = document.getElementById('agradecimiento');

      // Recorremos todos los elementos y cambiamos su clase a 'ocultar-true'
      COMPONETS_FALSE.forEach((element) => {
        element.classList.replace("ocultar-false", "ocultar-true");
      });

      AGRADECIMIENTOS.style.display = 'block';

    }

    // Finaliza el contador cuando llega a cero
    if (distance < 0) {
      clearInterval(timer);

      //texto de la presentación de Keila al comienzo
      document.getElementById("presentacion-txt").innerHTML =
        "¡Gracias por estar!";
    }
  }, 1000);
}

// Función para cambiar texto
function cambiar() {
  var element = document.getElementById("rrrr");
  element.innerHTML = "Gracias";
}

// Iniciar el contador cuando se carga la página
window.onload = function () {
  // Llama a `timeFest` con la fecha objetivo
  //timeFest("December", 27, "22:00:00");
  timeFest('November', 12, '23:40:00');
};
