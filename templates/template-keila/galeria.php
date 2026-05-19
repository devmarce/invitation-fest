<?php
// Manejar la subida de archivos
$galeria_dir = RUTA_RELATIVA . 'img/galeria/';
$codigo_correcto = defined('CODIGO_ADMIN') ? CODIGO_ADMIN : '1234';

// Endpoint para el slider dinámico
if (isset($_GET['ajax_slider'])) {
    $imagenes = glob($galeria_dir . "*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE);
    if ($imagenes !== false) {
        usort($imagenes, function ($a, $b) {
            return filemtime($b) - filemtime($a);
        });
        $ultimas_5 = array_slice($imagenes, 0, 5);
        header('Content-Type: application/json');
        echo json_encode($ultimas_5);
    } else {
        echo json_encode([]);
    }
    exit;
}

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['eliminar_foto'])) {
        $codigo_ingresado = isset($_POST['codigo_admin']) ? $_POST['codigo_admin'] : '';

        if ($codigo_ingresado === $codigo_correcto) {
            $foto_a_eliminar = basename($_POST['eliminar_foto']);
            $ruta_foto = $galeria_dir . $foto_a_eliminar;
            if (file_exists($ruta_foto) && is_file($ruta_foto)) {
                rename($ruta_foto, $ruta_foto . '.oculta');
                $mensaje = "<div class='alert alert-success mt-3' style='background-color: rgba(255, 165, 0, 0.2); border-color: #ffa500; color: #ffa500;'>¡Foto eliminada de la galería!</div>";
            }
        } else {
            $mensaje = "<div class='alert alert-danger mt-3' style='background-color: rgba(255, 51, 102, 0.2); border-color: #ff3366; color: #ff3366;'>Código incorrecto. No se pudo eliminar la foto.</div>";
        }
    } elseif (isset($_FILES['fotos'])) {
        $total_files = count($_FILES['fotos']['name']);
        $subidas = 0;
        $errores = 0;

        for ($i = 0; $i < $total_files; $i++) {
            $tmpFilePath = $_FILES['fotos']['tmp_name'][$i];
            if ($tmpFilePath != "") {
                $extension = strtolower(pathinfo($_FILES['fotos']['name'][$i], PATHINFO_EXTENSION));
                $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

                // Validar extensión y que el archivo sea realmente una imagen (previene archivos maliciosos renombrados)
                if (in_array($extension, $allowed_extensions) && @getimagesize($tmpFilePath) !== false) {
                    $newFilePath = $galeria_dir . uniqid() . '.' . $extension;

                    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $subidas++;
                    }
                } else {
                    $errores++;
                }
            }
        }

        if ($subidas > 0) {
            $mensaje = "<div class='alert alert-success mt-3' style='background-color: rgba(37, 211, 102, 0.2); border-color: #25D366; color: #25D366;'>¡$subidas foto(s) subida(s) con éxito!</div>";
        }
        if ($errores > 0) {
            $mensaje .= "<div class='alert alert-danger mt-3' style='background-color: rgba(255, 51, 102, 0.2); border-color: #ff3366; color: #ff3366;'>Hubo $errores archivo(s) que no se subieron porque no eran imágenes válidas.</div>";
        }
    }
}

