<!DOCTYPE html>
<html lang="en">

<head>
   <!--
    Basic Page Needs
    ==================================================
    -->
   <meta charset="utf-8">
   <title>@yield('title')</title>
   <!--
    Mobile Specific Metas
    ==================================================
    -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
   <!--
    CSS
    ==================================================
    -->
   <!-- Bootstrap-->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/bootstrap.min.css">
   <!-- Animation-->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/animate.css">
   <!-- Morris CSS -->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/morris.css">
   <!-- FontAwesome-->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/font-awesome.min.css">
   <!-- Icon font-->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/icon-font.css">
   <!-- Owl Carousel-->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/owl.carousel.min.css">
   <!-- Owl Theme -->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/owl.theme.default.min.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,400i,500,700,700i,900" rel="stylesheet">
   <!-- Template styles-->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/style.css">
   <!-- Responsive styles-->
   <link rel="stylesheet" href="{{ asset('/') }}frontend/css/responsive.css">
</head>

<body>

   <div class="body-inner">

      <div class="site-top-2">
         <header class="header nav-down" id="header-2">
            <div class="container">
               <div class="row">
                  <div class="logo-area clearfix">
                     <div class="logo col-lg-3 col-md-12">
                        <a href="{{ URL::to('/') }}">
                           <h2>Tokio <span>Mode Ltd</span></h2>
                        </a>
                     </div>
                     <!-- logo end-->
                     <div class="col-lg-9 col-md-12 pull-right">
                        <ul class="top-info unstyled">
                           <li><span class="info-icon"><i class="icon icon-phone3"></i></span>
                              <div class="info-wrapper">
                                 <p class="info-title">24/7 Response Time</p>
                                 <p class="info-subtitle">{{$basic->phone}}</p>
                              </div>
                           </li>
                           <li><span class="info-icon"><i class="icon icon-envelope"></i></span>
                              <div class="info-wrapper">
                                 <p class="info-title">Send Your Query</p>
                                 <p class="info-subtitle">{{ $basic->email }}</p>
                              </div>
                           </li>

                        </ul>
                     </div>
                     <!-- Col End-->
                  </div>
                  <!-- Logo Area End-->
               </div>
            </div>
            <!-- Container end-->
            @include('frontend._partial.nav')
            <!-- Site nav inner end-->
         </header>
         <!-- Header end-->
      </div>

@yield('body')

      <!-- Footer start-->
      <footer class="footer" id="footer">
         <div class="footer-main bg-overlay">
            <div class="container">
               <div class="row">

                  <div class="col-lg-4 col-md-6 footer-widget">
                     <h3 class="widget-title">Company Locations</h3>
                     <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-map-marker2"></i></span>
                        <div class="ts-contact-content">
                           <h3 class="ts-contact-title">Address</h3>
                           <p>{{ $basic->address }}</p>
                        </div>
                        <!-- Contact content end-->
                     </div>

                     <div class="ts-contact-info last"><span class="ts-contact-icon float-left"><i class="icon icon-envelope"></i></span>
                        <div class="ts-contact-content">
                           <h3 class="ts-contact-title">Email Address</h3>
                           <p>{{ $basic->email }}</p>
                        </div>
                        <!-- Contact content end-->
                     </div>
                     <div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="icon icon-phone3"></i></span>
                        <div class="ts-contact-content">
                           <h3 class="ts-contact-title">Phone Number</h3>
                           <p>{{ $basic->phone }}</p>
                        </div>
                        <!-- Contact content end-->
                     </div>
                     {{--<div class="ts-contact-info"><span class="ts-contact-icon float-left"><i class="fa fa-skype" aria-hidden="true"></i></span>--}}
                        {{--<div class="ts-contact-content">--}}
                           {{--<h3 class="ts-contact-title">Skype</h3>--}}
                           {{--<p>{{ $basic->skype_id }}</p>--}}
                        {{--</div>--}}
                        {{--<!-- Contact content end-->--}}
                     {{--</div>--}}
                  </div>
                   <!-- About us end-->
                   <div class="col-lg-4 col-md-6 footer-widget">
                       <h3 class="widget-title">Quick Links</h3>
                       <ul class="list-dash">
                           <li><a href="#">About Us</a></li>
                           <li><a href="#">Founder CEO</a></li>
                           <li><a href="#">Policy</a></li>
                           <li><a href="#">Licence/Reg</a></li>
                           <li><a href="#">Inspections</a></li>
                           <li><a href="#">Buyers</a></li>
                           <li><a href="#">Contact Us</a></li>
                           <li><a href="#">Bank Details</a></li>
                       </ul>
                   </div>

                  <div class="col-lg-4 col-md-6 footer-widget">
                     <h3 class="widget-title">Facebook Page</h3>
                     <div class="fb-page" data-href="{{$basic->facebook_page}}" data-tabs="timeline" data-width="350" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="{{$basic->facebook_page}}" class="fb-xfbml-parse-ignore"><a href="{{$basic->facebook_page}}">{{$basic->title}}</a></blockquote></div>
                  </div>
               </div>
               <!-- Content row end-->
            </div>
            <!-- Container end-->
         </div>
         <!-- Footer Main-->
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-md-12">
                     <div class="copyright-info"><span>Copyright © {{ $basic->title }}  <?php $year = date('Y'); echo $year; ?> | All Rights Reserved.</span></div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <div class="footer-social text-right">
                        <ul>
                            @foreach ($socials as $social)
                                <li><a href="{{url($social->profile_link)}}"><i class="{{$social->icon}}"></i></a></li>
                            @endforeach


                        </ul>
                     </div>
                  </div>
               </div>
               <!-- Row end-->
            </div>
            <!-- Container end-->
         </div>
         <!-- Copyright end-->
      </footer>
      <!-- Footer end-->


      <!--
      Javascript Files
      ==================================================
      -->
      <!-- initialize jQuery Library-->
      <script type="text/javascript" src="{{ asset('/') }}frontend/js/jquery.js"></script>
      <!-- Bootstrap jQuery-->
      <script type="text/javascript" src="{{ asset('/') }}frontend/js/bootstrap.min.js"></script>

      <!-- Smoothscroll-->
      <script type="text/javascript" src="{{ asset('/') }}frontend/js/smoothscroll.js"></script>
      <!-- Template custom-->
      <script type="text/javascript" src="{{ asset('/') }}frontend/js/custom.js"></script>
       <!-- Owl Carousel-->
       <script type="text/javascript" src="{{ asset('/') }}frontend/js/owl.carousel.min.js"></script>
   </div>
   <!--Body Inner end-->

   {{--OWL Carousel--}}

   <script>
       $(document).ready(function() {

           $("#owl-demo").owlCarousel({

               navigation : true, // Show next and prev buttons
               slideSpeed : 600,
               paginationSpeed : 400,
               singleItem:true,
               loop:true,
               autoplay:true,
               autoplayTimeout:3000,
               autoplayHoverPause:true,

               // "singleItem:true" is a shortcut for:
               items : 1,
               // itemsDesktop : false,
               // itemsDesktopSmall : false,
               // itemsTablet: false,
               // itemsMobile : false

           });

       });
   </script>


   <div id="fb-root"></div>
        <script>(function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.1';
              fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>




</body>

</html>
