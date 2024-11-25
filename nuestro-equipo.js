// Datos de los integrantes del equipo
const integrantes = [
  {
    imagen: './img/DOCENTE1.jpeg',
    nombre: 'Julio César Burgos',
    descripcion: 'Soy profesor de informática especializado en Diseño Digital. Te enseño a usar herramientas digitales para crear contenido impactante en redes sociales, desde publicaciones atractivas, hasta historias y banners profesionales. "¡Diseña como un experto, sin experiencia previa!'
  },
  {
    imagen: './img/DOCENTE2.jpeg',
    nombre: 'Belinda Foronda',
    descripcion: 'Soy Profesora de Informática con experiencia en integrar herramientas digitales en la educación, ayudando a docentes a modernizar sus clases y hacerlas más interactivas. Domino Canva como una herramienta clave para el diseño educativo.Mi enfoque está en ofrecer capacitaciones claras, prácticas y adaptadas a las necesidades de cada docente, promoviendo el aprendizaje creativo y eficaz. Saludos cordiales'
  },
  {
    imagen: './img/DOCENTE3.jpeg',
    nombre: 'Juan Diaz',
    descripcion: 'Profesor de informática. Consultor de  informática para la educación. Asistente técnico de informática. Como docente me especializo en la aplicación de nuevas tecnologías  para la enseñanza. Los cursos de especialización a docentes se enmarcan dentro de las actividades que realizamos para docentes junto a otros especialistas. Esperamos que se unan a nuestra oferta educativa y estar preparados para el futuro. Éxitos!'
  },

  {
    imagen: './img/DOCENTE4.jpeg',
    nombre: 'Romina Vilte',
    descripcion: 'Profesora de Informática , apasionada por la integración de la tecnología en la educación y comprometida con la formación docente. Mi misión es empoderar a los educadores para que exploren y apliquen herramientas digitales innovadoras en sus aulas, transformando la enseñanza y el aprendizaje. En los cursos que ofrecemos, los docentes tienen la oportunidad de aprender a utilizar diversas plataformas para crear contenidos interactivos y atractivos para el desarrollo de sus clases.Estoy entusiasmada de acompañarte en este camino de innovación y crecimiento profesional. Juntos, podemos transformar la educación y adaptarla a los desafíos del siglo XXI. Saludos.'
  }
];

// Función para generar los integrantes dinámicamente
function generarIntegrantes() {
  const container = document.getElementById('integrantes-container');

  // Iteramos sobre el arreglo de integrantes y creamos los elementos correspondientes
  integrantes.forEach(integrante => {
    const divIntegrante = document.createElement('div');
    divIntegrante.classList.add('integrante'); // Añadimos la clase 'integrantes'

    // Creamos la imagen del integrante
    const divImagen = document.createElement('div');
    divImagen.classList.add('integrante-imagen');
    // const img = document.createElement('img');
    // img.src = integrante.imagen;
    // img.alt = integrante.nombre;
    // divImagen.appendChild(img);

    // Asignamos la imagen como fondo de la div
    divImagen.style.backgroundImage = `url(${integrante.imagen})`;
    divImagen.style.backgroundSize = 'cover'; // Asegura que la imagen cubra toda la div
    divImagen.style.backgroundPosition = 'center'; // Centra la imagen
    divImagen.style.height = '200px'; // Puedes ajustar la altura según lo que necesites
    divImagen.style.width = '100%'; // Esto hace que ocupe todo el ancho disponible

    // Creamos el nombre del integrante
    const nombre = document.createElement('p');
    nombre.classList.add('integrante-nombre');
    nombre.textContent = integrante.nombre;

    // Creamos la descripción del integrante
    const descripcion = document.createElement('p');
    descripcion.classList.add('integrante-descripcion');
    descripcion.textContent = integrante.descripcion;

    // Añadimos los elementos al div del integrante
    divIntegrante.appendChild(divImagen);
    divIntegrante.appendChild(nombre);
    divIntegrante.appendChild(descripcion);

    // Añadimos el div del integrante al contenedor principal
    container.appendChild(divIntegrante);
  });
}

// Llamamos a la función para generar los integrantes cuando la página cargue
window.onload = generarIntegrantes;
