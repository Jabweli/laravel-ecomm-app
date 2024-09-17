<div>
   {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
   <div class="row">
     <div class="col-md-12">
         <h4>Edit privacy policy</h4>

         <form wire:submit.prevent="submit">

           <div class="form-group" wire:ignore>
              <textarea wire:model.defer="policy" data-policy="@this" id="privacy-editor" cols="30" rows="10" class="form-control">{{$privacy->policy ?? 'No policy available'}}</textarea>
           </div>


           <button type="submit" id="privacySubmitBtn" class="btn btn-primary mt-3">
              <span wire:loading.remove>Save Changes</span>
              <span wire:loading.delay>
                  <span class="spinner-border spinner-border-sm" role="status"
                      aria-hidden="true"></span>
                  Saving...
              </span>
           </button>
           
           <div>
              @if (session()->has('saved'))
               <small class="text-success">{{session('saved')}}</small>
              @endif
           </div>
        </form>
     </div>
  </div>


</div>

