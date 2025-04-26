<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Centro de Acopio</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f8f9fb;
    }

    header {
      background: #fff;
      padding: 20px 50px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    header img {
      width: 40px;
      margin-right: 10px;
    }

    .logo {
      display: flex;
      align-items: center;
      font-weight: bold;
      font-size: 24px;
      color: #0a0a0a;
    }

    nav a {
      margin: 0 15px;
      text-decoration: none;
      color: #0a0a0a;
      font-weight: 500;
    }

    .boton-contacto {
      background: #124905;
      color: #fff;
      padding: 8px 16px;
      border-radius: 20px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }

    .boton-contacto:hover {
      background: #2a851b;
    }

    .contenido {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 80px 100px;
    }

    .contenido-texto {
      max-width: 50%;
    }

    .contenido-texto h1 {
      font-size: 48px;
      color: #1a1a1a;
    }

    .contenido-texto p {
      font-size: 18px;
      color: #555;
      margin: 20px 0;
    }

    .contenido-texto a {
      display: inline-block;
      margin-right: 20px;
      background: #124905;
      color: white;
      padding: 10px 20px;
      border-radius: 30px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }

    .contenido-texto a:hover {
      background: #2a851b;
    }

    .contenido-texto b {
      font-size: 20px;
      display: inline-block;
      color: #124905;
      text-decoration: none;
      font-weight: bold;
    }

    .contenedor-imagen {
      position: relative;
      width: 550px;
      height: 450px;
      border-radius: 25px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    /* Agregamos efecto de zoom */
    .contenedor-imagen img {
      width:100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: transform 0.5s ease;
    }

    .contenedor-imagen:hover img {
      transform: scale(1.1);
    }

    .hoja {
  position: fixed; /* Antes era absolute */
  top: -30px; /* Para que empiecen fuera de la vista */
  width: 60px;
  height: 40px;
  background-image: url('images/2h.png'); /* Imagen de hoja */
  background-size: cover;
  animation: caer 5s linear forwards; /* Un poco más lento */
  pointer-events: none;
  z-index: 9999; /* Asegura que estén encima de todo */
}

@keyframes caer {
  0% {
    transform: translateX(0) translateY(0) rotate(0deg);
    opacity: 1;
  }
  100% {
    transform: translateX(var(--desplazamiento-x, 100px)) translateY(100vh) rotate(var(--rotacion, 360deg));
    opacity: 0;
  }
}

  </style>
</head>
<body>

<header>
  <div class="logo">
    <img src="images/reciclaje.png" alt="Logo Reciclaje">
    Centro De Acopio
  </div>
  <nav>
    <a href="#">Inicio</a>
    <a href="#">Caracteristicas</a>
    <a href="#">Como Funciona </a>
    <a href="#" class="boton-contacto">Ventajas →</a>
  </nav>
</header>

<section class="contenido">
  <div class="contenido-texto">
    <h1>Bienvenido a Acopi</h1>
    <p>Un espacio dedicado a transformar materiales aprovechables en recursos valiosos para un futuro sostenible.</p>
    <a href="{{ route('login') }}">Ingresar</a>
    <b>Toca la imagen →</b>
  </div>
  <div class="contenedor-imagen" id="contenedorImagen">
    <img src="public/images/2.jpg" alt="Centro de Acopio">
  </div>
</section>

<script>
  const contenedor = document.getElementById('contenedorImagen');

  contenedor.addEventListener('mouseenter', () => {
    for (let i = 0; i < 10; i++) {
      crearHoja();
    }
  });

  function crearHoja() {
  const hoja = document.createElement('div');
  hoja.classList.add('hoja');
  hoja.style.left = Math.random() * window.innerWidth + "px";
  
  // Animación personalizada para cada hoja
  const desplazamientoX = Math.random() * 200 - 100; // Oscila entre -100px y +100px
  const rotacion = Math.random() * 720 - 360; // Rota entre -360 y +360 grados
  hoja.style.animation = `caer 5s linear forwards`;
  hoja.style.setProperty('--desplazamiento-x', desplazamientoX + 'px');
  hoja.style.setProperty('--rotacion', rotacion + 'deg');

  document.body.appendChild(hoja);

  setTimeout(() => {
    hoja.remove();
  }, 5000);
}

</script>


</body>
</html>
