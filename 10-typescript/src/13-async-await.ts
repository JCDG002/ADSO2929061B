const output13 = document.getElementById('output13');

interface UserData {
  id: number;
  name: string;
  username: string;
  email: string;
  phone: string;
  website : string;
}

async function getPerson(): Promise<UserData> {
    const res = await fetch("https://jsonplaceholder.typicode.com/users/1");

    const data: UserData = await res.json();

    return data;
}

if(output13){
    getPerson().then(u => {
        let userData = u;
        // Simulamos datos de Carlos que le gusta Elon Musk
        userData.name = "Carlos";
        userData.username = "carlos_musk_fan";
        userData.email = "carlos@example.com";
        console.log(u)
        for(let k in userData){
                let key = k as keyof typeof userData;
                output13.innerHTML += `<li><strong>${key}:</strong> ${userData[key]}</li>`
        }
    })
}