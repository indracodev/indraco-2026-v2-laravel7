document.addEventListener('DOMContentLoaded', () => {
   const initNavbarEnhancements = () => {
      const navCollapse = document.getElementById('navcol');
      const menuWrapper = document.querySelector('.menu-wrapper');
      const body = document.body;

      if (!navCollapse || !menuWrapper || !body) return;

      const applyMenuState = (isOpen) => {
         menuWrapper.classList.toggle('menu-open', isOpen);
         body.classList.toggle('nav-open', isOpen);
      };

      navCollapse.addEventListener('shown.bs.collapse', () => applyMenuState(true));
      navCollapse.addEventListener('hidden.bs.collapse', () => applyMenuState(false));

      const getPageKey = (value = '') => {
         const path = value.split('?')[0].split('#')[0];
         const cleaned = path.replace(/^\.\//, '').replace(/^\//, '').replace(/\/+$/, '');
         const lastSegment = cleaned.split('/').filter(Boolean).pop() || 'index.html';
         return lastSegment.toLowerCase();
      };

      const currentPage = getPageKey(window.location.pathname || '');

      navCollapse.querySelectorAll('.link').forEach((link) => {
         const href = link.getAttribute('href') || '';
         const linkPage = getPageKey(href);
         const isActive = linkPage === currentPage;

         link.classList.toggle('active', isActive);

         if (isActive) {
            link.setAttribute('aria-current', 'page');
         } else {
            link.removeAttribute('aria-current');
         }
      });
   };

   if (window.componentsLoaded) {
      initNavbarEnhancements();
   } else {
      window.addEventListener('components:loaded', initNavbarEnhancements, { once: true });
   }
});
