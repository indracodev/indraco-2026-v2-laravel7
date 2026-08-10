document.addEventListener('DOMContentLoaded', () => {
   const section = document.querySelector('.product-slider-section');
   if (!section) return;

   const slides = section.querySelectorAll('.slide');
   const indicators = section.querySelectorAll('.indicator');
   const descEl = section.querySelector('.slider-description');
   const totalSlides = slides.length;
   let currentIndex = 0;

   // Autoplay Configuration
   const autoplay = true;
   const autoplayInterval = 4000; // 4 seconds
   let autoplayTimer;

   function showSlide(index) {
      if (totalSlides === 0) return;
      currentIndex = (index + totalSlides) % totalSlides;

      slides.forEach((slide, i) => {
         slide.classList.remove('active', 'prev', 'next', 'hidden-left', 'hidden-right');

         if (i === currentIndex) {
            slide.classList.add('active');
            // Update bottom description text with elegant fade
            if (descEl) {
               descEl.style.opacity = 0;
               setTimeout(() => {
                  descEl.textContent = slide.dataset.desc || '';
                  descEl.style.opacity = 1;
               }, 200);
            }
         } else if (i === (currentIndex - 1 + totalSlides) % totalSlides) {
            slide.classList.add('prev');
         } else if (i === (currentIndex + 1) % totalSlides) {
            slide.classList.add('next');
         } else {
            const diff = (i - currentIndex + totalSlides) % totalSlides;
            if (diff > 1 && diff <= totalSlides / 2) {
               slide.classList.add('hidden-right');
            } else {
               slide.classList.add('hidden-left');
            }
         }
      });

      // Update Pagination indicators
      indicators.forEach((ind, i) => {
         ind.classList.toggle('active', i === currentIndex);
      });
   }

   function nextSlide() {
      showSlide(currentIndex + 1);
   }

   function prevSlide() {
      showSlide(currentIndex - 1);
   }

   function startAutoplay() {
      if (autoplay && !autoplayTimer) {
         autoplayTimer = setInterval(nextSlide, autoplayInterval);
      }
   }

   function stopAutoplay() {
      if (autoplayTimer) {
         clearInterval(autoplayTimer);
         autoplayTimer = null;
      }
   }

   function resetAutoplay() {
      stopAutoplay();
      startAutoplay();
   }

   // Click Interactions on Side Slides
   slides.forEach((slide, i) => {
      slide.addEventListener('click', () => {
         if (slide.classList.contains('prev')) {
            prevSlide();
            resetAutoplay();
         } else if (slide.classList.contains('next')) {
            nextSlide();
            resetAutoplay();
         }
      });
   });

   // Dot Indicator Click Listeners
   indicators.forEach(ind => {
      ind.addEventListener('click', () => {
         const slideIndex = parseInt(ind.dataset.slide, 10);
         showSlide(slideIndex);
         resetAutoplay();
      });
   });

   // Prevent link navigation on inactive slides
   const productLinks = section.querySelectorAll('.product-image-wrapper');
   productLinks.forEach(link => {
      link.addEventListener('click', e => {
         const slide = link.closest('.slide');
         if (!slide || !slide.classList.contains('active')) {
            e.preventDefault();
         }
      });
   });

   // Keyboard Accessibility Navigation
   document.addEventListener('keydown', e => {
      if (e.key === 'ArrowLeft') {
         prevSlide();
         resetAutoplay();
      } else if (e.key === 'ArrowRight') {
         nextSlide();
         resetAutoplay();
      }
   });

   // Swipe/Touch Support for Mobile Responsiveness
   const sliderContainer = section.querySelector('.slider-container');
   if (sliderContainer) {
      let startX = 0;
      let endX = 0;
      const swipeThreshold = 55;

      sliderContainer.addEventListener('touchstart', e => {
         startX = e.touches[0].clientX;
      }, { passive: true });

      sliderContainer.addEventListener('touchend', e => {
         endX = e.changedTouches[0].clientX;
         const distance = startX - endX;

         if (Math.abs(distance) > swipeThreshold) {
            if (distance > 0) {
               nextSlide();
            } else {
               prevSlide();
            }
            resetAutoplay();
         }
      }, { passive: true });

      // Autoplay pause on hover
      sliderContainer.addEventListener('mouseenter', stopAutoplay);
      sliderContainer.addEventListener('mouseleave', startAutoplay);
   }

   // Initialize first slide on load
   showSlide(0);
   startAutoplay();
});