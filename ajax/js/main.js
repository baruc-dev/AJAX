const boton = document.getElementById('btn_cargar_usuarios');
const loader = document.getElementById('loader');
const url = 'https://api.npoint.io/b48a05858bbf201e8fb7';
const tabla = document.getElementById('tabla');


boton.addEventListener('click', function(){

    const peticion = new XMLHttpRequest();
    peticion.open('GET', url);
    peticion.send();

    loader.classList.add('active');

    peticion.onload = function(){}

    peticion.onreadystatechange = () => {
        if(peticion.readyState == 4 && peticion.status == 200)
            {
                loader.classList.remove('active');
            }
    }

    peticion.onload = () => {inyectarJson(peticion.responseText)};
    
});


function inyectarJson(peticion)
{
    
    var personas = JSON.parse(peticion);
    console.log(personas);
    personas.forEach(persona => {
        const tr = document.createElement('TR');
        const td = document.createElement('td');
        td.textContent = persona._id;
        const td2 = document.createElement('td');
        td2.textContent = persona.name;
        const td3 = document.createElement('td');
        td3.textContent = persona.edad;
        const td4 = document.createElement('td');
        td4.textContent = persona.pais;
        const td5 = document.createElement('td');
        td5.textContent = persona.email;
        tr.appendChild(td);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tabla.appendChild(tr);

       
    });
}




