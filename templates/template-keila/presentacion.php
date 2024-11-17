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
<?php $ocultar = true; // solo de backup 
?>
<?php if (!$ocultar): ?>
    <div style="overflow:hidden; position:absolute; left:0; top:0px; width:50px; height:50px;" style="border: blue 1px solid;">
        <div style="margin-top:-290px;">
            <object width="420" height="315">
                <param name="movie" value="https://www.youtube.com/v/HMW0FtvU5iQ?version=3&amp;hl=en_US&autoplay=1&amp;autohide=2&amp;&mute=1">
                </param>
                <param name="allowFullScreen" value="true">
                </param>
                <param name="allowscriptaccess" value="always">
                </param>
                <embed src="https://www.youtube.com/v/HMW0FtvU5iQ?version=3&amp;hl=en_US&autoplay=1&amp;autohide=2&amp;&mute=0" type="application/x-shockwave-flash" width="420" height="315" allowscriptaccess="always" allowfullscreen="true"></embed>
            </object>
        </div>
    </div>
<?php endif; ?>

<div class="container mt-5">
    <!--  -->
    <div class="card text-center" style="background: #02020275;">
        <div class="col-12">
            <img src="./templates/template-keila/img/mis15.png" alt="" style="z-index: 999999999;" class="mb-5">
            <img src="./templates/template-keila/img/keila-logo2.png" alt="" style="filter: drop-shadow(1px -7px 7px #779bff) invert(1%); width: 100%">
            <!-- <img src="./templates/template-keila/img/silla.png" alt="" style="width: 19%; opacity: 0.12"> -->
        </div>
        <div class="card-body" style="color: #fff;">
            <p id="presentacion-txt" class="card-text font-keyla-cursiva size2-2 brillo text-center">Te invito a compartir conmigo<br>esta noche tan especial</p>
        </div>
    </div>
    <img src="./templates/template-keila/img/deco.png" style="width: 100%;">
    <!--  -->
</div>