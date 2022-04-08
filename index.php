<?php
  session_start();
  $u = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/styles/main.css">
  <link rel="shortcut icon" href="src/img/logo.png">
  <script src="https://kit.fontawesome.com/4100dbb1b5.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&family=Quicksand&display=swap" rel="stylesheet">
  <title>Music 4 U</title>
</head>
<body>
  <nav>
    <div class="logo">
      <img src="src/img/logo.png" class="wh-100">
    </div>
    <input type="checkbox" id="btnNav">
    <ul class="lista-nav">
      <li onclick="cambiarSeccion(true), cambiarVista('inicio')">
        Inicio
      </li>
      <?php
      if ($u) {
        echo '
        <li onclick="irA(`Artistas`), cambiarVista(`musica`)">
          Artistas destacados
        </li>
        <li onclick="irA(`Recientes`), cambiarVista(`musica`)">
          Recientes
        </li>
        <li onclick="irA(`TH`)">
          Top Hits
        </li>
        <li onclick="irA(`Canciones`), cambiarVista(`musica`)">
          Canciones
        </li>';
      }
      ?>
      <li onclick="cambiarSeccion(), cambiarVista('inicio')">
        Acerca de nosotros
      </li>
      <?php
        if ($u) {
          echo '
          <li>
            <button class="btn-primario" onclick="cerrarSesion()">
              Cerrar sesión
            </button>
          </li>';
        } else {
          echo '
          <li>
            <button class="btn-primario" onclick="cambiarVista(`login`)">
              Iniciar sesión
            </button>
          </li>';
        }
      ?>
    </ul>
    <label for="btnNav"><i class="fa-solid fa-bars"></i></label>
  </nav>
  <section id="main" class="main">
    <header>
      <h1>Music 4 U</h1>
      <p>Consigue tu música favorita y haste a conocer, Music 4 U para ti siempre que respires</p>
    </header>
    <div class="contenedor-slide">
      <div id="idMain" class="animacion-contenedor">
        <div id="idInicio" class="contenedor-main">
          <div class="img-main">
            <img src="src/img/main.jpg" class="wh-100">
          </div>
          <div class="texto-main">
            <?php
            if ($u) {
              echo '
              <h2>¡Bienvenido!</h2>
              <p>Comienza a relajarte y escucha la música que mas te gusta</p>
              <button class="btn-secundario" onclick="cambiarVista(`musica`)">
                Ir
              </button>
              ';
            } else {
              echo '
              <h2>Únete a la onda</h2>
              <p>Registrate para conocer los beneficios de los artistas que tiene Music 4U</p>
              <button class="btn-secundario" onclick="cambiarVista(`landing`)">
                Registrate
              </button>
              ';
            }
            ?>
          </div>
        </div>
        <div id="idNosotros" class="contenedor-main">
          <div class="texto-main">
            <h2>Nosotros</h2>
            <p>Music4U@gmail.com</p>
            <p>+58-4247528433</p>
          </div>
          <div class="img-main">
            <img src="src/img/nosotros.jpg" class="wh-100">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="landing" class="landing d-none">
    <h2>Únete a la onda</h2>
    <p>Registrate para conocer los beneficios de los artistas que tiene Music 4U</p>
    <div class="basic-form">
      <div class="img-landing">
        <img src="src/img/landing-img.jpg" class="wh-100">
      </div>
      <form action="database/registro.php" id="registrarse" method="post" enctype="multipart/form-data">
        <div class="input">
          <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" class="wh-100" required>
          <label for="nombre">Tu nombre</label>
        </div>
        <div class="input">
          <input type="text" id="usuario" name="usuario" placeholder="Usuario" class="wh-100" required>
          <label for="usuario">Usuario</label>
        </div>
        <div class="input">
          <input type="text" id="password" name="password" placeholder="Contraseña" class="wh-100" required>
          <label for="password">Contraseña</label>
        </div>
        <div class="input">
          <input type="file" id="imgUser" name="imgUser" class="wh-100" required>
          <label for="imgUser">Agrega tu imagen de artista</label>
        </div>
        <button onclick="registrarse()" class="btn-secundario">Registrarse</button>
      </form>
    </div>
    <div class="contenedor-2 beneficio">
      <div>
        <i class="fa-solid fa-circle-play"></i>
        <p>¡Escucharas la tendencia!<p>
      </div>
      <div>
        <i class="fa-solid fa-file-audio"></i>
        <p>Podrás publicar tus mejores canciones<p>
      </div>
      <div>
        <i class="fa-solid fa-icons"></i>
        <p>Estarás al dia con la música<p>
      </div>
      <div>
        <i class="fa-solid fa-headphones-simple"></i>
        <p>Escucha siempre un top hit canciones actualizado<p>
      </div>
    </div>
    <div class="contenedor-2 social">
      <div>
        <div class="img-social">
          <img src="src/img/artista1.png" class="wh-100">
        </div>
        <p>Remi Wolf</p>
        <p></p>
      </div>
      <div>
        <div class="img-social">
          <img src="src/img/artista2.png" class="wh-100">
        </div>
        <p>Rav the rapper</p>
        <p></p>
      </div>
    </div>
  </section>
  <section id="login" class="login d-none">
    <h2>¿Ya estas registrado?</h2>
    <p>Entonces inicia sesión rápido y escucha la música que mas te gusta ¡Pasa un buen momento!</p>
    <form>
      <div class="input">
        <input type="text" id="usuarioIniciar" placeholder="Usuario" class="wh-100" required>
        <label for="usuario">Usuario</label>
      </div>
      <div class="input">
        <input type="text" id="passwordIniciar" placeholder="Contraseña" class="wh-100" required>
        <label for="password">Contraseña</label>
      </div>
      <button onclick="iniciarSesion()" class="btn-secundario">Iniciar sesión</button>
    </form>
    <p>Si no estas registrado... ¡ven aquí!</p>
    <button class="btn-primario">Registrarse</button>
  </section>
  <section id="musica" class="musica d-none">
    <div>
      <h3>Artistas destacados</h3>
      <div id="idArtDes" class="contenedor-3"></div>
    </div>
    <div>
      <h3>Recientes</h3>
      <div id="idRec" class="contenedor-3"></div>
    </div>
    <div>
      <h3>Top Hit</h3>
      <div id="idTpH" class="contenedor-3"></div>
    </div>
    <div>
      <h3>Todas las canciones</h3>
      <div id="idTcanciones" class="contenedor-3"></div>
    </div>
  </section>
  <footer>
    <div class="logo-secundario">
      <img src="src/img/logo-secundario.png" class="wh-100">
    </div>
    <ul class="lista-footer">
      <li onclick="cambiarSeccion(true)">
        Inicio
      </li>
      <li onclick="cambiarSeccion()">
        Acerca de nosotros
      </li>
      <li>
        <a href="">Política de privacidad</a>
      </li>
      <li>
        <a href="">Términos y condiciones</a>
      </li>
      <li>
        <p>
          <a href="">@2022 Designed by Aderitauwu04 | Derechos reservados</a>
        </p>
      </li>
    </ul>
  </footer>
  <input type="checkbox" id="btnAgregar">
  <div class="basic-form cancion">
    <form action="database/canciones.php" id="canciones" method="post" enctype="multipart/form-data">
      <h2>Agrega una canción tuya</h2>
      <div class="input">
        <input type="text" id="idTitulo" class="wh-100" name="idTitulo" placeholder="Titulo" required>
        <label for="idTitulo">Titulo</label>
      </div>
      <div class="input">
        <input type="text" id="idGenero" class="wh-100" name="idGenero" placeholder="Genero" required>
        <label for="idGenero">Genero</label>
      </div>
      <div class="input">
        <input type="file" id="idCancion" name="idCancion" class="wh-100" required>
        <label for="idCancion">Subir canción</label>
      </div>
      <button onclick="subirCancion()" class="btn-secundario">Publicar canción</button>
    </form>
  </div>
  <?php
    if ($u) {
      echo '
      <label class="btn-agregar" for="btnAgregar"><i class="fa-solid fa-plus"></i></label>';
    }
  ?>
</body>
<script src="https://code.jquery.com/jquery.js"></script>
<script src="src/js/app.js"></script>
</html>