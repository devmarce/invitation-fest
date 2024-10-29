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
    //setInterval(createSquare, 100)
</script>



<section id="sect1" class="sect mt-5">
    <!--  -->
    <div class="card text-center" style="background: #02020275;">
        <div class="col-12">
            <img src="./img/mis15.png" alt="" style="z-index: 999999999;" class="mb-5">
            <img src="./img/keila-logo2.png" alt="" style="width: 100%; filter: drop-shadow(1px -7px 7px #002effdb) invert(1%);">
            <img src="./img/silla.jpg" alt="" style="width: 19%; opacity: 0.12">
        </div>
        <div class="card-body" style="color: #fff;">
            <p class="card-text font-keyla-cursiva size2-2 brillo">Te invito a compartir conmigo<br>este día tan especial</p>
        </div>
    </div>
    <!--  -->
</section>