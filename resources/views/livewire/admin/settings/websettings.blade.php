<div>
   {{-- Close your eyes. Count to one. That is how long forever feels. --}}
   <h4>Website settings</h4>
   @if (session()->has('settings'))
   <p class="text-success">{{ session('settings') }}</p>
   @endif
   <form wire:submit.prevent="save">
      <div class="row mt-4">
         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Website Name</strong></label>
            <input type="text" id="name" class="form-control" wire:model.defer="name">
         </div>

         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Website URL</strong></label>
            <input type="text" class="form-control" wire:model.defer="url">
         </div>
      </div>

      <div class="row mt-3">
         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Phone number </strong></label>
            <input type="text" class="form-control" wire:model.defer="phone">
         </div>

         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Email address </strong></label>
            <input type="email" class="form-control" wire:model.defer="email">
            @error('email')
               <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>
      </div>

      <div class="row mt-3">
         <div class="col-md-12">
            <label for="name" class="mb-1"><strong>Address 1</strong></label>
            <input type="text" class="form-control" wire:model.defer="address">
         </div>

      </div>

      <h5 class="mt-4">Social Media</h5>
      <div class="row">
         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Instagram</strong></label>
            <input type="text" class="form-control" wire:model.defer="insta">
         </div>

         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Twitter</strong></label>
            <input type="text" class="form-control" wire:model.defer="twitter">
         </div>
      </div>
      <div class="row mt-3">
         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Website logo</strong></label>
            <input type="file" class="form-control" wire:model.defer="logo">
            <div class="mt-2">
               <img src="{{ asset('storage/photos/' . $currentlogo) }}" alt="logo"
                  style="width: 150px; height: 40px; object-fit: cover">
            </div>
         </div>

         <div class="col-md-6">
            <label for="name" class="mb-1"><strong>Facebook</strong></label>
            <input type="text" class="form-control" wire:model.defer="facebook">
         </div>
      </div>



      <div class="mt-3 ">
         <button class="btn btn-primary" type="submit">
            <span wire:loading.remove>Save settings</span>
            <span wire:loading.delay>
               <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
               Saving...
            </span>
         </button>
      </div>
   </form>
</div>
