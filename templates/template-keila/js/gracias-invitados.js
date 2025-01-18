// Array de nombres
// const nombres = ["Mamá y Papá", "Eitan", "Marce", "Ana", "Carlos", "Lucía"];
const nombres = ["A todos por estar!", "Gracias por haberme acompañado", "Gracias a mi Mamá y Papá", "Gracias a mis amigos y amigas", "Gracias a mi familia", "Gracias a los que colaboraron", "Gracias a Todos !"];

// Selección del elemento donde se mostrarán los nombres
const nombresElement = document.getElementById("invitados");

// Índice para recorrer los nombres
let index = 0;

// Función para mostrar nombres con opacidad dinámica
function mostrarNombre() {
  // Cambiar al nombre actual
  nombresElement.textContent = nombres[index];

  // Aumentar opacidad para que aparezca
  nombresElement.style.opacity = 1;

  // Después de 2 segundos, disminuir opacidad para que desaparezca
  setTimeout(() => {
    nombresElement.style.opacity = 0;

    // Cambiar al siguiente nombre en el array
    index = (index + 1) % nombres.length;

    // Llamar a la función de nuevo después de 2 segundos para completar el bucle
    setTimeout(mostrarNombre, 2000);
  }, 2000);
}

// Iniciar el bucle de animación
mostrarNombre();
