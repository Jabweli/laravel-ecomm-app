<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Page not found - 404</title>

   <!-- CSS Files -->
   <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.4.2/css/all.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css">
   
   <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.min.css" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
   <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">


   <style>
      @font-face {
         font-family: Poppins;
         src: url(frontend/font/Poppins-Medium.ttf);
      }
      * {
         font-family: Poppins;
      }
      .page_404 {
         padding: 40px 0;
         background: #fff;
      }

      .page_404 img {
         width: 100%;
      }

      .four_zero_four_bg {

         background-image: url(assets/imgs/dribbble_1.gif);
         background-repeat: no-repeat;
         height: 400px;
         background-position: center;
      }


      .four_zero_four_bg h1 {
         font-size: 80px;
      }

      .four_zero_four_bg h3 {
         font-size: 80px;
      }

      /* .link_404 {
         color: #fff !important;
         padding: 10px 20px;
         background: #39ac31;
         margin: 20px 0;
         display: inline-block;
      } */

      .contant_box_404 {
         margin-top: -50px;
      }
   </style>
</head>

<body>


   <section class="page_404">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <div class="col-sm-10dd col-sm-offset-2dd  text-center">
                  <div class="four_zero_four_bg">
                        <h1 class="text-center ">404</h1>
                  </div>

                  <div class="contant_box_404">
                        <h3 class="h2">
                           Uh oh! Looks like you got lost
                        </h3>

                        <p class="mb-3">The page you are looking for is not available!</p>

                        <a href="{{url('/')}}" class="link_404 btn alert-success text-white">Go to Home page</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>


</body>

</html>
