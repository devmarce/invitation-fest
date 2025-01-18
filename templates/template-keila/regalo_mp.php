<?php
$alias_keila = "KeilaMis15";
$link_a_mp = "https://852u.adj.st/home/?adj_t=mqo65e0&adj_label=nav_mp_login&adj_campaign=nav_mp_login&adj_fallback=https%3A%2F%2Fwww.mercadolibre.com%2Fjms%2Fmla%2Flgz%2Flogin%3Fplatform_id%3DMP%26go%3Dhttps%253A%252F%252Fwww.mercadopago.com.ar%252F%26loginType%3Dexplicit&adj_redirect_macos=https%3A%2F%2Fwww.mercadolibre.com%2Fjms%2Fmla%2Flgz%2Flogin%3Fplatform_id%3DMP%26go%3Dhttps%253A%252F%252Fwww.mercadopago.com.ar%252F%26loginType%3Dexplicit";
?>

<script defer>
    function copiarAlPortapapeles(id_elemento) {
        var aux = document.createElement("input");
        aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
        document.body.appendChild(aux);
        aux.select();
        document.execCommand("copy");
        document.body.removeChild(aux);
    }
</script>

<intent-filter>
    <action android:name="android.intent.action.VIEW" />
    <category android:name="android.intent.category.DEFAULT" />
    <category android:name="android.intent.category.BROWSABLE" />
    <data android:scheme="https"
        android:host="https://www.mercadopago.com.ar/"
        android:pathPrefix="money-out/transfer/new-account" />
</intent-filter>

<div class="container" style="margin-top: 10rem;">
    <div class="card bg-none b-none">
        <img src="./templates/template-keila/img/regalo.png" class="card-img-top w-50 m-auto" alt="...">
        <div class="card-body text-center" style="color: #fff;">
            <h3 class="font-keyla-cursiva mb-5" style="font-size: 2rem;     -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 255, 255, 0.5)));">Regalo</h3>

            <p id="alias-mpx" style="display: none;"><?php echo $alias_keila; ?></p>

            <hr>
            <p class="card-text">
            Tu presencia es el mejor regalo para mí. No te preocupes si no sabes que regalarme. En el salón habrá una Urna y sobres para que puedas dejarme un presente. También dejo otra opción, mi Alias: <span style="font-size: 1.2rem; color: #03e9f4; font-weight: 600;">"Mis15keila"</span>.<br><span class="font-keyla-cursiva" style="font-size: 1.5rem;
">¡ Gracias por acompañarme en esta noche tan importante para mí !
            </p>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-mp" onclick="copiarAlPortapapeles('alias-mpx')" style="background: #009ee3; color: #fff; box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
    -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);">Copiar Alias de Keila</button>

            <!-- Modal -->
            <div class="modal fade" id="modal-mp" tabindex="-1" aria-labelledby="exampmodal-mp" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center" style="background: #fff; color: #000;">
                        <div class="modal-header d-block" style="background: #009ee3; color: #fff">
                            <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Alias de Keila copiado!</h1>
                            <button type="button" class="btn-close d-block" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: center;">
                            <p>
                                Transferir a su cuenta de Mercado Pago <br>
                                Ve a <span class="latido"><b>tranferencia</b></span> y pega el alias
                            </p>
                            <hr>
                            <img src="./templates/template-keila/img/transferir.jpg" class="card-img-top" alt="...">
                            <hr>
                            <img src="./templates/template-keila/img/transf-keila.jpg" class="card-img-top" alt="...">
                            <hr>
                            <p>y listo! <br><span class="font-keyla-cursiva" style="font-size: 2rem;">muchas gracias🫶</span></p>
                            <img src="./templates/template-keila/img/flecha-abajo.png" class="card-img-top latido" style="width: 10%;">
                            <br>
                        </div>
                        <div class="modal-footer d-block card-bg-dorado">
                            <a href="<?php echo $link_a_mp; ?>" type="button" class="btn btn-primary latido" style="background: #009ee3; color: #fff;box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;" onclick="copiarAlPortapapeles('alias-mpx')">Ir a MercadoPago</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>