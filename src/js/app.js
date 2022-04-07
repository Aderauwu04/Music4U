const main = document.getElementById('idMain')

function cambiarSeccion(seccion) {
  return !seccion ? main.classList.add('mover') : main.classList.remove('mover')
}