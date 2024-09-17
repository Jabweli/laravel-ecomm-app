<div>
   {{-- Care about people's approval and you will be their prisoner. --}}
   <main class="main">
      <div class="page-header breadcrumb-wrap">
         <div class="container">
            <div class="breadcrumb">
               <a href="/" rel="nofollow">Home</a>                    
               <span></span> Contact us
            </div>
         </div>
      </div>  
      <div class="container mt-50">
         <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
               <section class="row align-items-end mb-50">
                  <div class="col-lg-4 mb-lg-0 mb-md-5 mb-sm-5">
                     <h4 class="mb-20 text-brand">How can help you ?</h4>
                     <h1 class="mb-30">Let us know how we can help you</h1>
                     <p class="mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus
                        nec ullamcorper mattis, pulvinar dapibus leo.</p>
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                        ullamcorper mattis, pulvinar dapibus leo.</p>
                  </div>
                  <div class="col-lg-8">
                     <div class="row">
                        <div class="col-lg-6 mb-4">
                           <h5 class="mb-20">01. Visit Feedback</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                              ullamcorper mattis, pulvinar dapibus leo.</p>
                        </div>
                        <div class="col-lg-6 mb-4">
                           <h5 class="mb-20">02. Employer Services</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                              ullamcorper mattis, pulvinar dapibus leo.</p>
                        </div>
                        <div class="col-lg-6 mb-lg-0 mb-4">
                           <h5 class="mb-20 text-brand">03. Billing Inquiries</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                              ullamcorper mattis, pulvinar dapibus leo.</p>
                        </div>
                        <div class="col-lg-6">
                           <h5 class="mb-20">04.General Inquiries</h5>
                           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec
                              ullamcorper mattis, pulvinar dapibus leo.</p>
                        </div>
                     </div>
                  </div>
               </section>
            </div>
         </div>
      </div>              
      <section class="pt-20 pb-80">
         <div class="container">
            <div class="row">
               <div class="col-xl-8 col-lg-10 m-auto">
                  <div class="contact-from-area padding-20-row-col wow FadeInUp">

                     <h2 class="mb-10">Contact For Any Queries</h2>
                     <p class="text-muted mb-30 font-sm">Get in touch with us for any business inquiries, we are here to help.</p>

                     <form class="contact-form-style" id="contact-form" wire:submit.prevent="submit">
                        @if (session()->has('sent'))
                           <span class="text-success">{{session('sent')}}</span>
                        @endif
                        <div class="row">
                           <div class="col-lg-6 col-md-6">
                              <div class="input-style mb-20">
                                 <input name="name" placeholder="Full Name*" type="text" wire:model.defer="name">
                                 @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="input-style mb-20">
                                 <input name="email" placeholder="Your Email*" type="email" wire:model.defer="email">
                                 @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="input-style mb-20">
                                 <input name="telephone" placeholder="Your Phone* e.g +1 000 000 000" type="tel" wire:model.defer="phone">
                                 @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <div class="input-style mb-20">
                                 <input name="subject" placeholder="Subject*" type="text" wire:model.defer="subject">
                                 @error('subject')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="textarea-style mb-10">
                                 <textarea name="message" placeholder="Message*" wire:model.defer="message"></textarea>
                                 @error('message')
                                    <span class="text-danger">{{$message}}</span>
                                 @enderror
                              </div>
                              <button class="submit submit-auto-width" type="submit">
                                 <span wire:loading.remove>Send Message</span>
                                 <span wire:loading.delay>
                                    <span class="spinner-border spinner-border-sm" role="status"
                                       aria-hidden="true"></span>
                                    Submitting...
                                 </span>
                              </button>
                           </div>
                        </div>
                     </form>
                     <p class="form-messege"></p>
                  </div>
               </div>

               {{-- <div class="col-xl-5 col-lg-2">
                  <h4>Get in touch</h4>
                  <p>Justo sed diam ut sed amet duo amet lorem amet stet sea ipsum, sed duo amet et. Est elitr dolor elitr erat sit sit. Dolor diam et erat clita ipsum justo sed.</p>
               </div> --}}
            </div>
         </div>
      </section>
   </main>

   
</div>
