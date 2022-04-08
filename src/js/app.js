const main = document.getElementById('idMain'), inicioInfo = document.getElementById('idInicio'), nosotros = document.getElementById('idNosotros')
function cambiarSeccion(seccion) {
  return !seccion ? [main.classList.add('mover'), inicioInfo.classList.add('ocultar')] : [main.classList.remove('mover'), inicioInfo.classList.remove('ocultar')]
}

const vistas = [
  {
    titulo: 'inicio',
    seccion: document.getElementById('main'),
  },
  {
    titulo: 'landing',
    seccion: document.getElementById('landing'),
  },
  {
    titulo: 'login',
    seccion: document.getElementById('login'),
  },
  {
    titulo: 'musica',
    seccion: document.getElementById('musica')
  }
]
function cambiarVista(vista) {
  vistas.forEach(vis => {
    if (vis.titulo === vista ) {
      vis.seccion.classList.remove('d-none')
    } else if (!vis.seccion.classList.contains('d-none')) {
      vis.seccion.classList.add('d-none')
    }
  });
}

const secciones = [
  {
    titulo: 'Artistas',
    seccion: document.getElementById('idArtDes')
  },
  {
    titulo: 'Recientes',
    seccion: document.getElementById('idRec')
  },
  {
    titulo: 'TH',
    seccion: document.getElementById('idTpH')
  },
  {
    titulo: 'Canciones',
    seccion: document.getElementById('idTcanciones')
  }
]
function irA(seccion) {
  secciones.forEach(secc => {
    if (secc.titulo === seccion) {
      secc.seccion.scrollIntoView({ block: "start", behavior: "smooth" });
    }
  });
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
    let listadoCanciones = ''
    let listadoTop = ''
    let listadoRecientes = ''
    let listadoArtistas = ''
    if (can.canciones.length) {
      can.canciones.forEach((can) => {
        listadoCanciones += `
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
      $('#idTcanciones').html(listadoCanciones);
    }
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

function cerrarSesion() {
  const data = {};
  $.post("database/cerrarSesion.php", data,
    function (response) {
      console.log(response)
    },
  );
  window.location.reload()
}