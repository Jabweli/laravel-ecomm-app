<div>
   {{-- Because she competes with no one, no one can compete with her. --}}

   <div>
     <div class="row">
         <div class="col-md-6">
             <h4>Client Testimonies</h4>
         </div>
         <div class="col-md-6">
             <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addpostModal">
                 <i class="ti ti-database-plus"></i> Add Testimony
             </button>
         </div>
     </div>
     <div class="table-responsive">
        @if (session()->has('deleted'))
           <h6 class="text-success">{{session('deleted')}}</h6>
        @endif 
        @if (session()->has('updated'))
           <h6 class="text-success">{{session('updated')}}</h6>
        @endif  
         <table class="table table-stripeddd">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Image</th>
                     <th>Profession</th>
                     <th>Description</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
              @php
                  $sn = 1;
              @endphp
                 @forelse ($testimonies as $testimony)
                     <tr>
                         <td>{{$sn++}}</td>
                         <td>{{$testimony->name}}</td>
                         <td>
                             <img src="{{asset('storage/clients/'.$testimony->image)}}" alt="testimony image"
                             style="width: 40px; height: 40px; object-fit:cover; border-radius: 9999px">
                         </td>
                         <td>{{$testimony->profession}}</td>
                         <td>{{substr($testimony->body, 0, 50)}}..</td>
                         <td>
                             <button class="btn btn-sm btn-success" wire:click="fetch({{$testimony->id}})" data-bs-toggle="modal"
                             data-bs-target="#edittestimonyModal">
                                 <i class="ti ti-pencil"></i>
                             </button>
                             <button class="btn btn-sm btn-danger" wire:click="delete({{$testimony->id}})"><i class="ti ti-trash"></i></button>
                         </td>
                     </tr>
                 @empty
                     <tr>
                       <td colspan="6" class="text-center bg-white"><h5 class="text-danger">No client testimonials found!</h5></td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
 </div>



 <!-- add post modal -->
 <div wire:ignore.self class="modal fade" id="addpostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-scrollable modal-lgdd">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Add client testimony</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <form wire:submit.prevent="addTestimony">
                 <div class="modal-bodydd px-4"> 
                     @if (session()->has('testimonyAdded'))
                         <h6 class="text-success">{{session('testimonyAdded')}}</h6>
                     @endif                      
                     <div class="row">
                         <div class="col-md-12">
                             <div class="form-group mb-3">
                                 <label for="title">Client name</label>
                                 <input type="text" wire:model.defer="name" class="form-control" placeholder="Enter client name">
                                 @error('name')
                                     <small class="text-danger">{{$message}}</small>
                                 @enderror
                             </div>

                             <div class="form-group">
                                <label for="profession">Profession</label>
                                <input type="text" wire:model.defer="profession" class="form-control" placeholder="Enter client profession">
                                @error('profession')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
     
                             <div class="form-group mt-3">
                                 <label for="title">Client profile pic</label>
                                 <input type="file" wire:model.defer="image" class="form-control">
                                 @error('image')
                                     <small class="text-danger">{{$message}}</small>
                                 @enderror
                             </div>
     
                             <div class="form-group mt-3">
                                 <label for="testimony">Testimony</label>
                                 <textarea wire:model.defer="testimony" id="testimony" cols="30" rows="6" class="form-control" placeholder="Enter client testimony here..."></textarea>
                                 @error('testimony')
                                     <small class="text-danger">{{$message}}</small>
                                 @enderror
                             </div>
                         </div>
                     </div>
                          
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button class="btn btn-primary" type="submit">
                         <span wire:loading.remove>Save changes</span>
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



 <!-- edit post modal -->
 <div wire:ignore.self class="modal fade" id="edittestimonyModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-scrollable">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Edit client testimony</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>

             <form wire:submit.prevent="update({{$testimony_id}})">
                 <div class="modal-bodyddd px-4"> 
                     <div class="row">
                       <div class="col-md-12">
                           <div class="form-group mb-3">
                               <label for="edit_title" class="mb-1">Client name</label>
                               <input type="text"  id="edit_title" wire:model.defer="edit_name" class="form-control" placeholder="Enter client name">
                               @error('edit_name')
                                   <small class="text-danger">{{$message}}</small>
                               @enderror
                           </div>

                           <div class="form-group">
                              <label for="editprofession" class="mb-1">Profession</label>
                              <input type="text" id="editprofession" wire:model.defer="edit_profession" class="form-control" placeholder="Enter client profession">
                              @error('edit_profession')
                                  <small class="text-danger">{{$message}}</small>
                              @enderror
                          </div>
   
                           <div class="form-group mt-3">
                               <label for="editpic" class="mb-1">Client profile pic</label>
                               <input type="file" id="editpic" wire:model.defer="new_image" class="form-control">
                               @error('image')
                                   <small class="text-danger">{{$message}}</small>
                               @enderror
                               <div class="mt-2">
                                <span>Current: </span><img src="{{asset('storage/clients/'.$edit_image)}}" alt="client pic" width="40" height="40" style="border-radius: 50%">
                               </div>
                           </div>
   
                           <div class="form-group mt-3">
                               <label for="edit_testimony" class="mb-1">Testimony</label>
                               <textarea wire:model.defer="edit_testimony" id="edit_testimony" cols="30" rows="6" class="form-control" placeholder="Enter client testimony here..."></textarea>
                               @error('testimony')
                                   <small class="text-danger">{{$message}}</small>
                               @enderror
                           </div>
                       </div>
                   </div>
                          
                 </div>
                 <div class="modal-footerdd text-centerdd py-3 px-4">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button class="btn btn-primary" type="submit">
                         <span wire:loading.remove>Update</span>
                         <span wire:loading.delay>
                             <span class="spinner-border spinner-border-sm" role="status"
                                 aria-hidden="true"></span>
                             Updating...
                         </span>
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </div>



</div>


<script>
  document.addEventListener('livewire:initialized', () => {
     @this.on('testimonyUpdated', () => {
        $('#edittestimonyModal').modal('hide');
     });
  });
</script>
