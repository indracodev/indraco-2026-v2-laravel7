@extends('layouts.app')

@section('title', 'Contact us at INDRACO')

@push('styles')
   <style>
      .form-control,
      .form-select {
         border-radius: 18.8px;
      }

      .bullet-list {
         padding-left: 20px;
         list-style-position: outside;
      }

      .bullet-list li {
         display: list-item;
         margin-bottom: 16px;
      }

      .bullet-list li strong {
         display: block;
      }

      .bullet-list li a {
         display: block;
      }

      .bullet-list>*::marker {
         content: '● ';
         font-size: 1.2em;
         font-family: Arial, Helvetica, sans-serif;
      }
   </style>
@endpush

@section('content')
   <section class="banner overflow-hidden">
      <div class="container-sm">
         <div class="row g-0">
            <div class="col-12">
               <h1 id="section-banner-title" class="banner-title z-0">CONTACT US</h1>
            </div>
            <div class="col-7 z-2">
               <p class="banner-text lh-sm m-0">Let's Talk About Your Business Needs.</p>
            </div>
            <div class="col-5 col-xxl-4 z-1">
               <div class="banner-media ratio ratio-1x1">
                  <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                     <div class="ratio ratio-1x1 w-100">
                        <img src="{{ asset('images/icon-contact.png') }}" alt="" aria-hidden="true" loading="lazy"
                           class="object-fit-contain">
                     </div>
                  </div>
                  <div class="pedestal h-auto top-50 start-50 z-0">
                     <div class="pedestal-wrapper ratio ratio-4x3 w-100">
                        <div class="pedestal-top"></div>
                        <div class="pedestal-body"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-auto ms-auto z-3">
               <nav aria-labelledby="banner-sosmed-title" class="banner-navsos">
                  <h2 id="banner-sosmed-title" class="visually-hidden">Social media navigation on page banner</h2>
                  @include('components.sosmed')
               </nav>
            </div>
         </div>
      </div>
   </section>

   <div class="container">
      <!-- Info Kontak -->
      <section class="bg-body-secondary rounded-4 p-4 p-lg-5 mb-5" aria-labelledby="info-title">
         <h2 id="info-title" class="text-title fs-3 fw-semibold mb-4">CONTACT US</h2>

         <div class="row gy-4 gx-lg-5 justify-content-lg-between">
            <!-- Main Address -->
            <div class="col-12 col-md-6 col-lg-4">
               <h3 class="fs-5 mb-3">PT. Indraco Global Indonesia</h3>
               <address class="mb-0 fs-6 lh-base text-muted">
                  <a href="https://maps.app.goo.gl/GPLn5ddomaxWrH7R6" target="_blank" rel="noopener noreferrer"
                     class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">
                     Jl. Semeru No. 133-135 Bambe, Kec. Driyorejo, Gresik 61177 Jawa Timur - Indonesia
                     <span class="visually-hidden">(opens in a new tab)</span>
                  </a>
                  <br><br>
                  <strong>T</strong>. <a href="tel:+62317668777"
                     class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">+62 31 766 8777</a>,
                  <a href="tel:+62317667388"
                     class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">+62 31 766 7388</a>
                  <br>
                  <strong>F</strong>. +62 31 766 9590
                  <br>
                  <strong>E</strong>. <a href="mailto:info@indraco.com"
                     class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">info@indraco.com</a>
                  <br><br>
                  <a href="https://indracocoffee.com/" target="_blank" rel="noopener"
                     class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">
                     www.indracocoffee.com <span class="visually-hidden">(opens in a new tab)</span>
                  </a>
               </address>
            </div>

            <!-- Domectic Seelers -->
            <div class="col-12 col-md-6 col-lg-auto">
               <h3 class="fs-5 mb-3">Sales Contacts Domestic</h3>
               <ul class="bullet-list lh-lg">
                  <li>
                     <strong>General Trade :</strong>
                     <a href="mailto:getra@indraco.com"
                        class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">getra@indraco.com</a>
                  </li>
                  <li>
                     <strong>Modern Trade :</strong>
                     <a href="mailto:motra@indraco.com"
                        class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">motra@indraco.com</a>
                  </li>
                  <li>
                     <strong>eCommerce :</strong>
                     <a href="mailto:ecom@indraco.com"
                        class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">ecom@indraco.com</a>
                  </li>
                  <li>
                     <strong>Foodservice :</strong>
                     <a href="mailto:fopro@indraco.com"
                        class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">fopro@indraco.com</a>
                  </li>
                  <li>
                     <strong>F&B Services :</strong>
                     <a href="mailto:fobev@indraco.com"
                        class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">fobev@indraco.com</a>
                  </li>
               </ul>
            </div>

            <!-- International -->
            <div class="col-12 col-md-6 col-lg-auto">
               <h3 class="fs-5 mb-3">International</h3>
               <ul class="bullet-list lh-lg">
                  <li>
                     <strong>International Business :</strong>
                     <a href="mailto:inbus@indraco.com"
                        class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">inbus@indraco.com</a>
                  </li>
               </ul>
            </div>
         </div>
      </section>

      <!-- Contact Form -->
      <section class="mb-5" aria-labelledby="form-title">
         <h2 id="form-title" class="text-title fs-3 fw-semibold mb-4">CONTACT FORM</h2>
         <p class="text-muted">
            Silakan gunakan formulir di bawah ini untuk menghubungi PT. Indraco Global Indonesia dan kami akan menghubungi
            Anda sesegera mungkin.
            <br><br>
            Jika pertanyaan Anda terkait dengan pekerjaan, silakan kunjungi pusat karier kami, atau gunakan pemilih lokasi
            untuk menemukan situs web yang paling relevan dengan lokasi Anda.
         </p>
         <hr class="my-4">
         <form action="#" method="POST" class="row g-3 gx-lg-5">
            @csrf
            <div class="col-12 col-lg-6">
               <div class="row g-3">
                  <!-- Form Group: First Name -->
                  <div class="col-12 col-md-6">
                     <label for="first-name" class="form-label">First Name <span class="text-danger"
                           aria-hidden="true">*</span></label>
                     <input type="text" id="first-name" name="first-name" class="form-control bg-body-secondary"
                        required aria-required="true">
                  </div>
                  <!-- Form Group: Last Name -->
                  <div class="col-12 col-md-6">
                     <label for="last-name" class="form-label">Last Name <span class="text-danger"
                           aria-hidden="true">*</span></label>
                     <input type="text" id="last-name" name="last-name" class="form-control bg-body-secondary" required
                        aria-required="true">
                  </div>
                  <!-- Form Group: Email -->
                  <div class="col-12">
                     <label for="email" class="form-label">Email Address <span class="text-danger"
                           aria-hidden="true">*</span></label>
                     <input type="email" id="email" name="email" class="form-control bg-body-secondary"
                        required aria-required="true">
                  </div>
                  <!-- Form Group: Phone Number -->
                  <div class="col-12">
                     <label id="phone-label" class="form-label">Phone Number <span class="text-danger"
                           aria-hidden="true">*</span></label>
                     <div class="input-group gap-3" role="group" aria-labelledby="phone-label">
                        <div style="max-width: 100px;">
                           <label for="country-code" class="visually-hidden">Country Code</label>
                           <select id="country-code" name="country-code"
                              class="form-select bg-body-secondary rounded-pill" required aria-required="true">
                              <option value="+62">+62</option>
                              <option value="+65">+65</option>
                           </select>
                        </div>
                        <input type="tel" id="phone-number" name="phone-number"
                           class="form-control bg-body-secondary rounded-pill" required aria-required="true">
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-12 col-lg-6 form-group d-lg-flex flex-column">
               <label for="message" class="form-label">Your Message <span class="text-danger"
                     aria-hidden="true">*</span></label>
               <textarea id="message" name="message" rows="5" class="form-control bg-body-secondary flex-grow-1" required
                  aria-required="true"></textarea>
            </div>

            <div class="col mt-5">
               <div class="row align-items-center">
                  <div class="col-12 col-lg">
                     <div class="form-check">
                        <input class="form-check-input rounded-circle" type="checkbox" name="approval"
                           id="approval-contact" required aria-required="true">
                        <label class="form-check-label" for="approval-contact">
                           Ya - saya menyatakan bahwa saya berusia di atas 16 tahun. Dengan mengirimkan formulir ini, Anda
                           menyetujui Syarat dan Ketentuan dan telah membaca pemberitahuan privasi <span
                              class="text-danger" aria-hidden="true">*</span>.
                        </label>
                     </div>
                  </div>
                  <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                     <button type="submit" class="btn btn-lg rounded-pill text-bg-custom1 w-100 px-5">SEND</button>
                  </div>
               </div>
            </div>
         </form>
      </section>
   </div>
@endsection
