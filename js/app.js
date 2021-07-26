'use strict';

const BUTTON_CUSTOMERS = document.getElementById('buttonCustomers')

const INPUT_CANT = document.getElementById('cantidad')
const INPUT_MODELO = document.getElementById('modelo')

const TOTAL_RESULT = document.getElementById('total_pedido')


/* BUTTON_CUSTOMERS.addEventListener('click', () => {
    let allCustomers = document.getElementById('allCustomers')
    let sellerCustomers = document.getElementById('sellerCustomers')
}) */

window.addEventListener('DOMContentLoaded', (event) => {
    updateTotal()
});
INPUT_CANT.addEventListener('change', updateTotal)
INPUT_MODELO.addEventListener('change', updateTotal)

let xhr = new XMLHttpRequest

function updateTotal() {

    xhr.onreadystatechange = () => {
        TOTAL_RESULT.innerHTML = xhr.responseText
    }
    let cantidad = INPUT_CANT.value
    let modelo = INPUT_MODELO.value
    let arg = `cantidad=${cantidad}&modelo=${modelo}`



    
    xhr.open('POST', 'includes/updatetotal.php', true)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
    xhr.send(arg)
}