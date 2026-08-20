@extends('layouts.app')

@section('title', 'INDRACO, a Leading FMCG Company in Indonesia Since 1971')

@push('styles')
   <link rel="stylesheet" href="{{ asset('css/home-banner.css') }}">
   <link rel="stylesheet" href="{{ asset('css/multi-slide.css') }}">
@endpush

@push('scripts')
   <script src="{{ asset('js/home-banner.js') }}"></script>
   <script src="{{ asset('js/multi-slide.js') }}"></script>
@endpush

@section('content')
   {{-- 3D Product Categories Hero Carousel (Integrasi dengan Admin Banner) --}}
   <section class="product-slider-section mb-5" aria-labelledby="categories-title">
      <h2 id="categories-title" class="visually-hidden">INDRACO Category Product</h2>
      <div class="slider-container">
         <div class="slider-wrapper">

            @if (isset($banners) && $banners->count())
               @foreach ($banners as $index => $banner)
                  @php
                     $titleText = $banner->title_id ?? ($banner->title_en ?? 'INDRACO');
                     $descText = $banner->subtitle_id ?? ($banner->subtitle_en ?? '');
                     $linkUrl = $banner->link
                         ? (str_starts_with($banner->link, 'http')
                             ? $banner->link
                             : url($banner->link))
                         : route('products.index');
                  @endphp
                  <div class="slide" data-index="{{ $index }}" data-title="{{ $titleText }}"
                     data-desc="{{ $descText }}">
                     <div class="bg-title">{{ strtoupper($titleText) }}</div>
                     <div class="pedestal-container">
                        <a href="{{ $linkUrl }}" class="product-image-wrapper">
                           <div class="product-shadow"></div>
                           <img src="{{ asset($banner->image_path) }}" alt="{{ $titleText }}" class="product-image">
                        </a>
                        <div class="cylinder">
                           <div class="cylinder-top"></div>
                           <div class="cylinder-body"></div>
                        </div>
                     </div>
                  </div>
               @endforeach
            @else
               <!-- Fallback Slide 1: Coffee -->
               <div class="slide" data-index="0" data-title="COFFEE"
                  data-desc="Enjoy a selection of quality coffee with a distinctive aroma.">
                  <div class="bg-title">COFFEE</div>
                  <div class="pedestal-container">
                     <a href="{{ route('products.index') }}" class="product-image-wrapper">
                        <div class="product-shadow"></div>
                        <img src="{{ asset('images/coffee-bean.png') }}" alt="Coffee Bean" class="product-image">
                     </a>
                     <div class="cylinder">
                        <div class="cylinder-top"></div>
                        <div class="cylinder-body"></div>
                     </div>
                  </div>
               </div>

               <!-- Fallback Slide 2: Ginger -->
               <div class="slide" data-index="1" data-title="GINGER"
                  data-desc="Experience the warm, comforting, and soothing properties of our selected ginger.">
                  <div class="bg-title">GINGER</div>
                  <div class="pedestal-container">
                     <a href="{{ route('products.index') }}" class="product-image-wrapper">
                        <div class="product-shadow"></div>
                        <img src="{{ asset('images/ginger.png') }}" alt="Ginger" class="product-image">
                     </a>
                     <div class="cylinder">
                        <div class="cylinder-top"></div>
                        <div class="cylinder-body"></div>
                     </div>
                  </div>
               </div>

               <!-- Fallback Slide 3: Chocolate -->
               <div class="slide" data-index="2" data-title="CHOCOLATE"
                  data-desc="Indulge in the rich, deep, and smooth flavors of premium quality chocolate drink.">
                  <div class="bg-title">CHOCOLATE</div>
                  <div class="pedestal-container">
                     <a href="{{ route('products.index') }}" class="product-image-wrapper">
                        <div class="product-shadow"></div>
                        <img src="{{ asset('images/chocolate.png') }}" alt="Chocolate" class="product-image">
                     </a>
                     <div class="cylinder">
                        <div class="cylinder-top"></div>
                        <div class="cylinder-body"></div>
                     </div>
                  </div>
               </div>

               <!-- Fallback Slide 4: Coconut Milk -->
               <div class="slide" data-index="3" data-title="COCONUT"
                  data-desc="Delight in the fresh, creamy, and tropical taste of our premium coconut milk.">
                  <div class="bg-title">COCONUT</div>
                  <div class="pedestal-container">
                     <a href="{{ route('products.index') }}" class="product-image-wrapper">
                        <div class="product-shadow"></div>
                        <img src="{{ asset('images/coconut.png') }}" alt="Coconut" class="product-image">
                     </a>
                     <div class="cylinder">
                        <div class="cylinder-top"></div>
                        <div class="cylinder-body"></div>
                     </div>
                  </div>
               </div>
            @endif

         </div>
      </div>

      <!-- Footer Controls Bar -->
      <div class="slider-footer container">
         <div class="row align-items-center justify-content-between gy-4">

            <!-- Left: Description -->
            <div class="col-12 col-lg-4 order-2 order-lg-1 text-center text-lg-start">
               <p class="slider-description mb-0 fs-4"></p>
            </div>

            <!-- Center: Dot Indicators -->
            <div class="col-12 col-lg-4 order-1 order-lg-2 d-flex justify-content-center">
               <div class="slider-indicators">
                  @if (isset($banners) && $banners->count())
                     @foreach ($banners as $index => $banner)
                        <button class="indicator {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"
                           aria-label="Go to slide {{ $index + 1 }}"></button>
                     @endforeach
                  @else
                     <button class="indicator active" data-slide="0" aria-label="Go to slide 1"></button>
                     <button class="indicator" data-slide="1" aria-label="Go to slide 2"></button>
                     <button class="indicator" data-slide="2" aria-label="Go to slide 3"></button>
                     <button class="indicator" data-slide="3" aria-label="Go to slide 4"></button>
                  @endif
               </div>
            </div>

            <!-- Right: Social Media Links -->
            <div class="col-12 col-lg-4 order-3 order-lg-3 d-flex justify-content-center justify-content-lg-end">
               <nav aria-labelledby="banner-sosmed-title" class="banner-navsos">
                  <h2 id="banner-sosmed-title" class="visually-hidden">Social media navigation on page banner</h2>
                  @include('components.sosmed')
               </nav>
            </div>

         </div>
      </div>
   </section>

   <section class="container mb-5" aria-labelledby="about-title">
      <div class="bg-body-secondary px-4 py-5 p-md-5 rounded-4 overflow-hidden">
         <div class="row gx-lg-5">
            <div class="col col-12 col-lg-6">
               <h2 id="about-title" class="text-title lh-sm fw-semibold mb-2">
                  {{ \App\Models\MasterSetting::get('page_home_about_title', 'ABOUT US') }}
               </h2>
               <div class="ratio ratio-16x9 d-lg-none my-3">
                  <img
                     src="{{ asset(\App\Models\MasterSetting::get('page_home_about_image', 'images/home-about.jpg')) }}"
                     aria-hidden="true" loading="lazy" class="object-fit-cover rounded-4">
               </div>
               <p class="fs-1 lh-sm mb-4">
                  {{ \App\Models\MasterSetting::get('page_home_about_headline', 'Uniting through flavour, connecting through life.') }}
               </p>
               <p>{{ \App\Models\MasterSetting::get('page_home_about_content', 'Kami INDRACO – Dimulai pada tahun 1971 dengan gudang di Sumatera oleh pendiri kami, kami telah terus tumbuh dan berkembang menjadi beberapa fasilitas manufaktur canggih di seluruh Indonesia dan Singapura.') }}
               </p>
               <a href="{{ route('about') }}" class="btn text-bg-custom-1 rounded-pill">
                  <span>Learn more</span>
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true"
                     width="16" height="16">
                     <path fill="currentColor"
                        d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z" />
                  </svg>
               </a>
            </div>
            <div class="col col-12 col-lg-6 d-none d-lg-block">
               <div class="ratio ratio-16x9 rounded-4 overflow-hidden">
                  <img
                     src="{{ asset(\App\Models\MasterSetting::get('page_home_about_image', 'images/home-about.jpg')) }}"
                     aria-hidden="true" loading="lazy" class="object-fit-cover">
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="container mb-5" aria-labelledby="news-list-title">
      @php
         $moments = [
             [
                 'category' => 'PRODUCTS LAUNCH',
                 'title' => 'Produk Baru dari Kopi Tugu Buaya',
                 'date' => 'April 28, 2026',
                 'image' => 'images/news/news-3.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'EXHIBITION',
                 'title' => 'Keikutsertaan INDRACO di Pameran Inrternational',
                 'date' => 'April 15, 2026',
                 'image' => 'images/news/news-4.jpg',
                 'url' => '#',
             ],
             [
                 'category' => 'AWARD & ACHIEVEMENT',
                 'title' => 'INDRACO meraih penghargaan FMCG terbaik 2026',
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

   <section class="container mb-5" aria-labelledby="social-media-title">
      @php
         $socialItems = [
             [
                 'image' => 'images/social-activity-1.jpg',
                 'author' => 'INDRACO',
                 'avatar' => 'images/icon-indraco.png',
                 'date' => '6 days ago',
                 'url' => 'https://www.instagram.com',
             ],
             [
                 'image' => 'images/social-activity-2.jpg',
                 'author' => 'INDRACO',
                 'avatar' => 'images/icon-indraco.png',
                 'date' => '6 days ago',
                 'url' => 'https://www.instagram.com',
             ],
             [
                 'image' => 'images/social-activity-3.jpg',
                 'author' => 'INDRACO',
                 'avatar' => 'images/icon-indraco.png',
                 'date' => '6 days ago',
                 'url' => 'https://www.instagram.com',
             ],
             [
                 'image' => 'images/social-activity-4.jpg',
                 'author' => 'INDRACO',
                 'avatar' => 'images/icon-indraco.png',
                 'date' => '6 days ago',
                 'url' => 'https://www.instagram.com',
             ],
         ];
      @endphp

      @include('components.multi-slide', [
          'id' => 'social-media-carousel',
          'titleId' => 'social-media-title',
          'title' => 'SOCIAL MEDIA ACTIVITY',
          'variant' => 'social',
          'visibleLg' => 3,
          'visibleMd' => 2,
          'visibleSm' => 1,
          'autoplay' => true,
          'interval' => 5000,
          'loop' => true,
          'items' => $socialItems,
      ])
   </section>

   <section class="container mb-5" aria-labelledby="careers-title">
      <div class="row g-0 text-bg-custom-1 rounded-4 overflow-hidden">
         <div class="col px-4 py-5 p-md-5 col-12 col-lg-7">
            <h2 id="careers-title" class="fs-title fw-semibold">
               CAREERS<br>
               <b class="display-3 fw-semibold text-custom-2">Grow with us</b>
            </h2>
            <p class="mb-4">
               Join our team and be part of a passionate group that brings the best of Indonesia's coffee to the world.
            </p>
            <a href="{{ route('careers') }}" class="btn btn-light rounded-pill">
               <span>View open position</span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" aria-hidden="true"
                  width="16" height="16">
                  <path fill="currentColor"
                     d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z" />
               </svg>
            </a>
         </div>
         <div class="col overflow-hidden col-12 col-lg-5 col-xxl-4 ms-xxl-auto">
            <img src="{{ asset('images/home-careers.jpg') }}" aria-hidden="true" loading="lazy"
               class="ratio ratio-16x9 object-fit-cover w-100 h-100">
         </div>
      </div>
   </section>
@endsection
