const main = document.getElementById('idMain')

function cambiarSeccion(seccion) {
  return !seccion ? main.classList.add('mover') : main.classList.remove('mover')
}

// REGISTRARSE
function registrarse() {
  const data = {
    nombre: $('#nombre').val(),
    user: $('#usuario').val(),
    pass: $('#password').val(),
  };
  $.post("database/registrarse.php", data,
    function (response) {
      console.log(response)
    });
}

// INICIAR SESIÓN
function login() {
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