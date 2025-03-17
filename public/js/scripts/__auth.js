

const eye_icons = document.querySelector('#eye_icons');
const eye_show = document.querySelector('#eye_icons .eye_show');
const eye_hide = document.querySelector('#eye_icons .eye_hide');
const input = document.querySelector('#registrationForm #password');
if (eye_icons && typeof eye_icons !== "undefined")
{
    eye_show.addEventListener('click' , () => {
        eye_icons.classList.toggle('password_show');
        eye_icons.classList.toggle('password_hide');
        input.setAttribute('type', 'text');
    })

    eye_hide.addEventListener('click' , () => {
        eye_icons.classList.toggle('password_show');
        eye_icons.classList.toggle('password_hide');
        input.setAttribute('type', 'password');
    })
}

document.addEventListener('DOMContentLoaded', function () {
    // Carousel functionality
    const slides = document.querySelectorAll('.carousel-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    let currentSlide = 0;

    function showSlide(n) {
        // Hide all slides
        slides.forEach(slide => {
            slide.classList.remove('active');
        });

        // Remove active class from all dots
        dots.forEach(dot => {
            dot.classList.remove('active');
        });

        // Show the current slide and dot
        slides[n].classList.add('active');
        dots[n].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Add click events to dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
        });
    });

    // Auto-advance slides
    setInterval(nextSlide, 5000);
});
