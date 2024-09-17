@extends('layouts.app')



@section('content')
   
<main class="main">
   <div class="page-header breadcrumb-wrap">
      <div class="container">
         <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>                    
            <span></span> Terms & Conditions
         </div>
      </div>
   </div>
   <section class="mt-50 mb-50">
      <div class="container">
         <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
               <div class="row">
                  <div class="col-lg-9">
                     <div class="single-page pr-30 mb-lg-0 mb-sm-5">
                        <div class="single-header style-2">
                           <h2>Terms & Conditions</h2>                                
                        </div>                            
                        <div class="single-content">
                           {!! $policy->terms !!}
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 primary-sidebar sticky-sidebar">
                     <div class="widget-area">
                        <!--Widget categories-->
                        <div class="sidebar-widget widget_categories mb-40">
                           <div class="widget-header position-relative mb-20 pb-10">
                                 <h5 class="widget-title">Categories</h5>
                           </div>
                           <div class="post-block-list post-module-1 post-module-5">
                                 <ul>
                                    @foreach ($categories as $category)                             
                                       <li class="cat-item cat-item-2">
                                          <a href="{{url('posts/category/'.$category->slug)}}">{{$category->name}}</a> ({{$category->posts->count()}})
                                       </li>
                                    @endforeach
                                 </ul>
                           </div>
                        </div>
                        <!--Widget latest posts style 1-->
                        <div class="sidebar-widget widget_alitheme_lastpost mb-20">
                           <div class="widget-header position-relative mb-20 pb-10">
                                 <h5 class="widget-title">Trending Now</h5>
                           </div>
                           <div class="row">
                              @foreach ($trending_posts as $post)
                                 @if ($loop->first)
                                    <div class="col-12 sm-grid-content mb-30">
                                       <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-10">
                                          <a href="{{url('post/'.$post->slug)}}">
                                             <img src="{{asset('storage/posts/'.$post->image)}}" alt="{{$post->image}}">
                                          </a>
                                       </div>
                                       <div class="post-content media-body">
                                          <h6 class="post-title mb-10 text-limit-2-row">
                                             <a href="{{url('post/'.$post->slug)}}">
                                                {{strlen($post->title) > 20 ? substr($post->title, 0, 20).'...':$post->title}}
                                             </a>
                                          </h6>
                                          <div class="entry-meta meta-13 font-xxs color-grey">
                                             <span class="post-on mr-10">
                                                {{date('d F Y', strtotime($post->created_at))}}
                                             </span>
                                          </div>
                                       </div>
                                    </div>
                                 @endif
                              @endforeach
                              
                              @foreach ($trending_posts as $post)
                                 @if (!$loop->first)
                                    <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                       <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                          <a href="{{url('post/'.$post->slug)}}">
                                             <img src="{{asset('storage/posts/'.$post->image)}}" alt="{{$post->image}}">
                                          </a>
                                       </div>
                                       <div class="post-content media-body">
                                          <h6 class="post-title mb-10 text-limit-2-row">
                                             <a href="{{url('post/'.$post->slug)}}">
                                                {{strlen($post->title) > 10 ? substr($post->title, 0, 10).'...' : $post->title}}
                                             </a>
                                          </h6>
                                          <div class="entry-meta meta-13 font-xxs color-grey">
                                             <span class="post-on mr-10">{{date('d M y', strtotime($post->created_at))}}</span>
                                          </div>
                                       </div>
                                    </div>
                                 @endif
                              @endforeach
                           </div>
                        </div>
                        <!--Widget ads-->
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none animated">
                           <img src="{{asset('assets/imgs/banner/banner-11.png')}}" alt="banner">
                           <div class="banner-text">
                                 <span>Women Zone</span>
                                 <h4>Save 17% on <br>Office Dress</h4>
                                 <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>


@endsection