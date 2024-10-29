// Función para calcular el tiempo restante hasta la fecha objetivo

function timeFest(mes, dia, hora, fraseDeEspera = 'Falta poco !') {
    var coma = ',';
  var targetDate = new Date(mes + " " + dia + coma + " 2025 " + hora ).getTime();

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
      days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

    // Redirige a la página cuando el contador llega a cero
    if (distance < 0) {
      clearInterval(timer);
      window.location.href = "http://localhost/landing-web/";
    }

    // Finaliza el contador cuando llega a cero
    if (distance < 0) {
      clearInterval(timer);
      document.getElementById("countdown").innerHTML = "¡Ya pasó!";
    }
  }, 1000);
}

// Iniciar el contador cuando se carga la página
window.onload = function () {
  //countdownTimer();
};


function cambiar() {
    var element = document.getElementById('rrrr');
    element.innerHTML = "Gracias";
}
