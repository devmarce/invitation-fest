<style>
    .modal-content-confirm {
        font-weight: 600;
        border: 1px solid #f3d303;
        color: #fff;
        background: radial-gradient(ellipse farthest-corner at right bottom,
                #FFF9E6 0%,
                /* Reflejo casi blanco */
                #FFE57A 10%,
                /* Amarillo dorado muy claro */
                #FFD700 25%,
                /* Dorado brillante */
                #E6AC00 45%,
                /* Dorado más intenso */
                #B8860B 60%,
                /* Dorado oscuro */
                transparent 80%),
            radial-gradient(ellipse farthest-corner at left top,
                #FFFFFF 0%,
                /* Reflejo blanco */
                #FFF4CC 10%,
                /* Amarillo pálido */
                #FFD966 30%,
                /* Dorado claro */
                #C7963A 65%,
                /* Marrón dorado suave */
                #C7963A 100%
                /* Marrón dorado */
            );

    }

    .btn-whatsapp {
        background: #147209;
        border: 1px solid #fff;
        color: #fff;
        -webkit-box-reflect: below -7px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 255, 255, 0.5)))
    }

    /* campos del form */


    /* Cambia el color de texto de los inputs a rojo */
    #attendanceForm input[type="text"] {
        color: #fff;
        font-family: sans-serif;
        border: none;
        background: #12191d6b;
    }

    /* Cambia el color de los placeholders a azul */
    #attendanceForm input::placeholder {
        color: #ffffff47;
        font-family: sans-serif;
    }

    /* Cambia el color de los labels a verde */
    #attendanceForm label,
    .opcional {
        color: #000000;
        text-transform: uppercase;
    }

    /* Cambia el color del texto en el select a violeta */
    #attendanceForm select {
        color: #fff;
        font-family: sans-serif;
        background: #12191d6b;
    }

    /* Cambia el color de las opciones dentro del select a violeta */
    #attendanceForm select option {
        color: #fff;
        font-family: sans-serif;
        background: #000;
    }
</style>

