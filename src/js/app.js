const main = document.getElementById('idMain'), inicio = document.getElementById('idInicio'), nosotros = document.getElementById('idNosotros')

function cambiarSeccion(seccion) {
  return !seccion ? [main.classList.add('mover'), inicio.classList.add('ocultar')] : [main.classList.remove('mover'), inicio.classList.remove('ocultar')]
}

// REGISTRARSE
function registrarse() {
  const data = $('#registrarse');
  $.post("database/registro.php", data,
    function (response) {
      console.log(response)
    });
}

// INICIAR SESIÓN
function iniciarSesion() {
  const data = {
    user: $('#usuarioIniciar').val(),
    pass: $('#passwordIniciar').val(),
  };
  $.post("database/login.php", data, function (response) {
    console.log(response)
  });
}

function subirCancion() {
const data = $('#canciones');
$.post("database/canciones.php", data,
  function (response) {
    console.log(response)
  },
);
}

obtenerCanciones();

function obtenerCanciones () {
$.get("database/verCanciones.php", function (response) {
  let can = JSON.parse(response)
    let listadoTop = ''
    let listadoRecientes = ''
    let listadoArtistas = ''
    if (can.top.length) {
      can.top.forEach((can) => {
        listadoTop += `
        <div>
          <div class="musica-info">
            <div class="img-artista">
              <img src="${can.img}" class="wh-100">
            </div>
            <div>
              <p>${can.nombre_can}</p>
              <p>${can.user} - ${can.genero}</p>
            </div>
          </div>
          <audio controls>
            <source src="${can.audio}" type="audio/mpeg">
          </audio>
        </div>`
      });
      $('#idTpH').html(listadoTop);
    }
    if (can.recientes.length) {
      can.recientes.forEach((can) => {
        listadoRecientes += `
        <div>
          <div class="musica-info">
            <div class="img-artista">
              <img src="${can.img}" class="wh-100">
            </div>
            <div>
              <p>${can.nombre_can}</p>
              <p>${can.user} - ${can.genero}</p>
            </div>
          </div>
          <audio controls>
            <source src="${can.audio}" type="audio/mpeg">
          </audio>
        </div>`
      })
      $('#idRec').html(listadoRecientes);
    }
    if (can.artistas.length) {
      can.artistas.forEach((can) => {
        listadoArtistas += `
        <div>
          <div class="img-artista">
            <img src="${can.img}" class="wh-100">
          </div>
          <p>${can.user}</p>
        </div>`
      })
      $('#idArtDes').html(listadoArtistas);
    }
  },
);
}