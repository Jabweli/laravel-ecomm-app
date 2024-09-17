<div>
   {{-- Care about people's approval and you will be their prisoner. --}}
   <form class="form-subcriber fadeIn animated" wire:submit="save">
      <div class="d-flex wow">
         <input type="email" class="form-control bg-white font-small" placeholder="Enter your email" wire:model.defer="email">
         <button class="btn bg-dark text-white" type="submit">
            <span wire:loading.remove>Subscribe</span>
            <span wire:loading.delay>
               <span class="spinner-border spinner-border-sm" role="status"
                  aria-hidden="true"></span>
               Submitting...
            </span>
         </button>
      </div>
      <div>
         @error('email')
            <span class="text-danger">Please enter a valid email address</span>
         @enderror
         @if (session()->has('saved'))
            <span class="text-success">{{session('saved')}}</span>
         @endif 
      </div>
   </form>

</div>
