<style>
   :root {
      --menu-header-bbtn-width: 40px;
   }

   .menu {
      position: fixed;
      top: 0;
      right: 0;
      z-index: 1030;
   }

   .menu-wrapper {
      background-color: rgba(var(--bs-body-bg-rgb), 0.875);
      backdrop-filter: blur(2rem);
      border-radius: calc(calc(var(--menu-header-bbtn-width) + .5rem) / 2);
   }

   .menu-header-btn {
      padding: .25rem;
      width: var(--menu-header-bbtn-width);
      height: var(--menu-header-bbtn-width);
      border-radius: calc(var(--menu-header-bbtn-width) / 2);
      background-color: color-mix(in srgb, var(--custom-color-1), var(--bs-white) 12.5%) !important;
      border-width: 0 !important;
      box-shadow: none !important;
      color: var(--bs-white);
      display: flex;
      justify-content: center;
      align-items: center;
   }

   .menu-header .toggle-language .btn {
      color: var(--bs-white);
   }

   .toggle-language .btn.active {
      opacity: .5 !important;
   }

   .icon-bars {
      display: none;
   }

   .icon-xmark {
      display: inline;
   }

   .collapsed .icon-bars {
      display: inline;
   }

   .collapsed .icon-xmark {
      display: none;
   }

   .menu-body .nav-link {
      width: auto;
      padding: 0;
      color: inherit;
      opacity: .75;
   }

   .menu-body .nav-link:hover,
   .menu-body .nav-link:focus-within {
      opacity: 1;
   }

   .menu-body .nav-link.active {
      opacity: 1;
      font-weight: 600;
   }
</style>

<nav class="menu m-2 m-lg-4 p-md-1" aria-labelledby="navbar-title">
   <h2 id="navbar-title" class="menu-title visually-hidden">Main navigation</h2>
   <div class="menu-wrapper container-fluid p-1 shadow">

      <div class="menu-header text-bg-custom1 p-1 rounded-pill">
         <ul class="menu-header-list nav justify-content-between align-items-center gap-2 gap-md-3">
            <li class="menu-header-item">
               <button class="main-menu-toggle menu-header-btn btn collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navcol" aria-controls="navcol" aria-expanded="false">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="21" height="21">
                     <!-- icon bars -->
                     <g class="icon-bars"><path fill="currentColor" d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z"></path></g>
                     <!-- icon xmark -->
                     <g class="icon-xmark"><path fill="currentColor" d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"></path></g>
                  </svg>
                  <span class="visually-hidden">Toggle main menu</span>
               </button>
            </li>
            <li class="menu-header-item d-none d-md-block">
               @include('components.toggle-language')
            </li>
            <li class="menu-header-item">
               <button class="modal-search-toggle menu-header-btn btn" type="button" data-bs-toggle="modal" data-bs-target="#modal-search">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="21" height="21"><path fill="currentColor" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"></path></svg>
                  <span class="visually-hidden">Open search modal dialog</span>
               </button>
            </li>
            <li class="menu-header-item">
               <button class="theme-toggle menu-header-btn btn" type="button">
                  <svg viewBox="0 0 24 24" fill="none" aria-hidden="true" width="21" height="21" class="theme-icon">
                     {{-- icon sun --}}
                     <g class="icon-sun"><circle cx="12" cy="12" r="5" fill="currentColor"></circle><g stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="4"></line><line x1="12" y1="20" x2="12" y2="23"></line><line x1="1" y1="12" x2="4" y2="12"></line><line x1="20" y1="12" x2="23" y2="12"></line><line x1="4.2" y1="4.2" x2="6.3" y2="6.3"></line><line x1="17.7" y1="17.7" x2="19.8" y2="19.8"></line><line x1="4.2" y1="19.8" x2="6.3" y2="17.7"></line><line x1="17.7" y1="6.3" x2="19.8" y2="4.2"></line></g></g>
                     {{-- icon moon --}}
                     <g class="icon-moon"><path d="M21 12.8A9 9 0 1111.2 3 a7 7 0 109.8 9.8z" fill="currentColor"></path></g>
                  </svg>
                  <span class="visually-hidden">Toggle color theme</span>
               </button>
            </li>
         </ul>
      </div>

      <div id="navcol" class="menu-collapse collapse">
         <div class="menu-body p-3">
            <ul class="menu-body-list list-unstyled mb-0 d-grid row-gap-4">
               <li class="menu-body-item">
                  <h3 class="fs-6 opacity-50"><small>Menu</small></h3>
                  <hr class="my-2">
                  <ul class="nav d-grid grid-cols-2 gap-2">
                     <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                     <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About Us</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link">Products</a></li>
                     <li class="nav-item"><a href="{{ route('businesses') }}" class="nav-link">Business</a></li>
                     <li class="nav-item"><a href="{{ route('store') }}" class="nav-link">Online Store</a></li>
                     <li class="nav-item"><a href="{{ route('news') }}" class="nav-link">News</a></li>
                     <li class="nav-item"><a href="{{ route('csr') }}" class="nav-link">CSR</a></li>
                     <li class="nav-item"><a href="{{ route('careers') }}" class="nav-link">Careers</a></li>
                     <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact Us</a></li>
                     <li class="nav-item"><a href="{{ route('downloads') }}" class="nav-link">Downloads</a></li>
                  </ul>
               </li>
               <li class="menu-body-item">
                  <h3 class="fs-6 opacity-50"><small>Our Brands</small></h3>
                  <hr class="my-2">
                  <ul class="nav d-grid grid-cols-2 gap-2">
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=supresso" class="nav-link">Supresso</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=balicafe" class="nav-link">BaliCafé</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=ucafe" class="nav-link">UCAFÉ</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=rasa-sayang" class="nav-link">Rasa Sayang</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=tugu-buaya" class="nav-link">Tugu Buaya</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=uang-emas" class="nav-link">Uang Emas</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=brochoco" class="nav-link">BROCHOCO</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=jaheku" class="nav-link">Jaheku</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=intirasa" class="nav-link">intiRasa</a></li>
                     <li class="nav-item"><a href="{{ route('products.index') }}?brand=haocafe" class="nav-link">Hao Cafe</a></li>
                  </ul>
               </li>
               <li class="menu-body-item">
                  <h3 class="fs-6 opacity-50"><small>Others</small></h3>
                  <hr class="my-2">
                  <ul class="nav d-grid gap-2">
                     <li class="nav-item d-md-none">@include('components.toggle-language')</li>
                     <li class="nav-item"><a href="{{ route('privacy-policy') }}" class="nav-link"><small>Privacy Policy</small></a></li>
                     <li class="nav-item"><a href="{{ route('terms-conditions') }}" class="nav-link"><small>Terms &amp; Conditions</small></a></li>
                     <li class="nav-item"><a href="{{ route('data-protection') }}" class="nav-link"><small>Information On Data Protection</small></a></li>
                     <li class="nav-item"><a href="{{ route('help') }}" class="nav-link"><small>Help</small></a></li>
                  </ul>
               </li>
            </ul>
         </div>
      </div>

   </div>
</nav>
