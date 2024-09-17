<div>
   {{-- Success is as dangerous as failure. --}}
   @php
      $categories = DB::table('product_categories')->where('status', 1)->get();
   @endphp
   <form action="{{route('product.search')}}">
      <select class="select-active">
         <option>All Categories</option>
         @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
         @endforeach
      </select>
      <input type="text" name="q" placeholder="Search for items..." />
   </form>
</div>
