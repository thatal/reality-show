<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Ramdhenu Admin Panel - @yield('title')</title>

        <meta name="description" content="top menu &amp; navigation" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="{!!asset('assets/css/bootstrap.min.css')!!}" />
        <link rel="stylesheet" href="{!!asset('assets/font-awesome/4.5.0/css/font-awesome.min.css')!!}" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="{!!asset('assets/css/fonts.googleapis.com.css')!!}" />

        <!-- ace styles -->
        <link rel="stylesheet" href="{!!asset('assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style')!!}" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="{!!asset('assets/css/ace-part2.min.css" class="ace-main-stylesheet')!!}" />
        <![endif]-->
        <link rel="stylesheet" href="{!!asset('assets/css/ace-skins.min.css')!!}" />
        <link rel="stylesheet" href="{!!asset('assets/css/ace-rtl.min.css')!!}" />
        <link rel="stylesheet" href="{{asset('web-assets/css/sweetalert.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}" />
        <link rel="stylesheet" href="{{asset('assets/css/chosen.min.css')}}" />



        <!--[if lte IE 9]>
          <link rel="stylesheet" href="{!!asset('assets/css/ace-ie.min.css')!!}" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="{!!asset('assets/js/ace-extra.min.js')!!}"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
        @yield('css_page')
    </head>

    <body class="no-skin">
        @include('admin/include/ace_top_nav')

        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            @include('admin/include/ace_nav_bar')

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="page-content">
                        @yield('content')
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->

            <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder">{{config('app.name')}}</span>
                            &copy; 2018
                        </span>

                        &nbsp; &nbsp; Developed by Web.com
                       {{--  <span class="action-buttons">
                            <a href="#">
                                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
                            </a>

                            <a href="#">
                                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
                            </a>
                        </span> --}}
                    </div>
                </div>
            </div>

            <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
            </a>
        </div><!-- /.main-container -->

        <!-- basic scripts -->

        <!--[if !IE]> -->
        <script src="{!!asset('assets/js/jquery-2.1.4.min.js')!!}"></script>

        <!-- <![endif]-->

        <!--[if IE]>
        <script src="{!!asset('assets/js/jquery-1.11.3.min.js')!!}"></script>
        <![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='{!!asset('assets/js/jquery.mobile.custom.min.js')!!}'>"+"<"+"/script>");
        </script>
        <script src="{!!asset('assets/js/bootstrap.min.js')!!}"></script>

        <!-- page specific plugin scripts -->

        <!-- ace scripts -->
        <script src="{!!asset('assets/js/ace-elements.min.js')!!}"></script>
        <script src="{!!asset('assets/js/ace.min.js')!!}"></script>
        <script src="{!!asset('assets/js/validator/validator.js')!!}"></script>
        <script src="{{asset('web-assets/js/sweetalert.min.js')}}"></script>
        <script src="{{asset('assets/js/moment.min.js')}}"></script>

        <script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>
        {{-- <script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('assets/js/buttons.flash.min.js')}}"></script>
        <script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
        <script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
        <script src="{{asset('assets/js/buttons.colVis.min.js')}}"></script>
        <script src="{{asset('assets/js/dataTables.select.min.js')}}"></script> --}}
        <script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>




        <!-- inline scripts related to this page -->
        <script type="text/javascript">
            jQuery(function($) {
             var $sidebar = $('.sidebar').eq(0);
             if( !$sidebar.hasClass('h-sidebar') ) return;
            
             $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
                if( event_name !== 'sidebar_fixed' ) return;
            
                var sidebar = $sidebar.get(0);
                var $window = $(window);
            
                //return if sidebar is not fixed or in mobile view mode
                var sidebar_vars = $sidebar.ace_sidebar('vars');
                if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
                    $sidebar.removeClass('lower-highlight');
                    //restore original, default marginTop
                    sidebar.style.marginTop = '';
            
                    $window.off('scroll.ace.top_menu')
                    return;
                }
            
            
                 var done = false;
                 $window.on('scroll.ace.top_menu', function(e) {
            
                    var scroll = $window.scrollTop();
                    scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
                    if (scroll > 17) scroll = 17;
            
            
                    if (scroll > 16) {          
                        if(!done) {
                            $sidebar.addClass('lower-highlight');
                            done = true;
                        }
                    }
                    else {
                        if(done) {
                            $sidebar.removeClass('lower-highlight');
                            done = false;
                        }
                    }
            
                    sidebar.style['marginTop'] = (17-scroll)+'px';
                 }).triggerHandler('scroll.ace.top_menu');
            
             }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
            
             $(window).on('resize.ace.top_menu', function() {
                $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
             });
            
            
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.form-validator').validator({
                    feedback: {
                        success: 'glyphicon-ok',
                        error: 'glyphicon-remove'
                    },
                    'delay' : 500
                });
                $('.datetimepicker').datetimepicker({
                 format: 'YYYY-MM-DD h:mm a',//use this option to display seconds
                 icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    today: 'fa fa-arrows ',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                 }
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                $('.datePicker').datetimepicker({
                    format: 'YYYY-MM-DD',//use this option to display seconds
                    icons: {
                    time: 'fa fa-clock-o',
                    date: 'fa fa-calendar',
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down',
                    previous: 'fa fa-chevron-left',
                    next: 'fa fa-chevron-right',
                    // today: 'fa fa-arrows ',
                    clear: 'fa fa-trash',
                    close: 'fa fa-times'
                 }
                }).next().on(ace.click_event, function(){
                    $(this).prev().focus();
                });
                $(".data_table").dataTable({
                    "sPaginationType": "full_numbers",
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,

                    aoColumnDefs: [{
                       bSortable: false,
                       aTargets: [0, -1]
                    }]
                });
                var myTable =
                $(".data_table1").DataTable({
                    "sPaginationType": "full_numbers",
                    "bPaginate": false,
                    "bLengthChange": false,
                    "bFilter": true,
                    "bInfo": false,
                    "bAutoWidth": false,

                    aoColumnDefs: [{
                       bSortable: false,
                       aTargets: [0]
                    }]
                });
                // $.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
                
                // new $.fn.dataTable.Buttons( myTable, {
                //     buttons: [
                //       {
                //         "extend": "colvis",
                //         "text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
                //         "className": "btn btn-white btn-primary btn-bold",
                //         columns: ':not(:first):not(:last)'
                //       },
                //       {
                //         "extend": "copy",
                //         "text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
                //         "className": "btn btn-white btn-primary btn-bold"
                //       },
                //       {
                //         "extend": "csv",
                //         "text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
                //         "className": "btn btn-white btn-primary btn-bold"
                //       },
                //       {
                //         "extend": "excel",
                //         "text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
                //         "className": "btn btn-white btn-primary btn-bold"
                //       },
                //       {
                //         "extend": "pdf",
                //         "text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
                //         "className": "btn btn-white btn-primary btn-bold"
                //       },
                //       {
                //         "extend": "print",
                //         "text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
                //         "className": "btn btn-white btn-primary btn-bold",
                //         autoPrint: false,
                //         message: ''
                //       }       
                //     ]
                // } );
                // myTable.buttons().container().appendTo( $('.tableTools-container') );
                
                // //style the message box
                // var defaultCopyAction = myTable.button(1).action();
                // myTable.button(1).action(function (e, dt, button, config) {
                //     defaultCopyAction(e, dt, button, config);
                //     $('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                // });
                
                
                // var defaultColvisAction = myTable.button(0).action();
                // myTable.button(0).action(function (e, dt, button, config) {
                    
                //     defaultColvisAction(e, dt, button, config);
                    
                    
                //     if($('.dt-button-collection > .dropdown-menu').length == 0) {
                //         $('.dt-button-collection')
                //         .wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
                //         .find('a').attr('href', '#').wrap("<li />")
                //     }
                //     $('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
                // });
                $('.chosen-select').chosen({allow_single_deselect:true}); 
                    //resize the chosen on window resize
            
                $(window)
                .off('resize.chosen')
                .on('resize.chosen', function() {
                    $('.chosen-select').each(function() {
                         var $this = $(this);
                         $this.next().css({'width': $this.parent().width()});
                    })
                }).trigger('resize.chosen');
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
                $(document).ready(function(){
                    $('[data-toggle="tooltip"]').tooltip(); 
                });
            });
        </script>
        @yield('js_page')
    </body>
</html>
