/**
 * Multi-Slide Component Controller
 * Continuous seamless infinite loop multi-card carousel.
 */
class MultiSlideCarousel {
   constructor(wrapperElement) {
      this.wrapper = wrapperElement;
      this.container = this.wrapper.querySelector('.multi-slide-container');
      this.track = this.wrapper.querySelector('.multi-slide-track');
      this.indicatorsContainer = this.wrapper.querySelector('.multi-slide-indicators');
      this.prevBtn = this.wrapper.querySelector('.multi-slide-prev');
      this.nextBtn = this.wrapper.querySelector('.multi-slide-next');

      if (!this.container || !this.track) return;

      // Store original slides before cloning
      this.originalSlides = Array.from(this.track.children).filter(
         el => !el.classList.contains('multi-slide-clone')
      );
      this.totalItems = this.originalSlides.length;

      if (this.totalItems === 0) return;

      // Dataset configurations
      this.isAutoplay = this.wrapper.dataset.autoplay !== 'false';
      this.intervalDuration = parseInt(this.wrapper.dataset.interval) || 5000;
      this.isLoop = this.wrapper.dataset.loop !== 'false';

      this.visibleLg = parseInt(this.wrapper.dataset.visibleLg) || 3;
      this.visibleMd = parseInt(this.wrapper.dataset.visibleMd) || 2;
      this.visibleSm = parseInt(this.wrapper.dataset.visibleSm) || 1;

      this.realIndex = 0;
      this.visibleItems = this.getVisibleItemsCount();
      this.virtualIndex = this.isLoop ? this.realIndex + this.visibleItems : this.realIndex;

      this.autoplayTimer = null;
      this.isAnimating = false;

      // Drag / Swipe State
      this.isDragging = false;
      this.startX = 0;
      this.currentX = 0;
      this.diffX = 0;
      this.wasDragged = false;
      this.trackWidth = this.track.offsetWidth;

      this.init();
   }

   getVisibleItemsCount() {
      const width = window.innerWidth;
      if (width >= 992) return this.visibleLg;
      if (width >= 576) return this.visibleMd;
      return this.visibleSm;
   }

   init() {
      this.setupClones();
      this.renderIndicators();
      this.updatePosition(false);

      if (this.isAutoplay) {
         this.startAutoplay();
      }

      // Transition end handler for instant jump reset
      this.track.addEventListener('transitionend', (e) => {
         if (e.target === this.track) {
            this.handleTransitionEnd();
         }
      });

      // Button controls
      if (this.prevBtn) {
         this.prevBtn.addEventListener('click', () => {
            this.prevSlide();
            this.resetAutoplay();
         });
      }

      if (this.nextBtn) {
         this.nextBtn.addEventListener('click', () => {
            this.nextSlide();
            this.resetAutoplay();
         });
      }

      // Responsive Resize
      window.addEventListener('resize', () => this.handleResize());

      // Touch Events
      this.container.addEventListener('touchstart', (e) => this.dragStart(e), { passive: true });
      this.container.addEventListener('touchmove', (e) => this.dragMove(e), { passive: true });
      this.container.addEventListener('touchend', () => this.dragEnd());

      // Mouse Events
      this.container.addEventListener('mousedown', (e) => this.dragStart(e));
      window.addEventListener('mousemove', (e) => this.dragMove(e));
      window.addEventListener('mouseup', () => this.dragEnd());

      // Prevent link clicks during drag
      this.container.addEventListener('click', (e) => this.handleLinkClick(e), true);

      // Pause on Hover
      this.wrapper.addEventListener('mouseenter', () => this.stopAutoplay());
      this.wrapper.addEventListener('mouseleave', () => {
         if (this.isAutoplay) this.startAutoplay();
      });
   }

   setupClones() {
      // Remove existing clones
      const existingClones = this.track.querySelectorAll('.multi-slide-clone');
      existingClones.forEach(el => el.remove());

      if (!this.isLoop || this.totalItems <= this.visibleItems) return;

      // Clone first `visibleItems` slides and append to the end
      for (let i = 0; i < this.visibleItems; i++) {
         const clone = this.originalSlides[i % this.totalItems].cloneNode(true);
         clone.classList.add('multi-slide-clone');
         clone.setAttribute('aria-hidden', 'true');
         this.track.appendChild(clone);
      }

      // Clone last `visibleItems` slides and prepend to the start
      for (let i = 0; i < this.visibleItems; i++) {
         const sourceIdx = (this.totalItems - 1 - (i % this.totalItems) + this.totalItems) % this.totalItems;
         const clone = this.originalSlides[sourceIdx].cloneNode(true);
         clone.classList.add('multi-slide-clone');
         clone.setAttribute('aria-hidden', 'true');
         this.track.insertBefore(clone, this.track.firstChild);
      }

      this.slides = Array.from(this.track.children);
      this.virtualIndex = this.realIndex + this.visibleItems;
   }

   handleResize() {
      const newVisibleItems = this.getVisibleItemsCount();
      if (newVisibleItems !== this.visibleItems) {
         this.visibleItems = newVisibleItems;
         this.setupClones();
         this.renderIndicators();
         this.updatePosition(false);
      }
      this.trackWidth = this.track.offsetWidth;
   }

   renderIndicators() {
      if (!this.indicatorsContainer) return;
      this.indicatorsContainer.innerHTML = '';

      if (this.totalItems <= 1) return;

      for (let i = 0; i < this.totalItems; i++) {
         const dot = document.createElement('button');
         dot.type = 'button';
         dot.classList.add('multi-slide-dot');
         dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
         if (i === this.realIndex) {
            dot.classList.add('active');
         }

         dot.addEventListener('click', () => {
            this.goToSlide(i);
            this.resetAutoplay();
         });

         this.indicatorsContainer.appendChild(dot);
      }
   }

