<div>
   {{-- Stop trying to control. --}}

<div>
   <div class="row">
      <div class="col-md-6">
            <h4>Posts Category</h4>
      </div>
      <div class="col-md-6">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addcatModal">
               <i class="ti ti-database-plus"></i> Add new category
            </button>
            <a href="{{url('admin/posts')}}" class="btn btn-info float-end me-2"><i class="ti ti-arrow-left"></i> Go back</a>
      </div>
   </div>
   <div class="table-responsive mt-3">
      @if (session()->has('catDeleted'))
            <h6 class="text-success">{{session('catDeleted')}}</h6>
      @endif 
      <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Status</th>
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
                     <td>{{$cat->name}}</td>
                     <td>{{$cat->description ?? 'No description'}}</td>
                     <td>
                        <span class="badge rounded-pill {{$cat->status == 1 ? 'bg-success' : 'bg-warning'}}">
                           {{$cat->status == 1 ? 'Active' : 'Inactive'}}
                        </span>
                     </td>
                     <td>
                        <button class="btn btn-sm btn-success" wire:click="edit({{$cat->id}})" data-bs-toggle="modal"
                        data-bs-target="#editcatModal">
                           <i class="ti ti-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{$cat->id}})"><i class="ti ti-trash"></i></button>
                     </td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="4" class="text-center">
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

         <form wire:submit.prevent="category">
            <div class="modal-bodydd px-4"> 
               @if (session()->has('category'))
                     <h6 class="text-success">{{session('category')}}</h6>
               @endif  
               @if (session()->has('error'))
                     <h6 class="text-danger">{{session('error')}}</h6>
               @endif                      
               <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="title">Category</label>
                           <input type="text" wire:model.defer="title" class="form-control" placeholder="Name">
                           @error('title')
                                 <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                        <div class="form-group mt-3">
                           <label for="status">Status</label>
                           <select name="status" id="status" class="form-control form-select" wire:model.defer="status">
                              <option value="">Select</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                           </select>
                           @error('status')
                                 <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                        <div class="form-group mt-3">
                           <label for="long_desc">Description</label>
                           <textarea wire:model.defer="desc" id="cat_desc" cols="30" rows="5" class="form-control" placeholder="Short description"></textarea>
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
               @if (session()->has('catUpdated'))
                     <h6 class="text-success">{{session('catUpdated')}}</h6>
               @endif                      
               <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="title">Category</label>
                           <input type="text" wire:model.defer="edit_title" class="form-control" placeholder="Post title">
                           @error('edit_title')
                                 <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                        <div class="form-group mt-3">
                           <label for="edit_status">Status</label>
                           <select name="edit_status" id="edit_status" class="form-control form-select" wire:model.defer="edit_status">
                              <option value="">Select</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                           </select>
                           @error('edit_status')
                                 <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>

                        <div class="form-group mt-3">
                           <label for="long_desc">Description</label>
                           <textarea wire:model.defer="edit_desc" id="long_desc" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                           @error('edit_desc')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>
                     </div>
               </div>
                     
            </div>
            <div class="modal-footer justify-content-start">
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

