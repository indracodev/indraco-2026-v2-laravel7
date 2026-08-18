@extends('layouts.app')

@section('title', 'Contact us at INDRACO')

@push('styles')
{{-- <style>* {outline: solid 1px green};</style> --}}
<style>
   .form-control, .form-select {border-radius: 18.8px;}
</style>
@endpush

@section('content')
<section class="banner overflow-hidden">
   <div class="container-sm">
      <div class="row g-0">
         <div class="col-12">
            <h2 id="section-banner-title" class="banner-title z-0">CONTACT US</h2>
         </div>
         <div class="col-7 z-2">
            <p class="banner-text lh-sm m-0">Let's Talk About Your Business Needs.</p>
         </div>
         <div class="col-5 col-xxl-4 z-1">
            <div class="banner-media ratio ratio-1x1">
               <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                  <div class="ratio ratio-1x1 w-100">
                     <img src="{{ asset('images/icon-contact.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain">
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
               <h3 id="banner-sosmed-title" class="visually-hidden">Social media navigation on page banner</h3>
               @include('components.sosmed')
            </nav>
         </div>
      </div>
   </div>
</section>

<section class="container" aria-labelledby="contact-title">
   <h2 id="contact-title" class="visually-hidden">CONTACT INFO & FORM</h2>

   <section class="bg-body-secondary rounded-4 p-4 p-lg-5 mb-5">
      <h3 class="text-title fs-3 fw-semibold mb-4">CONTACT US</h3>
      <address>
         <ul class="list-unstyled row gy-4 gx-lg-5 justify-content-lg-between">
            <li class="col-12 col-md-6 col-lg-4">
               <h3 class="fs-5 mb-3">PT. Indraco Global Indonesia</h3>
               <p>
                  <a href="https://maps.app.goo.gl/GPLn5ddomaxWrH7R6" target="_blank" rel="noopener noreferrer" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">
                     Jl. Semeru No. 133-135 Bambe, Kec. Driyorejo, Gresik 61177 Jawa Timur - Indonesia
                  </a>
                  <br><br>
                  <b>T</b>. <a href="tel:+62317668777" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">+62 31 766 8777</a>, <a href="tel:+62317667388" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">+62 31 766 7388 </a>
                  <br>
                  <b>F</b>. <a href="fax:+62317669590" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">+62 31 766 9590</a>
                  <br>
                  <b>E</b>. <a href="mailto:info@indraco.com" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">info@indraco.com</a>
                  <br><br>
                  <a href="https://indracocoffee.com/" target="_blank" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">www.indracocoffee.com</a>
               </p>
            </li>
            <li class="col-12 col-md-6  col-lg-auto">
               <h3 class="fs-5 mb-3">Sales Contacts Domestic</h3>
               <ul class="list-bullet">
                  <li>
                     <b>General Trade :</b><br>
                     <a href="mailto:getra@indraco.com" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">getra@indraco.com</a>
                  </li>
                  <li>
                     <b>Modern Trade :</b><br>
                     <a href="mailto:motra@indraco.com" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">motra@indraco.com</a>
                  </li>
                  <li>
                     <b>eCommerce :</b><br>
                     <a href="mailto:ecom@indraco.com" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">ecom@indraco.com</a>
                  </li>
                  <li>
                     <b>Foodservice :</b><br>
                     <a href="mailto:fopro@indraco.com" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">fopro@indraco.com</a>
                  </li>
                  <li>
                     <b>F&B Services :</b><br>
                     <a href="mailto:fobev@indraco.com" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">fobev@indraco.com</a>
                  </li>
               </ul>
            </li>
            <li class="col-12 col-md-6  col-lg-auto">
               <h3 class="fs-5 mb-3">International</h3>
               <ul class="list-bullet">
                  <li>
                     <b>International :</b><br>
                     <a href="mailto:inbus@indraco.com" class="link-body-emphasis link-underline-opacity-50-hover text-decoration-none">inbus@indraco.com</a>
                  </li>
               </ul>
            </li>
         </ul>
      </address>
   </section>

   <section class="mb-5">
      <h3 class="text-title fs-3 fw-semibold mb-4">CONTACT FORM</h3>
      <p>
         Silakan gunakan formulir di bawah ini untuk menghubungi PT. Indraco Global Indonesia dan kami akan menghubungi Anda sesegera mungkin.
         <br><br>
         Jika pertanyaan Anda terkait dengan pekerjaan, silakan kunjungi pusat karier kami, atau gunakan pemilih lokasi untuk menemukan situs web yang paling relevan dengan lokasi Anda. Jika lokasi Anda tidak memiliki situs web lokal, silakan gunakan formulir kontak umum di bawah ini. 
      </p>
      <hr>
      <form action="" class="row g-3 gx-lg-5">
         <div class="col-12 col-lg-6">
            <div class="row g-3">
               <div class="col-12 col-md-6 form-group">
                  <label for="first-name" class="form-label">First Name*</label>
                  <input type="text" id="first-name" name="first-name" class="form-control bg-body-secondary">
               </div>
               <div class="col-12 col-md-6 form-group">
                  <label for="last-name" class="form-label">Last Name*</label>
                  <input type="text" id="last-name" name="last-name" class="form-control bg-body-secondary">
               </div>
               <div class="col-12 form-group">
                  <label for="email" class="form-label">Email Address*</label>
                  <input type="email" id="email" name="email" class="form-control bg-body-secondary">
               </div>
               <div class="col-12">
                  <div class="row g-2">
                     <div class="col-auto form-group">
                        <label for="country-code" class="form-label">CC*</label>
                        <select name="" id="kode negara" class="form-select bg-body-secondary">
                           <option value="1">+62</option>
                           <option value="2">+85</option>
                        </select>
                     </div>
                     <div class="col form-group">
                        <label for="phone-number" class="form-label">Phone Number*</label>
                        <input type="number" id="phone-number" name="phone-number" class="form-control bg-body-secondary">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 col-lg-6 form-group d-lg-flex flex-column">
            <label for="message" class="form-label">Your Message*</label>
            <textarea id="message" name="message" rows="5" class="form-control bg-body-secondary flex-grow-1"></textarea>
         </div>
         <div class="col mt-5">
            <div class="row">
               <div class="col-12 col-lg">
                  <div class="form-check">
                     <input class="form-check-input" type="radio" name="radioDefault" id="approval-contact">
                     <label class="form-check-label" for="approval-contact">
                        Ya - saya menyatakan bahwa saya berusia di atas 16 tahun. Dengan mengirimkan formulir ini, Anda menyetujui Syarat dan Ketentuan dan telah membaca pemberitahuan privasi*.
                     </label>
                  </div>
               </div>
               <div class="col-12 col-lg-auto">
                  <button type="submit" class="btn btn-lg rounded-pill text-bg-custom1 w-100 px-5">SEND</button>
               </div>
            </div>
         </div>
      </form>
   </section>
</section>
@endsection
