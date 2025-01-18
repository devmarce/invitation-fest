<style type="text/css">
    .boton-open-inv {
        background-color: rgb(11, 244, 244);
        color: #020202;
        box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
        -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);
        font-family: emoji;
    }

    .btn-music-audio {
        margin-left: 5px;
        padding: 5px;
        font-size: 17px;
        width: 2.5rem !important;
        height: 2.5rem;
        font-family: 'Times New Roman', Times, serif;
        background: #00ffd9f7;
        border: 1px solid #00ffd98f;
        position: fixed;
        top: 1rem;
        z-index: 888;
    }

    .card-audio {
        display: none;
        /* ocultar controller music */
        background: #02020226;
        position: fixed;
        top: 55px;
        border: 1px solid #4cf403 !important;
        width: 90%;
        margin-left: 5%;
        z-index: 999999;
    }

    #cotroler-audio {
        background: none;
        height: 17px;
        width: 100%;
    }
</style>
<?php
// Configuración del audio
$controles_audio = 0;
$autoplay_audio = 0; // Cambiado a 0 para que no se reproduzca automáticamente al cargar
$mute_audio = 0;
?>

<div class="mt-1">
    <button class="btn btn-music-audio dropdown-toggle" onclick="toggleMute()" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
        <img src="./templates/template-keila/img/mute.png" style="width: 100%;">
    </button>
    <div style="background: #02020226;">
        <div class="dropdown collapse collapse-horizontal" id="collapseWidthExample">
            <div class="card card-body card-audio">
                <audio id="controller-audio"
                    src="./templates/template-keila/img/AUD-keila.mp3"
                    <?= $autoplay_audio ? 'autoplay ' : ''; ?>
                    <?= $controles_audio ? 'controls ' : ''; ?>
                    <?= $mute_audio ? 'muted ' : ''; ?>>
                </audio>
            </div>
        </div>
    </div>
</div>

<?php # SCRIPT PARA MUTEAR EL AUDIO ?>
<script>
    // Función para cambiar el estado de mute del audio
    function toggleMute() {
        var audioElement = document.getElementById("controller-audio");
        var muteButton = document.getElementById("mute-button");

        // Cambia el estado de muted
        audioElement.muted = !audioElement.muted;

        // Actualiza el texto del botón según el estado de mute
        muteButton.textContent = audioElement.muted ? "Unmute" : "Mute";
    }
</script>



<!-- Modal -->
<?php # ACTIVA EL AUDIO MEDINATE EL BTN Y CIERRA EL MODAL INICIAL ?>
<script>

    function toggleAudio() {
        const audio = document.getElementById("controller-audio");

        if (audio.paused) {
            audio.play();
        } else {
            audio.pause();
        }
    }
</script>

<script>
    // Obtiene el elemento de audio
    const audioElement = document.getElementById("controller-audio");

    // Escucha el evento de cambio de visibilidad de la página
    document.addEventListener("visibilitychange", function() {
        if (document.hidden) {
            // Si la página está oculta, pausa el audio
            audioElement.pause();
        } else {
            // Si la página vuelve a ser visible, reanuda el audio
            audioElement.play();
        }
    });
</script>

<?php # LEVANTA EL MODAL DE FORMA AUTOMATICA ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('modal-inv'));
        myModal.show();
    });
</script>
<div class="modal fade" id="modal-inv" tabindex="-1" aria-labelledby="modal-invLabel" aria-hidden="true" style="background: #000;">
    <div class="modal-dialog modal-fullscreen"> <!-- Clase para pantalla completa -->
        <div class="modal-content" style="background: rgba(33, 37, 41, 0.36); display: flex; align-items: center; justify-content: center; height: 100vh;">
            <div class="modal-header">
            </div>
            <div class="modal-body" style="text-align: center;">
                <div class="col-12 mb-5">
                    <img src="./templates/template-keila/img/mis15.png" alt="" style="z-index: 999999999;" class="mb-5">
                    <img src="./templates/template-keila/img/keila-logo2.png" alt="" style="filter: drop-shadow(1px -7px 7px #779bff) invert(1%); width: 100%">
                    <!-- <img src="./templates/template-keila/img/silla.png" alt="" style="width: 19%; opacity: 0.12"> -->
                </div>
                <button type="button" class="btn btn-consulta-home espejo-btn boton-open-inv" data-bs-dismiss="modal" onclick="toggleAudio()">Abrir Invitación</button>
            </div>
            <div class="modal-footer" style="border-top: none;">
            </div>
        </div>
    </div>
</div>