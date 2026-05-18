<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis 15 Fest | Invitaciones Digitales Inolvidables</title>
    <meta name="description" content="Sorprendé a tus invitados con una invitación digital interactiva, única y personalizada para tus 15 años. ¡Conocé nuestros modelos!">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #f600ff; /* Neon pink */
            --secondary: #03e9f4; /* Neon cyan */
            --bg-dark: #070707;
            --text-light: #ffffff;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.05);
        }
        
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-light);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* Navbar */
        header {
            padding: 2rem;
            text-align: center;
            position: absolute;
            width: 100%;
            z-index: 10;
        }
        .logo {
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
            position: relative;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(246,0,255,0.08) 0%, rgba(3,233,244,0.05) 50%, rgba(7,7,7,0) 80%);
            z-index: -1;
            filter: blur(50px);
        }

        h1 {
            font-size: 4.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            background: linear-gradient(to right, #fff, #ccc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: fadeInDown 1s ease-out forwards;
            opacity: 0;
            transform: translateY(-20px);
        }

        p.subtitle {
            font-size: 1.3rem;
            color: #a0a0a0;
            max-width: 650px;
            margin-bottom: 3.5rem;
            font-weight: 300;
            animation: fadeInUp 1s ease-out 0.3s forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        /* Buttons */
        .btn-container {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
            animation: fadeInUp 1s ease-out 0.6s forwards;
            opacity: 0;
        }

        .btn {
            position: relative;
            display: inline-block;
            padding: 16px 35px;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 2px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 700;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid rgba(3, 233, 244, 0.3);
            border-radius: 50px;
            background: rgba(3, 233, 244, 0.05);
            backdrop-filter: blur(5px);
        }

        .btn:hover {
            color: #000;
            background: var(--secondary);
            box-shadow: 0 0 15px var(--secondary), 0 0 30px var(--secondary);
            transform: translateY(-5px);
        }

        .btn-pink {
            color: var(--primary);
            border: 1px solid rgba(246, 0, 255, 0.3);
            background: rgba(246, 0, 255, 0.05);
        }

        .btn-pink:hover {
            background: var(--primary);
            box-shadow: 0 0 15px var(--primary), 0 0 30px var(--primary);
            color: #fff;
        }

        /* Features */
        .features {
            padding: 6rem 2rem;
            background: #0a0a0a;
            position: relative;
            z-index: 1;
        }

        .features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.1), transparent);
        }

        .features h2 {
            font-size: 2.8rem;
            margin-bottom: 4rem;
            text-align: center;
            font-weight: 700;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            padding: 2.5rem;
            border-radius: 20px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background: var(--primary);
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            border-color: rgba(246, 0, 255, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }

        .card:hover::before {
            opacity: 0.5;
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .card h3 {
            color: #fff;
            margin-bottom: 1rem;
            font-size: 1.4rem;
        }

        .card p {
            color: #999;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            padding: 3rem;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.05);
            color: #666;
            font-size: 0.9rem;
        }

        /* Floating particles */
        .particle {
            position: absolute;
            background: #fff;
            border-radius: 50%;
            opacity: 0.3;
            animation: float 10s infinite linear;
            pointer-events: none;
            z-index: 0;
        }

        /* Animations */
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); opacity: 0; }
            20% { opacity: 0.8; }
            80% { opacity: 0.8; }
            100% { transform: translateY(-100vh) rotate(360deg); opacity: 0; }
        }

        @keyframes fadeInDown {
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            h1 { font-size: 2.8rem; }
            .hero { padding: 1rem; min-height: 80vh; }
            p.subtitle { font-size: 1.1rem; }
            .btn-container { flex-direction: column; gap: 1.5rem; width: 100%; max-width: 300px; margin: 0 auto; }
            .btn { width: 100%; text-align: center; }
            .logo { font-size: 2rem; }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo">Mis 15 Fest</div>
    </header>

    <section class="hero">
        <h1>Tu Invitación<br>Digital Perfecta</h1>
        <p class="subtitle">Sorprendé a todos con una experiencia interactiva y totalmente personalizada. Envíá tu diseño exclusivo por WhatsApp a tus invitados y preparate para brillar.</p>
        
        <div class="btn-container" style="display: none;">
            <a href="keila" class="btn btn-pink">
                Ver Demo Keila
            </a>
            <a href="mile" class="btn">
                Ver Demo Mile
            </a>
        </div>
    </section>

    <section class="features">
        <h2>¿Qué incluyen nuestras invitaciones?</h2>
        <div class="grid">
            <div class="card">
                <div class="card-icon">🎶</div>
                <h3>Música de Fondo</h3>
                <p>Elegí la canción que más te identifique para que acompañe el diseño mientras navegan por la tarjeta.</p>
            </div>
            <div class="card">
                <div class="card-icon">📍</div>
                <h3>Ubicación Maps</h3>
                <p>Integración directa con Google Maps para que nadie se pierda y todos lleguen a la fiesta fácilmente.</p>
            </div>
            <div class="card">
                <div class="card-icon">⏳</div>
                <h3>Cuenta Regresiva</h3>
                <p>Generá expectativa mostrando de forma dinámica los días, horas, minutos y segundos que faltan para tu gran noche.</p>
            </div>
            <div class="card">
                <div class="card-icon">📩</div>
                <h3>Confirmación (RSVP)</h3>
                <p>Botón interactivo para que recibas las confirmaciones de asistencia directamente en tu WhatsApp de manera organizada.</p>
            </div>
            <div class="card">
                <div class="card-icon">🎁</div>
                <h3>Opción de Regalos</h3>
                <p>Agregá la opción de cuenta bancaria o alias de MercadoPago de forma elegante para los invitados que prefieran esta opción.</p>
            </div>
            <div class="card">
                <div class="card-icon">📸</div>
                <h3>Vestimenta (Dress Code)</h3>
                <p>Detallá el código de vestimenta con íconos para que todos sepan cómo asistir a tu celebración de ensueño.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 Mis 15 Fest. Todos los derechos reservados.</p>
    </footer>

    <script>
        // Sistema de partículas de fondo dinámicas
        document.addEventListener('DOMContentLoaded', () => {
            const heroSection = document.querySelector('.hero');
            const colors = ['#f600ff', '#03e9f4', '#ffffff'];
            
            for(let i = 0; i < 25; i++) {
                let particle = document.createElement('div');
                particle.className = 'particle';
                
                // Configuración aleatoria
                let size = Math.random() * 4 + 1;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = (Math.random() * 100 + 10) + 'vh';
                
                // Efecto neon en las particulas
                let color = colors[Math.floor(Math.random() * colors.length)];
                particle.style.backgroundColor = color;
                particle.style.boxShadow = `0 0 ${size * 2}px ${color}`;
                
                // Animación
                particle.style.animationDuration = (Math.random() * 15 + 8) + 's';
                particle.style.animationDelay = (Math.random() * 5) + 's';
                
                heroSection.appendChild(particle);
            }
        });
    </script>
</body>
</html>
