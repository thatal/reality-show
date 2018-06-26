<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="Karaoke Superstar">
    <meta name="keyword" content="Karaoke, Superstar, Star, Rang, Ramdhenu, Assam, Telent, Guwahati, TV, Reality Show, India, North East, North East India">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Karaoke Superstar</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/ico/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('img/ico/apple-touch-icon-precomposed.png')}}">
    <link rel="stylesheet" href="{{asset('web-assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web-assets/css/normalize.css')}}">
    {{-- <link rel="stylesheet" href="../use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('web-assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('web-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('web-assets/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('web-assets/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('web-assets/css/lity.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
   <style type="text/css">
       .lity{
            z-index: 99999;
       }
   </style>
</head>

<body id="index-page">
    <div class="leonardo-preloader"></div>
    <header  id="header">
        <nav  class="navbar-default le-navbar">
            <div class="container">
                <div class="navbar-header">
                    <button id="menu-nav-btn" type="button" class="mobile-menu-btn navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span></span> </button>
                    <a class="logo" href="#header"> <img src="{{asset('web-assets/img/logo/logo.pn')}}g" alt=""> </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                </div>
            </div>
        </nav>
        <div style="background-image:url({{asset('web-assets/img/bbk.jpg')}})" class="hero-area">
            <div class="container">
                <div class="row">
                    <div class="hero-title col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h1 class="wow slideInLeft" data-wow-duration="1s">Karaoke Superstar</h1>
                        <p class="wow slideInLeft" data-wow-duration="1.5s">To participate in the Free Online Polls, select your favorite poll from the list of polls given below and you are ready to Vote!!! Best of luck!! ...</p>
                        <div class="btn-style wow slideInLeft" data-wow-duration="2s"> <a href="#votes">Vote Now</a> </div>
                    </div>
                    <div class="hero-img col-xs-12 col-sm-12 col-md-6 col-lg-6"> <img class="img-responsive wow slideInRight" data-wow-duration="1s" src="{{asset('web-assets/img/hero-illustration1.svg')}}" alt="illustration"> <img class="img-responsive wow slideInRight" data-wow-duration="1.5s" src="{{asset('web-assets/img/hero-illustration2.svg')}}" alt="illustration"> <img class="img-responsive wow slideInRight" data-wow-duration="2s" src="{{asset('web-assets/img/3.png')}}" alt="illustration"> </div>
                </div>
            </div>
        </div>
    </header>
   
    
    <div id="about">
       
        <div class="partners">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeIn" data-wow-delay="0.1s"> <img class="partner-logo aligncenter img-responsive" src="{{asset('web-assets/img/partners/logo1.png')}}" alt="illustration"> </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeIn" data-wow-delay="0.1s"> <img class="partner-logo aligncenter img-responsive" src="{{asset('web-assets/img/partners/logo2.png')}}" alt="illustration"> </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeIn" data-wow-delay="0.1s"> <img class="partner-logo aligncenter img-responsive" src="{{asset('web-assets/img/partners/logo6.png')}}" alt="illustration"> </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeIn" data-wow-delay="0.1s"> <img class="partner-logo aligncenter img-responsive" src="{{asset('web-assets/img/partners/logo3.png')}}" alt="illustration"> </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeIn" data-wow-delay="0.1s"> <img class="partner-logo aligncenter img-responsive" src="{{asset('web-assets/img/partners/logo4.png')}}" alt="illustration"> </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 wow fadeIn" data-wow-delay="0.1s"> <img class="partner-logo aligncenter img-responsive" src="{{asset('web-assets/img/partners/logo5.png')}}" alt="illustration"> </div>
                    
                </div>
            </div>
        </div>
    </div>
  
    <div style="padding-top:120px; background-image:url({{asset('web-assets/img/bk.png')}})" class="contact" id="votes">
        <div class="container">

            <div class="row">
                <?php $today = date('d M Y');?>
            @foreach($artistDetails->artist_on_round_active as $key => $round_artist)
                @if(sizeof($round_artist->artist_active))
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.1s">
                    <div style="background-color:#F4E772" class="blog-box">
                        <div class="blog-img"> <img src="{{-- {{asset('web-assets/img/singer.png')}} --}}{{asset($artist_image_dir.$round_artist->artist_image)}}" alt="image"> </div>
                        <div class="blog-info"> <span>{{$today}}</span>
                            <h4 style="color:#F60"><strong>Code-{{$round_artist->artist_active->code}}</strong></h4>
                            <p><strong class="cont-name">{{$round_artist->artist_active->name}}</strong></p>
                            <p><a href="//www.youtube.com/watch?v={{$round_artist->youtube_id}}" data-lity><i style="font-size:24px" class="fas fa-video"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size:24px" class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i style="font-size:24px" class="fab fa-whatsapp-square"></i></a></p>
                            <div class="blog-btn"> <a href="#" onClick="return VoteNow(this)" sun-data-id="{{$round_artist->artist_active->code}}">Vote Now</a> </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
                {{-- <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.1s">
                    <div style="background-color:#A9FA83" class="blog-box">
                       <div class="blog-img"> <img src="{{asset('web-assets/img/singer1.png')}}" alt="image"> </div>
                        <div class="blog-info"> <span>07 Jan 2018</span>
                            <h4 style="color:#F60"><strong>Code-001</strong></h4>
                            <p><strong class="cont-name">Zubeen Garg</strong></p>
                            <p><a href=""><i style="font-size:24px" class="fas fa-video"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size:24px" class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i style="font-size:24px" class="fab fa-whatsapp-square"></i></a></p>
                            <div class="blog-btn"> <a href="#" onClick="return VoteNow(this)" sun-data-id="12345607">Vote Now</a> </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.1s">
                    <div style="background-color:#FBB6B4" class="blog-box">
                        <div class="blog-img"> <img src="{{asset('web-assets/img/singer2.png')}}" alt="image"> </div>
                        <div class="blog-info"> <span>07 Jan 2018</span>
                            <h4 style="color:#F60"><strong>Code-001</strong></h4>
                            <p><strong class="cont-name">Zubeen Garg</strong></p>
                            <p><a href=""><i style="font-size:24px" class="fas fa-video"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size:24px" class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i style="font-size:24px" class="fab fa-whatsapp-square"></i></a></p>
                            <div class="blog-btn"> <a href="#" onClick="return VoteNow(this)" sun-data-id="12345607">Vote Now</a> </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.1s">
                    <div style="background-color:#C1E6FB" class="blog-box">
                        <div class="blog-img"> <img src="{{asset('web-assets/img/singer4.png')}}" alt="image"> </div>
                        <div class="blog-info"> <span>07 Jan 2018</span>
                            <h4 style="color:#F60"><strong>Code-001</strong></h4>
                            <p><strong class="cont-name">Zubeen Garg</strong></p>
                            <p><a href=""><i style="font-size:24px" class="fas fa-video"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<i style="font-size:24px" class="fab fa-facebook-f"></i>&nbsp;&nbsp;&nbsp;&nbsp;<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i style="font-size:24px" class="fab fa-whatsapp-square"></i></a></p>
                            <div class="blog-btn"> <a href="#" onClick="return VoteNow(this)" sun-data-id="12345607">Vote Now</a> </div>
                        </div>
                    </div>
                </div> --}}
                
                
                
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="btn-style text-center wow fadeIn" data-wow-duration="2s"> <a href="blog.html">All Blog Stories</a> </div>
                </div>
            </div> --}}
        </div>
    </div>
    
   
    <footer class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="text-center col-xs-12 col-sm-12 col-md-12 col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                    <div> <a href="#"><i class="fab fa-facebook-f"></i></a> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-dribbble"></i></a> <a href="#"><i class="fab fa-behance"></i></a> </div>
                    <p> © 2018 - Karaoke Superstar</p>
                </div>
            </div>
        </div>
    </footer>
    <div class="modal fade" id="vote-now">
        <div class="modal-dialog">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Modal title</h4>
                </div> --}}
                <div class="modal-body">
                    
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div> --}}
            </div>
        </div>
    </div>
    <script src="{{asset('web-assets/js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('web-assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('web-assets/js/scrollreveal.js')}}"></script>
    <script src="{{asset('web-assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('web-assets/js/wow.min.js')}}"></script>
    <script src="{{asset('web-assets/js/main.js')}}"></script>
    <script src="{{asset('web-assets/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('web-assets/js/lity.min.js')}}"></script>
    <script src="{{asset('web-assets/js/vote.js?v=1')}}"></script>
</body>


</html>