<div>

   <div>
      <div class="row">
         <div class="col-md-6">
            <h3>Coupons</h3>
         </div>
         <div class="col-md-6">
            <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addCouponModal">
               <i class="ti ti-database-plus"></i> Create coupon
            </button>
         </div>
      </div>
      <div class="table-responsive mt-3">
         @if (session()->has('deleted'))
            <h6 class="text-success">{{session('deleted')}}</h6>
         @endif 
         <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Coupon code</th>
                  <th>Coupon type</th>
                  <th>Coupon value</th>
                  <th>Cart value</th>
                  <th>Expiry date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @php
                  $sn = 1;
               @endphp
               @forelse ($coupons as $coupon)
                  <tr>
                     <td>{{$sn++}}</td>
                     <td>
                        {{$coupon->code}}
                     </td>
                     <td>
                        {{$coupon->type == 'fixed' ? 'Fixed' : 'Percentage'}}
                     </td>
                     <td>
                        {{$coupon->type == 'fixed' ? '$'.$coupon->value : $coupon->value."%"}} 
                     </td>
                     <td>${{$coupon->cart_value}}</td>
                     <td>{{$coupon->expiry_date}}</td>
                     <td>
                        <button class="btn btn-sm btn-success" wire:click="fetch({{$coupon->id}})" data-bs-toggle="modal"
                        data-bs-target="#editCouponModal">
                           <i class="ti ti-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{$coupon->id}})"><i class="ti ti-trash"></i></button>
                     </td>
                  </tr>
               @empty
                  <tr>
                     <td colspan="5" class="text-center">
                        <h5 class="text-danger">No coupons found!</h5>
                     </td>
                  </tr>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
   
   
   
   <!-- add category modal -->
   <div wire:ignore.self class="modal fade" id="addCouponModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-scrollable modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header px-4">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Create Coupon</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
   
            <form wire:submit.prevent="store">
               <div class="modal-bodydd px-4"> 
                  @if (session()->has('saved'))
                     <h6 class="text-success">{{session('saved')}}</h6>
                  @endif
                  @if (session()->has('error'))
                     <h6 class="text-danger">{{session('error')}}</h6>
                  @endif                       
                  <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="code">Coupon Code</label>
                              <input type="text" id="code" wire:model.defer="code" class="form-control" placeholder="Name">
                              @error('code')
                                 <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>
   
                           <div class="form-group mt-3">
                              <label for="type">Coupon Type</label>
                              <select wire:model.defer="type" id="type" class="form-select form-control">
                                 <option value="">Select type</option>
                                 <option value="fixed">Fixed</option>
                                 <option value="percent">Percent</option>
                              </select>
                              @error('type')
                                 <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>
   
                           <div class="form-group mt-3">
                           <label for="value">Value</label>
                           <input type="text" id="value" wire:model.defer="value" class="form-control" placeholder="Name">
                           @error('value')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>
   
                           <div class="form-group mt-3">
                              <label for="cart_value">Cart Value</label>
                              <input type="text" id="cart_value" wire:model.defer="cart_value" class="form-control" placeholder="Name">
                              @error('cart_value')
                                 <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>

                           <div class="form-group mt-3" wire:ignore>
                              <label for="expiry_date">Expiry Date</label>
                              <input type="text" id="expiry_date" wire:model.defer="expiry_date" class="form-control" placeholder="Expiry date">
                              @error('expiry_date')
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
                           <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
   
   
   
   <!-- edit category modal -->
   <div wire:ignore.self class="modal fade" id="editCouponModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-scrollable modal-dialog-centered">
         <div class="modal-content">
            <div class="modal-header px-4">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Coupon</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
   
            <form wire:submit.prevent="update({{$coupon_id}})">
               <div class="modal-bodydd px-4"> 
                  @if (session()->has('updated'))
                        <h6 class="text-success">{{session('updated')}}</h6>
                  @endif
                  @if (session()->has('error'))
                        <h6 class="text-danger">{{session('error')}}</h6>
                  @endif                       
                  <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="edit_code">Coupon Code</label>
                              <input type="text" id="edit_code" wire:model.defer="edit_code" class="form-control" placeholder="Name">
                              @error('edit_code')
                                 <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>
   
                           <div class="form-group mt-3">
                              <label for="edit_type">Coupon Type</label>
                              <select wire:model.defer="edit_type" id="edit_type" class="form-select form-control">
                                 <option value="fixed">Fixed</option>
                                 <option value="percent">Percent</option>
                              </select>
                              @error('edit_type')
                                 <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>
   
                           <div class="form-group mt-3">
                           <label for="edit_value">Coupon Value</label>
                           <input type="text" id="edit_value" wire:model.defer="edit_value" class="form-control" placeholder="Name">
                           @error('edit_value')
                              <small class="text-danger">{{$message}}</small>
                           @enderror
                        </div>
   
                           <div class="form-group mt-3">
                              <label for="edit_cart_value">Cart Value</label>
                              <input type="text" id="edit_cart_value" wire:model.defer="edit_cart_value" class="form-control" placeholder="Name">
                              @error('edit_cart_value')
                                 <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>

                           <div class="form-group mt-3">
                              <label for="edit_expiry_date">Expiry Date</label>
                              <input type="text" id="edit_expiry_date" wire:model.defer="edit_expiry_date" class="form-control" placeholder="Name">
                              @error('edit_expiry_date')
                                 <small class="text-danger">{{$message}}</small>
                              @enderror
                           </div>
                        </div>
                  </div>
                        
               </div>
               <div class="modal-footer justify-content-start px-4">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-primary" type="submit">
                        <span wire:loading.remove>Update</span>
                        <span wire:loading.delay>
                           <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>
                  </button>
               </div>
            </form>
   
         </div>
      </div>
   </div>

</div>


@push('scripts')
   <script>
      $(function(){
         var data = $('#expiry_date').val();
         $('#expiry_date').datetimepicker({
            timepicker:false,
            format: 'Y-m-d',
            onChangeDateTime:function(dp){
               var data = $('#expiry_date').val();
               @this.set('expiry_date', data);
            }
         });

         var data = $('#edit_expiry_date').val();
         $('#edit_expiry_date').datetimepicker({
            timepicker:false,
            format: 'Y-m-d',
            onChangeDateTime:function(dp){
               var data = $('#edit_expiry_date').val();
               @this.set('edit_expiry_date', data);
            }
         });
      });
   </script>
@endpush