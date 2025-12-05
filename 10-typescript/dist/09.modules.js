import { sumar } from './math.js';
const output9 = document.getElementById('output9');
// Simulamos datos de empresas de Elon Musk que Carlos admira
let teslaCompanies = Number(prompt('Carlos, ¿cuántas empresas de Tesla admiras? (ej: 3): ') || '3');
let spacexProjects = Number(prompt('¿Cuántos proyectos de SpaceX te interesan? (ej: 5): ') || '5');
let totalInterest = sumar(teslaCompanies, spacexProjects);
if (output9) {
    output9.innerHTML = `<li><strong>Empresas de Tesla que admiras:</strong> ${teslaCompanies}</li>
                        <li><strong>Proyectos de SpaceX que te interesan:</strong> ${spacexProjects}</li>
                        <li><strong>Total de intereses en empresas de Elon Musk:</strong> ${totalInterest}</li>`;
}
