// let currentIndex = 0;
// const slides = document.querySelectorAll('.slides img');
// const totalSlides = slides.length;

// function showSlide(index) {
//     slides.forEach((slide, i) => {
//         slide.style.transform = `translateX(-${index * 100}%)`;
//     });
// }

// function nextSlide() {
//     currentIndex = (currentIndex + 1) % totalSlides;
//     showSlide(currentIndex);
// }

// function prevSlide() {
//     currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
//     showSlide(currentIndex);
// }

// showSlide(currentIndex);

document.querySelectorAll('#myTable tr').forEach(row => {
row.addEventListener('click', function() {
    const index = parseInt(this.dataset.index);
    const slideWidth = document.querySelector('.slider').offsetWidth;
    const slides = document.querySelector('.slides');
    slides.style.transform = `translateX(-${(index - 1) * slideWidth}px)`;
});
});



