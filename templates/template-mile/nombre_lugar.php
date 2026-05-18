<!-- test @borrar -->
<style type="text/css">

.animated-element {
    opacity: 0; /* Comienza invisible */
    transform: translateY(50px); /* Se inicia un poco abajo */
    transition: opacity 0.10s ease, transform 0.10s ease; /* Transiciones suaves */
}
</style>

<div  id="animate" class="container scroll-container animated-element" style="margin-top: 10rem;">
    <div class="card mt-5 text-center b-none" style="background: none; border: none; color: #fff">
        <div class="card-header b-none"><!-- animate animated-element -->
            <h2 class="font-keyla-cursiva">Salón del Evento</h2>
        </div>
        <div class="card-body b-none">
            <h5 class="card-title">Eventos 5699 Midnights</h5>
            <p class="card-text">Isidro Casanova, Provincia de Buenos Aires</p>
        </div>
    </div>
</div>

<script async>
    // script.js
    window.addEventListener('scroll', () => {
        const animate = document.getElementById('animate');
        const position = animate.getBoundingClientRect().top; // Obtiene la posición del elemento

        // Verifica si el elemento está visible en la ventana
        if (position < window.innerHeight) {
            animate.style.opacity = 1; // Hace visible el elemento
            animate.style.transform = 'translate(0)'; // Lo mueve a su posición original
        } 
    });

</script>