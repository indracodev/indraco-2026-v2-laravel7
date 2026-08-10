// Optimized theme.js
document.addEventListener('DOMContentLoaded', function () {
   const html = document.documentElement;

   /* =========================
      THEME CORE
   ========================== */
   function detectThemeOnce() {
      return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
   }

   function getTheme() {
      return localStorage.getItem('theme') || detectThemeOnce();
   }

   function setTheme(theme, save = false, force = false) {
      if (html.getAttribute('data-bs-theme') === theme && !save && !force) return; // avoid redundant writes

      html.setAttribute('data-bs-theme', theme);
      if (save) localStorage.setItem('theme', theme);

      updateThemeImages(theme);
      syncInvertedCarousels(theme);
   }

   /* =========================
      DOM FINDERS
   ========================== */
   function getThemeImages() {
      return document.querySelectorAll('.theme-image');
   }

   function getCarouselInverts() {
      return document.querySelectorAll('.carousel-invert');
   }

   /* =========================
      CAROUSEL SWITCHER
   ========================== */
   function syncInvertedCarousels(theme) {
      const carouselInverts = getCarouselInverts();
      if (!carouselInverts.length) return;

      const inverted = theme === 'dark' ? 'light' : 'dark';
      carouselInverts.forEach(el => {
         if (el.getAttribute('data-bs-theme') !== inverted) {
            el.setAttribute('data-bs-theme', inverted);
         }
      });
   }


   /* =========================
      IMAGE SWITCHER
   ========================== */
   function updateThemeImages(theme) {
      const themeImages = getThemeImages();
      if (!themeImages.length) return;

      themeImages.forEach(img => {
         const src = img.dataset[theme];
         if (src && img.getAttribute('src') !== src) {
            img.setAttribute('src', src);
         }
      });
   }

   /* =========================
      INIT
   ========================== */
   function initTheme() {
      setTheme(getTheme(), false, true);
   }

   initTheme();
   window.addEventListener('partials:loaded', initTheme);
   window.addEventListener('components:loaded', initTheme);

   /* =========================
      TOGGLE HANDLERS (MULTI)
   ========================== */
   document.addEventListener('click', function (e) {
      const toggle = e.target.closest('.theme-toggle');
      if (toggle) {
         e.preventDefault();
         setTheme(
            html.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark',
            true
         );
      }
   });

});