// Obtener imagenes subidas
$imagenes = glob($galeria_dir . "*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE);
// Ordenar de más reciente a más antigua (por fecha de modificación)
if ($imagenes !== false) {
    usort($imagenes, function ($a, $b) {
        return filemtime($b) - filemtime($a);
    });
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotos - <?php echo TITULO_PAGINA; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #070707;
            color: #fff;
            font-family: 'Outfit', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .header-galeria {
            padding: 4rem 1rem 2rem 1rem;
            text-align: center;
            background: linear-gradient(180deg, rgba(246, 0, 255, 0.15) 0%, rgba(7, 7, 7, 1) 100%);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            margin-bottom: 2rem;
            position: relative;
        }

        .header-galeria h1 {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #f600ff, #03e9f4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
        }

        .upload-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 3rem;
            backdrop-filter: blur(10px);
        }

        .btn-neon {
            background: rgba(246, 0, 255, 0.1);
            color: #f600ff;
            border: 1px solid #f600ff;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 1rem;
        }

        .btn-neon:hover {
            background: #f600ff;
            color: #fff;
            box-shadow: 0 0 15px #f600ff, 0 0 30px #f600ff;
        }

        .masonry-grid {
            column-count: 4;
            column-gap: 1.5rem;
            padding: 0 1rem;
        }

        .masonry-grid .img-wrapper {
            margin-bottom: 1.5rem;
            break-inside: avoid;
        }

        .masonry-grid img {
            width: 100%;
            border-radius: 15px;
            transition: transform 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .masonry-grid img:hover {
            transform: scale(1.02);
            box-shadow: 0 0 25px rgba(3, 233, 244, 0.3);
            border-color: #03e9f4;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #fff;
            text-decoration: none;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s;
            z-index: 10;
            background: rgba(255, 255, 255, 0.1);
            padding: 8px 15px;
            border-radius: 50px;
        }

        .back-btn:hover {
            color: #03e9f4;
            background: rgba(255, 255, 255, 0.15);
        }

        @media (max-width: 768px) {
            .masonry-grid {
                column-count: 3;
                column-gap: 1rem;
            }

            .header-galeria h1 {
                font-size: 2.5rem;
            }

            .header-galeria {
                padding-top: 5rem;
            }
        }

        @media (max-width: 480px) {
            .masonry-grid {
                column-count: 2;
                column-gap: 0.5rem;
            }

            .masonry-grid .img-wrapper {
                margin-bottom: 0.5rem;
            }

            .header-galeria h1 {
                font-size: 2rem;
            }
        }

        /* Lightbox CSS */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.95);
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .lightbox.active {
            opacity: 1;
            pointer-events: auto;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 2.5rem;
            cursor: pointer;
            z-index: 10000;
            line-height: 1;
        }

        .lightbox-img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);
            object-fit: contain;
            transition: transform 0.2s ease-out;
            transform-origin: center center;
            will-change: transform;
        }

        .lightbox-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 100%);
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
            z-index: 10001;
        }

        .lightbox-btn {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.3);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            text-decoration: none;
            padding: 0;
        }

        .lightbox-btn:hover {
            background: #f600ff;
            border-color: #f600ff;
            color: #fff;
            box-shadow: 0 0 15px #f600ff;
        }

        .img-wrapper img {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <a href="?" class="back-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H5M12 19l-7-7 7-7" />
        </svg>
        Volver
    </a>

    <div class="header-galeria">
        <h1>Nuestra Galería</h1>
        <p style="font-size: 1.2rem; color: #ccc;">¡Compartí tus fotos de la fiesta con nosotros!</p>
    </div>

    <?php $ultimas_5 = array_slice($imagenes, 0, 5); ?>
    <?php if (!empty($ultimas_5)): ?>
        <div class="slider-container" style="max-width: 800px; margin: 0 auto 3rem auto; padding: 0 1rem;">
            <h3 class="text-center mb-4" style="color: #03e9f4; font-family: 'Outfit', sans-serif;">Últimas Fotos</h3>
            <div id="latestPhotosCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="carousel-inner-content">
                    <?php foreach ($ultimas_5 as $index => $imgUrl): ?>
                        <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                            <img src="<?php echo $imgUrl; ?>" class="d-block w-100"
                                style="height: 400px; object-fit: cover; border-radius: 15px; border: 1px solid rgba(255,255,255,0.1); cursor: pointer;"
                                alt="Última foto" onclick="openLightbox('<?php echo $imgUrl; ?>')">
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (count($ultimas_5) > 1): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#latestPhotosCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#latestPhotosCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="upload-card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 text-center">
                            <label for="fotos" class="custom-file-upload d-block" style="background: rgba(255,255,255,0.05); color: #fff; border: 2px dashed rgba(3,233,244,0.5); padding: 20px 30px; border-radius: 15px; cursor: pointer; transition: all 0.3s ease;" onmouseover="this.style.background='rgba(3,233,244,0.1)'" onmouseout="this.style.background='rgba(255,255,255,0.05)'">
                                <div style="font-size: 2rem; color: #03e9f4; font-weight: bold; margin-bottom: 5px;">+ Foto</div>
                                <div style="font-size: 0.9rem; color: #ccc;">Tocá acá para seleccionar tus fotos</div>
                            </label>
                            <input class="d-none" type="file" id="fotos" name="fotos[]" multiple accept="image/*" required onchange="actualizarNombreArchivos(this)">
                            <div id="file-chosen-text" style="color: #f600ff; font-size: 1rem; margin-top: 10px; font-weight: 500;"></div>
                        </div>
                        <button type="submit" class="btn btn-neon w-100">Subir Fotos</button>
                    </form>
                    <?php echo $mensaje; ?>
                </div>
            </div>
        </div>

        <?php if (empty($imagenes)): ?>
            <div class="text-center text-muted my-5" style="min-height: 30vh;">
                <h4>Aún no hay fotos en la galería</h4>
                <p>¡Sé el primero en subir una!</p>
            </div>
        <?php else: ?>
            <div class="masonry-grid pb-5">
                <?php foreach ($imagenes as $img): ?>
                    <div class="img-wrapper">
                        <img src="<?php echo $img; ?>" alt="Foto de la fiesta" loading="lazy"
                            onclick="openLightbox('<?php echo $img; ?>')">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Lightbox -->
    <div class="lightbox" id="lightbox">
        <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
        <img src="" alt="Fullscreen" class="lightbox-img" id="lightbox-img">
        <div class="lightbox-actions">
            <button class="lightbox-btn" id="zoom-in-btn" title="Acercar">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    <line x1="11" y1="8" x2="11" y2="14"></line>
                    <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>
            </button>
            <button class="lightbox-btn" id="zoom-out-btn" title="Alejar">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    <line x1="8" y1="11" x2="14" y2="11"></line>
                </svg>
            </button>
            <button class="lightbox-btn" id="share-btn" title="Compartir">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="18" cy="5" r="3"></circle>
                    <circle cx="6" cy="12" r="3"></circle>
                    <circle cx="18" cy="19" r="3"></circle>
                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                </svg>
            </button>
            <a href="" download class="lightbox-btn" id="download-btn" title="Descargar">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
            </a>
            <form method="POST" id="delete-form" style="display:inline; margin:0;">
                <input type="hidden" name="eliminar_foto" id="delete-input" value="">
                <input type="hidden" name="codigo_admin" id="codigo-admin-input" value="">
                <button type="button" class="lightbox-btn" title="Ocultar" onclick="handleEliminar(event)"
                    style="border-color: #ffa500; color: #ffa500;"
                    onmouseover="this.style.backgroundColor='#ffa500'; this.style.color='#fff';"
                    onmouseout="this.style.backgroundColor='rgba(255,255,255,0.1)'; this.style.color='#ffa500';">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    <!-- Custom Modal for Passcode -->
    <div id="modal-codigo"
        style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.85); z-index:10005; align-items:center; justify-content:center; backdrop-filter: blur(5px);">
        <div
            style="background:#111; padding:2rem; border-radius:15px; border:1px solid #ffa500; text-align:center; box-shadow: 0 0 30px rgba(255,165,0,0.2); max-width: 90%; width: 400px; animation: scaleIn 0.3s ease;">
            <h4 style="color:#fff; margin-bottom:1rem; font-family: 'Outfit', sans-serif;">Código de Seguridad</h4>
            <p style="color:#aaa; font-size:0.95rem; margin-bottom:1.5rem;">Ingresá el código de administrador para
                poder eliminar esta foto de la galería.</p>
            <input type="password" id="input-codigo-modal" class="form-control bg-dark text-white mb-4"
                placeholder="Ingresá el código"
                style="border: 1px solid rgba(255,255,255,0.2); text-align: center; font-size: 1.2rem; letter-spacing: 2px;">
            <div style="display:flex; gap:10px; justify-content:center;">
                <button type="button" class="btn" style="background: rgba(255,255,255,0.1); color: #fff; width: 48%;"
                    onclick="cerrarModalCodigo()">Cancelar</button>
                <button type="button" class="btn"
                    style="background: rgba(255,165,0,0.2); color: #ffa500; border: 1px solid #ffa500; width: 48%;"
                    onclick="confirmarCodigo()">Eliminar</button>
            </div>
        </div>
    </div>

    <style>
        @keyframes scaleIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const downloadBtn = document.getElementById('download-btn');
        const shareBtn = document.getElementById('share-btn');
        const zoomInBtn = document.getElementById('zoom-in-btn');
        const zoomOutBtn = document.getElementById('zoom-out-btn');
        const deleteInput = document.getElementById('delete-input');

        let currentImgUrl = '';
        let zoomLevel = 1;
        let isDragging = false;
        let startX, startY, translateX = 0, translateY = 0;

        function resetZoom() {
            zoomLevel = 1;
            translateX = 0;
            translateY = 0;
            lightboxImg.style.transform = `translate(0px, 0px) scale(1)`;
            lightboxImg.style.cursor = 'default';
        }

        function applyZoom() {
            lightboxImg.style.transform = `translate(${translateX}px, ${translateY}px) scale(${zoomLevel})`;
            if (zoomLevel > 1) {
                lightboxImg.style.cursor = 'grab';
            } else {
                resetZoom();
            }
        }

        zoomInBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            zoomLevel = Math.min(zoomLevel + 0.5, 4);
            applyZoom();
        });

        zoomOutBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            zoomLevel = Math.max(zoomLevel - 0.5, 1);
            applyZoom();
        });

        function openLightbox(imgUrl) {
            currentImgUrl = imgUrl;
            lightboxImg.src = imgUrl;
            downloadBtn.href = imgUrl;
            resetZoom();
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';

            // Generar nombre de archivo para la descarga y eliminación
            const filename = imgUrl.split('/').pop();
            downloadBtn.download = filename;
            deleteInput.value = filename;
        }

        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
        }

        // Cerrar al hacer click en el fondo negro
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightbox();
            }
        });

        // Lógica de Pan (arrastrar imagen cuando tiene zoom)
        lightboxImg.addEventListener('mousedown', (e) => {
            if (zoomLevel > 1) {
                isDragging = true;
                startX = e.clientX - translateX;
                startY = e.clientY - translateY;
                lightboxImg.style.cursor = 'grabbing';
                e.preventDefault();
            }
        });

        window.addEventListener('mousemove', (e) => {
            if (isDragging && zoomLevel > 1) {
                translateX = e.clientX - startX;
                translateY = e.clientY - startY;
                lightboxImg.style.transform = `translate(${translateX}px, ${translateY}px) scale(${zoomLevel})`;
            }
        });

        window.addEventListener('mouseup', () => {
            if (isDragging) {
                isDragging = false;
                if (zoomLevel > 1) lightboxImg.style.cursor = 'grab';
            }
        });

        // Soporte Touch para arrastrar en mobile
        lightboxImg.addEventListener('touchstart', (e) => {
            if (zoomLevel > 1 && e.touches.length === 1) {
                isDragging = true;
                startX = e.touches[0].clientX - translateX;
                startY = e.touches[0].clientY - translateY;
            }
        });

        window.addEventListener('touchmove', (e) => {
            if (isDragging && zoomLevel > 1 && e.touches.length === 1) {
                translateX = e.touches[0].clientX - startX;
                translateY = e.touches[0].clientY - startY;
                lightboxImg.style.transform = `translate(${translateX}px, ${translateY}px) scale(${zoomLevel})`;
            }
        });

        window.addEventListener('touchend', () => {
            isDragging = false;
        });

        function handleEliminar(event) {
            if (event) event.preventDefault();
            document.getElementById('modal-codigo').style.display = 'flex';
            document.getElementById('input-codigo-modal').value = '';
            setTimeout(() => document.getElementById('input-codigo-modal').focus(), 100);
        }

        function cerrarModalCodigo() {
            document.getElementById('modal-codigo').style.display = 'none';
        }

        function confirmarCodigo() {
            const codigo = document.getElementById('input-codigo-modal').value;
            if (codigo.trim() !== '') {
                document.getElementById('codigo-admin-input').value = codigo.trim();
                document.getElementById('delete-form').submit();
            } else {
                alert('Ingresá un código para continuar.');
                document.getElementById('input-codigo-modal').focus();
            }
        }

        function actualizarNombreArchivos(input) {
            const label = document.getElementById('file-chosen-text');
            if (input.files && input.files.length > 0) {
                // Validar que todos los archivos sean imágenes
                let allImages = true;
                for (let i = 0; i < input.files.length; i++) {
                    if (!input.files[i].type.startsWith('image/')) {
                        allImages = false;
                        break;
                    }
                }
                
                if (!allImages) {
                    alert('Por favor, seleccioná únicamente imágenes (JPG, PNG, GIF, etc.). No se permiten otros tipos de archivos.');
                    input.value = ''; // Limpiar la selección
                    label.innerText = 'Selección cancelada. Sólo se permiten imágenes.';
                    label.style.color = '#ff3366';
                    return;
                }

                const count = input.files.length;
                label.innerText = count === 1 ? '1 foto seleccionada lista para subir' : `${count} fotos seleccionadas listas para subir`;
                label.style.color = '#f600ff'; // Restaurar color original por si hubo error antes
            } else {
                label.innerText = '';
            }
        }

        // Funcionalidad de Compartir usando la API nativa de Web Share
        shareBtn.addEventListener('click', async () => {
            if (navigator.share) {
                try {
                    // Obtener la imagen como un blob para adjuntarla
                    const response = await fetch(currentImgUrl);
                    const blob = await response.blob();
                    const filename = currentImgUrl.split('/').pop();

                    const file = new File([blob], filename, { type: blob.type });

                    if (navigator.canShare && navigator.canShare({ files: [file] })) {
                        await navigator.share({
                            files: [file],
                            title: 'Foto de la Fiesta',
                            text: '¡Mirá esta foto increíble de la fiesta!'
                        });
                    } else {
                        // Fallback si no soporta compartir archivos directamente
                        await navigator.share({
                            title: 'Foto de la Fiesta',
                            text: '¡Mirá esta foto increíble de la fiesta!',
                            url: window.location.href
                        });
                    }
                } catch (err) {
                    console.log('Error compartiendo:', err);
                }
            } else {
                alert('La opción de compartir directamente no está soportada en este navegador. Podes usar el botón "Descargar" y subirla manualmente.');
            }
        });

        // Actualizar slider cada 3 minutos (180000 ms)
        setInterval(async () => {
            try {
                const url = new URL(window.location.href);
                url.searchParams.set('ajax_slider', '1');
                const res = await fetch(url.toString());
                const data = await res.json();

                if (data && data.length > 0) {
                    const carouselInner = document.getElementById('carousel-inner-content');
                    if (carouselInner) {
                        let html = '';
                        data.forEach((imgUrl, index) => {
                            const activeClass = index === 0 ? 'active' : '';
                            html += `<div class="carousel-item ${activeClass}">
                                        <img src="${imgUrl}" class="d-block w-100" style="height: 400px; object-fit: cover; border-radius: 15px; border: 1px solid rgba(255,255,255,0.1); cursor: pointer;" alt="Última foto" onclick="openLightbox('${imgUrl}')">
                                     </div>`;
                        });
                        carouselInner.innerHTML = html;
                    } else {
                        // Si el slider no existía (ej. se acaba de subir la primera foto), recargar
                        location.reload();
                    }
                }
            } catch (e) {
                console.log('Error actualizando el slider:', e);
            }
        }, 180000);
    </script>
</body>

</html>