<div class="container mb-5" style="margin-top: 15rem;">
    <div class="card text-center bg-none">
        <div class="card-body" style="color: #fff; font-size: 1.6rem;">
            <h5 class="card-title mb-5" style="font-size: 1.8rem; -webkit-box-reflect: below -6px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 255, 255, 0.5)));">CONFIRMA TU ASISTENCIA</h5>
            <p class="card-text font-keyla-cursiva">Es fundamental que confirmes tu asistencia o me comentes si no puedes venir a la fiesta.</p>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-consulta-home espejo-btn latido" data-bs-toggle="modal" data-bs-target="#modal-confirm" style="box-shadow: 0 0 5px #03e9f4, 0 0 25px #03e9f4, 0 0 50px #03e9f4, 0 0 200px #03e9f4;
    -webkit-box-reflect: below 1px linear-gradient(transparent, #0005);font-family: sans-serif;">
                CONFIRMA AQUÍ
            </button>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-confirm" tabindex="-1" aria-labelledby="modal-confirmLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Centramos verticalmente -->
            <div class="modal-content modal-content-confirm">
                <div class="modal-header text-center b-none"> <!-- Centramos el título -->
                    <h1 class="modal-title fs-5 w-100" id="modal-confirmLabel" style="color: #000; -webkit-box-reflect: below -7px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 255, 255, 0.5)));">
                        COMPLETA PARA CONFIRMAR
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form id="attendanceForm" class="d-flex flex-column align-items-center"> <!-- Flex para alinear al centro -->
                        <div class="mb-3 w-100"> <!-- Espacio inferior y ancho completo -->

                            <!-- cofirm - si - no -->
                            <label for="attendance" class="form-label">¿Vas a asistir al evento?</label>
                            <select id="attendance" class="form-select" required> <!-- Clase para estilo select de Bootstrap -->
                                <option value="" style="color: #ffffff47;">Selecciona una opción</option>
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                            </select>
                        </div>

                        <!-- nombre -->
                        <div class="mb-3 w-100">
                            <label for="fullName" class="form-label">Nombre Completo:</label>
                            <input type="text" id="fullName" class="form-control" placeholder="Escribe tu nombre completo" required>
                        </div>

                        <!-- pref. musical -->
                        <div class="mb-3 w-100">
                            <label for="repertorio" class="form-label">Preferencia musical:</label>
                            <p class="opcional">Opcional</p>
                            <input type="text" id="repertorio" class="form-control" placeholder="Escribe: Artista - Canción" required>
                        </div>

                        <button type="button" class="btn btn-whatsapp mb-5 latido" onclick="sendWhatsApp()">Enviar por WhatsApp</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal confirmacion -->

</div>

<script defer>
    function sendWhatsApp() {
        // Obtener los valores de los campos del formulario
        const asistencia = document.getElementById("attendance").value;
        const fullName = document.getElementById("fullName").value;
        const repertorio = document.getElementById("repertorio").value;
        //const numero_cel = '5491166255638';
        const numero_cel = '5491166255638';

        // Verificar que ambos campos estén llenos
        if (!attendance || !fullName) {
            alert("Por favor, completa todos los campos.");
            return;
        }

        // ver si agrego preferencia musical.
        var music_titulo = '';
        var music_pref = '';
        if (repertorio != '') {
            music_titulo = 'Mi canción preferida es:'
            music_pref = '*🎶 ' + repertorio + '*';
        } else if (repertorio == '') {
            music_pref = '*No tengo una preferencia musical.*';
        }

        // Saludo de despedida
        var saludo = '';

        var msj_asistencia = '';
        if (asistencia == 'SI') {
            msj_asistencia = '🟢 "SI" voy asistir.';
            saludo = 'Gracias por la invitación...';
        } else if (asistencia == 'NO') {
            msj_asistencia = '🔴 "NO" puedo asistir.';
            saludo = 'Gracias por la invitación...';
            music_pref = '';
            music_titulo = '';
        }

        // Función para capitalizar palabras
        function capitalizeWords(str) {
            return str
                .split(" ")
                .map(word => "*" + word.charAt(0).toUpperCase() + word.slice(1).toLowerCase() + "*") // Capitaliza la primera letra y envuelve en *
                .join(" ");
        }


        // Crear el mensaje para WhatsApp
        const message = `     ✨ Fiesta de Keila ✨
        ——————🔹——————
        Hola, Soy → ${capitalizeWords(fullName)}
        Quería Confirmar que:
        *${msj_asistencia}*
        ——————🔹——————
        ${music_titulo}
        ${music_pref}

        ${saludo}
        Saludos!`;

        // Codificar el mensaje para incluirlo en el link de WhatsApp
        const encodedMessage = encodeURIComponent(message);

        // Crear el link de WhatsApp
        const whatsappLink = `https://api.whatsapp.com/send?phone=${numero_cel}&text=${encodedMessage}`;

        // Abrir el link en una nueva ventana
        window.open(whatsappLink, "_blank");

        //modal-title
        // Cambiar el contenido del modal a un mensaje de agradecimiento y botón de cerrar
        const titulo = document.querySelector("#modal-confirm .modal-title");
        titulo.innerHTML = `
            <h1 class="modal-title fs-5 w-100" id="modal-confirmLabel" style="color: #000; -webkit-box-reflect: below -7px -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(255, 255, 255, 0.5)));">
                    Mis 15 Keila
                </h1>
        `;

        // Cambiar el contenido del modal a un mensaje de agradecimiento y botón de cerrar
        const modalBody = document.querySelector("#modal-confirm .modal-body");
        modalBody.innerHTML = `
            <p class="font-keyla-cursiva"  style="font-size: 2rem;">Gracias por confirmar tu asistencia.</p>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background: #000; color: #fff; border: 1px solid #fff;">Cerrar</button>
        `;
    }
</script>