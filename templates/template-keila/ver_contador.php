<div class="container mt-5" style="color: #fff;">

  <script>
    // Aquí va el código JavaScript de la función `timeFest`
    function timeFest(mes, dia, hora, fraseDeEspera = '<span class="font-keyla-cursiva" style="font-size: 2rem">Falta poco !</span><hr>') {

      var coma = ',';
      var targetDate = new Date(mes + " " + dia + coma + " 2024 " + hora).getTime();

      document.getElementById("show").innerHTML = fraseDeEspera;

      var timer = setInterval(function() {
        var now = new Date().getTime();
        var distance = targetDate - now;

        // Calculando días, horas, minutos y segundos restantes
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Mostrando el contador en la página
        document.getElementById("countdown").innerHTML = "<span class='font-keyla-cursiva' style='font-size: 1.5rem'>" + days + " " + " Dias <br>" + hours + " h " + minutes + " m " + seconds + " s </span>";

        // Redirige a la página cuando el contador llega a cero
        if (distance < 0) {
          clearInterval(timer);

          // Seleccionamos todos los elementos con la clase 'ocultar-false'
          const elements = document.querySelectorAll('.ocultar-false');

          // Recorremos todos los elementos y cambiamos su clase a 'ocultar-true'
          elements.forEach((element) => {
            element.classList.replace('ocultar-false', 'ocultar-true');
          });
        }

        // Finaliza el contador cuando llega a cero
        if (distance < 0) {
          clearInterval(timer);
          
          //texto de la presentación de Keila al comienzo
          document.getElementById("presentacion-txt").innerHTML = "¡Gracias por estar!";
        }
      }, 1000);
    }

    // Función para cambiar texto
    function cambiar() {
      var element = document.getElementById('rrrr');
      element.innerHTML = "Gracias";
    }

    // Iniciar el contador cuando se carga la página
    window.onload = function() {
      // Llama a `timeFest` con la fecha objetivo
      timeFest('December', 27, '22:00:00');
      //timeFest('November', 12, '23:40:00');
    };
  </script>

  <div class="container text-center text-center" style="margin-top: 10rem;">
    <div class="d-grid gap-2 mx-auto">
      <!-- Button trigger modal -->
      <p class="d-inline-block">
        <a type="button" class="btn btn-consulta-home espejo-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" style="box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
    -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);">
          ¿ Cuánto Falta ?
        </a>
      </p>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content text-center" style="background: #000000c9; border: 1px solid #4e4b64">
        <div class="modal-header" style="border-bottom: none;">
          <h1 id="show" class="modal-title fs-5 w-100 m-auto" id="exampleModalLabel">Tiempo restante</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="countdown">
            <span class="font-keyla-cursiva">Cargando contador...</span>
            <hr>
          </div>

        </div>
        <div class="modal-footer d-grid gap-2 mx-auto" style="border-top: none;">
          <button type="button" class="btn btn-consulta-home btn-modal mb-5" data-bs-dismiss="modal" style="color: #fff; border: 1px solid #fff; font-family: auto;">Ok</button>
          <div>
            <span class="font-keyla-cursiva">Viernes 27 de Diciembre a las 22:00hs</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>