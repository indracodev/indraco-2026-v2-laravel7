@extends('layouts.app')

@section('title', "Let's shop at our online store")

@section('content')
   <section class="banner overflow-hidden">
      <div class="container-sm">
         <div class="row g-0">
            <div class="col-12">
               <h1 id="section-banner-title" class="banner-title z-0">ONLINE STORE</h1>
            </div>
            <div class="col-7 z-2">
               <p class="banner-text lh-sm m-0">Discover Our Official Stores & Trusted Marketplaces.</p>
            </div>
            <div class="col-5 col-xxl-4 z-1">
               <div class="banner-media ratio ratio-1x1">
                  <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                     <div class="ratio ratio-1x1 w-100">
                        <img src="{{ asset('images/icon-store.png') }}" alt="" aria-hidden="true" loading="lazy"
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

   <section class="container mb-5" aria-labelledby="ecomm-title">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <h2 id="ecomm-title" class="text-title fs-3 fw-semibold mb-4">E-COMMERCE</h2>
         <ul class="list-unstyled row row-cols-1 g-4 row-cols-md-2 row-cols-xl-3">
            <li class="col">
               <article class="card bg-body-tertiary rounded-4 border-0 shadow overflow-hidden">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/logo-supresso-typograph-flat.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain w-75 h-50 top-50 start-50 translate-middle">
                  </div>
                  <a href="https://supresso.com/" target="_blank" rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Visit our store at ...</span>
                  </a>
               </article>
            </li>
            <li class="col">
               <article class="card bg-body-tertiary rounded-4 border-0 shadow overflow-hidden">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/logo-indracostore-flat.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain w-75 h-50 top-50 start-50 translate-middle">
                  </div>
                  <a href="https://indracostore.com/" target="_blank" rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Visit our store at ...</span>
                  </a>
               </article>
            </li>
         </ul>
      </div>
   </section>

   <section class="container mb-5" aria-labelledby="marketplace-title">
      <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
         <h2 id="marketplace-title" class="text-title fs-3 fw-semibold mb-4">MARKETPLACE</h2>
         <ul class="list-unstyled row row-cols-1 g-4 row-cols-md-2 row-cols-xl-3">
            <li class="col">
               <article class="card bg-body-tertiary rounded-4 border-0 shadow overflow-hidden">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/logo-shopee-flat.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain w-75 h-50 top-50 start-50 translate-middle">
                  </div>
                  <a href="https://shopee.co.id/indracoofficial" target="_blank" rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Visit our store at ...</span>
                  </a>
               </article>
            </li>
            <li class="col">
               <article class="card bg-body-tertiary rounded-4 border-0 shadow overflow-hidden">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/logo-lazada-flat.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain w-75 h-50 top-50 start-50 translate-middle">
                  </div>
                  <a href="https://www.lazada.co.id/shop/indraco/" target="_blank" rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Visit our store at ...</span>
                  </a>
               </article>
            </li>
            <li class="col">
               <article class="card bg-body-tertiary rounded-4 border-0 shadow overflow-hidden">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/logo-blibli-flat.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain w-75 h-50 top-50 start-50 translate-middle">
                  </div>
                  <a href="https://www.blibli.com/merchant/indraco/INT-60044?pickupPointCode=PP-3056342&fbbActivated=false" target="_blank" rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Visit our store at ...</span>
                  </a>
               </article>
            </li>
            <li class="col">
               <article class="card bg-body-tertiary rounded-4 border-0 shadow overflow-hidden">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/logo-tokopedia-flat.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain w-75 h-50 top-50 start-50 translate-middle">
                  </div>
                  <a href="https://www.tokopedia.com/indracoofficial" target="_blank" rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Visit our store at ...</span>
                  </a>
               </article>
            </li>
            <li class="col">
               <article class="card bg-body-tertiary rounded-4 border-0 shadow overflow-hidden">
                  <div class="card-header ratio ratio-16x9 border-0 bg-transparent">
                     <img src="{{ asset('images/logo-tiktok-shop-flat.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain w-75 h-50 top-50 start-50 translate-middle">
                  </div>
                  <a href="https://www.tiktok.com/@indracostore" target="_blank" rel="noopener noreferrer" class="stretched-link">
                     <span class="visually-hidden">Visit our store at ...</span>
                  </a>
               </article>
            </li>
         </ul>
      </div>
   </section>
@endsection
