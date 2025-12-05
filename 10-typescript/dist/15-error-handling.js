"use strict";
const output15 = document.getElementById('output15');
const input = document.querySelector('input');
function validateAge(age) {
    if (age < 18)
        throw new Error('Eres demasiado joven para trabajar en Tesla');
    if (output15) {
        output15.innerHTML = `<h2>¡Perfecto! Carlos, puedes trabajar en las empresas de Elon Musk</h2>`;
    }
}
if (input && output15) {
    input.addEventListener('input', e => {
        try {
            validateAge(Number(input.value));
        }
        catch (error) {
            output15.innerHTML = `<h2 class='text-red-400 text-sm'>No cumples la edad requerida para trabajar en las empresas de Elon Musk (mínimo 18 años)</h2>`;
        }
    });
}
