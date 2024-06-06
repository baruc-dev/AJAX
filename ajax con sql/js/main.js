const boton = document.getElementById('btn_cargar_usuarios');
const loader = document.getElementById('loader');
const url = 'php/usuarios.php';
const tabla = document.getElementById('tabla');
const hermano = document.getElementById('hermano');


document.addEventListener('DOMContentLoaded', function(){actualizarPedidos()});

setInterval(actualizarPedidos, 10000);


function actualizarPedidos()
{
    const peticion = new XMLHttpRequest();
    peticion.open('GET', url);
    peticion.send();

    loader.classList.add('active');

   

    peticion.onreadystatechange = () => {
        
        if(peticion.readyState == 4 && peticion.status == 200)
            {
                loader.classList.remove('active');
            }
        if(peticion.status == 404)
            {
                console.log('insertar alerta de error');
            }
    }

    peticion.onload = () => {inyectarJson(peticion.responseText)};
}

function inyectarJson(peticion)
{
    limpiarHTML();
    var personas = JSON.parse(peticion);
    
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

function limpiarHTML()
{
    while(tabla.firstChild)
        {
            tabla.removeChild(tabla.firstChild);
        }
}




