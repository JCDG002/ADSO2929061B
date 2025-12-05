const output11 = document.getElementById('output11');

// Typeof guard
function show(value : string | number) : string | number{
    if(typeof value == 'string') {
        return 'Bienvenido: ' + value;
    }else {
        return value;
    }
}




// instanceof guard
class Animal {

    public  move(animal : Perro | Bird){
        if(animal instanceof Perro){
            return 'Camina';
        }
        if(animal instanceof Bird){
            return 'Vuela';
        }
        
    }
}

class Perro extends Animal {}
class Bird extends Animal {}

let perro = new Perro; 
let bird  = new Bird;


//Type predicated functions
interface TeslaCompany {
    powered : string
    latest : string
    suscription : 'Full Self Driving'

}

interface SpaceXCompany {
    powered : string
    latest : string
    suscription : 'Starlink'
}

function isSpaceXCompany(c : TeslaCompany | SpaceXCompany): c is SpaceXCompany {
    return (c as SpaceXCompany).suscription == 'Starlink';
} 

let teslaCompany : TeslaCompany = {
    powered : 'Electric',
    latest : 'Model Y',
    suscription : 'Full Self Driving'
}

let spacexCompany : SpaceXCompany = {
    powered : 'Rocket',
    'latest' : 'Starship',
    'suscription' : 'Starlink'
};

function renderCompany(company : SpaceXCompany | TeslaCompany):void {
    if(isSpaceXCompany(company)){
        if(output11){
            output11.innerHTML += `<div class="mb-6 p-4 bg-blue-50 rounded-lg border-l-4 border-blue-500">
                <h4 class="font-bold text-lg mb-3 text-blue-700">SpaceX Company Details</h4>
                <div class="grid grid-cols-1 gap-2">`;
            for(let k in company){
                const key = k as keyof typeof company;
                output11.innerHTML += `<div class="flex items-center gap-2"><span class='badge badge-primary badge-lg'>${key}</span><span class="text-gray-700">${company[key]}</span></div>`;
            }
            output11.innerHTML += `</div></div>`;
        }
    }
}

if(output11){
    output11.innerHTML = `
        <div class="space-y-6">
            <div class="p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                <h3 class='font-bold text-lg mb-3 text-green-700'>typeof Guard</h3>
                <div class="space-y-2">
                    <div class="flex items-center gap-3 p-2 bg-white rounded">
                        <span class='badge badge-success'>${typeof show('Carlos')}</span>
                        <span>${show('Carlos')}</span>
                    </div>
                    <div class="flex items-center gap-3 p-2 bg-white rounded">
                        <span class='badge badge-success'>${typeof show(28)}</span>
                        <span>Carlos tiene ${show(28)} años</span>
                    </div>
                </div>
            </div>
            
            <div class="p-4 bg-purple-50 rounded-lg border-l-4 border-purple-500">
                <h3 class='font-bold text-lg mb-3 text-purple-700'>instanceof Guard</h3>
                <div class="grid grid-cols-2 gap-3">
                    <div class="p-3 bg-white rounded shadow-sm">
                        <span class='badge badge-secondary mb-2 block'>Perro</span>
                        <span class="text-sm">Este animal: ${perro.move(perro)}</span>
                    </div>
                    <div class="p-3 bg-white rounded shadow-sm">
                        <span class='badge badge-secondary mb-2 block'>Pájaro</span>
                        <span class="text-sm">Este animal: ${bird.move(bird)}</span>
                    </div>
                </div>
            </div>
            
            <div class="p-4 bg-orange-50 rounded-lg border-l-4 border-orange-500">
                <h3 class='font-bold text-lg mb-3 text-orange-700'>Type Predicated / Type Assertion</h3>
            </div>
        </div>
    `;
    renderCompany(spacexCompany);
}

