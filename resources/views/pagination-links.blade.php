<div>
   @if ($paginator->hasPages())

      <nav aria-label="Page navigation example">
         <ul class="pagination justify-content-start">

            @if (!$paginator->onFirstPage())

               <li class="page-item">
                  <a class="page-link" wire:click="previousPage"><i class="fi-rs-angle-double-small-left"></i></a>
               </li>
                
            @endif

            {{-- page links --}}
            @foreach ($elements as $element)
               
               @if (is_string($element))
                  <li class="page-item disabled d-none d-md-block" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
               @endif
   
               {{-- Array Of Links --}}
               @if (is_array($element))
                  @foreach ($element as $page => $url)
                     @if ($page == $paginator->currentPage())
                           <li class="page-item active d-none d-md-block" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                     @else
                           <li class="page-item d-none d-md-block"><button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                     @endif
                  @endforeach
               @endif


            @endforeach


            @if ($paginator->hasMorePages())
               <li class="page-item">
                  <a class="page-link" wire:click="nextPage"><i class="fi-rs-angle-double-small-right"></i></a>
               </li>
            @endif
         </ul>
      </nav>

   @endif

</div>