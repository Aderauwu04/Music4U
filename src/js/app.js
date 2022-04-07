const main = document.getElementById('idMain'), inicio = document.getElementById('idInicio'), nosotros = document.getElementById('idNosotros')

function cambiarSeccion(seccion) {
  return !seccion ? [main.classList.add('mover'), inicio.classList.add('ocultar')] : [main.classList.remove('mover'), inicio.classList.remove('ocultar')]
}