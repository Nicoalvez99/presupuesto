
const ctxm = document.getElementById('myChart');

let enero = parseInt(document.getElementById('enero').textContent);
let febrero = parseInt(document.getElementById('febrero').textContent);
let marzo = parseInt(document.getElementById('marzo').textContent);
let abril = parseInt(document.getElementById('abril').textContent);
let mayo = parseInt(document.getElementById('mayo').textContent);
let junio = parseInt(document.getElementById('junio').textContent);
let julio = parseInt(document.getElementById('julio').textContent);
let agosto = parseInt(document.getElementById('agosto').textContent);
let septiembre = parseInt(document.getElementById('septiembre').textContent);
let octubre = parseInt(document.getElementById('octubre').textContent);
let noviembre = parseInt(document.getElementById('noviembre').textContent);
let diciembre = parseInt(document.getElementById('diciembre').textContent);

new Chart(ctxm, {
    type: 'bar',
    data: {
        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        datasets: [{
            label: '# Gastos por mes',
            data: [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
