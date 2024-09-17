<div>
   {{-- Stop trying to control. --}}

<div>
   <div class="row">
      <div class="col-md-6">
         <h4>Product Categories</h4>
      </div>
      <div class="col-md-6">
         <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addcatModal">
            <i class="ti ti-database-plus"></i> Add category
         </button>
         <a href="{{url('admin/posts')}}" class="btn btn-info float-end me-2"><i class="ti ti-arrow-left"></i> Go back</a>
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
               <th>Category</th>
               <th class="text-center">No. products</th>
               <th class="text-center">Status</th>
               <th>Description</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            @php
               $sn = 1;
            @endphp
            @forelse ($categories as $cat)
               <tr>
                  <td>{{$sn++}}</td>
                  <td>
                     <img src="{{asset('storage/categories/'.$cat->image ?? 'placholder.png')}}" alt="{{$cat->image}}" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover">
                  </td>
                  <td>{{$cat->name}}</td>
                  <td class="text-center">{{$cat->products->count()}}</td>
                  <td class="text-center">
                     <span class="badge rounded-pill {{$cat->status === 1 ? 'bg-success':'bg-warning'}}">    
                        {{$cat->status === 1 ? 'Active':'Inactive'}}
                     </span>
                  </td>
                  <td>{{$cat->description ?? 'No description'}}</td>
                  <td>
                     <button class="btn btn-sm btn-success" wire:click="edit({{$cat->id}})" data-bs-toggle="modal"
                     data-bs-target="#editcatModal">
                        <i class="ti ti-pencil"></i>
                     </button>
                     <button class="btn btn-sm btn-danger" wire:confirm="Are you sure you want to delete this category?" wire:click="delete({{$cat->id}})"><i class="ti ti-trash"></i></button>
                  </td>
               </tr>
            @empty
               <tr>
                  <td colspan="5" class="text-center">
                     <h5 class="text-danger">No categories found!</h5>
                  </td>
               </tr>
            @endforelse
         </tbody>
      </table>
   </div>
</div>



<!-- add category modal -->
<div wire:ignore.self class="modal fade" id="addcatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-scrollable modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header px-4">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add category</h1>
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
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="cat_name">Category</label>
                           <input type="text" id="cat_name" wire:model.defer="name" class="form-control" placeholder="Name">
                           @error('name')
                                 <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                        <div class="form-group mt-3">
                           <label for="cat_image">Image</label>
                           <input type="file" id="cat_image" wire:model.defer="image" class="form-control" >
                           @error('image')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                        <div class="form-group mt-3">
                        <label for="cat_status">Status</label>
                        <select wire:model.defer="status" id="cat_status" class="form-select form-control">
                           <option value="">select</option>
                           <option value="1" selected>Active</option>
                           <option value="0">Inactive</option>
                        </select>
                        @error('status')
                           <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>

                        <div class="form-group mt-3">
                           <label for="cat_desc2">Description</label>
                           <textarea wire:model.defer="desc" id="cat_desc2" cols="30" rows="5" class="form-control" placeholder="Short description"></textarea>
                           @error('long_desc')
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
<div wire:ignore.self class="modal fade" id="editcatModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-scrollable modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header px-4">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <form wire:submit.prevent="update({{$cat_id}})">
            <div class="modal-bodydd px-4"> 
               @if (session()->has('updated'))
                  <h6 class="text-success">{{session('updated')}}</h6>
               @endif                      
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                           <label for="cat_name">Category</label>
                           <input type="text" id="cat_name" wire:model.defer="edit_name" class="form-control" placeholder="Name">
                           @error('edit_name')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                     </div>

                     <div class="form-group mt-3">
                           <label for="cat_image">Image</label>
                           <input type="file" id="cat_image" wire:model.defer="edit_image" class="form-control" >
                           @error('edit_image')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                     </div>
                     <div class="mt-2">
                     <span>Current:</span>
                     <img src="{{asset('storage/categories/'.$current_img ?? 'placholder.png')}}" alt="{{$cat->image}}" style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover">
                     </div>

                     <div class="form-group mt-3">
                        <label for="cat_status">Status</label>
                        <select wire:model.defer="edit_status" id="cat_status" class="form-select form-control">
                           <option value="1">Active</option>
                           <option value="2">Inactive</option>
                        </select>
                        @error('edit_status')
                           <small class="text-danger">{{$message}}</small>
                        @enderror
                     </div>

                     <div class="form-group mt-3">
                           <label for="cat_desc2">Description</label>
                           <textarea wire:model.defer="edit_desc" id="cat_desc2" cols="30" rows="3" class="form-control" placeholder="Short description">{{$edit_desc}}</textarea>
                           @error('edit_desc')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
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


