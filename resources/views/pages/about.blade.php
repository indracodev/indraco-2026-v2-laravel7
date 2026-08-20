@extends('layouts.app')

@section('title', 'All about INDRACO')

@push('styles')
   {{-- team section styles --}}
   <style>
      .card-team-header {
         max-width: 180px;
      }
   </style>
   {{-- core value section styles --}}
   <style>
      :root {
         --value-gap: 1.5rem;
      }

      .value-list {
         list-style: none;
         padding-left: 0;
         display: grid;
         grid-template-columns: repeat(1, 1fr);
         gap: calc(var(--value-gap) * 2);
         margin: 0;
      }

      .value-item {
         position: relative;
      }

      .value-item::before {
         content: "";
         display: none;
         width: 1px;
         height: 100%;
         background-color: color-mix(in srgb, var(--bs-border-color) 25%, transparent);
         position: absolute;
         top: 0;
         left: calc(-1 * var(--value-gap));
      }

      .value-item::after {
         content: "";
         display: block;
         width: 100%;
         height: 1px;
         background-color: color-mix(in srgb, var(--bs-border-color) 25%, transparent);
         position: absolute;
         left: 0;
         bottom: calc(-1 * var(--value-gap));
      }

      .value-item:last-child::after {
         display: none;
      }

      .value-number {
         font-size: clamp(12rem, 25vw, 15rem);
         line-height: 1 !important;
      }

      .value-card-text {
         margin: 0;
      }

      @media (min-width: 768px) and (max-width: 1199.98px) {
         .value-list {
            grid-template-columns: repeat(2, 1fr);
         }

         .value-item:nth-child(2)::before,
         .value-item:nth-child(4)::before,
         .value-item:nth-child(6)::before {
            display: block;
         }

         .value-item:nth-last-child(1)::after,
         .value-item:nth-last-child(2)::after {
            display: none;
         }
      }

      @media (min-width: 1200px) {
         :root {
            --value-gap: 3rem;
         }

         .value-list {
            grid-template-columns: repeat(3, 1fr);
         }

         .value-item:nth-child(2)::before,
         .value-item:nth-child(3)::before,
         .value-item:nth-child(5)::before,
         .value-item:nth-child(6)::before {
            display: block;
         }

         .value-item:nth-last-child(1)::after,
         .value-item:nth-last-child(2)::after,
         .value-item:nth-last-child(3)::after {
            display: none;
         }
      }
   </style>
@endpush

