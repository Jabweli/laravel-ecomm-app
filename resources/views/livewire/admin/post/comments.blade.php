<div>
   {{-- Because she competes with no one, no one can compete with her. --}}

   <div>
      <div class="row">
         <div class="col-md-6">
               <h4>Blog Comments</h4>
         </div>
         <div class="col-md-6">
            <a href="{{url('admin/posts')}}" class="btn btn-info float-end me-2"><i class="ti ti-arrow-left"></i> Go back</a>
         </div>
      </div>
      <div class="table-responsive">
         @if (session()->has('deleted'))
            <h6 class="text-success">{{session('deleted')}}</h6>
         @endif 

         @if (session()->has('failed'))
            <h6 class="text-danger">{{session('failed')}}</h6>
         @endif 

         @if (session()->has('approved'))
            <h6 class="text-success">{{session('approved')}}</h6>
         @endif 

         @if (session()->has('disapproved'))
            <h6 class="text-success">{{session('disapproved')}}</h6>
         @endif 

         <table class="table table-smdd">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Post</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Comment</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>

            <tbody>
            @php
               $sn = 1;
            @endphp
            @forelse ($comments as $comment)
               <tr>
                  <td>{{$sn++}}</td>
                  <td>
                     <a target="_blank" href="{{url('post/'.$comment->post->slug)}}">
                        {{strlen($comment->post->title) > 15 ? substr($comment->post->title, 0, 15).'...' : $comment->post->title}}
                     </a>
                  </td>
                  <td>{{$comment->name}}</td>
                  <td>{{$comment->email}}</td>
                  <td>
                     {{strlen($comment->comment) > 20 ? substr($comment->comment, 0, 20)."..." : $comment->comment}}
                  </td> 
                  <td>{{$comment->status}}</td>
                  <td>
                     
                     @if ($comment->status == 'Disapproved' || $comment->status == 'Pending')
                        <button wire:click="approve({{$comment->id}})" class="btn btn-success btn-sm text-white">
                        <i class="ti ti-pencil"></i>
                        </button>
                     @else
                        <button wire:click="disapprove({{$comment->id}})" class="btn btn-warning btn-sm text-white">
                        <i class="ti ti-pencil"></i>
                        </button>
                     @endif

                     <button class="btn btn-info btn-sm text-white" wire:click="view({{$comment->id}})"
                     data-bs-toggle="modal" data-bs-target="#viewComment">
                        <i class="ti ti-eye"></i>
                     </button>
                     
                     <button class="btn btn-danger btn-sm text-white" wire:click="delete({{$comment->id}})">
                        <i class="ti ti-trash"></i>
                     </button>
                  </td>
               </tr>
            @empty
               <tr>
               <td colspan="7" class="text-center">
                  <h5 class="text-center text-danger">No comments Found!</h5>
               </td>
               </tr>
            @endforelse
         </tbody>

         </table>
      </div>
   </div>


   <!-- edit category modal -->
<div wire:ignore.self class="modal fade" id="viewComment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-scrollable modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header px-4">
            <h3 class="modal-title" id="exampleModalLabel">Comment</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>

         <div class="px-4">
            @if (session()->has('deleted'))
               <h6 class="text-success">{{session('deleted')}}</h6>
            @endif 

            @if (session()->has('failed'))
               <h6 class="text-danger">{{session('failed')}}</h6>
            @endif 

            @if (session()->has('approved'))
               <h6 class="text-success">{{session('approved')}}</h6>
            @endif 

            @if (session()->has('disapproved'))
               <h6 class="text-success">{{session('disapproved')}}</h6>
            @endif 
         </div>

         <div class="px-4 pb-4">
            <h5>Post:</h5>
            <p>{{$postComment->post->title ?? 'N/A'}}</p>
            <h5>Name:</h5>
            <p>{{$postComment->name ?? 'N/A'}}</p>
            <h5>Email:</h5>
            <p>{{$postComment->email ?? 'N/A'}}</p>
            <h5>Comment:</h5>
            <p>{{$postComment->comment ?? 'N/A'}}</p>

            <div>
               @if ($postComment)
                  @if ($postComment->status == 'Disapproved' || $postComment->status == 'Pending')
                     <button wire:click="approve({{$postComment->id}})" class="btn btn-success text-white">
                        <i class="ti ti-pencil"></i> Approve
                     </button>
                  @else
                     <button wire:click="disapprove({{$postComment->id}})" class="btn btn-warning text-white">
                     <i class="ti ti-pencil"></i> Disapprove
                     </button>
                  @endif
               @endif
            </div>
         </div>
         
      </div>
   </div>
</div>

</div>

