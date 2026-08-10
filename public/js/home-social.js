document.addEventListener('DOMContentLoaded', () => {
   const container = document.querySelector('.social-slider-container');
   const track = document.querySelector('.social-slider-track');
   const prevBtn = document.querySelector('.social-prev-btn');
   const nextBtn = document.querySelector('.social-next-btn');

   if (!container || !track) return;

   const slides = Array.from(track.children);
   const totalItems = slides.length;

   let currentIndex = 0;
   let visibleItems = getVisibleItemsCount();
   let maxIndex = Math.max(0, totalItems - visibleItems);

   // Autoplay Configuration
   const autoplayInterval = 6000; // 6 seconds
   let autoplayTimer = null;

   // Drag / Swipe State
   let isDragging = false;
   let startX = 0;
   let currentX = 0;
   let diffX = 0;
   let wasDragged = false;
   let trackWidth = track.offsetWidth;

   // Initialize
   initSlider();

   function initSlider() {
      updateSliderPosition();
      startAutoplay();

      // Navigation Buttons
      if (prevBtn) {
         prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoplay();
         });
      }

      if (nextBtn) {
         nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoplay();
         });
      }

      // Event Listeners
      window.addEventListener('resize', handleResize);

      // Touch Events
      container.addEventListener('touchstart', dragStart, { passive: true });
      container.addEventListener('touchmove', dragMove, { passive: true });
      container.addEventListener('touchend', dragEnd);

      // Mouse Events
      container.addEventListener('mousedown', dragStart);
      window.addEventListener('mousemove', dragMove);
      window.addEventListener('mouseup', dragEnd);

      // Prevent link clicks when dragging
      container.addEventListener('click', handleLinkClick, true);

      // Hover Autoplay Pause
      container.addEventListener('mouseenter', stopAutoplay);
      container.addEventListener('mouseleave', startAutoplay);
   }

   function getVisibleItemsCount() {
      const width = window.innerWidth;
      if (width >= 992) return 3.25;
      if (width >= 576) return 2.2;
      return 1.15;
   }

   function handleResize() {
      const newVisibleItems = getVisibleItemsCount();
      if (newVisibleItems !== visibleItems) {
         visibleItems = newVisibleItems;
         maxIndex = Math.max(0, totalItems - visibleItems);
         // Adjust current index if it exceeds new max
         if (currentIndex > maxIndex) {
            currentIndex = maxIndex;
         }
         updateSliderPosition();
      }
      trackWidth = track.offsetWidth;
   }

   function updateSliderPosition() {
      track.style.setProperty('--social-current-index', currentIndex);

      // Update next/prev buttons visibility
      if (prevBtn) {
         if (currentIndex === 0) {
            prevBtn.classList.add('hidden');
         } else {
            prevBtn.classList.remove('hidden');
         }
      }

      if (nextBtn) {
         if (currentIndex >= maxIndex) {
            nextBtn.classList.add('hidden');
         } else {
            nextBtn.classList.remove('hidden');
         }
      }
   }

   function goToSlide(index) {
      currentIndex = Math.max(0, Math.min(index, maxIndex));
      updateSliderPosition();
   }

   function nextSlide() {
      if (currentIndex >= maxIndex) {
         goToSlide(0); // loop back to first
      } else {
         goToSlide(currentIndex + 1);
      }
   }

   function prevSlide() {
      if (currentIndex <= 0) {
         goToSlide(maxIndex); // loop to end
      } else {
         goToSlide(currentIndex - 1);
      }
   }

   // Autoplay helpers
   function startAutoplay() {
      if (!autoplayTimer) {
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

   // Drag / Swipe Logic
   function dragStart(e) {
      isDragging = true;
      wasDragged = false;
      startX = e.clientX || e.touches[0].clientX;
      diffX = 0;

      // Temporarily disable transitions during drag for real-time tracking
      track.style.transition = 'none';
      stopAutoplay();
   }

   function dragMove(e) {
      if (!isDragging) return;

      currentX = e.clientX !== undefined ? e.clientX : (e.touches ? e.touches[0].clientX : 0);
      diffX = currentX - startX;

      // Translate track in real-time based on drag
      // Get base translate percent
      const gap = parseInt(getComputedStyle(track).getPropertyValue('--social-gap')) || 24;
      const baseTranslatePx = -1 * currentIndex * (trackWidth + gap) / visibleItems;

      const newTranslatePx = baseTranslatePx + diffX;
      track.style.transform = `translateX(${newTranslatePx}px)`;

      if (Math.abs(diffX) > 10) {
         wasDragged = true;
      }
   }

   function dragEnd() {
      if (!isDragging) return;
      isDragging = false;

      // Re-enable smooth transition
      track.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1)';

      // Reset custom transform back to CSS-driven transform, 
      // but only after evaluating if we need to switch index
      const threshold = 70; // drag threshold in pixels to change slide

      if (diffX < -threshold) {
         // Dragged left -> Next slide
         if (currentIndex < maxIndex) {
            currentIndex++;
         } else {
            currentIndex = 0; // loop to start
         }
      } else if (diffX > threshold) {
         // Dragged right -> Previous slide
         if (currentIndex > 0) {
            currentIndex--;
         } else {
            currentIndex = maxIndex; // loop to end
         }
      }

      updateSliderPosition();

      // Clear inline style transform to let CSS take over translation
      // we delay it slightly to let the transition animate from the drag position
      setTimeout(() => {
         track.style.transform = '';
      }, 50);

      startAutoplay();
   }

   function handleLinkClick(e) {
      if (wasDragged) {
         e.preventDefault();
         e.stopPropagation();
         wasDragged = false;
      }
   }
});
