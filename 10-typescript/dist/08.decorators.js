"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
// --- Class Decorator: añade metadata a la clase ---
function Info(message) {
    return function (constructor) {
        constructor.prototype.meta = message;
    };
}
// --- Method Decorator: imprime cuando se llama un método ---
function Log(target, propertyKey, descriptor) {
    const originalMethod = descriptor.value;
    descriptor.value = function (...args) {
        console.log(`Método llamado: ${propertyKey}`);
        return originalMethod.apply(this, args);
    };
    return descriptor;
}
// --- Clase usando los decoradores ---
let PersonDecorated = class PersonDecorated {
    constructor(name, favoritePerson) {
        this.name = name;
        this.favoritePerson = favoritePerson;
    }
    greet() {
        return `Hola, soy ${this.name} y me gusta ${this.favoritePerson}`;
    }
};
__decorate([
    Log
], PersonDecorated.prototype, "greet", null);
PersonDecorated = __decorate([
    Info("Esta es una clase decorada con metadata")
], PersonDecorated);
// Crear instancia
const personDecorated = new PersonDecorated("Carlos", "Elon Musk");
const greetMessage = personDecorated.greet();
// Obtener metadata desde prototype
const classMeta = personDecorated.meta;
// Mostrar en HTML
const output08 = document.getElementById("output08");
if (output08) {
    output08.innerHTML = `
        <li><strong>Class Decorator:</strong> ${classMeta}</li>
        <li><strong>Method Decorator:</strong> Resultado greet() → ${greetMessage}</li>
    `;
}
