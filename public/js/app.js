let monto = document.getElementById('monto');
let montoOculto = document.getElementById('montoOculto');
let botonAgregar = document.getElementById('agregar');
let btnLoad = document.getElementById('btnLoad');

monto.addEventListener('click', () => {
    monto.style.display = "none";
    montoOculto.style.display = "block";
});

montoOculto.addEventListener('click', () => {
    monto.style.display = "block";
    montoOculto.style.display = "none";
});

botonAgregar.addEventListener('click', () => {
    botonAgregar.style.display = "none";
    btnLoad.style.display = "block";
});