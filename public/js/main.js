document.addEventListener('DOMContentLoaded', () => {
   const initNavbarEnhancements = () => {
      const navCollapse = document.getElementById('navcol');
      const menuWrapper = document.querySelector('.menu-wrapper');
      const body = document.body;

      if (navCollapse && menuWrapper && body) {
         const applyMenuState = (isOpen) => {
            menuWrapper.classList.toggle('menu-open', isOpen);
            body.classList.toggle('nav-open', isOpen);
         };

         navCollapse.addEventListener('shown.bs.collapse', () => applyMenuState(true));
         navCollapse.addEventListener('hidden.bs.collapse', () => applyMenuState(false));
      }

      const normalizePath = (pathStr = '') => {
         const cleanPath = pathStr.split('?')[0].split('#')[0];
         let cleaned = cleanPath
            .replace(/\/+$/, '')
            .replace(/\/(index\.(html|php))?$/i, '')
            .replace(/\.(html|php)$/i, '');
         return cleaned === '' ? '/' : cleaned.toLowerCase();
      };

      let currentUrl;
      try {
         currentUrl = new URL(window.location.href);
      } catch (e) {
         currentUrl = { pathname: window.location.pathname || '/', searchParams: new URLSearchParams() };
      }

      const currentPath = normalizePath(currentUrl.pathname);
      const currentSearchParams = currentUrl.searchParams;

      document.querySelectorAll('.menu-body .nav-link, .page-footer .nav-link').forEach((link) => {
         const href = link.getAttribute('href');
         if (!href || href === '#' || href.startsWith('javascript:')) return;

         let linkUrl;
         try {
            linkUrl = new URL(href, window.location.origin);
         } catch (e) {
            return;
         }

         const linkPath = normalizePath(linkUrl.pathname);

         let pathMatches = false;
         if (linkPath === '/') {
            pathMatches = (currentPath === '/');
         } else {
            pathMatches = (currentPath === linkPath || currentPath.startsWith(linkPath + '/'));
         }

         let queryMatches = true;
         for (const [key, val] of linkUrl.searchParams.entries()) {
            if (currentSearchParams.get(key) !== val) {
               queryMatches = false;
               break;
            }
         }

         const isActive = pathMatches && queryMatches;

         link.classList.toggle('active', isActive);

         if (isActive) {
            link.setAttribute('aria-current', 'page');
         } else {
            link.removeAttribute('aria-current');
         }
      });
   };

   if (window.componentsLoaded || !document.querySelector('[data-component]')) {
      initNavbarEnhancements();
   } else {
      window.addEventListener('components:loaded', initNavbarEnhancements, { once: true });
   }
});

