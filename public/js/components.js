document.addEventListener('DOMContentLoaded', async () => {
   const embeddedComponents = {
      'navbar': `<nav aria-label="navigation bar" class="navbar navbar-expand">
   <div class="container">
      <a href="index.html" class="navbar-brand d-flex">
         <img src="images/logo-indraco-est.png" data-light="images/logo-indraco-est.png" data-dark="images/logo-indraco-est-invert.png" alt="Logo INDRACO Est." class="theme-image w-100 h-auto">
      </a>
      <div class="menu">
         <div class="menu-wrapper p-1 overflow-hidden" style="background-color: rgba(var(--bs-body-bg-rgb), 0.875); backdrop-filter: blur(2rem); border-radius: calc(56px / 2);">
            <header class="menu-header text-bg-custom-1 p-1 rounded-pill">
               <ul class="nav justify-content-between align-items-center gap-2 gap-md-3">
                  <li>
                     <button class="toggle-menu-collapse btn rounded-pill header-toggle-btn collapsed" aria-label="Toggle main menu" aria-expanded="false" aria-controls="navcol" type="button" data-bs-toggle="collapse" data-bs-target="#navcol">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="21" height="21">
                           <g class="icon-bars">
                              <path fill="currentColor" d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 337.7 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z"/>
                           </g>
                           <g class="icon-xmark">
                              <path fill="currentColor" d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/>
                           </g>
                        </svg>
                     </button>
                  </li>
                  <li class="d-none d-md-block">
                     <div data-component="toggle-language"></div>
                  </li>
                  <li>
                     <button class="btn rounded-pill header-toggle-btn" aria-label="Open search dialog" type="button" data-bs-toggle="modal" data-bs-target="#modal-search">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="21" height="21"><path fill="currentColor" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
                     </button>
                  </li>
                  <li>
                     <button class="theme-toggle btn rounded-pill header-toggle-btn" type="button" aria-label="Toggle color theme">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" width="21" height="21" class="theme-icon">
                           <g class="icon-sun">
                              <circle cx="12" cy="12" r="5" fill="currentColor"></circle>
                              <g stroke="currentColor" stroke-width="2">
                                 <line x1="12" y1="1" x2="12" y2="4"></line>
                                 <line x1="12" y1="20" x2="12" y2="23"></line>
                                 <line x1="1" y1="12" x2="4" y2="12"></line>
                                 <line x1="20" y1="12" x2="23" y2="12"></line>
                                 <line x1="4.2" y1="4.2" x2="6.3" y2="6.3"></line>
                                 <line x1="17.7" y1="17.7" x2="19.8" y2="19.8"></line>
                                 <line x1="4.2" y1="19.8" x2="6.3" y2="17.7"></line>
                                 <line x1="17.7" y1="6.3" x2="19.8" y2="4.2"></line>
                              </g>
                           </g>
                           <g class="icon-moon">
                              <path d="M21 12.8A9 9 0 1111.2 3 a7 7 0 109.8 9.8z" fill="currentColor"></path>
                           </g>
                        </svg>
                     </button>
                  </li>
               </ul>
            </header>
            <div id="navcol" class="menu-collapse collapse">
               <div class="menu-body p-3 d-flex flex-column row-gap-4 py-4">
                  <section aria-label="section menu company">
                     <h3 class="menu-title small opacity-50">Menu</h3>
                     <hr class="opacity-50 my-2">
                     <ul class="menu-list nav d-grid column-gap-3 row-gap-1 row-gap-md-2 grid-cols-2-auto">
                        <li><a href="index.html" class="link">Home</a></li>
                        <li><a href="about.html" class="link">About Us</a></li>
                        <li><a href="products.html" class="link">Products</a></li>
                        <li><a href="businesses.html" class="link">Business</a></li>
                        <li><a href="store.html" class="link">Online Store</a></li>
                        <li><a href="news.html" class="link">News</a></li>
                        <li><a href="careers.html" class="link">Careers</a></li>
                        <li><a href="contact.html" class="link">Contact Us</a></li>
                        <li><a href="downloads.html" class="link">Downloads</a></li>
                     </ul>
                  </section>
                  <section aria-label="section menu brands">
                     <h3 class="menu-title small opacity-50">Our Brands</h3>
                     <hr class="opacity-50 my-2">
                     <ul class="menu-list nav d-grid column-gap-3 row-gap-1 row-gap-md-2 grid-cols-2-auto">
                        <li><a href="#" class="link">Supresso</a></li>
                        <li><a href="#" class="link">BaliCafé</a></li>
                        <li><a href="#" class="link">UCAFÉ</a></li>
                        <li><a href="#" class="link">Rasa Sayang</a></li>
                        <li><a href="#" class="link">Tugu Buaya</a></li>
                        <li><a href="#" class="link">Uang Emas</a></li>
                        <li><a href="#" class="link">BROCHOCO</a></li>
                        <li><a href="#" class="link">Jaheku</a></li>
                        <li><a href="#" class="link">intiRasa</a></li>
                        <li><a href="#" class="link">Hao Cafe</a></li>
                     </ul>
                  </section>
                  <section aria-label="section menu others" class="menu-others">
                     <h3 class="menu-title small opacity-50">Others</h3>
                     <hr class="opacity-50 my-2">
                     <ul class="menu-list nav d-grid column-gap-3 row-gap-1 row-gap-md-2">
                        <li class="d-md-none"><div data-component="toggle-language"></div></li>
                        <li><a href="#" class="link small">Privacy Policy</a></li>
                        <li><a href="#" class="link small">Terms & Conditions</a></li>
                        <li><a href="#" class="link small">Information On Data Protection</a></li>
                        <li><a href="#" class="link small">Help</a></li>
                     </ul>
                  </section>
               </div>
            </div>
         </div>
      </div>
   </div>
</nav>`,
      'footer': `<footer class="site-footer text-bg-custom-1" style="font-size: .8em; margin-top: calc(5rem + 2vw);">
   <div class="site-footer-top">
      <div class="container py-5">
         <div class="row gy-5 gx-sm-5">
            <section aria-label="footer main section" class="col main-footer-section d-xl-flex flex-column">
               <img src="images/logo-indraco-invert.png" alt="Logo INDRACO" loading="lazy" class="w-100 h-auto">
               <h3 class="footer-title mb-3 mb-xl-auto">Roasting fine exquisite coffee since 1971.</h3>
               <div data-component="sosmed"></div>
            </section>
            <section aria-label="footer company section" class="col col-md-auto">
               <h3 class="footer-title mb-0">Company</h3>
               <hr class="opacity-75">
               <nav aria-label="footer company navigation">
                  <ul class="nav flex-column row-gap-1">
                     <li><a href="index.html" class="link">Home</a></li>
                     <li><a href="about.html" class="link">About Us</a></li>
                     <li><a href="products.html" class="link">Products</a></li>
                     <li><a href="businesses.html" class="link">Business</a></li>
                     <li><a href="store.html" class="link">Online Store</a></li>
                     <li><a href="news.html" class="link">News</a></li>
                     <li><a href="careers.html" class="link">Careers</a></li>
                  </ul>
               </nav>
            </section>
            <section aria-label="footer brands section" class="col col-md-auto">
               <h3 class="footer-title mb-0">Brands</h3>
               <hr class="opacity-75">
               <nav aria-label="footer brands navigation">
                  <ul class="nav flex-column row-gap-1 footer-brands-list">
                     <li><a href="#" class="link">Supresso</a></li>
                     <li><a href="#" class="link">BaliCafé</a></li>
                     <li><a href="#" class="link">UCAFÉ</a></li>
                     <li><a href="#" class="link">Rasa Sayang</a></li>
                     <li><a href="#" class="link">Tugu Buaya</a></li>
                     <li><a href="#" class="link">Uang Emas</a></li>
                     <li><a href="#" class="link">BROCHOCO</a></li>
                     <li><a href="#" class="link">Jaheku</a></li>
                     <li><a href="#" class="link">intiRasa</a></li>
                     <li><a href="#" class="link">Hao Cafe</a></li>
                  </ul>
               </nav>
            </section>
            <section aria-label="footer support section" class="col col-md-auto">
               <h3 class="footer-title mb-0">Support</h3>
               <hr class="opacity-75">
               <nav aria-label="footer support navigation">
                  <ul class="nav flex-column row-gap-1">
                     <li><a href="contact.html" class="link">Contact Us</a></li>
                     <li><a href="downloads.html" class="link">Downloads</a></li>
                  </ul>
               </nav>
            </section>
            <section aria-label="footer subscribe section" class="col newsletter-footer-section d-xl-flex flex-column">
               <h3 class="footer-title mb-0">Newsletter</h3>
               <hr class="opacity-75">
               <form action="#" class="flex-grow-1 d-xl-flex flex-column" novalidate>
                  <label for="newsletter-email" class="form-label mb-xl-auto">Subscribe to get the latest updates from Indraco</label>
                  <div class="input-group text-bg-light p-1 rounded-pill overflow-hidden">
                     <input type="email" id="newsletter-email" class="form-control text-bg-light border-0" placeholder="Enter your email address" autocomplete="email" required>
                     <button type="submit" class="btn btn-custom-2 rounded-pill" aria-label="Subscribe to newsletter">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="21" height="21"><path fill="currentColor" d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"/></svg>
                     </button>
                  </div>
               </form>
            </section>
         </div>
      </div>
   </div>
   <hr class="m-0">
   <div class="site-footer-bottom">
      <div class="container pt-3 pb-4 d-flex flex-wrap row-gap-3 column-gap-5">
         <nav aria-label="footer legal navigation" class="flex-grow-1">
            <ul class="nav gap-2">
               <li><a href="#" class="link">Privacy Policy</a></li>
               <li class="vr"></li>
               <li><a href="#" class="link">Terms & Conditions</a></li>
               <li class="vr"></li>
               <li><a href="#" class="link">Information On Data Protection</a></li>
               <li class="vr"></li>
               <li><a href="#" class="link">Help</a></li>
               <li class="vr"></li>
            </ul>
         </nav>
         <div class="copyright opacity-50">&copy; 2026 INDRACO. All rights reserved </div>
      </div>
   </div>
</footer>`,
      'modal-search': `<div id="modal-search" class="modal fade" tabindex="-1" aria-labelledby="modal-search-title" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-fullscreen-lg-down modal-dialog-scrollable">
      <form action="#" class="modal-content" role="search">
         <header class="modal-header border-0 d-block pb-1">
            <div class="input-group mb-4">
               <label for="search" class="btn border border-end-0 border-2 border-invert" aria-label="Search products">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="24" height="24"><path fill="currentColor" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
               </label>
               <input type="search" id="search" class="form-control border border-start-0 border-end-0 border-2 border-invert shadow-none ps-0" placeholder="Search Product" aria-label="Search products">
               <button type="submit" class="btn btn-invert border-0">Search</button>
            </div>
            <div class="mb-4">
               <div class="d-flex align-items-center justify-content-between">
                  <h2 id="modal-search-title" class="small mb-0 opacity-50">Recent Item</h2>
                  <button type="button" class="btn" aria-label="Reset recent searches">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="24" height="24"><path fill="currentColor" d="M320 128C426 128 512 214 512 320C512 426 426 512 320 512C254.8 512 197.1 479.5 162.4 429.7C152.3 415.2 132.3 411.7 117.8 421.8C103.3 431.9 99.8 451.9 109.9 466.4C156.1 532.6 233 576 320 576C461.4 576 576 461.4 576 320C576 178.6 461.4 64 320 64C234.3 64 158.5 106.1 112 170.7L112 144C112 126.3 97.7 112 80 112C62.3 112 48 126.3 48 144L48 256C48 273.7 62.3 288 80 288L104.6 288C105.1 288 105.6 288 106.1 288L192.1 288C209.8 288 224.1 273.7 224.1 256C224.1 238.3 209.8 224 192.1 224L153.8 224C186.9 166.6 249 128 320 128zM344 216C344 202.7 333.3 192 320 192C306.7 192 296 202.7 296 216L296 320C296 326.4 298.5 332.5 303 337L375 409C384.4 418.4 399.6 418.4 408.9 409C418.2 399.6 418.3 384.4 408.9 375.1L343.9 310.1L343.9 216z"/></svg>
                  </button>
               </div>
               <nav aria-label="resent search">
                  <ul class="nav gap-1">
                     <li><button type="submit" class="btn btn-sm btn-outline-invert">Sumatra Mandheling</button></li>
                     <li><button type="submit" class="btn btn-sm btn-outline-invert">Coffee</button></li>
                     <li><button type="submit" class="btn btn-sm btn-outline-invert">Coffee Capsules</button></li>
                     <li><button type="submit" class="btn btn-sm btn-outline-invert">Cans 200g</button></li>
                     <li><button type="submit" class="btn btn-sm btn-outline-invert">Supresso KRATON</button></li>
                  </ul>
               </nav>
            </div>
            <h5 class="small opacity-50 mb-0">Result Item</h5>
         </header>
         <div class="modal-body border-0 py-0">
            <ul class="list-group list-group-flush">
               <li class="list-group-item px-0 py-2"><button type="submit" class="btn px-0 border-0 shadow-none text-start">Supresso Sumatra Mandheling Coffee Capsules 200g</button></li>
               <li class="list-group-item px-0 py-2"><button type="submit" class="btn px-0 border-0 shadow-none text-start">Supresso Sumatra Mandheling Coffee Capsules 200g</button></li>
               <li class="list-group-item px-0 py-2"><button type="submit" class="btn px-0 border-0 shadow-none text-start">Supresso Sumatra Mandheling Coffee Capsules 200g</button></li>
               <li class="list-group-item px-0 py-2"><button type="submit" class="btn px-0 border-0 shadow-none text-start">Supresso Sumatra Mandheling Coffee Capsules 200g</button></li>
               <li class="list-group-item px-0 py-2"><button type="submit" class="btn px-0 border-0 shadow-none text-start">Supresso Sumatra Mandheling Coffee Capsules 200g</button></li>
               <li class="list-group-item px-0 py-2"><button type="submit" class="btn px-0 border-0 shadow-none text-start">Supresso Sumatra Mandheling Coffee Capsules 200g</button></li>
               <li class="list-group-item px-0 py-2"><button type="submit" class="btn px-0 border-0 shadow-none text-start">Supresso Sumatra Mandheling Coffee Capsules 200g</button></li>
            </ul>
         </div>
         <footer class="modal-footer border-0">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
         </footer>
      </form>
   </div>
</div>`,
      'sosmed': `<nav aria-label="social media navigaiton">
   <ul class="nav gap-3">
      <li>
         <a href="#" class="link text-decoration-none" target="_blank" aria-label="Follow Us on Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="28" height="28"><path fill="currentColor" d="M240 363.3L240 576L356 576L356 363.3L442.5 363.3L460.5 265.5L356 265.5L356 230.9C356 179.2 376.3 159.4 428.7 159.4C445 159.4 458.1 159.8 465.7 160.6L465.7 71.9C451.4 68 416.4 64 396.2 64C289.3 64 240 114.5 240 223.4L240 265.5L174 265.5L174 363.3L240 363.3z"/></svg>
         </a>
      </li>
      <li>
         <a href="#" class="link text-decoration-none" target="_blank" aria-label="Follow Us on Instagram">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="28" height="28"><path fill="currentColor" d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z"/></svg>
         </a>
      </li>
      <li>
         <a href="#" class="link text-decoration-none" target="_blank" aria-label="Follow Us on YouTube">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="28" height="28"><path fill="currentColor" d="M581.7 188.1C575.5 164.4 556.9 145.8 533.4 139.5C490.9 128 320.1 128 320.1 128C320.1 128 149.3 128 106.7 139.5C83.2 145.8 64.7 164.4 58.4 188.1C47 231 47 320.4 47 320.4C47 320.4 47 409.8 58.4 452.7C64.7 476.3 83.2 494.2 106.7 500.5C149.3 512 320.1 512 320.1 512C320.1 512 490.9 512 533.5 500.5C557 494.2 575.5 476.3 581.8 452.7C593.2 409.8 593.2 320.4 593.2 320.4C593.2 320.4 593.2 231 581.8 188.1zM264.2 401.6L264.2 239.2L406.9 320.4L264.2 401.6z"/></svg>
         </a>
      </li>
      <li>
         <a href="#" class="link text-decoration-none" target="_blank" aria-label="Follow Us on TikTok">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="28" height="28"><path fill="currentColor" d="M544.5 273.9C500.5 274 457.5 260.3 421.7 234.7L421.7 413.4C421.7 446.5 411.6 478.8 392.7 506C373.8 533.2 347.1 554 316.1 565.6C285.1 577.2 251.3 579.1 219.2 570.9C187.1 562.7 158.3 545 136.5 520.1C114.7 495.2 101.2 464.1 97.5 431.2C93.8 398.3 100.4 365.1 116.1 336C131.8 306.9 156.1 283.3 185.7 268.3C215.3 253.3 248.6 247.8 281.4 252.3L281.4 342.2C266.4 337.5 250.3 337.6 235.4 342.6C220.5 347.6 207.5 357.2 198.4 369.9C189.3 382.6 184.4 398 184.5 413.8C184.6 429.6 189.7 444.8 199 457.5C208.3 470.2 221.4 479.6 236.4 484.4C251.4 489.2 267.5 489.2 282.4 484.3C297.3 479.4 310.4 469.9 319.6 457.2C328.8 444.5 333.8 429.1 333.8 413.4L333.8 64L421.8 64C421.7 71.4 422.4 78.9 423.7 86.2C426.8 102.5 433.1 118.1 442.4 131.9C451.7 145.7 463.7 157.5 477.6 166.5C497.5 179.6 520.8 186.6 544.6 186.6L544.6 274z"/></svg>
         </a>
      </li>
      <li>
         <a href="#" class="link text-decoration-none" target="_blank" aria-label="Follow Us on LinkedIn-in">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="28" height="28"><path fill="currentColor" d="M196.3 512L103.4 512L103.4 212.9L196.3 212.9L196.3 512zM149.8 172.1C120.1 172.1 96 147.5 96 117.8C96 103.5 101.7 89.9 111.8 79.8C121.9 69.7 135.6 64 149.8 64C164 64 177.7 69.7 187.8 79.8C197.9 89.9 203.6 103.6 203.6 117.8C203.6 147.5 179.5 172.1 149.8 172.1zM543.9 512L451.2 512L451.2 366.4C451.2 331.7 450.5 287.2 402.9 287.2C354.6 287.2 347.2 324.9 347.2 363.9L347.2 512L254.4 512L254.4 212.9L343.5 212.9L343.5 253.7L344.8 253.7C357.2 230.2 387.5 205.4 432.7 205.4C526.7 205.4 544 267.3 544 347.7L544 512L543.9 512z"/></svg>
         </a>
      </li>
      <li>
         <a href="#" class="link text-decoration-none" target="_blank" aria-label="Follow Us on WhatsApp">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="28" height="28"><path fill="currentColor" d="M476.9 161.1C435 119.1 379.2 96 319.9 96C197.5 96 97.9 195.6 97.9 318C97.9 357.1 108.1 395.3 127.5 429L96 544L213.7 513.1C246.1 530.8 282.6 540.1 319.8 540.1L319.9 540.1C442.2 540.1 544 440.5 544 318.1C544 258.8 518.8 203.1 476.9 161.1zM319.9 502.7C286.7 502.7 254.2 493.8 225.9 477L219.2 473L149.4 491.3L168 423.2L163.6 416.2C145.1 386.8 135.4 352.9 135.4 318C135.4 216.3 218.2 133.5 320 133.5C369.3 133.5 415.6 152.7 450.4 187.6C485.2 222.5 506.6 268.8 506.5 318.1C506.5 419.9 421.6 502.7 319.9 502.7zM421.1 364.5C415.6 361.7 388.3 348.3 383.2 346.5C378.1 344.6 374.4 343.7 370.7 349.3C367 354.9 356.4 367.3 353.1 371.1C349.9 374.8 346.6 375.3 341.1 372.5C308.5 356.2 287.1 343.4 265.6 306.5C259.9 296.7 271.3 297.4 281.9 276.2C283.7 272.5 282.8 269.3 281.4 266.5C280 263.7 268.9 236.4 264.3 225.3C259.8 214.5 255.2 216 251.8 215.8C248.6 215.6 244.9 215.6 241.2 215.6C237.5 215.6 231.5 217 226.4 222.5C221.3 228.1 207 241.5 207 268.8C207 296.1 226.9 322.5 229.6 326.2C232.4 329.9 268.7 385.9 324.4 410C359.6 425.2 373.4 426.5 391 423.9C401.7 422.3 423.8 410.5 428.4 397.5C433 384.5 433 373.4 431.6 371.1C430.3 368.6 426.6 367.2 421.1 364.5z"/></svg>
         </a>
      </li>
   </ul>
</nav>`,
      'toggle-language': `<div class="toggle-language d-flex gap-2" role="group" aria-label="Select language">
   <button class="btn btn-sm p-0 rounded-0 border-0 shadow-none active" type="button" aria-pressed="true">English</button>
   <div class="vr" aria-hidden="true"></div>
   <button class="btn btn-sm p-0 rounded-0 border-0 shadow-none" type="button" aria-pressed="false">Indonesia</button>
</div>`,
      'card-product': `<article class="card card-product border-0">
   <div class="card-header ratio ratio-1x1 rounded-0 border-0">
      <img src="images/ex-product-1.png" alt="" class="object-fit-contain top-50 start-50 translate-middle bg-body">
   </div>
   <div class="card-body text-center p-0">
      <h3 class="card-title fs-6 fw-semibold">Sumatra Mandheling</h3>
      <p class="card-text small">Roasted Beans <br> Cans 200g</p>
   </div>
   <a href="products-detail.html" class="stretched-link"><span class="visually-hidden">see detail product</span></a>
</article>`
   };

   const processPlaceholders = async () => {
      const placeholders = Array.from(document.querySelectorAll('[data-component]'))
         .filter((placeholder) => !placeholder.hasAttribute('data-component-processed'));

      if (!placeholders.length) {
         window.componentsLoaded = true;
         window.dispatchEvent(new CustomEvent('components:loaded'));
         return;
      }

      for (const placeholder of placeholders) {
         const name = placeholder.getAttribute('data-component');
         if (!name) continue;

         placeholder.setAttribute('data-component-processed', 'true');

         let htmlContent = null;

         // Try fetching if using http / https protocol
         if (window.location.protocol.startsWith('http')) {
            try {
               const response = await fetch(`components/${name}.html`, { cache: 'no-cache' });
               if (response.ok) {
                  htmlContent = await response.text();
               }
            } catch (err) {
               console.warn(`Fetch failed for ${name}, falling back to embedded component.`);
            }
         }

         // Fallback to embedded component (works for file:// protocol and offline)
         if (!htmlContent && embeddedComponents[name]) {
            htmlContent = embeddedComponents[name];
         }

         if (htmlContent) {
            placeholder.outerHTML = htmlContent;
         } else {
            console.error(`Component ${name} could not be loaded.`);
            placeholder.outerHTML = '<p class="text-danger">component could not be loaded.</p>';
         }
      }

      await processPlaceholders();
   };

   await processPlaceholders();
});