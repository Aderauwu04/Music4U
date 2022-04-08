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
const data = $('#insertar');
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
    if (can.canciones.length) {
      can.canciones.forEach((can) => {
        listadoCanciones += `<audio controls>
        <source src="${can.audio}" type="audio/mpEg"></audio>`
      });
      $('#canciones').html(listadoCanciones);
    }
  },
);
}