// --- Class Decorator: añade metadata a la clase ---
function Info(message: string) {
    return function (constructor: Function) {
        constructor.prototype.meta = message;
    };
}

// --- Method Decorator: imprime cuando se llama un método ---
function Log(
    target: any,
    propertyKey: string,
    descriptor: PropertyDescriptor
) {
    const originalMethod = descriptor.value;

    descriptor.value = function (...args: any[]) {
        console.log(`Método llamado: ${propertyKey}`);
        return originalMethod.apply(this, args);
    };

    return descriptor;
}

// --- Clase usando los decoradores ---
@Info("Esta es una clase decorada con metadata")
class PersonDecorated {
    name: string;
    favoritePerson: string;

    constructor(name: string, favoritePerson: string) {
        this.name = name;
        this.favoritePerson = favoritePerson;
    }

    @Log
    greet() {
        return `Hola, soy ${this.name} y me gusta ${this.favoritePerson}`;
    }
}

// Crear instancia
const personDecorated = new PersonDecorated("Carlos", "Elon Musk");
const greetMessage = personDecorated.greet();

// Obtener metadata desde prototype
const classMeta = (personDecorated as any).meta;

// Mostrar en HTML
const output08 = document.getElementById("output08");

if (output08) {
    output08.innerHTML = `
        <li><strong>Class Decorator:</strong> ${classMeta}</li>
        <li><strong>Method Decorator:</strong> Resultado greet() → ${greetMessage}</li>
    `;
}