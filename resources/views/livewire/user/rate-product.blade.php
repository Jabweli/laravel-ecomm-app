<div>
   <div class="card account-card">
      <div class="card-header d-flex align-items-center gap-3">
         <div class="detail back-arrow">
            <a href="/my-account/reviews">
               <i class="fas fa-arrow-left"></i>
            </a>
         </div>
         <h5 class="mb-0">
            Rate & Review
         </h5>
      </div>
      <div class="card-body px-md-5 p-lg-4">
         <div class="d-flex gap-3">
            <img src="{{asset('storage/products/'.$product->image)}}" alt="{{$product->image}}" 
            style="width: 70px; height: 70px; object-fit: cover">
            <h6>{{$product->name}}</h6>
         </div>

         <div class="comment-form">
            <h4 class="mb-5">Rate this product</h4>
            @if (session()->has('reviewed'))
               <span class="text-success">{{session('reviewed')}}</span>
            @endif
            <div class="row">
               <div class="col-lg-10 col-md-12">
                  <form class="form-contact comment_form" id="commentForm" wire:submit.prevent="rate">
                     <div class="row">
                        <div class="comment-form-rating">
                           <span>Your rating</span>
                           <p class="stars">																
                              <label for="rated-1"></label>
                              <input type="radio" id="rated-1" name="rating" value="1" wire:model.defer="rating">
                              <label for="rated-2"></label>
                              <input type="radio" id="rated-2" name="rating" value="2" wire:model.defer="rating">
                              <label for="rated-3"></label>
                              <input type="radio" id="rated-3" name="rating" value="3" wire:model.defer="rating">
                              <label for="rated-4"></label>
                              <input type="radio" id="rated-4" name="rating" value="4" wire:model.defer="rating">
                              <label for="rated-5"></label>
                              <input type="radio" id="rated-5" name="rating" value="5" wire:model.defer="rating">
                           </p>
                           <input type="hidden" value="{{$product->id}}" wire:model="product_id">
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label for="title">Review title</label>
                              <input type="text" id="title" placeholder="e.g I like it or I don't like it" wire:model.defer="title">
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label for="comment">Detailed review</label>
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" wire:model.defer="comment" 
                              placeholder="Tell us more about this product"></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn">
                           <span wire:loading.remove>Submit review</span>
                           <span wire:loading.delay>
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                              Submitting...
                           </span>
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
