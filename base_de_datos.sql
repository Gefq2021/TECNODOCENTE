-- Crear la base de datos si no existe
CREATE DATABASE IF NOT EXISTS tecno_docente;

-- Usar la base de datos
USE tecno_docente;

-- Verificar si la tabla 'usuarios' existe, y si no, crearla
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    usuario VARCHAR(100) NOT NULL,
    contrasenia VARCHAR(255) NOT NULL
);

-- Verificar si la tabla 'cursos' existe, y si no, crearla
CREATE TABLE IF NOT EXISTS cursos (
    id_curso INT AUTO_INCREMENT PRIMARY KEY,    -- ID único para cada curso
    categoria_curso VARCHAR(255) NOT NULL,          -- Nombre del curso (no nulo)
    titulo_curso VARCHAR(255) NOT NULL,          -- Nombre del curso (no nulo)
    descripcion_1 TEXT,                            -- Descripción del curso
    descripcion_2 TEXT,                            -- Descripción del curso
    duracion VARCHAR(100),                       -- Duración del curso (por ejemplo: "3 semanas", "30 horas")
    precio DECIMAL(10, 2),                       -- Precio del curso (hasta 2 decimales)
    imagen_1 VARCHAR(255) NOT NULL,          -- Ruta de la imagen del curso
    imagen_2 VARCHAR(255) NOT NULL,          -- Ruta de la imagen del curso
    video VARCHAR(700) NOT NULL          -- Ruta del video del curso
);

-- Crear la tabla de inscripciones si no existe
CREATE TABLE IF NOT EXISTS inscripciones (
    id_inscripcion INT AUTO_INCREMENT PRIMARY KEY,   -- ID único para cada inscripción
    id_usuario INT NOT NULL,                         -- ID del usuario que se inscribe
    id_curso INT NOT NULL,                           -- ID del curso al que se inscribe
    fecha_inscripcion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Fecha de inscripción (automática)
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,  -- Relación con la tabla usuarios
    FOREIGN KEY (id_curso) REFERENCES cursos(id_curso) ON DELETE CASCADE -- Relación con la tabla cursos
);

-- Crear la tabla de pagos
CREATE TABLE IF NOT EXISTS pagos (
    id_pago INT AUTO_INCREMENT PRIMARY KEY,           -- ID único para cada pago
    id_inscripcion INT NOT NULL,                      -- ID de la inscripción
    forma_pago VARCHAR(50) NOT NULL,                  -- Forma de pago (por ejemplo: "tarjeta", "efectivo", "paypal")
    monto DECIMAL(10, 2) NOT NULL,                    -- Monto pagado
    fecha_pago TIMESTAMP DEFAULT CURRENT_TIMESTAMP,   -- Fecha del pago
    FOREIGN KEY (id_inscripcion) REFERENCES inscripciones(id_inscripcion) ON DELETE CASCADE  -- Relación con la tabla inscripciones
);



-- Insertamos valores en la tabla cursos (si no existen)
INSERT INTO cursos (categoria_curso, titulo_curso, descripcion_1, descripcion_2, duracion, precio, imagen_1, imagen_2, video)
VALUES
('canva', 'Curso de Canva - Nivel 1: Principiante', 
 'Este curso está diseñado para enseñarte a usar Canva desde lo más básico. Aprenderás a crear diseños sencillos para redes sociales, presentaciones y más.',
 'En este curso cubriremos todas las herramientas esenciales de Canva, desde las plantillas prediseñadas hasta la personalización completa de cada elemento visual. Verás cómo crear diseños llamativos para publicaciones en redes sociales, carteles, invitaciones, infografías, y mucho más. Te enseñaremos a combinar imágenes, textos, y formas de manera creativa, para que puedas producir contenido profesional incluso sin experiencia previa en diseño gráfico. Además, aprenderás cómo exportar tus diseños en distintos formatos para usarlos en cualquier plataforma o medio.', 
 '6 semanas', 45000, './img/CANVA.png', './img/canva-docentes.jpg', '<iframe width="560" height="315" src="https://www.youtube.com/embed/zNBgIoRyWCI?si=8WMUk560tSkgXv4O" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>'),

('genially', 'Curso de Genially - Nivel 1: Principiante', 
 'En este curso aprenderás a utilizar Genially, una herramienta poderosa para crear presentaciones interactivas y contenido visual cautivador.',
 'A lo largo del curso, exploraremos todas las funcionalidades de Genially, incluyendo la creación de presentaciones interactivas, infografías, videos, y hasta gamificación. Aprenderás cómo agregar elementos interactivos como botones, enlaces, videos incrustados, y cómo diseñar un flujo de contenido que mantenga la atención de tu audiencia. Además, conocerás los secretos para personalizar plantillas, usar animaciones y transiciones, y cómo utilizar Genially de manera efectiva en un entorno educativo o profesional. Te enseñaremos a exportar tus creaciones en distintos formatos y a compartirlas en redes sociales o plataformas de presentación online.', 
 '4 semanas', 35000, './img/genia.jpg', './img/genially-docentes.jpg', '<iframe width="560" height="315" src="https://www.youtube.com/embed/SIYyOq_vEgw?si=pRT3t_ooj36jbm4B" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>'),

('powtoon', 'Curso de Powtoon - Nivel 1: Principiante', 
 'Este curso te introducirá a Powtoon, una plataforma de creación de videos animados. Aprenderás a crear presentaciones animadas y videos explicativos de manera sencilla.',
 'En este curso aprenderás cómo crear animaciones y videos profesionales utilizando las herramientas intuitivas de Powtoon. Verás cómo personalizar plantillas prediseñadas y agregar elementos visuales como texto animado, gráficos, personajes y música. Descubrirás cómo transformar tu contenido en una presentación atractiva y dinámica, ideal para mostrar ideas, productos o tutoriales. Además, aprenderás a ajustar la duración de las animaciones, cambiar transiciones, y cómo exportar tu proyecto a diferentes formatos para compartirlo fácilmente en redes sociales o plataformas de video. Al final, tendrás los conocimientos necesarios para crear tus propios videos animados de forma autónoma y profesional.', 
 '8 semanas', 51000, './img/powtoon.png', './img/powtoon-docentes.jpg', '<iframe width="560" height="315" src="https://www.youtube.com/embed/rETx5TDnCzc?si=aKOq4AELx-y46myQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>'),

('kahoot', 'Curso de Kahoot - Nivel 1: Principiante', 
 'Este curso te enseñará a crear cuestionarios interactivos y juegos educativos utilizando Kahoot, una herramienta muy popular en el ámbito educativo.',
 'En este curso aprenderás a crear cuestionarios y juegos interactivos utilizando Kahoot, una de las plataformas más utilizadas para motivar el aprendizaje de manera divertida. Verás cómo diseñar preguntas de opción múltiple, verdadero o falso, y cómo organizar tus juegos para que sean dinámicos y atractivos para los estudiantes. También aprenderás a agregar imágenes, videos y audios a tus preguntas para enriquecer la experiencia del usuario. A lo largo del curso, te enseñaremos a gestionar la puntuación en tiempo real, personalizar las opciones de presentación, y cómo usar la herramienta de análisis para evaluar el rendimiento de tus participantes. Kahoot es perfecto para clases, entrenamientos corporativos y actividades de grupo, y te proporcionaremos todas las claves para usarlo de manera efectiva.', 
 '6 semanas', 57000, './img/kat.png', './img/kahoot-docentes.jpg', '<iframe width="560" height="315" src="https://www.youtube.com/embed/AGFoVpJRyIg?si=floUH78YNTc9rWRt" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>');
