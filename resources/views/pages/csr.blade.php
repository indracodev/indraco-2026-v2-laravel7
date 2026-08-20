@extends('layouts.app')

@section('title', "INDRACO Corporate Social Responsibility")

@push('styles')
   <link rel="stylesheet" href="{{ asset('css/multi-slide.css') }}">
@endpush

@push('scripts')
   <script src="{{ asset('js/multi-slide.js') }}"></script>
@endpush

@section('content')
   <section class="banner overflow-hidden">
      <div class="container-sm">
         <div class="row g-0">
            <div class="col-12">
               <h1 id="section-banner-title" class="banner-title z-0">
                  <img src="{{ asset('images/logo-Indraco-life.png') }}"
                     data-light="{{ asset('images/logo-Indraco-life.png') }}"
                     data-dark="{{ asset('images/logo-Indraco-life-invert.png') }}" alt="" aria-hidden="true"
                     loading="lazy" class="theme-image img-fluid">
                  <span class="visually-hidden">INDRACO Life</span>
               </h1>
            </div>
            <div class="col-7 z-2">
               <p class="banner-text lh-sm m-0">Building a better future through responsibility and sustainability.</p>
            </div>
            <div class="col-5 col-xxl-4 z-1">
               <div class="banner-media ratio ratio-1x1">
                  <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                     <div class="ratio ratio-1x1 w-100">
                        <img src="{{ asset('images/csr-header.png') }}" alt="" aria-hidden="true" loading="lazy"
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

   <section class="container mb-5" aria-labelledby="csr-commitment">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <div class="row g-4 g-lg-5">
            <div class="col-12 col-lg-6 order-lg-2 col-xxl-5 ms-xxl-auto">
               <div class="ratio ratio-16x9 overflow-auto rounded-4">
                  <img src="{{ asset('images/home-about.jpg') }}" alt="" aria-hidden="true" loading="lazy"
                     class="object-fit-cover">
               </div>
            </div>
            <div class="col-12 col-lg-6 order-lg-1">
               <h2 id="csr-commitment" class="text-title fs-3 fw-semibold mb-0">OUR COMMITMENT</h2>
               <p class="fs-2 text-muted mb-4">Growing Together, Responsibly.</p>
               <p>For more than five decades, sustainability has been an integral part of how we operate. We continuously
                  seek meaningful ways to support people, protect the environment, and create long-term value for future
                  generations.</p>
            </div>
         </div>
      </div>
   </section>

   <section class="container mb-5" aria-labelledby="csr-pillars">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <h2 id="csr-pillars" class="text-title fs-3 fw-semibold mb-0">CSR PILLARS</h2>
         <p class="fs-2 text-muted mb-4">Three Pillars of Sustainability.</p>
         <ul class="list-unstyled row">
            <li class="col-12 col-xl">
               <div class="csr-pillars-item">
                  <div class="row g-3 align-items-md-center">
                     <div class="col-8 mx-auto col-md-5">
                        <div class="ratio ratio-1x1">
                           <img src="{{ asset('images/csr-environment.png') }}" alt="" aria-hidden="true"
                              loading="lazy" class="object-fit-contain">
                        </div>
                     </div>
                     <div class="col-12 col-md-7">
                        <h3 class="fs-4">Environment</h3>
                        <p>Committed to using resources responsibly while supporting a more sustainable future.</p>
                     </div>
                  </div>
               </div>
            </li>
            <li class="col-12 col-xl-auto" aria-hidden="true">
               <hr class="d-xl-none">
               <div class="vr h-100 d-none d-xl-block"></div>
            </li>
            <li class="col-12 col-xl">
               <div class="csr-pillars-item">
                  <div class="row g-3 align-items-md-center">
                     <div class="col-8 mx-auto col-md-5">
                        <div class="ratio ratio-1x1">
                           <img src="{{ asset('images/csr-people.png') }}" alt="" aria-hidden="true" loading="lazy"
                              class="object-fit-contain">
                        </div>
                     </div>
                     <div class="col-12 col-md-7">
                        <h3 class="fs-4">People</h3>
                        <p>Creating opportunities for employees, farmers, and surrounding communities.</p>
                     </div>
                  </div>
               </div>
            </li>
            <li class="col-12 col-xl-auto" aria-hidden="true">
               <hr class="d-xl-none">
               <div class="vr h-100 d-none d-xl-block"></div>
            </li>
            <li class="col-12 col-xl">
               <div class="csr-pillars-item">
                  <div class="row g-3 align-items-md-center">
                     <div class="col-8 mx-auto col-md-5">
                        <div class="ratio ratio-1x1">
                           <img src="{{ asset('images/csr-governance.png') }}" alt="" aria-hidden="true"
                              loading="lazy" class="object-fit-xl-contain">
                        </div>
                     </div>
                     <div class="col-12 col-md-7">
                        <h3 class="fs-4">Governance</h3>
                        <p>Building trust through ethical leadership and transparent operations.</p>
                     </div>
                  </div>
               </div>
            </li>
         </ul>
      </div>
   </section>

   <section class="container mb-5" aria-labelledby="csr-featured">
      <h2 id="csr-featured" class="text-title fs-3 fw-semibold mb-0">FEATURED PROGRAMS</h2>
      <p class="fs-2 text-muted mb-4">Making A Difference Every Day.</p>
      <ul class="list-unstyled row g-4 row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xxl-4">
         <li class="col">
            <div class="card border-0 bg-body-tertiary rounded-4 overflow-hidden shadow text-center h-100">
               <div class="card-header bg-transparent border-0">
                  <div class="w-75 mx-auto ratio ratio-1x1">
                     <img src="{{ asset('images/csr-growth.png') }}" alt="" aria-hidden="true" loading="lazy"
                        class="card-img object-fit-xl-contain">
                  </div>
               </div>
               <div class="card-body">
                  <h3 class="card-title fs-4">Growth Support</h3>
                  <p class="card-text">Supporting growth through CSR programs and live activities.</p>
               </div>
            </div>
         </li>
         <li class="col">
            <div class="card border-0 bg-body-tertiary rounded-4 overflow-hidden shadow text-center h-100">
               <div class="card-header bg-transparent border-0">
                  <div class="w-75 mx-auto ratio ratio-1x1">
                     <img src="{{ asset('images/csr-community.png') }}" alt="" aria-hidden="true"
                        loading="lazy" class="card-img object-fit-xl-contain">
                  </div>
               </div>
               <div class="card-body">
                  <h3 class="card-title fs-4">Community Empowerment</h3>
                  <p class="card-text">Empowering local communities and preserving cultural heritage through community
                     events.</p>
               </div>
            </div>
         </li>
         <li class="col">
            <div class="card border-0 bg-body-tertiary rounded-4 overflow-hidden shadow text-center h-100">
               <div class="card-header bg-transparent border-0">
                  <div class="w-75 mx-auto ratio ratio-1x1">
                     <img src="{{ asset('images/csr-good-people.png') }}" alt="" aria-hidden="true"
                        loading="lazy" class="card-img object-fit-xl-contain">
                  </div>
               </div>
               <div class="card-body">
                  <h3 class="card-title fs-4">Be a Good Person</h3>
                  <p class="card-text">Sharing kindness through our Jumat Berkah program, where communities prepare and
                     distribute meals together.</p>
               </div>
            </div>
         </li>
         <li class="col">
            <div class="card border-0 bg-body-tertiary rounded-4 overflow-hidden shadow text-center h-100">
               <div class="card-header bg-transparent border-0">
                  <div class="w-75 mx-auto ratio ratio-1x1">
                     <img src="{{ asset('images/csr-voluntering.png') }}" alt="" aria-hidden="true"
                        loading="lazy" class="card-img object-fit-xl-contain">
                  </div>
               </div>
               <div class="card-body">
                  <h3 class="card-title fs-4">Employee Well-being</h3>
                  <p class="card-text">Promoting a healthy workplace through fitness activities and blood donation
                     programs.</p>
               </div>
            </div>
         </li>
      </ul>
   </section>

   <section class="multi-slide container mb-5" aria-labelledby="csr-moments-title">
      @php
         $moments = [
             [
                 'category' => 'EMPLOYEE WELL-BEING',
                 'title' => "PT Indraco Global Indonesia's Commitment to Employee Wellbeing",
                 'date' => 'May 20, 2026',
                 'image' => 'images/news/news-2.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'BE A GOOD PERSON',
                 'title' => 'Regular Blood Donation Program: Benefits, Requirements, and Impact for Employees',
                 'date' => 'May 10, 2026',
                 'image' => 'images/news/news-6.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'COMMUNITY EMPOWERMENT',
                 'title' => 'Jumat Berkah: Sharing Kindness in the Workplace',
                 'date' => 'April 28, 2026',
                 'image' => 'images/news/news-8.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'CSR INITIATIVE',
                 'title' => 'INDRACO Berbagi: Building a Culture of Care and Appreciation',
                 'date' => 'April 15, 2026',
                 'image' => 'images/news/news-9.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'CSR INITIATIVE',
                 'title' => 'Gawai Dayak: A Celebration of Harvest Gratitude and Community in Kalimantan',
                 'date' => 'March 30, 2026',
                 'image' => 'images/news/news-5.jpg',
                 'url' => '#',
             ],
         ];
      @endphp

      @include('components.multi-slide', [
          'id' => 'csr-moments-carousel',
          'titleId' => 'csr-moments-title',
          'title' => 'MOMENTS',
          'viewAllText' => 'View all news',
          'viewAllUrl' => '#',
          'autoplay' => true,
          'interval' => 5000,
          'loop' => true,
          'items' => $moments,
      ])
   </section>
@endsection
