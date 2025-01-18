<?php // js/timer ?>
<div class="container mt-5" style="color: #fff;">

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

  <!-- ini Modal -->
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
  <!-- end Modal -->

</div>