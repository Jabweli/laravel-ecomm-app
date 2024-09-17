@extends('layouts.admin')



@section('content')
    

{{-- <div class="container-fluid">
    <livewire:admin.editpost />
</div> --}}


<div class="container-fluid pb-3" style="padding-top: 80px">

   <div class="row px-4">
       <div class="col-md-6">
           <h4>Edit post</h4>
       </div>
       <div class="col-md-6">
           <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addcatModal">
               <i class="ti ti-database-plus"></i> Add new category
           </button>
           <a href="{{ url('admin/posts') }}" class="btn btn-info float-end me-2"><i class="ti ti-arrow-left"></i> Go
               back</a>
       </div>
   </div>


   <form action="{{url('admin/update/'.$post->id)}}" method="post" enctype="multipart/form-data">
      @csrf
       <div class="modal-bodyddd px-4">
           @if (session()->has('updated'))
               <h6 class="text-success">{{ session('updated') }}</h6>
           @endif
           <div class="row">
               <div class="col-md-6">
                   <div class="form-group">
                       <label for="title">
                         <b>Title</b>
                       </label>
                       <input type="text" name="title" class="form-control" placeholder="Post title" value="{{$post->title}}">
                       @error('title')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>

                   <div class="form-group mt-3">
                       <label for="title">
                         <b>Category</b>
                       </label>
                       <select name="category" id="category" class="form-control form-select">
                           @foreach ($categories as $item)
                            <option value="{{$item->name}}" {{$post->category === $item->name ? 'selected':''}}>
                               {{$item->name}}
                            </option>
                           @endforeach
                       </select>
                       @error('category')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>



                   <div class="form-group mt-3">
                       <label for="short_desc">
                         <b>Short description</b>
                       </label>
                       <textarea name="short_desc" id="short_desc" cols="30" rows="5" class="form-control"
                           placeholder="Short description">{{$post->short_desc}}</textarea>
                       @error('short_desc')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>
               </div>


               <div class="col-md-6">
                   <div class="form-group">
                       <label for="title">
                         <b>Feature image</b>
                       </label>
                       <input type="file" name="image" class="form-control"
                           placeholder="Post title">
                       @error('image')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>

                   <div class="mt-3">
                       <img src="{{ asset('storage/posts/' . $post->image) }}" alt="placeholder"
                           style="width: 100%; height: 220px; object-fit: cover; border-radius: 5px">
                   </div>
               </div>
           </div>


           <div class="row">
               <div class="col-md-12 mt-4">
                   <div class="form-group" wire:ignore>
                       <label for="long_desc">
                         <b>Full Description</b>
                       </label>
                       <textarea name="long_desc" id="edit_long_desc" cols="30" rows="16"
                           class="form-control" placeholder="Long description">{{ $post->long_desc }}</textarea>
                       @error('long_desc')
                           <small class="text-danger">{{ $message }}</small>
                       @enderror
                   </div>
               </div>
           </div>

       </div>
       <div class="modal-footer justify-content-start mt-3 px-4">
           <button class="btn btn-primary" type="submit" id="editSubmitBtn">
               <span wire:loading.remove>Update</span>
               <span wire:loading.delay>
                   <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                   Saving...
               </span>
           </button>
       </div>
   </form>



</div>


@endsection