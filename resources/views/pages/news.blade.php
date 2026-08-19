@extends('layouts.app')

@section('title', 'Latest news and events from INDRACO')

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
               <h1 id="section-banner-title" class="banner-title z-0">NEWS</h1>
            </div>
            <div class="col-7 z-2">
               <p class="banner-text lh-sm m-0">Stay Updated with Our Latest Stories.</p>
            </div>
            <div class="col-5 col-xxl-4 z-1">
               <div class="banner-media ratio ratio-1x1">
                  <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                     <div class="ratio ratio-1x1 w-100">
                        <img src="{{ asset('images/icon-news.png') }}" alt="" aria-hidden="true" loading="lazy"
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

   @if (isset($featuredNews) && $featuredNews)
      <section class="container mb-5" aria-labelledby="news-title">
         <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
            <h2 id="news-title" class="text-title fs-3 fw-semibold mb-4">
               {{ $featuredNews->judul_eng ? Str::upper(Str::words($featuredNews->judul_eng, 2, '')) : 'FEATURED STORY' }}
            </h2>
            <div class="row row-cols-1 g-4 row-cols-lg-2 g-xl-5">
               <div class="col">
                  <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow">
                     <img src="{{ $featuredNews->image_url }}" alt="" loading="lazy" aria-hidden="true"
                        class="object-fit-cover">
                  </div>
               </div>
               <div class="col d-flex flex-column">
                  <h3 class="fs-1 fw-semibold">{{ $featuredNews->localized_judul }}</h3>
                  <p class="flex-grow-1">{{ Str::limit(strip_tags($featuredNews->localized_content), 240) }}</p>
                  <small class="text-muted">{{ $featuredNews->formatted_tanggal }}</small>
               </div>
            </div>
         </div>
      </section>
   @endif

   <section class="multi-slide container mb-5" aria-labelledby="news-list-title">
      @php
         $moments = [
             [
                 'category' => 'PRODUCTS LAUNCH',
                 'title' => "Produk Baru dari Kopi Tugu Buaya",
                 'date' => 'April 28, 2026',
                 'image' => 'images/news/news-3.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'EXHIBITION',
                 'title' => "Keikutsertaan INDRACO di Pameran Inrternational",
                 'date' => 'April 15, 2026',
                 'image' => 'images/news/news-4.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'AWARD & ACHIEVEMENT',
                 'title' => "INDRACO meraih penghargaan FMCG terbaik 2026",
                 'date' => 'March 15, 2026',
                 'image' => 'images/news/news-7.jpg',
                 'url' => '#',
             ],
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
          'id' => 'news-list-carousel',
          'titleId' => 'news-list-title',
          'title' => 'NEWS',
          'viewAllText' => 'View all news',
          'viewAllUrl' => '#',
          'autoplay' => true,
          'interval' => 5000,
          'loop' => true,
          'items' => $moments,
      ])
   </section>
@endsection
