"use strict";
// ----------------------------
// Mixins
// ----------------------------
function Innovation(Base) {
    return class extends Base {
        innovate() {
            return "Carlos desarrolla innovaciones tecnológicas 🚀";
        }
        create() {
            return "Carlos crea soluciones disruptivas ✨";
        }
    };
}
function Leadership(Base) {
    return class extends Base {
        lead() {
            return "Carlos lidera proyectos como Elon Musk 🦅";
        }
        inspire() {
            return "Carlos inspira a su equipo 💡";
        }
    };
}
function Entrepreneurship(Base) {
    return class extends Base {
        buildCompany() {
            return "Carlos construye empresas como Tesla y SpaceX 🏢";
        }
    };
}
// ----------------------------
// Clase base
// ----------------------------
class CarlosBase {
    constructor(name, favoritePerson) {
        this.name = name;
        this.favoritePerson = favoritePerson;
    }
}
// ----------------------------
// Clase final con mixins
// ----------------------------
class Carlos extends Entrepreneurship(Leadership(Innovation(CarlosBase))) {
}
// ----------------------------
// IMPRIMIR EN PAGINA HTML
// ----------------------------
const output = document.getElementById("output16");
if (output) {
    const carlos = new Carlos("Carlos", "Elon Musk");
    const messages = [
        carlos.innovate(),
        carlos.create(),
        carlos.lead(),
        carlos.inspire(),
        carlos.buildCompany()
    ];
    output.innerHTML = `
    <h2>${carlos.name} — Admirador de ${carlos.favoritePerson}</h2>
    <ul>
      ${messages.map(msg => `<li>${msg}</li>`).join("")}
    </ul>
  `;
}
