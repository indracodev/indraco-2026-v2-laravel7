document.addEventListener('DOMContentLoaded', () => {
   const carousel = document.getElementById('selectedProductsCarousel');
   if (!carousel) return;

   const track = carousel.querySelector('.carousel-inner');
   const items = carousel.querySelectorAll('.carousel-item');
   const prevBtn = carousel.querySelector('.carousel-control-prev');
   const nextBtn = carousel.querySelector('.carousel-control-next');

   if (!track || !items.length) return;

   const totalItems = items.length; // 6
   const originalItemsCount = 3;
   let currentIndex = 0;
   let visibleItems = getVisibleItemsCount();
   let maxIndex = Math.max(0, totalItems - visibleItems);
   let autoplayInterval = null;
   const autoplayDelay = 4000; // 4 seconds
   let isTransitioning = false;

   function getVisibleItemsCount() {
      const width = window.innerWidth;
      if (width >= 1320) return 4;
      if (width >= 992) return 3;
      if (width >= 576) return 2;
      return 1;
   }

   function updateCarousel() {
      visibleItems = getVisibleItemsCount();
      maxIndex = Math.max(0, totalItems - visibleItems);

      // Clamp currentIndex
      if (currentIndex > maxIndex) {
         currentIndex = maxIndex;
      }

      // Update CSS variables
      carousel.style.setProperty('--carousel-visible-items', visibleItems);
      track.style.setProperty('--carousel-current-index', currentIndex);

      // Hide/Show controls and handle autoplay
      if (totalItems <= visibleItems) {
         if (prevBtn) prevBtn.style.display = 'none';
         if (nextBtn) nextBtn.style.display = 'none';
         stopAutoplay();
      } else {
         if (prevBtn) prevBtn.style.display = 'flex';
         if (nextBtn) nextBtn.style.display = 'flex';
         startAutoplay();
      }
   }

   function nextSlide() {
      if (isTransitioning) return;
      isTransitioning = true;

      currentIndex++;
      track.style.setProperty('--carousel-current-index', currentIndex);
   }

   function prevSlide() {
      if (isTransitioning) return;
      isTransitioning = true;

      if (currentIndex <= 0) {
         // Snap to duplicate end instantly, then transition to index 2
         track.style.setProperty('transition', 'none', 'important');
         currentIndex = originalItemsCount;
         track.style.setProperty('--carousel-current-index', currentIndex);
         track.offsetHeight; // Force reflow
         track.style.removeProperty('transition');
      }

      currentIndex--;
      track.style.setProperty('--carousel-current-index', currentIndex);
   }

   // Listen for transition end to handle infinite wrapping
   track.addEventListener('transitionend', (e) => {
      if (e.target !== track) return;
      isTransitioning = false;

      if (currentIndex === originalItemsCount) {
         // Snap back to 0 instantly
         track.style.setProperty('transition', 'none', 'important');
         currentIndex = 0;
         track.style.setProperty('--carousel-current-index', currentIndex);
         track.offsetHeight; // Force reflow
         track.style.removeProperty('transition');
      }
   });

   function startAutoplay() {
      stopAutoplay();
      autoplayInterval = setInterval(nextSlide, autoplayDelay);
   }

   function stopAutoplay() {
      if (autoplayInterval) {
         clearInterval(autoplayInterval);
         autoplayInterval = null;
      }
   }

   // Click event handlers
   if (prevBtn) {
      prevBtn.addEventListener('click', (e) => {
         e.preventDefault();
         prevSlide();
         startAutoplay(); // Reset timer on click
      });
   }

   if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
         e.preventDefault();
         nextSlide();
         startAutoplay(); // Reset timer on click
      });
   }

   // Hover events to pause autoplay
   carousel.addEventListener('mouseenter', stopAutoplay);
   carousel.addEventListener('mouseleave', startAutoplay);

   // Handle resize
   window.addEventListener('resize', updateCarousel);

   // Initialize
   updateCarousel();
});