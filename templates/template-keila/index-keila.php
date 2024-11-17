<?php
include_once 'functions.php';
?>
<!doctype html>
<html lang="es">
    <?php include './templates/template-keila/componentes/head.php'; ?>

<style type="text/css">
    /* ini: latiendo */
    /* Animación */
    @keyframes beat {

        0%,
        50%,
        100% {
            transform: scale(1, 1);
        }

        30%,
        80% {
            transform: scale(0.92, 0.95);
        }
    }

    .latido {
        position: relative;
        animation: 1.5s ease 0s infinite beat;
    }

    .latido:after {
        left: 0;
        transform: rotate(45deg);
        transform-origin: 100% 100%;
    }

    /* end: latiendo */
    .btn-modal {
        background-color: rgb(11, 244, 244);
        color: #f600ff;
        box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
        -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);
    }

    .btn-consulta-home {
        background: #0a0a0a36;
        border: 1px solid #ffffff52;
        font-size: 1.2rem;
        width: 12rem !important;
        height: 3rem;
        color: #fff;
        font-family: "Great Vibes", cursive;
        /* font-weight: bold */
        ;
    }

    .espejo-btn:hover {
        background-color: rgb(11, 244, 244);
        color: #f600ff;
        box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
        -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);
    }

    .size2-2 {
        font-size: 2.2rem;
    }

    .font-keyla-cursiva {
        font-family: "Great Vibes", cursive;
        font-weight: 400;
        letter-spacing: 0.01em;
        /* font-style: normal; */
    }

    .bg-none {
        background: none;
    }

    .b-none {
        border: none;
    }

    .sect {
        width: 100%;
        min-height: 500px;
    }

    #sect1,
    #sect3 {
        /* background-color: #3333337d; */
        color: #fff;
    }

    #sect2 {
        /* background-color: #dddddd7d; */
        color: #333;
    }

    video {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 105%;
        min-height: 100%;
        transform: translateX(calc((100% - 100vw) / 2));
        z-index: -2;
    }
</style>

<!-- progress css -->
<style type="text/css">
    #barra-progress {
        position: fixed;
        top: 0;
        width: 0%;
        border: 1px #00c2ff solid;
        background: #f6fdff;
        box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
        height: 0.2em;
        z-index: 9999;

        animation: progress-grow auto linear both;
        animation-timeline: scroll(root block);
        /* block es por defaul: define el scroll horizontal */
    }

    @keyframes progress-grow {
        from {
            width: 0%
        }

        to {
            width: 100%
        }
    }
</style>

<style>
  .ocultar-true { display: none; }
</style>
<?php
$tormenta = 1;
//
$controles_audio = 1;
$autoplay_audio = true;
$mute_audio = 0;
?>

<body style="background: #000;">
    <?php # barra de progreso: 
    ?>
    <div id="barra-progress"></div>
    <?php # video de rayos: 
    ?>
    <?php if ($tormenta) : ?>
        <video src="./templates/template-keila/img/rayos.mp4" autoplay="true" muted="true" loop="true" poster="./templates/template-keila/img/keila-metal.jpg"></video>
    <?php endif; ?>
    <main>

        <?php
        include_once 'btn-audio.php';

        include_once 'presentacion.php';

        include_once 'slide-temp.php';

        include_once 'fecha.php';
        
        echo '<div class="ocultar-false">';
        include_once 'horario.php';
        echo '</div>';
        
        echo '<div class="ocultar-false">';
        include_once 'ver_contador.php';
        echo '</div>';
        
        include_once 'nombre_lugar.php';
        
        include_once 'ubicacion_google.php';
        
        echo '<div class="ocultar-false">';
        include_once 'vestimenta.php';
        echo '</div>';
        
        
        include_once 'regalo_mp.php';
        
        echo '<div class="ocultar-false">';
        include_once 'confirmacion.php';
        echo '</div>';

        include_once 'agradecimientos.php';
        ?>
        
        <div class="container pt-2">
            <div style="font-size: 0.7rem;"><hr><p class="text-center" style="color: #fff">Creado por <a href="https://landingweb.com.ar/" target="_blank" style="text-decoration: none;">Landing Web <img src="./templates/template-keila/img/logo-negro.jpg" style="width: 20px;"></a></p></div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>