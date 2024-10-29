<!doctype html>
<html lang="es">

<?php
include_once './componentes/head.php';
?>

<head>
    <meta charset="UTF-8">
</head>
<!-- test @borrar -->
<style type="text/css">
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

<script>
    function createSquare() {
        const section = document.querySelector('body');
        const square = document.createElement('span');
        var size = Math.random() * -10;

        square.style.width = 3 + size + 'px';
        square.style.height = 3 + size + 'px';

        square.style.top = Math.random() * innerHeight + 'px';
        square.style.left = Math.random() * innerWidth + 'px';

        section.appendChild(square);

    }
    setInterval(createSquare, 100)
</script>

<body>
    <video src="./img/rayos.mp4" autoplay="true" muted="true" loop="true" poster="https://carontestudio.com/img/contacto.jpg"></video>
    <section id="sect1" class="sect mt-5">

        <!--  -->
        <div class="card text-center" style="background: none;">
            <div>
                <img src="./img/mis15.png" alt="" style="z-index: 999999999;" class="mb-5"><br>
                <img src="./img/keila-logo.png" alt="" style="z-index: 999999999;">
            </div>
            <div class="card-body" style="color: #fff;">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Te invito a compartir conmigo<br>este día tan especial.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
        </div>
        <!--  -->
    </section>
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