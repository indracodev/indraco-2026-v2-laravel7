@extends('layouts.app')

@section('title', "Join and grow with our company at INDRACO Careers")

@section('content')
   <section class="banner overflow-hidden">
      <div class="container-sm">
         <div class="row g-0">
            <div class="col-12">
               <h1 id="section-banner-title" class="banner-title z-0">CAREERS</h1>
            </div>
            <div class="col-7 z-2">
               <p class="banner-text lh-sm m-0">Empowering Careers Through Innovation and Collaboration.</p>
            </div>
            <div class="col-5 col-xxl-4 z-1">
               <div class="banner-media ratio ratio-1x1">
                  <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                     <div class="ratio ratio-1x1 w-100">
                        <img src="{{ asset('images/icon-career.png') }}" alt="" aria-hidden="true" loading="lazy"
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

   <section class="container mb-5" aria-labelledby="job-title">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <h2 id="job-title" class="text-title fs-3 fw-semibold mb-4">JOB VACANCY</h2>
         <ul class="list-unstyled row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 g-xl-5">
            <li class="col">
               <article class="card border-0 shadow rounded-4 overflow-hidden bg-body-tertiary">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/JobS.png') }}" data-light="{{ asset('images/JobS.png') }}"
                        data-dark="{{ asset('images/JobS-invert.png') }}" alt="" aria-hidden="true" loading="lazy"
                        class="card-img theme-image object-fit-contain top-50 start-50 translate-middle w-75 h-auto">
                  </div>
                  <a href="https://id.jobstreet.com/id/companies/indraco-168551422470741" target="_blank"
                     rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Open the job vacancy link on JobStreet</span>
                  </a>
               </article>
            </li>
            <li class="col">
               <article class="card border-0 shadow rounded-4 overflow-hidden bg-body-tertiary">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/LinkedIn.png') }}" data-light="{{ asset('images/LinkedIn.png') }}"
                        data-dark="{{ asset('images/LinkedIn-invert.png') }}" alt="" aria-hidden="true"
                        loading="lazy"
                        class="card-img theme-image object-fit-contain top-50 start-50 translate-middle w-75 h-auto">
                  </div>
                  <a href="https://www.linkedin.com/company/indraco-group/posts/?feedView=all" target="_blank"
                     rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Open the job vacancy link on linkedIn-in</span>
                  </a>
               </article>
            </li>
         </ul>
      </div>
   </section>
@endsection
