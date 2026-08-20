@php
   $carouselId = $id ?? 'multi-slide-' . uniqid();
   $titleId = $titleId ?? ($id ? $id . '-title' : null);
   $title = $title ?? 'MOMENTS';
   $subtitle = $subtitle ?? null;
   $viewAllUrl = $viewAllUrl ?? null;
   $viewAllText = $viewAllText ?? 'View all news';
   $autoplay = isset($autoplay) ? (bool) $autoplay : true;
   $interval = $interval ?? 5000;
   $loop = isset($loop) ? (bool) $loop : true;
   $visibleLg = $visibleLg ?? 3;
   $visibleMd = $visibleMd ?? 2;
   $visibleSm = $visibleSm ?? 1;
   $items = $items ?? [];
   $variant = $variant ?? 'default';
   $showControls = isset($showControls) ? (bool) $showControls : $variant !== 'timeline';
   $showArrows = isset($showArrows) ? (bool) $showArrows : $variant !== 'timeline';
   $showIndicators = isset($showIndicators)
       ? (bool) $showIndicators
       : (isset($showDots)
           ? (bool) $showDots
           : (isset($indicators)
               ? (bool) $indicators
               : true));
   $swipe = isset($swipe) ? (bool) $swipe : (isset($draggable) ? (bool) $draggable : true);

   $wrapperClasses = 'multi-slide-wrapper position-relative overflow-hidden';
   if ($variant === 'timeline') {
       $wrapperClasses .= ' text-bg-custom-1 rounded-4 p-4 p-lg-5 multi-slide-timeline';
   } elseif ($variant === 'social' || $variant === 'sosmed') {
       $wrapperClasses .= ' bg-body-secondary rounded-4 p-4 p-lg-5 multi-slide-social';
   }
@endphp

