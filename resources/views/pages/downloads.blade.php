@extends('layouts.app')

@section('title', 'Download the INDRACO Catalog & Brochure')

@push('styles')
{{-- <style>* {outline: solid 1px green};</style> --}}
@endpush

@section('content')
<section class="banner overflow-hidden">
   <div class="container-sm">
      <div class="row g-0">
         <div class="col-12">
            <h2 id="section-banner-title" class="banner-title z-0">DOWNLOADS</h2>
         </div>
         <div class="col-7 z-2">
            <p class="banner-text lh-sm m-0">Access Our Latest Catalogs & Resources.</p>
         </div>
         <div class="col-5 col-xxl-4 z-1">
            <div class="banner-media ratio ratio-1x1">
               <div class="banner-media-images h-auto top-0 start-50 translate-middle z-1">
                  <div class="ratio ratio-1x1 w-100">
                     <img src="{{ asset('images/icon-download.png') }}" alt="" aria-hidden="true" loading="lazy" class="object-fit-contain">
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

<section class="container mb-5" aria-labelledby="brochure-title">
   <div class="bg-body-secondary rounded-4 p-4 p-lg-5">
      <h2 id="brochure-title" class="text-title fs-3 fw-semibold mb-4">CATALOG & BROCHURE</h2>
      <ul class="download-list list-unstyled mb-0 row g-5">
         @forelse($downloads as $item)
         <li class="download-list col-12 col-md-6 col-xl-4">
            <article class="card h-100 bg-transparent border-0">
               <div class="card-header ratio ratio-1x1 bg-body-tertiary border-0 shadow rounded-4">
                  <img src="{{ $item->image_url }}" alt="{{ $item->judul }}" loading="lazy" class="card-img object-fit-contain top-50 start-50 translate-middle h-75">
                  @if($item->file_size)
                  <div class="m-3 small text-muted">
                     <div class="d-flex align-items-center gap-2">
                        <span class="visually-hidden">File size</span> 
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" aria-hidden="true" width="16" height="16"><path fill="currentColor" d="M352 96C352 78.3 337.7 64 320 64C302.3 64 288 78.3 288 96L288 306.7L246.6 265.3C234.1 252.8 213.8 252.8 201.3 265.3C188.8 277.8 188.8 298.1 201.3 310.6L297.3 406.6C309.8 419.1 330.1 419.1 342.6 406.6L438.6 310.6C451.1 298.1 451.1 277.8 438.6 265.3C426.1 252.8 405.8 252.8 393.3 265.3L352 306.7L352 96zM160 384C124.7 384 96 412.7 96 448L96 480C96 515.3 124.7 544 160 544L480 544C515.3 544 544 515.3 544 480L544 448C544 412.7 515.3 384 480 384L433.1 384L376.5 440.6C345.3 471.8 294.6 471.8 263.4 440.6L206.9 384L160 384zM464 440C477.3 440 488 450.7 488 464C488 477.3 477.3 488 464 488C450.7 488 440 477.3 440 464C440 450.7 450.7 440 464 440z"/></svg> 
                        <span>{{ $item->file_size }}</span>
                     </div>
                  </div>
                  @endif
               </div>
               <div class="card-body text-center">
                  <h3 class="card-title fs-5 fw-semibold">{{ $item->judul }}</h3>
                  @if($item->judul_eng)
                  <p class="card-text">{{ $item->judul_eng }}</p>
                  @endif
               </div>
               <a href="{{ $item->download_url }}" class="stretched-link"></a>
            </article>
         </li>
         @empty
         <li class="download-list col-12">
            <p class="text-center fs-3 text-muted">Belum ada berkas katalog atau brosur yang diunggah.</p>
         </li>
         @endforelse
      </ul>
   </div>
</section>
@endsection