   updatePosition(animate = true) {
      if (!animate) {
         this.track.style.transition = 'none';
      } else {
         this.track.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1)';
      }

      this.track.style.setProperty('--multi-slide-virtual-index', this.virtualIndex);

      if (!animate) {
         // Force reflow
         void this.track.offsetHeight;
         this.track.style.transition = '';
      }

      // Sync active dot
      if (this.indicatorsContainer) {
         const dots = this.indicatorsContainer.querySelectorAll('.multi-slide-dot');
         dots.forEach((dot, idx) => {
            dot.classList.toggle('active', idx === this.realIndex);
         });
      }

      // Disabled state for buttons if not looping
      if (!this.isLoop) {
         const maxRealIndex = Math.max(0, this.totalItems - this.visibleItems);
         if (this.prevBtn) this.prevBtn.disabled = this.realIndex <= 0;
         if (this.nextBtn) this.nextBtn.disabled = this.realIndex >= maxRealIndex;
      }
   }

   handleTransitionEnd() {
      if (!this.isLoop) return;

      // If we landed on an appended clone (past the end of real slides)
      if (this.virtualIndex >= this.totalItems + this.visibleItems) {
         this.realIndex = (this.virtualIndex - this.visibleItems) % this.totalItems;
         this.virtualIndex = this.realIndex + this.visibleItems;
         this.updatePosition(false);
      }
      // If we landed on a prepended clone (before the start of real slides)
      else if (this.virtualIndex < this.visibleItems) {
         this.realIndex = ((this.virtualIndex - this.visibleItems) % this.totalItems + this.totalItems) % this.totalItems;
         this.virtualIndex = this.realIndex + this.visibleItems;
         this.updatePosition(false);
      }

      this.isAnimating = false;
   }

   goToSlide(targetRealIndex) {
      this.realIndex = (targetRealIndex + this.totalItems) % this.totalItems;
      this.virtualIndex = this.isLoop ? this.realIndex + this.visibleItems : this.realIndex;
      this.updatePosition(true);
   }

   nextSlide() {
      if (!this.isLoop) {
         const maxRealIndex = Math.max(0, this.totalItems - this.visibleItems);
         if (this.realIndex < maxRealIndex) {
            this.realIndex++;
            this.virtualIndex = this.realIndex;
            this.updatePosition(true);
         }
         return;
      }

      this.virtualIndex++;
      this.realIndex = ((this.virtualIndex - this.visibleItems) % this.totalItems + this.totalItems) % this.totalItems;
      this.updatePosition(true);
   }

   prevSlide() {
      if (!this.isLoop) {
         if (this.realIndex > 0) {
            this.realIndex--;
            this.virtualIndex = this.realIndex;
            this.updatePosition(true);
         }
         return;
      }

      this.virtualIndex--;
      this.realIndex = ((this.virtualIndex - this.visibleItems) % this.totalItems + this.totalItems) % this.totalItems;
      this.updatePosition(true);
   }

   startAutoplay() {
      if (!this.autoplayTimer && this.isAutoplay) {
         this.autoplayTimer = setInterval(() => this.nextSlide(), this.intervalDuration);
      }
   }

   stopAutoplay() {
      if (this.autoplayTimer) {
         clearInterval(this.autoplayTimer);
         this.autoplayTimer = null;
      }
   }

   resetAutoplay() {
      this.stopAutoplay();
      if (this.isAutoplay) {
         this.startAutoplay();
      }
   }

   dragStart(e) {
      this.isDragging = true;
      this.wasDragged = false;
      this.startX = e.clientX || (e.touches ? e.touches[0].clientX : 0);
      this.diffX = 0;

      this.track.style.transition = 'none';
      this.stopAutoplay();
   }

   dragMove(e) {
      if (!this.isDragging) return;

      this.currentX = e.clientX !== undefined ? e.clientX : (e.touches ? e.touches[0].clientX : 0);
      this.diffX = this.currentX - this.startX;

      const gapPx = 24;
      const baseTranslatePx = -1 * this.virtualIndex * (this.trackWidth + gapPx) / this.visibleItems;
      const newTranslatePx = baseTranslatePx + this.diffX;

      this.track.style.transform = `translateX(${newTranslatePx}px)`;

      if (Math.abs(this.diffX) > 10) {
         this.wasDragged = true;
      }
   }

   dragEnd() {
      if (!this.isDragging) return;
      this.isDragging = false;

      this.track.style.transition = 'transform 0.6s cubic-bezier(0.25, 1, 0.5, 1)';

      const threshold = 60;
      if (this.diffX < -threshold) {
         this.nextSlide();
      } else if (this.diffX > threshold) {
         this.prevSlide();
      } else {
         this.updatePosition(true);
      }

      setTimeout(() => {
         this.track.style.transform = '';
      }, 50);

      if (this.isAutoplay) {
         this.startAutoplay();
      }
   }

   handleLinkClick(e) {
      if (this.wasDragged) {
         e.preventDefault();
         e.stopPropagation();
         this.wasDragged = false;
      }
   }
}

// Auto-initialize on DOMReady
document.addEventListener('DOMContentLoaded', () => {
   const carousels = document.querySelectorAll('[data-multi-slide]');
   carousels.forEach(el => new MultiSlideCarousel(el));
});
