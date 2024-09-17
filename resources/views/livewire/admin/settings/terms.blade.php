<div>
   {{-- Because she competes with no one, no one can compete with her. --}}

   <div class="row">
     <div class="col-md-12">
        <h4>Edit terms & conditions</h4>

        <form wire:submit.prevent="submit">
           <div class="form-group" wire:ignore>
              <textarea wire:model.defer="terms" data-terms="@this" id="terms-editor" cols="30" rows="10" class="form-control">{{$policy->terms ?? 'No terms & conditions available'}}</textarea>
           </div>

           <button type="submit" id="termsSubmitBtn" class="btn btn-primary mt-3">
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

