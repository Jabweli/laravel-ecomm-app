<div>
   {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

   <div>
      <div class="row border-0 border-bottom pb-1 mb-2">
         <div class="col-md-6">
            <h4>Blog Posts</h4>
         </div>
         <div class="col-md-6">
            <a href="{{url('admin/create/post')}}" class="btn btn-primary float-end">
               <i class="ti ti-database-plus"></i> Add new post
            </a>
         </div>
      </div>

      <div class="table-responsive">
      @if (session()->has('deleted'))
         <h6 class="text-success">{{session('deleted')}}</h6>
      @endif 
      @if (session()->has('edited'))
         <h6 class="text-success">{{session('edited')}}</h6>
      @endif 
      @if (session()->has('failed'))
         <h6 class="text-danger">{{session('failed')}}</h6>
      @endif 
      @if (session()->has('posts'))
         <h6 class="text-success">{{ session('posts') }}</h6>
      @endif
      <table class="table table-smdd">
         <thead>
               <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
         </thead>
         <tbody>
               @forelse ($posts as $post)
                  <tr>
                     <td>{{$post->id}}</td>
                     <td>
                        <img src="{{asset('storage/posts/'.$post->image)}}" alt="post image"
                        style="width: 40px; height: 40px; object-fit:cover; border-radius: 5px">
                     </td>
                     <td>
                        <a href="{{url('post/'.$post->slug)}}" target="_blank">
                           {{substr($post->title, 0, 40)}}..
                        </a>
                     </td>
                     <td>{{$post->category->name}}</td>
                     <td>{{substr($post->short_desc, 0, 30)}}..</td>
                     <td>{{'Status'}}</td>
                     <td>
                        <a href="{{url('admin/edit/post/'.$post->id)}}" class="btn btn-sm btn-success">
                        <i class="ti ti-pencil"></i>
                        </a>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{$post->id}})"><i class="ti ti-trash"></i></button>
                     </td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="6" class="text-center">
                        <h5 class="text-danger">No posts found!</h5>
                     </td>
                  </tr>
               @endforelse
         </tbody>
      </table>
      </div>
   </div>




   <!-- edit post modal -->
   <div wire:ignore.self class="modal fade" id="editpostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-scrollable modal-lg">
         <div class="modal-content">
            <div class="modal-header px-4">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Post</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="update({{$post_id}})">
                  <div class="modal-bodyddd px-4"> 
                     @if (session()->has('updated'))
                        <h6 class="text-success">{{session('updated')}}</h6>
                     @endif                        
                     <div class="row">
                        <div class="col-md-6">
                              <div class="form-group">
                                 <label for="title">
                                 <b>Title</b>
                                 </label>
                                 <input type="text" wire:model.defer="title" class="form-control" placeholder="Post title">
                                 @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                 @enderror
                              </div>

                              <div class="form-group mt-3">
                                 <label for="title">
                                    <b>Category</b>
                                 </label>
                                 <select wire:model.defer="category" id="category" class="form-control form-select">
                                    <option value="">Select category</option>
                                    <option value="Charity">Charity</option>
                                    <option value="Development">Development</option>
                                 </select>
                                 @error('category')
                                    <small class="text-danger">{{$message}}</small>
                                 @enderror
                              </div>
      
                              
      
                              <div class="form-group mt-3">
                                 <label for="title">
                                 <b>Short description</b>
                                 </label>
                                 <textarea wire:model.defer="short_desc" id="" cols="30" rows="5" class="form-control" placeholder="Short description"></textarea>
                                 @error('short_desc')
                                    <small class="text-danger">{{$message}}</small>
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
                                    <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>

                           <div class="mt-3">
                           <img src="{{asset('storage/photos/'.$currentImage)}}" alt="placeholder" style="width: 100%; height: 220px; object-fit: cover; border-radius: 5px">
                           </div>
                        </div>  
                     </div>


                     <div class="row">
                        <div class="col-md-12 mt-4">
                           <div class="form-group" wire:ignore>
                                 <label for="long_desc">
                                 <b>Full Description</b>
                                 </label>
                                 <textarea wire:model.defer="long_desc" data-post="@this" id="edit_long_desc" cols="30" rows="16" class="form-control" placeholder="Long description">{{$long_desc}}</textarea>
                                 @error('long_desc')
                                    <small class="text-danger">{{$message}}</small>
                                 @enderror
                           </div>
                        </div>
                     </div>
                           
                  </div>
                  <div class="modal-footer justify-content-start px-4">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button class="btn btn-primary" type="submit" id="editSubmitBtn">
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

