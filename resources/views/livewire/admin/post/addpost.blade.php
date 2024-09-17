<div>
   {{-- The Master doesn't talk, he acts. --}}

<div>

<div class="row">
   <div class="col-md-6">
      <h4>Create post</h4>
   </div>
   <div class="col-md-6">
      <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addcatModal">
            <i class="ti ti-database-plus"></i> Add new category
      </button>
      <a href="{{url('admin/posts')}}" class="btn btn-info float-end me-2"><i class="ti ti-arrow-left"></i> Go back</a>
   </div>
</div>


<form wire:submit.prevent="post" class="mt-3">
   <div class="modal-bodydd">
      @if (session()->has('posts'))
            <h6 class="text-success">{{ session('posts') }}</h6>
      @endif
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="title">
                     <strong>Title</strong>
                  </label>
                  <input type="text" wire:model.defer="title" class="form-control" placeholder="Post title">
                  @error('title')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>

               <div class="form-group mt-3">
                  <label for="category">
                     <strong>Category</strong>
                  </label>
                  <select wire:model.defer="category" id="category" class="form-control form-select">
                        <option value="">Select category</option>
                        @foreach ($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                     
                  </select>
                  @error('category')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>

               <div class="form-group mt-3">
                  <label for="title">
                     <strong>Short description</strong>
                  </label>
                  <textarea wire:model.defer="short_desc" id="" cols="30" rows="5" class="form-control"
                        placeholder="Short description"></textarea>
                  @error('short_desc')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                  <label for="title">
                     <b>Feature image</b>
                  </label>
                  <input type="file" wire:model.defer="image" class="form-control" placeholder="Post title">
                  @error('image')
                     <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>

               <div class="mt-3">
               @if ($image)
                  <img src="{{ $image->temporaryURL() }}" alt="placeholder" style="width: 100%; height: 220px; object-fit: cover; border-radius: 5px">
               @else
                  <img src="{{asset('admins/images/backgrounds/placeholder.png')}}" alt="placeholder" style="width: 100%; height: 220px; object-fit: cover; border-radius: 5px">
               @endif
               
               </div>
            </div>
            
         </div>

      <div class="row">
         <div class="col-md-12 mt-4">
            <div class="form-group" wire:ignore>
               <label for="long_desc">
                  <strong>Full Description</strong>
               </label>
               <textarea wire:model.defer="long_desc" data-note="@this" id="long_desc" cols="30" rows="16" class="form-control"
                     placeholder="Write detailed description here"></textarea>
               @error('long_desc')
                     <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
         </div>
      </div>
   </div>
   <div class="modal-footer mt-4 justify-content-start">
      <button class="btn btn-primary" type="submit" id="submitBtn">
            <span wire:loading.remove>Save changes</span>
            <span wire:loading.delay>
               <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
               Saving...
            </span>
      </button>
   </div>
</form>



</div>



</div>

