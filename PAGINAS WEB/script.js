
    let currentAngle = 0; // Ángulo inicial de rotación
    const theta = 72; // Ángulo de rotación entre cada imagen

    const carousel = document.querySelector('.carousel');
    const carouselItems = document.querySelectorAll('.carousel-item');

    function rotateCarousel() {
        carousel.style.transform = `rotateY(${currentAngle}deg)`;
    }

    function prevSlide() {
        currentAngle += theta;
        rotateCarousel();
    }

    function nextSlide() {
        currentAngle -= theta;
        rotateCarousel();
    }

    // Asignar eventos a los botones de control
    document.querySelector('.prev').addEventListener('click', prevSlide);
    document.querySelector('.next').addEventListener('click', nextSlide);

    // Iniciar el carrusel con la rotación inicial
    rotateCarousel();
