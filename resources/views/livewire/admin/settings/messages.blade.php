<div>
   {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

  <div>
     <div class="row">
         <div class="col-md-6">
             <h4>Messages</h4>
         </div>
     </div>
     <div class="table-responsive">
         @if (session()->has('msgdeleted'))
             <h6 class="text-success">{{session('msgdeleted')}}</h6>
         @endif 
         @if (session()->has('failed'))
             <h6 class="text-danger">{{session('failed')}}</h6>
         @endif 
         <table class="table table-stripeddd">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>User name</th>
                     <th>Phone</th>
                     <th>Email</th>
                     <th>Subject</th>
                     {{-- <th>Message</th> --}}
                     <th>Date sent</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 @php
                    $sn = 1; 
                 @endphp
                 @forelse ($messages as $message)
                     <tr>
                         <td>{{$sn++}}</td>
                         <td>{{$message->name}}</td>
                         <td>{{$message->phone}}</td>
                         <td>{{$message->email}}</td>
                         <td>{{$message->subject}}</td>
                         {{-- <td>{{substr($message->body, 0, 50)}}...</td> --}}
                         <td>{{$message->created_at}}</td>
                         <td>
                             <button class="btn btn-sm btn-success" wire:click="fetch({{$message->id}})" data-bs-toggle="modal"
                             data-bs-target="#MessageModal">
                                 <i class="ti ti-eye"></i>
                             </button>
                             <button class="btn btn-sm btn-danger" wire:click="delete({{$message->id}})"><i class="ti ti-trash"></i></button>
                         </td>
                     </tr>
                 @empty
                     <tr>
                       <td colspan="6" class="text-center">
                          <h5 class="text-danger">No messages found!</h5>
                       </td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
  </div>



 <!-- add post modal -->
 <div wire:ignore.self class="modal fade" id="MessageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-lgdd">
      <div class="modal-content">
          <div class="modal-header px-4">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Message</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form>
              <div class="modal-bodydd px-4"> 
                  @if (session()->has('testimonyAdded'))
                      <h6 class="text-success">{{session('testimonyAdded')}}</h6>
                  @endif                      
                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group mb-3">
                              <h5>User name</h5>
                              <p>{{$name}}</p>
                          </div>

                           <div class="form-group mt-3">
                              <h5>Email</h5>
                              <p>{{$email}}</p>
                           </div>

                           <div class="form-group mt-3">
                              <h5>Phone</h5>
                              <p>{{$phone}}</p>
                           </div>

                          <div class="form-group">
                             <h5>Subject</h5>
                             <p>{{$subject}}</p>
                         </div>
  
  
                          <div class="form-group mt-3">
                             <h5>Body</h5>
                             <p>{{$body}}</p>
                          </div>
                      </div>
                  </div>
                       
              </div>
              <div class="modal-footer justify-content-start">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
          </form>
      </div>
  </div>
</div>




</div>

