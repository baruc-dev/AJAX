
const url = 'https://api.npoint.io/b48a05858bbf201e8fb7';
fetch(url)
.then(respuesta=> respuesta.json())
.then(resultado => console.log(resultado));