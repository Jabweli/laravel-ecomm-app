<div>
   {{-- Stop trying to control. --}}

   <main class="main">
      <div class="page-header breadcrumb-wrap">
         <div class="container">
         <div class="breadcrumb">
            <a href="/" rel="nofollow">Home</a>
            <span></span> Blog
         </div>
         </div>
      </div>
      <section class="mt-50 mb-50">
         <div class="container custom">
            <div class="row">
               <div class="col-lg-11 m-auto">
                  <div class="row">
                     <!--left colum -->
                     <div class="col-lg-9">
                        <div class="totall-product mb-20">
                           <h2>
                              Our Articles
                           </h2>
                        </div>

                        <div class="loop-grid pr-30">
                           <div class="row">
                              <!--first large post -->
                              @foreach ($posts as $post)
                                 @if ($loop->first)
                                       
                                    <div class="col-12">
                                       <article class="first-post mb-30 wow fadeIn animated hover-up">
                                          <div class="img-hover-slide position-relative overflow-hidden">
                                             <span class="top-right-icon bg-dark"><i class="fi-rs-bookmark"></i></span>
                                             <div class="post-thumb border-radius img-hover-scale">
                                                <a href="{{url('post/'.$post->slug)}}">
                                                   <img src="{{asset('storage/posts/'.$post->image)}}" alt="{{$post->image}}">
                                                </a>
                                             </div>
                                          </div>
                                          <div class="entry-content">
                                             <div class="entry-meta meta-1 mb-30">
                                                   <a class="entry-meta meta-0" href="blog.html">
                                                      <span class="post-in background4 text-brand font-xs">
                                                         {{$post->category->name}}
                                                      </span>
                                                   </a>
                                                   <div class="font-sm">
                                                      <span><span class="mr-10 text-muted"><i class="fi-rs-eye"></i></span>23k</span>
                                                      <span class="ml-30"><span class="mr-10 text-muted"><i class="fi-rs-comment-alt"></i></span>17k</span>
                                                      <span class="ml-30"><span class="mr-10 text-muted"><i class="fi-rs-share"></i></span>18k</span>
                                                   </div>
                                             </div>
                                             <h4 class="post-title mb-20">
                                                   <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a>
                                             </h4>
                                             <p class="post-exerpt font-medium text-muted mb-30">
                                                {{$post->short_desc}}
                                             </p>
                                             <div class="mb-20 entry-meta meta-2">
                                                   <div class="font-xs ">
                                                      <span class="post-on">Created {{date('d F Y h:m A', strtotime($post->created_at))}} </span>
                                                      <span class="time-reading"> - 8 mins read</span>
                                                      <p class="font-xs mt-5">Updated {{date('d F Y h:m A', strtotime($post->updated_at))}}</p>
                                                   </div>
                                                   <a href="{{url('post/'.$post->slug)}}" class="btn btn-sm">Read more<i class="fi-rs-arrow-right ml-10"></i></a>
                                             </div>
                                          </div>
                                       </article>
                                    </div>

                                 @endif
                              @endforeach
                              
                              <!--small posts -->
                              @foreach ($posts as $post)
                                 @if (!$loop->first)
                                       
                                    <div class="col-lg-6">
                                       <article class="wow fadeIn animated hover-up mb-30">
                                          <div class="post-thumb img-hover-scale">
                                             <a href="{{url('post/'.$post->slug)}}">
                                                <img src="{{asset('storage/posts/'.$post->image)}}" alt="{{$post->image}}">
                                             </a>
                                             <div class="entry-meta">
                                                <a class="entry-meta meta-2" href="#">
                                                   {{$post->category->name}}
                                                </a>
                                             </div>
                                          </div>
                                          <div class="entry-content-2">
                                             <h4 class="post-title mb-15">
                                                <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a>
                                             </h4>
                                             <p class="post-exerpt mb-30">
                                                {{strlen($post->short_desc) > 100 ? substr($post->short_desc, 0,100).'...':$post->short_desc}}
                                             </p>
                                             <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                                   <div>
                                                      <span class="post-on"> 
                                                         <i class="fi-rs-clock"></i> 
                                                         {{date('d F Y', strtotime($post->created_at))}}
                                                      </span>
                                                      <span class="hit-count has-dot">126k Views</span>
                                                   </div>
                                                   <a href="{{url('post/'.$post->slug)}}" class="text-brand">Read more <i class="fi-rs-arrow-right"></i></a>
                                             </div>
                                          </div>
                                       </article>
                                    </div>

                                 @endif
                              @endforeach                       
                           </div>
                        </div>
                        <!--post-grid-->
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                        {{ $posts->links('pagination-links') }}
                        </div>
                     </div>

                     <!--right colum -->
                     <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-area">
                           <div class="sidebar-widgetdd widget_search mb-30">
                              <div class="search-form">
                                 <form action="{{route('blog')}}">
                                    <input type="text" placeholder="Search…" name="search">
                                    <button type="submit"> <i class="fi-rs-search"></i> </button>
                                 </form>
                              </div>
                           </div>
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
                                                <a href="{{url('post/'.$post->slug)}}">{{$post->title}}</a>
                                             </h6>
                                             <div class="entry-meta meta-13 font-xxs color-grey">
                                                <span class="post-on mr-10">
                                                   {{date('d F Y', strtotime($post->created_at))}}
                                                </span>
                                                <span class="hit-count has-dot ">126k Views</span>
                                             </div>
                                          </div>
                                       </div>
                                    @endif
                                 @endforeach
                                    

                                 @foreach ($trending_posts as $post)
                                    @if (!$loop->first)
                                       <div class="col-md-6 col-sm-6 sm-grid-content mb-10">
                                          <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-5">
                                             <a href="{{url('post/'.$post->slug)}}">
                                                <img src="{{asset('storage/posts/'.$post->image)}}" alt="{{$post->image}}">
                                             </a>
                                          </div>
                                          <div class="post-content media-body">
                                             <h6 class="post-title mb-10 text-limit-2-row">
                                                <a href="{{url('post/'.$post->slug)}}">
                                                   {{strlen($post->title) > 25 ? substr($post->title, 0, 25).'...' : $post->title}}
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
                                 <a href="/shop" class="button btn-sm">Shop Now <i class="fi-rs-arrow-right"></i></a>
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


</div>
