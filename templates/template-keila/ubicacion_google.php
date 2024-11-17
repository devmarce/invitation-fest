<?php
$link_google = 'https://www.google.com/maps/place/Sarrachaga+5699,+B1765+Isidro+Casanova,+Provincia+de+Buenos+Aires/@-34.6964241,-58.5891673,17z/data=!3m1!4b1!4m6!3m5!1s0x95bcc65d5105bca7:0xbfcbafb4531cfbd8!8m2!3d-34.6964241!4d-58.5891673!16s%2Fg%2F11cs7dq9nw?entry=ttu&g_ep=EgoyMDI0MTAyOS4wIKXMDSoASAFQAw%3D%3D';
?>

<!-- test @borrar -->
<style type="text/css">
    .border-card-info-salon {
        border-bottom: 1px solid #03e9f4;
        border-left: 1px solid #03e9f4;
        border-right: 1px solid #03e9f4;
        border-top: none;
    }

    .card-bg-dorado {
        color: #000000;
        font-size: 1.5rem;
        background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
    }
</style>

<div class="container text-center mt-5">
    <p class="d-inline-flex gap-1">
        <!--  -->
        <a class="btn btn-consulta-home espejo-btn font-keyla-cursiva" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
    -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);">
            Ver Mapa
        </a>
    </p>
    <div class="collapse intermitente p-0" id="collapseExample">
        <div class="card card-body bg-none b-none" style="color:#fff; padding: 0px;">
            <div class="card bg-none b-none">
                <div class="card-body" style="color:#fff">
                    <h3>Sarrachaga 5699</h3>
                    <p>Esquina Sarrachaga & Estocolmo</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3288.3965870475453!2d-58.59135648409575!3d-34.6964241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcc65d5105bca7%3A0xbfcbafb4531cfbd8!2sSarrachaga%205699%2C%20B1765%20Isidro%20Casanova%2C%20Provincia%20de%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1698915306147!5m2!1ses!2sar"
                        width="100%"
                        height="250"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <!-- link ubicacion Google Map -->
                    <a class="btn btn-primary" href="<?php echo $link_google; ?>" target="_blank" role="button" style="width: 50%;">ir a Google Map <img src="./templates/template-keila/img/google-map.png" style="width: 10%;"></a>

                    <!-- info salón -->
                    <p class="mt-2">
                        <button class="btn btn-consulta-home espejo-btn font-keyla-cursiva" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-info-salon" aria-expanded="false" aria-controls="collapse-info-salon">
                            Info sobre el Salón
                        </button>
                    </p>
                    <div class="card bg-none border-card-info-salon">
                        <div class="collapse collapse-horizontal bg-none b-none" id="collapse-info-salon">
                            <div class="card card-body bg-none b-none">
                                <!-- card info salón -->
                                <div class="card">
                                    <img src="./templates/template-keila/img/salon.jpg" class="card-img-top" alt="...">
                                    <div class="card-body card-bg-dorado">
                                        <p class="card-text font-keyla-cursiva">¡Este salón fue el elegido para celebrar mis 15 años!<br>Te invito a pasar una noche inolvidable.</p>
                                        <button class="btn btn-consulta-home espejo-btn font-keyla-cursiva" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-info-salon" aria-expanded="false" aria-controls="collapse-info-salon">
                            Cerrar
                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>