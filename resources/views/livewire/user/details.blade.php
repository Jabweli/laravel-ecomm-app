<div>
   <div class="card account-card" id="order-card">
      <div class="card-header d-flex align-items-center gap-3">
         <div class="back-arrow">
            <a href="/my-account">
               <i class="fas fa-arrow-left"></i>
            </a>
         </div>
         <h5 class="mb-0">Account Management</h5>
      </div>
      <div class="card-body px-lg-4 px-md-5">
         <p>Manage your account information</p>
         <div class="tab-style3">
            <ul class="nav nav-tabs text-uppercase" wire:ignore>
               <li class="nav-item">
                  <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Account Info</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Password</a>
               </li>
            </ul>
            <div class="tab-content shop_info_tabdd entry-main-content">
               <!--account details-->
               <div class="tab-pane fade show active" id="Description" wire:ignore.self>
                  <form class="mt-3" wire:submit.prevent="save">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="fname">First Name *</label>
                              <input type="text" id="fname" placeholder="First name" 
                              wire:model.defer="fname">
                              @error('fname') <span class="text-danger">{{$message}}</span> @enderror
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="lname">Last Name *</label>
                              <input type="text" id="lname" placeholder="Last name" 
                              wire:model.defer="lname">
                           </div>
                        </div>

                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="d-name">Display name *</label>
                              <input type="text" id="d-name" placeholder="Your display name" 
                              wire:model.defer="d-name">
                              @error('d-name') <span class="text-danger">Enter a display name</span> @enderror
                           </div>
                        </div>


                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="email">Email address *</label>
                              <input type="email" id="email" placeholder="Your email address" 
                              wire:model.defer="email">
                              @error('email') <span class="text-danger">{{$message}}</span> @enderror
                           </div>
                        </div>

                        
                        <div class="col-md-6">
                           <div class="form-group">
                              <button type="submit" class="btn mt-3">
                                 <span wire:loading.remove>Save Changes</span>
                                 <span wire:loading.delay>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Saving...
                                 </span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>



               <!--password-->
               <div class="tab-pane fade" id="Additional-info" wire:ignore.self>
                  <h5>Change your password</h5>
                  @if (Session::has('password_success'))
                     <span class="text-success">{{Session::get('password_success')}}</span>
                  @endif
                  @if (Session::has('password_error'))
                     <span class="text-danger">{{Session::get('password_error')}}</span>
                  @endif
                  <form class="mt-3" wire:submit.prevent="changePassword">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="c-password">Current password *</label>
                              <input type="password" name="current_password" id="c-password" placeholder="Enter your current password" 
                              wire:model.defer="current_password">
                              @error('current_password') <span class="text-danger">Your current password is required</span> @enderror
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="n-password">New password *</label>
                              <input type="password" name="password" id="n-password" placeholder="Enter new password" 
                              wire:model.defer="password">
                              @error('password') <span class="text-danger">{{$message}}</span> @enderror
                           </div>
                        </div>

                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="cc=password">Confirm password *</label>
                              <input type="password" name="password_confirmation" id="cc=password" placeholder="Confirm new password" 
                              wire:model.defer="password_confirmation">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <button type="submit" class="btn mt-3">
                                 <span wire:loading.remove>Change password</span>
                                 <span wire:loading.delay>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Updating...
                                 </span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
