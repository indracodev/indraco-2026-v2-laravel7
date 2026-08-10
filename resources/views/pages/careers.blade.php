@extends('layouts.app')

@section('title', 'INDRACO – Careers')

@section('content')
<main id="content" tabindex="-1">

   <!-- Section Banner -->
   <section aria-label="section banner" class="section-banner mb-5">
      <div class="container-sm banner">
         <div class="row banner-wrapper align-items-center">
            <div class="col col-12 z-0">
               <h2 class="banner-title">CAREERS</h2><!-- end banner title -->
            </div>
            <div class="col col-6 z-2">
               <h3 class="banner-text">Empowering Careers Through Innovation and Collaboration.</h3><!-- end banner text -->
            </div>
            <div class="col col-6 col-xxl-5 ms-auto z-1">
               <div class="banner-media">
                  <div class="banner-images-wrapper">
                     <img src="{{ asset('images/icon-career.png') }}" alt="" class="banner-images"><!-- end banner images -->
                  </div><!-- end banner images wrapper -->
                  <div class="pedestal z-0">
                     <div class="pedestal-wrapper">
                        <div class="pedestal-top"></div><!-- pedestal top -->
                        <div class="pedestal-body"></div><!-- pedestal body -->
                     </div><!-- end pedestal wrapper -->
                  </div><!-- end pedestal -->
               </div><!-- end banner media -->
            </div>
            <div class="col col-12 z-3">
               <div class="banner-sosmed d-flex justify-content-center justify-content-lg-end">
                  <x-sosmed />
               </div><!-- end banner sosmed -->
            </div>
         </div><!-- end banner wrapper -->
      </div><!-- end banner -->
   </section><!-- end section banner -->

   <!-- Section Job Vacancy Out Portals -->
   <section aria-label="careers out section" class="container mb-5">
      <div class="bg-body-secondary px-4 py-5 p-lg-5 rounded-4 overflow-hidden">
         <h2 class="fs-3 fw-semibold mb-4">JOB VACANCY</h2>
         <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-xl-4">
            <div class="col">
               <a href="https://id.jobstreet.com/id/companies/indraco-168551422470741" target="_blank" class="text-reset text-decoration-none">
                  <article class="ratio ratio-16x9 rounded-4 card p-4 shadow overflow-hidden">
                     <img src="{{ asset('images/JobS.png') }}" data-light="{{ asset('images/JobS.png') }}" data-dark="{{ asset('images/JobS-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image object-fit-contain w-75 h-75 top-50 start-50 translate-middle">
                  </article>
               </a>
            </div>
            <div class="col">
               <a href="https://www.linkedin.com/company/indraco-group/posts/?feedView=all" target="_blank" class="text-reset text-decoration-none">
                  <article class="ratio ratio-16x9 rounded-4 card p-4 shadow overflow-hidden">
                     <img src="{{ asset('images/LinkedIn.png') }}" data-light="{{ asset('images/LinkedIn.png') }}" data-dark="{{ asset('images/LinkedIn-invert.png') }}" alt="" aria-hidden="true" loading="lazy" class="theme-image object-fit-contain w-75 h-75 top-50 start-50 translate-middle">
                  </article>
               </a>
            </div>
         </div>
      </div>
   </section><!-- end brochures section -->

   <!-- Section Careers Header List (Optional Template Section) -->
   <section aria-label="careers header section" class="container mb-5 d-none">
      <div class="bg-body-secondary px-4 py-5 p-lg-5 rounded-4 overflow-hidden">
         <h2 class="fs-3 fw-semibold mb-4">JOB VACANCY</h2>
         <ul class="list-unstyled row brochure-list row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 mb-0">
            <li class="brochure-item">
               <div class="card careers-card rounded-4 overflow-hidden shadow d-flex flex-column h-100 p-4">
                  <h3 class="card-title fs-5 flex-grow-1 mb-3">Area Sales &amp; Promotion Supervisor</h3>
                  <p class="card-text mb-0 d-flex align-items-center gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="16" height="16"><path fill="currentColor" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                     <small>Surabaya, Jawa Timur</small>
                  </p>
                  <a href="#" class="stretched-link"></a>
               </div>
            </li>
            <li class="brochure-item">
               <div class="card careers-card rounded-4 overflow-hidden shadow d-flex flex-column h-100 p-4">
                  <h3 class="card-title fs-5 flex-grow-1 mb-3">Human Capital Services Manager</h3>
                  <p class="card-text mb-0 d-flex align-items-center gap-2">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true" width="16" height="16"><path fill="currentColor" d="M128 252.6C128 148.4 214 64 320 64C426 64 512 148.4 512 252.6C512 371.9 391.8 514.9 341.6 569.4C329.8 582.2 310.1 582.2 298.3 569.4C248.1 514.9 127.9 371.9 127.9 252.6zM320 320C355.3 320 384 291.3 384 256C384 220.7 355.3 192 320 192C284.7 192 256 220.7 256 256C256 291.3 284.7 320 320 320z"/></svg>
                     <small>Sidoarjo, Jawa Timur</small>
                  </p>
                  <a href="#" class="stretched-link"></a>
               </div>
            </li>
         </ul>
      </div>
   </section><!-- end brochures section -->

</main>
@endsection