@section('content')
   <section class="banner overflow-hidden">
      <div class="container-sm">
         <div class="row g-0">
            <div class="col-12">
               <h1 id="section-banner-title" class="banner-title z-0">ALL ABOUT US</h1>
            </div>
            <div class="col-7 z-2">
               <p class="banner-text lh-sm m-0">Uniting through flavour, connecting through life.</p>
            </div>
            <div class="col-5 col-xxl-4 z-1">
               <div class="banner-media ratio ratio-1x1">
                  <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                     <div class="ratio ratio-1x1 w-100">
                        <img src="{{ asset('images/icon-about.png') }}" alt="" aria-hidden="true" loading="lazy"
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

   <section class="container mb-5" aria-labelledby="about-title">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <div class="row row-cols-1 g-4 row-cols-lg-2 g-lg-5 align-items-lg-center">
            <div class="col order-lg-2">
               <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow">
                  <img src="{{ asset('images/home-about.jpg') }}" alt="About Indraco" class="object-fit-cover">
               </div>
            </div>
            <div class="col order-lg-1">
               <h2 id="about-title" class="text-title fs-3 fw-semibold mb-4">ABOUT US</h2>
               <p>
                  WE ARE INDRACO - Beginning in 1971, producing and distributing coffee, INDRACO continues to advance and
                  expand into several advanced manufacturing facilities and distribution centers across Indonesia and
                  Singapore.
                  <br><br>
                  Specializing in coffee for over half a century, INDRACO aims to create an experience and evoke feelings
                  within each touch point in our customer's journey. From our products to our retail experiences as well as
                  our F&B concepts, creativity and innovation remain at their core.
               </p>
            </div>
            <div class="col order-lg-3">
               <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow">
                  <img src="{{ asset('images/love-beans.jpg') }}" alt="Love Beans" class="object-fit-cover">
               </div>
            </div>
            <div class="col order-lg-4">
               <p>With over 11 brands and 600 SKUs across coffee, ginger, and chocolate products, we continue to strive,
                  innovate, and operate with ingenuity taught by our founding members in the ever-changing FMCG and F&amp;B
                  industry.</p>
            </div>
         </div>
      </div>
   </section>

   <section class="container mb-5" aria-labelledby="team-title">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <h2 id="team-title" class="visually-hidden">INDRACO management team</h2>

         <section class="mb-5">
            <h3 class="text-title fs-3 fw-semibold mb-4">FOUNDER'S STORY</h3>
            <ul class="list-unstyled row row-cols-1 g-4 row-cols-xl-2" aria-label="Foudner list">
               <li class="col">
                  <article
                     class="card-team bg-body-secondary rounded-4 shadow p-4 d-flex flex-column gap-3 p-3 overflow-hidden text-center align-items-center flex-md-row align-items-md-start text-md-start h-100">
                     <div class="card-team-header bg-secondary ratio ratio-1x1 rounded-circle overflow-hidden">
                        <img src="{{ asset('images/person.jpg') }}" alt="" aria-hidden="true" loading="lazy"
                           class="card-team-img object-fit-cover">
                     </div>
                     <div class="card-team-body">
                        <h4 class="card-team-name fs-4 fw-semibold mb-1">Mr. Name Surename</h4>
                        <p class="card-team-position small text-muted">Co Founder</p>
                        <p class="card-team-text mb-0">
                           <i>
                              <span>"</span>
                              Lorem ipsum dolor sit amet consectetur, adipisicing
                              elit. Molestiae fuga aperiam at fugiat quisquam. Molestias, debitis aliquam sequi ipsa
                              reiciendis quae eos nihil veritatis a et ea iste repellat. Earum.
                              <span>"</span>
                           </i>
                        </p>
                     </div>
                  </article>
               </li>
               <li class="col">
                  <article
                     class="card-team bg-body-secondary rounded-4 shadow p-4 d-flex flex-column gap-3 p-3 overflow-hidden text-center align-items-center flex-md-row align-items-md-start text-md-start h-100">
                     <div class="card-team-header bg-secondary ratio ratio-1x1 rounded-circle overflow-hidden">
                        <img src="{{ asset('images/person.jpg') }}" alt="" aria-hidden="true" loading="lazy"
                           class="card-team-img object-fit-cover">
                     </div>
                     <div class="card-team-body">
                        <h4 class="card-team-name fs-4 fw-semibold mb-1">Mr. Name Surename</h4>
                        <p class="card-team-position small text-muted">Co Founder</p>
                        <p class="card-team-text mb-0">
                           <i>
                              <span>"</span>
                              Corrupti, impedit accusamus enim assumenda ex unde
                              facere ipsum cupiditate, explicabo sunt voluptatem pariatur nesciunt repellat error, commodi
                              ad cum minus id!
                              <span>"</span>
                           </i>
                        </p>
                     </div>
                  </article>
               </li>
            </ul>
         </section>

         <section>
            <h3 class="text-title fs-3 fw-semibold mb-4">BOARD OF EXECUTIVE</h3>
            <ul class="list-unstyled row row-cols-1 g-4 row-cols-md-2 row-cols-xl-3" aria-label="Foudner list">
               <li class="col">
                  <article
                     class="card-team bg-body-secondary rounded-4 shadow p-4 d-flex flex-column gap-3 p-3 overflow-hidden text-center align-items-center h-100">
                     <div class="card-team-header bg-secondary ratio ratio-1x1 rounded-circle overflow-hidden">
                        <img src="{{ asset('images/person.jpg') }}" alt="" aria-hidden="true" loading="lazy"
                           class="card-team-img object-fit-cover">
                     </div>
                     <div class="card-team-body">
                        <h4 class="card-team-name fs-4 fw-semibold mb-1">Mr. Name Surename</h4>
                        <p class="card-team-position small text-muted">Co Founder</p>
                        <p class="card-team-text mb-0">
                           <i>
                              <span>"</span>
                              Lorem ipsum dolor sit amet consectetur, adipisicing
                              elit. Molestiae fuga aperiam at fugiat quisquam. Molestias, debitis aliquam sequi ipsa
                              reiciendis quae eos nihil veritatis a et ea iste repellat. Earum.
                              <span>"</span>
                           </i>
                        </p>
                     </div>
                  </article>
               </li>
               <li class="col">
                  <article
                     class="card-team bg-body-secondary rounded-4 shadow p-4 d-flex flex-column gap-3 p-3 overflow-hidden text-center align-items-center h-100">
                     <div class="card-team-header bg-secondary ratio ratio-1x1 rounded-circle overflow-hidden">
                        <img src="{{ asset('images/person.jpg') }}" alt="" aria-hidden="true" loading="lazy"
                           class="card-team-img object-fit-cover">
                     </div>
                     <div class="card-team-body">
                        <h4 class="card-team-name fs-4 fw-semibold mb-1">Mr. Name Surename</h4>
                        <p class="card-team-position small text-muted">Co Founder</p>
                        <p class="card-team-text mb-0">
                           <i>
                              <span>"</span>
                              Molestias, debitis aliquam sequi ipsa reiciendis quae eos nihil veritatis a et ea iste
                              repellat. Earum.
                              <span>"</span>
                           </i>
                        </p>
                     </div>
                  </article>
               </li>
               <li class="col">
                  <article
                     class="card-team bg-body-secondary rounded-4 shadow p-4 d-flex flex-column gap-3 p-3 overflow-hidden text-center align-items-center h-100">
                     <div class="card-team-header bg-secondary ratio ratio-1x1 rounded-circle overflow-hidden">
                        <img src="{{ asset('images/person.jpg') }}" alt="" aria-hidden="true" loading="lazy"
                           class="card-team-img object-fit-cover">
                     </div>
                     <div class="card-team-body">
                        <h4 class="card-team-name fs-4 fw-semibold mb-1">Mr. Name Surename</h4>
                        <p class="card-team-position small text-muted">Co Founder</p>
                        <p class="card-team-text mb-0">
                           <i>
                              <span>"</span>
                              Molestiae fuga aperiam at fugiat quisquam. Molestias, debitis aliquam sequi ipsa
                              reiciendis quae eos nihil veritatis a et ea iste repellat. Earum.
                              <span>"</span>
                           </i>
                        </p>
                     </div>
                  </article>
               </li>
               <li class="col">
                  <article
                     class="card-team bg-body-secondary rounded-4 shadow p-4 d-flex flex-column gap-3 p-3 overflow-hidden text-center align-items-center h-100">
                     <div class="card-team-header bg-secondary ratio ratio-1x1 rounded-circle overflow-hidden">
                        <img src="{{ asset('images/person.jpg') }}" alt="" aria-hidden="true" loading="lazy"
                           class="card-team-img object-fit-cover">
                     </div>
                     <div class="card-team-body">
                        <h4 class="card-team-name fs-4 fw-semibold mb-1">Mr. Name Surename</h4>
                        <p class="card-team-position small text-muted">Co Founder</p>
                        <p class="card-team-text mb-0">
                           <i>
                              <span>"</span>
                              Lorem ipsum dolor sit amet consectetur, adipisicing
                              elit. Molestiae fuga aperiam at fugiat quisquam. Molestias, debitis aliquam sequi ipsa
                              reiciendis quae eos nihil veritatis a et ea iste repellat. Earum.
                              <span>"</span>
                           </i>
                        </p>
                     </div>
                  </article>
               </li>
            </ul>
         </section>

      </div>
   </section>

   <section class="container mb-5" aria-labelledby="visi-misi-title">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <h2 id="visi-misi-title" class="visually-hidden">VISI & MISI INDRACO</h2>
         <div class="row row-cols-1 row-cols-lg-2 g-4 gx-xxl-5">
            <div class="col">
               <h3 class="text-title fs-3 fw-semibold mb-4">OUR VISION</h3>
               <p class="lead">Become a globally recognised company and obtain positive growth whereby accentuating our
                  five core values of "Customer Focus", "Teamwork", "Integrity", "Resources", and "Innovation".</p>
            </div>
            <div class="col">
               <h3 class="text-title fs-3 fw-semibold mb-4">OUR MISSION</h3>
               <p class="lead">Provide supreme, top-quality products at competitive prices that meet and surpass
                  consumers' needs.</p>
            </div>
         </div>
      </div>
   </section>

   <section class="container mb-5" aria-labelledby="value-title">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <h2 id="value-title" class="text-title fs-3 fw-semibold mb-4">CORE VALUES</h2>
         <ul class="value-list">
            <li class="value-item">
               <div class="value-card w-100 h-100 d-flex justify-content-center align-items-center text-center">
                  <span class="value-number fw-bold">5</span>
               </div>
            </li>
            <li class="value-item">
               <div class="value-card">
                  <h3 class="value-card-title fs-4 fw-semibold d-flex gap-3 align-items-center mb-4">
                     <img src="{{ asset('images/core-values-customer-focus.svg') }}" alt="" aria-hidden="true"
                        loading="lazy" width="60" height="60">
                     <span>CUTOMER FOCUS</span>
                  </h3>
                  <p class="value-card-text">We will go the distance to delight our customers, manifesting them into our
                     advocates in the process. Our objective is to create and maintain long term relationships with our
                     customers by generating trust, confidence and loyalty.</p>
               </div>
            </li>
            <li class="value-item">
               <div class="value-card">
                  <h3 class="value-card-title fs-4 fw-semibold d-flex gap-3 align-items-center mb-4">
                     <img src="{{ asset('images/core-values-teamwork.svg') }}" alt="" aria-hidden="true"
                        loading="lazy" width="60" height="60">
                     <span>TEAMWORK</span>
                  </h3>
                  <p class="value-card-text">We "Work Together as One Team, As One Indraco". We continue to create harmony and always remember those we work with.</p>
               </div>
            </li>
            <li class="value-item">
               <div class="value-card">
                  <h3 class="value-card-title fs-4 fw-semibold d-flex gap-3 align-items-center mb-4">
                     <img src="{{ asset('images/core-values-resources.svg') }}" alt="" aria-hidden="true"
                        loading="lazy" width="60" height="60">
                     <span>RESOURCES</span>
                  </h3>
                  <p class="value-card-text">We escalate our capacity by optimising our abilities and efficiently utilising all resources. We are the people who confront the most complex challenges that others might consider insurmountable.</p>
               </div>
            </li>
            <li class="value-item">
               <div class="value-card">
                  <h3 class="value-card-title fs-4 fw-semibold d-flex gap-3 align-items-center mb-4">
                     <img src="{{ asset('images/core-values-innovation.svg') }}" alt="" aria-hidden="true"
                        loading="lazy" width="60" height="60">
                     <span>INNOVATION</span>
                  </h3>
                  <p class="value-card-text">We are the people who embrace new mindsets and are proactive in commencing changes and enhancement.</p>
               </div>
            </li>
            <li class="value-item">
               <div class="value-card">
                  <h3 class="value-card-title fs-4 fw-semibold d-flex gap-3 align-items-center mb-4">
                     <img src="{{ asset('images/core-values-integrity.svg') }}" alt="" aria-hidden="true"
                        loading="lazy" width="60" height="60">
                     <span>INTEGRITY</span>
                  </h3>
                  <p class="value-card-text">We manage our business ethically and morally. We are convinced that we have gained the trust and respect of our customers and everyone we cooperate with by being transparent, honest and honourable in all our actions.</p>
               </div>
            </li>
         </ul>
      </div>
   </section>
@endsection
