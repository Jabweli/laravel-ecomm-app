<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
   public function index(){
      return view('frontend.home');
   }

   public function about(){
      return view('frontend.about');
   }

   public function contact(){
      return view('frontend.contact');
   }

   public function shop(){
      return view('frontend.shop');
   }

   public function cart(){
      return view('frontend.cart');
   }

   public function checkout(){
      return view('frontend.checkout');
   }

   public function singleProduct(){
      return view('frontend.product');
   }


   public function blog(){
      return view('frontend.blog');
   }

   public function blogDetail(){
      return view('frontend.blog-detail');
   }

   public function privacy(){
      $trending_posts = Post::inRandomOrder()->take(5)->get();
      $policy = Policy::where('id', 1)->first();
      $categories = PostCategory::where('status', 1)->get();
      return view('frontend.privacy-policy', compact('trending_posts', 'policy', 'categories'));
   }

   public function terms(){
      $trending_posts = Post::inRandomOrder()->take(5)->get();
      $policy = Policy::where('id', 1)->first();
      $categories = PostCategory::where('status', 1)->get();
      return view('frontend.terms-conditions', compact('trending_posts', 'policy', 'categories'));
   }

   public function wishlist(){
      return view('frontend.wishlist');
   }

   public function hotDeals(){
      return view('frontend.hot-deals');
   }

   // upload image into ckeditor
   public function upload(Request $request){
      if($request->hasFile('upload')){
         $orignName = $request->file('upload')->getClientOriginalName();
         $fileName = pathinfo($orignName, PATHINFO_FILENAME);
         $extension = $request->file('upload')->getClientOriginalExtension();
         $fileName = $fileName . '_' . time() . '.' . $extension;
         
         $request->file('upload')->move(public_path('media'), $fileName);

         $url = asset('media/' .  $fileName);
         return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url'=> $url ]);
      }
   }

   // search component
   public function search(){
      return view('frontend.search');
   }

   public function thankyou(){
      return view('frontend.thankyou');
   }

   public function cancelled(){
      return view('frontend.cancel');
   }

   public function failed(){
      return view('frontend.failed');
   }
}
