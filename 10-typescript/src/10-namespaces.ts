// --- Declaración del namespace ---
namespace Tools {

    // Función dentro del namespace
    export function calcularArea(base: number, altura: number): number {
        return base * altura;
    }

    // Clase dentro del namespace
    export class Rectangle {
        constructor(public width: number, public height: number) {}

        area() {
            return `El área del rectángulo es: ${this.width * this.height}`;
        }
    }
    
    // Función para calcular proyectos de Elon Musk
    export function calcularProyectos(empresas: number, años: number): number {
        return empresas * años;
    }
}
// Clase Rectangle solo existe dentro del namespace Tools
// Usando el namespace
const area = Tools.calcularArea(5, 8);
const rect = new Tools.Rectangle(4, 10);
const proyectos = Tools.calcularProyectos(3, 10); // Tesla, SpaceX, Neuralink

// Mostrar en HTML
const output10 = document.getElementById("output10");

if (output10) {
    output10.innerHTML = `
        <li><strong>Namespace Function:</strong> Área calculada = ${area}</li>
        <li><strong>Namespace Class:</strong> ${rect.area()}</li>
        <li><strong>Proyectos de Elon Musk:</strong> ${proyectos} años de experiencia en ${proyectos / 10} empresas</li>
    `;
}
