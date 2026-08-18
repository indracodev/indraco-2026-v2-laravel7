<div id="modal-search" class="modal fade" tabindex="-1" aria-labelledby="modal-search-title" aria-modal="true" role="dialog">
   <div class="modal-dialog modal-fullscreen-lg-down modal-dialog-scrollable">
      <form class="modal-content py-3" action="{{ route('products.index') }}" method="GET" role="search">
         
         <h2 id="modal-search-title" class="visually-hidden">Product Search Dialog</h2>

         <div class="container-fluid">
            <div class="input-group mb-4">
               <label class="visually-hidden" id="search-label" for="search">Search Our Products</label>               
               <span class="input-group-text bg-transparent border border-2 border-end-0 px-2 rounded-start-3" aria-hidden="true">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" fill="none" width="24" height="24">
                     <path fill="currentColor" d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/>
                  </svg>
               </span>
               <input class="form-control form-control-lg border border-2 border-start-0 border-end-0 px-0" type="search" name="search" id="search" placeholder="Search Our Products" value="{{ request('search') }}">
               <button class="btn btn-invert border-2" type="submit">Search</button>
            </div>
            
            <h3 class="fs-6 text-muted mb-2"><small>Popular Keywords</small></h3>
            <nav class="mb-4" aria-label="Popular keywords">
               <ul class="nav gap-1">
                  <li><a href="{{ route('products.index') }}?search=Sumatra" class="btn btn-outline-invert">Sumatra Mandheling</a></li>
                  <li><a href="{{ route('products.index') }}?search=Coffee" class="btn btn-outline-invert">Coffee</a></li>
                  <li><a href="{{ route('products.index') }}?search=Capsules" class="btn btn-outline-invert">Coffee Capsules</a></li>
                  <li><a href="{{ route('products.index') }}?search=Jahe" class="btn btn-outline-invert">Jaheku</a></li>
               </ul>
            </nav>
            
            <h3 class="fs-6 text-muted mb-2"><small>Search Result</small></h3>
         </div>

         <div class="container-fluid flex-grow-1 mb-4">
            <ul class="list-group list-group-flush">
               <li class="list-group-item px-0">
                  <a href="#" class="btn text-start p-0 w-100">Supresso Aceh Gayo Coffee Capsules 200g</a>
               </li>
               <li class="list-group-item px-0">
                  <a href="#" class="btn text-start p-0 w-100">Supresso Sumatra Mandheling Coffee Capsules 200g</a>
               </li>
               <li class="list-group-item px-0">
                  <a href="#" class="btn text-start p-0 w-100">Supresso Bali Kintamani Coffee Capsules 200g</a>
               </li>
               <li class="list-group-item px-0">
                  <a href="#" class="btn text-start p-0 w-100">Supresso Papua Baliem Coffee Capsules 200g</a>
               </li>
            </ul>
         </div>

         <div class="container-fluid d-flex justify-content-end">
            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
         </div>
         
      </form>
   </div>
</div>