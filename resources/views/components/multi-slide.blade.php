@php
   $carouselId = $id ?? 'multi-slide-' . uniqid();
   $titleId = $titleId ?? ($id ? $id . '-title' : null);
   $title = $title ?? 'MOMENTS';
   $subtitle = $subtitle ?? null;
   $viewAllUrl = $viewAllUrl ?? '#';
   $viewAllText = $viewAllText ?? 'View all news';
   $autoplay = isset($autoplay) ? (bool) $autoplay : true;
   $interval = $interval ?? 5000;
   $loop = isset($loop) ? (bool) $loop : true;
   $visibleLg = $visibleLg ?? 3;
   $visibleMd = $visibleMd ?? 2;
   $visibleSm = $visibleSm ?? 1;
   $items = $items ?? [];
@endphp

<div id="{{ $carouselId }}" class="multi-slide-wrapper position-relative overflow-hidden" data-multi-slide
   data-autoplay="{{ $autoplay ? 'true' : 'false' }}" data-interval="{{ $interval }}"
   data-loop="{{ $loop ? 'true' : 'false' }}" data-visible-lg="{{ $visibleLg }}" data-visible-md="{{ $visibleMd }}"
   data-visible-sm="{{ $visibleSm }}">

   {{-- Slider Header --}}
   <div class="multi-slide-header row justify-content-between align-items-center mb-4">
      <div class="multi-slide-title-wrapper col-12 col-md">
         <h2 @if ($titleId) id="{{ $titleId }}" @endif
            class="multi-slide-header-title text-title fs-3 fw-semibold">{{ $title }}</h2>
         @if ($subtitle)
            <p class="multi-slide-subtitle fs-2 text-muted mb-5">{{ $subtitle }}</p>
         @endif
      </div>

      <div class="multi-slide-controls col-12 col-md-auto d-flex align-items-center gap-3 justify-content-between">
         @if ($viewAllUrl)
            <a href="{{ $viewAllUrl }}" class="multi-slide-view-all link-body-emphasis link-opacity-50-hover">
               <span>{{ $viewAllText }}</span>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" aria-hidden="true" width="16"
                  height="16">
                  <path fill="currentColor"
                     d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z" />
               </svg>
            </a>
         @endif

         <div class="multi-slide-arrows d-flex align-items-center gap-2">
            <button type="button"
               class="multi-slide-arrow multi-slide-prev btn btn-outline-secondary rounded-circle d-flex justify-content-center align-items-center position-relative"
               aria-label="Previous slide">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" aria-hidden="true" width="21"
                  height="21" class="position-absolute top-50 start-50 translate-middle">
                  <path fill="currentColor"
                     d="M169.4 297.4C156.9 309.9 156.9 330.2 169.4 342.7L361.4 534.7C373.9 547.2 394.2 547.2 406.7 534.7C419.2 522.2 419.2 501.9 406.7 489.4L237.3 320L406.6 150.6C419.1 138.1 419.1 117.8 406.6 105.3C394.1 92.8 373.8 92.8 361.3 105.3L169.3 297.3z" />
               </svg>
            </button>
            <button type="button"
               class="multi-slide-arrow multi-slide-next btn btn-outline-secondary rounded-circle d-flex justify-content-center align-items-center position-relative"
               aria-label="Next slide">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" aria-hidden="true" width="21"
                  height="21" class="position-absolute top-50 start-50 translate-middle">
                  <path fill="currentColor"
                     d="M471.1 297.4C483.6 309.9 483.6 330.2 471.1 342.7L279.1 534.7C266.6 547.2 246.3 547.2 233.8 534.7C221.3 522.2 221.3 501.9 233.8 489.4L403.2 320L233.9 150.6C221.4 138.1 221.4 117.8 233.9 105.3C246.4 92.8 266.7 92.8 279.2 105.3L471.2 297.3z" />
               </svg>
            </button>
         </div>
      </div>
   </div>

   {{-- Slider Main Container --}}
   <div class="multi-slide-container position-relative">
      <div class="multi-slide-track">
         @foreach ($items as $item)
            @php
               $itemCategory = is_array($item)
                   ? $item['category'] ?? ($item['tag'] ?? 'ARTICLE')
                   : $item->category ?? 'ARTICLE';
               $itemTitle = is_array($item) ? $item['title'] ?? '' : $item->title ?? '';
               $itemDate = is_array($item) ? $item['date'] ?? ($item['created_at'] ?? '') : $item->date ?? '';
               $itemImage = is_array($item) ? $item['image'] ?? '' : $item->image ?? '';
               $itemUrl = is_array($item) ? $item['url'] ?? '#' : $item->url ?? '#';
            @endphp
            <div class="multi-slide-item">
               <article class="card multi-slide-card bg-body-secondary border-0 rounded-4 overflow-hidden h-100 shadow">
                  <div class="multi-slide-card-img-wrapper ratio ratio-16x9">
                     <img src="{{ asset($itemImage) }}" alt="{{ $itemTitle }}"
                        class="object-fit-cover w-100 h-100 multi-slide-card-img" loading="lazy">
                  </div>
                  <div class="card-body p-4 d-flex flex-column justify-content-between">
                     <div>
                        <small
                           class="multi-slide-card-category text-uppercase d-block mb-2">{{ $itemCategory }}</small>
                        <h3 class="multi-slide-card-title fs-5 fw-semibold mb-3">{{ $itemTitle }}
                        </h3>
                     </div>
                     @if ($itemDate)
                        <div class="multi-slide-card-date text-muted small">{{ $itemDate }}</div>
                     @endif
                  </div>
                  <a href="{{ $itemUrl }}" class="stretched-link" aria-label="{{ $itemTitle }}"></a>
               </article>
            </div>
         @endforeach
      </div>
   </div>

   {{-- Bottom Indicators --}}
   <div
      class="multi-slide-indicators d-flex justify-content-center align-items-center gap-2 mt-4 position-relative z-2">
   </div>
</div>
