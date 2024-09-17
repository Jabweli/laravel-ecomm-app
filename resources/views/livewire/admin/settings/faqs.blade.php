<div>
   {{-- Be like water. --}}



   <div>
     <div class="row">
         <div class="col-md-6">
             <h4>FAQs</h4>
         </div>
         <div class="col-md-6">
             <button class="btn btn-primary float-end" data-bs-toggle="modal"
                data-bs-target="#faqModal">
                    <i class="ti ti-plus"></i> Add Faq
             </button>
         </div>
     </div>
     <div class="table-responsive">
         @if (session()->has('faqdeleted'))
             <h6 class="text-success">{{session('faqdeleted')}}</h6>
         @endif 
         @if (session()->has('faqedited'))
             <h6 class="text-success">{{session('faqedited')}}</h6>
         @endif 
         @if (session()->has('failed'))
             <h6 class="text-danger">{{session('failed')}}</h6>
         @endif 

         <table class="table table-smdd">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Question</th>
                     <th>Answer</th>
                     <th>Action</th>
                 </tr>
             </thead>
             <tbody>
                 @php
                     $sn = 1;
                 @endphp
                 @forelse ($faqs as $faq)
                     <tr>
                         <td>{{$sn++}}</td>
                         <td>
                          {{strlen($faq->question) > 30 ? substr($faq->question, 0, 50)."..." : $faq->question}}
                         </td>
                         <td>
                          {{strlen($faq->answer) > 30 ? substr($faq->answer, 0, 50)."..." : $faq->answer}}
                         </td>
                         <td>
                             <button class="btn btn-sm btn-success" wire:click="fetch({{$faq->id}})" data-bs-toggle="modal"
                                data-bs-target="#editfaqModal">
                                   <i class="ti ti-pencil"></i>
                             </button>
                             <button class="btn btn-sm btn-danger" wire:click="delete({{$faq->id}})"><i class="ti ti-trash"></i></button>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="4" class="text-center">
                            <h5 class="text-danger">No faqs found!</h5>
                         </td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
 </div>




 <!-- add faq modal -->
 <div wire:ignore.self class="modal fade" id="faqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header px-4">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Add Faq</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form wire:submit.prevent="submit">
              <div class="modal-bodyddd px-4"> 
                  @if (session()->has('faqAdded'))
                      <h6 class="text-success">{{session('faqAdded')}}</h6>
                  @endif                        
                    <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                              <label for="title">
                               <b>Question</b>
                              </label>
                              <input type="text" wire:model.defer="qtn" class="form-control" placeholder="Enter question" required>
                              @error('qtn')
                                  <small class="text-danger">{{$message}}</small>
                              @enderror
                          </div>

                          
                          <div class="form-group mt-3">
                              <label for="title">
                               <b>Answer</b>
                              </label>
                              <textarea wire:model.defer="ans" id="" cols="30" rows="5" class="form-control" placeholder="faq answer" required></textarea>
                              @error('ans')
                                  <small class="text-danger">{{$message}}</small>
                              @enderror
                          </div>
                       </div>
                    </div>
                       
              </div>
              <div class="modal-footer justify-content-start px-4">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit" id="editSubmitBtn">
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




<!-- edit post modal -->
<div wire:ignore.self class="modal fade" id="editfaqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-dialog-centered">
        <div class="modal-content">
           <div class="modal-header px-4">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Faq</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>

           <form wire:submit.prevent="update({{$faq_id}})">
              <div class="modal-bodyddd px-4"> 
                 @if (session()->has('faqEdited'))
                    <h6 class="text-success">{{session('faqEdited')}}</h6>
                 @endif                        
                    <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                             <label for="title">
                             <b>Question</b>
                             </label>
                             <input type="text" wire:model.defer="edit_qtn" class="form-control" placeholder="Enter question" required>
                             @error('edit_qtn')
                                <small class="text-danger">{{$message}}</small>
                             @enderror
                          </div>

                          
                          <div class="form-group mt-3">
                             <label for="title">
                             <b>Answer</b>
                             </label>
                             <textarea wire:model.defer="edit_ans" id="" cols="30" rows="5" class="form-control" placeholder="faq answer" required></textarea>
                             @error('edit_ans')
                                <small class="text-danger">{{$message}}</small>
                             @enderror
                          </div>
                       </div>
                    </div>
                       
              </div>
              <div class="modal-footer justify-content-start px-4">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 <button class="btn btn-primary" type="submit" id="editSubmitBtn">
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
  




</div>

