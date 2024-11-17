<?php
  $mostrar = false;
?>
<div class="container" style="margin-top: 10rem;">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
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
