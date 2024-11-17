<style>
    #miDiv {
        width: 100%;
        height: 00px;
        background-color: #3498db;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5em;
        transition: opacity 0.5s;
    }
</style>

<div id="miDiv" class="conteiner text-center mt-5 mb-5 latido">
    <p class="card-text hs-hover" style="font-size: 1.3rem;"><span style="color: #fff">▲ Deslizar ▲</span></p>
</div>

<script>
    const miDiv = document.getElementById("miDiv");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) { // Puedes ajustar el valor de 50 para cambiar la sensibilidad.
            miDiv.style.opacity = "0"; // Oculta el div con una transición de opacidad.
        } else {
            miDiv.style.opacity = "1"; // Muestra el div nuevamente si vuelves hacia arriba.
        }
    });
</script>