<div id="{{ $carouselId }}" class="{{ $wrapperClasses }}" data-multi-slide
   data-autoplay="{{ $autoplay ? 'true' : 'false' }}" data-interval="{{ $interval }}"
   data-loop="{{ $loop ? 'true' : 'false' }}" data-visible-lg="{{ $visibleLg }}" data-visible-md="{{ $visibleMd }}"
   data-visible-sm="{{ $visibleSm }}" data-show-controls="{{ $showControls ? 'true' : 'false' }}"
   data-show-arrows="{{ $showArrows ? 'true' : 'false' }}"
   data-show-indicators="{{ $showIndicators ? 'true' : 'false' }}" data-swipe="{{ $swipe ? 'true' : 'false' }}">

   {{-- Slider Header --}}
   <div
      class="multi-slide-header row justify-content-between align-items-center {{ $variant === 'timeline' ? 'mb-2' : 'mb-4' }}">
      <div class="multi-slide-title-wrapper col-12 col-md">
         <h2 @if ($titleId) id="{{ $titleId }}" @endif
            class="multi-slide-header-title text-title fs-3 fw-semibold {{ $variant === 'timeline' ? 'text-white' : '' }}">
            {{ $title }}</h2>
         @if ($subtitle)
            <p class="multi-slide-subtitle fs-2 text-muted mb-5">{{ $subtitle }}</p>
         @endif
      </div>

      @if ($showControls && ($viewAllUrl || $showArrows))
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

            @if ($showArrows)
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
            @endif
         </div>
      @endif
   </div>

   {{-- Slider Main Container --}}
   <div class="multi-slide-container position-relative">
      <div class="multi-slide-track">
         @foreach ($items as $item)
            @php
               $itemTitle = is_array($item) ? $item['title'] ?? '' : $item->title ?? '';
               $itemImage = is_array($item) ? $item['image'] ?? '' : $item->image ?? '';
               $itemModal = is_array($item) ? $item['modal'] ?? ($item['modal_id'] ?? null) : $item->modal ?? null;
               $itemUrl = is_array($item) ? $item['url'] ?? '#' : $item->url ?? '#';
               $itemCategory = is_array($item)
                   ? $item['category'] ?? ($item['tag'] ?? 'ARTICLE')
                   : $item->category ?? 'ARTICLE';
               $itemDate = is_array($item)
                   ? $item['date'] ?? ($item['time'] ?? ($item['created_at'] ?? ''))
                   : $item->date ?? '';
               $itemAuthor = is_array($item)
                   ? $item['author'] ?? ($item['username'] ?? 'INDRACO')
                   : $item->author ?? 'INDRACO';
               $itemAvatar = is_array($item)
                   ? $item['avatar'] ?? 'images/icon-indraco.png'
                   : $item->avatar ?? 'images/icon-indraco.png';
            @endphp

            @if ($variant === 'timeline')
               <div class="multi-slide-item">
                  <article class="card timeline-card border-0 text-center">
                     <div class="timeline-img-wrapper">
                        {{-- <img src="{{ asset($itemImage) }}" alt="{{ strip_tags($itemTitle) }}" loading="lazy"> --}}
                        <img src="{{ asset($itemImage) }}" aria-hidden="true" loading="lazy">
                     </div>
                     <h3 class="timeline-title">{!! nl2br(e($itemTitle)) !!}</h3>
                     <hr class="timeline-divider">
                     @if ($itemModal)
                        <button type="button" class="timeline-more-btn" data-bs-toggle="modal"
                           data-bs-target="#{{ $itemModal }}">more</button>
                     @elseif($itemUrl && $itemUrl !== '#')
                        <a href="{{ $itemUrl }}" class="timeline-more-btn">more</a>
                     @else
                        <span class="timeline-more-btn">more</span>
                     @endif
                  </article>
               </div>
            @elseif ($variant === 'social' || $variant === 'sosmed')
               <div class="multi-slide-item">
                  <article
                     class="card social-card bg-white border-0 rounded-4 overflow-hidden shadow-sm h-100 position-relative">
                     <div
                        class="card-header social-card-header bg-transparent border-0 d-flex align-items-center justify-content-between p-3">
                        <div class="d-flex align-items-center gap-2">
                           <div
                              class="social-profile-avatar-wrapper rounded-circle overflow-hidden d-flex align-items-center justify-content-center"
                              style="width: 30px; height: 30px;">
                              {{-- <img src="{{ asset($itemAvatar) }}" alt="{{ $itemAuthor }}" class="w-100 h-100 object-fit-cover"> --}}
                              <img src="{{ asset($itemAvatar) }}" aria-hidden="true"
                                 class="w-100 h-100 object-fit-cover">
                           </div>
                           <span class="social-profile-username fw-bold text-dark small">{{ $itemAuthor }}</span>
                        </div>
                        <div class="social-platform-icon text-dark">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none"
                              aria-hidden="true" width="22" height="22">
                              <path fill="currentColor"
                                 d="M320.3 205C256.8 204.8 205.2 256.2 205 319.7C204.8 383.2 256.2 434.8 319.7 435C383.2 435.2 434.8 383.8 435 320.3C435.2 256.8 383.8 205.2 320.3 205zM319.7 245.4C360.9 245.2 394.4 278.5 394.6 319.7C394.8 360.9 361.5 394.4 320.3 394.6C279.1 394.8 245.6 361.5 245.4 320.3C245.2 279.1 278.5 245.6 319.7 245.4zM413.1 200.3C413.1 185.5 425.1 173.5 439.9 173.5C454.7 173.5 466.7 185.5 466.7 200.3C466.7 215.1 454.7 227.1 439.9 227.1C425.1 227.1 413.1 215.1 413.1 200.3zM542.8 227.5C541.1 191.6 532.9 159.8 506.6 133.6C480.4 107.4 448.6 99.2 412.7 97.4C375.7 95.3 264.8 95.3 227.8 97.4C192 99.1 160.2 107.3 133.9 133.5C107.6 159.7 99.5 191.5 97.7 227.4C95.6 264.4 95.6 375.3 97.7 412.3C99.4 448.2 107.6 480 133.9 506.2C160.2 532.4 191.9 540.6 227.8 542.4C264.8 544.5 375.7 544.5 412.7 542.4C448.6 540.7 480.4 532.5 506.6 506.2C532.8 480 541 448.2 542.8 412.3C544.9 375.3 544.9 264.5 542.8 227.5zM495 452C487.2 471.6 472.1 486.7 452.4 494.6C422.9 506.3 352.9 503.6 320.3 503.6C287.7 503.6 217.6 506.2 188.2 494.6C168.6 486.8 153.5 471.7 145.6 452C133.9 422.5 136.6 352.5 136.6 319.9C136.6 287.3 134 217.2 145.6 187.8C153.4 168.2 168.5 153.1 188.2 145.2C217.7 133.5 287.7 136.2 320.3 136.2C352.9 136.2 423 133.6 452.4 145.2C472 153 487.1 168.1 495 187.8C506.7 217.3 504 287.3 504 319.9C504 352.5 506.7 422.6 495 452z" />
                           </svg>
                        </div>
                     </div>
                     <div class="social-card-img-wrapper ratio ratio-1x1 overflow-hidden">
                        {{-- <img src="{{ asset($itemImage) }}" class="object-fit-cover w-100 h-100" alt="{{ $itemAuthor }}" loading="lazy"> --}}
                        <img src="{{ asset($itemImage) }}" class="object-fit-cover w-100 h-100" aria-hidden="true"
                           loading="lazy">
                     </div>
                     <div class="card-body social-card-body p-3 d-flex align-items-center justify-content-between">
                        <div class="social-card-time d-flex align-items-center gap-1 text-secondary small">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="12" height="12"
                              fill="currentColor">
                              <path
                                 d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-156.8l-77.8-77.7V112c0-8.8-7.2-16-16-16s-16 7.2-16 16v120c0 4.2 1.7 8.3 4.7 11.3l82.8 82.8c6.2 6.2 16.4 6.2 22.6 0s6.2-16.4 0-22.6z" />
                           </svg>
                           <span>{{ $itemDate }}</span>
                        </div>
                     </div>
                     @if ($itemUrl && $itemUrl !== '#')
                        <a href="{{ $itemUrl }}" target="_blank" class="stretched-link"
                           aria-label="View social media post"></a>
                     @endif
                  </article>
               </div>
            @else
               <div class="multi-slide-item">
                  <article
                     class="card multi-slide-card bg-body-secondary border-0 rounded-4 overflow-hidden h-100 shadow">
                     <div class="multi-slide-card-img-wrapper ratio ratio-16x9">
                        <img src="{{ asset($itemImage) }}" alt="{{ $itemTitle }}"
                           class="object-fit-cover w-100 h-100 multi-slide-card-img" loading="lazy"
                           aria-hidden="true">
                     </div>
                     <div class="card-body p-4 d-flex flex-column justify-content-between">
                        <div>
                           <small
                              class="multi-slide-card-category text-uppercase text-custom-2 d-block fw-semibold mb-2">{{ $itemCategory }}</small>
                           <h3 class="multi-slide-card-title fs-5 fw-semibold lh-base mb-3">{{ $itemTitle }}
                           </h3>
                        </div>
                        @if ($itemDate)
                           <div class="multi-slide-card-date text-muted small">{{ $itemDate }}</div>
                        @endif
                     </div>
                     <a href="{{ $itemUrl }}" class="stretched-link" aria-label="{{ $itemTitle }}"></a>
                  </article>
               </div>
            @endif
         @endforeach
      </div>
   </div>

   {{-- Bottom Indicators --}}
   @if ($showIndicators)
      <div
         class="multi-slide-indicators d-flex justify-content-center align-items-center gap-2 mt-4 position-relative z-2">
      </div>
   @endif
</div>
