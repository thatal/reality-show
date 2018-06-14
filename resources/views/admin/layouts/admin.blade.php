<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin Dashboard - {{config('app.name')}} -  @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('css/bootstrap-responsive.min.css')}}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link href="{{asset('css/pages/dashboard.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.css"/>
@yield('css_page')
<style>
.fade.in{
    opacity:0.9;
}
body {
  position: relative;
  min-height: 100%;
  min-height: 100vh;
}
.main{
    border-bottom:none;
    margin-bottom:3px;
}
.footer {
  position: absolute;
  right: 0;bottom:0;left:0;
  margin-top:3px;
}
.disabled{
    cursor: not-allowed;
    pointer-events: none;
}

</style>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
@include('admin.include.top_nav')
@include('admin.include.nav_bar')

<div class="main">
  <div class="main-inner">
    @if(\Session::has('success'))
        <div class="container">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="icon-ok"></i></strong>  {!!\Session::get('success')!!}
            </div>
        </div>
    @endif
    @if(\Session::has('error'))
        <div class="container">
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="icon-warning-sign"></i></strong> {!!\Session::get('error')!!}
            </div>
        </div>
    @endif
    @if(\Session::has('warning'))
        <div class="container">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><i class="icon-large icon-bolt"></i></strong> {!!\Session::get('warning')!!}
            </div>
        </div>
    @endif
    @yield('content')
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; 2018 {{config('app.name')}}</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{asset('js/jquery-1.7.2.min.js')}}"></script> 
<script src="{{asset('js/excanvas.min.js')}}"></script> 
<script src="{{asset('js/chart.min.js')}}" type="text/javascript"></script> 
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/validator/validator.js')}}"></script>
<script language="javascript" type="text/javascript" src="{{asset('js/full-calendar/fullcalendar.min.js')}}"></script>
 
<script src="{{asset('js/base.js')}}"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js"></script>

<script>
$(document).ready(function(){
    $('.form-validator').validator();
    var current_page_URL = location.href;
    $("a").each(function() {
        if ($(this).attr("href") !== "#") {
            var target_URL = $(this).prop("href");
            if (target_URL === current_page_URL) {
                $('subnavbar a').parents('li, ul').parent('li').removeClass('active');
                $(this).parent('li').addClass('active');
                $(this).parent('li').parent('ul').parent('li').addClass('active');
                return true;
            }
        }
    });
});
</script>
@yield('js_page')
</body>
</html>
