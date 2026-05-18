<?php
// Manejar la subida de archivos
$galeria_dir = RUTA_RELATIVA . 'img/galeria/';
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fotos'])) {
    $total_files = count($_FILES['fotos']['name']);
    $subidas = 0;
    
    for ($i = 0; $i < $total_files; $i++) {
        $tmpFilePath = $_FILES['fotos']['tmp_name'][$i];
        if ($tmpFilePath != "") {
            // Renombrar archivo para evitar conflictos y caracteres raros
            $extension = pathinfo($_FILES['fotos']['name'][$i], PATHINFO_EXTENSION);
            $newFilePath = $galeria_dir . uniqid() . '.' . $extension;
            
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $subidas++;
            }
        }
    }
    
    if ($subidas > 0) {
        $mensaje = "<div class='alert alert-success mt-3' style='background-color: rgba(37, 211, 102, 0.2); border-color: #25D366; color: #25D366;'>¡$subidas foto(s) subida(s) con éxito!</div>";
    }
}

// Obtener imagenes subidas
$imagenes = glob($galeria_dir . "*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}", GLOB_BRACE);
// Ordenar de más reciente a más antigua (por fecha de modificación)
if ($imagenes !== false) {
    usort($imagenes, function($a, $b) {
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
            background: linear-gradient(180deg, rgba(246,0,255,0.15) 0%, rgba(7,7,7,1) 100%);
            border-bottom: 1px solid rgba(255,255,255,0.05);
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
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
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
            column-count: 3;
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
            border: 1px solid rgba(255,255,255,0.1);
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
            background: rgba(255,255,255,0.1);
            padding: 8px 15px;
            border-radius: 50px;
        }
        .back-btn:hover {
            color: #03e9f4;
            background: rgba(255,255,255,0.15);
        }
        @media (max-width: 768px) {
            .masonry-grid { column-count: 2; }
            .header-galeria h1 { font-size: 2.5rem; }
            .header-galeria { padding-top: 5rem; }
        }
        @media (max-width: 480px) {
            .masonry-grid { column-count: 1; }
            .header-galeria h1 { font-size: 2rem; }
        }
    </style>
</head>
<body>

    <a href="?" class="back-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Volver
    </a>

    <div class="header-galeria">
        <h1>Nuestra Galería</h1>
        <p style="font-size: 1.2rem; color: #ccc;">¡Compartí tus fotos de la fiesta con nosotros!</p>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="upload-card">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 text-start">
                            <label for="fotos" class="form-label" style="font-size: 1.1rem; color: #03e9f4;">Seleccioná las fotos para subir</label>
                            <input class="form-control form-control-lg bg-dark text-white border-secondary" type="file" id="fotos" name="fotos[]" multiple accept="image/*" required>
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
                        <img src="<?php echo $img; ?>" alt="Foto de la fiesta" loading="lazy">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
