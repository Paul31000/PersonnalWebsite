
const slider = document.querySelector('.scroll-container');


slider.addEventListener('wheel', (e) => {
    e.preventDefault();
    const slides = slider.querySelectorAll('.slide');
    const width = slider.clientWidth;

    const current = Math.round(slider.scrollLeft / width);

    let next = current + (e.deltaY > 0 ? 1 : -1);

    // Boucle infinie
    if (next >= slides.length) next = 0;
    if (next < 0) next = slides.length - 1;

    slider.scrollTo({
        left: next * width,
        behavior: 'smooth'
    });
}, { passive: false });