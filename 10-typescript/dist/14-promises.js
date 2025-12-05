"use strict";
// Simulamos datos de empresas de Elon Musk
function getElonCompany(company) {
    return new Promise((resolve) => {
        setTimeout(() => {
            const companies = {
                'tesla': { id: 1, name: 'Tesla' },
                'spacex': { id: 2, name: 'SpaceX' },
                'neuralink': { id: 3, name: 'Neuralink' }
            };
            resolve(companies[company.toLowerCase()] || { id: 0, name: 'Unknown' });
        }, 100);
    });
}
const output14 = document.getElementById('output14');
if (output14) {
    getElonCompany('tesla')
        .then(data => {
        let elonCompanyData = data;
        output14.innerHTML += `<li class='badge badge-primary text-xl p-4'>${elonCompanyData.name} <span class='badge badge-info text-white'>ID: ${elonCompanyData.id}</span></li>
                                `;
    });
    getElonCompany('spacex')
        .then(data => {
        let elonCompanyData = data;
        output14.innerHTML += `<li class='badge badge-primary text-xl p-4'>${elonCompanyData.name} <span class='badge badge-info text-white'>ID: ${elonCompanyData.id}</span></li>
                                `;
    });
    getElonCompany('neuralink')
        .then(data => {
        let elonCompanyData = data;
        output14.innerHTML += `<li class='badge badge-primary text-xl p-4'>${elonCompanyData.name} <span class='badge badge-info text-white'>ID: ${elonCompanyData.id}</span></li>
                                `;
    });
}
