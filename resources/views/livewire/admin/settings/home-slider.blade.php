<div>
   {{-- Stop trying to control. --}}

<div>
   <div class="row">
      <div class="col-md-6">
         <h4>Home Slides</h4>
      </div>
      <div class="col-md-6">
         <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addslideModal">
            <i class="ti ti-database-plus"></i> Create slide
         </button>
      </div>
   </div>
   <div class="table-responsive mt-3">
      @if (session()->has('deleted'))
            <h6 class="text-success">{{session('deleted')}}</h6>
      @endif 
      <table class="table">
         <thead>
            <tr>
               <th>ID</th>
               <th>Image</th>
               <th>Title</th>
               <th>Top Title</th>
               <th>Subtitle</th>
               <th>Offer</th>
               <th>link</th>
               <th>Status</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php
               $sn = 1;
            @endphp
            @forelse ($slides as $slide)
               <tr>
                  <td>{{$sn++}}</td>
                  <td>
                     <img src="{{asset('storage/slides/'.$slide->image ?? 'placholder.png')}}" alt="{{$slide->image}}" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover">
                  </td>
                  <td>{{$slide->title}}</td>
                  
                  <td>{{$slide->top_title ?? 'No description'}}</td>
                  <td>{{$slide->sub_title}}</td>
                  <td>{{strlen($slide->offer) > 15 ? substr($slide->offer, 0, 15).'...' : $slide->offer}}</td>
                  <td>{{$slide->link}}</td>
                  <td>
                     <span class="badge rounded-pill {{$slide->status === 1 ? 'bg-success':'bg-warning'}}">    
                        {{$slide->status === 1 ? 'Active':'Inactive'}}
                     </span>
                  </td>
                  <td>
                     <button class="btn btn-sm btn-success" wire:click="edit({{$slide->id}})" data-bs-toggle="modal"
                     data-bs-target="#editslideModal">
                        <i class="ti ti-pencil"></i>
                     </button>
                     <button class="btn btn-sm btn-danger" wire:click="delete({{$slide->id}})"><i class="ti ti-trash"></i></button>
                  </td>
               </tr>
            @empty
               <tr>
                  <td colspan="9" class="text-center">
                     <h5 class="text-danger">No home slides found!</h5>
                  </td>
               </tr>
            @endforelse
         </tbody>
      </table>
   </div>
</div>



<!-- add category modal -->
<div wire:ignore.self class="modal fade" id="addslideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header px-4">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Create slide</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <form wire:submit.prevent="save">
            <div class="modal-bodydd px-4"> 
               @if (session()->has('saved'))
                     <h6 class="text-success">{{session('saved')}}</h6>
               @endif
               @if (session()->has('error'))
                     <h6 class="text-danger">{{session('error')}}</h6>
               @endif                       
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="top_title">Top Title</label>
                        <input type="text" id="top_title" wire:model.defer="top_title" class="form-control" placeholder="Top title">
                        @error('top_title')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" wire:model.defer="title" class="form-control" placeholder="Title">
                        @error('title')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <label for="subtitle">SubTitle</label>
                        <input type="text" id="subtitle" wire:model.defer="subtitle" class="form-control" placeholder="Subtitle">
                        @error('subtitle')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <label for="offer">Offer</label>
                        <input type="text" id="offer" wire:model.defer="offer" class="form-control" placeholder="Offer">
                        @error('offer')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <label for="link">Link</label>
                        <input type="text" id="link" wire:model.defer="link" class="form-control" placeholder="Link">
                        @error('link')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <label for="image">Slide Image</label>
                        <input type="file" id="image" wire:model.defer="image" class="form-control">
                        @error('image')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12">
                     <div class="form-group mt-3">
                        <label for="status">Status</label>
                        <select wire:model.defer="status" id="status" class="form-select form-control">
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                        @error('status')
                           <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>
               </div>
                     
            </div>
            <div class="modal-footer justify-content-start px-4">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button class="btn btn-primary" type="submit">
                     <span wire:loading.remove>Save</span>
                     <span wire:loading.delay>
                        <span class="spinner-border spinner-border-sm" role="status"
                           aria-hidden="true"></span>
                        Saving...
                     </span>
               </button>
            </div>
         </form>
      </div>
   </div>
</div>


<!-- edit category modal -->
<div wire:ignore.self class="modal fade" id="editslideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
         <div class="modal-header px-4">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit slide</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <form wire:submit.prevent="update({{$slide_id}})">
            <div class="modal-bodydd px-4"> 
               @if (session()->has('updated'))
                  <h6 class="text-success">{{session('updated')}}</h6>
               @endif                      
               
               <div class="row">
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="edit_top_title">Top Title</label>
                        <input type="text" id="edit_top_title" wire:model.defer="edit_top_title" class="form-control" placeholder="Top title">
                        @error('edit_top_title')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="edit_title">Title</label>
                        <input type="text" id="title" wire:model.defer="edit_title" class="form-control" placeholder="Title">
                        @error('edit_title')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <label for="edit_subtitle">SubTitle</label>
                        <input type="text" id="edit_subtitle" wire:model.defer="edit_subtitle" class="form-control" placeholder="Subtitle">
                        @error('edit_subtitle')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <label for="edit_offer">Offer</label>
                        <input type="text" id="edit_offer" wire:model.defer="edit_offer" class="form-control" placeholder="Offer">
                        @error('edit_offer')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-6 mt-3">
                     <div class="form-group">
                        <label for="edit_link">Link</label>
                        <input type="text" id="edit_link" wire:model.defer="edit_link" class="form-control" placeholder="Link">
                        @error('edit_link')
                              <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>


                  <div class="col-md-6">
                     <div class="form-group mt-3">
                        <label for="edit_status">Status</label>
                        <select wire:model.defer="edit_status" id="edit_status" class="form-select form-control">
                           <option value="1">Active</option>
                           <option value="0">Inactive</option>
                        </select>
                        @error('edit_status')
                           <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>
                  </div>

                  <div class="col-md-12 mt-3">
                     <div class="form-group">
                        <label for="edit_image">Slide Image</label>
                        <input type="file" id="edit_image" wire:model.defer="edit_image" class="form-control">
                        @error('edit_image')
                           <small class="text-danger">{{$message}}</small>
                        @enderror
                        <div class="mt-2">
                           <span>Current:</span>
                           <img src="{{asset('storage/slides/'.$current_img ?? 'placholder.png')}}" alt="{{$current_img}}" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover">
                        </div>
                     </div>
                  </div>

               </div>
                     
            </div>
            <div class="modal-footer justify-content-start px-4">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button class="btn btn-primary" type="submit">
                  <span wire:loading.remove>Update</span>
                  <span wire:loading.delay>
                     <span class="spinner-border spinner-border-sm" role="status"
                           aria-hidden="true"></span>
                     Saving...
                  </span>
               </button>
            </div>
         </form>

      </div>
   </div>
</div>


</div>


