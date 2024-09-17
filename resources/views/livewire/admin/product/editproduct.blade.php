<div>
   {{-- The Master doesn't talk, he acts. --}}

<div class="container-fluid px-4 pb-5" style="padding-top: 90px;">

   <div class="row">
      <div class="col-md-6">
         <h4>Edit product</h4>
      </div>
      <div class="col-md-6">
         <a href="{{url('admin/products')}}" class="btn btn-info float-end me-2"><i class="ti ti-arrow-left"></i> Go back</a>
      </div>
   </div>


   <form wire:submit.prevent="update({{$product->id}})" class="mt-3">
      <div class="modal-bodydd">
         @if (session()->has('updated'))
            <h6 class="text-success">{{ session('updated') }}</h6>
         @endif
         <div class="row">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="pdt-name">
                     <strong>Product name*</strong>
                  </label>
                  <input type="text" id="pdt-name" wire:model.defer="name" class="form-control" placeholder="Product name">
                  @error('name')
                     <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>

               <div class="form-group mt-3">
                  <label for="pdt-category">
                     <strong>Category*</strong>
                  </label>
                  <select wire:model.defer="cat_id" id="pdt-category" class="form-control form-select">
                     <option>Select category</option>
                     @foreach ($categories as $cat)
                        <option value="{{$cat->id}}" {{$cat->id == $cat_id ? 'selected':''}}>{{$cat->name}}</option>
                     @endforeach                    
                  </select>
                  @error('cat_id')
                     <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>

               <div class="form-group mt-3">
                  <label for="pdt-short-desc">
                     <strong>Short product description*</strong>
                  </label>
                  <textarea wire:model.defer="short_desc" id="pdt-short-desc" cols="30" rows="5" class="form-control"
                        placeholder="Short description"></textarea>
                  @error('short_desc')
                     <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-6">
               <div class="">
                  @if ($current_image)
                     <label for="pdt-image">
                        <b>Main product image</b>
                     </label>
                     <div class="main-img-wrapper">
                        <img src="{{asset('storage/products/'.$current_image)}}" alt="{{$current_image}}" style="width: 280px; height: 280px; object-fit: cover; border-radius: 5px">

                        <button class="btn btn-sm btn-danger" wire:click="remove({{$product->id}})">
                           <span wire:loading.remove><i class="ti ti-trash"></i></span>
                           <span wire:loading.delay>
                              <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                           </span>
                        </button>
                     </div>
                     
                  @else
                     <div>
                        <div class="form-group mb-2">
                           <label for="pdt-image">
                              <b>Upload new image*</b>
                           </label>
                           <input type="file" id="pdt-image" wire:model.defer="image" class="form-control">
                           @error('image')
                              <small class="text-danger">{{ $message }}</small>
                           @enderror
                        </div>

                        @if ($image)
                           <img src="{{ $image->temporaryURL() }}" alt="placeholder" style="width: 230px; height: 230px; object-fit: cover; border-radius: 5px">
                        @else
                           <img src="{{asset('admins/images/backgrounds/placeholder.png')}}" alt="placeholder" style="width: 230px; height: 226px; object-fit: cover; border-radius: 5px">
                        @endif
                     </div>
                  @endif
               
               </div>
            </div>
            
         </div>

         <div class="row mt-3">
            <div class="col-md-6">
               <div class="form-group">
                  <label for="regular_price">
                     <strong>Regular price*</strong>
                  </label>
                  <input type="text" id="regular_price" min="1" wire:model.defer="regular_price" class="form-control" placeholder="0.00">
                  @error('regular_price')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-6">
               <div class="form-group">
                  <label for="sale_price">
                     <strong>Sale price*</strong>
                  </label>
                  <input type="text" id="sale_price" min="1" wire:model.defer="sale_price" class="form-control" placeholder="0.00">
                  @error('sale_price')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-6 mt-3">
               <div class="form-group">
                  <label for="pdt-badge">
                     <strong>Product badge</strong>
                  </label>
                  <select wire:model.defer="badge" id="pdt-badge" class="form-select form-control">
                     <option value="New">New</option>
                     <option value="Hot">Hot</option>
                     <option value="Sale">Sale</option>
                     <option value="Best sale">Best sale</option>
                     <option value="Discount">Discount</option>
                  </select>
                  @error('badge')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-6 mt-3">
               <div class="form-group">
                  <label for="pdt-featured">
                     <strong>Set as</strong>
                  </label>
                  <select wire:model.defer="set_as" id="pdt-featured" class="form-select form-control">
                     <option value="featured">Featured</option>
                     <option value="offer">Offer</option>
                     <option value="hot-deal">Hot deals</option>
                  </select>
                  @error('featured')
                     <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-6 mt-3">
               <div class="form-group">
                  <label for="pdt-stock">
                     <strong>Stock status*</strong>
                  </label>
                  <select wire:model.defer="stock" id="pdt-stock" class="form-select form-control">
                     <option value="Instock">Instock</option>
                     <option value="Out of stock">Out of stock</option>
                  </select>
                  @error('stock')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-6 mt-3">
               <div class="form-group">
                  <label for="qtty">
                     <strong>Quantity*</strong>
                  </label>
                  <input type="number" id="qtty" min="0" wire:model.defer="qtty" class="form-control" placeholder="0">
                  @error('qtty')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-12 mt-3">
               <div class="form-group">
                  <label for="sku">
                     <strong>SKU</strong>
                  </label>
                  <input type="text" id="sku" wire:model.defer="sku" class="form-control" placeholder="Enter SKU">
                  @error('sku')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            
         </div>

         <div class="row mt-3">
            <label for="gallery">
               <strong>Product gallery images</strong>
            </label>
            @if (session()->has('deleted'))
               <h6 class="text-success">{{ session('deleted') }}</h6>
            @endif
            @if (session()->has('error'))
               <h6 class="text-danger">{{ session('error') }}</h6>
            @endif
            <div class="d-flex gap-2 pt-1">
               @forelse ($product->productImages as $item)
                  <div class="pdt-img-wrapper">
                     <img src="{{asset('storage/pdtgallery/'.$item->image)}}" alt="{{$item->image}}" style="width: 150px; height: 180px; object-fit: cover;">

                     <button class="btn btn-sm btn-danger" wire:click="delete({{$item->id}})"><i class="ti ti-trash"></i></button>
                  </div>
               @empty
                  <h6>No gallery images</h6>
               @endforelse
               
            </div>
         </div>

         <div class="row">
            <div class="col-md-12 mt-3">
               <div class="form-group">
                  <label for="gallery">
                     <strong>Add new images to gallery</strong>
                  </label>
                  <input type="file" id="gallery" wire:model.defer="gallery" class="form-control" multiple>
                  @error('gallery')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12 mt-4">
               <div class="form-group" wire:ignore>
                  <label for="long_desc">
                     <strong>Detailed product description</strong>
                  </label>
                  <textarea wire:model.defer="long_desc" data-note="@this" id="long_desc" cols="30" rows="16" class="form-control" placeholder="Write detailed description here">
                     {{$edit_long_desc}}
                  </textarea>
                  @error('long_desc')
                     <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>

            <div class="col-md-12 mt-4">
               <div class="form-group" wire:ignore>
                  <label for="long_desc">
                     <strong>Additional Information</strong>
                  </label>
                  <textarea wire:model.defer="additional_info" data-additional="@this" id="additional_info" cols="30" rows="16" class="form-control" placeholder="Additional info">
                     {{$additional_info}}
                  </textarea>
                  @error('additional_info')
                        <small class="text-danger">{{ $message }}</small>
                  @enderror
               </div>
            </div>
         </div>
      </div>
      <div class="modal-footer mt-4 justify-content-start">
         <button class="btn btn-primary" type="submit" id="submitBtn">
            <span wire:loading.remove>Update product</span>
            <span wire:loading.delay>
               <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
               Updating...
            </span>
         </button>
      </div>
      @if (session()->has('updated'))
         <h6 class="text-success mt-1">{{ session('updated') }}</h6>
      @endif
   </form>



</div>



</div>


