<style>
   .page-footer .nav-link {color: inherit; white-space: nowrap; opacity: .75;}
   .page-footer .nav-link:hover, .page-footer .nav-link:focus-within {opacity: 1;}
   .page-footer .nav-link.active {opacity: 1; font-weight: 600;}
   .navsos-footer .nav-link {font-size: 2rem}

   @media (min-width: 1200px) {
      .page-footer-top .accordion-button {pointer-events: none !important}
      .page-footer-top .accordion-button::after {display: none !important;}

      #footer-newsletter {max-width: 300px;}
   }
</style>
<footer class="page-footer mt-5 py-3 text-bg-custom-1 small">
   <div class="page-footer-top py-5">
      <div class="container d-grid gap-3 d-xl-flex gap-xl-5">
         <article aria-labelledby="header-page-footer" class="d-flex flex-column me-xl-auto">
            <h2 id="header-page-footer" class="visually-hidden">header page footer</h2>
            <img src="{{ asset('images/logo-indraco-invert.png') }}" alt="Logo INDRACO" width="278" height="" class="img-fluid">
            <div class="flex-grow-1">
               <p class="fs-5">Roasting fine exquisite coffee since 1971.</p>
            </div>
            <nav aria-labelledby="sosmed-nav-title" class="navsos-footer">
               <h3 id="sosmed-nav-title" class="visually-hidden">Social media navigation on footer page</h3>
               @include('components.sosmed')
            </nav>
         </article>
         <nav aria-labelledby="nav-page-footer" id="page-footer-nav">
            <h2 id="nav-page-footer" class="visually-hidden">Navigation page footer</h2>
            <ul class="list-unstyled mb-0 accordion accordion-flush d-xl-flex gap-xl-5" data-bs-theme="dark">
               <li class="accordion-item bg-transparent border-0">
                  <h3 class="accordion-header mb-xl-3">
                     <button class="accordion-button bg-transparent shadow-none fs-5 fw-medium px-0 p-xl-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-company" aria-controls="collapse-company" aria-expanded="false">Company</button>
                     <hr class="opacity-75 m-0 my-xl-3 d-none d-xl-block">
                  </h3>
                  <div id="collapse-company" class="accordion-collapse collapse d-xl-block" data-bs-parent="#page-footer-nav">
                     <div class="accordion-body p-xl-0">
                        <ul class="nav d-grid gap-2">
                           <li class="nav-item"><a href="{{ route('home') }}" class="nav-link p-0">Home</a></li>
                           <li class="nav-item"><a href="{{ route('about') }}" class="nav-link p-0">About Us</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}" class="nav-link p-0">Products</a></li>
                           <li class="nav-item"><a href="{{ route('businesses') }}" class="nav-link p-0">Business</a></li>
                           <li class="nav-item"><a href="{{ route('store') }}" class="nav-link p-0">Online Store</a></li>
                           <li class="nav-item"><a href="{{ route('news') }}" class="nav-link p-0">News</a></li>
                           <li class="nav-item"><a href="{{ route('csr') }}" class="nav-link p-0">CSR</a></li>
                           <li class="nav-item"><a href="{{ route('careers') }}" class="nav-link p-0">Careers</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="accordion-item bg-transparent border-0">
                  <h3 class="accordion-header mb-xl-3">
                     <hr class="m-0 my-xl-3 d-xl-none">
                     <button class="accordion-button bg-transparent shadow-none fs-5 fw-medium px-0 p-xl-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-brands" aria-controls="collapse-brands" aria-expanded="false">Brands</button>
                     <hr class="opacity-75 m-0 my-xl-3 d-none d-xl-block">
                  </h3>
                  <div id="collapse-brands" class="accordion-collapse collapse d-xl-block" data-bs-parent="#page-footer-nav">
                     <div class="accordion-body p-xl-0">
                        <ul class="nav d-grid gap-2">
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=supresso" class="nav-link p-0">Supresso</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=balicafe" class="nav-link p-0">BaliCafé</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=ucafe" class="nav-link p-0">UCAFÉ</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=rasa-sayang" class="nav-link p-0">Rasa Sayang</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=tugu-buaya" class="nav-link p-0">Tugu Buaya</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=uang-emas" class="nav-link p-0">Uang Emas</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=brochoco" class="nav-link p-0">BROCHOCO</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=jaheku" class="nav-link p-0">Jaheku</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=intirasa" class="nav-link p-0">intiRasa</a></li>
                           <li class="nav-item"><a href="{{ route('products.index') }}?brand=haocafe" class="nav-link p-0">Hao Cafe</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
               <li class="accordion-item bg-transparent border-0">
                  <h3 class="accordion-header mb-xl-3">
                     <hr class="m-0 my-xl-3 d-xl-none">
                     <button class="accordion-button bg-transparent shadow-none fs-5 fw-medium px-0 p-xl-0 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-support" aria-controls="collapse-support" aria-expanded="false">Support</button>
                     <hr class="opacity-75 m-0 my-xl-3 d-none d-xl-block">
                  </h3>
                  <div id="collapse-support" class="accordion-collapse collapse d-xl-block" data-bs-parent="#page-footer-nav">
                     <div class="accordion-body p-xl-0">
                        <ul class="nav d-grid gap-2">
                           <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link p-0">Contact Us</a></li>
                           <li class="nav-item"><a href="{{ route('downloads') }}" class="nav-link p-0">Downloads</a></li>
                        </ul>
                     </div>
                  </div>
               </li>
            </ul>
            <hr class="m-0 d-lg-none">
         </nav>
         <section id="footer-newsletter">
            <h3 class="fs-5 mb-3">Newsletter</h3>
            <hr class="opacity-75 d-none d-xl-block">
            <form>
               <label class="form-label mb-4 fs-6" for="subscribe">Subscribe to get the latest updates from Indraco</label>
               <div class="input-group text-bg-light p-1 rounded-pill overflow-hidden">
                  <input class="form-control bg-transparent border-0 shadow-none text-dark" type="email" name="subscribe" id="subscribe" placeholder="Enter your email address" autocomplete="email" required>
                  <button class="btn text-bg-custom2 rounded-pill opacity-100" type="submit">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="21" height="21"><path fill="currentColor" d="M566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L406.6 137.3C394.1 124.8 373.8 124.8 361.3 137.3C348.8 149.8 348.8 170.1 361.3 182.6L466.7 288L96 288C78.3 288 64 302.3 64 320C64 337.7 78.3 352 96 352L466.7 352L361.3 457.4C348.8 469.9 348.8 490.2 361.3 502.7C373.8 515.2 394.1 515.2 406.6 502.7L566.6 342.7z"></path></svg>
                     <span class="visually-hidden">Subscribe to newsletter</span>
                  </button>
               </div>
            </form>
         </section>
      </div>
   </div>
   <hr>
   <div class="page-footer-bottom">
      <div class="container d-xl-flex flex-wrap gap-3">
         <p class="text-muted order-xl-2">&copy; {{ date('Y') }} INDRACO. All rights reserved</p>
         <nav aria-labelledby="legal-nav-title" class="order-xl-1 flex-grow-1 mb-3">
            <h2 id="legal-nav-title" class="visually-hidden">Legal navigation</h2>
            <ul class="nav gap-2">
               <li class="nav-item"><a href="{{ route('privacy-policy') }}" class="nav-link p-0">Privacy Policy</a></li>
               <li class="nav-item vr" aria-hidden="true"></li>
               <li class="nav-item"><a href="{{ route('terms-conditions') }}" class="nav-link p-0">Terms & Conditions</a></li>
               <li class="nav-item vr" aria-hidden="true"></li>
               <li class="nav-item"><a href="{{ route('data-protection') }}" class="nav-link p-0">Information On Data Protection</a></li>
               <li class="nav-item vr" aria-hidden="true"></li>
               <li class="nav-item"><a href="{{ route('help') }}" class="nav-link p-0">Help</a></li>
               <li class="nav-item vr" aria-hidden="true"></li>
               <li class="nav-item"><a href="{{ route('admin.login') }}" class="nav-link p-0">Admin Login</a></li>
               <li class="nav-item vr" aria-hidden="true"></li>
            </ul>
         </nav>
      </div>
   </div>
</footer>