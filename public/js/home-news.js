document.addEventListener('DOMContentLoaded', () => {
   const container = document.querySelector('.news-slider-container');
   const track = document.querySelector('.news-slider-track');
   const indicatorsContainer = document.querySelector('.news-slider-indicators');
   
   if (!container || !track) return;
   
   const slides = Array.from(track.children);
   const totalItems = slides.length;
   
   let currentIndex = 0;
   let visibleItems = getVisibleItemsCount();
   let maxIndex = Math.max(0, totalItems - visibleItems);
   
   // Autoplay Configuration
   const autoplayInterval = 5000; // 5 seconds
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
      renderIndicators();
      updateSliderPosition();
      startAutoplay();
      
      // Navigation Buttons
      const prevBtn = document.querySelector('.news-prev-btn');
      const nextBtn = document.querySelector('.news-next-btn');
      
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
      if (width >= 992) return 3;
      if (width >= 576) return 2;
      return 1;
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
         renderIndicators();
         updateSliderPosition();
      }
      trackWidth = track.offsetWidth;
   }
   
   function renderIndicators() {
      if (!indicatorsContainer) return;
      indicatorsContainer.innerHTML = '';
      
      const dotsCount = totalItems - visibleItems + 1;
      
      // If all items are visible, no need for indicators
      if (dotsCount <= 1) return;
      
      for (let i = 0; i < dotsCount; i++) {
         const dot = document.createElement('button');
         dot.classList.add('news-dot');
         dot.setAttribute('aria-label', `Go to news slide ${i + 1}`);
         if (i === currentIndex) {
            dot.classList.add('active');
         }
         
         dot.addEventListener('click', () => {
            goToSlide(i);
            resetAutoplay();
         });
         
         indicatorsContainer.appendChild(dot);
      }
   }
   
   function updateSliderPosition() {
      track.style.setProperty('--news-current-index', currentIndex);
      
      // Update dots active class
      if (indicatorsContainer) {
         const dots = indicatorsContainer.querySelectorAll('.news-dot');
         dots.forEach((dot, idx) => {
            dot.classList.toggle('active', idx === currentIndex);
         });
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
      const gap = parseInt(getComputedStyle(track).getPropertyValue('--news-gap')) || 24;
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
