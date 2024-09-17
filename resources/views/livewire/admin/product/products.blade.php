<div>
   {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

   <div>
      <div class="row border-0 border-bottomdd pb-1 mb-2">
         <div class="col-md-8">
            <h4>Products</h4>
         </div>
         <div class="col-md-4">
            <a href="{{url('admin/product/add')}}" class="btn btn-primary float-end">
               <i class="ti ti-database-plus"></i> Add new product
            </a>
         </div>
      </div>

      <div class="row align-center">
         <div class="col-md-6 pt-2">
            <span>Count: <span class="badge rounded-pill bg-warning">30</span></span>
            <span class="ms-4">In Stock: <span class="badge rounded-pill bg-info">30</span></span>
         </div>
         <div class="col-md-6">
            <form action="{{ route('admin.products') }}">
               <input type="search" class="form-control" placeholder="Search" name="search">
            </form>
         </div>    
      </div>
      <div class="table-responsive">
         @if (session()->has('deleted'))
            <h6 class="text-success">{{session('deleted')}}</h6>
         @endif 
         @if (session()->has('edited'))
            <h6 class="text-success">{{session('edited')}}</h6>
         @endif 
         @if (session()->has('failed'))
            <h6 class="text-danger">{{session('failed')}}</h6>
         @endif 
         @if (session()->has('posts'))
            <h6 class="text-success">{{ session('posts') }}</h6>
         @endif
         <table class="table table-smdd">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Product name</th>
                  <th>Category</th>
                  <th>Set As</th>
                  <th class="text-centerdd">Stock</th>
                  <th class="text-centerdd">Sale price</th>
                  <th class="text-centerdd">Price</th>
                  <th class="text-center">Qtty</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               @php
                  $sn=1;
               @endphp
                  @forelse ($products as $product)
                     <tr>
                        <td>{{$product->id}}</td>
                        <td>
                           <img src="{{asset('storage/products/'.$product->image)}}" alt="product image"
                           style="width: 40px; height: 40px; object-fit:cover; border-radius: 5px">
                        </td>
                        <td>
                           <a href="{{url('product/'.$product->slug)}}" target="_blank">
                              {{strlen($product->name) > 10 ? substr($product->name, 0, 20).'...' : $product->name}}
                           </a>
                        </td>
                        <td>{{$product->category->name}}</td>
                        <td>
                           {{$product->set_as ?? 'N/A'}}
                        </td>
                        <td class="text-centerdd">
                           {{$product->in_stock}}
                        </td>
                        <td class="text-centerdd">${{$product->sale_price}}</td>
                        <td class="text-centerdd">${{$product->regular_price}}</td>
                        <td class="text-center">{{$product->qtty}}</td>
                        
                        <td>
                           <a href="{{url('admin/product/edit/'.$product->id)}}" class="btn btn-sm btn-success">
                           <i class="ti ti-pencil"></i>
                           </a>
                           <button class="btn btn-sm btn-danger" wire:click="delete({{$product->id}})"><i class="ti ti-trash"></i></button>
                        </td>
                     </tr>
                  @empty
                     <tr>
                        <td colspan="8" class="text-center">
                           <h6 class="text-danger">No products found!</h6>
                        </td>
                     </tr>
                  @endforelse
            </tbody>
         </table>

         <div>
         {{ $products->links() }}
         </div>
      </div>
   </div>


</div>


