<?php
$mostrar = false;
?>

<!-- test @borrar -->
<style type="text/css">
  /* Aseguramos que la tarjeta esté bien definida */
  .card {
    position: relative;
    overflow: hidden;
  }


  /* Estilizamos el contenido para que esté por encima del video */
  .card-body .content {
    position: relative;
    z-index: 2;
    /* El contenido está delante del video */
    color: #fff;
    /* Ajustamos el color del texto para mejor visibilidad */
    text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.8);
    /* Sombra para mejor legibilidad */
  }

  #invitados {
      font-size: 2rem;
      opacity: 0;
      transition: opacity 2s ease-in-out; /* Transición suave */
    }
</style>

<div class="card text-center mt-5 b-none">
  <div class="card-body position-relative p-0">
    <!-- Video de fondo -->
    <video class="background-video-ageradecimientos" src="./templates/template-keila/img/pasarela-estrellas.mp4" autoplay muted loop playsinline poster="./templates/template-keila/img/keila-metal.jpg"></video>

    <!-- Contenido -->
    <div class="content p-5">
      <h5 class="card-title font-keyla-cursiva" style="font-size: 2rem;">Muchas Gracias!</h5>
      <div class="pt-2">
        <p id="invitados" style="opacity: 0; transition: opacity 0.5s;"></p>
        <p id="frases" style="opacity: 0; transition: opacity 0.5s;"></p>
      </div>
    </div>
  </div>
</div>

<script>
  // Controla la velocidad del slider en milisegundos
  const carousel = new bootstrap.Carousel(document.getElementById('carouselExampleSlidesOnly'), {
    interval: 100 // Cambia a la velocidad deseada en milisegundos, 2000 equivale a 2 segundos
  });
</script>