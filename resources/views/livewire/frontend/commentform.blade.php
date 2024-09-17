<div>
   {{-- The best athlete wants his opponent at his best. --}}

   <div class="comments-area">
   <div class="row">
      <div class="col-lg-12">
         <h4 class="mb-20">Comments ({{count($post->comments->where('status', 'Approved'))}})</h4>
         <div class="comment-list">

            @forelse ($post->comments->where('status', 'Approved') as $comment)                 
               <div class="single-commentdd justify-content-betweendd d-flexdd mb-20">
                  <div class="userdd align-items-centerdd justify-content-between d-flex">
                     <div class="thumbdd text-center" style="width: 80px">
                        {{-- <img src="{{asset('assets/imgs/page/avatar-6.jpg')}}" alt="avatar" 
                        style="width: 80px; height: 80px; border-radius: 9999px; object-fit: cover;"> --}}
                        <h6>{{$comment->name}}</h6>
                     </div>
                     <div class="descdd" style="width: calc(100% - 90px)">
                        <div class="product-rate d-inline-block">
                           <div class="product-rating" style="width:90%">
                           </div>
                        </div>
                        <p>{{$comment->comment}}</p>
                        <div class="d-flex justify-content-between">
                           <div class="d-flex align-items-center">
                              <span class="font-xs mr-30">
                                 {{date('F d Y', strtotime($comment->created_at))}}
                                 at 
                                 {{date('h:i a', strtotime($comment->created_at))}}
                              </span>
                              {{-- <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a> --}}
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

            @empty
               <h5 class="mb-20 text-danger"> No comments found !!! </h5>
            @endforelse
         </div>
      </div>
   </div>
   </div>

   <div class="comment-form">
      <h4 class="mb-0">Leave a Comment</h4>
      <span style="font-style: italicdd" class="mb-10 d-block">Note: Comments are subject to review before approval by the admin</span>
      @if (session()->has('commentAdded'))
         <span class="text-success">{{session('commentAdded')}}</span>
      @endif
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <form class="form-contactddd comment_form" id="commentForm" wire:submit.prevent="submit({{$post->id}})">
               <div class="row">
                  <div class="col-12">
                     <div class="form-group">
                        <textarea class="form-control w-100" wire:model.defer="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                        @error('comment')
                           <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input class="form-control" wire:model.defer="name" id="name" type="text" placeholder="Name">
                        @error('name')
                           <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input class="form-control" wire:model.defer="email" id="email" type="email" placeholder="Email">
                        @error('email')
                           <span class="text-danger">{{$message}}</span>
                        @enderror
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-group">
                        <input class="form-control" wire:model.defer="website" id="website" type="text" placeholder="Website">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <button type="submit">
                     <span wire:loading.remove>Post Comment</span>
                     <span wire:loading.delay>
                        <span class="spinner-border spinner-border-sm" role="status"
                              aria-hidden="true"></span>
                        Submitting...
                     </span>
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>


</div>
