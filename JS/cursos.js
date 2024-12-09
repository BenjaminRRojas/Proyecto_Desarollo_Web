document.addEventListener('DOMContentLoaded', () => {
    const li = document.querySelectorAll('.nav-item .nav-link'); // Selecciona todos los enlaces dentro de los elementos .nav-item
    const bloque = document.querySelectorAll('.bloque'); // Selecciona todos los bloques
    const dataTargets = document.querySelectorAll('.nav-link'); // Los enlaces de las pestañas

    // Recorriendo todos los li
    dataTargets.forEach((cadaLi, i) => {
        // Asignando un click a cada li
        cadaLi.addEventListener('click', (e) => {
            e.preventDefault(); // Evita el comportamiento predeterminado del enlace

            // Quitando la clase "activo" a todos los li y bloques
            li.forEach((cadaLi, i) => {
                cadaLi.classList.remove('active'); // Clase de Bootstrap activa
            });
            bloque.forEach((cadaBloque) => {
                cadaBloque.classList.remove('activo');
            });

            // Añadiendo la clase "activo" al li y bloque correspondientes
            cadaLi.classList.add('active');
            const targetClass = cadaLi.getAttribute('data-target');
            const targetBlock = document.querySelector(`.bloque.${targetClass}`);
            targetBlock.classList.add('activo');
        });
    });
});
