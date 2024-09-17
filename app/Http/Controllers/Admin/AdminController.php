<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
   public function index(){
      return view('admin.dashboard');
   }

   public function posts(){
      return view('admin.post.posts');
   }

   public function addpost(){
      return view('admin.post.addpost');
   }

   public function comments(){
      return view('admin.post.comments');
   }

   // open post data for editing
   public function editpost($id){
      $post = Post::where('id', $id)->first();
      $categories = PostCategory::all();
      return view('admin.post.editpost', compact('post', 'categories'));
   }

   // update post data
   public function updatepost(Request $request, $id){
      Validator::make($request->all(), [
         'title' => 'required|max:255',
         'category' => 'required',
         'short_desc' => 'required',
         'image' => 'nullable',
         'long_desc' => 'required'
     ]);
    
      $post = Post::where('id', $id)->first();
      if($post){

         if(isset($request->image)){
            
            $destination = 'storage/posts/'.$post->image;
            if(File::exists($destination)){
               File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time().'png';

            $file->move('storage/posts/', $filename);

            $post->update([
               'title' => $request->title,
               'category' => $request->category,
               'slug' => Str::slug($request->title),
               'image' => $filename,
               'short_desc' => $request->short_desc,
               'long_desc' => $request->long_desc
           ]);
         }else{
            $post->update([
               'title' => $request->title,
               'category' => $request->category,
               'slug' => Str::slug($request->title),
               'short_desc' => $request->short_desc,
               'long_desc' => $request->long_desc
            ]);
         }
         
         return redirect('admin/posts')->with('edited', "Post updated successfully!");
      }else {
         return redirect('admin/posts')->with('failed', "Something went wrong, plz try again!");
      }
      
   }

   public function category(){
      return view('admin.post.category');
   }

   public function settings(){
      return view('admin.settings.settings');
   }

   public function messages(){
      return view('admin.settings.messages');
   }

   public function testimonials(){
      return view('admin.settings.testimonials');
   }

   public function newsletters(){
      return view('admin.settings.newsletters');
   }

   public function faqs(){
      return view('admin.settings.faqs');
   }

   public function privacy(){
      return view('admin.settings.privacy');
   }

   public function terms(){
      return view('admin.settings.terms');
   }


   // product categories
   public function productCat(){
      return view('admin.products.category');
   }
   // products
   public function products(){
      return view('admin.products.index');
   }

   public function productAdd(){
      return view('admin.products.addproduct');
   }

   // coupons
   public function coupons(){
      return view('admin.products.coupons');
   }

   public function sliders(){
      return view('admin.settings.homeslider');
   }

   public function orders(){
      return view('admin.products.orders');
   }

   public function orderView()
   {
      return view('admin.products.order-view');
   }

}
