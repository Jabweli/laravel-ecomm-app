<!-- Sidebar Start -->
<aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
         <a href="./index.html" class="text-nowrap logo-img mt-3">
            <img src="{{asset('assets/imgs/logo/logo.png')}}" width="150" alt="logo" />
         </a>
         <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
         </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
         <ul id="sidebarnav">
            <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/dashboard') ? 'active':''}}" href="{{url('admin/dashboard')}}" aria-expanded="false">
                  <span>
                     <i class="ti ti-layout-dashboard"></i>
               </span>
               <span class="hide-menu">Dashboard</span>
               </a>
            </li>
            <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">MANAGE PRODUCTS</span>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/products') ? 'active':''}} 
                  {{request()->is('admin/product/add') ? 'active':''}} {{request()->is('admin/product/edit/*') ? 'active':''}}" href="{{url('admin/products')}}" aria-expanded="false">
                  <span>
                  <i class="ti ti-armchair-2"></i>
                  </span>
                  <span class="hide-menu">All Products</span>
               </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/product/categories') ? 'active':''}} " href="{{url('admin/product/categories')}}" aria-expanded="false">
                  <span>
                     <i class="ti ti-box-multiple-2"></i>
                  </span>
                  <span class="hide-menu">Categories</span>
               </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/orders') ? 'active':''}} {{request()->is('admin/order/view/*') ? 'active':''}}" 
                  href="{{url('admin/orders')}}" aria-expanded="false">
                  <span>
                     <i class="ti ti-shopping-cart"></i>
                  </span>
                  <span class="hide-menu">Orders</span>
               </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/reviews') ? 'active':''}} " href="{{url('admin/reviews')}}" aria-expanded="false">
                  <span>
                     <i class="ti ti-eye"></i>
                  </span>
                  <span class="hide-menu">Reviews</span>
               </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/coupons') ? 'active':''}} " href="{{url('admin/coupons')}}" aria-expanded="false">
                  <span>
                     <i class="ti ti-ticket"></i>
                  </span>
                  <span class="hide-menu">Coupons</span>
               </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/sliders') ? 'active':''}} " href="{{url('admin/sliders')}}" aria-expanded="false">
                  <span>
                     <i class="ti ti-book"></i>
                  </span>
                  <span class="hide-menu">Home sliders</span>
               </a>
            </li>
            <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">MANAGE BLOG POSTS</span>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link {{request()->is('admin/posts') ? 'active':''}} 
                     {{request()->is('admin/category') ? 'active':''}} {{request()->is('admin/create/post') ? 'active':''}} 
                     {{request()->is('admin/edit/post/*') ? 'active':''}} " 
                     href="{{url('admin/posts')}}" aria-expanded="false">
                     <span>
                        <i class="ti ti-article"></i>
                     </span>
                     <span class="hide-menu">Blog posts</span>
                  </a>
            </li>

            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/post/categories') ? 'active':''}}" 
                     href="{{url('admin/post/categories')}}" aria-expanded="false">
                     <span>
                        <i class="ti ti-box-multiple-1"></i>
                     </span>
                     <span class="hide-menu">Categories</span>
               </a>
            </li>

            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/post/comments') ? 'active':''}}" 
                     href="{{url('admin/post/comments')}}" aria-expanded="false">
                     <span>
                        <i class="ti ti-bookmark"></i>
                     </span>
                     <span class="hide-menu">Comments</span>
               </a>
            </li>
            
            <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">MANAGE MESSAGES</span>
            </li>

            <li class="sidebar-item">
                  <a class="sidebar-link {{request()->is('admin/testimonials') ? 'active':''}}" href="{{url('admin/testimonials')}}" aria-expanded="false">
                     <span>
                        <i class="ti ti-cards"></i>
                     </span>
                     <span class="hide-menu">Testimonials</span>
                  </a>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link {{request()->is('admin/messages') ? 'active':''}}" href="{{url('admin/messages')}}" aria-expanded="false">
                     <span>
                        <i class="ti ti-message"></i>
                     </span>
                     <span class="hide-menu">Messages</span>
                  </a>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/newsletters') ? 'active':''}}" href="{{url('admin/newsletters')}}" aria-expanded="false">
                  <span>
                        <i class="ti ti-mail"></i>
                  </span>
                  <span class="hide-menu">Newsletters</span>
               </a>
            </li>

            <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">WEBSITE SETTINGS</span>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/settings') ? 'active':''}}" href="{{url('admin/settings')}}" aria-expanded="false">
                  <span>
                        <i class="ti ti-settings"></i>
                  </span>
                  <span class="hide-menu">Settings</span>
               </a>
            </li>

            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/faqs') ? 'active':''}}" href="{{url('admin/faqs')}}" aria-expanded="false">
                  <span>
                        <i class="ti ti-help"></i>
                  </span>
                  <span class="hide-menu">FAQs</span>
               </a>
            </li>

            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/privacy-policy') ? 'active':''}}" href="{{url('admin/privacy-policy')}}" aria-expanded="false">
                  <span>
                        <i class="ti ti-alert-octagon"></i>
                  </span>
                  <span class="hide-menu">Privacy Policy</span>
               </a>
            </li>

            <li class="sidebar-item">
               <a class="sidebar-link {{request()->is('admin/terms-&-conditions') ? 'active':''}}" href="{{url('admin/terms-&-conditions')}}" aria-expanded="false">
                  <span>
                        <i class="ti ti-assembly"></i>
                  </span>
                  <span class="hide-menu">Terms & Conditions</span>
               </a>
            </li>
            
            <li class="nav-small-cap">
                  <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                  <span class="hide-menu">AUTH</span>
            </li>
            <li class="sidebar-item">
                  <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     <span>
                        <i class="ti ti-login"></i>
                     </span>
                     <span class="hide-menu">Logout</span>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                  </form>
            </li>
         </ul>

      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->
