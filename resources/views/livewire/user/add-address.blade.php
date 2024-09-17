<div>
   <div class="card account-card">
      <div class="card-header d-flex align-items-center gap-3">
         <div class="detail back-arrow">
            <a href="/my-account/address-book">
               <i class="fas fa-arrow-left"></i>
            </a>
         </div>
         <h5 class="mb-0">
            Add New Address
         </h5>
      </div>
      <div class="card-body p-lg-4 p-md-4">
         <form wire:submit.prevent="save">
            <div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="fname">First name *</label>
                     <input type="text" id="fname" placeholder="First Name" wire:model.defer="fname">
                     @error('fname') <span class="text-danger">First name is required</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="lname">Last name *</label>
                     <input type="text" id="lname" placeholder="Last Name" wire:model.defer="lname">
                     @error('lname') <span class="text-danger">Last name is required</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="mobile">Mobile number *</label>
                     <input type="text" name="phone" id="mobile" placeholder="Mobile number e.g +1 (23) 900 800" wire:model.defer="phone">
                     @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="email">Email Address *</label>
                     <input type="email" id="email" placeholder="Email address" wire:model.defer="email">
                     @error('email') <span class="text-danger">{{$message}}</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="company">Company name</label>
                     <input type="text" id="company" placeholder="Company name" wire:model.defer="company">
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="country">Country *</label>
                     <input type="text" id="country" placeholder="Country" wire:model.defer="country">
                     @error('country') <span class="text-danger">Country is required</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="line1">Address line 1 *</label>
                     <input type="text" id="line1" placeholder="Address line 1" wire:model.defer="line1">
                     @error('line1') <span class="text-danger">Atleast one address line is required</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="line2">Address line 2</label>
                     <input type="text" id="line2" placeholder="Address line 2" wire:model.defer="line2">
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="city">City/Town *</label>
                     <input type="text" id="city" placeholder="City/Town" wire:model.defer="city">
                     @error('city') <span class="text-danger">City is required</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="state">State/County *</label>
                     <input type="text" id="state" placeholder="State/County" wire:model.defer="state">
                     @error('state') <span class="text-danger">State/County is required</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="zip">Postcode/Zip *</label>
                     <input type="text" id="zip" placeholder="Postcode/Zip" wire:model.defer="zip">
                     @error('zip') <span class="text-danger">Zipcode is required</span> @enderror
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label for="make_as">Make as</label>
                     <select name="" id="make_as" class="form-control form-select" wire:model.defer="make_as">
                        <option value="">Click to select</option>
                        <option value="billing">Billing address</option>
                        <option value="shipping">Shipping address</option>
                     </select>
                  </div>
               </div>

               <div class="col-md-6">
                  <button type="submit" class="btn">
                     <span wire:loading.remove>ADD ADDRESS</span>
                     <span wire:loading.delay>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        SAVING...
                     </span>
                  </button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
