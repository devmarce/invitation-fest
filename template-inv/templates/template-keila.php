<!doctype html>
<html lang="es">

<?php
include_once './componentes/head.php';
?>

<head>
    <meta charset="UTF-8">
</head>

<style type="text/css">
    .size2-2 {
        font-size: 2.2rem;
    }
    .font-keyla-cursiva {
        font-family: "Great Vibes", cursive;
        font-weight: 400;
        font-style: normal; 
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


<body>
    <audio src="./img/"></audio>
    <video src="./img/rayos.mp4" autoplay="true" muted="true" loop="true" poster="./img/keila-metal.jpg"></video>


    <?php include_once 'presentacion.php'; ?>

    <?php include_once 'fecha.php'; ?>
    
    <?php include_once 'horario.php'; ?>

    <?php include_once 'ver_contador.php'; ?>
    
    <?php include_once 'nombre_lugar.php'; ?>
    
    <?php include_once 'ubicacion_google.php'; ?>
    
    <?php include_once 'vestimenta.php'; ?>
    
    <?php include_once 'regalo_mp.php'; ?>
    
    <?php include_once 'confirmacion.php'; ?>
    
    <?php include_once 'cierre.php'; ?>

    <?php include_once 'agradeciemintos.php'; ?>




    <section id="sect2" class="sect">
        <div class="card text-center">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer text-body-secondary">
                2 days ago
            </div>
        </div>
    </section>
    <section id="sect3" class="sect">
        <h2>3</h2>
    </section>
    <section id="sect4" class="sect">
        <h2>4</h2>
    </section>
    <section id="sect5" class="sect">
        <h2>5</h2>
    </section>

</body>

</html>